<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Newsletter extends MX_Controller {

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
			$data['content'] 	= modules::run('newsletter/tabel');
		
			$this->load->view('template',$data);
		} else {
			redirect('login');
		}
	}

	public function hal($page=1)
	{
		if ($this->session->userdata('status_admn') == 'superadmin' || $this->session->userdata('status_admn') == 'admin'){
			$data['header'] 	= modules::run('global/header/atas');
			$data['footer'] 	= modules::run('global/footer/bawah');
			$data['content'] 	= modules::run('newsletter/tabel',$page);
		
			$this->load->view('template',$data);
		} else {
			redirect('login');
		}
	}

	public function tabel($page=1)
	{
		$limit		= 8;
		if($page==1):
			$offset = 0;
		else:
			$offset = ($page-1) * $limit;
		endif;	
		
		$data["tampil"] 			= $this->all_model->tampil_semua_newsletter($offset,$limit);
		$tot_hal 					= $this->all_model->hitung_semua_newsletter();
		
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

		$this->load->view('newsletter',$data);
	}

	public function edit($kode=0)
	{
		if ($this->session->userdata('status_admn') == 'superadmin' || $this->session->userdata('status_admn') == 'admin'){
			$data['header'] 	= modules::run('global/header/atas');
			$data['footer'] 	= modules::run('global/footer/bawah');
			$data['content'] 	= modules::run('newsletter/edit_data',$kode);
		
			$this->load->view('template',$data);
		} else {
			redirect('login');
		}
	}

	public function edit_data($kode=0)
	{
		$data['dt'] 	= $this->all_model->tampil_detail_newsletter($kode);
		$data['ch'] 	= $this->all_model->lihat_tabel_kondisi_all('tbl_categories','where id_channel = 2');

		$this->load->view('newsletter_edit',$data);
	}

	public function update()
	{
		if ($this->session->userdata('status_admn') == 'superadmin' || $this->session->userdata('status_admn') == 'admin'){
			$data = array(
				'nama' 			=> $this->input->post('nama'),
				'email' 		=> $this->input->post('email'),
				'id_channel' 	=> implode(',',$this->input->post('idchannel')),
				'stts' 			=> $this->input->post('stts')
			);
			$this->all_model->update_data('tbl_newsletter','id',$this->input->post('idnewsletter'),$data);
			echo "<meta http-equiv='refresh' content='0; url=".base_url().$this->uri->segment(1)."'>";
		} else {
			redirect('login');
		}
	}

	public function delete($kode=0)
	{
		if ($this->session->userdata('status_admn') == 'superadmin' || $this->session->userdata('status_admn') == 'admin'){
			$this->all_model->delete_data("tbl_newsletter","id",$kode);
			echo "<meta http-equiv='refresh' content='0; url=".base_url().$this->uri->segment(1)."'>";
		} else {
			redirect('login');
		}
	}

}

/* End of file newsletter.php */
/* Location: ./modules/controllers/newsletter.php */
