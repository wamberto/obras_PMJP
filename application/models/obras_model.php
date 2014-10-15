<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Obras_model extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    
    public function list_all_works(){
         return $this->db->get('tb_obras')->result_array();
    }
}



/* End of file obras_model.php */
/* Location: ./application/model/obras_model.php */