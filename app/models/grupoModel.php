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

  static function materias_disponibles($id)
  {
    $sql = 
    'SELECT
      mp.id,
      m.nombre AS materia,
      u.nombre_completo AS profesor
    FROM
      materias_profesores mp
    LEFT JOIN materias m ON m.id = mp.id_materia
    LEFT JOIN usuarios u ON u.id = mp.id_profesor
    WHERE
      mp.id NOT IN (
        SELECT
          gm.id_mp
        FROM
          grupos_materias gm
        WHERE
          gm.id_grupo = :id_grupo
      )';

    return ($rows = parent::query($sql, ['id_grupo' => $id])) ? $rows : [];
  }
  static function materias_asignadas($id, $id_profesor = null)
  {
    // Cargar las materias del grupo sin importar el profesor
    if ($id_profesor === null) {
      $sql = 
      'SELECT
        mp.id,
        m.id AS id_materia,
        m.nombre AS materia,
        u.id AS id_profesor,
        u.numero AS num_profesor,
        u.nombre_completo AS profesor
      FROM
        materias_profesores mp
      LEFT JOIN materias m ON m.id = mp.id_materia
      LEFT JOIN usuarios u ON u.id = mp.id_profesor
      WHERE
        mp.id IN (
          SELECT
            gm.id_mp
          FROM
            grupos_materias gm
          WHERE
            gm.id_grupo = :id_grupo
        )';
  
      return ($rows = parent::query($sql, ['id_grupo' => $id])) ? $rows : [];
    }

    $sql = 
    'SELECT
      mp.id,
      m.id AS id_materia,
      m.nombre AS materia,
      u.id AS id_profesor,
      u.numero AS num_profesor,
      u.nombre_completo AS profesor
    FROM
      materias_profesores mp
    LEFT JOIN materias m ON m.id = mp.id_materia
    LEFT JOIN usuarios u ON u.id = mp.id_profesor
    WHERE
      mp.id IN (
        SELECT
          gm.id_mp
        FROM
          grupos_materias gm
        WHERE
          gm.id_grupo = :id_grupo
      ) AND mp.id_profesor = :id_profesor';

    return ($rows = parent::query($sql, ['id_grupo' => $id, 'id_profesor' => $id_profesor])) ? $rows : [];
  }
}

