<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>	
	 */
	private $data;
	function __construct(){
		parent::__construct();
		$this->load->model('general_mod');
		$this->data['nav'] = $this->general_mod->get_category();
		$navs = $this->general_mod->get_category();
		$i=0;
		foreach ($navs as $row) {
			$this->data['posts'][$i] = $this->general_mod->get_one_post($row['cat_id']);
			$i++;
		}
	}
	public function index()
	{	
		$this->load->view('inc/header',$this->data);
		$this->load->view('home_view');
		$this->load->view('inc/footer');
	}

	public function page($id=null){

		if($id==null){
			$this->load->view('inc/header',$this->data);
			$this->load->view('404_view');
		}else{
			$id = preg_replace("/[^0-9]/","",$id);
			$count = $this->general_mod->count($id);
			if(!empty($count)){
				$this->data['extras'] = $this->general_mod->page($id);
				$this->data['title'] = $count['0']['cat'];
				$this->load->view('inc/header',$this->data);
				$this->load->view('first_page_view');
			}else{
				$this->load->view('inc/header',$this->data);
				$this->load->view('404_view');
			}
		}
		$this->load->view('inc/footer');
	}

	public function post($id){
		$id = preg_replace("/[^0-9]/","",$id);
		if($id==""){
			redirect('/welcome');
		}else{
			$this->data['extras'] = $this->general_mod->post($id);
		}
		$this->load->view('inc/header',$this->data);
		$this->load->view('second_page_view');
		$this->load->view('inc/footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
