<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit Kategori </h1>
            </div>
        </div>
        <div class="row">
           <div class="col-lg-12">

<div class="bs-callout bs-callout-danger">
 <form method="post" role="form" action="<?php echo base_url(); ?>channel/update" enctype="multipart/form-data" class="form-horizontal">
	<input type="hidden" name="id" value="<?= $d->id ?>" />
	<div class="form-group">
		<label class="col-sm-2 control-label">Nama Channel</label>
		<div class="col-sm-10">
			<input type="text" name="nama" class="form-control" value="<?= $d->nama ?>" required>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Tipe</label>
		<div class="col-sm-5">
			<select name="tipe" class="form-control" required>
				<option value="1" <?= $d->tipe == '1' ? 'selected="selected"' : '' ?>>Statis</option>
				<option value="2" <?= $d->tipe == '2' ? 'selected="selected"' : '' ?>>Dinamis</option>
				<option value="3" <?= $d->tipe == '3' ? 'selected="selected"' : '' ?>>Galeri</option>
				<option value="4" <?= $d->tipe == '4' ? 'selected="selected"' : '' ?>>Others</option>
			</select>
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
					<a href="<?=base_url()?>channel" class="btn btn-danger btn-block"><span class="glyphicon glyphicon-list-alt"></span> Kembali Ke Tabel</a>
				</div>
			</div>
		</div>
	</div>
    </form>
   </div>
  </div>
 </div>
</div>