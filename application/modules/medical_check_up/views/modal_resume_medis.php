<script>
    $(function() {
        $('#mcu-tanggal-surat').datetimepicker({
            format: 'DD/MM/YYYY',
            pickSecond: false,
            pick12HourFormat: false,
            maxDate: new Date(),
            beforeShow: function(i) {
                if ($(i).attr('readonly')) {
                    return false;
                }
            }
        });

        $('#mcu-dokter').select2c({
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
                $('#dokter-informasi').val(data.id);
                return data.nama;
            }
        });

    })

    function simpanMcu() {
        if ($('#mcu-tanggal-surat').val() === '') {
            syams_validation('#mcu-tanggal-surat', 'Tanggal harus diisi.');
            return false;
        } else {
            syams_validation_remove('#mcu-tanggal-surat');
        }

        if ($('#mcu-dokter').val() === '') {
            syams_validation('#mcu-dokter', 'Nama Dokter belum diisi.');
            return false;
        } else {
            syams_validation_remove('#mcu-dokter');
        }
        var id = $('#id-layanan-pendaftaran-mcu').val();
        $.ajax({
            type: 'POST',
            url: '<?= base_url("medical_check_up/api/medical_check_up/simpan_mcu") ?>',
            data: $('#resume-medis').serialize(),
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

                    $('#modal_surat_narkoba').modal('hide');

                    window.open('<?= base_url('medical_check_up/cetak_surat_hrm/') ?>' + id,
                        'Cetak Surat Hasil Resume Medical Check Up', 'width=' + dWidth + ', height=' +
                        dHeight +
                        ', left=' + x + ', top=' + y);
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

<!-- Modal FormModal Form SKPK MCU -->
<div class="modal fade" id="modal-resume-medis" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 70%;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title">
                    <h5 id="modal-resume-medis-title"></h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=resume-medis class="form-horizontal"') ?>
                <input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-mcu">
                <input type="hidden" name="id_pendaftaran" id="id-pendaftaran">

                <!-- content -->
                <div class="row">
                    <div class="col">
                        <div class="widget-body">
                            <div class="resume-medis">
                                <table class="table table-no-border table-sm table-striped">
                                    <tr>
                                        <td width="20%">Unit Kerja</td>
                                        <td width="1%">:</td>
                                        <td>
                                            <input type="text" name="mcu_unit_kerja" class="custom-form col-lg-6" id="mcu-unit-kerja">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Nama</td>
                                        <td width="1%">:</td>
                                        <td>
                                            <input type="text" name="mcu_nama_pasien" class="custom-form col-lg-6" id="mcu-nama-pasien" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Jenis Kelamin</td>
                                        <td width="1%">:</td>
                                        <td>
                                            <input type="text" name="mcu_jenis_kelamin" class="custom-form col-lg-2" id="mcu-jenis-kelamin" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Tanggal Lahir</td>
                                        <td width="1%">:</td>
                                        <td>
                                            <input type="text" name="mcu_tanggal_lahir" class="custom-form col-lg-2" id="mcu-tanggal-lahir" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Alamat</td>
                                        <td width="1%">:</td>
                                        <td>
                                            <textarea name="mcu_alamat" class="custom-form col-lg-6" id="mcu-alamat" disabled>
                                            </textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Pekerjaan</td>
                                        <td width="1%">:</td>
                                        <td>
                                            <input type="text" name="mcu_pekerjaan" class="custom-form col-lg-6" id="mcu-pekerjaan" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Keperluan</td>
                                        <td td width="1%">:</td>
                                        <td>
                                            <input type="text" name="mcu_keperluan" class="custom-form col-lg-6" id="mcu-keperluan" disabled>
                                        </td>
                                    </tr>
                                    <tr class="mt-2">
                                        <td class="bold" colspan="3">A. ANAMNESA</td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Keluhan Saat Ini</td>
                                        <td width="1%">:</td>
                                        <td>
                                            <input type="text" name="mcu_ksi" class="custom-form col-lg-6" id="mcu-ksi" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">RPD (Riwayat Penyakit Terdahulu)</td>
                                        <td width="1%">:</td>
                                        <td>
                                            <input type="text" name="mcu_rpd" class="custom-form col-lg-6" id="mcu-rpd" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">RPK (Riwayat Penyakit Keluarga)</td>
                                        <td width="1%">:</td>
                                        <td>
                                            <input type="text" name="mcu_rpk" class="custom-form col-lg-6" id="mcu-rpk" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" colspan="3">B. PEMERIKSAAN FISIK</td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Tinggi Badan</td>
                                        <td width="1%">:</td>
                                        <td class="d-flex">
                                            <input type="text" name="mcu_tinggi_badan" class="custom-form col-lg-2 mr-2" id="mcu-tinggi-badan" disabled>Cm
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Berat Badan</td>
                                        <td width="1%">:</td>
                                        <td class="d-flex">
                                            <input type="text" name="mcu_berat_badan" class="custom-form col-lg-2 mr-2" id="mcu-berat-badan" disabled>Kg
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">BMI</td>
                                        <td width="1%">:</td>
                                        <td class="d-flex">
                                            <input type="text" name="mcu_bmi" class="custom-form col-lg-2 mr-2" id="mcu-bmi" disabled>Kg/m2
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Tekanan Darah</td>
                                        <td width="1%">:</td>
                                        <td class="d-flex">
                                            <input type="text" name="mcu_tensi_sistolik" class="custom-form col-lg-1 mr-2" id="mcu-tensi-sistolik" disabled>/
                                            <input type="text" name="mcu_tensi_diastolik" class="custom-form col-lg-1 mx-2" id="mcu-tensi-diastolik" disabled>
                                            mmHg
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Nadi</td>
                                        <td width="1%">:</td>
                                        <td class="d-flex">
                                            <input type="text" name="mcu_nadi" class="custom-form col-lg-2 mr-2" id="mcu-nadi" disabled>x/m
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Respirasi</td>
                                        <td width="1%">:</td>
                                        <td class="d-flex">
                                            <input type="text" name="mcu_rr" class="custom-form col-lg-2 mr-2" id="mcu-rr" disabled>x/m
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Kepala</td>
                                        <td width="1%">:</td>
                                        <td class="d-flex">
                                            <input type="text" name="mcu_kepala" class="custom-form col-lg-6" id="mcu-kepala" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Kulit</td>
                                        <td width="1%">:</td>
                                        <td class="d-flex">
                                            <input type="text" name="mcu_kulit" class="custom-form col-lg-6" id="mcu-kulit" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Mata</td>
                                        <td width="1%">:</td>
                                        <td class="d-flex">
                                            <input type="text" name="mcu_mata" class="custom-form col-lg-6" id="mcu-mata" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Persepsi warna</td>
                                        <td width="1%">:</td>
                                        <td class="d-flex">
                                            <input type="text" name="mcu_persepsi_warna" class="custom-form col-lg-6" id="mcu-persepsi-warna">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Visus jauh (kacamata)</td>
                                        <td width="1%">:</td>
                                        <td class="d-flex">
                                            <input type="text" name="mcu_jauh_od" class="custom-form col-lg-1 mr-2" id="mcu-jauh-od">OD
                                            <input type="text" name="mcu_jauh_os" class="custom-form col-lg-1 ml-4 mr-2" id="mcu-jauh-os">
                                            OS
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Visus dekat</td>
                                        <td width="1%">:</td>
                                        <td class="d-flex">
                                            <input type="text" name="mcu_dekat_od" class="custom-form col-lg-1 mr-2" id="mcu-dekat-od">OD
                                            <input type="text" name="mcu_dekat_os" class="custom-form col-lg-1 ml-4 mr-2" id="mcu-dekat-os">OS
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Konjungtiva</td>
                                        <td width="1%">:</td>
                                        <td class="d-flex">
                                            <input type="text" name="mcu_konjungtiva" class="custom-form col-lg-6" id="mcu-konjungtiva">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Sklera</td>
                                        <td width="1%">:</td>
                                        <td class="d-flex">
                                            <input type="text" name="mcu_sklera" class="custom-form col-lg-6" id="mcu-sklera">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Komea</td>
                                        <td width="1%">:</td>
                                        <td class="d-flex">
                                            <input type="text" name="mcu_komea" class="custom-form col-lg-6" id="mcu-komea">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Telinga</td>
                                        <td width="1%">:</td>
                                        <td class="d-flex">
                                            <input type="text" name="mcu_telinga" class="custom-form col-lg-6" id="mcu-telinga" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Hidung</td>
                                        <td width="1%">:</td>
                                        <td class="d-flex">
                                            <input type="text" name="mcu_hidung" class="custom-form col-lg-6" id="mcu-hidung" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Tenggorokan</td>
                                        <td width="1%">:</td>
                                        <td class="d-flex">
                                            <input type="text" name="mcu_tenggorokan" class="custom-form col-lg-6" id="mcu-tenggorokan" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Gigi dan mulut</td>
                                        <td width="1%">:</td>
                                        <td class="d-flex">
                                            <input type="text" name="mcu_gdm" class="custom-form col-lg-6" id="mcu-gdm">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Leher</td>
                                        <td width="1%">:</td>
                                        <td class="d-flex">
                                            <input type="text" name="mcu_leher" class="custom-form col-lg-6" id="mcu-leher" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Dada</td>
                                        <td width="1%">:</td>
                                        <td class="d-flex">
                                            <input type="text" name="mcu_dada" class="custom-form col-lg-6" id="mcu-dada" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Jantung</td>
                                        <td width="1%">:</td>
                                        <td class="d-flex">
                                            <input type="text" name="mcu_jantung" class="custom-form col-lg-6" id="mcu-jantung">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Paru-paru</td>
                                        <td width="1%">:</td>
                                        <td class="d-flex">
                                            <input type="text" name="mcu_paru" class="custom-form col-lg-6" id="mcu-paru" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Abdomen</td>
                                        <td width="1%">:</td>
                                        <td class="d-flex">
                                            <input type="text" name="mcu_abdomen" class="custom-form col-lg-6" id="mcu_abdomen" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Anggota gerak</td>
                                        <td width="1%">:</td>
                                        <td class="d-flex">
                                            <input type="text" name="mcu_anggota_gerak" class="custom-form col-lg-6" id="mcu-anggota-gerak" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%">C. PEMERIKSAAN PENUNJANG</td>
                                        <td width="1%">:</td>
                                        <td class="d-flex">
                                            <input type="text" name="mcu_pemeriksaan_penunjang" class="custom-form col-lg-6" id="mcu-pemeriksaan-penunjang" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%">D. KESIMPULAN</td>
                                        <td width="1%">:</td>
                                        <td class="d-flex">
                                            <input type="text" name="mcu_kesimpulan" class="custom-form col-lg-6" id="mcu-kesimpulan" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%">E. SARAN</td>
                                        <td width="1%">:</td>
                                        <td class="d-flex">
                                            <input type="text" name="mcu_saran" class="custom-form col-lg-6" id="mcu-saran" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%">F. STATUS KESEHATAN</td>
                                        <td width="1%">:</td>
                                        <td class="d-flex">
                                            <select class="custom-form col-lg-6" name="mcu_status_kesehatan" id="mcu-status-kesehatan">
                                                <option selected hidden disabled value="0"></option>
                                                <option value="Sehat Untuk Bekerja">Sehat Untuk Bekerja</option>
                                                <option value="Sehat Untuk Bekerja Dengan Catatan Medis">Sehat Untuk
                                                    Bekerja Dengan Catatan Medis</option>
                                                <option value="Tidak Sehat Sementara (Temporary Unfit)">Tidak Sehat Sementara (Temporary Unfit)</option>
                                                <option value="Sehat Jasmani">Sehat Jasmani</option>
                                                <option value="Tidak Sehat Jasmani">Tidak Sehat Jasmani</option>
                                                <option value="Sehat Dengan Catatan Medis">Sehat Dengan Catatan Medis</option>
                                                <option value="Tidak Layak Bekerja">Tidak Layak Bekerja</option>
                                                <option value="Status Pemeriksaan Belum Lengkap">Status Pemeriksaan Belum Lengkap</option>
                                                <option value="Status Pemeriksaan Tidak Lengkap">Status Pemeriksaan Tidak Lengkap</option>
                                                <option value="Lain - lain">Lain - lain</option>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td width="20%">Tanggal Surat</td>
                                        <td width="1%">:</td>
                                        <td>
                                            <input type="text" name="mcu_tanggal_surat" class="custom-form col-lg-2" id="mcu-tanggal-surat">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Dokter Medical Check Up</td>
                                        <td width="1%">:</td>
                                        <td>
                                            <input type="text" name="mcu_dokter" id="mcu-dokter" class="select2c-input">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end content -->
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
                <button type="button" class="btn btn-info" onclick="simpanMcu()" id="btn_simpan"><i class="fas fa-fw fa-save mr-1"></i>Cetak</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Form SKPK MCU -->