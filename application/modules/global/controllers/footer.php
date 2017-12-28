<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Footer extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
    }
	
	public function bawah()
	{
		$this->load->view('footer');
	}
}

/* End of file footer.php */
/* Location: ./modules/controllers/footer.php */
