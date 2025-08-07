<input type="hidden" name="page_now" id="page-now">
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header pattern">
				<div class="row">
					<div class="col-lg-8">
						<?= form_dropdown('jenis_laporan', $jenis_laporan, array(), 'name="jenis_laporan" class="form-control form-control-sm mr-1" style="width:100%" id=jenis-laporan') ?>
					</div>
					<div class="col-lg-4 d-flex justify-content-end">
						<?= form_button('export', '<i class="fas fa-download mr-1"></i>Export Data', 'id=btn-export class="btn btn-success waves-effect mr-1"') ?>
						<?= form_button('search', '<i class="fas fa-search mr-1"></i>Kriteria Laporan', 'id=btn-search class="btn btn-info waves-effect mr-1"') ?>
						<?= form_button('reset', '<i class="fas fa-history mr-1"></i>Reload Data', 'id=btn-reload class="btn btn-secondary waves-effect mr-1"') ?>
					</div>
				</div>
			</div>
			<div class="card-body lap-01">
				<div></div>
					<h5 style="text-transform: uppercase;" class="center"><b>LAPORAN RESEP RAWAT JALAN Lebih dari Rp 50.000,-</b></h5>
    				<div id=label-lap-01 class="lef"></div>
					<table style="overflow-x: scroll;" id="table-data-01" class="table table-hover table-striped table-sm color-table info-table">
				</table>
				<div class="col">
					<div id="pagination_01" class="float-left"></div>
					<div id="summary_01" class="float-right text-sm"></div>
				</div>
			</div>
			<div class="card-body lap-02">
				<div></div>
					<h5 style="text-transform: uppercase;" class="center"><b>LAPORAN DOKTER OPERASI</b></h5>
    				<div id=label-lap-02 class="lef"></div>
					<table style="overflow-x: scroll;" id="table-data-02" class="table table-hover table-striped table-sm color-table info-table">
				</table>
				<div class="col">
					<div id="pagination_02" class="float-left"></div>
					<div id="summary_02" class="float-right text-sm"></div>
				</div>
			</div>
			<div class="card-body lap-03">
				<div></div>
					<h5 style="text-transform: uppercase;" class="center"><b>LAPORAN DPJP RAWAT INAP</b></h5>
    				<div id=label-lap-03 class="lef"></div>
					<table style="overflow-x: scroll;" id="table-data-03" class="table table-hover table-striped table-sm color-table info-table">
				</table>
				<div class="col">
					<div id="pagination_03" class="float-left"></div>
					<div id="summary_03" class="float-right text-sm"></div>
				</div>
			</div>
			<div class="card-body lap-04">
				<div></div>
					<h5 style="text-transform: uppercase;" class="center"><b>LAPORAN Catatan Perkembangan Pasien Terintegrasi (CPPT)</b></h5>
    				<div id=label-lap-04 class="lef"></div>
					<table style="overflow-x: scroll;" id="table-data-04" class="table table-hover table-striped table-sm color-table info-table">
				</table>
				<div class="col">
					<div id="pagination_04" class="float-left"></div>
					<div id="summary_04" class="float-right text-sm"></div>
				</div>
			</div>
			<div class="card-body lap-05">
				<div></div>
				<h5 style="text-transform: uppercase;" class="center"><b>Laporan Laboratorium Rawat Jalan Lebih dari Rp 100.000,-</b></h5>
				<div id=label-lap-05 class="lef"></div>
				<div class="table-responsive  m-t-10" id="parent">
					<table style="overflow-x: scroll;" id="table-data-05" class="table table-hover table-striped table-bordered table-sm color-table info-table"></table>
				</div>
			</div>
			<div class="card-body lap-06">
				<div></div>
					<h5 style="text-transform: uppercase;" class="center"><b>Laporan Rata-Rata Waktu Boocin (Booking Checkin) Rajal</b></h5>
    				<div id=label-lap-06 class="lef"></div>
					<table style="overflow-x: scroll;" id="table-data-06" class="table table-hover table-striped table-sm color-table info-table">
				</table>
				<div class="col">
					<div id="pagination_06" class="float-left"></div>
					<div id="summary_06" class="float-right text-sm"></div>
				</div>
			</div>
					
		</div>
	</div>
</div>

<?php $this->load->view('js') ?>
<?php $this->load->view('modal') ?>