<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{

  public function get_menu()
  {
    return $this->db->get('user_menu')->result_array();
  }

  public function getSubMenu($limit, $start, $keyword = null)
  {
    if ($keyword) {
      $this->db->like('title', $keyword);
    }
    $this->db->select('*');
    $this->db->from('user_menu');
    $this->db->join('user_sub_menu', 'user_sub_menu.menu_id=user_menu.id');
    return $this->db->get('', $limit, $start)->result_array();
  }

  public function deleteMenu($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('user_menu');
  }

  public function updateMenu($data, $id_menu)
  {
    $this->db->where('id', $id_menu);
    return $this->db->update('user_menu', $data);
  }

  public function deletesubMenu($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('user_sub_menu');
  }

  public function updatesubMenu($data, $id_submenu)
  {
    $this->db->where('id', $id_submenu);
    return $this->db->update('user_sub_menu', $data);
  }
} //END CLASS