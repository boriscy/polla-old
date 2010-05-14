<?php
include_once('base_model.php');

class Usuario_model extends Base_model
{
  public $tipos = array('admin' => 'Administrador',
      'adm' => 'Administrativo',
      'director' => 'Director',
      'profe' => 'Profesor',
    );
  /**
   * Constructor donde se define la tabla y los campos
   */
  function __construct() {
    parent::__construct('usuarios');
    $this->fields = array('primer_nombre', 'segundo_nombre',
      'paterno', 'materno', 'login', 'password', 'email', 'tipo');
  }

  /**
   * Recupera todos los datos necesarios de un usuario
   * @param $id
   * @return array
   */
  public function getId($id) {
    $ret = parent::getId($id);
    $materias = $this->db->get_where('materias_usuarios', array('usuario_id' => $ret['id']) );
    $materias = $materias->result_array();
    $ret['materias'] = array();
    foreach($materias as $k => $v)
      $ret['materias'][] = $v['materia_id'];
    return $ret;
  }

  /**
   * Compara el password
   * @param string
   * @param string
   * @return mixed [false, Usuario_model]
   */
  public function buscar_email_password($email, $password) {
    $u = $this->db->get_where($this->table, array( 'email' => $email ) );
    if( $u->num_rows() > 0 ) {
      $u = $u->row();
      $password = sha1( $password . $u->password_salt );
      if( $password == $u->password ) {
        return $u;
      }else {
        return false;
      }
    }else {
      return false;
    }
  }

  /**
   * Actualización de usuario
   */
  public function update($params) {
    $this->db->trans_start();
    parent::update($params);
    $this->db->trans_complete();
  }



}
