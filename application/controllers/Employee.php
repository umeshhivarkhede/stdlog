<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {
  
    public function __construct(){
        parent :: __construct();

        $this->load-database();
        $this->load->model('Employee_model');
        $this->load->library('session');
    }

    public function View_employee(){
       
        $data['employee_list']=$this->Employee_model->get_employee();
        $this->load->view('View-Employee', $data);
    }

}
