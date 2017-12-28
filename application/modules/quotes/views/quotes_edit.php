	<!--BODY-->
	<div class="container-fluid">
		<div class="well" style="margin-top:60px;margin-bottom:30px;">
			<h3>Edit <?=ucfirst($this->uri->segment(1))?> </h3>
			<div class="bs-callout bs-callout-danger" style="margin:10px 0;">
				<form method="post" role="form" action="<?php echo base_url().$this->uri->segment(1); ?>/update" enctype="multipart/form-data" class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-2 control-label">Quotes</label>
						<div class="col-sm-10">
							<textarea name="quote" class="form-control" rows="4" required><?=$dt->quote?></textarea>
							<input type="hidden" name="id" class="form-control" value="<?=$dt->id?>" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Dari</label>
						<div class="col-sm-10">
							<input type="text" name="dari" class="form-control" value="<?=$dt->dari?>" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Tanggal Tayang</label>
						<div class="col-sm-2">
							<div class="input-group">
								<input type="text" name="tanggal" id="tanggal" class="form-control" value="<?=date('d-m-Y', strtotime($dt->tanggal))?>" required>
								<span class="input-group-btn"><button class="btn btn-default" type="button" id="f_btn1"><span class="glyphicon glyphicon-calendar"></span></button></span>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Jam Tayang</label>
						<div class="col-sm-2">
							<input type="text" name="jam" class="form-control" value="<?=date('H:i', strtotime($dt->tanggal))?>" required>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Publish</label>
						<div class="col-sm-10">
							<input name="publish" type="checkbox" value="1" <?=$dt->publish == 1 ? 'checked' : ''?>>
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
	<!--BODY-->

	<script type="text/javascript">
		// Call CkEditor
		CKEDITOR.replace( 'editorCk1', {
			startupFocus : false,
			uiColor: '#FFFFFF'
		});
	</script>

