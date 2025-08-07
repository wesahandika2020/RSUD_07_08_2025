<input type="hidden" name="page_now" id="page_now_kota_kabupaten">
<div class="row">
    <div class="col d-flex justify-content-start">
        <?= form_button('tambah', '<i class="fas fa-plus-square"></i> Tambah Kota/Kabupaten', 'id=bt_tambah_kota_kabupaten class="btn btn-info waves-effect"') ?>&nbsp;
        <?= form_button('reset', '<i class="fas fa-history"></i> Reload Data', 'id=bt_reload_data_kota_kabupaten class="btn btn-secondary waves-effect"') ?>
    </div>
    <div class="col d-flex justify-content-end">
        <div class="custom-search">
            <input type="text" class="search-query-white" onkeyup="getListKotaKabupaten(1)" id="pencarian_kota_kabupaten" placeholder="Pencarian ...">
            <button type="button"><span class="fas fa-search" aria-hidden="true"></span></button>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table id="table_kota_kabupaten" class="table table-hover table-striped table-sm color-table info-table m-t-5">
        <thead>
            <tr>
                <th width="5%" class="text-center">No</th>
                <th>Nama</th>
                <th>Provinsi</th>
                <th></th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>
<div class="row">
    <div class="col">
        <div id="kota_kabupaten_pagination" class="float-left"></div>
        <div id="kota_kabupaten_summary" class="float-right text-sm"></div>
    </div>
</div>

<?php $this->load->view('kota_kabupaten/modal_kota_kabupaten'); ?>
<?php $this->load->view('kota_kabupaten/js'); ?>