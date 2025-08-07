<script>
    $(function() {
        $('#wizard').bwizard()
        getListDataVK(1)

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
                    var more = (page * 20) < data
                        .total; // whether or not there are more results available

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
                    var more = (page * 20) < data
                        .total; // whether or not there are more results available

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
                        // jenis_pemeriksaan: 'Pelayanan Pembedahan',
                        jenis_pemeriksaan: '',
                        page: page, // page number
                        kelas: ''
                    };
                },
                results: function(data, page) {
                    var more = (page * 20) < data
                        .total; // whether or not there are more results available

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
                var markup = '<b>' + data.layanan + '</b> <br/>' + data.jenis + ', ' + data.bobot +
                    ' - ' + kelas + '<br/>' + numberToCurrency(total);
                return markup;
            },
            formatSelection: function(data) {
                $('#tarif-tindakan').val(data.total);
                return data.layanan;
            }
        })

        $('#barang-bhp').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/barang_with_stok_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page // page number
                    };
                },
                results: function(data, page) {
                    var more = (page * 20) < data
                        .total; // whether or not there are more results available

                    // notice we return the value of more so Select2 knows if more results can be loaded
                    return {
                        results: data.data,
                        more: more
                    };
                }
            },
            formatResult: function(data) {
                var markup = data.nama + ' Sisa: ' + (data.sisa !== null ? data.sisa : '0')
                return markup;
            },
            formatSelection: function(data) {
                $.getJSON('<?= base_url("barang/api/barang/get_kemasan_barang") ?>?id=' + data.id,
                    function(data2) {
                        $('#kemasan-bhp').html('');
                        if (data2 === null) {
                            alert('Kemasan barang tidak tersedia !');
                        } else {
                            $.each(data2, function(index, value) {
                                $('#kemasan-bhp').append("<option value='" + value
                                    .id_kemasan + "'>" + value.nama + "</option>");
                            });
                        }
                    });
                $('#kemasan-bhp').focus();
                $('#jumlah-bhp').val('1');
                // return data.nama+' Sisa: ' + (data.sisa_stok !== null ? data.sisa_stok : '');
                return data.nama;
            }
        })

        $('#tindakan-icd9').select2c({
            ajax: {
                url: "<?= base_url('pengkodean_icd_x/api/Pengkodean_icd_x_auto/code_icd9_auto') ?>",
                dataType: 'JSON',
                quietMillis: 100,
                data: function(term, page) { // pag e is the one-based page number tracked by Select2
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
                var markup = '<b>' + data.icd9 + '</b> <br/>' + data.nama;
                return markup;
            },
            formatSelection: function(data) {
                $('#tindakan-icd9').val(data.id);
                return '[' + data.icd9 + '] ' + data.nama;
            }
        });

        $('#btn-reload').click(function() {
            reloadData()
            getListDataVK(1)
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


        $('#btn-upload-file-vk').click(function() {
            uploadFileRM($('#id-pendaftaran').val(), $('#id-layanan').val(), $('#id-pasien').val());
        })
    })

    function reloadData() {
        $('input[type=text], input[type=hidden], select, textarea').val('')
        $('a .select2c-chosen').html('')
        $('#tanggal-awal, #tanggal-akhir').val('<?= date('d/m/Y') ?>')
    }

    function getListDataVK(page) {
        $('#page-now').val(page)
        $('#modal-search').modal('hide')
        $.ajax({
            type: 'GET',
            url: '<?= base_url("order_vk/api/order_vk/get_list_data_vk") ?>/page/' + page,
            data: $('#form-search').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader()
            },
            success: function(data) {
                if ((page > 1) & (data.data.length === 0)) {
                    getListDataVK(page - 1)
                    return false;
                };

                $('#pagination').html(pagination(data.jumlah, data.limit, data.page, 2))
                $('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page))

                $('#table-data tbody').empty()
                $.each(data.data, function(i, v) {
                    let status =
                        '<em class="blinker"><i class="fas fa-spinner fa-spin mr-1"></i>Belum</em>';
                    if (v.diperiksa !== 'Belum') {
                        status =
                            '<h5><span class="label label-success"><i class="fas fa-fw fa-thumbs-up mr-1"></i>Sudah</span></h5>'
                    }
                    let disabled = '';
                    if (v.id_history_pembayaran) {
                        disabled = 'disabled';
                    }
                    $('#id-pasien').val(v.id_pasien);
                    let detail = v.id + '#' + v.id_pasien + '#' + v.nama_pasien + '#' + v.vk + ', <i>' +
                        v.parent + '</i>#' + v.kamar + '#' + v.klasifikasi + '#' + datetimefmysql(v
                            .mulai) + '#' + datetimefmysql(v.selesai) + '#' + v.kelamin + '#' + v
                        .tanggal_lahir + '#' + v.id_layanan_pendaftaran + '#' + v.id_tarif;
                    let attribut = 'onclick="pelayananVK(\'' + detail + '\')"';
                    if (v.diperiksa === 'Sudah') {
                        attribut = 'onclick="getDataPelayananVK(' + v.id + ', \'' + detail + '\', \'' +
                            disabled + '\')"';
                    }

                    let disable_viewonly = '';
                    let accountGroup = "<?= $this->session->userdata('account_group') ?>"
                    if ((accountGroup === 'Komite Keperawatan')) { //READ ONLY
                        disable_viewonly = 'disabled';
                    } else {
                        disable_viewonly = '';
                    }

                    let riwayat_rekammedis = '';
                    if (v.tindak_lanjut === null && disable_viewonly == '') {
                        riwayat_rekammedis = '';
                    } else {
                        riwayat_rekammedis = '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="riwayatPasien(\'' + v.id_pasien + '\')"><i class="fas fa-eye m-r-5"></i> Lihat Riwayat Rekam Medis Pasien</a>';
                    }

                    let html = /* html */ `
						<tr>
							<td class="wrapper center">${((i+1) + ((data.page - 1) * data.limit))}</td>
							<td class="wrapper center">${datetimefmysql(v.waktu)}</td>
							<td class="wrapper">${v.id_pasien}</td>
							<td class="wrapper">${v.nama_pasien}</td>
							<td class="wrapper center">${v.jenis_layanan}</td>
							<td class="wrapper center">${status}</td>
							<td class="wrapper center">
								<div class="btn-group"><button type="button" class="btn waves-effect waves-light btn-secondary btn-xs dropdown-toggle" data-toggle="dropdown"><i class="fas fa-fw fa-cog"></i></button> 
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item ${disable_viewonly} waves-effect waves-light btn-xs" href="javascript:void(0)" ${attribut}><i class="fas fa-fw fa-pencil-alt m-r-5"></i>Entri Pemeriksaan</a>
                                        <a class="dropdown-item btn-xs" href="javascript:void(0)" onclick="entriCPPT('${v.id_pendaftaran}','${v.id_layanan_pendaftaran}','VK','VK')"><i class="fas fa-fw fas fa-notes-medical mr-1"></i>Entri CPPT</a>
										${riwayat_rekammedis}
									</div>
                                </div>
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
        getListDataVK(page)
    }

    function pelayananVK(data) {
        syams_validation_remove('.custom-form, .select2-input')
        let val = data.split('#')

        $('#nama-detail').html(val[2])
        $('#no-rm-detail').html(val[1])
        $('#kelamin-detail').html(val[8])
        $('#umur-detail').html(hitungUmur(val[9]) + ', ' + datefmysql(val[9]))
        $('#id-jadwal-vk').val(val[0])
        $('#tarif-vk').val(val[11])
        $('#id-tarif-vk-asli').val(val[11])
        $('#s2id_tarif-vk a .select2c-chosen').html(val[3])
		$('#diagnosa-pra, #diagnosa-pasca, #dokter-bedah, #dokter-bedah-asisten, #dokter-anesthesi, #perawat, #asisten-operator, #instrumental, #sirkuler').html('')
        getLayananPendaftaran(val[1], val[10])
        get_pemeriksaan_lab(val[10]);
        get_pemeriksaan_rad(val[10]);
        $('#table-bhp tbody').empty()
    }

    function getLayananPendaftaran(id_pasien, id_layanan_pendaftaran) {
        $('#wizard').bwizard('show', '0')
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan_auto/get_layanan_pendaftaran") ?>/id_layanan_pendaftaran/' +
                id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader()
            },
            success: function(data) {
                if (data.id !== undefined) {
                    if (data.tindak_lanjut === 'cco sementara') {
                        $('button[title="Tambah Tindakan"]').removeAttr('onclick').on('click', function() {
                            swalAlert('info', 'Info', 'Pasien sudah checkout. <br>Jika ingin menambah tindakan, silahkan hubungi <b>Kasir</b>')
                        })

                        $('button[title="tambah bhp"]').removeAttr('onclick').on('click', function() {
                            swalAlert('info', 'Info', 'Pasien sudah checkout. <br>Jika ingin menambah BHP, silahkan hubungi <b>Kasir</b>')
                        })

                        $('button[title="order pemeriksaan lab"]').removeAttr('onclick').on('click', function() {
                            swalAlert('info', 'Info', 'Pasien sudah checkout. <br>Jika ingin menambah Order Pemeriksaan Laboratorium, silahkan hubungi <b>Kasir</b>')
                        })

                        $('button[title="order pemeriksaan rad"]').removeAttr('onclick').on('click', function() {
                            swalAlert('info', 'Info', 'Pasien sudah checkout. <br>Jika ingin menambah Order Pemeriksaan Radiologi, silahkan hubungi <b>Kasir</b>')
                        })

                        $('button[title="order operasi"]').removeAttr('onclick').on('click', function() {
                            swalAlert('info', 'Info', 'Pasien sudah checkout. <br>Jika ingin menambah Tindakan Operasi, silahkan hubungi <b>Kasir</b>')
                        })
                    } else {
                        $('button[title="Tambah Tindakan"]').off('click').attr('onclick', 'addTindakan()')
                        $('button[title="tambah bhp"]').off('click').attr('onclick', 'addBHP(); return false;')
                        $('button[title="order pemeriksaan lab"]').off('click').attr('onclick', 'request_lab()')
                        $('button[title="order pemeriksaan rad"]').off('click').attr('onclick', 'request_rad()')
                        $('button[title="order operasi"]').off('click').attr('onclick', 'addOrderOperasi()')
                    }
                    $('#id-layanan').val(id_layanan_pendaftaran)
                    $('#id-pendaftaran').val(data.id_pendaftaran)
                    $('#id-pasien').val(id_pasien)
                    $('#cara-bayar-detail').html(data.cara_bayar + ' ' + ((data.penjamin !== null) ? '(' + data
                        .penjamin + ')' : ''))
                    $('#datang-dari-detail').html(data.dari)
                    $('#kelas-detail').html(data.kelas)
                    $('#kelas-check').val(data.id_kelas)
                    $('#no-register-detail').html(data.no_register)
                    $('#modal-pelayanan-vk').modal('show')
                } else {
                    swalAlert('info', 'Informasi',
                        'Pasien ini pada bagian lain dinyatakan <b>Sudah Keluar</b> dari Rumah Sakit!')
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

    //! area diagnosa
    // function tambahDataDiagnosisPra() {
    // 	let i = $('.diagnosa-pra').length;
    // 	let html = /* html */ `
    // 		<div id="pra${i}" style="vertical-align:middle !important">
    // 			<input type="text" name="diagpra[]" id="diagnosa-pra${i}" class="diagnosa-pra mb-2">
    // 			<button type="button" class="btn btn-danger btn-xs mb-2" onclick="removeDiagnosisPra(${i})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
    // 		</div>
    // 	`;
    // 	$('#diagnosa-pra').append(html)
    // 	$('#diagnosa-pra' + i).select2c({
    //         ajax: {
    //             url: "<?= base_url('masterdata/api/masterdata_auto/golongan_sebab_sakit_auto') ?>",
    //             dataType: 'json',
    //             quietMillis: 100,
    //             data: function (term, page) { // page is the one-based page number tracked by Select2
    //                 return {
    //                     q: term, //search term
    //                     page: page, // page number
    //                 };
    //             },
    //             results: function (data, page) {
    //                 var more = (page * 20) < data.total; // whether or not there are more results available

    //                 // notice we return the value of more so Select2 knows if more results can be loaded
    //                 return {results: data.data, more: more};
    //             }
    //         },
    //         formatResult: function(data){
    //             var kode_icdx = (data.kode_icdx !== null)?(data.kode_icdx+' | '):'';

    //             var markup = '<b>' + kode_icdx + '</b>' + data.nama + '<br/>';
    //             return markup;
    //         }, 
    //         formatSelection: function(data){
    //             return data.kode_icdx_rinci +' | '+ data.nama;
    //         }
    //     })
    // }

    // function tambahDataDiagnosisPasca() {
    // 	let i = $('.diagnosa-pasca').length;
    // 	let html = /* html */ `
    // 		<div id="pasca${i}" style="vertical-align:middle !important">
    // 			<input type="text" name="diagpasca[]" id="diagnosa-pasca${i}" class="diagnosa-pasca mb-2">
    // 			<button type="button" class="btn btn-danger btn-xs mb-2" onclick="removeDiagnosisPasca(${i})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
    // 		</div>
    // 	`;
    // 	$('#diagnosa-pasca').append(html)
    // 	$('#diagnosa-pasca' + i).select2c({
    //         ajax: {
    //             url: "<?= base_url('masterdata/api/masterdata_auto/golongan_sebab_sakit_auto') ?>",
    //             dataType: 'json',
    //             quietMillis: 100,
    //             data: function (term, page) { // page is the one-based page number tracked by Select2
    //                 return {
    //                     q: term, //search term
    //                     page: page, // page number
    //                 };
    //             },
    //             results: function (data, page) {
    //                 var more = (page * 20) < data.total; // whether or not there are more results available

    //                 // notice we return the value of more so Select2 knows if more results can be loaded
    //                 return {results: data.data, more: more};
    //             }
    //         },
    //         formatResult: function(data){
    //             var kode_icdx = (data.kode_icdx !== null)?(data.kode_icdx+' | '):'';

    //             var markup = '<b>' + kode_icdx + '</b>' + data.nama + '<br/>';
    //             return markup;
    //         }, 
    //         formatSelection: function(data){
    //             return data.kode_icdx_rinci +' | '+ data.nama;
    //         }
    //     })
    // }

    // function removeDiagnosisPra(i) {
    // 	$('#pra' + i).remove()
    // }

    // function removeDiagnosisPasca(i) {
    // 	$('#pasca' + i).remove()
    // }
    //! end area diagnosa

    //! area tenaga kesehatan
    function tambahDokterBedah() {
        let i = $('.dokter-bedah').length;
        let html = /* html */ `
    		<div id="dinamic1${i}" style="vertical-align:middle !important" class="dinamic1 nadis">
    			<input type="text" name="dokter_bedah[]" id="dokter-bedah${i}" class="dokter-bedah mb-2">
    			<button type="button" class="btn btn-danger btn-xs mb-2" onclick="removeDokterBedah(${i})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
    		</div>
    	`;
        $('#dokter-bedah').append(html)
        $('#dokter-bedah' + i).select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        jenis: '1',
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
                var markup = '<b>' + data.nama + '</b> <br/>' + data.spesialisasi;
                return markup;
            },
            formatSelection: function(data) {
                return data.nama;
            }
        })
    }

    function removeDokterBedah(i) {
        $('#dinamic1' + i).remove()
        var jml = $('.dokter-bedah').length;
        var urut = 0;
        for (j = 0; j <= jml - 1; j++) {
            $('.dinamic1:eq(' + urut + ')').attr('id', 'dinamic1' + j)
            $('.dinamic1:eq(' + urut + ')').children('.dokter-bedah').attr('id', 'dokter-bedah' + j)
            $('.dinamic1:eq(' + urut + ')').children('button').attr('onclick', 'removeDokterBedah(' + j + ')')
            urut++;
        }
    }

    // function tambahDokterPendamping() {
    // 	let i = $('.dokter-pendamping').length;
    // 	let html = /* html */ `
    // 		<div id="dinamic2${i}" style="vertical-align:middle !important" class="dinamic2 nadis">
    // 			<input type="text" name="dokter_pendamping[]" id="dokter-pendamping${i}" class="dokter-pendamping mb-2">
    // 			<button type="button" class="btn btn-danger btn-xs mb-2" onclick="removeDokterPendamping(${i})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
    // 		</div>
    // 	`;
    // 	$('#dokter-pendamping').append(html)
    // 	$('#dokter-pendamping' + i).select2c({
    //         ajax: {
    //             url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
    //             dataType: 'json',
    //             quietMillis: 100,
    //             data: function (term, page) { // page is the one-based page number tracked by Select2
    //                 return {
    //                     q: term, //search term
    //                     jenis: 'medis',
    //                     page: page, // page number
    //                 };
    //             },
    //             results: function (data, page) {
    //                 var more = (page * 20) < data.total; // whether or not there are more results available

    //                 // notice we return the value of more so Select2 knows if more results can be loaded
    //                 return {results: data.data, more: more};
    //             }
    //         },
    //         formatResult: function(data){
    //             var markup = '<b>'+data.nama+'</b> <br/>'+data.spesialisasi;
    //             return markup;
    //         }, 
    //         formatSelection: function(data){
    //             return data.nama;
    //         }
    //     })
    // }

    // function removeDokterPendamping(i) {
    // 	$('#dinamic2' + i).remove()
    //     var jml = $('.dokter-pendamping').length;
    //     var urut = 0;
    //     for (j = 0; j <= jml - 1; j++) {
    //         $('.dinamic2:eq('+urut+')').attr('id', 'dinamic2' + j)
    //         $('.dinamic2:eq('+urut+')').children('.dokter-pendamping').attr('id', 'dokter-pendamping' + j) 
    //         $('.dinamic2:eq('+urut+')').children('button').attr('onclick', 'removeDokterPendamping(' + j + ')')
    //         urut++;
    //     }
    // }


    function tambahAsistenOperator() {
        let i = $('.asisten-operator').length;
        let html = /* html */ `
			<div id="dinamic2${i}" style="vertical-align:middle !important" class="dinamic2 nadis">
				<input type="text" name="asisten_operator[]" id="asisten-operator${i}" class="asisten-operator mb-2">
				<button type="button" class="btn btn-danger btn-xs mb-2" onclick="removeAsistenOperator(${i})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
			</div>
		`;
        $('#asisten-operator').append(html)
        $('#asisten-operator' + i).select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        jenis: 'medis',
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
                var markup = '<b>' + data.nama + '</b> <br/>' + data.spesialisasi;
                return markup;
            },
            formatSelection: function(data) {
                return data.nama;
            }
        })
    }

    function removeAsistenOperator(i) {
        $('#dinamic2' + i).remove()
        var jml = $('.asisten-operator').length;
        var urut = 0;
        for (j = 0; j <= jml - 1; j++) {
            $('.dinamic2:eq(' + urut + ')').attr('id', 'dinamic2' + j)
            $('.dinamic2:eq(' + urut + ')').children('.asisten-operator').attr('id', 'asisten-operator' + j)
            $('.dinamic2:eq(' + urut + ')').children('button').attr('onclick', 'removeAsistenOperator(' + j + ')')
            urut++;
        }
    }

    function tambahInstrumental() {
        let i = $('.instrumental').length;
        let html = /* html */ `
			<div id="dinamic5${i}" style="vertical-align:middle !important" class="dinamic5 nadis">
				<input type="text" name="instrumental[]" id="instrumental${i}" class="instrumental mb-2">
				<button type="button" class="btn btn-danger btn-xs mb-2" onclick="removeInstrumental(${i})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
			</div>
		`;
        $('#instrumental').append(html)
        $('#instrumental' + i).select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        jenis: 'medis',
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
                var markup = '<b>' + data.nama + '</b> <br/>' + data.spesialisasi;
                return markup;
            },
            formatSelection: function(data) {
                return data.nama;
            }
        })
    }

    function removeInstrumental(i) {
        $('#dinamic5' + i).remove()
        var jml = $('.instrumental').length;
        var urut = 0;
        for (j = 0; j <= jml - 1; j++) {
            $('.dinamic5:eq(' + urut + ')').attr('id', 'dinamic5' + j)
            $('.dinamic5:eq(' + urut + ')').children('.instrumental').attr('id', 'instrumental' + j)
            $('.dinamic5:eq(' + urut + ')').children('button').attr('onclick', 'removeInstrumental(' + j + ')')
            urut++;
        }
    }

    function tambahSirkuler() {
        let i = $('.sirkuler').length;
        let html = /* html */ `
			<div id="dinamic6${i}" style="vertical-align:middle !important" class="dinamic6 nadis">
				<input type="text" name="sirkuler[]" id="sirkuler${i}" class="sirkuler mb-2">
				<button type="button" class="btn btn-danger btn-xs mb-2" onclick="removeSirkuler(${i})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
			</div>
		`;
        $('#sirkuler').append(html)
        $('#sirkuler' + i).select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        jenis: 'medis',
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
                var markup = '<b>' + data.nama + '</b> <br/>' + data.spesialisasi;
                return markup;
            },
            formatSelection: function(data) {
                return data.nama;
            }
        })
    }

    function removeSirkuler(i) {
        $('#dinamic6' + i).remove()
        var jml = $('.sirkuler').length;
        var urut = 0;
        for (j = 0; j <= jml - 1; j++) {
            $('.dinamic6:eq(' + urut + ')').attr('id', 'dinamic6' + j)
            $('.dinamic6:eq(' + urut + ')').children('.sirkuler').attr('id', 'sirkuler' + j)
            $('.dinamic6:eq(' + urut + ')').children('button').attr('onclick', 'removeSirkuler(' + j + ')')
            urut++;
        }
    }

    function tambahDokterAnesthesi() {
        let i = $('.dokter-anesthesi').length;
        let html = /* html */ `
			<div id="dinamic3${i}" style="vertical-align:middle !important" class="dinamic3 nadis">
				<input type="text" name="dokter_anesthesi[]" id="dokter-anesthesi${i}" class="dokter-anesthesi mb-2">
				<button type="button" class="btn btn-danger btn-xs mb-2" onclick="removeDokterAnesthesi(${i})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
			</div>
		`;
        $('#dokter-anesthesi').append(html)
        $('#dokter-anesthesi' + i).select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        jenis: '1',
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
                var markup = '<b>' + data.nama + '</b> <br/>' + data.spesialisasi;
                return markup;
            },
            formatSelection: function(data) {
                return data.nama;
            }
        })
    }

    function removeDokterAnesthesi(i) {
        $('#dinamic3' + i).remove()
        var jml = $('.dokter-anesthesi').length;
        var urut = 0;
        for (j = 0; j <= jml - 1; j++) {
            $('.dinamic3:eq(' + urut + ')').attr('id', 'dinamic3' + j)
            $('.dinamic3:eq(' + urut + ')').children('.dokter-anesthesi').attr('id', 'dokter-anesthesi' + j)
            $('.dinamic3:eq(' + urut + ')').children('button').attr('onclick', 'removeDokterAnesthesi(' + j + ')')
            urut++;
        }
    }

    function tambahPerawat() {
        let i = $('.perawat').length;
        let html = /* html */ `
			<div id="dinamic4${i}" style="vertical-align:middle !important" class="dinamic4 nadis">
				<input type="text" name="perawat[]" id="perawat${i}" class="perawat mb-2">
				<button type="button" class="btn btn-danger btn-xs mb-2" onclick="removePerawat(${i})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
			</div>
		`;
        $('#perawat').append(html)
        $('#perawat' + i).select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        jenis: '18',
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
                var markup = '<b>' + data.nama + '</b> <br/>' + data.spesialisasi;
                return markup;
            },
            formatSelection: function(data) {
                return data.nama;
            }
        })
    }

    function removePerawat(i) {
        $('#dinamic4' + i).remove()
        var jml = $('.perawat').length;
        var urut = 0;
        for (j = 0; j <= jml - 1; j++) {
            $('.dinamic4:eq(' + urut + ')').attr('id', 'dinamic4' + j)
            $('.dinamic4:eq(' + urut + ')').children('.perawat').attr('id', 'perawat' + j)
            $('.dinamic4:eq(' + urut + ')').children('button').attr('onclick', 'removePerawat(' + j + ')')
            urut++;
        }
    }
    //! end area tenaga kesehatan

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
        let operator = $('#s2id_operator-auto a .select2c-chosen').html()
        let id_operator = $('#operator-auto').val()
        let tindakan = $('#s2id_tindakan-auto a .select2c-chosen').html()
        let id_tindakan = $('#tindakan-auto').val()
        let tarif = $('#tarif-tindakan').val()

        let tindakan_icd9 = $('#s2id_tindakan-icd9 a .select2c-chosen').html();
        let id_tindakan_icd9 = $('#tindakan-icd9').val();
        if (typeof id_tindakan_icd9 == 'undefined' || id_tindakan_icd9 == 'undefined') {
            tindakan_icd9 = '';
            id_tindakan_icd9 = '';
        }

        html = /* html */ `
            <tr>
                <td class="number-tindakan center">${++number}</td>
                <td></td>
				<td>
					<input type="hidden" name="id_vk[]" value="">
					<input type="hidden" name="id_operator[]" value="${id_operator}">${operator}
				</td>
                <td><input type="hidden" name="id_tindakan[]" value="${id_tindakan}">${tindakan}</td>
                <td><input type="hidden" name="id_tindakan_icd9[]" value="${id_tindakan_icd9}">${tindakan_icd9}</td>
                <td class="right">${numberToCurrency(tarif)}</span></td>
                <td></td>
                <td class="right">
                    <button type="button" class="btn btn-secondary btn-xxs" onclick="removeThis(this)"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
        `;
        $('#table-tindakan tbody').append(html)
        $('#tindakan-auto, #tindakan-icd9, #tarif-tindakan').val('')
        $('#s2id_tindakan-auto a .select2c-chosen').html('')
        $('#s2id_tindakan-icd9 a .select2c-chosen').html('')
    }

    function removeThis(el) {
        var parent = el.parentNode.parentNode;
        parent.parentNode.removeChild(parent);
    }

    function hapusTindakan(obj, id) {
        bootbox.dialog({
            message: "Anda yakin akan menghapus data ini?",
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
                            type: 'DELETE',
                            url: '<?= base_url('order_vk/api/order_vk/hapus_detail_tindakan_vk') ?>/' +
                                id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                if (data.status) {
                                    messageCustom(data.message, 'Success');
                                    removeThis(obj);
                                } else {
                                    customAlert('Hapus Tindakan VK', data.message);
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

    function addBHP() {
        let id_barang = $('#barang-bhp').val()
        let nama_barang = $('#s2id_barang-bhp a .select2c-chosen').html()
        let jumlah_barang = $('#jumlah-bhp').val()
        let id_kemasan_barang = $('#kemasan-bhp').val()
        if (id_barang === '') {
            syams_validation('#barang-bhp', 'Pilih barang terlebih dahulu!')
            return false;
        }
        if (id_kemasan_barang === '') {
            syams_validation('#kemasan-bhp', 'Pilih kemasan terlebih dahulu!')
            return false;
        }
        addNewsRowsBHP(id_barang, nama_barang, jumlah_barang, id_kemasan_barang)
        $('#barang-bhp, #jumlah-bhp').val('')
        $('#s2id_barang-bhp a .select2c-chosen').html('Pilih Barang BHP')
        $('#kemasan-bhp').html('<option value=""></option>')
    }

    function addNewsRowsBHP(id_barang, nama_barang, jumlah_barang, id_kemasan_barang) {
        if (id_kemasan_barang === null) {
            swalAlert('warning', 'Validasi', 'Kemasan Barang tidak boleh kosong!')
            return false;
        }
        let i = $('.rows').length + 1;
        let kemasan_barang = $('#kemasan-bhp option:selected').text()
        let html = /* html */ `
			<tr class="rows">
				<td class="center">${i}</td>
				<td>${nama_barang}<input type="hidden" name="id_barang[]" value="${id_barang}" class="id-barang" id="id-barang${i}"></td>
				<td><span id="nama-kemasan${i}">${kemasan_barang}</span><input type="hidden" name="kemasan[]" value="" class="kemasan" id="kemasan${i}"></td>
				<td><input type="text" name="jumlah[]" id="jumlah${i}" class="jumlah custom-form center" value="${jumlah_barang}"></td>
				<td><span id="sisa${i}"></span><input type="hidden" name="hna[]" id="hna${i}" class="hna"></td><input type="hidden" name="hja[]" id="hja${i}" class="hja"></td>
				<td class="right" id="hargajual${i}"></td>
				<td class="right"><span id="diskonrp${i}"></span><input type="hidden" name="diskon_rp[]" id="diskon-rp${i}" class="diskon-rp"></td>
				<td class="right" id="subtotal${i}"></td>
				<td class="center"><button type="button" class="btn btn-danger btn-xs" onclick="removeThisBHP(this)"><i class="fas fa-trash-alt"></i></button></td>
			</tr>
		`;

        $('#table-bhp tbody').append(html)
        $('#jumlah' + i).keyup(function() {
            let hargajual = money_format_save($('#hargajual' + i).html())
            let jumlah = parseFloat($('#jumlah' + i).val())
            let diskon = money_format_save($('#diskonrp' + i).html())
            let subtotal = (parseFloat(hargajual) - parseFloat(diskon)) * jumlah;
            $('#subtotal' + i).html(money_format(subtotal))
            hitungEstimasi()
        })
        $('#diskonrp' + i).html(0)
        syams_validation_remove('.select2c-input')
        syams_validation_remove('.custom-form')
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_detail_harga_barang_penjualan") ?>',
            data: 'id=' + id_barang + '&id_kemasan=' + id_kemasan_barang,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                if (data !== null) {
                    let subtotal = Math.ceil(data.harga_jual_nr) * jumlah_barang;
                    let is_amhp = $('#is-amhp').is(':checked')

                    $('#hna' + i).val(money_format_save(money_format(data.hna)))
                    $('#hja' + i).val(money_format_save(money_format(data.harga_jual_nr)))
                    $('#hargajual' + i).html(money_format(data.harga_jual_nr))
                    $('#subtotal' + i).html(money_format(subtotal))

                    $('#kemasan' + i).val(data.id_packing)
                    $('#nama-kemasan' + i).html(data.nama_kemasan)
                    $('#sisa' + i).html(data.sisa + ' ' + data.kemasan_kecil)
                    hitungEstimasi()
                }
            },
            error: function(e) {
                accessFailed(e.status)
            }
        })
    }

    function hitungEstimasi() {
        var jml_baris = $('.rows').length;
        var estimasi = 0;
        for (i = 1; i <= jml_baris; i++) {
            var subtotal = money_format_save($('#subtotal' + i).html());
            estimasi = estimasi + parseFloat(subtotal);
        }
        var disc_pr = $('#diskon-pr').val();
        var disc_rp = $('#diskon-rp').val();
        var diskon = 0;

        if (disc_pr !== '0' && disc_pr !== '' && disc_pr <= 100) {
            diskon = estimasi * (disc_pr / 100);
        }
        if (disc_rp !== '0' && disc_rp !== '' && disc_rp <= estimasi) {
            diskon = money_format_save(disc_rp);
        }
        if (disc_pr > 100) {
            syams_validation('#diskon-pr', 'Diskon tidak boleh melebihi 100 %');
        }
        if (disc_rp > estimasi) {
            syams_validation('#diskon-rp', 'Diskon tidak boleh melebihi ' + money_format(estimasi));
        }
        var total = estimasi - diskon;

        $('#total').val(estimasi);
        $('#estimasi').html(money_format(total));
    }

    function removeThisBHP(el, id_detail, id_vk) {
        swal.fire({
            title: 'Konfirmasi Hapus',
            html: "Anda yakin ingin menghapus data ini?",
            icon: 'question',
            showCancelButton: true,
            buttonsStyling: true,
            confirmButtonText: '<i class="fas fa-fw fa-check-circle mr-1"></i>Ya',
            cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                if (id_detail !== undefined) {
                    $.ajax({
                        type: 'DELETE',
                        url: '<?= base_url('order_vk/api/order_vk/hapus_detail_bhp_vk') ?>',
                        data: 'id_detail=' + id_detail + '&id_vk=' + id_vk,
                        dataType: 'JSON',
                        beforeSend: function() {
                            showLoader()
                        },
                        success: function(data) {
                            if (data.status) {
                                messageDeleteSuccess()
                                var parent = el.parentNode.parentNode;
                                parent.parentNode.removeChild(parent);
                                var jml = $('.rows').length;
                                var col = 0;

                                for (i = 1; i <= jml; i++) {
                                    $('.rows:eq(' + col + ')').children('td:eq(0)').html(i);
                                    $('.rows:eq(' + col + ')').children('td:eq(1)').children(
                                        '.id-barang').attr('id', 'id-barang' + i);
                                    $('.rows:eq(' + col + ')').children('td:eq(2)').children('.kemasan')
                                        .attr('id', 'kemasan' + i);
                                    $('.rows:eq(' + col + ')').children('td:eq(3)').children('.jumlah')
                                        .attr('id', 'jumlah' + i);
                                    $('.rows:eq(' + col + ')').children('td:eq(4)').children('span')
                                        .attr('id', 'sisa' + i);
                                    $('.rows:eq(' + col + ')').children('td:eq(4)').children('.hna')
                                        .attr('id', 'hna' + i);
                                    $('.rows:eq(' + col + ')').children('td:eq(4)').children('.hja')
                                        .attr('id', 'hja' + i);
                                    $('.rows:eq(' + col + ')').children('td:eq(5)').attr('id',
                                        'hargajual' + i);
                                    $('.rows:eq(' + col + ')').children('td:eq(6)').children('span')
                                        .attr('id', 'diskonrp' + i);
                                    $('.rows:eq(' + col + ')').children('td:eq(6)').children(
                                        '.diskon-rp').attr('id', 'diskon-rp' + i);
                                    $('.rows:eq(' + col + ')').children('td:eq(7)').attr('id',
                                        'subtotal' + i);
                                    col++;
                                }
                                hitungEstimasi()
                            } else {
                                swalAlert('info', 'Hapus BHP VK', '<h5 style="display:inline-block">' +
                                    data.message + '</h5>')
                            }
                        },
                        complete: function() {
                            hideLoader()
                        },
                        error: function(e) {
                            messageDeleteFailed()
                        }
                    })
                } else {
                    var parent = el.parentNode.parentNode;
                    parent.parentNode.removeChild(parent);
                    var jml = $('.rows').length;
                    var col = 0;

                    for (i = 1; i <= jml; i++) {
                        $('.rows:eq(' + col + ')').children('td:eq(0)').html(i);
                        $('.rows:eq(' + col + ')').children('td:eq(1)').children('.id-barang').attr('id',
                            'id-barang' + i);
                        $('.rows:eq(' + col + ')').children('td:eq(2)').children('.kemasan').attr('id', 'kemasan' +
                            i);
                        $('.rows:eq(' + col + ')').children('td:eq(3)').children('.jumlah').attr('id', 'jumlah' +
                            i);
                        $('.rows:eq(' + col + ')').children('td:eq(4)').children('span').attr('id', 'sisa' + i);
                        $('.rows:eq(' + col + ')').children('td:eq(4)').children('.hna').attr('id', 'hna' + i);
                        $('.rows:eq(' + col + ')').children('td:eq(4)').children('.hja').attr('id', 'hja' + i);
                        $('.rows:eq(' + col + ')').children('td:eq(5)').attr('id', 'hargajual' + i);
                        $('.rows:eq(' + col + ')').children('td:eq(6)').children('span').attr('id', 'diskonrp' + i);
                        $('.rows:eq(' + col + ')').children('td:eq(6)').children('.diskon-rp').attr('id',
                            'diskon-rp' + i);
                        $('.rows:eq(' + col + ')').children('td:eq(7)').attr('id', 'subtotal' + i);
                        col++;
                    }
                    hitungEstimasi()
                }
            }
        })
    }

    function konfirmasiSimpan() {
        swal.fire({
            title: 'Konfirmasi Simpan',
            html: "Anda yakin ingin menyimpan transaksi VK ini?",
            icon: 'question',
            showCancelButton: true,
            buttonsStyling: true,
            confirmButtonText: '<i class="fas fa-fw fa-check-circle mr-1"></i>Ya',
            cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                simpanPelayananVK()
            }
        })
    }

    function simpanPelayananVK() {
        // let jml_nadis = $('.nadis').length;
        // if (jml_nadis === 0) {
        //     swalAlert('warning', 'Validasi', 'Data Tenaga Kesehatan belum dientrikan!')
        //     $('#wizard2').bwizard('show', '2')
        //     return false;
        // }
        let jml_tindakan = $('.number-tindakan').length;
        if (jml_tindakan === 0) {
            swalAlert('warning', 'Validasi', 'Tindakan belum dientrikan!')
            $('#wizard').bwizard('show', '1')
            return false;
        }
        let update = '';
        if ($('#id').val() !== '') {
            update = '/id/' + $('#id').val()
        }

        $.ajax({
            type: 'POST',
            url: '<?php echo base_url("order_vk/api/order_vk/simpan_pelayanan_vk") ?>' + update,
            data: $('#form-pelayanan-vk').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader()
            },
            success: function(data) {
                if (data.status) {
                    messageCustom('Berhasil menyimpan transaksi pelayanan VK', 'Success')
                    getListDataVK($('#page-now').val())
                    $('#modal-pelayanan-vk').modal('hide')
                } else {
                    messageCustom(data.message, 'Error')
                }
            },
            complete: function() {
                hideLoader()
            },
            error: function(e) {
                messageCustom('Terjadi Kesalahan Sistem, Gagal melakukan Transaksi Pelayanan VK', 'Error')
            }
        })
    }

    function getDataPelayananVK(id_vk, data, disabled) {
        $('#wizard').bwizard('show', '0')
        $('#table-bhp tbody').empty()
        pelayananVK(data)
        loadDataPemeriksaanVK(id_vk, disabled)
        loadDataBHPVK(id_vk)
    }

    function loadDataPemeriksaanVK(id_vk, disabled) {
        $('#table-tindakan tbody').empty()
        $('#dokter-bedah-hide').empty()
		$('#asisten-operator-hide').empty()
		$('#instrumental-hide').empty()
		$('#sirkuler-hide').empty()
		$('#dokter-pendamping-hide').empty()
		$('#dokter-anesthesi-hide').empty()
		$('#perawat-hide').empty()
        $.ajax({
            type: 'GET',
            url: '<?= base_url("order_vk/api/order_vk/get_tindakan_tambahan_vk") ?>',
            data: 'id=' + id_vk,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader()
            },
            success: function(data) {
                $.each(data, function(i, v) {
                    let html = /* html */ `
                        <tr>
                            <td class="number-tindakan center">${++i}</td>
                            <td>
                                ${v.waktu_tindakan}
                            </td>
                            <td>
                                <input type="hidden" name="id_vk[]" value="${v.id_nadis}">
                                <input type="hidden" name="id_operator[]" value="${v.id_operasi}">
                                <input type="hidden" name="id_operator_before[]" value="${v.nadis}">
                                ${v.nadis}
                            </td>
                            <td>
                                <input type="hidden" name="id_tindakan[]" value="${v.id_tarif}">
                                <input type="hidden" name="id_tindakan_before[]" value="${v.nama_tarif}">
                                ${v.nama_tarif}
                            </td>
                            <td>
                                <input type="hidden" name="id_tindakan_icd9[]" value="${v.id_icd9}">
                                ${(v.icd9 !== null ? v.icd9 : '')}
                            </td>
                            <td class="right">${numberToCurrency(v.total)}</td>
                            <td>
                                ${(v.users !== null ? v.users : '')}
                            </td>
                            <td class="right">
                            <button type="button" class="btn btn-secondary btn-xs" onclick="hapusTindakan(this, ${v.id_vk} )"> <i class="fas fa-trash-alt"></i> </button>
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
        $.ajax({
            type: 'GET',
            url: '<?= base_url("order_vk/api/order_vk/get_diagnosis_vk") ?>',
            data: 'id=' + id_vk,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader()
            },
            success: function(data) {
                let no = 0;
                let noo = 0;
                $.each(data, function(i, v) {
                    if (v.id_golongan_sebab_sakit_pra !== null) {
                        let html = /* html */ `
                            <div id="pra${no}" style="vertical-align:middle !important">
                                <input type="text" name="diagpra[]" id="diagnosa-pra${no}" class="diagnosa-pra mb-2" value="${v.id_golongan_sebab_sakit_pra}">
                                <button type="button" class="btn btn-danger btn-xs mb-2" onclick="removeDiagnosisPra(${no})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
                            </div>
                        `;
                        $('#diagnosa-pra').append(html)
                        $('#diagnosa-pra' + i).select2c({
                            ajax: {
                                url: "<?= base_url('masterdata/api/masterdata_auto/golongan_sebab_sakit_auto') ?>",
                                dataType: 'json',
                                quietMillis: 100,
                                data: function(term,
                                    page) { // page is the one-based page number tracked by Select2
                                    return {
                                        q: term, //search term
                                        page: page, // page number
                                    };
                                },
                                results: function(data, page) {
                                    var more = (page * 20) < data
                                        .total; // whether or not there are more results available

                                    // notice we return the value of more so Select2 knows if more results can be loaded
                                    return {
                                        results: data.data,
                                        more: more
                                    };
                                }
                            },
                            formatResult: function(data) {
                                var kode_icdx = (data.kode_icdx !== null) ? (data
                                    .kode_icdx + ' | ') : '';

                                var markup = '<b>' + kode_icdx + '</b>' + data.nama +
                                    '<br/>';
                                return markup;
                            },
                            formatSelection: function(data) {
                                return data.kode_icdx_rinci + ' | ' + data.nama;
                            }
                        })
                        $('#s2id_diagnosa-pra' + no + ' a .select2c-chosen').html(v.diagnosis)
                        no++;
                    }
                    if (v.id_golongan_sebab_sakit_pasca !== null) {
                        let html = /* html */ `
                            <div id="pasca${noo}" style="vertical-align:middle !important">
                                <input type="text" name="diagpasca[]" id="diagnosa-pasca${noo}" class="diagnosa-pasca mb-2" value="${v.id_golongan_sebab_sakit_pasca}">
                                <button type="button" class="btn btn-danger btn-xs mb-2" onclick="removeDiagnosisPra(${noo})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
                            </div>
                        `;
                        $('#diagnosa-pasca').append(html)
                        $('#diagnosa-pasca' + noo).select2c({
                            ajax: {
                                url: "<?= base_url('masterdata/api/masterdata_auto/golongan_sebab_sakit_auto') ?>",
                                dataType: 'json',
                                quietMillis: 100,
                                data: function(term,
                                    page) { // page is the one-based page number tracked by Select2
                                    return {
                                        q: term, //search term
                                        page: page, // page number
                                    };
                                },
                                results: function(data, page) {
                                    var more = (page * 20) < data
                                        .total; // whether or not there are more results available

                                    // notice we return the value of more so Select2 knows if more results can be loaded
                                    return {
                                        results: data.data,
                                        more: more
                                    };
                                }
                            },
                            formatResult: function(data) {
                                var kode_icdx = (data.kode_icdx !== null) ? (data
                                    .kode_icdx + ' | ') : '';

                                var markup = '<b>' + kode_icdx + '</b>' + data.nama +
                                    '<br/>';
                                return markup;
                            },
                            formatSelection: function(data) {
                                return data.kode_icdx_rinci + ' | ' + data.nama;
                            }
                        })
                        $('#s2id_diagnosa-pasca' + noo + ' a .select2c-chosen').html(v.diagnosis)
                        noo++;
                    }
                })
            },
            complete: function() {
                hideLoader()
            }
        })
        $.ajax({
            type: 'GET',
            url: '<?= base_url("order_vk/api/order_vk/get_tim_vk") ?>',
            data: 'id=' + id_vk,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader()
            },
            success: function(data) {
                let a = 0;
                let b = 0;
                let c = 0;
                let d = 0;
                $.each(data, function(i, v) {
                    if (v.status === 'Dokter Operator') {
                        let html = /* html */ `
                            <div id="dinamic1${a}" style="vertical-align:middle !important" class="dinamic1 nadis">
                                <input type="text" name="dokter_bedah[]" id="dokter-bedah${a}" class="dokter-bedah mb-2" value="${v.id_nadis}">
                                <button type="button" class="btn btn-danger btn-xs mb-2" onclick="removeDokterBedah(${a})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
                            </div>
                        `;
                        $('#dokter-bedah').append(html)
                        let html_hide = /* html */ `
                            <input type="text" name="dokter_bedah_before[]" id="dokter-bedah-before${a}" class="dokter-bedah mb-2" value="${v.nadis}">
                        `;
                        $('#dokter-bedah-hide').append(html_hide)
                        $('#dokter-bedah' + a).select2c({
                            ajax: {
                                url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                                dataType: 'json',
                                quietMillis: 100,
                                data: function(term,
                                    page) { // page is the one-based page number tracked by Select2
                                    return {
                                        q: term, //search term
                                        jenis: '1',
                                        page: page, // page number
                                    };
                                },
                                results: function(data, page) {
                                    var more = (page * 20) < data
                                        .total; // whether or not there are more results available

                                    // notice we return the value of more so Select2 knows if more results can be loaded
                                    return {
                                        results: data.data,
                                        more: more
                                    };
                                }
                            },
                            formatResult: function(data) {
                                var markup = '<b>' + data.nama + '</b> <br/>' + data
                                    .spesialisasi;
                                return markup;
                            },
                            formatSelection: function(data) {
                                return data.nama;
                            }
                        })
                        $('#s2id_dokter-bedah' + a + ' a .select2c-chosen').html(v.nadis)
                        a++;
                    }
                    if (v.status === 'Dokter Pendamping') {
                        let html = /* html */ `
                            <div id="dinamic2${b}" style="vertical-align:middle !important" class="dinamic2 nadis">
                                <input type="text" name="dokter_pendamping[]" id="dokter-pendamping${b}" class="dokter-pendamping mb-2" value="${v.id_nadis}">
                                <button type="button" class="btn btn-danger btn-xs mb-2" onclick="removeDokterPendamping(${b})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
                            </div>
                        `;
                        $('#dokter-pendamping').append(html)
                        let html_hide = /* html */ `
                            <input type="text" name="dokter_pendamping_before[]" id="dokter-pendamping-before${a}" class="dokter-pendamping mb-2" value="${v.nadis}">
                        `;
                        $('#dokter-pendamping-hide').append(html_hide)
                        $('#dokter-pendamping' + b).select2c({
                            ajax: {
                                url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                                dataType: 'json',
                                quietMillis: 100,
                                data: function(term,
                                    page) { // page is the one-based page number tracked by Select2
                                    return {
                                        q: term, //search term
                                        jenis: 'medis',
                                        page: page, // page number
                                    };
                                },
                                results: function(data, page) {
                                    var more = (page * 20) < data
                                        .total; // whether or not there are more results available

                                    // notice we return the value of more so Select2 knows if more results can be loaded
                                    return {
                                        results: data.data,
                                        more: more
                                    };
                                }
                            },
                            formatResult: function(data) {
                                var markup = '<b>' + data.nama + '</b> <br/>' + data
                                    .spesialisasi;
                                return markup;
                            },
                            formatSelection: function(data) {
                                return data.nama;
                            }
                        })
                        $('#s2id_dokter-pendamping' + b + ' a .select2c-chosen').html(v.nadis)
                        b++;
                    }
                    if (v.status === 'Asisten Operator') {
						let html = /* html */ `
                            <div id="dinamic2${b}" style="vertical-align:middle !important" class="dinamic2 nadis">
                                <input type="text" name="asisten_operator[]" id="asisten-operator${b}" class="asisten-operator mb-2" value="${v.id_nadis}">
                                <button type="button" class="btn btn-danger btn-xs mb-2" onclick="removeAsistenOperator(${b})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
                            </div>
                        `;
						$('#asisten-operator').append(html)
						let html_hide = /* html */ `
                            <input type="text" name="asisten_operator_before[]" id="asisten-operator-before${a}" class="asisten-operator mb-2" value="${v.nadis}">
                        `;
						$('#asisten-operator-hide').append(html_hide)
						$('#asisten-operator' + b).select2c({
							ajax: {
								url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
								dataType: 'json',
								quietMillis: 100,
								data: function(term, page) { // page is the one-based page number tracked by Select2
									return {
										q: term, //search term
										jenis: 'medis',
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
								var markup = '<b>' + data.nama + '</b> <br/>' + data.spesialisasi;
								return markup;
							},
							formatSelection: function(data) {
								return data.nama;
							}
						})
						$('#s2id_asisten-operator' + b + ' a .select2c-chosen').html(v.nadis)
						b++;
					}
					if (v.status === 'Instrumental') {
						let html = /* html */ `
                            <div id="dinamic5${b}" style="vertical-align:middle !important" class="dinamic5 nadis">
                                <input type="text" name="instrumental[]" id="instrumental${b}" class="instrumental mb-2" value="${v.id_nadis}">
                                <button type="button" class="btn btn-danger btn-xs mb-2" onclick="removeInstrumental(${b})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
                            </div>
                        `;
						$('#instrumental').append(html)
						let html_hide = /* html */ `
                            <input type="text" name="instrumental_before[]" id="instrumental-before${a}" class="instrumental mb-2" value="${v.nadis}">
                        `;
						$('#instrumental-hide').append(html_hide)
						$('#instrumental' + b).select2c({
							ajax: {
								url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
								dataType: 'json',
								quietMillis: 100,
								data: function(term, page) { // page is the one-based page number tracked by Select2
									return {
										q: term, //search term
										jenis: 'medis',
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
								var markup = '<b>' + data.nama + '</b> <br/>' + data.spesialisasi;
								return markup;
							},
							formatSelection: function(data) {
								return data.nama;
							}
						})
						$('#s2id_instrumental' + b + ' a .select2c-chosen').html(v.nadis)
						b++;
					}
					if (v.status === 'Sirkuler') {
						let html = /* html */ `
                            <div id="dinamic6${b}" style="vertical-align:middle !important" class="dinamic6 nadis">
                                <input type="text" name="sirkuler[]" id="sirkuler${b}" class="sirkuler mb-2" value="${v.id_nadis}">
                                <button type="button" class="btn btn-danger btn-xs mb-2" onclick="removeSirkuler(${b})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
                            </div>
                        `;
						$('#sirkuler').append(html)
						let html_hide = /* html */ `
                            <input type="text" name="sirkuler_before[]" id="sirkuler-before${a}" class="sirkuler mb-2" value="${v.nadis}">
                        `;
						$('#sirkuler-hide').append(html_hide)
						$('#sirkuler' + b).select2c({
							ajax: {
								url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
								dataType: 'json',
								quietMillis: 100,
								data: function(term, page) { // page is the one-based page number tracked by Select2
									return {
										q: term, //search term
										jenis: 'medis',
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
								var markup = '<b>' + data.nama + '</b> <br/>' + data.spesialisasi;
								return markup;
							},
							formatSelection: function(data) {
								return data.nama;
							}
						})
						$('#s2id_sirkuler' + b + ' a .select2c-chosen').html(v.nadis)
						b++;
					}
                    if (v.status === 'Dokter Anesthesi') {
                        let html = /* html */ `
                            <div id="dinamic3${c}" style="vertical-align:middle !important" class="dinamic3 nadis">
                                <input type="text" name="dokter_anesthesi[]" id="dokter-anesthesi${c}" class="dokter-anesthesi mb-2" value="${v.id_nadis}">
                                <button type="button" class="btn btn-danger btn-xs mb-2" onclick="removeDokterAnesthesi(${c})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
                            </div>
                        `;
                        $('#dokter-anesthesi').append(html)
                        let html_hide = /* html */ `
                            <input type="text" name="dokter_anesthesi_before[]" id="dokter-anesthesi-before${a}" class="dokter-anesthesi mb-2" value="${v.nadis}">
                        `;
                        $('#dokter-anesthesi-hide').append(html_hide)
                        $('#dokter-anesthesi' + c).select2c({
                            ajax: {
                                url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                                dataType: 'json',
                                quietMillis: 100,
                                data: function(term,
                                    page) { // page is the one-based page number tracked by Select2
                                    return {
                                        q: term, //search term
                                        jenis: '1',
                                        page: page, // page number
                                    };
                                },
                                results: function(data, page) {
                                    var more = (page * 20) < data
                                        .total; // whether or not there are more results available

                                    // notice we return the value of more so Select2 knows if more results can be loaded
                                    return {
                                        results: data.data,
                                        more: more
                                    };
                                }
                            },
                            formatResult: function(data) {
                                var markup = '<b>' + data.nama + '</b> <br/>' + data
                                    .spesialisasi;
                                return markup;
                            },
                            formatSelection: function(data) {
                                return data.nama;
                            }
                        })
                        $('#s2id_dokter-anesthesi' + c + ' a .select2c-chosen').html(v.nadis)
                        c++;
                    }
                    if (v.status === 'Perawat Anesthesi') {
                        let html = /* html */ `
                            <div id="dinamic4${d}" style="vertical-align:middle !important" class="dinamic4 nadis">
                                <input type="text" name="perawat[]" id="perawat${d}" class="perawat mb-2" value="${v.id_nadis}">
                                <button type="button" class="btn btn-danger btn-xs mb-2" onclick="removePerawat(${d})"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
                            </div>
                        `;
                        $('#perawat').append(html)
                        let html_hide = /* html */ `
                            <input type="text" name="perawat_before[]" id="perawat-before${a}" class="perawat mb-2" value="${v.nadis}">
                        `;
                        $('#perawat-hide').append(html_hide)
                        $('#perawat' + d).select2c({
                            ajax: {
                                url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                                dataType: 'json',
                                quietMillis: 100,
                                data: function(term,
                                    page) { // page is the one-based page number tracked by Select2
                                    return {
                                        q: term, //search term
                                        jenis: '18',
                                        page: page, // page number
                                    };
                                },
                                results: function(data, page) {
                                    var more = (page * 20) < data
                                        .total; // whether or not there are more results available

                                    // notice we return the value of more so Select2 knows if more results can be loaded
                                    return {
                                        results: data.data,
                                        more: more
                                    };
                                }
                            },
                            formatResult: function(data) {
                                var markup = '<b>' + data.nama + '</b> <br/>' + data
                                    .spesialisasi;
                                return markup;
                            },
                            formatSelection: function(data) {
                                return data.nama;
                            }
                        })
                        $('#s2id_perawat' + d + ' a .select2c-chosen').html(v.nadis)
                        d++;
                    }
                })
            },
            complete: function() {
                hideLoader()
            }
        })

    }

    function loadDataBHPVK(id_vk) {
        $('#table-bhp tbody').empty()
        $.ajax({
            type: 'GET',
            url: '<?= base_url("order_vk/api/order_vk/get_bhp_tambahan_vk") ?>',
            data: 'id=' + id_vk,
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
                    let html = /* html */ `
                        <tr class="rows">
                            <td class="center">${i + 1}</td>
                            <td>${v.nama_barang}</td>
                            <td class="center"><span id="nama-kemasan${no}">${v.kemasan}</span></td>
                            <td class="center">${v.qty}</td>
                            <td><span id="sisa${no}"><i></i></span></td>
                            <td class="right" id="hargajual${no}">${money_format(v.harga_jual)}</td>
                            <td class="right"><span id="diskonrp${no}">${money_format(v.disc_rp)}</span><input type="hidden" name="diskon_rp[]" id="diskon-rp${no}" class="diskon-rp" value="${money_format(v.disc_rp)}"></td>
                            <td class="right" id="subtotal${no}">${money_format(roundToTwo(v.harga_jual - v.disc_rp) * v.qty)}</td>
                            <td class="center"><button type="button" class="btn btn-danger btn-xs" onclick="removeThisBHP(this, ${v.id_detail_penjualan}, ${v.id_operasi})"><i class="fas fa-trash-alt"></i></button></td>
                        </tr>
                    `;
                    $('#table-bhp tbody').append(html)
                    no++;
                })
                hitungEstimasi()
            },
            complete: function() {
                hideLoader()
            }
        })
    }
</script>