<script type="text/javascript" src="<?= resource_url() ?>assets/node_modules/wizard/bwizard.js"></script>
<script>

	var dWidth = $(window).width();
    var dHeight = $(window).height();
    var x = screen.width / 2 - dWidth / 2;
    var y = screen.height / 2 - dHeight / 2;


	$(function() {
		getListDataOrderFisioterapi(1);

		$('#jenis-fisioterapi').change(function() {
			getListDataOrderFisioterapi(1);
		});

		$('#btn-reload').click(function() {
			resetAllData();
			getListDataOrderFisioterapi(1);
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

	function datetimerezmysql(waktu) {

        let tm = waktu.split('-');
        let gm = tm[2];
        let sx = tm[2].split(':');
        let fx = sx[0].split(' ');
        return fx[0] + '/' + tm[1] + '/' + tm[0] + ' ' + fx[1] + ':' + sx[1];
    }
    
	function resetAllData() {
		let filter = $('#jenis-fisioterapi').val();
		$('#id, .form-control, #pencarian, #dokter-ranap').val('');
		$('#tanggal-awal, #tanggal-akhir').val('<?= date("d/m/Y") ?>');
		$('#s2id_dokter-ranap a .select2-chosen').html('Pilih Dokter');
		$('.select2c-input').val('');
		$('.select2c-chosen').html('');
		$('#jenis-fisioterapi').val(filter);
	}

	function getListDataOrderFisioterapi(page) {
		$('#page_now').val(page);
		$.ajax({
			type: 'GET',
			url: '<?= base_url("order_fisioterapi/api/order_fisioterapi/get_list_order_fisioterapi") ?>/page/' + page,
			data: $('#form-search').serialize() + '&jenis=' + $('#jenis-fisioterapi').val(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if ((page > 1) & (data.data.length === 0)) {
					getListDataOrderFisioterapi(page - 1);
					return false;
				}

				$('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
				$('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

				$('#table-data tbody').empty();
				$.each(data.data, function(i, v) {

				

					let disabled = '';

					if (v.keterangan === 'undefined') {
						status = '<span class="blinker"><i><i class="fas fa-spinner fa-spin mr-1"></i>Belum Melakukan Terapi</i></span>';
						row_button = `<td><button type="button" title="Stop Terapi" class="btn btn-secondary btn-xs" onclick="stopTerapi('<?php echo $this->session->userdata('nama'); ?>', ${v.id_rehab_medik}, ${v.id_kunjungan}, ${v.id_tindakan}, ${v.id}, '${v.no_rm}', '${v.pasien}')"><i class="fas fa-times-circle mr-1"></i>Stop Terapi</button></td>`
					} else if (v.keterangan === 'selesai') {
						status = '<h5><span class="label label-success"><i class="fas fa-thumbs-up mr-1"></i>Selesai Terapi</span></h5>';
						row_button = `<td><button type="button" title="Batal" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="batalTerapi(${v.id_tindakan}, '${v.pasien}')"><i class="fas fa-trash"></i>Batal</button></td>`

					} else if (v.keterangan === 'batal') {
						status = '<h5><span class="label label-danger"><i class="fas fa-minus-circle mr-1"></i>Tidak Melanjutkan Terapi</span></h5>';
					} else {

						status = '<span class="blinker"><i><i class="fas fa-spinner fa-spin mr-1"></i>Belum Melakukan Terapi</i></span>';
						row_button = `<td><button type="button" title="Stop Terapi" class="btn btn-secondary btn-xs" onclick="stopTerapi('<?php echo $this->session->userdata('nama'); ?>', ${v.id_rehab_medik}, ${v.id_kunjungan}, ${v.id_tindakan}, ${v.id}, '${v.no_rm}', '${v.pasien}')"><i class="fas fa-times-circle mr-1"></i>Stop Terapi</button></td>`

					}

					if (v.total_kunjungan === 'undefined' || v.total_kunjungan === null) {
						kunjungan = '0';
					} else if (v.total_kunjungan !== null) {
						kunjungan = v.total_kunjungan;

					}

					let no = ((i + 1) + ((data.page - 1) * data.limit));
					let html = /* html */ `
						<tr>
							<td class="center">${no}</td>
							<td class="left">${v.no_rm}</td>
							<td>${v.pasien}</td>
							<td class="nowrap">${((v.tanggal_layanan !== null) ? datetimerezmysql(v.tanggal_layanan) : '')}</td>
							<td>${v.nama}</td>
							<td class="center aksi">${status}</td>${row_button}`
					;

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
		getListDataOrderFisioterapi(page);
	}

	function stopTerapi(user, id_rehab_medik, id_kunjungan, id_tindakan, id, rm, pasien) {
        bootbox.dialog({
            message: "Silakan Tentukan Pilihan Terapi untuk Pasien a/n " + pasien,
            title: "STOP TERAPI",
            buttons: {
                batal: {
                    label: '<i class="fas fa-fw fa-window-close"></i> Hentikan Terapi',
                    className: "btn-secondary",
                    callback: function() {

                    	if(id_rehab_medik === null){

                    		swalAlert('warning', 'Validasi', 'Silakan isi catatan di menu Protokol Terapi !');
                			return false;
                    	} else {

                    	stopStatusTerapi(user, id_rehab_medik, id_kunjungan, id_tindakan, id, rm); 

                    	}

                    }
                },
                masuk: {
                    label: '<i class="fas fa-fw fa-check-circle"></i> Terapi Selesai',
                    className: "btn-info",
                    callback: function() {

                    	simpanDataStatusTerapi(user, id_rehab_medik, id_kunjungan, id_tindakan, id, rm);
                        
                    }
                }
            }
        });
    }

    function batalTerapi(id_tindakan, pasien) {
        bootbox.dialog({
            message: "Batalkan Terapi untuk Pasien a/n " + pasien,
            title: "BATALKAN TERAPI",
            buttons: {
                batal: {
                    label: '<i class="fas fa-fw fa-window-close"></i> Batal Terapi',
                    className: "btn-secondary",
                    callback: function() {

                    	$.ajax({
                            type : 'DELETE',
                            url: '<?= base_url("order_fisioterapi/api/order_fisioterapi/batal_data_status_terapi") ?>/id_tindakan/'+id_tindakan,
                            cache: false,
                            dataType : 'JSON',
                            success: function(data) {
                                getListDataOrderFisioterapi($('#page_now').val());
                                messageDeleteSuccess();
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

    function simpanDataStatusTerapi(user, ir_m, id_k, id_t, id, rm) {
        $.ajax({
            type: 'POST',
            url: '<?= base_url("order_fisioterapi/api/order_fisioterapi/simpan_data_status_terapi") ?>',
            data: 'user=' + user + '&ir_m=' + ir_m + '&id_k=' + id_k + '&id_t=' + id_t + '&id_layanan_pendaftaran=' + id +'&rm=' + rm,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                $('input[name=csrf_syam]').val(data.token);
                if(data.status){

	                	let get = '';
	                	let get_message = '';
	                	get = data.status;
	                	get_message = data.message;

	                if(get === true && get_message === 1){

	                	messageCustom('Status Terapi Berhasil diselesaikan', 'Success');
	                	getListDataOrderFisioterapi($('#page_now').val());

	                }else{

	                	messageCustom('silakan tetapkan total terapi yang baru', 'Error');
	                	getListDataOrderFisioterapi($('#page_now').val());
	                }

	            } else {

	            	messageCustom('Status Terapi Gagal disimpan', 'Error');
	                	getListDataOrderFisioterapi($('#page_now').val());

	            }

           
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageEditFailed();
            }
        });
    }

    function stopStatusTerapi(user, ir_m, id_k, id_t, id, rm) {
        $.ajax({
            type: 'PUT',
            url: '<?= base_url("order_fisioterapi/api/order_fisioterapi/stop_status_terapi") ?>',
            data: 'user=' + user + '&id_k=' + id_k,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                $('input[name=csrf_syam]').val(data.token);
                if(data.status){

	                	let get = '';
	                	let get_message = '';
	                	get = data.status;
	                	get_message = data.message;

	                if(get === true && get_message === 1){

	                	messageCustom('Status Terapi Berhasil diselesaikan', 'Success');
	                	simpanDataStatusTerapi(user, ir_m, id_k, id_t, id, rm);
	                	updateStatusSrms(id_k);
	                    messageEditSuccess();
	                    getListDataOrderFisioterapi($('#page_now').val());

	                } else if(get_message === 2){

	                	messageCustom('Masih ada Terapi yang belum diselesaikan', 'Error');
	                	getListDataOrderFisioterapi($('#page_now').val());
	                	

	                } else {

	                	messageCustom('Jumlah Tindakan Lebih dari Total Program Terapi, Silakan Hapus Tindakan Terlebih Dahulu', 'Error');
	                	getListDataOrderFisioterapi($('#page_now').val());
	                }

	            } else {

	            	messageCustom('Status Terapi Gagal disimpan', 'Error');
	                	getListDataOrderFisioterapi($('#page_now').val());

	            }
	        },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageEditFailed();
            }
        });
    }

    function updateStatusSrms(id_k) {
        $.ajax({
            type: 'PUT',
            url: '<?= base_url("order_fisioterapi/api/order_fisioterapi/update_status_srms") ?>',
            data: 'id_k=' + id_k,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                $('input[name=csrf_syam]').val(data.token);
                if (data.status) {
                	messageEditSuccess();
                    getListDataOrderFisioterapi($('#page_now').val());
                } else {
                    messageEditFailed();
                }
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageEditFailed();
            }
        });
    }


</script>