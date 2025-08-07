<input type="hidden" name="page_now" id="page-condition-primary">
<input type="hidden" name="hal_ini" id="hal-condition-primary">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div id="wizard-condition-primary">
                    <ol>
                        <li>INTEGRASI</li>
                        <li>BELUM INTEGRASI</li>
                    </ol>
                    <div class="status-bridging">
                        <div class="row">
                            <div class="col d-flex justify-content-start">
                                <?= form_button('reset', '<i class="fas fa-sync-alt mr-1"></i>Reload Data', 'id=btn-reload-condition-primary class="btn btn-secondary waves-effect"') ?>
                                <?= form_button('search', '<i class="fas fa-search"></i> Pencarian', 'id=bt-search-condition-primary class="btn btn-secondary waves-effect"') ?>
                            </div>
                        </div>
                        <!-- <div class="table-responsive"> -->
                        <table id="table-satset-condition-primary" class="table table-hover table-striped table-sm color-table info-table m-t-5">
                            <h4 class="modal-title center"><b>INTEGRASI CONDITION(PRIMARY)</b></h4>
                            <thead>
                                <tr>
                                    <th class="center" width="5%">No.</th>
                                    <th class="center" width="5%">Tanggal</th>
                                    <th class="center" width="10%">RM</th>
                                    <th class="left" width="20%">Nama</th>
                                    <th class="left" width="10%">Poli</th>
                                    <th class="center" width="5%">Kode</th>
                                    <th class="left" width="30%">Kondisi</th>
                                    <th class="center" width="15%"></th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                        <!-- </div> -->
                        <div class="row">
                            <div class="col">
                                <div id="pagination-condition-primary" class="float-left"></div>
                                <div id="summary-condition-primary" class="float-right text-sm"></div>
                            </div>
                        </div>
                    </div>
                    <div class="belum-bridging">
                        <div class="row">
                            <div class="col d-flex justify-content-start">
                                <?= form_button('integra', '<i class="fas fa-save mr-1"></i>Integrasi', 'id=integra-condition-primary class="btn btn-info waves-effect mr-1"') ?>
                                <?= form_button('reload', '<i class="fas fa-sync-alt mr-1"></i>Reload Data', 'id=btn-reload-int-condition-primary class="btn btn-secondary waves-effect"') ?>
                                <?= form_button('cari', '<i class="fas fa-search"></i> Pencarian', 'id=bt-integrasi-condition-primary class="btn btn-secondary waves-effect"') ?>
                            </div>
                        </div>
                        <!-- <div class="table-responsive"> -->
                        <table id="table-satset-kirim-condition-primary" class="table table-hover table-striped table-sm color-table info-table m-t-5">
                            <h4 class="modal-title center"><b>KIRIM CONDITION(PRIMARY)</b></h4>
                            <thead>
                                <tr>
                                    <th class="center" width="5%">No.</th>
                                    <th class="center" width="5%">Tanggal</th>
                                    <th class="center" width="10%">RM</th>
                                    <th class="left" width="20%">Nama</th>
                                    <th class="left" width="10%">Poli</th>
                                    <th class="center" width="5%">Kode</th>
                                    <th class="left" width="30%">Kondisi</th>
                                    <th class="center" width="15%"></th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                        <!-- </div> -->
                        <div class="row">
                            <div class="col">
                                <div id="kirim-pagination-condition-primary" class="float-left"></div>
                                <div id="kirim-summary-condition-primary" class="float-right text-sm"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('conditionprim/js'); ?>
<?php $this->load->view('conditionprim/modal_search'); ?>