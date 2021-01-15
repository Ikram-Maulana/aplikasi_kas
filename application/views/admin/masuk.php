      <!-- content @s -->
      <div class="nk-content nk-content-fluid">
        <div class="container-xl wide-lg">
          <div class="nk-content-body">

            <div class="nk-block nk-block-lg">
              <div class="nk-block-head">
                <div class="nk-block-head-content danmas">
                  <h4 class="nk-block-title"><?= $title; ?></h4>
                  <p>Laman untuk me-manage dana masuk.</p>
                </div>
                <div class="card border-left-primary shadow h-100 py-2 mb-1 mt-1 col-md-4">
                  <div class="card-body kas">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold mb-1">Total Dana Masuk</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp
                          <?= number_format($total_kas['nominal']); ?></div>
                      </div>
                    </div>
                  </div>
                </div>
                <a href="#" class="btn btn-primary mt-2 mb-2" data-toggle="modal" data-target="#modalForm">Add Dana
                  Masuk
                </a>
              </div>
            </div>

            <!-- if empty -->
            <?php if (empty($kasmasuk)) : ?>
            <div class="example-alert">
              <div class="alert alert-fill alert-danger alert-icon mb-2"><em class="icon ni ni-alert-circle"></em>
                <strong>Data Tidak Ditemukan</strong>
              </div>
            </div>
            <?php endif; ?>

            <div class="card card-bordered card-preview">
              <table class="table table-tranx">
                <thead>
                  <tr class="tb-tnx-head">
                    <th class="tb-tnx-id"><span class="">#</span></th>
                    <th class="tb-tnx-info">
                      <span class="tb-tnx-desc d-none d-sm-inline-block">
                        <span>Sumber Dana Masuk</span>
                      </span>
                      <span class="tb-tnx-date d-md-inline-block d-none">
                        <span class="d-md-none">Date</span>
                        <span class="d-none d-md-block">
                          <span>Tanggal Transaksi</span>
                        </span>
                      </span>
                    </th>
                    <th class="tb-tnx-amount is-alt">
                      <span class="tb-tnx-total">Nominal</span>
                    </th>
                    <th class="tb-tnx-action">
                      <span>Action</span>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($kasmasuk as $k) :
                    $date = date_create($k['date_trx']);
                  ?>
                  <tr class="tb-tnx-item">
                    <td class="tb-tnx-id">
                      <a href="#"><span><?= ++$start; ?></span></a>
                    </td>
                    <td class="tb-tnx-info">
                      <div class="tb-tnx-desc">
                        <span class="title"><?= $k['nama_transaksi']; ?></span>
                      </div>
                      <div class="tb-tnx-date">
                        <span class="date"><?= date_format($date, "d F Y") ?></span>
                      </div>
                    </td>
                    <td class="tb-tnx-amount is-alt">
                      <div class="tb-tnx-total">
                        <span class="amount">Rp <?= number_format($k['nominal'], 0, ',', '.') ?></span>
                      </div>
                    </td>
                    <td class="tb-tnx-action">
                      <div class="dropdown">
                        <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em
                            class="icon ni ni-more-h"></em></a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                          <ul class="link-list-plain">
                            <li><a href="<?= base_url('admin/hapusdanam?id=') . $k['id_transaksi']; ?>" class="dbtn">
                                <span>Delete</span>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div><!-- .card-preview -->
            <?= $this->pagination->create_links(); ?>
          </div>
        </div>
      </div>
      <!-- content @e -->

      <!-- Modal Form -->
      <div class="modal fade" tabindex="-1" id="modalForm">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Add Dana Masuk</h5>
              <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
              </a>
            </div>
            <div class="berhasil" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>"></div>
            <div class="modal-body">
              <form action="<?= base_url('admin/danamasuk') ?>" class="form-validate is-alter" method="post">
                <div class="form-group">
                  <label class="form-label" for="sumber">Sumber</label>
                  <div class="form-control-wrap">
                    <select class="form-select form-control form-control-lg" id="sumber" name="sumber">
                      <option value=" ">Default Option</option>
                      <?php foreach ($sumber as $s) : ?>
                      <option value="<?= $s['id'] ?>"><?= $s['sumber'] ?></option>
                      <?php endforeach; ?>
                    </select>
                    <?= form_error('sumber', '<span id="fva-message-error" class="invalid">', '</span>'); ?>
                  </div>
                </div>
                <label class="form-label">Tanggal</label>
                <div class="form-control-wrap focused">
                  <input type="date" class="form-control" id="tanggal" placeholder="Enter date" name="tanggal"
                    value="<?= set_value('tanggal'); ?>">
                  <?= form_error('tanggal', '<small class="invalid">', '</small>'); ?>
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
                  <?= form_error('nominal', '<span id="fva-message-error" class="invalid">', '</span>'); ?>
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
              <span class="sub-text">© 2020 Ikram Maulana.</span>
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
                <em class="icon ni ni-cross"></em>
              </a>
            </div>
            <div class="berhasil" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>"></div>
            <div class="modal-body">
              <form action="<?= base_url('admin/addSumber') ?>" class="form-validate is-alter" method="post">
                <div class="form-group">
                  <label class="form-label" for="sumber">Sumber</label>
                  <div class="form-control-wrap">
                    <input type="text" class="form-control" id="sumber" name="sumber" required>
                    <?= form_error('sumber', '<span id="fva-message-error" class="invalid">', '</span>'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-lg btn-primary">Add</button>
                </div>
              </form>
            </div>
            <div class="modal-footer bg-light">
              <span class="sub-text">© 2020 Ikram Maulana.</span>
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