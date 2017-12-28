<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class All_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$hasil 		= array();
	}

	function create_data($tabel,$data)
	{
	  	$this->db->insert($tabel, $data);
	  	if($this->db->affected_rows() > 0){
			return true;
		} else{
			return false;
		}
	}

	function update_data($tabel,$key,$kode,$data)
	{
	  	$this->db->where($key, $kode);
	  	$this->db->update($tabel, $data);
	  	if($this->db->affected_rows() > 0){
			return true;
		}
		else{
			return false;
		}
	}

	function delete_data($tabel,$key,$kode)
	{
	  	$this->db->where($key, $kode);
	  	$this->db->delete($tabel);
		if($this->db->affected_rows() > 0){
			return true;
		}
		else{
			return false;
		}
	}

	function get_single_data($tabel,$key,$kode){
		$this->db->where($key, $kode);
		$query = $this->db->get($tabel);
		if($query->num_rows() > 0){
			return $query->row();
		}
		else{
			return null;
		}
	}

	function get_single_data_select($select,$tabel,$key,$kode){
		$this->db->select($select);
		if($key!=''){
			$this->db->where($key, $kode);
		}

		$query = $this->db->get($tabel);
		if($query->num_rows() > 0){
			foreach($query->result() as $row)
			{
				$hasil[] = $row;
			}
			return $hasil;
		}
		else{
			return null;
		}
	}

	function get_data($table_name,$id,$kode,$order,$kondisi,$limitStart='',$limitEnd='',$join='',$joinOn=''){

		if($join!=''){
			$this->db->join($join,$joinOn);
		}

		if($id!=''){
			$this->db->where($id,$kode);
		}
		if($table_name == 'tbl_berita')
		{
			$this->db->where('publish','1');
		}

		$this->db->order_by($order,$kondisi);

		if($limitStart!=''){
			$this->db->limit($limitEnd,$limitStart);
		}
		$query = $this->db->get($table_name);
		//echo $this->db->last_query();die;

	  	if($query->num_rows() > 0)
	  	{
			foreach($query->result() as $row)
			{
				$hasil[] = $row;
			}
			return $hasil;
		} else {
			return null;
		}
	}

	function search_news($key,$start,$limit,$channelId='',$newsId='')
	{
		//$start = ($start==1)?'':$start.',';
		$cId ='';
		if($channelId!='')
		{
			$cId = ' id_channel = '.$channelId.' AND ';
		}

		$nId = '';
		if($newsId!='')
		{
			$nId = ' id_berita <> '.$newsId.' AND ';
		}

		$query = "SELECT * FROM tbl_berita
                    join tbl_channel b ON b.id = tbl_berita.id_channel
                    WHERE ".$cId." ".$nId."
                    publish = '1' AND
                    CONCAT(tbl_berita.lead,tbl_berita.judul,tbl_berita.isi,tbl_berita.tag,tbl_berita.caption) LIKE '%".$key."%'
                    ORDER BY tanggal_tayang desc
                    LIMIT ".$start.$limit." ";

        return $this->db->query($query);
	}

	function jalankan_query_manual($datainput)
	{
		$q = $this->db->query($datainput);
	}

	function jalankan_query_manual_select($datainput)
	{
		$q = $this->db->query($datainput);
		return $q;
	}

	function hapus_konten($id,$seleksi,$tabel)
	{
		$this->db->where($seleksi,$id);
		$this->db->delete($tabel);
	}

	function hitung_isi_1tabel($tabel,$seleksi)
	{
		$q = $this->db->query("SELECT * from $tabel $seleksi");
		return $q;
	}

	function lihat_tabel_kondisi($tabel,$seleksi)
	{
		$q = $this->db->query("SELECT * from $tabel $seleksi");
		return $q->row();
	}

	function lihat_tabel_kondisi_all($tabel,$seleksi)
	{
		$q = $this->db->query("SELECT * from $tabel $seleksi");
		return $q;
	}

	/* USERS */
	function tampil_daftar_admin($offset,$limit)
	{
		$q = $this->db->query("SELECT * from tbl_user order by status DESC, nama ASC LIMIT $offset,$limit");
		return $q;
	}

	/* CATEGORIES */
	function tampil_semua_category($offset,$limit)
	{
		$q = $this->db->query("SELECT c.*, h.nama_channel as channel from tbl_categories as c left join tbl_channel as h on h.id = c.id_channel order by id_channel ASC, id ASC LIMIT $offset,$limit");
		return $q;
	}

	function hitung_semua_category()
	{
		$q = $this->db->query("SELECT c.*, h.nama_channel as channel from tbl_categories as c left join tbl_channel as h on h.id = c.id_channel");
		return $q;
	}

	/* STATIK */
	function tampil_semua_statik($channel,$offset,$limit)
	{
		$q = $this->db->query("SELECT * from tbl_statis where id_channel = $channel order by urutan ASC LIMIT $offset,$limit");
		return $q;
	}

	function hitung_semua_statik($channel)
	{
		$q = $this->db->query("SELECT * from tbl_statis where id_channel = $channel");
		return $q;
	}

	function tampil_detail_statik($id)
	{
		$q = $this->db->query("SELECT * from tbl_statis where id_statis='$id'");
		return $q;
	}

	/* TAG */
	function tampil_semua_tag($offset,$limit)
	{
		$q = $this->db->query("SELECT b.*, c.nama_channel as cat from tbl_tag as b left join tbl_channel as c on c.id = b.id_channel order by b.tanggal DESC LIMIT $offset,$limit");
		return $q;
	}

	/* DINAMIS */
	function tampil_semua_dinamis($channel,$offset,$limit)
	{
		$q = $this->db->query("SELECT b.*, c.nama as cat from tbl_berita as b left join tbl_categories as c on c.id = b.id_categories where b.id_channel = $channel order by b.tanggal_tayang DESC,b.waktu DESC LIMIT $offset,$limit");
		return $q;
	}

	function hitung_semua_dinamis($channel)
	{
		$q = $this->db->query("SELECT * from tbl_berita where id_channel = $channel");
		return $q;
	}

	function tampil_detail_dinamis($id)
	{
		$q = $this->db->query("SELECT * from tbl_berita where id_berita='$id'");
		return $q;
	}

	function tampil_semua_dinamis_on($channel,$subjek,$objek,$offset,$limit)
	{
		$q = $this->db->query("SELECT * from tbl_berita where id_channel = $channel and $subjek = '$objek' order by tanggal_tayang DESC,waktu DESC LIMIT $offset,$limit");
		return $q;
	}

	function hitung_semua_dinamis_on($channel,$subjek,$objek)
	{
		$q = $this->db->query("SELECT * from tbl_berita where id_channel = $channel and $subjek = '$objek'");
		return $q;
	}

	function tampil_semua_dinamis_like($channel,$subjek,$objek,$offset,$limit)
	{
		$q = $this->db->query("SELECT * from tbl_berita where id_channel = $channel and $subjek like '%$objek%' order by tanggal_tayang DESC,waktu DESC LIMIT $offset,$limit");
		return $q;
	}

	function hitung_semua_dinamis_like($channel,$subjek,$objek)
	{
		$q = $this->db->query("SELECT * from tbl_berita where id_channel = $channel and $subjek like '%$objek%'");
		return $q;
	}

	/* LINKS */
	function tampil_semua_links($channel,$category,$offset,$limit)
	{
		$q = $this->db->query("SELECT * from tbl_link where id_channel = $channel and id_categories = $category order by urutan ASC LIMIT $offset,$limit");
		return $q;
	}

	function hitung_semua_links($channel,$category)
	{
		$q = $this->db->query("SELECT * from tbl_link where id_channel = $channel and id_categories = $category");
		return $q;
	}

	function tampil_detail_links($id)
	{
		$q = $this->db->query("SELECT * from tbl_link where id ='$id'");
		return $q;
	}

	/* KOMENTAR */
	function tampil_semua_komentar($channel,$category,$offset,$limit)
	{
		//$q = $this->db->query("SELECT k.*, b.judul, b.id_berita from tbl_komentar as k left join tbl_berita as b on b.id_berita = k.id_berita where k.id_channel = $channel and k.id_categories = $category order by k.tanggal DESC, k.waktu DESC LIMIT $offset,$limit");
		//return $q;
		$q = $this->db->query("SELECT k.*, b.judul, b.id_berita from tbl_komentar as k left join tbl_berita as b on b.id_berita = k.id_berita order by k.tanggal DESC, k.waktu DESC LIMIT $offset,$limit");
		return $q;
	}

	function hitung_semua_komentar($channel,$category)
	{
		$q = $this->db->query("SELECT k.*, b.judul, b.id_berita from tbl_komentar as k left join tbl_berita as b on b.id_berita = k.id_berita where k.id_channel = $channel and k.id_categories = $category");
		return $q;
	}

	function tampil_detail_komentar($id)
	{
		$q = $this->db->query("SELECT k.*, b.judul, b.id_berita from tbl_komentar as k left join tbl_berita as b on b.id_berita = k.id_berita where k.id ='$id'");
		return $q->row();
	}

	/* NEWSLETTER */
	function tampil_semua_newsletter($offset,$limit)
	{
		$q = $this->db->query("SELECT * from tbl_newsletter order by nama ASC LIMIT $offset,$limit");
		return $q;
	}

	function hitung_semua_newsletter()
	{
		$q = $this->db->query("SELECT * from tbl_newsletter");
		return $q;
	}

	function tampil_detail_newsletter($id)
	{
		$q = $this->db->query("SELECT * from tbl_newsletter where id ='$id'");
		return $q->row();
	}

	function tampil_newsletter_kategori($id)
	{
		$q = $this->db->query("SELECT * from tbl_categories where id ='$id'");
		$row = $q->row();
		return $row->nama;
	}

}

