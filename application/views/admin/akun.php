      <!-- content @s -->
      <div class="nk-content nk-content-fluid">
        <div class="container-xl wide-lg">
          <div class="nk-content-body">
            <div class="components-preview wide-md mx-auto">
              <div class="nk-block-head">
                <div class="nk-block-head-content">
                  <h4 class="nk-block-title">Daftar Akun</h4>
                  <div class="nk-block-des">
                    <p>Laman untuk me-manage akun.</p>
                  </div>
                  <div class="berhasil" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>"></div>
                  <!-- if empty -->
                  <?php if (empty($akun)) : ?>
                  <div class="example-alert">
                    <div class="alert alert-fill alert-danger alert-icon mt-2"><em class="icon ni ni-alert-circle"></em>
                      <strong>Data Tidak Ditemukan</strong>
                    </div>
                  </div>
                  <?php endif; ?>
                </div>
              </div>
              <div class="card card-preview">
                <div class="card-inner">

                  <div class="row">
                    <div class="col-md-5">
                      <form action="<?= base_url('admin/akun'); ?>" method="post">
                        <div class="input-group mb-3">
                          <input type="text" class="form-control" placeholder="Search name or email..." name="keyword"
                            autocomplete="off" autofocus>
                          <input class="btn btn-primary ml-2" type="submit" name="submit" value="Cari">
                        </div>
                      </form>
                    </div>
                  </div>

                  <table class="datatable nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                    <thead>
                      <tr class="nk-tb-item nk-tb-head">
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">No</span></th>
                        <th class="nk-tb-col"><span class="sub-text">User</span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Phone</span></th>
                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Birthday</span></th>
                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Address</span></th>
                        <th class="nk-tb-col tb-col-lg"><span class="sub-text">Role</span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></th>
                        <th class="nk-tb-col nk-tb-col-tools text-right"><span class="sub-text">Act</span></th>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      foreach ($akun as $usr) : ?>
                      <tr class="nk-tb-item">
                        <td class="nk-tb-col tb-col-mb">
                          <span class="tb-amount"><?= ++$start; ?></span>
                        </td>
                        <td class="nk-tb-col">
                          <div class="user-card">
                            <div class="user-avatar bg-dim-primary d-none d-sm-flex">
                              <span><img src="<?= base_url('images/profile/') . $usr['image']; ?>"></span>
                            </div>
                            <div class="user-info">
                              <span class="tb-lead"><?= $usr['name']; ?><span
                                  class="dot dot-success d-md-none ml-1"></span></span>
                              <span><em class="icon text-success ni ni-check-circle"></em> <?= $usr['email']; ?></span>
                            </div>
                          </div>
                        </td>
                        <td class="nk-tb-col tb-col-mb" data-order="35040.34">
                          <span class="tb-amount"><?= $usr['phone']; ?></span>
                        </td>
                        <td class="nk-tb-col tb-col-md">
                          <span><?= $usr['birthday']; ?></span>
                        </td>
                        <td class="nk-tb-col tb-col-lg" data-order="Email Verified - Kyc Unverified">
                          <ul class="list-status">
                            <li><span><?= $usr['address']; ?></span></li>
                          </ul>
                        </td>
                        <td class="nk-tb-col tb-col-lg">
                          <span><?= $usr['role']; ?></span>
                        </td>
                        <td class="nk-tb-col tb-col-md">
                          <?php if ($usr['is_active'] == 1) : ?>
                          <span class="tb-status text-success"><?= "Active"; ?></span>
                          <?php else : ?>
                          <span class="tb-status text-danger"><?= "Non-Active"; ?></span>
                          <?php endif; ?>
                        </td>
                        <td class="nk-tb-col nk-tb-col-tools">
                          <ul class="nk-tb-actions gx-1">
                            <li>
                              <div class="drodown">
                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em
                                    class="icon ni ni-more-h"></em></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                  <ul class="link-list-opt no-bdr">
                                    <li><a data-toggle="modal" data-target="#viewForm<?= $usr['id']; ?>"><em
                                          class="icon ni ni-eye"></em><span>Quick View</span></a></li>
                                    <li><a data-toggle="modal" data-target="#editForm<?= $usr['id']; ?>"><em
                                          class="icon ni ni-exchange"></em><span>Change Status</span></a>
                                    </li>
                                    <li><a href="<?= base_url('admin/hapusakun/') . $usr['id']; ?>" class="dbtn"><em
                                          class="icon ni ni-trash"></em><span>Delete User</span></a></li>
                                  </ul>
                                </div>
                              </div>
                            </li>
                          </ul>
                        </td>
                      </tr><!-- .nk-tb-item  -->
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                  <?= $this->pagination->create_links(); ?>
                </div>
              </div><!-- .card-preview -->
            </div> <!-- nk-block -->
          </div>
        </div>
      </div>
      <!-- content @e -->

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
                <em class="icon ni ni-cross"></em>
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
            </div>
            <div class="modal-footer bg-light">
              <span class="sub-text">© 2020 Ikram Maulana.</span>
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
                <em class="icon ni ni-cross"></em>
              </a>
            </div>
            <div class="berhasil" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>"></div>
            <div class="modal-body">
              <form action="<?= base_url('admin/changestatus/' . $usr['id']); ?>" class="form-validate is-alter"
                method="post">
                <input type="hidden" name="id" value="<?php echo $usr['id']; ?>">
                <div class="form-group">
                  <div class="preview-block">
                    <span class="preview-title overline-title">Status</span>
                    <?php if ($usr['is_active'] == 1) : ?>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="is_active" id="inlineRadio1" value="1" checked>
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
                      <input class="form-check-input" type="radio" name="is_active" id="inlineRadio2" value="0" checked>
                      <label class="form-check-label" for="inlineRadio2">Non-Active</label>
                    </div>
                    <?php endif; ?>
                  </div>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-lg btn-primary">Change</button>
                </div>
              </form>
            </div>
            <div class="modal-footer bg-light">
              <span class="sub-text">© 2020 Ikram Maulana.</span>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>