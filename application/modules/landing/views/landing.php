<?php
$this->load->view('landing/header.php');
//echo '<pre>';print_r($featured);die;
?>

 <div class="container content-wrapper landing">
  <div class="row">
   <div class="col col_9_of_12 content">
   <div class="content_slider">
    <ul>
       <?php
        foreach ($featured as $row)
        {
      ?>
          <li>
              <a href="<?=base_url().'read/'.$row->id_berita.'/'.$row->nama_channel.'/'.url_title($row->judul,'-',TRUE);?>">
                <img src="statis/dinamis/detail/<?=$row->gambar_detail;?>" title="<?=$row->judul;?>" alt=""></a>
              <div class="slider_caption">
                  <div class="thumb_link">
                      <h3><a href="<?=base_url().'read/'.$row->id_berita.'/'.$row->nama_channel.'/'.url_title($row->judul,'-',TRUE);?>"><?=$row->judul;?></a></h3>
                  </div>
              </div>
          </li>
          <?php
            }
        ?>
      </ul>
  </div>

<div class="row">
 <div class="col col_4_of_12">
        <div class="widget">
            <div class="widget_title"><h3>Terpopuler</h3></div>
            <div class="tb_widget_posts_big clearfix">
                <div class="item clearfix">
                    <?php
                        foreach ($hot as $row) {
                      ?>
                        <div class="item_content">
                            <h4><a href="<?=base_url().'read/'.$row->id_berita.'/'.$row->nama_channel.'/'.str_replace(' ', '-',str_replace(',','',$row->judul));?>"><span class="format">Hot</span><?=$row->judul;?></a></h4>
                            <div class="item_meta clearfix">
                                <span class="meta_date"><?=date('d F Y', strtotime($row->tanggal_tayang));?> <?=date('H:m', strtotime($row->waktu));?></span>
                            </div>
                        </div>
                        <?php
                            }
                          ?>
                    </div>
            </div>
        </div>

    </div>

    <div class="col col_8_of_12">
       <?php
          foreach ($breaking as $row) {
         ?>
            <div class="layout_post_2 post clearfix">
                <div class="item_thumb">
                    <div class="thumb_hover">
                        <a href="<?=base_url().'read/'.$row->id_berita.'/'.$row->nama_channel.'/'.url_title($row->judul,'-',TRUE);?>"><img src="statis/dinamis/detail/<?=$row->gambar_detail;?>" title="<?=$row->judul;?>" alt=""></a>
                    </div>
                </div>
                <div class="item_content">
                    <h4><a href="<?=base_url().'read/'.$row->id_berita.'/'.$row->nama_channel.'/'.url_title($row->judul,'-',TRUE);?>"><?=$row->judul;?></a></h4>
                    <div class="item_meta clearfix">
                       <span class="category"><a href="<?=base_url().'channel/'.$row->id.'/'.$row->nama_channel?>"><?=$row->nama_channel;?></a>
                       </span>
                        <span class="meta_date mg-zero"><?=date('d F Y', strtotime($row->tanggal_tayang));?> <?=date('H:m', strtotime($row->waktu));?></span>
                    </div>
                </div>
            </div>
              <?php
               }
              ?>
        </div>

  </div>

<!-- NASIONAL -->
  <div class="panel_title">
    <div>
        <h4><a href="<?=base_url().'channel/'.$row->id.'/'.$row->nama_channel?>">Nasional</a></h4>
    </div>
  </div>

  <div class="row">
    <div class="col col_12_of_12 mb-inner">
        <div class="multipack clearfix">
          <div class="layout_post_1">
              <div class="item_thumb">
                  <div class="thumb_hover">
                      <a href="<?=base_url().'read/'.$national[0]->id_berita.'/'.$national[0]->nama_channel.'/'.url_title($national[0]->judul,'-',TRUE);?>"><img src="statis/dinamis/detail/<?=$national[0]->gambar_detail;?>" title="<?=$national[0]->judul;?>" alt=""></a>
                  </div>
              </div>
              <div class="item_content">
                  <h4><a href="<?=base_url().'read/'.$national[0]->id_berita.'/'.$national[0]->nama_channel.'/'.url_title($national[0]->judul,'-',TRUE);?>"><?=$national[0]->judul;?></a></h4>
                  <?php echo substr($national[0]->isi, 0, 100); ?> [...]</p>
              </div>
          </div>

          <div class="list_posts">
            <?php
              foreach ($national1 as $row) {
             ?>
              <div class="post clearfix">
                  <div class="item_thumb">
                      <div class="thumb_hover">
                          <a href="<?=base_url().'read/'.$row->id_berita.'/'.$row->nama_channel.'/'.url_title($row->judul,'-',TRUE);?>"><img src="statis/dinamis/medium/<?=$row->gambar_detail;?>" title="<?=$row->judul;?>" alt=""></a>
                      </div>
                  </div>
                  <div class="item_content">   
                      <h4><a href="<?=base_url().'read/'.$row->id_berita.'/'.$row->nama_channel.'/'.url_title($row->judul,'-',TRUE);?>"><?=$row->judul;?></a></h4>
                      <div class="item_meta clearfix">
                          <span class="meta_date"><?=date('d F Y', strtotime($row->tanggal_tayang));?> <?=date('H:m', strtotime($row->waktu));?></span>
                      </div>
                  </div>
              </div>
              <?php
               }
              ?>

          </div>
        </div>
    </div>
  </div>

<!-- OLAHRAGA -->
      <div class="panel_title" >
          <div>
              <h4><a href="<?=base_url().'channel/'.$row->id.'/'.$row->nama_channel?>">Olahraga</a></h4>
          </div>
      </div>

    <div class="row">
       <?php
        foreach ($sport as $row) {
      ?>
      <div class="col col_4_of_12">
          <div class="top_review">
              <div class="item_content">
                  <a href="<?=base_url().'read/'.$row->id_berita.'/'.$row->nama_channel.'/'.url_title($row->judul,'-',TRUE);?>"><img src="statis/dinamis/detail/<?=$row->gambar_detail;?>" title="<?=$row->judul;?>" alt="">
                  </a>
                <div class="hg-content">
                  <h4><a href="<?=base_url().'read/'.$row->id_berita.'/'.$row->nama_channel.'/'.url_title($row->judul,'-',TRUE);?>"><?=$row->judul;?></a></h4>
                   <div class="item_meta clearfix">
                      <span class="meta_date"><?=date('d F Y', strtotime($row->tanggal_tayang));?> <?=date('H:m', strtotime($row->waktu));?></span>
                  </div>
                </div>
              </div>
          </div>
      </div>
      <?php
    }
    ?>
  </div>

<!-- KESEHATAN -->
    <div class="panel_title">
     <div>
        <h4><a href="<?=base_url().'channel/'.$row->id.'/'.$row->nama_channel?>">Kesehatan</a></h4>
     </div>
    </div>

    <div class="row">
    <?php
      foreach ($kesehatan as $row) {
    ?>
      <div class="col col_12_of_12">
        <div class="layout_post_2 lg-post clearfix">
             <div class="item_thumb">
                <div class="thumb_hover">
                    <a href="<?=base_url().'read/'.$row->id_berita.'/'.$row->nama_channel.'/'.url_title($row->judul,'-',TRUE);?>"><img src="statis/dinamis/detail/<?=$row->gambar_detail;?>" title="<?=$row->judul;?>" alt="" class="visible animated"></a>
                </div>
             </div>
            <div class="item_content">
                <h4><a href="<?=base_url().'read/'.$row->id_berita.'/'.$row->nama_channel.'/'.url_title($row->judul,'-',TRUE);?>"><?=$row->judul;?></a></h4>
                <?php echo substr($row->isi, 0, 200); ?> [...]</p>
                <div class="item_meta clearfix">
                    <span class="meta_date"><?=date('d F Y', strtotime($row->tanggal_tayang));?> <?=date('H:m', strtotime($row->waktu));?></span>
                </div>
            </div>
        </div>
      </div>
      <?php
       }
      ?>
  </div>

 </div>

  <div id="sidebar" class="col col_3_of_12 sidebar isfixedsidebar">
           <?php
             $this->load->view('landing/sidebar.php');
          ?>    
   </div>

</div>

<!-- WISATA DAN KULINER -->
  <div class="panel_title">
      <div>
          <h4><a href="<?=base_url().'channel/'.$row->id.'/'.$row->nama_channel?>">Wisata dan Kuliner</a></h4>
      </div>
  </div>

  <div class="row">
   <?php
   foreach ($kuliner as $row) {
  ?>
      <div class="col col_3_of_12">
        <div class="layout_post_1">
            <div class="item_thumb">
                <div class="thumb_hover">
                   <a href="<?=base_url().'read/'.$row->id_berita.'/'.$row->nama_channel.'/'.url_title($row->judul,'-',TRUE);?>"><img src="statis/dinamis/detail/<?=$row->gambar_detail;?>" title="<?=$row->judul;?>" alt=""></a>
                </div>
            </div>
            <div class="item_content">
              <div class="hg-content">
                <h4><a href="<?=base_url().'read/'.$row->id_berita.'/'.$row->nama_channel.'/'.url_title($row->judul,'-',TRUE);?>"><?=$row->judul;?></a></h4>
                </div>
                <div class="item_meta clearfix">
                    <span class="meta_date"><?=date('d F Y', strtotime($row->tanggal_tayang));?> <?=date('H:m', strtotime($row->waktu));?></span>
                </div>
            </div>
        </div>
    </div>

    <?php
     }
   ?>

  </div>

  <div class="row">
    <div class="col col_4_of_12">
        <div class="panel_title">
        <div>
            <h4><a href="<?=base_url();?>most-recent">Terkini</a></h4>
        </div>
    </div>
          <div class="layout_post_1">
              <div class="item_thumb">
                  <div class="thumb_hover">
                      <a href="<?=base_url().'read/'.$terbaru[0]->id_berita.'/'.$terbaru[0]->nama_channel.'/'.url_title($national[0]->judul,'-',TRUE);?>">
                        <img src="statis/dinamis/detail/<?=$terbaru[0]->gambar_detail;?>" title="<?=$terbaru[0]->judul;?>" alt="" class="visible animated"></a>
                  </div>
              </div>
              <div class="item_content">
                  <h4><a href="<?=base_url().'read/'.$terbaru[0]->id_berita.'/'.$terbaru[0]->nama_channel.'/'.url_title($national[0]->judul,'-',TRUE);?>"><?=$terbaru[0]->judul;?></a></h4>
                  <div class="item_meta clearfix">
                       <span class="category"><a href="<?=base_url().'channel/'.$terbaru[0]->id.'/'.$terbaru[0]->nama_channel?>"><?=$terbaru[0]->nama_channel;?></a>
                       </span>
                        <span class="meta_date"><?=date('d F Y', strtotime($terbaru[0]->tanggal_tayang));?> <?=date('H:m', strtotime($terbaru[0]->waktu));?></span>
                    </div>
                    <?php echo substr($terbaru[0]->isi, 0, 120); ?> [...]</p>
              </div>
          </div>    

              <div class="list_posts">
                 <?php
                   foreach ($terbaru1 as $row) {
                  ?>
                  <div class="post clearfix">
                      <div class="item_thumb">
                          <div class="thumb_hover">
                              <a href="<?=base_url().'read/'.$row->id_berita.'/'.$row->nama_channel.'/'.url_title($row->judul,'-',TRUE);?>"><img src="statis/dinamis/medium/<?=$row->gambar_detail;?>" title="<?=$row->judul;?>" alt="" class="visible animated"></a>
                          </div>
                      </div>
                      <div class="item_content">
                          <h4><a href="<?=base_url().'read/'.$row->id_berita.'/'.$row->nama_channel.'/'.url_title($row->judul,'-',TRUE);?>"><?=$row->judul;?></a></h4>
                          <div class="item_meta clearfix">
                              <span class="meta_date"><?=date('d F Y', strtotime($row->tanggal_tayang));?> <?=date('H:m', strtotime($row->waktu));?>
                              </span>
                          </div>
                      </div>
                  </div>
                 <?php
                     }
                   ?>
              </div>
          </div>

<!-- PAPUA 24 JAM -->
    <div class="col col_8_of_12">
      <div class="panel_title">
        <div>
            <h4><a href="<?=base_url().'channel/'.$row->id.'/'.$row->nama_channel?>">Papua 24 Jam</a></h4>
        </div>
    </div>

    <div class="row">
      <?php
       foreach ($papua as $row) {
      ?>
      <div class="col col_3_of_12">
        <div class="layout_post_1">
            <div class="item_thumb">
                <div class="thumb_hover">
                   <a href="<?=base_url().'read/'.$row->id_berita.'/'.$row->nama_channel.'/'.url_title($row->judul,'-',TRUE);?>"><img src="statis/dinamis/detail/<?=$row->gambar_detail;?>" title="<?=$row->judul;?>" alt=""></a>
                </div>
            </div>
            <div class="item_content">
              <div class="hg-content">
                <h4><a href="<?=base_url().'read/'.$row->id_berita.'/'.$row->nama_channel.'/'.url_title($row->judul,'-',TRUE);?>"><?=$row->judul;?></a></h4>
                </div>
                <div class="item_meta clearfix">
                    <span class="meta_date mg-zero small"><?=date('d F Y', strtotime($row->tanggal_tayang));?> <?=date('H:m', strtotime($row->waktu));?></span>
                </div>
            </div>
        </div>
    </div>

    <?php
     }
   ?>

  </div>
</div>

<!-- LINTAS PAPUA BARAT -->
    <div class="col col_8_of_12">
      <div class="panel_title">
        <div>
            <h4><a href="<?=base_url().'channel/'.$row->id.'/'.$row->nama_channel?>">Lintas Papua Barat</a></h4>
        </div>
    </div>

    <div class="row">
      <?php
       foreach ($lintas as $row) {
      ?>
      <div class="col col_6_of_12">
        <div class="layout_post_1">
            <div class="item_thumb">
                <div class="thumb_hover">
                   <a href="<?=base_url().'read/'.$row->id_berita.'/'.$row->nama_channel.'/'.url_title($row->judul,'-',TRUE);?>"><img src="statis/dinamis/detail/<?=$row->gambar_detail;?>" title="<?=$row->judul;?>" alt=""></a>
                </div>
            </div>
            <div class="item_content">
                <h4><a href="<?=base_url().'read/'.$row->id_berita.'/'.$row->nama_channel.'/'.url_title($row->judul,'-',TRUE);?>"><?=$row->judul;?></a></h4>
                <div class="item_meta clearfix">
                    <span class="meta_date small"><?=date('d F Y', strtotime($row->tanggal_tayang));?> <?=date('H:m', strtotime($row->waktu));?></span>
                </div>
            </div>
        </div>
    </div>

    <?php
     }
   ?>

  </div>
</div>

      </div>

</div>

<?php
$this->load->view('landing/footer.php');
?>