<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
		$this->load->model('all_model');
        $this->load->model('login_model','',TRUE);
    }
	
	public function index()
	{
		$this->session->set_flashdata('msg', '');
		$this->load->view('login');
	}

	public function process(){

		// Validate the user can login
		$result = $this->login_model->validate();
		// Now we verify the result
		if($result != true){
			// If user did not validate, then show them login page again
			redirect('login');
		}else{
			redirect('home');
		}
	}

    public function logout()
    {
        $this->login_model->logout();
        redirect('login');
    }
 
	public function change_password()
	{
		$data['header'] 	= modules::run('global/header/atas');
		$data['footer'] 	= modules::run('global/footer/bawah');
		$data['content'] 	= modules::run('login/change_password_view');

		$this->load->view('template',$data);
	}

	public function change_password_view()
	{
		$this->load->view('form');
	}

	public function change_password_process(){

		// Validate the user can login
		$result = $this->login_model->validate_change();
		// Now we verify the result
		if($result == 'true'){
			$pass 		= md5($this->input->post('newpass1'));
			$this->all_model->jalankan_query_manual("update tbl_user set password='".$pass."' where id='".$this->session->userdata('id_admn')."'");
			
			redirect('login/change_password');
		}else{
			redirect('login/change_password');
		}
	}

}

/* End of file login.php */
/* Location: ./modules/controllers/login.php */
