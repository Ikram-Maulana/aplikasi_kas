<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    cek_login();
    $this->load->library('form_validation');
    $this->load->model('User_model', 'user');
  }

  public function index()
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['title'] = 'My Profile';

    $this->load->view('template/header-dash', $data);
    $this->load->view('template/navbar', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('user/index', $data);
    $this->load->view('template/footer-dash');
  }

  public function edit()
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['title'] = 'Edit Account';

    $this->form_validation->set_rules('name', 'Full Name', 'required|trim');
    $this->form_validation->set_rules('phone', 'Phone Number', 'required|trim|numeric');
    $this->form_validation->set_rules('birthday', 'Birthday', 'required|trim');
    $this->form_validation->set_rules('address', 'Address', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('template/header-dash', $data);
      $this->load->view('template/navbar', $data);
      $this->load->view('template/sidebar', $data);
      $this->load->view('user/edit', $data);
      $this->load->view('template/footer-dash');
    } else {
      $email = $this->input->post('email');

      // Cek Upload Photo
      $upload_image = $_FILES['image']['name'];

      if ($upload_image) {
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '2048';
        $config['upload_path'] = './images/profile/';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
          $new_image = $this->upload->data('file_name');
          $this->db->set('image', $new_image);
        } else {
          echo $this->upload->display_errors();
        }
      }

      $data = [
        'name' => $this->input->post('name'),
        'phone' => $this->input->post('phone'),
        'birthday' => $this->input->post('birthday'),
        'address' => $this->input->post('address')
      ];

      $update = $this->user->update($data, $email);

      if ($update) {
        $this->session->set_flashdata('berhasil', 'Diupdate');
        redirect('user/edit');
      } else {
        $this->session->set_flashdata('gagal', 'Diupdate');
        redirect('user/edit');
      }
    }
  }

  public function setting()
  {
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['title'] = 'Edit Account';

    $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
    $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[8]|matches[new_password2]');
    $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[8]|matches[new_password1]');

    if ($this->form_validation->run() == false) {
      $this->load->view('template/header-dash', $data);
      $this->load->view('template/navbar', $data);
      $this->load->view('template/sidebar', $data);
      $this->load->view('user/setting', $data);
      $this->load->view('template/footer-dash');
    } else {
      $current_password = $this->input->post('current_password');
      $new_password = $this->input->post('new_password1');

      if (!password_verify($current_password, $data['user']['password'])) {
        $this->session->set_flashdata('gagal', '-> Password Salah!');
        redirect('user/setting');
      } else {
        if ($current_password == $new_password) {
          $this->session->set_flashdata('gagal', '-> Password sama dengan yang sebelumnya!');
          redirect('user/setting');
        } else {
          // password sudah ok
          $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
          $email = $this->input->post('email');

          $this->db->set('password', $password_hash);
          $this->db->where('email', $this->session->userdata('email'));
          $this->db->update('user');

          $this->session->set_flashdata('berhasil', 'Diupdate');
          redirect('user/setting');
        }
      }
    }
  }
} //END CLASS