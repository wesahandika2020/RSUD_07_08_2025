<input type="hidden" name="page_now" id="page-now">

<div class="row"  id="warp-call-recall-farmasi">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col d-flex justify-content-start">
						<?= form_button('reset', '<i class="fas fa-sync-alt mr-1"></i>Reload Data', 'id=btn-reload class="btn btn-secondary waves-effect"') ?>
						<?= form_button('search', '<i class="fas fa-search"></i> Pencarian', 'id=bt-search class="btn btn-secondary waves-effect"') ?>
						<?= form_dropdown('jenis-antrian', ['' => 'Semua', 'a' => 'A', 'b' => 'B', 'c' => 'C'], '', 'id=jenis-antrian class="form-control col-1"') ?>
					</div>
				</div>

				<!-- <div class="table-responsive"> -->
				<table id="table-panggil-pasien" class="table table-hover table-striped table-sm color-table info-table m-t-5">
					<h4 class="modal-title float-right" id="panggil-pasien-label"></h4>
					<h4 class="modal-title center"><b>CALL / RECALL PASIEN FARMASI</b></h4>
					<thead>
					<tr>
						<th class="center">No.</th>
						<th class="center">No.Rm</th>
						<th class="center">Nomor Antrean</th>
						<th class="center">Nama Poli</th>
						<th class="left">Dokter</th>
						<th class="center">Loket</th>
						<th class="center">Status Panggilan</th>
						<th class="right"></th>
					</tr>
					</thead>
					<tbody ></tbody>
				</table>
				<!-- </div> -->
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

<?php $this->load->view('modal'); ?>
<?php $this->load->view('modal_search'); ?>
<?php $this->load->view('js_call_recall'); ?>
