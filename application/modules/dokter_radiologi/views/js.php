<script>
    var dWidth = $(window).width();
    var dHeight = $(window).height();
    var x = screen.width / 2 - dWidth / 2;
    var y = screen.height / 2 - dHeight / 2;

    $(function() {

        getUsername(1);
        
        $('#btn-tambah').click(function() {
            resetForm();
            $('#modal-add').modal('show');
            $('#modal-add-label').html('Tambah Username Dokter Radiologi');
            $('#id-user').val('');
        
        });

        $('#btn-reload').click(function() {
            resetForm();
            getUsername(1);
        });

        $('#dokter-radiologi').select2({
            ajax: {
                url: "<?= base_url('dokter_radiologi/api/dokter_radiologi/user_dokter') ?>",
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
                var markup = data.nama;
                return markup;
            },
            formatSelection: function(data) {
                return data.nama;
            }
        });

    });

    function paging(p) {
        getUsername(p);
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

    function simpanUsername() {

        let update = '';
        if ($('#id-username').val() !== '') {
            update = '&id=' + $('#id-username').val();
        }

        if ($('#username').val() === '') {
            syams_validation('#username', 'Userame harus diisi...');
            return false;
        }

        syams_validation_remove('#username');

        if ($('#dokter-radiologi').val() === '') {
            syams_validation('#dokter-radiologi', 'Dokter Radiologi harus diisi...');
            return false;
        }

        syams_validation_remove('#dokter-radiologi');

        $.ajax({
            type: 'POST',
            url: '<?= base_url('dokter_radiologi/api/dokter_radiologi/simpan_dokter_radiologi') ?>',
            data: $('#form-user-dokter').serialize() + update,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if(typeof data.metaData !== 'undefined'){

                    if(data.metaData.code === 201){

                        messageCustom(data.metaData.message, 'Error');
                        getUsername(1);
                        
                    } else {

                        messageCustom(data.metaData.message, 'Success');
                        $('#modal-add').modal('hide');
                        getUsername(1);
                        
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

    function getUsername(p) {
        $('#page-now').val(p);

        $.ajax({
            type: 'GET',
            url: '<?= base_url('dokter_radiologi/api/dokter_radiologi/daftar_dokter_radiologi/page/') ?>' + p,
            data: 'keyword=' + $('#keyword-username').val(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {

                if ((p > 1) & (data.data.length === 0)) {
                    getUsername(p - 1);
                    return false;
                }
                
                $('#pagination-username').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#summary-username').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
                $('#table-username tbody').empty();

                $.each(data.data, function(i, v) {                    
                    let html = /* html */ `
                        <tr>
                            <td class="center">${((i+1) + ((data.page - 1) * data.limit))}</td>
                            <td class="left">${v.nama}</td>                            
                            <td class="center">${v.username}</td>
                            <td class="right" style="display:flex;float:right">
                                <button type="button" class="btn btn-secondary btn-xs" onclick="editUsername(${v.id}, ${p})"><i class="fa fa-edit"></i></button>
                                <button type="button" class="btn btn-secondary btn-xs" onclick="deleteUsername(${v.id}, ${p})"><i class="fa fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    `;  

                    $('#table-username tbody').append(html);
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

    function editUsername(id, p) {
        $('#username').val('');
        $('#id-username').val('');
        $('#dokter-radiologi').val('');
        $('#s2id_dokter-radiologi a .select2-chosen').html('');

        let dataUsername = '';

        $.ajax({
            type: 'GET',
            url: '<?= base_url('dokter_radiologi/api/dokter_radiologi/ambil_username') ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                
                dataUsername = data.metaData.data;

                $('#page-now').val(p);
                $('#id-username').val(id);
                $('#username').val(dataUsername.username);
                $('#dokter-radiologi').val(dataUsername.idDokter);
                $('#s2id_dokter-radiologi a .select2-chosen').html(dataUsername.nama);
                $('#modal-add').modal('show');
                $('#modal-add-label').html('Form Edit Username Dokter Radiologi');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function deleteUsername(id, p) {
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
                            url: '<?= base_url('dokter_radiologi/api/dokter_radiologi/hapus_username') ?>/id/' + id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                if(typeof data.metaData !== 'undefined'){

                                    if(data.metaData.code === 201){

                                        messageCustom(data.metaData.message, 'Error');
                                        getUsername(p);
                                        
                                    } else {

                                        messageCustom(data.metaData.message, 'Success');
                                        getUsername(p);
                                        
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