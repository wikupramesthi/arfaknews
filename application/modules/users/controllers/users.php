<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MX_Controller {

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
			$data['content'] 	= modules::run('users/tabel');
		
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
			$data['content'] 	= modules::run('users/tabel',$page);
		
			$this->load->view('template',$data);
		} else {
			redirect('login');
		}
	}

	public function tabel($page='')
	{
		$limit		= 8;
		if(!$page):
			$offset = 0;
		else:
			$offset = ($page-1) * $limit;
		endif;	
		
		$data["ls"] 				= $this->all_model->tampil_daftar_admin($offset,$limit);
		$tot_hal 					= $this->all_model->hitung_isi_1tabel('tbl_user','');
		
		$config['base_url'] 		= base_url().'users/page/';
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

		$this->load->view('users',$data);
	}

	public function edit($kode=0)
	{
		if ($this->session->userdata('status_admn') == 'superadmin' || $this->session->userdata('status_admn') == 'admin'){
			$data['header'] 	= modules::run('global/header/atas');
			$data['footer'] 	= modules::run('global/footer/bawah');
			$data['content'] 	= modules::run('users/edit_data',$kode);
		
			$this->load->view('template',$data);
		} else {
			redirect('login');
		}
	}

	public function edit_data($kode=0)
	{
		$data["kat"] 			= $this->all_model->jalankan_query_manual_select("select * from tbl_user where id='$kode'");

		$this->load->view('users_edit',$data);
	}

	public function update()
	{
		if ($this->session->userdata('status_admn') == 'superadmin' || $this->session->userdata('status_admn') == 'admin'){
			$id 					= mysql_real_escape_string($this->input->post('id'));
			$datapesan['nama'] 		= mysql_real_escape_string($this->input->post('nama'));
			$datapesan['username'] 	= mysql_real_escape_string($this->input->post('username'));
			$datapesan['password']	= mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($this->input->post('pass'),ENT_QUOTES))));
			$bersih 				= md5($datapesan['password']);
			$datapesan['stts'] 		= $this->input->post('stts');
			$datapesan['status'] 	= $this->input->post('lvl');
			
			if(empty($datapesan['password']))
			{
				$q 				= "update tbl_user set username='".$datapesan['username']."', nama='".$datapesan['nama']."',stts='".$datapesan['stts']."',status='".$datapesan['status']."' where id='".$id."'";
				$data["upd"] 	= $this->all_model->jalankan_query_manual($q);
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."users'>";
			}
			else
			{
				$q 				= "update tbl_user set username='".$datapesan['username']."', password='".$bersih."', nama='".$datapesan['nama']."',stts='".$datapesan['stts']."',status='".$datapesan['status']."' where id='".$id."'";
				$data["upd"] 	= $this->all_model->jalankan_query_manual($q);
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."users'>";
			}
		} else {
			redirect('login');
		}
	}

	public function insert()
	{
		if ($this->session->userdata('status_admn') == 'superadmin' || $this->session->userdata('status_admn') == 'admin'){
			$data['header'] 	= modules::run('global/header/atas');
			$data['footer'] 	= modules::run('global/footer/bawah');
			$data['content'] 	= modules::run('users/insert_data');
		
			$this->load->view('template',$data);
		} else {
			redirect('login');
		}
	}

	public function insert_data()
	{
		$this->load->view('users_tambah');
	}

	public function create()
	{
		if ($this->session->userdata('status_admn') == 'superadmin' || $this->session->userdata('status_admn') == 'admin'){
			$datapesan['nama'] 		= mysql_real_escape_string($this->input->post('nama'));
			$datapesan['username'] 	= mysql_real_escape_string($this->input->post('username'));
			$datapesan['password'] 	= mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($this->input->post('pass'),ENT_QUOTES))));
			$bersih 				= md5($datapesan['password']);
			$datapesan['stts'] 		= $this->input->post('stts');
			$datapesan['status'] 	= $this->input->post('lvl');
			
			$this->all_model->jalankan_query_manual("insert into tbl_user (username,password,nama,stts,status) values('".$datapesan['username']."','".$bersih."','".$datapesan['nama']."','".$datapesan['stts']."','".$datapesan['status']."')");
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."users'>";
		} else {
			redirect('login');
		}
	}

	public function delete($kode=0)
	{
		if ($this->session->userdata('status_admn') == 'superadmin' || $this->session->userdata('status_admn') == 'admin'){
			$data["upd"] = $this->all_model->hapus_konten($kode,"id","tbl_user");
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."users'>";
		} else {
			redirect('login');
		}
	}

}

/* End of file home.php */
/* Location: ./modules/controllers/home.php */
