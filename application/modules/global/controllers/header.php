<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Header extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('all_model');
    }
	
	public function atas()
	{
		$data["dinamis"]	= $this->all_model->lihat_tabel_kondisi_all("tbl_channel","where tipe = '2' and flag = '1' order by id ASC");
		$data["statik"]		= $this->all_model->lihat_tabel_kondisi_all("tbl_channel","where tipe = '1' and flag = '1' order by id ASC");
		
		$this->load->view('header',$data);
	}
}

/* End of file header.php */
/* Location: ./modules/controllers/header.php */
