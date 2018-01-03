<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit <?=ucfirst($jh)?></h1>
            </div>
        </div>
        <div class="row">
           <div class="col-lg-12">
<div class="bs-callout bs-callout-danger">
<form method="post" role="form" action="<?php echo base_url(); ?>dinamis/update" enctype="multipart/form-data" class="form-horizontal">
	<?php if ($cat->result_array() != NULL){ ?>
	<div class="form-group">
		<label class="col-sm-2 control-label">Nama Kategori</label>
		<div class="col-sm-5">
			<select name="idcategory" class="form-control" required>
				<option value="">Pilih Kategori</option>
				<?php foreach($cat->result_array() as $r){ ?>
				<option value="<?=$r['id']?>" <?=$dt->id_categories == $r['id'] ? 'selected' : ''?>><?=ucfirst($r['nama'])?></option>
				<?php } ?>
			</select>
		</div>
	</div>
	<?php } ?>
	<div class="form-group">
		<label class="col-sm-2 control-label">Judul</label>
		<div class="col-sm-10">
			<input type="text" name="judul" class="form-control" value="<?=$dt->judul?>" required>
			<input type="hidden" name="idberita" class="form-control" value="<?=$dt->id_berita?>" required>
			<input type="hidden" name="idchannel" class="form-control" value="<?=$dt->id_channel?>" required>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Lead</label>
		<div class="col-sm-10">
			<textarea name="lead" class="form-control" rows="3"><?=$dt->lead?></textarea>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Isi</label>
		<div class="col-sm-10">
			<textarea name="isi" id="editorCk1" class="form-control" rows="8" required><?=$dt->isi?></textarea>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Tag <?=ucfirst($this->uri->segment(1))?></label>
		<div class="col-sm-5">
			<input type="text" name="tag" class="form-control" value="<?=$dt->tag?>" required>
		</div>
		<div class="col-sm-5"> * <span class="label label-danger">Di pisahkan dengan Komma (',') Contoh : kata, berita, dst</span></div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Penulis</label>
		<div class="col-sm-5">
			<input type="text" name="penulis" class="form-control" value="<?=$dt->penulis?>" required>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Gambar</label>
		<div class="col-sm-10">
			<div class="row">
				<?php if($dt->gambar_detail){ ?>
				<div class="col-xs-12 col-md-6"><img src="<?=STATIS_FILE?>dinamis/detail/<?=$dt->gambar_detail?>?=<?=time();?>" class="img-responsive"/></div>
				<?php } ?>
				<div class="col-xs-12 col-md-6">
					<input type="file" size="40" name="userfile" class="form-control"><br>
					* <span class="label label-danger">Biarkan Kosong Jika Gambar Tidak Di rubah</span><br>
					* <span class="label label-warning">Gambar maksimal ukuran 600px (100Kb)</span>
				</div>
			</div>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">Video</label>
		<div class="col-sm-10">
			<div class="row">
				<div class="col-xs-12 col-md-12">
					<div class="row">
						<div class="col-xs-12 col-md-12">
							<div class="btn-group" data-toggle="buttons">
								<label class="btn btn-primary <?php if($dt->media == 1) : ?> active <?php endif; ?>">
								    <input type="radio" name="chooseFeature" id="chooseFeature2" value="video" autocomplete="off" <?php if($dt->media == 1) : ?> checked <?php endif; ?> > Video Upload
								</label>
							  	<label class="btn btn-primary <?php if($dt->media == 2) : ?> active <?php endif; ?>">
							    	<input type="radio" name="chooseFeature" id="chooseFeature3" value="embed" autocomplete="off" <?php if($dt->media == 2) : ?> checked <?php endif; ?> > Video Embed (URL)
							  	</label>
							</div>
							<br />
							<br />
						</div>
					</div>
					<div class="row upload-chooseFeature upload-video">
						<div class="col-xs-12 col-md-6"><span class="label label-warning">Video maksimal ukuran (20Mb)</span> <br /><input type="file" size="40" name="uservideo" class="form-control"></div>
					</div>
					<div class="row upload-chooseFeature upload-embed">
						<div class="col-xs-12 col-md-6"><span class="label label-warning">Paste Youtube video ID disini</span> <br />
						<input type="text" name="videoembed" placeholder="Paste Youtube video ID disini" class="form-control" value="<?=$dt->media_data?>"></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">Caption Gambar</label>
		<div class="col-sm-5">
			<input type="text" name="caption" class="form-control" value="<?=$dt->caption?>" required>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Fokus Gambar</label>
		<div class="col-sm-2">
			<select name="fokus" class="form-control" required>
				<option value="1" <?=$dt->fokus == 1 ? 'selected' : ''?>>Kiri</option>
				<option value="2" <?=$dt->fokus == 2 ? 'selected' : ''?>>Tengah</option>
				<option value="3" <?=$dt->fokus == 3 ? 'selected' : ''?>>Kanan</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Headline</label>
		<div class="col-sm-10">
			<label><input name="headline" type="checkbox" value="1" <?=$dt->headline == 1 ? 'checked' : ''?>> </label>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Breaking</label>
		<div class="col-sm-10">
			<label><input name="breaking" type="checkbox" value="1" <?=$dt->breaking == 1 ? 'checked' : ''?>> </label>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Pilihan Editor</label>
		<div class="col-sm-10">
			<label><input name="analisis" type="checkbox" value="1" <?=$dt->analisis == 1 ? 'checked' : ''?>> </label>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Featured</label>
		<div class="col-sm-10">
			<label><input name="featured" type="checkbox" value="1" <?=$dt->featured == 1 ? 'checked' : ''?>> </label>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Hot</label>
		<div class="col-sm-10">
			<label><input name="hot" type="checkbox" value="1" <?=$dt->hot == 1 ? 'checked' : ''?>> </label>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Tanggal Tayang</label>
		<div class="col-sm-2">
			<div class="input-group">
				<input type="text" name="tanggal" id="tanggal" class="form-control" value="<?=date('d-m-Y', strtotime($dt->tanggal_tayang))?>" required>
				<span class="input-group-btn"><button class="btn btn-default" type="button" id="f_btn1"><span class="glyphicon glyphicon-calendar"></span></button></span>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Jam Tayang</label>
		<div class="col-sm-2">
			<input type="text" name="jam" class="form-control" value="<?=date('H:i', strtotime($dt->waktu))?>" required>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Publish</label>
		<div class="col-sm-10">
			<input name="publish" type="checkbox" value="1" <?=$dt->publish == 1 ? 'checked' : ''?>>
		</div>
	</div>
	<div class="form-group" style="margin-top:20px;">
		<div class="col-sm-offset-2 col-sm-10">
			<div class="row">
				<div class="col-xs-12 col-md-3">
					<button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
				</div>
				<div class="col-xs-12 col-md-3">
					<a href="<?=base_url()?>dinamis/channel/<?=$dt->id_channel?>" class="btn btn-danger btn-block"><span class="glyphicon glyphicon-list-alt"></span> Kembali Ke Tabel</a>
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

$(document).ready(function() {
	$('.upload-chooseFeature').hide();

	<?php if($dt->media == 1) : ?>
		$('.upload-video').show();
	<?php else : ?>
		$('.upload-embed').show();
	<?php endif; ?>

    $('input[type=radio][name=chooseFeature]').change(function() {
        if (this.value == 'video') {
            $('.upload-chooseFeature').hide();
            $('.upload-video').show();
        }
        else if (this.value == 'embed') {
            $('.upload-chooseFeature').hide();
            $('.upload-embed').show();
        }
    });
});
</script>