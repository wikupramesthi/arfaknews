<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit Editor Tag </h1>
            </div>
        </div>
        <div class="row">
           <div class="col-lg-12">

<div class="bs-callout bs-callout-danger">
    <form method="post" role="form" action="<?php echo base_url(); ?>tag/update" enctype="multipart/form-data" class="form-horizontal">
      <input type="hidden" name="id" value="<?= $d->id ?>" />
	<div class="form-group">
		<label class="col-sm-2 control-label">Nama Channel</label>
		<div class="col-sm-5">
			<select name="idchannel" class="form-control" required>
				<option value="">Pilih Kategori</option>
				<? foreach($cat->result_array() as $r){ ?>
				<option value="<?=$r['id']?>" <?= $d->id_channel == $r['id'] ? 'selected="selected"' : '' ?>><?=ucfirst($r['nama_channel'])?></option>
				<? } ?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Tag</label>
		<div class="col-sm-5">
			<input type="text" name="tag" class="form-control" value="<?= $d->tag ?>" required>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Tanggal</label>
		<div class="col-sm-2">
			<div class="input-group">
				<input type="text" name="tanggal" id="tanggal" class="form-control" value="<?=date("d-m-Y", strtotime($d->tanggal))?>" required>
				<span class="input-group-btn"><button class="btn btn-default" type="button" id="f_btn1"><span class="glyphicon glyphicon-calendar"></span></button></span>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Status</label>
		<div class="col-sm-5">
			<select name="flag" class="form-control" required>
				<option value="1" <?= $d->publish == '1' ? 'selected="selected"' : '' ?>>Aktif</option>
				<option value="0" <?= $d->publish == '0' ? 'selected="selected"' : '' ?>>Tidak Aktif</option>
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
					<a href="<?=base_url()?>tag" class="btn btn-danger btn-block"><span class="glyphicon glyphicon-list-alt"></span> Kembali Ke Tabel</a>
				</div>
			</div>
		</div>
	</div>
    
    </form>
   </div>
  </div>
 </div>
</div>