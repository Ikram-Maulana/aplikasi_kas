      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Role Access</h1>
          </div>

          <div class="section-body">
            <h2 class="section-title"><?= $title; ?> Access</h2>
            <p class="section-lead" style="margin-bottom: 0.5rem;">Laman untuk me-manage role access.</p>
            <div class="berhasil" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>"></div>
            <a href="<?= base_url('admin/role'); ?>"><button class="section-lead btn btn-primary
                mb-3">Kembali</button></a>
            <div class="example-alert">
              <div class="alert alert-fill alert-primary alert-icon"><em class="fas fa-exclamation-circle mr-2"></em>
                <strong>Role : </strong><?= $role['role']; ?>
              </div>
            </div>

            <!-- if empty -->
            <?php if (empty($role) && empty($menu)) : ?>
            <div class="example-alert">
              <div class="alert alert-fill alert-danger alert-icon mb-2 mt-2"><em
                  class="fas fa-exclamation-circle mr-2"></em>
                <strong>Data Tidak Ditemukan</strong>
              </div>
            </div>
            <?php endif; ?>

            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card card-primary">
                  <div class="card-header">
                    <h4>Role Access Management</h4>
                  </div>
                  <div class="card-body">
                    <table class="table table-hover">
                      <tr>
                        <th>#</th>
                        <th>Menu</th>
                        <th>Access</th>
                      </tr>
                      <tr>
                        <?php
                        $no = 1;
                        foreach ($menu as $m) :
                        ?>
                        <td><?= $no++; ?></td>
                        <td><?= $m['menu']; ?></td>
                        <td><input type="checkbox" class="form-check-input" id="gridCheck1"
                            <?= check_access($role['id'], $m['id']); ?> data-role="<?= $role['id']; ?>"
                            data-menu="<?= $m['id']; ?>"></td>
                      </tr>
                      <?php endforeach; ?>
                    </table>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </section>
      </div>