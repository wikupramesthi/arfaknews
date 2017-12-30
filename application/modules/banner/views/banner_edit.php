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
<?php
// echo '<pre>';print_r($dt);?>
		<div class="form-group">
		<label class="col-sm-2 control-label">Nama banner</label>
		<div class="col-sm-5">
			<input type="text" name="banner_name" class="form-control" value="<?=$dt->banner_name;?>" required>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Gambar Banner</label>
		<div class="col-sm-10">
			<div class="row">
				<div class="col-xs-12 col-md-2">
				    <label class="btn btn-default btn-info">
    					Browse<input type="file" name="banner_img" id="banner_img" style="display: none;" required>
    				</label>
				</div>
				<div class="col-xs-12 col-md-6">
					 * <span class="label label-warning">Gambar ukuran 300px x 250px (100Kb)</span>
				</div>

			</div>

			<div class="row">
				<div name="img_prev" id="img_prev" class="col-xs-12 col-md-6">
				<br>
					<h4><span class="label label-warning">Preview :</span></h4>
					<img id="img_preview" height="150px" src="<?=base_url();?>statis/banner/<?=$dt->img;?>" />
				</div>
			</div>

		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">URL</label>
		<div class="col-sm-5">
			<input type="text" name="banner_url" class="form-control" value="<?=$dt->url;?>" required>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">Posisi Banner</label>
		<div class="col-sm-5">
			<select name="banner_post" class="form-control" required>
				<option value="">--Pilih--</option>
				<option value="sidebar" <?=($dt->banner_post=='sidebar')?'selected="selected"':''?> >sidebar</option>
				<option value="landing" <?=($dt->banner_post=='landing')?'selected="selected"':''?> >landing</option>
			</select>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">Status</label>
		<div class="col-sm-5">
			<input type="hidden" name="banner_status" value="inactive">
			<input type="checkbox" name="banner_status" value="active" <?=($dt->status=='active')?'checked':''?> > Active<br>
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