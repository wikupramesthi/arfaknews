<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?=ucfirst($this->uri->segment(1))?></h1>
            </div>
        </div>
        <div class="row">
           <div class="col-lg-12">

   <div class="bs-callout bs-callout-danger">
       <div class="table-responsive">
         <table class="table table-striped table-hover table-bordered">
	 <thead>
		<tr>
			<th class="tc">No</th>
			<th class="tc">Nama</th>
			<th class="tc">Email</th>
			<th class="tc">Kategori Berita</th>
			<th class="tc">Aktif</th>
			<th class="tc" colspan="2">Aksi</th>
		</tr>
	</thead>

	<tbody>
	<?php
	$i = 1;
	foreach($tampil->result_array() as $tp)
	{
	?>
	<tr>
		<td><?=$i?></td>
		<td><?=$tp['nama']?></td>
		<td><?=$tp['email']?></td>
		<td>
			<?php
			$c = explode(',',$tp['id_channel']);
			$j = count($c);
			for ($i=0;$i<$j;$i++){
				if ($c[$i] != ''){
					echo ucfirst($this->all_model->tampil_newsletter_kategori($c[$i])).'<br>';
				}
			}
			?>
		</td>
		<td class="tc"><?=($tp['stts'] == '1' ? '<span class="glyphicon glyphicon-check"></span>' : '') ?></td>
		<td class="tc">
			<a href="<?=base_url().$this->uri->segment(1)?>/edit/<?=$tp['id']?>/<?=url_title($tp['nama'],'-',TRUE)?>" class="btn btn-primary btn-xs" title="edit"><span class="glyphicon glyphicon-pencil"></span></a>
		</td>
		<td class="tc">
			<a href="<?=base_url().$this->uri->segment(1)?>/delete/<?=$tp['id']?>/<?=url_title($tp['nama'],'-',TRUE)?>" onClick=\'return confirm("Anda yakin ingin menghapus konten ini???")\' class="btn btn-danger btn-xs" title="hapus"><span class="glyphicon glyphicon-trash"></span></a>
		</td>
	</tr>
	<?php
		$i++;
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