<script>
	function addVisitasi() {
		let waktu = get_date_app();
		let html = '';
		let numb = $('.number-visitasi').length;
		let tensi_sistole = $('#tensi-sistolik').val();
		let tensi_diastole = $('#tensi-diastolik').val();
		let suhu = $('#suhu').val();
		let nadi = $('#nadi').val();
		let respirasi = $('#rr').val();
		let nafas = $('#nps').val();
		let keluhan_utama = $('#keluhan-utama').val();
		let alergi = $('#alergi').val();
		let urine = $('#urine').val();

		let stop = false;
		if (tensi_sistole === '') {
			syams_validation('.tensi-s', 'Tensi sistolik harus diisi.');
			stop = true;
		}

		if (tensi_diastole === '') {
			syams_validation('.tensi-d', 'Tensi diastolik harus diisi.');
			stop = true;
		}

		if (nadi === '') {
			syams_validation('.nadi', 'Nadi harus diisi.');
			stop = true;
		}

		if (suhu === '') {
			syams_validation('.suhu', 'Suhu harus diisi.');
			stop = true;
		}

		if (respirasi === '') {
			syams_validation('.respirasi', 'Respirasi harus diisi.');
			stop = true;
		}

		if (nafas === '') {
			syams_validation('.nafas', 'Nafas harus diisi.');
			stop = true;
		}
		
		if (alergi === '') {
			syams_validation('.alergi', 'Alergi harus diisi.');
			stop = true;
		}
		
		if (stop) {
			return false;
		}

		html = /* html */ `
			<tr>
				<td width="5%" class="number-visitasi center"></td>
				<td width="10%">${waktu}</td>
				<td width="10%" class="center">
					<input type="hidden" name="tensi_s[]" value="${tensi_sistole}">${tensi_sistole} / 
					<input type="hidden" name="tensi_d[]" value="${tensi_diastole}">${tensi_diastole} mmHg
				</td>
				<td width="7%" class="center">
					<input type="hidden" name="nadi_ri[]" value="${nadi}">${nadi} /Mnt 
				</td>
				<td width="7%" class="center">
					<input type="hidden" name="suhu_ri[]" value="${suhu}">${suhu} &#8451; 
				</td>
				<td width="7%" class="center">
					<input type="hidden" name="nafas_ri[]" value="${nafas}">${nafas} /Mnt 
				</td>
				<td width="7%" class="center">
					<input type="hidden" name="respirasi_ri[]" value="${respirasi}">${respirasi} /Mnt 
				</td>
				<td>
					<input type="hidden" name="urine_ri[]" value="${urine}">${urine} cc
				</td>
				<td>
					<input type="hidden" name="keluhan_utama_ri[]" value="${keluhan_utama}">${keluhan_utama} 
				</td>
				<td>
					<input type="hidden" name="alergi_ri[]" value="${alergi}">${alergi} 
				</td>
				<td width="5%" class="right">
					<button type="button" class="btn btn-secondary btn-xs" onclick="removeMe(this)"><i class="fas fa-trash-alt"></i></button>
				</td>
			</tr>
		`;

		$('#table-visitasi tbody').append(html);
		$('.visitasi-input').val('');
	}

	function showVisitasi(data) {
		$('#table-visitasi tbody').empty();
		let accountGroup = "<?= $this->session->userdata('account_group') ?>";
		if (data !== null) {
			$.each(data, function(i, v) {
				let html = /* html */ `
					<tr>
						<td width="5%" class="number-visitasi center">${(++i)}</td>
						<td width="10%">${v?.waktu ? datetimefmysql(v.waktu) : ''}</td>
						<td width="10%" class="center">${v.tensi_sistolik} / ${v.tensi_diastolik} mmHg</td>
						<td width="7%" class="center">${v.nadi} /Mnt</td>
						<td width="7%" class="center">${v.suhu} &#8451;</td>
						<td width="7%" class="center">${v.nps} /Mnt</td>
						<td width="7%" class="center">${v.rr} /Mnt</td>
						<td width="8%" class="center">${v.urine !== null ? v.urine+' cc' : "-"} </td>
						<td width="17%" class="left">${v.keluhan_utama}</td>	
						<td width="17%" class="left">${v.alergi !== null ? v.alergi : "-"}</td>
						<td width="5%" class="right">
							${accountGroup === 'Admin' ? '<button type="button" class="btn btn-secondary btn-xs" onclick="editVisitasi(this, '+v.id+')"><i class="fas fa-edit"></i></button><button type="button" class="btn btn-secondary btn-xs" onclick="hapusVisitasi(this, '+v.id+')"><i class="fas fa-trash-alt"></i></button>' : '' }
						</td>
					</tr>
				`;
				$('#table-visitasi tbody').append(html);
			})
		}
	}

	function hapusVisitasi(obj, id) {
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
							url: '<?= base_url("pelayanan/api/pelayanan/hapus_visitasi") ?>/' + id,
							cache: false,
							dataType: 'JSON',
							success: function(data) {
								if (data.status) {
									messageCustom(data.message, 'Success');
									removeList(obj);
								} else {
									customAlert('Hapus Visitasi', data.message);
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

	function editVisitasi(obj, id) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url("pelayanan/api/pelayanan/get_visitasi") ?>/id/' + id,
			cache: false,
			dataType: 'JSON',
			success: function(data) {
				if (data !== null) {
					$('#id-visitasi').val(id);
					$('#tensi-sistolik-edit').val(data.tensi_sistolik);
					$('#tensi-diastolik-edit').val(data.tensi_diastolik);
					$('#suhu-edit').val(data.suhu);
					$('#nadi-edit').val(data.nadi);
					$('#respirasi-edit').val(data.rr);
					$('#nafas-edit').val(data.nps);
					$('#keluhan-utama-edit').val(data.keluhan_utama);
					$('#keterangan-edit').val(data.keterangan);

					$('#modal-edit-visitasi').modal('show');
				}
			},
			error: function(e) {
				accessFailed(e.status);
			}
		})
	}

	function updateVisitasi() {
		let stop = false;
		if ($('#tensi-sistolik-edit').val() === '') {
			syams_validation('.tensi-sistolik-edit', 'Tensi sistolik harus diisi');
			stop = true;
		}
		if ($('#tensi-diastolik-edit').val() === '') {
			syams_validation('.tensi-diastolik-edit', 'Tensi diastolik harus diisi');
			stop = true;
		}
		if ($('#suhu-edit').val() === '') {
			syams_validation('.suhu-edit', 'Suhu harus diisi');
			stop = true;
		}
		if ($('#nadi-edit').val() === '') {
			syams_validation('.nadi-edit', 'Nadi harus diisi');
			stop = true;
		}
		if ($('#respirasi-edit').val() === '') {
			syams_validation('.respirasi-edit', 'Respirasi harus diisi');
			stop = true;
		}
		if ($('#nafas-edit').val() === '') {
			syams_validation('.nafas-edit', 'Nafas harus diisi');
			stop = true;
		}
		if ($('#keluhan-utama-edit').val() === '') {
			syams_validation('#keluhan-utama-edit', 'Keluhan utama harus diisi');
			stop = true;
		}
		if ($('#keterangan-edit').val() === '') {
			syams_validation('#keterangan-edit', 'Alasan diubah harus diisi');
			stop = true;
		}

		if (stop) {
			return false;
		}

		$.ajax({
			type: 'PUT',
			url: '<?= base_url("pelayanan/api/pelayanan/update_visitasi") ?>',
			data: $('#form-edit-visitasi').serialize(),
			cache: false,
			dataType: 'JSON',
			success: function(data) {
				if (data.status) {
					messageEditSuccess();
				} else {
					messageEditFailed();
				}

				$('#modal-edit-visitasi').modal('hide');
				$('#modal-pemeriksaan').modal('hide');
			},
			error: function(e) {
				messageEditFailed();
			}
		});
	}

	function showVitalSign() {
		let id_layanan = $('#id-layanan').val();
		getListVitalSign(id_layanan);
	}

	function printVitalSign() {
		let id_pendaftaran =  $('#id-pendaftaran-pasien').val();
		let id_layanan_pendaftaran =  $('#id-layanan').val();
		window.open('<?= base_url('pelayanan/printing_tanda_vital/') ?>' + id_pendaftaran + '/' + id_layanan_pendaftaran, 'Cetak Pemeriksaan Tanda Vital', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
	}

	function getListVitalSign(id_layanan_pendaftaran) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url("pelayanan/api/pelayanan/get_list_vital_sign") ?>/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			success: function(data) {
				if (data !== null | data !== '') {
					tensiChart(data);
					vitalChart('#nadi-chart', data.title_nadi, data.waktu, data.nadi, 'ppm');
					vitalChart('#suhu-chart', data.title_suhu, data.waktu, data.suhu, '° C');
					vitalChart('#nafas-chart', data.title_nafas, data.waktu, data.nafas, 'bpm');

					$('#modal-vital-sign').modal('show');
				} else {
					messageCustom('Belum ada data pemeriksaan tanda vital', "Info");
				}
			},
			error: function(e) {
				messageCustom('Belum ada data pemeriksaan tanda vital', "Info");
			}
		});
	}

	function tensiChart(data) {
		$('#tensi-chart').highcharts({

			chart: {
				type: 'column'
			},
			exporting: {
				enabled: false
			},
			title: {
				text: data.title_tensi
			},

			xAxis: {
				categories: data.waktu
			},

			yAxis: {
				min: 0,
				title: {
					text: 'Nilai (mm/Hg)'
				}
			},

			tooltip: {
				formatter: function() {
					return '<b>' + this.x + '</b><br/>' +
						this.series.name + ': ' + this.y + ' mm/Hg'
				}
			},

			plotOptions: {
				column: {
					stacking: 'normal'
				}
			},

			series: data.tensi
		});

	}

	function vitalChart(div, judul, waktu, series, satuan) {
		$(div).highcharts({
			chart: {
				plotBackgroundColor: null,
				plotBorderWidth: null,
				plotShadow: false
			},
			exporting: {
				enabled: false
			},
			xAxis: {
				categories: waktu
			},
			yAxis: {
				title: {
					text: 'Jumlah'
				}
			},
			title: {
				text: judul
			},
			tooltip: {
				pointFormat: '{point.y} ' + satuan
			},
			series: series
		});
	}

	function showSOAP(data) {
		$('#table-soap tbody').empty();
		$.each(data, function(i, v) {

			let num_soap = (++i);
			let waktu_soap = ((v.waktu !== null) ? datetimefmysql(v.waktu) : '');
			let dokter_soap = v.dokter;
			let subject = v.subject;
			let objective = v.objective;
			let assessment = v.assessment;
			let plan = v.plan;
			let btn_soap = ``;
			let history_soap = `hidden`;

			if (v.log != '0') {
				num_soap = `<s> ${num_soap} </s>`
				waktu_soap = `<s> ${waktu_soap} </s>`
				dokter_soap = `<s> ${dokter_soap} </s>`
				subject = `<s> ${subject} </s>`
				objective = `<s> ${objective} </s>`
				assessment = `<s> ${assessment} </s>`
				plan = `<s> ${plan} </s>`
				btn_soap = `disabled`;
			}

			if (v.history_edit != null) {
				history_soap = ``
			}

			let html = /* html */ `
				<tr>
					<td width="5%" class="number-soap center">${num_soap}</td>
					<td width="10%">${waktu_soap}</td>
					<td width="10%">${dokter_soap}</td>
					<td width="12%">${subject}</td>
					<td width="12%">${objective}</td>
					<td width="12%">${assessment}</td>
					<td width="12%">${plan}</td>
					<td width="10%" class="right">
						<button type="button" class="btn btn-secondary btn-xs" ${history_soap} onclick="historySOAP(this, ${v.id})"><i class="fas fa-eye"></i> History Edit</button>
						<button type="button" class="btn btn-secondary btn-xs" ${btn_soap} onclick="editSOAP(this, ${v.id})"><i class="fas fa-edit"></i></button>
						<button type="button" class="btn btn-secondary btn-xs" ${btn_soap} onclick="hapusSOAP(this, ${v.id})"><i class="fas fa-trash-alt"></i></button>
					</td>
				</tr>
			`;
			$('#table-soap tbody').append(html);
		})
	}


	function hapusSOAP(obj, id) {
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
							url: '<?= base_url("pelayanan/api/pelayanan/hapus_soap") ?>/' + id,
							cache: false,
							dataType: 'JSON',
							success: function(data) {
								if (data.status) {
									messageCustom(data.message, 'Success');
									removeList(obj);
								} else {
									customAlert('Hapus S.O.A.P', data.message);
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

	function editSOAP(obj, id) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url("pelayanan/api/pelayanan/get_soap") ?>/id/' + id,
			cache: false,
			dataType: 'JSON',
			success: function(data) {
				if (data !== null) {
					$('#id-soap').val(id);
					$('#id-layanan-soap').val(data.id_layanan_pendaftaran);
					$('#waktu-soap').val(data.waktu);
					$('#id-dokter-soap').val(data.id_dokter);
					$('#jenis-soap').val(data.jenis);
					$('#subject-edit').val(data.subject);
					$('#objective-edit').val(data.objective);
					$('#assessment-edit').val(data.assessment);
					$('#plan-edit').val(data.plan);
					$('#alasan-edit').val(data.keterangan);

					$('#modal-edit-soap').modal('show');
				}
			},
			error: function(e) {
				accessFailed(e.status);
			}
		})
	}

	function historySOAP(obj, id) {
		$('#table-history-edit-soap tbody').empty();
		$.ajax({
			type: 'GET',
			url: '<?= base_url("pelayanan/api/pelayanan/get_history_edit_soap") ?>/id/' + id,
			cache: false,
			dataType: 'JSON',
			success: function(data) {

				$.each(data, function(i, v) {

					let html = /* html */ `
						<tr>
							<td width="5%" class="number-soap center">${(++i)}</td>
							<td width="10%">${v.created_date_log}</td>
							<td width="10%">${v.user_log}</td>
							<td width="12%">${v.subject}</td>
							<td width="12%">${v.objective}</td>
							<td width="12%">${v.assessment}</td>
							<td width="12%">${v.plan}</td>
							<td width="12%">${v.keterangan}</td>
						</tr>
					`;
					$('#table-history-edit-soap tbody').append(html);
				})

				$('#modal-history-edit-soap').modal('show');
			},
			error: function(e) {
				accessFailed(e.status);
			}
		})
	}

	function updateSOAP() {
		let stop = false;
		if ($('#subject-edit').val() === '') {
			syams_validation('#subject-edit', 'Subject harus diisi');
			stop = true;
		}
		if ($('#objective-edit').val() === '') {
			syams_validation('#objective-edit', 'Objective harus diisi');
			stop = true;
		}
		if ($('#assessment-edit').val() === '') {
			syams_validation('#assessment-edit', 'Assessment harus diisi');
			stop = true;
		}
		if ($('#plan-edit').val() === '') {
			syams_validation('#plan-edit', 'Plan harus diisi');
			stop = true;
		}

		if ($('#alasan-edit').val() === '') {
			syams_validation('#alasan-edit', 'Alasan diubah harus diisi');
			stop = true;
		}

		if (stop) {
			return false;
		}

		$.ajax({
			type: 'PUT',
			url: '<?= base_url("pelayanan/api/pelayanan/update_soap") ?>',
			data: $('#form-edit-soap').serialize(),
			cache: false,
			dataType: 'JSON',
			success: function(data) {
				if (data.status) {
					messageEditSuccess();
				} else {
					messageEditFailed();
				}

				$('#modal-edit-soap').modal('hide');
				$('#modal-pemeriksaan').modal('hide');
			},
			error: function(e) {
				messageEditFailed();
			}
		});
	}
</script>

<!-- Modal Edit Visitasi -->
<div id="modal-edit-visitasi" class="modal fade" role="dialog">
	<div class="modal-dialog" style="max-width: 45%">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit Visitasi</h4>
				<button type="button" class="close" data-dismiss="modal">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'role=form class=form-horizontal id=form-edit-visitasi'); ?>
				<input type="hidden" name="id" id="id-visitasi">
				<div class="row">
					<div class="col-lg-12">
						<div class="row">
							<div class="col-lg-4">
								<div class="form-group tight">
									<label>Tensi Sistolik</label>
									<div class="input-group tensi-sistolik-edit">
										<input type="text" name="tensi_sistolik" id="tensi-sistolik-edit" class="custom-form visitasi-input" onkeypress="return hanyaAngka(event)">
										<div class="input-group-append">
											<span class="input-group-custom">mmHg</span>
										</div>
									</div>
								</div>
								<div class="form-group tight">
									<label>Tensi Diastolik</label>
									<div class="input-group tensi-diastolik-edit">
										<input type="text" name="tensi_diastolik" id="tensi-diastolik-edit" class="custom-form visitasi-input" onkeypress="return hanyaAngka(event)">
										<div class="input-group-append">
											<span class="input-group-custom">mmHg</span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group tight">
									<label>Suhu</label>
									<div class="input-group suhu-edit">
										<input type="text" name="suhu" id="suhu-edit" class="custom-form visitasi-input" onkeypress="return hanyaAngka(event)">
										<div class="input-group-append">
											<span class="input-group-custom">&#8451;</span>
										</div>
									</div>
								</div>
								<div class="form-group tight">
									<label>Nadi</label>
									<div class="input-group nadi-edit">
										<input type="text" name="nadi" id="nadi-edit" class="custom-form visitasi-input" onkeypress="return hanyaAngka(event)">
										<div class="input-group-append">
											<span class="input-group-custom">/Mnt</span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group tight">
									<label>Respirasi</label>
									<div class="input-group respirasi-edit">
										<input type="text" name="respirasi" id="respirasi-edit" class="custom-form visitasi-input" onkeypress="return hanyaAngka(event)">
										<div class="input-group-append">
											<span class="input-group-custom">/Mnt</span>
										</div>
									</div>
								</div>
								<div class="form-group tight">
									<label>Nafas</label>
									<div class="input-group nafas-edit">
										<input type="text" name="nafas" id="nafas-edit" class="custom-form visitasi-input" onkeypress="return hanyaAngka(event)">
										<div class="input-group-append">
											<span class="input-group-custom">/Mnt</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group tight">
							<label>Keluhan Utama</label>
							<textarea name="keluhan_utama" id="keluhan-utama-edit" class="form-control visitasi-input" rows="4"></textarea>
						</div>
						<div class="form-group tight">
							<label>Alasan Diubah</label>
							<textarea name="keterangan" id="keterangan-edit" class="form-control visitasi-input" rows="4"></textarea>
						</div>
					</div>
				</div>

				<?= form_close(); ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Tutup</button>
				<button type="button" class="btn btn-info waves-effect" onclick="updateVisitasi()"><i class="fas fa-save mr-1"></i>Update</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Modal Edit Visitasi -->

<!-- Modal Vital SIGN -->
<div id="modal-vital-sign" class="modal fade">
	<div class="modal-dialog" style="max-width: 50%; max-height: 100%;">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Grafik Tanda Vital</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<div class="vtabs">
					<ul class="nav nav-tabs tabs-vertical" role="tablist" id="mytab">
						<li class="nav-item" id="tensi-tab">
							<a class="nav-link active" data-toggle="tab" href="#vital_tab1" role="tab">
								<span class="hidden-xs-down">Tensi</span>
							</a>
						</li>
						<li class="nav-item" id="nadi-tab">
							<a class="nav-link" data-toggle="tab" href="#vital_tab2" role="tab">
								<span class="hidden-xs-down">Nadi</span>
							</a>
						</li>
						<li class="nav-item" id="suhu-tab">
							<a class="nav-link" data-toggle="tab" href="#vital_tab3" role="tab">
								<span class="hidden-xs-down">Suhu</span>
							</a>
						</li>
						<li class="nav-item" id="nafas-tab">
							<a class="nav-link" data-toggle="tab" href="#vital_tab4" role="tab">
								<span class="hidden-xs-down">Nafas</span>
							</a>
						</li>
						<!-- <li class="nav-item" id="respirasi-tab">
                            <a class="nav-link" data-toggle="tab" href="#tab5" role="tab">
                                <span class="hidden-xs-down">Respirasi</span>
                            </a>
                        </li> -->
					</ul>
					<!-- Tab panes -->
					<div class="tab-content">
						<div class="tab-pane active" id="vital_tab1" role="tabpanel">
							<div id="tensi-chart"></div>
						</div>
						<div class="tab-pane" id="vital_tab2" role="tabpanel">
							<div id="nadi-chart"></div>
						</div>
						<div class="tab-pane" id="vital_tab3" role="tabpanel">
							<div id="suhu-chart"></div>
						</div>
						<div class="tab-pane" id="vital_tab4" role="tabpanel">
							<div id="nafas-chart"></div>
						</div>
						<!-- <div class="tab-pane" id="tab5" role="tabpanel"><div id="respirasi-chart"></div></div> -->
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-info" data-dismiss="modal"><i class="fa fa-check-circle mr-1"></i>OK</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- END Modal Vital SIGN -->

<!-- Modal Edit S.O.A.P -->
<div id="modal-edit-soap" class="modal fade" role="dialog">
	<div class="modal-dialog" style="max-width: 85%">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit S.O.A.P</h4>
				<button type="button" class="close" data-dismiss="modal">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'role=form class=form-horizontal id=form-edit-soap'); ?>
				<input type="hidden" name="id" id="id-soap">
				<input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-soap">
				<input type="hidden" name="waktu" id="waktu-soap">
				<input type="hidden" name="id_dokter" id="id-dokter-soap">
				<input type="hidden" name="jenis" id="jenis-soap">
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group row tight">
							<label class="col-lg-2 col-form-label-custom right"><b>SUBJECT</b>
								<br><small class="text-muted"><i>Statement about relevant patient behavior or status</i></small></label>
							<div class="col-lg-9">
								<textarea name="subject" id="subject-edit" class="custom-textarea soap-input" rows="4"></textarea>
							</div>
						</div>
						<div class="form-group row tight">
							<label class="col-lg-2 col-form-label-custom right"><b>OBJECTIVE</b>
								<br><small class="text-muted"><i>Measurable, quantifiable, and observable data</i></small></label>
							<div class="col-lg-9">
								<textarea name="objective" id="objective-edit" class="custom-textarea soap-input" rows="4"></textarea>
							</div>
						</div>
						<div class="form-group row tight">
							<label class="col-lg-2 col-form-label-custom right"><b>ASSESSMENT</b>
								<br><small class="text-muted"><i>Interpret the meaning of "S" and "O"</i></small></label>
							<div class="col-lg-9">
								<textarea name="assessment" id="assessment-edit" class="custom-textarea soap-input" rows="4"></textarea>
							</div>
						</div>
						<div class="form-group row tight">
							<label class="col-lg-2 col-form-label-custom right"><b>PLAN</b>
								<br><small class="text-muted"><i>Anticipated frequency and duration, course of the treatment for next session, recommendations and any changes</i></small></label>
							<div class="col-lg-9">
								<textarea name="plan" id="plan-edit" class="custom-textarea soap-input" rows="4"></textarea>
							</div>
						</div>
						<div class="form-group row tight">
							<label class="col-lg-2 col-form-label-custom right"><b>Keterangan</b>
								<br><small class="text-muted"><i>Alasan diubah</i></small></label>
							<div class="col-lg-9">
								<textarea name="keterangan" id="alasan-edit" class="custom-textarea soap-input" rows="4"></textarea>
							</div>
						</div>
					</div>
				</div>

				<?= form_close(); ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Tutup</button>
				<button type="button" class="btn btn-info waves-effect" onclick="updateSOAP()"><i class="fas fa-save mr-1"></i>Update</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Modal Edit S.O.A.P -->

<!-- Modal History Edit S.O.A.P -->
<div id="modal-history-edit-soap" class="modal fade" role="dialog">
	<div class="modal-dialog" style="max-width: 85%">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Riwayat Perubahan S.O.A.P</h4>
				<button type="button" class="close" data-dismiss="modal">×</button>
			</div>
			<div class="modal-body">
				<input type="hidden" name="id" id="id-soap">
				<input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-soap">
				<input type="hidden" name="waktu" id="waktu-soap">
				<input type="hidden" name="id_dokter" id="id-dokter-soap">
				<input type="hidden" name="jenis" id="jenis-soap">
				<div class="col-lg-12">
					<table class="table table-hover table-striped table-sm color-table info-table" style="margin-bottom: 0;">
						<thead class="thead-theme">
							<tr>
								<th width="5%" class="center">No.</th>
								<th width="10%">Waktu Perubahan</th>
								<th width="10%">Petugas</th>
								<th width="12%">Subjective</th>
								<th width="12%">Objective</th>
								<th width="12%">Assessment</th>
								<th width="12%">Plan</th>
								<th width="12%">Keterangan</th>
							</tr>
						</thead>
					</table>
					<div id="soap-history-scroll" style="max-height: 350px; overflow-y: auto;">
						<table width="100%" class="table table-striped table-hover table-sm" cellpadding="0" cellspacing="0" id="table-history-edit-soap">
							<tbody></tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Tutup</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Modal History Edit S.O.A.P -->