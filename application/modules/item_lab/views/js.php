<script>
    $(function() {
        getListItemLaboratorium(1);

        // btn reload
        $('#btn-reload').click(function() {
            resetData();
            getListItemLaboratorium(1);
        });

        $('#btn-expand-all').click(function() {
            $('#table-data').treetable('expandAll');
        });

        $('#btn-collapse-all').click(function() {
            $('#table-data').treetable('collapseAll');
        });

        $('.form-control').keyup(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this);
            }
        });

        $('#operator').change(function() {
            if (($(this).val() === 'Positif') | ($(this).val() === 'Negatif')) {
                $('#awal, #akhir').attr("readonly", "readonly");
            } else {
                $('#awal, #akhir').removeAttr("readonly");
            }
        });

        $('#satuan').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/satuan_auto') ?>",
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
                return data.nama;
            }
        });
    });

    function resetData() {
        $('#id, .form-control, #pencarian, #id-layanan, #satuan').val('');
        $('.select2-chosen').html('');
        $('').val('');
        $('#s2id_satuan a .select2-chosen').html('');
        $('#table-rule tbody').empty();
        syams_validation_remove('.form-control');
    }

    function getListItemLaboratorium(page) {
        $('#page-now').val(page);
        $.ajax({
            type: 'GET',
            url: '<?= base_url("item_lab/api/item_lab/get_list_item_laboratorium") ?>/page/' + page,
            data: 'pencarian=' + $('#pencarian').val(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader()
            },
            success: function(data) {
                if ((page > 1) & (data.data.length === 0)) {
                    getListItemLaboratorium(page - 1);
                    return false;
                }

                $('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

                $('#table-data').treetable('destroy');
                $('#table-data tbody').empty();
                extractData(data);
            },
            complete: function() {
                hideLoader()
            },
            error: function(e) {
                accessFailed(e.status);
            },
        });
    }

    function extractData(data) {
		var html = '';
		var branch = '';
		var parent = '';
		var root = '';

		$.each(data.data, function(i, v) {
            root = ((i + 1) + ((data.page - 1) * data.limit));
			branch = 'data-tt-id="' + root + '"';
			html = drawTable(v, branch, parent, data.page, 0, root);
			$('#table-data tbody').append(html);

			if (v.item !== null) {
				$.each(v.item, function(i2, v2) {
					branch = 'data-tt-id="' + root + '-' + i2 + '"';
					parent = 'data-tt-parent-id="' + root + '"';
					html = drawTable(v2, branch, parent, data.page, 20, '');
					$('#table-data tbody').append(html);
				});
			}

			branch = '';
			parent = '';
		});

		$('#table-data').treetable({
			expandable: true
		});
    }
    
    function drawTable(v, branch, parent, page, indent, root) {
        var item = ''; 
        var btn_delete = ''; 
        var btn_add = ''; 
        var btn_normal = ''; 
        var btn_edit = ''; 
        var kode_lis = '';

        if (root !== '') {
            item = v.layanan;
            btn_delete = '';
            btn_normal = '';
            kode_lis = '';
            btn_add = '<button title="Klik untuk menambah item laboratorium" type="button" class="btn btn-secondary btn-xs" onclick="addItemLaboratorium(' + v.id + ', ' + page + ')"><i class="fas fa-plus"></i></button>';
        } else {
            item = v.item;
            btn_delete = '<button title="Klik untuk menghapus item laboratorium" type="button" class="btn btn-secondary btn-xs" onclick="deleteItemLaboratorium(' + v.id + ', ' + page +')"><i class="fas fa-trash-alt"></i></button>';
            btn_add = '';
            kode_lis = v.kode_lis;
            btn_normal = '<button title="Klik untuk mengedit nilai normal" type="button" class="btn btn-secondary btn-xs mr-1" onclick="openModal(' + v.id + ')"><i class="fas fa-edit mr-1"></i>Nilai Normal</button>';
            btn_edit = '<button title="Klik untuk mengedit item laboratorium" type="button" class="btn btn-secondary btn-xs mr-1" onclick="editItemModal(' + v.id + ', \'' + v.item + '\', \'' + v.kode_lis + '\', \'' + page + '\')"><i class="fas fa-edit"></i></button>';
        }

        var html = '<tr '+branch+' '+parent+'>'+
                '<td align="left">'+((root !== '')?root:'')+'</td>'+
                '<td><span style="margin-left: '+indent+'px;">'+item+'</span></td>'+
                '<td>'+ kode_lis +'</td>'+
                '<td align="right" class="aksi">'+
                    btn_add + btn_normal + btn_edit + btn_delete +
                '</td>'+
            '</tr>';
        return html;
    }

    function paging(page) {
        getListItemLaboratorium(page)
    }

    function addItemLaboratorium(id_layanan, page) {
        $('#id-layanan').val(id_layanan);
        $('#table-item-body').empty();
        $('#modal-item-laboratorium').modal('show');
    }

    function addItem() {
        let stop = false;
        if ($('#item').val() === '') {
            syams_validation('#item', 'Item harus diisi!');
            stop = true;
        }

        if (stop) {
            return false;
        }

        let html = '';
        let numb = $('.number-item').length;
        let item = $('#item').val();

        html = /* html */ `
            <tr>
                <td class="number-item center">${++numb}</td>
                <td><input type="hidden" name="item[]" value="${item}">${item}</td>
                <td class="right">
                    <button type="button" class="btn btn-secondary btn-xs" onclick="removeMe(this)"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
        `;

        $('#table-item tbody').append(html);
        $('#item').val('');
    }

    function removeMe(el) {
        var parent = el.parentNode.parentNode;
        parent.parentNode.removeChild(parent);
    }
    
    function reset_data(){
       $('#id, .form-control, #pencarian, #id_layanan, #satuan').val('');
       $('.select2-chosen').html('');
       $('').val('');
       $('#s2id_satuan a .select2-chosen').html('');
       $('#table-rule tbody').empty();
       syams_validation_remove('.form-control');
    }
    
    function simpanDataItemLaboratorium(){
        var stop = false;
        
        $.ajax({
            type : 'POST',
            url: "<?= base_url('item_lab/api/item_lab/item_laboratorium') ?>",
            data: $('#form-item-laboratorium').serialize(),
            cache: false,
            dataType : 'json',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                $('#modal-item-laboratorium').modal('hide')
                messageAddSuccess();
                getListItemLaboratorium($('#page-now').val());
            },
            complete: function() {
                hideLoader();
            },
            error: function(e){
                messageAddFailed();
            }
        });

    }
    
    function show_rule(data){
    if (data !== null) {
        var kategori = 'Semua';
        $.each(data, function(i, v){
            if (v.kategori === 'L') {
              kategori = 'Laki-laki';
            }else if (v.kategori === 'P') {
              kategori = 'Perempuan';
            }else if (v.kategori === 'A') {
              kategori = 'Anak-anak';
            }else{
              kategori = 'Semua';
            }


            var str = '<tr>'+
                '<td class="number_rule" align="center">'+ (++i) +'</td>'+
                '<td align="center">'+kategori+'</td>'+
                '<td align="center">'+((v.awal !== null)?v.awal:'')+'</td>'+
                '<td align="center">'+v.operator+'</td>'+
                '<td align="center">'+((v.akhir !== null)?v.akhir:'')+'</td>'+
                '<td align="center"><button type="button" class="btn btn-secondary btn-xs" onclick="hapus_rule(this,'+v.id+');"><i class="fas fa-trash-alt"></i></button></td>'+
                '</tr>';

            $('#table-rule tbody').append(str);
        });
    };
  }
    
    function openModal(id_item_laboratorium){
        reset_data();
        $('#id_item_laboratorium').val(id_item_laboratorium);
    
        $.ajax({
              type : 'GET',
              url: '<?= base_url("item_lab/api/item_lab/nilai_normal_laboratorium") ?>/id_item_laboratorium/'+id_item_laboratorium,
              cache: false,
              dataType : 'json',
              success: function(data) {
                  show_rule(data.nilai_normal);
                  $('#satuan').val(data.item.id_satuan);
                  $('#s2id_satuan a .select2-chosen').html(data.item.satuan);
              },
              error: function(e){
                  accessFailed(e.status);
              }
          });
        $('#nilai_modal').modal('show');
    }
    
    function add_rule(){
        var stop = false;

        if ($('#operator').val() === '') {
            syams_validation('#operator', 'Operator harus diisi!');
            stop = true;   
        };

        if (stop) {
            return false;
        };

        var str = '';
        var numb = $('.number_rule').length;
        var kategori = $('#kategori').val();
        var kategori_text = $('#kategori option:selected').text();
        var awal = $('#awal').val();
        var akhir = $('#akhir').val();
        var operator = $('#operator').val();


        str = '<tr>'+
            '<td class="number_rule" align="center">'+ (++numb) +'</td>'+
            '<td align="center"><input type="hidden" name="kategori[]" value="'+kategori+'"/>'+kategori_text+'</td>'+
            '<td align="center"><input type="hidden" name="awal[]" value="'+awal+'" />'+awal+'</td>'+
            '<td align="center"><input type="hidden" name="operator[]" value="'+operator+'" />'+operator+'</td>'+
            '<td align="center"><input type="hidden" name="akhir[]" value="'+akhir+'" />'+akhir+'</td>'+
            '<td align="center"><button type="button" class="btn btn-secondary btn-xs" onclick="removeMe(this);"><i class="fas fa-trash-alt"></i></button></td>'+
            '</tr>';

        $('#table-rule tbody').append(str);
        $('#awal, #akhir').val('0');
        $('#operator').val('-');
        $('#kategori').val('');
        $('#awal, #akhir').removeAttr("readonly");
    }
    
    function save_data_normal(){
        var satuan = $('#satuan').val();
        var id = $('#id_item_laboratorium').val();

        $.ajax({
            type : 'POST',
            url: '<?= base_url("item_lab/api/item_lab/nilai_normal_laboratorium") ?>/',
            data: $('#formnormal').serialize(),
            cache: false,
            dataType : 'json',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                $('#nilai_modal').modal('hide');
                if (data.status === true) {
                  messageEditSuccess();  
                }else{
                  messageCustom('info', 'Info','Tidak ada data yang ditambahkan','');
                }

                reset_data();
            },
            complete: function() {
                hideLoader();
            },
            error: function(e){
                messageEditFailed();
            }
        });
    }

    function editItemModal(id, item, kode_lis, page) {
        $('#id_item').val(id);
        $('#page-now').val(page);
        $('#item_edit').val(item);
        $('#kode_lis').val(kode_lis);
        $('#edit_item_modal').modal('show');
    }

    function edit_item_save() {
        let stop = false;
        if ($('#item_edit').val() === '') {
            syams_validation('#item_edit', 'Item laboratorium harus diisi!.');
            stop = true;
        }

        if (stop) {
            return false;
        }

        $.ajax({
            type: 'POST',
            url: '<?= base_url("item_lab/api/item_lab/item_laboratorium_edit") ?>',
            data: $('#formedititem').serialize(),
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                getListItemLaboratorium($('#page-now').val());
                messageEditSuccess();
                $('#edit_item_modal').modal('hide');
            },
            error: function (e) {
                messageEditFailed();
            }
        })
    }

    function deleteItemLaboratorium(id, page) {
        swal.fire({
            title: 'Hapus Data',
            text: "Apakah anda yakin ingin menghapus data ini ?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'DELETE',
                    url: '<?= base_url('item_lab/api/item_lab/item_laboratorium') ?>/id/' + id,
                    cache: false,
                    dataType: 'JSON',
                    success: function (data) {
                        getListItemLaboratorium(page);
                        messageDeleteSuccess();
                    }, 
                    error: function (e) {
                        messageDeleteFailed();
                    }
                });
            }
        })
    }

    function hapus_rule(obj, id) {
        swal.fire({
            title: 'Hapus Data',
            text: "Apakah anda yakin ingin menghapus data ini ?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'DELETE',
                    url: '<?= base_url('item_lab/api/item_lab/nilai_normal_laboratorium') ?>/id/' + id,
                    cache: false,
                    dataType: 'JSON',
                    success: function (data) {
                        removeMe(obj);
                        messageDeleteSuccess();
                    }, 
                    error: function (e) {
                        messageDeleteFailed();
                    }
                });
            }
        })
    }
</script>