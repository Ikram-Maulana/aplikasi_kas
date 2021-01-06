<!-- content @s -->
<div class="nk-content nk-content-fluid">
  <div class="container-xl wide-lg">
    <div class="nk-content-body">

      <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
          <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title"><?= $title; ?></h3>
            <div class="nk-block-des text-soft">
              <p>User cards.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="row g-gs">
        <div class="col-sm-6 col-lg-4">
          <div class="card card-bordered">
            <div class="card-inner">
              <div class="team">
                <div class="user-card user-card-s2">
                  <div class="user-avatar lg bg-primary">
                    <span><img src="<?= base_url('images/profile/').$user['image']; ?>" alt=""></span>
                    <div class="status dot dot-lg dot-success"></div>
                  </div>
                  <div class="user-info">
                    <h6><?= $user['name']; ?></h6>
                    <span class="sub-text"><?php if($user['role_id'] == 1){
                      echo "Administrator";
                    }else {
                      echo "User";
                    } ?></span>
                  </div>
                </div>
                <ul class="team-info">
                  <li><span>Join Date</span><span><?= date('d F Y', $user['date_created']); ?></span></li>
                  <li><span>Email</span><span><?php 
                  if (strlen($user['email']) > 17) {
                    $email = substr($user['email'], 0, 17);
                    echo $email . " ...";
                  }else {
                    echo $user['email'];
                  }?></span></li>
                </ul>
                <div class="team-view">
                  <a href="<?= base_url('user/edit'); ?>" class="btn btn-block btn-dim btn-primary"><span>View
                      Profile</span></a>
                </div>
              </div><!-- .team -->
            </div><!-- .card-inner -->
          </div><!-- .card -->
        </div><!-- .col -->
      </div>

    </div>
  </div>
</div>