<input type="hidden" name="page_now" id="page_now_spesialisasi">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col d-flex justify-content-start">
                        <?= form_button('tambah', '<i class="fas fa-plus-square"></i> Tambah Spesialisasi', 'id=bt_tambah_spesialisasi class="btn btn-info waves-effect"') ?>&nbsp;
                        <?= form_button('reset', '<i class="fas fa-history"></i> Reload Data', 'id=bt_reload_data class="btn btn-secondary waves-effect"') ?>
                    </div>
                    <div class="col d-flex justify-content-end">
                        <div class="custom-search">
                            <input type="text" class="search-query-white" onkeyup="getListSpesialisasi(1)" id="pencarian_spesialisasi" placeholder="Pencarian ...">
                            <button type="button"><span class="fas fa-search" aria-hidden="true"></span></button>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="table_spesialisasi" class="table table-hover table-striped table-sm color-table info-table m-t-5">
                        <thead>
                            <tr>
                                <th width="5%" class="text-center">No</th>
                                <th width="5%">Kode</th>
                                <th width="7%">Kode BPJS</th>
                                <th width="12%">Nama</th>
                                <th>SMF</th>
                                <th width="14%">Unit</th>
                                <th width="25%">Tarif</th>
                                <th>Kode Rekening</th>
                                <th>Daftar FP</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col">
                        <div id="spesialisasi_pagination" class="float-left"></div>
                        <div id="spesialisasi_summary" class="float-right text-sm"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('modal_spesialisasi'); ?>
<?php $this->load->view('js'); ?>