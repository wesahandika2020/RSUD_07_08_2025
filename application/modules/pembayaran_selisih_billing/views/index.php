<input type="hidden" name="page_now" id="page-now">
<div class="row">
    <div class="col-lg-12">
        <div class="card">
			<div class="card-header pattern">
                <div class="row">
                    <div class="col-lg-6">
						<?= form_button('add', '<i class="fas fa-plus-circle mr-1"></i>Tambah Pembayaran Lain', 'id=btn-add class="btn btn-info waves-effect mr-1"') ?>
						<?= form_button('search', '<i class="fas fa-search mr-1"></i>Pencarian Data', 'id=btn-search class="btn btn-secondary waves-effect mr-1"') ?>
						<?= form_button('reset', '<i class="fas fa-history mr-1"></i>Reload Data', 'id=btn-reload class="btn btn-secondary waves-effect"') ?>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-end">
						<?php  
							$buttonLabel = "Setting Unit Kasir";
							$onclickButton = 'onclick="settingUnitKasir()"';

							if ($this->session->userdata("unit_kasir") !== '') :
								$buttonLabel = $unit_kasir[$this->session->userdata("unit_kasir")];
							endif;
						?>
                        <button <?= $onclickButton ?> type="button" class="btn btn-secondary"><i class="fas fa-map-marker-alt mr-1"></i><?= $buttonLabel ?></button>
                    </div>
                </div>
            </div>
            <div class="card-body">
				<div class="table-responsive">
					<table id="table-data" class="table table-hover table-striped table-sm color-table info-table">
						<thead>
							<tr>
								<th width="3%" class="center">No.</th>
								<th width="10%" class="center">No. Kwitansi</th>
								<th width="8%" class="center">Waktu</th>
								<th width="6%" class="center">No. Register</th>
								<th width="6%" class="center">No. RM</th>
								<th width="20%" class="left">Nama Pasien</th>
								<th width="8%" class="center">Penjamin</th>
								<th width="10%" class="right">Billing (Rp)</th>
								<th width="10%" class="right">Selisih Billing (Rp)</th>
								<th width="14%" class="left">Keterangan</th>
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