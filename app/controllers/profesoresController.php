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
      'title' => 'Profesores',
      'slug' => 'profesores',
      'button' => ['url' => 'profesor/agregar', 'text' => '<i class="fas fa-plus"></i>Agregar Profesor'],
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
    View::render('agregar');
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