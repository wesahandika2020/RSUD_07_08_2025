<script src="<?= resource_url() ?>assets/node_modules/wizard/bwizard.js"></script>
<script>
    $(function() {
        $.cookie('syam_cookie', '<?= UPDATE_KEY ?>')
        $("#wizard-form").bwizard();
        getListBarang(1);

        $('#btn-tambah').click(function() {
            $('#modal-barang-gizi').modal('show');
            $('#modal-barang-gizi-label').html('Tambah Barang');
            resetForm();
            $('.deletebarang').removeAttr('disabled');
            $('.packing').html('');
            $("#wizard-form").bwizard('show', 0);
        });

        $('#btn-tambah-kemasan').click(function() {
            var jml = $('.mother').length;
            addKemasan(jml);
            $('.mother:eq('+jml+')').attr('id', 'mother'+jml);
        });

        $('#btn-reload').click(function() {
            resetForm();
            getListBarang(1);
        });

        $('#btn-search').click(function() {
            $('#modal-search').modal('show');
        });

        $('#btn-excel').click(function() {
            location.href='<?= base_url('barang_gizi/export_data_barang') ?>?'+$('#form-search').serialize()+'&keyword='+$('#pencarian').val();
        });

        $('.form-control').keyup(function(){
            if($(this).val() !== ''){
                syams_validation_remove(this);
            }
        });

        $('.form-control, .select2-input').change(function() {
            if ($(this).val() !== '') {
                syams_validation_remove($(this));
            }
        });

        // select2
        $('#pabrik').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/pabrik_auto') ?>",
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
                var markup = data.nama;
                return markup;
            }, 
            formatSelection: function(data){
                return data.nama;
            }
        });
    });

    function resetForm() {
        $('input[type=text], select, textarea, #id').val('');
        $('input[type=radio]').removeAttr('checked');
        $('a .select2-chosen').html('');
        $('#kategori-barang').val('10');   
        $('#stok-min').val('0');
        $('#hpp').val('0');
    }

    function setDefault(obj, elem) {
        $('.checkdefault').val('0').prop('checked', false);
        $('#'+elem).val('1').prop('checked', true);;
    }

    function addKemasan(i) {
        var html = /* html */ `
            <tr class="mother mb-1" id="mother${i}" style="height:37px;">
                <td width="3%" class="center v-center">
                    <input type="radio" name="default${i}" value="${i}" onclick="return setDefault(this, 'default${i}')" class="checkdefault" title="Kemasan Jual Default" id="default${i}">
                </td>
                <td width="70%">
                    <input type="hidden" name="id_kemasan${i}" id="id-kemasan${i}" class="id-kemasan deletebarang">
                    <input type="text" name="barcode${i}" id="barcode${i}" class="form-control barcode deletebarang" size="15" style="width:100px; float:left;" placeholder="Barcode ...">
                    <select name="kemasan${i}" id="kemasan${i}" class="form-control kemasan deletebarang mr-2" onchange="isiSatuanTerkecil(${i})" style="width: 150px; float:left; margin-left:10px;">
                        <option value="">Pilih Kemasan ...</option>
                        <?php foreach ($kemasan as $data) : echo '<option value="'.$data->id.'">'.$data->nama.'</option>'; endforeach ?>
                    </select>
                    <input type="text" name="isi${i}" id="isi${i}" class="form-control isi deletebarang" onblur="isiSatuanTerkecil(${i})" size="5" style="width:100px; float:left;" placeholder="Isi ...">
                    <select name="satuan${i}" id="satuan${i}" class="form-control satuan deletebarang mr-2" onchange="configAutoSuggest(${i})" style="width: 150px; float:left; margin-left:10px;">
                        <option value="">Pilih Satuan ...</option>
                        <?php foreach ($kemasan as $data) : echo '<option value="'.$data->id.'">'.$data->nama.'</option>'; endforeach ?>
                    </select>
                    <input type="hidden" name="isi_kecil${i}" id="isi-kecil${i}" value="1" size="5" class="isi-kecil deletebarang">
                    <button type="button" class="btn btn-secondary btn-lg deletebarang" onclick="deleteSettingHarga(${i})">
                        <i class="fas fa-trash mr-2"></i>Hapus
                    </button>
                    <input type="hidden" name="jumlah" value="${i}" class="jumlah">
                </td>
            </tr>
        `;

        $('.packing').append(html);
        $('#barcode'+i).val($('#barcode').val());
        configAutoSuggest(i);
        $('#checkbox'+i).mouseover(function() {
            if ($(this).is(':checked') === false) {
                $('#checkbox'+i).attr('title', 'Check, jika menggunakan harga bertingkat');
            } else {
                $('#checkbox'+i).attr('title', 'Uncheck jika TIDAK menggunakan harga bertingkat');
            }
        });

        syams_validation_remove('#alert-kemasan');
    }

    function isiSatuanTerkecil(i) {
        var jml_baris = $('.barcode').length-1;
        for (j = 0; j <= jml_baris; j++) {
            /*var kemasan = $('#kemasan'+i).val();
            var isi     = $('#isi'+i).val();
            var satuan  = $('#satuan'+i).val();*/
            if ($('#kemasan'+i).val() === $('#satuan'+j).val()) {
                $('#isi-kecil'+j).val($('#isi'+i).val());
            }
        }
    }

    function configAutoSuggest(i) {
        var jml_baris = $('.barcode').length-1;
        if (i === jml_baris) {
            createNewPacking(i);
        } else {
            $('#kemasan'+(i+1)).val($('#satuan'+i).val());
            $('#satuan'+(i+1)).val($('#satuan'+i).val());
        }
    }

    function createNewPacking(i) {
        var kemasan = $('#kemasan'+i).val();
        var satuan  = $('#satuan'+i).val();
        var jumlah  = $('.mother').length-1;

        if (kemasan !== satuan) {
            addKemasan(jumlah+1);
            $('#kemasan'+(i+1)).val(satuan);
            $('#satuan'+(i+1)).val(satuan);
            $('.mother:eq('+(i+1)+')').attr('id', 'mother'+(i+1));
        }
    }

    function deleteSettingHarga(i) {
        bootbox.dialog({
            message: "Anda yakin akan menghapus data ini?",
            title: "Hapus Data",
            buttons: {
                batal: {
                    label: '<i class="fas fa-refresh mr-2"></i>Batal',
                    className: "btn-secondary",
                    callback: function() {

                    }
                },
                hapus: {
                    label: '<i class="fa fa-trash mr-2"></i>Hapus',
                    className: "btn-info",
                    callback: function() {
                        var id = $('#id-kemasan'+i).val();
                        $.ajax({
                            type : 'DELETE',
                            url: '<?= base_url("barang_gizi/api/barang_gizi/kemasan_barang") ?>/id/'+id,
                            cache: false,
                            dataType : 'JSON',
                            success: function(data) {
                                messageDeleteSuccess();
                            },
                            error: function(e){
                                messageDeleteFailed();
                            }
                        });
                        $('tr#mother'+i).remove();
                        $('tr.child'+i).remove();
                    }
                }
            }
        });
    }

    function konfirmasiSimpanData() {
        let jmlPacking = $('.mother').length; 
        if (jmlPacking > 3) {
            swalAlert('warning', 'Validasi', 'Kemasan untuk masing-masing barang maximal 3 kemasan !');
            $('#wizard-form').bwizard('show', '1'); return false;
        }

        if ($('#kode').val() === '') {
            syams_validation('#kode', 'Kolom kode barang harus diisi.');
            $('#kode').focus();
            $('#wizard-form').bwizard('show', '0'); return false;
        }

        if ($('#nama').val() === '') {
            syams_validation('#nama', 'Kolom nama barang harus diisi.');
            $('#nama').focus();
            $('#wizard-form').bwizard('show', '0'); return false;
        }

        // if ($('#pabrik').val() === '') {
        //     syams_validation('#pabrik', 'Kolom nama pabik harus dipilih.');
        //     $('#wizard-form').bwizard('show','0'); return false;         
        // }
        // syams_validation_remove('#pabrik');

        if (jmlPacking === 0) {
            syams_validation('#alert-kemasan', 'Kolom kemasan barang harus diisi minimal 1 data');
            $('#wizard-form').bwizard('show', '1'); return false;
        }

        for (i = 0; i <= (jmlPacking - 1); i++) {
            let kemasan = $('#kemasan'+i).val();
            let isi     = $('#isi'+i).val();
            let satuan  = $('#satuan'+i).val();
            if ((kemasan === '') || (isi === '') || (isi === '0') || (satuan === '')) {
                swalAlert('warning', 'Validasi', 'Kemasan barang harus diisi dengan benar !'); return false;
            }
        }

        if($('#id').val() !== ''){
            validateKeyUpdate();
        } else {
            simpanData();
        }

    }

    function validateKeyUpdate() {
        bootbox.dialog({
            message: "Anda yakin ingin mengubah data ini?",
            title: 'Konfirmasi Update',
            buttons: {
                batal: {
                    label: '<i class="fas fa-window-close mr-2"></i>Batal',
                    className: "btn-secondary",
                    callback: function() {
                        
                    }
                },
                konfirmasi: {
                    label: '<i class="fas fa-check-circle mr-2"></i>Ya',
                    className: "btn-info",
                    callback: function() {
                        simpanData();
                    }
                }
            }
        });
    }

    function simpanData() {
        let update = '';
        if($('#id').val() !== ''){
            update = '/id/'+ $('#id').val();
        }

        $.ajax({
            type: 'POST',
            url: '<?= base_url("barang_gizi/api/barang_gizi/simpan_barang") ?>' + update,
            data: $('#form-barang-gizi').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                $('input[name=csrf_syam]').val(data.token);
                var page = $('#page-now').val();
                $('#modal-barang-gizi').modal('hide');

                if($('#id').val() !== ''){
                    messageEditSuccess();
                    getListBarang(page);
                }else{
                    messageAddSuccess();
                    getListBarang(page, data.id);
                    // editBarangUnit(data.id, data.token);
                }
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                if ($('#id').val() !== '') {
                    messageEditFailed();
                }else{
                    messageAddFailed();
                }
            }
        });
    }

    function getListBarang(p, id_barang) {
        $('#page-now').val(p);
        $('#modal-search').modal('hide');

        var id = '';
        if (id_barang !== undefined) {
            id = id_barang;
        }

        $.ajax({
            type: 'GET',
            url: '<?= base_url("barang_gizi/api/barang_gizi/get_list_barang") ?>/page/' + p + '/id' + id,
            data: $('#form-search').serialize() + '&pencarian=' + $('#pencarian').val(),
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if ((p > 1) & (data.data.length === 0)) {
                    getListBarang(p - 1);
                    return false;
                }

                $('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#page-summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

                $('#table-data tbody').empty();
                $.each(data.data, function(i, v) {
                    let active = /* html */ `
                        <button type="button" class="btn btn-secondary btn-xs" title="Klik untuk mengaktifkan" onclick="aktivasiStatus(${v.id}, ${data.page}, 'on', '${v.nama}')">
                            <i class="fas fa-toggle-off"></i>
                        </button>`;
                    let redBlock = 'style="background:red; color:white;"';

                    if (v.is_active === 'Ya') {
                        active = /* html */ `
                        <button type="button" class="btn btn-secondary btn-xs" title="Klik untuk me-nonaktifkan" onclick="aktivasiStatus(${v.id}, ${data.page}, 'off', '${v.nama}'  )">
                            <i class="fas fa-toggle-on"></i>
                        </button>`;
                        redBlock = '';
                    }

                    let html = /* html */ `
                        <tr ${redBlock}>
                            <td class="center">${((i+1) + ((data.page - 1) * data.limit))}</td>
                            <td>${v.code}</td>
                            <td>${v.bidang}</td>
                            <td>${v.nama}</td>
                            <td>${((v.pembayaran !== null) ? v.pembayaran : '')}</td>
                            <td>${v.pabrik}</td>
                            <td class="right">${money_format(v.hpp)}</td>
                            <td class="center">${v.margin_non_resep}</td>
                            <td style="white-space: nowrap;">${v.kategori}</td>
                            <td class="center aksi">
                                <button type="button" class="btn btn-secondary btn-xs" onclick="editBarangUnit(${v.id})"><i class="fa fa-home"></i></button>
                                <button type="button" class="btn btn-secondary btn-xs" onclick="editBarang(${v.id})"><i class="fa fa-edit"></i></button>
                                <button type="button" class="btn btn-secondary btn-xs" onclick="deleteBarang(${v.id}, ${data.page})"><i class="fa fa-trash-alt"></i></button>
                                ${active}
                            </td>
                        </tr>
                    `;  

                    $('#table-data tbody').append(html);
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

    function paging(page, tab){
        switch(tab){
            case 1:
                getListBarang(page);
                break;
            case 2:
                getListBarangUnit(page);
                break;
            default:
                break;
        }
    }

    function deleteBarang(id, p) {
        bootbox.dialog({
            message: 'Apakah anda yakin ingin menghapus data ini ?',
            title: 'Hapus Data',
            buttons: {
                batal: {
                    label: '<i class="fas fa-times-circle mr-1"></i>Batal',
                    className: "btn-secondary",
                    callback: function() {

                    }
                },
                hapus: {
                    label: '<i class="fas fa-trash mr-1"></i>Hapus',
                    className: "btn-info",
                    callback: function() {
                        let passSave = $.cookie('syam_cookie');
                        bootbox.dialog({
                            message: "<b>Masukkan Password:</b> <input type='password' class='form-control' name='password' id='passworddelete'/>",
                            title: 'Validasi Penghapusan Data',
                            buttons: {
                                batal: {
                                    label: '<i class="fas fa-times-circle mr-1"></i>Batal',
                                    className: "btn-secondary",
                                    callback: function() {

                                    }
                                },
                                validasi: {
                                    label: '<i class="fas fa-unlock mr-1"></i>Validasi',
                                    className: "btn-info",
                                    callback: function() {
                                        var inputPass = $('#passworddelete').val();
                                        if (inputPass === '') {
                                            syams_validation('#passworddelete','Kolom password tidak boleh kosong !'); return false;
                                        }
                                        if (passSave !== inputPass) {
                                            syams_validation('#passworddelete','Password yang anda masukkan salah !'); return false;
                                        }
                                        $.ajax({
                                            type : 'DELETE',
                                            url: '<?= base_url("barang/api/barang/hapus_barang") ?>/id/'+id,
                                            cache: false,
                                            dataType : 'JSON',
                                            success: function(data) {
                                                getListBarang(p);
                                                messageDeleteSuccess();
                                            },
                                            error: function(e){
                                                swalAlert('warning', 'Validasi', 'Data tidak boleh dihapus, karena telah digunakan pada transaksi');
                                            }
                                        });
                                    }
                                }
                            }
                        });
                    }
                }
            }
        });
    }

    function editBarang(id) {
        $("#wizard").bwizard('show', 0);
        $('#obatkemo').val('Tidak');

        $.ajax({
            type : 'GET',
            url: '<?= base_url("barang/api/barang/get_barang_with_id") ?>/id/'+id,
            cache: false,
            dataType : 'JSON',
            success: function(data) {

                var data = data.data[0];
                $('#id').val(data.id);
                $('#kode').val(data.code);
                $('#nama').val(data.nama);
                $('#pembayaran').val(data.pembayaran);
                $('#bidang').val(data.id_bidang);
                $('#s2id_pabrik a .select2-chosen').html(data.pabrik);
                $('#pabrik').val(data.id_pabrik);
                
                $('#stok-min').val(data.stok_minimal);
                $('#rak').val(data.rak);
                $('#hna').val(money_format(data.hna));
                $('#hpp').val(money_format(data.hpp));
                $('#margin-non-resep-pr').val(data.margin_non_resep);

                let hpp         = parseFloat(currencyToNumber($('#hpp').val()));
                let margin_nr   = $('#margin-non-resep-pr').val();
                let margin_rp_nr= hpp*(margin_nr/100);
                $('#margin-non-resep-rp').val(money_format(margin_rp_nr));
                $('.packing').html('');
                $.each(data.kemasan, function (i, value) {

                    
                    addKemasan(i);
                    $('#id-kemasan'+i).val(value.id);
                    $('#barcode'+i).val(value.barcode);
                    $('#kemasan'+i).val(value.id_kemasan);
                    $('#isi'+i).val(value.isi);
                    $('#satuan'+i).val(value.id_satuan);
                    $('#isi-kecil'+i).val(value.isi_satuan);
                    $('#default'+i).val(value.default_kemasan);
                    if ($('#default'+i).val() == '1') {
                        $('#default'+i).attr('checked','checked');
                    }
                    //$('.deletebarang').attr('disabled','disabled');
                });

                $('#modal-barang-gizi').modal('show');
                $('#modal-barang-gizi-label').html('Edit Barang');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });

        
    }

    function aktivasiStatus(id, page, value, nama) {
        let message = 'Anda yakin akan mengaktifkan kembali <b>'+nama+'</b> ini ?';
        if (value === 'off') {
            message = 'Anda yakin akan me-nonaktifkan <b>'+nama+'</b> ini ?';
        }

        bootbox.dialog({
            message: message,
            title: 'Konfirmasi Perubahan Status',
            buttons: {
                batal: {
                    label: '<i class="fas fa-times-circle mr-1"></i>Batal',
                    className: "btn-secondary",
                    callback: function() {

                    }
                },
                ya: {
                    label: '<i class="fas fa-check-circle mr-1"></i>Ya',
                    className: "btn-info",
                    callback: function() {
                        let passSave = $.cookie('syam_cookie');
                        bootbox.dialog({
                            message: "<b>Masukkan Password:</b> <input type='password' class='form-control' name='password' id='passwordchange'/>",
                            title: 'Validasi Perubahan Data',
                            buttons: {
                                batal: {
                                    label: '<i class="fas fa-times-circle mr-1"></i>Batal',
                                    className: "btn-secondary",
                                    callback: function() {

                                    }
                                },
                                validasi: {
                                    label: '<i class="fas fa-unlock mr-1"></i>Validasi',
                                    className: "btn-info",
                                    callback: function() {
                                        var inputPass = $('#passwordchange').val();
                                        if (inputPass === '') {
                                            syams_validation('#passwordchange','Kolom password tidak boleh kosong !'); return false;
                                        }
                                        if (passSave !== inputPass) {
                                            syams_validation('#passwordchange','Password yang anda masukkan salah !'); return false;
                                        }
                                        $.ajax({
                                            type : 'GET',
                                            url: '<?= base_url("barang/api/barang/aktivasi_barang") ?>/id/'+id+'/status/'+value,
                                            cache: false,
                                            dataType : 'JSON',
                                            success: function(data) {
                                                getListBarang(page);
                                                messageEditSuccess();
                                            },
                                            error: function(e){
                                                swalAlert('warning', 'Validasi', 'Perubahan status tidak dapat dilakukan, terjadi error komunikasi dengan komputer server');
                                            }
                                        });
                                    }
                                }
                            }
                        });
                    }
                }
            }
        });
    }

    function editBarangUnit(id) {
        $('#label-nama').html('');
        $('#modal-alokasi-barang-unit').modal('show');

        $.ajax({
            type: 'GET',
            url: '<?= base_url("barang/api/barang/get_alokasi_barang_unit") ?>/id_barang/'+id,
            beforeSend: function() {
                showLoader();
            },
            success: function (data) {
                $('ul.detail').empty();
                $('#id-barang').val(id);
                $('#label-nama').html(data.nama_barang);
                $.each(data.data, function(i, v) {
                    let html = /* html */ `
                        <li>
                            <div class="checkbox">
                                <label><input type="checkbox" class="checkall" name="id_unit[]" value="${v.id}" ${((v.count === '1')?'checked':'')}>&nbsp;&nbsp;${v.nama}</label>
                            </div>
                        </li>
                    `;
                    $('ul.detail').append(html);
                });
            },
            complete: function () {
                hideLoader();
            },
            error: function (e) {
                accessFailed(e.status);
            }
        });
    }

    function checkAll(){
        $(".checkall").each( function() {
            $(this).attr("checked",'checked');
        });
    }

    function uncheckAll(){
        $(".checkall").each( function() {
            $(this).removeAttr('checked');
        });
    }

    function batalkanPerubahan() {
        var id_barang = $('#id-barang').val();
        editBarangUnit(id_barang);
    }

    function simpanAlokasiBarangUnit() {
        $.ajax({
            type: 'POST',
            url: '<?= base_url('barang/api/barang/simpan_alokasi_barang_unit') ?>',
            data: $('#form-alokasi-barang-unit').serialize(),
            success: function(data) {
                $('input[name=csrf_syam]').val(data.token);
                if (data.status === true) {
                    messageEditSuccess();
                }
            }
        });
    }
</script>