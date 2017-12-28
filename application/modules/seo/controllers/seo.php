<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Seo extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
		$this->load->model('all_model');
    }
	
	public function index()
	{
		if ($this->session->userdata('status_admn') == 'superadmin' || $this->session->userdata('status_admn') == 'admin'){
			$data['header'] 	= modules::run('global/header/atas');
			$data['footer'] 	= modules::run('global/footer/bawah');
			$data['content'] 	= modules::run('seo/seo_view');
		
			$this->load->view('template',$data);
		} else {
			redirect('login');
		}
	}

	public function seo_view()
	{
		$this->load->view('seo');
	}


}

/* End of file seo.php */
/* Location: ./modules/controllers/seo.php */
