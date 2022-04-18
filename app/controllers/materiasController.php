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
      'materias' => materiaModel::all_paginated()
    ];
    
        // Descomentar vista si requerida
        View::render('index', $data);
    }

    public function ver($id)
    {
        if (!$materia = materiaModel::by_id($id)){
            Flasher::new('No existe la materia', 'danger');
            Redirect::to('materias');
        }
        $data =
        [
          'title' => sprintf('Viendo %s', $materia['nombre']),
          'slug' => 'materias',
          'button' => ['url' => 'materias', 'text'=> '<i class="fas fa-table"></i>Materias'],
          'm' => $materia
        ];

        View::render('ver', $data);
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
            //Validar que la materia no existe en la bdd

            $sql = 'SELECT * FROM materias Where  nombre = :nombre LIMIT 1';
            if(materiaModel::query($sql, ['nombre' => $nombre])){
                throw new Exception(sprintf('Ya existe la materia <b>%s</b> en la base de datos', $nombre));
            
            }
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

    public function post_editar()
    {
        try {
            if (!check_posted_data(['csrf', 'id', 'nombre', 'descripcion'], $_POST) || !Csrf::validate($_POST['csrf'])) {
                throw new Exception('Acceso no autorizado');
            }
            $id = clean ($_POST["id"]);
            $nombre = clean($_POST["nombre"]);
            $descripcion = clean($_POST["descripcion"]);

            if(!$materia = materiaModel::by_id($id)){
                throw new Exception('no existe la materia en la base de datos');
            }
           
             //Validar que la materia no existe en la bdd

             $sql = 'SELECT * FROM materias Where id != :id AND nombre = :nombre LIMIT 1';
             if(materiaModel::query($sql, ['id' => $id, 'nombre' => $nombre])){
                 throw new Exception(sprintf('Ya existe la materia <b>%s</b> en la base de datos', $nombre));
             
             }

            $data = [
            'nombre' => $nombre,
            'descripcion' => $descripcion,
          
          ];

            //insertar a la base de datos
            if (!materiaModel::update(materiaModel::$t1, ['id' => $id], $data)) {
                throw new Exception('hubo un error al actualizar la materia');
            }
            Flasher::new(sprintf('materia <b>%s</b> Actualizada con exito', $nombre), 'success');
            Redirect::back();

            //
        } catch (PDOException $e) {
            Flasher::new($e->getMessage(), 'danger');
            Redirect::back();
        } catch (Exception $e) {
            Flasher::new($e->getMessage(), 'danger');
            Redirect::back();
        }
  
       
    }
    function borrar($id){
           
    }
}
