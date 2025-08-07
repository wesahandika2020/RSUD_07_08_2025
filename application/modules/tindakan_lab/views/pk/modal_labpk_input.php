<!-- Modal Layanan -->
<div id="modal_labpk_input" class="modal fade" role="dialog" aria-labelledby="modal_labpk_input_label" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_labpk_input_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('','id=form_nilaipk role=form class=form-horizontal') ?>
                <input name="id_lay" type="hidden" id="id_lay"/> <!--hidden-->
                <input name="id_nilai" type="hidden" id="id_nilai"/>

                <div for="tindakan" class="form-group row tight">
                    <label class="col-3 col-form-label">Tindakan</label>
                    <div class="col-lg-6">
                        <input type="text" readonly name="tindakan" class="form-control-plaintext" id="tindakan">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="satuan" class="col-3 col-form-label">Satuan</label>
                    <div class="col-6">
                        <?= form_dropdown('satuan', $satuan, array(), 'class="custom-form" style="height:1cm" id=satuan') ?>
                    </div>
                </div>
                <div for="metode" class="form-group row tight">
                    <label class="col-3 col-form-label">Metode</label>
                    <div class="col-6">
                        <input type="text" name="metode" class="form-control" id="metode" placeholder="Metode">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label class="col-3 col-form-label"><h4><b>Nilai Normal</b></h4></label>
                </div>
                <div for="kategori" class="form-group row tight">
                    <label class="col-3 col-form-label">Kategori</label>
                    <div class="col-6">
                        <?= form_dropdown('kategori', $kategori, array(), 'class="custom-form" style="height:1cm" id=kategori') ?>
                    </div>
                </div>
                <div class="form-group row tight">
                    <label class="col-3 col-form-label">Nilai</label>
                    <div class="col-2">
                        <input type="text" name="nilai_awal" class="form-control" id="nilai_awal" placeholder="Nilai Awal">
                    </div>
                    <div  class="col-1">
                        <?= form_dropdown('simbol', $simbol, array(), 'class="custom-form" style="height:1cm" id=simbol') ?> 
                    </div>
                    <div class="col-2">
                        <input type="text" name="nilai_akhir" class="form-control" id="nilai_akhir" placeholder="Nilai Akhir">
                    </div>
                </div>
                <div class="form-group row tight">
                    <label class="col-lg-3 col-form-label-custom"></label>
                    <div class="col-lg-8">
                        <button type="button" title="Simpan Nilai" class="btn btn-info" onclick="simpanNilaiLabPK()"><i class="fas fa-plus-circle mr-2"></i>Simpan Nilai</button>
                    </div>
                </div>
                <table class="table table-hover table-striped table-sm color-table info-table" id="table_nilaipk">
                    <thead class="thead-theme">
                        <tr>
                            <th style="text-align:center">Satuan</th>
                            <th style="text-align:center">Metode</th>
                            <th style="text-align:center">Kategori</th>
                            <th style="text-align:center">Nilai Awal</th>
                            <th style="text-align:center">Simbol</th>
                            <th style="text-align:center">Nilai Akhir</th>
                            <th style="display:none;">Id Nilai</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
                <!-- <button type="button" class="btn btn-info waves-effect" onclick="simpanNilaiLabPK()"><i class="fas fa-save"></i> Simpan</button> -->
            </div>
            <div class="row">
                <div class="col">
                    <div id="pagination" class="float-left"></div>
                    <div id="summary" class="float-right text-sm"></div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Layanan -->