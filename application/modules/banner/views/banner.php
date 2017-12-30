<div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?=ucfirst($this->uri->segment(1))?></h1>
            </div>
        </div>
        <div class="row">
           <div class="col-lg-12">

    <div class="bs-callout bs-callout-danger">
	<a href="<?=base_url().$this->uri->segment(1)?>/insert" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Tambah <?=ucfirst($this->uri->segment(1))?></a>
   	<hr style="margin-top:5px;margin-bottom:5px;">
	  <div class="table-responsive">
		<table class="table table-striped table-hover table-bordered">
		   <thead>
			<tr>
				<th class="tc">No</th>
				<th class="tc">Nama Banner</th>
				<th class="tc">Gambar Banner</th>
				<th class="tc">URL</th>
				<th class="tc">Posisi Banner</th>
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
				<td><?=$tp['banner_name']?></td>
				<td><img id="img_preview" height="60px" src="<?=base_url();?>statis/banner/<?=$tp['img'];?>" /></td>
				<td class="tc"><?=$tp['url']?></td>
				<td class="tc"><?=$tp['banner_post']?></td>
				<td class="tc">
					<a href="<?=base_url().$this->uri->segment(1)?>/edit/<?=$tp['id']?>" class="btn btn-primary btn-xs" title="edit"><span class="glyphicon glyphicon-pencil"></span></a>
				</td>
				<td class="tc">
					<a href="<?=base_url().$this->uri->segment(1)?>/delete/<?=$tp['id']?>" onClick="return confirm('Anda yakin ingin menghapus konten ini???')" class="btn btn-danger btn-xs" title="hapus"><span class="glyphicon glyphicon-trash"></span></a>
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