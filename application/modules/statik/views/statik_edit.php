<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit <?=ucfirst($jh)?></h1>
            </div>
        </div>
        <div class="row">
           <div class="col-lg-12">

  <div class="bs-callout bs-callout-danger">
			
<form method="post" role="form" action="<?php echo base_url().$this->uri->segment(1); ?>/update" enctype="multipart/form-data" class="form-horizontal">
	<div class="form-group">
		<label class="col-sm-2 control-label">Urutan</label>
		<div class="col-sm-1">
			<select name="urutan" class="form-control" required>
				<?php for($i=1;$i<31;$i++){ ?>
				<option value="<?=$i?>" <?=$dt->urutan == $i ? 'selected' : ''?>><?=$i?></option>
				<?php } ?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Judul</label>
		<div class="col-sm-10">
			<input type="text" name="judul" class="form-control" value="<?=$dt->judul?>" required>
			<input type="hidden" name="idstatis" class="form-control" value="<?=$dt->id_statis?>" required>
			<input type="hidden" name="idchannel" class="form-control" value="<?=$dt->id_channel?>" required>
			<input type="hidden" name="idcategory" class="form-control" value="<?=$dt->id_categories?>" required>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Isi</label>
		<div class="col-sm-10">
			<textarea name="isi" id="editorCk1" class="form-control" rows="8" required><?=$dt->isi?></textarea>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Gambar</label>
		<div class="col-sm-10">
			<div class="row">
				<?php if($dt->gambar_detail){ ?>
				<div class="col-xs-12 col-md-6"><img src="<?=STATIS_FILE.$this->uri->segment(1)?>/detail/<?=$dt->gambar_detail?>" class="img-responsive"/></div>
				<?php } ?>
				<div class="col-xs-12 col-md-6">
					<input type="file" size="40" name="userfile" class="form-control"><br>
					* <span class="label label-danger">Biarkan Kosong Jika Gambar Tidak Di rubah</span><br>
					* <span class="label label-warning">Gambar maksimal ukuran 600px (100Kb)</span>
				</div>
			</div>
		</div>
	</div>
	<div class="form-group" style="margin-top:20px;">
		<div class="col-sm-offset-2 col-sm-10">
			<div class="row">
				<div class="col-xs-12 col-md-3">
					<button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
				</div>
				<div class="col-xs-12 col-md-3">
					<a href="<?=base_url()?>statik/channel/<?=$dt->id_channel?>" class="btn btn-danger btn-block"><span class="glyphicon glyphicon-list-alt"></span> Kembali Ke Tabel</a>
				</div>
			</div>
		</div>
	</div>
    
    </form>
   </div>
  </div>
 </div>
</div>

	<script type="text/javascript">
		// Call CkEditor
		CKEDITOR.replace( 'editorCk1', {
			startupFocus : false,
			uiColor: '#FFFFFF'
		});
	</script>

