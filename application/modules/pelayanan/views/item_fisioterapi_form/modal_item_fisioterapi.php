<div id="modal-fisio" class="modal fade" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 60%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-fisio-label">Tambah Item Pemeriksaan Rehabilitasi Medik</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <?= form_open('','id=form-fisio role=form class=form-horizontal') ?>
                    <input type="hidden" name="tarif_tindakan" id="tarif-tindakan-fisio"/>
                    
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
                <button type="button" class="btn btn-info waves-effect" onclick="konfirmasiSimpanRequestFisioterapi()"><i class="fas fa-save mr-1"></i>Simpan</button>
            </div>
        
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    $(function () {
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
    })

    function requestFisioterapi() {
        $('#modal-fisio').modal('show');
        $('#tindakan-fisio, #tarif-tindakan-fisio').val('');
        $('#s2id_tindakan-fisio a .select2-chosen').html('');
        $('#table-fisio tbody').empty();
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
                    '<td><input type="hidden" name="tindakan_fisioterapi[]" value="' + id_tindakan + '">'+ tindakan +'</td>'+
                    '<td class="right">'+ numberToCurrency(tarif) +'</td>'+
                    '<td class="right"><button type="button" class="btn btn-secondary btn-xs" onclick="hapusList(this)"><i class="fas fa-trash-alt"></i></button></td>'+
                '</tr>';
        $('#table-fisio tbody').append(html);

        $('#tindakan-fisio').val('');
        $('#s2id_tindakan-fisio a .select2-chosen').html('');
    }

    function konfirmasiSimpanRequestFisioterapi() {
        let id_fisioterapi = $('#id-fisioterapi').val();
        if (id_fisioterapi === '') {
            messageCustom('Terjadi kesalah pada aplikasi', 'Error');
        } else {
            Swal.fire({
                title: 'Konfirmasi Simpan Request',
                html: "Apakah anda yakin ingin menyimpan <br> data permintaan request fisioterapi ini ?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: '<i class="fas fa-save mr-1"></i>Simpan',
                cancelButtonText: '<i class="fas fa-times-circle mr-1"></i>Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    simpanRequestFisioterapi(id_fisioterapi);
                }
            })
        }
    }

    function simpanRequestFisioterapi(id_fisioterapi) {
        $.ajax({
            type: 'POST',
            url: '<?= base_url("hasil_fisioterapi/api/hasil_fisioterapi/simpan_item_pemeriksaan_fisioterapi") ?>',
            data: $('#form-fisio').serialize() + '&id_fisioterapi=' + id_fisioterapi,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                let statusTransaction = 'Error';
                if (data.status === true) {
                    statusTransaction = 'Success';
                }

                messageCustom(data.message, statusTransaction);
                $('input[type=checkbox]').prop('checked', false);
                $('#modal-fisio').modal('hide');
                $('#modal-detail-pemeriksaan').modal('hide');
            }, 
            error: function(e) {
                messageCustom('Gagal tambah item pemeriksaan fisioterapi', 'Error');
            }
        })
    }

    function hapusList(object) {
        var parent = object.parentNode.parentNode;
        parent.parentNode.removeChild(parent);
    }

</script>