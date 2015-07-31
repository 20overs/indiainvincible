<?php
class Admin extends CI_Controller{
	private $data;
	function __construct(){
		parent::__construct();
		$this->load->model('general_mod');
		$this->data['nav'] = $this->general_mod->get_category();
	}
	public function index(){
		$this->load->model('admin_model');
		$this->data['title'] = "Admin Login";
		$this->data['error'] = 0;
		if($this->session->userdata('admin_logged_in')==TRUE){
			redirect('admin/welcome');
		}
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'trim|required|valid_email|min_length[5]|max_length[20]|callback_username_check|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		
		if($this->form_validation->run()==TRUE){
			$res = $this->admin_model->login($this->input->post('username'),$this->input->post('password'));
			if($res==TRUE){
				redirect('admin/welcome');
			}else{
				$this->data['error']=1;
			}
		}
		$this->load->view('inc/header',$this->data);
		$this->load->view('admin/admin_login');
		$this->load->view('inc/footer');
	}
	public function welcome(){
		$this->load->model('admin_model');
		$this->data['user_post']=$this->admin_model->get_post();
		$this->load->view('inc/header',$this->data);
		$this->load->view('admin/admin_welcome');
		$this->load->view('inc/footer');
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('admin');
	}
}
?>