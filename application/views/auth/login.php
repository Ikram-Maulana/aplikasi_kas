<div class="nk-app-root">
  <!-- main @s -->
  <div class="nk-main ">
    <!-- wrap @s -->
    <div class="nk-wrap nk-wrap-nosidebar">
      <!-- content @s -->
      <div class="nk-content ">
        <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
          <div class="brand-logo pb-4 text-center">
            <a class="logo-link">
              <img class="logo-dark logo-img logo-img-lg" src="<?= base_url(''); ?>/images/logo-auth.png"
                alt="logo-dark">
            </a>
          </div>
          <div class="card card-bordered">
            <div class="card-inner card-inner-lg">
              <div class="nk-block-head">
                <div class="nk-block-head-content">
                  <h4 class="nk-block-title">Sign-In</h4>
                  <div class="nk-block-des">
                    <p>Login untuk akses aplikasi kas.</p>
                  </div>
                </div>
              </div>
              <form class="form-validate" action="<?= base_url('auth'); ?>" method="post">
                <?= $this->session->flashdata('message'); ?>
                <div class="form-group">
                  <div class="form-label-group">
                    <label class="form-label" for="email">Email</label>
                  </div>
                  <input type="text" class="form-control form-control-lg" id="email"
                    placeholder="Enter your email address" name="email" value="<?= set_value('email'); ?>" autofocus>
                  <?= form_error('email', '<span id="fva-message-error" class="invalid">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <label class="form-label" for="password">Password</label>
                    <a class="link link-primary link-sm" href="<?= base_url('auth/forgotpassword'); ?>">Forgot
                      Password?</a>
                  </div>
                  <div class="form-control-wrap">
                    <a href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                      <em class="passcode-icon icon-show icon ni ni-eye"></em>
                      <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                    </a>
                    <input type="password" class="form-control form-control-lg" id="password"
                      placeholder="Enter your password" name="password">
                    <?= form_error('password', '<span id="fva-message-error" class="invalid">', '</span>'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-lg btn-primary btn-block">Sign in</button>
                </div>
              </form>
              <div class="form-note-s2 text-center pt-4"> New on our platform? <a
                  href="<?= base_url('auth/register'); ?>">Create an account</a>
              </div>
            </div>
          </div>
        </div>