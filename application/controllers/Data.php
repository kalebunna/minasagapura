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
            'data_sekolah' => $this->Model_utility->get_data_sekolah(),
            'title'        => 'Data Guru - SMK Pelita Pematangsiantar',
        );

        $perpage = 5;
        $offset = $this->uri->segment(3);
        $data['data_guru'] = $this->model_data->guru_nama_aja($perpage, $offset)->result();

        $config['base_url'] = base_url() . 'Data/guru/';
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
        $data = array(
            'data_sekolah' => $this->Model_utility->get_data_sekolah(),
            'title'        => 'Struktur Organisasi',
        );
        $this->load->view('dir/header', $data);
        $this->load->view('public/data/siswa/index');
        $this->load->view('dir/footer');
    }


    public function data_guru_json()
    {
        echo json_encode($this->model_data->guru_nama_aja()->result_array());
    }

    public function data_murid_json($kelas)
    {
        if ($kelas != 0) {
            $this->db->where("id_kelas", $kelas);
        }
        $data = [
            "data" => $this->db->get("siswa")->result_array()
        ];
        echo json_encode($data);
    }
}

/* End of file Data.php */
/* Location: ./application/controllers/Data.php */