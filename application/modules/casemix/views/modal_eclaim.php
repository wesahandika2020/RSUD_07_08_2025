<script>
    function konfirmasiSimpanEklaim() {
        var id_pendaftaran = $('#id-pendaftaran-eclaim').val();
        var id_layanan_pendaftaran = $('#id-pendaftaran-eclaim').val();

        if ($('#diagnosa').val() == "") {

            swalCustom('warning', "Gagal!", "Tidak Dapat Melakukan Grouper. Harap Koding Semua Diagnosa!");

        } else {

            $.ajax({
                type: 'POST',
                url: '<?= base_url("pengkodean_icd_x/api/eklaim/simpan_data_eklaim") ?>',
                data: $('#form-eklaim').serialize(),
                cache: false,
                dataType: 'JSON',
                beforeSend: function() {
                    showLoader();
                },
                success: function(data) {
                    getListRekapBilling($('#page-now').val());
                    if (data.status) {
                        messageCustom(data.message, 'Success');

                        var dWidth = $(window).width();
                        var dHeight = $(window).height();
                        var x = screen.width / 2 - dWidth / 2;
                        var y = screen.height / 2 - dHeight / 2;

                        $('#modal-eclaim').modal('hide');

                    } else {
                        messageCustom(data.message, 'Error');
                    }
                },
                complete: function(data) {
                    hideLoader();
                },
                error: function(e) {
                    messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT', 'Error');
                }
            });
        }
    }
</script>

<!-- Modal eclaim -->
<div id="modal-eclaim" class="modal fade" role="dialog" data-backdrop="static" aria-labelledby="modal-eclaim-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 98%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-eclaim-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">

                <!-- Nama Form -->
                <?= form_open('', 'id=form-eklaim role=form class="form-horizontal form-custom"') ?>

                <!-- Input Hidden Form -->
                <input type="hidden" id="id-pasien-eclaim">
                <input type="hidden" id="id-dokter-eclaim">
                <input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-eclaim">
                <input type="hidden" name="id_pendaftaran" id="id-pendaftaran-eclaim">
                <input type="hidden" id="id-spesialis-eclaim">
                <input type="hidden" id="id-konsul-eclaim">
                <input type="hidden" id="no-ktp-pasien">
                <input type="hidden" id="id-layanan-ranap">
                <input type="hidden" id="jenis-rawat">
                <input type="hidden" name="tgl_lahir" id="tgl_lahir">
                <input type="hidden" name="icu_los" id="icu_los">
                <input type="hidden" name="coder_nik" value="<?= $this->session->userdata('nik') ?>" id="icu_los">

                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="30%" class="bold">Tanggal Pelayanan</td>
                                    <td width="80%">: <span id="tanggal-pelayanan-eclaim"></span></td>
                                </tr>
                                <tr>
                                    <td width="30%" class="bold">Nama Pasien</td>
                                    <td width="80%">: <span id="nama-pasien-eclaim"></span></td>
                                </tr>
                                <tr>
                                    <td width="30%" class="bold">No RM</td>
                                    <td width="80%">: <span id="no-rm-eclaim"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <tr>
                                    <td width="30%" class="bold">Jenis Pendaftaran</td>
                                    <td width="80%">: <span id="jenis-pendaftaran-eclaim"></span></td>
                                </tr>
                                <tr>
                                    <td width="30%" class="bold">Dokter</td>
                                    <td width="80%">: <span id="dokter-eclaim"></span></td>
                                </tr>
                                <tr>
                                    <td width="30%" class="bold">Tanggal Keluar</td>
                                    <td width="80%">: <span id="tanggal-keluar-eclaim"></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <br>
                        <h5 class="center"><b>DATA E-CLAIM</b></h5>
                        <div class="well">
                            <div class="row" style="margin-top: -30px;">
                                <div class="col-lg-4 right">
                                    <table class="table table-no-border table-sm table-striped" style="margin-top: 15px">
                                        <tr>
                                            <td class="bold right">Jaminan/Cara Bayar</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="cara_bayar" id="cara_bayar" class="custom-form clear-input d-inline-block col-lg-9" placeholder="Cara Bayar" readonly>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold right">No RM</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="nomor_rm" id="no_rm_eclaim" class="custom-form clear-input d-inline-block col-lg-9" placeholder="No RM">

                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold right">Jenis Kelamin</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="gender" id="jk_eclaim" class="custom-form clear-input d-inline-block col-lg-9" placeholder="Jenis Kelamin">

                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold right">Jenis Rawat</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="jenis_rawat" id="jenis_rawat_eclaim" class="custom-form clear-input d-inline-block col-lg-9" placeholder="Pelayanan">

                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold right" id="label-los"></td>
                                            <td class="bold">:</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="los_eclaim" id="los_eclaim" class="custom-form clear-input d-inline-block col-lg-9" placeholder="LOS">

                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold right">Dokter DPJP</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="nama_dokter" id="dokter_eclaim" class="custom-form clear-input d-inline-block col-lg-9" placeholder="DPJP">

                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold right">ADL Score</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="adl_eclaim" id="adl_eclaim" class="custom-form clear-input d-inline-block col-lg-9" placeholder="ADL Score">

                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-lg-4 center">
                                    <table class="table table-no-border table-sm table-striped" style="margin-top: 15px">
                                        <tr>
                                            <td class="bold right">No Peserta</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="nomor_kartu" id="nomor_kartu" class="custom-form clear-input d-inline-block col-lg-9" placeholder="No Peserta">

                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold right">Nama Pasien</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="nama_pasien" id="nama_pasien" class="custom-form clear-input d-inline-block col-lg-9" placeholder="Nama Pasien">

                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold right" id="tgl-rawat"></td>
                                            <td class="bold">:</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="tgl_masuk" id="tanggal_rawat_eclaim" class="custom-form clear-input d-inline-block col-lg-9" placeholder="Waktu Masuk">

                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold right">Kelas</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="kelas_rawat" id="kelas_rawat" class="custom-form clear-input d-inline-block col-lg-9" placeholder="Kelas">

                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold right">Waktu</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="waktu_eclaim" id="waktu_eclaim" class="custom-form clear-input d-inline-block col-lg-9" placeholder="Waktu">

                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold right">Cara Pulang</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="discharge_status" id="cara_pulang_eclaim" class="custom-form clear-input d-inline-block col-lg-9" placeholder="Cara Pulang">

                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold right">Sub Active</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="adl_sub_acute" id="sub_active_eclaim" class="custom-form clear-input d-inline-block col-lg-9" placeholder="Sub Active">

                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-lg-4 center">
                                    <table class="table table-no-border table-sm table-striped" style="margin-top: 15px">
                                        <tr>
                                            <td class="bold right">No SEP</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="nomor_sep" id="no_sep_eclaim" class="custom-form clear-input d-inline-block col-lg-9" placeholder="No SEP">

                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold right">Usia</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="umur" id="usia_eclaim" class="custom-form clear-input d-inline-block col-lg-9" placeholder="Umur">

                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold right">Tanggal Pulang</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="tgl_pulang" id="tgl_pulang" class="custom-form clear-input d-inline-block col-lg-9" placeholder="Tanggal Pulang">

                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold right">Hak Kelas</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="hak_kelas" id="hak_eclaim" class="custom-form clear-input d-inline-block col-lg-9" placeholder="Hak Kelas">

                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold right">Berat Lahir</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="birth_weight" id="berat_lahir_eclaim" class="custom-form clear-input d-inline-block col-lg-9" placeholder="Brat Lahir">

                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold right">Jenis Tarif</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="jenis_tarif" id="jenis_tarif_eclaim" value="CP" class="custom-form clear-input d-inline-block col-lg-9" placeholder="Jenis Tarif">

                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold right">Chronic</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="adl_chronic" id="chronic_eclaim" class="custom-form clear-input d-inline-block col-lg-9" placeholder="Chronic">

                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- 
                        <div class="modal-footer" id="button-new-eklaim" style="padding-bottom: 20px;">
                            <button type="button" class="btn btn-info waves-effect" onclick="newKlaim()"><i class="fas fa-save"></i> Klaim</button>
                        </div> -->

                        <div class="well">
                            <div class="row">

                                <div class="col-lg-12 center data-tarif-eclaim" id="tarif-eclaim">
                                    <label> Tarif Rumah Sakit : </label>
                                    <label id="tarif_rs_eclaim"></label>
                                </div><br>

                                <div class="col-lg-4 right data-tarif-eclaim" id="tarif-eclaim">
                                    <table class="table table-no-border table-sm table-striped" style="margin-top: 15px">
                                        <tr">
                                            <td class="bold right">Prosedur Non Bedah</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="prosedur_non_bedah" id="non_bedah_eclaim" class="custom-form clear-input d-inline-block col-lg-6" placeholder="Prosedur Non Bedah">

                                                </div>
                                            </td>
                                            </tr>
                                            <tr>
                                                <td class="bold right">Tenaga Ahli</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" name="tenaga_ahli" id="tenaga_ahli_eclaim" class="custom-form clear-input d-inline-block col-lg-6" placeholder="Tenaga Ahli">
                                                        <div class="input-group-append">
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold right">Radiologi</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" name="radiologi" id="radiologi_eclaim" class="custom-form clear-input d-inline-block col-lg-6" placeholder="Radiologi ">
                                                        <div class="input-group-append">
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold right">Rehabilitas</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" name="rehabilitasi" id="rehabilitas_eclaim" class="custom-form clear-input d-inline-block col-lg-6" placeholder="Rehabilitas">
                                                        <div class="input-group-append">
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold right">Obat</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" name="obat" id="obat_eclaim" class="custom-form clear-input d-inline-block col-lg-6" placeholder="Obat">
                                                        <div class="input-group-append">
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="bold right">Alkes</td>
                                                <td class="bold">:</td>
                                                <td>
                                                    <div class="input-group">
                                                        <input type="text" name="alkes" id="alkes_eclaim" class="custom-form clear-input d-inline-block col-lg-6" placeholder="Alkes">
                                                        <div class="input-group-append">
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                    </table>
                                </div>
                                <div class="col-lg-4 center data-tarif-eclaim" id="tarif-eclaim">
                                    <table class="table table-no-border table-sm table-striped" style="margin-top: 15px">
                                        <tr>
                                            <td class="bold right">Prosedur Bedah</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="prosedur_bedah" id="prosedur_bedah_eclaim" class="custom-form clear-input d-inline-block col-lg-6" placeholder="Prosedur Bedah">

                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold right">Keperawatan</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="keperawatan" id="keperawatan_eclaim" class="custom-form clear-input d-inline-block col-lg-6" placeholder="Keperawatan">

                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold right">Laboratorium</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="laboratorium" id="lab_eclaim" class="custom-form clear-input d-inline-block col-lg-6" placeholder="Laboratorium">

                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold right">Kamar / Akomodasi</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="kamar" id="kamar_eclaim" class="custom-form clear-input d-inline-block col-lg-6" placeholder="Biaya Kamar">

                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold right">Obat Kronis</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="obat_kronis" id="obat_kronis_eclaim" class="custom-form clear-input d-inline-block col-lg-6" placeholder="Obat Kronis">

                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold right">BHP</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="bmhp" id="bhp_eclaim" class="custom-form clear-input d-inline-block col-lg-6" placeholder="Biaya BHP">

                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-lg-4 center data-tarif-eclaim" id="tarif-eclaim">
                                    <table class="table table-no-border table-sm table-striped" style="margin-top: 15px">
                                        <tr>
                                            <td class="bold right">Konsultasi</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="konsultasi" id="konsultasi_eclaim" class="custom-form clear-input d-inline-block col-lg-6" placeholder="Biaya Konsultasi">

                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold right">Penunjang</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="penunjang" id="penunjang_eclaim" class="custom-form clear-input d-inline-block col-lg-6" placeholder="Biaya Penunjang">

                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold right">Pelayanan Darah</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="pelayanan_darah" id="darah_eclaim" class="custom-form clear-input d-inline-block col-lg-6" placeholder="Bank Darah">

                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold right">Rawat Intensif</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="rawat_intensif" id="intensif_eclaim" class="custom-form clear-input d-inline-block col-lg-6" placeholder="Intensif E-claim">

                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold right">Obat Kemoterapi</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="obat_kemoterapi" id="obat_kemo_eclaim" class="custom-form clear-input d-inline-block col-lg-6" placeholder="Obat Kemoterapi">

                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="bold right">Sewa Alat</td>
                                            <td class="bold">:</td>
                                            <td>
                                                <div class="input-group">
                                                    <input type="text" name="sewa_alat" id="sewa_alat_eclaim" class="custom-form clear-input d-inline-block col-lg-6" placeholder="Biaya Sewa Alat">

                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-lg-6 center data-tarif-eclaim" id="tarif-eclaim">
                                    <table class="table table-no-border table-sm table-striped" style="margin-top: 15px">
                                        <tr>
                                            <td colspan="3" class="bold center">Prosedur (ICD-9-CM)</td>
                                        </tr>
                                        <tr>
                                            <td width="30%" id="kode-prosedur-tindakan" class="bold right"></td>
                                            <td width="70%" id="prosedur-tindakan" class="bold left"></td>

                                            <input type="hidden" name="procedure" id="procedure" class="custom-form clear-input d-inline-block col-lg-6">
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-lg-6 center data-tarif-eclaim" id="tarif-eclaim">
                                    <table class="table table-no-border table-sm table-striped" style="margin-top: 15px">
                                        <tr>
                                            <td colspan="3" class="bold center">Diagnosa (ICD-10)</td>
                                        </tr>
                                        <tr>
                                            <td width="30%" id="kode-diagnosa" class="bold right"></td>
                                            <td width="70%" id="diagnosa-utama" class="bold left"></td>

                                            <input type="hidden" name="diagnosa" id="diagnosa" class="custom-form clear-input d-inline-block col-lg-6">
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" id="button-footer">
                <!-- <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button> -->
                <!-- <button type="button" class="btn btn-info waves-effect" onclick="konfirmasiSimpanEklaim()"><i class="fas fa-save"></i> Simpan</button> -->
            </div>
        </div>
        <?= form_close() ?>

    </div>
</div>
</div>
<!-- End Modal eclaim -->