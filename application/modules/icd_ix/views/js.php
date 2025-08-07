<script>
    var dWidth = $(window).width();
    var dHeight = $(window).height();
    var x = screen.width / 2 - dWidth / 2;
    var y = screen.height / 2 - dHeight / 2;

    $(function() {

        $('#status').val('1');
        getLisIcdIx(1);
        
        $('#btn-tambah').click(function() {
            resetForm();
            $('#modal-add').modal('show');
            $('#modal-add-label').html('Tambah');
            $('#id-icd9').val('');
        
        });

        $('#btn-reload').click(function() {
            resetForm();
            getLisIcdIx(1);
        });

        $('#status').change(function() {
			getLisIcdIx(1)
		})

        $('#keyword').keyup(debounceTime(function() {
            getLisIcdIx(1);
		}, 750));

    });

    function paging(p) {
        getLisIcdIx(p);
    }

    function resetForm() {
        $('#footer').empty();
        $('#button').empty();
        $('input[type=text], select, textarea, #id').val('');
        $('a .select2-chosen').html('');    
        $('#status-add').val('1');        
        $('#status').val('1');        
    }

    function removeList(el) {
        let parent = el.parentNode.parentNode;
        parent.parentNode.removeChild(parent);
    }

    function getLisIcdIx(p) {
        $('#page-now').val(p);

        $.ajax({
            type: 'GET',
            url: '<?= base_url('icd_ix/api/icd_ix/get_list_icd_ix/page/') ?>' + p ,
            data: 'keyword=' + $('#keyword').val() + '&status=' + $('#status').val(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {

                if ((p > 1) & (data.data.length === 0)) {
                    getLisIcdIx(p - 1);
                    return false;
                }
                
                $('#pagination-icd9').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#summary-icd9').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
                $('#table-icd9 tbody').empty();

                $.each(data.data, function(i, v) {     
                    let tindakan = '['+v.icd9+'] '+v.nama;
                    let status = `<div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="${v.id}" onclick="konfirmasiUpdateStatus(${v.id}, ${v.is_aktif}, '${tindakan}')" ${(v.is_aktif == 1 ? 'checked' : '')}>
                                    <label class="custom-control-label" for="${v.id}">${(v.is_aktif == 1 ? '<h5><span class="label label-success">Aktif</span></h5>' : '<h5><span class="label label-danger">Tidak Aktif</span></h5>')}</label>
                                </div>`;

                    let html = /* html */ `
                        <tr>
                            <td class="center">${((i+1) + ((data.page - 1) * data.limit))}</td>
                            <td class="center">${v.icd9}</td>     
                            <td class="left">${v.nama}</td>
                            <td class="center">${status}</td>     
                            <td class="right" style="display:flex;float:right">
                                <button type="button" class="btn btn-secondary btn-xs" onclick="editIcd9(${v.id}, ${p})"><i class="fa fa-edit"></i></button>
                                <button type="button" class="btn btn-secondary btn-xs" onclick="deleteIcd9(${v.id},'${tindakan}', ${p})"><i class="fa fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    `;  

                    $('#table-icd9 tbody').append(html);
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

    function konfirmasiUpdateStatus(id, status, tindakan) {
        let getStatus = status == 1 ? 'mengaktifkan' : 'menonaktifkan';

        bootbox.dialog({
            title: "Konfirmasi Ubah Status",
            message: "Apakah anda yakin ingin <b>"+getStatus+"</b> data <b>"+tindakan+"</b> ?",
            buttons: {
                cancel: {
                    label: '<i class="fas fa-window-close"></i> Batal',
                    className: 'btn-secondary',
                    callback: function() {
                        getLisIcdIx($('#page-now').val());
                    }
                },
                confirm: {
                    label: '<i class="fas fa-check"></i> Ubah',
                    className: 'btn-info',
                    callback: function() {
                        $.ajax({
                            type: 'POST',
                            url: '<?php echo site_url('icd_ix/api/icd_ix/update_status') ?>',
                            data: 'id=' + id + '&status=' + status,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                if (data.status !== false) {
                                    getLisIcdIx($('#page-now').val());
                                    messageCustom(data.message, 'Success');
                                } else {
                                    messageCustom(data.message, 'Error');
                                }
                            },
                            error: function(e) {
                                messageCustom('error', 'Error', 'Sistem Error');
                            }
                        })
                    }
                }
            }
        });
    }

    function updateStatus(id, status) {
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url('icd_ix/api/icd_ix/update_status') ?>',
            data: 'id=' + id + '&status=' + status,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                if (data.status !== false) {
                    getLisIcdIx($('#page-now').val());
                    messageCustom(data.message, 'Success');
                } else {
                    messageCustom(data.message, 'Error');
                }
            },
            error: function(e) {
                messageCustom('error', 'Error', 'Sistem Error');
            }
        })
    }

    function simpanIcd9() {
        
        let update = '';
        if ($('#id-icd9').val() !== '') {
            update = '&id=' + $('#id-icd9').val();
        }

        if ($('#kode-icd9-add').val() === '') {
            syams_validation('#kode-icd9-add', 'Kode ICD IX harus diisi...');
            return false;
        }
        
        if ($('#nama-add').val() === '') {
            syams_validation('#nama-add', 'Nama harus diisi...');
            return false;
        }        
        
        if ($('#status-add').val() === '') {
            syams_validation('#status-add', 'Status harus diisi...');
            return false;
        }
        
        syams_validation_remove('#kode-icd9-add');
        syams_validation_remove('#nama-add');
        syams_validation_remove('#status-add');

        $.ajax({
            type: 'POST',
            url: '<?= base_url('icd_ix/api/icd_ix/simpan_icd9') ?>',
            data: $('#form-icd9').serialize() + update,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if(typeof data.metaData !== 'undefined'){
                    if(data.metaData.code === 201){
                        messageCustom(data.metaData.message, 'Error');
                        getLisIcdIx(1);                        
                    } else {
                        messageCustom(data.metaData.message, 'Success');
                        $('#modal-add').modal('hide');
                        getLisIcdIx(1);                        
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

    function editIcd9(id, p) {
        $('#id-icd9').val('');
        $('#kode-icd9-add').val('');
        $('#nama-add').val('');
        $('#status-add').val('');
        
        let data = '';
        $.ajax({
            type: 'GET',
            url: '<?= base_url('icd_ix/api/icd_ix/get_icd9') ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {                
                data = data.metaData.data;
                $('#page-now').val(p);
                $('#id-icd9').val(id);
                $('#kode-icd9-add').val(data.icd9);
                $('#nama-add').val(data.nama);
                $('#status-add').val(data.is_aktif);
                $('#modal-add').modal('show');
                $('#modal-add-label').html('Form Edit ICD IX');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function deleteIcd9(id,tindakan, p) {
        bootbox.dialog({
            title: "Konfirmasi Hapus",
            message: "Apakah anda yakin ingin menghapus data <b>"+tindakan+"</b> ?",
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
                            url: '<?= base_url('icd_ix/api/icd_ix/hapus_icd9') ?>/id/' + id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                if(typeof data.metaData !== 'undefined'){
                                    if(data.metaData.code === 201){
                                        messageCustom(data.metaData.message, 'Error');
                                        getLisIcdIx(p);                                        
                                    } else {
                                        messageCustom(data.metaData.message, 'Success');
                                        getLisIcdIx(p);                                        
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