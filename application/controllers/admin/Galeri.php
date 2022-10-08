<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeri extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_counter');
        $this->load->model('model_galeri');
        $this->load->library('upload');
    }

    public function index()
    {
        $data = array(
            'title'         => 'Galeri',
            'count_contact' => $this->model_counter->count_contact(),
            'count_comment' => $this->model_counter->count_comment(),
            'content' => "admin/galeri/index"
        );

        $data['galeris']     = $this->model_galeri->read();

        $this->load->view('admin/dir/index', $data);
    }

    public function create()
    {
        $this->form_validation->set_rules(
            'title',
            'Judul foto',
            'trim|htmlspecialchars|required',
            array(
                'required'      => '%s tidak boleh kosong'
            )
        );

        $this->form_validation->set_rules(
            'description',
            'Caption',
            'trim|htmlspecialchars|required|max_length[200]',
            array(
                'required'      => '%s tidak boleh kosong',
                'max_lenght'    => '%s maksimal dua ratus huruf'
            )
        );

        $nameimg = $this->session->userdata('adminid') . '_' . time() . '_' . uniqid() . '_' . date("Ymdhis") . '_n';

        $config['upload_path']      = './images/galeri/';
        $config['allowed_types']    = 'jpg|jpeg|png|gif';
        $config['quality']          = '100%';
        $config['file_name']        = $nameimg;

        $this->upload->initialize($config);

        if ($this->form_validation->run() === TRUE) {

            if (!empty($_FILES['image']['name'])) {

                if ($this->upload->do_upload('image')) {

                    $gambar = $this->upload->data();

                    $this->_thumbnails_galeri($gambar['file_name']);

                    $nameimage      = $gambar['file_name'];

                    $title          = $this->input->post('title');
                    $description    = $this->input->post('description');

                    $this->model_galeri->create($title, $description, $nameimage);

                    $this->session->set_flashdata('success', alertCustom("add"));
                    redirect('admin/galeri', 'refresh');
                } else {
                    $this->session->set_flashdata('success', alertCustom("err", "Gambar Gagal Di Upload"));
                    var_dump($this->upload->display_errors());
                    // redirect('admin/galeri/create', 'refresh');
                }
            } else {
                $this->session->set_flashdata('success', alertCustom("err", "Gambar Tidak Boleh Kosong"));
                redirect('admin/galeri/create', 'refresh');
            }
        } else {
            $data = array(
                'title'         => 'Tambah Galeri',
                'count_contact' => $this->model_counter->count_contact(),
                'count_comment' => $this->model_counter->count_comment(),
                'content' => "admin/galeri/create"
            );

            $this->load->view('admin/dir/index', $data);
        }
    }

    public function update($id = NULL)
    {
        $data['galeri_item'] = $this->model_galeri->get_by_id($id);

        if (empty($data['galeri_item'])) {
            show_404();
        }

        $this->form_validation->set_rules(
            'title',
            'Judul foto',
            'trim|htmlspecialchars|required',
            array(
                'required'      => '%s tidak boleh kosong'
            )
        );

        $this->form_validation->set_rules(
            'description',
            'Caption',
            'trim|htmlspecialchars|required|max_length[200]',
            array(
                'required'      => '%s tidak boleh kosong',
                'max_lenght'    => '%s maksimal dua ratus huruf'
            )
        );

        $nameimg = $this->session->userdata('adminid') . '_' . time() . '_' . uniqid() . '_' . date("Ymdhis") . '_n';

        $config['upload_path']      = './images/galeri/';
        $config['allowed_types']    = 'jpg|jpeg|png|gif';
        $config['quality']          = '100%';
        $config['file_name']        = $nameimg;

        $this->upload->initialize($config);

        if ($this->form_validation->run() === TRUE) {

            if (!empty($_FILES['image']['name'])) {

                if ($this->upload->do_upload('image')) {

                    $gambar = $this->upload->data();

                    $this->_thumbnails_galeri($gambar['file_name']);

                    $nameimage      = $gambar['file_name'];

                    $title          = $this->input->post('title');
                    $description    = $this->input->post('description');
                    $tampilkan        = $this->input->post('tampilkan');

                    $this->model_galeri->update_image($id, $title, $description, $nameimage, $tampilkan);

                    $this->session->set_flashdata('success', alertCustom("update"));
                    redirect('admin/galeri/', 'refresh');
                } else {
                    $this->session->set_flashdata('success', alertCustom("err", "Data Gambar Gagal Di Perbarui"));
                    redirect('admin/galeri/update/' . $id, 'refresh');
                }
            } else {
                $title          = $this->input->post('title');
                $description    = $this->input->post('description');
                $tampilkan        = $this->input->post('tampilkan');

                $this->model_galeri->update_no_image($id, $title, $description, $tampilkan);

                $this->session->set_flashdata('success', alertCustom("update"));
                redirect('admin/galeri', 'refresh');
            }
        } else {
            $data = array(
                'title'         => 'Update Galeri',
                'count_contact' => $this->model_counter->count_contact(),
                'count_comment' => $this->model_counter->count_comment(),
                'galeri'        => $this->model_galeri->get_by_id($id),
                'content' => "admin/galeri/update"
            );

            $this->load->view('admin/dir/index', $data);
        }
    }

    public function delete()
    {
        $this->form_validation->set_rules('id', 'id', 'trim|required');

        if ($this->form_validation->run() == TRUE) {

            $id = $this->input->post('id');
            $data = $this->model_galeri->get_by_id($id);
            $this->model_galeri->delete($id);
            unlink('images/galeri/small/' . $data['image']);
            unlink('images/galeri/medium/' . $data['image']);
            unlink('images/galeri/' . $data['image']);

            $this->session->set_flashdata('success', alertCustom("delete"));
            redirect('admin/galeri', 'refresh');
        } else {
            show_404();
        }
    }

    function _thumbnails_galeri($file_name)
    {
        $config = array(

            // small image size
            array(
                'image_library' => 'GD2',
                'source_image'  => './images/galeri/' . $file_name,
                'maintain_ratio' => FALSE,
                'width'         => 150,
                'height'        => 150,
                'new_image'     => './images/galeri/small/' . $file_name
            ),

            // medium image size
            array(
                'image_library' => 'GD2',
                'source_image'  => './images/galeri/' . $file_name,
                'maintain_ratio' => FALSE,
                'width'         => 300,
                'height'        => 300,
                'new_image'     => './images/galeri/medium/' . $file_name
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
