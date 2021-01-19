  <!-- General JS Scripts -->
  <script src="<?= base_url('assets'); ?>/modules/jquery-3.3.1.min.js"></script>
  <script src="<?= base_url('assets'); ?>/modules/popper.min.js"></script>
  <script src="<?= base_url('assets'); ?>/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?= base_url('assets'); ?>/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="<?= base_url('assets'); ?>/modules/moment.min.js"></script>
  <script src="<?= base_url('assets'); ?>/js/stisla.js"></script>
  <script src="<?= base_url('assets'); ?>/modules/fontawesome/js/2d24ac2742.js"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="<?= base_url('assets'); ?>/js/scripts.js"></script>
  <script src="<?= base_url('assets'); ?>/js/custom.js"></script>

  <!-- Page Specific JS File -->

  <!-- captcha -->
  <script>
$('#login').submit(function onClick(e) {
  e.preventDefault();
  grecaptcha.ready(function() {
    grecaptcha.execute('6LcpOzIaAAAAAKEumh8-l8j5I3m49hmsHKSggkxK', {
      action: 'submit'
    }).then(function(token) {
      $('#login').prepend('<input type="hidden" name="token" value="' + token +
        '">');
      $('#login').unbind('submit').submit();
    });
  });
});
  </script>
  </body>

  </html>