<?php

class alumnoModel extends Model {
  public static $t1   = 'usuarios'; 

  function __construct()
  {
    // Constructor general
  }
  
  static function all()
  {
    // Todos los registros
    $sql = 'SELECT * FROM usuarios ORDER BY id DESC';
    return ($rows = parent::query($sql)) ? $rows : [];
  }

  static function by_id($id)
  {
    // Un registro con $id
    $sql = 'SELECT * FROM usuarios WHERE id = :id and rol = "alumno" LIMIT 1';
    return ($rows = parent::query($sql, ['id' => $id])) ? $rows[0] : [];
  }
}

