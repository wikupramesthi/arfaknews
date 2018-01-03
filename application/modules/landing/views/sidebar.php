<div class="theiaStickySidebar">

  <div class="widget headline">
      <div class="widget_title">
         <h3>Headline</h3>
      </div>
        <div class="tb_widget_recent_list clearfix">
         <?php
            foreach ($headline as $row) {
          ?>
            <div class="item clearfix">
                <div class="item_thumb">
                    <div class="thumb_hover">
                        <a href="<?=base_url().'read/'.$row->id_berita.'/'.$row->nama_channel.'/'.str_replace(' ', '-',str_replace(',','',$row->judul));?>"><img src="<?=base_url();?>statis/dinamis/medium/<?=$row->gambar_detail;?>" title="<?=$row->judul;?>" alt="" class="visible animated"></a>
                    </div>
                </div>
                <div class="item_content">
                    <h4><a href="<?=base_url().'read/'.$row->id_berita.'/'.$row->nama_channel.'/'.str_replace(' ', '-',str_replace(',','',$row->judul));?>"><?=$row->judul;?></a></h4>
                    <div class="item_meta sidebar_meta clearfix">
                        <span class="category"><a href="<?=base_url().'channel/'.$row->id.'/'.$row->nama_channel?>""><?=$row->nama_channel;?></a>
                       </span>
                        <span class="meta_date"><?=date('F d, Y', strtotime($row->tanggal_tayang));?> <?=date('H:m', strtotime($row->waktu));?></span>
                    </div>
                </div>
            </div>
              <?php
                }
              ?>
        </div>
    </div>

<!-- Ads -->
<div class="widget">
      <div class="tb_widget_banner_300 clearfix">
          <a href="" target="_blank">
              <img src="https://tpc.googlesyndication.com/simgad/4062957226319073177" alt="Banner" class="visible animated">
          </a>
      </div>
  </div>

<div class="widget">
      <div class="widget_title"><h3>Kutipan</h3></div>
        <div class="tb_widget_timeline clearfix">
            <?php
              foreach ($kutipan as $row) {
            ?>
            <article>
                <span class="date"><?=date('F d, Y', strtotime($row->tanggal_tayang));?></span>
                <span class="time"><?=date('H:m', strtotime($row->waktu));?></span>
                <div class="timeline_content">
                    <i class="fa fa-clock-o" jquery=""></i>
                    <h3><a href="<?=base_url().'read/'.$row->id_berita.'/'.$row->nama_channel.'/'.str_replace(' ', '-',str_replace(',','',$row->judul));?>"><?=$row->judul;?></a></h3>
                </div>
            </article>
              <?php
                }
             ?>
        </div>
    </div>

  <div class="widget editor-pick">
      <div class="widget_title"><h3>Pilihan Editor</h3></div>
        <ul class="tb_widget_recent_list editor-list clearfix">
         <?php
            foreach ($editor as $row) {
          ?>
            <li class="item clearfix">
                <div class="item_content">
                    <h4><a href="<?=base_url().'read/'.$row->id_berita.'/'.$row->nama_channel.'/'.str_replace(' ', '-',str_replace(',','',$row->judul));?>"><?=$row->judul;?></a></h4>
                    <div class="item_meta sidebar_meta clearfix">
                        <span class="category"><a href="<?=base_url().'channel/'.$row->id.'/'.$row->nama_channel?>""><?=$row->nama_channel;?></a>
                       </span>
                        <span class="meta_date"><?=date('F d, Y', strtotime($row->tanggal_tayang));?> <?=date('H:m', strtotime($row->waktu));?></span>
                  </div>
                </div>
            </li>
              <?php
                }
              ?>
        </ul>
    </div>

<div class="widget">
    <div class="widget_title"><h3>Tags</h3></div>
    <div class="tb_widget_tagcloud clearfix">
        <?php
          foreach ($pop_tag as $row) {
        ?>
        <a href="<?=base_url().'channel/'.$row->id.'/'.$row->id_channel?>"><?=$row->tag;?></a>
         <?php
          }
        ?>
    </div>
 </div>
</div>