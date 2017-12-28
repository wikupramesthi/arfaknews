<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Statik extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
		$this->load->model('all_model');
    }

	public function channel($channel=0,$hal='',$page=1)
	{
		if ($this->session->userdata('status_admn') == 'superadmin' || $this->session->userdata('status_admn') == 'admin'){
			$data['header'] 	= modules::run('global/header/atas');
			$data['footer'] 	= modules::run('global/footer/bawah');
			$data['content'] 	= modules::run('statik/tabel',$channel);

			$this->load->view('template',$data);
		} else {
			redirect('login');
		}
	}

	public function tabel($channel=0,$hal='',$page=1)
	{
		$limit		= 8;
		if($page==1):
			$offset = 0;
		else:
			$offset = ($page-1) * $limit;
		endif;

		$data["tampil"] 			= $this->all_model->tampil_semua_statik($channel,$offset,$limit);
		$tot_hal 					= $this->all_model->hitung_semua_statik($channel);

		$data["objek"] 				= '';
		$data["subjek"] 			= '';
		$jh 						= $this->all_model->get_single_data('tbl_channel','id',$channel);
		$data["jh"] 				= $jh->nama_channel;

		$config['base_url'] 		= base_url().'/statik/channel/'.$channel.'/hal/';
		$config['total_rows'] 		= $tot_hal->num_rows();
		$config['per_page'] 		= $limit;
		$config['uri_segment'] 		= 5;
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

		$this->load->view('statik',$data);
	}

	public function edit($kode=0)
	{
		if ($this->session->userdata('status_admn') == 'superadmin' || $this->session->userdata('status_admn') == 'admin'){
			$data['header'] 	= modules::run('global/header/atas');
			$data['footer'] 	= modules::run('global/footer/bawah');
			$data['content'] 	= modules::run('statik/edit_data',$kode);

			$this->load->view('template',$data);
		} else {
			redirect('login');
		}
	}

	public function edit_data($kode=0)
	{
		$data['dt'] 	= $this->all_model->get_single_data('tbl_statis','id_statis',$kode);
		$jh 			= $this->all_model->get_single_data('tbl_channel','id',$data['dt']->id_channel);
		$data["jh"] 	= $jh->nama_channel;

		header("Cache-Control: no-cache, must-revalidate");
		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
		$this->load->view('statik_edit',$data);
	}

	public function update()
	{
		if ($this->session->userdata('status_admn') == 'superadmin' || $this->session->userdata('status_admn') == 'admin'){
			if(empty($_FILES['userfile']['name'])){
				$data = array(
					'id_channel' 		=> $this->input->post('idchannel'),
					'id_categories' 	=> $this->input->post('idcategory'),
					'isi' 				=> $this->input->post('isi'),
					'judul' 			=> $this->input->post('judul'),
					'urutan' 			=> $this->input->post('urutan')
				);
				$this->all_model->update_data('tbl_statis','id_statis',$this->input->post('idstatis'),$data);

				header("Cache-Control: no-cache, must-revalidate");
				header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
				//redirect(base_url().'statik/channel/'.$this->input->post('idchannel'));
				echo "<meta http-equiv='refresh' content='no-cache; url=".base_url().'statik/channel/'.$this->input->post('idchannel')."?".time()." '>";
			} else {
				$datakode					= $this->all_model->get_single_data('tbl_statis','id_statis',$this->input->post('idstatis'));
				$file1 						= 'statis/'.$this->uri->segment(1).'/detail/'.$datakode->gambar_detail;
				$file2 						= 'statis/'.$this->uri->segment(1).'/medium/'.$datakode->gambar_detail;
				unlink($file1);
				unlink($file2);

				$idb						= $this->input->post('idstatis');
				$fl							= $_FILES['userfile']['name'];
				$ext 						= end((explode(".", $fl)));
				$nama_file					= $idb.'.'.$ext;
				$config["file_name"]		= $idb;
				$config['upload_path'] 		= 'statis/'.$this->uri->segment(1).'/detail/';
				$config['allowed_types'] 	= 'bmp|gif|jpg|jpeg|png';
				$config['max_size'] 		= '1000';
				$config['max_width'] 		= '900';
				$this->load->library('upload', $config);

				if(!$this->upload->do_upload())
				{
					echo '<script type="text/javascript">';
					echo 'alert("'.$this->upload->display_errors().'");';
					echo 'window.history.back();';
					echo '</script>';
				}
				else {
					$this->load->library('image_lib');

					$config1['image_library'] 	= 'gd2';
					$config1['source_image'] 	= 'statis/'.$this->uri->segment(1).'/detail/'.$nama_file;
					$config1['new_image'] 		= 'statis/'.$this->uri->segment(1).'/detail/'.$nama_file;
					$config1['maintain_ratio'] 	= TRUE;
					$config1['width'] 			= 600;
					$config1['height'] 			= 300;
					$this->image_lib->initialize($config1);
					$this->image_lib->resize();
					$this->image_lib->clear();

					$config2['image_library'] 	= 'gd2';
					$config2['source_image'] 	= 'statis/'.$this->uri->segment(1).'/detail/'.$nama_file;
					$config2['new_image'] 		= 'statis/'.$this->uri->segment(1).'/medium/'.$nama_file;
					$config2['maintain_ratio'] 	= TRUE;
					$config2['width'] 			= 300;
					$config2['height'] 			= 150;
					$this->image_lib->initialize($config2);
					$this->image_lib->resize();
					$this->image_lib->clear();

					$data = array(
						'id_channel' 		=> $this->input->post('idchannel'),
						'id_categories' 	=> $this->input->post('idcategory'),
						'isi' 				=> $this->input->post('isi'),
						'judul' 			=> $this->input->post('judul'),
						'urutan' 			=> $this->input->post('urutan'),
						'gambar_detail' 	=> $nama_file
					);
					$this->all_model->update_data('tbl_statis','id_statis',$this->input->post('idstatis'),$data);
					header("Cache-Control: no-cache, must-revalidate");
					header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
					redirect(base_url().'statik/channel/'.$this->input->post('idchannel'));
					//echo "<meta http-equiv='refresh' content='0; url=".base_url().'statik/channel/'.$this->input->post('idchannel')."'>";
				}
			}
		} else {
			redirect('login');
		}
	}

	public function insert($channel=0)
	{
		if ($this->session->userdata('status_admn') == 'superadmin' || $this->session->userdata('status_admn') == 'admin'){
			$data['header'] 	= modules::run('global/header/atas');
			$data['footer'] 	= modules::run('global/footer/bawah');
			$data['content'] 	= modules::run('statik/insert_data',$channel);

			$this->load->view('template',$data);
		} else {
			redirect('login');
		}
	}

	public function insert_data($channel=0)
	{
		$data['chn']		= $channel;
		$data['cat']		= $this->all_model->lihat_tabel_kondisi_all("tbl_categories","where id_channel = '".$channel."'");
		$jh 				= $this->all_model->get_single_data('tbl_channel','id',$channel);
		$data["jh"] 		= $jh->nama_channel;

		$this->load->view('statik_tambah',$data);
	}

	public function create()
	{
		if ($this->session->userdata('status_admn') == 'superadmin' || $this->session->userdata('status_admn') == 'admin'){

			if(empty($_FILES['userfile']['name'])){
				$data = array(
					'id_channel' 		=> $this->input->post('idchannel'),
					'id_categories' 	=> $this->input->post('idcategory'),
					'isi' 				=> $this->input->post('isi'),
					'judul' 			=> $this->input->post('judul'),
					'urutan' 			=> $this->input->post('urutan')
				);
				$this->all_model->create_data('tbl_statis',$data);
				echo "<meta http-equiv='refresh' content='0; url=".base_url().'statik/channel/'.$this->input->post('idchannel')."'>";
			} else {
				$idb						= rand(00000000000,99999999999);
				$fl							= $_FILES['userfile']['name'];
				$ext 						= end((explode(".", $fl)));
				$nama_file					= $idb.'.'.$ext;
				$config["file_name"]		= $idb;
				$config['upload_path'] 		= 'statis/'.$this->uri->segment(1).'/detail/';
				$config['allowed_types'] 	= 'bmp|gif|jpg|jpeg|png';
				$config['max_size'] 		= '1000';
				$config['max_width'] 		= '900';
				$this->load->library('upload', $config);

				if(!$this->upload->do_upload())
				{
					echo '<script type="text/javascript">';
					echo 'alert("'.$this->upload->display_errors().'");';
					echo 'window.history.back();';
					echo '</script>';
				}
				else {
					$this->load->library('image_lib');

					$data = array(
						'id_channel' 		=> $this->input->post('idchannel'),
						'id_categories' 	=> $this->input->post('idcategory'),
						'isi' 				=> $this->input->post('isi'),
						'judul' 			=> $this->input->post('judul'),
						'urutan' 			=> $this->input->post('urutan')
					);
					$this->all_model->create_data('tbl_statis',$data);

					$idb						= $this->db->insert_id();
					$fl							= $_FILES['userfile']['name'];
					$ext 						= end((explode(".", $fl)));
					$nama_baru					= $idb.'.'.$ext;

					$config1['image_library'] 	= 'gd2';
					$config1['source_image'] 	= 'statis/'.$this->uri->segment(1).'/detail/'.$nama_file;
					$config1['new_image'] 		= 'statis/'.$this->uri->segment(1).'/detail/'.$nama_baru;
					$config1['maintain_ratio'] 	= TRUE;
					$config1['width'] 			= 600;
					$config1['height'] 			= 300;
					$this->image_lib->initialize($config1);
					$this->image_lib->resize();
					$this->image_lib->clear();

					$config2['image_library'] 	= 'gd2';
					$config2['source_image'] 	= 'statis/'.$this->uri->segment(1).'/detail/'.$nama_file;
					$config2['new_image'] 		= 'statis/'.$this->uri->segment(1).'/medium/'.$nama_baru;
					$config2['maintain_ratio'] 	= TRUE;
					$config2['width'] 			= 300;
					$config2['height'] 			= 150;
					$this->image_lib->initialize($config2);
					$this->image_lib->resize();
					$this->image_lib->clear();

					$fileasli 					= 'statis/'.$this->uri->segment(1).'/detail/'.$nama_file;
					unlink($fileasli);

					$data = array(
						'gambar_detail' 	=> $nama_baru
					);
					$this->all_model->update_data('tbl_statis','id_statis',$idb,$data);

					echo "<meta http-equiv='refresh' content='0; url=".base_url().'statik/channel/'.$this->input->post('idchannel')."'>";
				}
			}
		} else {
			redirect('login');
		}
	}

	public function delete($kode=0)
	{
		if ($this->session->userdata('status_admn') == 'superadmin' || $this->session->userdata('status_admn') == 'admin'){
			$datakode			= $this->all_model->get_single_data('tbl_statis','id_statis',$kode);
			$chn				= $datakode->id_channel;
			$file1 				= 'statis/'.$this->uri->segment(1).'/detail/'.$datakode->gambar_detail;
			$file2 				= 'statis/'.$this->uri->segment(1).'/medium/'.$datakode->gambar_detail;
			unlink($file1);
			unlink($file2);

			$this->all_model->delete_data("tbl_statis","id_statis",$kode);
			echo "<meta http-equiv='refresh' content='0; url=".base_url().'statik/channel/'.$chn."'>";
		} else {
			redirect('login');
		}
	}

}

/* End of file statik.php */
/* Location: ./modules/controllers/statik.php */
