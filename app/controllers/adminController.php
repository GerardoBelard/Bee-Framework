<?php

class adminController extends Controller {
  private $id  = null;
  private $rol = null;

  function __construct()
  {
    // Validación de sesión de usuario, descomentar si requerida
    if (!Auth::validate()) {
      Flasher::new('Debes iniciar sesión primero.', 'danger');
      Redirect::to('login');
    }

    $this->id  = get_user('id');
    $this->rol = get_user_role();

    if (!is_admin($this->rol)) {
      Flasher::new(get_notificaciones(), 'danger');
      Redirect::back();
    }
    logger('Borrando o actualizando bdd');
  }
  
  function index()
  {
    $data = 
    [
      'title' => 'Administración',
      'slug'  => 'Coordinador@'
    ];
    
    // Descomentar vista si requerida
    View::render('index', $data);
  }
}