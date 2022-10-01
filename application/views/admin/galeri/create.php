 <div class="container-fluid">
     <div class="page-title">
         <div class="row">
             <div class="col-6">
                 <h3>
                     <?= $title ?>
                 </h3>
             </div>
         </div>
     </div>
 </div>
 <div class="container-fluid">
     <div class="card card-body">
         <?php

            if ($this->session->flashdata('success')) {
                echo $this->session->flashdata('success');
            }
            ?>
         <?= form_open_multipart('admin/galeri/create', 'onsubmit="disable()"'); ?>
         <div class="row">
             <div class="col-lg-6 col-sm-12 mb-4">
                 <label class="bold">Judul foto</label>
                 <input type="text" name="title" value="<?= set_value('title'); ?>" class="form-control" placeholder="Judul foto" autocomplete="off">
                 <?= form_error('title', '<span class="text-danger bold">', '</span>'); ?>
             </div>
             <div class="col-lg-6 col-sm-12">
                 <label class="bold">Gambar</label>
                 <input type="file" name="image" class="form-control">
                 <small><i>Saran: gunakan gambar ukuran 300x300</i></small>

             </div>
         </div>
         <label class="bold">Caption singkat</label>
         <textarea name="description" class="form-control" placeholder="Caption singkat"><?= set_value('description'); ?></textarea>
         <?= form_error('description', '<span class="text-danger bold">', '</span>'); ?>
         <div><small><i><b>#smkpelita #smkbisa #siantar #smkhits #yppelita</b> sudah otomatis dimasukan</i></small></div>
         <div class="pt-3"></div>
         <button class="btn btn-primary" id="btn">Posting</button>
         <?= form_close(); ?>
     </div>
 </div>