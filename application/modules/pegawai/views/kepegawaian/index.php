<input type="hidden" name="page_now" id="page_now_kepegawaian">
<div class="row">
    <div class="col-md-6 d-flex justify-content-start">
        <?= form_button('tambah', '<i class="fas fa-plus-square"></i> Tambah Pegawai', 'id=bt_tambah_kepegawaian class="btn btn-info waves-effect"') ?>&nbsp;
        <?= form_button('reset', '<i class="fas fa-history"></i> Reload Data', 'id=bt_reload_data_kepegawaian class="btn btn-secondary waves-effect"') ?>
    </div>
    <div class="col-md-6 d-flex justify-content-end">
        <div class="custom-search">
            <input type="text" class="search-query-white" onkeyup="getListKepegawaian(1)" id="pencarian_kepegawaian" placeholder="Pencarian ...">
            <button type="button"><span class="fas fa-search" aria-hidden="true"></span></button>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table id="table_kepegawaian" class="table table-hover table-striped table-sm color-table info-table m-t-5">
        <thead>
            <tr>
                <th width="5%" class="text-center">No</th>
                <th>NIP</th>
                <th>Nama</th>
                <th class="text-center">Kelamin</th>
                <th>Jabatan</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>
<div class="row">
    <div class="col-md-12">
        <div id="kepegawaian_pagination" class="float-left"></div>
        <div id="kepegawaian_summary" class="float-right text-sm"></div>
    </div>
</div>
<script>
    $(function(){
        $('.mypopover').popover();
    });
</script>

<?php $this->load->view('kepegawaian/js'); ?>
<?php $this->load->view('kepegawaian/modal_kepegawaian'); ?>
<?php $this->load->view('kepegawaian/modal_detail_kepegawaian'); ?>