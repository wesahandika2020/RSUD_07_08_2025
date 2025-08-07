<script>
	$(function() {
		getListDataOrderRadiologi(1);
		
		$('#jenis-radiologi').change(function() {
			getListDataOrderRadiologi(1);
		});

		$('#btn-reload').click(function() {
			resetAllData();
			getListDataOrderRadiologi(1);
		});

		$('#btn-search').click(function() {
			$('#dokter-ranap').val('');
			$('#s2id_dokter-ranap a .select2-chosen').html('Pilih Dokter');
			$('#modal-search').modal('show');
		});

		$('#tanggal-awal, #tanggal-akhir').datepicker({
			format: 'dd/mm/yyyy'
		}).on('changeDate', function() {
			$(this).datepicker('hide');
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

	});

	$('#tindakan-radiologi').select2({
        ajax: {
            url: "<?= base_url('masterdata/api/masterdata_auto/tarif_pelayanan_auto') ?>",
            dataType: 'json',
            quietMillis: 100,
            data: function (term, page) { // page is the one-based page number tracked by Select2
            	var KELAS_TINDAKAN = '';
        		var JENIS_TINDAKAN = 'Rawat Jalan';
                return {
                    q: term, //search term
                    kelas: KELAS_TINDAKAN,
                    jenis_tindakan: JENIS_TINDAKAN,
                    jenis_pemeriksaan: 'Pelayanan Radiologi',
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
        formatSelection: function(data){
            $('#tarif_tindakan_rad').val(data.total);
            var kelas = (data.kelas !== null)?(', kelas ')+data.kelas:'';
            var jenis = (data.jenis !== null)?data.jenis:'';
            var result = data.layanan+', '+jenis+', '+data.bobot+kelas;
            if (data.id === '') {
                result = '';
            }
            return result;
        }
    });

	$('#dokter-penanggung-jawab').select2({
		ajax: {
			url: "<?= base_url('order_radiologi/api/order_radiologi/dokterAuto') ?>",
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

			if(typeof data.tindakan !== 'undefined'){
				var markup = data.nama + ' <b>(' + data.tindakan +')</b><br/><i>' + data.spesialisasi + '</i>';
			} else {

				markup = '';

			}
			
			return markup;
		},
		formatSelection: function(data) {
			if(typeof data.tindakan !== 'undefined'){
				return data.nama;
			}
		}
	});

	$('#dokter-perujuk-radiologi').select2({
		ajax: {
			url: "<?= base_url('order_radiologi/api/order_radiologi/dokterRujukRadiologi') ?>",
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

	$('#rr').select2({
        ajax: {
            url: "<?= base_url('order_radiologi/api/order_radiologi/ruang_sembilan') ?>",
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

            if(data.name_modality !== undefined){
                var markup = data.nama_ruangan + ' - ' + data.name_modality;
                return markup;
            }
        },
        formatSelection: function(data) {
            if(data.name_modality !== undefined){
                return data.nama_ruangan + ' - ' + data.name_modality;
            }
        }
    });

	function resetAllData() {
		let filter = $('#jenis-radiologi').val();
		$('#id, .form-control, #pencarian, #dokter-ranap').val('');
		$('#tanggal-awal, #tanggal-akhir').val('<?= date("d/m/Y") ?>');
		$('#s2id_dokter-ranap a .select2-chosen').html('Pilih Dokter');
		$('.select2c-input').val('');
		$('.select2c-chosen').html('');
		$('#jenis-radiologi').val(filter);
	}

	function revTanggal(tgl) {
    var tanggal = tgl;
    var elem = tanggal.split(' ');
    var tanggalAja = elem[0];
    return tanggalAja;
}

	function getListDataOrderRadiologi(page) {
		$('#page-now').val(page);
		$.ajax({
			type: 'GET',
			url: '<?= base_url("order_radiologi/api/order_radiologi/get_list_order_radiologi") ?>/page/' + page,
			data: $('#form-search').serialize() + '&jenis=' + $('#jenis-radiologi').val(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if ((page - 1) & (data.data.length === 0)) {
					getListDataOrderRadiologi(page - 1);
					return false;
				}

				$('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
				$('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

				$('#table-data tbody').empty();
				$.each(data.data, function(i, v) {
					let jenisLayanan = '';
					if (v.layanan === 'Rawat Inap') {
						jenisLayanan = v.bangsal;
					} else if (v.layanan === 'IGD') {
						jenisLayanan = v.jenis_igd;
					}

					let status = '';
					let disabled = 'disabled';
					let disabledCetakLabel = 'disabled';
					let responPacs = '';
					let konfirmasi = '';
					if (v.status === 'request') {
						status = '<span class="blinker"><i><i class="fas fa-spinner fa-spin mr-1"></i>Order</i></span>';
						konfirmasi = `<button type="button" title="Konfirmasi order radiologi" class="btn btn-secondary btn-xs" onclick="konfirmasiOrderRadiologi(${v.id}, ${page})"><i class="fas fa-check-circle mr-1"></i>Konfirmasi</button>`;
						disabled = '';
					} else if (v.status === 'konfirm') {
						status = '<h5><span class="label label-success"><i class="fas fa-thumbs-up mr-1"></i>Dikonfirmasi</span></h5>';
						konfirmasi = `<button type="button" title="Konfirmasi order radiologi" class="btn btn-secondary btn-xs" onclick="konfirmasiOrderRadiologi(${v.id}, ${page})"><i class="fas fa-check-circle mr-1"></i>Cek Order</button>`;
						disabledCetakLabel = '';

					} else if (v.status === 'batal') {
						status = '<h5><span class="label label-danger"><i class="fas fa-minus-circle mr-1"></i>Batal</span></h5>';
					}

					if(revTanggal(v.waktu_order) > '2023-08-15'){

						if(v.respon_pacs !== 'konfirm'){

							if (v.status !== 'batal'){

								responPacs = '<h5><span class="label label-danger">!</span></h5>';

							}
						}

					}

					let addAntrian = '';					
					v.status == 'konfirm'?	
						addAntrian = '<button type="button" title="Tambah Antrian Radiologi" class="btn btn-secondary btn-xs" onclick="konfirmasiTambahAntrianRad(\''+v.id_pendaftaran+'\',\''+v.id_layanan_pendaftaran+'\',\''+v.id+'\')"><i class="fas fa-user-plus"></i> Antrian</button>'	
					:   addAntrian = '';
					
					
					let no = ((i + 1) + ((data.page - 1) * data.limit));
					let html = /* html */ `
						<tr>
							<td class="center">${no}</td>
							<td class="nowrap center">${((v.waktu_order !== null) ? datetimefmysql(v.waktu_order) : '')}</td>
							<td class="center">${v.no_register}</td>
							<td class="center">${v.no_rm}</td>
							<td class="nowrap">${v.pasien}</td>
							<td class="nowrap">${v.dokter}</td>
							<td>${v.layanan} ${jenisLayanan}</td>
							<td>${((v.jenis !== null) ? v.jenis : '')}</td>
							<td class="center aksi">${status}</td>
							<td class="left">${responPacs}</td>
							<td class="aksi right">
								${addAntrian} ${konfirmasi}
								<button type="button" ${disabled} title="Pembatalan order radiologi" class="btn btn-secondary btn-xs" onclick="pembatalanOrderRadiologi(${v.id}, ${data.page})"><i class="fas fa-times-circle mr-1"></i>Batal</button>
								<button type="button" ${disabledCetakLabel} title="Klik untuk mencetak label" class="btn btn-secondary btn-xs" onclick="cetakLabelRadiologi(${v.id})"><i class="fas fa-print mr-1"></i>Cetak Label</button>
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

	function paging(page) {
		getListDataOrderRadiologi(page);
	}

	function pembatalanOrderRadiologi(id, page) {
		$('#id-order').val(id);
		$('#page-now').val(page);
		$('#modal-batal-order-radiologi').modal('show');
	}

	function simpanPembatalanOrderRadiologi() {
		$.ajax({
			type: 'POST',
			url: '<?= base_url("order_radiologi/api/order_radiologi/simpan_batal_order_radiologi") ?>',
			data: $('#form-batal-order-radiologi').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				$('#modal-batal-order-radiologi').modal('hide');
				getListDataOrderRadiologi($('#page-now').val());
				messageCustom('Pembatalan Order Radiologi Berhasil Dilakukan', 'Success');
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				messageCustom('Pembatalan Order Radiologi Gagal Dilakukan', 'Error');
			},
		});
	}

	function lanjutIntegrasi(idOrder, idDetail){

		$.ajax({
			type: 'POST',
			url: '<?= base_url("order_radiologi/api/order_radiologi/booking_ulang_pacs") ?>',
			data: 'idDetail=' + idDetail,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {

				if(typeof data.metaData !== 'undefined'){

                    if(data.metaData.code === 201){

                        swalAlert('warning', data.metaData.code, data.metaData.message);
                        konfirmasiOrderRadiologi(idOrder, $('#page-now').val());
                        
                        

                    } else {

                        konfirmasiOrderRadiologi(idOrder, $('#page-now').val());
						
                    }

                }
				
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				messageAddFailed();
				konfirmasiOrderRadiologi(idOrder, $('#page-now').val());
                
			},
		});

	}

	function integrasiPacs(idOrder, idDetail){

		swal.fire({
			title: 'Konfirmasi Integrasi',
			text: "Apakah Data ini Akan Diintegrasikan ?",
			icon: 'question',
			showCancelButton: true,
			confirmButtonText: '<i class="fas fa-save mr-1"></i>Simpan',
			cancelButtonText: '<i class="fas fa-times-circle mr-1"></i>Batal',
			reverseButtons: true
		}).then((result) => {
			if (result.value) {
				lanjutIntegrasi(idOrder, idDetail);
			}		
		})
		

	}

	function orderRad(idOrder, idLayananPendaftaran, beratBadan){

		if ( idLayananPendaftaran === '' | idLayananPendaftaran === undefined) {
            swalAlert('warning', 201, 'id Layanan Pendaftaran Tidak Ada, Silakan Hubungi IT');;
            return false;
        }

        if ( beratBadan === '' | beratBadan === undefined) {
            swalAlert('warning', 201, 'Berat Badan Tidak Ada, Silakan Hubungi IT');;
            return false;
        }
        
    	$.ajax({
            type : 'POST',
            url: '<?= base_url("pelayanan/api/pelayanan/daftarRad") ?>/',
            data: 'daftar_bb_rad='+beratBadan+'&idLayananPendaftaran='+idLayananPendaftaran,
            cache: false,
            dataType : 'json',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {

                if(data.metaData.code !== 200){

                    swalAlert('warning', data.metaData.code, data.metaData.message);

                } else {

                    messageCustom(data.metaData.message, 'Success');
                    $('#modal-order-radiologi').modal('hide');
                    getListDataOrderRadiologi(1);
                    
                }
            
            },
            complete: function() {
                hideLoader();
            },
            error: function(e){
                messageCustom('Gagal order pemeriksaan Radiologi', 'Error');
            }
        });

    }

	function orderRadiologi(idOrder){

		if ( idOrder === '' | idOrder === undefined) {
            swalAlert('warning', 201, 'id Order Tidak Ada, Silakan Hubungi IT');;
            return false;
        }

        let dataOrder = '';

        $.ajax({
            type : 'GET',
            url: '<?= base_url("order_radiologi/api/order_radiologi/dataOrderRadiologi") ?>',
            data: 'idOrder=' + idOrder,
            cache: false,
            dataType : 'json',
            success: function(data) {

            	if(typeof data.metaData !== 'undefined'){

                    if(data.metaData.code !== 200){

                    	if(data.metaData.code === 202){

                    		swal.fire({
								title: 'Konfirmasi Order Radiologi Baru',
								text: "Order ini sudah memiliki Item Tindakan, Apakah Anda ingin order yang baru ?",
								icon: 'question',
								showCancelButton: true,
								confirmButtonText: '<i class="fas fa-save mr-1"></i>Simpan',
								cancelButtonText: '<i class="fas fa-times-circle mr-1"></i>Batal',
								reverseButtons: true
							}).then((result) => {
								if (result.value) {
									dataOrder = data.metaData.message;
									orderRad(idOrder, dataOrder.id_layanan_pendaftaran, dataOrder.berat_badan);
								}		
							})

                        	
                        } else {
                        
                        	swalAlert('warning', data.metaData.code, data.metaData.message);

                        }
                    
                    } else {

                    	klik = null;
                        konfirmasiOrderRadiologi(idOrder, 1);
						$('#modal-req-radiologi').modal('show');
						$('#table-rad tbody').empty();
						$('#modal-req-radiologi-label').html('Permintaan Pemeriksaan Radiologi');
						$('#id-order-daftar-radiologi').val(idOrder);
						dataOrder = data.metaData.message;
						$('#bb-rad').val(dataOrder.berat_badan);
						$('#id-layanan-asal-radiologi').val(dataOrder.id_layanan_pendaftaran);


					}

                }
               
            },
            error: function(e){
                accessFailed(e.status);
            }
        });
		
    }

    function validasiDesimal(input) {
      const kasihRegex = /^\d+(\.\d{1,2})?$/;
      return kasihRegex.test(input);
    }

    function hapus_list(el) {
        var parent = el.parentNode.parentNode;
        parent.parentNode.removeChild(parent);
    }

    function validasiString(input) {
        // Menghilangkan spasi di awal dan akhir string
        var trimmedInput = input.trim();

        // Memeriksa apakah string setelah di-trim memiliki panjang lebih dari 3 karakter
        if (trimmedInput.length > 3) {
            // String valid
            return true;
        } else {
            // String tidak valid
            return false;
        }
    }

    function addRadiologi(){
        var stop = false;
        var is_cito = 'tidak';
        var checked = '';
        if ($('#is_cito_rad').is(':checked')) {
            checked = '&checkmark;';
            is_cito = 'ya';
        };

        if ($('#bb-rad').val() === '') {
            syams_validation('#bb-rad', 'Berat Badan Pasien harus diisi!');
            stop = true;   
        };

        if(validasiString($('#keterangan_order_rad').val()) === false){

            syams_validation('#keterangan_order_rad', 'Silakan isi Keterangan Klinis dengan Benar dan lebih dari 3 karakter');
            stop = true;

        };

        if ($('#tindakan-radiologi').val() === '') {
            syams_validation('#tindakan_radiologi', 'Pemeriksaan harus diisi!');
            stop = true; 

        };

        if (validasiDesimal($('#bb-rad').val()) === false) {
            syams_validation('#bb-rad', 'Silakan isi dengan Angka atau Desimal maksimal 2 angka di belakang koma');
            stop = true; 

        };

        if (stop) {
            return false;
        };

        var str = '';
        var numb = $('.number_tindakan_rad').length;
        
        var tindakan = $('#s2id_tindakan-radiologi a .select2-chosen').html();
        var id_tindakan = $('#tindakan-radiologi').val();
        var tarif = $('#tarif_tindakan_rad').val();
        var keterangan = $('#keterangan_order_rad').val(); //tambahan lina radiologi
        var itemdata = $('#hd_item_rad').val();
        var itemlabel = $('#hd_item_rad_label').val();
        var beratBadan = $('#bb-rad').val();

        if (tarif === '') {
            tarif = 0;
        };
        str = '<tr>'+
            '<td class="number_tindakan_rad" align="center">'+ (++numb) +'</td>'+
            '<td align="center"><input type="hidden" name="tindakan_rad[]" value="'+id_tindakan+'"/>'+tindakan+'</td>'+
            '<td align="center"><input type="hidden" name="berat_badan[]" value="'+beratBadan+'"/>'+beratBadan+'</td>'+
            '<td align="center"><input type="hidden" name="keterangan[]" value="'+keterangan+'"/>'+keterangan+'</td>'+ //tambahan lina radiologi
            '<td align="center"><input type="hidden" name="item_rad_label[]" value="'+itemlabel+'" />'+itemlabel+'</td>'+
            '<td align="center"><input type="hidden" name="item_rad[]" value="'+itemdata+'" />'+numberToCurrency(tarif)+'</td>'+
            '<td align="center"><input type="hidden" name="cito[]" value="'+is_cito+'" />'+checked+'</td>'+
            '<td align="center"><button type="button" class="btn btn-secondary btn-xxs" onclick="hapus_list(this);"><i class="fas fa-trash-alt"></i></button>'+
            '</tr>';

        $('#table-rad tbody').append(str);
        $('#is_cito_rad').prop('checked', false);
        $('#s2id_tindakan-radiologi a .select2-chosen').html('');
        $('#tindakan-radiologi').val('');
        $('#keterangan_order_rad').val(''); //tambahan lina radiologi
        $('#tarif_tindakan_rad').val('');
        $('#hd_item_rad').val('');
        $('#hd_item_rad_label').val('');
        if(beratBadan === null || beratBadan === ''){
            $('#bb-rad').val('');
        }
    }

    function simpanRequestRadiologi(){
        
        var idLayananPendaftaran = $('#id-layanan-asal-radiologi').val();
        var idOrder = $('#id-order-daftar-radiologi').val();
        var stop = false;
        klik = null;

        if (idOrder === '' | idOrder === undefined) {
            swalAlert('warning', 201, 'id Order Tidak Ada, Silakan Hubungi IT');;
            return false;
        };

        if (stop) {
            return false;
        };

        if ((idLayananPendaftaran !== '') & (idOrder != '')) {
            if (klik === null) {
                klik = $.ajax({
                    type : 'POST',
                    url: '<?= base_url("order_radiologi/api/order_radiologi/update_order_radiologi") ?>/',
                    data: $('#formreqradio').serialize()+'&id_layanan='+idLayananPendaftaran+'&idOrder='+idOrder,
                    cache: false,
                    dataType : 'json',
                    beforeSend: function() {
                        showLoader();
                    },
                    success: function(data) {
                        if(typeof data.metaData !== 'undefined'){

		                    if(data.metaData.code !== 200){

		                        swalAlert('warning', data.metaData.code, data.metaData.message);
		                    
		                    } else {

		                    	konfirmasiOrderRadiologi(idOrder, 1);
								$('#modal-req-radiologi').modal('hide');
								
							}

		                }
                    },
                    complete: function() {
                        hideLoader();
                    },
                    error: function(e){
                        messageCustom('Gagal order pemeriksaan Radiologi', 'Error');
                    }
                });
            }       
        }else{
            messageCustom('Parameter Tidak Lengkap', 'Info');
        }
        
    }

	function konfirmasiOrderRadiologi(id_order, p) {

		$('#permintaan-radiologi').empty();
		$('#dokter-order-detail').empty();

		let pilihDokter = '';

		$.ajax({
			type: 'GET',
			url: '<?= base_url("order_radiologi/api/order_radiologi/get_detail_order_radiologi") ?>/id/' + id_order,
			cache: false,
			dataType: 'JSON',
			success: function(data) {

				getListDataOrderRadiologi(p);

				if(data !== false){

					if(data === 'Rawat Inap'){

						messageCustom('Tidak Ada Data Berat Badan Pasien, Silakan isi Berat Badan di Profil Pasien terlebih dahulu', 'Error');

					} else if(data === 'Poliklinik'){

						messageCustom('Tidak Ada Data Berat Badan Pasien, Silakan isi Berat Badan di Anamnesa Pasien terlebih dahulu', 'Error');

					} else {

						$('#id-order-radiologi').val(data.id);
						$('#id-order-detail').text(data.id);
						$('#waktu-order-detail').text((data.waktu_order !== '') ? datetimefmysql(data.waktu_order) : '');

						if(data.dokter !== '' && data.dokter !== null){

							$('#dokter-order-detail').text(data.dokter);
							
						} else {

							pilihDokter = `<button type="button" class="btn btn-secondary btn-xs" id="btn-dokter-perujuk-krad" onclick="showModalDokterPerujukKrad(${data.id})"><i class="fas fa-edit mr-1"></i>Edit Dokter</button>`;

							$('#dokter-order-detail').append(pilihDokter);

						}
						$('#no-rm-detail').text(data.no_rm);
						$('#nama-detail').text(data.pasien);
						$('#id-pasien').val(data.no_rm);
						$('#layanan-detail').text(data.jenis_layanan);

						$('#table-order tbody').empty();

						if(data.jenis_layanan === 'Radiologi'){

							let	radiologiButton = ` <td><button type="button" class="btn btn-info waves-effect" onclick="orderRadiologi(${data.id})"><i class="fas fa-plus-circle mr-1"></i>Order Radiologi</button></td>
	                                    <td></td>
	                                    <td></td>
	                                    `;

	                     	$('#permintaan-radiologi').append(radiologiButton);

						}

						if(data.item_pemeriksaan !== null){
							
							if (data.item_pemeriksaan.length > 0) {
								let totalBiaya = 0;
								let renum = 0;
								let totalNominal = 0;
								let ruangRadiologi = '';
								let dPjp = '';
								let lengthOrder = '';
								let btnSimpan = '';
								let rujuk = '';
								$.each(data.item_pemeriksaan, function(i, v) {

									lengthOrder = data.item_pemeriksaan.length;

									// if (v.cito === 'ya') {
									// 	if (v.kelas === 'III') {
									// 		renum = 25;
									// 	} else {
									// 		renum = 20;
									// 	}

									// 	totalBiaya = ((renum / 100) * parseFloat(v.total)) + parseInt(v.total);

									// } else {

									// 	totalBiaya = v.total;
										
									// }

									totalBiaya = v.total;

									if(v.konfirm !== null && v.konfirm !== ''){
										
										dPjp = `<span>${((v.dpjp !== '') ? v.dpjp : '')}</span>`;
										rujuk = ``;

										if(v.respon !== '201'){

											btnSimpan = `<button type="button" class="btn btn-info waves-effect" onclick="integrasiPacs(${id_order}, ${v.konfirm})"><i class="fas fa-check-circle mr-1"></i>Integrasi</button>`;

										} else {

											btnSimpan = `<span><b>Sudah Bridging</b></span>`;

										}


									} else {

										dPjp = `<input type="hidden" name="dokter${i}" id="penanggung-jawab-radiologi${i}">
												<span id="penanggung-jawab-radiologi-label${i}"></span>
												<button type="button" class="btn btn-secondary btn-xs" id="btn-penanggung-jawab-radiologi${i}" onclick="showModalPenanggungJawabRadiologi(${i})"><i class="fas fa-edit mr-1"></i>Edit Dokter</button>`;
										btnSimpan = `<button type="button" class="btn btn-info waves-effect" onclick="konfirmasiSimpanOrderRadiologi(${id_order}, ${lengthOrder}, ${i})"><i class="fas fa-check-circle mr-1"></i>Konfirmasi</button>`;
										rujuk = `<input type="checkbox" name="rujuk" value="${v.id}">`;

									}

									if(v.id_parent === '99' | v.id_parent === '4947'){

										if(v.konfirm !== null){

											ruangRadiologi = `<span>${((v.ruang !== '') ? v.ruang : '')}</span>`;
											

										} else {

											ruangRadiologi = `<input type="hidden" name="ruang_radiologi${i}" id="ruang-radiologi${i}">
												<span id="ruang-radiologi-label${i}"></span>
												<button type="button" class="btn btn-secondary btn-xs" id="btn-ruang-radiologi${i}" onclick="showModalRuangRadiologi(${i})"><i class="fas fa-edit mr-1"></i>Ruang Radiologi</button>`;

										}

									} else {

										if(v.konfirm !== null){

											ruangRadiologi = `<span>${((v.ruang !== '') ? v.ruang : '')}</span>`;

										} else {

											ruangRadiologi = `<input type="hidden" name="ruang_radiologi${i}" id="ruang-radiologi${i}">
											<span id="ruang-radiologi-label${i}"></span>`;

										}

									}

									let html = /* html */ `
										<tr>
											<td class="center">
												${i + 1}
												<input type="hidden" name="id_tarif${i}" id="id-tarif${i}" value="${v.id}"><input type="hidden" name="berat_badan${i}" value="${v.berat_badan}">
											</td>
											<td>${v.layanan}</td>
											<td>${ruangRadiologi}</td>
											<td><input type="hidden" name="keterangan_klinis${i}" id="keterangan_klinis${i}" value="${v.keterangan}">${v.keterangan}</td>
											<td>
												${dPjp}
											</td>
											<td class="center">
												<input type="hidden" name="cito${i}" id="cito${i}" value="${v.cito}">${((v.cito == 'ya') ? '&checkmark;' : '')}
											</td>
											<td>${v.penjamin}</td>
											<td class="center">${v.kelas}</td>
											<td class="right">${numberToCurrency(totalBiaya)}</td>
											<td class="center">
												${rujuk}
											</td>
											<td class="center">
												${btnSimpan}
											</td>
										</tr>
									`;

									totalNominal += parseInt(totalBiaya);
									$('#table-order tbody').append(html);

									if(v.id_parent !== '99' && v.id_parent !== '4947'){

										if(v.konfirm === null){

											$('#number-ruang-radiologi').val(i);
											$('#ruang-radiologi' + i).val(v.id_ruang);
											$('#ruang-radiologi-label' + i).text(((v.ruang !== '') ? v.ruang : ''));

										}

									}

								});

								html = /* html */ `
									<tr>
										<td colspan="7"></td>
										<td class="right">Total</td>
										<td class="right"><b>${numberToCurrency(totalNominal)}</b></td>
										<td></td>
										<td></td>
									</tr>
								`;

								$('#table-order tbody').append(html);

							}

						}

						$('#modal-order-radiologi').modal('show');

					}

				} else {

					messageCustom('Tidak Ada Data Berat Badan Pasien', 'Error');

				}
			},
			error: function(e) {
				accessFailed(e.status);
			},
		});
	}

	function showModalPenanggungJawabRadiologi(i) {
		$('#number-penanggung-jawab').val(i);
		$('#dokter-penanggung-jawab').val('');
		$('#s2id_dokter-penanggung-jawab a .select2-chosen').html('');
		$('#modal-dokter-penanggung-jawab').modal('show');
	}

	function showModalDokterPerujukKrad(id) {
		$('#id-order-rujuk-radiologi').val(id);
		$('#dokter-perujuk-radiologi').val('');
		$('#s2id_dokter-perujuk-radiologi a .select2-chosen').html('');
		$('#modal-dokter-perujuk-radiologi').modal('show');
	}

	function showModalRuangRadiologi(i) {
		$('#number-ruang-radiologi').val(i);
		$('#rr').val('');
		$('#s2id_rr a .select2-chosen').html('');
		$('#modal-ruangan-radiologi').modal('show');
	}

	function pilihRuangRadiologi() {
		let numberRuangRadiologi = $('#number-ruang-radiologi').val();
		let ruangRadiologi = $('#s2id_rr a .select2-chosen').html();
		let idRuangRadiologi = $('#rr').val();

		if ( idRuangRadiologi === '' ) {
            syams_validation('#rr', 'Ruang Radiologi harus dipilih.');
            return false;
        }

        syams_validation_remove('#rr');

		$('#ruang-radiologi' + numberRuangRadiologi).val(idRuangRadiologi);
		$('#ruang-radiologi-label' + numberRuangRadiologi).text(ruangRadiologi);
		$('#btn-ruang-radiologi' + numberRuangRadiologi).hide();
		$('#modal-ruangan-radiologi').modal('hide');
	}

	function pilihDokterPenanggungJawab() {
		let numberPenanggungJawab = $('#number-penanggung-jawab').val();
		let dokterPenanggungJawab = $('#s2id_dokter-penanggung-jawab a .select2-chosen').html();
		let idDokterPenanggungJawab = $('#dokter-penanggung-jawab').val();

		if ( idDokterPenanggungJawab === '' ) {
            syams_validation('#dokter-penanggung-jawab', 'Dokter Penanggung Jawab harus diisi.');
            return false;
        }

        syams_validation_remove('#dkt-dpjp');

		$('#penanggung-jawab-radiologi' + numberPenanggungJawab).val(idDokterPenanggungJawab);
		$('#penanggung-jawab-radiologi-label' + numberPenanggungJawab).text(dokterPenanggungJawab);
		$('#btn-penanggung-jawab-radiologi' + numberPenanggungJawab).hide();
		$('#modal-dokter-penanggung-jawab').modal('hide');
	}

	function pilihDokterPerujukRadiologi() {

		if ($('#id-order-rujuk-radiologi').val() === '') {
            syams_validation('#dokter-perujuk-radiologi', 'Tidak Ada id Order Radiologi, Silakan Hubungi IT');
            return false;
        }

        if ($('#dokter-perujuk-radiologi').val() === '') {
            syams_validation('#dokter-perujuk-radiologi', 'Dokter Pemesan harus diisi.');
            return false;
        }

		syams_validation_remove('#dokter-perujuk-radiologi');

		swal.fire({
			title: 'Konfirmasi Dokter Pemesan',
			text: "Apakah anda akan menyimpan Dokter Pemesan ini ?",
			icon: 'question',
			showCancelButton: true,
			confirmButtonText: '<i class="fas fa-save mr-1"></i>Simpan',
			cancelButtonText: '<i class="fas fa-times-circle mr-1"></i>Batal',
			reverseButtons: true
		}).then((result) => {
			if (result.value) {
				simpanDokterPerujuk($('#id-order-rujuk-radiologi').val());
			}		
		})
		
	}

	function simpanDokterPerujuk(idorder) {

		$.ajax({
			type: 'POST',
			url: '<?= base_url("order_radiologi/api/order_radiologi/simpan_dokter_perujuk") ?>',
			data: $('#form-dokter-perujuk-radiologi').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {

				if(typeof data.metaData !== 'undefined'){

                    if(data.metaData.code !== 200){

                        swalAlert('warning', data.metaData.code, data.metaData.message);
                    
                    } else {

                        konfirmasiOrderRadiologi(idorder, 1);
						$('#modal-dokter-perujuk-radiologi').modal('hide');
                    }

                }
				
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				messageAddFailed();
			},
		});

	}

	function konfirmasiSimpanOrderRadiologi(idorder, length, id) {

		let numberPenanggungJawab = $('#number-penanggung-jawab').val();
		let pjbRadiologi = $('#penanggung-jawab-radiologi' + numberPenanggungJawab).val();
		let btnDPJPRadiologi = $('#dkt-dpjp').val(pjbRadiologi);

		if ( btnDPJPRadiologi[0].value === '' ) {
            syams_validation('#dkt-dpjp', 'Dokter Penanggung Jawab harus diisi.');
            return false;
        }

        syams_validation_remove('#dkt-dpjp');

        let numberRuangRadiologi = $('#number-ruang-radiologi').val();
		let rrRuangRadiologi = $('#ruang-radiologi' + numberRuangRadiologi).val();
		let btnRrRadiologi = $('#r-rad').val(rrRuangRadiologi);

		if ( btnRrRadiologi[0].value === '' ) {
            syams_validation('#r-rad', 'Ruang Radiologi harus terisi.');
            return false;
        }

        syams_validation_remove('#r-rad');

        swal.fire({
			title: 'Konfirmasi Masuk Radiologi',
			text: "Apakah anda yakin akan melakukan entri pemeriksaan radiologi ?",
			icon: 'question',
			showCancelButton: true,
			confirmButtonText: '<i class="fas fa-save mr-1"></i>Simpan',
			cancelButtonText: '<i class="fas fa-times-circle mr-1"></i>Batal',
			reverseButtons: true
		}).then((result) => {
			if (result.value) {
				simpanOrderRadiologi(idorder, length, id);
			}		
		})
	}

	function simpanOrderRadiologi(idorder, length, id) {
		$.ajax({
			type: 'POST',
			url: '<?= base_url("order_radiologi/api/order_radiologi/simpan_data_order_radiologi") ?>',
			data: $('#form-order-radiologi').serialize() + '&idkirim=' + id + '&total=' + length,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {

				if(typeof data.metaData !== 'undefined'){

                    if(data.metaData.code === 201){

                        swalAlert('warning', data.metaData.code, data.metaData.message);
                        konfirmasiOrderRadiologi(idorder, $('#page-now').val());
                        
                        

                    } else {

                        konfirmasiOrderRadiologi(idorder, $('#page-now').val());
						
                    }

                }
				
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				messageAddFailed();
				konfirmasiOrderRadiologi(idorder, $('#page-now').val());
				
			},
		});
	}

	function cetakLabelRadiologi(id) {	
        var dWidth = $(window).width();
        var dHeight = $(window).height();
        var x = screen.width / 2 - dWidth / 2;
        var y = screen.height / 2 - dHeight / 2;

        window.open('<?= base_url('order_radiologi/cetak_label_radiologi/') ?>' + id, 'Cetak Label Radiologi', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
    }
</script>