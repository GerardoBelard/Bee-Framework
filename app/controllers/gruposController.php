<?php

//INDICA QUE EN ESTE SCRIPT SE SUBIERAN ARCHIDOS CON UPLOAD
use \Verot\Upload\Upload;

class gruposController extends Controller
{
    private $id  = null;
    private $rol = null;

    public function __construct()
    {
        // Validación de sesión de usuario, descomentar si requerida
        if (!Auth::validate()) {
            Flasher::new('Debes iniciar sesión primero.', 'danger');
            Redirect::to('login');
        }

        $this->id  = get_user('id');
        $this->rol = get_user_role();
    }
  
    public function index()
    {
        if (!is_admin($this->rol)) {
            Flasher::new(get_notificaciones(), 'danger');
            Redirect::back();
        }
    
        $data =
    [
      'title'  => 'Todos los Grupos',
      'slug'   => 'grupos',
      'button' => ['url' => 'grupos/agregar', 'text' => '<i class="fas fa-plus"></i> Agregar grupo'],
      'grupos' => grupoModel::all_paginated()
    ];
    
        // Descomentar vista si requerida
        View::render('index', $data);
    }

    public function ver($id)
    {
        if (!is_admin($this->rol)) {
            Flasher::new(get_notificaciones(), 'danger');
            Redirect::back();
        }

        if (!$grupo = grupoModel::by_id($id)) {
            Flasher::new('No existe el grupo en la base de datos.', 'danger');
            Redirect::back();
        }

        $data =
    [
      'title'  => sprintf('Grupo %s', $grupo['nombre']),
      'slug'   => 'grupos',
      'button' => ['url' => 'grupos', 'text' => '<i class="fas fa-table"></i> Todos los grupos'],
      'g'      => $grupo
    ];

        View::render('ver', $data);
    }

    public function agregar()
    {
        if (!is_admin($this->rol)) {
            Flasher::new(get_notificaciones(), 'danger');
            Redirect::back();
        }

        $data =
    [
      'title'  => 'Agregar Grupo',
      'button' => ['url' => 'grupos', 'text' => '<i class="fas fa-table"></i> Todos los grupos'],
      'slug'   => 'grupos'
    ];

        View::render('agregar', $data);
    }

    public function post_agregar()
    {
        try {
            if (!check_posted_data(['csrf','nombre','descripcion'], $_POST) || !Csrf::validate($_POST['csrf'])) {
                throw new Exception(get_notificaciones());
            }

            // Validar rol
            if (!is_admin($this->rol)) {
                throw new Exception(get_notificaciones(1));
            }

            $nombre      = clean($_POST["nombre"]);
            $descripcion = clean($_POST["descripcion"]);


            // Validar que el nombre del grupo no exista en la base de datos
            $sql = 'SELECT * FROM grupos WHERE nombre = :nombre LIMIT 1';
            if (grupoModel::query($sql, ['nombre' => $nombre])) {
                throw new Exception(sprintf('Ya existe el grupo <b>%s</b> en la base de datos.', $nombre));
            }

            $data =
      [
        'numero'      => null,
        'nombre'      => $nombre,
        'descripcion' => $descripcion,
        'horario'     => null,
        'creado'      => now()
      ];

            // Insertar a la base de datos
            if (!$id = grupoModel::add(grupoModel::$t1, $data)) {
                throw new Exception(get_notificaciones(2));
            }

            Flasher::new(sprintf('Nuevo grupo <b>%s</b> agregado con éxito.', $nombre), 'success');
            Redirect::back();
        } catch (PDOException $e) {
            Flasher::new($e->getMessage(), 'danger');
            Redirect::back();
        } catch (Exception $e) {
            Flasher::new($e->getMessage(), 'danger');
            Redirect::back();
        }
    }

    public function post_editar()
    {
        try {
            if (!check_posted_data(['csrf','id','nombre','descripcion'], $_POST) || !Csrf::validate($_POST['csrf'])) {
                throw new Exception(get_notificaciones());
            }

            // Validar rol
            if (!is_admin($this->rol)) {
                throw new Exception(get_notificaciones(1));
            }

            $id          = clean($_POST["id"]);
            $nombre      = clean($_POST["nombre"]);
            $descripcion = clean($_POST["descripcion"]);
            $horario     = $_FILES["horario"];
            $n_horario   = false;

            if (!$grupo = grupoModel::by_id($id)) {
                throw new Exception('No existe el grupo en la base de datos.');
            }

            $db_horario = $grupo['horario'];


            // Validar que el nombre del grupo no exista en la base de datos
            $sql = 'SELECT * FROM grupos WHERE id != :id AND nombre = :nombre LIMIT 1';
            if (grupoModel::query($sql, ['id' => $id, 'nombre' => $nombre])) {
                throw new Exception(sprintf('Ya existe el grupo <b>%s</b> en la base de datos.', $nombre));
            }

            $data =
      [
        'nombre'      => $nombre,
        'descripcion' => $descripcion
      ];
      
            // Validar si se está subiendo una imagen
            if ($horario['error'] !== 4) {
                $tmp  = $horario['tmp_name'];
                $name = $horario['name'];
                $ext  = pathinfo($name, PATHINFO_EXTENSION);

                // Validar extensión del archivo
                if (!in_array($ext, ['jpg','png','jpeg','bmp'])) {
                    throw new Exception('Selecciona un formato de imagen válido.');
                }

                $foo = new upload($horario);
                if (!$foo->uploaded) {
                    throw new Exception('Hubo un problema al subir el archivo.');
                }

                // Nuevo nombre y nuevas medidas de la imagen
                $filename                = generate_filename();
                $foo->file_new_name_body = $filename;
                $foo->image_resize       = true;
                $foo->image_x            = 800;
                $foo->image_ratio_y      = true;

                $foo->process(UPLOADS);
                if (!$foo->processed) {
                    throw new Exception('Hubo un problema al guardar la imagen en el servidor.');
                }

                $data['horario'] = sprintf('%s.%s', $filename, $ext);
                $n_horario       = true;
            }

            // Insertar a la base de datos
            if (!grupoModel::update(grupoModel::$t1, ['id' => $id], $data)) {
                throw new Exception(get_notificaciones(3));
            }

            // Borrado del horario anterior en caso de actualización
            if ($db_horario !== null && $n_horario === true && is_file(UPLOADS.$db_horario)) {
                unlink(UPLOADS.$horario);
            }

            Flasher::new(sprintf('Grupo <b>%s</b> actualizado con éxito.', $nombre), 'success');
            Redirect::back();
        } catch (PDOException $e) {
            Flasher::new($e->getMessage(), 'danger');
            Redirect::back();
        } catch (Exception $e) {
            Flasher::new($e->getMessage(), 'danger');
            Redirect::back();
        }
    }

    function borrar($id)
    {
      try {
        if (!check_get_data(['_t'], $_GET) || !Csrf::validate($_GET['_t'])) {
          throw new Exception(get_notificaciones());
        }
  
        // Validar rol
        if (!is_admin($this->rol)) {
          throw new Exception(get_notificaciones(1));
        }
  
        // Exista el grupo
        if (!$grupo = grupoModel::by_id($id)) {
          throw new Exception('No existe el grupo en la base de datos.');
        }
  
        // Borramos el registro y sus conexiones
        if (grupoModel::eliminar($grupo['id']) === false) {
          throw new Exception(get_notificaciones(4));
        }
  
        // Borrar la imagen del horario
        if (is_file(UPLOADS.$grupo['horario'])) {
          unlink(UPLOADS.$grupo['horario']);
        }
  
        Flasher::new(sprintf('Grupo <b>%s</b> borrado con éxito.', $grupo['nombre']), 'success');
        Redirect::to('grupos');
  
      } catch (PDOException $e) {
        Flasher::new($e->getMessage(), 'danger');
        Redirect::back();
      } catch (Exception $e) {
        Flasher::new($e->getMessage(), 'danger');
        Redirect::back();
      }
    }
}
 


