      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Account</h1>
          </div>

          <div class="section-body">
            <h2 class="section-title"><?= $title; ?></h2>
            <p class="section-lead" style="margin-bottom: 0.5rem;">Laman untuk me-manage akun.</p>

            <div class="berhasil" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>"></div>
            <!-- if empty -->
            <?php if (empty($akun)) : ?>
            <div class="example-alert">
              <div class="alert alert-fill alert-danger alert-icon mt-2"><em class="icon ni ni-alert-circle"></em>
                <strong>Data Tidak Ditemukan</strong>
              </div>
            </div>
            <?php endif; ?>

            <div class="row">
              <div class="col-12">
                <div class="card card-primary">
                  <div class="card-header">
                    <h4>Account Management</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped tables-1">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>User</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $no = 1;
                          foreach ($akun as $usr) :
                          ?>
                          <tr>
                            <td>
                              <?= $no++; ?>
                            </td>
                            <td><?= $usr['name']; ?></td>
                            <td><?php
                                  if (strlen($usr['email']) > 17) {
                                    $email = substr($usr['email'], 0, 17);
                                    echo $email . " ...";
                                  } else {
                                    echo $usr['email'];
                                  } ?></td>
                            <td><?= $usr['role']; ?></td>
                            <td>
                              <?php if ($usr['is_active'] == 1) : ?>
                              <span class="tb-status text-success"><?= "Active"; ?></span>
                              <?php else : ?>
                              <span class="tb-status text-danger"><?= "Non-Active"; ?></span>
                              <?php endif; ?>
                            </td>
                            <td>
                              <a class="btn btn-success text-white mb-2" data-toggle="modal"
                                data-target="#viewForm<?= $usr['id']; ?>"><em
                                  class="fas fa-eye mr-2 text-white"></em><span>Quick
                                  View</span></a>
                              <a class="btn btn-warning text-white mb-2" data-toggle="modal"
                                data-target="#editForm<?= $usr['id']; ?>"><em
                                  class="fas fa-exchange-alt mr-2"></em><span>Change Status</span></a>
                              <a class="btn btn-danger del-btn mb-2"
                                href="<?= base_url('admin/hapusakun/') . $usr['id']; ?>"><em
                                  class="fas fa-trash mr-2"></em><span>Delete User</span></a>
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
      <?php
      $no = 0;
      foreach ($akun as $usr) : $no++;
      ?>
      <div class="modal fade" tabindex="-1" id="viewForm<?= $usr['id']; ?>">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">View User</h5>
              <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                <em class="fas fa-times"></em>
              </a>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label class="form-label" for="name">Name</label>
                <div class="form-control-wrap">
                  <input type="text" class="form-control" id="name" name="name" value="<?= $usr['name'] ?>" disabled>
                </div>
              </div>
              <div class="form-group">
                <label class="form-label" for="name">Email</label>
                <div class="form-control-wrap">
                  <input type="text" class="form-control" value="<?= $usr['email'] ?>" disabled>
                </div>
              </div>
              <div class="form-group">
                <label class="form-label" for="name">Phone</label>
                <div class="form-control-wrap">
                  <input type="text" class="form-control" value="<?= $usr['phone'] ?>" disabled>
                </div>
              </div>
              <div class="form-group">
                <label class="form-label" for="name">Birthday</label>
                <div class="form-control-wrap">
                  <input type="text" class="form-control" value="<?= $usr['birthday'] ?>" disabled>
                </div>
              </div>
              <div class="form-group">
                <label class="form-label" for="name">Adress</label>
                <div class="form-control-wrap">
                  <input type="text" class="form-control" value="<?= $usr['address'] ?>" disabled>
                </div>
              </div>
              <div class="form-group">
                <label class="form-label" for="name">Role</label>
                <div class="form-control-wrap">
                  <input type="text" class="form-control" value="<?= $usr['role'] ?>" disabled>
                </div>
              </div>
              <div class="form-group">
                <label class="form-label" for="name">Status</label>
                <div class="form-control-wrap">
                  <input type="text" class="form-control"
                    value="<?php if ($usr['is_active'] == 1) : ?><?= "Active"; ?><?php else : ?><?= "Non-Active"; ?><?php endif; ?>"
                    disabled>
                </div>
              </div>
              <div class="form-group">
                <label class="form-label" for="name">Join Date</label>
                <div class="form-control-wrap">
                  <input type="text" class="form-control" value="<?= date('d F Y', $usr['date_created']); ?>" disabled>
                </div>
              </div>
              <div class="form-group">
                <label class="form-label" for="name">Profile Picture</label>
                <div class="form-control-wrap">
                  <img src="<?= base_url('images/profile/') . $user['image']; ?>" style="width:50%;">
                </div>
              </div>
            </div>
            <div class="modal-footer bg-light">
              <span class="sub-text">Copyright © 2018
                Design By Muhamad Nauval Azhar </span>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>

      <!-- Modal Form -->
      <?php
      $no = 0;
      foreach ($akun as $usr) : $no++;
      ?>
      <div class="modal fade" tabindex="-1" id="editForm<?= $usr['id']; ?>">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Change Status</h5>
              <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                <em class="fas fa-times"></em>
              </a>
            </div>
            <div class="berhasil" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>"></div>
            <div class="modal-body" style="padding-bottom: 0px;">
              <form action="<?= base_url('admin/changestatus/' . $usr['id']); ?>" class="form-validate is-alter"
                method="post">
                <input type="hidden" name="id" value="<?php echo $usr['id']; ?>">
                <div class="form-group mb-4">
                  <div class="preview-block">
                    <span class="preview-title overline-title">Status</span>
                    <br>
                    <div class="radio mt-3">
                      <?php if ($usr['is_active'] == 1) : ?>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="is_active" id="inlineRadio1" value="1"
                          checked>
                        <label class="form-check-label" for="inlineRadio1">Active</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="is_active" id="inlineRadio2" value="0">
                        <label class="form-check-label" for="inlineRadio2">Non-Active</label>
                      </div>
                      <?php else : ?>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="is_active" id="inlineRadio1" value="1">
                        <label class="form-check-label" for="inlineRadio1">Active</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="is_active" id="inlineRadio2" value="0"
                          checked>
                        <label class="form-check-label" for="inlineRadio2">Non-Active</label>
                      </div>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-lg btn-primary">Change</button>
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