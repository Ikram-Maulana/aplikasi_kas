<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function getTahun()
  {
    $query = $this->db->query('SELECT YEAR(tgl_transaksi) AS tahun FROM tbl_kas GROUP BY YEAR(tgl_transaksi) ORDER BY YEAR(tgl_transaksi) ASC');
    return $query->result();
  }

  public function filterBytanggal($tanggalawal, $tanggalakhir)
  {
    $query = $this->db->query("SELECT a.id,a.id_transaksi,a.keterangan,a.tgl_transaksi,kredit,debit FROM jurnal a 
    LEFT JOIN jurnal_detail b on a.id = b.id_jurnal where date(tgl_transaksi) between '$tanggalawal' and '$tanggalakhir' ORDER BY a.tgl_transaksi ASC ");
    return $query->result();
  }

  public function filterBybulan($tahun1, $bulanawal, $bulanakhir)
  {
    $query = $this->db->query("SELECT a.id,a.id_transaksi,a.keterangan,a.tgl_transaksi,kredit,debit FROM jurnal a 
    LEFT JOIN jurnal_detail b on a.id = b.id_jurnal where YEAR(tgl_transaksi) = '$tahun1' and MONTH(tgl_transaksi) BETWEEN '$bulanawal' and '$bulanakhir' ORDER BY a.tgl_transaksi ASC ");
    return $query->result();
  }

  public function filterBytahun($tahun2)
  {
    $query = $this->db->query("SELECT a.id,a.id_transaksi,a.keterangan,a.tgl_transaksi,kredit,debit FROM jurnal a 
    LEFT JOIN jurnal_detail b on a.id = b.id_jurnal where YEAR(tgl_transaksi) = '$tahun2' ORDER BY a.tgl_transaksi ASC ");
    return $query->result();
  }
} //END CLASS