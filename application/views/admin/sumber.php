      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Sumber</h1>
          </div>

          <div class="section-body">
            <h2 class="section-title"><?= $title; ?></h2>
            <p class="section-lead" style="margin-bottom: 0.5rem;">Laman untuk me-manage sumber dana.</p>
            <a href="#" class="section-lead btn btn-primary mb-4" data-toggle="modal" data-target="#modalForm">Add New
              Sumber Dana</a>

            <!-- if empty -->
            <?php if (empty($sumber)) : ?>
            <div class="example-alert">
              <div class="alert alert-fill alert-danger alert-icon mb-2"><em
                  class="fas fa-exclamation-circle mr-2"></em>
                <strong>Data Tidak Ditemukan</strong>
              </div>
            </div>
            <?php endif; ?>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Sumber Dana Management</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped tables-1">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Sumber</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $no = 1;
                          foreach ($sumber as $s) :
                          ?>
                          <tr>
                            <td>
                              <?= $no++; ?>
                            </td>
                            <td><?= $s['sumber']; ?></td>
                            <td>
                              <a class="btn btn-warning text-light" data-toggle="modal"
                                data-target="#editForm<?= $s['id']; ?>">
                                <span>Edit</span>
                              </a>
                              <a class="btn btn-danger del-btn" href="<?= base_url('admin/hapussum/') . $s['id']; ?>">
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
              <h5 class="modal-title">Add New Sumber Dana</h5>
              <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                <em class="fas fa-times"></em>
              </a>
            </div>
            <div class="berhasil" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>"></div>
            <div class="modal-body" style="padding-bottom: 0px;">
              <form action="<?= base_url('admin/sumberdana') ?>" class="form-validate is-alter" method="post">
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

      <!-- Modal Edit -->
      <?php
      $no = 1;
      foreach ($sumber as $s) :
      ?>
      <div class="modal fade" tabindex="-1" id="editForm<?= $s['id']; ?>">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit Sumber</h5>
              <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                <em class="fas fa-times"></em>
              </a>
            </div>
            <div class="berhasil" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>">
            </div>
            <div class="modal-body" style="padding-bottom: 0px;">
              <form action="<?= base_url('admin/editsum/' . $s['id']); ?>" class="form-validate is-alter" method="post">
                <input type="hidden" name="id" value="<?php echo $s['id']; ?>">
                <div class="form-group">
                  <label class="form-label" for="sumber">Sumber</label>
                  <div class="form-control-wrap">
                    <input type="text" class="form-control" id="sumber" name="sumber" value="<?= $s['sumber'] ?>"
                      required>
                    <?= form_error('sumber', '<div class="text-danger"><small>', '</small></div>'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-lg btn-primary">Edit</button>
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
      <?php endforeach; ?>
      <!-- End Modal edit -->