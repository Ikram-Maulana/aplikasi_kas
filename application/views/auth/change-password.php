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
                  <h4 class="nk-block-title">Change your password</h4>
                  <div class="nk-block-des">
                    <p>change password for <?= $this->session->userdata('reset_email'); ?>.</p>
                  </div>
                </div>
              </div>
              <form class="form-validate" action="<?= base_url('auth/changepassword'); ?>" method="post">
                <?= $this->session->flashdata('message'); ?>
                <div class="form-group">
                  <div class="form-label-group">
                    <label class="form-label" for="password1">New Password</label>
                  </div>
                  <input type="password" class="form-control form-control-lg" id="password1"
                    placeholder="Enter new password" name="password1" autofocus>
                  <?= form_error('password1', '<span id="fva-message-error" class="invalid">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <div class="form-label-group">
                    <label class="form-label" for="password2">Repeat Password</label>
                  </div>
                  <input type="password" class="form-control form-control-lg" id="password2"
                    placeholder="Repeat password" name="password2" autofocus>
                  <?= form_error('password2', '<span id="fva-message-error" class="invalid">', '</span>'); ?>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-lg btn-primary btn-block">Change password</button>
                </div>
              </form>
            </div>
          </div>
        </div>