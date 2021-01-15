 <!-- Main Content -->
 <div class="main-content">
   <section class="section">
     <div class="section-header">
       <h1>Dashboard</h1>
       <a href="<?= base_url('laporan/index'); ?>"
         class="btn btn-white btn-dim btn-outline-primary laporan btn-icon icon-left"><i
           class="fas fa-file-excel mr-2"></i><span>Laporan</span></a></li>
     </div>

     <div class="section-body">
       <div class="row">
         <div class="col-lg-4 col-md-6 col-sm-6 col-12">
           <div class="card card-statistic-1">
             <div class="card-icon bg-primary">
               <i class="fas fa-donate"></i>
             </div>
             <div class="card-wrap">
               <div class="card-header">
                 <h4>Total Dana Masuk</h4>
               </div>
               <div class="card-body">
                 Rp
                 <?= number_format($total_masuk['nominal']); ?>
               </div>
             </div>
           </div>
         </div>
         <div class="col-lg-4 col-md-6 col-sm-6 col-12">
           <div class="card card-statistic-1">
             <div class="card-icon bg-danger">
               <i class="fas fa-shopping-bag"></i>
             </div>
             <div class="card-wrap">
               <div class="card-header">
                 <h4>Total Dana Keluar</h4>
               </div>
               <div class="card-body">
                 Rp
                 <?= number_format($total_kas2['nominal']); ?>
               </div>
             </div>
           </div>
         </div>
         <div class="col-lg-4 col-md-6 col-sm-6 col-12">
           <div class="card card-statistic-1">
             <div class="card-icon bg-warning">
               <i class="fas fa-file-alt"></i>
             </div>
             <div class="card-wrap">
               <div class="card-header">
                 <h4>Total Saldo</h4>
               </div>
               <div class="card-body">
                 Rp
                 <?= number_format($total_masuk['nominal'] - $total_kas2['nominal']); ?>
               </div>
             </div>
           </div>
         </div>
       </div>
       <div class="col-12 mb-4">
         <div class="hero text-white hero-bg-image hero-bg-parallax"
           data-background="<?= base_url('assets'); ?>/img/unsplash/andre-benz-1214056-unsplash.jpg">
           <div class="hero-inner">
             <h2>Welcome Back, <?= $user['name']; ?>!</h2>
             <p class="lead">Halaman ini adalah tempat untuk melihat dana masuk, dana keluar dan saldo saat ini.
             </p>
           </div>
         </div>
       </div>
     </div>
   </section>
 </div>