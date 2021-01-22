<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Profile</h1>
    </div>

    <div class="section-body">
      <h2 class="section-title"><?= $title; ?></h2>
      <p class="section-lead" style="margin-bottom: 0.5rem;">Laman untuk me-manage profile.</p>

      <div class="row g-gs">
        <div class="col-sm-6 col-lg-4">
          <div class="card card-bordered card-primary">
            <div class="card-inner">
              <div class="team">
                <div class="user-card user-card-s2">
                  <div class="user-avatar lg">
                    <span><img src="<?= base_url('images/profile/') . $user['image']; ?>" class="rounded-circle"
                        style="margin-left: 38%;margin-top: 2rem;margin-bottom: 1rem; width: 80px; height: 80px; border-radius: 50% !important;"></span>
                  </div>
                  <div class="user-info">
                    <h6 style="margin-left: 32.5%;"><?= $user['name']; ?></h6>
                    <?php if ($user['role_id'] == 1) { ?>
                    <span class="sub-text" style="margin-left: 35%;margin-bottom: 2rem;">
                      <?= "Administrator";
                    } else { ?>
                      <span class="sub-text" style="margin-left: 44%;margin-bottom: 2rem;">
                        <?= "User";
                      } ?></span>
                  </div>
                </div>
                <ul class="team-info mt-3" style="list-style-type:none;">
                  <li
                    style="display: flex;align-items: center;justify-content: space-between;font-size: .9375rem;line-height: 1.75rem;padding-right: 2rem;">
                    <span><strong>Join Date</strong></span><span><?= date('d F Y', $user['date_created']); ?></span>
                  </li>
                  <li
                    style="display: flex;align-items: center;justify-content: space-between;font-size: .9375rem;line-height: 1.75rem;padding-right: 2rem;">
                    <span><strong>Email</strong></span><span><?php
                                                              if (strlen($user['email']) > 17) {
                                                                $email = substr($user['email'], 0, 17);
                                                                echo $email . " ...";
                                                              } else {
                                                                echo $user['email'];
                                                              } ?></span>
                  </li>
                </ul>
                <div class="team-view" style="margin-right: 10%;margin-left: 10%;margin-bottom: 2rem;">
                  <a href="<?= base_url('user/edit'); ?>" class="btn btn-block btn-dim btn-primary"><span>View
                      Profile</span></a>
                </div>
              </div><!-- .team -->
            </div><!-- .card-inner -->
          </div><!-- .card -->
        </div><!-- .col -->
      </div>

    </div>
  </section>
</div>