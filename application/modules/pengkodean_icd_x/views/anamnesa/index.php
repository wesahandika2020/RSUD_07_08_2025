<input type="hidden" id="page-anamnesa">
<div class="row">
	<div class="col-lg-12 mt-2">
		<div class="table-responsive" style="overflow-x:auto;">
			<table id="table-data-anamnesa" class="table table-hover table-sm color-table info-table">
				<thead>
					<tr>
						<th colspan="2" class="center" style="background-color:#00a5ab">DATA ANAMNESA
						</th>
					</tr>
					<tr>
						<th width="15%" class="center">Tanggal</th>
						<th width="25%" class="center">Dokter</th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
		<div class="row">
			<div class="col">
				<div id="pagination-anamnesa" class="float-left"></div>
				<div id="summary-anamnesa" class="float-right text-sm"></div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('anamnesa/js') ?>
