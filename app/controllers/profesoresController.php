<?php

/**
 * Plantilla general de controladores
 * Versión 1.0.2
 *
 * Controlador de profesores
 */
class profesoresController extends Controller {
  function __construct()
  {
    // Validación de sesión de usuario, descomentar si requerida

    if (!Auth::validate()) {
      Flasher::new('Debes iniciar sesión primero.', 'danger');
      Redirect::to('login');
    }

  }

  function index()
  {
    if (!is_admin(get_user_role())){
    Flasher::new(get_notificaciones(), 'danger');
    Redirect::back();
  }
    $data =
    [
      'title' => 'Lista de profesores',
      'slug' => 'profesores',
      'button' => ['url' => buildURL('profesores/agregar'), 'text' => '<i class="fas fa-plus"></i>Agregar Profesor'],
      'profesores' => profesorModel::all_paginated()
        ];

    // Descomentar vista si requerida
    View::render('index', $data);
  }

  function ver($id)
  {
    View::render('ver');
  }

  function agregar()
  {
    try {
        if (!check_get_data(['_t'], $_GET) || !Csrf::validate($_GET['_t'])) {
            throw new Exception(get_notificaciones());
        }

        //validando rol de usuario 
        if (!is_admin(get_user_role())){
            throw new Exception(get_notificaciones(1));
        }
        $numero =rand(11111, 999999);
        $data = 
        [
          'numero' => $numero,
          'nombres' => null,
          'apellidos' => null,
          'nombre_completo' => null,
          'email' => null,
          'password' => null, 
          'telefono' => null,
          'hash' => generate_token(),
          'rol' => 'profesor',
           'status' => 'pendiente',
           'creado' => now()

        ];

        //insertar a la base de datos
        if (!$id = profesorModel::add(profesorModel::$t1, $data)) {
            throw new Exception('hubo un error al agregar la materia');
        }
        Flasher::new(sprintf('Nuevo profesor <b>%s</b> agregada con exito.', $data['numero']), 'success');
        Redirect::to('profesores/ver/%s', $numero);

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

  function post_agregar()
  {

  }

  function editar($id)
  {
    View::render('editar');
  }

  function post_editar()
  {

  }

  function borrar($id)
  {
    // Proceso de borrado
  }
}