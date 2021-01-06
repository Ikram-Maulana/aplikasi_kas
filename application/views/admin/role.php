      <!-- content @s -->
      <div class="nk-content nk-content-fluid">
        <div class="container-xl wide-lg">
          <div class="nk-content-body">

            <div class="nk-block nk-block-lg">
              <div class="nk-block-head">
                <div class="nk-block-head-content">
                  <h4 class="nk-block-title"><?= $title; ?></h4>
                  <p>Laman untuk me-manage role.</p>
                </div>
                <a href="#" class="btn btn-primary mt-2" data-toggle="modal" data-target="#modalForm">Add New Role</a>
              </div>

              <!-- if empty -->
              <?php if (empty($role)) : ?>
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
                          <span>Role</span>
                        </span>
                      </th>
                      <th class="tb-tnx-action">
                        <span>Action</span>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($role as $r) :
                    ?>
                    <tr class="tb-tnx-item">
                      <td class="tb-tnx-id">
                        <a href="#"><span><?= $no++; ?></span></a>
                      </td>
                      <td class="tb-tnx-info">
                        <div class="tb-tnx-total">
                          <span class="amount"><?= $r['role']; ?></span>
                        </div>
                      </td>
                      <td class="tb-odr-action">
                        <div class="tb-odr-btns d-none d-md-inline">
                          <a href="<?= base_url('admin/roleaccess/') . $r['id']; ?>"
                            class="btn btn-sm btn-warning">Access</a>
                        </div>
                        <div class="dropdown">
                          <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"
                            data-offset="-8,0"><em class="icon ni ni-more-h"></em></a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                            <ul class="link-list-plain">
                              <li><a href="<?= base_url('admin/roleaccess/') . $r['id']; ?>"
                                  class="text-warning">Access</a></li>
                              <li><a data-toggle="modal" data-target="#editForm<?= $r['id']; ?>">
                                  <span>Edit</span>
                                </a>
                              </li>
                              <li><a href="<?= base_url('admin/hapusrole/') . $r['id']; ?>" class="dbtn">
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
            </div><!-- nk-block -->

          </div>
        </div>
      </div>
      <!-- content @e -->

      <!-- Modal Form -->
      <div class="modal fade" tabindex="-1" id="modalForm">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Add New Role</h5>
              <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
              </a>
            </div>
            <div class="berhasil" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>"></div>
            <div class="modal-body">
              <form action="<?= base_url('admin/role') ?>" class="form-validate is-alter" method="post">
                <div class="form-group">
                  <label class="form-label" for="role">Role Name</label>
                  <div class="form-control-wrap">
                    <input type="text" class="form-control" id="role" name="role" required>
                    <?= form_error('role', '<span id="fva-message-error" class="invalid">', '</span>'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-lg btn-primary">Add Role</button>
                </div>
              </form>
            </div>
            <div class="modal-footer bg-light">
              <span class="sub-text">© 2020 Ikram Maulana.</span>
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
                <em class="icon ni ni-cross"></em>
              </a>
            </div>
            <div class="berhasil" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>"></div>
            <div class="modal-body">
              <form action="<?= base_url('admin/editRole/' . $r['id']); ?>" class="form-validate is-alter"
                method="post">
                <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
                <div class="form-group">
                  <label class="form-label" for="role">Role Name</label>
                  <div class="form-control-wrap">
                    <input type="text" class="form-control" id="role" name="role" value="<?= $r['role']; ?>" required>
                    <?= form_error('role', '<span id="fva-message-error" class="invalid">', '</span>'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-lg btn-primary">Edit</button>
                </div>
              </form>
            </div>
            <div class="modal-footer bg-light">
              <span class="sub-text">© 2020 Ikram Maulana.</span>
            </div>
          </div>
        </div>
      </div>