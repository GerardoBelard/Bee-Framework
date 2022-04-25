<?php

/**
 * Plantilla general de modelos
 * Versión 1.0.1
 *
 * Modelo de profesor
 */
class profesorModel extends Model {
  public static $t1   = 'usuarios'; 
  function __construct()
  {
    // Constructor general
  }
  
  static function all()
  {
    // Todos los registros
    $sql = 'SELECT * FROM usuarios WHERE rol = "profesor" ORDER BY id DESC';
    return ($rows = parent::query($sql)) ? $rows : [];
  }

  static function all_paginated()
  {
    // Todos los registros
    $sql = 'SELECT * FROM usuarios WHERE rol = "profesor" ORDER BY id DESC';
    return PaginationHandler::paginate($sql);
  }

  static function by_id($id)
  {
    // Un registro con $id
    $sql = 'SELECT * FROM usuarios WHERE rol = "profesor" AND id = :id LIMIT 1';
    return ($rows = parent::query($sql, ['id' => $id])) ? $rows[0] : [];
  }

  static function by_numero($numero)
  {
    // Un registro con $numero
    $sql = 'SELECT * FROM usuarios WHERE rol = "profesor" AND numero = :numero LIMIT 1';
    return ($rows = parent::query($sql, ['numero' => $numero])) ? $rows[0] : [];
  }

  static function asignar_materia($id_profesor, $id_materia)
  {
    $data = 
    [
      'id_materia' => $id_materia,
      'id_profesor' => $id_profesor,
    ];

    if (!$id = self::add('materias_profesores', $data)) return false;

    return $id;
  }
 static function quitar_materia($id_profesor, $id_materia)
 {
  $data = 
  [
    'id_materia' => $id_materia,
    'id_profesor' => $id_profesor,
  ];

  return (self::remove('materias_profesores', $data)) ? true : false;
 } 

 static function eliminar($id_profesor)
 {
   $sql = 'DELETE u, mp FROM usuarios u LEFT JOIN materias_profesores mp ON mp.id_profesor = u.id
    WHERE u.id = :id AND u.rol = "profesor"';
   return (parent::query($sql, ['id' => $id_profesor])) ? true : false;
 }
}

