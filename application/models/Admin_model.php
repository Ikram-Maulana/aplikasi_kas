<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
  public function getAkun()
  {
    $this->db->select('*');
    $this->db->from('user_role');
    $this->db->join('user', 'user.role_id=user_role.id');
    $query = $this->db->get()->result_array();
    return $query;
  }

  public function getAkun2()
  {
    $this->db->select('*');
    $this->db->from('user_role');
    $this->db->join('user', 'user.role_id=user_role.id');
    $query = $this->db->get()->result_array();
    return $query;
  }

  public function deleteAkun($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('user');
  }

  public function deleteRole($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('user_role');
  }

  public function updateRole($data, $id_role)
  {
    $this->db->where('id', $id_role);
    return $this->db->update('user_role', $data);
  }

  public function updateStatus($data, $id_status)
  {
    $this->db->where('id', $id_status);
    return $this->db->update('user', $data);
  }

  public function getSumber()
  {
    return $this->db->get('tbl_sumber')->result_array();
  }

  public function deleteSumber($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('tbl_sumber');
  }

  public function updateSumber($data, $id_sumber)
  {
    $this->db->where('id', $id_sumber);
    return $this->db->update('tbl_sumber', $data);
  }

  public function getDanmas()
  {
    return $this->db->get('tbl_kasmasuk')->result_array();
  }

  public function getDankel()
  {
    return $this->db->get('tbl_kaskeluar')->result_array();
  }
} //END CLASS