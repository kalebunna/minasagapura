<div class="container-fluid bg-website pt-100">
    <div class="row">
        <div class="col-xxl-6 offset-xxl-3">
            <div class="section__title-wrapper text-center mb-60">
                <h2 class="section__title">Galeri <span class="yellow-bg"> Foto <img src="assets/img/shape/yellow-bg-2.png" alt=""> </span> <br>
                </h2>
                <p>MADRASAH IBTIDAIYAH NAS'ATUL MUTA'ALLIMIN</p>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-9 col-sm-12">
            <div class="row">
                <?php foreach ($galeri as $galeri_item) : ?>
                    <div class="col-6 col-lg-4 mb-4">
                        <div class="teacher__item text-center grey-bg-5 transition-3">
                            <div class="teacher__thumb w-img fix">
                                <a href="<?= base_url('p/' . $galeri_item['link']); ?>">
                                    <img src="<?= base_url('images/galeri/medium/' . $galeri_item['image']); ?>" class="">
                                </a>
                                <div class="teacher__content">
                                    <span><?= $galeri_item['title'] ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>