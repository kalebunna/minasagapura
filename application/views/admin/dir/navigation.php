 <!-- Page Sidebar Start-->
 <div class="sidebar-wrapper">
     <div>
         <div class="logo-wrapper"><a href="index.html"><img class="img-fluid for-light" src="<?= base_url() ?>assets/templates_admin/images/logo/logo.png" alt=""><img class="img-fluid for-dark" src="<?= base_url() ?>assets/templates_admin/images/logo/logo_dark.png" alt=""></a>
             <div class="back-btn"><i class="fa fa-angle-left"></i></div>
             <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
         </div>
         <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid" src="<?= base_url() ?>assets/templates_admin/images/logo/logo-icon.png" alt=""></a></div>
         <nav class="sidebar-main">
             <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
             <div id="sidebar-menu">
                 <ul class="sidebar-links" id="simple-bar">
                     <li class="back-btn"><a href="index.html"><img class="img-fluid" src="<?= base_url() ?>assets/templates_admin/images/logo/logo-icon.png" alt=""></a>
                         <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                     </li>
                     <li class="sidebar-list">
                         <a class="sidebar-link sidebar-title link-nav" href="<?= base_url('admin/guru'); ?>">
                             <i data-feather="heart"> </i><span>Guru</span>
                         </a>
                     </li>
                     <li class="sidebar-list">
                         <a class="sidebar-link sidebar-title link-nav" href="<?= base_url('admin/siswa'); ?>">
                             <i data-feather="heart"> </i><span>Siswa</span></a>
                     </li>
                     <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="users"></i><span>Profil Sekolah</span></a>
                         <ul class="sidebar-submenu">
                             <li>
                                 <a href="<?= base_url(); ?>admin/edit/sejarah">Edit sejarah</a>
                             </li>
                             <li>
                                 <a href="<?= base_url('admin/edit/visimisi'); ?>">Edit visi dan misi</a>
                             </li>
                             <li>
                                 <a href="<?= base_url('admin/edit/logomotto'); ?>">Edit logo dan motto</a>
                             </li>
                             <li>
                                 <a href="<?= base_url('admin/edit/struktur'); ?>">Edit struktur organisasi</a>
                             </li>
                             <li>
                                 <a href="<?= base_url('admin/edit/sambutan_kepsek'); ?>">Edit sambutan Kepala sekolah</a>
                             </li>
                             <li>
                                 <a href="<?= base_url('admin/edit/sambutan_yayasan'); ?>">Edit sambutan yayasan</a>
                             </li>
                         </ul>
                     </li>
                     <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="users"></i><span>Seputar Sekolah</span></a>
                         <ul class="sidebar-submenu">
                             <li>
                                 <a href="<?= base_url('admin/galeri'); ?>">Galeri Foto</a>
                             </li>
                             <li>
                                 <a href="<?= base_url('admin/prestasi'); ?>">Prestasi</a>
                             </li>
                             <li>
                                 <a href="<?= base_url('admin/edit/ekskul'); ?>">Ekstrakulikuler</a>
                             </li>
                         </ul>
                     </li>
                     <li class="sidebar-list">
                         <a class="sidebar-link sidebar-title link-nav" href="<?= base_url('admin/testimoni') ?>">
                             <i data-feather="heart"> </i><span>Testimoni</span></a>
                     </li>
                     <li class="sidebar-list">
                         <a class="sidebar-link sidebar-title link-nav" href="<?= base_url('admin/artikel') ?>">
                             <i data-feather="heart"> </i><span>Artikel</span></a>
                     </li>
                 </ul>
             </div>
             <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
         </nav>
     </div>
 </div>
 <!-- Page Sidebar Ends-->
 <!-- <div class="dlabnav">
     <div class="dlabnav-scroll">
         <ul class="metismenu" id="menu">
             <li class=""><a href="<?= base_url('admin/Dashboard') ?>" class="" aria-expanded="false">
                     <i class="flaticon-013-checkmark"></i>
                     <span class="nav-text">Dashboard</span>
                 </a>
             </li>
             <li>
                 <a class="has-arrow " href="javascript:void()" aria-expanded="false">
                     <i class="flaticon-025-dashboard"></i>
                     <span class="nav-text">Profil Sekolah</span>
                 </a>
                 <ul aria-expanded="false">
                     <li>
                         <a href="<?= base_url('admin/edit/sejarah'); ?>">Edit sejarah</a>
                     </li>
                     <li>
                         <a href="<?= base_url('admin/edit/visimisi'); ?>">Edit visi dan misi</a>
                     </li>
                     <li>
                         <a href="<?= base_url('admin/edit/logomotto'); ?>">Edit logo dan motto</a>
                     </li>
                     <li>
                         <a href="<?= base_url('admin/edit/struktur'); ?>">Edit struktur organisasi</a>
                     </li>
                     <li>
                         <a href="<?= base_url('admin/edit/sambutan_kepsek'); ?>">Edit sambutan Kepala sekolah</a>
                     </li>
                     <li>
                         <a href="<?= base_url('admin/edit/sambutan_yayasan'); ?>">Edit sambutan yayasan</a>
                     </li>
                 </ul>
             </li>
             <li class=""><a href="<?= base_url('admin/guru'); ?>" class="" aria-expanded="false">
                     <i class="flaticon-013-checkmark"></i>
                     <span class="nav-text">Guru</span>
                 </a>
             </li>
             <li class=""><a href="<?= base_url('admin/siswa'); ?>" class="" aria-expanded="false">
                     <i class="flaticon-013-checkmark"></i>
                     <span class="nav-text">Siswa</span>
                 </a>
             </li>
             <li class=""><a href="<?= base_url('admin/info'); ?>" class="" aria-expanded="false">
                     <i class="flaticon-013-checkmark"></i>
                     <span class="nav-text">Info</span>
                 </a>
             </li>
             <li>
                 <a class="has-arrow " href="javascript:void()" aria-expanded="false">
                     <i class="flaticon-025-dashboard"></i>
                     <span class="nav-text">Seputar Sekolah</span>
                 </a>
                 <ul aria-expanded="false">
                     <li>
                         <a href="<?= base_url('admin/galeri'); ?>">Galeri Foto</a>
                     </li>
                     <li>
                         <a href="<?= base_url('admin/prestasi'); ?>">Prestasi</a>
                     </li>
                     <li>
                         <a href="<?= base_url('admin/edit/ekskul'); ?>">Ekstrakulikuler</a>
                     </li>
                 </ul>
             </li>
             <li class=""><a href="<?= base_url('admin/testimoni') ?>" class="" aria-expanded="false">
                     <i class="flaticon-013-checkmark"></i>
                     <span class="nav-text">Testimoni</span>
                 </a>
             </li>
             <li class=""><a href="<?= base_url('admin/artikel') ?>" class="" aria-expanded="false">
                     <i class="flaticon-013-checkmark"></i>
                     <span class="nav-text">Artikel</span>
                 </a>
             </li>
         </ul>
     </div>
 </div> -->