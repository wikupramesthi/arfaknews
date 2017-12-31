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
		if ($this->session->userdata('status_admn') == 'superadmin' || $this->session->userdata('status_admn') == 'admin'){
			$data['content'] 	= modules::run('seo/edit_data',$kode);
			$this->load->view('template',$data);
		} else {
			redirect('login');
		}
		// $this->load->view('seo');
	}

	public function edit($kode=0)
	{
		if ($this->session->userdata('status_admn') == 'superadmin' || $this->session->userdata('status_admn') == 'admin'){
			$data['header'] 	= modules::run('global/header/atas');
			$data['footer'] 	= modules::run('global/footer/bawah');
			$data['content'] 	= modules::run('seo/edit_data',$kode);

			$this->load->view('template',$data);
		} else {
			redirect('login');
		}
	}

	public function edit_data($kode=0)
	{
		$data["d"] 			= $this->db->query('SELECT * FROM tbl_seo where status="active" ')->result();
		$this->load->view('seo',$data);
	}

	public function insert()
	{
		if ($this->session->userdata('status_admn') == 'superadmin' || $this->session->userdata('status_admn') == 'admin'){
			$data['header'] 	= modules::run('global/header/atas');
			$data['footer'] 	= modules::run('global/footer/bawah');
			$data['content'] 	= modules::run('seo/insert_data');

			$this->load->view('template',$data);
		} else {
			redirect('login');
		}
	}


	public function create()
	{
		// echo '<pre>';print_r($this->input->post());die;
		if ($this->session->userdata('status_admn') == 'superadmin' || $this->session->userdata('status_admn') == 'admin'){

			// $this->all_model->delete_data("tbl_seo","id",$this->input->post('id_seo'));
			$this->all_model->update_data('tbl_seo','id',$this->input->post('id_seo'),array('status'=>'inactive'));

			$data = array(
				'id' 			=> '',
				'title' 		=> $this->input->post('title'),
				'keyword' 		=> $this->input->post('keyword'),
				'desc' 			=> $this->input->post('desc'),
				'status' 		=> 'active'
			);
			$this->session->set_flashdata('sks', 'SEO Setting Success');
			$this->all_model->create_data('tbl_seo',$data);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."seo'>";
		} else {
			redirect('login');
		}
	}

}

/* End of file seo.php */
/* Location: ./modules/controllers/seo.php */
