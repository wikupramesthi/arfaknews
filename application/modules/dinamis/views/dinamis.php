<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?=ucfirst($jh)?></h1>
            </div>
        </div>
        <div class="row">
           <div class="col-lg-12">

<div class="bs-callout bs-callout-danger">
  <a href="<?=base_url()?>dinamis/insert/<?=$this->uri->segment(3)?>" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
   <hr style="margin-top:5px;margin-bottom:5px;">

 <div class="table-responsive">
   <table class="table table-striped table-hover table-bordered">
	<thead>
		<tr>
			<th class="tc">Tanggal</th>
			<th class="tc">HL</th>
			<th class="tc">BR</th>
			<th class="tc">EDT</th>
			<th class="tc">FT</th>
			<th class="tc">HOT</th>
			<?php if ($ct->result_array() != NULL){ ?>
			<th class="tc">Kategori</th>
			<?php } ?>
			<th class="tc">Judul</th>
			<th class="tc">Penulis</th>
			<th class="tc">Foto</th>
			<th class="tc">Publish</th>
			<th class="tc">Dibaca</th>
			<th class="tc" colspan="2">Aksi</th>
		</tr>
	</thead>

	<tbody>
	<?php
	foreach($tampil->result_array() as $tp)
	{
	?>
	<tr>
		<td class="tc"><?=date('d/m/Y',strtotime($tp['tanggal_tayang']))?> - <?=date('H:i',strtotime($tp['waktu']))?></td>
		<td class="tc"><?=($tp['headline'] == '1' ? '<span class="glyphicon glyphicon-check"></span>' : '') ?></td>
		<td class="tc"><?=($tp['breaking'] == '1' ? '<span class="glyphicon glyphicon-check"></span>' : '') ?></td>
		<td class="tc"><?=($tp['analisis'] == '1' ? '<span class="glyphicon glyphicon-check"></span>' : '') ?></td>
		<td class="tc"><?=($tp['featured'] == '1' ? '<span class="glyphicon glyphicon-check"></span>' : '') ?></td>
		<td class="tc"><?=($tp['hot'] == '1' ? '<span class="glyphicon glyphicon-check"></span>' : '') ?></td>
		<?php if ($ct->result_array() != NULL){ ?>
		<td><?=$tp['cat']?></td>
		<?php } ?>
		<td><?=$tp['judul']?></td>
		<td><?=$tp['penulis']?></td>
		<td class="tc"><?=($tp['gambar_detail'] ? '<span class="glyphicon glyphicon-picture"></span>' : '') ?></td>
		<td class="tc"><?=($tp['publish'] == '1' ? '<span class="glyphicon glyphicon-check"></span>' : '') ?></td>
		<td class="tr"><?=$tp['counter']?></td>
		<td class="tc">
			<a href="<?=base_url().$this->uri->segment(1)?>/edit/<?=$tp['id_berita']?>/<?=url_title($tp['judul'],'-',TRUE)?>" class="btn btn-primary btn-xs" title="edit"><span class="glyphicon glyphicon-pencil"></span></a>
		</td>
		<td class="tc">
			<a href="<?=base_url().$this->uri->segment(1)?>/delete/<?=$tp['id_berita']?>" onClick="return confirm('Anda yakin ingin menghapus konten ini???')" class="btn btn-danger btn-xs" title="hapus"><span class="glyphicon glyphicon-trash"></span></a>
		</td>
	</tr>
	<?php
	}
	?>
	</tbody>

	<thead>
		<tr>
			<th colspan="14">
				<?php echo $paginator; ?>
			</th>
		</tr>
		<tr>
		  <th colspan="14">
			<form method="post" role="form" action="<?php echo base_url(); ?>dinamis/cari/<?= $this->uri->segment(3) ?>" class="form-horizontal">
				<div class="form-group">
					<label class="col-sm-3 control-label">Cari <?=ucfirst($jh)?> berdasarkan </label>
					<div class="col-sm-2">
						<select name="subjek" id="subjek" class="form-control" required>
							<option value="tanggal" <?=$subjek == 'tanggal' ? 'selected' : ''?>>Tanggal</option>
							<option value="judul" <?=$subjek == 'judul' ? 'selected' : ''?>>Judul</option>
							<option value="penulis" <?=$subjek == 'penulis' ? 'selected' : ''?>>Penulis</option>
						</select>
					</div>
					<div class="col-sm-5">
						<div class="input-group">
							<input type="text" name="objek" class="form-control" value="<?=$objek?>" required>
							<span class="input-group-btn"><button class="btn btn-default btn-success" type="submit" title="Cari"><span class="glyphicon glyphicon-search"></span></button></span>
							<span class="input-group-btn"><button class="btn btn-default btn-success" type="button" title="Reset" onclick="location.href='<?=base_url();?>dinamis/channel/<?=$this->uri->segment(3)?>'"><span class="glyphicon glyphicon-refresh"></span></button></span>
						</div>
					</div>
					<?php if ($subjek == 'tanggal'){ ?>
					<div class="col-sm-1">
						<span class="label label-warning" id="wrn-cari" style="display:block;margin-top:10px;">(dd-mm-yyyy)</span>
					</div>
					<?php } ?>
				</div>
			</form>
		</th>
		</tr>
	</thead>
     </table>
 </div>

   </div>
  </div>
 </div>
</div>

<script type="text/javascript">
jQuery(document).ready(function() {
var sbj = jQuery('#subjek');
var select = this.value;
sbj.change(function () {
if (jQuery(this).val() == 'tanggal') {
jQuery('#wrn-cari').show();
}
else jQuery('#wrn-cari').hide();
});
});
</script>

