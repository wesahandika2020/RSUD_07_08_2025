<script>
    var dWidth = $(window).width();
    var dHeight = $(window).height();
    var x = screen.width / 2 - dWidth / 2;
    var y = screen.height / 2 - dHeight / 2;

    $(function() {

        getModality(1);
        
        $('#btn-tambah').click(function() {
            resetForm();
            $('#modal-add').modal('show');
            $('#modal-add-label').html('Tambah Modality');
            $('#id-modality').val('');
        
        });

        $('#btn-reload').click(function() {
            resetForm();
            getModality(1);
        });

        $('#id-aetitle').select2({
            ajax: {
                url: "<?= base_url('modality/api/modality/aetitle') ?>",
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
                var markup = data.aetitle;
                return markup;
            },
            formatSelection: function(data) {
                return data.aetitle;
            }
        });

    });

    function paging(p) {
        getModality(p);
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

    function simpanModality() {

        let update = '';
        if ($('#id-modality').val() !== '') {
            update = '&id=' + $('#id-modality').val();
        }

        if ($('#id-modal').val() === '') {
            syams_validation('#id-modal', 'ID Modality harus diisi...');
            return false;
        }

        syams_validation_remove('#id-modal');

        if ($('#kode-modality').val() === '') {
            syams_validation('#kode-modality', 'Kode Modality harus diisi...');
            return false;
        }

        syams_validation_remove('#kode-modality');

        if ($('#nama-modality').val() === '') {
            syams_validation('#nama-modality', 'Nama Modality harus diisi...');
            return false;
        }

        syams_validation_remove('#nama-modality');

        if ($('#id-aetitle').val() === '') {
            syams_validation('#id-aetitle', 'Aetitle harus diisi...');
            return false;
        }

        syams_validation_remove('#id-aetitle');

        $.ajax({
            type: 'POST',
            url: '<?= base_url('modality/api/modality/simpan_modality') ?>',
            data: $('#form-modality').serialize() + update,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if(typeof data.metaData !== 'undefined'){

                    if(data.metaData.code === 201){

                        messageCustom(data.metaData.message, 'Error');
                        getModality(1);
                        
                    } else {

                        messageCustom(data.metaData.message, 'Success');
                        $('#modal-add').modal('hide');
                        getModality(1);
                        
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

    function getModality(p) {
        $('#page-now').val(p);

        $.ajax({
            type: 'GET',
            url: '<?= base_url('modality/api/modality/daftar_modality/page/') ?>' + p,
            data: 'keyword=' + $('#keyword-modality').val(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {

                if ((p > 1) & (data.data.length === 0)) {
                    getModality(p - 1);
                    return false;
                }
                
                $('#pagination-modality').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#summary-modality').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
                $('#table-modality tbody').empty();

                $.each(data.data, function(i, v) {                    
                    let html = /* html */ `
                        <tr>
                            <td class="center">${((i+1) + ((data.page - 1) * data.limit))}</td>
                            <td class="center">${v.id_modality}</td>                            
                            <td class="center">${v.code_modality}</td>
                            <td class="left">${v.name_modality}</td>
                            <td class="left">${v.aetitle}</td>
                            <td class="right" style="display:flex;float:right">
                                <button type="button" class="btn btn-secondary btn-xs" onclick="editModality(${v.id}, ${p})"><i class="fa fa-edit"></i></button>
                                <button type="button" class="btn btn-secondary btn-xs" onclick="deleteModality(${v.id}, ${p})"><i class="fa fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    `;  

                    $('#table-modality tbody').append(html);
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

    function editModality(id, p) {
        $('#id-modality').val('');
        $('#id-modal').val('');
        $('#kode-modality').val('');
        $('#nama-modality').val('');
        $('#id-aetitle').val('');
        $('#s2id_id-aetitle a .select2-chosen').html('');
        
        let dataModality = '';

        $.ajax({
            type: 'GET',
            url: '<?= base_url('modality/api/modality/ambil_modality') ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                
                dataModality = data.metaData.data;

                $('#page-now').val(p);
                $('#id-modality').val(id);
                $('#id-modal').val(dataModality.id_modality);
                $('#kode-modality').val(dataModality.code_modality);
                $('#nama-modality').val(dataModality.name_modality);
                $('#id-aetitle').val(dataModality.id_aetitle);
                $('#s2id_id-aetitle a .select2-chosen').html(dataModality.aetitle);
                $('#modal-add').modal('show');
                $('#modal-add-label').html('Form Edit Modality');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function deleteModality(id, p) {
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
                            url: '<?= base_url('modality/api/modality/hapus_modality') ?>/id/' + id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                if(typeof data.metaData !== 'undefined'){

                                    if(data.metaData.code === 201){

                                        messageCustom(data.metaData.message, 'Error');
                                        getModality(p);
                                        
                                    } else {

                                        messageCustom(data.metaData.message, 'Success');
                                        getModality(p);
                                        
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