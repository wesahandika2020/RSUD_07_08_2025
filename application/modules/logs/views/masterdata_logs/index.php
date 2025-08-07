<input type="hidden" name="page_now" id="page_now">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col d-flex justify-content-start">
                        <?= form_button('search', '<i class="fas fa-search"></i> Pencarian Data', 'id=bt_search_data class="btn btn-info waves-effect"') ?>&nbsp;
                        <?= form_button('reset', '<i class="fas fa-history"></i> Reload Data', 'id=bt_reload_data class="btn btn-secondary waves-effect"') ?>
                    </div>
                    <div class="col d-flex justify-content-end">

                    </div>
                </div>

                <div class="table-responsive">
                    <table id="table_masterdata_logs" class="table table-hover table-striped table-sm color-table info-table m-t-5" width="100%">
                        <thead>
                            <tr>
                                <th width="4%" class="text-center">No.</th>
                                <th width="10%">Waktu</th>
                                <th width="9%">Masterdata</th>
                                <th width="6%">User</th>
                                <th width="15%">Nama User</th>
                                <th width="15%">Action</th>
                                <th width="10%" class="text-center">Detail</th>
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

<?php $this->load->view('masterdata_logs/js'); ?>
<?php $this->load->view('masterdata_logs/modal_masterdata_logs'); ?>
<?php $this->load->view('masterdata_logs/modal_search'); ?>