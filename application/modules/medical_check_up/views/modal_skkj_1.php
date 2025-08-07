<!-- // SKKJ1 RUBAH -->
<script>
    // // Mendapatkan tahun saat ini
    // var tahunSekarang = new Date().getFullYear();                                                   
    // // Menetapkan tahun ke elemen span dengan id "tahun"
    // document.getElementById("tahun-1").innerHTML = tahunSekarang;

    $(function() {

        $('#tanggal-skkj-1').datetimepicker({
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

        $('#dokter-skkj-1').select2c({
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

    function simpanSkkjsatu() {
        // $('#modal-skkj-1').modal('hide');

        if ($('#tanggal-skkj-1').val() === '') {
            syams_validation('#tanggal-skkj-1', 'Tanggal belum diisi.');
            return false;
        } else {
            syams_validation_remove('#tanggal-skkj-1');
        }

        if ($('#dokter-skkj-1').val() === '') {
            syams_validation('#dokter-skkj-1', 'Nama Dokter belum diisi.');
            return false;
        } else {
            syams_validation_remove('#dokter-skkj-1');
        }

        var id = $('#id-layanan-pendaftaran-skkj-1').val();
        $.ajax({
            type: 'POST',
            url: '<?= base_url("medical_check_up/api/medical_check_up/simpan_skkj_1") ?>',
            data: $('#form-skkj-1').serialize(),
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

                    $('#modal-skkj-1').modal('hide');

                    window.open('<?= base_url('medical_check_up/cetak_form_skkj_1/') ?>' + id,
                        'Cetak Surat Keterangan Kesehatan Jiwa', 'width=' + dWidth + ', height=' +
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


<div class="modal fade" id="modal-skkj-1" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 70%;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title">
                    <h5 id="modal-skkj-1-title"></h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form-skkj-1 class="form-horizontal"') ?>
                <input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-skkj-1">
                <input type="hidden" name="id_pendaftaran" id="id-pendaftaran">         
                <div class="row">
                    <div class="col">
                        <div class="widget-body">
                            <div class="form-skkj-1">
                                <table class="table table-no-border table-sm table-striped">
                                    <tr>
                                        <td width="20%">Pilih Form</td>
                                        <td width="1%">:</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="checkbox" name="valid_1" id="valid-1" value="VALID" class="mr-1">Valid
                                                <input type="checkbox" name="valid_2" id="valid-2" value="TIDAK VALID" class="mr-1 ml-2" >Tidak Valid
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">No Surat</td>
                                        <td width="1%">:</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="text" name="no_surat_skkj_1" id="no-surat-skkj-1" class="custom-form col-lg-1 ml-1 mr-1">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Nama</td>
                                        <td width="1%">:</td>
                                        <td>
                                            <input type="text" name="nama_pasien_skkj_1" class="custom-form col-lg-6" id="nama-pasien-skkj-1" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Tanggal Lahir</td>
                                        <td width="1%">:</td>
                                        <td>
                                            <input type="text" name="tanggal_lahir_skkj_1" class="custom-form col-lg-2" id="tanggal-lahir-skkj-1" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Jenis Kelamin</td>
                                        <td width="1%">:</td>
                                        <td>
                                            <input type="text" name="jenis_kelamin_skkj_1" class="custom-form col-lg-2" id="jenis-kelamin-skkj-1" disabled>
                                        </td>
                                    </tr>                               
                                    <tr>
                                        <td width="20%">Alamat</td>
                                        <td width="1%">:</td>
                                        <td>
                                            <textarea name="alamat_skkj_1" class="custom-form col-lg-6" id="alamat-skkj-1" disabled>
                                            </textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Keterangan Surat </td>
                                        <td width="1%">:</td>
                                        <td>
                                            <textarea name="keterangan_skkj_1" class="custom-form col-lg-6" id="keterangan-skkj-1" disabled>
                                            </textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Tanggal</td>
                                        <td width="1%">:</td>
                                        <td>
                                            <input type="text" name="tanggal_skkj_1" class="custom-form col-lg-2" id="tanggal-skkj-1">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Dokter</td>
                                        <td width="1%">:</td>
                                        <td>
                                            <input type="text" name="dokter_skkj_1" id="dokter-skkj-1" class="select2c-input">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">NRTKK / NIP</td>
                                        <td width="1%">:</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="radio" name="nrptt_nip" id="nrptt-skkj-1" value="NRTKK" class="mr-1">NRTKK
                                                <input type="radio" name="nrptt_nip" id="nip-skkj-1" value="NIP" class="mr-1 ml-2">NIP 
                                            </div>
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
                <button type="button" class="btn btn-info" onclick="simpanSkkjsatu()" id="btn_simpan"><i class="fas fa-fw fa-save mr-1"></i>Cetak</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Form SKJJ1 -->