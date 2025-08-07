<input type="hidden" name="page_now" id="page-now">
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header" style="background-image: linear-gradient(to right, #E3E3E3 , #F7F7F7);">
                <div class="row">
                    <div class="col-lg-6">
						<?= form_button('add', '<i class="fas fa-plus-circle mr-1"></i>Tambah Data', 'id=btn-tambah class="btn btn-info waves-effect mr-1"') ?>
						<?= form_button('search', '<i class="fas fa-search mr-1"></i>Pencarian Data', 'id=btn-search class="btn btn-secondary waves-effect mr-1"') ?>
						<?= form_button('reset', '<i class="fas fa-history mr-1"></i>Reload Data', 'id=btn-reload class="btn btn-secondary waves-effect"') ?>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-end">
						<div class="custom-search">
                            <input type="text" class="search-query-white" onkeyup="getListDeposit(1)" id="pencarian-nama-pasien" placeholder="Pencarian Nama...">
                            <button type="button"><span class="fas fa-search" aria-hidden="true"></span></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
				<div class="row">
					<div class="col-lg-9">
						<div class="table-responsive">
							<table id="table-data" class="table table-hover table-striped table-sm color-table info-table">
								<thead>
									<tr>
										<th width="5%" class="center">No.</th>
										<th width="13%" class="left">Waktu</th>
										<th width="7%" class="left">No. RM</th>
										<th width="20%" class="left">Pasien</th>
										<th width="12%" class="right">Masuk (Rp)</th>
										<th width="12%" class="right">Keluar (Rp)</th>
										<th width="20%" class="left">Keterangan</th>
										<th width="6%" class="left">User</th>
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
					<div class="col-lg-3">
						<table id="table-summary" class="table table-hover table-striped table-sm color-table info-table">
							<thead>
								<tr>
									<th class="left" width="70%">Item</th>
									<th class="right" width="30%">Nominal</th>
								</tr>
							</thead>
							<tbody></tbody>
						</table>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('js') ?>
<?php $this->load->view('modal') ?>