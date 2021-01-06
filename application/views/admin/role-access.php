      <!-- content @s -->
      <div class="nk-content nk-content-fluid">
        <div class="container-xl wide-lg">
          <div class="nk-content-body">

            <div class="nk-block nk-block-lg">
              <div class="nk-block-head">
                <div class="nk-block-head-content">
                  <h4 class="nk-block-title"><?= $title; ?></h4>
                  <p>Laman untuk me-manage role access.</p>
                  <div class="berhasil" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>"></div>
                  <a href="<?= base_url('admin/role'); ?>"><button class="btn btn-danger mb-2">Kembali</button></a>
                  <div class="example-alert">
                    <div class="alert alert-fill alert-gray alert-icon"><em class="icon ni ni-alert-circle"></em>
                      <strong>Role : </strong><?= $role['role']; ?>
                    </div>
                  </div>
                  <!-- if empty -->
                  <?php if (empty($role) && empty($menu)) : ?>
                  <div class="example-alert">
                    <div class="alert alert-fill alert-danger alert-icon mb-2 mt-2"><em
                        class="icon ni ni-alert-circle"></em>
                      <strong>Data Tidak Ditemukan</strong>
                    </div>
                  </div>
                  <?php endif; ?>
                </div>
              </div>
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
                        <span>Access</span>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($menu as $m) :
                    ?>
                    <tr class="tb-tnx-item">
                      <td class="tb-tnx-id">
                        <a href="#"><span><?= $no++; ?></span></a>
                      </td>
                      <td class="tb-tnx-info">
                        <div class="tb-tnx-total">
                          <span class="amount"><?= $m['menu']; ?></span>
                        </div>
                      </td>
                      <td class="tb-odr-action">
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" <?= check_access($role['id'], $m['id']); ?>
                            data-role="<?= $role['id']; ?>" data-menu="<?= $m['id']; ?>">
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