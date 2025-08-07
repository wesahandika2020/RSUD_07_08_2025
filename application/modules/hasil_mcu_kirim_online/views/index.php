<input type="hidden" id="page-now">
<div class="row">
    <div class="col-lg-12">
        <div class="card">
			<div class="card-header">
                <div class="row">
                    <div class="col-lg-6">
						<?= form_button('search', '<i class="fas fa-search mr-1"></i>Pencarian Data', 'id=btn-search class="btn btn-info waves-effect"') ?>
						<?= form_button('reset', '<i class="fas fa-history mr-1"></i>Reload Data', 'id=btn-reload class="btn btn-secondary waves-effect"') ?>
					</div>
                </div>
            </div>
            <div class="card-body">
				<div class="table-responsive m-b-10" id="parent">
					<table id="table-data" class="table table-hover table-striped table-sm color-table info-table">
						<thead>
							<tr>
								<th class="center">No</th>
								<th>No Registrasi</th>
								<th>Tgl Kunjungan</th>
								<th>Pasien</th>
								<th>Penjamin</th>
								<th>Dokter</th>
								<th width="20%">Diagnosa</th>
								<th>Status Terlayani</th>
								<th>Tindak Lanjut</th>
								<th>Keterangan</th>
								<th class="right"></th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
                </div>
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

<?php $this->load->view('js') ?>
<?php $this->load->view('modal') ?>
<?php $this->load->view('modal_pilih_file') ?>
<?php $this->load->view('modal_respon_eror') ?>