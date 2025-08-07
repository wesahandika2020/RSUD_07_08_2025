<script>
    $(function() {
        $('#barang-pkrt').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/barang_pkrt_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page // page number
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
                harga = data.nominal;

                var markup = data.nama + ', <br/><i><b>Harga : </b>' + money_format(harga) + '</i>';
                return markup;
            },
            formatSelection: function(data) {
                harga = data.nominal;

                $('#harga-jual-pkrt').val(harga);
                $('#jumlah-pkrt').val('1');

                var dataReturn = (harga != 0 ? data.nama + ' Rp. ' + money_format(harga) : "-- Pilih --");

                return dataReturn;
            }
        });
    });

    function addPKRT() {
        var stop = false;
        if ($('#barang-pkrt').val() === '') {
            syams_validation('#barang-pkrt', 'Barang harus dipilih !');
            stop = true;
        }
        if ($('#jumlah-pkrt').val() === '') {
            syams_validation('#jumlah-pkrt', 'Jumlah harus diisi!');
            stop = true;
        }
        if (stop) {
            return false;
        }

        let html = '';
        let numb = $('.tr-rows-pkrt').length;
        let barang = $('#s2id_barang-pkrt a .select2c-chosen').html();
        let id_tarif_pkrt = $('#barang-pkrt').val();
        let jumlah = parseFloat($('#jumlah-pkrt').val());
        let harga = parseFloat($('#harga-jual-pkrt').val());
        let subtotal = harga * jumlah;

        html = /* html */ `
            <tr class="tr-rows-pkrt">
                <td class="number-diag center">${(numb+1)}</td>
                <td><input type="hidden" name="id_tarif_pkrt[]" id="id-tarif-pkrt-${numb}" value="${id_tarif_pkrt}"/>${barang}</td>
                <td class="right"><input type="hidden" name="harga_pkrt[]" class="harga-pkrt" id="harga-pkrt${numb}" value="${money_format(harga)}" />${money_format(harga)}</td>
                <td class="center"><input type="text" name="jml_pkrt[]" id="jml-pkrt${numb}" value="${jumlah}" class="jml-pkrt custom-form" onkeyup="changeHargaPKRT(this, ${numb})" style="text-align: center; width: 100%"/></td>
                <td class="right"><input type="hidden" name="subtotal_pkrt[]" class="subtotal-pkrt" id="subtotal-pkrt${numb}" value="${money_format(subtotal)}" /> <span id="sub-pkrt${numb}">${money_format(subtotal)}<span></td>
                <td class="right"><button type="button" class="btn btn-secondary btn-xs" onclick="hapusPKRT(this);"><i class="fas fa-trash-alt"></i></button></td>
            </tr>
        `;

        $('#table-pkrt tbody').append(html);
        $('#s2id_barang-pkrt a .select2c-chosen').html('-- Pilih --');
        $('#barang-pkrt').val('');
        $('#harga-jual-pkrt').val('');
        $('#jumlah-pkrt').val(1);
        hitungPKRT();

        syams_validation_remove('.custom-form, .barang-pkrt');
    }

    function changeHargaPKRT(obj, index) {
        var harga = parseFloat(money_format_save($('#harga-pkrt' + index).val()));
        var qty = parseFloat($('#jml-pkrt' + index).val());

        var sub = harga * qty;

        $('#subtotal-pkrt' + index).val(money_format(sub));
        $('#sub-pkrt' + index).html(money_format(sub));
        hitungPKRT();
    }

    function hapusPKRT(obj) {
        removeMePKRT(obj);
        hitungPKRT();
    }

    function removeMePKRT(el) {
        var parent = el.parentNode.parentNode;
        parent.parentNode.removeChild(parent);
        var jml = $('.tr-rows-pkrt').length;
        var col = 0;
        var j = 0;
        if (jml > 0) {
            for (i = 0; i <= jml - 1; i++) {
                $('.tr-rows-pkrt:eq(' + col + ')').children('td:eq(0)').html(i + 1);
                $('.tr-rows-pkrt:eq(' + col + ')').children('td:eq(3)').children('.harga-pkrt').attr('id', 'harga-pkrt' + i);
                $('.tr-rows-pkrt:eq(' + col + ')').children('td:eq(4)').children('.jml-pkrt').attr('id', 'jml-pkrt' + i);
                $('.tr-rows-pkrt:eq(' + col + ')').children('td:eq(5)').children('.subtotal-pkrt').attr('id', 'subtotal-pkrt' + i);
                $('.tr-rows-pkrt:eq(' + col + ')').children('td:eq(5)').children('span').attr('id', 'sub-pkrt' + i);
                col++;
                j++;
            }
        }

        $('#pkrt-label').html('');
    }

    function hitungPKRT() {
        var harga = 0;
        var jumlah = $('.tr-rows-pkrt').length;

        /*$('input[name^=subtotal_bhp]').each(function() {
            harga += parseFloat(money_format_save($(this).val()));
        });*/
        for (i = 0; i <= jumlah - 1; i++) {
            harga = harga + parseFloat(currencyToNumber($('#sub-pkrt' + i).html()));
        }


        if (harga > 0) {
            $('#pkrt').val(money_format(harga));
            $('#pkrt-label').html(money_format(harga));
        }
        //subtotal();
    }

    function showPKRT(data) {
        if (data !== null) {
            $('#table-pkrt tbody').empty();
            $.each(data, function(i, v) {
                let html = /* html */ `
                    <tr class="tr-rows-pkrt">
                        <td class="number-pkrt center">${(i + 1)}</td>
                        <td>${v.nama_barang}</td>                    
                        <td class="right">${money_format(v.harga_satuan)}</td>
                        <td class="center">${v.qty}</td>                    
                        <td class="right"><span id="sub-pkrt${i}">${money_format(v.harga_satuan * v.qty)}</span></td>
                        <td class="right">
                            <button type="button" title="klik untuk menghapus PKRT" class="btn btn-secondary btn-xs" onclick="hapusListingPKRT(this, ${v.id}, ${v.id_layanan_pendaftaran},'${v.nama_barang}')"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                `;

                $('#table-pkrt tbody').append(html);
            });
        }

        hitungPKRT();
    }

    function hapusListingPKRT(el, id_pembayaran_pkrt, id_layanan, nama_barang) {
        bootbox.dialog({
            message: "Anda yakin akan menghapus <b>" + nama_barang + "</b>?",
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
                            type: 'DELETE',
                            url: '<?= base_url("pelayanan/api/pelayanan/hapus_pkrt") ?>/id_pembayaran_pkrt/' + id_pembayaran_pkrt + '/id_layanan_pendaftaran/' + id_layanan,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                if (data.status === true) {
                                    messageDeleteSuccess();
                                } else {
                                    messageDeleteFailed();
                                }
                            },
                            complete: function() {
                                hapusPKRT(el);
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

    function showTindakanPKRT(data) {
        $('#table-tindakan-pkrt tbody').empty();
        if (data !== null) {
            $.each(data, function(i, v) {
                let html = /* html */ `
                    <tr class="tr-rows-pkrt">
                        <td class="number-pkrt center">${(i + 1)}</td>
                        <td>${v.layanan}</td>                    
                        <td class="center">${v.jumlah}</td>                    
                        <td class="center">${v.keterangan}</td>                    
                    </tr>
                `;

                $('#table-tindakan-pkrt tbody').append(html);
            });
        }

    }
</script>