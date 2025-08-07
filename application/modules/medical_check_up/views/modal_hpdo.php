<!-- // HPDO BARU -->
<script>
    $(function() {
        $('#tanggal-hpdo').datetimepicker({
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

        $('#dokter-hpdo').select2c({
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

    function simpanHasilPemeriksaanDokterOkupasi() {
        if ($('#tanggal-hpdo').val() === '') {
            syams_validation('#tanggal-hpdo', 'Tanggal belum diisi.');
            return false;
        } else {
            syams_validation_remove('#tanggal-hpdo');
        }

        if ($('#dokter-hpdo').val() === '') {
            syams_validation('#dokter-hpdo', 'Nama Dokter belum diisi.');
            return false;
        } else {
            syams_validation_remove('#dokter-hpdo');
        }

        var id_layanan_pendaftaran = $('#id-layanan-pendaftaran-hpdo').val();
        var id_pendaftaran = $('#id-pendaftaran-hpdo').val();

        var kesimpulanhpdo = $('#kesimpulanhpdo').summernote('code');
        var saranhpdo = $('#saranhpdo').summernote('code');

        $.ajax({
            type: 'POST',
            url: '<?= base_url("medical_check_up/api/medical_check_up/simpan_hasil_pemeriksaan_dokter_okupasi") ?>',
            data: $('#form_hpdo').serialize() + '&id_layanan_pendaftaran=' + id_layanan_pendaftaran +'&kesimpulanhpdo=' + kesimpulanhpdo +'&saranhpdo=' + saranhpdo,
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

                    // $('#modal_hpdo').modal('hide');
                    // $('#btn-simpan-hpdo').empty();
                    cetakHPDO(id_pendaftaran, id_layanan_pendaftaran);
              
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

    

    function cetaKHasilPemeriksaanDokterOkupasi(id_pendaftaran, id_layanan_pendaftaran){
        window.open('<?= base_url('medical_check_up/cetak_hasil_pemeriksaan_dokter_okupasi/') ?>' + id_pendaftaran + '/' + id_layanan_pendaftaran,
        'Cetak Surat Keterangan Disabilitas', 'width=' + dWidth + ', height=' +
        dHeight +
        ', left=' + x + ', top=' + y);
    }



    $(document).ready(function() {
        $('#kesimpulanhpdo').summernote({
            height: 200,
            focus: true,
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
            ],
            callbacks: {
                onPaste: function(e) {
                    var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text')

                    e.preventDefault()

                    // Firefox fix
                    setTimeout(function() {
                        document.execCommand('insertText', false, bufferText)
                    }, 10)
                },
            },
        })

        $('#saranhpdo').summernote({
            height: 200,
            focus: true,
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
            ],
            callbacks: {
                onPaste: function(e) {
                    var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text')

                    e.preventDefault()

                    setTimeout(function() {
                        document.execCommand('insertText', false, bufferText)
                    }, 10)
                },
            },
        });
    });


</script>


<div class="modal fade" id="modal_hpdo" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 70%;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title">
                    <h5 id="modal_hpdo_title"></h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_hpdo class="form-horizontal"') ?>
                <input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-hpdo">
                <input type="hidden" name="id_pendaftaran" id="id-pendaftaran-hpdo">
                <input type="hidden" name="id_user" id="id-user"value="<?= $this->session->userdata('id_translucent') ?>"> 		
                <div class="row">
                    <div class="col">
                        <div class="widget-body">
                            <div class="form_hpdo">
                                <table class="table table-no-border table-sm table-striped">
                                    <tr>
                                        <td class="bold" width="20%">Nama</td>
                                        <td class="bold" width="1%">:</td>
                                        <td>
                                            <input type="text" class="custom-form col-lg-6" id="namapasienhpdo" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%">Umur</td>
                                        <td class="bold" width="1%">:</td>
                                        <td>
                                            <input type="text" class="custom-form col-lg-6" id="umurhpdo" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%">Jenis Kelamin</td>
                                        <td class="bold" width="1%">:</td>
                                        <td>
                                            <input type="text" class="custom-form col-lg-6" id="jkhpdo" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%">Pekerjaan</td>
                                        <td class="bold" width="1%">:</td>
                                        <td>
                                            <input type="text" class="custom-form col-lg-8" name="pekerjaany_hpdo" id="pekerjaany-hpdo">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%">Keluhan</td>
                                        <td class="bold" width="1%">:</td>
                                        <td>
                                            <input type="text" class="custom-form col-lg-8" name="keluhan_hpdo" id="keluhan-hpdo">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%">Uraian Pekerjaan</td>
                                        <td class="bold" width="1%">:</td>
                                        <td>
                                            <textarea name="uraian_hpdo"  id="uraian-hpdo" class="form-control clear-input d-inline-block col-lg-12" rows="4"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%">Masa Kerja</td>
                                        <td class="bold" width="1%">:</td>
                                        <td class="d-flex">
                                            <input type="text" name="masakerja_hpdo" class="custom-form col-lg-6" id="masakerja-hpdo">
                                        </td>
                                    </tr>                               
                                </table>
                                <table class="table table-no-border table-sm table-striped">
                                    <tr>
                                        <td class="bold" width="20%">Risiko Kerja  </td>
                                        <td class="bold" width="18%">: Fisik</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%"></td>
                                        <td width="23%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bising</td> 
                                        <td>
                                            <div class="input-group">
                                                : &nbsp;&nbsp;&nbsp;<input type="radio" name="bising_hpdo" id="bising-hpdo-ya" value="1"class="mr-1"> Ya                              
                                                <input type="radio" name="bising_hpdo" id="bising-hpdo-tidak" value="0"class="mr-1 ml-3"> Tidak 
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%"></td>
                                        <td width="23%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ketinggian</td> 
                                        <td>
                                            <div class="input-group">
                                                : &nbsp;&nbsp;&nbsp;<input type="radio" name="ketinggian_hpdo" id="ketinggian-hpdo-ya" value="1"class="mr-1"> Ya                              
                                                <input type="radio" name="ketinggian_hpdo" id="ketinggian-hpdo-tidak" value="0"class="mr-1 ml-3"> Tidak 
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%"></td>
                                        <td width="23%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Getaran Tubuh</td> 
                                        <td>
                                            <div class="input-group">
                                                : &nbsp;&nbsp;&nbsp;<input type="radio" name="gtubuh_hpdo" id="gtubuh-hpdo-ya" value="1"class="mr-1"> Ya                              
                                                <input type="radio" name="gtubuh_hpdo" id="gtubuh-hpdo-tidak" value="0"class="mr-1 ml-3"> Tidak 
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%"></td>
                                        <td width="23%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Getaran Tangan</td> 
                                        <td>
                                            <div class="input-group">
                                                : &nbsp;&nbsp;&nbsp;<input type="radio" name="gtangan_hpdo" id="gtangan-hpdo-ya" value="1"class="mr-1"> Ya                              
                                                <input type="radio" name="gtangan_hpdo" id="gtangan-hpdo-tidak" value="0"class="mr-1 ml-3"> Tidak 
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%"></td>
                                        <td width="23%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Suhu Panas/Dingin</td> 
                                        <td>
                                            <div class="input-group">
                                                : &nbsp;&nbsp;&nbsp;<input type="radio" name="suhu_hpdo" id="suhu-hpdo-ya" value="1"class="mr-1"> Ya                              
                                                <input type="radio" name="suhu_hpdo" id="suhu-hpdo-tidak" value="0"class="mr-1 ml-3"> Tidak 
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%"></td>
                                        <td width="23%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Radiasi</td> 
                                        <td>
                                            <div class="input-group">
                                                : &nbsp;&nbsp;&nbsp;<input type="radio" name="radiasi_hpdo" id="radiasi-hpdo-ya" value="1"class="mr-1"> Ya                              
                                                <input type="radio" name="radiasi_hpdo" id="radiasi-hpdo-tidak" value="0"class="mr-1 ml-3"> Tidak 
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%"></td>
                                        <td width="23%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lain-Lain</td> 
                                        <td>
                                            <div class="input-group">
                                                : &nbsp;&nbsp;&nbsp;<input type="radio" name="lain_hpdo" id="lain-hpdo-ya" value="1"class="mr-1"> Ya                              
                                                <input type="radio" name="lain_hpdo" id="lain-hpdo-tidak" value="0"class="mr-1 ml-3"> Tidak 
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%"></td>
                                        <td class="bold" width="23%">Kimia</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%"></td>
                                        <td width="23%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Debu</td> 
                                        <td>
                                            <div class="input-group">
                                                : &nbsp;&nbsp;&nbsp;<input type="radio" name="debu_hpdo" id="debu-hpdo-ya" value="1"class="mr-1"> Ya                              
                                                <input type="radio" name="debu_hpdo" id="debu-hpdo-tidak" value="0"class="mr-1 ml-3"> Tidak 
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%"></td>
                                        <td width="23%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Zat Kimia</td> 
                                        <td>
                                            <div class="input-group">
                                                : &nbsp;&nbsp;&nbsp;<input type="radio" name="zatkimia_hpdo" id="zatkimia-hpdo-ya" value="1"class="mr-1"> Ya                              
                                                <input type="radio" name="zatkimia_hpdo" id="zatkimia-hpdo-tidak" value="0"class="mr-1 ml-3"> Tidak 
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%"></td>
                                        <td width="23%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pestisida</td> 
                                        <td>
                                            <div class="input-group">
                                                : &nbsp;&nbsp;&nbsp;<input type="radio" name="pestisida_hpdo" id="pestisida-hpdo-ya" value="1"class="mr-1"> Ya                              
                                                <input type="radio" name="pestisida_hpdo" id="pestisida-hpdo-tidak" value="0"class="mr-1 ml-3"> Tidak 
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%"></td>
                                        <td width="23%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Asap</td> 
                                        <td>
                                            <div class="input-group">
                                                : &nbsp;&nbsp;&nbsp;<input type="radio" name="asap_hpdo" id="asap-hpdo-ya" value="1"class="mr-1"> Ya                              
                                                <input type="radio" name="asap_hpdo" id="asap-hpdo-tidak" value="0"class="mr-1 ml-3"> Tidak 
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%"></td>
                                        <td width="23%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lain-Lain</td> 
                                        <td>
                                            <div class="input-group">
                                                : &nbsp;&nbsp;&nbsp;<input type="radio" name="lainn_hpdo" id="lainn-hpdo-ya" value="1"class="mr-1"> Ya                              
                                                <input type="radio" name="lainn_hpdo" id="lainn-hpdo-tidak" value="0"class="mr-1 ml-3"> Tidak 
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%"></td>
                                        <td class="bold" width="23%">Biologi</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%"></td>
                                        <td width="23%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bakteri</td> 
                                        <td>
                                            <div class="input-group">
                                                : &nbsp;&nbsp;&nbsp;<input type="radio" name="bakteri_hpdo" id="bakteri-hpdo-ya" value="1"class="mr-1"> Ya                              
                                                <input type="radio" name="bakteri_hpdo" id="bakteri-hpdo-tidak" value="0"class="mr-1 ml-3"> Tidak 
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%"></td>
                                        <td width="23%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Virus</td> 
                                        <td>
                                            <div class="input-group">
                                                : &nbsp;&nbsp;&nbsp;<input type="radio" name="virus_hpdo" id="virus-hpdo-ya" value="1"class="mr-1"> Ya                              
                                                <input type="radio" name="virus_hpdo" id="virus-hpdo-tidak" value="0"class="mr-1 ml-3"> Tidak 
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%"></td>
                                        <td width="23%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Parasit</td> 
                                        <td>
                                            <div class="input-group">
                                                : &nbsp;&nbsp;&nbsp;<input type="radio" name="parasit_hpdo" id="parasit-hpdo-ya" value="1"class="mr-1"> Ya                              
                                                <input type="radio" name="parasit_hpdo" id="parasit-hpdo-tidak" value="0"class="mr-1 ml-3"> Tidak 
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%"></td>
                                        <td width="23%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jamur</td> 
                                        <td>
                                            <div class="input-group">
                                                : &nbsp;&nbsp;&nbsp;<input type="radio" name="jamur_hpdo" id="jamur-hpdo-ya" value="1"class="mr-1"> Ya                              
                                                <input type="radio" name="jamur_hpdo" id="jamur-hpdo-tidak" value="0"class="mr-1 ml-3"> Tidak 
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%"></td>
                                        <td width="23%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lainnya</td> 
                                        <td>
                                            <div class="input-group">
                                                : &nbsp;&nbsp;&nbsp;<input type="radio" name="lainnya_hpdo" id="lainnya-hpdo-ya" value="1"class="mr-1"> Ya                              
                                                <input type="radio" name="lainnya_hpdo" id="lainnya-hpdo-tidak" value="0"class="mr-1 ml-3"> Tidak 
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%"></td>
                                        <td class="bold" width="23%">Ergonomi</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%"></td>
                                        <td width="23%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Gerakan Berulang</td> 
                                        <td>
                                            <div class="input-group">
                                                : &nbsp;&nbsp;&nbsp;<input type="radio" name="gberulang_hpdo" id="gberulang-hpdo-ya" value="1"class="mr-1"> Ya                              
                                                <input type="radio" name="gberulang_hpdo" id="gberulang-hpdo-tidak" value="0"class="mr-1 ml-3"> Tidak 
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%"></td>
                                        <td width="23%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Angkat/Angkut Berat</td> 
                                        <td>
                                            <div class="input-group">
                                                : &nbsp;&nbsp;&nbsp;<input type="radio" name="angkat_hpdo" id="angkat-hpdo-ya" value="1"class="mr-1"> Ya                              
                                                <input type="radio" name="angkat_hpdo" id="angkat-hpdo-tidak" value="0"class="mr-1 ml-3"> Tidak 
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%"></td>
                                        <td width="23%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Berdiri Terus >4jam</td> 
                                        <td>
                                            <div class="input-group">
                                                : &nbsp;&nbsp;&nbsp;<input type="radio" name="berdiri_hpdo" id="berdiri-hpdo-ya" value="1"class="mr-1"> Ya                              
                                                <input type="radio" name="berdiri_hpdo" id="berdiri-hpdo-tidak" value="0"class="mr-1 ml-3"> Tidak 
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%"></td>
                                        <td width="23%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Duduk Terus >4jam</td> 
                                        <td>
                                            <div class="input-group">
                                                : &nbsp;&nbsp;&nbsp;<input type="radio" name="duduk_hpdo" id="duduk-hpdo-ya" value="1"class="mr-1"> Ya                              
                                                <input type="radio" name="duduk_hpdo" id="duduk-hpdo-tidak" value="0"class="mr-1 ml-3"> Tidak 
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%"></td>
                                        <td width="23%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Posisi Tubuh Janggal</td> 
                                        <td>
                                            <div class="input-group">
                                                : &nbsp;&nbsp;&nbsp;<input type="radio" name="posisi_hpdo" id="posisi-hpdo-ya" value="1"class="mr-1"> Ya                              
                                                <input type="radio" name="posisi_hpdo" id="posisi-hpdo-tidak" value="0"class="mr-1 ml-3"> Tidak 
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%"></td>
                                        <td width="23%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pencahayaan Tidak Sesuai</td> 
                                        <td>
                                            <div class="input-group">
                                                : &nbsp;&nbsp;&nbsp;<input type="radio" name="pencahayaan_hpdo" id="pencahayaan-hpdo-ya" value="1"class="mr-1"> Ya                              
                                                <input type="radio" name="pencahayaan_hpdo" id="pencahayaan-hpdo-tidak" value="0"class="mr-1 ml-3"> Tidak 
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%"></td>
                                        <td width="23%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bekerja Dengan Monitor >4jam</td> 
                                        <td>
                                            <div class="input-group">
                                                : &nbsp;&nbsp;&nbsp;<input type="radio" name="bekerja_hpdo" id="bekerja-hpdo-ya" value="1"class="mr-1"> Ya                              
                                                <input type="radio" name="bekerja_hpdo" id="bekerja-hpdo-tidak" value="0"class="mr-1 ml-3"> Tidak 
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%"></td>
                                        <td width="23%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lain-Lain</td> 
                                        <td>
                                            <div class="input-group">
                                                : &nbsp;&nbsp;&nbsp;<input type="radio" name="laint_hpdo" id="laint-hpdo-ya" value="1"class="mr-1"> Ya                              
                                                <input type="radio" name="laint_hpdo" id="laint-hpdo-tidak" value="0"class="mr-1 ml-3"> Tidak 
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%"></td>
                                        <td class="bold" width="23%">Psikososial</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%"></td>
                                        <td width="23%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Beban Kerja Berlebih/Tidak Sesuai</td> 
                                        <td>
                                            <div class="input-group">
                                                : &nbsp;&nbsp;&nbsp;<input type="radio" name="bebankerja_hpdo" id="bebankerja-hpdo-ya" value="1"class="mr-1"> Ya                              
                                                <input type="radio" name="bebankerja_hpdo" id="bebankerja-hpdo-tidak" value="0"class="mr-1 ml-3"> Tidak 
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%"></td>
                                        <td width="23%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kerja Gilir/Shift</td> 
                                        <td>
                                            <div class="input-group">
                                                : &nbsp;&nbsp;&nbsp;<input type="radio" name="kerjagilir_hpdo" id="kerjagilir-hpdo-ya" value="1"class="mr-1"> Ya                              
                                                <input type="radio" name="kerjagilir_hpdo" id="kerjagilir-hpdo-tidak" value="0"class="mr-1 ml-3"> Tidak 
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%"></td>
                                        <td width="23%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ketidakjelasan Tugas</td> 
                                        <td>
                                            <div class="input-group">
                                                : &nbsp;&nbsp;&nbsp;<input type="radio" name="ketidakjelasan_hpdo" id="ketidakjelasan-hpdo-ya" value="1"class="mr-1"> Ya                              
                                                <input type="radio" name="ketidakjelasan_hpdo" id="ketidakjelasan-hpdo-tidak" value="0"class="mr-1 ml-3"> Tidak 
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%"></td>
                                        <td width="23%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pekerjaan Monoton</td> 
                                        <td>
                                            <div class="input-group">
                                                : &nbsp;&nbsp;&nbsp;<input type="radio" name="pekerjaan_monoton_hpdo" id="pekerjaan-monoton-hpdo-ya" value="1"class="mr-1"> Ya                              
                                                <input type="radio" name="pekerjaan_monoton_hpdo" id="pekerjaan-monoton-hpdo-tidak" value="0"class="mr-1 ml-3"> Tidak 
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%"></td>
                                        <td width="23%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Konflik Di Tempat Kerja</td> 
                                        <td>
                                            <div class="input-group">
                                                : &nbsp;&nbsp;&nbsp;<input type="radio" name="konflik_kerja_hpdo" id="konflik-kerja-hpdo-ya" value="1"class="mr-1"> Ya                              
                                                <input type="radio" name="konflik_kerja_hpdo" id="konflik-kerja-hpdo-tidak" value="0"class="mr-1 ml-3"> Tidak 
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%"></td>
                                        <td width="23%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tuntutan Kerja Tinggi</td> 
                                        <td>
                                            <div class="input-group">
                                                : &nbsp;&nbsp;&nbsp;<input type="radio" name="tuntutan_hpdo" id="tuntutan-hpdo-ya" value="1"class="mr-1"> Ya                              
                                                <input type="radio" name="tuntutan_hpdo" id="tuntutan-hpdo-tidak" value="0"class="mr-1 ml-3"> Tidak 
                                            </div>
                                        </td>
                                    </tr>
                                </table>


                                <table class="table table-no-border table-sm table-striped">
                                    <tr>
                                        <td colspan="5">Berdasarkan Pemeriksaan Self Reporting Quetionnaire 29 (SRQ-29) :</td>
                                        <!-- <td>
                                            <div class="input-group">
                                                <input type="radio" name="gejala_hpdo" id="gejala-hpdo-ya" value="1"class="mr-1"> Ada 
                                                <input type="radio" name="gejala_hpdo" id="gejala-hpdo-tidak" value="0"class="mr-1 ml-3"> Tidak Ada
                                            </div>
                                        </td> -->
                                    </tr>

                                    <tr>
                                        <td>
                                            <textarea name="keterangan_hpdo"  id="keterangan-hpdo" class="form-control clear-input d-inline-block col-lg-12" rows="4"placeholder="Keterangan"></textarea>
                                        </td>
                                    </tr>
                                </table>
                                <table class="table table-no-border table-sm table-striped">
                                    <tr>
                                        <td class="bold" width="30%">Berdasarkan Pemeriksaan Survey Diagnosis Stres (SDS)</td>
                                        <td class="bold" width="20%"></td>
                                        <td class="bold" width="1%"></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%"></td>
                                        <td width="20%">Ketaksaan Peran</td> 
                                        <td class="bold" width="1%">:</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="radio" name="ketaksaan" id="ketaksaan-ringan" value="1"class="mr-1">Ringan                              
                                                <input type="radio" name="ketaksaan" id="ketaksaan-sedang" value="2"class="mr-1 ml-3">Sedang 
                                                <input type="radio" name="ketaksaan" id="ketaksaan-berat" value="3"class="mr-1 ml-3">Berat 
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%"></td>
                                        <td width="20%">Konflik peran</td> 
                                        <td class="bold" width="1%">:</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="radio" name="konflikk" id="konflikk-ringan" value="1"class="mr-1">Ringan                              
                                                <input type="radio" name="konflikk" id="konflikk-sedang" value="2"class="mr-1 ml-3">Sedang 
                                                <input type="radio" name="konflikk" id="konflikk-berat" value="3"class="mr-1 ml-3">Berat 
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%"></td>
                                        <td width="20%">Beban kerja kuantitatif</td> 
                                        <td class="bold" width="1%">:</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="radio" name="kuantitatif" id="kuantitatif-ringan" value="1"class="mr-1">Ringan                              
                                                <input type="radio" name="kuantitatif" id="kuantitatif-sedang" value="2"class="mr-1 ml-3">Sedang 
                                                <input type="radio" name="kuantitatif" id="kuantitatif-berat" value="3"class="mr-1 ml-3">Berat 
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%"></td>
                                        <td width="20%">Beban kerja kualitatif</td> 
                                        <td class="bold" width="1%">:</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="radio" name="kualitatif" id="kualitatif-ringan" value="1"class="mr-1">Ringan                              
                                                <input type="radio" name="kualitatif" id="kualitatif-sedang" value="2"class="mr-1 ml-3">Sedang 
                                                <input type="radio" name="kualitatif" id="kualitatif-berat" value="3"class="mr-1 ml-3">Berat 
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%"></td>
                                        <td width="20%">Pengembangan karir</td> 
                                        <td class="bold" width="1%">:</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="radio" name="pengembang" id="pengembang-ringan" value="1"class="mr-1">Ringan                              
                                                <input type="radio" name="pengembang" id="pengembang-sedang" value="2"class="mr-1 ml-3">Sedang 
                                                <input type="radio" name="pengembang" id="pengembang-berat" value="3"class="mr-1 ml-3">Berat 
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%"></td>
                                        <td width="20%">Tanggungjawab terhadap oranglain</td> 
                                        <td class="bold" width="1%">:</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="radio" name="tanggungjewab" id="tanggungjewab-ringan" value="1"class="mr-1">Ringan                              
                                                <input type="radio" name="tanggungjewab" id="tanggungjewab-sedang" value="2"class="mr-1 ml-3">Sedang 
                                                <input type="radio" name="tanggungjewab" id="tanggungjewab-berat" value="3"class="mr-1 ml-3">Berat 
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                <table class="table table-no-border table-sm table-striped">
                                    <tr>
                                        <td class="bold" width="20%">Kesimpulan</td>
                                        <td class="bold" width="1%">:</td>
                                        <tr>
                                            <td colspan="3">
                                                <textarea id="kesimpulanhpdo"></textarea>
                                            </td>
                                        </tr>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%">Saran</td>
                                        <td class="bold" width="1%">:</td>
                                        <tr>
                                            <td colspan="3">
                                                <textarea id="saranhpdo"></textarea>
                                            </td>
                                        </tr>
                                    </tr>
                                </table>
                                <table class="table table-no-border table-sm table-striped">
                                    <tr>
                                        <td class="bold" width="20%">Dokter Pemeriksa </td>
                                        <td class="bold" width="1%">:</td>
                                        <td>
                                            <input type="text" name="dokter_hpdo" id="dokter-hpdo" class="select2c-input">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%">Tanggal</td>
                                        <td class="bold" width="1%">:</td>
                                        <td>
                                            <input type="text" name="tanggal_hpdo" class="custom-form col-lg-2" id="tanggal-hpdo">
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
                <div id="btn-simpan-hpdo"></div>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Form HPDO -->