     <!-- Main Content -->
     <div class="main-content">
       <section class="section">
         <div class="section-header">
           <h1>Submenu</h1>
         </div>

         <div class="section-body">
           <h2 class="section-title"><?= $title; ?></h2>
           <p class="section-lead" style="margin-bottom: 0.5rem;">Laman untuk me-manage menu.</p>
           <a href="#" class="section-lead btn btn-primary mb-4" data-toggle="modal" data-target="#modalForm">Add New
             Submenu</a>

           <!-- if empty -->
           <?php if (empty($subMenu)) : ?>
           <div class="example-alert">
             <div class="alert alert-fill alert-danger alert-icon mb-2"><em class="fas fa-exclamation-circle mr-2"></em>
               <strong>Data Tidak Ditemukan</strong>
             </div>
           </div>
           <?php endif; ?>

           <div class="row">
             <div class="col-12">
               <div class="card card-primary">
                 <div class="card-header">
                   <h4>Sub Menu Management</h4>
                 </div>
                 <div class="card-body">
                   <div class="table-responsive">
                     <table class="table table-striped tables-1">
                       <thead>
                         <tr>
                           <th>#</th>
                           <th>Title</th>
                           <th>Menu</th>
                           <th>Url</th>
                           <th>Icon</th>
                           <th>Status</th>
                           <th>Action</th>
                         </tr>
                       </thead>
                       <tbody>
                         <?php
                          $no = 1;
                          foreach ($subMenu as $sm) :
                          ?>
                         <tr>
                           <td>
                             <?= $no++; ?>
                           </td>
                           <td><?= $sm['title']; ?></td>
                           <td><?= $sm['menu']; ?></td>
                           <td><?= $sm['url']; ?></td>
                           <td><?= $sm['icon']; ?></td>
                           <td>
                             <?php if ($sm['is_active'] == 1) : ?>
                             <span class="text-success">Active</span>
                             <?php else : ?>
                             <span class="text-danger">Non-Active</span>
                             <?php endif; ?>
                           </td>
                           <td>
                             <a class="btn btn-warning text-light" data-toggle="modal"
                               data-target="#editForm<?= $sm['id']; ?>">
                               <span>Edit</span>
                             </a>
                             <a class="btn btn-danger del-btn" href="<?= base_url('menu/hapussm/') . $sm['id']; ?>">
                               <span>Delete</span>
                             </a>
                           </td>
                         </tr>
                         <?php endforeach; ?>
                       </tbody>
                     </table>
                   </div>
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
             <h5 class="modal-title">Add New Sub Menu</h5>
             <a href="#" class="close" data-dismiss="modal" aria-label="Close">
               <em class="fas fa-times"></em>
             </a>
           </div>
           <div class="berhasil" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>"></div>
           <div class="modal-body" style="padding-bottom: 0px;">
             <form action="<?= base_url('menu/submenu'); ?>" class="form-validate is-alter" method="post">
               <div class="form-group">
                 <label class="form-label" for="title">Submenu Title</label>
                 <div class="form-control-wrap">
                   <input type="text" class="form-control" id="title" name="title" required>
                   <?= form_error('title', '<div class="text-danger"><small>', '</small></div>'); ?>
                 </div>
               </div>
               <div class="form-group">
                 <label class="form-label" for="menu">Menu</label>
                 <div class="form-control-wrap ">
                   <select name="menu_id" class="form-control form-select form-control-lg" id="menu"
                     data-placeholder="Select Menu" required>
                     <option label="" value="">Select Menu</option>
                     <?php foreach ($menu as $m) : ?>
                     <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                     <?php endforeach; ?>
                   </select>
                 </div>
               </div>
               <div class="form-group">
                 <label class="form-label" for="url">Submenu Url</label>
                 <div class="form-control-wrap">
                   <input type="text" class="form-control" id="url" name="url" required>
                   <?= form_error('url', '<div class="text-danger"><small>', '</small></div>'); ?>
                 </div>
               </div>
               <div class="form-group">
                 <label class="form-label" for="icon">Submenu Icon</label>
                 <div class="form-control-wrap">
                   <input type="text" class="form-control" id="icon" name="icon" required>
                   <?= form_error('icon', '<div class="text-danger"><small>', '</small></div>'); ?>
                 </div>
               </div>
               <div class="form-group mb-4">
                 <div class="preview-block">
                   <span class="preview-title overline-title">Active Status</span>
                   <br>
                   <div class="radio mt-3">
                     <div class="form-check form-check-inline">
                       <input class="form-check-input" type="radio" name="is_active" id="inlineRadio1" value="1">
                       <label class="form-check-label" for="inlineRadio1">Active</label>
                     </div>
                     <div class="form-check form-check-inline">
                       <input class="form-check-input" type="radio" name="is_active" id="inlineRadio2" value="0">
                       <label class="form-check-label" for="inlineRadio2">Non-Active</label>
                     </div>
                   </div>
                 </div>
               </div>
               <div class="form-group style=">
                 <button type="submit" class="btn btn-lg btn-primary">Add</button>
               </div>
             </form>
           </div>
           <div class="modal-footer bg-light">
             <span class="sub-text">Copyright © 2018
               Design By Muhamad Nauval Azhar </span>
           </div>
         </div>
       </div>
     </div>

     <!-- Modal Form -->
     <?php
      $no = 0;
      foreach ($subMenu as $sm) : $no++;
      ?>
     <div class="modal fade" tabindex="-1" id="editForm<?= $sm['id']; ?>">
       <div class="modal-dialog" role="document">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title">Edit Sub Menu</h5>
             <a href="#" class="close" data-dismiss="modal" aria-label="Close">
               <em class="fas fa-times"></em>
             </a>
           </div>
           <div class="berhasil" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>"></div>
           <div class="modal-body" style="padding-bottom: 0px;">
             <form action="<?= base_url('menu/editsubmenu/' . $sm['id']); ?>" class="form-validate is-alter"
               method="post">
               <input type="hidden" name="id" value="<?php echo $sm['id']; ?>">
               <div class="form-group">
                 <label class="form-label" for="title">Submenu Title</label>
                 <div class="form-control-wrap">
                   <input type="text" class="form-control" id="title" name="title" value="<?= $sm['title'] ?>" required>
                   <?= form_error('title', '<div class="text-danger"><small>', '</small></div>'); ?>
                 </div>
               </div>
               <div class="form-group">
                 <label class="form-label" for="menu">Menu</label>
                 <div class="form-control-select ">
                   <select name="menu_id" class="form-control" id="menu" required>
                     <?php foreach ($menu as $m) : ?>
                     <option value="<?= $m['id']; ?>" <?php if ($sm['menu_id'] == $m['id']) :
                                                            echo "selected";
                                                          endif; ?>>
                       <?= $m['menu']; ?></option>
                     <?php endforeach; ?>
                   </select>
                 </div>
               </div>
               <div class="form-group">
                 <label class="form-label" for="url">Submenu Url</label>
                 <div class="form-control-wrap">
                   <input type="text" class="form-control" id="url" name="url" value="<?= $sm['url']; ?>" required>
                   <?= form_error('url', '<div class="text-danger"><small>', '</small></div>'); ?>
                 </div>
               </div>
               <div class="form-group">
                 <label class="form-label" for="icon">Submenu Icon</label>
                 <div class="form-control-wrap">
                   <input type="text" class="form-control" id="icon" name="icon" value="<?= $sm['icon']; ?>" required>
                   <?= form_error('icon', '<div class="text-danger"><small>', '</small></div>'); ?>
                 </div>
               </div>
               <div class="form-group mb-4">
                 <div class="preview-block">
                   <span class="preview-title overline-title">Active Status</span>
                   <br>
                   <div class="radio mt-3">
                     <?php if ($sm['is_active'] == 1) : ?>
                     <div class="form-check form-check-inline">
                       <input class="form-check-input" type="radio" name="is_active" id="inlineRadio1" value="1"
                         checked>
                       <label class="form-check-label" for="inlineRadio1">Active</label>
                     </div>
                     <div class="form-check form-check-inline">
                       <input class="form-check-input" type="radio" name="is_active" id="inlineRadio2" value="0">
                       <label class="form-check-label" for="inlineRadio2">Non-Active</label>
                     </div>
                     <?php else : ?>
                     <div class="form-check form-check-inline">
                       <input class="form-check-input" type="radio" name="is_active" id="inlineRadio1" value="1">
                       <label class="form-check-label" for="inlineRadio1">Active</label>
                     </div>
                     <div class="form-check form-check-inline">
                       <input class="form-check-input" type="radio" name="is_active" id="inlineRadio2" value="0"
                         checked>
                       <label class="form-check-label" for="inlineRadio2">Non-Active</label>
                     </div>
                     <?php endif; ?>
                   </div>
                 </div>
               </div>
               <div class="form-group">
                 <button type="submit" class="btn btn-lg btn-primary">Edit</button>
               </div>
             </form>
           </div>
           <div class="modal-footer bg-light">
             <span class="sub-text">Copyright © 2018
               Design By Muhamad Nauval Azhar </span>
           </div>
         </div>
       </div>
     </div>
     <?php endforeach; ?>