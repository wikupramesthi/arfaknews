<div class="mobile-only">
 <div class="side-menu">
    <div class="menu-holder">
        <button type="menu" class="menu"></button>
        <p>Google Play <span>Music</span>
        </p>
    </div>
    <ul>
      <li class="home"><a href="<?=base_url();?>">Home</a></li>
        <?php
        foreach ($category as $row) {
        ?>
            <li><a href="<?=base_url().'channel/'.$row->id.'/'.$row->nama_channel?>"><?=$row->nama_channel;?></a></li>
        <?php
        }
        ?>
    </ul>
</div>
<div class="side-menu-overlay"></div>
<header id="header-mobile">
    <button type="menu" class="menu ripple"></button>
     <a href="<?=base_url();?>"><h1>Arfaknews</h1></a>
    <form method="get" class="mobile-search-form" action="<?=base_url();?>most-recent">
     <input id="input" type="text" class="header-input desktop-only" placeholder="berita apa yang Anda cari?" />
	</form>

    <div class="search-btn mobile-only ripple"></div>

    <div class="mobile-search mobile-search-hide">
        <div class="mobile-search-header mobile-search-flex">
            <div ripple-color="rgba(000,000,000,.2)" class="mobile-search-back ripple"></div>
            <form method="get" class="mobile-search-form" action="<?=base_url();?>most-recent">
                <input type="search" class="mobile-search-input" placeholder="berita apa yang Anda cari?" >
            </form>
        </div>
    </div>
 </header>
</div>