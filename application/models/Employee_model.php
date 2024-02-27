<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_model {
	
	
	
	function __construct()
    {
        parent::__construct();
    }

    public function get_employee(){
        $this->db->select('*');
        $this->db->from('Employee_master');
        $query=$this->db->get();
        return $query->result_array();
        
    }
}

?>