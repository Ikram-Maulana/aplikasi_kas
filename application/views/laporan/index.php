<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Laporan</h1>
    </div>

    <div class="section-body">
      <h2 class="section-title"><?= $title; ?></h2>
      <p class="section-lead" style="margin-bottom: 0.5rem;">Laman untuk me-manage laporan rekapitulasi.</p>

      <div class="col-12 col-sm-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4>Laporan Rekapitulasi Sort By</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-12 col-sm-12 col-md-4">
                <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="home-tab4" data-toggle="tab" href="#home4" role="tab"
                      aria-controls="home" aria-selected="true">Tanggal</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#profile4" role="tab"
                      aria-controls="profile" aria-selected="false">Bulan</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="contact-tab4" data-toggle="tab" href="#contact4" role="tab"
                      aria-controls="contact" aria-selected="false">Tahun</a>
                  </li>
                </ul>
              </div>
              <div class="col-12 col-sm-12 col-md-8">
                <div class="tab-content no-padding" id="myTab2Content">
                  <div class="tab-pane fade show active" id="home4" role="tabpanel" aria-labelledby="home-tab4">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                  </div>
                  <div class="tab-pane fade" id="profile4" role="tabpanel" aria-labelledby="profile-tab4">
                    Sed sed metus vel lacus hendrerit tempus. Sed efficitur velit tortor, ac efficitur est lobortis
                    quis. Nullam lacinia metus erat, sed fermentum justo rutrum ultrices. Proin quis iaculis tellus.
                    Etiam ac vehicula eros, pharetra consectetur dui. Aliquam convallis neque eget tellus efficitur,
                    eget maximus massa imperdiet. Morbi a mattis velit. Donec hendrerit venenatis justo, eget
                    scelerisque tellus pharetra a.
                  </div>
                  <div class="tab-pane fade" id="contact4" role="tabpanel" aria-labelledby="contact-tab4">
                    Vestibulum imperdiet odio sed neque ultricies, ut dapibus mi maximus. Proin ligula massa, gravida in
                    lacinia efficitur, hendrerit eget mauris. Pellentesque fermentum, sem interdum molestie finibus,
                    nulla diam varius leo, nec varius lectus elit id dolor. Nam malesuada orci non ornare vulputate. Ut
                    ut sollicitudin magna. Vestibulum eget ligula ut ipsum venenatis ultrices. Proin bibendum bibendum
                    augue ut luctus.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      Form Filter By Tanggal
      <br><br><br>

      <form action="<?= base_url('laporan/filter') ?>" method="POST" target="_blank">

        <input type="hidden" name="nilaifilter" value="1">

        Tanggal Awal <br>
        <input type="date" name="tanggalawal" required=""><br>

        Tanggal Akhir <br>
        <input type="date" name="tanggalakhir" required=""><br>

        <br><input type="submit" value="Print">

      </form>

      <br><br><br>
      Form Filter By Bulan
      <br><br><br>

      <form action="<?= base_url('laporan/filter') ?>" method="POST" target="_blank">

        <input type="hidden" name="nilaifilter" value="2">

        Pilih Tahun <br>
        <select name="tahun1" required="">
          <?php foreach ($tahun as $t) : ?>
          <option value="<?= $t->tahun ?>"><?= $t->tahun ?></option>
          <?php endforeach; ?>
        </select>

        Bulan Awal <br>
        <select name="bulanawal" required="">
          <option value="1">Januari</option>
          <option value="2">Februari</option>
          <option value="3">Maret</option>
          <option value="4">April</option>
          <option value="5">Mei</option>
          <option value="6">Juni</option>
          <option value="7">Juli</option>
          <option value="8">Agustus</option>
          <option value="9">September</option>
          <option value="10">Oktober</option>
          <option value="11">November</option>
          <option value="12">Desember</option>
        </select><br>

        Bulan Akhir <br>
        <select name="bulanakhir" required="">
          <option value="1">Januari</option>
          <option value="2">Februari</option>
          <option value="3">Maret</option>
          <option value="4">April</option>
          <option value="5">Mei</option>
          <option value="6">Juni</option>
          <option value="7">Juli</option>
          <option value="8">Agustus</option>
          <option value="9">September</option>
          <option value="10">Oktober</option>
          <option value="11">November</option>
          <option value="12">Desember</option>
        </select><br>

        <br><input type="submit" value="Print">

      </form>

      <br><br><br>
      Form Filter By Tahun
      <br><br><br>

      <form action="<?= base_url('laporan/filter') ?>" method="POST" target="_blank">

        <input type="hidden" name="nilaifilter" value="3">

        Pilih Tahun <br>
        <select name="tahun2" required="">
          <?php foreach ($tahun as $t) : ?>
          <option value="<?= $t->tahun ?>"><?= $t->tahun ?></option>
          <?php endforeach; ?>
        </select>

        <br><br><input type="submit" value="Print">

      </form>

    </div>
  </section>
</div>

<!-- content @s -->
<div class="nk-content nk-content-fluid">
  <div class="container-xl wide-xl">
    <div class="nk-content-inner">
      <div class="nk-content-body">

        <div class="nk-block nk-block-lg">
          <div class="nk-block-head pb-1">
            <div class="nk-block-head-content mb-1">
              <h4 class="nk-block-title"><?= $title; ?></h4>
              <p>Laman untuk me-manage laporan rekapitulasi.</p>
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
                $i = 1;
                $saldo = 0;
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