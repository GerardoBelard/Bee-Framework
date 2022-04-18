<?php 
/**
 * Regresa el rol del usuario logeado
 *
 * @return mixed
 */
function get_user_role(){
   return $rol = get_user('rol');
}


function get_default_roles(){
  return ['root', 'admin'];
}

function is_root($rol){
return in_array($rol, ['root']);
}

function is_admin($rol){
  return in_array($rol, ['admin', 'root']);
}

function is_profesor($rol){
return in_array($rol, ['profesor', 'admin' ,'root']);
}

function is_alumno($rol){
return in_array($rol, ['alumno', 'admin' ,'root']);
}

function is_user($rol, $roles_aceptados){
 $default = get_default_roles();

 if (!is_array($roles_aceptados)){
   array_push($default, $roles_aceptados);
   return in_array($rol, $default);
  }

  return in_array($rol, array_merge($default, $roles_aceptados));
}
 /**
  * 0 Acceso no autorizado
  * 1 accion no autorizada
  * 2 agregar
  * 3 editar
  * 4 borrar 
  * @param integer $index
  * @return mixed
  */
function get_notificaciones($index = 0)
{
  $notificaciones = 
  [
    'Acceso no autorizado.',
    'Acción no autorizada.',
    'Hubo un error al agregar el nivel.',
    'Hubo un error al actualizar el nivel.',
    'Hubo un error al borrar el nivel.'
  ];

  return isset($notificaciones[$index]) ? $notificaciones[$index] : $notificaciones[0];
}


