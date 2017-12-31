<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Channel extends MX_Controller {

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
			$data['content'] 	= modules::run('channel/tabel');

			$this->load->view('template',$data);
		} else {
			redirect('login');
		}
	}

	public function page($page='')
	{
		if ($this->session->userdata('status_admn') == 'superadmin' || $this->session->userdata('status_admn') == 'admin'){
			$data['header'] 	= modules::run('global/header/atas');
			$data['footer'] 	= modules::run('global/footer/bawah');
			$data['content'] 	= modules::run('channel/tabel',$page);

			$this->load->view('template',$data);
		} else {
			redirect('login');
		}
	}

	public function tabel($page='')
	{
		$limit		= 7;
		if(!$page):
			$offset = 0;
		else:
			$offset = ($page-1) * $limit;
		endif;

		$data["d"] 					= $this->all_model->lihat_tabel_kondisi_all("tbl_channel","order by id ASC limit ".$offset.",".$limit."");
		$tot_hal 					= $this->all_model->hitung_isi_1tabel("tbl_channel","");
		$data["off"] 				= $limit;
		$data["hal"] 				= $page;

		$config['base_url'] 		= base_url().'channel/page/';
		$config['total_rows'] 		= $tot_hal->num_rows();
		$config['per_page'] 		= $limit;
		$config['num_links'] 		= 5;
		$config['uri_segment'] 		= 3;
		$config['use_page_numbers'] = TRUE;
		$config['first_link'] 		= 'Awal';
		$config['last_link'] 		= 'Akhir';
		$config['next_link'] 		= 'Selanjutnya';
		$config['prev_link'] 		= 'Sebelumnya';
		$config['full_tag_open'] 	= "<ul class='pagination'>";
		$config['full_tag_close'] 	= "</ul>";
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

		$this->load->view('channel',$data);
	}

	public function edit($kode=0)
	{
		if ($this->session->userdata('status_admn') == 'superadmin' || $this->session->userdata('status_admn') == 'admin'){
			$data['header'] 	= modules::run('global/header/atas');
			$data['footer'] 	= modules::run('global/footer/bawah');
			$data['content'] 	= modules::run('channel/edit_data',$kode);

			$this->load->view('template',$data);
		} else {
			redirect('login');
		}
	}

	public function edit_data($kode=0)
	{
		$data["d"] 	= $this->all_model->get_single_data('tbl_channel','id',$kode);

		$this->load->view('channel_edit',$data);
	}

	public function update()
	{
		if ($this->session->userdata('status_admn') == 'superadmin' || $this->session->userdata('status_admn') == 'admin'){
			$kode 			= $this->input->post('id');

			$data = array(
				'nama_channel' 	=> $this->input->post('nama'),
				'tipe' 			=> $this->input->post('tipe'),
				'flag' 			=> $this->input->post('flag')
			);
			$this->all_model->update_data('tbl_channel','id',$kode,$data);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."channel'>";
		} else {
			redirect('login');
		}
	}

	public function insert()
	{
		if ($this->session->userdata('status_admn') == 'superadmin' || $this->session->userdata('status_admn') == 'admin'){
			$data['header'] 	= modules::run('global/header/atas');
			$data['footer'] 	= modules::run('global/footer/bawah');
			$data['content'] 	= modules::run('channel/insert_data');

			$this->load->view('template',$data);
		} else {
			redirect('login');
		}
	}

	public function insert_data()
	{
		$this->load->view('channel_tambah');
	}

	public function create()
	{
		if ($this->session->userdata('status_admn') == 'superadmin' || $this->session->userdata('status_admn') == 'admin'){
			$data = array(
				'id' 			=> '',
				'nama_channel' 	=> $this->input->post('nama'),
				'tipe' 			=> $this->input->post('tipe'),
				'flag' 			=> $this->input->post('flag')
			);
			$this->all_model->create_data('tbl_channel',$data);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."channel'>";
		} else {
			redirect('login');
		}
	}

	public function delete($kode=0)
	{
		if ($this->session->userdata('status_admn') == 'superadmin' || $this->session->userdata('status_admn') == 'admin'){
			$this->all_model->delete_data("tbl_channel","id",$kode);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."channel'>";
		} else {
			redirect('login');
		}
	}

}

/* End of file channel.php */
/* Location: ./modules/controllers/channel.php */
