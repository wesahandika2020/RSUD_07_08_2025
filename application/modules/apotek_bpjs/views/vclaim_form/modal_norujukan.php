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
                            <td class="text-center" width="5%">No.</td>
                            <td width="15%">Tanggal Terbit</td>
                            <td width="20%">Jenis</td>
                            <td width="20%">Nomor Rujukan</td>
                            <td width="30%">Dokter</td>
                            <td class="text-right" width="10%"></td>
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


<?php $this->load->view('miscellaneous/generate_skdp'); ?>