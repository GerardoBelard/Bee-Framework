<?php 

class loginController extends Controller {
  function __construct()
  {
    if (Auth::validate()) {
      Flasher::new('Ya hay una sesión abierta.');
      Redirect::to('home/flash');
    }
  }

  function index()
  {
   //prueba de notificaciones Flasher::new('Probando notificaciones.', 'danger');
    $data =
    [
      'title'   => 'Ingresar a tu cuenta',
      'padding' => '0px'
    ];

    View::render('index', $data);
  }

  function post_login()
  {
    try{
      if (!Csrf::validate($_POST['csrf']) || !check_posted_data(['email','csrf','password'], $_POST)) {
        Flasher::new('Acceso no autorizado.', 'danger');
        Redirect::back();
    }
    // Data pasada del formulario
    $email  = clean($_POST['email']);
    $password = clean($_POST['password']);

//validacion para verificar si el email es valido
if (!filter_var($email, FILTER_VALIDATE_EMAIL)){

  throw new Exception('El correo electronico no es valido');
}
    // Información del usuario loggeado, simplemente se puede reemplazar aquí con un query a la base de datos
    // para cargar la información del usuario si es existente
    $user = 
    [
      'id'       => 123,
      'name'     => 'Bee Default', 
      'email'    => 'hellow@joystick.com.mx', 
      'avatar'   => 'myavatar.jpg', 
      'tel'      => '11223344', 
      'color'    => '#112233',
      'user'     => 'bee',
      'password' => '$2y$10$R18ASm3k90ln7SkPPa7kLObcRCYl7SvIPCPtnKMawDhOT6wPXVxTS'
    ];


    if ($email !== $user['user'] || !password_verify($password.AUTH_SALT, $user['password'])) {
      Flasher::new('Las credenciales no son correctas.', 'danger');
      Redirect::back();
    }

    // Loggear al usuario
    Auth::login($user['id'], $user);
    Redirect::to('home/flash');
}catch (Exception $e) {
    Flasher::new($e->getMessage(), 'danger');
    Redirect::back();
}


  }
}