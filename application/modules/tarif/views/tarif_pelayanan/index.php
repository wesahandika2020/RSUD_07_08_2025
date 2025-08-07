<input type="hidden" name="page_now" id="page_now_tarif_pelayanan">
<div class="row">
    <div class="col-4 d-flex justify-content-start">
        <h6 class="m-t-5"><span class="badges badges-primary"><i class="fas fa-list-ul"></i> <?= $title; ?></span></h6>
    </div>
    <div class="col-8 d-flex justify-content-end">
        <?= form_button('tambah', '<i class="fas fa-plus-square"></i> Tambah Tarif Pelayanan', 'id=bt_tambah_tarif_pelayanan class="btn btn-info waves-effect"') ?>&nbsp;
        <?= form_button('reset', '<i class="fas fa-history"></i> Reload Data', 'id=bt_reload_data_tarif_pelayanan class="btn btn-secondary waves-effect"') ?>&nbsp;
        <?= form_button('search', '<i class="fas fa-search"></i> Pencarian Data', 'id=bt_search_data_tarif_pelayanan class="btn btn-secondary waves-effect"') ?>&nbsp;
        <div class="btn-group">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-cogs"></i>
            </button>
            <div class="dropdown-menu">
                <!-- <a class="dropdown-item" href="javascript:void(0)" id="bt_setting_pembagian_tarif"><i class="fas fa-cog"></i> Setting Pembagian Tarif</a> -->
                <a class="dropdown-item" href="javascript:void(0)" id="bt_export_data_tarif_pelayanan"><i class="fas fa-file-excel"></i> Export Tarif Pelayanan</a>
            </div>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table id="table_tarif_pelayanan" class="table table-hover table-striped table-sm color-table info-table m-t-5">
        <thead>
            <tr>
                <th width="5%" class="text-center">No.</th>
                <th width="10%" class="text-left">Instalasi</th>
                <th width="25%" class="text-left">Layanan</th>
                <th width="5%">Kelas</th>
                <th width="10%" class="text-left">Jenis</th>
                <th width="" class="text-left">Bobot</th>
                <th width="10%" class="text-right">Jasa Layanan</th>
                <th width="10%" class="text-right">Jasa Operasional</th>
                <th width="5%" class="text-right">BHP</th>
                <th width="8%" class="text-right">Total</th>
                <th width="10%" class="text-center">Is Active</th>
                <th width="15%" class="text-center"></th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>
<div class="row">
    <div class="col">
        <div id="tarif_pelayanan_pagination" class="float-left"></div>
        <div id="tarif_pelayanan_summary" class="float-right text-sm"></div>
    </div>
</div>

<?php $this->load->view('tarif/tarif_pelayanan/modal_tarif_pelayanan'); ?>
<?php $this->load->view('tarif/tarif_pelayanan/modal_search'); ?>
<?php $this->load->view('tarif/tarif_pelayanan/js'); ?>