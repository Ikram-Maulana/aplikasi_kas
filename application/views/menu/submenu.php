      <!-- content @s -->
      <div class="nk-content nk-content-fluid">
        <div class="container-xl wide-lg">
          <div class="nk-content-body">

            <div class="nk-block nk-block-lg">
              <div class="nk-block-head">
                <div class="nk-block-head-content">
                  <h4 class="nk-block-title"><?= $title; ?></h4>
                  <p>Laman untuk me-manage submenu.</p>
                </div>
                <a href="#" class="btn btn-primary mt-2" data-toggle="modal" data-target="#modalForm">Add New
                  Submenu</a>
              </div>

              <div class="row">
                <div class="col-md-5">
                  <form action="<?= base_url('menu/submenu'); ?>" method="post">
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Search title..." name="keyword"
                        autocomplete="off" autofocus>
                      <input class="btn btn-primary ml-2" type="submit" name="submit" value="Cari">
                    </div>
                  </form>
                </div>
              </div>

              <!-- if empty -->
              <?php if (empty($subMenu)) : ?>
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
                          <span>Title</span>
                        </span>
                        <span class="tb-tnx-date d-md-inline-block d-none">
                          <span class="d-md-none">Url</span>
                          <span class="d-none d-md-block">
                            <span>Menu</span>
                            <span>Url</span>
                          </span>
                        </span>
                      </th>
                      <th class="tb-tnx-amount is-alt">
                        <span class="tb-tnx-total">Icon</span>
                        <span class="tb-tnx-status d-none d-md-inline-block">Status</span>
                      </th>
                      <th class="tb-tnx-action">
                        <span>Action</span>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($subMenu as $sm) :
                    ?>
                    <tr class="tb-tnx-item">
                      <td class="tb-tnx-id">
                        <a href="#"><span><?= ++$start; ?></span></a>
                      </td>
                      <td class="tb-tnx-info">
                        <div class="tb-tnx-desc">
                          <span class="title"><?= $sm['title']; ?></span>
                        </div>
                        <div class="tb-tnx-date">
                          <span class="date"><?= $sm['menu']; ?></span>
                          <span class="date"><?= $sm['url']; ?></span>
                        </div>
                      </td>
                      <td class="tb-tnx-amount is-alt">
                        <div class="tb-tnx-total">
                          <span class="amount"><?= $sm['icon']; ?></span>
                        </div>
                        <div class="tb-tnx-status">
                          <?php if ($sm['is_active'] == 1) : ?>
                          <span class="badge badge-dot badge-success">Active</span>
                          <?php else : ?>
                          <span class="badge badge-dot badge-danger">Non-Active</span>
                          <?php endif; ?>
                        </div>
                      </td>
                      <td class="tb-tnx-action">
                        <div class="dropdown">
                          <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em
                              class="icon ni ni-more-h"></em></a>
                          <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                            <ul class="link-list-plain">
                              <li><a data-toggle="modal" data-target="#editForm<?= $sm['id']; ?>">
                                  <span>Edit</span>
                                </a>
                              </li>
                              <li><a href="<?= base_url('menu/hapussm/') . $sm['id']; ?>" class="dbtn">
                                  <span>Delete</span>
                                </a>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                  <?php endforeach; ?>
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
              <h5 class="modal-title">Add New Sub Menu</h5>
              <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
              </a>
            </div>
            <div class="berhasil" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>"></div>
            <div class="modal-body">
              <form action="<?= base_url('menu/submenu'); ?>" class="form-validate is-alter" method="post">
                <div class="form-group">
                  <label class="form-label" for="title">Submenu Title</label>
                  <div class="form-control-wrap">
                    <input type="text" class="form-control" id="title" name="title" required>
                    <?= form_error('title', '<span id="fva-message-error" class="invalid">', '</span>'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label class="form-label" for="menu">Menu</label>
                  <div class="form-control-wrap ">
                    <select name="menu_id" class="form-control form-select form-control-lg" id="menu"
                      data-placeholder="Select Menu" required>
                      <option label="empty" value=""></option>
                      <?php foreach ($menu as $m) : ?>
                      <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="form-label" for="url">Submenu Url</label>
                  <div class="form-control-wrap">
                    <input type="text" class="form-control" id="url" name="url" required>
                    <?= form_error('url', '<span id="fva-message-error" class="invalid">', '</span>'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label class="form-label" for="icon">Submenu Icon</label>
                  <div class="form-control-wrap">
                    <input type="text" class="form-control" id="icon" name="icon" required>
                    <?= form_error('icon', '<span id="fva-message-error" class="invalid">', '</span>'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <div class="preview-block">
                    <span class="preview-title overline-title">Active Status</span>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="is_active" id="inlineRadio1" value="1">
                      <label class="form-check-label" for="inlineRadio1">Active</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="is_active" id="inlineRadio2" value="0">
                      <label class="form-check-label" for="inlineRadio2">Non-Active</label>
                    </div>
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
      foreach ($subMenu as $sm) : $no++;
      ?>
      <div class="modal fade" tabindex="-1" id="editForm<?= $sm['id']; ?>">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit Sub Menu</h5>
              <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                <em class="icon ni ni-cross"></em>
              </a>
            </div>
            <div class="berhasil" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>"></div>
            <div class="modal-body">
              <form action="<?= base_url('menu/editsubmenu/' . $sm['id']); ?>" class="form-validate is-alter"
                method="post">
                <input type="hidden" name="id" value="<?php echo $sm['id']; ?>">
                <div class="form-group">
                  <label class="form-label" for="title">Submenu Title</label>
                  <div class="form-control-wrap">
                    <input type="text" class="form-control" id="title" name="title" value="<?= $sm['title'] ?>"
                      required>
                    <?= form_error('title', '<span id="fva-message-error" class="invalid">', '</span>'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label class="form-label" for="menu">Menu</label>
                  <div class="form-control-select ">
                    <select name="menu_id" class="form-control" id="menu" required>
                      <?php foreach ($menu as $m) : ?>
                      <option value="<?= $m['id']; ?>" <?php if ($sm['menu_id'] == $m['id']) :
                                                              echo "selected";
                                                            endif; ?>>
                        <?= $m['menu']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="form-label" for="url">Submenu Url</label>
                  <div class="form-control-wrap">
                    <input type="text" class="form-control" id="url" name="url" value="<?= $sm['url']; ?>" required>
                    <?= form_error('url', '<span id="fva-message-error" class="invalid">', '</span>'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label class="form-label" for="icon">Submenu Icon</label>
                  <div class="form-control-wrap">
                    <input type="text" class="form-control" id="icon" name="icon" value="<?= $sm['icon']; ?>" required>
                    <?= form_error('icon', '<span id="fva-message-error" class="invalid">', '</span>'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <div class="preview-block">
                    <span class="preview-title overline-title">Active Status</span>
                    <?php if ($sm['is_active'] == 1) : ?>
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