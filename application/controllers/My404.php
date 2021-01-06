<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class My404 extends CI_Controller {
public function __construct()
{
parent::__construct();
}

public function index() 
{
  $data['title'] = '404';
  $this->output->set_status_header('404');
  $this->load->view('template/header', $data);
  $this->load->view('404/err404');
  $this->load->view('template/footer');
}

} //END CLASS