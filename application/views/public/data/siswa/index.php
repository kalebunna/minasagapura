    <link rel="stylesheet" href="<?= base_url() ?>assets/templates/DataTables/DataTables-1.12.1/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/templates/DataTables/Buttons-2.2.3/css/buttons.bootstrap5.css">


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
                <h5 class="align-self-center">Kelas : </h5>
                <select class="form-select" id="kelas" style="max-width: 200px;margin-left:1%">
                    <option value="0">Semua</option>
                    <option value="2">CIII</option>
                </select>
                <a href="#" class=" btn btn-warning" style="margin-left: 1%;" onclick="get_data()">Terapkan</a>
            </div>
            <div class="row mt-3">
                <div class="" id="data-siswa">
                    <div class="table-content table-responsive">
                        <table id="mytable" class="display table" style="width: 100%; ">
                            <thead>
                                <tr>
                                    <th class="text-center">NO</th>
                                    <th class=" product-thumbnail">Nama</th>
                                    <th class="cart-product-name">Kelas</th>
                                    <th class="cart-product-name">Jenis Kelamin</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="" id="inf-kelas">
                    <div class="course__sidebar pl-70 p-relative">
                        <div class="course__shape"> <img class="course-dot" src="http://localhost/minasagapura/assets/templates/img/course/course-dot.png" alt=""> </div>
                        <div class="course__sidebar-widget-2 white-bg mb-20">
                            <div class="your-order-table table-responsive">
                                <h3>Kelas : <span>VII</span></h3>
                                <div class="course__video">
                                    <div class="course__video-content mb-35">
                                        <ul>
                                            <li class="d=flex align-items-center">
                                                <div class="course__video-info">
                                                    <h5> <span> Kepala Madrasah :</span></h5>
                                                </div>
                                            </li>
                                            <li class="d=flex align-items-center">
                                                <div class="course__video-info">
                                                    <h5> <span> Wali Kelas : M. Syauqadn Wafiqi S.Pd.i</span></h5>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <h1>sdf</h1>
    <script src="<?= base_url() ?>assets/templates/DataTables/dataTables.js"></script>
    <script src="<?= base_url() ?>assets/templates/DataTables/DataTables-1.12.1/js/dataTables.bootstrap5.js"></script>
    <!-- <script src="<?= base_url() ?>assets/templates/DataTables/DataTables-1.12.1/js/dataTables.bootstrap5.js"></script> -->
    <script>
        src = "<?= base_url() ?>assets/templates/DataTables/Buttons-2.2.3/js/buttons.bootstrap5.js" >
    </script>
    <script src="<?= base_url() ?>assets/templates/DataTables/pdfmake-0.1.36/pdfmake.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>

    <script>
        $(document).ready(function() {
            get_data();
        });

        var table_siswa = $('#mytable').DataTable({
            dom: 'Bfrtip',
            buttons: [{
                extend: 'pdfHtml5',
                text: 'PDF with image',
            }],
            "ajax": "<?= base_url("Data/data_murid_json/") ?>" + $("#kelas option:selected").val(),
            "columns": [{
                    "data": null,
                    "sortable": false,
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    "data": "nama"
                },
                {
                    "data": "id_kelas"
                },
                {
                    "data": "gender"
                },
            ]
        });

        function get_data() {

            table_siswa.ajax.url("<?= base_url("Data/data_murid_json/") ?>" + $("#kelas option:selected ").val()).load();
            let id = $("#kelas option:selected").val();
            if (id != 0) {
                $("#inf-kelas").show();
                $("#data-siswa").removeClass("col-xl-12");
                $("#inf-kelas").addClass("col-xxl-5 col-xl-5 col-lg-5 col-md-6");
                $("#data-siswa").addClass("col-xxl-7 col-xl-7 col-lg-7 col-md-6");


            } else {
                $("#inf-kelas").hide();
                $("#data-siswa").removeClass("col-xxl-7 col-xl-7 col-lg-7 col-md-6");
                $("#data-siswa").addClass("col-xl-12");
            }
        }
    </script>