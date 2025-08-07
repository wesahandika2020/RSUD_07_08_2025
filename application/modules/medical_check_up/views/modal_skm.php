<!-- // SKM -->
<script>
    // Mendapatkan tahun saat ini
    var tahunSekarang = new Date().getFullYear();                                                   
    // Menetapkan tahun ke elemen span dengan id "tahun"
    document.getElementById("tahun_1_wwww").innerHTML = tahunSekarang;

    $(function() {

        $('#tanggal-skm').datetimepicker({
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

        $('#dokter-skm').select2c({
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

    function simpanSkm() {
        if ($('#tanggal-skm').val() === '') {
            syams_validation('#tanggal-skm', 'Tanggal belum diisi.');
            return false;
        } else {
            syams_validation_remove('#tanggal-skm');
        }

        if ($('#dokter-skm').val() === '') {
            syams_validation('#dokter-skm', 'Nama Dokter belum diisi.');
            return false;
        } else {
            syams_validation_remove('#dokter-skm');
        }

        var id_layanan_pendaftaran = $('#id-layanan-pendaftaran-skm').val();
        $.ajax({
            type: 'POST',
            url: '<?= base_url("medical_check_up/api/medical_check_up/simpan_skm") ?>',
            data: $('#form-skm').serialize(),
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

                    $('#modal-skm').modal('hide');

                    window.open('<?= base_url('medical_check_up/cetak_form_skm/') ?>' + id_layanan_pendaftaran,
                        'Cetak Surat Keterangan Medis', 'width=' + dWidth + ', height=' +
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


<div class="modal fade" id="modal-skm" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 70%;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title">
                    <h5 id="modal-skm-title"></h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-skm class="form-horizontal"') ?>
                <input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-skm">
                <input type="hidden" name="id_pendaftaran" id="id-pendaftaran-skm">
                <div class="row">
                    <div class="col">
                        <div class="widget-body">
                            <div class="form-skm">
                                <table class="table table-no-border table-sm table-striped">
                                    <tr>
                                        <td class="bold" width="20%">Nomor</td>
                                        <td class="bold" width="1%">:</td>
                                        <td class="d-flex">
                                            <input type="number" name="nomor_skm_1" id="nomor-skm-1" class="custom-form col-lg-2 mr-2"> /
                                            <input type="number" name="nomor_skm_2" id="nomor-skm-2" class="custom-form col-lg-2 mx-2"> /IRJ-RSUD KT / <span class="ml-1" id="tahun_1_wwww"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Nama</td>
                                        <td width="1%">:</td>
                                        <td>
                                            <input type="text" class="custom-form col-lg-6" id="nama-dokter-skm" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Jabatan</td>
                                        <td width="1%">:</td>
                                        <td>
                                            <input type="text" name="jabatan"  class="custom-form col-lg-6" id="jabatan" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Nama</td>
                                        <td width="1%">:</td>
                                        <td>
                                            <input type="text" class="custom-form col-lg-6" id="nama-pasien-skm" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Tanggal Lahir</td>
                                        <td width="1%">:</td>
                                        <td>
                                            <input type="text" class="custom-form col-lg-6" id="tgl-lahir-pasien-skm" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">No. Porsi</td>
                                        <td width="1%">:</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" name="no_porsi" id="no-porsi" class="custom-form col-lg-3">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Pekerjaan</td>
                                        <td width="1%">:</td>
                                        <td>
                                            <input type="text" class="custom-form col-lg-6" id="pekerjaan-pasien-skm" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Alamat</td>
                                        <td width="1%">:</td>
                                        <td>
                                            <textarea id="alamat-pasien-skm" class="form-control clear-input d-inline-block col-lg-12" rows="3" disabled></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Hasil Pemeriksaan</td>
                                        <td width="1%">:</td>
                                        <td>
                                            <textarea id="hasil-pemeriksaan-pasien-skm" class="form-control clear-input d-inline-block col-lg-12" rows="3" disabled></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Diagnosa Sebagai</td>
                                        <td width="1%">:</td>
                                        <td>
                                            <textarea id="diagnosa-pasien-skm" class="form-control clear-input d-inline-block col-lg-12" rows="3" disabled></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Menyatakan bahwa jemaah haji tersebut</td>
                                        <td width="1%">:</td>
                                        <td>
                                            <div class="input-group">
                                                <textarea name="menyatakan" id="menyatakan" class="form-control clear-input d-inline-block col-lg-12" rows="3"></textarea>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Tanggal</td>
                                        <td width="1%">:</td>
                                        <td>
                                            <input type="text" name="tanggal_skm" class="custom-form col-lg-2" id="tanggal-skm">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Dokter</td>
                                        <td width="1%">:</td>
                                        <td>
                                            <input type="text" name="dokter_skm" id="dokter-skm" class="select2c-input">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
                <button type="button" class="btn btn-info" onclick="simpanSkm()" id="btn_simpan"><i class="fas fa-fw fa-save mr-1"></i>Cetak</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Form SKM -->