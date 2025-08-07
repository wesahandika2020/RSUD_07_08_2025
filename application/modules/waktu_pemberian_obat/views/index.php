<input type="hidden" name="page_now" id="page_now_waktu_pemberian_obat">
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col d-flex justify-content-start">
						<?= form_button('tambah', '<i class="fas fa-plus-square"></i> Tambah Aturan Pakai Obat', 'id=bt_tambah_waktu_pemberian_obat class="btn btn-info waves-effect"') ?>&nbsp;
						<?= form_button('reset', '<i class="fas fa-history"></i> Reload Data', 'id=bt_reload_data class="btn btn-secondary waves-effect"') ?>
					</div>
					<div class="col d-flex justify-content-end">
						<div class="custom-search">
							<input type="text" class="search-query-white" onkeyup="getListWaktuPemberianObat(1)" id="pencarian_waktu_pemberian_obat" placeholder="Pencarian ...">
							<button type="button"><span class="fas fa-search" aria-hidden="true"></span></button>
						</div>
					</div>
				</div>

				<div class="table-responsive">
					<table id="table_waktu_pemberian_obat" class="table table-hover table-striped table-sm color-table info-table m-t-5">
						<thead>
						<tr>
							<th width="5%" class="text-center">No</th>
							<th>Kode</th>
							<th>Timing</th>
							<th>Keterangan</th>
							<th></th>
						</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
				<div class="row">
					<div class="col">
						<div id="waktu_pemberian_obat_pagination" class="float-left"></div>
						<div id="waktu_pemberian_obat_summary" class="float-right text-sm"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('modal'); ?>
<?php $this->load->view('js'); ?>
