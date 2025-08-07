<script>
    $(function() {
        $('#barang-bhp').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/barang_with_stok_auto') ?>",
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
                harga_jual = data.harga_jual;
                if ($('#id-penjamin-bhp').val() === '20') {
                    harga_jual = data.hpp;
                }
                var markup = data.nama+', <br/><b>Harga : </b>'+money_format(harga_jual)+' <b>Sisa :</b> '+data.sisa;
                var markup = data.nama+', <br/><b>Harga : </b>'+money_format(harga_jual);
                return markup;
            }, 
            formatSelection: function(data){
                $.getJSON('<?= base_url("barang/api/barang/get_kemasan_barang") ?>?id='+data.id, function(data2){
                    $('#kemasan-bhp').html('');
                    if (data2 === null) {
                        alert('Kemasan barang tidak tersedia !');
                    } else {
                        $('#kemasan-bhp').append("<option value=''>Pilih</option>");
                        $.each(data2, function (index, value) {
                            $('#kemasan-bhp').append("<option value='"+value.id+"' "+((value.default_kemasan === '1')?'selected':'')+">"+value.nama+"</option>");
                        });
                    }
                });
                harga_jual = data.harga_jual;
                if ($('#id-penjamin-bhp').val() === '20') {
                    harga_jual = data.hpp;
                }
                $('#harga-jual-bhp').val(harga_jual);
                $('#kemasan-bhp').focus();
                $('#jumlah-bhp').val('1');
                // return data.nama+' Rp. '+money_format(harga_jual)+' <b class="blinker">Sisa: '+data.sisa+'</b>';
                return data.nama+' Rp. '+money_format(harga_jual);
            }
        });
    });

    function addBHP() {
        var stop = false;
        if ($('#barang-bhp').val() === '') {
            syams_validation('#barang-bhp', 'Barang harus dipilih !'); 
            stop = true;   
        }
        if ($('#kemasan-bhp').val() === '') {
            syams_validation('#kemasan-bhp', 'Kemasan harus diisi atau pilih barang terlebih dulu!'); 
            stop = true;   
        }
        if ($('#jumlah-bhp').val() === '') {
            syams_validation('#jumlah-bhp', 'Jumlah harus diisi!'); 
            stop = true;   
        }
        if (stop) {
            return false;
        }

        let html = '';
        let numb = $('.tr-rows').length;
        let barang = $('#s2id_barang-bhp a .select2c-chosen').html();
        let id_kemasan = $('#kemasan-bhp').val();
        let jumlah  = parseFloat($('#jumlah-bhp').val());
        let harga   = parseFloat($('#harga-jual-bhp').val());
        let kemasan = $('#kemasan-bhp option:selected').text();
        //let sisa    = $('#sisa_bhp').val();
        let subtotal= harga*jumlah;

        html = /* html */ `
            <tr class="tr-rows">
                <td class="number-diag center">${(numb+1)}</td>
                <td><input type="hidden" name="id_kemasan[]" id="id-bhp${numb}" value="${id_kemasan}"/>${barang}</td>
                <td>${kemasan}</td>
                <td class="right"><input type="hidden" name="harga_bhp[]" class="harga-bhp" id="harga-bhp${numb}" value="${money_format(harga)}" />${money_format(harga)}</td>
                <td class="center"><input type="text" name="jml_bhp[]" id="jml-bhp${numb}" value="${jumlah}" class="jml-bhp custom-form" onkeyup="changeHarga(this, ${numb})" style="text-align: center; width: 100%"/></td>
                <td class="right"><input type="hidden" name="subtotal_bhp[]" class="subtotal-bhp" id="subtotal-bhp${numb}" value="${money_format(subtotal)}" /> <span id="sub-bhp${numb}">${money_format(subtotal)}<span></td>
                <td class="right"><button type="button" class="btn btn-secondary btn-xs" onclick="hapusBHP(this);"><i class="fas fa-trash-alt"></i></button></td>
            </tr>
        `;

        $('#table-bhp tbody').append(html);
        $('#s2id_barang-bhp a .select2c-chosen').html('');
        $('#harga-jual-bhp').val('');
        $('#kemasan-bhp').empty();
        $('#kemasan-bhp').append("<option value=''>Pilih</option>");
        $('#jumlah-bhp').val(1);
        hitungBHP();

        syams_validation_remove('.custom-form, .barang-bhp');
    }

    function changeHarga(obj,index){      
        var harga = parseFloat(money_format_save($('#harga-bhp'+index).val()));
        var qty = parseFloat($('#jml-bhp'+index).val());

        var sub = harga*qty;
        
        $('#subtotal-bhp'+index).val(money_format(sub));
        $('#sub-bhp'+index).html(money_format(sub));
        hitungBHP();
    }

    function hapusBHP(obj){
        removeMe(obj);
        hitungBHP();
    }
    
    function removeMe(el) {
        var parent = el.parentNode.parentNode;
        parent.parentNode.removeChild(parent);
        var jml = $('.tr-rows').length;
        var col = 0;
        var j   = 0;
        if (jml > 0) {
            for (i = 0; i <= jml-1; i++) {
                $('.tr-rows:eq('+col+')').children('td:eq(0)').html(i+1);
                $('.tr-rows:eq('+col+')').children('td:eq(3)').children('.harga-bhp').attr('id','harga-bhp'+i);
                $('.tr-rows:eq('+col+')').children('td:eq(4)').children('.jml-bhp').attr('id','jml-bhp'+i);
                $('.tr-rows:eq('+col+')').children('td:eq(5)').children('.subtotal-bhp').attr('id','subtotal-bhp'+i);
                $('.tr-rows:eq('+col+')').children('td:eq(5)').children('span').attr('id','sub-bhp'+i);
                col++;
                j++;
            }
        }

        $('#bhp-label').html('');
    }

    function hitungBHP(){
        var harga = 0;
        var jumlah= $('.tr-rows').length;
        
        /*$('input[name^=subtotal_bhp]').each(function() {
            harga += parseFloat(money_format_save($(this).val()));
        });*/
        for (i = 0; i <= jumlah-1; i++) {
            harga = harga + parseFloat(currencyToNumber($('#sub-bhp'+i).html()));
        }


        if (harga > 0) {
            $('#bhp').val(money_format(harga));
            $('#bhp-label').html(money_format(harga));
        }
        //subtotal();
    }

    function showBHP(data) {
        if (data !== null) {
            $('#table-bhp tbody').empty();
            $.each(data, function(i, v) {
                let html = /* html */ `
                    <tr class="tr-rows">
                        <td class="number-bhp center">${(i + 1)}</td>
                        <td>${v.nama_barang}</td>                    
                        <td>${v.kemasan}</td>                    
                        <td class="right">${money_format(v.harga_jual)}</td>
                        <td class="center">${v.qty}</td>                    
                        <td class="right"><span id="sub-bhp${i}">${money_format(v.harga_jual * v.qty)}</span></td>
                        <td class="right">
                            <button type="button" title="klik untuk menghapus BHP" class="btn btn-secondary btn-xs" onclick="hapusListingBHP(this, ${v.id}, ${v.id_kemasan}, ${v.id_barang},'${v.nama_barang}')"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                `;

                $('#table-bhp tbody').append(html);
            });
        }

        hitungBHP();
    }

    function hapusListingBHP(el, id_penjualan, id_kemasan, id_barang, nama_barang) {
        bootbox.dialog({
            message: "Anda yakin akan menghapus <b>"+nama_barang+"</b>?",
            title: "Hapus Data",
            buttons: {
                batal: {
                    label: '<i class="fas fa-times-circle mr-1"></i>Batal',
                    className: "btn-secondary",
                    callback: function() {

                    }
                },
                hapus: {
                    label: '<i class="fas fa-trash-alt mr-1"></i>Ya',
                    className: "btn-info",
                    callback: function() {
                        $.ajax({
                            type : 'DELETE',
                            url: '<?= base_url("pelayanan/api/pelayanan/hapus_bhp") ?>/id/'+id_penjualan+'/id_kemasan/'+id_kemasan+'/id_barang/'+id_barang,
                            cache: false,
                            dataType : 'JSON',
                            success: function(data) {
                                if (data.status === true) {
                                    messageDeleteSuccess();
                                } else {
                                    messageDeleteFailed();
                                }
                            },
                            complete: function() {
                                hapusBHP(el);
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

    function showTindakanBHP(data) {
        $('#table-tindakan-bhp tbody').empty();
        if (data !== null) {
            $.each(data, function(i, v) {
                let html = /* html */ `
                    <tr class="tr-rows">
                        <td class="number-bhp center">${(i + 1)}</td>
                        <td>${v.layanan}</td>                    
                        <td class="center">${v.jumlah}</td>                    
                        <td class="center">${v.keterangan}</td>                    
                    </tr>
                `;

                $('#table-tindakan-bhp tbody').append(html);
            });
        }

    }
</script>