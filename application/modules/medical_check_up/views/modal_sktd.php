<!-- // SKTD -->
<script>
    // Mendapatkan tahun saat ini
    var tahunSekarang = new Date().getFullYear();                                                   
    // Menetapkan tahun ke elemen span dengan id "tahun"
    document.getElementById("tahun_sktd").innerHTML = tahunSekarang;

    $(function() {
        $('#tanggalsktd').datetimepicker({
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

        $('#doktersktd').select2c({
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

    function simpanSuratKeteranganTidakDisabilitas() {
        if ($('#tanggalsktd').val() === '') {
            syams_validation('#tanggalsktd', 'Tanggal belum diisi.');
            return false;
        } else {
            syams_validation_remove('#tanggalsktd');
        }

        if ($('#doktersktd').val() === '') {
            syams_validation('#doktersktd', 'Nama Dokter belum diisi.');
            return false;
        } else {
            syams_validation_remove('#doktersktd');
        }

        var id_layanan_pendaftaran = $('#id-layanan-pendaftaran-sktd').val();
        $.ajax({
            type: 'POST',
            url: '<?= base_url("medical_check_up/api/medical_check_up/simpan_surat_keterangan_tidak_disabilitas") ?>',
            data: $('#form_sktd').serialize(),
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

                    $('#modal_sktd').modal('hide');

                    window.open('<?= base_url('medical_check_up/cetak_surat_keterangan_tidak_disabilitas/') ?>' + id_layanan_pendaftaran,
                        'Cetak Surat Keterangan Disabilitas', 'width=' + dWidth + ', height=' +
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


<div class="modal fade" id="modal_sktd" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 70%;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title">
                    <h5 id="modal_sktd_title"></h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_sktd class="form-horizontal"') ?>
                <input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-sktd">
                <input type="hidden" name="id_pendaftaran" id="id-pendaftaran-sktd">
                <input type="hidden" name="id_user" id="id-user"value="<?= $this->session->userdata('id_translucent') ?>"> 		
                <div class="row">
                    <div class="col">
                        <div class="widget-body">
                            <div class="form_sktd">
                                <table class="table table-no-border table-sm table-striped">
                                    <tr>
                                        <td class="bold" width="20%">Nomor</td>
                                        <td class="bold" width="1%">:</td>
                                        <td class="d-flex">
                                            <input type="number" name="nomorsktd" id="nomorsktd" class="custom-form col-lg-2 mx-2"> /MCU_RSUDKT / <span class="ml-1" id="tahun_sktd"></span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="bold" width="20%">Nama</td>
                                        <td class="bold" width="1%">:</td>
                                        <td>
                                            <input type="text" class="custom-form col-lg-6" id="namapasiensktd" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%">Tempat/Tanggal Lahir</td>
                                        <td class="bold" width="1%">:</td>
                                        <td>
                                            <input type="text" class="custom-form col-lg-6" id="ttlsktd" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%">Umur</td>
                                        <td class="bold" width="1%">:</td>
                                        <td>
                                            <input type="text" class="custom-form col-lg-6" id="umursktd" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%">Jenis Kelamin</td>
                                        <td class="bold" width="1%">:</td>
                                        <td>
                                            <input type="text" class="custom-form col-lg-6" id="jksktd" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%">Alamat</td>
                                        <td class="bold" width="1%">:</td>
                                        <td>
                                            <textarea id="alamatsktd" class="form-control clear-input d-inline-block col-lg-12" rows="2" disabled></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%">Keperluan Surat</td>
                                        <td class="bold" width="1%">:</td>
                                        <td>
                                            <textarea id="keperluansktd" class="form-control clear-input d-inline-block col-lg-12" rows="2" disabled></textarea>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="bold" width="20%">Dokter Pemeriksa </td>
                                        <td class="bold" width="1%">:</td>
                                        <td>
                                            <input type="text" name="doktersktd" id="doktersktd" class="select2c-input">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%">NIP/SIP</td>
                                        <td class="bold" width="1%">:</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="radio" name="nip_sip_sktd" id="nip-sip-sktd" value="NIP" class="mr-1">NIP
                                                <input type="radio" name="nip_sip_sktd" id="sip-nip-sktd" value="SIP" class="mr-1 ml-2" >SIP
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%">Tanggal</td>
                                        <td class="bold" width="1%">:</td>
                                        <td>
                                            <input type="text" name="tanggalsktd" class="custom-form col-lg-2" id="tanggalsktd">
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
                <button type="button" class="btn btn-info" onclick="simpanSuratKeteranganTidakDisabilitas()" id="btn_simpan"><i class="fas fa-fw fa-save mr-1"></i>Cetak</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Form SKTD -->