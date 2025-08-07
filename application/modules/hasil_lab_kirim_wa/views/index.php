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
				<input type="hidden" id="akun-id-unit">
				<input type="hidden" id="akun-akses">
				<div class="table-responsive m-b-10" id="parent">
					<table id="table-data" class="table table-hover table-striped table-sm color-table info-table">
						<thead>
							<tr style="height: 40px;">
								<th class="center">No</th>
								<th class="nowrap">Kunjungan</th>
								<th>Pasien</th>
								<th>Data Kirim</th>
								<th>Layanan</th>
								<th>Jenis Lab</th>
								<th>Tgl Layanan</th>
								<th>Kode Lab</th>
								<th>Kirim</th>
								<th width="20%">Tindakan</th>
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