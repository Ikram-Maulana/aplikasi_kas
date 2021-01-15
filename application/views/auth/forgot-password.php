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
              <h4>Forgot Password</h4>
            </div>

            <div class="card-body">
              <p class="text-muted">We will send a link to reset your password</p>
              <form class="form-validate" action="<?= base_url('auth/forgotpassword'); ?>" method="post">
                <?= $this->session->flashdata('message'); ?>
                <div class="form-group mb-3">
                  <label for="email">Email</label>
                  <input id="email" type="email" class="form-control" name="email" tabindex="1"
                    value="<?= set_value('email'); ?>">
                  <?= form_error('email', '<div class="text-danger"><small>', '</small></div>'); ?>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    Forgot Password
                  </button>
                </div>
                <div class="form-note-s2 text-center mt-3"> Back to login page? <a
                    href="<?= base_url('auth/index'); ?>">Kembali</a>
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