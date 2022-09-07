  <!-- footer area start -->
  <!-- cta area start -->
  <section class="cta__area mb--120">
      <div class="container">
          <div class="cta__inner green-bg fix">
              <div class="cta__shape">
                  <img src="assets/frontend/img/cta/cta-shape2.png" alt="">
              </div>
              <div class="row align-items-center">
                  <div class="col-xxl-7 col-xl-7 col-lg-8 col-md-8">
                      <div class="cta__content">
                          <h3 class="cta__title">Daftarkan Buah Hati Anda Sekarang!</h3>
                      </div>
                  </div>
                  <div class="col-xxl-5 col-xl-5 col-lg-4 col-md-4">
                      <div class="cta__more d-md-flex justify-content-end p-relative z-index-1">
                          <div class="cta__apps d-lg-flex justify-content-end p-relative z-index-1">
                              <a target="_blank" href="https://pmb.unusia.ac.id" class="active"><i class="fab fa-google-play"></i>Informasi Selengkapnya</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- cta area end -->

  <footer>
      <div class="footer__area footer-bg">
          <div class="footer__top pt-160 pb-40">
              <div class="container">
                  <div class="row">
                      <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6">
                          <div class="footer__widget mb-50">
                              <div class="footer__widget-head mb-22">
                                  <div class="footer__logo">
                                      <a href="">
                                          <img src="assets/frontend/img/logo-footer.png" alt="">
                                      </a>
                                  </div>
                              </div>
                              <div class="footer__widget-body">
                                  <p>
                                      <i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;<a href=""><?= data_sekolah()->lokasi_lengkap ?><br><?= data_sekolah()->kodepos ?>
                                      </a><br>
                                      <i class="far fa-envelope"></i>&nbsp;&nbsp;<a href="mailto:sekretariat@unusia.ac.id"><?= data_sekolah()->email ?></a><br>
                                      <i class="fab fa-whatsapp"></i>&nbsp;&nbsp;<a href="https://api.whatsapp.com/send?phone=6281258881926"><?= data_sekolah()->telpon ?></a><br>
                                  </p>
                              </div>
                          </div>
                      </div>
                      <div class="col-xxl-2 offset-xxl-1 col-xl-2 offset-xl-1 col-lg-3 offset-lg-0 col-md-2 offset-md-1 col-sm-3 offset-sm-1">
                          <div class="footer__widget mb-50">
                              <div class="footer__widget-head mb-22">
                                  <h3 class="footer__widget-title">TENTANG</h3>
                              </div>
                              <div class="footer__widget-body">
                                  <div class="footer__link">
                                      <ul>
                                          <li><a href="vmts">Profil</a></li>
                                          <li><a href="#">Kontak</a></li>
                                          <li><a href="#">Lokasi</a></li>
                                          <li><a href="#">Agenda</a></li>

                                      </ul>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-xxl-2 col-xl-2 col-lg-2 offset-lg-0 col-md-3 offset-md-1 col-sm-3">
                          <div class="footer__widget mb-50">
                              <div class="footer__widget-head mb-22">
                                  <h3 class="footer__widget-title">LEMBAGA</h3>
                              </div>
                              <div class="footer__widget-body">
                                  <div class="footer__link">
                                      <ul>
                                          <li><a href="https://lp2m.unusia.ac.id">LPPM</a></li>
                                          <li><a href="#">LPM</a></li>
                                          <li><a href="#">SPI</a></li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-xxl-2 col-xl-2 col-lg-2 offset-lg-0 col-md-3 offset-md-1 col-sm-3">
                          <div class="footer__widget mb-50">
                              <div class="footer__widget-head mb-22">
                                  <h3 class="footer__widget-title">Social Media</h3>
                              </div>
                              <div class="footer__widget-body">
                                  <div class="footer__social">
                                      <ul>
                                          <li><a href="https://www.facebook.com/unusia"><i class="social_facebook"></i></a></li>
                                          <li><a href="https://www.instagram.com/unuindonesia" class="pin"><i class="social_instagram"></i></a></li>
                                          <li><a href="https://www.youtube.com/c/UnusiaTV" class="pin"><i class="social_youtube"></i></a></li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="footer__bottom">
              <div class="container">
                  <div class="row">
                      <div class="col-xxl-12">
                          <div class="footer__copyright text-center">
                              <p>© <a href="#">MI Nasy'atul Muta'allimin Gapura </a>2022 - </p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </footer>
  <!-- JS here -->

  <script src="<?= base_url() ?>assets/templates/js/vendor/waypoints.min.js"></script>
  <script src="<?= base_url() ?>assets/templates/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url() ?>assets/templates/js/jquery.meanmenu.js"></script>
  <script src="<?= base_url() ?>assets/templates/js/swiper-bundle.min.js"></script>
  <script src="<?= base_url() ?>assets/templates/js/owl.carousel.min.js"></script>
  <script src="<?= base_url() ?>assets/templates/js/jquery.fancybox.min.js"></script>
  <script src="<?= base_url() ?>assets/templates/js/isotope.pkgd.min.js"></script>
  <script src="<?= base_url() ?>assets/templates/js/parallax.min.js"></script>
  <script src="<?= base_url() ?>assets/templates/js/backToTop.js"></script>
  <script src="<?= base_url() ?>assets/templates/js/jquery.counterup.min.js"></script>
  <script src="<?= base_url() ?>assets/templates/js/ajax-form.js"></script>
  <script src="<?= base_url() ?>assets/templates/js/wow.min.js"></script>
  <script src="<?= base_url() ?>assets/templates/js/imagesloaded.pkgd.min.js"></script>
  <script src="<?= base_url() ?>assets/templates/js/main.js"></script>
  </body>
  <script>
      var swiper = new Swiper(".mySwiper", {
          breakpoints: {
              '@0.75': {
                  slidesPerView: 1,
                  spaceBetween: 20,
              },
              '@1.00': {
                  slidesPerView: 2,
                  spaceBetween: 40,
              },
              '@1.50': {
                  slidesPerView: 3,
                  spaceBetween: 50,
              },
          },
          centeredSlides: true,
          roundLengths: true,
          loop: true,
          loopAdditionalSlides: 30,
          autoplay: {
              delay: 2500,
              disableOnInteraction: false,
          },
          pagination: {
              el: ".swiper-pagination",
              clickable: true,
          }
      });

      var swiper = new Swiper(".swipergalerifoto", {
          breakpoints: {
              '@0.75': {
                  slidesPerView: 1,
                  spaceBetween: 20,
              },
              '@1.00': {
                  slidesPerView: 2,
                  spaceBetween: 40,
              },
              '@1.50': {
                  slidesPerView: 4,
                  spaceBetween: 50,
              },
          },
          roundLengths: true,
          loop: true,
          loopAdditionalSlides: 30,
          pagination: {
              el: ".swiper-pagination",
          },
      });
  </script>

  </html><!-- footer area end -->