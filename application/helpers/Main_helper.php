<?php
function nama_sekolah()
{

    $ins = get_instance();
    $ins->load->model("Model_utility");
    return $ins->Model_utility->get_nama_sekolah();
}
