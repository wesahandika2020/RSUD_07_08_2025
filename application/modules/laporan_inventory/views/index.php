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
						<?= form_button('search', '<i class="fas fa-search mr-1"></i>Parameter Laporan', 'id=btn-search class="btn btn-info waves-effect mr-1"') ?>
						<?= form_button('reset', '<i class="fas fa-history mr-1"></i>Reload Data', 'id=btn-reload class="btn btn-secondary waves-effect mr-1"') ?>
					</div>
				</div>
			</div>

			<?php $this->load->view('lap_mutasi_obat/index.php') ?>
			<?php $this->load->view('lap_buku_penjualan/index.php') ?>
			<?php $this->load->view('lap_penjualan_obat/index.php') ?>
			<?php $this->load->view('lap_pemakaian_obat/index.php') ?>
			<?php $this->load->view('lap_pemakaian_obat_all_unit/index.php') ?>
			<?php $this->load->view('lap_pengeluaran_obat/index.php') ?>
			<?php $this->load->view('lap_permintaan_obat/index.php') ?>
			<?php $this->load->view('lap_permintaan_kegudang/index.php') ?>
			<?php $this->load->view('lap_permintaan_takterlayani/index.php') ?>
			<?php $this->load->view('lap_stok_opname/index.php') ?>

		</div>
	</div>
</div>

<?php $this->load->view('js') ?>
<?php $this->load->view('lap_mutasi_obat/modal') ?>
<?php $this->load->view('lap_buku_penjualan/modal') ?>
<?php $this->load->view('lap_penjualan_obat/modal') ?>
<?php $this->load->view('lap_pemakaian_obat/modal') ?>
<?php $this->load->view('lap_pemakaian_obat_all_unit/modal') ?>
<?php $this->load->view('lap_pengeluaran_obat/modal') ?>
<?php $this->load->view('lap_permintaan_obat/modal') ?>
<?php $this->load->view('lap_permintaan_kegudang/modal') ?>
<?php $this->load->view('lap_permintaan_takterlayani/modal') ?>
<?php $this->load->view('lap_stok_opname/modal') ?>