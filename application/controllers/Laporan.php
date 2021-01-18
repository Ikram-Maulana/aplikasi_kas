<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    cek_login();
    $this->load->library('form_validation');
    $this->load->model('Laporan_model', 'laporan');
  }

  public function index()
  {
    $data['title'] = 'Laporan Rekapitulasi';
    $data['user'] =  $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $data['tahun'] = $this->laporan->getTahun();

    // $data['jurnal'] = $this->db->query("SELECT a.id,a.id_transaksi,a.keterangan,a.tgl_transaksi,kredit,debit FROM jurnal a LEFT JOIN jurnal_detail b on a.id = b.id_jurnal order by a.tgl_transaksi asc")->result_array();

    // $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required');
    // $this->form_validation->set_rules('nominal', 'Nominal', 'required');

    // if ($this->form_validation->run() == false) {
    $this->load->view('template/header-dash', $data);
    $this->load->view('template/navbar', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('laporan/index', $data);
    $this->load->view('template/footer-dash', $data);
    // } else {
    //   redirect('laporan/index');
    // }
  }

  public function filter()
  {
    $data['user'] =  $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $tanggalawal = $this->input->post('tanggalawal');
    $tanggalakhir = $this->input->post('tanggalakhir');
    $tahun1 = $this->input->post('tahun1');
    $bulanawal = $this->input->post('bulanawal');
    $bulanakhir = $this->input->post('bulanakhir');
    $tahun2 = $this->input->post('tahun2');
    $nilaifilter = $this->input->post('nilaifilter');

    $saldo_awal = "SELECT a.id,a.id_transaksi,a.keterangan,a.tgl_transaksi,kredit,debit FROM jurnal a 
        LEFT JOIN jurnal_detail b on a.id = b.id_jurnal where date(tgl_transaksi) < '$tanggalawal' order by a.tgl_transaksi asc";

    if ($nilaifilter == 1) {
      $data['title'] = "Laporan Rekapitulasi By Tanggal";
      $data['subtitle'] = "Dari tanggal : " . date('d-M-y', strtotime($tanggalawal)) . " Sampai tanggal " . date('d-M-y', strtotime($tanggalakhir)) . ".";
      $data['filter'] = $this->laporan->filterBytanggal($tanggalawal, $tanggalakhir);
      $data['saldo_awal'] = $this->db->query($saldo_awal)->result_array();

      $this->load->view('laporan/print_laporan', $data);
    } elseif ($nilaifilter == 2) {
      $data['title'] = "Laporan Rekapitulasi By Bulan";
      $data['subtitle'] = "Dari bulan : " . $bulanawal . " Sampai bulan " . $bulanakhir . " Tahun : " . $tahun1 . ".";
      $data['filter'] = $this->laporan->filterBybulan($tahun1, $bulanawal, $bulanakhir);
      $data['saldo_awal'] = $this->db->query($saldo_awal)->result_array();

      $this->load->view('laporan/print_laporan', $data);
    } elseif ($nilaifilter == 3) {
      $data['title'] = "Laporan Rekapitulasi By Tahun";
      $data['subtitle'] = " Tahun : " . $tahun2 . ".";
      $data['filter'] = $this->laporan->filterBytahun($tahun2);
      $data['saldo_awal'] = $this->db->query($saldo_awal)->result_array();

      $this->load->view('laporan/print_laporan', $data);
    }
  }

  public function search()
  {
    $data['title'] = 'Laporan Rekapitulasi';
    $data['user'] =  $this->db->get_where('user', ['email' =>
    $this->session->userdata('email')])->row_array();

    $tgl_awal = $this->input->post('tanggal_awal');
    $tgl_akhir = $this->input->post('tanggal_akhir');

    $saldo_awal = "SELECT a.id,a.id_transaksi,a.keterangan,a.tgl_transaksi,kredit,debit FROM jurnal a 
        LEFT JOIN jurnal_detail b on a.id = b.id_jurnal where date(tgl_transaksi) < '$tgl_awal' order by a.tgl_transaksi asc";

    $query = "SELECT a.id,a.id_transaksi,a.keterangan,a.tgl_transaksi,kredit,debit FROM jurnal a 
        LEFT JOIN jurnal_detail b on a.id = b.id_jurnal where date(tgl_transaksi)  between '$tgl_awal' and '$tgl_akhir'  order by a.tgl_transaksi asc";

    $data['saldo_awal'] = $this->db->query($saldo_awal)->result_array();
    $data['jurnal'] = $this->db->query($query)->result_array();

    $this->session->set_flashdata('tglawal', $tgl_awal);
    $this->session->set_flashdata('tglakhir', $tgl_akhir);

    $this->load->view('template/header-dash', $data);
    $this->load->view('template/navbar', $data);
    $this->load->view('template/sidebar', $data);
    $this->load->view('laporan/search', $data);
    $this->load->view('template/footer-dash', $data);
  }
} //END CLASS