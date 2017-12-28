 <?php
   $this->load->view('landing/header.php');
   //echo '<pre>';print_r($channel);
 ?>

 <div class="container content-wrapper">
  <div class="row">

   <div class="col col_9_of_12 content">
   <div class="panel_title">
     <div>
        <h4><?=$channel_list[0]->nama_channel;?></h4>
     </div>
    </div>
    
<div class="row">
     <?php
          foreach ($channel_list as $row) {
         ?>
      <div class="col col_12_of_12">
        <div class="layout_post_2 lg-post clearfix">
             <div class="item_thumb">
                <div class="thumb_hover">
                    <a href="<?=base_url().'read/'.$row->id_berita.'/'.$row->nama_channel.'/'.str_replace(' ', '-', str_replace(',','',$row->judul));?>">
                    <img src="<?=base_url();?>statis/dinamis/detail/<?=$row->gambar_detail;?>" title="<?=$row->judul;?>" alt="" class="visible animated"></a>
                </div>
             </div>
            <div class="item_content">
                <h4><a href="<?=base_url().'read/'.$row->id_berita.'/'.$row->nama_channel.'/'.str_replace(' ', '-', str_replace(',','',$row->judul));?>"><?=$row->judul;?></a></h4>
                <?php echo substr($row->isi, 0, 120); ?> [...]</p>
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

       <ul class="page-numbers">
              <?php
              $s='';
              if(isset($_REQUEST['s']))
              {
                $s = '&s='.$_REQUEST['s'];
              }

              if($pages>1)
              {
              $prev = ($_REQUEST['page']==1)?'1':$_REQUEST['page']-1;
              ?>
              <li>
                <a class="prev page-numbers" href="?page=<?=$prev.$s;?>"><i class="fa fa-angle-double-left"></i>Previous</a>
              </li>
                <?php

                for($i=1;$i<=$pages;$i++) {
                  $curr_page = '';
                  if(isset($_REQUEST['page'])) {
                    if($_REQUEST['page']==$i) {
                  ?>
                  <li>
                    <span class="page-numbers current"><?=$i;?></span>
                  </li>
                  <?php
                    }
                    else {
                  ?>
                  <li>
                    <a class="page-numbers" href="?page=<?=$i.$s;?>"><?=$i;?></a>
                  </li>
                  <?php
                    }
                  }
                  else {
                    if($i==1) {
                    ?>
                    <li>
                     <span class="page-numbers current"><?=$i;?></span>
                    </li>
                    <?php
                    }
                    else {
                      ?>
                      <li>
                       <a class="page-numbers" href="?page=<?=$i.$s;?>"><?=$i;?></a>
                      </li>
                      <?php
                    }
                  }
                }
                ?>
                <li>
                 <a class="next page-numbers" href="?page=<?=($_REQUEST['page']+1).$s;?>">Next<i class="fa fa-angle-double-right"></i></a>
                 </li>
                <?php
                }
                ?>
            </ul>
   </div>

    <div id="sidebar" class="col col_3_of_12 sidebar isfixedsidebar">
           <?php
             $this->load->view('landing/sidebar.php');
          ?>    
   </div>

 </div>
</div>


<?php
$this->load->view('landing/footer.php');
?>