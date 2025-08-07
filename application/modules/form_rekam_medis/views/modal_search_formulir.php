<!-- Modal Search -->
<div id="modal_search_formulir" class="modal fade" role="dialog" aria-labelledby="modal_search_formulir_label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 550px">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_search_formulir_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('','id=form_search_formulir role=form class=form-horizontal') ?>
                <input type="hidden" name="id_pasien_search"  id="id_pasien_search">
                <input type="hidden" name="id_pendaftaran_search"  id="id_pendaftaran_search">

                
                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Pasien</label>
                        <div class="col-md-9">
                            <input type="text" name="pasien" id="pasien-search" class="select2-input" placeholder="Pilih Pasien...">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-form-label">Tanggal Kunjungan</label>
                        <div class="col-md-9">
                                <select name="tgl-search" id="tgl-search" class="form-control"> </select>
                                
                            <!-- <input type="text" name="tgl" id="tgl-search" class="select2-input" placeholder="Pilih Tanggal Kunjungan..."> -->
                        </div>
                    </div>

                    
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="cariFormulir()"><i class="fas fa-search"></i> Cari</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Search -->