      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Role</h1>
          </div>

          <div class="section-body">
            <h2 class="section-title"><?= $title; ?></h2>
            <p class="section-lead" style="margin-bottom: 0.5rem;">Laman untuk me-manage role.</p>
            <a href="#" class="section-lead btn btn-primary mb-4" data-toggle="modal" data-target="#modalForm">Add New
              Role</a>

            <!-- if empty -->
            <?php if (empty($role)) : ?>
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
                    <h4>Role Management</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped tables-1">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Role</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $no = 1;
                          foreach ($role as $r) :
                          ?>
                          <tr>
                            <td>
                              <?= $no++; ?>
                            </td>
                            <td><?= $r['role']; ?></td>
                            <td>
                              <a href="<?= base_url('admin/roleaccess/') . $r['id']; ?>"
                                class="btn btn-success">Access</a>
                              <a class="btn btn-warning text-light" data-toggle="modal"
                                data-target="#editForm<?= $r['id']; ?>">
                                <span>Edit</span>
                              </a>
                              <a class="btn btn-danger del-btn" href="<?= base_url('admin/hapusrole/') . $r['id']; ?>">
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
              <h5 class="modal-title">Add New Role</h5>
              <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                <em class="fas fa-times"></em>
              </a>
            </div>
            <div class="berhasil" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>"></div>
            <div class="modal-body" style="padding-bottom: 0px;">
              <form action="<?= base_url('admin/role') ?>" class="form-validate is-alter" method="post">
                <div class="form-group">
                  <label class="form-label" for="role">Role Name</label>
                  <div class="form-control-wrap">
                    <input type="text" class="form-control" id="role" name="role" required>
                    <?= form_error('role', '<div class="text-danger"><small>', '</small></div>'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-lg btn-primary">Add Role</button>
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

      <!-- Modal Form -->
      <div class="modal fade" tabindex="-1" id="editForm<?= $r['id']; ?>">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit Role</h5>
              <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                <em class="fas fa-times"></em>
              </a>
            </div>
            <div class="berhasil" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>"></div>
            <div class="modal-body" style="padding-bottom: 0px;">
              <form action="<?= base_url('admin/editRole/' . $r['id']); ?>" class="form-validate is-alter"
                method="post">
                <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
                <div class="form-group">
                  <label class="form-label" for="role">Role Name</label>
                  <div class="form-control-wrap">
                    <input type="text" class="form-control" id="role" name="role" value="<?= $r['role']; ?>" required>
                    <?= form_error('role', '<div class="text-danger"><small>', '</small></div>'); ?>
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