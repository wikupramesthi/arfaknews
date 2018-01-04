<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Landing extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('all_model');
    }

    public function index()
    {
        //get_data($table_name,$id,$kode,$order,$kondisi,$limit='',$join='',$joinOn='')
        //$data['category'] = $this->all_model->get_data('tbl_channel','','','nama_channel','asc');
        $data['category'] = $this->all_model->lihat_tabel_kondisi_all("tbl_channel","where tipe = '2' and flag = '1' order by id ASC")->result();

        if(isset($_GET['s']))
        {
            $key = $_GET['s'];
            if($key!='')
            {
                $data['national'] = $this->all_model->search_news($key,'1','5','1')->result();

                $data['sport'] = $this->all_model->search_news($key,'1','3','2')->result();

                $data['kuliner'] = $this->all_model->search_news($key,'1','4','3')->result();

                $data['kesehatan'] = $this->all_model->search_news($key,'1','3','4')->result();

                $data['papua'] = $this->all_model->search_news($key,'1','4','5')->result();

                $data['lintas'] = $this->all_model->search_news($key,'1','4','6')->result();
            }
            else
            {
                $data['national'] = $this->all_model->get_data('tbl_berita','tbl_channel.id','1',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc','1','5',
                                    'tbl_channel','tbl_channel.id = tbl_berita.id_channel');
                $data['national1'] = $this->all_model->get_data('tbl_berita','tbl_channel.id','1',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc','2','3',
                                    'tbl_channel','tbl_channel.id = tbl_berita.id_channel');
                $data['sport'] = $this->all_model->get_data('tbl_berita','tbl_channel.id','2',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc','1','3',
                                'tbl_channel','tbl_channel.id = tbl_berita.id_channel');
                $data['kuliner'] = $this->all_model->get_data('tbl_berita','tbl_channel.id','3',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc','1','4',
                                    'tbl_channel','tbl_channel.id = tbl_berita.id_channel');
                $data['kesehatan'] = $this->all_model->get_data('tbl_berita','tbl_channel.id','4',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc','1','3',
                                    'tbl_channel','tbl_channel.id = tbl_berita.id_channel');
                $data['papua'] = $this->all_model->get_data('tbl_berita','tbl_channel.id','5',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc','1','4',
                                    'tbl_channel','tbl_channel.id = tbl_berita.id_channel');
                $data['lintas'] = $this->all_model->get_data('tbl_berita','tbl_channel.id','6',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc','1','4',
                                    'tbl_channel','tbl_channel.id = tbl_berita.id_channel');


            }
        }
        else
        {

            $data['national'] = $this->all_model->get_data('tbl_berita','tbl_channel.id','1',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc','1','5',
                                'tbl_channel','tbl_channel.id = tbl_berita.id_channel');
            $data['national1'] = $this->all_model->get_data('tbl_berita','tbl_channel.id','1',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc','2','3',
                                'tbl_channel','tbl_channel.id = tbl_berita.id_channel');
            $data['sport'] = $this->all_model->get_data('tbl_berita','tbl_channel.id','2',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc','1','3',
                            'tbl_channel','tbl_channel.id = tbl_berita.id_channel');
            $data['kuliner'] = $this->all_model->get_data('tbl_berita','tbl_channel.id','3',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc','1','4',
                                'tbl_channel','tbl_channel.id = tbl_berita.id_channel');
            $data['kesehatan'] = $this->all_model->get_data('tbl_berita','tbl_channel.id','4',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc','1','3',
                                'tbl_channel','tbl_channel.id = tbl_berita.id_channel');
            $data['papua'] = $this->all_model->get_data('tbl_berita','tbl_channel.id','5',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc','1','4',
                                'tbl_channel','tbl_channel.id = tbl_berita.id_channel');
            $data['lintas'] = $this->all_model->get_data('tbl_berita','tbl_channel.id','6',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc','1','4',
                                'tbl_channel','tbl_channel.id = tbl_berita.id_channel');
        }

        $data['featured'] = $this->all_model->get_data('tbl_berita','featured','1',"CONCAT((tanggal_tayang),(' '),(waktu))",'asc','0','5',
                            'tbl_channel','tbl_channel.id = tbl_berita.id_channel');
        // $data['featured'] = $this->all_model->jalankan_query_manual_select("SELECT * FROM tbl_berita a
        //                     JOIN tbl_channel b ON a.id_channel = b.id
        //                     WHERE id_berita in
        //                     (
        //                         SELECT
        //                         (SELECT b.id_berita FROM tbl_berita b WHERE b.id_channel = a.id AND publish = '1'
        //                         ORDER BY CONCAT(b.tanggal_tayang,' ',b.waktu) desc LIMIT 1) id_berita
        //                         FROM tbl_channel a
        //                     )
        //                     ORDER BY CONCAT(tanggal_tayang,' ',waktu) DESC
        //                     ")->result();

        $data['terbaru'] = $this->all_model->get_data('tbl_berita','','',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc','0','1',
                                    'tbl_channel','tbl_channel.id = tbl_berita.id_channel');
          $data['terbaru1'] = $this->all_model->get_data('tbl_berita','','',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc','1','3',
                                    'tbl_channel','tbl_channel.id = tbl_berita.id_channel');

        /*Side bar*/
        $data['headline'] = $this->all_model->get_data('tbl_berita','headline','1',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc','0','5',
                            'tbl_channel','tbl_channel.id = tbl_berita.id_channel');
        $data['hot'] = $this->all_model->get_data('tbl_berita','hot','1',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc','1','5',
                        'tbl_channel','tbl_channel.id = tbl_berita.id_channel');
        $data['kutipan'] = $this->all_model->get_data('tbl_berita','','',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc','1','5',
                        'tbl_channel','tbl_channel.id = tbl_berita.id_channel');
        $data['breaking'] = $this->all_model->get_data('tbl_berita','breaking','1',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc','1','4',
                        'tbl_channel','tbl_channel.id = tbl_berita.id_channel');
        $data['editor'] = $this->all_model->get_data('tbl_berita','analisis','1',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc','1','5',
                        'tbl_channel','tbl_channel.id = tbl_berita.id_channel');

        $data['pop_tag'] = $this->all_model->get_data('tbl_tag','','','tanggal','desc','1','12','tbl_channel','tbl_channel.id = tbl_tag.id_channel');

        $this->load->view('landing',$data);
    }

    function view_news($newsid,$cat='',$judul='')
    {
        $data['category'] = $this->all_model->lihat_tabel_kondisi_all("tbl_channel","where tipe = '2' and flag = '1' order by id ASC")->result();
        $data['newsDetail'] = $this->all_model->get_single_data('tbl_berita','id_berita',$newsid);
        $data['terbaru'] = $this->all_model->get_data('tbl_berita','','',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc','0','10',
                                    'tbl_channel','tbl_channel.id = tbl_berita.id_channel');

        $id_berita = $data['newsDetail']->id_berita;
        $id_channel = $data['newsDetail']->id_channel;
        $key = '';//$data['newsDetail']->judul;
        $start = '0';
        $limit = '6';

        $data['releated'] = $this->all_model->search_news($key,$start,$limit,$id_channel,$id_berita)->result();

       /*Side bar*/
        $data['headline'] = $this->all_model->get_data('tbl_berita','headline','1',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc','0','5',
                            'tbl_channel','tbl_channel.id = tbl_berita.id_channel');
        $data['hot'] = $this->all_model->get_data('tbl_berita','hot','1',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc','1','1',
                        'tbl_channel','tbl_channel.id = tbl_berita.id_channel');
        $data['kutipan'] = $this->all_model->get_data('tbl_berita','','',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc','1','5',
                        'tbl_channel','tbl_channel.id = tbl_berita.id_channel');
        $data['editor'] = $this->all_model->get_data('tbl_berita','analisis','1',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc','1','5',
                        'tbl_channel','tbl_channel.id = tbl_berita.id_channel');
        $data['pop_tag'] = $this->all_model->get_data('tbl_tag','','','tanggal','desc','1','12','tbl_channel','tbl_channel.id = tbl_tag.id_channel');

        $data_update = array('counter'=> ($data['newsDetail']->counter+1) );
        $this->all_model->update_data('tbl_berita','id_berita',$newsid,$data_update);
        //echo $this->db->last_query();die;

        $this->load->view('single',$data);
    }

    function view_channel($channelId='',$channelName='',$page='')
    {
        $start ='0';
        $limit = '10';
        if(isset($_REQUEST['page']))
        {
            $pg = $_REQUEST['page'];

            $start = ($limit*($pg-1))+1;
        }

        if(isset($_GET['s']))
        {
            $key = $_GET['s'];
            if($key!='')
            {
                $start = ($start==1)?'':$start.',';

                $data['channel_list'] = $this->all_model->search_news($key,$start,$limit,$channelId)->result();

                $numRow = $this->all_model->jalankan_query_manual_select("SELECT id_berita FROM tbl_berita
                            join tbl_channel b ON b.id = tbl_berita.id_channel
                            WHERE id_channel = '".$channelId." '
                            AND publish = '1'
                            AND CONCAT(tbl_berita.lead,tbl_berita.judul,tbl_berita.isi,tbl_berita.tag,tbl_berita.caption) LIKE '%".$key."%'");
            }
            else
            {
                $data['channel_list'] = $this->all_model->get_data('tbl_berita','tbl_channel.id',$channelId,"CONCAT((tanggal_tayang),(' '),(waktu))",'desc',$start,$limit,
                            'tbl_channel','tbl_channel.id = tbl_berita.id_channel');
                $numRow = $this->all_model->jalankan_query_manual_select('SELECT id_berita FROM tbl_berita WHERE id_channel="'.$channelId.'" AND publish = "1" ');
            }
        }
        else
        {
            $data['channel_list'] = $this->all_model->get_data('tbl_berita','tbl_channel.id',$channelId,"CONCAT((tanggal_tayang),(' '),(waktu))",'desc',$start,$limit,
                            'tbl_channel','tbl_channel.id = tbl_berita.id_channel');
            $numRow = $this->all_model->jalankan_query_manual_select('SELECT id_berita FROM tbl_berita WHERE id_channel="'.$channelId.'" AND publish = "1" ');
        }

        //echo $this->db->last_query();die;
        //echo ceil($numRow->num_rows()/$limit);die;
        $data['pages'] = ceil($numRow->num_rows()/$limit);

        $data['category'] = $this->all_model->lihat_tabel_kondisi_all("tbl_channel","where tipe = '2' and flag = '1' order by id ASC")->result();

        /*Side bar*/
        $data['headline'] = $this->all_model->get_data('tbl_berita','headline','1',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc','0','5',
                            'tbl_channel','tbl_channel.id = tbl_berita.id_channel');
        $data['hot'] = $this->all_model->get_data('tbl_berita','hot','1',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc','1','1',
                        'tbl_channel','tbl_channel.id = tbl_berita.id_channel');
        $data['kutipan'] = $this->all_model->get_data('tbl_berita','','',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc','1','5',
                        'tbl_channel','tbl_channel.id = tbl_berita.id_channel');
        $data['editor'] = $this->all_model->get_data('tbl_berita','analisis','1',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc','1','5',
                        'tbl_channel','tbl_channel.id = tbl_berita.id_channel');
        $data['pop_tag'] = $this->all_model->get_data('tbl_tag','','','tanggal','desc','1','12','tbl_channel','tbl_channel.id = tbl_tag.id_channel');

        //echo '<pre>';print_r($data['channel']);die;
        $this->load->view('category',$data);
    }

    function view_menu()
    {
        //get_single_data_select($select,$tabel,$key,$kode){
        $header = $this->all_model->get_single_data_select('a.*,(SELECT count(id) FROM tbl_categories x WHERE x.id_channel = a.id) sub_cat','tbl_channel a');

        foreach ($header as $row) {
            $menu[] = $row;
        }
        //$data['channel'] =
        echo '<pre>';print_r($menu);die;
        //$this->load->view('404',$data);
    }

    function view_recent()
    {
        $start ='1';
        $limit = '10';
        if(isset($_REQUEST['page']))
        {
            $pg = $_REQUEST['page'];

            $start = ($limit*($pg-1))+1;
        }

        if(isset($_GET['s']))
        {
            $key = $_GET['s'];
            if($key!='')
            {
                $data['terbaru'] = $this->all_model->search_news($key,$start,$limit)->result();

                $numRow = $this->all_model->jalankan_query_manual_select("SELECT id_berita FROM tbl_berita
                            join tbl_channel b ON b.id = tbl_berita.id_channel
                            WHERE
                            publish = '1' AND
                            CONCAT(tbl_berita.lead,tbl_berita.judul,tbl_berita.isi,tbl_berita.tag,tbl_berita.caption) LIKE '%".$key."%'");
            }
            else
            {
                $data['terbaru'] = $this->all_model->get_data('tbl_berita','','',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc',$start,$limit,
                            'tbl_channel','tbl_channel.id = tbl_berita.id_channel');
                //echo $this->db->last_query();die;
                $numRow = $this->all_model->jalankan_query_manual_select("SELECT id_berita FROM tbl_berita WHERE publish = '1' ");
            }
        }
        else
        {
            $data['terbaru'] = $this->all_model->get_data('tbl_berita','','',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc',$start,$limit,
                            'tbl_channel','tbl_channel.id = tbl_berita.id_channel');
            $numRow = $this->all_model->jalankan_query_manual_select("SELECT id_berita FROM tbl_berita WHERE publish = '1' ");
        }

        $data['category'] = $this->all_model->lihat_tabel_kondisi_all("tbl_channel","where tipe = '2' and flag = '1' order by id ASC")->result();

        //echo ceil($numRow->num_rows()/6);die;
        $data['pages'] = ceil($numRow->num_rows()/$limit);

       /*Side bar*/
        $data['headline'] = $this->all_model->get_data('tbl_berita','headline','1',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc','0','5',
                            'tbl_channel','tbl_channel.id = tbl_berita.id_channel');
        $data['hot'] = $this->all_model->get_data('tbl_berita','hot','1',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc','1','1',
                        'tbl_channel','tbl_channel.id = tbl_berita.id_channel');
        $data['kutipan'] = $this->all_model->get_data('tbl_berita','','',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc','1','5',
                        'tbl_channel','tbl_channel.id = tbl_berita.id_channel');
        $data['editor'] = $this->all_model->get_data('tbl_berita','analisis','1',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc','1','5',
                        'tbl_channel','tbl_channel.id = tbl_berita.id_channel');
        $data['pop_tag'] = $this->all_model->get_data('tbl_tag','','','tanggal','desc','1','12','tbl_channel','tbl_channel.id = tbl_tag.id_channel');

        $this->load->view('recent',$data);
    }

        function view_tagging()
    {

        $start ='1';
        $limit = '10';
        if(isset($_REQUEST['page']))
        {
            $pg = $_REQUEST['page'];

            $start = ($limit*($pg-1))+1;
        }

        if(isset($_GET['s']))
        {
            $key = $_GET['s'];
            if($key!='')
            {
                $data['terbaru'] = $this->all_model->search_news($key,$start,$limit)->result();

                $numRow = $this->all_model->jalankan_query_manual_select("SELECT id_berita FROM tbl_berita
                            join tbl_channel b ON b.id = tbl_berita.id_channel
                            WHERE
                            publish = '1' AND
                            CONCAT(tbl_berita.lead,tbl_berita.judul,tbl_berita.isi,tbl_berita.tag,tbl_berita.caption) LIKE '%".$key."%'");
            }
            else
            {
                $data['terbaru'] = $this->all_model->get_data('tbl_berita','','',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc',$start,$limit,
                            'tbl_channel','tbl_channel.id = tbl_berita.id_channel');
                //echo $this->db->last_query();die;
                $numRow = $this->all_model->jalankan_query_manual_select("SELECT id_berita FROM tbl_berita WHERE publish = '1' ");
            }
        }
        else
        {
            $data['terbaru'] = $this->all_model->get_data('tbl_berita','','',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc',$start,$limit,
                            'tbl_channel','tbl_channel.id = tbl_berita.id_channel');
            $numRow = $this->all_model->jalankan_query_manual_select("SELECT id_berita FROM tbl_berita WHERE publish = '1' ");
        }

        $data['category'] = $this->all_model->lihat_tabel_kondisi_all("tbl_channel","where tipe = '2' and flag = '1' order by id ASC")->result();

        //echo ceil($numRow->num_rows()/6);die;
        $data['pages'] = ceil($numRow->num_rows()/$limit);

       /*Side bar*/
        $data['headline'] = $this->all_model->get_data('tbl_berita','headline','1',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc','0','5',
                            'tbl_channel','tbl_channel.id = tbl_berita.id_channel');
        $data['hot'] = $this->all_model->get_data('tbl_berita','hot','1',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc','1','1',
                        'tbl_channel','tbl_channel.id = tbl_berita.id_channel');
        $data['kutipan'] = $this->all_model->get_data('tbl_berita','','',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc','1','5',
                        'tbl_channel','tbl_channel.id = tbl_berita.id_channel');
        $data['editor'] = $this->all_model->get_data('tbl_berita','analisis','1',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc','1','5',
                        'tbl_channel','tbl_channel.id = tbl_berita.id_channel');
        $data['pop_tag'] = $this->all_model->get_data('tbl_tag','','','tanggal','desc','1','12','tbl_channel','tbl_channel.id = tbl_tag.id_channel');

        $this->load->view('tagging',$data);
    }

function sitemap()
    {

        $data =  $this->all_model->get_single_data('tbl_berita','id_berita',$newsid);//select urls from DB to Array
        header("Content-Type: text/xml;charset=iso-8859-1");
        $this->load->view("sitemap",$data);
    }

    function view_page($judul)
    {
        $data['category'] = $this->all_model->lihat_tabel_kondisi_all("tbl_channel","where tipe = '2' and flag = '1' order by id ASC")->result();

        $data['content'] = $this->all_model->get_single_data('tbl_statis','judul',urldecode($judul));

         /*Side bar*/
        $data['headline'] = $this->all_model->get_data('tbl_berita','headline','1',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc','0','5',
                            'tbl_channel','tbl_channel.id = tbl_berita.id_channel');
        $data['hot'] = $this->all_model->get_data('tbl_berita','hot','1',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc','1','1',
                        'tbl_channel','tbl_channel.id = tbl_berita.id_channel');
        $data['kutipan'] = $this->all_model->get_data('tbl_berita','','',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc','1','5',
                        'tbl_channel','tbl_channel.id = tbl_berita.id_channel');
        $data['editor'] = $this->all_model->get_data('tbl_berita','analisis','1',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc','1','5',
                        'tbl_channel','tbl_channel.id = tbl_berita.id_channel');
        $data['pop_tag'] = $this->all_model->get_data('tbl_tag','','','tanggal','desc','1','12','tbl_channel','tbl_channel.id = tbl_tag.id_channel');

        $this->load->view("page",$data);
    }

    function contact_us()
    {

       $data['category'] = $this->all_model->lihat_tabel_kondisi_all("tbl_channel","where tipe = '2' and flag = '1' order by id ASC")->result();

       /*Side bar*/
        $data['headline'] = $this->all_model->get_data('tbl_berita','headline','1',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc','0','5',
                            'tbl_channel','tbl_channel.id = tbl_berita.id_channel');
        $data['hot'] = $this->all_model->get_data('tbl_berita','hot','1',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc','1','1',
                        'tbl_channel','tbl_channel.id = tbl_berita.id_channel');
        $data['kutipan'] = $this->all_model->get_data('tbl_berita','','',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc','1','5',
                        'tbl_channel','tbl_channel.id = tbl_berita.id_channel');
        $data['editor'] = $this->all_model->get_data('tbl_berita','analisis','1',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc','1','5',
                        'tbl_channel','tbl_channel.id = tbl_berita.id_channel');
        $data['pop_tag'] = $this->all_model->get_data('tbl_tag','','','tanggal','desc','1','12','tbl_channel','tbl_channel.id = tbl_tag.id_channel');

        $this->load->view('contact',$data);
    }



}

/* End of file landing.php */
/* Location: ./modules/controllers/landing.php */
