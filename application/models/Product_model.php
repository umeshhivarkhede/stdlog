<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_model {
	
	
	
	function __construct()
    {
        parent::__construct();
    }
    public function checkuser($data){
        $username=$data['username'];
        $password=$data['password'];
        $this->db->select('id,name,username');
        $this->db->from('login');
        // $this->db->where($data);
        $this->db->where('username',$username);
        $this->db->where('password',$password);
        $query=$this->db->get();

        if( $query->num_rows()>'0'){
         return $query->row_array();
        }else{
            return FALSE;
        }



    }
    public function fetch_subject_list(){
        $this->db->select('*');
        $this->db->from('subject_list');
        $query=$this->db->get();
        return $query->result_array();

    }
    public function get_course_list(){
        $this->db->select('*');
        $this->db->from('course_list');
        $query=$this->db->get();
        return $query->result_array();
    }
    public function insert_course($data){
        
        $query=$this->db->insert('course_list',$data);
        if($query){
            return true;
        }else{
           // return $this->db->error();
             return FALSE;
        }

    }
    
    public function get_course_name($id){
        $this->db->select('course_name ');
        $this->db->from('course_list');
        $this->db->where('id',$id);
        $query=$this->db->get();
        if($query->num_rows()>'0'){
            return $query->row('course_name');
        }else{

        }

        


    }
    public function get_subject($id){
        $this->db->select('*');
        $this->db->from('subject_list');
        $this->db->where('id',$id);
        $query=$this->db->get();

        return $query->result();


    }
    Public function update_subject($id,$data){
        $query=$this->db->where('id',$id);
      $this->db->update('subject_list',$data);
  
  if($query){
    return TRUE;
  }

    }
    public function fetch_course(){
        $this->db->select('*');
        $this->db->from('subject_list');
        $this->db->group_by('course_id');
        $query=$this->db->get();
      
        if($query->num_rows()>'0'){
            return $query->result_array();
        }
        else
        {
            return false;
        }


    }
    public function fetch_subject($course_id){
        $this->db->select('*');
        $this->db->from('subject_list');
        $this->db->where('course_id',$course_id);
 
        $this->db->group_by('id');
        $query=$this->db->get();
      
        if($query->num_rows()>'0'){
            return $query->result_array();
        }
        else
        {
            return false;
        }


    }

    public function insert_subject($data){

        $query=$this->db->insert('subject_list',$data);
        if($query){
            return TRUE;
        }
    }

  public function insert_student_data($data){

      $query=$this->db->insert('students', $data);
 
      if($query)
      {
        return TRUE;
      }

    } 
    
    public function fetch_student($userid){
        $this->db->select('s.*,l.username');
        $this->db->from('students s'); 
        $this->db->join('user_login l', 's.created_by=l.id ');
        // if($userid==='2'){
          
        // }else{
        //        $this->db->where('s.created_by',$userid);
        // }
        $this->db->order_by('s.student_id','DESC');         
        $query = $this->db->get(); 
        
        
        if($query->num_rows() != 0)
        {
            return $query->result_array();
        }
        else
        {
            return false;
        }
    
    }
    
     public function fetch_student_by_id($stsid){
        $this->db->select('*');
        $this->db->from('students'); 
        $this->db->where('student_id',$stsid);
        $this->db->order_by('student_id','DESC');         
        $query = $this->db->get(); 
        
        
        if($query->num_rows() != 0)
        {
            return $query->result_array();
        }
        else
        {
            return false;
        }
    
    }
     public function update_student_data($stsid,$data){
    $query=$this->db->where('student_id', $stsid);
                $this->db->update('students', $data);
                
                
                if($query)
            {
                return TRUE;
            } 
            
     }
      public function fectchsubject(){
        $this->db->select('*');
        $this->db->from('subject_list'); 
       
        $this->db->order_by('sub_id','DESC');         
        $query = $this->db->get(); 
        
        
        if($query->num_rows() != 0)
        {
            return $query->result_array();
        }
        else
        {
            return false;
        }
    
    }
    
    public function insert_student_marks($data){

      $query=$this->db->insert('subject_marks', $data);
 
      if($query)
      {
        return TRUE;
      }

    }
    public function fetch_mark(){
       $this->db->select('s.*,sl.sub_name');
        $this->db->from('subject_marks s'); 
        $this->db->join('subject_list sl', 's.subject_id=sl.sub_id');
         
        $this->db->order_by('s.marks','DESC');         
        $query = $this->db->get(); 
        
        
        if($query->num_rows() != 0)
        {
            return $query->result_array();
        }
        else
        {
            return false;
        }
    }
    
    
    
}
	?>