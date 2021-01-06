<div class="nk-app-root">
  <!-- main @s -->
  <div class="nk-main ">
    <!-- wrap @s -->
    <div class="nk-wrap nk-wrap-nosidebar">
      <!-- content @s -->
      <div class="nk-content ">
        <div class="nk-block nk-block-middle nk-auth-body wide-xs">
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
                  <h4 class="nk-block-title">Register</h4>
                  <div class="nk-block-des">
                    <p>Buat akun baru untuk masuk ke aplikasi kas.</p>
                  </div>
                </div>
              </div>
              <form class="form-validate" action="<?= base_url('auth/register') ?>" method="post">
                <div class="form-group">
                  <label class="form-label" for="name">Full Name <span
                      class="badge badge-danger">required</span></label>
                  <input type="text" class="form-control form-control-lg" id="name" placeholder="Enter your full name"
                    name="name" value="<?= set_value('name'); ?>" autofocus>
                  <?= form_error('name', '<small class="invalid">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <label class="form-label" for="email">Email <span class="badge badge-danger">required</span></label>
                  <input type="text" class="form-control form-control-lg" id="email"
                    placeholder="Enter your email address" name="email" value="<?= set_value('email'); ?>">
                  <?= form_error('email', '<small class="invalid">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <label class="form-label" for="phone">Phone Number <span
                      class="badge badge-danger">required</span></label>
                  <input type="text" class="form-control form-control-lg" id="phone"
                    placeholder="Enter your phone number" name="phone" value="<?= set_value('phone'); ?>">
                  <?= form_error('phone', '<small class="invalid">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <label class="form-label">Birthday <span class="badge badge-danger">required</span></label>
                  <div class="form-control-wrap focused">
                    <input type="text" class="form-control date-picker" id="birthday"
                      placeholder="Enter your birthday date" name="birthday" value="<?= set_value('birthday'); ?>">
                    <?= form_error('birthday', '<small class="invalid">', '</small>'); ?>
                  </div>
                  <div class="form-note">Date format <code>mm/dd/yyyy</code></div>
                </div>
                <div class="form-group">
                  <label class="form-label" for="email">Address <span class="badge badge-danger">required</span></label>
                  <input type="text" class="form-control form-control-lg" id="address" placeholder="Enter your address"
                    name="address" value="<?= set_value('address'); ?>">
                  <?= form_error('address', '<small class="invalid">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <label class="form-label" for="password">Password <span
                      class="badge badge-danger">required</span></label>
                  <div class="form-control-wrap">
                    <a href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                      <em class="passcode-icon icon-show icon ni ni-eye"></em>
                      <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                    </a>
                    <input type="password" class="form-control form-control-lg" id="password"
                      placeholder="Enter your password" name="password">
                    <?= form_error('password', '<small class="invalid">', '</small>'); ?>
                  </div>
                </div>
                <div class="form-group">
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-lg btn-primary btn-block">Register</button>
                </div>
              </form>
              <div class="form-note-s2 text-center pt-4"> Already have an account? <a
                  href="<?= base_url('auth'); ?>"><strong>Sign in instead</strong></a>
              </div>
            </div>
          </div>
        </div>