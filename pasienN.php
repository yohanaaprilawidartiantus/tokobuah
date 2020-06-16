<?php
// extends class Model
class PersonM extends CI_Model{
// response jika field ada yang kosong
  public function empty_response(){
    $response['status']=502;
    $response['error']=true;
    $response['message']='Field tidak boleh kosong';
    return $response;
  }
// function untuk insert data ke tabel tb_person
  public function add_pasien($no_rm,$nama,$tipe_pasien,$alamat){
if(empty($no_rm) || empty($nama) || empty($tipe_pasien) || empty($alamat)){
      return $this->empty_response();
    }else{
      $data = array(
        "no_rm"=>$no_rm,
        "nama"=>$nama,
        "tipe_pasien"=>$tipe_pasien,
        "alamat"=>$alamat
      );
$insert = $this->db->insert("tokobuah", $data);
if($insert){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Data person ditambahkan.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data person gagal ditambahkan.';
        return $response;
      }
    }
}
// mengambil semua data person
  public function all_person(){
$all = $this->db->get("tokobuah")->result();
    $response['status']=200;
    $response['error']=false;
    $response['person']=$all;
    return $response;
}
// hapus data person
  public function delete_person($no_rm){
if($no_rm == ''){
      return $this->empty_response();
    }else{
      $where = array(
        "no_rm"=>$no_rm
      );
$this->db->where($where);
      $delete = $this->db->delete("tokobuah");
      if($delete){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Data pasien dihapus.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data pasien gagal dihapus.';
        return $response;
      }
    }
}
// update person
  public function update_person($no_rm,$nama,$tipe_pasien,$alamat){
if($no_rm == '' || empty($nama) || empty($tipe_pasien) || empty($alamat)){
      return $this->empty_response();
    }else{
      $where = array(
        "no_rm"=>$no_rm
      );
$set = array(
        "no_rm"=>$no_rm,
        "nama"=>$nama,
        "tipe_pasien"=>$tipe_pasien,
        "alamat"=>$alamat
      );
$this->db->where($where);
      $update = $this->db->update("tokobuah",$set);
      if($update){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Data pasien diubah.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Data pasien gagal diubah.';
        return $response;
      }
    }
}
}
?>