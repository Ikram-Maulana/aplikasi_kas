 <!-- content @s -->
 <div class="nk-content nk-content-fluid">
   <div class="container-xl wide-lg">
     <div class="nk-content-body">
       <div class="nk-block">
         <div class="card card-bordered">
           <div class="card-aside-wrap">
             <div class="card-inner card-inner-lg">
               <div class="nk-block-head nk-block-head-lg">
                 <div class="nk-block-between">
                   <div class="nk-block-head-content">
                     <h4 class="nk-block-title">Personal Information</h4>
                     <div class="nk-block-des">
                       <p>Basic info, like your name and email, that you use on Kas Applications.</p>
                     </div>
                   </div>
                   <div class="nk-block-head-content align-self-start d-lg-none">
                     <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em
                         class="icon ni ni-menu-alt-r"></em></a>
                   </div>
                 </div>
               </div><!-- .nk-block-head -->
               <div class="nk-block">
                 <div class="nk-data data-list">
                   <div class="data-head">
                     <h6 class="overline-title">Basics</h6>
                   </div>
                   <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                     <div class="data-col">
                       <span class="data-label">Full Name</span>
                       <span class="data-value"><?= $user['name']; ?></span>
                     </div>
                     <div class="data-col data-col-end"><span class="data-more"><em
                           class="icon ni ni-forward-ios"></em></span></div>
                   </div><!-- data-item -->
                   <div class="data-item">
                     <div class="data-col">
                       <span class="data-label">Email</span>
                       <span class="data-value"><?= $user['email']; ?></span>
                     </div>
                     <div class="data-col data-col-end"><span class="data-more disable"><em
                           class="icon ni ni-lock-alt"></em></span></div>
                   </div><!-- data-item -->
                   <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                     <div class="data-col">
                       <span class="data-label">Phone Number</span>
                       <span class="data-value">
                         <?php if($user['phone'] == NULL) : ?>
                         Not add yet
                         <?php else: ?>
                         <?= $user['phone']; ?>
                         <?php endif; ?>
                       </span>
                     </div>
                     <div class="data-col data-col-end"><span class="data-more"><em
                           class="icon ni ni-forward-ios"></em></span></div>
                   </div><!-- data-item -->
                   <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                     <div class="data-col">
                       <span class="data-label">Date of Birth</span>
                       <span class="data-value">
                         <?php if($user['birthday'] == NULL) : ?>
                         Not add yet
                         <?php else: ?>
                         <?= $user['birthday']; ?>
                         <?php endif; ?>
                       </span>
                     </div>
                     <div class="data-col data-col-end"><span class="data-more"><em
                           class="icon ni ni-forward-ios"></em></span></div>
                   </div><!-- data-item -->
                   <div class="data-item" data-toggle="modal" data-target="#profile-edit" data-tab-target="#address">
                     <div class="data-col">
                       <span class="data-label">Address</span>
                       <?php if($user['address'] == NULL) : ?>
                       <span class="data-value text-soft">
                         Not add yet
                         <?php else: ?>
                         <span class="data-value">
                           <?= $user['address']; ?>
                           <?php endif; ?>
                         </span>
                     </div>
                     <div class="data-col data-col-end"><span class="data-more"><em
                           class="icon ni ni-forward-ios"></em></span></div>
                   </div><!-- data-item -->
                   <div class="data-item">
                     <div class="data-col">
                       <span class="data-label">Join Date</span>
                       <span class="data-value"><?= date('d F Y', $user['date_created']); ?></span>
                     </div>
                     <div class="data-col data-col-end"><span class="data-more disable"><em
                           class="icon ni ni-lock-alt"></em></span></div>
                   </div><!-- data-item -->
                 </div><!-- data-list -->
               </div><!-- .nk-block -->
             </div>
             <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg"
               data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
               <div class="card-inner-group" data-simplebar>
                 <div class="card-inner">
                   <div class="user-card">
                     <div class="user-avatar bg-primary">
                       <span><img src="<?= base_url('images/profile/').$user['image']; ?>"></span>
                     </div>
                     <div class="user-info">
                       <span class="lead-text"><?= $user['name']; ?></span>
                       <span class="sub-text"><?= $user['email']; ?></span>
                     </div>
                     <div class="user-action">
                       <div class="dropdown">
                         <a class="btn btn-icon btn-trigger mr-n2" data-toggle="dropdown" href="#"><em
                             class="icon ni ni-more-v"></em></a>
                         <div class="dropdown-menu dropdown-menu-right">
                           <ul class="link-list-opt no-bdr">
                             <li><a href="#" data-toggle="modal" data-target="#photo-edit"><em
                                   class="icon ni ni-camera-fill"></em><span>Change Photo</span></a></li>
                             <li><a href="#" data-toggle="modal" data-target="#profile-edit"><em
                                   class="icon ni ni-edit-fill"></em><span>Update Profile</span></a></li>
                           </ul>
                         </div>
                       </div>
                     </div>
                   </div><!-- .user-card -->
                 </div><!-- .card-inner -->
                 <div class="card-inner p-0">
                   <ul class="link-list-menu">
                     <li><a class="active" href="<?= base_url('user/edit'); ?>"><em
                           class="icon ni ni-user-fill-c"></em><span>Personal Infomation</span></a></li>
                     <li><a href="<?= base_url('user/setting'); ?>"><em
                           class="icon ni ni-lock-alt-fill"></em><span>Security Settings</span></a></li>
                   </ul>
                 </div><!-- .card-inner -->
               </div><!-- .card-inner-group -->
             </div><!-- card-aside -->
           </div><!-- .card-aside-wrap -->
         </div><!-- .card -->
       </div><!-- .nk-block -->
     </div>
   </div>
 </div>
 <!-- content @e -->

 <!-- Modal Form -->
 <div class="modal fade" tabindex="-1" id="profile-edit">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title">Update Profile</h5>
         <a href="#" class="close" data-dismiss="modal" aria-label="Close">
           <em class="icon ni ni-cross"></em>
         </a>
       </div>
       <div class="berhasil" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>"></div>
       <div class="gagal" data-flashdata="<?= $this->session->flashdata('gagal'); ?>"></div>
       <div class="modal-body">
         <form action="<?= base_url('user/edit') ?>" class="form-validate is-alter" enctype="multipart/form-data"
           method="post" accept-charset="utf-8">
           <input type="hidden" class="form-control" id="email" name="email" value="<?= $user['email']; ?>">
           <div class="form-group">
             <label class="form-label" for="name">Full Name</label>
             <div class="form-control-wrap">
               <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>" required>
               <?= form_error('name', '<span id="fva-message-error" class="invalid">', '</span>'); ?>
             </div>
           </div>
           <div class="form-group">
             <label class="form-label" for="phone">Phone Number</label>
             <div class="form-control-wrap">
               <input type="text" class="form-control" id="phone" name="phone" value="<?= $user['phone']; ?>" required>
               <?= form_error('phone', '<span id="fva-message-error" class="invalid">', '</span>'); ?>
             </div>
           </div>
           <div class="form-group">
             <label class="form-label" for="birthday">Birthday Date</label>
             <div class="form-control-wrap">
               <input type="text" class="form-control date-picker" id="birthday" name="birthday"
                 value="<?= $user['birthday']; ?>" required>
               <div class="form-note">Date format <code>mm/dd/yyyy</code></div>
               <?= form_error('birthday', '<span id="fva-message-error" class="invalid">', '</span>'); ?>
             </div>
           </div>
           <div class="form-group">
             <label class="form-label" for="address">Address</label>
             <div class="form-control-wrap">
               <input type="text" class="form-control" id="address" name="address" value="<?= $user['address']; ?>"
                 required>
               <?= form_error('address', '<span id="fva-message-error" class="invalid">', '</span>'); ?>
             </div>
           </div>
           <div class="mt-3">
             <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
               <li>
                 <button type="submit" class="btn btn-lg btn-primary">Update Profile</button>
               </li>
               <li>
                 <a href="#" data-dismiss="modal" class="link link-light">Cancel</a>
               </li>
             </ul>
           </div>
       </div>
       <div class="modal-footer bg-light">
         <span class="sub-text">© 2020 Ikram Maulana.</span>
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
           <em class="icon ni ni-cross"></em>
         </a>
       </div>
       <div class="berhasil" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>"></div>
       <div class="gagal" data-flashdata="<?= $this->session->flashdata('gagal'); ?>"></div>
       <div class="modal-body">
         <form action="<?= base_url('user/edit') ?>" class="form-validate is-alter" enctype="multipart/form-data"
           method="post" accept-charset="utf-8">
           <input type="hidden" class="form-control" id="email" name="email" value="<?= $user['email']; ?>">
           <div class="col-md-12">
             <div class="form-group row">
               <label class="form-label col-sm-2" for="image">Picture</label>
               <div class="col-sm-10">
                 <div class="row">
                   <div class="col-sm-3">
                     <img src="<?= base_url('images/profile/').$user['image'] ?>?" class="img-thumbnail">
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
             <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
               <li>
                 <button type="submit" class="btn btn-lg btn-primary">Update Profile</button>
               </li>
               <li>
                 <a href="#" data-dismiss="modal" class="link link-light">Cancel</a>
               </li>
             </ul>
           </div>
       </div>
       <div class="modal-footer bg-light">
         <span class="sub-text">© 2020 Ikram Maulana.</span>
       </div>
     </div>
   </div>
 </div>