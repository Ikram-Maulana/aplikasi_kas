                <!-- content @s -->
                <div class="nk-content nk-content-fluid">
                  <div class="container-xl wide-lg">
                    <div class="nk-content-body">
                      <div class="nk-block">
                        <div class="card card-bordered">
                          <div class="card-aside-wrap">
                            <div class="card-inner card-inner-lg">
                              <div class="nk-block-head nk-block-head-lg">
                                <div class="nk-block-between">
                                  <div class="nk-block-head-content">
                                    <h4 class="nk-block-title">Security Settings</h4>
                                    <div class="nk-block-des">
                                      <p>These settings are helps you keep your account secure.</p>
                                    </div>
                                  </div>
                                  <div class="nk-block-head-content align-self-start d-lg-none">
                                    <a href="#" class="toggle btn btn-icon btn-trigger mt-n1"
                                      data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                  </div>
                                </div>
                              </div><!-- .nk-block-head -->
                              <div class="nk-block">
                                <div class="card card-bordered">
                                  <div class="card-inner-group">
                                    <div class="card-inner">
                                      <div class="between-center flex-wrap g-3">
                                        <div class="nk-block-text">
                                          <h6>Change Password</h6>
                                          <p>Set a unique password to protect your account.</p>
                                        </div>
                                        <div class="nk-block-actions flex-shrink-sm-0">
                                          <ul class="align-center flex-wrap flex-sm-nowrap gx-3 gy-2">
                                            <li class="order-md-last">
                                              <a href="#" class="btn btn-primary" data-toggle="modal"
                                                data-target="#password-edit">Change Password</a>
                                            </li>
                                          </ul>
                                        </div>
                                      </div>
                                    </div><!-- .card-inner -->
                                  </div><!-- .card-inner-group -->
                                </div><!-- .card -->
                              </div><!-- .nk-block -->
                            </div><!-- .card-inner -->
                            <div
                              class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg"
                              data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
                              <div class="card-inner-group" data-simplebar>
                                <div class="card-inner">
                                  <div class="user-card">
                                    <div class="user-avatar bg-primary">
                                      <span><img src="<?= base_url('images/profile/').$user['image']; ?>"></span>
                                    </div>
                                    <div class="user-info">
                                      <span class="lead-text"><?= $user['name']; ?></span>
                                      <span class="sub-text"><?= $user['email']; ?></span>
                                    </div>
                                    <div class="user-action">
                                      <div class="dropdown">
                                        <a class="btn btn-icon btn-trigger mr-n2" data-toggle="dropdown" href="#"><em
                                            class="icon ni ni-more-v"></em></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                          <ul class="link-list-opt no-bdr">
                                            <li><a href="#" data-toggle="modal" data-target="#photo-edit"><em
                                                  class="icon ni ni-camera-fill"></em><span>Change Photo</span></a></li>
                                            <li><a href="#" data-toggle="modal" data-target="#profile-edit"><em
                                                  class="icon ni ni-edit-fill"></em><span>Update Profile</span></a></li>
                                          </ul>
                                        </div>
                                      </div>
                                    </div>
                                  </div><!-- .user-card -->
                                </div><!-- .card-inner -->
                                <div class="card-inner p-0">
                                  <ul class="link-list-menu">
                                    <li><a href="<?= base_url('user/edit'); ?>"><em
                                          class="icon ni ni-user-fill-c"></em><span>Personal Infomation</span></a></li>
                                    <li><a class="active" href="<?= base_url('user/setting'); ?>"><em
                                          class="icon ni ni-lock-alt-fill"></em><span>Security Settings</span></a></li>
                                  </ul>
                                </div><!-- .card-inner -->
                              </div><!-- .card-inner-group -->
                            </div><!-- card-aside -->
                          </div><!-- .card-aside-wrap -->
                        </div><!-- .card -->
                      </div><!-- .nk-block -->
                    </div>
                  </div>
                </div>
                <!-- content @e -->

                <!-- Modal Form -->
                <div class="modal fade" tabindex="-1" id="password-edit">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Update Profile</h5>
                        <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                          <em class="icon ni ni-cross"></em>
                        </a>
                      </div>
                      <div class="berhasil" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>"></div>
                      <div class="gagal" data-flashdata="<?= $this->session->flashdata('gagal'); ?>"></div>
                      <div class="modal-body">
                        <form action="<?= base_url('user/setting') ?>" class="form-validate is-alter" method="post">
                          <input type="hidden" class="form-control" id="email" name="email"
                            value="<?= $user['email']; ?>">
                          <div class="form-group">
                            <label class="form-label" for="current_password">Current Password</label>
                            <div class="form-control-wrap">
                              <input type="password" class="form-control" id="current_password" name="current_password"
                                required>
                              <?= form_error('current_password', '<span id="fva-message-error" class="invalid">', '</span>'); ?>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="form-label" for="new_password1">New Password</label>
                            <div class="form-control-wrap">
                              <input type="password" class="form-control" id="new_password1" name="new_password1"
                                required>
                              <?= form_error('new_password1', '<span id="fva-message-error" class="invalid">', '</span>'); ?>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="form-label" for="new_password2">Repeat Password</label>
                            <div class="form-control-wrap">
                              <input type="password" class="form-control" id="new_password2" name="new_password2"
                                required>
                              <?= form_error('new_password2', '<span id="fva-message-error" class="invalid">', '</span>'); ?>
                            </div>
                          </div>
                          <div class="mt-3">
                            <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                              <li>
                                <button type="submit" class="btn btn-lg btn-primary">Change Password</button>
                              </li>
                              <li>
                                <a href="#" data-dismiss="modal" class="link link-light">Cancel</a>
                              </li>
                            </ul>
                          </div>
                      </div>
                      <div class="modal-footer bg-light">
                        <span class="sub-text">© 2020 Ikram Maulana.</span>
                      </div>
                    </div>
                  </div>
                </div>