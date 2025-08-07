<input type="hidden" id="page-now">
<input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran">
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-6">
                        <h6><i class="fas fa-hospital-alt m-t-10 m-r-10"></i>List Data Permintaan Kebidanan (<?= $this->session->userdata('unit') ?>)</h6>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-end">
                        <?= form_dropdown('status', $status, array('request'), 'class="custom-select col-lg-3 mr-1" id=status') ?>
                        <?= form_button('search', '<i class="fas fa-search mr-1"></i>Pencarian Data', 'id=btn-search-data class="btn btn-info waves-effect mr-1"') ?>
                        <?= form_button('reset', '<i class="fas fa-history mr-1"></i>Reload Data', 'id=btn-reload-data class="btn btn-secondary waves-effect"') ?>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
					<table id="table-data" class="table table-hover table-striped table-sm color-table info-table">
						<thead>
							<tr>
								<th class="wrapper">No</th>
								<th class="wrapper">Waktu Order</th>
								<th class="wrapper">No Register</th>
								<th class="wrapper">No RM</th>
								<th class="wrapper" width="20%">Nama Pasien</th>
								<th class="wrapper" class="wrapper">Kelamin</th>
								<th class="wrapper" width="15%">Dokter Pengirim</th>
								<th class="wrapper" width="15%">Asal</th>
								<th class="wrapper">Bangsal Tujuan</th>
								<th class="wrapper center" width="13%">Status</th>
								<th class="wrapper" width="15%"></th>
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
<?php $this->load->view('bed_form') ?>
<?php $this->load->view('modal') ?>
