<script>
    $(function() {
        getListPemeriksaan(1)

        $('#tanggal-awal, #tanggal-akhir').datepicker({
            format: 'dd/mm/yyyy'
        }).on('changeDate', function() {
            $(this).datepicker('hide')
        })
        $('#btn-search').click(function() {
            $('#modal-search').modal('show')
        })
        $('#btn-reload').click(function() {
            reloadData()
            getListPemeriksaan(1)
        })
        $('#jenis-layanan, #filter').change(function() {
            $('#s2id_tempat-layanan-search a .select2-chosen').html('Pilih Tempat Layanan')
            $('#tempat-layanan-search').val('');
            getListPemeriksaan(1);            
        })
        $('#keyword-search').keyup(function() {
            getListPemeriksaan(1)
        })
        $('.penjamin-group-search').hide()
        
        $('#cara-bayar-search').change(function() {
            jenisPenjamin = $(this).val()
            $('#penjamin-search').val('')
            $('#s2id_penjamin-search a .select2-chosen').html('Pilih Penjamin')
            if ($(this).val() !== 'Tunai') {
                $('.penjamin-group-search').show()
            } else {
                $('.penjamin-group-search').hide()
            }
        })

        $('#penjamin-search').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/penjamin_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) {
                    return {
                        q: term,
                        jenis: jenisPenjamin,
                        page: page,
                    };
                },
                results: function(data, page) {
                    var more = (page * 20) < data.total;
                    return {
                        results: data.data,
                        more: more
                    };
                }
            },
            formatResult: function(data) {
                var markup = data.nama;
                return markup;
            },
            formatSelection: function(data) {
                return data.nama;
            }
        })

        $('#dokter-search').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/dokter_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) {
                    return {
                        q: term,
                        page: page,
                    };
                },
                results: function(data, page) {
                    var more = (page * 20) < data.total;
                    return {
                        results: data.data,
                        more: more
                    };
                }
            },
            formatResult: function(data) {
                var markup = data.nama + '<br/><i>' + data.spesialisasi + '</i>';
                return markup;
            },
            formatSelection: function(data) {
                return data.nama;
            }
        })

        $('#tempat-layanan-search').select2({
            ajax: {
                url: "<?= base_url('status_keluar_pasien/api/status_keluar_pasien/get_tempat_layanan') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) {
                    return {
                        q: $('#jenis-layanan').val(),
                        key: term,
                        page: page,
                    };
                },
                results: function(data, page) {
                    var more = (page * 20) < data.total;
                    return {
                        results: data.data,
                        more: more
                    };
                }
            },
            formatResult: function(data) {
                var markup = data.nama;
                return markup;
            },
            formatSelection: function(data) {
                return data.nama;
            }
        })

    })

    function getListPemeriksaan(page) {        
        page == '' ? page=1 : '' ;
		$('#page-now').val(page);

		$.ajax({
			type: 'GET',
			url: '<?= base_url('status_keluar_pasien/api/status_keluar_pasien/get_list_status_keluar_pasien') ?>/page/' + page + '/filter/' + $('#filter').val() + '/jenis_layanan/' + $('#jenis-layanan').val(),
			data: $('#form-search').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if ((page - 1) & (data.data.length === 0)) {
					getListPemeriksaan(page - 1);
					return false;
				}

				$('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
				$('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
				$('#table_status_keluar_pasien tbody').empty();

				$.each(data.data, function(i, v) {
                    
                    if (v.status_terlayani === 'Belum') {
						status_layanan = '<span class="blinker"><i><i class="fas fa-fw fa-spinner fa-spin m-r-5"></i>Belum</i></span>';
					} else if (v.status_terlayani === 'Batal') {
						status_layanan = '<h5><span class="label label-danger"><i class="fas fa-fw fa-times m-r-5"></i>Batal</span></h5>';
					} else {
						status_layanan = '<h5><span class="label label-success"><i class="fas fa-fw fa-check-circle m-r-5"></i>Selesai</span></h5>';
					}
                    hakakses    = `disabled  title="Anda tidak memiliki akses."`;
                    btnAkses    = "";
                    btnKeluar   = "";
                    btnCco      = `<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="statusKeluarSementara('` + v.id_pendaftaran + `','` + v.id + `', '` + v.tindak_lanjut + `' )"><i class="fas fa-fw fa-times-circle m-r-5"></i>Status Keluar Sementara</a>`;
                    btnCcoIt    = `<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="statusKeluarSementaraIt('` + v.id_pendaftaran + `','` + v.id + `', '` + v.tindak_lanjut + `' )"><i class="fas fa-fw fa-times-circle m-r-5"></i>Status Keluar Sementara Billing</a>`;
                    btnBatalCco = `<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="pembatalanStatusKeluarSementara('` + v.id_pendaftaran + `','` + v.id + `', '` + v.tindak_lanjut + `' )"><i class="fas fa-fw fa-times-circle m-r-5"></i>Pembatalan Status Keluar Sementara</a>`;
                    
                    if (v.search_jenis_layanan == 'rawat_jalan'){
                        layanan = v.nama_layanan;
                    } else if (v.search_jenis_layanan == 'penunjang'){
                        layanan = v.jenis_layanan;
                    }                     

                    if (v.search_jenis_layanan == 'rawat_jalan'){ 
                        btnKeluar   = `<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="formTindakLanjut('` + v.id_pendaftaran + `', '` + v.id + `', 0, '` + v.id_dokter + `', '` + v.dokter + `', '` + layanan + `', '', '` + v.id_penjamin + `')"><i class="fas fa-fw fa-arrow-circle-right m-r-5"></i>Status Keluar</a>`;
                    } else if (v.search_jenis_layanan == 'rawat_inap'){ 
                        btnKeluar   = `<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="formTindakLanjut('` + v.id_pendaftaran + `', '` + v.id + `', 0, '` + v.id_dokter + `', '` + v.dokter + `')"><i class="fas fa-fw fa-arrow-circle-right m-r-5"></i>Status Keluar</a>`;
                    } else if (v.search_jenis_layanan == 'penunjang'){ 
                        btnKeluar   = `<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="formTindakLanjut('` + v.id_pendaftaran + `', '` + v.id + `', 0, '` + v.id_dokter + `', '` + v.dokter + `', '` + layanan + `')"><i class="fas fa-fw fa-arrow-circle-right m-r-5"></i>Status Keluar</a>`;
                    }
                    
                    let accountGroup = "<?= $this->session->userdata('account_group') ?>"        

                    if (v.search_filter == 'belum'){ // Belum Keluar
                        if((accountGroup =='Admin') || (accountGroup =='Admin Rekam Medis') || (accountGroup =='Rekam Medis') || (accountGroup =='Pendaftaran') || (accountGroup =='Pendaftaran IGD')){
                            btnAkses = btnKeluar;
                            hakakses = "";
                        }
                    } else if (v.search_filter == 'sudah'){
                        if(accountGroup =='Admin' || (accountGroup =='Admin Rekam Medis') || (accountGroup =='Rekam Medis')){
                            btnAkses = btnCco + btnCcoIt;
                            hakakses = "";
                        } else if (accountGroup =='Kasir'){
                            btnAkses = btnCcoIt;
                            hakakses = "";
                        }
                    } else if (v.search_filter == 'cco'){
                        if ((accountGroup =='Admin') || (accountGroup =='Dokter Umum') || (accountGroup =='Dokter Spesialis')){
                            btnAkses = btnBatalCco
                            hakakses = "";
                        }
                    }

					let html = /* html */ `
						<tr>
							<td class="center">${((i+1) + ((data.page - 1) * data.limit))}</td>
							<td class="center">${v.no_register}</td>
							<td class="center">${((v.tanggal_daftar !== null) ? datetimefmysql(v.tanggal_daftar) : '-')}</td>
							<td class="center">${((v.tanggal_keluar !== null) ? datetimefmysql(v.tanggal_keluar) : '-')}</td>
							<td class="center">${((v.tanggal_layanan !== null) ? datetimefmysql(v.tanggal_layanan) : '-')}</td>
							<td class="center">${v.id_pasien}</td>
							<td class="left">  ${v.nama}</td>
							<td class="center">${v.jenis_layanan} ${((v.jenis_layanan !== v.nama_layanan) ? ((v.nama_layanan !== null) ? v.nama_layanan : '') : '')}</td>
							<td class="left">  ${((v.dokter !== null) ? v.dokter : '')}</td>
                            <td class="center">${v.cara_bayar + (v.cara_bayar === 'Asuransi' ? ' ( ' + v.penjamin + ' )' : '')}</td>
							<td class="center">${status_layanan}</td>
							<td class="center">${((v.tindak_lanjut !== null) ? ((v.tindak_lanjut !== 'cco sementara it') ? v.tindak_lanjut : 'cco sementara billing') : '-')}</td>	
                            <td align="right" style="display:flex;justify-content:flex-end">
                                <div class="btn-group"><button type="button" `+hakakses+` class="btn waves-effect waves-light btn-secondary btn-xs dropdown-toggle" data-toggle="dropdown"><i class="fas fa-fw fa-cog"></i></button>
                                    <div class="dropdown-menu">
                                        `+btnAkses+`
                                    </div>
                                </div>
                            </td>
						</tr>
					`;						
					$('#table_status_keluar_pasien tbody').append(html);
				})
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status)
			}
		})       
	}

    function paging(page) {
		getListPemeriksaan(page)
	}
</script>