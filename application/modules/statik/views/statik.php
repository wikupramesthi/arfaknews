<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?=ucfirst($jh)?></h1>
            </div>
        </div>
        <div class="row">
           <div class="col-lg-12">

  <div class="bs-callout bs-callout-danger">
<a href="<?=base_url()?>statik/insert/<?=$this->uri->segment(3)?>" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Tambah</a>
<hr style="margin-top:5px;margin-bottom:5px;">

<div class="table-responsive">
	<table class="table table-striped table-hover table-bordered">
		<thead>
			<tr>
				<th class="tc">Urutan</th>
				<th class="tc">Judul</th>
				<th class="tc">Isi</th>
				<th class="tc">URL</th>
				<th class="tc">Gambar</th>
				<th class="tc" colspan="2">Aksi</th>
			</tr>
		</thead>

		<tbody>
		<?php
		foreach($tampil->result_array() as $tp)
		{
		?>
		<tr>
			<td class="tr"><?=$tp['urutan']?></td>
			<td><?=$tp['judul']?></td>
			<td><?=$tp['isi']?></td>
			<td></td>
			<td class="tc"><?=($tp['gambar_detail'] ? '<span class="glyphicon glyphicon-picture"></span>' : '') ?></td>
			<td class="tc">
				<a href="<?=base_url().$this->uri->segment(1)?>/edit/<?=$tp['id_statis']?>/<?=url_title($tp['judul'],'-',TRUE)?>" class="btn btn-primary btn-xs" title="edit"><span class="glyphicon glyphicon-pencil"></span></a>
			</td>
			<td class="tc">
				<a href="<?=base_url().$this->uri->segment(1)?>/delete/<?=$tp['id_statis']?>" onClick="return confirm('Anda yakin ingin menghapus konten ini???')" class="btn btn-danger btn-xs" title="hapus"><span class="glyphicon glyphicon-trash"></span></a>
			</td>
		</tr>
		<?php
		}
		?>
		</tbody>

		<thead>
			<tr>
				<th colspan="9">
					<?php echo $paginator; ?>
				</th>
			</tr>
		</thead>

	</table>
      </div>
 
     </div>
   </div>
  </div>
</div>