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
				<h5 style="text-transform: uppercase;" class="center"><b>Laporan Pendapatan Berdasarkan Layanan Dokter DPJP</b></h5>
				<div id=label-lap-01 class="left"></div>
				<div class="row" id='table-data-01'></div>
			</div>		
			<div class="card-body lap-02">
				<div></div>
				<h5 style="text-transform: uppercase;" class="center"><b>Laporan Pendapatan Berdasarkan Layanan Dokter RABER</b></h5>
				<div id=label-lap-02 class="left"></div>
				<div class="row" id='table-data-02'></div>
			</div>			
			<div class="card-body lap-03">
				<div></div>
				<h5 style="text-transform: uppercase;" class="center"><b>Laporan Pendapatan Berdasarkan Layanan Selain Dokter Spesialis dan Umum</b></h5>
				<div id=label-lap-03 class="left"></div>
				<div class="row" id='table-data-03'></div>
			</div>			
			<div class="card-body lap-04">
				<div></div>
				<h5 style="text-transform: uppercase;" class="center"><b>Laporan Pendapatan Berdasarkan Layanan Penunjang</b></h5>
				<div id=label-lap-04 class="left"></div>
				<div class="row" id='table-data-04'></div>
			</div>	
			<div class="card-body lap-05">
				<div></div>
				<h5 style="text-transform: uppercase;" class="center"><b>Laporan Kunjungan Rawat Inap</b></h5>
				<div id=label-lap-05 class="left"></div>
				<div class="row" id='table-data-05'></div>
			</div>	
		</div>
	</div>
</div>

<?php $this->load->view('js') ?>
<?php $this->load->view('modal') ?>