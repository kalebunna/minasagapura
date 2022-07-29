<!-- Cart Area Strat-->
<section class="cart-area pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-xxl-6 offset-xxl-3 col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                <div class="section__title-wrapper mb-60 text-center">
                    <h2 class="section__title">Daftar <span class="yellow-bg-big">Siswa<img src="http://localhost/minasagapura/assets/templates/img/shape/yellow-bg.png" alt=""> </span></h2>
                    <p>List Daftar Siswa <?= nama_sekolah() ?></p>
                </div>
            </div>
        </div>

        <div class=" d-flex justify-content-end align-items-center">
            <h5 class="align-self-center">Kelas</h5>
            <select class="form-select" id="select_status_guru" style="max-width: 200px;margin-left:1%">
                <option value="0">PILIH KELAS</option>
            </select>
            <a href="http://" class="btn btn-warning" style="margin-left: 1%;">Terapkan</a>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="table-content table-responsive">
                    <table id="mytable" class="display table" style="width: 100%; "">
                        <thead>
                            <tr>
                            <th>No</th>
                            <th class=" product-thumbnail">Logo</th>
                        <th class="cart-product-name">Nama</th>
                        <th class="cart-product-name">Deskripsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>