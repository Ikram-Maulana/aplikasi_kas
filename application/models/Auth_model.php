<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

  public function roleId()
  {
    $this->db->from('user_role');
    $this->db->join('user', 'user.role_id = user_role.id');
    $query = $this->db->get()->result_array();
    return $query;
  }
}