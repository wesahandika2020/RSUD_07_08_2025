<input type="hidden" name="page_now" id="page_now_kecamatan">
<div class="row">
    <div class="col d-flex justify-content-start">
        <?= form_button('tambah', '<i class="fas fa-plus-square"></i> Tambah Kecamatan', 'id=bt_tambah_kecamatan class="btn btn-info waves-effect"') ?>&nbsp;
        <?= form_button('reset', '<i class="fas fa-history"></i> Reload Data', 'id=bt_reload_data_kecamatan class="btn btn-secondary waves-effect"') ?>
    </div>
    <div class="col d-flex justify-content-end">
        <div class="custom-search">
            <input type="text" class="search-query-white" onkeyup="getListKecamatan(1)" id="pencarian_kecamatan" placeholder="Pencarian ...">
            <button type="button"><span class="fas fa-search" aria-hidden="true"></span></button>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table id="table_kecamatan" class="table table-hover table-striped table-sm color-table info-table m-t-5">
        <thead>
            <tr>
                <th width="5%" class="text-center">No</th>
                <th>Nama</th>
                <th>Kota/Kabupaten, Provinsi</th>
                <th></th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>
<div class="row">
    <div class="col">
        <div id="kecamatan_pagination" class="float-left"></div>
        <div id="kecamatan_summary" class="float-right text-sm"></div>
    </div>
</div>

<?php $this->load->view('kecamatan/modal_kecamatan'); ?>
<?php $this->load->view('kecamatan/js'); ?>