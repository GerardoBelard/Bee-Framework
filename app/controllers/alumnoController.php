<?php

/**
 * Plantilla general de controladores
 * Versión 1.0.2
 *
 * Controlador de alumno
 */
class alumnoController extends Controller {
  private $id_alumno = null;
  private $rol       = null;

  function __construct()
  {
    // Validación de sesión de usuario, descomentar si requerida
    if (!Auth::validate()) {
      Flasher::new('Debes iniciar sesión primero.', 'danger');
      Redirect::to('login');
    }

    // $this->rol = get_user_role();

    //  if (is_admin($this->rol)) {
    //   Redirect::to('alumnos');
    //  }

    // if (!is_alumno($this->rol)) {
    //   Flasher::new(get_notificaciones(), 'danger');
    //   Redirect::back();
    // }

    // Inicializamos los valores de nuestras propiedades
    $this->id_alumno = get_user('id');
  }
  
  function index()
  {
    $this->grupo();
  }

  function lecciones()
  {
    $publicadas  = true;
    $id_materia  = isset($_GET["id_materia"]) ? clean($_GET["id_materia"], true) : null;
    $id_profesor = isset($_GET["id_profesor"]) ? clean($_GET["id_profesor"], true) : null;
    $data        =
    [
      'title'     => 'Todas mis lecciones',
      'slug'      => 'alumno-lecciones',
      'lecciones' => leccionModel::by_alumno($this->id, $publicadas, $id_materia, $id_profesor)
    ];

    View::render('lecciones', $data);
  }

  function leccion($id_leccion)
  {
    // Validar que exista la lección
    if (!$leccion = leccionModel::by_id($id_leccion)) {
      Flasher::new('No existe la lección seleccionada.', 'danger');
      Redirect::back();
    }

    // Validar si la lección le pertenece al grupo del alumno / materia
    $sql = 
    'SELECT
      u.*
    FROM
      usuarios u
    JOIN grupos_alumnos ga ON ga.id_alumno = u.id
    JOIN grupos g ON g.id = ga.id_grupo
    JOIN grupos_materias gm ON gm.id_grupo = g.id
    JOIN materias_profesores mp ON mp.id = gm.id_mp
    JOIN lecciones l ON l.id_materia = mp.id_materia
    AND l.id_profesor = mp.id_profesor
    WHERE
      u.id = :id_usuario
    AND l.id = :id_leccion LIMIT 1';

    if (!leccionModel::query($sql, ['id_usuario' => $this->id, 'id_leccion' => $id_leccion])) {
      Flasher::new(get_notificaciones(), 'danger');
      Redirect::to('alumno/lecciones');
    }

    // Guardar nuestros valores para validación
    $time = time();
    $min  = strtotime($leccion['fecha_inicial']);
    $max  = strtotime($leccion['fecha_disponible']);

    // Validar el acceso con base a la fecha inicial
    if (($min - $time) > 0) {
      Flasher::new(sprintf('Esta lección aún no está disponible, lo estará el día <b>%s</b>.', format_date($leccion['fecha_inicial'])), 'danger');
      Redirect::to('alumno/lecciones');
    }

    // Validar la fecha final
    if (($max - $time) < 0) {
      Flasher::new(sprintf('Esta lección ya no está disponible, caducó el día <b>%s</b>.', format_date($leccion['fecha_disponible'])), 'danger');
      Redirect::to('alumno/lecciones');
    }


    $data =
    [
      'title'      => sprintf('Lección %s', $leccion['titulo']),
      'hide_title' => true,
      'slug'       => 'alumno-lecciones',
      'l'          => $leccion
    ];
    
    View::render('leccion', $data);
  }

  function grupo()
  {
    if (!$grupo = grupoModel::by_alumno($this->id)) {
      Flasher::new('El grupo no existe en la base de datos.', 'danger');
      Redirect::back();
    }

    $data =
    [
      'title' => $grupo['nombre'],
      'slug'  => 'alumno-grupo',
      'g'     => $grupo
    ];

    View::render('grupo', $data);
  }

  function calificaciones($id)
  {
    
    
    if (!$alumno = alumnoModel::by_idca($id)) {
      Flasher::new('No existe el alumno en la base de datos.', 'danger');
      Redirect::back();
    }

    $data =
    [
      'title'  => sprintf('Alumno #%s', $alumno['numero']),
      'slug'   => 'alumno',
      'button' => ['url' => 'alumno', 'text' => '<i class="fas fa-table"></i> Alumno'],
      'a'      => $alumno
    ];

    View::render('calificaciones', $data);
  }
  function boleta($id){
        
    if (!$alumno = alumnoModel::by_idca($id)) {
      Flasher::new('No existe el alumno en la base de datos.', 'danger');
      Redirect::back();
    }

    $data =
    [
      'title'  => sprintf('Alumno #%s', $alumno['numero']),
      'slug'   => 'alumno',
      'button' => ['url' => 'alumno', 'text' => '<i class="fas fa-table"></i> Alumno'],
      'a'      => $alumno
    ];

    View::render('boleta', $data);
  }

  function boleta2($id){
        
    if (!$alumno = alumnoModel::by_idca($id)) {
      Flasher::new('No existe el alumno en la base de datos.', 'danger');
      Redirect::back();
    }

    $data =
    [
      'title'  => sprintf('Alumno #%s', $alumno['numero']),
      'slug'   => 'alumno',
      'button' => ['url' => 'alumno', 'text' => '<i class="fas fa-table"></i> Alumno'],
      'a'      => $alumno
    ];

    View::render('boleta2', $data);
  }

  function boleta3($id){
        
    if (!$alumno = alumnoModel::by_idca($id)) {
      Flasher::new('No existe el alumno en la base de datos.', 'danger');
      Redirect::back();
    }

    $data =
    [
      'title'  => sprintf('Alumno #%s', $alumno['numero']),
      'slug'   => 'alumno',
      'button' => ['url' => 'alumno', 'text' => '<i class="fas fa-table"></i> Alumno'],
      'a'      => $alumno
    ];

    View::render('boleta3', $data);
  }

  function boleta4($id){
        
    if (!$alumno = alumnoModel::by_idca($id)) {
      Flasher::new('No existe el alumno en la base de datos.', 'danger');
      Redirect::back();
    }

    $data =
    [
      'title'  => sprintf('Alumno #%s', $alumno['numero']),
      'slug'   => 'alumno',
      'button' => ['url' => 'alumno', 'text' => '<i class="fas fa-table"></i> Alumno'],
      'a'      => $alumno
    ];

    View::render('boleta4', $data);
  }

  function boleta5($id){
        
    if (!$alumno = alumnoModel::by_idca($id)) {
      Flasher::new('No existe el alumno en la base de datos.', 'danger');
      Redirect::back();
    }

    $data =
    [
      'title'  => sprintf('Alumno #%s', $alumno['numero']),
      'slug'   => 'alumno',
      'button' => ['url' => 'alumno', 'text' => '<i class="fas fa-table"></i> Alumno'],
      'a'      => $alumno
    ];

    View::render('boleta5', $data);
  }

  function boleta6($id){
        
    if (!$alumno = alumnoModel::by_idca($id)) {
      Flasher::new('No existe el alumno en la base de datos.', 'danger');
      Redirect::back();
    }

    $data =
    [
      'title'  => sprintf('Alumno #%s', $alumno['numero']),
      'slug'   => 'alumno',
      'button' => ['url' => 'alumno', 'text' => '<i class="fas fa-table"></i> Alumno'],
      'a'      => $alumno
    ];

    View::render('boleta6', $data);
  }

  function boleta7($id){
        
    if (!$alumno = alumnoModel::by_idca($id)) {
      Flasher::new('No existe el alumno en la base de datos.', 'danger');
      Redirect::back();
    }

    $data =
    [
      'title'  => sprintf('Alumno #%s', $alumno['numero']),
      'slug'   => 'alumno',
      'button' => ['url' => 'alumno', 'text' => '<i class="fas fa-table"></i> Alumno'],
      'a'      => $alumno
    ];

    View::render('boleta7', $data);
  }

  
  function boleta8($id){
        
    if (!$alumno = alumnoModel::by_idca($id)) {
      Flasher::new('No existe el alumno en la base de datos.', 'danger');
      Redirect::back();
    }

    $data =
    [
      'title'  => sprintf('Alumno #%s', $alumno['numero']),
      'slug'   => 'alumno',
      'button' => ['url' => 'alumno', 'text' => '<i class="fas fa-table"></i> Alumno'],
      'a'      => $alumno
    ];

    View::render('boleta8', $data);
  }


  function boleta9($id){
        
    if (!$alumno = alumnoModel::by_idca($id)) {
      Flasher::new('No existe el alumno en la base de datos.', 'danger');
      Redirect::back();
    }

    $data =
    [
      'title'  => sprintf('Alumno #%s', $alumno['numero']),
      'slug'   => 'alumno',
      'button' => ['url' => 'alumno', 'text' => '<i class="fas fa-table"></i> Alumno'],
      'a'      => $alumno
    ];

    View::render('boleta9', $data);
  }

  
  function boleta10($id){
        
    if (!$alumno = alumnoModel::by_idca($id)) {
      Flasher::new('No existe el alumno en la base de datos.', 'danger');
      Redirect::back();
    }

    $data =
    [
      'title'  => sprintf('Alumno #%s', $alumno['numero']),
      'slug'   => 'alumno',
      'button' => ['url' => 'alumno', 'text' => '<i class="fas fa-table"></i> Alumno'],
      'a'      => $alumno
    ];

    View::render('boleta10', $data);
  }

  
  function boleta11($id){
        
    if (!$alumno = alumnoModel::by_idca($id)) {
      Flasher::new('No existe el alumno en la base de datos.', 'danger');
      Redirect::back();
    }

    $data =
    [
      'title'  => sprintf('Alumno #%s', $alumno['numero']),
      'slug'   => 'alumno',
      'button' => ['url' => 'alumno', 'text' => '<i class="fas fa-table"></i> Alumno'],
      'a'      => $alumno
    ];

    View::render('boleta11', $data);
  }

  
  function boleta12($id){
        
    if (!$alumno = alumnoModel::by_idca($id)) {
      Flasher::new('No existe el alumno en la base de datos.', 'danger');
      Redirect::back();
    }

    $data =
    [
      'title'  => sprintf('Alumno #%s', $alumno['numero']),
      'slug'   => 'alumno',
      'button' => ['url' => 'alumno', 'text' => '<i class="fas fa-table"></i> Alumno'],
      'a'      => $alumno
    ];

    View::render('boleta12', $data);
  }

  
  function boleta13($id){
        
    if (!$alumno = alumnoModel::by_idca($id)) {
      Flasher::new('No existe el alumno en la base de datos.', 'danger');
      Redirect::back();
    }

    $data =
    [
      'title'  => sprintf('Alumno #%s', $alumno['numero']),
      'slug'   => 'alumno',
      'button' => ['url' => 'alumno', 'text' => '<i class="fas fa-table"></i> Alumno'],
      'a'      => $alumno
    ];

    View::render('boleta13', $data);
  }

  
  function boleta14($id){
        
    if (!$alumno = alumnoModel::by_idca($id)) {
      Flasher::new('No existe el alumno en la base de datos.', 'danger');
      Redirect::back();
    }

    $data =
    [
      'title'  => sprintf('Alumno #%s', $alumno['numero']),
      'slug'   => 'alumno',
      'button' => ['url' => 'alumno', 'text' => '<i class="fas fa-table"></i> Alumno'],
      'a'      => $alumno
    ];

    View::render('boleta14', $data);
  }

  
  function boleta15($id){
        
    if (!$alumno = alumnoModel::by_idca($id)) {
      Flasher::new('No existe el alumno en la base de datos.', 'danger');
      Redirect::back();
    }

    $data =
    [
      'title'  => sprintf('Alumno #%s', $alumno['numero']),
      'slug'   => 'alumno',
      'button' => ['url' => 'alumno', 'text' => '<i class="fas fa-table"></i> Alumno'],
      'a'      => $alumno
    ];

    View::render('boleta15', $data);
  }

}