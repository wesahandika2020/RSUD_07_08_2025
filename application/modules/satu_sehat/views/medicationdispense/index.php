<input type="hidden" name="page_now" id="page-medication-dispense">
<input type="hidden" name="hal_ini" id="hal-medication-dispense">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div id="wizard-medication-dispense">
                    <ol>
                        <li>INTEGRASI</li>
                        <li>BELUM INTEGRASI</li>
                    </ol>
                    <div class="status-bridging">
                        <div class="row">
                            <div class="col d-flex justify-content-start">
                                <?= form_button('reset', '<i class="fas fa-sync-alt mr-1"></i>Reload Data', 'id=btn-reload-medication-dispense class="btn btn-secondary waves-effect"') ?>
                                <?= form_button('search', '<i class="fas fa-search"></i> Pencarian', 'id=bt-search-medication-dispense class="btn btn-secondary waves-effect"') ?>
                            </div>
                        </div>
                        <!-- <div class="table-responsive"> -->
                        <table id="table-satset-medication-dispense" class="table table-hover table-striped table-sm color-table info-table m-t-5">
                            <h4 class="modal-title center"><b>INTEGRASI MEDICATION DISPENSE</b></h4>
                            <thead>
                                <tr>
                                    <th class="center" width="5%">No.</th>
                                    <th class="center" width="10%">Tanggal Resep</th>
                                    <th class="center" width="10%">RM</th>
                                    <th class="left" width="20%">Nama</th>
                                    <th class="left" width="10%">Poli</th>
                                    <th class="left" width="15%">Obat</th>
                                    <th class="left" width="15%">int. Medication Dispense</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                        <!-- </div> -->
                        <div class="row">
                            <div class="col">
                                <div id="pagination-medication-dispense" class="float-left"></div>
                                <div id="summary-medication-dispense" class="float-right text-sm"></div>
                            </div>
                        </div>
                    </div>
                    <div class="belum-bridging">
                        <div class="row">
                            <div class="col d-flex justify-content-start">
                                <?= form_button('integra', '<i class="fas fa-save mr-1"></i>Integrasi', 'id=integra-medication-dispense class="btn btn-info waves-effect mr-1"') ?>
                                <?= form_button('reload', '<i class="fas fa-sync-alt mr-1"></i>Reload Data', 'id=btn-reload-int-medication-dispense class="btn btn-secondary waves-effect"') ?>
                                <?= form_button('cari', '<i class="fas fa-search"></i> Pencarian', 'id=bt-integrasi-medication-dispense class="btn btn-secondary waves-effect"') ?>
                            </div>
                        </div>
                        <!-- <div class="table-responsive"> -->
                        <table id="table-satset-kirim-medication-dispense" class="table table-hover table-striped table-sm color-table info-table m-t-5">
                            <h4 class="modal-title center"><b>KIRIM MEDICATION DISPENSE</b></h4>
                            <thead>
                                <tr>
                                    <th class="center" width="5%">No.</th>
                                    <th class="center" width="10%">Tanggal Resep</th>
                                    <th class="center" width="10%">RM</th>
                                    <th class="left" width="15%">Nama</th>
                                    <th class="left" width="10%">Poli</th>
                                    <th class="left" width="30%">Obat</th>
                                    <th class="center" width="20%"></th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                        <!-- </div> -->
                        <div class="row">
                            <div class="col">
                                <div id="kirim-pagination-medication-dispense" class="float-left"></div>
                                <div id="kirim-summary-medication-dispense" class="float-right text-sm"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('medicationdispense/js'); ?>
<?php $this->load->view('medicationdispense/modal_search'); ?>