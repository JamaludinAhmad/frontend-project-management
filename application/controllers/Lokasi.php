<?php

class Lokasi extends CI_Controller{
    private $api_url = 'http://localhost:9000/api/lokasi';

    public function __construct(){
        parent::__construct();
        $this->load->helper('Api_helper');
        $this->load->helper('url');
        $this->load->library('session');
    }
    
    public function create(){
        $this->load->view('lokasi/lokasi_create');
    }

    public function store(){
        $data = [
            'namaLokasi' => $this->input->post('nama_lokasi'),
            'kota' => $this->input->post('kota'),
            'provinsi' => $this->input->post('provinsi'),
            'negara' => $this->input->post('negara'),
        ];
        
        $response = call_api($this->api_url, 'POST', $data);

        redirect('index.php/proyek');
    }

    public function edit($id){
        $data['lokasi'] = call_api($this->api_url.'/'.$id, 'GET');
        $this->load->view('lokasi/lokasi_edit', $data);
    }

    public function update($id){
        $data = [
            'id' => $id,
            'namaLokasi' => $this->input->post('nama_lokasi'),
            'kota' => $this->input->post('kota'),
            'provinsi' => $this->input->post('provinsi'),
            'negara' => $this->input->post('negara'),
        ];
        
        $response = call_api($this->api_url, 'PUT', $data);

        redirect('index.php/proyek');
    }

    public function delete($id){
        try {
            $data = [
                'id' => $id
            ];
            $response = call_api($this->api_url, 'DELETE', $data);
    
        } catch (Exception $e) {
            $errorMessages = ($e->getMessage());
            $this->session->set_flashdata('error', 'Cannot delete Lokasi because it is referenced by proyek');
        }
        
        redirect('index.php/proyek');
        
    }
}