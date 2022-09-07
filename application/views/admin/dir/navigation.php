 <!-- Page Sidebar Start-->
 <div class="sidebar-wrapper">
     <div>
         <div class="logo-wrapper"><a href="index.html"><img class="img-fluid for-light" src="<?= base_url() ?>assets/templates_admin/assets/images/logo/logo.png" alt=""></a>
             <div class="back-btn"><i class="fa fa-angle-left"></i></div>
             <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid">
                 </i></div>
         </div>
         <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid" src="<?= base_url() ?>assets/templates_admin/assets/images/logo/logo-icon.png" alt=""></a></div>
         <nav class="sidebar-main">
             <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
             <div id="sidebar-menu">
                 <ul class="sidebar-links" id="simple-bar">
                     <li class="back-btn">
                         <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                     </li>

                     <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="<?= base_url() ?>admin/dashboard"><i data-feather="home"></i><span>Halaman Utama</span></a></li>
                     <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="shopping-bag"></i><span>Profil Sekolah</span></a>
                         <ul class="sidebar-submenu">
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
                     <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="<?= base_url('admin/guru'); ?>"><i data-feather="home"></i><span>Guru</span></a></li>
                     <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="<?= base_url('admin/siswa'); ?>"><i data-feather="home"></i><span>Siswa</span></a></li>
                     <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="<?= base_url('admin/info'); ?>"><i data-feather="home"></i><span>Informasi internal</span></a></li>
                     <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="shopping-bag"></i><span>Seputar Sekolah</span></a>
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
                     <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="<?= base_url('admin/testimoni'); ?>"><i data-feather="home"></i><span>Testimoni</span></a></li>
                     <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="<?= base_url('admin/artikel'); ?>"><i data-feather="home"></i><span>Artikel</span></a></li>
                     <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="<?= base_url('admin/prestasi'); ?>"><i data-feather="home"></i><span>Prestasi</span></a></li>

                 </ul>
             </div>
             <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
         </nav>
     </div>
 </div>
 <!-- Page Sidebar Ends-->