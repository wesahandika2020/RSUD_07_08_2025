<style>
	/* #parent {
		height: 450px;
		overflow-y: auto;
		overflow-x: 0;
	} */
</style>
<script>
	var dWidth = $(window).width()
	var dHeight = $(window).height()
	var x = screen.width / 2 - dWidth / 2
	var y = screen.height / 2 - dHeight / 2

	$(function() {
		$('.lap-01').hide();
		$('#jenis-tanggal').val('keluar');

		$('#jenis-laporan').change(function() {

			if ($('#jenis-laporan').val() !== '') {
				resetAllForm()
				$('#modal-search').modal('show')

				$('#label-tanggal').empty();
				       if ($('#jenis-laporan').val() == '1'){  	$('#label-tanggal').append('Tanggal') ;
				} else { $('#label-tanggal').append('Tanggal') ; }

			} else {
				$('#modal-search').modal('hide')
			}

			if($('#jenis-laporan').val() == '1'){
				$('#dokter-search').parent().parent().hide();	
				$('#jenis_tanggal').parent().parent().show();		
				$('#jenis-pendaftaran-search').parent().parent().show();		
			} else {				
				$('#dokter-search').parent().parent().hide();	
				$('#jenis_tanggal').parent().parent().hide();	
				$('#jenis-pendaftaran-search').parent().parent().hide();	
			}

		})

		// Format Tanggal
		$('#tanggal-awal, #tanggal-akhir, #tanggal-harian').datepicker({
			format: 'dd/mm/yyyy',
		}).on('changeDate', function() {
			$(this).datepicker('hide')
		})

		$('#btn-search').click(function() {
			if ($('#jenis-laporan').val() !== '') {
				$('#modal-search').modal('show')
			} else {
				$('#modal-search').modal('hide')
			}
		})

		$('#periode-laporan').change(function() {
			if ($('#periode-laporan').val() == 'Harian') {
				$('.harian, #tanggal-harian').show()
				$('.bulanan, .rentang-waktu').hide()
			}
			if ($('#periode-laporan').val() == 'Bulanan') {
				$('.bulanan, #bulan, #tahun').show()
				$('.harian, .rentang-waktu, #tanggal-awal, #tanggal-akhir').hide()
			}
			if ($('#periode-laporan').val() == 'Rentang Waktu') {
				$('.rentang-waktu, #tanggal-awal, #tanggal-akhir').show()
				$('.harian, #tanggal-harian, .bulanan, #bulan, #tahun').hide()
			}
		})

		// remove validasi keyup
		$('.validasi-input, .form-control').keyup(function() {
			if ($(this).val() !== '') {
				syams_validation_remove(this);
			}
		})

		$('#btn-reload').click(function() {
			reloadData();
			resetAllForm();
		})	

		$('#btn-export').click(function() {
			// if ($('#jenis-laporan').val() == '1') {				
			// 	window.open('<?= base_url('laporan_keuangan_casemix/export_laporan_01?') ?>' + $('#form-search').serialize())
			// } else {
				swalAlert('info', 'INFO', `Export belum tersedia, harap hubungi IT.`)
			// }
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
				var markup = '<b>' + data.nama + '</b><br/><i>' + data.spesialisasi + '</i>';
				return markup;
			},
			formatSelection: function(data) {
				return data.nama;
			}
		})

		$('#penjamin-search').select2({
			ajax: {
				url: "<?= base_url('laporan_keuangan_casemix/api/laporan_keuangan_casemix/penjamin_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function(term, page) {
					return {
						q: term,
						page: page,
						jenis_laporan: $('#jenis-laporan').val()
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
				var markup = '<b>' + data.nama + '</b>';
				return markup;
			},
			formatSelection: function(data) {
				return data.nama;
			}
		})

		$('#jenis-pendaftaran-search').select2({
			ajax: {
				url: "<?= base_url('laporan_keuangan_casemix/api/laporan_keuangan_casemix/jenis_pendaftaran_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				data: function(term, page) {
					return {
						q: term,
						page: page
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
				var markup = '<b>' + data.nama + '</b>';
				return markup;
			},
			formatSelection: function(data) {
				return data.nama;
			}
		})

		$('#id-pasien-search').select2({
            ajax: {
                url: "<?= base_url('registrations/api/registrations_auto/pasien_auto') ?>",
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
                var markup = '<b>' + data.id + '</b>' + ' ' + data.nama + '</b>' + ' ( ' + data.tanggal_lahir + ' )  ' + data.no_identitas + ' <br/>' + data.alamat;
                return markup;
            },
            formatSelection: function(data) {
                return data.id + ' - ' + data.nama;
            }
        });

		$('.select2-input').change(function() {
			if ($(this).val() !== '') {
				syams_validation_remove(this);
			}
		});

	})

	function reloadData() {
		$('#jenis-laporan').val('');
		hideLaporan();
		resetAllForm();
	}

	function resetAllForm() {
		$('#periode-laporan').val('Harian');
		$('#tanggal-awal, #tanggal-akhir, #tanggal-harian').val('<?= date('d/m/Y') ?>');
		$('#bulan').val('<?= date('m') ?>');
		$('.harian, #tanggal-harian').show();
		$('.bulanan, .rentang-waktu').hide();		
		$('#dokter-search, #penjamin-search, #jenis-pendaftaran-search').val('');
		$('#s2id_dokter-search a .select2-chosen').html('- Semua Dokter -')
		$('#s2id_penjamin-search a .select2-chosen').html('- Semua Pemjamin -')
		$('#s2id_jenis-pendaftaran-search a .select2-chosen').html('- Semua Jenis Pendaftaran -')
	}

	function hideLaporan() {
		$('.lap-01').hide();
		$('.lap-01, #table-data-01 tbody').hide();
	}

	function getLaporanKeuanganCasemix(page) {
		hideLaporan();

		// Laporan Pendapatan Berdasarkan Layanan Dokter DPJP
		if ($('#jenis-laporan').val() == '1') {

			var stop = false;
			// if ($('#penjamin-search').val() === '') {
			// 	syams_validation('#penjamin-search', 'Penjamin tidak boleh kosong !');
			// 	stop = true;
			// };

			if (stop) {
				return false;
			};


			$('#page-now').val(page);
			$('.lap-01, #tabs-lap01').show();
			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_keuangan_casemix/api/laporan_keuangan_casemix/get_list_kunjungan') ?>/page/' + page ,
				data: $('#form-search').serialize(),
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					if (data) {
						laporanKeuanganCasemix01(data)
					}
				},
				complete: function() {
					hideLoader()
					$('#modal-search').modal('hide')
				},
				error: function(e) {
					accessFailed(e.status)
				},
			})		
		} 
	}

	function laporanKeuanganCasemix01(data) {
		$('#label-lap-01').empty();
		let jns_tgl  = data.jns_tgl  != '' ? `<p><b>Jenis Tanggal &emsp;</b> ${data.jns_tgl}</p>` : '';
		let periode  = data.periode  != '' ? `<p><b>Periode &emsp;&emsp;&emsp;</b> ${data.periode}</p>` : '';
		let penjamin = data.penjamin != '' ? `<p><b>Penjamin &emsp;&emsp;</b> ${data.penjamin}</p>` : '';
		let pasien   = data.pasien != '' ? `<p><b>Pasien &emsp;&emsp;&emsp;</b> ${data.pasien}</p>` : '';
		let label_01 = jns_tgl+periode+penjamin+pasien;
		$('#label-lap-01').append(label_01);

		$('#pagination_01').html(pagination(data.jml_data, data.limit, data.page, 1));
		$('#summary_01').html(page_summary(data.jml_data, data.data.length, data.limit, data.page));

		let html = '';
		$('#table-data-01').empty()				
			html += `<thead>
						<tr>
							<th class="center">No</th>	
							<th class="center">No Register</th>
							<th class="center">No RM</th>
							<th class="left">Nama Pasien</th>
							<th class="center">Tanggal Daftar</th>
							<th class="center">Tanggal Keluar</th>
							<th class="left">Jenis Pendaftaran</th>
							<th class="left">Jenis Rawat</th>
							<th class="center">Penjamin</th>
							<th class="right">Tagihan</th>
							<th class="left">Tgl Layanan</th>
							<th class="left">Ruang</th>
							<th class="left">Tindak Lanjut</th>
							<th class="left">Ket</th>
							<th class="center"></th>
						</tr>
					</thead>
				<tbody>`;

				$.each(data.data, function(i, v) {
					let tgl_layanan 	= '';
					let ruang 			= '';
					let tindak_lanjut 	= '';
					let ket 			= '';
					$.each(v.kunjungan, function(ik, vk) {
						tgl_layanan 	+= ((vk.tanggal_layanan !== null) ? datetimefmysql(vk.tanggal_layanan) : '')   + '<br>' ;
						ruang 			+= vk.ruang + '<br>' ;						
						vk.tindak_lanjut==null ? tindak_lanjut+= '<span class="blinker"><i><i class="fas fa-fw fa-spinner fa-spin m-r-5"></i>Belum Pulang</i></span> <br>' : tindak_lanjut += vk.tindak_lanjut + '<br>' ;
						vk.ket			=='-' ? ket+=vk.ket+ '<br>' : ket += 'Asal order: '+vk.ket + '<br>' ;
					})	
					
					let data_pasien = "'" + v.id + "','" + v.id_pasien + "'";

					html += `<tr>
						<td class="center">${((i + 1) + ((data.page - 1) * data.limit))}</td>
						<td class="center">${v.no_register}</td>
						<td class="center">${v.id_pasien}</td>
						<td class="left">${v.nama_pasien}</td>
						<td class="center">${((v.tanggal_daftar !== null) ? datetimefmysql(v.tanggal_daftar) : '')}</td>
						<td class="center">${((v.tanggal_keluar !== null) ? datetimefmysql(v.tanggal_keluar) : '')}</td>
						<td class="left">${v.jenis_pendaftaran}</td>
						<td class="left">${v.jenis_rawat}</td>
						<td class="center">${v.penjamin}</td>
						<td class="right">${'Rp. ' + money_format(v.tagihan)}</td>
						<td class="left">${tgl_layanan}</td>
						<td class="left">${ruang}</td>
						<td class="left">${tindak_lanjut}</td>
						<td class="left">${ket}</td>
						<td align="right" style="display:flex;justify-content:flex-end">
							<button type="button" class="btn btn-secondary btn-xs mr-1" title="Rincian Tagihan" onclick="laporanKeuanganCasemix01Tagihan('${v.id}','${v.no_register}','${v.id_pasien}','${v.nama_pasien}','${v.tanggal_daftar}','${v.tanggal_keluar}','${v.tagihan}')"><i class="fas fa-fw fa-eye mr-1"></i>Detail</button>
						</td>	
					</tr>`
				})	
		$('#table-data-01').append(html + '</tbody>')
	}

	function laporanKeuanganCasemix01Tagihan(id,no_register,id_pasien,nama_pasien,tanggal_daftar,tanggal_keluar,tagihan) {
		resetDetailTagihan();
		$('#id-pendaftaran-tagihan').val(id);
		$('#no-register-tagihan').html(no_register);
		$('#id-pasien-tagihan').html(id_pasien);
		$('#nama-pasien-tagihan').html(nama_pasien);
		$('#tanggal-daftar-tagihan').html(tanggal_daftar);
		$('#tanggal-keluar-tagihan').html(tanggal_keluar);
		$('#tagihan').html('Rp. ' + money_format(tagihan));

		$.ajax({
			type: 'GET',
			url: '<?= base_url('laporan_keuangan_casemix/api/laporan_keuangan_casemix/get_list_keuangan') ?>',
			data: 'id=' + id,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {

				$.each(data.detail, function(i, v) {
					html += `<tr>
						<td class="center">${((i + 1) + ((data.page - 1) * data.limit))}</td>
						<td class="center">${v.no_register}</td>
						<td class="center">${v.id_pasien}</td>
						<td class="left">${v.nama_pasien}</td>
						<td class="center">${((v.tanggal_daftar !== null) ? datetimefmysql(v.tanggal_daftar) : '')}</td>
						<td class="center">${((v.tanggal_keluar !== null) ? datetimefmysql(v.tanggal_keluar) : '')}</td>
						<td class="left">${v.jenis_pendaftaran}</td>
						<td class="left">${v.jenis_rawat}</td>
						<td class="right">${'Rp. ' + money_format(v.tagihan)}</td>
						<td class="left">${tgl_layanan}</td>
						<td class="left">${ruang}</td>
						<td class="left">${tindak_lanjut}</td>
						<td class="left">${ket}</td>
						<td align="right" style="display:flex;justify-content:flex-end">
							<button type="button" class="btn btn-secondary btn-xs mr-1" title="Rincian Tagihan" onclick="laporanKeuanganCasemix01Tagihan('${v.id}','${v.no_register}','${v.id_pasien}','${v.nama_pasien}','${v.tanggal_daftar}','${v.tanggal_keluar}','${v.tagihan}')"><i class="fas fa-fw fa-eye mr-1"></i>Detail</button>
						</td>	
					</tr>`
				})	

				let administrasi_tagihan = 0;
				let obat_tagihan 		 = data.barang_obat.total ?? 0;
				let obat_tagihan_retur 	 = data.barang_obat_retur.total ?? 0;
				let alkes_tagihan 		 = data.barang_alkes.total ?? 0;
				let alkes_tagihan_retur  = data.barang_alkes_retur.total ?? 0;
				let ranap_tagihan		 = data.tarif_kamar.total ?? 0;
				let icare_tagihan		 = data.tarif_kamar_icare.total ?? 0;
				let igd_tagihan			 = data.igd.total ?? 0;

				let dokter_tagihan		 = data.dokter.total ?? 0;
				let lab_tagihan			 = data.lab.total ?? 0;
				let rad_tagihan			 = data.rad.total ?? 0;
				let operatif_tagihan	 = data.operatif.total ?? 0;
				let nonoperatif_tagihan	 = data.non_operatif.total ?? 0;
				let keperawatan_tagihan	 = data.keperawatan.total ?? 0;

				let darah_tagihan		 = data.darah.total ?? 0;
				let ambulan_tagihan		 = data.ambulan.total ?? 0;
				let alatbantu_tagihan	 = data.alat_bantu.total ?? 0;
				let rehab_tagihan		 = 0;
				let total_tagihan		 = parseInt(administrasi_tagihan) + (parseInt(obat_tagihan) - parseInt(obat_tagihan_retur)) + (parseInt(alkes_tagihan) - parseInt(alkes_tagihan_retur)) + parseInt(ranap_tagihan) + parseInt(icare_tagihan) + parseInt(igd_tagihan) + 
										   parseInt(dokter_tagihan) + parseInt(lab_tagihan) + parseInt(rad_tagihan) + parseInt(operatif_tagihan) + parseInt(nonoperatif_tagihan) + parseInt(keperawatan_tagihan) +
										   parseInt(darah_tagihan) + parseInt(ambulan_tagihan) + parseInt(alatbantu_tagihan) + parseInt(rehab_tagihan);

				$('#administrasi-tagihan').val(money_format(administrasi_tagihan));
				$('#obat-tagihan').val(money_format(obat_tagihan - obat_tagihan_retur));
				$('#alkes-tagihan').val(money_format(alkes_tagihan - alkes_tagihan_retur));
				$('#ranap-tagihan').val(money_format(ranap_tagihan));
				$('#icare-tagihan').val(money_format(icare_tagihan));
				$('#igd-tagihan').val(money_format(igd_tagihan));

				$('#dokter-tagihan').val(money_format(dokter_tagihan));
				$('#lab-tagihan').val(money_format(lab_tagihan));
				$('#rad-tagihan').val(money_format(rad_tagihan));
				$('#operatif-tagihan').val(money_format(operatif_tagihan));
				$('#nonoperatif-tagihan').val(money_format(nonoperatif_tagihan));
				$('#keperawatan_tagihan').val(money_format(keperawatan_tagihan));

				$('#darah-tagihan').val(money_format(darah_tagihan));
				$('#ambulan-tagihan').val(money_format(ambulan_tagihan));
				$('#alatbantu-tagihan').val(money_format(alatbantu_tagihan));
				$('#rehab-tagihan').val(money_format(rehab_tagihan));
				$('#total-tagihan').val(money_format(total_tagihan));
				$('#selisih-tagihan').val(money_format(total_tagihan-tagihan));


				if(tagihan == total_tagihan){
					$('#notif-cek-tagihan').html('');					
					$('#selisih-tagihan').parent().parent().parent().hide();	
				} else {
					$('#notif-cek-tagihan').html('TOTAL TAGIHAN BERBEDA ! Segera Hubungi IT !');
					$('#selisih-tagihan').parent().parent().parent().show();	
				}
			},
			complete: function() {	
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status)
			},
		})	
		
		$('#modal-tagihan').modal('show');
		$('#modal-tagihan-label').html('Rincian Tagihan');		
	}
	
	function resetDetailTagihan() {
		$('#id-pendaftaran-tagihan').val('');
		$('#no-register-tagihan').html('');
		$('#id-pasien-tagihan').html('');
		$('#nama-pasien-tagihan').html('');
		$('#tanggal-daftar-tagihan').html('');
		$('#tanggal-keluar-tagihan').html('');
		$('#tagihan').html('');

		$('#administrasi-tagihan').val('');
		$('#obat-tagihan').val('');
		$('#alkes-tagihan').val('');
		$('#ranap-tagihan').val('');
		$('#icare-tagihan').val('');
		$('#igd-tagihan').val('');

		$('#dokter-tagihan').val('');
		$('#lab-tagihan').val('');
		$('#rad-tagihan').val('');
		$('#operatif-tagihan').val('');
		$('#nonoperatif-tagihan').val('');
		$('#keperawatan_tagihan').val('');

		$('#darah-tagihan').val('');
		$('#ambulan-tagihan').val('');
		$('#alatbantu-tagihan').val('');
		$('#rehab-tagihan').val('');
		$('#total-tagihan').val('');
		$('#notif-cek-tagihan').html('');		
	}

	function paging(page) {
		getLaporanKeuanganCasemix(page)
	}

	function notif_question(type) { 

		$('#table-detail-tagihan-obat-retur').hide();
		$('#table-detail-tagihan-alkes-retur').hide();
		let id 		 = $('#id-pendaftaran-tagihan').val();
		let judul    = '';
		let subjudul = '';
		let html 	 = '';

	// 	} else if(type==1){ swalAlert('info', 'Biaya Administrasi	', ``);
	// 	} else if(type==16){ swalAlert('info', 'Biaya Rehabilitas Medis', ``); }

			   if(type==2) { judul='Biaya Obat'; subjudul = 'Kategori Obat';
		} else if(type==3) { judul='Biaya Alkes'; subjudul = 'Kategori Alkes';
		} else if(type==4) { judul='Biaya Kamar Rawat Inap'; subjudul = 'Biaya rawat inap X Total hari rawat';
		} else if(type==5) { judul='Biaya Kamar Intensif Care'; subjudul = 'Biaya rawat kamar intensif care X Total hari rawat';
		} else if(type==6) { judul='Biaya IGD'; subjudul = 'Tindakan IGD';
		} else if(type==7) { judul='Biaya Dokter'; subjudul = 'Master Layanan yang memiliki id jenis pemeriksaan 16';
		} else if(type==8) { judul='Biaya Laboratorium'; subjudul = 'Seluruh biaya laboratorium';
		} else if(type==9) { judul='Biaya Radiologi'; subjudul = 'Seluruh biaya radiologi';
		} else if(type==10){ judul='Biaya Tindakan Operatif'; subjudul = 'Tindakan operasi yang di order oleh layanan';
		} else if(type==11){ judul='Biaya Tindakan Non Operatif'; subjudul = 'Tindakan operasi yang di tambahkan';
		} else if(type==12){ judul='Biaya Keperawatan'; subjudul = 'Seluruh tindakan kecuali tindakan IGD';
		} else if(type==13){ judul='Biaya Pelayanan Darah'; subjudul = 'Seluruh biaya pelayanan darah';
		} else if(type==14){ judul='Biaya Ambulance'; subjudul = 'Seluruh biaya ambulance';
		} else if(type==15){ judul='Biaya Alat Bantu'; subjudul = 'Seluruh biaya alat bantu';
		} else {
			type='';
			swalAlert('info', 'Masih proses pekerjaan', `Silahkan hubungi IT !`)
		}
		
		if(type != ''){
			$('#modal-detail-tagihan').modal('show');		
			$('#label-judul-tagihan').html(judul);
			$('#label-subjudul-tagihan').html(subjudul);
			$('#table-detail-tagihan tbody').empty();	
			$('#label-subjudul-tagihan-obat-retur').html('');

			$.ajax({
				type: 'GET',
				url: '<?= base_url('laporan_keuangan_casemix/api/laporan_keuangan_casemix/get_detail_keuangan') ?>',
				data: 'id=' + id + '&type=' + type,
				cache: false,
				dataType: 'JSON',
				beforeSend: function() {
					showLoader()
				},
				success: function(data) {
					$('#label-subjudul-total-tagihan').html('<b>Total : Rp. ' + money_format(data.total) + '</b>');
					$.each(data.detail, function(i, v) {
						let nama = ''
						type == 4 ? nama = v.nominal + ' X ' + v.durasi +' hari' : nama = v.nama;
						html += `<tr>
							<td class="center">${(i + 1)}</td>
							<td class="center">${((v.tanggal_layanan !== null) ? datetimefmysql(v.tanggal_layanan) : '')}</td>
							<td class="center">${v.ruang}</td>
							<td class="center">${((v.tanggal !== null) ? datetimefmysql(v.tanggal) : '')}</td>
							<td class="left">${nama}</td>
							<td class="right">${ money_format(v.total) }</td>
						</tr>`
					})	

					$('#table-detail-tagihan tbody').append(html);
					
					$('#label-subjudul-tagihan-obat-retur').html('');
					$('#label-subjudul-total-tagihan-obat-retur').html('');
					$('#label-subjudul-tagihan-alkes-retur').html('');
					$('#label-subjudul-total-tagihan-alkes-retur').html('');

					type == '2' ? notif_question_retur_obat(id) : '';
					type == '3' ? notif_question_retur_alkes(id) : '';
				},
				complete: function() {	
					hideLoader()
				},
				error: function(e) {
					accessFailed(e.status)
				},
			})	
		}
		
	}

	function notif_question_retur_obat(id) { 		
		$('#table-detail-tagihan-obat-retur tbody').empty();
		let html = '';
		$.ajax({
			type: 'GET',
			url: '<?= base_url('laporan_keuangan_casemix/api/laporan_keuangan_casemix/get_detail_keuangan') ?>',
			data: 'id=' + id + '&type=16',
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {				
				$('#label-subjudul-total-tagihan-obat-retur').html('<b>Total : Rp. ' + money_format(data.total) + '</b>');
				$.each(data.detail, function(i, v) {	
					if(data.detail != null){
						html += `<tr>
									<td class="center">${(i + 1)}</td>
									<td class="left">${v.nama}</td>
									<td class="center">${v.qty}</td>
									<td class="right">${ money_format(v.harga_jual) }</td>
									<td class="right">${ money_format(v.total) }</td>
								</tr>`
						$('#table-detail-tagihan-obat-retur').show();						
						$('#label-subjudul-tagihan-obat-retur').html('Retur Obat');
					}					
				})	
				$('#table-detail-tagihan-obat-retur tbody').append(html);
			},
			complete: function() {	
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status)
			},
		})	
	}

	function notif_question_retur_alkes(id) { 		
		$('#table-detail-tagihan-alkes-retur tbody').empty();
		let html = '';
		$.ajax({
			type: 'GET',
			url: '<?= base_url('laporan_keuangan_casemix/api/laporan_keuangan_casemix/get_detail_keuangan') ?>',
			data: 'id=' + id + '&type=17',
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {				
				$('#label-subjudul-total-tagihan-alkes-retur').html('<b>Total : Rp. ' + money_format(data.total) + '</b>');
				$.each(data.detail, function(i, v) {	
					if(data.detail != null){
						html += `<tr>
									<td class="center">${(i + 1)}</td>
									<td class="left">${v.nama}</td>
									<td class="center">${v.qty}</td>
									<td class="right">${ money_format(v.harga_jual) }</td>
									<td class="right">${ money_format(v.total) }</td>
								</tr>`
						$('#table-detail-tagihan-alkes-retur').show();						
						$('#label-subjudul-tagihan-alkes-retur').html('Retur Alkes');
					}					
				})	
				$('#table-detail-tagihan-alkes-retur tbody').append(html);
			},
			complete: function() {	
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status)
			},
		})	
	}

</script>