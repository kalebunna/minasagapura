 <!-- header area start -->
 <header>
     <div id="header-sticky" class="header__area header__padding-2 header__shadow">
         <div class="container">
             <div class="row align-items-center">
                 <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-2 col-sm-4 col-6">
                     <div class="header__left d-flex">
                         <div class="logo">
                             <h4><?= data_sekolah()->nama_website ?></h4>
                         </div>
                     </div>
                 </div>
                 <div class="col-xxl-9 col-xl-9 col-lg-8 col-md-10 col-sm-8 col-6">
                     <div class="header__right d-flex justify-content-end align-items-center">
                         <div class="main-menu main-menu-2">
                             <nav id="mobile-menu">
                                 <ul>

                                     <li><a href="<?= base_url(); ?>">Home</a></li>
                                     <li class="has-dropdown">
                                         <a href="#">Profil</a>
                                         <ul class="submenu">
                                             <li><a href="<?= base_url('page/sejarah'); ?>">Sejarah</a></li>
                                             <li><a href="<?= base_url('page/visi-misi'); ?>">Visi dan Misi</a></li>
                                             <li><a href="<?= base_url('page/logo-motto'); ?>">Logo dan Motto</a>
                                             </li>
                                             <li><a href="<?= base_url('page/struktur'); ?>">Struktur organisasi</a>
                                             </li>
                                             <li><a href="<?= base_url('page/yayasan'); ?>">Sambutan Ketua
                                                     Yayasan</a></li>
                                             <li><a href="<?= base_url('page/lokasi'); ?>">Lokasi sekolah</a></li>
                                         </ul>
                                     </li>
                                     <li class="has-dropdown">
                                         <a href="pendidikan">Data</a>
                                         <ul class="submenu">
                                             <li><a href="<?= base_url('data/guru'); ?>">Guru</a></li>
                                             <li><a href="<?= base_url('data/siswa'); ?>">Siswa</a></li>
                                             <li><a href="<?= base_url('data/alumni'); ?>">Alumni</a></li>
                                         </ul>
                                     </li>
                                     <li><a href="<?= base_url('prestasi'); ?>">Prestasi</a></li>
                                     <li class="has-dropdown">
                                         <a href="pendidikan">Seputar Sekolah</a>
                                         <ul class="submenu">
                                             <li><a href="<?= base_url('data/guru'); ?>">Kegiatan</a></li>
                                             <li><a href="<?= base_url('Galeri'); ?>">Galeri</a></li>
                                             <li><a href="<?= base_url('data/siswa'); ?>">Agenda</a></li>
                                         </ul>
                                     </li>
                                     <li><a href="<?= base_url('kontak'); ?>">Kontak</a></li>
                                 </ul>
                             </nav>
                         </div>
                         <div class="header__btn header__btn-2 ml-50 d-none d-sm-block">
                             <a href="#" class="e-btn search-toggle"><i class="fas fa-search"></i> Search</a>
                         </div>
                         <div class="sidebar__menu d-xl-none">
                             <div class="sidebar-toggle-btn ml-30" id="sidebar-toggle">
                                 <span class="line"></span>
                                 <span class="line"></span>
                                 <span class="line"></span>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </header>
 <!-- header area end -->