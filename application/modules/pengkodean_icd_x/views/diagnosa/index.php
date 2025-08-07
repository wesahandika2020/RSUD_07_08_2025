<input type="hidden" id="page-diagnosa">
<div class="row">
	<div class="col-lg-12 mt-2">
		<div class="table-responsive" style="overflow-x:auto;">
			<table id="table-data-diagnosa" class="table table-hover table-striped table-sm color-table info-table">
				<thead>
					<tr>
						<th colspan="10" class="center" style="background-color:#00a5ab">DATA DIAGNOSA PASIEN
						</th>
					</tr>
					<tr>
						<th width="15%" class="center">Tanggal</th>
						<th width="25%" class="center">Diagnosa</th>
						<th width="15%" class="center">ICD-10[RM]</th>
						<th width="15%" class="center">Dokter</th>
						<th width="15%" class="center">Coder</th>
						<th width="15%" class="center">Prioritas</th>
						<th width="15%" class="center">Akhir</th>
						<th width="15%" class="center">Klinis</th>
						<th width="15%" class="center">Banding</th>
						<th width="15%" class="center"></th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
		<div class="row">
			<div class="col">
				<div id="pagination-diagnosa" class="float-left"></div>
				<div id="summary-diagnosa" class="float-right text-sm"></div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('diagnosa/js') ?>
