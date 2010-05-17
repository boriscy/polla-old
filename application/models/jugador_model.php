<?php 
include_once("base_model.php");

class Jugador_model extends Base_model
{
  public function __construct() {
    parent::__construct("jugadores");
  }

  /**
   * Crea un lista de todos los jugadores con su equipo
   */
  public function jugadoresEquipos() {
    $this->db->order_by("equipo_id", "ASC");
    $this->db->order_by("nombre", "ASC");
    $jugadores = $this->db->get($this->table);
    $jugadores_equipos = array();

    foreach($jugadores->result() as $v) {
      if(!isset($jugadores_equipos[$v->equipo_id] ) ) {
        $jugadores_equipos[$v->equipo_id] = array();
      }
      $jugadores_equipos[$v->equipo_id][$v->id] = $v->nombre;
    }

    return $jugadores_equipos;
  }
}
