<input type="hidden" name="page_now" id="page-now">
<input type="hidden" name="hal_ini" id="hal-ini">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div id="wizard-nakes">
                    <ol>
                        <li>INTEGRASI</li>
                        <li>BELUM INTEGRASI</li>
                    </ol>
                    <div class="status-bridging">
                        <div class="row">
                            <div class="col d-flex justify-content-start">
                                <?= form_button('reset', '<i class="fas fa-sync-alt mr-1"></i>Reload Data', 'id=btn-reload-nakes class="btn btn-secondary waves-effect"') ?>
                                <?= form_button('search', '<i class="fas fa-search"></i> Pencarian', 'id=bt-search-nakes class="btn btn-secondary waves-effect"') ?>
                            </div>
                        </div>
                        <!-- <div class="table-responsive"> -->
                        <table id="table-satset-nakes" class="table table-hover table-striped table-sm color-table info-table m-t-5">
                            <h4 class="modal-title center"><b>INTEGRASI RAWAT JALAN</b></h4>
                            <thead>
                                <tr>
                                    <th class="center" width="5%">No.</th>
                                    <th class="left" width="25%">Nama</th>
                                    <th class="center" width="20%">NIK</th>
                                    <th class="center" width="25%">Spesialisasi</th>
                                    <th class="center" width="25%">IHSN</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                        <!-- </div> -->
                        <div class="row">
                            <div class="col">
                                <div id="pagination-nakes" class="float-left"></div>
                                <div id="summary-nakes" class="float-right text-sm"></div>
                            </div>
                        </div>
                    </div>
                    <div class="belum-bridging">
                        <div class="row">
                            <div class="col d-flex justify-content-start">
                                <?= form_button('reload', '<i class="fas fa-sync-alt mr-1"></i>Reload Data', 'id=btn-bridging-nakes class="btn btn-secondary waves-effect"') ?>
                                <?= form_button('cari', '<i class="fas fa-search"></i> Pencarian', 'id=bt-search-bridging-nakes class="btn btn-secondary waves-effect"') ?>
                            </div>
                        </div>
                        <!-- <div class="table-responsive"> -->
                        <table id="table-satset-kirim-nakes" class="table table-hover table-striped table-sm color-table info-table m-t-5">
                            <h4 class="modal-title center"><b>KIRIM DATA</b></h4>
                            <thead>
                                <tr>
                                    <th class="center" width="5%">No.</th>
                                    <th class="left" width="25%">Nama</th>
                                    <th class="center" width="15%">NIK</th>
                                    <th class="center" width="15%">Spesialisasi</th>
                                    <th class="center" width="10%">IHSN</th>
                                    <th class="left" width="30%"></th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                        <!-- </div> -->
                        <div class="row">
                            <div class="col">
                                <div id="pagination-integrasi-nakes" class="float-left"></div>
                                <div id="summary-integrasi-nakes" class="float-right text-sm"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('nakes/js'); ?>
<?php $this->load->view('nakes/modal_search'); ?>