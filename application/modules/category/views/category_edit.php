	<!--BODY-->
	<div class="container-fluid">
		<div class="well" style="margin-top:60px;margin-bottom:30px;">
			<h3>Edit Categories </h3>
			<div class="bs-callout bs-callout-danger" style="margin:10px 0;">
				<form method="post" role="form" action="<?php echo base_url(); ?>category/update" enctype="multipart/form-data" class="form-horizontal">
					<input type="hidden" name="id" value="<?= $d->id ?>" />
					<div class="form-group">
						<label class="col-sm-2 control-label">Nama Channel</label>
						<div class="col-sm-5">
							<select name="channel" class="form-control" required>
								<option value="">Pilih Channel</option>
								<? foreach($ch->result_array() as $r){ ?>
								<option value="<?=$r['id']?>" <?= $d->id_channel == $r['id'] ? 'selected="selected"' : '' ?>><?=ucfirst($r['nama'])?></option>
								<? } ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Nama category</label>
						<div class="col-sm-10">
							<input type="text" name="nama" class="form-control" value="<?= $d->nama ?>" required>
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
									<a href="<?=base_url()?>category" class="btn btn-danger btn-block"><span class="glyphicon glyphicon-list-alt"></span> Kembali Ke Tabel</a>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!--BODY-->

