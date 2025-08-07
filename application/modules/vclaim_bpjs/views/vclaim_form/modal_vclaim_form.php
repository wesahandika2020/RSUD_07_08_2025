<!-- Modal Form Pembuatan SEP Vclaim -->
<div id="modal_form_sep_bpjs" class="modal fade" role="dialog" aria-labelledby="modal_form_sep_bpjs_label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" id="modal_dialog_bpjs" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_form_sep_bpjs_label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_sep_bpjs role=form class=form-horizontal') ?>
                <input type="hidden" name="no_kartu" id="nokartu_bpjs" class="bpjs_input">
                <input type="hidden" name="kode_poli" id="kode_poli" class="bpjs_input">
                <input type="hidden" name="id_layanan_pendaftaran" id="id_layanan_pendaftaran_bpjs" class="bpjs_input">
                <input type="hidden" name="no_rm" id="no_rm_bpjs">
                <input type="hidden" name="no_sep" id="no_sep_bpjs">
                <div class="row">
                    <div class="col-4" id="area-one">
                        <table class="table table-striped table-hover table-sm">
                            <tbody>
                                <tr class="bg-theme text-white">
                                    <td colspan="2" clas>
                                        <h5 class="m-t-5">
                                            <strong><i class="fas fa-user m-r-5"></i>Data Peserta</strong>
                                        </h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="35%"><strong>No. Kartu</strong></td>
                                    <td><span id="no_kartu_bpjs" class="bpjs_label"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>NIK</strong></td>
                                    <td><span id="nik_bpjs" class="bpjs_label"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Nama</strong></td>
                                    <td><span id="nama_bpjs" class="bpjs_label"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Kelamin</strong></td>
                                    <td><span id="kelamin_bpjs" class="bpjs_label"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Tgl. Lahir</strong></td>
                                    <td><span id="tgl_lahir_bpjs" class="bpjs_label"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Nama Provider</strong></td>
                                    <td><span id="nama_provider_bpjs" class="bpjs_label"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Jenis Peserta</strong></td>
                                    <td><span id="jenis_peserta_bpjs" class="bpjs_label"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Kelas Tanggungan</strong></td>
                                    <td><span id="kelas_label_bpjs" class="bpjs_label"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Status Peserta</strong></td>
                                    <td><span id="status_bpjs" class="bpjs_label"></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-4" id="area-two">
                        <table class="table table-striped table-hover table-sm">
                            <tbody>
                                <tr>
                                    <td colspan="2" class="bg-theme text-white">
                                        <h5 class="m-t-5">
                                            <strong><i class="fas fa-clipboard-list m-r-5"></i>Data Rujukan Terakhir</strong>
                                        </h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Jenis Rujukan</strong></td>
                                    <td>
                                        <?php
                                        $jenis_rujukan = ['1' => 'PCare', '2' => 'Rumah Sakit'];
                                        echo form_dropdown('', $jenis_rujukan, array(), 'class="custom-form" id=jenis_rujukan_bpjs');
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="30%"><strong>No. Rujukan</strong></td>
                                    <td><span id="no_rujukan_last" class="bpjs_label"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Tanggal Rujukan</strong></td>
                                    <td><span id="tanggal_rujukan_last" class="bpjs_label"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Provider Rujukan</strong></td>
                                    <td><span id="provider_rujukan_last" class="bpjs_label"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Kode ICD</strong></td>
                                    <td><span id="icd_rujukan_last" class="bpjs_label"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Diagnosa</strong></td>
                                    <td><span id="diagnosa_rujukan_last" class="bpjs_label"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Poli Tujuan</strong></td>
                                    <td><span id="poli_rujukan_last" class="bpjs_label"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Keluhan</strong></td>
                                    <td><span id="keluhan_rujukan_last" class="bpjs_label"></span></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><button type="button" class="btn btn-info btn-xs float-right" onclick="useRujukan()"><i class="fas fa-arrow-circle-down m-r-5"></i>Gunakan Data Rujukan</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-lg-4" id="area-three">
                        <h5 class="m-t-5"><strong>History SEP Peserta</strong></h5>
                        <div style="max-height: 270px; overflow-y: auto" id="history_scroll"></div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="box-well">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group row tight">
                                        <label for="jenis_pelayanan" class="col-3 col-form-label">Pelayanan</label>
                                        <div class="col-9">
                                            <?php $jenis_pelayanan = array('1' => 'Rawat Inap', '2' => 'Rawat Jalan'); ?>
                                            <?= form_dropdown('jenis_pelayanan', $jenis_pelayanan, array(), 'class="form-control" readonly id="jenis_pelayanan_bpjs"') ?>
                                        </div>
                                    </div>
                                    <div class="form-group row tight kode_poli_area">
                                        <label for="kode_poli" class="col-3 col-form-label">Klinik</label>
                                        <div class="col-9">
                                            <input type="text" name="" class="select2-input" id="kode_poli_auto">
                                        </div>
                                    </div>
                                    <div class="form-group row tight" id="label_poli_area">
                                        <label for="kode_poli" class="col-3 col-form-label">Klinik</label>
                                        <div class="col-9">
                                            <h5 id="label_poli_bpjs" class="m-t-10"></h5>
                                            <button type="button" class="btn btn-xs btn-primary" onclick="ubahPoliSub()" title="Klik untuk mengubah poli / sub spesialis"><i class="fas fa-exchange-alt m-r-5"></i>Ubah Sub Poli</button>
                                        </div>
                                    </div>
                                    <div class="form-group row tight">
                                        <label for="klinik_eksekutif" class="col-3 col-form-label">Klinik Eksekutif</label>
                                        <div class="col-5">
                                            <?php $opsi_yesno = array('0' => 'Tidak', '1' => 'Ya'); ?>
                                            <?= form_dropdown('klinik_eksekutif', $opsi_yesno, array(), 'class="form-control" id="klinik_eksekutif_bpjs"') ?>
                                        </div>
                                    </div>
                                    <div class="form-group row tight">
                                        <label for="kelas" class="col-3 col-form-label">Kelas</label>
                                        <div class="col-5">
                                            <?php $opsi_yesno = array('0' => 'Tidak', '1' => 'Ya'); ?>
                                            <?= form_dropdown('kelas', array(), array(), 'class="form-control" id="kelas_bpjs"') ?>
                                        </div>
                                    </div>

                                    <!-- Rujukan -->
                                    <div class="form-group row tight">
                                        <label for="no_rujukan" class="col-3 col-form-label">No. Rujukan</label>
                                        <div class="col-9">
                                            <input type="text" name="no_rujukan" class="form-control bpjs_input" id="no_rujukan_bpjs" placeholder="No. Rujukan">
                                        </div>
                                    </div>
                                    <div class="form-group row tight">
                                        <label for="no_skdp" class="col-3 col-form-label">No. SKDP</label>
                                        <div class="col-7">
                                            <input type="text" name="no_skdp" class="form-control bpjs_input" id="no_skdp_bpjs" placeholder="No. SKDP">
                                        </div>
                                    </div>
                                    <div class="form-group row tight">
                                        <label class="col-3 col-form-label"></label>
                                        <div class="col-7">
                                            <button type="button" class="btn btn-xs btn-primary m-t-5" onclick="checkLastNoRujukan()" title="Klik untuk melihat nomor rujukan terakhir"><i class="fas fa-list m-r-5"></i>Melihat nomor rujukan terakhir</button>
                                        </div>
                                    </div>
                                    <div class="form-group row tight filter_igd">
                                        <label class="col-3 col-form-label"></label>
                                        <div class="col-9"></div>
                                    </div>
                                    <div class="form-group row tight filter_igd">
                                        <label class="col-3 col-form-label">Filter Spesialis</label>
                                        <div class="col-9">
                                            <input type="text" name="" class="select2-input" id="spesialis_igd_auto">
                                        </div>
                                    </div>
                                    <div class="form-group row tight filter_igd">
                                        <label class="col-3 col-form-label">Dokter DPJP</label>
                                        <div class="col-9">
                                            <input type="text" name="dokter_dpjp" class="select2-input bpjs_input" id="dokter_dpjp_bpjs">
                                        </div>
                                    </div>
                                    <div class="form-group row tight filter_igd">
                                        <label class="col-3 col-form-label"></label>
                                        <div class="col-9"></div>
                                    </div>
                                    <div class="form-group row tight">
                                        <label class="col-3 col-form-label">Tingkat Faskes</label>
                                        <div class="col-5">
                                            <?php $faskes = array('1' => 'Faskes Tingat 1', '2' => 'Faskes Tingkat 2'); ?>
                                            <?= form_dropdown('asal_rujukan', $faskes, array(), 'class="form-control" id="asal_rujukan_bpjs"') ?>
                                        </div>
                                    </div>
                                    <div class="form-group row tight">
                                        <label class="col-3 col-form-label">PPK Rujukan</label>
                                        <div class="col-9">
                                            <input type="text" name="ppk_rujukan" class="select2-input bpjs_input" id="ppk_rujukan_bpjs">
                                        </div>
                                    </div>
                                    <!-- End Rujukan -->

                                    <div class="form-group row tight">
                                        <label class="col-3 col-form-label">Tgl. SEP</label>
                                        <div class="col-4">
                                            <input type="text" name="tanggal_sep" class="form-control bpjs_input" id="tanggal_sep_bpjs" placeholder="Tanggal SEP">
                                        </div>
                                    </div>
                                    <div class="form-group row tight">
                                        <label class="col-3 col-form-label">Tgl. Rujukan</label>
                                        <div class="col-4">
                                            <input type="text" name="tanggal_rujukan" class="form-control bpjs_input" id="tanggal_rujukan_bpjs" placeholder="Tanggal Rujukan">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group row tight">
                                        <label class="col-3 col-form-label">No. Telp Pasien</label>
                                        <div class="col-9">
                                            <input type="text" name="no_telp_pasien" class="form-control bpjs_input" id="no_telp_pasien_bpjs" placeholder="No. Telp Pasien">
                                        </div>
                                    </div>
                                    <div class="form-group row tight">
                                        <label class="col-3 col-form-label">Diagnosa Awal</label>
                                        <div class="col-9">
                                            <input type="text" name="diag_awal" class="select2-input bpjs_input" id="diag_awal_bpjs">
                                        </div>
                                    </div>
                                    <div class="form-group row tight">
                                        <label class="col-3 col-form-label">Catatan</label>
                                        <div class="col-9">
                                            <textarea name="catatan" class="form-control bpjs_input" id="catatan_bpjs" rows="5"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row tight">
                                        <label class="col-3 col-form-label">COB</label>
                                        <div class="col-4">
                                            <?php $opsi_yesno = array('0' => 'Tidak', '1' => 'Ya'); ?>
                                            <?= form_dropdown('cob', $opsi_yesno, array(), 'class="form-control" id="cob_bpjs"') ?>
                                        </div>
                                    </div>
                                    <div class="form-group row tight">
                                        <label class="col-3 col-form-label">Katarak</label>
                                        <div class="col-4">
                                            <?php $opsi_yesno = array('0' => 'Tidak', '1' => 'Ya'); ?>
                                            <?= form_dropdown('katarak', $opsi_yesno, array(), 'class="form-control" id="katarak_bpjs"') ?>
                                        </div>
                                    </div>
                                    <br>
                                    <!-- Laka Lantas -->
                                    <div class="form-group row tight">
                                        <label class="col-3 col-form-label">Laka Lantas</label>
                                        <div class="col-4">
                                            <?php $opsi_yesno = array('0' => 'Tidak', '1' => 'Ya'); ?>
                                            <?= form_dropdown('laka_lantas', $opsi_yesno, array(), 'class="form-control" id="laka_lantas_bpjs"') ?>
                                        </div>
                                    </div>
                                    <div class="form-group row tight laka">
                                        <label class="col-3 col-form-label">Jaminan</label>
                                        <div class="col-9">
                                            <?php $jaminan = array('1' => 'Jasa Raharja PT', '2' => 'BPJS Ketenagakerjaan', '3' => 'TASPEN PT', '4' => 'ASABRI PT'); ?>
                                            <?= form_multiselect('jaminan[]', $jaminan, array('1'), 'class="form-control" id="jaminan_laka_bpjs"') ?>
                                        </div>
                                    </div>
                                    <div class="form-group row tight laka">
                                        <label class="col-3 col-form-label">Tgl. Kejadian</label>
                                        <div class="col-4">
                                            <input type="text" name="tanggal_kejadian" class="form-control bpjs_input" id="tanggal_kejadian_bpjs" placeholder="Tanggal Kejadian">
                                        </div>
                                    </div>
                                    <div class="form-group row tight laka">
                                        <label class="col-3 col-form-label">Keterangan</label>
                                        <div class="col-9">
                                            <textarea name="keterangan_kll" class="form-control bpjs_input" id="keterangan_kll_bpjs" rows="5"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row tight laka suplesi">
                                        <label class="col-3 col-form-label">Suplesi</label>
                                        <div class="col-4">
                                            <?php $opsi_yesno = array('0' => 'Tidak', '1' => 'Ya'); ?>
                                            <?= form_dropdown('suplesi', $opsi_yesno, array(), 'class="form-control" id="suplesi_bpjs"') ?>
                                        </div>
                                    </div>
                                    <div class="form-group row tight laka suplesi">
                                        <label class="col-3 col-form-label">No. SEP Suplesi</label>
                                        <div class="col-9">
                                            <input type="text" name="no_sep_suplesi" class="form-control bpjs_input" id="no_sep_suplesi_bpjs" placeholder="No. SEP Suplesi">
                                        </div>
                                    </div>
                                    <div class="form-group row tight laka suplesi">
                                        <label class="col-3 col-form-label"></label>
                                        <label class="col-3 col-form-label">Lokasi Laka</label>
                                    </div>
                                    <div class="form-group row tight laka suplesi">
                                        <label class="col-3 col-form-label">Provinsi</label>
                                        <div class="col-9">
                                            <input type="text" name="kd_provinsi" class="select2-input bpjs_input" id="kd_provinsi_bpjs">
                                        </div>
                                    </div>
                                    <div class="form-group row tight laka suplesi">
                                        <label class="col-3 col-form-label">Kabupaten</label>
                                        <div class="col-9">
                                            <input type="text" name="kd_kabupaten" class="select2-input bpjs_input" id="kd_kabupaten_bpjs">
                                        </div>
                                    </div>
                                    <div class="form-group row tight laka suplesi">
                                        <label class="col-3 col-form-label">Kecamatan</label>
                                        <div class="col-9">
                                            <input type="text" name="kd_kecamatan" class="select2-input bpjs_input" id="kd_kecamatan_bpjs">
                                        </div>
                                    </div>
                                    <!-- End Laka Lantas -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Batal</button>
                <button type="button" class="btn btn-info waves-effect" id="bt_create_sep" onclick="konfirmasiPembuatanSEP()"><i class="fas fa-save"></i> Buat SEP</button>
                <button type="button" class="btn btn-info waves-effect" id="bt_update_sep" onclick="konfirmasiUpdateSEP()"><i class="fas fa-edit"></i> Update SEP</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Form Pembuatan SEP Vclaim -->

<!-- Modal No Rujukan -->

<?php $this->load->view(DIR_VCLAIM.'js'); ?>
<?php $this->load->view(DIR_VCLAIM.'modal_ubah_poli'); ?>
<?php $this->load->view(DIR_VCLAIM.'modal_norujukan'); ?>