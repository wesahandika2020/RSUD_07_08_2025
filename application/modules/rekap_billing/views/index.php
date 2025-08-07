<input type="hidden" name="page_now" id="page-now">
<div class="row">
    <div class="col-lg-12">
        <div class="card">
			<div class="card-header pattern">
                <div class="row">
                    <div class="col-lg-6">
						<?= form_button('search', '<i class="fas fa-search mr-1"></i>Pencarian Data', 'id=btn-search class="btn btn-info waves-effect mr-1"') ?>
						<?= form_button('reset', '<i class="fas fa-history mr-1"></i>Reload Data', 'id=btn-reload class="btn btn-secondary waves-effect"') ?>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-end">
						<div id="status-cco"> </div>
						<?= form_dropdown('jenis_layanan', $jenis_layanan, array(), 'class="form-control form-control-sm mr-1" style="width:30%" id=jenis-layanan') ?>
                        <input type="text" name="keyword" id="keyword-search" class="form-control form-control-sm" style="width:30%" placeholder="Nama / No. RM...">
                    </div>
                </div>
            </div>
            <div class="card-body">
				<div class="table-responsive">
					<table id="table-data" class="table table-hover table-striped table-sm color-table info-table">
						<thead>
							<tr>
								<th width="3%" class="center">No.</th>
								<th width="7%" class="center">No. Register</th>
								<th width="9%" class="center">Tanggal Daftar</th>
								<th width="6%" class="center">No. RM</th>
								<th width="18%" class="left">Nama</th>
								<th width="15%" class="left">Layanan</th>
								<th width="8%" class="center">Status Terlayani</th>
								<th width="8%" class="center">Cara Bayar</th>
								<th width="10%" class="right">Tagihan</th>
								<th width="10%" class="center">Status</th>
								<th width="5%" class="right"></th>
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
<?php $this->load->view('keuangan/ubah_cara_bayar_form/modal') ?>
<?php $this->load->view(DIR_VCLAIM . 'modal_vclaim_form'); ?>