<input type="hidden" id="page-now">
<div class="row">
    <div class="col-lg-12">
        <div class="card">
			<div class="card-header pattern">
                <div class="row">
					<div class="col-lg-6">
						<?= form_button('search', '<i class="fas fa-search mr-1"></i>Pencarian Data', 'id=btn-search class="btn btn-info waves-effect"') ?>
						<?= form_button('reset', '<i class="fas fa-sync-alt mr-1"></i>Reload Data', 'id=btn-reload class="btn btn-secondary waves-effect"') ?>
					</div>
					<div class="col-lg-6 d-flex justify-content-end">
						
					</div>
                </div>
            </div>
            <div class="card-body">
				<!-- <div class="table-responsive"> -->
					<table id="table-data" class="table table-hover table-striped table-sm color-table info-table">
						<thead>
							<tr>
								<th width="3%" class="center">No</th>
								<th width="10%" class="center">Waktu Order</th>
								<th width="7%" class="left">No. RM</th>
								<th width="40%" class="left">Nama Pasien</th>
								<th width="10%" class="center">Asal Pasien</th>
								<th width="7%" class="center">Status</th>
								<th width="2%" class="center"></th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				<!-- </div> -->
				<div class="row">
					<div class="col">
						<div id="pagination" class="float-left"></div>
						<div id="summary" class="float-right text-sm"></div>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('order_vk/js') ?>
<?php $this->load->view('order_vk/modal') ?>
<?php $this->load->view('pelayanan/radiologi_form/modal-radiologi-form') ?>
<?php $this->load->view('pelayanan/laboratorium_form/modal-laboratorium-form') ?>
<?php $this->load->view('pelayanan/operasi_form/modal_operasi_form'); ?>
<?php $this->load->view('pelayanan/cppt_form/modal_cppt') ?>
<?php $this->load->view('pasien/riwayat/modal_riwayat') ?>
<?php $this->load->view('pasien/rekam_medis/modal_rekam_medis') ?>

<!-- RS CLOUD -->
<?php $this->load->view('cloud_rsud/modal_upload_file_rm') ?>
<?php $this->load->view('cloud_rsud/js') ?>