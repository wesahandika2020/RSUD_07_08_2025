<?php $this->load->view( 'js' ) ?>
<script>
	if (typeof MonitorAntrianFarmasi !== 'function') {
		window.MonitorAntrianFarmasi = class extends BaseClass {
			constructor() {
				super();
				this.warp = $('#warp-monitor-antrian');
				this.baseUrl = "<?= base_url( 'antrian_farmasi/api/antrian_farmasi/' ) ?>";
			}

			init() {
				this.getMonitorAntrian()
			}

			async getMonitorAntrian() {
				try {
					const url = this.baseUrl + 'data_monitor_antrian'
					const data = await this.ajaxGet(url)

					for(const value of data.panggil){
						$('#loket-panggil').html(value.nomor_antrean);
						$('#lokasi-loket').html('LOKET '+ value.loket);
					}

					this.getLoketSatu(data.loket_satu);
					this.getLoketDua(data.loket_dua);
					this.getLoketTiga(data.loket_tiga);
                    this.getLoketEmpat(data.loket_empat);
				} catch (error) {
					console.error(error)
					accessFailed(error)
				}
			}

			getLoketSatu(data){
				if(data === null) return;
				$('#loket-satu').html(data.nomor_antrean);
			}

			getLoketDua(data){
				if(data === null) return;
				$('#loket-dua').html(data.nomor_antrean);
			}

			getLoketTiga(data){
				if(data === null) return;
				$('#loket-tiga').html(data.nomor_antrean);
			}

            getLoketEmpat(data){
                if(data === null) return;
                $('#loket-empat').html(data.nomor_antrean);
            }
		}
	}

	$(function () {
		new MonitorAntrianFarmasi().init()
	})
</script>
