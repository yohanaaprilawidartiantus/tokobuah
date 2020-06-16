<?php
require APPPATH . 'libraries/REST_controller.php';

class product extends REST_controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function index_get($id = 0)
    {
        if(!empty($id)){
            $data = $this->db->get_where ("dokter", ["id_dokter" => $id ])->result();

        } else{
            $data = $this->db->get("dokter") -> result();

        }
        $this ->response ($data , REST_controller :: HTTP_OK);
    }
    public function index_post()
        {
            $input = $this->input->post();
            $this->db->insert('dokter', $input);
            $this->response(['dokter crested succesfully.'], REST_Controller::HTTP_OK);
        }
        /** 
         * Get All Data From This Method.
         * 
         *    @return   Response 
        */
    public function index_put($id)
    {
        $input = $this->put();
        $this->db->update('dokter', $input, array('id_dokter'=>$id));
        $this->response(['dokter updated successfully.'], REST_Controller::HTTP_OK);
    }
      /** 
         * Get All Data From This Method.
         * 
         *    @return   Response 
        */
    public function index_delete($id)
    {
        $this->db->delete('dokter', array('id_dokter'=>$id));
        $this->response(['dokter deleted successfully.'], REST_Controller::HTTP_OK);
    }
    //public function index_get()
    // {
    //     $input = $this->get('products', $input);

    // }

}
?>