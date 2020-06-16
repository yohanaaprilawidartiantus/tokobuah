<?php

defined('BASEPATH') OR exit('no direct script access allowed');

class Sampel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->BASE_API="file:///C:/xampp/htdocs/tokobuah/";
        $this->load->library('curl');
        $this->load->helper('url');
        $this->load->helper('form');
       
    }

    public function index()
    {
        $data["pasien"] = json_decode($this->curl->simple_get($this->BASE_API.'/api/pasien'));
        $this->load->view("sampel/sampel_view");
    }

}