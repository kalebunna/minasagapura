  <section class="teacher__area pt-40 pb-110">
      <div class="container">
          <div class="row">
              <div class="col-xxl-6 offset-xxl-3">
                  <div class="section__title-wrapper text-center mb-60">
                      <h2 class="section__title">
                          <span class="yellow-bg">Guru<img src="<?=base_url()?>assets/templates/img/shape/yellow-bg.png"
                                  alt="">
                          </span>
                      </h2>
                      <p>99% guru telah mengikuti PKPNU</p>
                  </div>
              </div>
              <div class="row">
                  <?php 
                    foreach ($data_guru as $key ) {
                    
                ?>
                  <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                      <div class="teacher__item text-center grey-bg-5 transition-3 mb-30">
                          <div class="teacher__thumb w-img fix">
                              <a href="#">
                                  <img src="https://www.unusia.ac.id/assets/backend/images/team/ee674731c470e75ed1fe5558c611114a.jpg"
                                      alt="">
                              </a>
                          </div>
                          <div class="teacher__content">
                              <h3 class="teacher__title"><?=$key->nama?></h3><br>
                              <h6><?= $key->divisi?></h6>

                              <div class="footer__social">
                                  <ul>
                                      <li><a href="#" class="pin"><i class="social_instagram"></i></a></li>
                                      <li><a href="#" class="tw"><i class="social_twitter"></i></a></li>

                                  </ul>
                              </div>
                          </div>
                      </div>
                  </div>

                  <?php } ?>
              </div>
              <?=$pagination?>
          </div>

      </div>
  </section>