<input type="hidden" name="page_now" id="page-now">
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header pattern">
				<div class="row">
					<div class="col-lg-6">
						<?= form_button('search', '<i class="fas fa-search mr-1"></i>Parameter Pencarian', 'id=btn-search class="btn btn-info waves-effect mr-1"') ?>
						<?= form_button('reset', '<i class="fas fa-history mr-1"></i>Reload Data', 'id=btn-reload class="btn btn-secondary waves-effect mr-1"') ?>
					</div>
					<div class="col-lg-6 d-flex justify-content-end">
						<?= form_button('export', '<i class="fas fa-download mr-1"></i>Export Data', 'id=btn-export class="btn btn-success waves-effect mr-1"') ?>
					</div>
				</div>
			</div>

			<div class="card-body lap-rehab-medik">
				<div class="center">
					<h5 style="text-transform: uppercase;"><b>LAPORAN REHAB MEDIK</b></h5>
					<p id=jenis-periode-rehab-medik>Periode : Februari 2023</p>
				</div>
				<div class="table-responsive  m-t-10" id="parent">
					<table id="table-lap-rehab-medik" class="table table-hover table-striped table-bordered table-sm color-table info-table">
						<thead>
							<tr style="top: 0;">
								<th class="center">No.</th>
								<th class="center">Nomor RM</th>
								<th class="left">Nama Pasien</th>
								<th class="center">Layanan</th>
								<th class="center">Diagnosa</th>
								<th class="center">Operator</th>
								<th class="center">Profesi</th>
							</tr>
						</thead>
						<tbody style="overflow:scroll;"></tbody>
						<tfoot style="overflow:scroll;"></tfoot>
						<!-- <tfoot></tfoot> -->
					</table>
				</div>
				<div class="row lap-rehab-medik m-t-10">
					<div class="col">
						<div id="pagination" class="float-left"></div>
						<div id="summary" class="float-right text-sm"></div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

<?php $this->load->view('modal') ?>
<?php $this->load->view('js') ?>