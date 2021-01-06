<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
  }

  public function index()
  {
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');
    if ($this->session->userdata('email')) {
      redirect('user');
    }

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Login Page';
      $this->load->view('template/header', $data);
      $this->load->view('auth/login');
      $this->load->view('template/footer');
    } else {
      // validasi sukses
      $this->_login();
    }
  }

  private function _login()
  {
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $user = $this->db->get_where('user', ['email' => $email])->row_array();

    // jika usernya ada
    if ($user) {
      // jika usernya aktif
      if ($user['is_active'] == 1) {
        // cek password
        if (password_verify($password, $user['password'])) {
          $data = [
            'email' => $user['email'],
            'role_id' => $user['role_id']
          ];
          $this->session->set_userdata($data);
          if ($user['role_id'] == 1) {
            redirect('admin/index');
          } else {
            redirect('user/index');
          }
        } else {
          $this->session->set_flashdata('message', '<div class="alert alert-icon alert-danger" role="alert" style="margin-bottom: 1rem;"><em class="icon ni ni-alert-circle"></em> <strong>Wrong password!</div>');
          redirect('auth');
        }
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-icon alert-danger" role="alert" style="margin-bottom: 1rem;"><em class="icon ni ni-alert-circle"></em> <strong>This email has not been activated!</div>');
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-icon alert-danger" role="alert" style="margin-bottom: 1rem;"><em class="icon ni ni-alert-circle"></em> <strong>Email is not registered!</div>');
      redirect('auth');
    }
  }

  public function register()
  {
    $this->form_validation->set_rules('name', 'Name', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
      'is_unique' => 'This email has already registered!'
    ]);
    $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
      'min_length' => 'Password too short!'
    ]);
    $this->form_validation->set_rules('phone', 'Phone', 'required|trim|numeric');
    $this->form_validation->set_rules('birthday', 'Birthday', 'required|trim');
    $this->form_validation->set_rules('address', 'Address', 'required|trim');
    if ($this->session->userdata('email')) {
      redirect('user');
    }

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Register Account';
      $this->load->view('template/header', $data);
      $this->load->view('auth/register');
      $this->load->view('template/footer');
    } else {
      $email = $this->input->post('email', true);
      $data = [
        'name' => htmlspecialchars($this->input->post('name', true)),
        'email' => htmlspecialchars($email),
        'image' => 'default.jpg',
        'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        'role_id' => 2,
        'is_active' => 0,
        'date_created' => time(),
        'phone' => $this->input->post('phone', true),
        'birthday' => $this->input->post('birthday', true),
        'address' => $this->input->post('address', true)
      ];

      // siapkan token
      $token = base64_encode(random_bytes(32));
      $user_token = [
        'email' => $email,
        'token' => $token,
        'date_created' => time()
      ];

      $this->db->insert('user', $data);
      $this->db->insert('user_token', $user_token);

      $this->_sendEmail($token, 'verify');

      $this->session->set_flashdata('message', '<div class="alert alert-icon alert-success" role="alert" style="margin-bottom: 1rem;"><em class="icon ni ni-alert-circle"></em> <strong>Congratulation! your account has been created. Please activate your account</div>');
      redirect('auth');
    }
  }

  private function _sendEmail($token, $type)
  {
    $config = [
      'protocol' => 'smtp',
      'smtp_host' => 'ssl://smtp.googlemail.com',
      'smtp_user' => 'upmummi74@gmail.com',
      'smtp_pass' => 'Upmummi_01',
      'smtp_port' => 465,
      'mailtype' => 'html',
      'charset' => 'utf-8',
      'newline' => "\r\n"
    ];

    $this->load->library('email');
    $this->email->initialize($config);

    $this->email->from('upmummi74@gmail.com', 'UPM UMMI');
    $this->email->to($this->input->post('email'));

    if ($type == 'verify') {
      $this->email->subject('Account Verification');
      $template_data = [
        'verificationLink' => base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token)
      ];

      $body = $this->load->view('email/upmummi', $template_data, TRUE); //Set the variable in template Properly
      $this->email->message($body);
    } else if ($type == 'forgot') {
      $this->email->subject('Reset Password');
      $template_data = [
        'resetLink' => base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token)
      ];

      $body = $this->load->view('email/reset', $template_data, TRUE); //Set the variable in template Properly
      $this->email->message($body);
    }

    if ($this->email->send()) {
      return true;
    } else {
      echo $this->email->print_debugger();
      die;
    }
  }

  public function verify()
  {
    $email = $this->input->get('email');
    $token = $this->input->get('token');

    $user = $this->db->get_where('user', ['email' => $email])->row_array();

    if ($user) {
      $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

      if ($user_token) {
        if (time() - $user_token['date_created'] < (60 * 15)) {
          $this->db->set('is_active', 1);
          $this->db->where('email', $email);
          $this->db->update('user');

          $this->db->delete('user_token', ['email' => $email]);

          $this->session->set_flashdata('message', '<div class="alert alert-icon alert-success" role="alert" style="margin-bottom: 1rem;"><em class="icon ni ni-alert-circle"></em> <strong>Congratulation! your ' . $email . ' has been activated! Please login.</div>');
          redirect('auth');
        } else {
          $this->db->delete('user', ['email' => $email]);
          $this->db->delete('user_token', ['email' => $email]);

          $this->session->set_flashdata('message', '<div class="alert alert-icon alert-danger" role="alert" style="margin-bottom: 1rem;"><em class="icon ni ni-alert-circle"></em> <strong>Account activation failed! Token expired.</div>');
          redirect('auth');
        }
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-icon alert-danger" role="alert" style="margin-bottom: 1rem;"><em class="icon ni ni-alert-circle"></em> <strong>Account activation failed! Wrong token.</div>');
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-icon alert-danger" role="alert" style="margin-bottom: 1rem;"><em class="icon ni ni-alert-circle"></em> <strong>Account activation failed! Wrong email.</div>');
      redirect('auth');
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('role_id');
    $this->session->set_flashdata('message', '<div class="alert alert-icon alert-success" role="alert" style="margin-bottom: 1rem;"><em class="icon ni ni-alert-circle"></em> <strong>You have been logged out!</div>');
    redirect('auth');
  }

  public function blocked()
  {
    $data['title'] = '403';
    $this->output->set_status_header('403');
    $this->load->view('template/header', $data);
    $this->load->view('auth/blocked');
    $this->load->view('template/footer');
  }

  public function forgotPassword()
  {
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Forgot Password';
      $this->load->view('template/header', $data);
      $this->load->view('auth/forgot-password');
      $this->load->view('template/footer');
    } else {
      $email = $this->input->post('email');
      $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

      if ($user) {
        $token = base64_encode(random_bytes(32));
        $user_token = [
          'email' => $email,
          'token' => $token,
          'date_created' => time()
        ];

        $this->db->insert('user_token', $user_token);
        $this->_sendEmail($token, 'forgot');

        $this->session->set_flashdata('message', '<div class="alert alert-icon alert-success" role="alert" style="margin-bottom: 1rem;"><em class="icon ni ni-alert-circle"></em> <strong>Please check your email to reset your password!</div>');
        redirect('auth/forgotpassword');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-icon alert-danger" role="alert" style="margin-bottom: 1rem;"><em class="icon ni ni-alert-circle"></em> <strong>Email is not registered or activated!</div>');
        redirect('auth/forgotpassword');
      }
    }
  }

  public function resetPassword()
  {
    $email = $this->input->get('email');
    $token = $this->input->get('token');

    $user = $this->db->get_where('user', ['email' => $email])->row_array();

    if ($user) {
      $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

      if ($user_token) {
        if (time() - $user_token['date_created'] < (60 * 15)) {
          $this->db->set('is_active', 1);
          $this->db->where('email', $email);
          $this->db->update('user');

          $this->db->delete('user_token', ['email' => $email]);

          $this->session->set_userdata('reset_email', $email);
          $this->changePassword();
        } else {
          $this->db->delete('user', ['email' => $email]);
          $this->db->delete('user_token', ['email' => $email]);

          $this->session->set_flashdata('message', '<div class="alert alert-icon alert-danger" role="alert" style="margin-bottom: 1rem;"><em class="icon ni ni-alert-circle"></em> <strong>Reset Password failed! Token expired.</div>');
          redirect('auth/index');
        }
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-icon alert-danger" role="alert" style="margin-bottom: 1rem;"><em class="icon ni ni-alert-circle"></em> <strong>Reset password failed! Wrong token.</div>');
        redirect('auth/index');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-icon alert-danger" role="alert" style="margin-bottom: 1rem;"><em class="icon ni ni-alert-circle"></em> <strong>Reset password failed! Wrong email.</div>');
      redirect('auth/index');
    }
  }

  public function changePassword()
  {
    if (!$this->session->userdata('reset_email')) {
      redirect('auth/index');
    }

    $this->form_validation->set_rules('password1', 'Password1', 'trim|required|min_length[3]|matches[password2]');
    $this->form_validation->set_rules('password2', 'Password2', 'trim|required|min_length[3]|matches[password1]');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Change Password';
      $this->load->view('template/header', $data);
      $this->load->view('auth/change-password');
      $this->load->view('template/footer');
    } else {
      $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
      $email = $this->session->userdata('reset_email');

      $this->db->set('password', $password);
      $this->db->where('email', $email);
      $this->db->update('user');

      $this->session->unset_userdata('reset_email');

      $this->session->set_flashdata('message', '<div class="alert alert-icon alert-success" role="alert" style="margin-bottom: 1rem;"><em class="icon ni ni-alert-circle"></em> <strong>Password has been changed! Please login.</div>');
      redirect('auth/index');
    }
  }
} //END CLASS LOGIN