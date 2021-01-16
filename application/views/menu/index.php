     <!-- Main Content -->
     <div class="main-content">
       <section class="section">
         <div class="section-header">
           <h1>Menu</h1>
         </div>

         <!-- if empty -->
         <?php if (empty($menu)) : ?>
         <div class="example-alert">
           <div class="alert alert-fill alert-danger alert-icon mb-2"><em class="icon ni ni-alert-circle"></em>
             <strong>Data Tidak Ditemukan</strong>
           </div>
         </div>
         <?php endif; ?>

         <div class="section-body">
           <h2 class="section-title"><?= $title; ?></h2>
           <p class="section-lead" style="margin-bottom: 0.5rem;">Laman untuk me-manage menu.</p>
           <a href="#" class="section-lead btn btn-primary mb-4" data-toggle="modal" data-target="#modalForm">Add New
             Menu</a>

           <div class="row">
             <div class="col-12">
               <div class="card">
                 <div class="card-header">
                   <h4>Menu Management</h4>
                 </div>
                 <div class="card-body">
                   <div class="table-responsive">
                     <table class="table table-striped tables-1">
                       <thead>
                         <tr>
                           <th>#</th>
                           <th>Menu</th>
                           <th>Action</th>
                         </tr>
                       </thead>
                       <tbody>
                         <?php
                          $no = 1;
                          foreach ($menu as $m) :
                          ?>
                         <tr>
                           <td>
                             <?= $no++; ?>
                           </td>
                           <td><?= $m['menu']; ?></td>
                           <td>
                             <a class="btn btn-warning text-light" data-toggle="modal"
                               data-target="#editForm<?= $m['id']; ?>">
                               <span>Edit</span>
                             </a>
                             <a class="btn btn-danger del-btn" href="<?= base_url('menu/hapusm/') . $m['id']; ?>">
                               <span>Delete</span>
                             </a>
                           </td>
                         </tr>
                         <?php endforeach; ?>
                       </tbody>
                     </table>
                   </div>
                   <?= $this->pagination->create_links(); ?>
                 </div>
               </div>
             </div>
           </div>

         </div>
       </section>
     </div>

     <!-- Modal Form -->
     <div class="modal fade" tabindex="-1" id="modalForm">
       <div class="modal-dialog" role="document">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title">Add New Menu</h5>
             <a href="#" class="close" data-dismiss="modal" aria-label="Close">
               <em class="fas fa-times"></em>
             </a>
           </div>
           <div class="berhasil" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>"></div>
           <div class="modal-body style=" style="padding-bottom: 0px;">
             <form action="<?= base_url('menu') ?>" class="form-validate is-alter" method="post">
               <div class="form-group" style="margin-bottom: 1rem;">
                 <label class="form-label" for="menu">Menu Name</label>
                 <div class="form-control-wrap">
                   <input type="text" class="form-control" id="menu" name="menu" required>
                 </div>
               </div>
               <div class="form-group">
                 <button type="submit" class="btn btn-lg btn-primary">Add</button>
               </div>
             </form>
           </div>
           <div class="modal-footer bg-light">
             <span class="sub-text">© 2020 Ikram Maulana.</span>
           </div>
         </div>
       </div>
     </div>

     <!-- Modal Form -->
     <?php
      $no = 0;
      foreach ($menu as $m) : $no++;
      ?>
     <div class="modal fade" tabindex="-1" id="editForm<?= $m['id']; ?>">
       <div class="modal-dialog" role="document">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title">Edit Menu</h5>
             <a href="#" class="close" data-dismiss="modal" aria-label="Close">
               <em class="fas fa-times"></em>
             </a>
           </div>
           <div class="berhasil" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>"></div>
           <div class="modal-body" style="padding-bottom: 0px;">
             <form action="<?= base_url('menu/editmenu/' . $m['id']); ?>" class="form-validate is-alter" method="post">
               <input type="hidden" name="id" value="<?php echo $m['id']; ?>">
               <div class="form-group" style="margin-bottom: 1rem;">
                 <label class="form-label" for="menu">Menu Name</label>
                 <div class="form-control-wrap">
                   <input type="text" class="form-control" id="menu" name="menu" value="<?= $m['menu'] ?>" required>
                   <?= form_error('menu', '<span id="fva-message-error" class="invalid">', '</span>'); ?>
                 </div>
               </div>
               <div class="form-group">
                 <button type="submit" class="btn btn-lg btn-primary">Edit</button>
               </div>
             </form>
           </div>
           <div class="modal-footer bg-light">
             <span class="sub-text">© 2020 Ikram Maulana.</span>
           </div>
         </div>
       </div>
     </div>
     <?php endforeach; ?>