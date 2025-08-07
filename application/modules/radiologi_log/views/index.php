<!-- <meta http-equiv="refresh" content="90; URL=<?= base_url();?>"> -->
<input type="hidden" name="page_now" id="page-now">
<input type="hidden" name="page_lantai" id="page-lantai">

<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col d-flex justify-content-start">
                        <?= form_button('search', '<i class="fas fa-search"></i> Pencarian', 'id=bt-search class="btn btn-secondary waves-effect"') ?>&nbsp;
                        <?= form_button('reset', '<i class="fas fa-sync-alt mr-1"></i>Reload Data', 'id=btn-reload class="btn btn-secondary waves-effect"') ?>&nbsp;
                    </div>
                </div>
                <!-- <div class="table-responsive"> -->
                    <table id="table-radiologi-del" class="table table-hover table-striped table-sm color-table info-table m-t-5">
                        <h4 class="modal-title center" id="monitor-radiologi-del-label"></h4>
                        <h4 class="modal-title center"><b></b></h4>
                        <thead>
                            <tr>
                                <th class="center" width="5%">No.</th>
                                <th class="center" width="7%">No. RM</th>
                                <th class="left" width="20%">Nama Pasien</th>
                                <th class="left" width="20%">Tindakan</th>
                                <th class="center" width="10%">Acc Number</th>
                                <th class="center" width="10%">Instance UID</th>
                                <th class="left" width="18%">Nama Akun</th>
                                <th class="center" width="10%">Waktu Hapus</th>
                            </tr>
                        </thead>
                        <tbody ></tbody>
                    </table>
                <!-- </div> -->
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

<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col d-flex justify-content-start">
                        <?= form_button('search', '<i class="fas fa-search"></i> Pencarian', 'id=search-acc class="btn btn-secondary waves-effect"') ?>&nbsp;
                    </div>
                </div>
                <!-- <div class="table-responsive"> -->
                    <table id="table-radiologi-acc" class="table table-hover table-striped table-sm color-table info-table m-t-5">
                        <h4 class="modal-title center" id="monitor-radiologi-acc-label"></h4>
                        <h4 class="modal-title center"><b></b></h4>
                        <thead>
                            <tr>
                                <th class="center" width="5%">No.</th>
                                <th class="center" width="10%">No. RM</th>
                                <th class="left" width="15%">Nama Pasien</th>
                                <th class="center" width="15%">Acc Lama</th>
                                <th class="center" width="15%">Acc Baru</th>
                                <th class="center" width="10%">Instance UID</th>
                                <th class="left" width="20%">Nama Akun</th>
                                <th class="center" width="10%">Waktu Edit</th>
                            </tr>
                        </thead>
                        <tbody ></tbody>
                    </table>
                <!-- </div> -->
                <div class="row">
                    <div class="col">
                        <div id="pagination2" class="float-left"></div>
                        <div id="summary2" class="float-right text-sm"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('js'); ?>
<?php $this->load->view('modal'); ?>