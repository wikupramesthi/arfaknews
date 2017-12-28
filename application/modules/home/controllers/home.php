<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
    }
	
	public function index()
	{
		if ($this->session->userdata('status_admn') == 'superadmin' || $this->session->userdata('status_admn') == 'admin'){
			$data['header'] 	= modules::run('global/header/atas');
			$data['footer'] 	= modules::run('global/footer/bawah');
			$data['content'] 	= modules::run('home/isi');

			$this->load->view('template',$data);
		} else {
			redirect('login');
		}
	}

	public function isi()
	{
		$this->load->view('home');
	}

}

/* End of file home.php */
/* Location: ./modules/controllers/home.php */
