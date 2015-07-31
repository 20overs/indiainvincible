<?php
class User_model extends CI_Model{
	public function __construct()
	{
	    parent::__construct();
	}
	public function login($username,$password){
		$sql = "select * from users where user=? and pass=? and type='1'";
		$query=$this->db->query($sql,array($username,md5($password)));
	  	if($query->num_rows()==1)
	  	{
  		 foreach($query->result() as $rows)
		 {
		   $newdata = array(
		    'user_id'  => $rows->user_id,
		    'user_email'  => $rows->user,
		    'user_name'  => $rows->name,
		    'user_level'  => 'user',
		    'logged_in'  => TRUE,
		    );
		  }
		$this->session->set_userdata($newdata);
		return true;
		}else{
			return false;
		}
	  }

	public function add_post($title,$content,$img,$thumb,$cat_id){
		$sql = "insert into posts(user_id_fk,image_url,img_thumb,heading,content,cat_id_fk,added) values(?,?,?,?,?,?,now())";
		if($img==""){
			$img = site_url()."upload/no_image.jpg";
		}
		$id = $this->session->userdata('user_id');
		$query=$this->db->query($sql,array($id,$img,$thumb,$title,$content,$cat_id));
		if($query){
			return true;
		}else{
			return false;
		}
	}
	public function get_post($id=null){
		if($id==null){
			$sql = "select * from posts";
			$query=$this->db->query($sql);
			if($query->num_rows()>0){
				return $query->result_array();
			}
		}else{
			$sql = "select * from posts where user_id_fk=?";
			$query=$this->db->query($sql,array($id));
			if($query->num_rows()>0){
				return $query->result_array();
			}
		}
	}
	public function delete($id,$dates){
		$sql = "delete from posts where post_id = ?";
		if($this->db->query($sql,array($id,$dates)))
		{
			echo "1";
		}else{
			echo "0";
		}
	}
}