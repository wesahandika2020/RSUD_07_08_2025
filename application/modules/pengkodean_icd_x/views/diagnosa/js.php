<script>
	$(function(){
		$('#code-diagnosa').select2({
			ajax: {
				url: "<?= base_url('pengkodean_icd_x/api/Pengkodean_icd_x_auto/code_icd_auto') ?>",
				dataType: 'JSON',
				quietMillis: 100,
				data: function(term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						page: page, // page number
					};
				},
				results: function(data, page) {
					var more = (page * 20) < data.total; // whether or not there are more results available

					// notice we return the value of more so Select2 knows if more results can be loaded
					return {
						results: data.data,
						more: more
					};
				}
			},
			formatResult: function(data) {
				var markup = '<b>' + data.kode_icdx_rinci + '</b> <br/>' + data.nama;
				return markup;
			},
			formatSelection: function(data) {
				$('#code-diagnosa').val(data.id);
				return data.kode_icdx;
			}
		});

		$('#code-diagnosa-asterik').select2({
			ajax: {
				url: "<?= base_url('pengkodean_icd_x/api/Pengkodean_icd_x_auto/code_icd_asterik_auto') ?>",
				dataType: 'JSON',
				quietMillis: 100,
				data: function(term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						page: page, // page number
					};
				},
				results: function(data, page) {
					var more = (page * 20) < data.total; // whether or not there are more results available

					// notice we return the value of more so Select2 knows if more results can be loaded
					return {
						results: data.data,
						more: more
					};
				}
			},
			formatResult: function(data) {
				var kode_icdx = (data.kode_icdx_rinci !== null || data.kode_icdx_rinci !== '') ? (data.kode_icdx_rinci + ' - ') : '';

				var markup = '<b>' + kode_icdx + '</b>' + data.nama + '<br/><i>' + data.nama_idn + '</i>';
				return markup;
			},
			formatSelection: function(data) {
				$('#code-diagnosa-asterik').val(data.id);
				return data.kode_icdx;
			}
		});
	});

	
</script>
