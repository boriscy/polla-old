<?php 
include_once("base.php");

class Campeones extends Base
{
  public function __construct() {
    parent::__construct();
    $this->checkUser();
    $this->load->model("Usuario_model");
    $this->load->model("Grupo_model");
    $this->load->model("Equipo_model");
    $this->load->model("Jugador_model");
  }

  public function index() {
    $data = $this->setData();
    $data['template'] = "campeones/index";

    $this->load->view('layouts/application', $data);
  }

  /**
   * @return array
   */
  private function setData() {
    $data = array();
    $data['usuario'] = $this->Usuario_model->getId($this->session->userdata("usuario_id") );
    $data['grupos'] = $this->Grupo_model->getList( array( 'labelField' => 'nombre' ) );
    $data['equipos'] = $this->Equipo_model->getAll( array( 'order' => 'grupo_id ASC') );
    $data['equipos_data'] = Equipo_model::data($data['equipos']);
    $data['equipos_list'] = $this->Equipo_model->getList( array('labelField' => 'nombre', 'order' => 'nombre ASC') );
    $data['jugadores'] = $this->Jugador_model->jugadoresEquipos();

    return $data;
  }

}
