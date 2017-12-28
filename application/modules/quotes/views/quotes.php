	<!--BODY-->
	<div class="container-fluid">
		<div class="well" style="margin-top:60px;margin-bottom:20px;">
			<h3><?=ucfirst($this->uri->segment(1))?> </h3>
			<div class="bs-callout bs-callout-danger" style="margin:10px 0px 0px 0px">
				<a href="<?=base_url().$this->uri->segment(1)?>/insert" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Tambah <?=ucfirst($this->uri->segment(1))?></a>
				<hr style="margin-top:5px;margin-bottom:5px;">

				<div class="table-responsive">
					<table class="table table-striped table-hover table-bordered">
						<thead>
							<tr>
								<th class="tc">Tanggal</th>
								<th class="tc">Quotes</th>
								<th class="tc">Dari</th>
								<th class="tc">Publish</th>
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
							<td class="tc"><?=date('d/m/Y - H:i',strtotime($tp['tanggal']))?></td>
							<td><?=$tp['quote']?></td>
							<td><?=$tp['dari']?></td>
							<td class="tc"><?=($tp['publish'] == '1' ? '<span class="glyphicon glyphicon-check"></span>' : '') ?></td>
							<td class="tc">
								<a href="<?=base_url().$this->uri->segment(1)?>/edit/<?=$tp['id']?>/<?=url_title($tp['quote'],'-',TRUE)?>" class="btn btn-primary btn-xs" title="edit"><span class="glyphicon glyphicon-pencil"></span></a>
							</td>
							<td class="tc">
								<a href="<?=base_url().$this->uri->segment(1)?>/delete/<?=$tp['id']?>/<?=url_title($tp['quote'],'-',TRUE)?>" onClick=\'return confirm("Anda yakin ingin menghapus konten ini???")\' class="btn btn-danger btn-xs" title="hapus"><span class="glyphicon glyphicon-trash"></span></a>
							</td>
						</tr>
						<?
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
	<!--BODY-->

