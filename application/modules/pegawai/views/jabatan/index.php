<input type="hidden" name="page_now" id="page_now_jabatan">
<div class="row">
    <div class="col d-flex justify-content-start">
        <?= form_button('tambah', '<i class="fas fa-plus-square"></i> Tambah Jabatan', 'id=bt_tambah_jabatan class="btn btn-info waves-effect"') ?>&nbsp;
        <?= form_button('reset', '<i class="fas fa-history"></i> Reload Data', 'id=bt_reload_data_jabatan class="btn btn-secondary waves-effect"') ?>
    </div>
    <div class="col d-flex justify-content-end">
        <div class="custom-search">
            <input type="text" class="search-query-white" onkeyup="getListJabatan(1)" id="pencarian_jabatan" placeholder="Pencarian ...">
            <button type="button"><span class="fas fa-search" aria-hidden="true"></span></button>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table id="table_jabatan" class="table table-hover table-striped table-sm color-table info-table m-t-5">
        <thead>
            <tr>
                <th width="5%" class="text-center">No</th>
                <th>Nama</th>
                <th></th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>
<div class="row">
    <div class="col">
        <div id="jabatan_pagination" class="float-left"></div>
        <div id="jabatan_summary" class="float-right text-sm"></div>
    </div>
</div>

<?php $this->load->view('jabatan/js'); ?>
<?php $this->load->view('jabatan/modal_jabatan'); ?>