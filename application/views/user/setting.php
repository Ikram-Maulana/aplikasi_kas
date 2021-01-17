 <!-- Main Content -->
 <div class="main-content">
   <section class="section">
     <div class="section-header">
       <h1>Personal Info</h1>
     </div>

     <div class="section-body">
       <h2 class="section-title"><?= $title; ?></h2>
       <p class="section-lead" style="margin-bottom: 0.5rem;">Laman untuk menyunting profile.</p>

       <div id="output-status"></div>
       <div class="row">
         <div class="col-md-4">
           <div class="card">
             <div class="card-header">
               <div class="user-avatar">
                 <div><img class="foto" src="<?= base_url('images/profile/') . $user['image']; ?>"></div>
               </div>
               <div class="user-info">
                 <span class="lead-text" style="font-weight: bold;"><?= $user['name']; ?></span>
                 <div class="sub-text"><?= $user['email']; ?></div>
               </div>
               <div class="user-action">
                 <div class="dropdown">
                   <a class="btn btn-trigger ml-3 mr-n2" style="color: #742930;" data-toggle="dropdown" href="#"><i
                       class="fas fa-angle-double-right fa-lg"></i></a>
                   <div class="dropdown-menu dropdown-menu-right">
                     <ul class="link-list-opt no-bdr" style="margin-bottom: 0px; list-style-type:none;">
                       <li><a href="#" data-toggle="modal" data-target="#photo-edit" style="color: #742930;"><em
                             class="fas fa-camera mr-2"></em><span>Change Photo</span></a></li>
                     </ul>
                   </div>
                 </div>
               </div>
             </div>
             <div class="card-body">
               <ul class="nav nav-pills flex-column">
                 <li class="nav-item"><a href="<?= base_url('user/edit'); ?>" class="nav-link">General</a></li>
                 <li class="nav-item"><a href="<?= base_url('user/setting'); ?>" class="nav-link active">Security</a>
                 </li>
               </ul>
             </div>
           </div>
         </div>
         <div class="col-md-8">
           <form id="setting-form">
             <div class="card" id="settings-card">
               <div class="card-header">
                 <h4>Personal Information</h4>
               </div>
               <div class="card-body">
                 <p class="text-muted">Basic info, like your name and email, that you use on Kas Applications.
                 </p>
                 <div class="between-center flex-wrap g-3">
                   <div class="nk-block-text">
                     <h6>Change Password</h6>
                     <p>Set a unique password to protect your account.</p>
                   </div>
                   <div class="nk-block-actions flex-shrink-sm-0">
                     <a href="#" class="btn btn-primary mb-2" data-toggle="modal" data-target="#password-edit">Change
                       Password</a>
                     </ul>
                   </div>
                 </div>
               </div>
             </div>
           </form>
         </div>
       </div>
     </div>
   </section>
 </div>

 </div>
 </section>
 </div>

 <!-- Modal Form -->
 <div class="modal fade" tabindex="-1" id="password-edit">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title">Update Profile</h5>
         <a href="#" class="close" data-dismiss="modal" aria-label="Close">
           <em class="fas fa-times"></em>
         </a>
       </div>
       <div class="berhasil" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>"></div>
       <div class="gagal" data-flashdata="<?= $this->session->flashdata('gagal'); ?>"></div>
       <div class="modal-body">
         <form action="<?= base_url('user/setting') ?>" class="form-validate is-alter" method="post">
           <input type="hidden" class="form-control" id="email" name="email" value="<?= $user['email']; ?>">
           <div class="form-group mb-2">
             <label class="form-label" for="current_password">Current Password</label>
             <div class="form-control-wrap">
               <input type="password" class="form-control" id="current_password" name="current_password" required>
               <?= form_error('current_password', '<span id="fva-message-error" class="invalid">', '</span>'); ?>
             </div>
           </div>
           <div class="form-group mb-2">
             <label class="form-label" for="new_password1">New Password</label>
             <div class="form-control-wrap">
               <input type="password" class="form-control" id="new_password1" name="new_password1" required>
               <?= form_error('new_password1', '<span id="fva-message-error" class="invalid">', '</span>'); ?>
             </div>
           </div>
           <div class="form-group mb-2">
             <label class="form-label" for="new_password2">Repeat Password</label>
             <div class="form-control-wrap">
               <input type="password" class="form-control" id="new_password2" name="new_password2" required>
               <?= form_error('new_password2', '<span id="fva-message-error" class="invalid">', '</span>'); ?>
             </div>
           </div>
           <div class="mt-3">
             <button type="submit" class="btn btn-lg btn-primary">Change Password</button>
           </div>
       </div>
       <div class="modal-footer bg-light">
         <span class="sub-text">© 2020 Ikram Maulana.</span>
       </div>
     </div>
   </div>
 </div>