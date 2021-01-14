<!-- content @s -->
<div class="nk-content nk-content-fluid">
  <div class="container-xl wide-xl">
    <div class="nk-content-inner">
      <div class="nk-content-body">

        <div class="nk-block nk-block-lg">
          <div class="nk-block-head pb-1">
            <div class="nk-block-head-content mb-1">
              <h4 class="nk-block-title"><?= $title; ?></h4>
              <?php
              $date1 = date_create($this->session->flashdata('tglawal'));
              $date2 = date_create($this->session->flashdata('tglakhir'));
              ?>
              <p>Untuk tanggal: <?= date_format($date1, "d-m-Y") ?> / <?= date_format($date2, "d-m-Y") ?>.</p>
            </div>
            <form class="form-inline" action="<?= base_url('laporan/search') ?>" method="post">

              <div class="form-group mb-2">
                <input class="form-control" type="date" id="tanggal_awal"
                  value="<?= $this->session->flashdata('tglawal') ?>" name="tanggal_awal">
              </div>
              <div class="form-group mx-sm-3 mb-2">
                <input class="form-control" type="date" id="tanggal_akhir"
                  value="<?= $this->session->flashdata('tglakhir') ?>" name="tanggal_akhir">
              </div>
              <button type="submit" class="btn btn-primary mb-2">Search</button>

            </form>

            <a href="<?= base_url('laporan/cetak?p=') ?>excel&tglawal=<?= $this->session->flashdata('tglawal') ?>&tglakhir=<?= $this->session->flashdata('tglakhir') ?>"
              class=" btn btn-success mb-3"><i class="fas fa-file-excel"></i> Download Excel</a>
            <a href="<?= base_url('laporan/index'); ?>" class=" btn btn-info mb-3"><i class="fas fa-file-excel"></i>
              Kembali ke Index</a>

          </div>

          <!-- if empty -->
          <?php if (empty($jurnal)) : ?>
          <div class="example-alert">
            <div class="alert alert-fill alert-danger alert-icon mb-2"><em class="icon ni ni-alert-circle"></em>
              <strong>Data Tidak Ditemukan</strong>
            </div>
          </div>
          <?php endif; ?>

          <div class="card card-bordered card-preview">
            <table class="table table-tranx is-compact">
              <thead>
                <tr class="tb-tnx-head">
                  <th class="tb-tnx-id"><span class="">#</span></th>
                  <th class="tb-tnx-info">
                    <span class="tb-tnx-desc d-none d-sm-inline-block">
                      <span>Keterangan</span>
                    </span>
                    <span class="tb-tnx-date d-md-inline-block d-none">
                      <span class="d-md-none">Date</span>
                      <span class="d-none d-md-block">
                        <span>Tanggal</span>
                        <span>Nomor Bukti</span>
                      </span>
                    </span>
                  </th>
                  <th class="tb-tnx-amount">
                    <span class="tb-tnx-total">Debit</span>
                    <span class="tb-tnx-status d-none d-md-inline-block">Kredit</span>
                  </th>
                  <th class="tb-tnx-head">
                    <span class="tb-tnx-desc d-none d-sm-inline-block">Saldo Saat Ini</span>
                  </th>
              </thead>
              <tbody>

                <?php
                $_saldo = 0;
                foreach ($saldo_awal as $s) :
                  if ($s['debit'] == 0) {
                    $nominal = $s['kredit'];
                    $_saldo = $_saldo - $nominal;
                  } else {
                    $nominal = $s['debit'];
                    $_saldo = $_saldo + $nominal;
                  }
                ?>
                <tr class="tb-tnx-item">
                  <td class="tb-tnx-id">
                    <a href="#"><span>-</span></a>
                  </td>
                  <td class="tb-tnx-info">
                    <div class="tb-tnx-desc">
                      <span class="title">Saldo Kas Terakhir</span>
                    </div>
                    <div class="tb-tnx-date">
                      <span class="date">-</span>
                      <span class="date">-</span>
                    </div>
                  </td>
                  <td class="tb-tnx-amount">
                    <div class="tb-tnx-total">
                      <span class="amount">-</span>
                    </div>
                    <div class="tb-tnx-status">
                      <span class="amount"><strong>-</strong></span>
                    </div>
                  </td>
                  <td>
                    <div class="tb-tnx-info">
                      <span class="title"><strong>Rp <?= number_format($_saldo, 0, ',', '.') ?></strong></span>
                    </div>
                  </td>
                </tr>
                <?php endforeach; ?>


                <?php
                if ($_saldo != 0) {
                  $saldo = $_saldo;
                } else {
                  $saldo = 0;
                }
                $i = 1;
                foreach ($jurnal as $d) :

                  $date = date_create($d['tgl_transaksi']);

                  if ($d['debit'] == 0) {
                    $nominal = $d['kredit'];

                    $saldo = $saldo - $nominal;
                  } else {
                    $nominal = $d['debit'];
                    $saldo = $saldo + $nominal;
                  }
                ?>
                <tr class="tb-tnx-item">
                  <td class="tb-tnx-id">
                    <a href="#"><span><?= $i++; ?></span></a>
                  </td>
                  <td class="tb-tnx-info">
                    <div class="tb-tnx-desc">
                      <span class="title"><?= $d['keterangan'] ?></span>
                    </div>
                    <div class="tb-tnx-date">
                      <span class="date"><?= date_format($date, "d F Y") ?></span>
                      <span class="date"><?= $d['id_transaksi'] ?></span>
                    </div>
                  </td>
                  <td class="tb-tnx-amount">
                    <div class="tb-tnx-total">
                      <span class="amount"><?= number_format($d['debit'], 0, ',', '.') ?></span>
                    </div>
                    <div class="tb-tnx-status">
                      <span class="amount"><strong><?= number_format($d['kredit'], 0, ',', '.') ?></strong></span>
                    </div>
                  </td>
                  <td>
                    <div class="tb-tnx-info">
                      <span class="title"><strong>Rp <?= number_format($saldo, 0, ',', '.') ?></strong></span>
                    </div>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div><!-- .card-preview -->
        </div><!-- nk-block -->


      </div>
    </div>
  </div>
</div>
<!-- content @e -->