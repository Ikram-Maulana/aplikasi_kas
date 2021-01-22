<footer class="main-footer">
  <div class="footer-left">
    Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
  </div>
  <div class="footer-right">
    2.3.0
  </div>
</footer>
</div>
</div>

<!-- General JS Scripts -->
<script src="<?= base_url('assets'); ?>/modules/jquery-3.3.1.min.js"></script>
<script src="<?= base_url('assets'); ?>/modules/popper.min.js"></script>
<script src="<?= base_url('assets'); ?>/modules/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url('assets'); ?>/modules/nicescroll/jquery.nicescroll.min.js"></script>
<script src="<?= base_url('assets'); ?>/modules/moment.min.js"></script>
<script src="<?= base_url('assets'); ?>/js/stisla.js"></script>
<script src="<?= base_url('assets'); ?>/modules/fontawesome/js/2d24ac2742.js"></script>

<!-- JS Libraies -->
<script src="<?= base_url('assets'); ?>/modules/sweetalert/sweetalert.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/page/modules-sweetalert.js"></script>
<script src="<?= base_url('assets'); ?>/modules/datatables/datatables.min.js"></script>
<script src="<?= base_url('assets'); ?>/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets'); ?>/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
<script src="<?= base_url('assets'); ?>/modules/jquery-ui/jquery-ui.min.js"></script>

<!-- Template JS File -->
<script src="<?= base_url('assets'); ?>/js/scripts.js"></script>

<!-- Page Specific JS File -->
<script src="<?= base_url('assets'); ?>/js/page/modules-datatables.js"></script>

<script>
$('.custom-file-input').on('change', function() {
  let fileName = $(this).val().split('\\').pop();
  $(this).next('.custom-file-label').addClass("selected").html(fileName);
});


$('.form-check-input').on('click', function() {
  const menuId = $(this).data('menu');
  const roleId = $(this).data('role');

  $.ajax({
    url: "<?= base_url('admin/changeaccess'); ?>",
    type: 'post',
    data: {
      menuId: menuId,
      roleId: roleId
    },
    success: function() {
      document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
    }
  });
});
</script>

<script>
$(document).ready(function() {

  $("#name").on('change', function() {
    $(".data").hide();
    $("#" + $(this).val()).fadeIn(700);
  }).change();
});
</script>

</body>

</html>