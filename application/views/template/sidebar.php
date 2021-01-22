<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="#">UPM UMMI</a>
    </div>
    <ul class="sidebar-menu">
      <?php
      $role_id = $this->session->userdata('role_id');
      $queryMenu = "SELECT `user_menu`.`id`, `menu` 
                    FROM `user_menu` JOIN `user_access_menu` 
                    ON `user_menu`.`id` = `user_access_menu`.`menu_id` 
                    WHERE `user_access_menu`.`role_id` = $role_id 
                    ORDER BY `user_access_menu`.`menu_id` ASC";
      $menu = $this->db->query($queryMenu)->result_array();
      ?>

      <!-- Looping Menu -->
      <?php foreach ($menu as $m) : ?>
      <li class="menu-header">
        <?= $m['menu']; ?>
      </li>

      <!-- Siapkan SubMenu sesuai menu -->
      <?php
        $menuId = $m['id'];
        $querySubMenu = "SELECT * 
                    FROM `user_sub_menu` JOIN `user_menu` 
                    ON `user_sub_menu`.`menu_id` = `user_menu`.`id` 
                    WHERE `user_sub_menu`.`menu_id` = $menuId
                    AND `user_sub_menu`.`is_active` = 1";
        $subMenu = $this->db->query($querySubMenu)->result_array();
        ?>

      <!-- Looping sub menu -->
      <?php foreach ($subMenu as $sm) : ?>
      <?php if ($title == $sm['title']) : ?>
      <li class="active">
        <?php else : ?>
      <li>
        <?php endif; ?>
        <a class="nav-link" href="<?= base_url($sm['url']); ?>">
          <i class="<?= $sm['icon']; ?>"></i>
          <span><?= $sm['title']; ?></span>
        </a>
      </li>
      <?php endforeach; ?>
      <?php endforeach; ?>

      <li>
        <a class="logout text-danger" href="<?= base_url('auth/logout'); ?>">
          <i class="fas fa-sign-out-alt text-danger"></i>
          <span>Sign Out</span>
        </a>
      </li>

  </aside>
</div>