<!-- Modal Detail Pendaftaran Poliklinik -->
<div id="modal_detail_pendaftaran" class="modal fade" role="dialog" aria-labelledby="modal_detail_pendaftaran_label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 87%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_detail_pendaftaran_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id_pendaftaran" id="id_pendaftaran" />

                <div class="row">
                    <div class="col-6">
                        <table class="table table-sm table-striped table-hover table-detail">
                            <tr>
                                <td width="30%"><b>Nama</b></td>
                                <td width="90%"><span id="nama_detail"></span></td>
                            </tr>
                            <tr>
                                <td><b>No.RM</b></td>
                                <td><span id="no_rm_detail"></span></td>
                            </tr>
                            <tr>
                                <td><b>No. RM Lama</b></td>
                                <td><span id="no_rm_lama_detail"></span></td>
                            </tr>
                            <tr>
                                <td><b>Alamat</b></td>
                                <td><span id="alamat_detail"></span></td>
                            </tr>
                            <tr>
                                <td><b>Kelamin</b></td>
                                <td><span id="kelamin_detail"></span></td>
                            </tr>
                            <tr>
                                <td><b>Tgl Lahir/Umur</b></td>
                                <td><span id="tgl_lahir_umur_detail"></span></td>
                            </tr>
                            <tr>
                                <td><b>Telp.</b></td>
                                <td><span id="telp_detail"></span></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td><b>Instansi Perujuk</b></td>
                                <td><span id="instansi_perujuk_detail"></span></td>
                            </tr>
                            <tr>
                                <td><b>Nadis Perujuk</b></td>
                                <td><span id="nadis_perujuk_detail"></span></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-6">
                        <table class="table table-sm table-striped table-hover table-detail">
                            <tr>
                                <td width="45%"><b>Nama Penanggung Jawab</b></td>
                                <td width="75%"><span id="nama_pjwb_detail"></span></td>
                            </tr>
                            <tr>
                                <td><b>Alamat Penanggung Jawab</b></td>
                                <td><span id="alamat_pjwb_detail"></span></td>
                            </tr>
                            <tr>
                                <td><b>Telp Penanggung Jawab</b></td>
                                <td><span id="telp_pjwb_detail"></span></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td><b>Nama Penanggung Jawab Keuangan</b></td>
                                <td><span id="nama_pjwb_detail_finansial"></span></td>
                            </tr>
                            <tr>
                                <td><b>Alamat Penanggung Jawab Keuangan</b></td>
                                <td><span id="alamat_pjwb_detail_finansial"></span></td>
                            </tr>
                            <tr>
                                <td><b>Telp Penanggung Jawab Keuangan</b></td>
                                <td><span id="telp_pjwb_detail_finansial"></span></td>
                            </tr>
							<tr>
                                <td><b>Data Antrian BPJS</b></td>
                                <td><span id="data_antrian_bpjs"></span></td>
                            </tr>
                        </table>
                        <table class="table-no-border">
                            <tr>
                                <td><button type="button" class="btn btn-primary btn-xs" id="btn_antri_poli"><i class="fa fa-plus"></i> Antri Klinik Lain</button></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table id="table_detail" class="table table-sm table-bordered table-striped table-hover color-table info-table">
                                <thead>
                                    <tr>
                                        <th>Jenis</th>
                                        <th>Klinik</th>
                                        <th>Dokter</th>
                                        <th>Tanggal Daftar</th>
                                        <th>Cara Bayar</th>
                                        <th>Hak Kelas</th>
                                        <th>No. Polish</th>
                                        <th>No. Rujukan</th>
                                        <th>No. SEP</th>
                                        <th>No. Antrian</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Detail Pendaftaran Poliklinik -->

<!-- Modal Edit Hak Kelas Pendaftaran Poli -->
<div id="modal_edit_hakkelas" class="modal fade" role="dialog" aria-labelledby="modal_edit_hakkelas_label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 45%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_edit_hakkelas_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_edit_hakkelas role=form class=form-horizontal') ?>
                <input type="hidden" name="id_pendaftaran_hakkelas" id="id_pendaftaran_hakkelas" />
                <div class="form-group row tight">
                    <label class="col-3 col-form-label">Hak Kleas Sebelumnya</label>
                    <div class="col-9">
                        <h5 id="hak_kelas_asal" class="m-t-10 bold"></h5>
                    </div>
                </div>
                <div class="form-group row tight">
                    <label for="hak_kelas_edit" class="col-3 col-form-label">Hak Kelas <span class="text-red">*</span></label>
                    <div class="col-9">
                        <?= form_dropdown('hak_kelas_edit', $hak_kelas, array(), 'class="custom-select reset-select" id=hak_kelas_edit') ?>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanEditHakKelas()"><i class="fas fa-save"></i> Update</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Hak Kelas Pendaftaran Poli -->