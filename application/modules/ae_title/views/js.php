<script>
    var dWidth = $(window).width();
    var dHeight = $(window).height();
    var x = screen.width / 2 - dWidth / 2;
    var y = screen.height / 2 - dHeight / 2;

    $(function() {

        getAeTitle(1);
        
        $('#btn-tambah').click(function() {
            resetForm();
            $('#modal-add').modal('show');
            $('#modal-add-label').html('Tambah Ae Title');
            $('#id-aetitle').val('');
        
        });

        $('#btn-reload').click(function() {
            resetForm();
            getAeTitle(1);
        });

    });

    function paging(p) {
        getAeTitle(p);
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

    function simpanAeTitle() {

        let update = '';
        if ($('#id-aetitle').val() !== '') {
            update = '&id=' + $('#id-aetitle').val();
        }

        if ($('#id-ae').val() === '') {
            syams_validation('#id-ae', 'ID Ae harus diisi...');
            return false;
        }

        syams_validation_remove('#id-ae');

        if ($('#nama-aetitle').val() === '') {
            syams_validation('#nama-aetitle', 'Nama Ae Title harus diisi...');
            return false;
        }

        syams_validation_remove('#nama-aetitle');

        if ($('#ip-address').val() === '') {
            syams_validation('#ip-address', 'Ip Address harus diisi...');
            return false;
        }

        syams_validation_remove('#ip-address');

        $.ajax({
            type: 'POST',
            url: '<?= base_url('ae_title/api/ae_title/simpan_ae_title') ?>',
            data: $('#form-aetitle').serialize() + update,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if(typeof data.metaData !== 'undefined'){

                    if(data.metaData.code === 201){

                        messageCustom(data.metaData.message, 'Error');
                        getAeTitle(1);
                        
                    } else {

                        messageCustom(data.metaData.message, 'Success');
                        $('#modal-add').modal('hide');
                        getAeTitle(1);
                        
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

    function getAeTitle(p) {
        $('#page-now').val(p);

        $.ajax({
            type: 'GET',
            url: '<?= base_url('ae_title/api/ae_title/daftar_ae_title/page/') ?>' + p,
            data: 'keyword=' + $('#keyword-aetitle').val(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {

                if ((p > 1) & (data.data.length === 0)) {
                    getAeTitle(p - 1);
                    return false;
                }
                
                $('#pagination-aetitle').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#summary-aetitle').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
                $('#table-aetitle tbody').empty();

                $.each(data.data, function(i, v) {                    
                    let html = /* html */ `
                        <tr>
                            <td class="center">${((i+1) + ((data.page - 1) * data.limit))}</td>
                            <td class="center">${v.id_ae}</td>                            
                            <td class="left">${v.aetitle}</td>
                            <td class="left">${v.ip}</td>
                            <td class="right" style="display:flex;float:right">
                                <button type="button" class="btn btn-secondary btn-xs" onclick="editAeTitle(${v.id}, ${p})"><i class="fa fa-edit"></i></button>
                                <button type="button" class="btn btn-secondary btn-xs" onclick="deleteAeTitle(${v.id}, ${p})"><i class="fa fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    `;  

                    $('#table-aetitle tbody').append(html);
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

    function editAeTitle(id, p) {
        $('#id-aetitle').val('');
        $('#id-ae').val('');
        $('#nama-aetitle').val('');
        $('#ip-address').val('');
        
        let dataAeTitle = '';

        $.ajax({
            type: 'GET',
            url: '<?= base_url('ae_title/api/ae_title/ambil_aetitle') ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                
                dataAeTitle = data.metaData.data;

                $('#page-now').val(p);
                $('#id-aetitle').val(id);
                $('#id-ae').val(dataAeTitle.id_ae);
                $('#nama-aetitle').val(dataAeTitle.aetitle);
                $('#ip-address').val(dataAeTitle.ip);
                $('#modal-add').modal('show');
                $('#modal-add-label').html('Form Edit Ae Title');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function deleteAeTitle(id, p) {
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
                            url: '<?= base_url('ae_title/api/ae_title/hapus_aetitle') ?>/id/' + id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                if(typeof data.metaData !== 'undefined'){

                                    if(data.metaData.code === 201){

                                        messageCustom(data.metaData.message, 'Error');
                                        getAeTitle(p);
                                        
                                    } else {

                                        messageCustom(data.metaData.message, 'Success');
                                        getAeTitle(p);
                                        
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