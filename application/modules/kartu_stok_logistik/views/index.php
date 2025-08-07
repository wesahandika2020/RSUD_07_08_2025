<input type="hidden" name="page_now" id="page-now">
<div class="row">
    <div class="col-lg-12">
        <div class="card">
			<div class="card-header pattern">
                <div class="row">
                    <div class="col-lg-6">
						<?= form_button('search', '<i class="fas fa-search mr-1"></i>Pencarian Data', 'id=btn-search class="btn btn-info waves-effect"') ?>
						<?= form_button('reset', '<i class="fas fa-sync-alt mr-1"></i>Reload Data', 'id=btn-reload class="btn btn-secondary waves-effect"') ?>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-end">

                    </div>
                </div>
            </div>
            <div class="card-body">
				<div class="table-responsive">
					<table id="table-data" class="table table-hover table-striped table-sm color-table info-table">
						<thead>
							<tr class="header">
								<th width="3%" class=" wrapper center">No.</th>
								<th width="30%" class=" wrapper left">Nama Barang</th>
								<th width="8%" class=" wrapper center">Tanggal</th>
								<th width="8%" class=" wrapper right">Awal</th>
								<th width="8%" class=" wrapper right">Masuk</th>
								<th width="8%" class=" wrapper right">Keluar</th>
								<th width="10%" class=" wrapper right">Sisa</th>
								<th width="15%" class=" wrapper left">Satuan</th>
								<th width="10%" class=" wrapper center">HPP</th>
								<th width="15%" class=" wrapper center">Nilai Asset</th>
								<th width="5%" class=" wrapper center"></th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
				<div class="row mt-3">
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