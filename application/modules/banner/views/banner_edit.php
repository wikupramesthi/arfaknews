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
			<label class="col-sm-2 control-label">Nama Link</label>
			<div class="col-sm-10">
				<input type="text" name="nama" class="form-control" value="<?=$dt->nama?>" required>
				<input type="hidden" name="idweblink" class="form-control" value="<?=$dt->id?>" required>
				<input type="hidden" name="idchannel" class="form-control" value="<?=$dt->id_channel?>" required>
				<input type="hidden" name="idcategory" class="form-control" value="<?=$dt->id_categories?>" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">URL</label>
			<div class="col-sm-10">
				<input type="text" name="link" class="form-control" value="<?=$dt->link?>" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Urutan</label>
			<div class="col-sm-1">
				<select name="urutan" class="form-control" required>
					<? for($i=1;$i<31;$i++){ ?>
					<option value="<?=$i?>" <?=$dt->urutan == $i ? 'selected' : ''?>><?=$i?></option>
					<? } ?>
				</select>
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