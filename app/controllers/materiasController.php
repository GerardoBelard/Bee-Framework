<?php

/**
 * Plantilla general de controladores
 * Versión 1.0.2
 *
 * Controlador de materias
 */
class materiasController extends Controller
{
    public function __construct()
    {
        // Validación de sesión de usuario, descomentar si requerida
  
        if (!Auth::validate()) {
            Flasher::new('Debes iniciar sesión primero.', 'danger');
            Redirect::to('login');
        }
    }
  
    public function index()
    {
        $data =
    [
      'title' => 'Todas Las Materias',
      'slug' => 'materias',
      'button' => ['url' => 'materias/agregar', 'text'=> '<i class="fas fa-plus"></i>Agregar Nivel'],
      'materias' => materiaModel::all()
    ];
    
        // Descomentar vista si requerida
        View::render('index', $data);
    }

    public function ver($id)
    {
        View::render('ver');
    }

    public function agregar()
    {
        $data =
    [
      'title' => 'Agregar Materia',
      'slug' => 'materias'
    ];
        View::render('agregar', $data);
    }

    public function post_agregar()
    {
        try {
            if (!check_posted_data(['csrf', 'nombre', 'descripcion'], $_POST) || !Csrf::validate($_POST['csrf'])) {
                throw new Exception('Acceso no autorizado');
            }
            $nombre = clean($_POST["nombre"]);
            $descripcion = clean($_POST["descripcion"]);
           
            $data = [
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'creado' => now()
          ];

            //insertar a la base de datos
            if (!$id = materiaModel::add(materiaModel::$t1, $data)) {
                throw new Exception('hubo un error al agregar la materia');
            }
            Flasher::new(sprintf('materia <b>%s</b> agregada con exito.', $nombre), 'success');
            Redirect::back();

            //
        } catch (PDOException $e) {
            Flasher::new($e->getMessage(), 'danger');
            Redirect::back();
        } catch (Exception $e) {
            Flasher::new($e->getMessage(), 'danger');
            Redirect::back();
        }
  
        function editar($id)
        {
            View::render('editar');
        }

        function post_editar()
        {
        }
    }
}
