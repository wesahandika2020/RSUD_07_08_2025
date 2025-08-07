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

			<div class="card-body lap-layanan-tenaga-medis">
				<div class="center">
					<h5 style="text-transform: uppercase;"><b>LAPORAN LAYANAN PER PASIEN</b></h5>
					<p id="jenis-periode-cb">Periode : </p>
				</div>
				<div class="table-responsive  m-t-10" id="parent">
					<table id="table-lap-layanan-tenaga-medis" class="table-freeze table table-hover table-striped table-sm color-table info-table">
						<thead>
							<tr style="top: 0;">
								<th class="center">No.</th>
								<th class="center">No.RM</th>
								<th class="left">Nama Pasien</th>
								<th class="center">Tanggal Daftar</th>
								<th class="center">
									<div style="display: flex;justify-content: center">
										<button class="btn btn-info btn-xs mr-1 float-left" type="button" aria-expanded="false" id="btn-expand-all"><i class="fas fa-fw fa-expand mr-1"></i>Expand All</button>
									</div>
								</th>
							</tr>
						</thead>
						<tbody style="overflow:scroll;">
						</tbody>
						<tfoot style="overflow:scroll;">
						</tfoot>
					</table>
				</div>
				<div class="row lap-kasir m-t-10">
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
