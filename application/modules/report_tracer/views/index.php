<style>
	.page-wrapper {
		background-color: white !important;
	}
</style>
<div class="row">
	<div class="col-md-3">
		<!-- info box -->
		<div class="info-box bg-aqua shadow">
			<span class="info-box-icon"><i class="fa fa-history"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Order / Pending</span>
				<span class="info-box-number info_num_berkas" id="order_count">0</span>
				<div class="progress">
					<div class="progress-bar" id="order_bar_percen"></div>
				</div>
				<span class="progress-description">
					<span id="order_percen" class="info_persen_berkas mr-1"></span>dari kunjungan hari ini
				</span>
			</div>
		</div>
		<!-- end info box -->
	</div>
	<div class="col-md-3">
		<!-- info box -->
		<div class="info-box bg-green shadow">
			<span class="info-box-icon"><i class="fa fa-check"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Ready</span>
				<span class="info-box-number info_num_berkas" id="ready_count">0</span>
				<div class="progress">
					<div class="progress-bar" id="ready_bar_percen"></div>
				</div>
				<span class="progress-description">
					<span id="ready_percen" class="info_persen_berkas mr-1"></span>dari kunjungan hari ini
				</span>
			</div>
		</div>
		<!-- end info box -->
	</div>
	<div class="col-md-3">
		<!-- info box -->
		<div class="info-box bg-orange shadow">
			<span class="info-box-icon"><i class="fa fa-shopping-cart"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Distributed</span>
				<span class="info-box-number info_num_berkas" id="dist_count">0</span>
				<div class="progress">
					<div class="progress-bar" id="dist_bar_percen"></div>
				</div>
				<span class="progress-description">
					<span id="dist_percen" class="info_persen_berkas mr-1"></span>dari kunjungan hari ini
				</span>
			</div>
		</div>
		<!-- end info box -->
	</div>
	<div class="col-md-3">
		<!-- info box -->
		<div class="info-box bg-red shadow">
			<span class="info-box-icon"><i class="fa fa-stop"></i></span>
			<div class="info-box-content">
				<span class="info-box-text">Returned</span>
				<span class="info-box-number info_num_berkas" id="return_count">0</span>
				<div class="progress">
					<div class="progress-bar" id="return_bar_percen"></div>
				</div>
				<span class="progress-description">
					<span id="return_percen" class="info_persen_berkas mr-1"></span>dari kunjungan hari ini
				</span>
			</div>
		</div>
		<!-- end info box -->
	</div>
</div>

<!-- Ready Average BRM -->
<div class="row">
	<div class="col-md-7">
		<div class="box-me shadow">
			<div class="box-me-header with-border">
				<h5 class="box-me-title"><i class="fas fa-chart-area mr-2"></i>Rata - Rata Waktu Penyediaan Berkas Rekam Medik (BRM)</h5>
				<div class="box-me-tools pull-right">
					<!-- <button class="btn btn-box-me-tool"><i class="fas fa-print"></i></button> -->
				</div>
			</div><!-- /.box-me-header -->
			<div class="box-me-body">
				<div id="area-average-ready"></div>
			</div><!-- ./box-me-body -->
			<div class="box-me-footer">
			</div><!-- /.box-me-footer -->
		</div><!-- /.box-me -->
	</div>
	<div class="col-md-5">
		<div class="box-me shadow">
			<div class="box-me-header with-border">
				<h5 class="box-me-title"><i class="fas fa-table mr-2"></i>List Rata - Rata Waktu Penyediaan Berkas Rekam Medik (BRM)</h5>
				<div class="box-me-tools pull-right">
					<!-- <button class="btn btn-box-me-tool" title="Klik untuk mencetak list rata - rata waktu penyediaan BRM" onclick="cetakAverageBRM()"><i class="fas fa-print"></i></button> -->
				</div>
			</div><!-- /.box-me-header -->
			<div class="box-me-body">
				<form class="form-inline">
					<div class="form-group">
						<label for="tanggal-awal">Tanggal Awal</label>
						<input type="text" name="tanggal_awal" id="tanggal-awal-avg" class="form-control" placeholder="Tanggal Awal">
					</div>
					<div class="form-group">
						<label for="tanggal-akhir">Tanggal Akhir</label>
						<input type="text" name="tanggal_akhir" id="tanggal-akhir-avg" class="form-control" placeholder="Tanggal Akhir">
					</div>
					<div class="form-group">
						<label for="btn-search">&nbsp;</label>
						<button type="button" class="btn btn-info" onclick="getListDataAverageReadyBRM(1)"><i class="fas fa-search"></i></button>
					</div>
				</form>
				<div class="table-responsive mt-2">
					<table id="table-data-average-ready-brm" class="table table-hover table-striped table-sm color-table info-table">
						<thead>
							<tr class="header">
								<th width="3%" class="wrapper center">No.</th>
								<th width="8%" class="wrapper left">Tanggal</th>
								<th width="89%" class="wrapper left">Lama Waktu</th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
				<div class="row">
					<div class="col-md-12">
						<input type="hidden" id="page-average-ready">
						<div id="pagination-average-ready" class="float-left"></div>
						<div id="summary-average-ready" class="float-right text-sm"></div>
					</div>
				</div>	
			</div><!-- ./box-me-body -->
			<div class="box-me-footer">
			
			</div><!-- /.box-me-footer -->
		</div><!-- /.box-me -->
	</div>
</div>
<!-- End Ready Average BRM -->

<!-- In Out BRM  -->
<div class="row">
	<div class="col-md-7">
		<div class="box-me shadow">
			<div class="box-me-header with-border">
				<h5 class="box-me-title"><i class="fas fa-table mr-2"></i>Laporan Keluar Masuk Berkas Rekam Medik (BRM)</h5>
				<div class="box-me-tools pull-right">
					<!-- <button class="btn btn-box-me-tool" title="Klik untuk mencetak list berkas keluar masuk" onclick="cetakInOutBRM()"><i class="fas fa-print"></i></button> -->
				</div>
			</div><!-- /.box-me-header -->
			<div class="box-me-body">
				<form class="form-inline">
					<div class="form-group">
						<label for="tanggal-awal">Tanggal Awal</label>
						<input type="text" name="tanggal_awal" id="tanggal-awal-inout" class="form-control" placeholder="Tanggal Awal">
					</div>
					<div class="form-group">
						<label for="tanggal-akhir">Tanggal Akhir</label>
						<input type="text" name="tanggal_akhir" id="tanggal-akhir-inout" class="form-control" placeholder="Tanggal Akhir">
					</div>
					<div class="form-group">
						<label for="btn-search">&nbsp;</label>
						<button type="button" class="btn btn-info" onclick="getListDataInOutBRM(1)"><i class="fas fa-search"></i></button>
					</div>
				</form>
				<div class="table-responsive mt-2">
					<table id="table-data-inout-brm" class="table table-hover table-striped table-sm color-table info-table">
						<thead>
							<tr class="header">
								<th width="10%" class="wrapper center">No.</th>
								<th width="25%" class="wrapper left">Tanggal</th>
								<th width="15%" class="wrapper center">Keluar</th>
								<th width="15%" class="wrapper center">Kembali</th>
								<th width="15%" class="wrapper center">Rawat Inap</th>
								<th width="15%" class="wrapper center">Tidak Kembali</th>
								<th width="5%" class="wrapper center">Detail</th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
				<div class="row">
					<div class="col-md-12">
						<input type="hidden" id="page-inout">
						<div id="pagination-inout" class="float-left"></div>
						<div id="summary-inout" class="float-right text-sm"></div>
					</div>
				</div>	
			</div><!-- ./box-me-body -->
			<div class="box-me-footer">
			
			</div><!-- /.box-me-footer -->
		</div><!-- /.box-me -->
	</div>
	<div class="col-md-5">
		<div class="box-me shadow">
			<div class="box-me-header with-border">
				<h5 class="box-me-title"><i class="fas fa-table mr-2"></i>Per Poliklinik | <span id="inout-poli-title"></span></h5>
				<div class="box-me-tools pull-right">
					<!-- <button class="btn btn-box-me-tool" title="Klik untuk mencetak list berkas keluar masuk per poli" onclick="cetakInOutPoliBRM()"><i class="fas fa-print"></i></button> -->
				</div>
			</div><!-- /.box-me-header -->
			<div class="box-me-body">
				<div class="table-responsive">
					<table id="table-data-inout-poli-brm" class="table table-hover table-striped table-sm color-table info-table">
						<thead>
							<tr>
								<th width="10%" class="wrapper center">No.</th>
								<th width="16%" class="wrapper left">Poliklinik</th>
								<th width="16%" class="wrapper center">Keluar</th>
								<th width="16%" class="wrapper center">Kembali</th>
								<th width="16%" class="wrapper center">Rawat Inap</th>
								<th width="16%" class="wrapper center">Tidak Kembali</th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
				<div class="row">
					<div class="col-md-12">
						<input type="hidden" id="page-inout-poli">
						<div id="pagination-inout-poli" class="float-left"></div>
						<div id="summary-inout-poli" class="float-right text-sm"></div>
					</div>
				</div>	
			</div><!-- ./box-me-body -->
			<div class="box-me-footer">
			
			</div><!-- /.box-me-footer -->
		</div><!-- /.box-me -->
	</div>
</div>
<!-- End In Out BRM  -->

<?php $this->load->view('js') ?>