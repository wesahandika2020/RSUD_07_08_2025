<script>
    $(function() {
        $("#form-wizard2").bwizard();
        
        $('#btn-barang-unit').click(function() {
            $('#modal-barang-unit').modal('show');
        });

        $('#unit-auto').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/unit_auto') ?>",
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
                var markup = data.nama;
                return markup;
            }, 
            formatSelection: function(data){
                $('#unit-auto2').val(data.id);
                $('#s2id_unit-auto2 a .select2-chosen').html(data.nama);
                getListBarangUnit(1);
                return data.nama;
            }
        });

        $('#unit-auto2').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/unit_auto') ?>",
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
                var markup = data.nama;
                return markup;
            }, 
            formatSelection: function(data){
                $('#unit-auto').val(data.id);
                $('#s2id_unit-auto a .select2-chosen').html(data.nama);
                getListBarangUnit(1);
                return data.nama;
            }
        });

        $('#barang-unit-auto').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/barang_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function (term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                        jenis_barang: $('#jenis-barang').val()
                    };
                },
                results: function (data, page) {
                    var more = (page * 20) < data.total; // whether or not there are more results available
         
                    // notice we return the value of more so Select2 knows if more results can be loaded
                    return {results: data.data, more: more};
                }
            },
            formatResult: function(data){
                var markup = data.nama;
                return markup;
            }, 
            formatSelection: function(data){
                return data.nama;
            }
        });

        $('#addtoform').click(function() {
            let id_brg      = $('#barang-unit-auto').val();
            let nama_brg    = $('#s2id_barang-unit-auto a .select2-chosen').html();
            
            if (id_brg === '') {
                syams_validation('#barang-unit-auto', 'Nama barang harus diisi!'); return false;
            }
            addNewBarangUnit(id_brg, nama_brg);
            $('#barang-unit-auto').val('');
            $('#s2id_barang-unit-auto a .select2-chosen').html('');
        });
    });

    function getListBarangUnit(p, id_barang) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url("barang/api/barang/get_list_barang_unit") ?>/page/' + p,
            data: 'id_unit=' + $('#unit-auto2').val() + '&keyword=' + $('#key').val(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getListBarang(p - 1);
                    return false;
                }

                $('#pagination2').html(pagination(data.jumlah, data.limit, data.page, 2));
                $('#page-summary2').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

                $('#table-unit-barang-list tbody').empty();
                $.each(data.data, function(i, v) {
                    let html = /* html */ `
                        <tr>
                            <td class="center">${((i+1) + ((data.page - 1) * data.limit))}</td>
                            <td>${v.nama}</td>
                            <td class="right">${money_format(v.hna)}</td>
                            <td class="right">${money_format(v.hpp)}</td>
                            <td>${v.kategori}</td>
                            <td class="center aksi">
                                <button type="button" class="btn btn-secondary btn-xs" onclick="deleteBarangUnit(${v.id}, ${data.page}, '${v.nama}')"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    `;

                    $('#table-unit-barang-list tbody').append(html);
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

    function addNewBarangUnit(id_brg, nama_brg) {
        let i = $('.tr-rows').length+1;
        let html = /* html */ `
            <tr class="tr-rows">
                <td class="center">${i}</td>
                <td>${nama_brg}<input type="hidden" name="barang[]" value="${id_brg}" /></td>
                <td class="right"><button type="button" class="btn btn-secondary btn-xs" onclick="removeThisItem(this)"><i class="fa fa-trash-alt"></i></button></td>
            </tr>
        `;

        $('#table-adding-barang-unit tbody').append(html);
    }

    function removeThisItem(el) {
        let parent = el.parentNode.parentNode;
        parent.parentNode.removeChild(parent);
    }

    function konfirmasiSimpanBarangUnit() {
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
                        simpanBarangUnit();
                    }
                }
            }
        });
    }

    function simpanBarangUnit() {
        let jumlah = $('.tr-rows').length;
        if (jumlah === 0) {
            swalAlert('warning', 'Validasi', 'Belum ada data barang & penjamin yang dipilih');
        }

        $.ajax({
            type: 'POST',
            url: '<?= base_url('barang/api/barang/simpan_barang_unit') ?>',
            data: $('#form-barang-unit').serialize(),
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                $('input[name=csrf_syam]').val(data.token);
                if (data.status === true) {
                    messageAddSuccess();
                    $('#table-adding-barang-unit tbody').empty();
                    $("#form-wizard2").bwizard('show', 0);
                    getListBarangUnit(1);
                }
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageAddFailed();
            }
        });
    }

    function deleteBarangUnit(id, page, nama_barang) {
        let nama_unit = $('#s2id_unit-auto a .select2-chosen').html();
        bootbox.dialog({
            message: "Anda yakin akan menghapus data <b>"+nama_barang+"</b> dari unit <b>"+nama_unit+"</b>?",
            title: "Hapus Data",
            buttons: {
                batal: {
                    label: '<i class="fa fa-times-circle"></i> Batal',
                    className: "btn-secondary",
                    callback: function() {
                        
                    }
                },
                hapus: {
                    label: '<i class="fa fa-trash-alt"></i> Ya',
                    className: "btn-info",
                    callback: function() {
                        $.ajax({
                            type : 'DELETE',
                            url: '<?= base_url("barang/api/barang/hapus_barang_unit") ?>/id/'+id,
                            cache: false,
                            dataType : 'JSON',
                            success: function(data) {
                                getListBarangUnit(page);
                                messageDeleteSuccess();
                            },
                            error: function(e){
                                messageDeleteFailed();
                            }
                        });
                    }
                }
            }
        });
    }
</script>