<input type="hidden" id="page-now-tarif-pkrt">
<div class="row">
    <div class="col d-flex justify-content-start">
		<?= form_button('tambah', '<i class="fas fa-plus-circle mr-1"></i>Tambah Tarif Perbekalan Kesehatan', 'id=btn-tambah-tarif-pkrt class="btn btn-info waves-effect mr-1"') ?>
		<?= form_button('reset', '<i class="fas fa-history mr-1"></i>Reload Data', 'id=btn-reload-tarif-pkrt class="btn btn-secondary waves-effect mr-1"') ?>
    </div>
    <div class="col d-flex justify-content-end">
		<div class="custom-search">
			<input type="text" class="search-query-white" onkeyup="getListTarifPKRT(1)" id="pencarian-tarif-pkrt" placeholder="Pencarian ...">
			<button type="button"><span class="fas fa-search" aria-hidden="true"></span></button>
		</div>
	</div>
</div>

<div class="table-responsive">
    <table id="table-tarif-pkrt" class="table table-hover table-striped table-sm color-table info-table m-t-5">
        <thead>
            <tr>
				<th width="5%" class="center">No.</th>
				<th width="25%">Nama Barang</th>
				<th width="15%" class="center">Kelas</th>
				<th width="15%" class="right">Nominal</th>
				<th width="25%">Keterangan</th>
				<th width="15%"></th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>
<div class="row">
    <div class="col">
        <div id="tarif-pkrt-pagination" class="float-left"></div>
        <div id="tarif-pkrt-summary" class="float-right text-sm"></div>
    </div>
</div>

<?php $this->load->view('tarif/tarif_perbekalan_kesehatan/modal_tarif_perbekalan_kesehatan') ?>
<?php $this->load->view('tarif/tarif_perbekalan_kesehatan/js') ?>