<?php

class General_mod extends CI_Model{
	public function get_category(){
		return $this->db->select('*')->from('category')->order_by('cat_id','asc')->get()->result_array();
	}
	public function get_one_post($id=null){
		if($id==null){
			$query = "select c.added,c.img_thumb,a.user_id,a.user,c.post_id,b.cat_id,b.cat,c.image_url,c.heading,c.content,c.added from
					users a,category b,posts c where a.user_id=c.user_id_fk and
					c.cat_id_fk = b.cat_id and c.user_id_fk=?  order by post_id desc";
			$sql = $this->db->query($query,array($this->session->userdata('user_id')));
			if($sql->num_rows() > 0){
				return $sql->result_array();
			}else{
				return false;
			}
		}else{
		$query = "select c.post_id,a.user_id,a.user,a.name,b.cat_id,b.cat,c.image_url,c.img_thumb,c.heading,c.content,c.added from
					users a,category b,posts c where a.user_id=c.user_id_fk and
					c.cat_id_fk = b.cat_id and c.cat_id_fk=?  order by added desc limit 1";
		$sql = $this->db->query($query,array($id));
		if($sql->num_rows() > 0){
			return $sql->result_array();
		}else{
			return false;
		}
	}
	}
	public function count($id){
		$query = "select * from category where cat_id=?";
		$sql = $this->db->query($query,array($id));
		return $sql->result_array();
	}
	public function page($id){
		$query = "select c.post_id,a.user_id,a.user,a.name,b.cat_id,b.cat,c.image_url,c.img_thumb,c.heading,c.content,c.added from
					users a,category b,posts c where a.user_id=c.user_id_fk and
					c.cat_id_fk = b.cat_id and c.cat_id_fk=? order by post_id desc limit 6";
		$sql = $this->db->query($query,array($id));
		if($sql->num_rows() > 0){
			return $sql->result_array();
		}else{
			return FALSE;
		}
	}

	public function post($id){
		$query = "select c.post_id,a.user_id,a.user,a.name,b.cat_id,b.cat,c.image_url,c.heading,c.content,c.added from
					users a,category b,posts c where a.user_id=c.user_id_fk and
					c.cat_id_fk = b.cat_id and c.post_id=? limit 1";
		$sql = $this->db->query($query,array($id));
		if($sql->num_rows() > 0){
			return $sql->result_array();
		}else{
			return false;
		}
	}
	public function latest_in_cat($cat_id,$limit){
		$query = "select c.post_id,a.user_id,a.user,a.name,b.cat_id,b.cat,c.heading,c.added from
					users a,category b,posts c where a.user_id=c.user_id_fk and
					c.cat_id_fk = b.cat_id and c.cat_id_fk=?  order by added desc limit ?";
		$sql = $this->db->query($query,array($cat_id,$limit));
		if($sql->num_rows() > 0){
			return $sql->result_array();
		}else{
			return false;
		}
	}

	public function latest_by_user($id,$limit){
		$query = "select * from posts where user_id_fk=? limit ?";
		$sql = $this->db->query($query,array($id,$limit));
		if($sql->num_rows() > 0){
			return $sql->result_array();
		}else{
			return false;
		}
	}
}
?>