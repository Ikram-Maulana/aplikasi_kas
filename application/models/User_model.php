<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

  public function update($data, $email)
  {
    $this->db->where('email', $email);
    return $this->db->update('user', $data);
  }
} //END CLASS