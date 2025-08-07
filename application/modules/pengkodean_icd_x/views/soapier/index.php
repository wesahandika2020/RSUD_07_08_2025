<input type="hidden" id="page-soapier">
<div class="row">	
	<div class="col-lg-12 mt-2">
		<div class="table-responsive">
			<table id="table-data-soapier" class="table table-hover table-sm color-table info-table">
				<thead>
					<tr>
						<th colspan="6" class="center" style="background-color:#00a5ab">DATA SOAPIER
						</th>
					</tr>
					<tr>
						<th width="15%" class="center">Tanggal</th>
						<th width="25%" class="center">Nama Dokter / Perawat</th>
						<th width="15%" class="center">S</th>
						<th width="15%" class="center">O</th>
						<th width="15%" class="center">A</th>
						<th width="15%" class="center">P</th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
		<div class="row">
			<div class="col">
				<div id="pagination-soapier" class="float-left"></div>
				<div id="summary-soapier" class="float-right text-sm"></div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('soapier/js') ?>
