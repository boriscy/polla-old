<?php 
include_once("base.php");

class Dashboard  extends Base
{

  public function __construct() {
    parent::__construct();
    $this->checkUser();
    $this->load->model("Usuario_model");
  }

  public function index() {
    $data['usuario'] = $this->Usuario_model->getId($this->session->userdata("usuario_id") );

    $data['template'] = 'dashboard/index';
    $this->load->view('layouts/application', $data);

  }

}

