<input type="hidden" name="page_now" id="page-now">
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header" style="background-image: linear-gradient(to right, #E3E3E3 , #F7F7F7);">
				<div class="row">
					<div class="col-lg-6">
						<?= form_button('search', '<i class="fas fa-search mr-1"></i>Pencarian Data', 'id=btn-search class="btn btn-info waves-effect mr-1"') ?>
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
						<?php if ($this->session->userdata("account_group") !== 'Casemix') : ?>
							<button <?= $onclickButton ?> type="button" class="btn btn-secondary"><i class="fas fa-map-marker-alt mr-1"></i><?= $buttonLabel ?></button>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="table-data" class="table table-hover table-striped table-sm color-table info-table">
						<thead>
							<tr>
								<th width="13%" class="center">Waktu Daftar</th>
								<th wdith="7%" class="center">No. Reg</th>
								<th width="6%" class="center">No. RM</th>
								<th width="20%">Nama Pasien</th>
								<th width="15%">Layanan</th>
								<th width="10%" class="center">Status Terlayani</th>
								<th width="10%" class="center">Cara Bayar</th>
								<th width="13%" class="center">Kunjungan</th>
								<th width="10%" class="center">Status</th>
								<!-- <th width="10%" class="center">Petugas</th> -->
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
<?php $this->load->view('keuangan/pembayaran_form/modal') ?>