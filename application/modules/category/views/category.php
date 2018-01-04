<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sub Kategori</h1>
            </div>
        </div>
        <div class="row">
           <div class="col-lg-12">

  <div class="bs-callout bs-callout-danger">
    <a href="<?=base_url()?>category/insert" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Tambah Baru</a>
      <hr style="margin-top:5px;margin-bottom:5px;">
	<div class="table-responsive">
	 <table class="table table-striped table-hover table-bordered">
		<tr><th class="tc">Kategori</th><th class="tc">Sub Category</th><th class="tc">Status</th><th class="tc" colspan="2">Aksi</th></tr>
		<?php
		$i = ($hal ? (($hal-1) * $off)+1 : '1');
		foreach($d->result_array() as $r){
			echo '<tr><td>'.ucfirst($r['channel']).'</td><td>'.ucfirst($r['nama']).'</td><td>'.($r['flag'] == '1' ? 'Aktif' : 'Tidak Aktif').'</td><td class="tc"><a href="'.base_url().'category/edit/'.$r['id'].'/'.url_title($r['nama'],'-',TRUE).'" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span> Edit</a></td><td class="tc"><a href="'.base_url().'category/delete/'.$r['id'].'/'.$r['nama'].'" onClick=\'return confirm("Anda yakin ingin menghapus konten ini???")\' class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span> Hapus</a></td></tr>';
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