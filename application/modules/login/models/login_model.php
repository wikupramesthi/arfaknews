<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
	}

	public function validate(){
	// grab user input
		$username = $this->security->xss_clean($this->input->post('username'));
		$password = $this->security->xss_clean($this->input->post('password'));

		// Prep the query
		$this->db->where('username', $username);
		$this->db->where('password', md5($password));
		$this->db->where('stts', '1');

		// Run the query
		$query = $this->db->get('tbl_user');
		// Let's check if there are any results
		if($query->num_rows() == 1)
		{
			// If there is a user, then create session data
			$row = $query->row();
			$data = array(
                'logged_in' 	=> '1',
				'username_admn' => $row->username,
				'password_admn' => $row->password,
				'nama_admn' 	=> $row->nama,
				'status_admn' 	=> $row->status,
				'id_admn' 		=> $row->id,
				'stts_admn' 	=> $row->stts
			);
			$this->session->set_userdata($data);
			return true;
		} else {
			// If the previous process did not validate
			// then return false.
			$this->session->set_flashdata('msg', 'Username dan Password tidak cocok');
			return false;
		}
	}

	public function validate_change(){
	// grab user input
		$pass1 		= $this->security->xss_clean($this->input->post('oldpass'));
		$pass2 		= $this->security->xss_clean($this->input->post('newpass1'));
		$pass3 		= $this->security->xss_clean($this->input->post('newpass2'));

		// Prep the query
		$this->db->where('id', $this->session->userdata('id_admn'));
		$this->db->where('password', md5($pass1));
		$this->db->where('stts', '1');

		// Run the query
		$query = $this->db->get('tbl_user');
		// Let's check if there are any results
		if($query->num_rows() == 1)
		{
			if ($pass2 == $pass3){
				$this->session->set_flashdata('sks', 'Password Berhasil Dirubah');
				$data = 'true';
				return $data;
			} else {
				$this->session->set_flashdata('msg', 'Konfirmasi Password tidak cocok');
				return false;
			}
		} else {
			$this->session->set_flashdata('msg', 'Password lama tidak cocok');
			return false;
		}
	}

    public function logout()
    {
        $data_session = array(
			'logged_in' 	=> '0',
			'username_admn' => '',
			'password_admn' => '',
			'nama_admn' 	=> '',
			'status_admn' 	=> '',
			'id_admn' 		=> '',
			'stts_admn' 	=> ''
		);
        $this->session->sess_destroy($data_session);
        $this->session->unset_userdata($data_session);

    }

}
