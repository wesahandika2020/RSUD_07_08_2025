<div id="modal-fisio" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 60%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-fisio-label">Permintaan Pemeriksaan Rehabilitasi Medik</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('','id=form-fisio role=form class=form-horizontal') ?>
                    <input type="hidden" name="tarif_tindakan" id="tarif-tindakan-fisio"/>
                    
                    <div class="form-group row tight">
                        <label class="col-lg-2 col-form-label">Dokter Pemesan</label>
                        <div class="col-lg-6">
                            <input type="text" name="dokter" class="select2-input" id="dokter-fisio">
                        </div>
                    </div>
                    <div class="form-group row tight">
                        <label class="col-lg-2 col-form-label">Pemeriksaan</label>
                        <div class="col-lg-6">
                            <input type="text" name="tindakan" class="select2-input" id="tindakan-fisio">
                        </div>
                    </div>
                    <div class="form-group row tight">
                        <label class="col-lg-2 col-form-label"></label>
                        <div class="col">
                            <button type="button" class="btn btn-info" onclick="addFisioterapi()"><i class="fas fa-plus-circle mr-2"></i>Tambah</button>
                        </div>
                    </div>
                    <table class="table table-hover table-striped table-sm color-table info-table" id="table-fisio">
                        <thead>
                            <tr>
                                <th class="center">No.</th>
                                <th class="left">Pemeriksaan</th>
                                <th class="right">Tarif</th>
                                <th class="right"></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                <?= form_close() ?>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="simpanRequestFisioterapi()"><i class="fas fa-save mr-1"></i>Simpan</button>
            </div>
        
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    var dWidth = $(window).width();
    var dHeight= $(window).height();
    var x = screen.width/2 - dWidth/2;
    var y = screen.height/2 - dHeight/2;

    $(function() {
        $('#dokter-fisio').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/dokter_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function (term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                    };
                },
                results: function (data, page) {
                    var more = (page * 20) < data.total; // whether or not there are more results available
         
                    // notice we return the value of more so Select2 knows if more results can be loaded
                    return {results: data.data, more: more};
                }
            },
            formatResult: function(data){
                var markup = data.nama+'<br/><i>'+data.spesialisasi+'</i>';
                return markup;
            }, 
            formatSelection: function(data){
                return data.nama;
            }
        });

        $('#tindakan-fisio').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/tarif_pelayanan_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function (term, page) { // page is the one-based page number tracked by Select2

                    return {
                        q: term, //search term
                        jenis_pemeriksaan: 'Pelayanan Rehabilitasi Medik',
                        page: page, // page number
                    };
                },
                results: function (data, page) {
                    var more = (page * 20) < data.total; // whether or not there are more results available
         
                    // notice we return the value of more so Select2 knows if more results can be loaded
                    return {results: data.data, more: more};
                }
            },
            formatResult: function(data){
                var total = data.total;
                var kelas = (data.kelas !== null)?((', kelas ')+data.kelas):((data.id !== '')?'Semua Kelas':'');
                var jenis = (data.jenis !== null)?('<br/>'+data.jenis+'<br/>'):'<br/>';
                
                var markup = '<b>'+data.layanan+'</b>'+jenis+data.bobot+kelas+'<br/>'+numberToCurrency(total);
                return markup;
            }, 
            formatSelection: function(data){
                $('#tarif-tindakan-fisio').val(data.total);
                var kelas = (data.kelas !== null)?((', kelas ')+data.kelas+'<br/>'):'';
                var jenis = (data.jenis !== null)?data.jenis:'';
                var result = data.layanan+', '+jenis+', '+data.bobot+kelas;
                if (data.id === '') {
                    result = '';
                }
                return result;
            }
        });
    });

    function requestFisioterapi() {
        $('#tindakan-fisio, #tarif-tindakan-fisio').val('');
        $('#s2id_tindakan-fisio a .select2-chosen').html('');
        $('#dokter-fisio').val($('#dokter').val());
        $('#s2id_dokter-fisio a .select2-chosen').html($('#s2id_dokter a .select2c-chosen').html());
        $('#table-fisio tbody').empty();
        $('#modal-fisio').modal('show');
    }

    function addFisioterapi() {
        let stop = false;
        if ($('#tindakan-fisio').val() === '') {
            syams_validation('#tindakan-fisio', 'Pemeriksaan harus diisi!');
            stop = true;
        }

        if (stop) {
            return false;
        }

        let html = '';
        let numb = $('.number-tindakan-fisio').length;

        let tindakan = $('#s2id_tindakan-fisio a .select2-chosen').html();
        let id_tindakan = $('#tindakan-fisio').val();
        let tarif = $('#tarif-tindakan-fisio').val();

        if (tarif === '') {
            tarif = 0;
        }

        html = '<tr>'+ 
                    '<td class="number-tindakan-fisio center">'+ (++numb) +'</td>'+
                    '<td><input type="hidden" name="id_tindakan_fisio[]" value="' + id_tindakan + '">'+ tindakan +'</td>'+
                    '<td class="right">'+ numberToCurrency(tarif) +'</td>'+
                    '<td class="right"><button type="button" class="btn btn-secondary btn-xs" onclick="hapusList(this)"><i class="fas fa-trash-alt"></i></button></td>'+
                '</tr>';
        $('#table-fisio tbody').append(html);

        $('#tindakan-fisio').val('');
        $('#s2id_tindakan-fisio a .select2-chosen').html('');
    }

    function simpanRequestFisioterapi() {
        let id_layanan_pendaftaran = $('#id-layanan').val();
        let id_dokter = $('#dokter-fisio').val();
        let stop = false;

        if (id_dokter === '') {
            syams_validation('#dokter-fisio', 'Dokter harus dipilih!');
            stop = true;
        }

        if (stop) {
            return false;
        }

        if ((id_layanan_pendaftaran !== '') & (id_dokter !== '')) {
            swal.fire({
                title: 'Konfirmasi',
                html: "Apakah anda yakin ingin mengorder rehab medik ?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: '<i class="fas fa-paper-plane mr-1"></i>Order',
                cancelButtonText: '<i class="fas fa-times-circle mr-1"></i>Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url('pelayanan/api/pelayanan/simpan_order_fisioterapi') ?>',
                        data: $('#form-fisio').serialize() + '&id_layanan_pendaftaran=' + id_layanan_pendaftaran + '&dokter=' + id_dokter,
                        cache: false,
                        dataType: 'JSON',
                        beforeSend: function() {
                            showLoader();
                        },
                        success: function(data) {
                            let type = 'Success';
                            if (data.status === false) { 
                                type = 'Error';
                            }

                            messageCustom(data.message, type);   
                            $('#modal-fisio').modal('hide');
                            getPemeriksaanFisio(id_layanan_pendaftaran);
                        },
                        complete: function() {
                            hideLoader();
                        },
                        error: function(e) {
                            messageCustom('Terjadi kesalahan sistem', 'Error');
                        }
                    });  
                }
            })
        } else {
            messageCustom('Parameter tidak lengkap', 'Info');
        }
    }

    function cetakPemeriksaanFisioterapi(id_order) {
        window.open('<?php echo base_url('') ?>', 'Cetak Order Fisioterapi', 'width=' + dWidth +', height=' + dHeight + ', left=' + x + ', top=' + y);
    }

    function cetakHasilFisioterapi(id_fisioterapi) {
        window.open('<?php echo base_url('') ?>', 'Cetak Hasil Fisioterapi', 'width=' + dWidth +', height=' + dHeight + ', left=' + x + ', top=' + y);
    }

    function getPemeriksaanFisio(id_layanan_pendaftaran) {
        $('#request-fisio').empty();
        $.ajax({
            type: 'GET',
            url: '<?php echo base_url('pelayanan/api/pelayanan/get_pemeriksaan_fisioterapi_detail') ?>/id/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                if (data.length > 0) {
                    let html = '';
                    $.each(data, function(i, v){
                        var hapus_rad = '';
                        if (v.waktu_hasil === null) {
                        };

                        html = '<table class="table table-sm table-detail table-striped">'+
                                    '<tr><td width="15%"><strong>Waktu Order</strong></td><td>'+((v.waktu_konfirm !== null)?datetimefmysql(v.waktu_konfirm):'')+'</td></tr>'+
                                    '<tr><td width="15%"><strong>Waktu Hasil</strong></td><td>'+((v.waktu_hasil !== null)?datetimefmysql(v.waktu_hasil):'')+'</td></tr>'+
                                    '<tr><td width="15%"><strong>Dokter Pemesan</strong></td><td>'+v.dokter+'</td></tr>'+
                                    '<tr><td width="15%"></td>'+
                                        '<td></td>' 
                                        '<td><button title="Klik untuk melihat order radiologi" type="button" class="btn btn-secondary btn-xxs mr-1" onclick="cetakPemeriksaanFisioterapi('+v.id+')"><i class="fa fa-print"></i> Nota Order</button>'+
                                        '<button title="Klik untuk melihat hasil radiologi" type="button" class="btn btn-secondary btn-xxs" onclick="cetakHasilFisioterapi('+v.id+')"><i class="fa fa-print"></i> Tampilkan Hasil</button></td>'+
                                    '</tr>'+
                                    hapus_rad+
                                  '</table>';
                            $('#request-fisio').append(html);

                        html = '<table class="table table-hover table-striped table-sm color-table info-table">'+
                                    '<thead><tr>'+
                                            '<th width="20%" class="left">Layanan</th>'+
                                            '<th width="45%" class="left"></th>'+
                                            '<th width="30%" class="left">Status</th>'+
                                            '<th align="center" width="5%"></th>'+
                                    '</tr></thead><tbody>';
                       

                        $.each(v.detail, function(j, x){
                              html += '<tr>'+
                                    '<td><b>'+ j +'</b></td>'+
                                    '<td></td>'+
                                    '<td></td>'+
                                    '<td></td>'+
                                    '</tr>';
                            
                            var hapus = '';
                            $.each(x, function(k, z){
                                if (z.status == 'Belum') {
                                    //hapus = '<button type="button" class="btn btn-default btn-xs" onclick="hapus_detail_lab(this, '+z.id+')"><i class="fa fa-trash-o"></i></button>';
                                };
                                html += '<tr>'+
                                    '<td></td>'+
                                    '<td>'+z.layanan_fisio+'</td>'+
                                    '<td>'+z.konfirmasi+'</td>'+
                                    '<td align="center">'+hapus+'</td>'+
                                    '</tr>';
                            });
                        });

                        html += '</tbody></table><br/><hr/>';
                        $('#request-fisio').append(html);
                    });

                }
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function hapusList(el) {
        var parent = el.parentNode.parentNode;
        parent.parentNode.removeChild(parent);
    }
</script>