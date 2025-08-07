<input type="hidden" name="page_now" id="page_now">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col d-flex justify-content-start">
                        <?= form_button('search', '<i class="fas fa-search"></i> Pencarian Data', 'id=bt_search_logs class="btn btn-info waves-effect"') ?>&nbsp;
                        <?= form_button('delete', '<i class="fas fa-trash"></i> Hapus Semua Log', 'id=bt_delete_all_logs onclick="hapusSemuaLog()" class="btn btn-danger waves-effect"') ?>&nbsp;
                        <?= form_button('reset', '<i class="fas fa-history"></i> Reload Data', 'id=bt_reload_data class="btn btn-secondary waves-effect"') ?>
                    </div>
                    <div class="col d-flex justify-content-end">

                    </div>
                </div>

                <div class="table-responsive">
                    <table id="table_logs" class="table table-hover table-striped table-sm color-table info-table m-t-5" width="100%">
                        <thead>
                            <tr>
                                <th width="5%" class="text-center">No</th>
                                <th width="15%">Waktu</th>
                                <th width="16%">Menu</th>
                                <th width="15%">Status</th>
                                <th width="20%">URL</th>
                                <th width="20%" class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col">
                        <div id="pagination" class="float-left"></div>
                        <div id="summary" class="float-right text-sm"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php $this->load->view('js'); ?>
<?php $this->load->view('modal_logs'); ?>
<?php $this->load->view('modal_search'); ?>