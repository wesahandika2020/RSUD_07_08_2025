<div class="row">
	<div class="col-lg-12">
		<div class="card shadow">
			<div class="card-body">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist" id="tab_coding_grouping">
					<li class="nav-item" id="tab_kunjungan">
						<a class="nav-link active" data-toggle="tab" href="#tab1" role="tab">
							<span class="hidden-sm-up"><i class="fas fa-fw fa-book"></i></span>
							<span class="hidden-xs-down">Coding / Grouping</span>
						</a>
					</li>
					<li class="nav-item" id="tab_kirim_data_online">
						<a class="nav-link" data-toggle="tab" href="#tab2" role="tab">
							<span class="hidden-sm-up"><i class="fas fa-fw fa-book"></i></span>
							<span class="hidden-xs-down">Kirim Data Online</span>
						</a>
					</li>
					<li class="nav-item" id="tab_laporan_terkirim">
						<a class="nav-link" data-toggle="tab" href="#tab3" role="tab">
							<span class="hidden-sm-up"><i class="fas fa-fw fa-book"></i></span>
							<span class="hidden-xs-down">Laporan</span>
						</a>
					</li>
					<!-- <li class="nav-item" id="tab_kirim_data_online_jaminan_raharja">
						<a class="nav-link" data-toggle="tab" href="#tab4" role="tab">
							<span class="hidden-sm-up"><i class="fas fa-fw fa-book"></i></span>
							<span class="hidden-xs-down">Data Klaim Jaminan Jasa Raharja</span>
						</a>
					</li> -->
				</ul>
				<!-- Tab panes -->
				<div id="tab-index-eklaim" class="tab-content">
					<div class="tab-pane mt-3 active" id="tab1" role="tabpanel"></div>
					<div class="tab-pane mt-3" id="tab2" role="tabpanel"></div>
					<div class="tab-pane mt-3" id="tab3" role="tabpanel"></div>
					<!-- <div class="tab-pane mt-3" id="tab4" role="tabpanel"></div> -->
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(function() {
		// tabs
		$('#tab_coding_grouping a:first').tab('show')
		syams_ajax('<?= base_url("eklaim_bpjs/Eklaim_bpjs/page_coding_grouping") ?>', '#tab1')

		$(document).on('click', '.nav-item', function() {
			let id_tab = $(this).attr('id')
			switch (id_tab) {
				case 'tab_kunjungan':
					if ($('#tab1').html() == '') {
						syams_ajax('<?= base_url("eklaim_bpjs/Eklaim_bpjs/page_coding_grouping") ?>', '#tab1')
					}
					break;
				case 'tab_kirim_data_online':
					if ($('#tab2').html() == '') {
						syams_ajax('<?= base_url("eklaim_bpjs/Eklaim_bpjs/page_kirim_data_online") ?>', '#tab2')
					}
					break;
				case 'tab_laporan_terkirim':
					if ($('#tab3').html() == '') {
						syams_ajax('<?= base_url("eklaim_bpjs/Eklaim_bpjs/page_laporan_eklaim") ?>', '#tab3')
					}
					break;
					// case 'tab_kirim_data_online_jaminan_raharja':
					// 	if ($('#tab4').html() == '') {
					// 		syams_ajax('<?= base_url("eklaim_bpjs/Eklaim_bpjs/page_kirim_data_online") ?>', '#tab4')
					// 	}
					// 	break;
			}
			return false;
		})
	})
</script>