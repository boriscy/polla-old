<?php
class Login extends Controller
{

  public function __construct() {
    parent::Controller();
    $this->load->model('Usuario_model');
  }

  /**
   * Funcion para loguearse
   */
  public function index() {
    if($this->session->userdata('usuario_id') ) {
      redirect("/dashboard");
    }

    if(isset($_POST['email']) && isset($_POST['password']) ) {
      if($usuario = $this->Usuario_model->buscar_email_password($_POST['email'], $_POST['password'])) {
        $this->session->set_userdata( array(
          'usuario_nombre' => $usuario->nombre, 
          'usuario_id' => $usuario->id,
          'token' => md5(rand())// Necesario para seguridad
          )
        );
        $this->session->set_flashdata('notice', "Usted a ingresado correctamente");
        redirect("/dashboard");
      }else{
        $this->session->set_flashdata('error', "Usted a ingresado un usuario o contraseña inválidos");
      }
    }
    $data['template'] = 'login/index';
    $this->load->view('layouts/application', $data);
  }


  /**
   * Funcion para desloguearse
   */
  function destroy() {
    $this->session->sess_destroy();
    redirect("/login");
  }


}
