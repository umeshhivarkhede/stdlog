<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {
 
    public function __construct()
    {
      parent::__construct();
   
      $this->load->database();
      $this->load->model('Product_model');
      $this->load->helper('url');
      $this->load->library('form_validation');
      $this->load->helper('security');
      $this->load->helper('form');
      $this->load->library('session');
      $this->load->helper('email');
      $this->load->library('upload');



    }
 
	public function index()
	{
		 $data['course_list']=$this->Product_model->fetch_course();
	  $this->load->view('add-product',$data);
	}
 public function login(){
  $login=$this->input->post('login');
  if($login==='Login'){
    $username=$this->input->post('username');
    $password=$this->input->post('password');

    $password=md5($password);
    $auth_data=array(
      'username'=>$username,
      'password'=>$password
    );
      $result=$this->Product_model->checkuser($auth_data);
      if($result){
           $session_data=array(
            'username'=> $result['username'],
            'userid'=> $result['id']
           );
         $this->session->set_userdata('logged_in',$session_data);
          $username = $this->session->userdata['logged_in']['username'];
        
          redirect('/add-course');
        //  print_r($this->session->userdata());
      }else{
        $this->load->view('login');
      }

  }else{

    $this->load->view('login');

  }

 }
  public function add_course(){
     
    $this->load->view('add-course');

  }
  public function add_info(){
     
    $this->load->view('add-info');

  }
  public function insert_info(){
    

     $this->form_validation->set_rules('name', 'Student Name' ,'trim|required|xss_clean');
     $this->form_validation->set_rules('email','Student Email','trim|required|valid_email');
     $this->form_validation->set_rules('course','Course','trim|required');
     $this->form_validation->set_rules('gender','Gender','trim|required');
     $this->form_validation->set_rules('coupon_type','Select Coupon','trim|required');
     
     if(empty($_FILES['profile_pic']['name'])){
      $this->form_validation->set_rules('profile_pic','Image/Document','trim|required');
     }
     if ($this->form_validation->run() == FALSE)
                {
                  
                     $this->load->view('add-info');

                }else{
                  $name=$this->input->post('name');
                  $email=$this->input->post('email');
                  $course=$this->input->post('course');
                  $gender=$this->input->post('gender');
                  $coupon_type=$this->input->post('coupon_type');
                 
                  $data_array=array(
                        'name'=> $name,
                        'email'=>$email,
                        'gender'=>$gender,
                        'course'=>$course,
                        'status'=>$coupon_type,

                  );
                  $result=$this->Product_model->insert_info($data_array);
                   if($result){
                     
                    echo $result;
                   }
                }
  }


  public function user_list(){

    $data['user_list']=$this->Product_model->user_list();
    $this->load->view('view_users',$data);
    

  }
  public function insert_course(){
    $course_name=$this->input->post('course');

  
   $config = array(
				'file_name'=>time(),
				'overwrite'=>TRUE,
				'max_width'=>'10280',
				'max_height'=>'8000',
				'max_size'=>'24000000',
				'allowed_types' => "gif|jpg|png|jpeg",
				'upload_path'=>'public/Images' 
			); 
			$this->upload->initialize($config); 

      if($this->upload->do_upload('profile_pic')){
        $imageData = $this->upload->data();
        // $data['editInfo']->profile_pic;
       $fileName = $imageData['file_name'];
       $record['profile_pic'] = $fileName; 
      //  unlink($_SERVER['DOCUMENT_ROOT'].'/CI3/public/Images/'.$data['editInfo']->profile_pic);
       
     }  else{
       echo $this->upload->display_errors();
     }    

     exit();
     $course_data=array(
      'course_name'=>$course_name
     );

      $response=$this->Product_model->insert_course($course_data);
      if($response){
           redirect('/add-subject');
      }else{
        redirect('/add-course');
      }
  }

  public function view_course(){

  $data['course_list']=$this->Product_model->fetch_full_course_list();
  $this->load->view('view_course',$data);

  }

    public function get_subject()
	{
     
         $course_id=$this->security->xss_clean($this->input->post('course_id'));
         $vat="";
       
	  	   $subject_list=$this->Product_model->fetch_subject($course_id);
        //    echo "<span>hhh</span>";
        //    echo json_encode($subject_list);
          foreach($subject_list as $row){
        $vat.='<option value="'.$row['subject'].'" >'.$row['subject'].'</option>';
       }
       echo $vat;
 
 } 
 public function add_subject()
 {
    
  $data['course_list']=$this->Product_model->get_course_list();
      $this->load->view('add-new-subect',$data);

} 

public function insert_subject()
 {
     $subject=$this->input->post('subject');
     $course=$this->input->post('course');
      $course_name=$this->Product_model->get_course_name($course);


     $subject_data=array(
             'subject'=>$subject,
             'course_name'=>$course_name,
             'course_id'=>$course
     );

     $insert_data=$this->Product_model->insert_subject($subject_data);

 redirect('/view_subject');

} 
public function view_subject(){
  
$data['subject_list']=$this->Product_model->fetch_subject_list();
$this->load->view('view-subject',$data);

}

public function edit_subject($id){

  echo $this->uri->segment(3);
  $data['subject_data']=$this->Product_model->get_subject($id);

  $this->load->view('edit-subject',$data);

}
public function update_subject($id){
 $subject=$this->input->post('subject');
 $course=$this->input->post('course');
 
 $subject_data=array(
  'subject'=>$subject,
  'course_name'=>$course
 );
 
 $result=$this->Product_model->update_subject($id,$subject_data);
  redirect('/view_subject');
}
 
}
