 <section class="teacher__area pt-100 pb-110">
     <div class="container">
         <div class="row">
             <div class="col-xxl-8 col-xl-8 col-lg-8">
                 <div class="teacher__wrapper">
                     <div class="teacher__top d-md-flex align-items-end justify-content-between">
                         <div class="teacher__info">
                             <h4><?= $title ?></h4>
                             <span><?= $data_sekolah->nama_sekolah?></span>
                         </div>
                     </div>
                     <div class="teacher__bio">
                         <?php echo $sejarah['content']; ?>
                     </div>
                     <div class="bold">
                         Diupdate: <?php echo $sejarah['modified']; ?>
                     </div>
                     <?php include(APPPATH . 'views/dir/share.php'); ?>
                 </div>
             </div>
             <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                 <?php $this->load->view('public/page/informasi_umum');?>
             </div>
         </div>
     </div>
 </section>