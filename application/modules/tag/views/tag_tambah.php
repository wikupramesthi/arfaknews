<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tambah Editor Tag </h1>
            </div>
        </div>
        <div class="row">
           <div class="col-lg-12">

  <div class="bs-callout bs-callout-danger">
      <form method="post" role="form" action="<?php echo base_url(); ?>tag/create" enctype="multipart/form-data" class="form-horizontal">
	<div class="form-group">
		<label class="col-sm-2 control-label">Nama Channel</label>
		<div class="col-sm-5">
			<select name="idchannel" class="form-control" required>
				<option value="">Pilih Kategori</option>
				<?php foreach($cat->result_array() as $r){ ?>
				<option value="<?=$r['id']?>"><?=ucfirst($r['nama_channel'])?></option>
				<? } ?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Tag</label>
		<div class="col-sm-5">
			<input type="text" name="tag" class="form-control" value="" required>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Tanggal</label>
		<div class="col-sm-2">
			<div class="input-group">
				<input type="text" name="tanggal" id="tanggal" class="form-control" value="<?=date("d-m-Y")?>" required>
				<span class="input-group-btn"><button class="btn btn-default" type="button" id="f_btn1"><span class="glyphicon glyphicon-calendar"></span></button></span>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Status</label>
		<div class="col-sm-5">
			<select name="flag" class="form-control" required>
				<option value="1">Aktif</option>
				<option value="0">Tidak Aktif</option>
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