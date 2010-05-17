<?php
include_once('base_model.php');

class Equipo_model extends Base_model
{

  /**
   * Constructor donde se define la tabla y los campos
   */
  public function __construct() {
    parent::__construct('equipos');
  }

  /**
   * Prepara un array en base a un resultado para poder presentar
   * @param array()
   * @return array()
   */
  public static function data($equipos) {
    $equiposData = array();
    foreach($equipos->result() as $equipo) {
    $equiposData[$equipo->id] = array(
      'nombre' => $equipo->nombre,
      'img_min' => $equipo->img_min,
      'img_med' => $equipo->img_med,
      );
    }

    return $equiposData;
  }
}
