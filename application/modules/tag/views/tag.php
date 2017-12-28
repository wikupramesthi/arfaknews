<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Editor Tag </h1>
            </div>
        </div>
        <div class="row">
           <div class="col-lg-12">

     <div class="bs-callout bs-callout-danger">
	<a href="<?=base_url()?>tag/insert" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Tambah Baru</a>
	<hr style="margin-top:5px;margin-bottom:5px;">
	<div class="table-responsive">
		<table class="table table-striped table-hover table-bordered">
			<tr><th class="tc">ID</th><th class="tc">Tanggal</th><th class="tc">Tag</th><th class="tc">Channel</th><th class="tc">Status</th><th class="tc" colspan="2">Aksi</th></tr>
			<?php
			$i = ($hal ? (($hal-1) * $off)+1 : '1');
			foreach($d->result_array() as $r){
				echo '<tr><td class="tc">'.strtoupper($r['id']).'</td><td class="tc">'.date('d/m/Y',strtotime($r['tanggal'])).'</td><td>'.ucwords($r['tag']).'</td><td>'.ucwords($r['cat']).'</td><td>'.($r['publish'] == '1' ? 'Aktif' : 'Tidak Aktif').'</td><td class="tc"><a href="'.base_url().'tag/edit/'.$r['id'].'/'.url_title($r['tag'],'-',TRUE).'" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span> Edit</a></td><td class="tc"><a href="'.base_url().'tag/delete/'.$r['id'].'/'.$r['tag'].'" onClick=\'return confirm("Anda yakin ingin menghapus konten ini???")\' class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span> Hapus</a></td></tr>';
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