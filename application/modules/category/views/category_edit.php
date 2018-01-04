<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit Sub Kategori</h1>
            </div>
        </div>
        <div class="row">
           <div class="col-lg-12">
             <div class="bs-callout bs-callout-danger">
<form method="post" role="form" action="<?php echo base_url(); ?>category/update" enctype="multipart/form-data" class="form-horizontal">
	<input type="hidden" name="id" value="<?= $d->id ?>" />
	<div class="form-group">
		<label class="col-sm-2 control-label">Pilih Kategori</label>
		<div class="col-sm-5">
			<select name="channel" class="form-control" required>
				<option value="">Pilih</option>
				<?php foreach($ch->result_array() as $r){ ?>
				<option value="<?=$r['id']?>" <?= $d->id_channel == $r['id'] ? 'selected="selected"' : '' ?>><?=ucfirst($r['nama_channel'])?></option>
				<? } ?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Nama Sub Kategori</label>
		<div class="col-sm-10">
			<input type="text" name="nama" class="form-control" value="<?= $d->nama ?>" required>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Status</label>
		<div class="col-sm-5">
			<select name="flag" class="form-control" required>
				<option value="1" <?= $d->flag == '1' ? 'selected="selected"' : '' ?>>Aktif</option>
				<option value="0" <?= $d->flag == '0' ? 'selected="selected"' : '' ?>>Tidak Aktif</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<div class="row">
				<div class="col-xs-12 col-md-3">
					<button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
				</div>
				<div class="col-xs-12 col-md-3">
					<a href="<?=base_url()?>category" class="btn btn-danger btn-block"><span class="glyphicon glyphicon-list-alt"></span> Kembali Ke Tabel</a>
				</div>
			</div>
		</div>
	</div>
     </form>
   </div>
  </div>
 </div>
</div>