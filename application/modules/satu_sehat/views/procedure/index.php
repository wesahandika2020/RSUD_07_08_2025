<input type="hidden" name="page_now" id="page-procedure">
<input type="hidden" name="hal_ini" id="hal-procedure">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div id="wizard-procedure">
                    <ol>
                        <li>INTEGRASI</li>
                        <li>BELUM INTEGRASI</li>
                    </ol>
                    <div class="status-bridging">
                        <div class="row">
                            <div class="col d-flex justify-content-start">
                                <?= form_button('reset', '<i class="fas fa-sync-alt mr-1"></i>Reload Data', 'id=btn-reload-procedure class="btn btn-secondary waves-effect"') ?>
                                <?= form_button('search', '<i class="fas fa-search"></i> Pencarian', 'id=bt-search-procedure class="btn btn-secondary waves-effect"') ?>
                            </div>
                        </div>
                        <!-- <div class="table-responsive"> -->
                        <table id="table-satset-procedure" class="table table-hover table-striped table-sm color-table info-table m-t-5">
                            <h4 class="modal-title center"><b>INTEGRASI PROCEDURE/TINDAKAN</b></h4>
                            <thead>
                                <tr>
                                    <th class="center" width="5%">No.</th>
                                    <th class="center" width="5%">Tanggal</th>
                                    <th class="center" width="10%">RM</th>
                                    <th class="left" width="15%">Nama</th>
                                    <th class="left" width="10%">Poli</th>
                                    <th class="left" width="20%">Tindakan</th>
                                    <th class="center" width="5%">Kode</th>
                                    <th class="left" width="20%">ICD-IX</th>
                                    <th class="center" width="10%"></th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                        <!-- </div> -->
                        <div class="row">
                            <div class="col">
                                <div id="pagination-procedure" class="float-left"></div>
                                <div id="summary-procedure" class="float-right text-sm"></div>
                            </div>
                        </div>
                    </div>
                    <div class="belum-bridging">
                        <div class="row">
                            <div class="col d-flex justify-content-start">
                                <?= form_button('integra', '<i class="fas fa-save mr-1"></i>Integrasi', 'id=integra-procedure class="btn btn-info waves-effect mr-1"') ?>
                                <?= form_button('reload', '<i class="fas fa-sync-alt mr-1"></i>Reload Data', 'id=btn-reload-int-procedure class="btn btn-secondary waves-effect"') ?>
                                <?= form_button('cari', '<i class="fas fa-search"></i> Pencarian', 'id=bt-integrasi-procedure class="btn btn-secondary waves-effect"') ?>
                            </div>
                        </div>
                        <!-- <div class="table-responsive"> -->
                        <table id="table-satset-kirim-procedure" class="table table-hover table-striped table-sm color-table info-table m-t-5">
                            <h4 class="modal-title center"><b>KIRIM PROCEDURE/TINDAKAN</b></h4>
                            <thead>
                                <tr>
                                     <th class="center" width="5%">No.</th>
                                    <th class="center" width="5%">Tanggal</th>
                                    <th class="center" width="10%">RM</th>
                                    <th class="left" width="15%">Nama</th>
                                    <th class="left" width="10%">Poli</th>
                                    <th class="left" width="20%">Tindakan</th>
                                    <th class="center" width="5%">Kode</th>
                                    <th class="left" width="20%">ICD-IX</th>
                                    <th class="center" width="10%"></th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                        <!-- </div> -->
                        <div class="row">
                            <div class="col">
                                <div id="kirim-pagination-procedure" class="float-left"></div>
                                <div id="kirim-summary-procedure" class="float-right text-sm"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('procedure/js'); ?>
<?php $this->load->view('procedure/modal_search'); ?>