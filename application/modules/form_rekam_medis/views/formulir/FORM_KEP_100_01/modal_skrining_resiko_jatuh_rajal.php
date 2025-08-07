<script>
$(function() {
    let accountGroup = "<?= $this->session->userdata('account_group') ?>";

    $('#petugas-skrining').select2c({
        ajax: {
            url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
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

    $('#tanggal-skrining').datetimepicker({
        format: 'DD/MM/YYYY HH:mm',
        maxDate: new Date(),
        beforeShow: function(i) {
            if ($(i).attr('readonly')) {
                return false;
            }
        }
    });

})

$('#check input').change(function() {
    $('#check input').each(function() {
        if ($(this).is(':checked')) {
            // Disabled fields
            $("#resiko-jatuh").prop("checked", true);
            $("#resiko-jatuh").prop("disabled", false);
            $("#tidak-resiko-jatuh").prop("checked", false);
            $("#tidak-resiko-jatuh").prop("disabled", true);
            return false;
        } else if ($(this).not(':checked')) {
            $("#resiko-jatuh").prop("checked", false);
            $("#resiko-jatuh").prop("disabled", true);
            $("#tidak-resiko-jatuh").prop("checked", true);
            $("#tidak-resiko-jatuh").prop("disabled", false);
        }
    })

});

function simpanSkriningResikoJatuhRajal() {
    if ($('#tanggal-skrining').val() === '') {
        syams_validation('#tanggal-skrining', 'Tanggal harus diisi.');
        return false;
    } else {
        syams_validation_remove('#tanggal-skrining');
    }

    if ($('#petugas-skrining').val() === '') {
        syams_validation('#petugas-skrining', 'Nama Petugas harus diisi.');
        return false;
    } else {
        syams_validation_remove('#petugas-skrining');
    }

    var id = $('#id-layanan-pendaftaran-sr').val();

    $.ajax({
        type: 'POST',
        url: '<?= base_url("rekam_medis/api/rekam_medis/simpan_skrining_resiko_jatuh_rajal") ?>',
        data: $('#form-skrining-resiko-jatuh-rajal').serialize(),
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

                $('#modal-skrining-resiko-jatuh-rajal').modal('hide');


                window.open(
                    '<?= base_url("pemeriksaan_poli/cetak_skrining_resiko_jatuh_rajal/") ?>' +
                    id,
                    'Cetak Skrining Risiko Jatuh Rawat Jalan', 'width=' + dWidth +
                    ', height=' +
                    dHeight + ', left=' +
                    x + ', top=' + y);
                showListForm($('#id-pendaftaran-sr').val(), $('#id-layanan-pendaftaran-sr').val(), $('#id-pasien-sr').val());    
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
<div class="modal fade" id="modal-skrining-resiko-jatuh-rajal" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 70%;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title">
                    <h5 class="modal-title bold" id="modal-skrining-resiko-jatuh-rajal-title"></h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-skrining-resiko-jatuh-rajal class="form-horizontal"') ?>
                <input type="hidden" name="id_pasien" id="id-pasien-sr">
                <input type="hidden" name="id_pendaftaran" id="id-pendaftaran-sr">
                <input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-sr">
                <input type="hidden" name="id_petugas" id="id-petugas">

                <!-- content -->
                <div class="row">
                    <div class="col-lg">
                        <div class="widget-body">
                            <div id="wizard_form_rajal">
                                <div class="form-modal-skrining-resiko-jatuh-rajal">
                                    <table class="table table-no-border table-sm table-striped">
                                        <thead>
                                            <tr>
                                                <td colspan="3">
                                                    <h4>Beri Tanda checklist "&#10003;" satu atau lebih pada pertanyaan
                                                        sederhana dibawah ini,
                                                        <b>JIKA TERISI SALAH SATU</b> maka pasien termasuk <b> RISIKO
                                                            JATUH</b>
                                                    </h4>
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody id="check">
                                            <tr>
                                                <td class="bold">No.</td>
                                                <td class="bold" align="center">Keterangan</td>
                                                <td class="bold" width="10%" align="center">Tanda (&#10003;)</td>
                                            </tr>
                                            <tr>
                                                <td width="1%">1.</td>
                                                <td width="20%">Pasien anak < 2 tahun</td>
                                                <td width="10%" align="center">
                                                    <input type="checkbox" value="1" name="check_1" id="check-1">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="1%">2.</td>
                                                <td width="20%">Pasien Geriatri (usia > 60 Tahun)</td>
                                                <td width="10%" align="center">
                                                    <input type="checkbox" value="1" name="check_2" id="check-2">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="1%">3.</td>
                                                <td width="20%">Pasien dengan alat bantu jalan tongkat</td>
                                                <td width="10%" align="center">
                                                    <input type="checkbox" value="1" name="check_3" id="check-3">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="1%">4.</td>
                                                <td width="20%">Pasien dengan alat bantu kursi roda</td>
                                                <td width="10%" align="center">
                                                    <input type="checkbox" value="1" name="check_4" id="check-4">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="1%">5.</td>
                                                <td width="20%">Pasien dengan alat bantu brangkar</td>
                                                <td width="10%" align="center">
                                                    <input type="checkbox" value="1" name="check_5" id="check-5">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="1%">6.</td>
                                                <td width="20%">Pasien Jadwal Opeasi rawat Jalan <i>One day care</i>
                                                    (ODC)</td>
                                                <td width="10%" align="center">
                                                    <input type="checkbox" value="1" name="check_6" id="check-6">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="1%">7.</td>
                                                <td width="20%">Pasien mendapatkan obat anestesi/sedasi</td>
                                                <td width="10%" align="center">
                                                    <input type="checkbox" value="1" name="check_7" id="check-7">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="1%">8.</td>
                                                <td width="20%">Pasien gangguan keseimbangan</td>
                                                <td width="10%" align="center">
                                                    <input type="checkbox" value="1" name="check_8" id="check-8">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="1%">9.</td>
                                                <td width="20%">Pasien khawatir jatuh</td>
                                                <td width="10%" align="center">
                                                    <input type="checkbox" value="1" name="check_9" id="check-9">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="1%">10.</td>
                                                <td width="20%">Pasien merasa tidak stabil saat berdiri/jalan</td>
                                                <td width="10%" align="center">
                                                    <input type="checkbox" value="1" name="check_10" id="check-10">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="1%">11.</td>
                                                <td width="20%">Pasien Riwayat jatuh satu tahun terakhir</td>
                                                <td width="10%" align="center">
                                                    <input type="checkbox" value="1" name="check_11" id="check-11">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="1%">12.</td>
                                                <td width="20%">Pasien gangguan penglihatan</td>
                                                <td width="10%" align="center">
                                                    <input type="checkbox" value="1" name="check_12" id="check-12">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="1%">13.</td>
                                                <td width="20%">Pasien rencana pemeriksaan penunjang dengan zat kontras
                                                    (contoh CT scan kontras, BNO IVP, dll)</td>
                                                <td width="10%" align="center">
                                                    <input type="checkbox" value="1" name="check_13" id="check-13">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="1%">14.</td>
                                                <td width="20%">Pasien Klinik Rehabilitasi Medik</td>
                                                <td width="10%" align="center">
                                                    <input type="checkbox" value="1" name="check_14" id="check-14">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="1%">15.</td>
                                                <td width="20%">Pasien Hemodialisis Rawat Jalan</td>
                                                <td width="10%" align="center">
                                                    <input type="checkbox" value="1" name="check_15" id="check-15">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-no-border table-sm table-striped">
                                        <thead>
                                            <tr>
                                                <th colspan="3">
                                                    <h4><u><b>Kategori Risiko Jatuh</b></u> (Pilih Salah Satu)
                                                    </h4>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="bold">No.</td>
                                                <td class="bold" align="center">Keterangan</td>
                                                <td class="bold" width="10%" align="center">Tanda (&#10003;)</td>
                                            </tr>
                                            <tr>
                                                <td width="1%">1.</td>
                                                <td width="20%">Risiko Jatuh</td>
                                                <td width="10%" align="center">
                                                    <input type="checkbox" value="1" name="resiko_jatuh"
                                                        id="resiko-jatuh">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="1%">2.</td>
                                                <td width="20%">Tidak Risiko Jatuh</td>
                                                <td width="10%" align="center">
                                                    <input type="checkbox" value="1" name="tidak_resiko_jatuh"
                                                        id="tidak-resiko-jatuh">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table class="table table-no-border table-sm table-striped">
                                        <thead>
                                            <th colspan="3">
                                                <h4><u><b>UPAYA PENCEGAHAN RISIKO JATUH</b></u> (ISI JIKA PASIEN RISIKO
                                                    JATUH)
                                                </h4>
                                            </th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="bold" width=" 1%">No.</td>
                                                <td class="bold" align="center">Keterangan</td>
                                                <td class="bold" width="10%" align="center">Tanda (&#10003;)</td>
                                            </tr>
                                            <tr>
                                                <td width="1%">1.</td>
                                                <td width="20%">Menempelkan stiker Risiko Jatuh</td>
                                                <td width="10%" align="center">
                                                    <input type="checkbox" value="1" name="stiker" id="stiker">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="1%">2.</td>
                                                <td width="20%">Memberikan edukasi tentang Risiko Jatuh ke pasien maupun
                                                    pengantar :</td>
                                                <td width="10%" align="center">
                                                    <input type="checkbox" value="1" name="edukasi_resiko_jatuh"
                                                        id="edukasi-resiko-jatuh">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="1%">3.</td>
                                                <td width="20%">Memberikan edukasi tentang Lokasi maupun situasi yang
                                                    memiliki potensial penyebab Ris Jatuh :</td>
                                                <td width="10%" align="center">
                                                    <input type="checkbox" value="1" name="edukasi_lokasi"
                                                        id="edukasi-lokasi">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="1%"></td>
                                                <td>A. Klinik Rehabilitasi Medik</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td width="1%"></td>
                                                <td>B. Tempat bermain anak</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td width="1%"></td>
                                                <td>C. Tangga dan selasar</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td width="1%"></td>
                                                <td>D. Tempat dengan penerangan kurang</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td width="1%"></td>
                                                <td>E. Toilet</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td width="1%">4.</td>
                                                <td width="20%">Memberikan edukasi tentang upaya pencegahan Risiko Jatuh
                                                </td>
                                                <td width="10%" align="center">
                                                    <input type="checkbox" value="1" name="edukasi_pencegahan"
                                                        id="edukasi-pencegahan">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="1%"></td>
                                                <td>A. Gunakan alas kaki yang tidak licin</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td width="1%"></td>
                                                <td>B. Gunakan alat bantu (jika diperlukan) saat mobilisasi
                                                </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td width="1%"></td>
                                                <td>C. Pastikan pengantar selalu mendampingi pasien risiko
                                                    jatuh</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td width="1%"></td>
                                                <td>D. Jika akan meninggalkan pasien pastikan pasien dalam
                                                    kondisi aman untuk ditinggalkan dan tidak sedang berada di lokasi
                                                    potensial risiko jatuh</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td width="1%"></td>
                                                <td>E. Perhatikan petunjuk symbol risiko jatuh di setiap
                                                    lokasi di RS, tingkatkan kewaspadaan saat dilokasi yang terdapat
                                                    symbol risiko jatuh </td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td width="1%"></td>
                                                <td>F. Perhatikan instruksi petugas saat akan melakukan
                                                    terapi/tindakan</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td width="1%"></td>
                                                <td>G. Perhatikan tata cara penggunaan alat saat
                                                    terapi/tindakan</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td width="1%"></td>
                                                <td>H. Perhatikan penjelasan petugas tentang pemberian obat
                                                    yang memiliki efek sedasi/anestesi</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td width="1%"></td>
                                                <td>I. Laporkan kepada petugas jika muncul efek samping
                                                    akibat pemberian zat kontras maupun obat-obatan saat tidakan saat
                                                    tindakan di instalasi Rawat Jalan</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td width="1%"></td>
                                                <td>J. Selama masih di lingkungan rumah sakit tidak
                                                    diperbolehkan melepas stiker risiko jatuh agar petugas maupun
                                                    pengunjung yang lain dapat saling mengawasi</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td width="1%"></td>
                                                <td>K. Panggil petugas jika membutuhkan bantuan</td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table class="table table-no-border table-sm table-striped">
                                        <thead>
                                            <tr>
                                                <th colspan="3">
                                                    <h4><b>YANG MELAKUKAN SKRINING</b>
                                                    </h4>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Tanggal & Jam</td>
                                                <td>:</td>
                                                <td>
                                                    <input type="text" name="tanggal_skrining" id="tanggal-skrining"
                                                        class="custom-form clear-input d-inline-block col-lg-2 ml-2"
                                                        placeholder="dd/mm/yyyy">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Nama Petugas</td>
                                                <td>:</td>
                                                <td>
                                                    <input type="text" name="petugas_skrining" id="petugas-skrining"
                                                        class="select2c-input ml-2">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Tanda Tangan</td>
                                                <td>:</td>
                                                <td>
                                                    <input type="checkbox" value="1" name="tanda_tangan"
                                                        id="tanda-tangan" class="ml-2">
                                                </td>
                                                <?php if ($this->session->userdata('account_group') === 'Admin') : ?>
                                                <input type="hidden" name="id_users" class="ml-2"
                                                    value="<?= $this->session->userdata("id_translucent") ?>">
                                                <?php else : ?>
                                                <?php endif ?>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end content -->
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                        class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
                <button type="button" class="btn btn-info" onclick="simpanSkriningResikoJatuhRajal()" id="btn_simpan"><i
                        class="fas fa-fw fa-save mr-1"></i>Cetak</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->