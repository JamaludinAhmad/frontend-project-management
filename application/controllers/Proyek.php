<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyek extends CI_Controller{
    private $api_url = 'http://localhost:9000/api/proyek';

    public function __construct(){
        parent::__construct();
        
        $this->load->library('pagination');
        $this->load->helper('Api_helper');
        $this->load->helper('url');
    
    }  


    public function index(){
        $data['proyek_list'] = call_api($this->api_url, 'GET');;
        $this->load->view('proyek/proyek_list', $data);
    }

    public function create(){
        $this->load->view('proyek/proyek_create');
    }
}