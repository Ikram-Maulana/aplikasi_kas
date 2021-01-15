<div id="app">
  <section class="section">
    <div class="container mt-5">
      <div class="row">
        <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
          <div class="brand-logo pb-4 text-center">
            <a class="logo-link">
              <img class="logo-dark logo-img logo-img-lg" src="<?= base_url(''); ?>/images/logo-auth.png"
                alt="logo-dark">
            </a>
          </div>

          <div class="card card-primary">
            <div class="card-header">
              <h4>Register</h4>
            </div>

            <div class="card-body">
              <form class="form-validate" action="<?= base_url('auth/register') ?>" method="post">
                <?= $this->session->flashdata('message'); ?>
                <div class="form-group mb-2">
                  <label for="name">Full Name</label>
                  <input type="text" class="form-control" id="name" name="name" tabindex="1"
                    value="<?= set_value('name'); ?>" autofocus>
                  <?= form_error('name', '<div class="text-danger"><small>', '</small></div>'); ?>
                </div>
                <div class="form-group mb-2">
                  <label for="email">Email</label>
                  <input id="email" type="text" class="form-control" name="email" tabindex="1"
                    value="<?= set_value('email'); ?>">
                  <?= form_error('email', '<div class="text-danger"><small>', '</small></div>'); ?>
                </div>
                <div class="form-group mb-2">
                  <label for="phone">Phone Number</label>
                  <input id="phone" type="text" class="form-control" name="phone" tabindex="1"
                    value="<?= set_value('phone'); ?>">
                  <?= form_error('phone', '<div class="text-danger"><small>', '</small></div>'); ?>
                </div>
                <div class="form-group mb-2">
                  <label for="birthday">Birthday Date</label>
                  <input id="birthday" type="date" class="form-control" name="birthday" tabindex="1"
                    value="<?= set_value('birthday'); ?>">
                  <?= form_error('birthday', '<div class="text-danger"><small>', '</small></div>'); ?>
                </div>
                <div class="form-group mb-2">
                  <label for="address">Address</label>
                  <input id="address" type="date" class="form-control" name="address" tabindex="1"
                    value="<?= set_value('address'); ?>">
                  <?= form_error('address', '<div class="text-danger"><small>', '</small></div>'); ?>
                </div>
                <div class="form-group mb-2">
                  <label for="password">Password</label>
                  <input id="password" type="date" class="form-control" name="password" tabindex="1">
                  <?= form_error('password', '<div class="text-danger"><small>', '</small></div>'); ?>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    Register
                  </button>
                </div>
                <div class="form-note-s2 text-center mt-3"> Already have an account? <a
                    href="<?= base_url('auth'); ?>"><strong>Sign in instead</strong></a>
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