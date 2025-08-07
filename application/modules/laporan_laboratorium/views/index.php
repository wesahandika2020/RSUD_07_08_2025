<input type="hidden" name="page_now" id="page-now">
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header pattern">
				<div class="row">
					<div class="col-lg-8">
						<?= form_dropdown('jenis_laporan', $jenis_laporan, array(), 'name="jenis_laporan" class="form-control form-control-sm mr-1" style="width:100%" id=jenis-laporan') ?>
					</div>
					<div class="col-lg-4 d-flex justify-content-end">
						<?= form_button('export', '<i class="fas fa-download mr-1"></i>Export Data', 'id=btn-export class="btn btn-success waves-effect mr-1"') ?>
						<?= form_button('search', '<i class="fas fa-search mr-1"></i>Parameter Laporan', 'id=btn-search class="btn btn-info waves-effect mr-1"') ?>
						<?= form_button('reset', '<i class="fas fa-history mr-1"></i>Reload Data', 'id=btn-reload class="btn btn-secondary waves-effect mr-1"') ?>
					</div>
				</div>
			</div>

			<?php $this->load->view('lap_rekap_data/index.php') ?>
		
		</div>
	</div>
</div>

<?php $this->load->view('js') ?>
<?php $this->load->view('lap_rekap_data/modal') ?>

