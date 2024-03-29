      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Dana</h1>
          </div>

          <div class="section-body">
            <h2 class="section-title"><?= $title; ?></h2>
            <p class="section-lead" style="margin-bottom: 0.5rem;">Laman untuk me-manage dana masuk.</p>
            <div class="row">
              <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1 mb-3">
                  <div class="card-icon bg-primary">
                    <i class="fas fa-donate"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Total Dana Masuk</h4>
                    </div>
                    <div class="card-body">
                      Rp
                      <?= number_format($total_kas['nominal']); ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <a href="#" class="btn btn-primary mb-4" data-toggle="modal" data-target="#modalForm">Add
              Dana
              Masuk</a>

            <!-- if empty -->
            <?php if (empty($kasmasuk)) : ?>
            <div class="example-alert">
              <div class="alert alert-fill alert-danger alert-icon mb-2"><em
                  class="fas fa-exclamation-circle mr-2"></em>
                <strong>Data Tidak Ditemukan</strong>
              </div>
            </div>
            <?php endif; ?>

            <div class="row">
              <div class="col-12">
                <div class="card card-primary">
                  <div class="card-header">
                    <h4>Dana Masuk Management</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped tables-1">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Sumber Dana Masuk</th>
                            <th>Tanggal Transaksi</th>
                            <th>Nominal</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $no = 1;
                          foreach ($kasmasuk as $k) :
                            $date = date_create($k['date_trx']);
                          ?>
                          <tr>
                            <td>
                              <?= $no++; ?>
                            </td>
                            <td><?= $k['nama_transaksi']; ?></td>
                            <td><?= date_format($date, "d F Y") ?></td>
                            <td>Rp <?= number_format($k['nominal'], 0, ',', '.') ?></td>
                            <td>
                              <a class="btn btn-danger del-btn"
                                href="<?= base_url('admin/hapusdanam?id=') . $k['id_transaksi']; ?>">
                                <span>Delete</span>
                              </a>
                            </td>
                          </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </section>
      </div>

      <!-- Modal Form -->
      <div class="modal fade" tabindex="-1" id="modalForm">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Add Dana Masuk</h5>
              <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                <em class="fas fa-times"></em>
              </a>
            </div>
            <div class="berhasil" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>"></div>
            <div class="modal-body" style="padding-bottom: 0px;">
              <form action="<?= base_url('admin/danamasuk') ?>" class="form-validate is-alter" method="post">
                <div class="form-group mb-2">
                  <label class="form-label" for="sumber">Sumber</label>
                  <div class="form-control-wrap">
                    <select class="form-select form-control form-control-lg" id="sumber" name="sumber">
                      <option value=" ">Default Option</option>
                      <?php foreach ($sumber as $s) : ?>
                      <option value="<?= $s['id'] ?>"><?= $s['sumber'] ?></option>
                      <?php endforeach; ?>
                    </select>
                    <?= form_error('sumber', '<div class="text-danger"><small>', '</small></div>'); ?>
                  </div>
                </div>
                <label class="form-label">Tanggal</label>
                <div class="form-control-wrap focused">
                  <input type="date" class="form-control" id="tanggal" placeholder="Enter date" name="tanggal"
                    value="<?= set_value('tanggal'); ?>">
                  <?= form_error('tanggal', '<div class="text-danger"><small>', '</small></div>'); ?>
                </div>
                <div class="form-note mb-1">Date format <code>mm/dd/yyyy</code></div>
                <div class="form-group">
                  <label class="form-label" for="nominal">Nominal</label>
                  <div class="form-control-wrap">
                    <div class="form-icon form-icon-left">
                      <em class="icon ni ni-sign-idr"></em>
                    </div>
                    <input type="text" class="form-control" id="nominal" name="nominal" placeholder="Nominal"
                      value="<?= set_value('nominal'); ?>" required>
                  </div>
                  <?= form_error('nominal', '<div class="text-danger"><small>', '</small></div>'); ?>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-lg btn-primary">Add</button>
                  <a href="#" class="btn btn-lg btn-warning" data-toggle="modal" data-target="#sumberForm">Add New
                    Sumber Dana
                  </a>
                </div>
              </form>
            </div>
            <div class="modal-footer bg-light">
              <span class="sub-text">Copyright © 2018
                Design By Muhamad Nauval Azhar </span>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal SUmber Form -->
      <div class="modal fade" tabindex="-1" id="sumberForm">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Add New Sumber Dana</h5>
              <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                <em class="fas fa-times"></em>
              </a>
            </div>
            <div class="berhasil" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>"></div>
            <div class="modal-body" style="padding-bottom: 0px;">
              <form action="<?= base_url('admin/addSumber') ?>" class="form-validate is-alter" method="post">
                <div class="form-group">
                  <label class="form-label" for="sumber">Sumber</label>
                  <div class="form-control-wrap">
                    <input type="text" class="form-control" id="sumber" name="sumber" required>
                    <?= form_error('sumber', '<div class="text-danger"><small>', '</small></div>'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-lg btn-primary">Add</button>
                </div>
              </form>
            </div>
            <div class="modal-footer bg-light">
              <span class="sub-text">Copyright © 2018
                Design By Muhamad Nauval Azhar </span>
            </div>
          </div>
        </div>
      </div>

      <script>
var rupiah = document.getElementById("nominal");
rupiah.addEventListener("keyup", function(e) {
  // tambahkan 'Rp.' pada saat form di ketik
  // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
  rupiah.value = formatRupiah(this.value, "Rp. ");
});

/* Fungsi formatRupiah */
function formatRupiah(angka, prefix) {
  var number_string = angka.replace(/[^,\d]/g, "").toString(),
    split = number_string.split(","),
    sisa = split[0].length % 3,
    rupiah = split[0].substr(0, sisa),
    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

  // tambahkan titik jika yang di input sudah menjadi angka ribuan
  if (ribuan) {
    separator = sisa ? "." : "";
    rupiah += separator + ribuan.join(".");
  }

  rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
  return prefix == undefined ? rupiah : rupiah ? rupiah : "";
}
      </script>