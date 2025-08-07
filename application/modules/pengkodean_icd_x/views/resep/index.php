<input type="hidden" id="page-resep">
<div class="row">
	<div class="col-lg-12 mt-2">
		<div class="table-responsive" style="overflow-x:auto;">
			<table id="table-data-resep" class="table table-hover table-striped table-sm color-table info-table">
				<thead>
					<tr>
						<th colspan="4" class="center" style="background-color:#00a5ab">DATA RESEP
						</th>
					</tr>
					<tr>
						<th width="15%" class="center">No Resep</th>
						<th width="25%" class="center">Tanggal</th>
						<th width="15%" class="center">Apotek</th>
						<th width="15%" class="center">Status</th>						
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
		<div class="row">
			<div class="col">
				<div id="pagination-resep" class="float-left"></div>
				<div id="summary-resep" class="float-right text-sm"></div>
			</div>
		</div>
	</div>
	<div class="col-lg-12 mt-2">
		<div class="table-responsive" style="overflow-x:auto;">
			<table id="table-data-obat" class="table table-hover table-striped table-sm color-table info-table">
				<thead>
					<tr>
						<th colspan="6" class="center" style="background-color:#00a5ab">DATA OBAT DALAM RESEP
						</th>
					</tr>
					<tr>
						<th width="15%" class="center">Nama Obat</th>
						<th width="25%" class="center">Jumlah</th>
						<th width="15%" class="center">Racikan</th>
						<th width="15%" class="center">Dosis</th>
						<th width="15%" class="center">Dokter</th>
						<th width="15%" class="center">Stok</th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
		<div class="row">
			<div class="col">
				<div id="pagination-obat" class="float-left"></div>
				<div id="summary-obat" class="float-right text-sm"></div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('js') ?>
