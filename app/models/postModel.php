<?php

/**
 * Plantilla general de modelos
 * VersiÃ³n 1.0.1
 *
 * Modelo de post
 */
class postModel extends Model {
  public static $t1   = 'posts'; // Nombre de la tabla en la base de datos;
  
  // Nombre de tabla 2 que talvez tenga conexiÃ³n con registros
  //public static $t2 = '__tabla 2___'; 
  //public static $t3 = '__tabla 3___'; 

  function __construct()
  {
    // Constructor general
  }
  
  static function all()
  {
    // Todos los registros
    $sql = 'SELECT * FROM posts ORDER BY id DESC';
    return ($rows = parent::query($sql)) ? $rows : [];
  }

  static function by_id($id)
  {
    // Un registro con $id
    $sql = 'SELECT * FROM posts WHERE id = :id LIMIT 1';
    return ($rows = parent::query($sql, ['id' => $id])) ? $rows[0] : [];
  }
}
