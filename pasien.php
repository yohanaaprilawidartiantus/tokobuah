<?php
require APPPATH . 'libraries/REST_Controller.php';
class Person extends REST_Controller{
// construct
  public function __construct(){
    parent::__construct();
    $this->load->model('PasienN');
  }
// method index untuk menampilkan semua data person menggunakan method get
  public function index_get(){
    $response = $this->PersonN->all_person();
    $this->response($response);
  }
// untuk menambah person menaggunakan method post
  public function add_post(){
    $response = $this->PersonM->add_person(
        $this->post('nama'),
        $this->post('tipe_pasien'),
        $this->post('alamat')
      );
    $this->response($response);
  }
// update data person menggunakan method put
  public function update_put(){
    $response = $this->PersonM->update_person(
        $this->put('no_rm'),
        $this->put('nama'),
        $this->put('tipe_pasien'),
        $this->put('alamat')
      );
    $this->response($response);
  }
// hapus data person menggunakan method delete
  public function delete_delete(){
    $response = $this->PersonM->delete_person(
        $this->delete('no_rm')
      );
    $this->response($response);
  }
}
?>