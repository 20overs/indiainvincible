<?php
class User extends CI_Controller{
	private $data;
	function __construct(){
		parent::__construct();
		$this->load->model('general_mod');
		$this->load->model('user_model');
		$this->data['nav'] = $this->general_mod->get_category();
	}
	public function index(){
		$this->data['error']=0;
		if($this->session->userdata('logged_in')==TRUE){
			redirect('user/home');
		}
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'trim|required|valid_email|min_length[5]|max_length[20]|callback_username_check|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		
		if($this->form_validation->run()==TRUE){
			$this->load->model('user_model');
			$res = $this->user_model->login($this->input->post('username'),$this->input->post('password'));
			if($res==TRUE){
				redirect('user/home');
			}else{
				$this->data['error']=1;
			}
		}
		$this->load->view('inc/header',$this->data);
		$this->load->view('user/user_login');
		$this->load->view('inc/footer');
	}

	public function home(){
		if($this->session->userdata('logged_in')==FALSE){
			redirect('/user');
		}
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Title', 'trim|required|min_length[6]|max_length[20]|callback_username_check|xss_clean');
		$this->form_validation->set_rules('content', 'Content', 'trim|required|xss_clean|min_length[20]|max_length[200]');
		
		$this->load->model('user_model');
		$this->data['posts']=$this->user_model->get_post($this->session->userdata('user_id'));
		$this->data['user_post']=$this->general_mod->get_one_post();
		$this->load->view('inc/header',$this->data);
		$this->load->view('user/home_view');
		$this->load->view('inc/footer');
		}
	public function add_post($title=null,$content=null){
		
		if($title!=null && $content != null){
			
		}
		if($res){
			redirect('user/home');
		}
	}
	public function do_upload(){

		if($this->session->userdata('logged_in')==FALSE){
			redirect('/user');
		}
		$title = htmlentities(strtoupper(trim($this->input->post('title',TRUE))));
		$cat = htmlentities(trim($this->input->post('cat',TRUE)));
		//$content = htmlentities(trim(preg_replace('/(?:\r\n|[\r\n])/', PHP_EOL, $this->input->post('content',TRUE))));
		$content  = $this->input->post('content',TRUE);
		if(isset($_FILES['userfile'])){
			$files = $_FILES;
			$config['upload_path'] = 'upload/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']	= '20480000';
			$config['max_width']  = '2048';
			$config['max_height']  = '1600';
			$config['overwrite']  = TRUE;
			$config['remove_spaces']  = TRUE;
			$config['create_thumb'] = TRUE; 
			$this->load->library('upload', $config);
			$file_name_array = array();
		    $cpt = count($_FILES['userfile']['name']);

		        $_FILES['userfile']['name']= $files['userfile']['name'];
		        $_FILES['userfile']['type']= $files['userfile']['type'];
		        $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'];
		        $_FILES['userfile']['error']= $files['userfile']['error'];
		        $_FILES['userfile']['size']= $files['userfile']['size'];    

		        $this->upload->do_upload();
				$data = $this->upload->data();
				$temp_file_name = $data['file_name'];
				$temp_file_ext = $data['file_ext'];
				$file_name_full = site_url()."upload/".$temp_file_name;
				$file_name = "upload/".$data['file_name'];
				//$file_name_array[$i] = $file_name_full;
				if ( ! $this->upload->do_upload())
				{
					$error = $this->upload->display_errors();
					print_r($this->upload->display_errors());
				}
			
			$target_path = './upload/thumb/';
			    $config_manip = array(
			        'image_library' => 'gd2',
			        'source_image' => $file_name,
			        'new_image' => $target_path,
			        'maintain_ratio' => TRUE,
			        'create_thumb' => TRUE,
			        'thumb_marker' => '_thumb',
			        'quality' => '100%',
			        'width' => 350,
			        'height' => 250
			    );
			    $this->load->library('image_lib', $config_manip);
			    if (!$this->image_lib->resize()) {
			        echo $this->image_lib->display_errors();
			    }
			    $this->image_lib->clear();
			    $exp = explode(".", $temp_file_name);
			    $thumb_url = site_url().'upload/thumb/'.$exp[0]."_thumb".$temp_file_ext;
				$res = $this->user_model->add_post($title,$content,$file_name_full,$thumb_url,$cat);
				$this->session->set_userdata('message','Uploaded successfully');
				redirect('/user','refresh');
		}else{
			$img = site_url()."upload/no.png";
			$res = $this->user_model->add_post($title,$content,$img,$img,$cat);
			$this->session->set_userdata('message','Uploaded successfully');
			print_r($data);
			redirect('/user','refresh');
		}
	}


	public function delete_post(){
		if($this->input->post('id')){
			$this->load->model('user_model');
			$filename =  basename($this->input->post('urls'));
			$name = explode(".", $filename);
			$res = $this->user_model->delete($this->input->post('id',TRUE),$this->input->post('date',TRUE));
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('user');
	}
}