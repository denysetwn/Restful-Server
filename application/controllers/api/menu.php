<?php

// rest library = github.com/chriskacerguis/codeigniter-restserver

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Menu extends REST_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('Menu_model', 'menu');
    }

    public function index_get()
    {
        $id = $this->get('id');
        if ($id === null)
        {
            $menu = $this->menu->getMenu();
        } else{
            $menu = $this->menu->getMenu($id);
        }
       
       
        if($menu)
        {
            $this->response([
                'status' => true,
                'data' => $menu
            ], REST_Controller::HTTP_OK);
        } else{
            $this->response([
                'status' => false,
                'message' => 'id not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_delete()
    {
        $id = $this->delete('id');

        if ($id === null)
        {
            $this->response([
                'status' => false,
                'message' => 'provide an id!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->menu->deleteMenu($id) > 0)
            {
                $this->response([
                    'status' => true,
                    'id' => $id,
                    'message' => 'delete.'
                ], REST_Controller::HTTP_OK);
            } else{
                $this->response([
                    'status' => false,
                    'message' => 'id not found'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    public function index_post()
    {
        $data = [
            'id' => $this->post('id'),
            'kategori' => $this->post('kategori'),
            'nama' => $this->post('nama'),
            'deskripsi' => $this->post('deskripsi'),
            'harga' => $this->post('harga')
        ];

        if ($this->menu->createMenu($data) > 0)
        {
            $this->response([
                'status' => true,
                'message' => 'new menu has been created.'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed to created new data!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function index_put()
    {
        $id = $this->put('id');
        $data = [
            'kategori' => $this->put('kategori'),
            'nama' => $this->put('nama'),
            'deskripsi' => $this->put('deskripsi'),
            'harga' => $this->put('harga')
        ];

        if ($this->menu->updateMenu($data, $id) > 0)
        {
            $this->response([
                'status' => true,
                'message' => 'data menu has been updated.'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed to update data!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
?>