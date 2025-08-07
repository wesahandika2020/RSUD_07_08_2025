<div id="modal-bed-ranap" class="modal fade">
	<div class="modal-dialog" style="max-width: 90%;">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="title-form-bed">Daftar Status Bed</h4>
				<button type="button" class="close" data-dismiss="modal">x</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-10">
						<div class="row">
							<div class="col-lg-3">
								<div class="bs-docs-sidebar hidden-print" role="complementary">
									<span class="title_nav_side">List Bangsal</span>
									<div id="bangsalScroll">
										<ul class="nav bs-docs-sidenav">
											<?php foreach ($bangsal as $key => $value) : ?>
												<li class="li_side pointer" onclick="getAvailableBed('<?= $key ?>')">
													<a style="font-size: 14pt"><?= $value ?></a>
												</li>
											<?php endforeach; ?>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-lg-9" role="main" id="bedScroll">
								<div id="bed-status-area" class="mb-10"></div>
							</div>
						</div>
					</div>
					<div class="col-lg-2">
						<div class="bs-docs-sidebar hidden-print" role="complementary">
							<h6><b>Keterangan :</b></h6>
							<div class="row">
								<div class="col-lg-12">
									<img class="bed-icon bed-icon-available"><br>
									<div class="bed-title">Bed Tersedia</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<img class="bed-icon bed-icon-male-used"><br>
									<div class="bed-title">Bed Dipakai (LK)</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<img class="bed-icon bed-icon-female-used"><br>
									<div class="bed-title">Bed Dipakai (PR)</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<img class="bed-icon bed-icon-waiting"><br>
									<div class="bed-title">Bed Menunggu</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<img class="bed-icon bed-icon-reserved"><br>
									<div class="bed-title">Bed Dipesan</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<img class="bed-icon bed-icon-waiting-confirmation"><br>
									<div class="bed-title">Menunggu Konfirmasi</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<img class="bed-icon bed-icon-broken"><br>
									<div class="bed-title">Bed sedang dalam<br>perbaikan / rusak</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<img class="bed-icon bed-icon-over-capacity"><br>
									<div class="bed-title">Bed yang melebihi<br>kapasitas</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-info" onclick="closeModalBedRanap()"><i class="fas fa-check-circle mr-1"></i>OK</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	var tipeBed = 'konfirm';

	function closeModalBedRanap() {
		$('#modal-bed-ranap').modal('hide');
	}

	function getAvailableBed(id_bangsal, tipe) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url("order_rawat_inap/api/order_rawat_inap/get_available_bed") ?>/id_bangsal/' + id_bangsal,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				if (tipeBed === 'edit') {
					showListBedEdit(data);
				} else {
					showListBed(data);
				}
			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				messageCustom('Gagal menampilkan Bed yang tersedia.', 'Error');
			},
		});
	}

	function showListBed(data) {
		$('#bed-status-area').empty();
		let html = '';
		html += '<h2><b>'+data.bangsal+'</b></h2>';

		$.each(data.kelas, function(i, value) {
			html += '<div class="card shadow">'+
						'<div class="card-header">'+
							'<div class="d-flex flex-row">'+
								'<div class="bg-info" style="border-radius:10px">'+
									'<h4 class="text-white box m-b-0"><i class="fas fa-bed"></i></h4>'+
								'</div>'+
								'<div class="align-self-center m-l-10">'+
									'<h4 class="m-b-0 text-info">Kelas '+i+'</h4>'+
								'</div>'+
							'</div>'+
						'</div>'+
						'<div class="card-body">';
			$.each(value, function(j, value2) {
				html += '<div class="row"><div class="col-lg-12">';
				html += '<h4 class="center"><b>Ruang '+j+'</b></h4><div class="col-md-12 mb-2 center" style="overflow:auto">';
				
				let action = '';
				$.each(value2, function(k, value3) {
					let kelasBed = value3.bed;
					if (value3.keterangan === 'Tersedia') {
						let theBed = value3.bangsal + ', kelas ' + value3.kelas + ', kamar ' + value3.no_ruang + ', nomor bed ' + value3.no_bed;
						// action = 'onclick="setBed('+value3.id+', \''+theBed+'\')"';
					}

					if (value3.keterangan === 'Tersedia') {
						if (value3.out_of_service === 'Ya') {
							kelasBed = 'bed-image-out';
						}
						if (value3.out_of_capacity === 'Ya') {
							kelasBed = 'bed-image-over-capacity';
						}
						if ((value3.out_of_service === 'Ya') & (value3.out_of_capacity === 'Ya')) {
							kelasBed = 'bed-image-out-max';
						}
						if (value3.icu_bedah === '1') {
							kelasBed = 'bed-image-surgery-available';
						}
					} else if (value3.keterangan === 'Terpakai') {
						action = '';
						if ((value3.out_of_capacity === 'Ya') & (value3.penghuni === 'L')) {
							kelasBed = 'bed-image-male-max';
						}
						if ((value3.out_of_capacity === 'Ya') & (value3.penghuni === 'P')) {
							kelasBed = 'bed-image-female-max';
						}
					} else if (value3.keterangan === 'Waiting') {
						action = '';
						if (value3.out_of_capacity === 'Ya') {
							kelasBed = 'bed-image-waiting-max';
						}
					} else {
						action = '';
					}

					html += '<div class="img-thumbnail bed-choice '+kelasBed+'" '+action+' style="cursor:pointer"><div class="no-bed-label">' + value3.no_bed + '</div></div>';
				});
				html += '</div></div></div>';
			});							
			html += '</div></div>';
		});

		$('#bed-status-area').hide();
		$('#bed-status-area').append(html);
		$('#bed-status-area').fadeIn('slow');
	}

	function showRekapStatusBED() {
		$('#modal-bed-ranap').modal('show');
	}
</script>