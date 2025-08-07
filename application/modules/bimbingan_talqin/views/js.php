<script>
	$(function() {
		// tabs
		$('#tabs-talqin a:first').tab('show');
		syams_ajax('<?= base_url("bimbingan_talqin/page_permintaan_talqin") ?>', '#tab1');

		$(document).on('click', '.nav-item', function() {
			let id_tab = $(this).attr('id');

			switch (id_tab) {
				case 'tabs1':
					if ($('#tab1').html() == '') {
						syams_ajax('<?= base_url("bimbingan_talqin/page_permintaan_talqin") ?>', '#tab1');
					}
					break;

				case 'tabs2':
					if ($('#tab2').html() == '') {
						syams_ajax('<?= base_url("bimbingan_talqin/page_data_talqin") ?>', '#tab2');
					}
					break;
			}
			return false;
		});
	});

	function paging(page, tab) {
        switch (tab) {
            case 1:
                getListPermintaanTalqin(page);
                $('#page-now1').val(page);
                break;
            case 2:
                getListDataTalqin(page);
                $('#page-now2').val(page);
                break;
            default:
                break;
        }
    }

</script>
