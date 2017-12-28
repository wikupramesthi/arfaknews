<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?=ucfirst($this->uri->segment(1))?></h1>
            </div>
        </div>
        <div class="row">
           <div class="col-lg-12">

      <? if ($this->session->flashdata('sks')){ ?>
	<div class="alert alert-success"><?=$this->session->flashdata('sks')?></div>
	<? } ?>
	<? if ($this->session->flashdata('msg')){ ?>
	<div class="alert alert-danger"><?=$this->session->flashdata('msg')?></div>
	<? } ?>
	<div class="bs-callout bs-callout-danger">
	   <form method="post" role="form" action="<?=base_url()?>login/change_password_process" enctype="multipart/form-data" class="form-horizontal">
		<div class="form-group">
			<label class="col-sm-2 control-label">Title</label>
			<div class="col-sm-10">
				<input type="text" name="title" value="" class="form-control" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Kayword</label>
			<div class="col-sm-10">
				<input type="text" name="keyword" value="" class="form-control" required >
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Deskripsi</label>
			<div class="col-sm-10">
				<input type="text" name="description" value="" class="form-control" required >
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<div class="row">
					<div class="col-xs-12 col-md-3">
						<button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
					</div>
				</div>
			</div>
		</div>
        
        </form>
      </div>
    </div>
  </div>
</div>