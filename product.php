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
            $data = $this->db->get_where ("products", ["product_id" => $id ])->result();

        } else{
            $data = $this->db->get("products") -> result();

        }
        $this ->response ($data , REST_controller :: HTTP_OK);
    }
    public function index_post()
        {
            $input = $this->input->post();
            $this->db->insert('products', $input);
            $this->response(['product crested succesfully.'], REST_Controller::HTTP_OK);
        }
        /** 
         * Get All Data From This Method.
         * 
         *    @return   Response 
        */
    public function index_put($id)
    {
        $input = $this->put();
        $this->db->update('products', $input, array('product_id'=>$id));
        $this->response(['product updated successfully.'], REST_Controller::HTTP_OK);
    }
      /** 
         * Get All Data From This Method.
         * 
         *    @return   Response 
        */
    public function index_delete($id)
    {
        $this->db->delete('products', array('product_id'=>$id));
        $this->response(['product deleted successfully.'], REST_Controller::HTTP_OK);
    }
}
?>