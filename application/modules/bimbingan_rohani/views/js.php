<script>
	$(function() {
		// tabs
		$('#tabs-bimroh a:first').tab('show');
		syams_ajax('<?= base_url("bimbingan_rohani/page_permintaan_bimroh") ?>', '#tab1');

		$(document).on('click', '.nav-item', function() {
			let id_tab = $(this).attr('id');

			switch (id_tab) {
				case 'tabs1':
					if ($('#tab1').html() == '') {
						syams_ajax('<?= base_url("bimbingan_rohani/page_permintaan_bimroh") ?>', '#tab1');
					}
					break;

				case 'tabs2':
					if ($('#tab2').html() == '') {
						syams_ajax('<?= base_url("bimbingan_rohani/page_data_bimroh") ?>', '#tab2');
					}
					break;
			}
			return false;
		});
	});

	function paging(page, tab) {
        switch (tab) {
            case 1:
                getListPermintaanBimroh(page);
                $('#page-now1').val(page);
                break;
            case 2:
                getListDataBimroh(page);
                $('#page-now2').val(page);
                break;
            default:
                break;
        }
    }

</script>
