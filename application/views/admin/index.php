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
       <div class="col-12 mb-4">
         <div class="hero text-white hero-bg-image hero-bg-parallax"
           data-background="<?= base_url('assets'); ?>/img/unsplash/andre-benz-1214056-unsplash.jpg">
           <div class="hero-inner">
             <h2>Welcome Back, <?= $user['name']; ?>!</h2>
             <p class="lead">This page is a place to see dana masuk, dana keluar and saldo saat ini.
             </p>
           </div>
         </div>
       </div>
     </div>
   </section>
 </div>