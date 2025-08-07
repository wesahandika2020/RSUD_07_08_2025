<script>
    $(function() {
        getListFarmakoterapi(1);

        $('#bt_tambah_farmakoterapi').click(function() {
            resetAll();
            $('.edit-hide').show();
            $('#modal_farmakoterapi').modal('show');
            $('#modal_farmakoterapi_label').html('Form Tambah Farmakoterapi');
        });

        $('#bt_reload_data').click(function() {
            resetAll();
            getListFarmakoterapi(1);
        });

        $('.form-control').keyup(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this);
            }
        });

        $('.form-control').change(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this);
            }
        });

        $('#farmakoterapi-auto').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/farmakoterapi_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function (term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page // page number
                    };
                },
                results: function (data, page) {
                    var more = (page * 20) < data.total; // whether or not there are more results available
         
                    // notice we return the value of more so Select2 knows if more results can be loaded
                    return {results: data.data, more: more};
                }
            },
            formatResult: function(data){
                var markup = data.kode+' '+data.nama;
                return markup;
            }, 
            formatSelection: function(data){
                return data.nama;
            }
        });

        $('#bt_expand_all').click(function() {
            $('#table_farmakoterapi').treetable('expandAll');
        });

        $('#bt_collapse_all').click(function() {
            $('#table_farmakoterapi').treetable('collapseAll');
        });
    });

    function resetAll() {
        $('input[type=text], .form-control, #id, #pencarian_farmakoterapi').val('');
        syams_validation_remove('.form-control');
    }

    function getListFarmakoterapi(p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('farmakoterapi/api/farmakoterapi/get_list_farmakoterapi/page/') ?>' + p,
            data: 'keyword=' + $('#pencarian_farmakoterapi').val(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getListFarmakoterapi(p - 1);
                    return false;
                }

                $('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
                $("#table_farmakoterapi").treetable('destroy');
                $('#table_farmakoterapi tbody').empty();
                extractData(data);
                
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
                hideLoader();
            }
        });
    }

    function extractData(data){
        var str = '';
        var branch = ''; var parent = ''; var root = '';
        $.each(data.data,function(i, v){
            
            root = ((i+1) + ((data.page - 1) * data.limit))
            branch = 'data-tt-id="'+root+'"';
            str = drawTable(v, branch, parent, data.page, 0);
            $('#table_farmakoterapi tbody').append(str);
            
            if (v.child !== null) {
                $.each(v.child, function(i2 , v2){
                    branch = 'data-tt-id="'+root+'-'+i2+'"';
                    parent = 'data-tt-parent-id="'+root+'"';
                    str = drawTable(v2, branch, parent, data.page, 20);
                    $('#table_farmakoterapi tbody').append(str);

                    if (v2.child !== null) {
                        $.each(v2.child, function(i3 , v3){
                            
                            branch = 'data-tt-id="'+root+'-'+i2+'-'+i3+'"';
                            parent = 'data-tt-parent-id="'+root+'-'+i2+'"';
                            str = drawTable(v3, branch, parent, data.page, 40);
                            $('#table_farmakoterapi tbody').append(str);

                            if (v3.child !== null) {
                                $.each(v3.child, function(i4 , v4){
                                    i4++;
                                    branch = 'data-tt-id="'+root+'-'+i2+'-'+i3+'-'+i4+'"';
                                    parent = 'data-tt-parent-id="'+root+'-'+i2+'-'+i3+'"';
                                    str = drawTable(v4, branch, parent, data.page, 60);
                                    $('#table_farmakoterapi tbody').append(str);
                                    if (v4.child !== null) {
                                        $.each(v4.child, function(i5 , v5){
                                            i5++;
                                            branch = 'data-tt-id="'+root+'-'+i2+'-'+i3+'-'+i4+'-'+i5+'"';
                                            parent = 'data-tt-parent-id="'+root+'-'+i2+'-'+i3+'-'+i4+'"';
                                            str = drawTable(v5, branch, parent, data.page, 80);
                                            $('#table_farmakoterapi tbody').append(str);
                                        });
                                    };
                                });
                            };
                        });
                    };
                });
            };
        branch = ''; parent = '';
        });
        
        $("#table_farmakoterapi").treetable({expandable:true}); 
    }

    function drawTable(v, branch, parent, page, indent){

        let html = /* html */ ` 
            <tr ${branch} ${parent}>
                <td>${v.kode}</td>
                <td><span style="margin-left: ${indent}px;">${v.nama}</span></td>
                <td class="right aksi">
                    <button type="button" class="btn btn-secondary btn-xs" onclick="editFarmakoterapi(${v.id}, ${page})"><i class="fa fa-edit"></i> Edit</button>
                    <button type="button" class="btn btn-secondary btn-xs" onclick="deleteFarmakoterapi(${v.id}, ${page})"><i class="fa fa-trash-alt"></i> Hapus</button>
                </td>
            </tr>
        `;
        return html;
    }

    function simpanDataFarmakoterapi() {
        let update = '';
        if ($('#id').val() !== '') {
            update = 'id/' + $('#id').val();
        }

        $.ajax({
            type: 'POST',
            url: '<?= base_url('farmakoterapi/api/farmakoterapi/simpan_farmakoterapi/') ?>' + update,
            cache: false,
            data: $('#form_farmakoterapi').serialize(),
            dataType: 'JSON',
            success: function(data) {
                if (data.status == false) {
                    $('input[name=csrf_syam]').val(data.token);

                    if (data.error_string['nama']) {
                        syams_validation('#nama', data.error_string['nama']);
                    }

                } else {
                    $('input[name=csrf_syam]').val(data.token);
                    if ($('#id').val() !== '') {
                        messageEditSuccess();
                        getListFarmakoterapi($('#page_now').val());
                    } else {
                        messageAddSuccess();
                        getListFarmakoterapi(1);
                    }

                    $('#modal_farmakoterapi').modal('hide');
                    resetAll();
                }
            },
            error: function(e) {
                messageCustom(e.status + ' | Gagal menyimpan data!', 'Error');
            }
        });
    }

    function editFarmakoterapi(id, p) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('farmakoterapi/api/farmakoterapi/get_farmakoterapi') ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#id').val(data.data.id);
                $('#nama').val(data.data.nama);
                $('#alamat').val(data.data.alamat);
                $('#email').val(data.data.email);
                $('#telp').val(data.data.telp);

                $('.edit-hide').hide();
                $('#page_now').val(p);
                $('#modal_farmakoterapi').modal('show');
                $('#modal_farmakoterapi_label').html('Form Edit Farmakoterapi');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function deleteFarmakoterapi(id, p) {
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
                            url: '<?= base_url('farmakoterapi/api/farmakoterapi/delete_farmakoterapi') ?>/id/' + id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                messageDeleteSuccess();
                                getListFarmakoterapi(p);
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

    function paging(p) {
        getListFarmakoterapi(p);
    }
</script>