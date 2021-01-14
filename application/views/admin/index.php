      <!-- content @s -->
      <div class="nk-content nk-content-fluid">
        <div class="container-xl wide-lg">
          <div class="nk-content-body">

            <div class="nk-block-head nk-block-head-sm">
              <div class="nk-block-between">
                <div class="nk-block-head-content">
                  <h3 class="nk-block-title page-title">Dashboard</h3>
                  <div class="nk-block-des text-soft">
                    <p>Welcome to Info Kas Dashboard.</p>
                  </div>
                </div><!-- .nk-block-head-content -->
                <div class="nk-block-head-content">
                  <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em
                        class="icon ni ni-more-v"></em></a>
                    <div class="toggle-expand-content " data-content="pageMenu">
                      <ul class="nk-block-tools g-3">
                        <li><a href="<?= base_url('laporan/index'); ?>"
                            class="btn btn-white btn-dim btn-outline-primary"><em
                              class="icon ni ni-reports"></em><span>Laporan</span></a></li>
                        <li class="nk-block-tools-opt">
                          <div class="drodown">
                            <a href="#" class="dropdown-toggle btn btn-icon btn-primary" data-toggle="dropdown"><em
                                class="icon ni ni-plus"></em></a>
                            <div class="dropdown-menu dropdown-menu-right">
                              <ul class="link-list-opt no-bdr">
                                <li><a href="<?= base_url('admin/sumberdana'); ?>"><em
                                      class="icon ni ni-tranx"></em><span>Add Sumber
                                      Dana</span></a></li>
                                <li><a href="<?= base_url('admin/danamasuk'); ?>"><em
                                      class="icon ni ni-wallet-in"></em><span>Add Dana
                                      Masuk</span></a>
                                </li>
                                <li><a href="<?= base_url('admin/danakeluar'); ?>"><em
                                      class="icon ni ni-wallet-out"></em><span>Add Dana
                                      Keluar</span></a>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div><!-- .toggle-expand-content -->
                  </div><!-- .toggle-wrap -->
                </div><!-- .nk-block-head-content -->
              </div><!-- .nk-block-between -->
            </div>

            <!-- Content Row -->
            <div class="row">

              <!-- Dana Masuk -->
              <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary mb-1">Total Dana Masuk</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp
                          <?= number_format($total_masuk['nominal']); ?>
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Dana Keluar -->
              <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger mb-1">Total Dana Keluar</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp
                          <?= number_format($total_kas2['nominal']); ?></div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-coins fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Total Dana -->
              <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success mb-1">Total Saldo</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp
                          <?= number_format($total_masuk['nominal'] - $total_kas2['nominal']); ?></div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-coins fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>

          </div>
        </div>
      </div>
      <!-- content @e -->