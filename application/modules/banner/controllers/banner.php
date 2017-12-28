<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Banner extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
		$this->load->model('all_model');
    }
	
	public function index($channel=0,$category=0)
	{
		if ($this->session->userdata('status_admn') == 'superadmin' || $this->session->userdata('status_admn') == 'admin'){
			$data['header'] 	= modules::run('global/header/atas');
			$data['footer'] 	= modules::run('global/footer/bawah');
			$data['content'] 	= modules::run('banner/tabel',$channel,$category);
		
			$this->load->view('template',$data);
		} else {
			redirect('login');
		}
	}

	public function hal($channel=0,$category=0,$page=1)
	{
		if ($this->session->userdata('status_admn') == 'superadmin' || $this->session->userdata('status_admn') == 'admin'){
			$data['header'] 	= modules::run('global/header/atas');
			$data['footer'] 	= modules::run('global/footer/bawah');
			$data['content'] 	= modules::run('banner/tabel',$channel,$category,$page);
		
			$this->load->view('template',$data);
		} else {
			redirect('login');
		}
	}

	public function tabel($channel=0,$category=0,$page=1)
	{
		$limit		= 8;
		if($page==1):
			$offset = 0;
		else:
			$offset = ($page-1) * $limit;
		endif;	
		
		$data["tampil"] 			= $this->all_model->tampil_semua_links($channel,$category,$offset,$limit);
		$tot_hal 					= $this->all_model->hitung_semua_links($channel,$category);
		
		$data["objek"] 				= '';
		$data["subjek"] 			= '';

		$config['base_url'] 		= base_url().'/'.$this->uri->segment(1).'/hal/';
		$config['total_rows'] 		= $tot_hal->num_rows();
		$config['per_page'] 		= $limit;
		$config['uri_segment'] 		= 3;
		$config['use_page_numbers'] = TRUE;
		$config['first_link'] 		= 'Awal';
		$config['last_link'] 		= 'Akhir';
		$config['next_link'] 		= 'Selanjutnya';
		$config['prev_link'] 		= 'Sebelumnya';
		$config['full_tag_open'] 	= "<ul class='pagination'>";
		$config['full_tag_close'] 	="</ul>";
		$config['num_tag_open'] 	= '<li>';
		$config['num_tag_close'] 	= '</li>';
		$config['cur_tag_open'] 	= "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] 	= "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] 	= "<li>";
		$config['next_tagl_close'] 	= "</li>";
		$config['prev_tag_open'] 	= "<li>";
		$config['prev_tagl_close'] 	= "</li>";
		$config['first_tag_open'] 	= "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] 	= "<li>";
		$config['last_tagl_close'] 	= "</li>";
		$this->pagination->initialize($config);
		$data["paginator"] 			= $this->pagination->create_links();

		$this->load->view('banner',$data);
	}

	public function edit($kode=0)
	{
		if ($this->session->userdata('status_admn') == 'superadmin' || $this->session->userdata('status_admn') == 'admin'){
			$data['header'] 	= modules::run('global/header/atas');
			$data['footer'] 	= modules::run('global/footer/bawah');
			$data['content'] 	= modules::run('banner/edit_data',$kode);
		
			$this->load->view('template',$data);
		} else {
			redirect('login');
		}
	}

	public function edit_data($kode=0)
	{
		$data['dt'] 	= $this->all_model->get_single_data('tbl_link','id',$kode);

		$this->load->view('banner',$data);
	}

	public function update()
	{
		if ($this->session->userdata('status_admn') == 'superadmin' || $this->session->userdata('status_admn') == 'admin'){
			$data = array(
				'id_channel' 	=> $this->input->post('idchannel'),
				'id_categories' => $this->input->post('idcategory'),
				'nama' 			=> $this->input->post('nama'),
				'link' 			=> $this->input->post('link'),
				'urutan' 		=> $this->input->post('urutan')
			);
			$this->all_model->update_data('tbl_link','id',$this->input->post('idweblink'),$data);
			echo "<meta http-equiv='refresh' content='0; url=".base_url().$this->uri->segment(1)."'>";
		} else {
			redirect('login');
		}
	}

	public function insert()
	{
		if ($this->session->userdata('status_admn') == 'superadmin' || $this->session->userdata('status_admn') == 'admin'){
			$data['header'] 	= modules::run('global/header/atas');
			$data['footer'] 	= modules::run('global/footer/bawah');
			$data['content'] 	= modules::run('banner/insert_data');
		
			$this->load->view('template',$data);
		} else {
			redirect('login');
		}
	}

	public function insert_data()
	{
		if ($this->uri->segment(1) == 'banner'){
			$cat 				= '3';
		} else {
			$cat 				= '4';
		}
		$data['idcategory']	= $this->all_model->lihat_tabel_kondisi("tbl_categories","where id = '".$cat."'");
		$this->load->view('banner_tambah',$data);
	}

	public function create()
	{
		if ($this->session->userdata('status_admn') == 'superadmin' || $this->session->userdata('status_admn') == 'admin'){
			$data = array(
				'id_channel' 	=> $this->input->post('idchannel'),
				'id_categories' => $this->input->post('idcategory'),
				'nama' 			=> $this->input->post('nama'),
				'link' 			=> $this->input->post('link'),
				'urutan' 		=> $this->input->post('urutan')
			);
			$this->all_model->create_data('tbl_link',$data);
			echo "<meta http-equiv='refresh' content='0; url=".base_url().$this->uri->segment(1)."'>";
		} else {
			redirect('login');
		}
	}

	public function delete($kode=0)
	{
		if ($this->session->userdata('status_admn') == 'superadmin' || $this->session->userdata('status_admn') == 'admin'){
			$this->all_model->delete_data("tbl_link","id",$kode);
			echo "<meta http-equiv='refresh' content='0; url=".base_url().$this->uri->segment(1)."'>";
		} else {
			redirect('login');
		}
	}

}

/* End of file banner.php */
/* Location: ./modules/controllers/banner.php */
