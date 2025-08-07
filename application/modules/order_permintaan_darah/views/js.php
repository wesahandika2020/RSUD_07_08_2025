<script>
    $(function() {
        $('#wizard').bwizard()
        getListData(1)

        $('#btn-search').click(function() {
            $('#modal-search').modal('show')
        })

        $('#tanggal-awal2, #tanggal-akhir2').datepicker({
            format: 'dd/mm/yyyy'
        }).on('changeDate', function() {
            $(this).datepicker('hide')
        })

        $('#pasien-search').select2({
            ajax: {
                url: "<?= base_url('registrations/api/registrations_auto/pasien_auto') ?>",
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
                var markup = '<b>' + data.id + '</b>' + ' ' + data.nama + '<br/>' + data.alamat;
                return markup;
            },
            formatSelection: function(data) {
                return data.id + ' ' + data.nama;
            }
        })

        $('#operator-auto').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                        jenis: 'medis'
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
                var markup = '<b>' + data.nama + '</b> <br/>' + data.spesialisasi;
                return markup;
            },
            formatSelection: function(data) {
                return data.nama;
            }
        })

        $('#tindakan-auto').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/tarif_pelayanan_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        jenis_pemeriksaan: 'Pelayanan Laboratorium',
                        // jenis_pemeriksaan: '',
                        page: page, // page number
                        kelas: ''
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
                var total = data.total;
                var kelas = (data.kelas !== null) ? (', kelas ') + data.kelas : '';
                var markup = '<b>' + data.layanan + '</b> <br/>' + data.jenis + ', ' + data.bobot + ' - ' + kelas + '<br/>' + numberToCurrency(total);
                return markup;
            },
            formatSelection: function(data) {
                $('#tarif-tindakan').val(data.total);
                return data.layanan;
            }
        })

        $('#btn-reload').click(function() {
            reloadData()
            getListData(1)
        })

        $('.form-control, .custom-form .select2-input, .select2c-input').change(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this)
            }
        })

        $('.form-control, .custom-form').keyup(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this)
            }
        })
    })

    function reloadData() {
        $('input[type=text], input[type=hidden], select, textarea').val('')
        $('a .select2c-chosen').html('')
        $('#tanggal-awal, #tanggal-akhir').val('<?= date('d/m/Y') ?>')
    }

    function getListData(page) {
        $('#pagenow').val(page)
        $('#modal-search').modal('hide')
        $.ajax({
            type: 'GET',
            url: '<?= base_url("order_permintaan_darah/api/order_permintaan_darah/get_list_data") ?>/page/' + page,
            data: $('#form-search').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader()
            },
            success: function(data) {
                if ((page > 1) & (data.data.length === 0)) {
                    getListData(page - 1)
                    return false;
                };

                $('#pagination').html(pagination(data.jumlah, data.limit, data.page, 2))
                $('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page))

                $('#table-data tbody').empty()
                $.each(data.data, function(i, v) {
                    let status = '<em class="blinker"><i class="fas fa-spinner fa-spin mr-1"></i>Belum</em>';
                    if (v.diperiksa !== 'Belum') {
                        status = '<h5><span class="label label-success"><i class="fas fa-fw fa-thumbs-up mr-1"></i>Sudah</span></h5>'
                    }
                    let disabled = '';
                    if (v.id_history_pembayaran) {
                        disabled = 'disabled';
                    }
					$('#id-pasien').val(v.id_pasien);
                    let detail = v.id + '#' + v.id_pasien + '#' + v.nama_pasien + '#' + v.vk + ', <i>' + v.parent + '</i>#' + v.kamar + '#' + v.klasifikasi + '#' + datetimefmysql(v.mulai) + '#' + datetimefmysql(v.selesai) + '#' + v.kelamin + '#' + v.tanggal_lahir + '#' + v.id_layanan_pendaftaran + '#' + v.id_tarif;
                    let attribut = 'onclick="pelayananBankDarah(\'' + detail + '\')"';
                    if (v.diperiksa === 'Sudah') {
                        attribut = 'onclick="getDataPelayananBankDarah(' + v.id + ', \'' + detail + '\', \'' + disabled + '\')"';
                    }

                    let html = /* html */ `
						<tr>
							<td class="wrapper center">${((i+1) + ((data.page - 1) * data.limit))}</td>
							<td class="wrapper center">${datetimefmysql(v.waktu)}</td>
							<td class="wrapper">${v.id_pasien}</td>
							<td class="wrapper">${v.nama_pasien}</td>
							<td class="wrapper">${v.jenis_layanan}</td>
							<td class="wrapper center">${status}</td>
							<td class="wrapper right">
								<button type="button" title="Klik untuk melakukan pemeriksaan" class="btn btn-secondary btn-xs" ${attribut}><i class="fas fa-stethoscope"></i></button>
							</td>
						</tr>
					`;
                    $('#table-data tbody').append(html)
                })
            },
            complete: function() {
                hideLoader()
            },
            error: function(e) {
                accessFailed(e.status);
            },
        })
    }

    function paging(page) {
        getListData(page)
    }

    function pelayananBankDarah(data) {
        syams_validation_remove('.custom-form, .select2-input')
        let val = data.split('#')

        $('#nama-detail').html(val[2])
        $('#no-rm-detail').html(val[1])
        $('#kelamin-detail').html(val[8])
        $('#umur-detail').html(hitungUmur(val[9]) + ', ' + datefmysql(val[9]))
        $('#id-order-bank-darah').val(val[0])
        $('#s2id_tarif a .select2c-chosen').html(val[3])

        getLayananPendaftaran(val[1], val[10])
    }

    function getLayananPendaftaran(id_pasien, id_layanan_pendaftaran) {
        $('#wizard').bwizard('show', '0')
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan_auto/get_layanan_pendaftaran") ?>/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader()
            },
            success: function(data) {
                if (data.id !== undefined) {
                    $('#id-layanan').val(id_layanan_pendaftaran)
                    $('#id-pendaftaran').val(data.id_pendaftaran)
                    $('#cara-bayar-detail').html(data.cara_bayar + ' ' + ((data.penjamin !== null) ? '(' + data.penjamin + ')' : ''))
                    $('#datang-dari-detail').html(data.dari)
                    $('#kelas-detail').html(data.kelas)
                    $('#kelas-check').val(data.id_kelas)
                    $('#no-register-detail').html(data.no_register)
                    loadDataDarah(id_layanan_pendaftaran)
                    $('#modal-pelayanan').modal('show')
                } else {
                    swalAlert('info', 'Informasi', 'Pasien ini pada bagian lain dinyatakan <b>Sudah Keluar</b> dari Rumah Sakit!')
                    return false;
                }
            },
            complete: function() {
                hideLoader()
            },
            error: function(e) {
                accessFailed(e.status);
            },
        })
    }

    function addTindakan() {
        if ($('#operator-auto').val() === '') {
            syams_validation('#operator-auto', 'Kolom dokter harus diisi.')
            return false;
        }

        if ($('#tindakan-auto').val() === '') {
            syams_validation('#tindakan-auto', 'Kolom tindakan harus diisi.')
            return false;
        }

        let html = '';
        let number = $('.number-tindakan').length;
        let operator = $('#s2id_operator-auto a .select2c-chosen').html();
        let id_operator = $('#operator-auto').val();
        let tindakan = $('#s2id_tindakan-auto a .select2c-chosen').html();
        let id_tindakan = $('#tindakan-auto').val();
        let tarif = $('#tarif-tindakan').val();

        html = /* html */ `
            <tr>
                <td class="number-tindakan center">${++number}</td>
				<td>
					<input type="hidden" name="id_odb[]" value="">
					<input type="hidden" name="id_operator[]" value="${id_operator}">${operator}
				</td>
                <td><input id="tind-darah${number}" type="hidden" name="id_tindakan[]" value="${id_tindakan}">${tindakan}</td>
                <td></td>
                <td class="right">${numberToCurrency(tarif)}</span></td>
                <td></td>
                <td class="right">
                    <button type="button" class="btn btn-secondary btn-xxs" onclick="removeThis(this)"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
        `;
        $('#table-tindakan tbody').append(html);
        $('#tindakan-auto, #tarif-tindakan').val('');
        $('#s2id_tindakan-auto a .select2c-chosen').html('');

    }

    function removeThis(el) {
        var parent = el.parentNode.parentNode;
        parent.parentNode.removeChild(parent);
    }

    function konfirmasiSimpan() {
        swal.fire({
            title: 'Konfirmasi Simpan',
            html: "Anda yakin ingin menyimpan transaksi Order Bank Darah ini?",
            icon: 'question',
            showCancelButton: true,
            buttonsStyling: true,
            confirmButtonText: '<i class="fas fa-fw fa-check-circle mr-1"></i>Ya',
            cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                simpanPelayananBankDarah()
            }
        })
    }

    function simpanPelayananBankDarah() {
        let jml_tindakan = $('.number-tindakan').length;
        if (jml_tindakan === 0) {
            swalAlert('warning', 'Validasi', 'Tindakan belum dientrikan!')
            $('#wizard').bwizard('show', '1')
            return false;
        }
        let update = '';
        if ($('#id').val() !== '') {
            update = '/id/' + $('#id').val();
        }

        let sVal = [];

        var i = 1;
        while (i <= jml_tindakan) {            
            sVal.push($('#tind-darah'+i).val());
            i++;
        }

        let cek_value = '';
        const arr1 = sVal;
        const arr2 = ["9427", "9426"];
        let res = arr1.filter(item => !arr2.includes(item));
        let cek_item = arr1.includes("9427");
        let cek_item_satu = arr1.includes("9426");
        let cek_item_dua = arr1.includes(undefined);

        const arr3 = ["9427", "9426", undefined];
        let rest_area = arr1.filter(need => !arr3.includes(need));

        
        
        if(res.length > 0 && (cek_item === true | cek_item_satu === true) && cek_item_dua === false){

            swalAlert('warning', 'Validasi', 'Order NON LIS tidak bisa digabungkan dengan Order LIS!');
            $('#wizard').bwizard('show', '1');
            return false;

         } else if(res.length > 0 && (cek_item === true | cek_item_satu === true) && cek_item_dua === true && rest_area.length > 0){

            swalAlert('warning', 'Validasi', 'Order NON LIS tidak bisa digabungkan dengan Order LIS!');
            $('#wizard').bwizard('show', '1');
            return false;

        } else if(res.length > 0 && cek_item === false && cek_item_satu === false){

                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url("order_permintaan_darah/api/order_permintaan_darah/simpan_pelayanan") ?>' + update,
                    data: $('#form-pelayanan').serialize(),
                    cache: false,
                    dataType: 'JSON',
                    beforeSend: function() {
                        showLoader()
                    },
                    success: function(data) {
                        if (data.status) {
                            messageCustom('Berhasil menyimpan transaksi pelayanan Bank Darah', 'Success')
                            getListData($('#pagenow').val())
                            $('#modal-pelayanan').modal('hide')
                        } else {
                            messageCustom(data.message, 'Error')
                        }
                    },
                    complete: function() {
                        hideLoader()
                    },
                    error: function(e) {
                        messageCustom('Terjadi Kesalahan Sistem, Gagal melakukan Transaksi Pelayanan Bank Darah', 'Error')
                    }
                })

        } else {

            $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url("order_permintaan_darah/api/order_permintaan_darah/simpan_order_lis") ?>' + update,
                    data: $('#form-pelayanan').serialize(),
                    cache: false,
                    dataType: 'JSON',
                    beforeSend: function() {
                        showLoader()
                    },
                    success: function(data) {
                        if (data.status) {
                            messageCustom('Berhasil menyimpan transaksi pelayanan Bank Darah', 'Success')
                            getListData($('#pagenow').val())
                            $('#modal-pelayanan').modal('hide')
                        } else {
                            messageCustom(data.message, 'Error')
                        }
                    },
                    complete: function() {
                        hideLoader()
                    },
                    error: function(e) {
                        messageCustom('Terjadi Kesalahan Sistem, Gagal melakukan Transaksi Pelayanan Bank Darah', 'Error')
                    }
                })


        }

    }

    function getDataPelayananBankDarah(id_order_bank_darah, data, disabled) {
        $('#wizard').bwizard('show', '0')
        pelayananBankDarah(data)
        loadDataPemeriksaan(id_order_bank_darah, disabled)
    }

    function loadDataPemeriksaan(id_order_bank_darah, disabled) {
        $('#table-tindakan tbody').empty()
        $.ajax({
            type: 'GET',
            url: '<?= base_url("order_permintaan_darah/api/order_permintaan_darah/get_tindakan_tambahan") ?>',
            data: 'id=' + id_order_bank_darah,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader()
            },
            success: function(data) {
                
                let butTon = '';
                let statLis = '';

                $.each(data, function(i, v) {

                    if(v.id_tarif === '9427' | v.id_tarif === '9426'){

                        if(v.status_lis === '201'){

                            statLis = 'Berhasil Order';

                        } else {

                            butTon = /* html */ 
                                ` <button title="Klik untuk Order LIS" type="button" class="btn btn-info" onclick="orderDarahLIS(`+id_order_bank_darah+`, `+v.id_layanan_pendaftaran+` , '`+v.kode_ono+`' , `+disabled+`)"><i class="fas fa-arrow-circle-down mr-1"></i> Order LIS</button> `;
                            statLis = 'Belum Order';

                        }

                    } else {

                        statLis = '-';
                        butTon = '';

                    }

                    let html = /* html */ `
                        <tr>
                            <td class="number-tindakan center">${++i}</td>
                            <td>
                                <input type="hidden" name="id_odb[]" value="${v.id_nadis}">
                                <input type="hidden" name="id_operator[]" value="${v.id_operasi}">
                                <input type="hidden" name="id_operator_before[]" value="${v.nadis}">
                                ${v.nadis}
                            </td>
                            <td>
                                <input type="hidden" name="id_tindakan[]" value="${v.id_tarif}">
                                <input type="hidden" name="id_tindakan_before[]" value="${v.nama_tarif}">
                                ${v.nama_tarif}
                            </td>
                            <td class="center">${((v.kode_ono !== null) ? v.kode_ono : '-')}</td>
                            <td class="right">${numberToCurrency(v.total)}</td>
                            <td class="center">${statLis}</td>
                            <td class="right">
                                ${butTon}
                                <button type="button" ${disabled} class="btn btn-secondary btn-xxs" onclick="hapusOrderDarah(`+v.id_tarif_bank_darah+`, `+id_order_bank_darah+`, `+disabled+`)"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    `;
                    $('#table-tindakan tbody').append(html)
                })
            },
            complete: function() {
                hideLoader()
            }
        })
    }

    function hapusOrderDarah(id_tarif_darah, id_order, disabled) {

        bootbox.dialog({
            message: "Anda yakin akan menghapus data tindakan ini?",
            title: "Hapus Data",
            buttons: {
                batal: {
                    label: '<i class="fas fa-times-circle mr-1"></i>Batal',
                    className: "btn-secondary",
                    callback: function() {

                    }
                },
                hapus: {
                    label: '<i class="fas fa-trash-alt mr-1"></i>Hapus',
                    className: "btn-info",
                    callback: function() {
                        $.ajax({
                            type : 'DELETE',
                            url: '<?= base_url("order_permintaan_darah/api/order_permintaan_darah/hapusTindakanDarah") ?>/'+id_tarif_darah,
                            cache: false,
                            dataType : 'JSON',
                            success: function(data) {
                                if (data.status) {
                                    messageCustom(data.message, 'Success');
                                    loadDataPemeriksaan(id_order, disabled)
                                    
                                }else{
                                    customAlert('Batalkan Tindakan', data.message);
                                }
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

    function orderDarahLIS(id_order, id_layanan, ono, disabled) {
        if (id_order !== '') {
            
            $.ajax({
                    type: 'POST',
                    url: '<?= base_url("order_permintaan_darah/api/order_permintaan_darah/orderDarahLIS") ?>',
                    data: 'id_layanan='+id_layanan+'&ono='+ono,
                    cache: false,
                    dataType: 'json',
                    beforeSend: function() {
                                showLoader();
                            },
                    success: function (data) {
                        var tipe = 'Success';
                            if (data.status === false) {
                                tipe = 'Error';
                            }
                            messageCustom(data.message, tipe);
                            loadDataPemeriksaan(id_order, disabled);
                    },
                    complete: function() {
                                hideLoader();
                            },
                    error: function(data){

                        if(data.responseJSON !== undefined) {

                            if(data.responseJSON.status === false && data.responseJSON.response !== null){
                                let tipe = 'Error';
                                messageCustom(data.responseJSON.message, tipe);
                            }

                        } else {
                            let tipe = 'Error';
                            messageCustom(data.message, tipe);
                        }
                    
                    }
                });
            
        }else{
            messageCustom('Pilih dokter terlebih dahulu', 'Info');
        }
    }

    function loadDataDarah(id_layanan_pendaftaran) {
        $('#table-darah tbody').empty()
        $.ajax({
            type: 'GET',
            url: '<?= base_url("order_permintaan_darah/api/order_permintaan_darah/get_darah_tambahan") ?>',
            data: 'id_layanan_pendaftaran=' + id_layanan_pendaftaran,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader()
            },
            success: function(data) {
                if (data.total !== null) {
                    $('#cektotal').val(data.total.total)
                }
                let no = 1;
                $.each(data.list, function(i, v) {

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
                        <tr class="rows">
                            <td class="center">${i + 1}</td>
                            <td>${v.nama_barang}</td>
                            <td class="center"><span id="nama-kemasan${no}">${v.kemasan}</span></td>
                            <td class="center">${v.qty}</td>
                            <td class="right" id="hargajual${no}">${money_format(v.harga_jual)}</td>
                            <td class="center">${status}</td>
                            <td class="right">
                                ${(v.status_order_darah === 'Request' ? '<button type="button" class="btn btn-secondary btn-xs pointer" onclick="confirmPermintaanDarah('+v.id_detail_penjualan+', '+v.id_layanan_pendaftaran+', '+v.id_barang+', '+v.id_kemasan+')"><i class="fas fa-check-circle"></i></button>' : ' ')}
                            </td>
                        </tr>
                    `;
                    $('#table-darah tbody').append(html)
                    no++;
                })
            },
            complete: function() {
                hideLoader()
            }
        })
    }

    function confirmPermintaanDarah(id_detail_penjualan, id_layanan_pendaftaran, id_barang, id_kemasan) {
        swal.fire({
            title: 'Konfirmasi Permintaan',
            html: "Anda yakin ingin mengkonfirmasi permintaan darah ini?",
            icon: 'question',
            showCancelButton: true,
            buttonsStyling: true,
            confirmButtonText: '<i class="fas fa-fw fa-check-circle mr-1"></i>Ya',
            cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                if (id_detail_penjualan !== undefined) {
                    $.ajax({
                        type: 'POST',
                        url: '<?= base_url('order_permintaan_darah/api/order_permintaan_darah/konfirmasi_permintaan_darah') ?>',
                        data: 'id_detail_penjualan=' + id_detail_penjualan + '&id_layanan_pendaftaran=' + id_layanan_pendaftaran + '&id_barang=' + id_barang + '&id_kemasan=' + id_kemasan,
                        dataType: 'JSON',
                        beforeSend: function() {
                            showLoader()
                        },
                        success: function(data) {
                            if (data.status) {
                                messageCustom(data.message, 'Success')
                                loadDataDarah(data.id_layanan_pendaftaran)
                            } else {
                                swalAlert('info', 'Konfrimasi Permintaan Darah', '<h5 style="display:inline-block">' + data.message + '</h5>')
                            }
                        },
                        complete: function() {
                            hideLoader()
                        },
                        error: function(e) {

                        }
                    })
                }
            }
        })
    }
</script>