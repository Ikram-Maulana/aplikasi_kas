<!-- footer @s -->
<div class="nk-footer">
  <div class="container-fluid">
    <div class="nk-footer-wrap">
      <div class="nk-footer-copyright"> &copy; 2020 Ikram Maulana. Created for <a href="https://upmummi.my.id"
          target="_blank">Unit Pers Mahasiswa UMMI</a>
      </div>
    </div>
  </div>
</div>
<!-- footer @e -->
</div>
<!-- wrap @e -->
</div>
<!-- main @e -->
</div>
<!-- app-root @e -->
<!-- JavaScript -->
<script src="<?= base_url('assets'); ?>/js/bundle.js?ver=2.2.0"></script>
<script src="<?= base_url('assets'); ?>/js/scripts.js?ver=2.2.0"></script>
<script src="<?= base_url('assets'); ?>/js/example-sweetalert.js?ver=2.2.0"></script>

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


</body>

</html>