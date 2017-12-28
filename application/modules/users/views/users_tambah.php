<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tambah User</h1>
            </div>
        </div>
        <div class="row">
           <div class="col-lg-12">

     <div class="bs-callout bs-callout-danger">
       <form method="post" role="form" action="<?php echo base_url(); ?>users/create" enctype="multipart/form-data" class="form-horizontal">
		<div class="form-group">
			<label class="col-sm-2 control-label">Nama Lengkap</label>
			<div class="col-sm-10">
				<input type="text" name="nama" class="form-control" value="" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Username</label>
			<div class="col-sm-10">
				<input type="text" name="username" class="form-control" value="" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Password</label>
			<div class="col-sm-10">
				<input type="password" name="pass" class="form-control" required>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Status</label>
			<div class="col-sm-2">
			<select name="stts" class="form-control" required>
				<?php
					echo '<option value=1 selected>Aktif</option>';
					echo '<option value=0>Tidak Aktif</option>';
				?>
			</select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Level</label>
			<div class="col-sm-2">
			<select name="lvl" class="form-control" required>
				<?php
					echo '<option value="superadmin" selected>Super Admin</option>';
					echo '<option value="admin">Admin</option>';
				?>
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
						<a href="<?=base_url()?>users" class="btn btn-danger btn-block"><span class="glyphicon glyphicon-list-alt"></span> Kembali Ke Tabel</a>
					</div>
				</div>
			</div>
		</div>
     
     </form>
    </div>
  </div>
 </div>
</div>