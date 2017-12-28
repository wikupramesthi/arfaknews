<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit <?=ucfirst($this->uri->segment(1))?></h1>
            </div>
        </div>
        <div class="row">
           <div class="col-lg-12">
             <div class="bs-callout bs-callout-danger">
	  <form method="post" role="form" action="<?php echo base_url().$this->uri->segment(1); ?>/update" enctype="multipart/form-data" class="form-horizontal">
		<?php if ($this->uri->segment(1) == 'komentar'){?>
		<div class="form-group">
			<label class="col-sm-2 control-label">Judul Berita</label>
			<div class="col-sm-10"><h4><?=$dt->judul?></h4></div>
		</div>
		<?php } ?>
		<div class="form-group">
			<label class="col-sm-2 control-label">Nama</label>
			<div class="col-sm-10">
				<input type="text" name="nama" class="form-control" value="<?=$dt->nama?>" required>
				<input type="hidden" name="idkomentar" class="form-control" value="<?=$dt->id?>" required>
				<input type="hidden" name="idchannel" class="form-control" value="<?=$dt->id_channel?>" required>
				<input type="hidden" name="idcategory" class="form-control" value="<?=$dt->id_categories?>" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Telp</label>
			<div class="col-sm-10">
				<input type="text" name="telp" class="form-control" value="<?=$dt->telp?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Email</label>
			<div class="col-sm-10">
				<input type="text" name="email" class="form-control" value="<?=$dt->email?>" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label"><?=$this->uri->segment(1) == 'komentar' ? 'Komentar' : 'Pesan/Saran' ?></label>
			<div class="col-sm-10">
				<textarea name="isi" class="form-control" rows="8" required><?=$dt->isi?></textarea>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Tanggal</label>
			<div class="col-sm-2">
				<div class="input-group">
					<input type="text" name="tanggal" id="tanggal" class="form-control" value="<?=date('d-m-Y', strtotime($dt->tanggal))?>" required>
					<span class="input-group-btn"><button class="btn btn-default" type="button" id="f_btn1"><span class="glyphicon glyphicon-calendar"></span></button></span>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Jam</label>
			<div class="col-sm-2">
				<input type="text" name="jam" class="form-control" value="<?=date('H:i', strtotime($dt->waktu))?>" required>
			</div>
		</div>
		<?php if ($this->uri->segment(1) == 'komentar'){?>
		<div class="form-group">
			<label class="col-sm-2 control-label">Publish</label>
			<div class="col-sm-10">
				<input name="publish" type="checkbox" value="1" <?=$dt->publish == 1 ? 'checked' : ''?>>
			</div>
		</div>
		<?php } ?>
		<div class="form-group" style="margin-top:20px;">
			<div class="col-sm-offset-2 col-sm-10">
				<div class="row">
					<div class="col-xs-12 col-md-3">
						<button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
					</div>
					<div class="col-xs-12 col-md-3">
						<a href="<?=base_url().$this->uri->segment(1)?>" class="btn btn-danger btn-block"><span class="glyphicon glyphicon-list-alt"></span> Kembali Ke Tabel</a>
					</div>
				</div>
			</div>
		</div>
      
      </form>
     </div>
   </div>
  </div>
</div>