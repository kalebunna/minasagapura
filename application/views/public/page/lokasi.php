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
                         <div class="iframe-container">
                             <?=$data_sekolah->googlemaps?>
                             <div class="course__sidebar-widget-2">
                                 <div class="blog__author-3 d-sm-flex mt-4">
                                     <div class="mr-20">
                                         <img src="<?=base_url()?>assets/templates/img/shape/location.png" alt=""
                                             style="height: 40px">
                                     </div>
                                     <div class="blog__author-content">
                                         <p><?= $data_sekolah->lokasi_lengkap?><br><?= $data_sekolah->kodepos?> </p>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>

             </div>
             <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                 <?php $this->load->view('public/page/informasi_umum');?>
             </div>
         </div>
     </div>
 </section>