<input type="hidden" name="page-now-kunjungan-pasien" id="page-now-kunjungan-pasien">
<input type="hidden" name="id-pendaftaran" id="id-pendaftaran">
<input type="hidden" name="id-layanan-pendaftaran" id="id-layanan-pendaftaran">
<div class="row">
	<div class="col-lg-12">
		<div class="card shadow-sm">
			<div class="card-header pattern">
				<div class="row">
					<div class="col-lg-6">
						<?= form_button('search', '<i class="fas fa-search mr-1"></i>Pencarian Data', 'id=btn-search class="btn btn-info waves-effect mr-1"') ?>
						<?= form_button('reset', '<i class="fas fa-history mr-1"></i>Reload Data', 'id=btn-reload class="btn btn-secondary waves-effect"') ?>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="table-data-kunjungan-pasien" class="table table-sm color-table info-table">
						<thead>							
							<tr>
								<th width="20%" class="center">Tanggal Kunjungan</th>								
								<th width="25%" class="center">No. RM</th>
								<th width="45%" class="center">Nama</th>															
								<th width="10%" class="center"></th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
				<div class="row">
					<div class="col">
						<div id="paginationKunjunganPasien" class="float-left"></div>
						<div id="summaryKunjunganPasien" class="float-right text-sm"></div>
					</div>
				</div>				
			</div>
		</div>
	</div>
</div>

<?php 
	$this->load->view('js');
	$this->load->view('modal'); 	
?>
