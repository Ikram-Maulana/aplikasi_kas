<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model('Menu_model', 'menu');
    cek_login();
    // Load library pagination
    $this->load->library('pagination');
  }

  public function index()
  {
    // ambil data keyword
    if ($this->input->post('submit')) {
      $data['keyword'] = $this->input->post('keyword');
      $this->session->set_userdata('keyword', $data['keyword']);
    } else {
      $data['keyword'] = $this->session->userdata('keyword');;
    }

    $data['menu'] = $this->menu->get_menu();

    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['title'] = 'Menu Management';

    $this->form_validation->set_rules('menu', 'Menu', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('template/header-dash', $data);
      $this->load->view('template/navbar', $data);
      $this->load->view('template/sidebar', $data);
      $this->load->view('menu/index', $data);
      $this->load->view('template/footer-dash');
    } else {
      $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
      $this->session->set_flashdata('berhasil', 'Ditambahkan');
      redirect('menu/index');
    }
  }

  public function editMenu($id_menu = '')
  {
    if (empty($id_menu)) {
      redirect('menu/index', 'refresh');
    }
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['title'] = 'Menu Management';
    $data['menu'] = $this->db->get('user_menu')->result_array();

    $this->form_validation->set_rules('menu', 'Menu', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('template/header-dash', $data);
      $this->load->view('template/navbar', $data);
      $this->load->view('template/sidebar', $data);
      $this->load->view('menu/index', $data);
      $this->load->view('template/footer-dash', $data);
    } else {
      $menu = $this->input->post('menu');
      $id = $this->input->post('id');

      $data = [
        'menu' => $menu
      ];

      // proses update
      $update = $this->menu->updatemenu($data, $id);

      // notifikasi
      if ($update) {
        $this->session->set_flashdata('berhasil', 'Diupdate');
        redirect('menu/index', 'refresh');
      } else {
        $this->session->set_flashdata('gagal', 'Gagal Disimpan');
        redirect('menu/index', 'refresh');
      }
    }
  }

  public function hapusm($id)
  {
    $this->menu->deleteMenu($id);
    $this->session->set_flashdata('berhasil', 'Dihapus');
    redirect('menu/index');
  }

  public function submenu()
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['title'] = 'Submenu Management';
    $data['menu'] = $this->db->get('user_menu')->result_array();
    $data['subMenu'] = $this->menu->getsubmenu();

    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('menu_id', 'Menu', 'required');
    $this->form_validation->set_rules('url', 'Url', 'required');
    $this->form_validation->set_rules('icon', 'Icon', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('template/header-dash', $data);
      $this->load->view('template/navbar', $data);
      $this->load->view('template/sidebar', $data);
      $this->load->view('menu/submenu', $data);
      $this->load->view('template/footer-dash');
    } else {
      $data = [
        'title' => $this->input->post('title'),
        'menu_id' => $this->input->post('menu_id'),
        'url' => $this->input->post('url'),
        'icon' => $this->input->post('icon'),
        'is_active' => $this->input->post('is_active')
      ];

      $this->db->insert('user_sub_menu', $data);
      $this->session->set_flashdata('berhasil', 'Ditambahkan');
      redirect('menu/submenu');
    }
  }

  public function editsubMenu($id_submenu = '')
  {
    if (empty($id_submenu)) {
      redirect('menu/submenu', 'refresh');
    }
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['title'] = 'Submenu Management';

    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('menu_id', 'Menu', 'required');
    $this->form_validation->set_rules('url', 'Url', 'required');
    $this->form_validation->set_rules('icon', 'Icon', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('template/header-dash', $data);
      $this->load->view('template/navbar', $data);
      $this->load->view('template/sidebar', $data);
      $this->load->view('menu/submenu', $data);
      $this->load->view('template/footer-dash', $data);
    } else {
      $menu = $this->input->post('menu');
      $id = $this->input->post('id');

      $data = [
        'title' => $this->input->post('title'),
        'menu_id' => $this->input->post('menu_id'),
        'url' => $this->input->post('url'),
        'icon' => $this->input->post('icon'),
        'is_active' => $this->input->post('is_active')
      ];

      // proses update
      $update = $this->menu->updatesubmenu($data, $id);

      // notifikasi
      if ($update) {
        $this->session->set_flashdata('berhasil', 'Diupdate');
        redirect('menu/submenu', 'refresh');
      } else {
        $this->session->set_flashdata('gagal', 'Gagal Disimpan');
        redirect('menu/submenu', 'refresh');
      }
    }
  }

  public function hapussm($id)
  {
    $this->menu->deletesubMenu($id);
    $this->session->set_flashdata('berhasil', 'Dihapus');
    redirect('menu/submenu');
  }
} //END CLASS