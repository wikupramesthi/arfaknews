<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Banner extends MX_Controller {

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
			$data['content'] 	= modules::run('banner/tabel');

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
			$data['content'] 	= modules::run('banner/tabel',$page);

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

		$data["tampil"] 			= $this->all_model->lihat_tabel_kondisi_all("tbl_banner","order by id ASC limit ".$offset.",".$limit."");
		$tot_hal 					= $this->all_model->hitung_isi_1tabel("tbl_banner","");

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
		$data['dt'] 	= $this->all_model->get_single_data('tbl_banner','id',$kode);

		$this->load->view('banner_edit',$data);
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

		// echo '<pre>';print_r($_FILES);print_r($this->input->post());die;
		if ($this->session->userdata('status_admn') == 'superadmin' || $this->session->userdata('status_admn') == 'admin'){

			$this->load->library('upload');

			// Jika ada 'chooseFeature' bervalue 'video' maka upload files

			$idb						= rand(00000000000,99999999999);
			$fl							= $_FILES['banner_img']['name'];
			$ext 						= end((explode(".", $fl)));
			$nama_file					= $idb.'.'.$ext;
			$config["file_name"]		= $idb;
			$config['upload_path'] 		= 'statis/'.$this->uri->segment(1);
			$config['allowed_types'] 	= 'mp4|bmp|gif|jpg|jpeg|png';
			$config['max_size'] 		= '10000';
			$config['max_width'] 		= '2000';
			// echo $config['upload_path'];die;
			$this->upload->initialize($config);

			if(!$this->upload->do_upload('banner_img'))
			{
				echo '<script type="text/javascript">';
				echo 'alert("image : '.$this->upload->display_errors().'");';
				echo 'window.history.back();';
				echo '</script>';
				die;
			}
			else {
				$this->load->library('image_lib');

				$data = array(
					'banner_name' 		=> $this->input->post('banner_name'),
					'img' 				=> $nama_file,
					'url' 				=> $this->input->post('banner_url'),
					'banner_post' 		=> $this->input->post('banner_post'),
					'status' 			=> $this->input->post('banner_status'),
				);
				$this->all_model->create_data('tbl_banner',$data);

				$idb						= $this->db->insert_id();
				$fl							= $_FILES['banner_img']['name'];
				$ext 						= end((explode(".", $fl)));
				// $nama_baru					= $idb.'.'.$ext;


				#resize image
				$config1['image_library'] 	= 'gd2';
				$config1['source_image'] 	= 'statis/'.$this->uri->segment(1).'/'.$nama_file;
				$config1['new_image'] 		= 'statis/'.$this->uri->segment(1).'/mobile/'.$nama_file;
				$config1['maintain_ratio'] 	= TRUE;

				list($orig_width, $orig_height) = getimagesize($config1['source_image']);

				// $width = 240;
				// $height = (($orig_height * $width) / $orig_width);
				$height = 150;
				$width = (($orig_width * $height) / $orig_height);

				$config1['width'] 			= $width;
				$config1['height'] 			= $height;

				$this->image_lib->initialize($config1);
				$this->image_lib->resize();
				$this->image_lib->clear();

				// $fileasli 					= 'statis/'.$this->uri->segment(1).'/detail/'.$nama_file;
				// unlink($fileasli);
			}


			echo "<meta http-equiv='refresh' content='0; url=".base_url().$this->uri->segment(1)."'>";
		} else {
			redirect('login');
		}
	}

	public function delete($kode=0)
	{
		if ($this->session->userdata('status_admn') == 'superadmin' || $this->session->userdata('status_admn') == 'admin'){
			$this->all_model->delete_data("tbl_banner","id",$kode);
			echo "<meta http-equiv='refresh' content='0; url=".base_url().$this->uri->segment(1)."'>";
		} else {
			redirect('login');
		}
	}

}

/* End of file banner.php */
/* Location: ./modules/controllers/banner.php */
