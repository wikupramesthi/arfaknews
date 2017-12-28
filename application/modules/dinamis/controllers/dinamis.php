<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dinamis extends MX_Controller {

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
			$data['content'] 	= modules::run('dinamis/tabel',$channel,$hal,$page);

			$this->load->view('template',$data);
		} else {
			redirect('login');
		}
	}

	public function tabel($channel=0,$hal='',$page=1)
	{
		ini_set('display_errors', 1);
		error_reporting(E_ALL);
		$limit		= 8;
		if($page==1):
			$offset = 0;
		else:
			$offset = ($page-1) * $limit;
		endif;

		$data["tampil"] 			= $this->all_model->tampil_semua_dinamis($channel,$offset,$limit);
		$tot_hal 					= $this->all_model->hitung_semua_dinamis($channel);

		$data["objek"] 				= '';
		$data["subjek"] 			= 'tanggal';
		$jh 						= $this->all_model->get_single_data('tbl_channel','id',$channel);
		$data["jh"] 				= $jh->nama_channel;
		$data['ct']					= $this->all_model->lihat_tabel_kondisi_all("tbl_categories","where id_channel = '".$channel."'");

		$config['base_url'] 		= base_url().'/dinamis/channel/'.$channel.'/hal/';
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
		//echo '<pre>';print_r($data);die;
		$this->load->view('dinamis',$data);
	}

	public function edit($kode=0)
	{
		if ($this->session->userdata('status_admn') == 'superadmin' || $this->session->userdata('status_admn') == 'admin'){
			$data['header'] 	= modules::run('global/header/atas');
			$data['footer'] 	= modules::run('global/footer/bawah');
			$data['content'] 	= modules::run('dinamis/edit_data',$kode);

			$this->load->view('template',$data);
		} else {
			redirect('login');
		}
	}

	public function edit_data($kode=0)
	{
		$data['dt'] 		= $this->all_model->get_single_data('tbl_berita','id_berita',$kode);
		$data['cat']		= $this->all_model->lihat_tabel_kondisi_all("tbl_categories","where id_channel = '".$data['dt']->id_channel."'");
		$jh 				= $this->all_model->get_single_data('tbl_channel','id',$data['dt']->id_channel);
		$data["jh"] 		= $jh->nama;

		header("Cache-Control: no-cache, must-revalidate");
		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
		$this->load->view('dinamis_edit',$data);
	}

	public function update()
	{
		if ($this->session->userdata('status_admn') == 'superadmin' || $this->session->userdata('status_admn') == 'admin'){
			if(empty($_FILES['userfile']['name'])){
				$data = array(
					'id_channel' 		=> $this->input->post('idchannel'),
					'id_categories' 	=> $this->input->post('idcategory'),
					'penulis' 			=> $this->input->post('penulis'),
					'tanggal_tayang' 	=> date('Y-m-d',strtotime($this->input->post('tanggal'))),
					'waktu' 			=> date('H:i:s',strtotime($this->input->post('jam'))),
					'isi' 				=> $this->input->post('isi'),
					'lead' 				=> $this->input->post('lead'),
					'judul' 			=> $this->input->post('judul'),
					'headline' 			=> $this->input->post('headline'),
					'breaking' 			=> $this->input->post('breaking'),
					'analisis' 			=> $this->input->post('analisis'),
					'featured' 			=> $this->input->post('featured'),
					'hot' 				=> $this->input->post('hot'),
					'publish' 			=> $this->input->post('publish'),
					'tag' 				=> $this->input->post('tag'),
					'fokus' 			=> $this->input->post('fokus'),
					'caption' 			=> $this->input->post('caption')
				);
				$this->all_model->update_data('tbl_berita','id_berita',$this->input->post('idberita'),$data);
				echo "<meta http-equiv='refresh' content='0; url=".base_url().'dinamis/channel/'.$this->input->post('idchannel')."'>";
			} else {
				$datakode					= $this->all_model->get_single_data('tbl_berita','id_berita',$this->input->post('idberita'));
				$file1 						= 'statis/'.$this->uri->segment(1).'/detail/'.$datakode->gambar_detail;
				$file2 						= 'statis/'.$this->uri->segment(1).'/medium/'.$datakode->gambar_detail;
				unlink($file1);
				unlink($file2);

				$idb						= $this->input->post('idberita');
				$fl							= $_FILES['userfile']['name'];
				$ext 						= end((explode(".", $fl)));
				$nama_file					= $idb.'.'.$ext;
				$config["file_name"]		= $idb;
				$config['upload_path'] 		= 'statis/'.$this->uri->segment(1).'/detail/';
				$config['allowed_types'] 	= 'bmp|gif|jpg|jpeg|png';
				$config['max_size'] 		= '10000';
				$config['max_width'] 		= '2000';
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
					$config1['maintain_ratio'] 	= FALSE;
					$config1['width'] 			= 1440;
					$config1['height'] 			= 500;
					$this->image_lib->initialize($config1);
					$this->image_lib->resize();
					$this->image_lib->clear();

					$config2['image_library'] 	= 'gd2';
					$config2['source_image'] 	= 'statis/'.$this->uri->segment(1).'/detail/'.$nama_file;
					$config2['new_image'] 		= 'statis/'.$this->uri->segment(1).'/medium/'.$nama_file;
					$config2['maintain_ratio'] 	= FALSE;
					$config2['width'] 			= 500;
					$config2['height'] 			= 350;
					$this->image_lib->initialize($config2);
					$this->image_lib->resize();
					$this->image_lib->clear();

					$data = array(
						'id_channel' 		=> $this->input->post('idchannel'),
						'id_categories' 	=> $this->input->post('idcategory'),
						'penulis' 			=> $this->input->post('penulis'),
						'tanggal_tayang' 	=> date('Y-m-d',strtotime($this->input->post('tanggal'))),
						'waktu' 			=> date('H:i:s',strtotime($this->input->post('jam'))),
						'isi' 				=> $this->input->post('isi'),
						'lead' 				=> $this->input->post('lead'),
						'judul' 			=> $this->input->post('judul'),
						'headline' 			=> $this->input->post('headline'),
						'breaking' 			=> $this->input->post('breaking'),
						'analisis' 			=> $this->input->post('analisis'),
						'featured' 			=> $this->input->post('featured'),
						'hot' 				=> $this->input->post('hot'),
						'publish' 			=> $this->input->post('publish'),
						'tag' 				=> $this->input->post('tag'),
						'gambar_detail' 	=> $nama_file,
						'fokus' 			=> $this->input->post('fokus'),
						'caption' 			=> $this->input->post('caption')
					);
					$this->all_model->update_data('tbl_berita','id_berita',$this->input->post('idberita'),$data);

					echo "<meta http-equiv='refresh' content='0; url=".base_url().'dinamis/channel/'.$this->input->post('idchannel')."'>";
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
			$data['content'] 	= modules::run('dinamis/insert_data',$channel);

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
		$data["jh"] 		= $jh->nama;

		$this->load->view('dinamis_tambah',$data);
	}

	public function create()
	{
		if ($this->session->userdata('status_admn') == 'superadmin' || $this->session->userdata('status_admn') == 'admin'){

			$this->load->library('upload');

			// Jika ada 'chooseFeature' bervalue 'video' maka upload files
			if($this->input->post('chooseFeature') == 'video')
			{
				$result = $this->uploadVideo($_FILES);
				if(!$result['status'])
				{
					echo '<script type="text/javascript">';
					echo 'alert("video : '.$result['message'].'");';
					echo 'window.history.back();';
					echo '</script>';
					die;
				}
			}

			$idb						= rand(00000000000,99999999999);
			$fl							= $_FILES['userfile']['name'];
			$ext 						= end((explode(".", $fl)));
			$nama_file					= $idb.'.'.$ext;
			$config["file_name"]		= $idb;
			$config['upload_path'] 		= 'statis/'.$this->uri->segment(1).'/detail/';
			$config['allowed_types'] 	= 'mp4|bmp|gif|jpg|jpeg|png';
			$config['max_size'] 		= '10000';
			$config['max_width'] 		= '2000';
			$this->upload->initialize($config);

			if(!$this->upload->do_upload('userfile'))
			{
				echo '<script type="text/javascript">';
				echo 'alert("image : '.$this->upload->display_errors().'");';
				echo 'window.history.back();';
				echo '</script>';
				die;
			}
			else {
				$this->load->library('image_lib');

				// Check 'chooseFeature'
				if($this->input->post('chooseFeature') == 'video')
				{
					$media = 1;
					$media_data = "";
				}
				elseif ($this->input->post('chooseFeature') == 'embed')
				{
					$media = 2;
					$media_data = $this->input->post('videoembed');
				}
				else {
					$media = 0;
					$media_data = "";
				}
				// END OF Check 'chooseFeature'

				$data = array(
					'id_channel' 		=> $this->input->post('idchannel'),
					'id_categories' 	=> $this->input->post('idcategory'),
					'penulis' 			=> $this->input->post('penulis'),
					'tanggal_tayang' 	=> date('Y-m-d',strtotime($this->input->post('tanggal'))),
					'waktu' 			=> date('H:i:s',strtotime($this->input->post('jam'))),
					'isi' 				=> $this->input->post('isi'),
					'lead' 				=> $this->input->post('lead'),
					'judul' 			=> $this->input->post('judul'),
					'headline' 			=> $this->input->post('headline'),
					'breaking' 			=> $this->input->post('breaking'),
					'analisis' 			=> $this->input->post('analisis'),
					'featured' 			=> $this->input->post('featured'),
					'hot' 				=> $this->input->post('hot'),
					'publish' 			=> $this->input->post('publish'),
					'tag' 				=> $this->input->post('tag'),
					'fokus' 			=> $this->input->post('fokus'),
					'caption' 			=> $this->input->post('caption'),
					'media'				=> $media,
					'media_data'		=> $media_data,
				);
				$this->all_model->create_data('tbl_berita',$data);

				$idb						= $this->db->insert_id();
				$fl							= $_FILES['userfile']['name'];
				$ext 						= end((explode(".", $fl)));
				$nama_baru					= $idb.'.'.$ext;

				$config1['image_library'] 	= 'gd2';
				$config1['source_image'] 	= 'statis/'.$this->uri->segment(1).'/detail/'.$nama_file;
				$config1['new_image'] 		= 'statis/'.$this->uri->segment(1).'/detail/'.$nama_baru;
				$config1['maintain_ratio'] 	= FALSE;
				$config1['width'] 			= 750;
				$config1['height'] 			= 450;
				$this->image_lib->initialize($config1);
				$this->image_lib->resize();
				$this->image_lib->clear();

				$config2['image_library'] 	= 'gd2';
				$config2['source_image'] 	= 'statis/'.$this->uri->segment(1).'/detail/'.$nama_file;
				$config2['new_image'] 		= 'statis/'.$this->uri->segment(1).'/medium/'.$nama_baru;
				$config2['maintain_ratio'] 	= FALSE;
				$config2['width'] 			= 300;
				$config2['height'] 			= 250;
				$this->image_lib->initialize($config2);
				$this->image_lib->resize();
				$this->image_lib->clear();

				$fileasli 					= 'statis/'.$this->uri->segment(1).'/detail/'.$nama_file;
				unlink($fileasli);

				$datag = array(
					'gambar_detail' 	=> $nama_baru
				);

				$this->all_model->update_data('tbl_berita','id_berita',$idb,$datag);

				// Renaming Video Files sesuai dengan idbnya
				if($this->input->post('chooseFeature') == 'video'){
					$result = $this->renameVideo($_FILES, $idb, $result['filename']);
					if(!$result['status'])
					{
						echo '<script type="text/javascript">';
						echo 'alert("rename video : '.$result['message'].'");';
						echo 'window.history.back();';
						echo '</script>';
						die;
					}
				}

				echo "<meta http-equiv='refresh' content='0; url=".base_url().'dinamis/channel/'.$this->input->post('idchannel')."'>";
			}
		} else {
			redirect('login');
		}
	}

	// UPLOADING VIDEO
	public function uploadVideo($data){
		$id_video 					= rand(00000000000,99999999999);
		$fl							= $data['uservideo']['name'];
		$ext 						= end((explode(".", $fl)));
		$nama_file_video			= $id_video.'.'.$ext;
		$config["file_name"]		= $id_video;
		$config['upload_path'] 		= 'statis/'.$this->uri->segment(1).'/videos/';
		$config['allowed_types'] 	= 'mp4|bmp|gif|jpg|jpeg|png';
		$config['max_size'] 		= '20000000';
		$this->upload->initialize($config);

		if(!$this->upload->do_upload('uservideo'))
		{
			return ['status' => false, 'message' => $this->upload->display_errors()];
		} else {
			return ['status' => true, 'filename' => $nama_file_video];
		}
	}

	// RENAMING VIDEO
	public function renameVideo($data, $id, $oldname){
		$fl							= $data['uservideo']['name'];
		$ext 						= end((explode(".", $fl)));
		$newname					= $id.'.'.$ext;

		$dir 						= 'statis/'.$this->uri->segment(1).'/videos/';

		if(rename($dir.$oldname, $dir.$newname))
		{
			$datav = array(
				'media_data' 	=> $newname
			);
			$this->all_model->update_data('tbl_berita','id_berita',$id,$datav);

			return ['status' => true, 'filename' => $newname];
		} else {
			return ['status' => false, 'message' => 'file tidak berhasil di rename'];
		}

	}

	public function delete($kode=0)
	{
		if ($this->session->userdata('status_admn') == 'superadmin' || $this->session->userdata('status_admn') == 'admin'){
			$datakode			= $this->all_model->get_single_data('tbl_berita','id_berita',$kode);
			$chn				= $datakode->id_channel;
			$file1 				= 'statis/'.$this->uri->segment(1).'/detail/'.$datakode->gambar_detail;
			$file2 				= 'statis/'.$this->uri->segment(1).'/medium/'.$datakode->gambar_detail;
			unlink($file1);
			unlink($file2);

			$this->all_model->delete_data("tbl_berita","id_berita",$kode);
			echo "<meta http-equiv='refresh' content='0; url=".base_url().'dinamis/channel/'.$chn."'>";
		} else {
			redirect('login');
		}
	}

	public function cari($channel=0,$subjek='',$objek='',$hal='',$page=1)
	{
		if ($this->session->userdata('status_admn') == 'superadmin' || $this->session->userdata('status_admn') == 'admin'){
			$subjek				= ($this->input->post('subjek') ? $this->input->post('subjek') : $subjek);
			$objek				= ($this->input->post('objek') ? $this->input->post('objek') : ($objek ? url_title($objek,' ',TRUE) : ''));
			$hal				= ($hal ? $hal : '');
			$data['header'] 	= modules::run('global/header/atas');
			$data['footer'] 	= modules::run('global/footer/bawah');
			$data['content'] 	= modules::run('dinamis/tabel_cari',$channel,$subjek,$objek,$hal,$page);

			$this->load->view('template',$data);
		} else {
			redirect('login');
		}
	}

	public function tabel_cari($channel=0,$subjek='',$objek='',$hal='',$page=1)
	{
		$limit		= 8;
		if($page==1):
			$offset = 0;
		else:
			$offset = ($page-1) * $limit;
		endif;

		if ($subjek == 'tanggal'){
			$data["tampil"] 		= $this->all_model->tampil_semua_dinamis_on($channel,'tanggal_tayang',date('Y-m-d',strtotime($objek)),$offset,$limit);
			$tot_hal 				= $this->all_model->hitung_semua_dinamis_on($channel,'tanggal_tayang',date('Y-m-d',strtotime($objek)));
		} else {
			$data["tampil"] 		= $this->all_model->tampil_semua_dinamis_like($channel,$subjek,str_replace('-',' ',$objek),$offset,$limit);
			$tot_hal 				= $this->all_model->hitung_semua_dinamis_like($channel,$subjek,str_replace('-',' ',$objek));
		}

		$data["objek"] 				= $objek;
		$data["subjek"] 			= $subjek;
		$data['ct']					= $this->all_model->lihat_tabel_kondisi_all("tbl_categories","where id_channel = '".$channel."'");

		$config['base_url'] 		= base_url().'/dinamis/cari/'.$channel.'/'.$subjek.'/'.url_title($objek,'-',TRUE).'/hal/';
		$config['total_rows'] 		= $tot_hal->num_rows();
		$config['per_page'] 		= $limit;
		$config['uri_segment'] 		= 7;
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
//echo '<pre>';print_r($data);die;
		$this->load->view('dinamis',$data);
	}

}

/* End of file dinamis.php */
/* Location: ./modules/controllers/dinamis.php */
