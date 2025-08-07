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
                <input type="hidden" name="no_rm" id="no_rm_bpjs" class="bpjs_input">
                <input type="hidden" name="waktu_daftar" id="waktu_daftar" class="bpjs_input">
                <input type="hidden" name="no_sep" id="no_sep_bpjs" class="bpjs_input">
                <input type="hidden" name="kode_bpjs" id="kode_bpjs" class="bpjs_input">
                <input type="hidden" id="kode_dokter_temp" class="bpjs_input">
                <input type="hidden" id="dokter_temp" class="bpjs_input">
                <input type="hidden" id="status-antrian" value="0">
                <input type="hidden" id="page-antrian" value="1">
                <input type="hidden" name="kode_booking_antrian" id="kode-booking-antrian">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card bg-theme text-white">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 col-sm-4 text-center">
                                        <a href="javascript:void(0)">
                                            <img src="<?php echo resource_url() . 'images/avatars/male_bpjs.png' ?>" width="80%" alt="" class="img-circle img-responsive ava_bpjs">
                                        </a>
                                    </div>
                                    <div class="col-md-8 col-sm-8">
                                        <h3 class="card-title m-b-0"><span id="nama_bpjs" class="bpjs_label"></span></h3>
                                        <p></p>
                                        <address class="mb-n2"><h5 id="no_kartu_bpjs" class="bpjs_label" style="display:inline-block"></h5><button onclick="copyToClipboard('#no_kartu_bpjs')" class="btn btn-xs ml-2 btn-light"><i class="fas fa-copy"></i> Copy</button></address>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-sm">
                            <tbody>
                                <tr>
                                    <td width="30%"><strong>NIK</strong></td>
                                    <td width="1%"><strong>:</strong></td>
                                    <td wdith="69%"><span id="nik_bpjs" class="bpjs_label"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Kelamin</strong></td>
                                    <td><strong>:</strong></td>
                                    <td><span id="kelamin_bpjs" class="bpjs_label"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Tgl. Lahir</strong></td>
                                    <td><strong>:</strong></td>
                                    <td><span id="tgl_lahir_bpjs" class="bpjs_label"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Kode Provider</strong></td>
                                    <td><strong>:</strong></td>
                                    <td><span id="kode_provider_bpjs" class="bpjs_label"></span><button onclick="copyToClipboard('#kode_provider_bpjs')" class="btn btn-xs ml-2 btn-light"><i class="fas fa-copy"></i> Copy</button></td>
                                </tr>
                                <tr>
                                <tr>
                                    <td><strong>Nama Provider</strong></td>
                                    <td><strong>:</strong></td>
                                    <td><span id="nama_provider_bpjs" class="bpjs_label"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Jenis Peserta</strong></td>
                                    <td><strong>:</strong></td>
                                    <td><span id="jenis_peserta_bpjs" class="bpjs_label"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Kelas</strong></td>
                                    <td><strong>:</strong></td>
                                    <td><span id="kelas_label_bpjs" class="bpjs_label"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Status Peserta</strong></td>
                                    <td><strong>:</strong></td>
                                    <td><span id="status_bpjs" class="bpjs_label"></span></td>
                                </tr>
                            </tbody>
                        </table>
                        <ul class="list-group">
                            <li class="list-group-item bg-theme text-white"><strong><i class="fas fa-clipboard-list mx-1"></i>Data Rujukan Terakhir <button type="button" class="btn btn-xs btn-light ml-2 reload_rujukan_sep"><i class="fas fa-sync-alt mr-1"></i>Sync Data</button></strong></li>
                        </ul>
                        <table class="table table-striped table-hover table-sm">
                            <tbody>
                                <tr>
                                    <td colspan="3">
                                        <button type="button" class="btn btn-info btn-xs float-right" onclick="useRujukan()"><i class="fas fa-arrow-circle-right m-r-5"></i>Gunakan Rujukan Terakhir</button>
                                        <button type="button" class="btn btn-success btn-xs float-right list_rujukan_sep mr-1"><i class="fas fa-list m-r-5"></i>List History Data Rujukan</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="35%"><strong>Jenis Rujukan</strong></td>
                                    <td width="1%"><strong>:</strong></td>
                                    <td width="64%">
                                        <?php
                                            $jenis_rujukan = ['1' => 'PCare', '2' => 'Rumah Sakit'];
                                            echo form_dropdown('', $jenis_rujukan, array(), 'class="custom-form" id=jenis_rujukan_bpjs');
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>No. Rujukan</strong></td>
                                    <td><strong>:</strong></td>
                                    <td><span id="no_rujukan_last" class="bpjs_label"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Tanggal Rujukan</strong></td>
                                    <td><strong>:</strong></td>
                                    <td><span id="tanggal_rujukan_last" class="bpjs_label"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Kd Provider Rujukan</strong></td>
                                    <td><strong>:</strong></td>
                                    <td><span id="kode_provider_rujukan_last" class="bpjs_label"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Provider Rujukan</strong></td>
                                    <td><strong>:</strong></td>
                                    <td><span id="provider_rujukan_last" class="bpjs_label"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Kode ICD</strong></td>
                                    <td><strong>:</strong></td>
                                    <td><span id="icd_rujukan_last" class="bpjs_label"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Diagnosa</strong></td>
                                    <td><strong>:</strong></td>
                                    <td><span id="diagnosa_rujukan_last" class="bpjs_label"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Poli Tujuan</strong></td>
                                    <td><strong>:</strong></td>
                                    <td><span id="poli_rujukan_last" class="bpjs_label"></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Keluhan</strong></td>
                                    <td><strong>:</strong></td>
                                    <td><span id="keluhan_rujukan_last" class="bpjs_label"></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">

                        <div class="box-well">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h6 class="text-red bold">* Wajib Diisi</h6>
                                </div>
                                <div class="col-lg-12">
                                    <input type="hidden" name="jenis_pelayanan" id="jenis_pelayanan_bpjs">
                                    <div class="form-group row tight">
                                        <label for="jenis_pelayanan" class="col-3 col-form-label bold right">Pelayanan</label>
                                        <div class="col-9">
                                            <?php
                                            $jenis_pelayanan = array('1' => 'Rawat Inap', '2' => 'Rawat Jalan');
                                            echo form_dropdown('', $jenis_pelayanan, array(), 'class="form-control" id="jenis_pelayanan2_bpjs"');
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group row tight kode_poli_area">
                                        <label for="kode_poli" class="col-3 col-form-label bold right">Spesialis/SubSpesialis <span class="text-red">*</span></label>
                                        <div class="col-9">
                                            <input type="text" name="" class="select2-input" id="kode_poli_auto">
                                        </div>
                                    </div>
                                    <div class="form-group row tight" id="label_poli_area">
                                        <label for="kode_poli" class="col-3 col-form-label bold right">Spesialis/SubSpesialis <span class="text-red">*</span></label>
                                        <div class="col-9">
                                            <div class="input-group">
                                                <span class="input-group-text" style="border-top-right-radius:0;border-bottom-right-radius:0;">
                                                    <div class="form-check">
                                                        <input type="checkbox" name="klinik_eksekutif" class="form-check-input mt-1" value="1" id="klinik_eksekutif_bpjs">
                                                        <label class="form-check-label" for="klinik_eksekutif_bpjs">Eksekutif</label>
                                                    </div>
                                                </span>
                                                <button type="button" class="btn btn-xs btn-info" onclick="ubahPoliSub()" title="Klik untuk mengubah poli / sub spesialis" style="border-top-right-radius:0;border-bottom-right-radius:0;border-top-left-radius:0;border-bottom-left-radius:0;"><i class="fas fa-exchange-alt mx-1"></i>Ubah</button>
                                                <input type="text" id="label_poli_bpjs" class="form-control bpjs_input" disabled>
                                            </div>
                                            <!-- <h5 id="label_poli_bpjs" class="m-t-10"></h5> -->
                                        </div>
                                    </div>
                                    <div class="form-group row tight filter_igd">
                                        <label class="col-3 col-form-label bold right">Filter Spesialis IGD</label>
                                        <div class="col-9">
                                            <input type="text" name="" class="select2-input" id="spesialis_igd_auto">
                                        </div>
                                    </div>
                                    <div class="form-group row tight filter_igd">
                                        <label class="col-3 col-form-label bold right"></label>
                                        <div class="col-9">
                                            <span class="text-red"><small><em>*) Untuk menampilkan DPJP pilih filter spesialis sesuai dengan spesialis DPJP nya.</em></small></span>
                                        </div>
                                    </div>

                                    <div class="form-group row tight">
                                        <label class="col-3 col-form-label bold right">DPJP yang Melayani <span class="text-red">*</span></label>
                                        <div class="col-9">
                                            <input type="text" name="dokter_dpjp" class="select2-input bpjs_input" id="dokter_dpjp_bpjs">
                                        </div>
                                    </div>
                                    <div class="form-group row tight">
                                        <label class="col-3 col-form-label bold right">Asal Rujukan</label>
                                        <div class="col-4">
                                            <?php $faskes = array('1' => 'Faskes Tingat 1', '2' => 'Faskes Tingkat 2'); ?>
                                            <?= form_dropdown('asal_rujukan', $faskes, array(), 'class="form-control" id="asal_rujukan_bpjs"') ?>
                                        </div>
                                    </div>
                                    <div class="form-group row tight">
                                        <label class="col-3 col-form-label bold right">PPK Asal Rujukan <span class="text-red">*</span></label>
                                        <div class="col-9">
                                            <input type="text" name="ppk_rujukan" class="select2-input bpjs_input" id="ppk_rujukan_bpjs">
                                        </div>
                                    </div>
                                    <div class="form-group row tight sep_igd">
                                        <label class="col-3 col-form-label bold right"><small class="text-muted">(dd/mm/yyyy)</small> Tgl. Rujukan</label>
                                        <div class="col-4">
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    <i class="fas fa-calendar-alt"></i>
                                                </span>
                                                <input type="text" name="tanggal_rujukan" autocomplete="off" class="form-control bpjs_input" id="tanggal_rujukan_bpjs" placeholder="Tanggal Rujukan">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row tight sep_igd">
                                        <label for="no_rujukan" class="col-3 col-form-label bold right">No. Rujukan <span class="text-red">*</span></label>
                                        <div class="col-9">
                                            <input type="text" name="no_rujukan" class="form-control bpjs_input" id="no_rujukan_bpjs" placeholder="No. Rujukan">
                                        </div>
                                    </div>
                                    <div class="form-group row tight sep_igd">
                                        <label for="no_skdp" class="col-3 col-form-label bold right label_surat_kontrol">No. Surat Kontrol/SKDP <span class="text-red ml-1">*</span></label>
                                        <div class="col-9">
                                            <div class="input-group">
                                                <button type="button" class="btn btn-xs btn-info" onclick="getSuratKontrolByNoKartu()" title="Klik untuk melihat history no. surat" style="border-top-right-radius:0;border-bottom-right-radius:0;"><i class="fas fa-list mx-1"></i>History Nomor</button>
                                                <input type="text" name="no_skdp" class="form-control bpjs_input" id="no_skdp_bpjs" placeholder="No. Surat Kontrol">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row tight">
                                        <label class="col-3 col-form-label bold right"><small class="text-muted">(dd/mm/yyyy)</small> Tgl. SEP <span class="text-red">*</span></label>
                                        <div class="col-4">
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    <i class="fas fa-calendar-alt"></i>
                                                </span>
                                                <input type="text" name="tanggal_sep" autocomplete="off" class="form-control bpjs_input" id="tanggal_sep_bpjs" placeholder="Tanggal SEP">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row tight">
                                        <label class="col-3 col-form-label bold right">No. RM <span class="text-red">*</span></label>
                                        <div class="col-4">
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    <div class="form-check">
                                                        <input type="checkbox" name="cob" class="form-check-input mt-1" value="1" id="cob_bpjs">
                                                        <label class="form-check-label" for="cob_bpjs">Peserta COB</label>
                                                    </div>
                                                </span>
                                                <input type="text" id="no_rm2_bpjs" class="form-control bpjs_input" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row tight sep_ranap" style="display:none">
                                        <label for="kelas" class="col-3 col-form-label bold right">Kelas Rawat</label>
                                        <div class="col-5">
                                            <?php $opsi_yesno = array('0' => 'Tidak', '1' => 'Ya'); ?>
                                            <?= form_dropdown('kelas', array(), array(), 'class="form-control" id="kelas_bpjs"') ?>
                                        </div>
                                    </div>
                                    <div class="form-group row tight sep_ranap" style="display:none">
                                        <label for="kelas" class="col-3 col-form-label bold right"></label>
                                        <div class="col-9">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="1" id="kelas_naik">
                                                <label class="form-check-label" for="kelas_naik">Naik Kelas Rawat Inap</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row tight naik_kelas_rawat" style="display:none">
                                        <label for="kelas" class="col-3 col-form-label bold right">Kelas Rawat Inap</label>
                                        <div class="col-5">
                                            <?php $kelas_rawat = array('' => 'Pilih Kelas', '1' => 'VVIP', '2' => 'VIP', '3' => 'Kelas 1', '4' => 'Kelas 2', '5' => 'Kelas 3', '6' => 'ICCU', '7' => 'ICU', '8' => 'Diatas Kelas 1'); ?>
                                            <?= form_dropdown('kelas_rawat', $kelas_rawat, array(), 'class="form-control" id="kelas_rawat_bpjs"') ?>
                                        </div>
                                    </div>
                                    <div class="form-group row tight naik_kelas_rawat" style="display:none">
                                        <label for="kelas" class="col-3 col-form-label bold right">Pembiayaan</label>
                                        <div class="col-5">
                                            <?php $pembiayaan = array('' => 'Pilih Pembiayaan', '1' => 'Pribadi', '2' => 'Pemberi Kerja', '3' => 'Asuransi Kesehatan Tambahan'); ?>
                                            <?= form_dropdown('pembiayaan', $pembiayaan, array(), 'class="form-control" id="pembiayaan_bpjs"') ?>
                                        </div>
                                    </div>
                                    <div class="form-group row tight naik_kelas_rawat" style="display:none">
                                        <label for="kelas" class="col-3 col-form-label bold right">Nama Penanggung Jawab <span class="text-red">*</span></label>
                                        <div class="col-9">
                                            <input type="text" name="penanggung_jawab" id="penanggung_jawab_bpjs" class="form-control bpjs_input" readonly placeholder="Jika Pembiayaan Oleh [Pemberi Kerja] atau [Asuransi Kesehatan Tambahan]">
                                        </div>
                                    </div>
                                    <div class="form-group row tight">
                                        <label class="col-3 col-form-label bold right">No. Telepon <span class="text-red">*</span></label>
                                        <div class="col-9">
                                            <input type="text" name="no_telp_pasien" class="form-control bpjs_input" id="no_telp_pasien_bpjs" placeholder="No. Telp Pasien" maxlength="15" onkeypress="return hanyaAngka(event)">
                                        </div>
                                    </div>
                                    <div class="form-group row tight">
                                        <label class="col-3 col-form-label bold right">Diagnosa <span class="text-red">*</span></label>
                                        <div class="col-9">
                                            <input type="text" name="diag_awal" class="select2-input bpjs_input" id="diag_awal_bpjs">
                                        </div>
                                    </div>
                                    <div class="form-group row tight">
                                        <label class="col-3 col-form-label bold right">Catatan</label>
                                        <div class="col-9">
                                            <textarea name="catatan" class="form-control bpjs_input" id="catatan_bpjs" rows="2" placeholder="Ketik Catatan Apabila Ada"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row tight sep_ranap mata" style="display:none">
                                        <label class="col-3 col-form-label bold right">Katarak</label>
                                        <div class="col-9">
                                            <div class="form-check mt-2">
                                                <input type="checkbox" name="katarak" class="form-check-input mt-1" value="1" id="katarak_bpjs">
                                                <label class="form-check-label" for="katarak_bpjs">Jika Peserta Tersebut Mendapatkan Surat Perintah Operasi katarak</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row tight">
                                        <label class="col-3 col-form-label bold right">Status Kecelakaan <span class="text-red">*</span></label>
                                        <div class="col-9">
                                            <?php $status_kecelakaan = array(
                                                '0' => 'Bukan Kecelakaan',
                                                '1' => 'Kecelakaan Lalu Lintas dan Bukan Kecelakaan Kerja',
                                                '2' => 'Kecelakaan Lalu Lintas dan Kecelakaan Kerja',
                                                '3' => 'Kecelakaan Kerja',
                                            ); ?>
                                            <?= form_dropdown('laka_lantas', $status_kecelakaan, array(), 'class="form-control" id="laka_lantas_bpjs"') ?>
                                        </div>
                                    </div>
                                    <div class="form-group row tight laka">
                                        <label class="col-3 col-form-label bold right">Tgl. Kejadian</label>
                                        <div class="col-4">
                                            <input type="text" name="tanggal_kejadian" autocomplete="off" class="form-control bpjs_input" id="tanggal_kejadian_bpjs" placeholder="Tanggal Kejadian">
                                        </div>
                                    </div>
                                    <div class="form-group row tight laka">
                                        <label class="col-3 col-form-label bold right">No. LP</label>
                                        <div class="col-4">
                                            <input type="text" name="no_laporan_polisi" class="form-control bpjs_input" id="no_laporan_polisi_bpjs" placeholder="No. Laporan Polisi">
                                        </div>
                                    </div>
                                    <div class="form-group row tight laka suplesi">
                                        <label class="col-3 col-form-label bold right">Suplesi</label>
                                        <div class="col-4">
                                            <?php $opsi_yesno = array('0' => 'Tidak', '1' => 'Ya'); ?>
                                            <?= form_dropdown('suplesi', $opsi_yesno, array(), 'class="form-control" id="suplesi_bpjs"') ?>
                                        </div>
                                    </div>
                                    <div class="form-group row tight laka suplesi">
                                        <label class="col-3 col-form-label bold right">No. SEP Suplesi</label>
                                        <div class="col-9">
                                            <input type="text" name="no_sep_suplesi" class="form-control bpjs_input" id="no_sep_suplesi_bpjs" placeholder="No. SEP Suplesi">
                                        </div>
                                    </div>
                                    <div class="form-group row tight laka suplesi">
                                        <label class="col-3 col-form-label bold"></label>
                                        <label class="col-3 col-form-label bold">Lokasi Kejadian</label>
                                    </div>
                                    <div class="form-group row tight laka suplesi">
                                        <label class="col-3 col-form-label bold right">Provinsi</label>
                                        <div class="col-9">
                                            <input type="text" name="kd_provinsi" class="select2-input bpjs_input" id="kd_provinsi_bpjs">
                                        </div>
                                    </div>
                                    <div class="form-group row tight laka suplesi">
                                        <label class="col-3 col-form-label bold right">Kabupaten</label>
                                        <div class="col-9">
                                            <input type="text" name="kd_kabupaten" class="select2-input bpjs_input" id="kd_kabupaten_bpjs">
                                        </div>
                                    </div>
                                    <div class="form-group row tight laka suplesi">
                                        <label class="col-3 col-form-label bold right">Kecamatan</label>
                                        <div class="col-9">
                                            <input type="text" name="kd_kecamatan" class="select2-input bpjs_input" id="kd_kecamatan_bpjs">
                                        </div>
                                    </div>
                                    <div class="form-group row tight laka">
                                        <label class="col-3 col-form-label bold right">Kejadian Keterangan</label>
                                        <div class="col-9">
                                            <textarea name="keterangan_kll" class="form-control bpjs_input" id="keterangan_kll_bpjs" rows="5"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row tight sep_igd">
                                        <label class="col-3 col-form-label bold right">Tujuan Kunjungan</label>
                                        <div class="col-5">
                                            <?php $tujuan_kunjungan = array('0' => 'Normal', '1' => 'Prosedur', '2' => 'Konsul Dokter'); ?>
                                            <?= form_dropdown('tujuan_kunjungan', $tujuan_kunjungan, array(), 'class="form-control" id="tujuan_kunjungan_bpjs"') ?>
                                        </div>
                                    </div>
                                    <div class="form-group row tight sep_igd prosedur" style="display:none">
                                        <label class="col-3 col-form-label bold right">Prosedur</label>
                                        <div class="col-9">
                                            <?php $prosedur = array('' => 'Pilih Prosedur', '0' => 'Prosedur Tidak Berkelanjutan', '1' => 'Prosedur dan Terapi Berkelanjutan'); ?>
                                            <?= form_dropdown('prosedur', $prosedur, array(), 'class="form-control" id="prosedur_bpjs"') ?>
                                        </div>
                                    </div>
                                    <div class="form-group row tight sep_igd penunjang_prosedur" style="display:none">
                                        <label class="col-3 col-form-label bold right">Penunjang</label>
                                        <div class="col-9 penunjang_select">
                                            <select name="penunjang" class="form-control" id="penunjang_prosedur_bpjs">
                                                <option value="">Pilih Poli Penunjang</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row tight sep_igd assessment_pelayanan">
                                        <label class="col-3 col-form-label bold right">Assessment Pelayanan</label>
                                        <div class="col-9 assessment_pelayanan_select">
                                            <select name="assessment_pelayanan" class="form-control" id="assessment_pelayanan_bpjs">
                                                <option value="">Pilih Assessment Pelayanan</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <ul class="list-group">
                            <li class="list-group-item bg-theme text-white mb-2"><strong><i class="fas fa-clipboard-list mx-1"></i>List History SEP <button type="button" class="btn btn-xs btn-light ml-2 reload_histori_sep"><i class="fas fa-sync-alt mr-1"></i>Sync Data</button></strong></li>
                        </ul>
                        <div style="max-height:800px;overflow-y:auto" id="history_scroll"></div>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <span class="text-muted"><small><em><i class="fas fa-info-circle mr-1"></i>Bridging V-Claim Ver. 2.0 | Pembuatan/Perubahan SEP sama dengan menggunakan aplikasi V-Claim.</em></small></span>
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

<?php $this->load->view(DIR_VCLAIM . 'js'); ?>
<?php $this->load->view(DIR_VCLAIM . 'modal_ubah_poli'); ?>
<?php $this->load->view(DIR_VCLAIM . 'modal_norujukan'); ?>