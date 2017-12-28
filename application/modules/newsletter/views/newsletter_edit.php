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
		<div class="form-group">
			<label class="col-sm-2 control-label">Nama</label>
			<div class="col-sm-10">
				<input type="text" name="nama" class="form-control" value="<?=$dt->nama?>" required>
				<input type="hidden" name="idnewsletter" class="form-control" value="<?=$dt->id?>" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Email</label>
			<div class="col-sm-10">
				<input type="text" name="email" class="form-control" value="<?=$dt->email?>" required>
			</div>
		</div>
		<div class="form-group">
			<?php $chn = explode(',',$dt->id_channel); ?>
			<label class="col-sm-2 control-label">Kategori Berita</label>
			<div class="col-sm-2">
				<select multiple="multiple" name="idchannel[]" class="form-control" required>
					<?php foreach($ch->result_array() as $c) { ?>
					<option value="<?=$c['id']?>" <?php if (in_array($c['id'],$chn,TRUE)){ echo 'selected'; } ?>><?=ucfirst($c['nama'])?></option>
					<?php } ?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Status</label>
			<div class="col-sm-10">
				<input name="stts" type="checkbox" value="1" <?=$dt->stts == 1 ? 'checked' : ''?>>
			</div>
		</div>
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