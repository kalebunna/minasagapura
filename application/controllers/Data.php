<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('public/model_data');
        $this->load->library('pagination');
    }

    public function guru()
    {
        $data = array(
            'data_sekolah'=>$this->Model_utility->get_data_sekolah(),
            'title'        => 'Data Guru - SMK Pelita Pematangsiantar',
        );

        $perpage = 2;
        $offset = $this->uri->segment(3);
        $data['data_guru'] = $this->model_data->guru_nama_aja($perpage, $offset)->result();

        $config['base_url'] = base_url().'Data/guru/';
        $config['total_rows'] = $this->model_data->guru()->num_rows();
        $config['per_page'] = $perpage;

        // custom pagination

        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['next_link'] = '<div class="link-btn link-prev"> 
                                    Next
                                    <i class="arrow_right"></i>
                                    <i class="arrow_right"></i>
                                </div>';
        $config['prev_link'] = '<div class="link-btn link-prev"> <i class="arrow_left"></i><i
                class="arrow_left"></i>Prev</div>';
        $config['full_tag_open'] = '<div class="pagging text-center basic-pagination wow fadeInUp mt-30"
            data-wow-delay=".2s"">
              <nav>
                  <ul class="pagination justify-content-center d-flex align-items-center">';
        $config['full_tag_close'] = '</ul>
              </nav>
          </div>';
        $config['num_tag_open'] = '<li><span>';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="active"><span><a href="#">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></span></li>';
        $config['next_tag_open'] = '<li class="next">';
        $config['next_tagl_close'] = '</li>';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tagl_close'] = '</li>';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">dd';
        $config['last_tagl_close'] = '</span></li>';
        // custom pagination

        $this->pagination->initialize($config);
        
        $data['pagination'] = $this->pagination->create_links(); 
        
       
        $this->load->view('dir/header', $data);
        $this->load->view('public/data/guru/index');
        $this->load->view('dir/footer');
    }

    public function siswa()
    {
        $data['title'] = 'Data Siswa - SMK Pelita Pematangsiantar';

        if (empty($this->input->get('kelas')) && empty($this->input->get('jurusan'))) {
            $data['siswas'] = $this->model_data->siswa_kelas_jurusan('X', 'RPL');
        } else {
            $kelas             = $this->input->get('kelas');
            $jurusan         = $this->input->get('jurusan');
            $data['siswas']    = $this->model_data->siswa_kelas_jurusan($kelas, $jurusan);
        }

        $this->load->view('dir/header', $data);
        $this->load->view('public/data/siswa/index');
        $this->load->view('dir/footer');
    }

    public function alumni()
    {
        $data['title'] = 'Data Alumni - SMK Pelita Pematangsiantar';

        if (!empty($this->input->get('jurusan')) && !empty($this->input->get('lulusan'))) {
            $jurusan = $this->input->get('jurusan');
            $lulusan = $this->input->get('lulusan');
            $data['alumnis'] = $this->model_data->alumni_jurusan_lulusan($jurusan, $lulusan);
        } elseif (!empty($this->input->get('nama'))) {
            $nama = $this->input->get('nama');
            $data['alumnis'] = $this->model_data->alumni_nama($nama);
        } else {
            $data['alumnis'] = $this->model_data->alumni_jurusan_lulusan('RPL', date("Y") - 1);
        }

        $this->load->view('dir/header', $data);
        $this->load->view('public/data/alumni/index');
        $this->load->view('dir/footer');
    }

    public function data_guru_json()
    {
        echo json_encode($this->model_data->guru_nama_aja()->result_array());
    }
}

/* End of file Data.php */
/* Location: ./application/controllers/Data.php */