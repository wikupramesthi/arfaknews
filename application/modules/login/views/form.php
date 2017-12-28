<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Ganti Password</h1>
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
			<label class="col-sm-2 control-label">Password Lama</label>
			<div class="col-sm-5">
				<input type="password" name="oldpass" value="" class="form-control" required placeholder="Password Lama">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Password Baru</label>
			<div class="col-sm-5">
				<input type="password" name="newpass1" value="" class="form-control" required placeholder="Password Baru">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Konfirmasi Password Baru</label>
			<div class="col-sm-5">
				<input type="password" name="newpass2" value="" class="form-control" required placeholder="Konfirmasi Password Baru">
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