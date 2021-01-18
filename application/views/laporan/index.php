<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Laporan</h1>
    </div>

    <div class="section-body">
      <h2 class="section-title"><?= $title; ?></h2>
      <p class="section-lead" style="margin-bottom: 0.5rem;">Laman untuk me-manage laporan rekapitulasi.</p>

      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <div class="card-header">
              <h4>Filter By</h4>
            </div>
            <div class="card-body">
              <div class="wrapper">
                <div class="menu">
                  <label style="margin-bottom: 1rem;">Pilih filter laporan rekapitulasi berdasarkan : </label>
                  <select id="name" class="form-control">
                    <option value="tanggal">Tanggal</option>
                    <option value="bulan">Bulan</option>
                    <option value="tahun">Tahun</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              <h4>Form Filter</h4>
            </div>
            <div class="card-body" style="padding-top: 0px;">
              <div class="content">
                <div id="tanggal" class="data">
                  <form action="<?= base_url('laporan/filter') ?>" method="POST" target="_blank">
                    <div class="form-group">
                      <input type="hidden" name="nilaifilter" value="1">
                    </div>
                    <div class="form-group">
                      <label>Tanggal Awal</label>
                      <input class="form-control" type="date" name="tanggalawal" required="">
                    </div>
                    <div class="form-group">
                      <label>Tanggal Akhir</label>
                      <input class="form-control" type="date" name="tanggalakhir" required="">
                    </div>
                    <button type="submit" class="btn btn-warning btn-icon icon-left"><i
                        class="fas fa-file-excel mr-2"></i>Export
                      To
                      Excel</button>
                  </form>
                </div>
                <div id="bulan" class="data">
                  <form action="<?= base_url('laporan/filter') ?>" method="POST" target="_blank">
                    <div class="form-group">
                      <input type="hidden" name="nilaifilter" value="2">
                    </div>
                    <div class="form-group">
                      <label>Pilih Tahun</label>
                      <select class="form-control" name="tahun1" required="">
                        <?php foreach ($tahun as $t) : ?>
                        <option value="<?= $t->tahun ?>"><?= $t->tahun ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Bulan Awal</label>
                      <select class="form-control" name="bulanawal" required="">
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
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Bulan Akhir</label>
                      <select class="form-control" name="bulanakhir" required="">
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
                      </select>
                    </div>
                    <button type="submit" class="btn btn-warning btn-icon icon-left"><i
                        class="fas fa-file-excel mr-2"></i>Export
                      To
                      Excel</button>
                  </form>
                </div>
                <div id="tahun" class="data">
                  <form action="<?= base_url('laporan/filter') ?>" method="POST" target="_blank">
                    <div class="form-group">
                      <input type="hidden" name="nilaifilter" value="3">
                    </div>
                    <div class="form-group">
                      <label>Pilih Tahun</label>
                      <select class="form-control" name="tahun2" required="">
                        <?php foreach ($tahun as $t) : ?>
                        <option value="<?= $t->tahun ?>"><?= $t->tahun ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <button type="submit" class="btn btn-warning btn-icon icon-left"><i
                        class="fas fa-file-excel mr-2"></i>Export
                      To
                      Excel</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>