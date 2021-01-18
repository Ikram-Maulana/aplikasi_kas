<div id="app">
  <section class="section">
    <div class="container mt-5">
      <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
          <div class="login-brand">
            <a class="logo-link">
              <img class="logo-dark logo-img logo-img-lg" src="<?= base_url(''); ?>/images/logo-auth.png"
                alt="logo-dark">
            </a>
          </div>

          <div class="card card-primary">
            <div class="card-header">
              <h4>Change your password</h4>
            </div>

            <div class="card-body">
              <p class="text-muted">change password for <?= $this->session->userdata('reset_email'); ?>.</p>
              <form class="form-validate" action="<?= base_url('auth/changepassword'); ?>" method="post">
                <?= $this->session->flashdata('message'); ?>
                <div class="form-group mb-2">
                  <label for="password1">New Password</label>
                  <input type="password" class="form-control" id="password1" name="password1" autofocus>
                  <?= form_error('password1', '<div class="text-danger"><small>', '</small></div>'); ?>
                </div>
                <div class="form-group mb-2">
                  <label for="password2">Repeat Password</label>
                  <input type="password" class="form-control" id="password2" name="password2" autofocus>
                  <?= form_error('password2', '<div class="text-danger"><small>', '</small></div>'); ?>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    Change Password
                  </button>
                </div>
              </form>
            </div>
          </div>
          <div class="simple-footer">
            Copyright &copy; Stisla 2018
          </div>
        </div>
      </div>
    </div>
  </section>
</div>