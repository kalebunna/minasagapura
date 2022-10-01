<?php
function nama_sekolah()
{

    $ins = get_instance();
    $ins->load->model("Model_utility");
    return $ins->Model_utility->get_nama_sekolah();
}

function data_sekolah()
{
    $ins = get_instance();
    $ins->load->model("Model_utility");
    return $ins->Model_utility->get_data_sekolah();
}


function alertCustom($data, $keterangan = null)
{
    switch ($data) {
        case 'add':
            $alert = '<div class="alert alert-success dark alert-dismissible fade show" role="alert"><strong>BERHASIL</strong>Data Berhasil Ditambahkan
                      <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            return $alert;
            break;


        case 'edit':
            $alert = '<div class="alert alert-success dark alert-dismissible fade show" role="alert"><strong>BERHASIL</strong>Data Berhasil Di Perbarui
                      <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            return $alert;
            break;

        case 'delete':
            $alert = '<div class="alert alert-success dark alert-dismissible fade show" role="alert"><strong>BERHASIL</strong>Data Berhasil Di Hapus
                      <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            return $alert;
            break;

        case "err":
            $alert = '<div class="alert alert-danger dark alert-dismissible fade show" role="alert"><strong>GAGAL</strong>' . $keterangan . '
                      <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            return $alert;
            break;
    }
}
