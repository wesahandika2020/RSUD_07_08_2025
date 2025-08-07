<script>
	$(function() {
		getListDataOrderLaboratorium(1);


		$('#jenis-laboratorium').change(function() {
			getListDataOrderLaboratorium(1);
		});

		$('#btn-reload').click(function() {
			resetAllData();
			getListDataOrderLaboratorium(1);
		});

		$('#btn-search').click(function() {
			$('#dokter-ranap').val('');
			$('#s2id_dokter-ranap a .select2-chosen').html('Pilih Dokter');
			$('#modal-search').modal('show');
		});

		if (JENIS_RAWAT='Laboratorium') {
            JENIS_RAWAT='Rawat Jalan';
            KELAS_TINDAKAN = '';
        }

		$('#tanggal-awal, #tanggal-akhir').datepicker({
			format: 'dd/mm/yyyy'
		}).on('changeDate', function() {
			$(this).datepicker('hide');
		});

		$('#dokter-pjwb-auto').select2c({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/dokter_auto') ?>",
				dataType: 'JSON',
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
				var markup = '<b>' + data.nama + '</b> <br/>' + data.spesialisasi;
				return markup;
			},
			formatSelection: function(data) {
				return data.nama;
			}
		});

		$('#dokter-pjwb').select2c({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/dokter_auto') ?>",
				dataType: 'JSON',
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
				var markup = '<b>' + data.nama + '</b> <br/>' + data.spesialisasi;
				return markup;
			},
			formatSelection: function(data) {
				return data.nama;
			}
		});

		$('#dokter-ranap').select2({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/dokter_auto') ?>",
				dataType: 'JSON',
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
				var markup = '<b>' + data.nama + '</b> <br/>' + data.spesialisasi;
				return markup;
			},
			formatSelection: function(data) {
				return data.nama;
			}
		});

		$('#instansi-auto').select2c({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/instansi_auto') ?>",
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
				var markup = data.nama + '<br/><i>' + data.alamat + '</i>';
				return markup;
			},
			formatSelection: function(data) {
				return data.nama;
			}
		});

		$('#dokter-penanggung-jawab').select2({
			ajax: {
				url: "<?= base_url('masterdata/api/masterdata_auto/dokter_auto') ?>",
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
				var markup = data.nama + '<br/><i>' + data.spesialisasi + '</i>';
				return markup;
			},
			formatSelection: function(data) {
				return data.nama;
			}
		});

		$('#analis-laboratorium').select2c({
			ajax: {
				url: "<?= base_url('order_laboratorium/api/order_laboratorium/nadis_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				allowClear: true,
				data: function(term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						page: page, // page number
						jenis: 12,
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
				var markup = '<b>' + data.nama + '</b><br/><i>' + data.spesialisasi + '</i>';
				return markup;
			},
			formatSelection: function(data) {
				return data.nama;
			}
		});

		$('#dokter_rujuk').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/dokter_auto') ?>",
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
                var markup = '<b>' + data.nama + '</b><br/><i>' + data.spesialisasi + '</i>';
                return markup;
            },
            formatSelection: function(data){
                return data.nama;
            }
        });
	});

	$(document).ready(function () {
        // Inisialisasi dengan nilai default 'Patologi Klinik'
        const defaultJenisLab = '292'; // ID dari 'Patologi Klinik'

        // Set dropdown ke nilai default
        $('#jenis_lab').val(defaultJenisLab).trigger('change');

        // Fungsi untuk memperbarui tindakan berdasarkan jenis_lab
        updateTindakanLab();

        // Ketika jenis_lab berubah
        $('#jenis_lab').on('change', function () {
            updateTindakanLab();
        });
    });

    function updateTindakanLab() {
        const selectedJenisLab = $('#jenis_lab').val(); // Ambil nilai terpilih

        $('#tindakan-order-laboratorium').select2({
        ajax: {
            url: "<?= base_url('pelayanan/api/pelayanan/tarif_pelayanan') ?>",
            dataType: 'json',
            quietMillis: 100,
            data: function(term, page) { // page is the one-based page number tracked by Select2
                return {
                        q: term, //search term
                        kelas: KELAS_TINDAKAN,
                        jenis_tindakan: JENIS_RAWAT,
                        jenis_pemeriksaan: 'Pelayanan Laboratorium', // Tetap gunakan 'Pelayanan Laboratorium'
                        jenis_lab: selectedJenisLab, // Filter berdasarkan jenis_lab
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
                var total = data.total;
                var kelas = (data.kelas !== null)?((', kelas ')+data.kelas):((data.id !== '')?'Semua Kelas':'');
                var jenis = (data.jenis !== null)?('<br/>'+data.jenis+'<br/>'):'<br/>';
                
                var markup = '<b>'+data.layanan+'</b>'+jenis+data.bobot+kelas+'<br/>'+numberToCurrency(total);
                return markup;
            },
        formatSelection: function(data) {
            $('#tarif-tindakan-lab').val(data.total);
            var kelas = (data.kelas !== null) ? (', kelas ') + data.kelas : '';
            var result = data.layanan + ', ' + data.jenis + ', ' + data.bobot + kelas + ' ' + data.keterangan;

            if (data.id !== '') {
                show_daftar_laboratorium(data.id_layanan);
            } else {
                result = '';
            }
            return result;
            },
        });
    }

	
	function show_daftar_laboratorium(id_layanan){
        $.ajax({
            type : 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_item_laboratorium") ?>/id_layanan/'+id_layanan,
            cache: false,
            dataType : 'json',
            success: function(data) {
                if (data.status) {
                    if (data.data.length > 0) {
                        $('#table_item_lab tbody').empty(); var checked = '';
                        if (data.data.length === 1) {
                            checked = 'checked';
                        }; 
                        $.each(data.data,function(i, v){

                            var highlight = 'odd';
                            if ((i % 2) == 1) {
                                highlight = 'even';
                            };

                            str = '<tr class="'+highlight+'">'+
                                    '<td align="center"><b>'+(i+1)+'</b></td>'+
                                    '<td align="center">'+v.item+'</td>'+
                                    '<td align="right" class="aksi">'+
                                        '<input type="checkbox" '+checked+' name="itemdata" value="'+ v.id+'|'+v.item +'" class="check_item_lab" />';
                                    '</td>'+
                                '</tr>;'
                            $('#table_item_lab tbody').append(str);

                        });
                        if (checked === 'checked') {
                            simpan_daftar_lab();
                        }else{
                            $('#item_lab_modal').modal('show');    
                        }
                    }else{
                        messageCustom(data.message, 'Info');
                    }
                }else{
                    messageCustom(data.message, 'Info');
                }
            },
            error: function(e){
                accessFailed(e.status);
            }
        });
    }

    function simpan_daftar_lab(){
        var formitemlab = $('#formitemlab').serializeArray();
        var str = '[';
        var str_label = '';
        var buf = null;
        if (formitemlab.length > 0) {
            $.each(formitemlab, function(i, v){
                buf = v.value.split('|');
                str += buf[0];
                str_label += buf[1];
                if (i < (formitemlab.length - 1)) {
                    str += ',';
                    str_label += ', ';
                };
            });
            str += ']';

            $('#hd_item_lab').val(str);
            $('#hd_item_lab_label').val(str_label);
            $('#item_lab_modal').modal('hide');
        }else{
            bootbox.dialog({
              message: "Anda belum memilih item pemeriksaan laboratorium!",
              title: "Peringatan!",
              buttons: {
                hapus: {
                  label: '<i class="fa fa-check"></i>  OK',
                  className: "btn-primary",
                  callback: function() {
                    
                  }
                }
              }
            });  
        }
    }

    function resetAllData() {
		let filter = $('#jenis-laboratorium').val();
		$('#id, .form-control, #pencarian, #dokter-ranap, #dokter-pjwb-auto, #dokter-pjwb').val('');
		$('#tanggal-awal, #tanggal-akhir').val('<?= date("d/m/Y") ?>');
		$('#s2id_dokter-ranap a .select2-chosen').html('Pilih Dokter');
		$('.select2c-input').val('');
		$('.select2c-chosen').html('');
		$('#jenis-laboratorium').val(filter);
	}

	function getListDataOrderLaboratorium(page) {
		$('#page-now').val(page);
		$.ajax({
			type: 'GET',
			url: '<?= base_url("order_laboratorium/api/order_laboratorium/get_list_order_laboratorium") ?>/page/' + page,
			data: $('#form-search').serialize() + '&jenis=' + $('#jenis-laboratorium').val(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if ((page - 1) & (data.data.length === 0)) {
					getListDataOrderLaboratorium(page - 1);
					return false;
				}

				$('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
				$('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

				$('#table-data tbody').empty();
				$.each(data.data, function(i, v) {

					let item = '';
					let detailItem = '';

					if(v.item !== null){

						item = JSON.parse(v.item);
						detailItem = item[0].cito;
						
					}



					let jenisLayanan = '';
					if (v.layanan === 'Rawat Inap') {
						jenisLayanan = v.bangsal;
					} else if (v.layanan === 'IGD') {
						jenisLayanan = v.jenis_igd;
					}

					let status = '';
					let disabled = 'disabled';
					if (v.status === 'request') {
						status = '<span class="blinker"><i><i class="fas fa-spinner fa-spin mr-1"></i>Order</i></span>';
						disabled = '';
					} else if (v.status === 'konfirm') {
						status = '<h5><span class="label label-success"><i class="fas fa-thumbs-up mr-1"></i>Dikonfirmasi</span></h5>';

					} else if (v.status === 'batal') {
						status = '<h5><span class="label label-danger"><i class="fas fa-minus-circle mr-1"></i>Batal</span></h5>';
					}

					let konfirmasi = '';

					if(v.layanan_lab === 'Laboratorium'){

						konfirmasi = 'konfirmasiDaftarLab(' + v.id + ')';

					} else {

						konfirmasi = 'konfirmasiOrderLaboratorium(' + v.id + ')';

					}

					let no = ((i + 1) + ((data.page - 1) * data.limit));
					let html = /* html */ `
						<tr ${detailItem === 'ya' ? 'class="active-status"' : ''}>
							<td class="center">${no}</td>
							<td class="nowrap">${((v.waktu_order !== null) ? datetimefmysql(v.waktu_order) : '')}</td>
							<td class="nowrap">${v.no_register}</td>
							<td class="nowrap">${v.no_rm}</td>
							<td class="nowrap">${((v.penjamin !== '') ? v.penjamin : v.cara_bayar)}</td>
							<td class="nowrap">${v.pasien}</td>
							<td class="nowrap">${v.dokter}</td>
							<td>${v.layanan} ${jenisLayanan}</td>
							<td class="nowrap">${((v.jenis !== null) ? v.jenis : '')}</td>
							<td class="center aksi">${detailItem}</td>
							<td class="center aksi">${status}</td>
							<td class="aksi right">
								<button type="button" ${disabled} title="Konfirmasi Order Laboratorium" class="btn btn-secondary btn-xs" onclick="${konfirmasi}"><i class="fas fa-check-circle mr-1"></i>Konfirm</button>
								<button type="button" ${disabled} title="Pembatalan Order Laboratorium" class="btn btn-secondary btn-xs" onclick="pembatalanOrderLaboratorium(${v.id}, ${data.page})"><i class="fas fa-times-circle mr-1"></i>Batal</button>
							</td>
						</tr>
					`;

					$('#table-data tbody').append(html);
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

	function konfirmasiDaftarLab(id_order) {
		$('#dokter-pjwb').val('');
		$('#s2id_dokter-pjwb a .select2c-chosen').html('');
		$('#instansi-auto').val('');
		$('#s2id_instansi-auto a .select2c-chosen').html('');
		
		
		$.ajax({
			type: 'GET',
			url: '<?= base_url("order_laboratorium/api/order_laboratorium/get_detail_daftar_lab") ?>/id/' + id_order,
			cache: false,
			dataType: 'JSON',
			success: function(data) {
				$('#id-order-laboratorium').val(data.id);
				$('#order-laboratorium').val(data.id);
				$('#id-layanan').val(data.id_layanan_pendaftaran);
				$('#id-order-detail').text(data.id);
				$('#id-ono').text(data.ono);
				$('#no-ono').val(data.ono);
				$('#waktu-order-detail').text((data.waktu_order !== '') ? datetimefmysql(data.waktu_order) : '');
				$('#dokter-order-detail').text(data.dokter);
				$('#no-rm-detail').text(data.no_rm);
				$('#nama-detail').text(data.pasien);
				$('#layanan-detail').text(data.jenis_pendaftaran + ' ' + data.layanan);
				$('#permintaan-lab').empty();
				
				if (data.jenis_pendaftaran === 'Laboratorium'){

					let	labButton = ` <td colspan="3"><button type="button" class="btn btn-info waves-effect" onclick="order_daftar_lab()"><i class="fas fa-plus-circle mr-1"></i>Order Pemeriksaan Laboratorium</button></td>
                                    <td width="20%"></td>
                                    <td width="1%"></td>
                                    <td wdith="79%"></td> `;

                     $('#permintaan-lab').append(labButton);            
				}

				let kelamin = '';
				if (data.kelamin === 'L') {
					kelamin = 'Laki-laki';
				} else {
					kelamin = 'Perempuan';
				}
				$('#kelamin-detail').text(kelamin);
				let umur = '';
				if (data.tanggal_lahir !== null) {
					umur = hitungUmur(data.tanggal_lahir) + ' ('+ datefmysql(data.tanggal_lahir) +')';
				}
				$('#umur-detail').text(umur);
				$('#id-footer-lis').empty();
				let statusLIS = data.status_lis;
				if(statusLIS === '201'){

					$('#id-status-lis').text('Berhasil');

					let html = /* html */
					` <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
                	<button type="button" class="btn btn-info waves-effect" onclick="konfirmasiSimpanOrderLaboratorium()"><i class="fas fa-check-circle mr-1"></i>Konfirmasi</button> `;

                	$('#id-footer-lis').append(html);
                	
				} else {

					if (data.item_pemeriksaan.length > 0) {

						let xHtml = '';

						$.each(data.item_pemeriksaan, function(i, v) {

							if(v.id === '9456' || v.id === '9457' || v.id === '9458' || v.id === '9459' || v.id === '9460' || v.id === '9461' || v.id === '9501' || v.id === '9502' || v.id === '9535' || v.id === '9532' || v.id === '9533' || v.id === '9534' || v.id === '9538' || v.id === '9539'){

								$('#id-status-lis').text('Order Non LIS');

								xHtml = /* html */ 
								` <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
			                	<button type="button" class="btn btn-info waves-effect" onclick="konfirmasiSimpanOrderLaboratorium()"><i class="fas fa-check-circle mr-1"></i>Konfirmasi</button> `;

			                	

							} else {

								$('#id-status-lis').text('Gagal Akses LIS');

								xHtml =`
								<button type="button" class="btn btn-outline-secondary waves-effect" id="btn-cetak-ws-lab" order-id="${data.id}"><i class="fas fa-print"></i> Cetak</button>
								<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
			                	<button title="Klik untuk Posting ulang LIS" type="button" class="btn btn-info" onclick="orderUlangLIS(`+data.id+`, `+data.id_layanan_pendaftaran+` )"><i class="fas fa-arrow-circle-down mr-1"></i> Order LIS</button> `;

			                }

							

						});

						$('#id-footer-lis').append(xHtml);

					}
				}

				$('#table-order tbody').empty();
				if (data.item_pemeriksaan.length > 0) {
					let totalBiaya = 0;
					let renum = 0;
					let totalNominal = 0;
					$.each(data.item_pemeriksaan, function(i, v) {
						if (v.cito === 'ya') {
							if (v.kelas === 'III') {
								renum = 25;
							} else {
								renum = 20;
							}

							totalBiaya = ((renum / 100) * parseFloat(v.total)) + parseInt(v.total);
						} else {
							totalBiaya = v.total;
						}

						let html = /* html */ `
							<tr>
								<td class="center">
									${i + 1}
									<input type="hidden" name="id_tarif[]" value="${v.id}">
								</td>
								<td>${v.layanan}</td>
								<td class="center">
									<input type="hidden" name="item_lab[]" value="${JSON.stringify(v.item_lab)}">
									<button type="button" class="btn btn-secondary btn-xs mypopover" data-container="body" data-toggle="popover" data-placement="top" data-title="Item Pemeriksaan Lab" data-content="${v.item_lab_label}">Show</button>
								</td>
								<td class="left">${v.jenis}</td>
								<td class="center">
									<input type="hidden" name="cito[]" value="${v.cito}">${((v.cito == 'ya') ? '&checkmark;' : '')}
								</td>
								<td>${v.penjamin}</td>
								<td class="center">${v.kelas}</td>
								<td class="right">${numberToCurrency(totalBiaya)}</td>
								<td class="center">
									<input type="checkbox" name="rujuk[]" value="${v.id}">
								</td>
							</tr>
						`;

						totalNominal += parseInt(totalBiaya);
						$('#table-order tbody').append(html);
					});


                    $('.mypopover').popover({html: true, trigger: 'hover'});

					html = /* html */ `
						<tr>
							<td colspan="6"></td>
							<td class="right">Total</td>
							<td class="right"><b>${numberToCurrency(totalNominal)}</b></td>
							<td></td>
						</tr>
					`;

					$('#table-order tbody').append(html);
				}

				$('#modal-order-laboratorium').modal('show');
			},
			error: function(e) {
				accessFailed(e.status);
			},
		});
	}

	function paging(page) {
		getListDataOrderLaboratorium(page);
	}

	function order_daftar_lab(){
        $('#modal-daftar-lab-label').html('Permintaan Pemeriksaan Laboratorium');
        $('#tindakan-order-laboratorium, #tarif-tindakan-lab').val('');
        $('#s2id_tindakan-order-laboratorium a .select2-chosen').html('');
        $('#daftar-lab-modal').modal('show');
        $('#table-daftar-lab tbody').empty();
        klik = null;
	}

	function daftar_laboratorium(){
        
        var stop = false;
        var is_cito = 'tidak';
        var checked = '';
        if ($('#is_cito_lab').is(':checked')) {
            checked = '&checkmark;';
            is_cito = 'ya';
        };

        if ($('#tindakan-order-laboratorium').val() === '') {
            syams_validation('#tindakan-order-laboratorium', 'Pemeriksaan harus diisi!');
            stop = true;   
        };

        if ($('#jenis_lab').val() === '' | $('#jenis_lab').val() === null) {
            syams_validation('#jenis_lab', 'Jenis Lab harus diisi!');
            stop = true;   
        };
        
        if (stop) {
            return false;
        };

        var str = '';
        var numb = $('.number_tindakan_lab').length;
        
        var tindakan = $('#s2id_tindakan-order-laboratorium a .select2-chosen').html();
        var id_tindakan = $('#tindakan-order-laboratorium').val();
        var dokter_rujuk = $('#s2id_dokter_rujuk a .select2-chosen').html();
        var id_dokter_rujuk = $('#dokter_rujuk').val();
        var jenis_lab = $('#jenis_lab').val();
        var tarif = $('#tarif-tindakan-lab').val();
        var keterangan = $('#keterangan_order_lab').val(); //tambahan lina
        var itemdata = $('#hd_item_lab').val();
        var itemlabel = $('#hd_item_lab_label').val();
        var id_order = $('#order-laboratorium').val();
        var id_layanan_pendaftaran = $('#id-layanan').val();
        var ono = $('#no-ono').val();

        if (tarif === '') {
            tarif = 0;
        };
        str = '<tr>'+
            '<td class="number_tindakan_lab" align="center">'+ (++numb) +'</td>'+
            '<td align="center"><input type="hidden" name="ono" value="'+ono+'"/><input type="hidden" name="id_layanan_pendaftaran[]" value="'+id_layanan_pendaftaran+'"/><input type="hidden" name="order[]" value="'+id_order+'"/><input type="hidden" name="id_dokter_rujuk[]" value="'+id_dokter_rujuk+'"/><input type="hidden" name="dokter_rujuk[]" value="'+dokter_rujuk+'"/><input type="hidden" name="jenis_lab[]" value="'+jenis_lab+'"/><input type="hidden" name="tindakan_lab[]" value="'+id_tindakan+'"/>'+tindakan+'</td>'+
            '<td align="center"><input type="hidden" name="keterangan[]" value="'+keterangan+'"/>'+keterangan+'</td>'+ //tambahan lina
            '<td align="center"><input type="hidden" name="item_lab_label[]" value="'+itemlabel+'" />'+itemlabel+'</td>'+
            '<td align="center"><input type="hidden" name="item_lab[]" value="'+itemdata+'" />'+numberToCurrency(tarif)+'</td>'+
            '<td align="center"><input type="hidden" name="cito[]" value="'+is_cito+'" />'+checked+'</td>'+
            '<td align="center"><button type="button" class="btn btn-secondary btn-xxs" onclick="hapus_list(this);"><i class="fas fa-trash-alt"></i></button>'+
            '</tr>';

        $('#table-daftar-lab tbody').append(str);
        $('#is_cito_lab').prop('checked', false);
        $('#tindakan-order-laboratorium').val('');
        $('#keterangan_order_lab').val('');
        $('#s2id_tindakan-order-laboratorium a .select2-chosen').html('');
        $('#hd_item_lab').val('');
        $('#hd_item_lab_label').val('');
    }

    function simpanDaftarSysmex() {
    	var id_order = $('#order-laboratorium').val();
        var stop = false;

        if (stop) {
            return false;
        };

        
            if (klik === null) {
                klik =  $.ajax({
                    type: 'PUT',
                    url: '<?= base_url("order_laboratorium/api/order_laboratorium/postLab") ?>',
                    data: $('#formlab').serialize(),
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
                            
                            $('input[type=checkbox]').removeAttr('checked');
                            $('#daftar-lab-modal').modal('hide');
                            konfirmasiDaftarLab(id_order);
                    },
                    complete: function() {
                                hideLoader();
                            },
                    error: function(e){
                    	$('#daftar-lab-modal').modal('hide');
                        konfirmasiDaftarLab(id_order);
                        messageCustom('Gagal Posting LIS atau Gagal order pemeriksaan laboratorium', 'Error');

                    }
                });
            }

        
    }

	
    function hapus_list(el) {
        var parent = el.parentNode.parentNode;
        parent.parentNode.removeChild(parent);
	}

	function pembatalanOrderLaboratorium(id, page) {
		$('#id-order').val(id);
		$('#page-now').val(page);
		$('#modal-batal-order-laboratorium').modal('show');
	}

	function simpanPembatalanOrderLaboratorium() {
		$.ajax({
			type: 'POST',
			url: '<?= base_url("order_laboratorium/api/order_laboratorium/simpan_batal_order_laboratorium") ?>',
			data: $('#form-batal-order-laboratorium').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				$('#modal-batal-order-laboratorium').modal('hide');
				getListDataOrderLaboratorium($('#page-now').val());
				messageCustom('Pembatalan Order Laboratorium Berhasil Dilakukan', 'Success');
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {

				if(e.status === 201){

					let tipe = 'Success';
                      
                    $('#modal-batal-order-laboratorium').modal('hide');      
                    getListDataOrderLaboratorium($('#page-now').val());
                    messageCustom('Pembatalan Order Laboratorium Berhasil Dilakukan', tipe);
                    

				} else {
				
					messageCustom('Pembatalan Order Laboratorium Gagal Dilakukan', 'Error');

				}
			},
		});
	}

	function konfirmasiOrderLaboratorium(id_order) {
		$('#dokter-pjwb-auto').val('');
		$('#s2id_dokter-pjwb-auto a .select2c-chosen').html('');
		$('#instansi-auto').val('');
		$('#s2id_instansi-auto a .select2c-chosen').html('');
		$('#permintaan-lab').empty();

		
		$.ajax({
			type: 'GET',
			url: '<?= base_url("order_laboratorium/api/order_laboratorium/get_detail_order_laboratorium") ?>/id/' + id_order,
			cache: false,
			dataType: 'JSON',
			success: function(data) {

				let jenisLayanan = '';
				if (data.layanan === 'Rawat Inap') {
					jenisLayanan = data.bangsal;
				} else if (data.layanan === 'IGD') {
					jenisLayanan = data.jenis_igd;
				}

				$('#id-order-laboratorium').val(data.id);
				$('#id-order-detail').text(data.id);
				$('#id-ono').text(data.ono);
				$('#waktu-order-detail').text((data.waktu_order !== '') ? datetimefmysql(data.waktu_order) : '');
				$('#dokter-order-detail').text(data.dokter);
				$('#no-rm-detail').text(data.no_rm);
				$('#nama-detail').text(data.pasien);
				$('#ktp-detail').text(data.no_identitas);
				$('#layanan-detail').text(data.layanan + ' ' + jenisLayanan);
				let kelamin = '';
				if (data.kelamin === 'L') {
					kelamin = 'Laki-laki';
				} else {
					kelamin = 'Perempuan';
				}
				$('#kelamin-detail').text(kelamin);
				let umur = '';
				if (data.tanggal_lahir !== null) {
					umur = hitungUmur(data.tanggal_lahir) + ' ('+ datefmysql(data.tanggal_lahir) +')';
				}
				$('#umur-detail').text(umur);
				$('#id-footer-lis').empty();
				let statusLIS = data.status_lis;
				if(statusLIS === '201'){

					$('#id-status-lis').text('Berhasil');

					let html = /* html */ 
					` <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
                	<button type="button" class="btn btn-info waves-effect" onclick="konfirmasiSimpanOrderLaboratorium()"><i class="fas fa-check-circle mr-1"></i>Konfirmasi</button> `;

                	$('#id-footer-lis').append(html);

				} else {

					if (data.item_pemeriksaan.length > 0) {

						let xHtml = '';

						$.each(data.item_pemeriksaan, function(i, v) {

							if(v.id === '9456' || v.id === '9457' || v.id === '9458' || v.id === '9459' || v.id === '9460' || v.id === '9461' || v.id === '9501' || v.id === '9502' || v.id === '9535' || v.id === '9532' || v.id === '9533' || v.id === '9534' || v.id === '9538' || v.id === '9539'){

								$('#id-status-lis').text('Order Non LIS');

								xHtml = /* html */ 
								` <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
			                	<button type="button" class="btn btn-info waves-effect" onclick="konfirmasiSimpanOrderLaboratorium()"><i class="fas fa-check-circle mr-1"></i>Konfirmasi</button> `;

			                	

							} else {

								$('#id-status-lis').text('Gagal Akses LIS');

								xHtml = `
								<button type="button" class="btn btn-outline-secondary waves-effect" id="btn-cetak-ws-lab" order-id="${data.id}"><i class="fas fa-print"></i> Cetak</button>
								<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
			                	<button title="Klik untuk Posting ulang LIS" type="button" class="btn btn-info" onclick="orderUlangLIS(`+data.id+`, `+data.id_layanan_pendaftaran+` )"><i class="fas fa-arrow-circle-down mr-1"></i> Order LIS</button> `;

			                }

							

						});

						$('#id-footer-lis').append(xHtml);

					}
				}

				$('#table-order tbody').empty();
				if (data.item_pemeriksaan.length > 0) {
					let totalBiaya = 0;
					let renum = 0;
					let totalNominal = 0;
					$.each(data.item_pemeriksaan, function(i, v) {
						if (v.cito === 'ya') {
							if (v.kelas === 'III') {
								renum = 25;
							} else {
								renum = 20;
							}

							totalBiaya = ((renum / 100) * parseFloat(v.total)) + parseInt(v.total);
						} else {
							totalBiaya = v.total;
						}

						let html = /* html */ `
							<tr>
								<td class="center">
									${i + 1}
									<input type="hidden" name="id_tarif[]" value="${v.id}">
								</td>
								<td>${v.layanan}</td>
								<td>${v.keterangan}</td>
								<td class="center">
									<input type="hidden" name="item_lab[]" value="${JSON.stringify(v.item_lab)}">
									<button type="button" class="btn btn-secondary btn-xs mypopover" data-container="body" data-toggle="popover" data-placement="top" data-title="Item Pemeriksaan Lab" data-content="${v.item_lab_label}">Show</button>
								</td>
								<td class="center">${v.jenis}</td>
								<td class="center">
									<input type="hidden" name="cito[]" value="${v.cito}">${((v.cito == 'ya') ? '&checkmark;' : '')}
								</td>
								<td>${v.penjamin}</td>
								<td class="center">${v.kelas}</td>
								<td class="right">${numberToCurrency(totalBiaya)}</td>
								<td class="center">
									<input type="checkbox" name="rujuk[]" value="${v.id}">
								</td>
							</tr>
						`;

						totalNominal += parseInt(totalBiaya);
						$('#table-order tbody').append(html);
					});


                    $('.mypopover').popover({html: true, trigger: 'hover'});

					html = /* html */ `
						<tr>
							<td colspan="6"></td>
							<td class="right">Total</td>
							<td class="right"><b>${numberToCurrency(totalNominal)}</b></td>
							<td></td>
						</tr>
					`;

					$('#table-order tbody').append(html);
				}

				$('#modal-order-laboratorium').modal('show');
			},
			error: function(e) {
				accessFailed(e.status);
			},
		});
	}

	function orderUlangLIS(id_lab, id_layanan) {

		if ($('#dokter-pjwb').val() === '') {
            syams_validation('#dokter-pjwb', 'Dokter P. Jawab harus diisi!');
            return false;  
        };

		if (id_lab !== '') {
            
            $.ajax({
                    type: 'POST',
                    url: '<?= base_url("pelayanan/api/pelayanan/postUlangLIS") ?>',
                    data: $('#form-order-laboratorium').serialize()+'&id_order_lab='+id_lab+'&id_layanan='+id_layanan,
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
                            konfirmasiOrderLaboratorium(id_lab);
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

	function showModalPenaggungJawabLaboratorium(i) {
		$('#number-penanggung-jawab').val(i);
		$('#dokter-penanggung-jawab').val('');
		$('#s2id_dokter-penanggung-jawab a .select2-chosen').html('');
		$('#modal-dokter-penanggung-jawab').modal('show');
	}

	function pilihDokterPenanggungJawab() {
		let numberPenanggungJawab = $('#number-penanggung-jawab').val();
		let dokterPenanggungJawab = $('#s2id_dokter-penanggung-jawab a .select2-chosen').html();
		let idDokterPenanggungJawab = $('#dokter-penanggung-jawab').val();

		$('#penanggung-jawab-laboratorium' + numberPenanggungJawab).val(idDokterPenanggungJawab);
		$('#penanggung-jawab-laboratorium-label' + numberPenanggungJawab).text(dokterPenanggungJawab);
		$('#btn-penanggung-jawab-laboratorium' + numberPenanggungJawab).hide();
		$('#modal-dokter-penanggung-jawab').modal('hide');
	}

	function konfirmasiSimpanOrderLaboratorium() {

		if ($('#dokter-pjwb-auto').val() == '') {
            syams_validation('#dokter-pjwb-auto', 'Silahkan pilih Dokter Penanggung Jawab terlebih dahulu');
            return false;
		}

		if ($('#analis-laboratorium').val() == '') {
            syams_validation('#analis-laboratorium', 'Silahkan pilih Analis Laboratorium terlebih dahulu');
            return false;
		}

		swal.fire({
			title: 'Konfirmasi Masuk Laboratorium',
			text: "Apakah anda yakin akan melakukan entri pemeriksaan Laboratorium ?",
			icon: 'question',
			showCancelButton: true,
			confirmButtonText: '<i class="fas fa-save mr-1"></i>Simpan',
			cancelButtonText: '<i class="fas fa-times-circle mr-1"></i>Batal',
			reverseButtons: true
		}).then((result) => {
			if (result.value) {
				simpanOrderLaboratorium();
			}
		})
	}

	function simpanOrderLaboratorium() {
		$.ajax({
			type: 'POST',
			url: '<?= base_url("order_laboratorium/api/order_laboratorium/simpan_data_order_laboratorium") ?>',
			data: $('#form-order-laboratorium').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if (data.status) {
					messageAddSuccess();
				} else {
					messageAddFailed();
				}

				$('#modal-order-laboratorium').modal('hide');
				getListDataOrderLaboratorium($('#page-now').val());
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				messageAddFailed();
			},
		});
	}

	// Btn cetak worksheet laboratorium
	$(document).on('click','#btn-cetak-ws-lab', function(){
		window.open('<?= base_url( 'order_laboratorium/cetak_worksheet_laboratorium/' ) ?>' + $(this).attr('order-id'));
	})
</script>
