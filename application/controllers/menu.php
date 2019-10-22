<?php

// rest library = github.com/chriskacerguis/codeigniter-restserver

class Menu extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('Web_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'All Menu';
        $data['menu'] = $this->Web_model->getAllMenu();
        $this->load->view('templates/header', $data);
        $this->load->view('menu/index', $data);
        $this->load->view('templates/footer');
    }

     public function hapus($id)
    {
        $this->Web_model->hapusDataMenu($id);
        redirect('menu');
    }

    public function ubah($id)
    {
        $data['judul'] = 'Form Ubah Data Menu';
        $data['menu'] = $this->Web_model->getMenuById($id);

        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('menu/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Web_model->ubahDataMenu();
            redirect('menu');
        }
    }

    public function tambah()
    {
        $data['judul'] = 'Form Tambah Data Menu';

        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('menu/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->Web_model->tambahDataMenu();
            redirect('menu');
        }
    }

    // public function index_delete()
    // {
    //     $id = $this->delete('id');

    //     if ($id === null)
    //     {
    //         $this->response([
    //             'status' => false,
    //             'message' => 'provide an id!'
    //         ], REST_Controller::HTTP_BAD_REQUEST);
    //     } else {
    //         if ($this->menu->deleteMenu($id) > 0)
    //         {
    //             $this->response([
    //                 'status' => true,
    //                 'id' => $id,
    //                 'message' => 'delete.'
    //             ], REST_Controller::HTTP_OK);
    //         } else{
    //             $this->response([
    //                 'status' => false,
    //                 'message' => 'id not found'
    //             ], REST_Controller::HTTP_BAD_REQUEST);
    //         }
    //     }
    // }

    // public function index_post()
    // {
    //     $data = [
    //         'id' => $this->post('id'),
    //         'kategori' => $this->post('kategori'),
    //         'nama' => $this->post('nama'),
    //         'deskripsi' => $this->post('deskripsi'),
    //         'harga' => $this->post('harga')
    //     ];

    //     if ($this->menu->createMenu($data) > 0)
    //     {
    //         $this->response([
    //             'status' => true,
    //             'message' => 'new menu has been created.'
    //         ], REST_Controller::HTTP_CREATED);
    //     } else {
    //         $this->response([
    //             'status' => false,
    //             'message' => 'failed to created new data!'
    //         ], REST_Controller::HTTP_BAD_REQUEST);
    //     }
    // }

    // public function index_put()
    // {
    //     $id = $this->put('id');
    //     $data = [
    //         'kategori' => $this->put('kategori'),
    //         'nama' => $this->put('nama'),
    //         'deskripsi' => $this->put('deskripsi'),
    //         'harga' => $this->put('harga')
    //     ];

    //     if ($this->menu->updateMenu($data, $id) > 0)
    //     {
    //         $this->response([
    //             'status' => true,
    //             'message' => 'data menu has been updated.'
    //         ], REST_Controller::HTTP_CREATED);
    //     } else {
    //         $this->response([
    //             'status' => false,
    //             'message' => 'failed to update data!'
    //         ], REST_Controller::HTTP_BAD_REQUEST);
    //     }
    // }
}
?>