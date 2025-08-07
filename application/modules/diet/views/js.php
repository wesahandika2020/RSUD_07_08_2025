<script type="text/javascript" src="<?= resource_url() ?>assets/node_modules/wizard/bwizard.js"></script>
<script>
    var dWidth = $(window).width();
    var dHeight = $(window).height();
    var x = screen.width / 2 - dWidth / 2;
    var y = screen.height / 2 - dHeight / 2;

    $(function() {
        getListDiet(1);
        
        $('#btn-tambah').click(function() {
            resetForm();
            $('#modal-add').modal('show');
            $('#modal-add-label').html('Tambah Nama Diet');
            $('#input-item-diet').show();
            $('.input-diet').val('');
            $('.input-diet').prop('readonly', false);
            $('#table-list-diet tbody').empty();
            
            let htmlFooter = /* html */ `
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i
                        class="fas fa-window-close"></i> Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="konfirmasiDiet()"><i
                        class="fas fa-save"></i> Simpan</button>
            `;  

            $('#footer').append(htmlFooter);

            let htmlButton = /* html */ `
                <div class="col-lg-9">
                    <button type="button" class="btn btn-info" onclick="addDietForm()"><i class="fa fa-arrow-circle-down"></i> Tambahkan</button>
                </div>
            `;  

            $('#button').append(htmlButton); 

            });

        $('#btn-reload').click(function() {
            resetForm();
            getListDiet(1);
        });

    });

    function paging(p) {
        getListDiet(p);
    }

    function addDietForm() {
        if ($('#nama-diet').val() === '') {
            syams_validation('#nama-diet', 'Nama Diet harus diisi.');
            return false;
        }

        if ($('#kode-diet').val() === '') {
            syams_validation('#kode-diet', 'Kode Diet harus diisi.');
            return false;
        }

        if ($('#item-diet').val() === '') {
            syams_validation('#item-diet', 'Item Diet harus diisi.');
            return false;
        }

        nama_item = $('#item-diet').val();

        tambahDaftarDiet(nama_item);
        $('#item-diet').val('');

    }

    function tambahDaftarDiet(nama_item) {
        syams_validation_remove('#item-diet');

        let html = '';
        let number = $('.number-diet').length;
        let item_diet = $('#item-diet').val();
        
        html = /* html */ `
            <tr class="tr-rows">
                <td class="number-diet" align="center">${++number}</td>
                <td><input type="hidden" name="item_diet[]" value="${item_diet}">${item_diet}<input type="hidden" name="user_account[]" value="<?= $this->session->userdata("id_translucent") ?>"><input type="hidden" name="created_date[]" value="<?= date("Y-m-d H:i:s") ?>"></td>
                <td align="center">
                    <button type="button" class="btn btn-secondary btn-xxs" onclick="removeList(this)"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
        `;
        $('#table-list-diet tbody').append(html);

    }

    function resetForm() {
        $('#footer').empty();
        $('#button').empty();
        $('input[type=text], select, textarea, #id').val('');
        $('input[type=radio]').removeAttr('checked');
        $('a .select2-chosen').html('');                     
    }

    function removeList(el) {
        let parent = el.parentNode.parentNode;
        parent.parentNode.removeChild(parent);
    }

    function konfirmasiDiet() {
        bootbox.dialog({
            message: "Anda yakin akan menyimpan data ini?",
            title: "Konfirmasi",
            buttons: {
                batal: {
                    label: '<i class="fas fa-times-circle mr-1"></i>Batal',
                    className: "btn-secondary",
                    callback: function() {

                    }
                },
                simpan: {
                    label: '<i class="fas fa-check-circle mr-1"></i>Ya',
                    className: "btn-info",
                    callback: function() {
                        simpanDiet();
                    }
                }
            }
        });
    }

    function simpanDiet() {
        if ($('#nama-diet').val() === '') {
            syams_validation('#nama-diet', 'Kolom nama diet harus diisi.');
            $('#nama-diet').focus();            
            return false;
        }

        syams_validation_remove('#nama-diet');

        if ($('#kode-diet').val() === '') {
            syams_validation('#kode-diet', 'Kolom kode diet harus diisi.');
            $('#kode-diet').focus();            
            return false;
        }

        syams_validation_remove('#kode-diet');

        $.ajax({
            type: 'POST',
            url: '<?= base_url('diet/api/diet/simpan_diet') ?>',
            data: $('#form-tambah-diet').serialize(),
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.status) {
                    messageCustom(data.message, 'Success');
                    $('#modal-add').modal('hide');
                    getListDiet(1);     
                } else {
                    messageCustom(data.message, 'Error');
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

    function getListDiet(p) {
        $('#page-now').val(p);

        $.ajax({
            type: 'GET',
            url: '<?= base_url('diet/api/diet/diet_list/page/') ?>' + p,
            data: 'keyword=' + $('#keyword').val(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getListDiet(p - 1);
                    return false;
                }
                
                $('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
                $('#table-data-diet tbody').empty();

                $.each(data.data, function(i, v) {                    
                    let active = /* html */ `
                        <button type="button" class="btn btn-secondary btn-xs" title="Klik untuk mengaktifkan" onclick="konfirmasiAktivasi(${v.id}, '1')">
                            <i class="fas fa-toggle-off"></i>
                        </button>`;
                    let redBlock = 'style="background:red; color:white;"';

                    if (v.is_active == 1) {
                        active = /* html */ `
                        <button type="button" class="btn btn-secondary btn-xs" title="Klik untuk me-nonaktifkan" onclick="konfirmasiAktivasi(${v.id}, '0')">
                            <i class="fas fa-toggle-on"></i>
                        </button>`;
                        redBlock = '';
                    }

                    let html = /* html */ `
                        <tr ${redBlock}>
                            <td class="center">${((i+1) + ((data.page - 1) * data.limit))}</td>
                            <td class="center">${v.nama}</td>                            
                            <td class="center">${v.kode}</td>                            
                            <td class="center aksi">
                                <button type="button" class="btn btn-secondary btn-xs" onclick="lihatDiet(${v.id})"><i class="fa fa-eye"></i></button>
                                <button type="button" class="btn btn-secondary btn-xs" onclick="editDiet(${v.id})"><i class="fa fa-edit"></i></button>
                                <button type="button" class="btn btn-secondary btn-xs" onclick="deleteDiet(${v.id})"><i class="fa fa-trash-alt"></i></button>
                                ${active}
                            </td>
                        </tr>
                    `;  

                    $('#table-data-diet tbody').append(html);
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

    function getListItemDiet(id, option)
    {
        $.ajax({
            type: 'GET',
            url: '<?= base_url("diet/api/diet/get_detail_item_diet") ?>/id_diet/' + id,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader()
            },
            success: function(data) {
                                
                var action = '';

                $('#table-list-diet tbody').empty();
                
                

                $.each(data, function(i, v) {
                    $('#nama-diet').val(v.nama_diet); 
                    $('#kode-diet').val(v.kode_diet);

                    if(option == 'read') {

                    action = '<td class="right"></td>';

                    }else if(option == 'edit'){

                        action = '<td class="right"><button type="button" class="btn btn-secondary btn-xs" onclick="hapusItemDiet(' + v.id_diet + ', ' + v.id_item + ')"><i class="fa fa-trash-alt"></i></button></td>';

                    }

                    if(v.id !== null){
                        let j = $('.tr-rows').length+1;
                        let htmlLihatItemDiet = /* html */ `
                            <tr class="tr-rows">
                                <td class="center">${j}</td>
                                <td>${v.nama_item}<input type="hidden" name="item_diet[]" value="${v.nama_item}" /></td>
                                ${action}
                            </tr>
                        `;

                        $('#table-list-diet tbody').append(htmlLihatItemDiet);
                    }
                });                     
            },
            complete: function() {
                hideLoader()
            },
            error: function(e) {
                accessFailed(e.status);
            },
        });
    }
    
    function lihatDiet(id)
    {
        $('#footer').empty();
        $('#button').empty();
        $('#input-item-diet').hide();
        $('.input-diet').prop('readonly', true);

        getListItemDiet(id, 'read');

        $('#modal-add-label').html('Detail Item Diet Cair');
        $('#modal-add').modal('show');      
    }

    function editDiet(id)
    {       
        resetForm();
        $('#input-item-diet').show();     
        $('.input-diet').prop('readonly', false);       
        $('#table-list-diet tbody').empty();                  

        let htmlButton = /* html */ `
            <div class="col-lg-9">
                <button type="button" class="btn btn-info" onclick="addDietForm()"><i class="fa fa-arrow-circle-down"></i> Tambah</button>
            </div>
        `;  

        $('#button').append(htmlButton);             

        $.ajax({
            type: 'GET',
            url: '<?= base_url("diet/api/diet/get_detail_item_diet") ?>/id_diet/' + id,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader()
            },
            success: function(data) {
                
                $('#table-list-diet tbody').empty();

                let idDiet = id;
                
                $.each(data, function(i, v) {

                    $('#id-diet').val(idDiet);
                    $('#nama-diet').val(v.nama_diet); 
                    $('#kode-diet').val(v.kode_diet);
                    if(v.id !== null){

                        let j = $('.tr-rows').length+1;
                        let htmlReadItemDiet = /* html */ `
                            <tr class="tr-rows">
                                <td class="center">${j}</td>
                                <td>${v.nama_item}<input type="hidden" name="item_diet[]" value="${v.nama_item}" /></td>
                                <td class="right"><button type="button" class="btn btn-secondary btn-xs" onclick="hapusItemDiet(${idDiet}, ${v.id_item})"><i class="fa fa-trash-alt"></i></button></td>
                            </tr>
                        `;

                        $('#table-list-diet tbody').append(htmlReadItemDiet);

                    }                  
                });                         

                let htmlFooter = /* html */ `
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i
                            class="fas fa-window-close"></i> Batal</button>
                    <button type="button" class="btn btn-info waves-effect" onclick="konfirmasiEditItem(${idDiet})"><i
                            class="fas fa-save"></i> Simpan</button>
                `;  

                $('#footer').append(htmlFooter);
            },
            complete: function() {
                hideLoader()
            },
            error: function(e) {
                accessFailed(e.status);
            },
        });

        $('#modal-add-label').html('Edit Item Diet');
        $('#modal-add').modal('show');
    }

    function hapusItemDiet(idDiet, idItemDiet)
    {
        bootbox.dialog({
            message: "Anda yakin akan menghapus item Diet ini?",
            title: "Konfirmasi",
            buttons: {
                batal: {
                    label: '<i class="fas fa-times-circle mr-1"></i>Batal',
                    className: "btn-secondary",
                    callback: function() {

                    }
                },
                simpan: {
                    label: '<i class="fas fa-check-circle mr-1"></i>Ya',
                    className: "btn-info",
                    callback: function() {
                        hapusItem(idDiet, idItemDiet);
                    }
                }
            }
        });
    }

    function hapusItem(idDiet, idItemDiet)
    {
        $.ajax({
            type: 'POST',           
            url: '<?= base_url("diet/api/diet/hapus_item_diet") ?>',
            data: {
                idItemDiet : idItemDiet,
            },
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.status) {
                    messageCustom(data.message, 'Success');                 
                    getListItemDiet(idDiet, 'edit');          
                } else {
                    messageCustom(data.message, 'Error');
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

    function konfirmasiEditItem(id)
    {       
        bootbox.dialog({
            message: "Anda yakin akan mengubah data ini?",
            title: "Konfirmasi",
            buttons: {
                batal: {
                    label: '<i class="fas fa-times-circle mr-1"></i>Batal',
                    className: "btn-secondary",
                    callback: function() {

                    }
                },
                simpan: {
                    label: '<i class="fas fa-check-circle mr-1"></i>Ya',
                    className: "btn-info",
                    callback: function() {
                        updateItem(id);
                    }
                }
            }
        });
    }

    function updateItem(id)
    {
        if ($('#nama-diet').val() === '') {
            syams_validation('#nama-diet', 'Kolom nama Diet harus diisi.');
            $('#nama-diet').focus();            
            return false;
        }

        syams_validation_remove('#nama-diet');

        if ($('#kode-diet').val() === '') {
            syams_validation('#kode-diet', 'Kolom kode diet harus diisi.');
            $('#kode-diet').focus();            
            return false;
        }

        syams_validation_remove('#kode-diet');

        let jumlah = $('.tr-rows').length;
        if (jumlah === 0) {
            swalAlert('warning', 'Validasi', 'Belum ada data item yang akan ditambahkan.');
            return false;
        }

        let idDiet = id;

        $.ajax({
            type: 'POST',           
            url: '<?= base_url("diet/api/diet/update_item") ?>',         
            data: $('#form-tambah-diet').serialize(),
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.status) {
                    messageCustom(data.message, 'Success');
                    getListItemDiet(idDiet, 'edit');      
                    $('#modal-add').modal('hide');
                    getListDiet(1);  
                } else {
                    messageCustom(data.message, 'Error');
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

    function deleteDiet(id) {
        bootbox.dialog({
            message: "Anda yakin akan menghapus data ini?",
            title: "Konfirmasi",
            buttons: {
                batal: {
                    label: '<i class="fas fa-times-circle mr-1"></i>Batal',
                    className: "btn-secondary",
                    callback: function() {

                    }
                },
                simpan: {
                    label: '<i class="fas fa-check-circle mr-1"></i>Ya',
                    className: "btn-info",
                    callback: function() {
                        konfirmasiDeleteDiet(id);
                    }
                }
            }
        });
    }

    function konfirmasiDeleteDiet(id)
    {
        $.ajax({
            type: 'POST',           
            url: '<?= base_url("diet/api/diet/delete_diet") ?>',
            data: {
                idDiet : id
            },
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.status) {
                    messageCustom(data.message, 'Success');                 
                    getListDiet(1);

                } else {

                    messageCustom(data.message, 'Error');
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

    function konfirmasiAktivasi(id, status)
    {
        var message = '';

        if (status == 1) {
            message = 'Anda yakin akan mengaktifkan data ini?';
        }else {
            message = 'Anda yakin akan mengnonaktifkan data ini?';
        }

        bootbox.dialog({
            message: message,
            title: "Konfirmasi",
            buttons: {
                batal: {
                    label: '<i class="fas fa-times-circle mr-1"></i>Batal',
                    className: "btn-secondary",
                    callback: function() {

                    }
                },
                simpan: {
                    label: '<i class="fas fa-check-circle mr-1"></i>Ya',
                    className: "btn-info",
                    callback: function() {
                        aktivasiMasterdata(id, status);
                    }
                }
            }
        });
    }

    function aktivasiMasterdata(id, status)
    {
        $.ajax({
            type: 'POST',           
            url: '<?= base_url("diet/api/diet/aktifkan_masterdata") ?>',
            data: {
                id : id,
                status : status
            },
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.status) {
                    messageCustom(data.message, 'Success');                 
                    getListDiet(1);         
                } else {
                    messageCustom(data.message, 'Error');
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

</script>