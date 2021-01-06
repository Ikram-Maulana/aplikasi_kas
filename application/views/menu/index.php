      <!-- content @s -->
      <div class="nk-content nk-content-fluid">
        <div class="container-xl wide-lg">
          <div class="nk-content-body">

            <div class="nk-block nk-block-lg">
              <div class="nk-block-head">
                <div class="nk-block-head-content">
                  <h4 class="nk-block-title"><?= $title; ?></h4>
                  <p>Laman untuk me-manage menu.</p>
                </div>
                <a href="#" class="btn btn-primary mt-2" data-toggle="modal" data-target="#modalForm">Add New Menu</a>
              </div>

              <div class="row">
                <div class="col-md-5">
                  <form action="<?= base_url('menu/index'); ?>" method="post">
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Search Keyword..." name="keyword"
                        autocomplete="off" autofocus>
                      <input class="btn btn-primary ml-2" type="submit" name="submit" value="Cari">
                    </div>
                  </form>
                </div>
              </div>

              <!-- if empty -->
              <?php if (empty($menu)) : ?>
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
                          <span>Menu</span>
                        </span>
                      </th>
                      <th class="tb-tnx-action">
                        <span>Action</span>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($menu as $m) :
                    ?>
                    <tr class="tb-tnx-item">
                      <td class="tb-tnx-id">
                        <a href="#"><span><?= ++$start; ?></span></a>
                      </td>
                      <td class="tb-tnx-info">
                        <div class="tb-tnx-total">
                          <span class="amount"><?= $m['menu']; ?></span>
                        </div>
                      </td>
                      <td class="tb-tnx-action">
                        <div class="dropdown">
                          <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em
                              class="icon ni ni-more-h"></em></a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                            <ul class="link-list-plain">
                              <li><a data-toggle="modal" data-target="#editForm<?= $m['id']; ?>">
                                  <span>Edit</span>
                                </a>
                              </li>
                              <li><a href="<?= base_url('menu/hapusm/') . $m['id']; ?>" class="dbtn">
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
              <h5 class="modal-title">Add New Menu</h5>
              <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
              </a>
            </div>
            <div class="berhasil" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>"></div>
            <div class="modal-body">
              <form action="<?= base_url('menu') ?>" class="form-validate is-alter" method="post">
                <div class="form-group">
                  <label class="form-label" for="menu">Menu Name</label>
                  <div class="form-control-wrap">
                    <input type="text" class="form-control" id="menu" name="menu" required>
                    <?= form_error('menu', '<span id="fva-message-error" class="invalid">', '</span>'); ?>
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

      <!-- Modal Form -->
      <?php
      $no = 0;
      foreach ($menu as $m) : $no++;
      ?>
      <div class="modal fade" tabindex="-1" id="editForm<?= $m['id']; ?>">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit Menu</h5>
              <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
              </a>
            </div>
            <div class="berhasil" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>"></div>
            <div class="modal-body">
              <form action="<?= base_url('menu/editmenu/' . $m['id']); ?>" class="form-validate is-alter" method="post">
                <input type="hidden" name="id" value="<?php echo $m['id']; ?>">
                <div class="form-group">
                  <label class="form-label" for="menu">Menu Name</label>
                  <div class="form-control-wrap">
                    <input type="text" class="form-control" id="menu" name="menu" value="<?= $m['menu'] ?>" required>
                    <?= form_error('menu', '<span id="fva-message-error" class="invalid">', '</span>'); ?>
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
      <?php endforeach; ?>