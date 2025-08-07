<input type="hidden" name="page_now" id="page-now">
<div class="row" id="warp-notifikasi-dpjp">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col d-flex justify-content-end">
						<?= form_button('reset', '<i class="fas fa-sync-alt mr-1"></i>Reload Data', 'id=btn-reload class="btn btn-secondary waves-effect mr-2"') ?>
						<?= form_button('search', '<i class="fas fa-search"></i> Pencarian', 'id=bt-search class="btn btn-secondary waves-effect"') ?>
						<!-- <input type="hidden" name="estimasi" id="estimasi-antrian"> -->
					</div>
				</div>

				<table id="table-notifikasi-dpjp" class="table table-hover table-striped table-sm color-table info-table m-t-5">
					<thead>
						<tr>
							<th class="center">No.</th>
							<th class="center">Tanggal</th>
							<th class="center">Nama Dokter</th>
							<th class="center">Nomor Telepon Dokter</th>
							<th class="center">Status Kirim</th>
							<th class="center">Action</th>
						</tr>
					</thead>
					<tbody></tbody>
				</table>

				<div class="row">
					<div class="col">
						<div id="pagination-notif-dpjp" class="float-left"></div>
						<div id="summary-notif-dpjp" class="float-right text-sm"></div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>

<?php $this->load->view('modal'); ?>
<?php $this->load->view('js'); ?>
