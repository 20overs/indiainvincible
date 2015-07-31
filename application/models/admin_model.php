<?php
class Admin_model extends CI_Model{
	public function __construct()
	{
	    parent::__construct();
	}
	public function login($username,$password){
		$sql = "select * from users where user=? and pass=? and type='0'";
		$query=$this->db->query($sql,array($username,crypt($password,'cvvkshcv')));
	  	if($query->num_rows()==1)
	  	{
  		 foreach($query->result() as $rows)
		 {
		   $newdata = array(
		    'admin_user_id'  => $rows->user_id,
		    'admin_user_email'  => $rows->user,
		    'admin_user_name'  => $rows->name,
		    'user_level'  => 'Admin',
		    'admin_logged_in'  => TRUE,
		    );
		  }
		$this->session->set_userdata($newdata);
		return true;
		}else{
			return false;
		}
	  }
	public function get_post(){
		$sql = "select * from posts";
		$query=$this->db->query($sql);
		if($query->num_rows()>0){
			return $query->result_array();
		}else{
			return FALSE;
		}
	}
	public function delete($id,$dates){
		$sql = "delete from posts where post_id = ? and added=?";
		if($this->db->query($sql,array($id,$dates)))
		{
			echo "1";
		}else{
			echo "0";
		}
	}
}