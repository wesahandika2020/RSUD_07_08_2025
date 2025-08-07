<div id="modal-echo" class="modal fade">
	<div class="modal-dialog" style="max-width:60%">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit Hasil Echo</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-echo role=form class=form-horizontal') ?>
				<input type="hidden" name="id_detail_radiologi" id="id-detail-radiologi-echo">
				<div class="row">
					<div class="col-lg-8">
						<div class="form-group row tight">
							<label class="col-lg-3 col-form-label">Dokter P. Jawab</label>
							<div class="col-lg-9">
								<input type="hidden" name="dokter" class="select2-input" id="dokter-echo-auto">
							</div>
						</div>
						<div class="form-group row tight">
							<label class="col-lg-3 col-form-label">Radiografer</label>
							<div class="col-lg-9">
								<input type="hidden" name="radiografer" class="select2-input" id="radiografer-echo-auto">
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group row tight">
							<label class="col-lg-5 col-form-label">Date Tracking</label>
							<div class="col-lg-7">
								<input type="text" name="" value="<?= date('d/m/Y') ?>" class="form-control echo-form" id="date-tracking">
							</div>
						</div>
					</div>
				</div>
				<br><br>

				<!-- Measurement -->
				<h4>Measurement</h4>
				<div class="col-md-12">
					<div class="widget">
						<div class="widget-header">
							<div class="title"><h6><span class="fas fa-angle-right mr-1"></span><b>Aorta</b></h6></div>
						</div>
						<div class="widget-body">
							<table class="table table-sm table-striped table-hover table-no-border">
								<thead>
									<tr>
										<th width="30%" class="center">Jenis Pemeriksaan</th>
										<th width="20%" class="center">Hasil</th>
										<th width="15%" class="center">Nilai Normal</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>&nbsp;&nbsp;&nbsp;Root Diameter</td>
										<td>
											<div class="input-group col-lg-12">
												<input type="text" name="" id="aorta-root-diameter" class="custom-form echo-form" value="">
												<div class="input-group-append">
													<span class="input-group-custom">mm</span>
												</div>
											</div>
										</td>
										<td class="center">( 20 - 37 mm )</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="widget">
						<div class="widget-header">
							<div class="title"><h6><span class="fas fa-angle-right mr-1"></span><b>Left Atrium</b></h6></div>
						</div>
						<div class="widget-body">
							<table class="table table-sm table-striped table-hover table-no-border">
								<thead>
									<tr>
										<th width="30%" class="center">Jenis Pemeriksaan</th>
										<th width="20%" class="center">Hasil</th>
										<th width="15%" class="center">Nilai Normal</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>&nbsp;&nbsp;&nbsp;Dimension</td>
										<td>
											<div class="input-group col-lg-12">
												<input type="text" name="" id="atrium-dimension" class="custom-form echo-form" value="">
												<div class="input-group-append">
													<span class="input-group-custom">mm</span>
												</div>
											</div>
										</td>
										<td class="center">( 15 - 40 mm )</td>
									</tr>
									<tr>
										<td>&nbsp;&nbsp;&nbsp;LA / Ao Ratio</td>
										<td>
											<div class="input-group col-lg-12">
												<input type="text" name="" id="atrium-ratio" class="custom-form echo-form" value="">
												<div class="input-group-append">
													<span class="input-group-custom">mm</span>
												</div>
											</div>
										</td>
										<td class="center">( < 13 )</td>
									</tr>
									<tr>
										<td>&nbsp;&nbsp;&nbsp;AVO</td>
										<td>
											<div class="input-group col-lg-12">
												<input type="text" name="" id="atrium-avo" class="custom-form echo-form" value="">	
											</div>
										</td>
										<td class="center"></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="widget">
						<div class="widget-header">
							<div class="title"><h6><span class="fas fa-angle-right mr-1"></span><b>Right Ventricle</b></h6></div>
						</div>
						<div class="widget-body">
							<table class="table table-sm table-striped table-hover table-no-border">
								<thead>
									<tr>
										<th width="30%" class="center">Jenis Pemeriksaan</th>
										<th width="20%" class="center">Hasil</th>
										<th width="15%" class="center">Nilai Normal</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>&nbsp;&nbsp;&nbsp;Dimension</td>
										<td>
											<div class="input-group col-lg-12">
												<input type="text" name="" id="rvent-dimension" class="custom-form echo-form" value="">
												<div class="input-group-append">
													<span class="input-group-custom">mm</span>
												</div>
											</div>
										</td>
										<td class="center">( < 30 mm )</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="widget">
						<div class="widget-header">
							<div class="title"><h6><span class="fas fa-angle-right mr-1"></span><b>Left Ventricle</b></h6></div>
						</div>
						<div class="widget-body">
							<table class="table table-sm table-striped table-hover table-no-border">
								<thead>
									<tr>
										<th width="30%" class="center">Jenis Pemeriksaan</th>
										<th width="20%" class="center">Hasil</th>
										<th width="15%" class="center">Nilai Normal</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>&nbsp;&nbsp;&nbsp;EDD</td>
										<td>
											<div class="input-group col-lg-12">
												<input type="text" name="" id="lvent-edd" class="custom-form echo-form" value="">
												<div class="input-group-append">
													<span class="input-group-custom">mm</span>
												</div>
											</div>
										</td>
										<td class="center">( 35 - 52 mm )</td>
									</tr>
									<tr>
										<td>&nbsp;&nbsp;&nbsp;ESD</td>
										<td>
											<div class="input-group col-lg-12">
												<input type="text" name="" id="lvent-esd" class="custom-form echo-form" value="">
												<div class="input-group-append">
													<span class="input-group-custom">mm</span>
												</div>
											</div>
										</td>
										<td class="center">( 26 - 36 mm )</td>
									</tr>
									<tr>
										<td>&nbsp;&nbsp;&nbsp;IVS Diastole</td>
										<td>
											<div class="input-group col-lg-12">
												<input type="text" name="" id="lvent-ivsdias" class="custom-form echo-form" value="">
												<div class="input-group-append">
													<span class="input-group-custom">mm</span>
												</div>
											</div>
										</td>
										<td class="center">( 7 - 11 mm )</td>
									</tr>
									<tr>
										<td>&nbsp;&nbsp;&nbsp;IVS Systole</td>
										<td>
											<div class="input-group col-lg-12">
												<input type="text" name="" id="lvent-ivssys" class="custom-form echo-form" value="">
											</div>
										</td>
										<td class="center"></td>
									</tr>
									<tr>
										<td>&nbsp;&nbsp;&nbsp;IVS Fract. Thickening</td>
										<td>
											<div class="input-group col-lg-12">
												<input type="text" name="" id="lvent-ivsfract" class="custom-form echo-form" value="">
												<div class="input-group-append">
													<span class="input-group-custom">%</span>
												</div>
											</div>
										</td>
										<td class="center">( > 30% )</td>
									</tr>
									<tr>
										<td>&nbsp;&nbsp;&nbsp;PW Diastole</td>
										<td>
											<div class="input-group col-lg-12">
												<input type="text" name="" id="lvent-pwdias" class="custom-form echo-form" value="">
												<div class="input-group-append">
													<span class="input-group-custom">mm</span>
												</div>
											</div>
										</td>
										<td class="center">( 7 - 11 mm )</td>
									</tr>
									<tr>
										<td>&nbsp;&nbsp;&nbsp;PW Systole</td>
										<td>
											<div class="input-group col-lg-12">
												<input type="text" name="" id="lvent-pwsys" class="custom-form echo-form" value="">
											</div>
										</td>
										<td class="center"></td>
									</tr>
									<tr>
										<td>&nbsp;&nbsp;&nbsp;PW Fract. Thickening</td>
										<td>
											<div class="input-group col-lg-12">
												<input type="text" name="" id="lvent-pwfract" class="custom-form echo-form" value="">
												<div class="input-group-append">
													<span class="input-group-custom">%</span>
												</div>
											</div>
										</td>
										<td class="center">( > 30% )</td>
									</tr>
									<tr>
										<td>&nbsp;&nbsp;&nbsp;EF</td>
										<td>
											<div class="input-group col-lg-12">
												<input type="text" name="" id="lvent-ef" class="custom-form echo-form" value="">
												<div class="input-group-append">
													<span class="input-group-custom">%</span>
												</div>
											</div>
										</td>
										<td class="center">( 53 - 77% )</td>
									</tr>
									<tr>
										<td>&nbsp;&nbsp;&nbsp;IVS / PW Ratio</td>
										<td>
											<div class="input-group col-lg-12">
												<input type="text" name="" id="lvent-ivspwratio" class="custom-form echo-form" value="">
											</div>
										</td>
										<td class="center">( < 1.3 )</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="widget">
						<div class="widget-header">
							<div class="title"><h6><span class="fas fa-angle-right mr-1"></span><b>Mitral Valve</b></h6></div>
						</div>
						<div class="widget-body">
							<table class="table table-sm table-striped table-hover table-no-border">
								<thead>
									<tr>
										<th width="30%" class="center">Jenis Pemeriksaan</th>
										<th width="20%" class="center">Hasil</th>
										<th width="15%" class="center">Nilai Normal</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>&nbsp;&nbsp;&nbsp;EPSS</td>
										<td>
											<div class="input-group col-lg-12">
												<input type="text" name="" id="mitral-epss" class="custom-form echo-form" value="">
												<div class="input-group-append">
													<span class="input-group-custom">mm</span>
												</div>
											</div>
										</td>
										<td class="center">( < 10 mm )</td>
									</tr>
									<tr>
										<td>&nbsp;&nbsp;&nbsp;MVA</td>
										<td>
											<div class="input-group col-lg-12">
												<input type="text" name="" id="mitral-mva" class="custom-form echo-form" value="">
												<div class="input-group-append">
													<span class="input-group-custom">cm</span>
												</div>
											</div>
										</td>
										<td class="center">( > 3 cm )</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- End Measurement -->
				<br>
				<!-- Finding & Comment -->
				<h4>Finding & Comment</h4>
				<div class="form-group">
					<div class="col-lg-12">
						<div id="finding-field"></div>
					</div>
				</div>
				<!-- End Finding & Comment -->
				<br>
				<!-- Diagnostic Impression -->
				<h4>Diagnostic Impression</h4>
				<div class="form-group">
					<div class="col-lg-12">
						<div id="impression-field"></div>
					</div>
				</div>
				<!-- End Diagnostic Impression -->
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Batal</button>
                <button type="button" class="btn btn-info waves-effect" onclick="konfirmasiSimpanHasilEcho()"><i class="fas fa-save mr-1"></i>Simpan</button>
			</div>
		</div>
	</div>
</div>
<script>
	$(function() {
		$('#dokter-echo-auto').select2({
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
                var markup = data.nama+'<br/><i>'+data.spesialisasi+'</i>';
                return markup;
            }, 
            formatSelection: function(data){
                return data.nama;
            }
        });

        $('#radiografer-echo-auto').select2({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function (term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        jenis: '7',
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
                var markup = data.nama+'<br/><i>'+data.spesialisasi+'</i>';
                return markup;
            }, 
            formatSelection: function(data){
                return data.nama;
            }
        });
        // End of Function

        $("#date-tracking").datepicker({
            format: 'dd/mm/yyyy'
        }).on('changeDate', function(){
            $(this).datepicker('hide');
        });
	})

	function openHasilEcho(id_detail_radiologi) {
		$('#id-detail-radiologi-echo').val(id_detail_radiologi);
		$('.echo-form, #dokter-echo-auto, #radiografer-echo-auto').val('');
		$('#s2id_dokter-echo-auto a .select2-chosen').html('');
		$('#s2id_radiografer-echo-auto a .select2-chosen').html('');

		$.ajax({
			type: 'GET',
			url: '<?= base_url("hasil_radiologi/api/hasil_radiologi/get_hasil_echo") ?>/id/' + id_detail_radiologi,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if (data !== '404') {
					let measurement = data.measurement;
					$('#dokter-echo-auto').val(data.id_dokter);
					$('#radiografer-echo-auto').val(data.id_radiografer);
					$('#s2id_dokter-echo-auto a .select2-chosen').html(data.dokter);
					$('#s2id_radiografer-echo-auto a .select2-chosen').html(data.radiografer);

					$('#date-tracking').val(datefmysql(data.date_tracking));
					$('#aorta-root-diameter').val(measurement.aorta.root_diameter);
					$('#atrium-dimension').val(measurement.left_atrium.dimension);
					$('#atrium-ratio').val(measurement.left_atrium.laao_ratio);
					$('#atrium-avo').val(measurement.left_atrium.avo);
					$('#rvent-dimension').val(measurement.right_ventricle.dimension);
					$('#lvent-edd').val(measurement.left_ventricle.edd);
					$('#lvent-esd').val(measurement.left_ventricle.esd);
					$('#lvent-ivsdias').val(measurement.left_ventricle.ivs_diastole);
					$('#lvent-ivssys').val(measurement.left_ventricle.ivs_systole);
					$('#lvent-ivsfract').val(measurement.left_ventricle.ivs_fract);
					$('#lvent-pwdias').val(measurement.left_ventricle.pw_diastole);
					$('#lvent-pwsys').val(measurement.left_ventricle.pw_systole);
					$('#lvent-pwfract').val(measurement.left_ventricle.pw_fract);
					$('#lvent-ef').val(measurement.left_ventricle.ef);
					$('#lvent-ivspwratio').val(measurement.left_ventricle.ivspwratio);
					$('#mitral-epss').val(measurement.mitral_valve.epss);
					$('#mitral-mva').val(measurement.mitral_valve.mva);

					$('#finding-field').summernote('code', data.finding);
					$('#impression-field').summernote('code', data.diag_impression);
				} else {
					$('#date-tracking').val('<?= date('d/m/Y') ?>');
				}

				$('#modal-echo').modal('show');
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status);
			},
		});
	}

	function konfirmasiSimpanHasilEcho() {
		let stop = false;

		if ($('#dokter-echo-auto').val() === '') {
			syams_validation('#dokter-echo-auto', 'Pilih dokter terlebih dahulu');
			stop = true;
		}

		if (stop) {
			return false;
		}

		Swal.fire({
			title: 'Konfirmasi Simpan Hasil',
			html: "Apakah anda yakin ingin mengentrikan <br> data hasil echo ini ?",
			icon: 'question',
			showCancelButton: true,
			confirmButtonText: '<i class="fas fa-save mr-1"></i>Simpan',
			cancelButtonText: '<i class="fas fa-times-circle mr-1"></i>Batal',
			reverseButtons: true
		}).then((result) => {
			if (result.value) {
				simpanHasilEcho();
			}
		})
	}

	function simpanHasilEcho() {
		let dataJSON = {
			'id_detail_radiologi': $('#id-detail-radiologi-echo').val(),
			'dokter': $('#dokter-echo-auto').val(),
			'radiografer': $('#radiografer-echo-auto').val(),
			'measurement': {
				'aorta': {
					'root_diameter': $('#aorta-root-diameter').val()
				},
				'left_atrium': {
					'dimension': $('#atrium-dimension').val(),
					'laao_ratio': $('#atrium-ratio').val(),
					'avo': $('#atrium-avo').val()
				},
				'right_ventricle': {
					'dimension': $('#rvent-dimension').val()
				},
				'left_ventricle': {
					'edd': $('#lvent-edd').val(),
					'esd': $('#lvent-esd').val(),
					'ivs_diastole': $('#lvent-ivsdias').val(),
					'ivs_systole': $('#lvent-ivssys').val(),
					'ivs_fract': $('#lvent-ivsfract').val(),
					'pw_diastole': $('#lvent-pwdias').val(),
					'pw_systole': $('#lvent-pwsys').val(),
					'pw_fract': $('#lvent-pwfract').val(),
					'ef': $('#lvent-ef').val(),
					'ivspwratio': $('#lvent-ivspwratio').val()
				},
				'mitral_valve': {
					'epss': $('#mitral-epss').val(),
					'mva': $('#mitral-mva').val()
				}
			},
			'date_tracking': $('#date-tracking').val(),
			'finding_comment': $('#finding-field').summernote('code'),
			'diag_impression': $('#impression-field').summernote('code')
		}

		$.ajax({
			type: 'POST',
			url: '<?= base_url("hasil_radiologi/api/hasil_radiologi/simpan_hasil_echo") ?>',
			data: JSON.stringify(dataJSON),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if (data.status === false) {
					swalAlert('warning', 'Informasi', data.message);
				} else {
					messageCustom(data.message, 'Success');
				}

				getRequestRadiologi($('#id-radiologi').val());
				getListDataHasilRadiologi(1);
				$('#modal-echo').modal('hide');
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				swalAlert('error', e.status, e.statusText);
			},
		}); 
	}
</script>