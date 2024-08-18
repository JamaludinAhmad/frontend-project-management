<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyek extends CI_Controller{
    private $api_url = 'http://localhost:9000/api';

    public function __construct(){
        parent::__construct();
        
        $this->load->library('pagination');
        $this->load->helper('Api_helper');
        $this->load->helper('url');
    
    }  


    public function index(){
        $data['proyek_list'] = call_api($this->api_url.('/proyek'), 'GET');;
        $this->load->view('proyek/proyek_list', $data);
    }

    public function create(){
        $data['lokasi_list'] = call_api($this->api_url.('/lokasi'), 'GET');
        $this->load->view('proyek/proyek_create', $data);
    }

    public function store(){
        $array_of_lokasi = $this->input->post('lokasi');
        $object_of_lokasi = array();
        
        foreach($array_of_lokasi as $lokasi){
            $object_of_lokasi[] = array('id' => $lokasi);
        }
        // var_dump($object_of_lokasi); die;
        $json_lokas_id = json_encode($object_of_lokasi);
        
        $tglMulai = date('Y-m-d', strtotime($this->input->post('start-date')));
        $tglSelesai = date('Y-m-d', strtotime($this->input->post('end-date')));
    
        $data = [
            'namaProyek' => $this->input->post('nama_proyek'),
            'pimpinanProyek' => $this->input->post('pimpinan_proyek'),
            'client' => $this->input->post('client'),
            'lokasiProyek' => $object_of_lokasi,
            'tglMulai' => $tglMulai,
            'tglSelesai' => $tglSelesai,
            'keterangan' => 'asdfkjsldkfjslkfjslkdjflskjdf'
        ];
        

        $response = call_api($this->api_url.('/proyek'), 'POST', $data);

        redirect('index.php/proyek');
    }

    public function edit($id){
        $data['proyek'] = call_api($this->api_url.('/proyek/'.$id), 'GET');
        $data['lokasi_list'] = call_api($this->api_url.('/lokasi'), 'GET');
        $data['selected_lokasi'] = $data['proyek']['data']['lokasiProyek'];


        $this->load->view('proyek/proyek_edit', $data);
    }

    public function update($id){

        var_dump($this->input->post($id));
        $array_of_lokasi = $this->input->post('lokasi');
        $object_of_lokasi = array();

        foreach($array_of_lokasi as $lokasi){
            $object_of_lokasi[] = array('id' => $lokasi);
        }
        
        $tglMulai = date('Y-m-d', strtotime($this->input->post('start-date')));
        $tglSelesai = date('Y-m-d', strtotime($this->input->post('end-date')));
    
        $data = [
            'id' => $id,
            'namaProyek' => $this->input->post('nama_proyek'),
            'pimpinanProyek' => $this->input->post('pimpinan_proyek'),
            'client' => $this->input->post('client'),
            'lokasiProyek' => $object_of_lokasi,
            'tglMulai' => $tglMulai,
            'tglSelesai' => $tglSelesai,
            'keterangan' => 'asdfkjsldkfjslkfjslkdjflskjdf'
        ];

        $response = call_api($this->api_url.('/proyek'), 'PUT', $data);

        redirect('index.php/proyek');
    }

    public function delete($id){
        $data = [
            'id' => $id
        ];
        $response = call_api($this->api_url.('/proyek'), 'DELETE', $data);
        redirect('index.php/proyek');
    }


}