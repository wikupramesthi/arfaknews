<div class="navbar-default sidebar" role="navigation">
  <div class="sidebar-nav navbar-collapse">
    <ul class="nav" id="side-menu">
        <li class="sidebar-navigation">
            <div class="input-group">
                <span>Navigation</span>
            </div>
        </li>
        <li>
             <a href="<?=base_url()?>home"><i class="glyphicon glyphicon-dashboard"></i> Dashboard</a>
        </li>

        <?php if ($this->session->userdata('status_admn') == 'superadmin'){ ?>
        <li>
            <a href="#"><i class="glyphicon glyphicon-th-list"></i> Kategori<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="<?=base_url()?>channel">Semua Kategori</a>
                </li>
                <li>
                    <a href="<?=base_url()?>channel/insert">Tambah Kategori</a>
                </li>
                <li>
                    <a href="<?=base_url()?>category">Sub Kategori</a>
                </li>
            </ul>
        </li>
        <?php } ?>

        <li>
            <a href="#"><i class="glyphicon glyphicon-list-alt"></i> Berita<span class="fa arrow"></span></a>
             <ul class="nav nav-second-level">
                <?php $i = 1; ?>
                    <?php foreach($dinamis->result_array() as $r){ ?>
                        <?php if ($i > 1){ ?>
                        <?php } ?>
                        <li><a href="<?=base_url()?>dinamis/channel/<?=$r['id']?>"><?=ucfirst($r['nama_channel'])?></a></li>
                        <?php $i++; ?>
                    <?php } ?>
            </ul>
        </li>

         <li>
            <a href="#"><i class="glyphicon glyphicon-tags"></i>  Editor Tag<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="<?=base_url()?>tag">Semua Tag</a>
                </li>
                <li>
                    <a href="<?=base_url()?>tag/insert">Tambah Tag</a>
                </li>
            </ul>
        </li>

        <?php if ($this->session->userdata('status_admn') == 'superadmin'){ ?>
        <li>
            <a href="#"><i class="glyphicon glyphicon-picture"></i>  Banner<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li>
                    <a href="<?=base_url()?>banner">Semua Banner</a>
                </li>
                <li>
                    <a href="<?=base_url()?>banner/insert">Tambah Banner</a>
                </li>
            </ul>
        </li>
        <?php } ?>

        <?php if ($this->session->userdata('status_admn') == 'superadmin'){ ?>
               <?php $i = 1; ?>
                    <?php foreach($statik->result_array() as $r){ ?>
                        <?php if ($i > 1){ ?>
                        <?php } ?>
                        <li><a href="<?=base_url()?>statik/channel/<?=$r['id']?>"><i class="glyphicon glyphicon-bookmark"></i> <?=ucfirst($r['nama_channel'])?></a></li>
                        <?php $i++; ?>
                    <?php } ?>
         <?php } ?>

        <li>
            <a href="#"><i class="glyphicon glyphicon-envelope  "></i> Pesan<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <!--  <li><a href="<?=base_url()?>komentar">Komentar</a></li> -->
                 <li><a href="<?=base_url()?>pesan">Semua Pesan</a></li>
            </ul>
        </li>

     <?php if ($this->session->userdata('status_admn') == 'superadmin'){ ?>
        <li>
            <a href="#"><i class="glyphicon glyphicon-cog"></i> Pengaturan<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li><a href="<?=base_url()?>seo">SEO</a></li>
                <li><a href="<?=base_url()?>sosmed">Social Media</a></li>
            </ul>
        </li>
    <?php } ?>

        <li>
            <a href="#"><i class="glyphicon glyphicon-user"></i> Users<span class="fa arrow"></span></a>
             <ul class="nav nav-second-level">
                <?php if ($this->session->userdata('status_admn') == 'superadmin'){ ?>
                    <li><a href="<?=base_url()?>users">Admin</a></li>
                    <?php } ?>
                    <!-- <li><a href="<?=base_url()?>newsletter">Newsletter Users</a></li> -->
                    <li><a href="<?=base_url()?>login/change_password">Ganti Password</a></li>
            </ul>
        </li>

    </ul>
 
 </div>
</div>