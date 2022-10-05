<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prestasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_counter');
        $this->load->model('model_prestasi');
        $this->load->library('upload');
    }

    public function index()
    {
        $data = array(
            'title'         => 'Prestasi',
            'count_contact' => $this->model_counter->count_contact(),
            'count_comment' => $this->model_counter->count_comment(),
            'content' => 'admin/prestasi/index'
        );

        $data['prestasis']     = $this->model_prestasi->get_prestasi();

        $this->load->view('admin/dir/index', $data);
    }

    public function create()
    {
        $this->form_validation->set_rules(
            'title',
            'Judul',
            'trim|htmlspecialchars|required|min_length[10]',
            array(
                'required'      => '%s tidak boleh kosong',
                'min_length'    => '%s minimal panjang sepuluh huruf'
            )
        );

        $this->form_validation->set_rules(
            'description',
            'Deskripsi',
            'trim|htmlspecialchars|required|min_length[10]',
            array(
                'required'      => '%s tidak boleh kosong',
                'min_length'    => '%s minimal panjang sepuluh huruf'
            )
        );

        $this->form_validation->set_rules(
            'content',
            'Konten',
            'trim|required|min_length[10]',
            array(
                'required'      => '%s tidak boleh kosong',
                'min_length'    => '%s minimal panjang sepuluh huruf'
            )
        );

        $nameimg = $this->session->userdata('adminid') . '_' . time() . '_' . uniqid() . '_' . date("Ymdhis") . '_n';

        $config['upload_path']      = './images/prestasi/';
        $config['allowed_types']    = 'jpg|jpeg|png|gif';
        $config['quality']          = '100%';
        $config['file_name']        = $nameimg;

        $this->upload->initialize($config);

        if ($this->form_validation->run() === TRUE) {

            if (!empty($_FILES['image']['name'])) {

                if ($this->upload->do_upload('image')) {

                    $gambar = $this->upload->data();

                    $this->_thumbnails_prestasi($gambar['file_name']);

                    $nameimage      = $gambar['file_name'];
                    $title          = $this->input->post('title');
                    $description    = $this->input->post('description');
                    $content        = $this->input->post('content');

                    $this->model_prestasi->set_prestasi($title, $description, $nameimage, $content);

                    $this->session->set_flashdata('success', alertCustom("add"));
                    redirect('admin/prestasi/index', 'refresh');
                } else {
                    $this->session->set_flashdata('success', alertCustom("err", "Gambar Gagal Di Upload"));
                    redirect('admin/prestasi/create', 'refresh');
                }
            } else {
                $this->session->set_flashdata('success', alertCustom("err", "Gambar Tidak Boleh Kosong"));
                redirect('admin/prestasi/create', 'refresh');
            }
        } else {
            $data = array(
                'title'         => 'Tambah Prestasi',
                'count_contact' => $this->model_counter->count_contact(),
                'count_comment' => $this->model_counter->count_comment(),
                'content' => 'admin/prestasi/create'
            );

            $this->load->view('admin/dir/index', $data);
        }
    }

    public function update($id = NULL)
    {
        $data['prestasi_item'] = $this->model_prestasi->get_by_id($id);

        if (empty($data['prestasi_item'])) {
            show_404();
        }

        $this->form_validation->set_rules(
            'title',
            'Judul',
            'trim|htmlspecialchars|required|min_length[10]',
            array(
                'required'      => '%s tidak boleh kosong',
                'min_length'    => '%s minimal panjang sepuluh huruf'
            )
        );

        $this->form_validation->set_rules(
            'description',
            'Deskripsi',
            'trim|htmlspecialchars|required|min_length[10]',
            array(
                'required'      => '%s tidak boleh kosong',
                'min_length'    => '%s minimal panjang sepuluh huruf'
            )
        );

        $this->form_validation->set_rules(
            'content',
            'Konten',
            'trim|required|min_length[10]',
            array(
                'required'      => '%s tidak boleh kosong',
                'min_length'    => '%s minimal panjang sepuluh huruf'
            )
        );

        $nameimg = $this->session->userdata('adminid') . '_' . time() . '_' . uniqid() . '_' . date("Ymdhis") . '_n';

        $config['upload_path']      = './images/prestasi/';
        $config['allowed_types']    = 'jpg|jpeg|png|gif';
        $config['quality']          = '100%';
        $config['file_name']        = $nameimg;

        $this->upload->initialize($config);

        if ($this->form_validation->run() === TRUE) {
            if (!empty($_FILES['image']['name'])) {
                if ($this->upload->do_upload('image')) {
                    $gambar = $this->upload->data();

                    $this->_thumbnails_prestasi($gambar['file_name']);

                    $nameimage      = $gambar['file_name'];
                    $title          = $this->input->post('title');
                    $description    = $this->input->post('description');
                    $content        = $this->input->post('content');

                    $this->model_prestasi->update_image($id, $title, $description, $nameimage, $content);

                    $this->session->set_flashdata('success', alertCustom("update"));
                    redirect('admin/prestasi/update/', 'refresh');
                } else {
                    $this->session->set_flashdata('success', alertCustom("err", "Data Gambar Gagal Di Perbarui"));
                    redirect('admin/prestasi/update/' . $id, 'refresh');
                }
            } else {
                $title          = $this->input->post('title');
                $description    = $this->input->post('description');
                $content        = $this->input->post('content');

                $this->model_prestasi->update_no_image($id, $title, $description, $content);

                $this->session->set_flashdata('success', alertCustom("update"));
                redirect('admin/prestasi/update/' . $id, 'refresh');
            }
        } else {
            $data = array(
                'title'         => 'Update Prestasi',
                'count_contact' => $this->model_counter->count_contact(),
                'count_comment' => $this->model_counter->count_comment(),
                'prestasi'      => $this->model_prestasi->get_by_id($id),
                'content' => 'admin/prestasi/update'
            );

            $this->load->view('admin/dir/index', $data);
        }
    }

    public function delete()
    {
        $this->form_validation->set_rules('id', 'id', 'trim|required');

        if ($this->form_validation->run() == TRUE) {
            $id = $this->input->post('id');
            $data = $this->model_prestasi->get_by_id($id);
            $this->model_prestasi->delete($id);
            // var_dump($data);
            unlink('images/prestasi/' . $data['image']);
            unlink('images/prestasi/large/' . $data['image']);
            unlink('images/prestasi/medium/' . $data['image']);

            $this->session->set_flashdata('success', alertCustom("delete"));
            redirect('admin/prestasi', 'refresh');
        } else {
            show_404();
        }
    }

    function _thumbnails_prestasi($file_name)
    {
        $config = array(

            // large image size
            array(
                'image_library' => 'GD2',
                'source_image'  => './images/prestasi/' . $file_name,
                'maintain_ratio' => FALSE,
                'width'         => 700,
                'height'        => 300,
                'new_image'     => './images/prestasi/large/' . $file_name
            ),

            // medium image size
            array(
                'image_library' => 'GD2',
                'source_image'  => './images/prestasi/' . $file_name,
                'maintain_ratio' => FALSE,
                'width'         => 200,
                'height'        => 200,
                'new_image'     => './images/prestasi/medium/' . $file_name
            )
        );

        $this->load->library('image_lib', $config[0]);
        foreach ($config as $item) {
            $this->image_lib->initialize($item);
            if (!$this->image_lib->resize()) {
                return false;
            }
            $this->image_lib->clear();
        }
    }
}
