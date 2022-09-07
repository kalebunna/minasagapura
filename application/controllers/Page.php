<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('public/model_page');
    }

    public function sejarah()
    {
        $data = array(
            'data_sekolah' => $this->Model_utility->get_data_sekolah(),
            'title'        => 'Sejarah',
            'sejarah'     => $this->model_page->sejarah(),
            'informasi_umum' => $this->informasi_umum()
        );

        $this->load->view('dir/header', $data);
        $this->load->view('public/page/sejarah');
        $this->load->view('dir/footer');
    }

    public function visimisi()
    {
        $data = array(
            'data_sekolah' => $this->Model_utility->get_data_sekolah(),
            'title'        => 'Visi dan Misi',
            'visimisi'     => $this->model_page->visimisi(),
            'informasi_umum' => $this->informasi_umum()
        );

        $this->load->view('dir/header', $data);
        $this->load->view('public/page/visimisi');
        $this->load->view('dir/footer');
    }

    public function logomotto()
    {
        $data = array(
            'data_sekolah' => $this->Model_utility->get_data_sekolah(),
            'title'        => 'Logo dan Motto',
            'logomotto' => $this->model_page->logomotto(),
            'informasi_umum' => $this->informasi_umum()
        );

        $this->load->view('dir/header', $data);
        $this->load->view('public/page/logomotto');
        $this->load->view('dir/footer');
    }

    public function struktur()
    {
        $data = array(
            'data_sekolah' => $this->Model_utility->get_data_sekolah(),
            'title'        => 'Struktur Organisasi',
            'struktur'     => $this->model_page->struktur(),
            'informasi_umum' => $this->informasi_umum()
        );

        $this->load->view('dir/header', $data);
        $this->load->view('public/page/struktur');
        $this->load->view('dir/footer');
    }

    public function yayasan()
    {

        $data = array(
            'data_sekolah' => $this->Model_utility->get_data_sekolah(),
            'title'        => 'Kata Sambutan' . ($this->Model_utility->get_nama_sekolah()),
            'yayasan'     => $this->model_page->sambutan_yayasan(),
            'informasi_umum' => $this->informasi_umum()
        );

        $this->load->view('dir/header', $data);
        $this->load->view('public/page/yayasan');
        $this->load->view('dir/footer');
    }

    public function lokasi()
    {
        $data = [
            'data_sekolah' => $this->Model_utility->get_data_sekolah(),
            'title' => 'Lokasi Madrasah',
            'informasi_umum' => $this->informasi_umum()
        ];

        $this->load->view('dir/header', $data);
        $this->load->view('public/page/lokasi');
        $this->load->view('dir/footer');
    }

    public function error()
    {
        $data = [
            'data_sekolah' => $this->Model_utility->get_data_sekolah(),
            'title' => 'Error !! Halaman Tidak Ditemukan',
            'informasi_umum' => $this->informasi_umum()
        ];

        $this->load->view('dir/header', $data);
        $this->load->view('public/page/error');
        $this->load->view('dir/footer');
    }

    public function data_informasi()
    {
        echo json_encode($this->model_page->get_data_informasi_public());
    }

    // fungsi tambahan untuk menampilkan informasi umum

    public function informasi_umum()
    {
        $data = $this->model_page->get_data_informasi_public();
        $d_html = '
        <ul>
            <li class="d=flex align-items-center">
                <div class="course__video-info">
                    <h5> <span> Kepala Madrasah :</span>' . $data['nama_kepala_sekolah'] . '</h5>
                </div>
            </li>
            <li class="d=flex align-items-center">
                <div class="course__video-info">
                    <h5><span>Yayasan :</span> ' . $data['data_sekolah']->yayasan . '</h5>
                </div>
            </li>
            <li class="d=flex align-items-center">
                <div class="course__video-info">
                    <h5>
                        <span> Tahun berdiri: </span>' . $data['data_sekolah']->tahun_berdiri . '
                    </h5>
                </div>
            </li>
            <li class="d=flex align-items-center">
                <div class="course__video-info">
                    <h5><span> Alamat : </span><a
                            href="https://www.google.co.id/maps/place/Penerimaan+Mahasiswa+Baru+Universitas+Wiraraja+(UNIJA)+Sumenep/@-7.043708,113.845525,15z/data=!4m5!3m4!1s0x0:0x5bdccecdc036d6f!8m2!3d-7.043708!4d113.845525"
                            target="_blank"> ' . $data['data_sekolah']->lokasi_lengkap . 'r</a></h5>
                </div>
            </li>
            ' . (($data['jumlah_jurusan'] == 0) ? "" : '
            <li class="d=flex align-items-center">
                <div class="course__video-info">
                    <h5>
                        <span> Jurusan: </span> ' . $data['jumlah_jurusan'] . '
                    </h5>
                </div>
            </li>') . '
            <li class="d=flex align-items-center">
                <div class="course__video-info">
                    <h5>
                        <span>Guru : </span>' . $data['jumlah_guru'] . '
                    </h5>
                </div></span>
            </li>
            <li class="d=flex align-items-center">
                <div class="course__video-info">
                    <h5><span> Siswa Aktif: </span>' . $data['jumlah_siswa'] . '</h5>
                </div>
            </li>
            <li class="d=flex align-items-center">
                <div class="course__video-info">
                    <h5><span> Telp: </span>' . $data['data_sekolah']->telpon . '</h5>
                </div>
            </li>
            <li class="d=flex align-items-center">
                <div class="course__video-info">
                    <h5> <span>Email: </span><a href="mailto:' . $data['data_sekolah']->email . '"
                            target="_blank">' . $data['data_sekolah']->email . '</a></h5>
            </li>
        </ul>
        ';
        return $d_html;
    }

    // fungsi tambahan untuk menampilkan informasi umum


}

/* End of file Page.php */
/* Location: ./application/controllers/Page.php */