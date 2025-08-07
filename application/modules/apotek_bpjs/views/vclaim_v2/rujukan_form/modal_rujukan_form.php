<div id="bpjs_rujukan_form" class="modal fade" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable" style="min-width:65%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_rujukan_title">Form Surat Rujukan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=formrujukan role=form class=form-horizontal') ?>
                <input type="hidden" name="no_sep" id="no_sep_hd_rjk" />
                <input type="hidden" name="no_rujukan" id="no_rujukan_hd_rjk" />
                <input type="hidden" name="poli" id="poli_hd_rjk" />
                <input type="hidden" name="id_pendaftaran" id="id_pendaftaran_rjk" />

                <div class="row">
                    <div class="col-lg-6">
                        <!-- bag. 1 -->
                        <table class="table table-sm table-striped table-hover">
                            <tbody>
                                <tr class="bg-theme text-white">
                                    <td colspan="3">
                                        <h5 class="m-t-5">
                                            <strong><i class="fas fa-user m-r-5"></i>Data Peserta</strong>
                                        </h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="30%"><strong>NIK</strong></td>
                                    <td width="1%"><strong>:</strong></td>
                                    <td wdith="69%"><span id="nik_rjk" class="bpjs_label"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>No. Kartu</strong></td>
                                    <td><strong>:</strong></td>
                                    <td><span id="no_kartu_rjk" class="bpjs_label"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>No. RM</strong></td>
                                    <td><strong>:</strong></td>
                                    <td><span id="no_rm_rjk" class="bpjs_label"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Nama</strong></td>
                                    <td><strong>:</strong></td>
                                    <td><span id="nama_rjk" class="bpjs_label"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Tgl. Lahir</strong></td>
                                    <td><strong>:</strong></td>
                                    <td><span id="tgl_lahir_rjk" class="bpjs_label"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Kelamin</strong></td>
                                    <td><strong>:</strong></td>
                                    <td><span id="kelamin_rjk" class="bpjs_label"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Kode Provider Rujukan</strong></td>
                                    <td><strong>:</strong></td>
                                    <td><span id="kode_prov_rujukan_rjk" class="bpjs_label"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Provider Rujukan</strong></td>
                                    <td><strong>:</strong></td>
                                    <td><span id="prov_rujukan_rjk" class="bpjs_label"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Jenis Peserta</strong></td>
                                    <td><strong>:</strong></td>
                                    <td><span id="jenis_peserta_rjk" class="bpjs_label"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Kelas Tanggungan</strong></td>
                                    <td><strong>:</strong></td>
                                    <td><span id="kelas_label_rjk" class="bpjs_label"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Status Peserta</strong></td>
                                    <td><strong>:</strong></td>
                                    <td><span id="status_rjk" class="bpjs_label"></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-6">
                        <!-- bag. 2 -->
                        <table class="table table-sm table-striped table-hover">
                            <tbody>
                                <tr class="bg-theme text-white">
                                    <td colspan="3" clas>
                                        <h5 class="m-t-5">
                                            <strong><i class="fas fa-list m-r-5"></i>Detail SEP</strong>
                                        </h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="20%"><strong>No. SEP</strong></td>
                                    <td width="1%"><strong>:</strong></td>
                                    <td width="79%"><span id="no_sep_rjk" class="bpjs_label"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Tgl. Sep</strong></td>
                                    <td><strong>:</strong></td>
                                    <td><span id="tgl_sep_rjk" class="bpjs_label"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Jenis Rawat</strong></td>
                                    <td><strong>:</strong></td>
                                    <td><span id="jenis_rawat_rjk" class="bpjs_label"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Poli Tujuan</strong></td>
                                    <td><strong>:</strong></td>
                                    <td><span id="poli_tujuan_rjk" class="bpjs_label"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Poli Eksekutif</strong></td>
                                    <td><strong>:</strong></td>
                                    <td><span id="poli_eks_rjk" class="bpjs_label"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Dokter DPJP</strong></td>
                                    <td><strong>:</strong></td>
                                    <td><span id="dpjp_rjk" class="bpjs_label"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Kelas Rawat</strong></td>
                                    <td><strong>:</strong></td>
                                    <td><span id="kelas_rawat_rjk" class="bpjs_label"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Diagnosa</strong></td>
                                    <td><strong>:</strong></td>
                                    <td><span id="diagnosa_rjk" class="bpjs_label"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Penjamin Lain</strong></td>
                                    <td><strong>:</strong></td>
                                    <td><span id="penjamin_lain_rjk" class="bpjs_label"></span></td>
                                </tr>
                                <!-- <tr>
                                    <td><strong>Status KLL</strong></td>
                                    <td><strong>:</strong></td>
                                    <td><span id="status_kll_rjk" class="bpjs_label"></span></td>
                                </tr> -->
                                <tr>
                                    <td><strong>Catatan</strong></td>
                                    <td><strong>:</strong></td>
                                    <td><span id="catatan_rjk" class="bpjs_label"></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="box-well">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bold">Tgl. Dirujuk</label>
                                                <input type="text" name="tanggal_dirujuk" class="form-control bpjs_input" id="tgl_dirujuk_rjk" placeholder="Tanggal Dirujuk">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="bold">Tgl. Rencana Kunjungan</label>
                                                <input type="text" name="tanggal_rencana_kunjungan" class="form-control bpjs_input" id="tgl_rencana_kujungan_rjk" placeholder="Tanggal Rencana Kunjungan">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="bold">Tingkat Faskes</label>
                                        <?php $faskes = array('1' => 'Faskes Tingkat 1', '2' => 'Faskes Tingkat 2') ?>
                                        <?= form_dropdown('asal_rujukan', $faskes, array(), 'class="form-control" id=asal_rujukan_rjk') ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="bold">PPK Rujukan</label>
                                        <input type="text" name="ppk_rujukan" class="select2-input bpjs_input" id="ppk_dirujuk_rjk">
                                    </div>
                                    <div class="form-group">
                                        <label class="bold">Pelayanan</label>
                                        <?php $jenis_pelayanan = array("2" => "Rawat Jalan", "1" => "Rawat Inap") ?>
                                        <?= form_dropdown('jenis_pelayanan', $jenis_pelayanan, array(), 'class="form-control" readonly id="jenis_pelayanan_rjk"') ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="bold">Tipe Rujukan</label>
                                        <?php $tipe_rujukan = array("0" => "Penuh", "1" => "Partial", "2" => "Rujuk Balik") ?>
                                        <?= form_dropdown('tipe_rujukan', $tipe_rujukan, array(), 'class="form-control" readonly id="tipe_rujukan_rjk"') ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" id="klinik_area_rjk">
                                        <label class="bold">Klinik</label>
                                        <input type="text" class="select2-input bpjs_input" id="kode_poli_rjk">
                                    </div>
                                    <!-- <div class="form-group tight" id="igd_area_rjk">
                                        <label class="bold">Unit</label>
                                        <h4 id="label_igd_rjk"></h4>
                                    </div> -->
                                    <div class="form-group tight">
                                        <label class="bold">Diagnosa</label>
                                        <input type="text" name="diagnosa" class="select2-input bpjs_input" id="diag_rjk">
                                    </div>
                                    <div class="form-group tight">
                                        <label class="bold">Catatan</label>
                                        <textarea name="catatan" class="form-control bpjs_input" id="catatan2_rjk"rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
                <button type="button" class="btn btn-info" id="bt_update_rujukan" onclick="konfirmasiRujukan('update')"><i class="fas fa-edit"></i> Update Rujukan</button>
                <button type="button" class="btn btn-info" id="bt_create_rujukan" onclick="konfirmasiRujukan('create')"><i class="fas fa-plus-circle"></i> Buat Rujukan</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php $this->load->view(DIR_RUJUKAN_VCLAIM.'js'); ?>