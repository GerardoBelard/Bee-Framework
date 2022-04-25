<?php

/**
 * Plantilla general de modelos
 * Versión 1.0.1
 *
 * Modelo de grupo
 */
class grupoModel extends Model {
  public static $t1   = 'grupos'; 
  function __construct()
  {
    // Constructor general
  }
  
  static function all()
  {
    // Todos los registros
    $sql = 'SELECT * FROM grupos ORDER BY id DESC';
    return ($rows = parent::query($sql)) ? $rows : [];
  }
  static function all_paginated()
  {
    // Todos los registros
    $sql = 'SELECT * FROM grupos ORDER BY id DESC';
    return PaginationHandler::paginate($sql);
  }

  static function by_id($id)
  {
    // Un registro con $id
    $sql = 'SELECT * FROM grupos WHERE id = :id LIMIT 1';
    return ($rows = parent::query($sql, ['id' => $id])) ? $rows[0] : [];
  }

}

