<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tambah Sub Kategori</h1>
            </div>
        </div>
        <div class="row">
           <div class="col-lg-12">
             <div class="bs-callout bs-callout-danger">
	 <form method="post" role="form" action="<?php echo base_url(); ?>category/create" enctype="multipart/form-data" class="form-horizontal">
	 <div class="form-group">
	  <label class="col-sm-2 control-label">Pilih Kategori</label>
		<div class="col-sm-5">
			<select name="channel" class="form-control" required>
				<option value="">Pilih</option>
				<?php foreach($ch->result_array() as $r){ ?>
				<option value="<?=$r['id']?>"><?=ucfirst($r['nama_channel'])?></option>
				<? } ?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Nama Sub Kategori</label>
		<div class="col-sm-5">
			<input type="text" name="nama" class="form-control" value="" required>
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