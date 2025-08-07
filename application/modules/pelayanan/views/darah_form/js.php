<script>
    $(function() {
        $('#barang-darah').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/barang_darah_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function (term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number,
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
                if ($('#id-penjamin-darah').val() === '20') {
                    harga_jual = data.hpp;
                }
                var markup = data.nama+' '+(data.golongan_darah !== null ? ' <i>Gol. Darah ' + data.golongan_darah + '</i>' : '') +' '+(data.rhesus !== null ? ' <i>Rhesus (' + data.rhesus + ')</i>': '')+' <br/><b>Harga : </b>'+money_format(harga_jual)+' <b>Sisa :</b> '+data.sisa;
                // var markup = data.nama+', <br/><b>Harga : </b>'+money_format(harga_jual);
                return markup;
            }, 
            formatSelection: function(data){
                $.getJSON('<?= base_url("barang/api/barang/get_kemasan_barang") ?>?id='+data.id, function(data2){
                    $('#kemasan-darah').html('');
                    if (data2 === null) {
                        alert('Kemasan barang tidak tersedia !');
                    } else {
                        $('#kemasan-darah').append("<option value=''>Pilih</option>");
                        $.each(data2, function (index, value) {
                            $('#kemasan-darah').append("<option value='"+value.id+"' "+((value.default_kemasan === '1')?'selected':'')+">"+value.nama+"</option>");
                        });
                    }
                });
                harga_jual = data.harga_jual;
                if ($('#id-penjamin-darah').val() === '20') {
                    harga_jual = data.hpp;
                }
                $('#harga-jual-darah').val(harga_jual);
                $('#kemasan-darah').focus();
                $('#jumlah-darah').val('1');
                return data.nama+' '+(data.golongan_darah !== null ? ' <i>Gol. Darah ' + data.golongan_darah + '</i>' : '') +' '+(data.rhesus !== null ? ' <i>Rhesus (' + data.rhesus + ')</i>': '') +' <b class="blinker">Sisa: '+data.sisa+'</b>';
                // return data.nama+' Rp. '+money_format(harga_jual);
            }
        });
    });

    function addDarah() {
        var stop = false;
        if ($('#barang-darah').val() === '') {
            syams_validation('#barang-darah', 'Barang harus dipilih !'); 
            stop = true;   
        }
        if ($('#kemasan-darah').val() === '') {
            syams_validation('#kemasan-darah', 'Kemasan harus diisi atau pilih barang terlebih dulu!'); 
            stop = true;   
        }
        if ($('#jumlah-darah').val() === '') {
            syams_validation('#jumlah-darah', 'Jumlah harus diisi!'); 
            stop = true;   
        }
        if (stop) {
            return false;
        }

        let html = '';
        let numb = $('.tr-rows').length;
        let barang = $('#s2id_barang-darah a .select2c-chosen').html();
        let id_kemasan = $('#kemasan-darah').val();
        let jumlah  = parseFloat($('#jumlah-darah').val());
        let harga   = parseFloat($('#harga-jual-darah').val());
        let kemasan = $('#kemasan-darah option:selected').text();
        //let sisa    = $('#sisa_darah').val();
        let subtotal= harga*jumlah;

        html = /* html */ `
            <tr class="tr-rows">
                <td class="number-diag center">${(numb+1)}</td>
                <td><input type="hidden" name="id_kemasan_darah[]" id="id-darah${numb}" value="${id_kemasan}"/>${barang}</td>
                <td>${kemasan}</td>
                <td class="right"><input type="hidden" name="harga_darah[]" class="harga-darah" id="harga-darah${numb}" value="${money_format(harga)}" />${money_format(harga)}</td>
                <td class="center"><input type="text" name="jml_darah[]" id="jml-darah${numb}" value="${jumlah}" class="jml-darah custom-form" onkeyup="changeHarga(this, ${numb})" style="text-align: center; width: 100%"/></td>
                <td class="right"><input type="hidden" name="subtotal_darah[]" class="subtotal-darah" id="subtotal-darah${numb}" value="${money_format(subtotal)}" /> <span id="sub-darah${numb}">${money_format(subtotal)}<span></td>
                <td class="center"><em class="blinker"><i class="fas fa-spinner fa-spin mr-1"></i>Request</em></td>
                <td class="right"><button type="button" class="btn btn-secondary btn-xs" onclick="hapusDarah(this);"><i class="fas fa-trash-alt"></i></button></td>
            </tr>
        `;

        $('#table-darah tbody').append(html);
        $('#s2id_barang-darah a .select2c-chosen').html('');
        $('#harga-jual-darah').val('');
        $('#kemasan-darah').empty();
        $('#kemasan-darah').append("<option value=''>Pilih</option>");
        $('#jumlah-darah').val(1);
        hitungDarah();

        syams_validation_remove('.custom-form, .barang-darah');
    }

    function changeHarga(obj,index){      
        var harga = parseFloat(money_format_save($('#harga-darah'+index).val()));
        var qty = parseFloat($('#jml-darah'+index).val());

        var sub = harga*qty;
        
        $('#subtotal-darah'+index).val(money_format(sub));
        $('#sub-darah'+index).html(money_format(sub));
        hitungDarah();
    }

    function hapusDarah(obj){
        removeMe(obj);
        hitungDarah();
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
                $('.tr-rows:eq('+col+')').children('td:eq(3)').children('.harga-darah').attr('id','harga-darah'+i);
                $('.tr-rows:eq('+col+')').children('td:eq(4)').children('.jml-darah').attr('id','jml-darah'+i);
                $('.tr-rows:eq('+col+')').children('td:eq(5)').children('.subtotal-darah').attr('id','subtotal-darah'+i);
                $('.tr-rows:eq('+col+')').children('td:eq(5)').children('span').attr('id','sub-darah'+i);
                col++;
                j++;
            }
        }

        $('#darah-label').html('');
    }

    function hitungDarah(){
        var harga = 0;
        var jumlah= $('.tr-rows').length;
        
        /*$('input[name^=subtotal_darah]').each(function() {
            harga += parseFloat(money_format_save($(this).val()));
        });*/
        for (i = 0; i <= jumlah-1; i++) {
            harga = harga + parseFloat(currencyToNumber($('#sub-darah'+i).html()));
        }


        if (harga > 0) {
            $('#darah').val(money_format(harga));
            $('#darah-label').html(money_format(harga));
        }
        //subtotal();
    }

    function showDarah(data) {
        if (data !== null) {
            $('#table-darah tbody').empty();
            $.each(data, function(i, v) {
                var status = ''
                if (v.status_order_darah === 'Request') {
                    status = '<em class="blinker"><i class="fas fa-spinner fa-spin mr-1"></i>' + v.status_order_darah + '</em>';
                }
                if (v.status_order_darah === 'Canceled') {
                    background = 'style="background-color:#E46A76;color:#FFFFFF"';
                    button = 'disabled';
                }
                if (v.status_order_darah === 'Confirmed') {
                    status = '<h5><span class="label label-success"><i class="fas fa-fw fa-thumbs-up mr-1"></i>Dikonfirmasi</span></h5>';
                    button = 'disabled';
                }
                
                let html = /* html */ `
                    <tr class="tr-rows">
                        <td class="number-darah center">${(i + 1)}</td>
                        <td>${v.nama_barang}</td>                    
                        <td>${v.kemasan}</td>                    
                        <td class="right">${money_format(v.harga_jual)}</td>
                        <td class="center">${v.qty}</td>                    
                        <td class="right"><span id="sub-darah${i}">${money_format(v.harga_jual * v.qty)}</span></td>
                        <td class="center">${status}</td>
                        <td class="right">
                            <button type="button" title="klik untuk menghapus Darah" class="btn btn-secondary btn-xs" onclick="hapusListingDarah(this, ${v.id}, ${v.id_kemasan}, ${v.id_barang},'${v.nama_barang}')"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                `;

                $('#table-darah tbody').append(html);
            });
        }

        hitungDarah();
    }

    function hapusListingDarah(el, id_penjualan, id_kemasan, id_barang, nama_barang) {
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
                            url: '<?= base_url("pelayanan/api/pelayanan/hapus_darah") ?>/id/'+id_penjualan+'/id_kemasan/'+id_kemasan+'/id_barang/'+id_barang,
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
                                hapusDarah(el);
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

    function showTindakanDarah(data) {
        $('#table-tindakan-darah tbody').empty();
        if (data !== null) {
            $.each(data, function(i, v) {
                let html = /* html */ `
                    <tr class="tr-rows">
                        <td class="number-darah center">${(i + 1)}</td>
                        <td>${v.layanan}</td>                    
                        <td class="center">${v.jumlah}</td>                    
                        <td class="center">${v.keterangan}</td>                    
                    </tr>
                `;

                $('#table-tindakan-darah tbody').append(html);
            });
        }
    }
</script>