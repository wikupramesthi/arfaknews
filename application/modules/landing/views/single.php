 <?php
   $this->load->view('landing/header-single.php');
   //echo '<pre>';print_r($newsDetail);
 ?>

  <div class="container content-wrapper">
   <div class="row">
      <div class="col col_9_of_12 content">
         <article class="post">
          <div class="breadcumb">
             <span class="meta_home"><a href="<?=base_url();?>">Home</a></span>
             <span class="meta_arrow">News</span>
             <span class="meta_arrow">Nasional</span>
          </div>
           <h1 class="entry_title"><?=$newsDetail->judul;?></h1>
           <p class="editor-name">Oleh <span><?=$newsDetail->penulis;?></span></p>
            <div class="entry_media"> 
               <a href="<?=base_url();?>statis/dinamis/detail/<?=$newsDetail->gambar_detail;?>" title="<?=$newsDetail->caption;?>" data-fancybox>  
                <img src="<?=base_url();?>statis/dinamis/detail/<?=$newsDetail->gambar_detail;?>" title="<?=$newsDetail->judul;?>" alt="">
               </a>
            </div>
            <div class="full_meta clearfix">
                <span class="meta_date"><?=date('d F Y', strtotime($newsDetail->tanggal_tayang));?> <?=date('H:m', strtotime($row->waktu));?></span>
                <span class="meta_view"><?=$newsDetail->counter;?> VIew</span>
            </div>

            <div class="entry_content">
                   <blockquote>
                        <p><span>''</span><?=$newsDetail->caption;?><span>''</span></p>
                    </blockquote>
                  <p class="dropcap"><?=$newsDetail->isi;?>.</p>              
                </div>
                               
                 <div class="bottom_wrapper">
                    <div class="entry_tags">
                                <span><i class="fa fa-tags"></i> Tags</span>
                                <?php $tag = explode(',',$newsDetail->tag);
                                    for($i=0;$i<count($tag);$i++) {
                                    if($tag[$i]!=''){
                                 ?>
                              <a href="<?=base_url();?>tagging?s=<?=$tag[$i];?>"><?=$tag[$i];?></a>
                            <?php
                                }
                            }
                            ?>
                            </div>
                        </div>
                </article>
  
                <div class="panel_title">
                    <div>
                        <h4>Berita Terkait</h4>
                    </div>
                </div>

                <div class="row">
                   <?php
                      foreach ($releated as $row) {
                    ?>
                    <div class="col col_4_of_12">
                        <div class="layout_post_1">
                            <div class="item_thumb">
                                <div class="thumb_hover">
                                    <a href="<?=base_url().'read/'.$row->id_berita.'/'.$row->nama_channel.'/'.str_replace(' ', '-',str_replace(',','',$row->judul));?>"><img src="<?=base_url();?>statis/dinamis/detail/<?=$row->gambar_detail;?>" alt="" title="<?=$row->judul;?><" class="visible animated"></a>
                                </div>
                            </div>
                            <div class="item_content">
                                <h4><a href="<?=base_url().'read/'.$row->id_berita.'/'.$row->nama_channel.'/'.str_replace(' ', '-',str_replace(',','',$row->judul));?>"><?=$row->judul;?></a></h4>
                                <div class="item_meta clearfix">
                                    <span class="meta_date"><?=date('F d, Y', strtotime($row->tanggal_tayang));?> <?=date('H:m', strtotime($row->waktu));?></span>
                                </div>
                            </div>
                        </div><!-- End Layout post 1 -->
                    </div>
                    <?php
                    }
                    ?>
                </div>

                <div class="fb-comments" data-href="<?=base_url().'read/'.$newsDetail->id_berita.'/'.$newsDetail->nama_channel.'/'.str_replace(' ', '-', $newsDetail->judul);?>" data-width="100%" data-numposts="10">
                     </div>

             </div>

            <div id="sidebar" class="col col_3_of_12 sidebar isfixedsidebar">
                    <?php
                        $this->load->view('landing/sidebar.php');
                 ?>

        </div>

        </div>
    </div>

<script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=59821c2b862d5e001108543c&product=inline-share-buttons">
</script>


<script type="text/javascript" src="<?=base_url();?>assets/js/front/jquery.3-1-1.min.js"></script>
<script src="<?=base_url();?>assets/js/front/ygyzop.js"></script> 

<?php
$this->load->view('landing/footer.php');
?>