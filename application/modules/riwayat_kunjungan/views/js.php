<script type="text/javascript" src="<?= resource_url() ?>assets/node_modules/wizard/bwizard.js"></script>

<script>
	$(function() {
		getListDataKunjunganPasien(1);
		$("#wizard-form").bwizard();

		// btn search data
		$('#btn-search').click(function() {
			$('#modal-search').modal('show');
		});
	});

	function getListDataKunjunganPasien(page) {
		$('#page-now-kunjungan-pasien').val(page);

		$.ajax({
			type: 'GET',
			url: '<?= base_url("riwayat_kunjungan/api/Riwayat_kunjungan/get_list_riwayat_kunjungan") ?>/page/' + page,
			data: $('#form-search').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				$('#modal-search').modal('hide');

				if ((page - 1) & (data.data.length === 0)) {
					getListDataKunjunganPasien(page - 1);
					return false;
				}

				$('#paginationKunjunganPasien').html(pagination(data.jumlah, data.limit, data.page, 1));
				$('#summaryKunjunganPasien').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

				$('#table-data-kunjungan-pasien tbody').empty();

				$.each(data.data, function(i, v) {										
					let html = /* html */ `
						<tr>
							<td class="center v-center">${datetimefmysql(v.tanggal_layanan)}</td>							
							<td class="center v-center">${((v.no_rm))}</td>
							<td class="center v-center">${((v.nama_pasien))}</td>							
							<td class="center v-center"><button type="button" title="Klik untuk melihat kunjungan pasien" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="showRiwayatLaboratorium(${v.id})"><i class="fas fa-fw fa-eye"></i></button></td>"		
						</tr>
					`;

					$('#table-data-kunjungan-pasien tbody').append(html);
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

	function showRiwayatLaboratorium(id) {
		getLaboratorium(id);
		getRadiologi(id);
		
		$('#modal-riwayat-laboratorium-label').html('Riwayat Kunjungan');
		$('#modal-riwayat-laboratorium').modal('show');
	}

	function getLaboratorium(id) {
		$('#req_lab').empty();
        $.ajax({
            type : 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/pemeriksaan_laboratorium_detail") ?>/id/'+id,
            cache: false,
            dataType : 'json',
            success: function(data) {
                if (data.length > 0) {
                    var str = '';
                    $.each(data, function(i, v){
                        var hapus_lab = '';
                        if (v.waktu_hasil === null) {
                        };

                        str = '<table class="table table-sm table-detail table-striped">'+
                                    '<tr><td width="15%"><strong>Waktu Order</strong></td><td>'+((v.waktu_konfirm !== null)?datetimefmysql(v.waktu_konfirm):'')+'</td></tr>'+
                                    '<tr><td width="15%"><strong>Waktu Hasil</strong></td><td>'+((v.waktu_hasil !== null)?datetimefmysql(v.waktu_hasil):'')+'</td></tr>'+
                                    '<tr><td width="15%"><strong>Dokter Pemesan</strong></td><td>'+v.dokter+'</td></tr>'+
                                    '<tr><td width="15%"><strong>Analis Laboratorium</strong></td><td>'+v.analis_lab+'</td></tr>'+
                                    '<tr><td width="15%"></td>'+
                                        '<td></td>'
                                        // '<td><button title="Klik untuk melihat order laboratorium" type="button" class="btn btn-secondary btn-xxs mr-1" onclick="cetak_pemeriksaan_laboratorium('+v.id+')"><i class="fa fa-print"></i> Nota Order</button>'+
                                        // '<button title="Klik untuk melihat hasil laboratorium" type="button" class="btn btn-secondary btn-xxs" onclick="cetak_hasil_laboratorium('+v.id+')"><i class="fa fa-print"></i> Tampilkan Hasil</button></td>'+
                                    '</tr>'+
                                    hapus_lab+
                                  '</table>';
                            $('#req_lab').append(str);

                        str = '<table class="table table-hover table-striped table-sm color-table info-table">'+
                                    '<thead><tr>'+
                                            '<th width="15%" class="left">Layanan</th>'+
                                            '<th width="40%" class="left"></th>'+
                                            '<th width="40%" class="left">Status</th>'+
                                            '<th align="center" width="5%"></th>'+
                                    '</tr></thead><tbody>';
                       

                        $.each(v.detail, function(j, x){
                              str += '<tr>'+
                                    '<td><b>'+ j +'</b></td>'+
                                    '<td></td>'+
                                    '<td></td>'+
                                    '<td></td>'+
                                    '</tr>';
                            
                            var hapus = '';
                            $.each(x, function(k, z){
                                if (z.status == 'Belum') {
                                    //hapus = '<button type="button" class="btn btn-secondary btn-xs" onclick="hapus_detail_lab(this, '+z.id+')"><i class="fa fa-trash-o"></i></button>';
                                };
                                str += '<tr>'+
                                    '<td></td>'+
                                    '<td>'+z.layanan_lab+'</td>'+
                                    '<td>'+z.konfirmasi+'</td>'+
                                    '<td align="center">'+hapus+'</td>'+
                                    '</tr>';
                            });
                        });

                        str += '</tbody></table><br/><hr/>';
                        $('#req_lab').append(str);
                    });

                }
            },
            error: function(e){
                accessFailed(e.status);
            }
        });
	}

	function getRadiologi(id) {
		$('#req_rad').empty();
        $.ajax({
            type : 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/pemeriksaan_radiologi_detail") ?>/id/'+id,
            cache: false,
            dataType : 'json',
            success: function(data) {
                if (data.length > 0) {
                    var str = '';
                    $.each(data, function(i, v){
                        var hapus_rad = '';
                        if (v.waktu_hasil === null) {
                        };

                        str = '<table class="table table-sm table-detail table-striped">'+
                                    '<tr><td width="15%"><strong>Waktu Order</strong></td><td>'+((v.waktu_konfirm !== null)?datetimefmysql(v.waktu_konfirm):'')+'</td></tr>'+
                                    '<tr><td width="15%"><strong>Waktu Hasil</strong></td><td>'+((v.waktu_hasil !== null)?datetimefmysql(v.waktu_hasil):'')+'</td></tr>'+
                                    '<tr><td width="15%"><strong>Dokter Pemesan</strong></td><td>'+v.dokter+'</td></tr>'+
                                    '<tr><td width="15%"><strong>Radiografer</strong></td><td>'+v.radiografer+'</td></tr>'+
                                    '<tr><td width="15%"></td>'+
                                        '<td></td>' 
                                        // '<td><button title="Klik untuk melihat order radiologi" type="button" class="btn btn-secondary btn-xxs mr-1" onclick="cetak_pemeriksaan_radiologi('+v.id+')"><i class="fa fa-print"></i> Nota Order</button>'+
                                        // '<button title="Klik untuk melihat hasil radiologi" type="button" class="btn btn-secondary btn-xxs" onclick="cetak_hasil_radiologi('+v.id+')"><i class="fa fa-print"></i> Tampilkan Hasil</button></td>'+
                                    '</tr>'+
                                    hapus_rad+
                                  '</table>';
                            $('#req_rad').append(str);

                        str = '<table class="table table-hover table-striped table-sm color-table info-table">'+
                                    '<thead><tr>'+
                                            '<th width="15%" class="left">Layanan</th>'+
                                            '<th width="40%" class="left"></th>'+
                                            '<th width="40%" class="left">Status</th>'+
                                            '<th align="center" width="5%"></th>'+
                                    '</tr></thead><tbody>';
                       

                        $.each(v.detail, function(j, x){
                              str += '<tr>'+
                                    '<td><b>'+ j +'</b></td>'+
                                    '<td></td>'+
                                    '<td></td>'+
                                    '<td></td>'+
                                    '</tr>';
                            
                            var hapus = '';
                            $.each(x, function(k, z){
                                if (z.status == 'Belum') {
                                    //hapus = '<button type="button" class="btn btn-default btn-xs" onclick="hapus_detail_lab(this, '+z.id+')"><i class="fa fa-trash-o"></i></button>';
                                };
                                str += '<tr>'+
                                    '<td></td>'+
                                    '<td>'+z.layanan_radiologi+'</td>'+
                                    '<td>'+z.konfirmasi+'</td>'+
                                    '<td align="center">'+hapus+'</td>'+
                                    '</tr>';
                            });
                        });

                        str += '</tbody></table><br/><hr/>';
                        $('#req_rad').append(str);
                    });

                }
            },
            error: function(e){
                accessFailed(e.status);
            }
        });
	}
</script>
