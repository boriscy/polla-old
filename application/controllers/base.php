<?php
/**
 * Clase principal en la cual se definen metodos que todos los controladores usaran
 */
class Base extends Controller
{
  function __construct() {
    parent::Controller();
  }


  /**
   * Retorna el controlador y la acción
   * @return array
   */
  protected function getUri() {
    $arr = array();
    foreach($this->uri->rsegments as $v) {
      array_push($arr, $v);
    }
    return array($arr[0], $arr[1]);
  }

  /**
   * Funcion principal para los permisos
   */
  protected function checkUser() {
    if(!$this->session->userdata("usuario_id")) {
      redirect("/login");
    }
  }
}
