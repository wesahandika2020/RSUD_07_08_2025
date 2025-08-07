<script>
$(function() {
    let accountGroup = "<?= $this->session->userdata('account_group') ?>";

    $('#rmf-dokter').select2c({
        ajax: {
            url: "<?= base_url('masterdata/api/masterdata_auto/dokter_auto') ?>",
            dataType: 'json',
            quietMillis: 100,
            data: function(term, page) { // page is the one-based page number tracked by Select2
                return {
                    q: term, //search term
                    page: page, // page number
                };
            },
            results: function(data, page) {
                var more = (page * 20) < data
                    .total; // whether or not there are more results available

                // notice we return the value of more so Select2 knows if more results can be loaded
                return {
                    results: data.data,
                    more: more
                };
            }
        },
        formatResult: function(data) {
            var markup = '<b>' + data.nama + '</b><br/><i>' + data.spesialisasi + '</i>';
            return markup;
        },
        formatSelection: function(data) {
            $('#id-petugas').val(data.id);
            return data.nama;
        }
    });

    $('#rmf-tanggal-program-0, #rmf-tanggal-program-1, #rmf-tanggal-program-2, #rmf-tanggal-program-3, #rmf-tanggal-program-4, #rmf-tanggal-program-5, #rmf-tanggal-program-6, #rmf-tanggal-program-7, #rmf-tanggal-program-8, #rmf-tanggal-program-9').datetimepicker({
        format: 'DD/MM/YYYY',
        maxDate: new Date(),
        beforeShow: function(i) {
            if ($(i).attr('readonly')) {
                return false;
            }
        }
    });

    // $('#rmf-status-1').click(function() {
    //     if ($(this).is(':checked')) {
    //         $('#btn-cetak').prop('hidden', false)
    //         $('#btn-simpan').prop('hidden', true)
    //     }
    // });

    // $('#rmf-status-0').click(function() {
    //     if ($(this).is(':checked')) {
    //         $('#btn-cetak').prop('hidden', true)
    //         $('#btn-simpan').prop('hidden', false)
    //     }
    // });

})

function simpanRehabMedik() {
    if ($('#rmf-tanggal-pelayanan').val() === '') {
        syams_validation('#rmf-tanggal-pelayanan', 'Tanggal harus diisi.');
        return false;
    } else {
        syams_validation_remove('#rmf-tanggal-pelayanan');
    }

    if ($('#rmf-dokter').val() === '') {
        syams_validation('#rmf-dokter', 'Nama Dokter harus diisi.');
        return false;
    } else {
        syams_validation_remove('#rmf-dokter');
    }

    var id = $('#id-pendaftaran-rmf').val();
    var id_pendaftaran_awal = $('#id-pendaftaran-awal').val();
    var id_layanan_pendaftaran_awal = $('#id-layanan-endaftaran-awal').val();
    var noRm = $('#id-pasien-rmf').val();
    var id_rmf = $('#id-rmf').val();
    // console.log(id_rmf);

    $.ajax({
        type: 'POST',
        url: '<?= base_url("pemeriksaan_poli/api/Protokol_terapi/simpan_rehab_medik_form") ?>',
        data: $('#form-rehab-medik').serialize() + '&id-pendaftaran-rmf=' + id + '&id-pasien-rmf=' + noRm + '&id-pendaftaran-awal=' + id_pendaftaran_awal + '&id-layanan-pendaftaran-awal=' + id_layanan_pendaftaran_awal + '&id-id-rmf=' + id_rmf,
        cache: false,
        dataType: 'JSON',
        beforeSend: function() {
            showLoader();
        },
        success: function(data) {
            
            if (data.status) {
                messageCustom(data.message, 'Success');

                var dWidth = $(window).width();
                var dHeight = $(window).height();
                var x = screen.width / 2 - dWidth / 2;
                var y = screen.height / 2 - dHeight / 2;

                window.open(
                    '<?= base_url("pemeriksaan_poli/cetak_form_rehab_medik/") ?>' + id, 'Cetak Form Rehab Medik', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);

                $("#rmf-status-1:checked").each(function() {
                    simpanLogRehabMedik();
                })
                $('#modal-rehab-medik').modal('hide');
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

function simpanLogRehabMedik() {
    var id = $('#id-pendaftaran-rmf').val();
    var id_pendaftaran_awal = $('#id-pendaftaran-awal').val();
    var noRm = $('#id-pasien-rmf').val();
    var id_rmf = $('#id-rmf').val();
    $.ajax({
        type: 'POST',
        url: '<?= base_url("pemeriksaan_poli/api/Protokol_terapi/simpan_log_rehab_medik_form") ?>',
        data: $('#form-rehab-medik').serialize() + '&id-pendaftaran-rmf=' + id + '&id-pasien-rmf=' + noRm + '&id-pendaftaran-awal=' + id_pendaftaran_awal + '&id-id-rmf=' + id_rmf,
        cache: false,
        dataType: 'JSON',
        beforeSend: function() {
            showLoader();
        },
        success: function(data) {
            
            if (data.status) {
                messageCustom(data.message, 'Success');

                $('#modal-rehab-medik').modal('hide');

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
</script>


<!-- Modal -->
<div class="modal fade" id="modal-rehab-medik" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 80%;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title">
                    <h5 class="modal-title bold" id="modal-rehab-medik-title"></h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-rehab-medik class="form-horizontal"') ?>
                <input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-rmf">
                <input type="hidden" name="id_layanan_pendaftaran_awal" id="id-layanan-pendaftaran-awal">
                <input type="hidden" name="id_pendaftaran" id="id-pendaftaran-rmf">
                <input type="hidden" name="id_pendaftaran_awal" id="id-pendaftaran-awal">
                <input type="hidden" name="id_pasien" id="id-pasien-rmf">
                <input type="hidden" name="id_rmf" id="id-rmf">
                <input type="hidden" name="id_rmf_log" id="id-rmf-log">
                <input type="hidden" name="id_users" value="<?= $this->session->userdata("id_translucent") ?>">

                <!-- content -->
                <div class="row">
                    <div class="col-lg">
                        <div class="widget-body">
                            <div id="wizard_form_rajal">
                                <div class="form-modal-rehab-medik">
                                <table class="table table-no-border table-sm table-striped" id="table-assesmen-awal">
                                        <thead>
                                            <tr>
                                                <td colspan="6">
                                                    <h4><b>ASESSMEN AWAL</b></h4>
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td width="20%">Tanggal Pelayanan</td>
                                                <td width="1%">:</td>
                                                <td colspan="3"><input type="text" id="rmf-tanggal-pelayanan" name="rmf_tanggal_pelayanan" class="custom-form clear-input d-inline-block col-lg-2" readonly></td>
                                            </tr>
                                            <tr>
                                                <td width="20%">Anamnesa</td>
                                                <td width="1%">:</td>
                                                <td colspan="3"><input type="text" id="rmf-anamnesa" name="rmf_anamnesa" class="custom-form clear-input d-inline-block col-lg-5" readonly></td>
                                            </tr>
                                            <tr>
                                                <td width="20%">Pemeriksaan Fisik dan Uji Fungsi</td>
                                                <td width="1%">:</td>
                                                <td><div id="rmf-pemeriksaan"></div></td>
                                            </tr>
                                            <tr>
                                                <td width="20%">Diagnosis Medis (ICD-10)</td>
                                                <td width="1%">:</td>
                                                <td><div id="rmf-diagnosa"></div></td>
                                            </tr>
                                            <tr>
                                                <td width="20%">Diagnosis Fungsi (ICD-10)</td>
                                                <td width="1%">:</td>
                                                <td colspan="3"><input type="text" id="rmf-diagnosis-fungsi" name="rmf_diagnosis_fungsi" class="custom-form clear-input d-inline-block col-lg-5"></td>
                                            </tr>
                                            <tr>
                                                <td width="20%">Pemeriksaan Penunjang</td>
                                                <td width="1%">:</td>
                                                <td colspan="3"><input type="text" id="rmf-pemeriksaan-penunjang" name="rmf_pemeriksaan_penunjang" class="custom-form clear-input d-inline-block col-lg-5" readonly></td>
                                            </tr>
                                            <tr>
                                                <td width="20%">Tata Laksana KFR (ICD 9 CM)</td>
                                                <td width="1%">:</td>
                                                <td colspan="3"><input type="text" id="rmf-tata-laksana" name="rmf_tata_laksana" class="custom-form clear-input d-inline-block col-lg-5" readonly></td>
                                            </tr>
                                            <tr>
                                                <td width="20%">Rekomendasi</td>
                                                <td width="1%">:</td>
                                                <td colspan="3"><input type="text" id="rmf-rekomendasi-asessmen" name="rmf_rekomendasi_asessmen" class="custom-form clear-input d-inline-block col-lg-5"></td>
                                            </tr>
                                            <tr>
                                                <td width="20%">Evaluasi</td>
                                                <td width="1%">:</td>
                                                <td colspan="3"><input type="text" id="rmf-evaluasi" name="rmf_evaluasi" class="custom-form clear-input d-inline-block col-lg-5"></td>
                                            </tr>
                                            <tr>
                                                <td width="20%">Suspek Penyakit Akibat Kerja</td>
                                                <td width="1%">:</td>
                                                <td>
                                                    <input type="radio" id="rmf-suspek-penyakit-1" name="rmf_suspek_penyakit" value="1" class="mr-1">
                                                    Ya
                                                    <input type="radio" id="rmf-suspek-penyakit-0" name="rmf_suspek_penyakit" value="0" class="mr-1 ml-3">
                                                    Tidak
                                                </td>
                                                
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-no-border table-sm table-striped">
                                        <tbody>
                                            <tr>
                                                <th colspan="3">
                                                    <h4><b>JADWAL PROGRAM TERAPI</b></h4>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td width="20%">Permintaan Terapi</td>
                                                <td width="1%">:</td>
                                                <td><input type="text" id="rmf-permintaan-terapi" name="rmf_permintaan_terapi" class="custom-form clear-input d-inline-block col-lg-5"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-bordered table-sm table-striped" id="table-program">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" class="text-center">PROGRAM</th>
                                                <th rowspan="2" class="text-center">TANGGAL</th>
                                                <th colspan="3" class="text-center">PARAF</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center">PASIEN</th>
                                                <th class="text-center">DOKTER</th>
                                                <th class="text-center">TERAPIS</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                    <table class="table table-bordered table-sm table-striped">
                                        <thead>
                                            <tr>
                                                <th colspan="3">
                                                    <h4><b>HASIL TINDAKAN UJI FUNGSI-PROSEDUR KEDOKTERAN FISIK DAN REHABILITASI MEDIS</b></h4>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td width="20%">Instrumen Uji Fungsi/Prosedur KFR</td>
                                                <td width="1%">:</td>
                                                <td><input type="text" id="rmf-instrumen-uji" name="rmf_instrumen_uji" class="custom-form clear-input d-inline-block col-lg-5"></td>
                                            </tr>
                                            <tr>
                                                <td width="20%">Hasil yang di dapat</td>
                                                <td width="1%">:</td>
                                                <td><input type="text" id="rmf-hasil" name="rmf_hasil" class="custom-form clear-input d-inline-block col-lg-5"></td>
                                            </tr>
                                            <tr>
                                                <td width="20%">Kesimpulan</td>
                                                <td width="1%">:</td>
                                                <td><input type="text" id="rmf-kesimpulan" name="rmf_kesimpulan" class="custom-form clear-input d-inline-block col-lg-5"></td>
                                            </tr>
                                            <tr>
                                                <td width="20%">Rekomendasi</td>
                                                <td width="1%">:</td>
                                                <td>
                                                    <input type="radio" id="rmf-rekomendasi-1" name="rmf_rekomendasi" value="1" class="mr-1">
                                                    Ya
                                                    <input type="radio" id="rmf-rekomendasi-0" name="rmf_rekomendasi" value="0" class="mr-1 ml-3">
                                                    Tidak
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="20%">Status Terapi</td>
                                                <td width="1%">:</td>
                                                <td>
                                                    <input type="radio" id="rmf-status-1" name="rmf_status" value="1" class="mr-1">
                                                    Sudah selesai
                                                    <input type="radio" id="rmf-status-0" name="rmf_status" value="0" class="mr-1 ml-3 checked">
                                                    Belum selesai
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="20%">Dokter Sp. KRF</td>
                                                <td width="1%">:</td>
                                                <td>
                                                    <input type="text" id="rmf-dokter" name="rmf_dokter" class="select2c-input col-lg-5">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?= form_close() ?>
                <!-- end content -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
                <button type="button" class="btn btn-info" onclick="simpanRehabMedik()"><i class="fas fa-fw fa-print mr-1"></i>Cetak</button>
                <!-- <button type="button" class="btn btn-info" onclick="simpanRehabMedik()" id="btn-simpan"><i class="fas fa-fw fa-save mr-1"></i>Simpan</button> -->
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->