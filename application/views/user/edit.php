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
                 <div class="sub-text"><span><?php
                                              if (strlen($user['email']) > 17) {
                                                $email = substr($user['email'], 0, 17);
                                                echo $email . " ...";
                                              } else {
                                                echo $user['email'];
                                              } ?></span></div>
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
                 <li class="nav-item"><a href="<?= base_url('user/edit'); ?>" class="nav-link active">General</a></li>
                 <li class="nav-item"><a href="<?= base_url('user/setting'); ?>" class="nav-link">Security</a></li>
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
                 <div class="form-group row align-items-center" style="margin-bottom: 10px;">
                   <label for="site-title" class="form-control-label col-sm-3 text-md-right">Full Name</label>
                   <div class="col-sm-6 col-md-9" style="margin-bottom: 6.5px;">
                     <span name="site_title" id="site-title"><?= $user['name']; ?></span>
                   </div>
                 </div>
                 <div class="form-group row align-items-center" style="margin-bottom: 10px;">
                   <label for="site-title" class="form-control-label col-sm-3 text-md-right">Email</label>
                   <div class="col-sm-6 col-md-9" style="margin-bottom: 6.5px;">
                     <span name="site_title" id="site-title"><?= $user['email']; ?></span>
                   </div>
                 </div>
                 <div class="form-group row align-items-center" style="margin-bottom: 10px;">
                   <label for="site-title" class="form-control-label col-sm-3 text-md-right">Phone Number</label>
                   <div class="col-sm-6 col-md-9" style="margin-bottom: 6.5px;">
                     <span name="site_title" id="site-title">
                       <?php if ($user['phone'] == NULL) : ?>
                       Not add yet
                       <?php else : ?>
                       <?= $user['phone']; ?>
                       <?php endif; ?></span>
                   </div>
                 </div>
                 <div class="form-group row align-items-center" style="margin-bottom: 10px;">
                   <label for="site-title" class="form-control-label col-sm-3 text-md-right">Birth Date</label>
                   <div class="col-sm-6 col-md-9" style="margin-bottom: 6.5px;">
                     <span name="site_title" id="site-title">
                       <?php if ($user['birthday'] == NULL) : ?>
                       Not add yet
                       <?php else : ?>
                       <?= $user['birthday']; ?>
                       <?php endif; ?>
                     </span>
                   </div>
                 </div>
                 <div class="form-group row align-items-center" style="margin-bottom: 10px;">
                   <label for="site-title" class="form-control-label col-sm-3 text-md-right">Address</label>
                   <div class="col-sm-6 col-md-9" style="margin-bottom: 6.5px;">
                     <span name="site_title" id="site-title">
                       <?php if ($user['address'] == NULL) : ?>
                       Not add yet
                       <?php else : ?>
                       <?= $user['address']; ?>
                       <?php endif; ?>
                     </span>
                   </div>
                 </div>
                 <div class="form-group row align-items-center" style="margin-bottom: 10px;">
                   <label for="site-title" class="form-control-label col-sm-3 text-md-right">Join Date</label>
                   <div class="col-sm-6 col-md-9" style="margin-bottom: 6.5px;">
                     <span name="site_title" id="site-title"><?= date('d F Y', $user['date_created']); ?></span>
                   </div>
                 </div>
               </div>
               <div class="card-footer bg-whitesmoke text-md-right">
                 <a class="btn btn-warning text-light" data-toggle="modal" data-target="#profile-edit">
                   <span>Edit</span>
                 </a>
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
 <div class="modal fade" tabindex="-1" id="profile-edit">
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
       <div class="modal-body mb-1">
         <form action="<?= base_url('user/edit') ?>" class="form-validate is-alter" enctype="multipart/form-data"
           method="post" accept-charset="utf-8">
           <input type="hidden" class="form-control" id="email" name="email" value="<?= $user['email']; ?>">
           <div class="form-group mb-2">
             <label class="form-label" for="name">Full Name</label>
             <div class="form-control-wrap">
               <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>" required>
               <?= form_error('name', '<div class="text-danger"><small>', '</small></div>'); ?>
             </div>
           </div>
           <div class="form-group mb-2">
             <label class="form-label" for="phone">Phone Number</label>
             <div class="form-control-wrap">
               <input type="text" class="form-control" id="phone" name="phone" value="<?= $user['phone']; ?>" required>
               <?= form_error('phone', '<div class="text-danger"><small>', '</small></div>'); ?>
             </div>
           </div>
           <div class="form-group mb-2">
             <label class="form-label" for="birthday">Birthday Date</label>
             <div class="form-control-wrap">
               <input type="date" class="form-control date-picker" id="birthday" name="birthday"
                 value="<?= $user['birthday']; ?>" required>
               <div class="form-note">Date format <code>mm/dd/yyyy</code></div>
               <?= form_error('birthday', '<div class="text-danger"><small>', '</small></div>'); ?>
             </div>
           </div>
           <div class="form-group mb-2">
             <label class="form-label" for="address">Address</label>
             <div class="form-control-wrap">
               <input type="text" class="form-control" id="address" name="address" value="<?= $user['address']; ?>"
                 required>
               <?= form_error('address', '<div class="text-danger"><small>', '</small></div>'); ?>
             </div>
           </div>
           <div class="mt-3">
             <button type="submit" class="btn btn-lg btn-primary">Update Profile</button>
             </ul>
           </div>
       </div>
       <div class="modal-footer bg-light">
         <span class="sub-text">Copyright © 2018
           Design By Muhamad Nauval Azhar </span>
       </div>
     </div>
   </div>
 </div>

 <!-- Modal Form -->
 <div class="modal fade" tabindex="-1" id="photo-edit">
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
       <div class="modal-body mb-2">
         <form action="<?= base_url('user/edit') ?>" class="form-validate is-alter" enctype="multipart/form-data"
           method="post" accept-charset="utf-8">
           <input type="hidden" class="form-control" id="email" name="email" value="<?= $user['email']; ?>">
           <div class="col-md-12">
             <div class="form-group row">
               <label class="form-label col-sm-2" for="image">Picture</label>
               <div class="col-sm-10">
                 <div class="row">
                   <div class="col-sm-3">
                     <img src="<?= base_url('images/profile/') . $user['image'] ?>?" class="img-thumbnail">
                   </div>
                   <div class="col-md-9">
                     <div class="custom-file">
                       <div class="form-control-wrap">
                         <input type="file" id="image" name="image" class="custom-file-input" id="customFile">
                         <label class="custom-file-label" for="image">Choose file</label>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
           </div>
           <div class="mt-3">
             <button type="submit" class="btn btn-lg btn-primary">Update Profile</button>
             </ul>
           </div>
       </div>
       <div class="modal-footer bg-light">
         <span class="sub-text">Copyright © 2018
           Design By Muhamad Nauval Azhar </span>
       </div>
     </div>
   </div>
 </div>