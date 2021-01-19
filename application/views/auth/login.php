<div id="app">
  <section class="section">
    <div class="container mt-5">
      <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
          <div class="brand-logo pb-4 text-center">
            <a class="logo-link">
              <img class="logo-dark logo-img logo-img-lg" src="<?= base_url(''); ?>/images/logo-auth.png"
                alt="logo-dark">
            </a>
          </div>

          <div class="card card-primary">
            <div class="card-header">
              <h4>Sign In</h4>
            </div>

            <div class="card-body">
              <form class="form-validate needs-validation" action="<?= base_url('auth'); ?>" method="post" id="login">
                <?= $this->session->flashdata('message'); ?>
                <div class="form-group mb-2">
                  <label for="email">Email</label>
                  <input id="email" type="email" class="form-control" name="email" tabindex="1"
                    value="<?= set_value('email'); ?>" autofocus>
                  <?= form_error('email', '<div class="text-danger"><small>', '</small></div>'); ?>
                </div>

                <div class="form-group mb-3">
                  <div class="d-block">
                    <label for="password" class="control-label">Password</label>
                    <div class="float-right">
                      <a href="<?= base_url('auth/forgotpassword'); ?>" class="text-small">
                        Forgot Password?
                      </a>
                    </div>
                  </div>
                  <input id="password" type="password" class="form-control" name="password" tabindex="2">
                  <?= form_error('password', '<div class="text-danger"><small>', '</small></div>'); ?>
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-lg btn-block g-recaptcha" tabindex="4">
                    Login
                  </button>
                </div>
                <div class="mt-3 text-muted text-center">
                  Don't have an account? <a href="<?= base_url('auth/register'); ?>">Create One</a>
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