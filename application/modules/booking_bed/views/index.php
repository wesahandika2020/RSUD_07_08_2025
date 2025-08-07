<input type="hidden" id="page-now">
<div class="row">
	<div class="col-lg-12">
	<div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-6">
                        
						<?= form_button('tambah', '<i class="fas fa-plus-circle mr-1"></i>Tambah Booking Bed', 'id=btn-tambah-data class="btn btn-info waves-effect"') ?>
						<?= form_button('search', '<i class="fas fa-search mr-1"></i>Pencarian Data', 'id=btn-search-data class="btn btn-secondary waves-effect"') ?>
						<?= form_button('reset', '<i class="fas fa-history mr-1"></i>Reload Data', 'id=btn-reload-data class="btn btn-secondary waves-effect"') ?>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-end">
						<?= form_dropdown('status', $status, array('request'), 'class="form-control-sm col-lg-5" id=status') ?>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
					<table id="table-data" class="table table-hover table-striped table-sm color-table info-table">
						<thead>
							<tr>
								<th width="4%">No</th>
								<th width="7%">Waktu Pesan</th>
								<th width="5%">No RM</th>
								<th width="17%">Nama Pasien</th>
								<th width="20%">Alamat</th>
								<th width="7%">No. Telp</th>
								<th width="20%">Bed</th>
								<th width="7%">Petugas</th>
								<th width="5%" class="text-center">Ulang</th>
								<th width="5%" class="text-center">Status</th>
								<th width="5%"></th>
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