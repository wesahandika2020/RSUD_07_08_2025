<input type="hidden" id="page-now-tarif-kamar-ranap">
<div class="row">
    <div class="col d-flex justify-content-start">
		<?= form_button('tambah', '<i class="fas fa-plus-circle mr-1"></i>Tambah Tarif Sewa Kamar', 'id=btn-tambah-tarif-kamar-ranap class="btn btn-info waves-effect mr-1"') ?>
		<?= form_button('reset', '<i class="fas fa-history mr-1"></i>Reload Data', 'id=btn-reload-tarif-kamar-ranap class="btn btn-secondary waves-effect mr-1"') ?>
    </div>
    <div class="col d-flex justify-content-end">
		<div class="custom-search">
			<input type="text" class="search-query-white" onkeyup="getListTarifKamarRanap(1)" id="pencarian-tarif-kamar-ranap" placeholder="Pencarian ...">
			<button type="button"><span class="fas fa-search" aria-hidden="true"></span></button>
		</div>
	</div>
</div>

<div class="table-responsive">
    <table id="table-tarif-kamar-ranap" class="table table-hover table-striped table-sm color-table info-table m-t-5">
        <thead>
            <tr>
				<th width="5%" class="center">No.</th>
				<th width="25%">Nama Bangsal</th>
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
        <div id="tarif-kamar-ranap-pagination" class="float-left"></div>
        <div id="tarif-kamar-ranap-summary" class="float-right text-sm"></div>
    </div>
</div>

<?php $this->load->view('tarif/tarif_kamar_ranap/modal_tarif_kamar_ranap') ?>
<?php $this->load->view('tarif/tarif_kamar_ranap/js') ?>