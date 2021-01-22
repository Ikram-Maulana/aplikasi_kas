<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    cek_login();
    $this->load->library('form_validation');
    $this->load->model('Admin_model', 'admin');
    $this->load->library('pagination');
  }

  public function index()
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['title'] = 'Dashboard';
    $this->db->select_sum('nominal');
    $data['total_masuk'] = $this->db->get('tbl_kasmasuk')->row_array();
    $this->db->select_sum('nominal');
    $data['total_kas2'] = $this->db->get('tbl_kaskeluar')->row_array();

    $this->load->view('template/header-dash', $data);
    $this->load->view('template/navbar', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('admin/index', $data);
    $this->load->view('template/footer-dash', $data);
  }

  public function role()
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['title'] = 'Role';
    $data['role'] = $this->db->get('user_role')->result_array();

    $this->form_validation->set_rules('role', 'Role', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('template/header-dash', $data);
      $this->load->view('template/navbar', $data);
      $this->load->view('template/sidebar', $data);
      $this->load->view('admin/role', $data);
      $this->load->view('template/footer-dash');
    } else {
      $this->db->insert('user_role', ['role' => $this->input->post('role')]);
      $this->session->set_flashdata('berhasil', 'Ditambahkan');
      redirect('admin/role');
    }
  }

  public function roleAccess($role_id)
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['title'] = 'Role';
    $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

    $this->db->where('id !=', 1);
    $data['menu'] = $this->db->get('user_menu')->result_array();

    $this->load->view('template/header-dash', $data);
    $this->load->view('template/navbar', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('admin/role-access', $data);
    $this->load->view('template/footer-dash');
  }

  public function changeAccess()
  {
    $menu_id = $this->input->post('menuId');
    $role_id = $this->input->post('roleId');

    $data = [
      'role_id' => $role_id,
      'menu_id' => $menu_id
    ];

    $result = $this->db->get_where('user_access_menu', $data);

    if ($result->num_rows() < 1) {
      $this->db->insert('user_access_menu', $data);
    } else {
      $this->db->delete('user_access_menu', $data);
    }

    $this->session->set_flashdata('berhasil', 'Dirubah');
  }

  public function editRole($id_role = '')
  {
    if (empty($id_role)) {
      redirect('admin/role', 'refresh');
    }
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['title'] = 'Role Management';
    $data['role'] = $this->db->get('user_role')->result_array();

    $this->form_validation->set_rules('role', 'Role', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('template/header-dash', $data);
      $this->load->view('template/navbar', $data);
      $this->load->view('template/sidebar', $data);
      $this->load->view('admin/role', $data);
      $this->load->view('template/footer-dash', $data);
    } else {
      $role = $this->input->post('role');
      $id = $this->input->post('id');

      $data = [
        'role' => $role
      ];

      // proses update
      $update = $this->admin->updateRole($data, $id);

      // notifikasi
      if ($update) {
        $this->session->set_flashdata('berhasil', 'Diupdate');
        redirect('admin/role', 'refresh');
      } else {
        $this->session->set_flashdata('gagal', 'Gagal Disimpan');
        redirect('admin/role', 'refresh');
      }
    }
  }

  public function hapusRole($id)
  {
    $this->admin->deleteRole($id);
    $this->session->set_flashdata('berhasil', 'Dihapus');
    redirect('admin/role');
  }

  public function akun()
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['akun'] = $this->admin->getAkun();
    $data['title'] = 'Daftar Akun';

    $this->load->view('template/header-dash', $data);
    $this->load->view('template/navbar', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('admin/akun', $data);
    $this->load->view('template/footer-dash');
  }

  public function changeStatus($id_status = '')
  {
    if (empty($id_status)) {
      redirect('admin/akun', 'refresh');
    }
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['title'] = 'Role Management';
    $data['akun'] = $this->admin->getAkun2();

    $this->form_validation->set_rules('is_active', 'Status', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('template/header-dash', $data);
      $this->load->view('template/navbar', $data);
      $this->load->view('template/sidebar', $data);
      $this->load->view('admin/akun', $data);
      $this->load->view('template/footer-dash', $data);
    } else {
      $status = $this->input->post('is_active');
      $id = $this->input->post('id');

      $data = [
        'is_active' => $status
      ];

      // proses update
      $update = $this->admin->updateStatus($data, $id);

      // notifikasi
      if ($update) {
        $this->session->set_flashdata('berhasil', 'Diupdate');
        redirect('admin/akun', 'refresh');
      } else {
        $this->session->set_flashdata('gagal', 'Gagal Disimpan');
        redirect('admin/akun', 'refresh');
      }
    }
  }

  public function hapusAkun($id)
  {
    $this->admin->deleteAkun($id);
    $this->session->set_flashdata('berhasil', 'Dihapus');
    redirect('admin/akun');
  }

  public function sumberDana()
  {
    $data['sumber'] = $this->admin->getSumber();

    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['title'] = 'Sumber Dana';

    $this->form_validation->set_rules('sumber', 'Sumber', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('template/header-dash', $data);
      $this->load->view('template/navbar', $data);
      $this->load->view('template/sidebar', $data);
      $this->load->view('admin/sumber', $data);
      $this->load->view('template/footer-dash');
    } else {
      $this->db->insert('tbl_sumber', ['sumber' => $this->input->post('sumber')]);
      $this->session->set_flashdata('berhasil', 'Ditambahkan');
      redirect('admin/sumberdana');
    }
  }

  public function editSum($id_sumber = '')
  {
    if (empty($id_sumber)) {
      redirect('admin/sumberdana', 'refresh');
    }
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['title'] = 'Sumber Dana Management';
    $data['sumber'] = $this->db->get('tbl_sumber')->result_array();

    $this->form_validation->set_rules('sumber', 'Sumber', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('template/header-dash', $data);
      $this->load->view('template/navbar', $data);
      $this->load->view('template/sidebar', $data);
      $this->load->view('admin/sumber', $data);
      $this->load->view('template/footer-dash', $data);
    } else {
      $sumber = $this->input->post('sumber');
      $id = $this->input->post('id');

      $data = [
        'sumber' => $sumber
      ];

      // proses update
      $update = $this->admin->updatesumber($data, $id);

      // notifikasi
      if ($update) {
        $this->session->set_flashdata('berhasil', 'Diupdate');
        redirect('admin/sumberdana', 'refresh');
      } else {
        $this->session->set_flashdata('gagal', 'Gagal Disimpan');
        redirect('admin/sumberdana', 'refresh');
      }
    }
  }

  public function hapusSum($id)
  {
    $this->admin->deleteSumber($id);
    $this->session->set_flashdata('berhasil', 'Dihapus');
    redirect('admin/sumberdana');
  }

  public function addSumber()
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['title'] = 'Sumber Dana Management';
    $data['sumber'] = $this->admin->getSumber();

    $this->form_validation->set_rules('sumber', 'Sumber', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('template/header-dash', $data);
      $this->load->view('template/navbar', $data);
      $this->load->view('template/sidebar', $data);
      $this->load->view('admin/sumber', $data);
      $this->load->view('template/footer-dash');
    } else {
      $this->db->insert('tbl_sumber', ['sumber' => $this->input->post('sumber')]);
      $this->session->set_flashdata('berhasil', 'Ditambahkan');
      redirect('admin/danamasuk');
    }
  }

  public function danaMasuk()
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['title'] = 'Dana Masuk';

    $data['sumber'] = $this->db->get('tbl_sumber')->result_array();
    $data['kasmasuk'] = $this->admin->getDanmas();

    $this->db->select_sum('nominal');
    $data['total_kas'] = $this->db->get('tbl_kasmasuk')->row_array();

    $this->form_validation->set_rules('sumber', 'Sumber', 'required');
    $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
    $this->form_validation->set_rules('nominal', 'Nominal', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('template/header-dash', $data);
      $this->load->view('template/navbar', $data);
      $this->load->view('template/sidebar', $data);
      $this->load->view('admin/masuk', $data);
      $this->load->view('template/footer-dash');
    } else {
      $idtransaksi = date("dmY") . '-' . rand(0000, 9999);
      $kas =  $this->db->get_where('tbl_kas', ['id_transaksi' => $idtransaksi])->row_array();
      if ($kas) {
        $idtransaksi = date("dmY") . '-' . rand(0000, 9999);
      }

      $sumber =  $this->db->get_where('tbl_sumber', ['id' => $this->input->post('sumber')])->row_array();

      $data = [
        'id_transaksi' => $idtransaksi,
        'nama_transaksi' => $sumber['sumber'],
        'nominal' => preg_replace('/[^0-9]/', '', $this->input->post('nominal')),
        'date_trx' =>  $this->input->post('tanggal'),
        'id_anggota' =>  $this->input->post('sumber'),
        'jenis' => 'kas masuk'
      ];

      $data_kas = [
        'id_transaksi' => $idtransaksi,
        'tipe_kas' => 'masuk',
        'tgl_transaksi' => $this->input->post('tanggal'),
        'keterangan' => $sumber['sumber'],
        'nominal' => preg_replace('/[^0-9]/', '', $this->input->post('nominal'))
      ];

      $this->db->insert('tbl_kas', $data_kas);
      $this->db->insert('tbl_kasmasuk', $data);
      $this->session->set_flashdata('berhasil', 'Ditambahkan');
      redirect('admin/danamasuk');
    }
  }

  public function danaKeluar()
  {
    $data['title'] = 'Dana Keluar';
    $data['user'] =  $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $data['sumber'] = $this->db->get('tbl_sumber')->result_array();
    $data['kaskeluar'] = $this->admin->getDankel();

    $this->db->select_sum('nominal');
    $data['total_kas2'] = $this->db->get('tbl_kaskeluar')->row_array();

    $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
    $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
    $this->form_validation->set_rules('nominal', 'Nominal', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('template/header-dash', $data);
      $this->load->view('template/navbar', $data);
      $this->load->view('template/sidebar', $data);
      $this->load->view('admin/keluar', $data);
      $this->load->view('template/footer-dash');
    } else {
      $idtransaksi = date("dmY") . '-' . rand(0000, 9999);
      $kas =  $this->db->get_where('tbl_kas', ['id_transaksi' => $idtransaksi])->row_array();
      if ($kas) {
        $idtransaksi = date("dmY") . '-' . rand(0000, 9999);
      }

      $data = [
        'id_transaksi' => $idtransaksi,
        'nama_transaksi' => $this->input->post('keterangan'),
        'nominal' => preg_replace('/[^0-9]/', '', $this->input->post('nominal')),
        'date_trx' =>  $this->input->post('tanggal'),
        'jenis' => 'kas keluar'
      ];

      $data_kas = [
        'id_transaksi' => $idtransaksi,
        'tipe_kas' => 'keluar',
        'keterangan' => $this->input->post('keterangan'),
        'tgl_transaksi' => $this->input->post('tanggal'),
        'nominal' => preg_replace('/[^0-9]/', '', $this->input->post('nominal'))
      ];

      $this->db->insert('tbl_kas', $data_kas);
      $this->db->insert('tbl_kaskeluar', $data);
      $this->session->set_flashdata('berhasil', 'Ditambahkan');
      redirect('admin/danakeluar');
    }
  }

  public function hapusDanam()
  {
    $id = $this->input->get('id');

    $danamasuk =  $this->db->get_where('tbl_kasmasuk', ['id_transaksi' => $id])->row_array();
    $kas =  $this->db->get_where('tbl_kas', ['id_transaksi' => $danamasuk['id_transaksi']])->row_array();
    $jurnal =  $this->db->get_where('jurnal', ['id_transaksi' => $kas['id_transaksi']])->row_array();

    $this->db->delete('tbl_kasmasuk', array('id_transaksi' => $id));
    $this->db->delete('tbl_kas', array('id_transaksi' => $danamasuk['id_transaksi']));
    $this->db->delete('jurnal', array('id_transaksi' => $kas['id_transaksi']));
    $this->db->delete('jurnal_detail', array('id_jurnal' => $jurnal['id']));


    $this->session->set_flashdata('berhasil', 'Dihapus');
    redirect('admin/danamasuk');
  }

  public function hapusDanakel()
  {
    $id = $this->input->get('id');

    $danakeluar =  $this->db->get_where('tbl_kaskeluar', ['id_transaksi' => $id])->row_array();
    $kas =  $this->db->get_where('tbl_kas', ['id_transaksi' => $danakeluar['id_transaksi']])->row_array();
    $jurnal =  $this->db->get_where('jurnal', ['id_transaksi' => $kas['id_transaksi']])->row_array();

    $this->db->delete('tbl_kaskeluar', array('id_transaksi' => $id));
    $this->db->delete('tbl_kas', array('id_transaksi' => $danakeluar['id_transaksi']));
    $this->db->delete('jurnal', array('id_transaksi' => $kas['id_transaksi']));
    $this->db->delete('jurnal_detail', array('id_jurnal' => $jurnal['id']));


    $this->session->set_flashdata('berhasil', 'Dihapus');
    redirect('admin/danakeluar');
  }
} //END CLASS