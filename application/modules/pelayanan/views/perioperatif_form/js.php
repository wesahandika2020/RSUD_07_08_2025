<script>
	$(function() {
		$('#rp_asma, #rp_dm, #rp_cardiovascular, #rp_kanker, #rp_thalasemia, #rp_lain, #rpt_lain_input').attr('disabled', true)
		$('[name="riwayat_penyakit"]').change(function() {
			if ($(this).val() === '1') {
				$('#rp_asma, #rp_dm, #rp_cardiovascular, #rp_kanker, #rp_thalasemia, #rp_lain, #rpt_lain_input').attr('disabled', false).prop('checked', false)
			} else {
				$('#rp_asma, #rp_dm, #rp_cardiovascular, #rp_kanker, #rp_thalasemia, #rp_lain, #rpt_lain_input').attr('disabled', true).prop('checked', false)
			}
		})
		$('#ket_alergi, #rp_dm, #rp_cardiovascular, #rp_kanker, #rp_thalasemia, #rp_lain, #rpt_lain_input').attr('disabled', true)
		$('[name="alergi"]').change(function() {
			if ($(this).val() === '1') {
				$('#rp_asma, #rp_dm, #rp_cardiovascular, #rp_kanker, #rp_thalasemia, #rp_lain, #rpt_lain_input').attr('disabled', false).prop('checked', false)
			} else {
				$('#rp_asma, #rp_dm, #rp_cardiovascular, #rp_kanker, #rp_thalasemia, #rp_lain, #rpt_lain_input').attr('disabled', true).prop('checked', false)
			}
		})
		// $('#modal-perioperatif-pra').modal('show')
	})

	function entriFormPerioperatifPra(id) {
		$('[name="id_jadwal_operasi"').val(id)
		$('#modal-perioperatif-pra').modal('show')
	}
</script>	