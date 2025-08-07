<!-- Modal No Rujukan -->
<div id="modal_norujukan" class="modal fade" role="dialog" aria-labelledby="modal_norujukan_label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 60%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_norujukan_label">History Nomor Rujukan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_norujukan role=form class=form-horizontal') ?>
                <button type="button" class="btn btn-info btn-xs m-b-5" onclick="createSKDP()"><i class="fas fa-plus-circle m-r-5"></i>Buat No. Rujukan</button>
                <table class="table table-hover table-striped table-sm" id="table_norujukan">
                    <thead>
                        <tr>
                            <th class="text-center" width="5%">No.</th>
                            <th width="15%">Tanggal Terbit</th>
                            <th width="20%">Jenis</th>
                            <th width="20%">Nomor Rujukan</th>
                            <th width="30%">Dokter</th>
                            <th class="text-right" width="10%"></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal No Rujukan -->

<!-- Modal Surat Kontrol -->
<div id="modal_no_surat_kontrol" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 60%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_norujukan_label">History Nomor Surat Kontrol</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_norujukan role=form class=form-horizontal') ?>
                <table class="table table-hover table-striped table-sm color-table info-table" id="table_no_surat_kontrol">
                    <thead>
                        <tr>
                            <th class="center" width="5%">No.</th>
                            <th class="center" width="10%">Tanggal Terbit</th>
                            <th class="center" width="10%">Tanggal Kontrol</th>
                            <th width="10%">Jenis</th>
                            <th class="center" width="20%">Nomor Surat</th>
                            <th width="10%">Poli Tujuan</th>
                            <th width="25%">Dokter</th>
                            <th class="text-right" width="10%"></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Surat Kontrol -->

<!-- Modal History Rujukan -->
<div id="modal_histori_rujukan" class="modal fade" role="dialog">
    <div class="modal-dialog" style="max-width: 70%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_histori_rujukan_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_histori_rujukan role=form class=form-horizontal') ?>
                <table class="table table-hover table-striped table-sm color-table info-table" id="table_histori_rujukan">
                    <thead>
                        <tr>
                            <th class="center" width="5%">No.</th>
                            <th class="center" width="20%">No. Rujukan</th>
                            <th class="center" width="9%">Tgl. Rujukan</th>
                            <th class="center" width="7%">No. Kartu</th>
                            <th width="20%">Nama</th>
                            <th width="20%">PPK Perujuk</th>
                            <th width="30%">Sub/Spesialis</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal History Rujukan -->


<?php $this->load->view('miscellaneous/generate_skdp'); ?>