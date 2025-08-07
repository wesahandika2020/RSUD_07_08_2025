<div class="row">
	<div class="col-lg-12">
		<div class="card shadow">
			<div class="card-body">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist" id="tab_monitoring">
					<li class="nav-item" id="tab_kunjungan"> 
						<a class="nav-link active" data-toggle="tab" href="#tabA" role="tab">
							<span class="hidden-sm-up"><i class="fas fa-fw fa-book"></i></span> 
							<span class="hidden-xs-down">Data Kunjungan</span>
						</a> 
					</li>
					<li class="nav-item" id="tab_klaim"> 
						<a class="nav-link" data-toggle="tab" href="#tabB" role="tab">
							<span class="hidden-sm-up"><i class="fas fa-fw fa-book"></i></span> 
							<span class="hidden-xs-down">Data Klaim</span>
						</a> 
					</li>
					<li class="nav-item" id="tab_histori_pelayanan"> 
						<a class="nav-link" data-toggle="tab" href="#tabC" role="tab">
							<span class="hidden-sm-up"><i class="fas fa-fw fa-book"></i></span> 
							<span class="hidden-xs-down">Data Histori Pelayanan Peserta</span>
						</a> 
					</li>
					<li class="nav-item" id="tab_klaim_jaminan_raharja"> 
						<a class="nav-link" data-toggle="tab" href="#tabD" role="tab">
							<span class="hidden-sm-up"><i class="fas fa-fw fa-book"></i></span> 
							<span class="hidden-xs-down">Data Klaim Jaminan Jasa Raharja</span>
						</a> 
					</li>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane mt-3 active" id="tabA" role="tabpanel"></div>
					<div class="tab-pane mt-3" id="tabB" role="tabpanel"></div>
					<div class="tab-pane mt-3" id="tabC" role="tabpanel"></div>
					<div class="tab-pane mt-3" id="tabD" role="tabpanel"></div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(function() {
		// tabs
        $('#tab_monitoring a:first').tab('show')
		syams_ajax('<?= base_url("monitoring_klaim/monitoring_klaim/page_data_kunjungan") ?>', '#tabA')

        $(document).on('click', '.nav-item', function() {
            let id_tab = $(this).attr('id')
            switch (id_tab) {
                case 'tab_kunjungan':
                    if ($('#tabA').html() == '') {
                        syams_ajax('<?= base_url("monitoring_klaim/monitoring_klaim/page_data_kunjungan") ?>', '#tabA')
                    }
                    break;
                case 'tab_klaim':
                    if ($('#tabB').html() == '') {
                        syams_ajax('<?= base_url("monitoring_klaim/monitoring_klaim/page_data_klaim") ?>', '#tabB')
                    }
                    break;
                case 'tab_histori_pelayanan':
                    if ($('#tabC').html() == '') {
                        syams_ajax('<?= base_url("monitoring_klaim/monitoring_klaim/page_history_pelayanan") ?>', '#tabC')
                    }
                    break;
                case 'tab_klaim_jaminan_raharja':
                    if ($('#tabD').html() == '') {
                        syams_ajax('<?= base_url("monitoring_klaim/monitoring_klaim/page_klaim_jasaraharja") ?>', '#tabD')
                    }
                    break;
            }
            return false;
        })
	})
</script>