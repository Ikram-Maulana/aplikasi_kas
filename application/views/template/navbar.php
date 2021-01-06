<div class="nk-app-root">
  <!-- main @s -->
  <div class="nk-main ">
    <!-- sidebar @s -->
    <div class="nk-sidebar nk-sidebar-fixed " data-content="sidebarMenu">
      <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-sidebar-brand">
          <a href="<?= site_url('#'); ?>" class="logo-link nk-sidebar-logo">
            <img class="logo-light logo-img" src="<?= base_url(''); ?>/images/logo.png"
              srcset="<?= base_url(''); ?>/images/logo2x.png 2x" alt="logo">
            <img class="logo-dark logo-img" src="<?= base_url(''); ?>/images/logo-dark.png"
              srcset="<?= base_url(''); ?>/images/logo-dark2x.png 2x" alt="logo-dark">
          </a>
        </div>
        <div class="nk-menu-trigger mr-n2">
          <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em
              class="icon ni ni-arrow-left"></em></a>
        </div>
      </div><!-- .nk-sidebar-element -->
      <div class="nk-sidebar-element">
        <div class="nk-sidebar-body" data-simplebar>
          <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu">
              <ul class="nk-menu">

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
                <li class="nk-menu-heading">
                  <h6 class="overline-title text-primary-alt">
                    <?= $m['menu']; ?>
                  </h6>
                </li><!-- .nk-menu-item -->

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
                <li class="nk-menu-item">
                  <a href="<?= base_url($sm['url']); ?>" class="nk-menu-link">
                    <span class="nk-menu-icon"><em class="<?= $sm['icon']; ?>"></em></span>
                    <span class="nk-menu-text"><?= $sm['title']; ?></span>
                  </a>
                </li><!-- .nk-menu-item -->
                <?php endforeach; ?>

                <?php endforeach; ?>

                <li class="nk-menu-item">
                  <a href="<?= base_url('auth/logout'); ?>" class="nk-menu-link logout">
                    <span class="nk-menu-icon"><em class="icon ni ni-signout"></em></span>
                    <span class="nk-menu-text">Sign Out</span>
                  </a>
                </li><!-- .nk-menu-item -->
              </ul><!-- .nk-menu -->
            </div><!-- .nk-sidebar-menu -->
          </div><!-- .nk-sidebar-content -->
        </div><!-- .nk-sidebar-body -->
      </div><!-- .nk-sidebar-element -->
    </div>
    <!-- sidebar @e -->
    <!-- wrap @s -->
    <div class="nk-wrap ">
      <!-- main header @s -->
      <div class="nk-header nk-header-fixed is-light">
        <div class="container-fluid">
          <div class="nk-header-wrap">
            <div class="nk-menu-trigger d-xl-none ml-n1">
              <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em
                  class="icon ni ni-menu"></em></a>
            </div>
            <div class="nk-header-brand d-xl-none">
              <a href="<?= site_url('#'); ?>" class="logo-link">
                <img class="logo-light logo-img" src="<?= base_url(''); ?>/images/logo.png"
                  srcset="<?= base_url(''); ?>/images/logo2x.png 2x" alt="logo">
                <img class="logo-dark logo-img" src="<?= base_url(''); ?>/images/logo-dark.png"
                  srcset="<?= base_url(''); ?>/images/logo-dark2x.png 2x" alt="logo">
              </a>
            </div><!-- .nk-header-brand -->
            <div class="nk-header-news d-none d-xl-block">
              <div class="nk-news-list">
                <b>Aplikasi Kas Unit Pers Mahasiswa <span class="badge badge-outline-primary">Beta</span></b>
              </div>
            </div><!-- .nk-header-news -->
            <div class="nk-header-tools">
              <ul class="nk-quick-nav">
                <li class="dropdown user-dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <div class="user-toggle">
                      <div class="user-avatar sm">
                        <img src="<?= base_url('images/profile/') . $user['image']; ?>">
                      </div>
                      <div class="user-info d-none d-md-block">
                        <div class="user-status"><?php
                                                  if ($user['role_id'] == 1) {
                                                    echo "Administrator";
                                                  } else {
                                                    echo "User";
                                                  }; ?></div>
                        <div class="user-name dropdown-indicator"><?= $user['name']; ?></div>
                      </div>
                    </div>
                  </a>
                  <div class="dropdown-menu dropdown-menu-md dropdown-menu-right dropdown-menu-s1">
                    <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                      <div class="user-card">
                        <div class="user-avatar">
                          <span><img src="<?= base_url('images/profile/') . $user['image']; ?>"></span>
                        </div>
                        <div class="user-info">
                          <span class="lead-text"><?= $user['name']; ?></span>
                          <span class="sub-text"><?= $user['email']; ?></span>
                        </div>
                      </div>
                    </div>
                    <div class="dropdown-inner">
                      <ul class="link-list">
                        <li><a href="<?= base_url('user/index'); ?>"><em class="icon ni ni-user-alt"></em><span>View
                              Profile</span></a></li>
                        <li><a class="dark-switch" href="#"><em class="icon ni ni-moon"></em><span>Dark Mode</span></a>
                        </li>
                      </ul>
                    </div>
                    <div class="dropdown-inner">
                      <ul class="link-list">
                        <li><a href="<?= base_url('auth/logout'); ?>" class="logout"><em
                              class="icon ni ni-signout"></em><span>Sign
                              out</span></a></li>
                      </ul>
                    </div>
                  </div>
                </li><!-- .dropdown -->
              </ul><!-- .nk-quick-nav -->
            </div><!-- .nk-header-tools -->
          </div><!-- .nk-header-wrap -->
        </div><!-- .container-fliud -->
      </div>
      <!-- main header @e -->