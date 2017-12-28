<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User Management </h1>
            </div>
        </div>
        <div class="row">
           <div class="col-lg-12">

     <div class="bs-callout bs-callout-danger">
        <a href="<?=base_url()?>users/insert" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Tambah Baru</a>
	<hr style="margin-top:5px;margin-bottom:5px;">
	<div class="table-responsive">
		<table class="table table-striped table-hover table-bordered">
			<tr><th class="tc">No.</th><th class="tc">Username</th><th class="tc">Nama</th><th class="tc">Level</th><th class="tc">Status</th><th class="tc" colspan="2">Aksi</th></tr>
			<?php
			$i = 1;
			foreach($ls->result_array() as $tp)
			{
			?>
			<tr>
				<td class="tr"><?=$i?></td>
				<td><?=$tp['username']?></td>
				<td><?=$tp['nama']?></td>
				<td><?=$tp['status']?></td>
				<td><?=($tp['stts']==1 ? 'Aktif' : 'Tidak Aktif')?></td>
				<td class="tc">
					<a href="<?=base_url()?>users/edit/<?=$tp['id']?>/<?=url_title($tp['nama'],'-',TRUE)?>" class="btn btn-primary btn-xs" title="Edit"><span class="glyphicon glyphicon-pencil"></span></a>
				</td>
				<td class="tc">
					<a href="<?=base_url()?>users/delete/<?=$tp['id']?>/<?=url_title($tp['nama'],'-',TRUE)?>" title="Edit" onClick=\'return confirm("Anda yakin ingin menghapus konten ini???")\' class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a>
				</td>
			</tr>
			<?php
			$i++;
			}
			?>
		</table>
	</div>
	<?php echo $paginator; ?>
  
  </div>
 </div>
</div>
</div>