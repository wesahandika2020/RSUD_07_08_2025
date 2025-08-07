<!-- Modal Penjamin Pasien -->
<div id="modal_penjamin" class="modal fade" role="dialog" aria-labelledby="modal_penjamin_label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 60%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_penjamin_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <table class="table table-sm table-hover table-detail">
                            <tbody>
                                <tr>
                                    <td width="30%"><strong>No. RM</strong></td>
                                    <td><span id="no_rm_pj_pasien"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Nama</strong></td>
                                    <td><span id="nama_pj_pasien"></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <button type="button" id="bt_tambah_penjamin" class="btn btn-info btn-xs waves-effect"><i class="fas fa-plus-circle m-r-5"></i>Tambah Penjamin</button>
                    </div>
                    <div class="col-6 d-flex justify-content-end">
                        <h6><i class="fas fa-list m-r-5 m-t-10"></i>List Penjamin Pasien</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <table class="table table-sm table-striped table-hover color-table info-table m-t-3" id="table_penjamin">
                            <thead>
                                <tr>
                                    <th width="5%" class="text-center">No.</th>
                                    <th width="60%">Penjamin</th>
                                    <th width="30%">No. Polish</th>
                                    <th width="5%"></th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info waves-effect" data-dismiss="modal"><i class="fas fa-check"></i> OK</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Penjamin Pasien -->

<!-- Modal Tambah Penjamin Pasien -->
<div id="modal_tambah_penjamin" class="modal fade" role="dialog" aria-labelledby="modal_tambah_penjamin_label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_tambah_penjamin_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_penjamin role=form class=form-horizontal') ?>
                <input type="hidden" name="id" id="id_pasien_penjamin" />
                <div class="form-group row">
                    <label for="penjamin" class="col col-form-label">Penjamin</label>
                    <div class="col-9">
                        <input name="penjamin" id="penjamin" class="select2-input">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="no_polish" class="col col-form-label">No. Polish</label>
                    <div class="col-9">
                        <input name="no_polish" id="no_polish" onkeypress="return hanyaAngka(event)" class="form-control" placeholder="No. Polish">
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="konfirmasiSimpanPenjamin()"><i class="fas fa-check"></i> Konfirmasi</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Tambah Penjamin Pasien -->

<?php $this->load->view('penjamin/js'); ?>