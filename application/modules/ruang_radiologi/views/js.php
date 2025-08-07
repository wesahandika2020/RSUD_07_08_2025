<script>
    var dWidth = $(window).width();
    var dHeight = $(window).height();
    var x = screen.width / 2 - dWidth / 2;
    var y = screen.height / 2 - dHeight / 2;

    $(function() {

        getRuangRadiologi(1);
        
        $('#btn-tambah').click(function() {
            resetForm();
            $('#modal-add').modal('show');
            $('#modal-add-label').html('Tambah Ruang Radiologi');
            $('#id-ruang').val('');
        
        });

        $('#btn-reload').click(function() {
            resetForm();
            getRuangRadiologi(1);
        });

        $('#id-alat').select2({
            ajax: {
                url: "<?= base_url('ruang_radiologi/api/ruang_radiologi/alat_modality') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                    };
                },
                results: function(data, page) {
                    var more = (page * 20) < data.total; // whether or not there are more results available

                    // notice we return the value of more so Select2 knows if more results can be loaded
                    return {
                        results: data.data,
                        more: more
                    };
                }
            },
            formatResult: function(data) {

                if(data.name_modality !== undefined){
                    var markup = data.name_modality + ' - ' + data.aetitle;
                    return markup;
                }
            },
            formatSelection: function(data) {
                if(data.name_modality !== undefined){
                    return data.name_modality + ' - ' + data.aetitle;
                }
            }
        });

        $('#nama-layanan').select2({
            ajax: {
                url: "<?= base_url('ruang_radiologi/api/ruang_radiologi/nama_layanan') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                    };
                },
                results: function(data, page) {
                    var more = (page * 20) < data.total; // whether or not there are more results available

                    // notice we return the value of more so Select2 knows if more results can be loaded
                    return {
                        results: data.data,
                        more: more
                    };
                }
            },
            formatResult: function(data) {

                if(data.nama !== undefined){
                    var markup = data.nama;
                    return markup;
                }
            },
            formatSelection: function(data) {
                if(data.nama !== undefined){
                    return data.nama;
                }
            }
        });

    });

    function paging(p) {
        getRuangRadiologi(p);
    }

    function resetForm() {
        $('#footer').empty();
        $('#button').empty();
        $('input[type=text], select, textarea, #id').val('');
        $('a .select2-chosen').html('');                     
    }

    function removeList(el) {
        let parent = el.parentNode.parentNode;
        parent.parentNode.removeChild(parent);
    }

    function simpanRuangan() {

        let update = '';
        if ($('#id-ruang').val() !== '') {
            update = '&id=' + $('#id-ruang').val();
        }

        if ($('#id-alat').val() === '') {
            syams_validation('#id-alat', 'Alat Modality harus diisi...');
            return false;
        }

        syams_validation_remove('#id-alat');

        if ($('#nama-ruangan').val() === '') {
            syams_validation('#nama-ruangan', 'Nama Ruangan harus diisi...');
            return false;
        }

        syams_validation_remove('#nama-ruangan');

        $.ajax({
            type: 'POST',
            url: '<?= base_url('ruang_radiologi/api/ruang_radiologi/simpan_ruang_radiologi') ?>',
            data: $('#form-ruang-radiologi').serialize() + update,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if(typeof data.metaData !== 'undefined'){

                    if(data.metaData.code === 201){

                        messageCustom(data.metaData.message, 'Error');
                        getRuangRadiologi(1);
                        
                    } else {

                        messageCustom(data.metaData.message, 'Success');
                        $('#modal-add').modal('hide');
                        getRuangRadiologi(1);
                        
                    }

                }
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT', 'Error');
            }
        });
    }

    function getRuangRadiologi(p) {
        $('#page-now').val(p);

        $.ajax({
            type: 'GET',
            url: '<?= base_url('ruang_radiologi/api/ruang_radiologi/daftar_ruang_radiologi/page/') ?>' + p,
            data: 'keyword=' + $('#keyword-ruang').val(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {

                if ((p > 1) & (data.data.length === 0)) {
                    getRuangRadiologi(p - 1);
                    return false;
                }
                
                $('#pagination-ruang').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#summary-ruang').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
                $('#table-ruang tbody').empty();

                $.each(data.data, function(i, v) {                    
                    let html = /* html */ `
                        <tr>
                            <td class="center">${((i+1) + ((data.page - 1) * data.limit))}</td>
                            <td class="left">${v.name_modality} - ${v.aetitle}</td>                            
                            <td class="left">${v.nama_ruangan}</td>
                            <td class="left">${((v.nama_layanan !== null) ? v.nama_layanan : '')}</td>
                            <td class="right" style="display:flex;float:right">
                                <button type="button" class="btn btn-secondary btn-xs" onclick="editRuangRadiologi(${v.id}, ${p})"><i class="fa fa-edit"></i></button>
                                <button type="button" class="btn btn-secondary btn-xs" onclick="deleteRuangRadiologi(${v.id}, ${p})"><i class="fa fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    `;  

                    $('#table-ruang tbody').append(html);
                });

            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function editRuangRadiologi(id, p) {
        $('#id-ruang').val('');
        $('#id-alat').val('');
        $('#s2id_id-alat a .select2-chosen').html('');
        $('#nama-ruangan').val('');
        
        let dataRuang = '';

        $.ajax({
            type: 'GET',
            url: '<?= base_url('ruang_radiologi/api/ruang_radiologi/ambil_ruang_radiologi') ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                
                dataRuang = data.metaData.data;

                $('#page-now').val(p);
                $('#id-ruang').val(id);
                $('#id-alat').val(dataRuang.id_alat);
                $('#s2id_id-alat a .select2-chosen').html(dataRuang.name_modality+' - '+dataRuang.aetitle);
                $('#nama-layanan').val(dataRuang.id_layanan);
                $('#s2id_nama-layanan a .select2-chosen').html(dataRuang.nama_layanan);
                $('#nama-ruangan').val(dataRuang.nama_ruangan);
                $('#modal-add').modal('show');
                $('#modal-add-label').html('Form Edit Ruang Radiologi');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function deleteRuangRadiologi(id, p) {
        bootbox.dialog({
            title: "Konfirmasi Hapus",
            message: "Apakah anda yakin ingin menghapus data ini ?",
            buttons: {
                cancel: {
                    label: '<i class="fas fa-window-close"></i> Batal',
                    className: 'btn-secondary'
                },
                confirm: {
                    label: '<i class="fas fa-check"></i> Hapus',
                    className: 'btn-danger',
                    callback: function() {
                        $.ajax({
                            type: 'DELETE',
                            url: '<?= base_url('ruang_radiologi/api/ruang_radiologi/hapus_ruang_radiologi') ?>/id/' + id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                if(typeof data.metaData !== 'undefined'){

                                    if(data.metaData.code === 201){

                                        messageCustom(data.metaData.message, 'Error');
                                        getRuangRadiologi(p);
                                        
                                    } else {

                                        messageCustom(data.metaData.message, 'Success');
                                        getRuangRadiologi(p);
                                        
                                    }

                                }
                            
                            },
                            error: function(e) {
                                messageDeleteFailed();
                            }
                        });
                    }
                }
            }
        });
    }

    
</script>