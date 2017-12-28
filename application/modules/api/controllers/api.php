<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends MX_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('all_model');
    }

    public function index()
    {
        //get_data($table_name,$id,$kode,$order,$kondisi,$limit='',$join='',$joinOn='')
        //$data['category'] = $this->all_model->get_data('tbl_channel','','','nama_channel','asc');


    }

    private function make_res($data)
    {
        header('Content-Type: application/json');
        die(json_encode($data));
    }

    function dashboard()
    {
        $category       = $this->all_model->lihat_tabel_kondisi_all("tbl_channel","where tipe = '2' and flag = '1' order by id ASC")->result();
        $hot            = $this->all_model->get_data('tbl_berita','hot','1',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc','1','1',
                        'tbl_channel','tbl_channel.id = tbl_berita.id_channel');
        /*$featured       = $this->all_model->get_data('tbl_berita','featured','1',"CONCAT((tanggal_tayang),(' '),(waktu))",'asc');
        $national       = $this->all_model->get_data('tbl_berita','tbl_channel.id','1',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc','2','tbl_channel','tbl_channel.id = tbl_berita.id_channel');
        $metropol       = $this->all_model->get_data('tbl_berita','tbl_channel.id','2',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc','2','tbl_channel','tbl_channel.id = tbl_berita.id_channel');
        $sport          = $this->all_model->get_data('tbl_berita','tbl_channel.id','4',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc','2','tbl_channel','tbl_channel.id = tbl_berita.id_channel');

        $ekonomi        = $this->all_model->get_data('tbl_berita','tbl_channel.id','3',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc','6','tbl_channel','tbl_channel.id = tbl_berita.id_channel');
        $tekno          = $this->all_model->get_data('tbl_berita','tbl_channel.id','5',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc','6','tbl_channel','tbl_channel.id = tbl_berita.id_channel');
        $mancanegara    = $this->all_model->get_data('tbl_berita','tbl_channel.id','9',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc','6','tbl_channel','tbl_channel.id = tbl_berita.id_channel');*/

        $terbaru        = $this->all_model->get_data('tbl_berita','','',"CONCAT((tanggal_tayang),(' '),(waktu))",'desc','1','2',
                        'tbl_channel','tbl_channel.id = tbl_berita.id_channel');

        foreach ($hot as $value)
        {
            $hot_news[] = array(
                                "id" => $value->id_berita,
                                "title" => $value->judul,
                                "author" => $value->penulis,
                                "created_at" => $value->penulis,
                                "content" => $value->isi,
                                "image" => base_url().'statis/dinamis/medium/'.$value->gambar_detail,
                                "resource" => "http://www.arfaknews.com",
                                "is_favorite" => true,
                                "category_id" => $value->id_channel,
                                "category_name" => $value->nama_channel
                                );
        }

        foreach ($category as $value)
        {
            $cat_news[] = array(
                                "id" => $value->id,
                                "name" => $value->nama_channel
                                );
        }

        foreach ($terbaru as $value)
        {
            $lates_news[] = array(
                                "id" => $value->id_berita,
                                "title" => $value->judul,
                                "author" => $value->penulis,
                                "created_at" => $value->tanggal_tayang,
                                "content" => $value->isi,
                                "image" => base_url().'statis/dinamis/medium/'.$value->gambar_detail,
                                "resource" => "http://www.arfaknews.com",
                                "is_favorite" => true,
                                "category_id" => $value->id_channel,
                                "category_name" => $value->nama_channel
                                );
        }

        $data = array(
                        "status" => true,
                        "code" => 200,
                        "message" => "success get dashboard data",
                        "data" => array("hot_news" => $hot_news,
                                        "categories" => $cat_news,
                                        "latest_news" => $lates_news )
                      );

        $this->make_res($data);

    }

    function comments()
    {
        if ($this->input->server('REQUEST_METHOD') == 'GET')
        {
            $komen = $this->all_model->get_data('tbl_komentar','','','tanggal','desc');
            foreach ($komen as $value)
            {
                $komen_news[] = array(
                                    "id" => $value->id,
                                    "news_id" => $value->id_berita,
                                    "email" => $value->email,
                                    "content" => $value->isi,
                                    "date" => $value->tanggal.' '.$value->waktu
                                    );
            }

            $data = array(
                            "status" => true,
                            "code" => 200,
                            "message" => "success get comment",
                            "data" => array($komen_news)
                        );

        }
        else if ($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $data = array(
                            "status" => true,
                            "code" => 200,
                            "message" => "success create comment",
                            "data" => array()
                        );
        }

        $this->make_res($data);

    }

    function favorites()
    {
        if ($this->input->server('REQUEST_METHOD') == 'GET')
        {
            $data = array(
                        "status" => true,
                        "code" => 200,
                        "message" => "success get favorites data",
                        "data" => array()
                    );

        }
        else if ($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $data = array(
                        "status" => true,
                        "code" => 200,
                        "message" => "success create favorites data",
                        "data" => array()
                    );
        }

        $this->make_res($data);

        /*{
            "status" : true,
            "code" : 200,
            "message" : "success get favorites data",
            "data" : {
                [
                    {
                        "id" : 20,
                        "title" : "bakekok",
                        "author" : "babaho",
                        "created_at" : "",
                        "content" : "",
                        "image" : "",
                        "resource" : "http://www.tube8.com",
                        "is_favorite" : true
                    },
                    {
                        "id" : 20,
                        "title" : "bakekok",
                        "author" : "babaho",
                        "created_at" : "",
                        "content" : "",
                        "image" : "",
                        "resource" : "http://www.tube8.com",
                        "is_favorite" : true
                    }
                ]
            }
        }*/

    }

    function subscribe()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST')
        {
            $data = array(
                        "status" => true,
                        "code" => 200,
                        "message" => "success create subscribe",
                        "data" => array()
                    );
        }

        $this->make_res($data);

    }

    function view_news($newsid,$cat='',$judul='')
    {
        $data['newsDetail'] = $this->all_model->get_single_data('tbl_berita','id_berita',$newsid);
        $this->load->view('single',$data);
    }

    function categories()
    {
        if ($this->input->server('REQUEST_METHOD') == 'GET')
        {
            if(isset($_REQUEST['category_id']))
            {
                if(isset($_REQUEST['page']))
                {
                    $catId = $_REQUEST['category_id'];
                    $page = $_REQUEST['page'];

                    $limit = '10';

                    $pg = $page;
                    $start = ($limit*($pg-1))+1;

                    $newList = $this->all_model->get_data('tbl_berita','tbl_channel.id',$catId,"CONCAT((tanggal_tayang),(' '),(waktu))",'desc',$start,$limit,
                                    'tbl_channel','tbl_channel.id =  tbl_berita.id_channel');

                    foreach ($newList as $value)
                    {
                        $news_list[] = array(
                                            "id" => $value->id_berita,
                                            "title" => $value->judul,
                                            "author" => $value->penulis,
                                            "created_at" => $value->tanggal_tayang,
                                            "content" => $value->isi,
                                            "image" => base_url().'statis/dinamis/medium/'.$value->gambar_detail,
                                            "resource" => "http://www.arfaknews.com",
                                            "is_favorite" => true,
                                            "category_id" => $value->id_channel,
                                            "category_name" => $value->nama_channel
                                            );
                    }
                    $data = array(
                                "status" => true,
                                "code" => 200,
                                "message" => "success get news",
                                "data" => $news_list
                            );
                }
                else
                {
                    $data = array(
                            "status" => true,
                            "code" => 401,
                            "message" => "error params page cannot null",
                            "data" => array()
                        );
                }

            }
            else
            {
                $data = array(
                            "status" => true,
                            "code" => 401,
                            "message" => "error params category cannot null",
                            "data" => array()
                        );
            }
        }
        else
        {
            $data = array(
                            "status" => true,
                            "code" => 403,
                            "message" => "error forbidden",
                            "data" => array()
                        );
        }

        $this->make_res($data);

    }

    function news()
    {

        if ($this->input->server('REQUEST_METHOD') == 'GET')
        {

            if(isset($_REQUEST['keyword']))
            {
                if(isset($_REQUEST['page']))
                {
                    $keyword = $_REQUEST['keyword'];
                    $page = $_REQUEST['page'];

                    $limit = '10';

                    $pg = $page;
                    $start = ($limit*($pg-1))+1;

                    $start = ($start==1)?'':$start.',';

                    $newList = $this->all_model->search_news($keyword,$start,$limit)->result();

                    foreach ($newList as $value)
                    {
                        $news_list[] = array(
                                            "id" => $value->id_berita,
                                            "title" => $value->judul,
                                            "author" => $value->penulis,
                                            "created_at" => $value->tanggal_tayang,
                                            "content" => $value->isi,
                                            "image" => base_url().'statis/dinamis/medium/'.$value->gambar_detail,
                                            "resource" => "http://www.arfaknews.com",
                                            "is_favorite" => true,
                                            "category_id" => $value->id_channel,
                                            "category_name" => $value->nama_channel
                                            );
                    }
                    $data = array(
                                "status" => true,
                                "code" => 200,
                                "message" => "success get news",
                                "data" => $news_list
                            );
                }
                else
                {
                    $data = array(
                            "status" => true,
                            "code" => 401,
                            "message" => "error params page cannot null",
                            "data" => array()
                        );
                }
            }
            else
            {
                $data = array(
                            "status" => true,
                            "code" => 401,
                            "message" => "error params key cannot null",
                            "data" => array()
                        );
            }
        }
        else
        {
            $data = array(
                            "status" => true,
                            "code" => 403,
                            "message" => "error forbidden",
                            "data" => array()
                        );
        }

        $this->make_res($data);

    }


}

/* End of file landing.php */
/* Location: ./modules/controllers/landing.php */
