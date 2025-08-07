<!-- <style type="text/css"> tr, td { border-color: black; border: solid 1px; }</style> -->
<script>
	$(function() {

		var dWidth = $(window).width();
	    var dHeight = $(window).height();
	    var x = screen.width / 2 - dWidth / 2;
	    var y = screen.height / 2 - dHeight / 2;

		//btn search data
        $('#btn-etiket').click(function() {
            $('#modal-cetak-etiket').modal('show');
            // $('#form-cetak-etiket')[0].reset();
        });

        $('#jam-cetak').timepicker({
            format: 'HH:mm',
            showInputs: true,
            showMeridian: false
        });

		$("#wizard-dpmp").bwizard();
		$("#wizard-diet-group").bwizard();
		$('#d-waktu-dpmp').datetimepicker({
            format: 'DD/MM/YYYY HH:mm',
            pickSecond: false,
            pick12HourFormat: false,
            // maxDate: new Date(),
            beforeShow: function(i) { if ($(i).attr('readonly')) { return false; } }
        });

        $('#d-waktu-search, #tanggal-awal-cetak').datepicker({
			format: 'dd/mm/yyyy',
			endDate: new Date(),
		}).on('changeDate', function() {
			$(this).datepicker('hide');
		});

        $('#tanggal-akhir-cetak').datepicker({
			format: 'dd/mm/yyyy',
			// endDate: new Date(),
		}).on('changeDate', function() {
			$(this).datepicker('hide');
		});

		$('#d-waktu-search').change(function() {
			getListDPMP($('#d-id-layanan-pendaftaran').val(), 1);
		});

		$('#d-img-calendar').click(function() {
			$('#d-waktu-search').datepicker('show')
		});

		$("#wizard-form").bwizard();
		$("#wizard-form-cppt").bwizard();
		$("#wizard-form-edit-diet-cair").bwizard();

		$('#d-nadis').select2c({
			ajax: {
				url: "<?= base_url('pelayanan/api/pelayanan/nadis_auto') ?>",
				dataType: 'json',
				quietMillis: 100,
				allowClear: true,
				data: function(term, page) { // page is the one-based page number tracked by Select2
					return {
						q: term, //search term
						page: page, // page number
						jenis: $('#d-profesi').val(),
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
				var markup = '<b>' + data.nama + '</b><br/><i>' + data.spesialisasi + '</i>';
				return markup;
			},
			formatSelection: function(data) {
				return data.nama;
			}
		});
	});

	function cetakEtiket() {

		if ($('#diet-cetak').val() === '') {
            $('#modal-cetak-etiket').animate({
                scrollTop: 0
            }, '100');
            syams_validation('#diet-cetak', 'Silakan Pilih Tipe Diet Terlebih Dahulu!');
            return false;
        }

        if ($('#diet-cetak').val() === 'Diet Makan' && $('#jam-cetak').val() === '')  {

        	$('#modal-cetak-etiket').animate({
                scrollTop: 0
            }, '100');
            syams_validation('#jam-cetak', 'Silakan Tentukan Waktu Makan Terlebih Dahulu!');
            return false;
        }
        
        bootbox.dialog({
            message: "Anda yakin akan mencetak Etiket",
            title: "Cetak Riwayat Kunjungan",
            buttons: {
                batal: {
                    label: '<i class="fas fa-fw fa-window-close"></i> Batal',
                    className: "btn-secondary",
                    callback: function() {

                    }
                },
                masuk: {
                    label: '<i class="fas fa-fw fa-check-circle"></i> Cetak',
                    className: "btn-info",
                    callback: function() {
                        $.ajax({
                            type: 'GET',
                            url: '<?= base_url("gizi/api/gizi/cetak_etiket") ?>',
                            data: $('#form-cetak-etiket').serialize(),
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {

								let tanggal_awal = '';
								let tanggal_akhir = '';
								let no_rm = '';
								let nama = '';
								let diet = '';
								let jam = '';
								let ruangan_diet = '';

                            	tanggal_awal = data.tanggal_awal;
                            	tanggal_akhir = data.tanggal_akhir;
                            	no_rm = data.no_rm;
                            	nama = data.nama;
                            	diet = data.diet_cetak;
                            	jam = data.jam_cetak;
								ruangan_diet = data.ruangan_diet;



                                window.open("<?php echo base_url('gizi/gizi/cetak_etiket') ?>?tanggal_awal=" + tanggal_awal + "&tanggal_akhir=" + tanggal_akhir + "&no_rm=" + no_rm + "&nama=" + nama + "&diet=" + diet + "&jam=" + jam + "&ruangan_diet=" + ruangan_diet, "Cetak Etiket",'width='+dWidth+', height='+dHeight+', left='+x+',top='+y);
                            },
                            error: function(e) {
                                messageEditFailed();
                            }
                        });
                    }
                }
            }
        });
    }

	function bersihForm() {

		resetFormDPMP();

	}

    function panggilForm() {
        let id_layanan_pendaftaran = $('#d-id-layanan-pendaftaran').val();
        resetFormDPMP();
        $('#wizard-dpmp').bwizard('show', '0');
        $.ajax({
            type: 'GET',
            url: '<?= base_url("gizi/api/gizi/auto_form_dpmp") ?>/id_layanan/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            success: function(data) {


                if(data !== null){

                    $.each(data.dpmp, function(i, v) {

                    let dpmp = v;
                    
                    $('#d-waktu-dpmp').val((dpmp.waktu_dpmp !== null ? datetimefmysql(dpmp.waktu_dpmp) : '')).attr('disabled', false);

                    $('#d-profesi').val(dpmp.profesi).attr('disabled', false);
                    $('#d-nadis').select2c('readonly', false);
                    $('#d-nadis').val(dpmp.nadis);
                    $('#s2id_d-nadis a .select2c-chosen').html(dpmp.petugas);

                    $('#d-ttd-nadis').attr('disabled', false);
                    if (dpmp.ttd_nadis !== null) { $('#d-ttd-nadis').prop('checked', true) }
                    $('#status-ruang-pasien').val('');		
                    $('#status-ruang-pasien').val(dpmp.status_ruang).attr('disabled', false);

                    $('#dpmp-dm').attr('disabled', false);
                    if (dpmp.dpmp_dm !== null) { $('#dpmp-dm').prop('checked', true) }
                    $('#d-ttd-nadis').attr('disabled', false);
                    $('#jns-diet-mp').val(dpmp.jns_diet_mp).attr('disabled', false);
                    $('#btk-mkn-mp').val(dpmp.btk_mkn_mp).attr('disabled', false);

                    $('#dpmp-rg').attr('disabled', false);
                    if (dpmp.dpmp_rg !== null) { $('#dpmp-rg').prop('checked', true) }
                    $('#jns-diet-sp').val(dpmp.jns_diet_sp).attr('disabled', false);
                    $('#btk-mkn-sp').val(dpmp.btk_mkn_sp).attr('disabled', false);

                    $('#dpmp-rl').attr('disabled', false);
                    if (dpmp.dpmp_rl !== null) { $('#dpmp-rl').prop('checked', true) }
                    $('#jns-diet-ms').val(dpmp.jns_diet_ms).attr('disabled', false);
                    $('#btk-mkn-ms').val(dpmp.btk_mkn_ms).attr('disabled', false);

                    $('#dpmp-dj').attr('disabled', false);
                    if (dpmp.dpmp_dj !== null) { $('#dpmp-dj').prop('checked', true) }
                    $('#jns-diet-ss').val(dpmp.jns_diet_ss).attr('disabled', false);
                    $('#btk-mkn-ss').val(dpmp.btk_mkn_ss).attr('disabled', false);

                    $('#dpmp-rs').attr('disabled', false);
                    if (dpmp.dpmp_rs !== null) { $('#dpmp-rs').prop('checked', true) }
                    $('#jns-diet-mm').val(dpmp.jns_diet_mm).attr('disabled', false);
                    $('#btk-mkn-mm').val(dpmp.btk_mkn_mm).attr('disabled', false);
                    
                    $('#dpmp-dl').attr('disabled', false);
                    if (dpmp.dpmp_dl !== null) { $('#dpmp-dl').prop('checked', true) }
                    $('#jns-diet-sm').val(dpmp.jns_diet_sm).attr('disabled', false);
                    $('#btk-mkn-sm').val(dpmp.btk_mkn_sm).attr('disabled', false);
                    
                    $('#dpmp-ts').attr('disabled', false);
                    if (dpmp.dpmp_ts !== null) { $('#dpmp-ts').prop('checked', true) }

                    $('#dpmp-dh').attr('disabled', false);
                    if (dpmp.dpmp_dh !== null) { $('#dpmp-dh').prop('checked', true) }

                    $('#dpmp-tktp').attr('disabled', false);
                    if (dpmp.dpmp_tktp !== null) { $('#dpmp-tktp').prop('checked', true) }

                    $('#dpmp-tkal').attr('disabled', false);
                    if (dpmp.dpmp_tkal !== null) { $('#dpmp-tkal').prop('checked', true) }
                    
                    $('#dpmp-rkal').attr('disabled', false);
                    if (dpmp.dpmp_rkal !== null) { $('#dpmp-rkal').prop('checked', true) }

                    $('#dpmp-rp').attr('disabled', false);
                    if (dpmp.dpmp_rp !== null) { $('#dpmp-rp').prop('checked', true) }

                    $('#dpmp-rpur').attr('disabled', false);
                    if (dpmp.dpmp_rpur !== null) { $('#dpmp-rpur').prop('checked', true) }

                    $('#dpmp-b').attr('disabled', false);
                    if (dpmp.dpmp_b !== null) { $('#dpmp-b').prop('checked', true) }

                    $('#dpmp-sonde').attr('disabled', false);
                    if (dpmp.dpmp_sonde !== null) { $('#dpmp-sonde').prop('checked', true) }

                    $('#dpmp-c').attr('disabled', false);
                    if (dpmp.dpmp_c !== null) { $('#dpmp-c').prop('checked', true) }
                    
                    $('#dpmp-p').attr('disabled', false);
                    if (dpmp.dpmp_p !== null) { $('#dpmp-p').prop('checked', true) }

                    $('#mp-mps').val(dpmp.mp_makan_pasien).attr('disabled', false);

                    $('#sp-mps').val(dpmp.sp_makan_pasien).attr('disabled', false);

                    $('#ms-mps').val(dpmp.ms_makan_pasien).attr('disabled', false);

                    $('#ss-mps').val(dpmp.ss_makan_pasien).attr('disabled', false);

                    $('#mm-mps').val(dpmp.mm_makan_pasien).attr('disabled', false);

                    $('#sm-mps').val(dpmp.sm_makan_pasien).attr('disabled', false);

                    $('#ket-makan-pasien').val(dpmp.ket_makan_pasien).attr('disabled', false);

                    $('#mp-diet-cair').val(dpmp.mp_diet_cair).attr('disabled', false);

                    $('#ms-diet-cair').val(dpmp.ms_diet_cair).attr('disabled', false);

                    $('#mm-diet-cair').val(dpmp.mm_diet_cair).attr('disabled', false);

                    $('#sp-diet-cair').val(dpmp.sp_diet_cair).attr('disabled', false);

                    $('#ss-diet-cair').val(dpmp.ss_diet_cair).attr('disabled', false);

                    $('#sm-diet-cair').val(dpmp.sm_diet_cair).attr('disabled', false);

                    showAutoDietCair(dpmp.id);

                        let table_form_diet_cair = '';

                    $('#table-form-diet-cair').empty();

                    table_form_diet_cair = `<tr><td width="12%"><b>Diet</b></td>
                                                                <td width="1%">:</td>
                                                                <td width="87%">
                                                                    <div class="input-group">
                                                                        <?= form_dropdown('dpmp_diet', $dpmp_diet, array(), 'id=dpmp-diet class="custom-form col-lg-3" onchange="clearValidate(this)"') ?>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="12%"><b>Item Diet</b></td>
                                                                <td width="1%">:</td>
                                                                <td width="87%">
                                                                    <div class="input-group">
                                                                        <input type="text" name="dpmp_item" id="dpmp-item" class="select2c-input clear-input d-inline-block">
                                                                    </div>
                                                                </td>
                                                            </tr>`;

                    $('#table-form-diet-cair').append(table_form_diet_cair);

                    $('#dpmp-item').select2c({
                        ajax: {
                            url: "<?= base_url('gizi/api/gizi/item_diet') ?>",
                            dataType: 'json',
                            quietMillis: 100,
                            allowClear: true,
                            data: function(term, page) { // page is the one-based page number tracked by Select2
                                return {
                                    q: term, //search term
                                    page: page, // page number
                                    jenis: $('#dpmp-diet').val(),
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
                            var markup = '<b>' + data.nama + '</b>';
                            return markup;
                        },
                        formatSelection: function(data) {
                            return data.nama;
                        }
                    });

                    $('#table-jam-pemberian').empty();

                    let table_jam_pemberian = '';

                    table_jam_pemberian = `<tr>
                        <td width="12%"><b>Jam Pemberian</b></td>
                        <td width="1%">:</td>
                        <td width="21,75%">
                            <div class="input-group">
                                <input type="text" name="dpmp_jam_satu" id="dpmp-jam-satu" class="custom-form clear-input d-inline-block col-lg-4 ml-2">
                            </div>
                        </td>
                        <td width="21.75%">
                            <div class="input-group">
                                <input type="text" name="dpmp_jam_dua" id="dpmp-jam-dua" class="custom-form clear-input d-inline-block col-lg-4 ml-2">
                            </div>
                        </td>
                        <td width="21.75%">
                            <div class="input-group">			
                                <input type="text" name="dpmp_jam_tiga" id="dpmp-jam-tiga" class="custom-form clear-input d-inline-block col-lg-4 ml-2">
                            </div>
                        </td>
                        <td width="21.75%">
                            <div class="input-group">		
                                <input type="text" name="dpmp_jam_empat" id="dpmp-jam-empat" class="custom-form clear-input d-inline-block col-lg-4 ml-2">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td width="12%"></td>
                        <td width="1%"></td>
                        <td width="21.75%">	
                            <div class="input-group">	
                                <input type="text" name="dpmp_jam_lima" id="dpmp-jam-lima" class="custom-form clear-input d-inline-block col-lg-4 ml-2">
                            </div>
                        </td>
                        <td width="21.75%">
                            <div class="input-group">
                                <input type="text" name="dpmp_jam_enam" id="dpmp-jam-enam" class="custom-form clear-input d-inline-block col-lg-4 ml-2">
                            </div>
                        </td>
                        <td width="21.75%">
                            <div class="input-group">
                                <input type="text" name="dpmp_jam_tujuh" id="dpmp-jam-tujuh" class="custom-form clear-input d-inline-block col-lg-4 ml-2">
                            </div>
                        </td>
                        <td width="21.75%">
                            <div class="input-group">
                                <input type="text" name="dpmp_jam_delapan" id="dpmp-jam-delapan" class="custom-form clear-input d-inline-block col-lg-4 ml-2">
                            </div>
                        </td>
                    </tr>`;

                    $('#table-jam-pemberian').append(table_jam_pemberian);

                    $('#dpmp-jam-satu, #dpmp-jam-dua, #dpmp-jam-tiga, #dpmp-jam-empat, #dpmp-jam-lima, #dpmp-jam-enam, #dpmp-jam-tujuh, #dpmp-jam-delapan').timepicker({
                        format: 'HH:mm',
                        showInputs: true,
                        showMeridian: false
                    });

                    $('#dpmp-jam-satu, #dpmp-jam-dua, #dpmp-jam-tiga, #dpmp-jam-empat, #dpmp-jam-lima, #dpmp-jam-enam, #dpmp-jam-tujuh, #dpmp-jam-delapan').val('');
                    
                    $('#table-add-dpmp').empty();

                    let table_add_dpmp = '';

                    table_add_dpmp = `<tr>
                        <td width="12%"><b>Keterangan</b></td>
                        <td width="1%">:</td>
                        <td width="50%">
                            <div class="input-group">
                                <input type="text" name="dpmp_keterangan" id="dpmp-keterangan" class="custom-form clear-input d-inline-block col-lg-12 mr-1" placeholder="Keterangan Diet...">
                            </div>
                        </td>
                        <td width="37%">
                            <div class="input-group">
                                <input type="number" name="dpmp_gram" id="dpmp-gram" class="custom-form clear-input d-inline-block col-lg-6 mr-1"> Gr
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <button type="button" class="btn btn-info" onclick="addDPMPDiet()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah Diet Cair</button>
                        </td>
                    </tr>`;

                    $('#table-add-dpmp').append(table_add_dpmp);

                    $('#dpmp-footer').empty();

                    let dpmp_footer = '';

                    dpmp_footer = `<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
                            <button type="button" class="btn btn-info" onclick="simpanDPMP()"><span id="btn-dpmp"><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</span></button>`;

                    $('#dpmp-footer').append(dpmp_footer);
                    })

                }
            },
            error: function(e) {
                accessFailed('Terjadi Kesalahan | Gagal mengambil data');
            }
        });

    }

	function showAutoDietCair(id) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url("gizi/api/gizi/auto_form_diet_cair") ?>/id/' + id,
			cache: false,
			dataType: 'JSON',
			success: function(data) {
				if (data !== null) {

					$.each(data.diet_cair, function(i, v) {
						
						let jam_pemberian = '';

					        if(v.dpmp_jam_satu !== null && (v.dpmp_jam_dua !== null | v.dpmp_jam_tiga !== null | v.dpmp_jam_empat !== null | v.dpmp_jam_lima !== null | v.dpmp_jam_enam !== null | v.dpmp_jam_tujuh !== null | v.dpmp_jam_delapan !== null)){

					        	let psh_jam_satu = v.dpmp_jam_satu.split(':');
					        	let jam_satu = psh_jam_satu[0];
					        	jam_pemberian += +jam_satu + ', ';
					        
					        } else if(v.dpmp_jam_satu !== null){

					        	let psh_jam_satu = v.dpmp_jam_satu.split(':');
					        	let jam_satu = psh_jam_satu[0];
					        	jam_pemberian += +jam_satu;

					        }

					        if(v.dpmp_jam_dua !== null && (v.dpmp_jam_tiga !== null | v.dpmp_jam_empat !== null | v.dpmp_jam_lima !== null | v.dpmp_jam_enam !== null | v.dpmp_jam_tujuh !== null | v.dpmp_jam_delapan !== null)){

					        	let psh_jam_dua = v.dpmp_jam_dua.split(':');
					        	let jam_dua = psh_jam_dua[0];
					        	jam_pemberian += +jam_dua + ', ';

					        } else if(v.dpmp_jam_dua !== null){

					        	let psh_jam_dua = v.dpmp_jam_dua.split(':');
					        	let jam_dua = psh_jam_dua[0];
					        	jam_pemberian += +jam_dua;

					        }

					        if(v.dpmp_jam_tiga !== null && (v.dpmp_jam_empat !== null | v.dpmp_jam_lima !== null | v.dpmp_jam_enam !== null | v.dpmp_jam_tujuh !== null | v.dpmp_jam_delapan !== null)){

					        	let psh_jam_tiga = v.dpmp_jam_tiga.split(':');
					        	let jam_tiga = psh_jam_tiga[0];
					        	jam_pemberian += +jam_tiga + ', ';

					        } else if(v.dpmp_jam_tiga !== null){

					        	let psh_jam_tiga = v.dpmp_jam_tiga.split(':');
					        	let jam_tiga = psh_jam_tiga[0];
					        	jam_pemberian += +jam_tiga;

					        }

					        if(v.dpmp_jam_empat !== null && (v.dpmp_jam_lima !== null | v.dpmp_jam_enam !== null | v.dpmp_jam_tujuh !== null | v.dpmp_jam_delapan !== null)){

					        	let psh_jam_empat = v.dpmp_jam_empat.split(':');
					        	let jam_empat = psh_jam_empat[0];
					        	jam_pemberian += +jam_empat + ', ';

					        } else if(v.dpmp_jam_empat !== null){

					        	let psh_jam_empat = v.dpmp_jam_empat.split(':');
					        	let jam_empat = psh_jam_empat[0];
					        	jam_pemberian += +jam_empat;

					        }

					        if(v.dpmp_jam_lima !== null && (v.dpmp_jam_enam !== null | v.dpmp_jam_tujuh !== null | v.dpmp_jam_delapan !== null)){

					        	let psh_jam_lima = v.dpmp_jam_lima.split(':');
					        	let jam_lima = psh_jam_lima[0];
					        	jam_pemberian += +jam_lima + ', ';

					        } else if(v.dpmp_jam_lima !== null){

					        	let psh_jam_lima = v.dpmp_jam_lima.split(':');
					        	let jam_lima = psh_jam_lima[0];
					        	jam_pemberian += +jam_lima;

					        }

					        if(v.dpmp_jam_enam !== null && (v.dpmp_jam_tujuh !== null | v.dpmp_jam_delapan !== null)){

					        	let psh_jam_enam = v.dpmp_jam_enam.split(':');
					        	let jam_enam = psh_jam_enam[0];
					        	jam_pemberian += +jam_enam + ', ';

					        } else if(v.dpmp_jam_enam !== null){

					        	let psh_jam_enam = v.dpmp_jam_enam.split(':');
					        	let jam_enam = psh_jam_enam[0];
					        	jam_pemberian += +jam_enam;

					        }

					        if(v.dpmp_jam_tujuh !== null && (v.dpmp_jam_delapan !== null)){

					        	let psh_jam_tujuh = v.dpmp_jam_tujuh.split(':');
					        	let jam_tujuh = psh_jam_tujuh[0];
					        	jam_pemberian += +jam_tujuh + ', ';

					        } else if(v.dpmp_jam_tujuh !== null){

					        	let psh_jam_tujuh = v.dpmp_jam_tujuh.split(':');
					        	let jam_tujuh = psh_jam_tujuh[0];
					        	jam_pemberian += +jam_tujuh;

					        }

					        if(v.dpmp_jam_delapan !== null){

					        	let psh_jam_delapan = v.dpmp_jam_delapan.split(':');
					        	let jam_delapan = psh_jam_delapan[0];
					        	jam_pemberian += +jam_delapan;

					        }

					     let dpmp_jam_satu = '';
					     if(v.dpmp_jam_satu !== null){

					     	let jam_satu = v.dpmp_jam_satu.split(':');
					       	dpmp_jam_satu = jam_satu[0] + ':' + jam_satu[1];
					        
					     }

					     let dpmp_jam_dua = '';
					     if(v.dpmp_jam_dua !== null){

					     	let jam_dua = v.dpmp_jam_dua.split(':');
					       	dpmp_jam_dua = jam_dua[0] + ':' + jam_dua[1];
					        
					     }

					     let dpmp_jam_tiga = '';
					     if(v.dpmp_jam_tiga !== null){

					     	let jam_tiga = v.dpmp_jam_tiga.split(':');
					       	dpmp_jam_tiga = jam_tiga[0] + ':' + jam_tiga[1];
					        
					     }

					     let dpmp_jam_empat = '';
					     if(v.dpmp_jam_empat !== null){

					     	let jam_empat = v.dpmp_jam_empat.split(':');
					       	dpmp_jam_empat = jam_empat[0] + ':' + jam_empat[1];
					        
					     }

					     let dpmp_jam_lima = '';
					     if(v.dpmp_jam_lima !== null){

					     	let jam_lima = v.dpmp_jam_lima.split(':');
					       	dpmp_jam_lima = jam_lima[0] + ':' + jam_lima[1];
					        
					     }

					     let dpmp_jam_enam = '';
					     if(v.dpmp_jam_enam !== null){

					     	let jam_enam = v.dpmp_jam_enam.split(':');
					       	dpmp_jam_enam = jam_enam[0] + ':' + jam_enam[1];
					        
					     }

					     let dpmp_jam_tujuh = '';
					     if(v.dpmp_jam_tujuh !== null){

					     	let jam_tujuh = v.dpmp_jam_tujuh.split(':');
					       	dpmp_jam_tujuh = jam_tujuh[0] + ':' + jam_tujuh[1];
					        
					     }

					     let dpmp_jam_delapan = '';
					     if(v.dpmp_jam_delapan !== null){

					     	let jam_delapan = v.dpmp_jam_delapan.split(':');
					       	dpmp_jam_delapan = jam_delapan[0] + ':' + jam_delapan[1];
					        
					     }

					    let html = /* html */ `
		                    <tr>
				                <td class="number-diet" align="center">${++i}</td>
				                <td><input type="hidden" name="keterangan_diet_cair[]" value="${v.keterangan_diet_cair}"><input type="hidden" name="dpmp_item[]" value="${v.dpmp_item}"><input type="hidden" name="dpmp_diet[]" value="${v.dpmp_diet}">CAIR ${v.nama_item} ${v.keterangan_diet_cair}</td>
				                <td><input type="hidden" name="dpmp_jam_satu[]" value="${dpmp_jam_satu}"><input type="hidden" name="dpmp_jam_dua[]" value="${dpmp_jam_dua}"><input type="hidden" name="dpmp_jam_tiga[]" value="${dpmp_jam_tiga}"><input type="hidden" name="dpmp_jam_empat[]" value="${dpmp_jam_empat}"><input type="hidden" name="dpmp_jam_lima[]" value="${dpmp_jam_lima}"><input type="hidden" name="dpmp_jam_enam[]" value="${dpmp_jam_enam}"><input type="hidden" name="dpmp_jam_tujuh[]" value="${dpmp_jam_tujuh}"><input type="hidden" name="dpmp_jam_delapan[]" value="${dpmp_jam_delapan}"><input type="hidden" name="user_account[]" value="<?= $this->session->userdata("id_translucent") ?>"><input type="hidden" name="created_date[]" value="<?= date("Y-m-d H:i:s") ?>">${jam_pemberian}</td>
				                <td align="center"><button type="button" class="btn btn-secondary btn-xxs" onclick="removeList(this)"><i class="fas fa-trash-alt"></i></button>
				                </td>
				            </tr>
		                `;
		                $('#table-diet-cair tbody').append(html);
		            })
			
				}
			},
			error: function(e) {
				accessFailed('Terjadi Kesalahan | Gagal mengambil data');
			}

		});


			        

	}

    function editDPMP(id) {
        resetFormDPMP();
        $('#wizard-dpmp').bwizard('show', '0');
        $.ajax({
            type: 'GET',
            url: '<?= base_url("gizi/api/gizi/edit_form_dpmp") ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {


                if(data !== null){

                    $.each(data.dpmp, function(i, v) {

                    let dpmp = v;
                    $('#d-id-dpmp').val(dpmp.id);
                    $('#d-waktu-dpmp').val((dpmp.waktu_dpmp !== null ? datetimefmysql(dpmp.waktu_dpmp) : '')).attr('disabled', false);

                    $('#d-profesi').val(dpmp.profesi).attr('disabled', false);
                    $('#d-nadis').select2c('readonly', false);
                    $('#d-nadis').val(dpmp.nadis);
                    $('#s2id_d-nadis a .select2c-chosen').html(dpmp.petugas);

                    $('#d-ttd-nadis').attr('disabled', false);
                    if (dpmp.ttd_nadis !== null) { $('#d-ttd-nadis').prop('checked', true) }
                    $('#status-ruang-pasien').val('');		
                    $('#status-ruang-pasien').val(dpmp.status_ruang).attr('disabled', false);

                    $('#dpmp-dm').attr('disabled', false);
                    if (dpmp.dpmp_dm !== null) { $('#dpmp-dm').prop('checked', true) }
                    $('#d-ttd-nadis').attr('disabled', false);
                    $('#jns-diet-mp').val(dpmp.jns_diet_mp).attr('disabled', false);
                    $('#btk-mkn-mp').val(dpmp.btk_mkn_mp).attr('disabled', false);

                    $('#dpmp-rg').attr('disabled', false);
                    if (dpmp.dpmp_rg !== null) { $('#dpmp-rg').prop('checked', true) }
                    $('#jns-diet-sp').val(dpmp.jns_diet_sp).attr('disabled', false);
                    $('#btk-mkn-sp').val(dpmp.btk_mkn_sp).attr('disabled', false);

                    $('#dpmp-rl').attr('disabled', false);
                    if (dpmp.dpmp_rl !== null) { $('#dpmp-rl').prop('checked', true) }
                    $('#jns-diet-ms').val(dpmp.jns_diet_ms).attr('disabled', false);
                    $('#btk-mkn-ms').val(dpmp.btk_mkn_ms).attr('disabled', false);

                    $('#dpmp-dj').attr('disabled', false);
                    if (dpmp.dpmp_dj !== null) { $('#dpmp-dj').prop('checked', true) }
                    $('#jns-diet-ss').val(dpmp.jns_diet_ss).attr('disabled', false);
                    $('#btk-mkn-ss').val(dpmp.btk_mkn_ss).attr('disabled', false);

                    $('#dpmp-rs').attr('disabled', false);
                    if (dpmp.dpmp_rs !== null) { $('#dpmp-rs').prop('checked', true) }
                    $('#jns-diet-mm').val(dpmp.jns_diet_mm).attr('disabled', false);
                    $('#btk-mkn-mm').val(dpmp.btk_mkn_mm).attr('disabled', false);
                    
                    $('#dpmp-dl').attr('disabled', false);
                    if (dpmp.dpmp_dl !== null) { $('#dpmp-dl').prop('checked', true) }
                    $('#jns-diet-sm').val(dpmp.jns_diet_sm).attr('disabled', false);
                    $('#btk-mkn-sm').val(dpmp.btk_mkn_sm).attr('disabled', false);
                    
                    $('#dpmp-ts').attr('disabled', false);
                    if (dpmp.dpmp_ts !== null) { $('#dpmp-ts').prop('checked', true) }

                    $('#dpmp-dh').attr('disabled', false);
                    if (dpmp.dpmp_dh !== null) { $('#dpmp-dh').prop('checked', true) }

                    $('#dpmp-tktp').attr('disabled', false);
                    if (dpmp.dpmp_tktp !== null) { $('#dpmp-tktp').prop('checked', true) }

                    $('#dpmp-tkal').attr('disabled', false);
                    if (dpmp.dpmp_tkal !== null) { $('#dpmp-tkal').prop('checked', true) }
                    
                    $('#dpmp-rkal').attr('disabled', false);
                    if (dpmp.dpmp_rkal !== null) { $('#dpmp-rkal').prop('checked', true) }

                    $('#dpmp-rp').attr('disabled', false);
                    if (dpmp.dpmp_rp !== null) { $('#dpmp-rp').prop('checked', true) }

                    $('#dpmp-rpur').attr('disabled', false);
                    if (dpmp.dpmp_rpur !== null) { $('#dpmp-rpur').prop('checked', true) }

                    $('#dpmp-b').attr('disabled', false);
                    if (dpmp.dpmp_b !== null) { $('#dpmp-b').prop('checked', true) }

                    $('#dpmp-sonde').attr('disabled', false);
                    if (dpmp.dpmp_sonde !== null) { $('#dpmp-sonde').prop('checked', true) }

                    $('#dpmp-c').attr('disabled', false);
                    if (dpmp.dpmp_c !== null) { $('#dpmp-c').prop('checked', true) }
                    
                    $('#dpmp-p').attr('disabled', false);
                    if (dpmp.dpmp_p !== null) { $('#dpmp-p').prop('checked', true) }

                    $('#mp-mps').val(dpmp.mp_makan_pasien).attr('disabled', false);

                    $('#sp-mps').val(dpmp.sp_makan_pasien).attr('disabled', false);

                    $('#ms-mps').val(dpmp.ms_makan_pasien).attr('disabled', false);

                    $('#ss-mps').val(dpmp.ss_makan_pasien).attr('disabled', false);

                    $('#mm-mps').val(dpmp.mm_makan_pasien).attr('disabled', false);

                    $('#sm-mps').val(dpmp.sm_makan_pasien).attr('disabled', false);

                    $('#ket-makan-pasien').val(dpmp.ket_makan_pasien).attr('disabled', false);

                    $('#mp-diet-cair').val(dpmp.mp_diet_cair).attr('disabled', false);

                    $('#ms-diet-cair').val(dpmp.ms_diet_cair).attr('disabled', false);

                    $('#mm-diet-cair').val(dpmp.mm_diet_cair).attr('disabled', false);

                    $('#sp-diet-cair').val(dpmp.sp_diet_cair).attr('disabled', false);

                    $('#ss-diet-cair').val(dpmp.ss_diet_cair).attr('disabled', false);

                    $('#sm-diet-cair').val(dpmp.sm_diet_cair).attr('disabled', false);

                    showFormEditDietCair(id);

                        let table_form_diet_cair = '';

                    $('#table-form-diet-cair').empty();

                    table_form_diet_cair = `<tr><td width="12%"><b>Diet</b></td>
                                                                <td width="1%">:</td>
                                                                <td width="87%">
                                                                    <div class="input-group">
                                                                        <?= form_dropdown('dpmp_diet', $dpmp_diet, array(), 'id=dpmp-diet class="custom-form col-lg-3" onchange="clearValidate(this)"') ?>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="12%"><b>Item Diet</b></td>
                                                                <td width="1%">:</td>
                                                                <td width="87%">
                                                                    <div class="input-group">
                                                                        <input type="text" name="dpmp_item" id="dpmp-item" class="select2c-input clear-input d-inline-block">
                                                                    </div>
                                                                </td>
                                                            </tr>`;

                    $('#table-form-diet-cair').append(table_form_diet_cair);

                    $('#dpmp-item').select2c({
                        ajax: {
                            url: "<?= base_url('gizi/api/gizi/item_diet') ?>",
                            dataType: 'json',
                            quietMillis: 100,
                            allowClear: true,
                            data: function(term, page) { // page is the one-based page number tracked by Select2
                                return {
                                    q: term, //search term
                                    page: page, // page number
                                    jenis: $('#dpmp-diet').val(),
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
                            var markup = '<b>' + data.nama + '</b>';
                            return markup;
                        },
                        formatSelection: function(data) {
                            return data.nama;
                        }
                    });

                    $('#table-jam-pemberian').empty();

                    let table_jam_pemberian = '';

                    table_jam_pemberian = `<tr>
                                                <td width="12%"><b>Jam Pemberian</b></td>
                                                <td width="1%">:</td>
                                                <td width="21,75%">
                                                    <div class="input-group">
                                                        <input type="text" name="dpmp_jam_satu" id="dpmp-jam-satu" class="custom-form clear-input d-inline-block col-lg-4 ml-2">
                                                    </div>
                                                </td>
                                                <td width="21.75%">
                                                    <div class="input-group">
                                                        <input type="text" name="dpmp_jam_dua" id="dpmp-jam-dua" class="custom-form clear-input d-inline-block col-lg-4 ml-2">
                                                    </div>
                                                </td>
                                                <td width="21.75%">
                                                    <div class="input-group">			
                                                        <input type="text" name="dpmp_jam_tiga" id="dpmp-jam-tiga" class="custom-form clear-input d-inline-block col-lg-4 ml-2">
                                                    </div>
                                                </td>
                                                <td width="21.75%">
                                                    <div class="input-group">		
                                                        <input type="text" name="dpmp_jam_empat" id="dpmp-jam-empat" class="custom-form clear-input d-inline-block col-lg-4 ml-2">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="12%"></td>
                                                <td width="1%"></td>
                                                <td width="21.75%">	
                                                    <div class="input-group">	
                                                        <input type="text" name="dpmp_jam_lima" id="dpmp-jam-lima" class="custom-form clear-input d-inline-block col-lg-4 ml-2">
                                                    </div>
                                                </td>
                                                <td width="21.75%">
                                                    <div class="input-group">
                                                        <input type="text" name="dpmp_jam_enam" id="dpmp-jam-enam" class="custom-form clear-input d-inline-block col-lg-4 ml-2">
                                                    </div>
                                                </td>
                                                <td width="21.75%">
                                                    <div class="input-group">
                                                        <input type="text" name="dpmp_jam_tujuh" id="dpmp-jam-tujuh" class="custom-form clear-input d-inline-block col-lg-4 ml-2">
                                                    </div>
                                                </td>
                                                <td width="21.75%">
                                                    <div class="input-group">
                                                        <input type="text" name="dpmp_jam_delapan" id="dpmp-jam-delapan" class="custom-form clear-input d-inline-block col-lg-4 ml-2">
                                                    </div>
                                                </td>
                                            </tr>`;

                    $('#table-jam-pemberian').append(table_jam_pemberian);

                    $('#dpmp-jam-satu, #dpmp-jam-dua, #dpmp-jam-tiga, #dpmp-jam-empat, #dpmp-jam-lima, #dpmp-jam-enam, #dpmp-jam-tujuh, #dpmp-jam-delapan').timepicker({
                        format: 'HH:mm',
                        showInputs: true,
                        showMeridian: false
                    });

                    $('#dpmp-jam-satu, #dpmp-jam-dua, #dpmp-jam-tiga, #dpmp-jam-empat, #dpmp-jam-lima, #dpmp-jam-enam, #dpmp-jam-tujuh, #dpmp-jam-delapan').val('');
                    
                    $('#table-add-dpmp').empty();

                    let table_add_dpmp = '';

                    table_add_dpmp = `<tr>
                                        <td width="12%"><b>Keterangan</b></td>
                                        <td width="1%">:</td>
                                        <td width="50%">
                                            <div class="input-group">
                                                <input type="text" name="dpmp_keterangan" id="dpmp-keterangan" class="custom-form clear-input d-inline-block col-lg-12 mr-1" placeholder="Keterangan Diet...">
                                            </div>
                                        </td>
                                        <td width="37%">
                                            <div class="input-group">
                                                <input type="number" name="dpmp_gram" id="dpmp-gram" class="custom-form clear-input d-inline-block col-lg-6 mr-1"> Gr
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <button type="button" class="btn btn-info" onclick="addDPMPDiet()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah Diet Cair</button>
                                        </td>
                                    </tr>`;

                    $('#table-add-dpmp').append(table_add_dpmp);

                    $('#dpmp-footer').empty();

                    let dpmp_footer = '';

                    dpmp_footer = `<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
                            <button type="button" class="btn btn-info" onclick="simpanDPMP()"><span id="btn-dpmp"><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</span></button>`;

                    $('#dpmp-footer').append(dpmp_footer);
                    })

                }
            },
            error: function(e) {
                accessFailed('Terjadi Kesalahan | Gagal mengambil data');
            }
        });

    }

	function showFormEditDietCair(id) {
		$('#table-diet-cair tbody').empty();
		$.ajax({
			type: 'GET',
			url: '<?= base_url("gizi/api/gizi/edit_form_diet_cair") ?>/id/' + id,
			cache: false,
			dataType: 'JSON',
			success: function(data) {

				if (data !== null) {

					$.each(data.diet_cair, function(i, v) {

						
						let jam_pemberian = '';

					        if(v.dpmp_jam_satu !== null && (v.dpmp_jam_dua !== null | v.dpmp_jam_tiga !== null | v.dpmp_jam_empat !== null | v.dpmp_jam_lima !== null | v.dpmp_jam_enam !== null | v.dpmp_jam_tujuh !== null | v.dpmp_jam_delapan !== null)){

					        	let psh_jam_satu = v.dpmp_jam_satu.split(':');
					        	let jam_satu = psh_jam_satu[0];
					        	jam_pemberian += +jam_satu + ', ';
					        
					        } else if(v.dpmp_jam_satu !== null){

					        	let psh_jam_satu = v.dpmp_jam_satu.split(':');
					        	let jam_satu = psh_jam_satu[0];
					        	jam_pemberian += +jam_satu;

					        }

					        if(v.dpmp_jam_dua !== null && (v.dpmp_jam_tiga !== null | v.dpmp_jam_empat !== null | v.dpmp_jam_lima !== null | v.dpmp_jam_enam !== null | v.dpmp_jam_tujuh !== null | v.dpmp_jam_delapan !== null)){

					        	let psh_jam_dua = v.dpmp_jam_dua.split(':');
					        	let jam_dua = psh_jam_dua[0];
					        	jam_pemberian += +jam_dua + ', ';

					        } else if(v.dpmp_jam_dua !== null){

					        	let psh_jam_dua = v.dpmp_jam_dua.split(':');
					        	let jam_dua = psh_jam_dua[0];
					        	jam_pemberian += +jam_dua;

					        }

					        if(v.dpmp_jam_tiga !== null && (v.dpmp_jam_empat !== null | v.dpmp_jam_lima !== null | v.dpmp_jam_enam !== null | v.dpmp_jam_tujuh !== null | v.dpmp_jam_delapan !== null)){

					        	let psh_jam_tiga = v.dpmp_jam_tiga.split(':');
					        	let jam_tiga = psh_jam_tiga[0];
					        	jam_pemberian += +jam_tiga + ', ';

					        } else if(v.dpmp_jam_tiga !== null){

					        	let psh_jam_tiga = v.dpmp_jam_tiga.split(':');
					        	let jam_tiga = psh_jam_tiga[0];
					        	jam_pemberian += +jam_tiga;

					        }

					        if(v.dpmp_jam_empat !== null && (v.dpmp_jam_lima !== null | v.dpmp_jam_enam !== null | v.dpmp_jam_tujuh !== null | v.dpmp_jam_delapan !== null)){

					        	let psh_jam_empat = v.dpmp_jam_empat.split(':');
					        	let jam_empat = psh_jam_empat[0];
					        	jam_pemberian += +jam_empat + ', ';

					        } else if(v.dpmp_jam_empat !== null){

					        	let psh_jam_empat = v.dpmp_jam_empat.split(':');
					        	let jam_empat = psh_jam_empat[0];
					        	jam_pemberian += +jam_empat;

					        }

					        if(v.dpmp_jam_lima !== null && (v.dpmp_jam_enam !== null | v.dpmp_jam_tujuh !== null | v.dpmp_jam_delapan !== null)){

					        	let psh_jam_lima = v.dpmp_jam_lima.split(':');
					        	let jam_lima = psh_jam_lima[0];
					        	jam_pemberian += +jam_lima + ', ';

					        } else if(v.dpmp_jam_lima !== null){

					        	let psh_jam_lima = v.dpmp_jam_lima.split(':');
					        	let jam_lima = psh_jam_lima[0];
					        	jam_pemberian += +jam_lima;

					        }

					        if(v.dpmp_jam_enam !== null && (v.dpmp_jam_tujuh !== null | v.dpmp_jam_delapan !== null)){

					        	let psh_jam_enam = v.dpmp_jam_enam.split(':');
					        	let jam_enam = psh_jam_enam[0];
					        	jam_pemberian += +jam_enam + ', ';

					        } else if(v.dpmp_jam_enam !== null){

					        	let psh_jam_enam = v.dpmp_jam_enam.split(':');
					        	let jam_enam = psh_jam_enam[0];
					        	jam_pemberian += +jam_enam;

					        }

					        if(v.dpmp_jam_tujuh !== null && (v.dpmp_jam_delapan !== null)){

					        	let psh_jam_tujuh = v.dpmp_jam_tujuh.split(':');
					        	let jam_tujuh = psh_jam_tujuh[0];
					        	jam_pemberian += +jam_tujuh + ', ';

					        } else if(v.dpmp_jam_tujuh !== null){

					        	let psh_jam_tujuh = v.dpmp_jam_tujuh.split(':');
					        	let jam_tujuh = psh_jam_tujuh[0];
					        	jam_pemberian += +jam_tujuh;

					        }

					        if(v.dpmp_jam_delapan !== null){

					        	let psh_jam_delapan = v.dpmp_jam_delapan.split(':');
					        	let jam_delapan = psh_jam_delapan[0];
					        	jam_pemberian += +jam_delapan;

					        }

					     let dpmp_jam_satu = '';
					     if(v.dpmp_jam_satu !== null){

					     	let jam_satu = v.dpmp_jam_satu.split(':');
					       	dpmp_jam_satu = jam_satu[0] + ':' + jam_satu[1];
					        
					     }

					     let dpmp_jam_dua = '';
					     if(v.dpmp_jam_dua !== null){

					     	let jam_dua = v.dpmp_jam_dua.split(':');
					       	dpmp_jam_dua = jam_dua[0] + ':' + jam_dua[1];
					        
					     }

					     let dpmp_jam_tiga = '';
					     if(v.dpmp_jam_tiga !== null){

					     	let jam_tiga = v.dpmp_jam_tiga.split(':');
					       	dpmp_jam_tiga = jam_tiga[0] + ':' + jam_tiga[1];
					        
					     }

					     let dpmp_jam_empat = '';
					     if(v.dpmp_jam_empat !== null){

					     	let jam_empat = v.dpmp_jam_empat.split(':');
					       	dpmp_jam_empat = jam_empat[0] + ':' + jam_empat[1];
					        
					     }

					     let dpmp_jam_lima = '';
					     if(v.dpmp_jam_lima !== null){

					     	let jam_lima = v.dpmp_jam_lima.split(':');
					       	dpmp_jam_lima = jam_lima[0] + ':' + jam_lima[1];
					        
					     }

					     let dpmp_jam_enam = '';
					     if(v.dpmp_jam_enam !== null){

					     	let jam_enam = v.dpmp_jam_enam.split(':');
					       	dpmp_jam_enam = jam_enam[0] + ':' + jam_enam[1];
					        
					     }

					     let dpmp_jam_tujuh = '';
					     if(v.dpmp_jam_tujuh !== null){

					     	let jam_tujuh = v.dpmp_jam_tujuh.split(':');
					       	dpmp_jam_tujuh = jam_tujuh[0] + ':' + jam_tujuh[1];
					        
					     }

					     let dpmp_jam_delapan = '';
					     if(v.dpmp_jam_delapan !== null){

					     	let jam_delapan = v.dpmp_jam_delapan.split(':');
					       	dpmp_jam_delapan = jam_delapan[0] + ':' + jam_delapan[1];
					        
					     }

					    let html = /* html */ `
		                    <tr>
				                <td class="number-diet" align="center">${++i}</td>
				                <td>CAIR ${v.nama_item} ${v.keterangan_diet_cair !== null ? v.keterangan_diet_cair : ''} ${v.dpmp_gram !== null ? v.dpmp_gram : ''}  Gr</td>
				                <td>${jam_pemberian}</td>
				                <td align="center"><button type="button" class="btn btn-secondary btn-xxs" onclick="editDietCair(${v.id})"><i class="fas fa-edit"></i></button><button type="button" class="btn btn-secondary btn-xxs" onclick="hapusDietCair(this, ${v.id})"><i class="fas fa-trash-alt"></i></button>
				                </td>
				            </tr>
		                `;
		                $('#table-diet-cair tbody').append(html);
		            })
			
				}
			},
			error: function(e) {
				accessFailed('Terjadi Kesalahan | Gagal mengambil data');
			}

		});

	}

	function hapusDietCair(obj, id) {
		let id_dpmp = $('#d-id-dpmp').val();

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
                            type : 'DELETE',
                            url: '<?= base_url("gizi/api/gizi/hapus_diet_cair") ?>/'+id,
                            cache: false,
                            dataType : 'JSON',
                            success: function(data) {
                                if (data.status) {
                                    messageCustom(data.message, 'Success');
                                    removeList(obj);
                                    editDPMP(id_dpmp);
                                }else{
                                    customAlert('Hapus Diet Cair', data.message);
                                }
                            },
                            error: function(e){
                                messageDeleteFailed();
                            }
                        });
                    }
                }
            }
        });
    }

    function editDietCair(id) {
        
        $('#modal-edit-diet-cair').modal('show');
        $('#wizard-form-edit-diet-cair').bwizard('show', '0');
        $('#modal-edit-diet-cair-label').html('Edit Diet Cair Pasien');

        $.ajax({
            type: 'GET',
            url: '<?= base_url("gizi/api/gizi/edit_detail_diet_cair") ?>/id/' + id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                
                if (data !== null) {


                    let diet_cair = data.diet_cair;
                    $.each(diet_cair, function(i, v) {

                        $('#id-diet-cair').val(v.id)

                        let table_form_diet_cair = '';

                        $('#table-form-edit-diet-cair').empty();

                        table_form_diet_cair = `<tr>
													<td width="12%"><b>Diet</b></td>
													<td width="1%">:</td>
													<td colspan="4">
														<div class="input-group">
															<?= form_dropdown('dpmp_diet', $dpmp_diet, array(), 'id=dpmp-edit-diet class="custom-form col-lg-3" onchange="clearValidate(this)"') ?>
														</div>
													</td>
												</tr>
												<tr>
													<td width="12%"><b>Item Diet</b></td>
													<td width="1%">:</td>
													<td colspan="4">
														<div class="input-group">
															<input type="text" name="dpmp_item" id="dpmp-edit-item" class="select2c-input clear-input d-inline-block">
														</div>
													</td>
												</tr>`;

                        $('#table-form-edit-diet-cair').append(table_form_diet_cair);

                        $('#dpmp-edit-diet').val(v.dpmp_diet);
                        
                        $('#dpmp-edit-item').select2c({
                            ajax: {
                                url: "<?= base_url('gizi/api/gizi/item_diet') ?>",
                                dataType: 'json',
                                quietMillis: 100,
                                allowClear: true,
                                data: function(term, page) { // page is the one-based page number tracked by Select2
                                    return {
                                        q: term, //search term
                                        page: page, // page number
                                        jenis: $('#dpmp-edit-diet').val(),
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
                                var markup = '<b>' + data.nama + '</b>';
                                return markup;
                            },
                            formatSelection: function(data) {
                                return data.nama;
                            }
                        });

                        if (v.dpmp_item === '') {
                            $('#s2id_dpmp-edit-item a .select2c-chosen').html();
                            $('#dpmp-edit-item').val();
                        } else {
                            $('#dpmp-edit-item').val(v.dpmp_item);
                            $('#s2id_dpmp-edit-item a .select2c-chosen').html(v.nama_item);
                        }

                        $('#table-edit-jam-pemberian').empty();

                        let table_jam_pemberian = '';

                        table_jam_pemberian = `<tr>
                                                    <td width="12%"><b>Jam Pemberian</b></td>
                                                    <td width="1%">:</td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" name="dpmp_jam_satu" id="dpmp-edit-jam-satu" class="custom-form clear-input d-inline-block col-lg-4 ml-2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" name="dpmp_jam_dua" id="dpmp-edit-jam-dua" class="custom-form clear-input d-inline-block col-lg-4 ml-2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">			
                                                            <input type="text" name="dpmp_jam_tiga" id="dpmp-edit-jam-tiga" class="custom-form clear-input d-inline-block col-lg-4 ml-2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">		
                                                            <input type="text" name="dpmp_jam_empat" id="dpmp-edit-jam-empat" class="custom-form clear-input d-inline-block col-lg-4 ml-2">
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="12%"></td>
                                                    <td width="1%"></td>
                                                    <td>	
                                                        <div class="input-group">	
                                                            <input type="text" name="dpmp_jam_lima" id="dpmp-edit-jam-lima" class="custom-form clear-input d-inline-block col-lg-4 ml-2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" name="dpmp_jam_enam" id="dpmp-edit-jam-enam" class="custom-form clear-input d-inline-block col-lg-4 ml-2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" name="dpmp_jam_tujuh" id="dpmp-edit-jam-tujuh" class="custom-form clear-input d-inline-block col-lg-4 ml-2">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" name="dpmp_jam_delapan" id="dpmp-edit-jam-delapan" class="custom-form clear-input d-inline-block col-lg-4 ml-2">
                                                        </div>
                                                    </td>
                                                </tr>`;

                        $('#table-edit-jam-pemberian').append(table_jam_pemberian);

                        $('#dpmp-edit-jam-satu, #dpmp-edit-jam-dua, #dpmp-edit-jam-tiga, #dpmp-edit-jam-empat, #dpmp-edit-jam-lima, #dpmp-edit-jam-enam, #dpmp-edit-jam-tujuh, #dpmp-edit-jam-delapan').timepicker({
                            format: 'HH:mm',
                            showInputs: true,
                            showMeridian: false
                        });

                        $('#dpmp-edit-jam-satu, #dpmp-edit-jam-dua, #dpmp-edit-jam-tiga, #dpmp-edit-jam-empat, #dpmp-edit-jam-lima, #dpmp-edit-jam-enam, #dpmp-edit-jam-tujuh, #dpmp-edit-jam-delapan').val('');

                        let dpmp_jam_satu = '';
                            if(v.dpmp_jam_satu !== null){

                                let jam_satu = v.dpmp_jam_satu.split(':');
                                dpmp_jam_satu = jam_satu[0] + ':' + jam_satu[1];

                                $('#dpmp-edit-jam-satu').val(dpmp_jam_satu);
                            
                            }

                            let dpmp_jam_dua = '';
                            if(v.dpmp_jam_dua !== null){

                                let jam_dua = v.dpmp_jam_dua.split(':');
                                dpmp_jam_dua = jam_dua[0] + ':' + jam_dua[1];
                                $('#dpmp-edit-jam-dua').val(dpmp_jam_dua);
                            
                            }

                            let dpmp_jam_tiga = '';
                            if(v.dpmp_jam_tiga !== null){

                                let jam_tiga = v.dpmp_jam_tiga.split(':');
                                dpmp_jam_tiga = jam_tiga[0] + ':' + jam_tiga[1];
                                $('#dpmp-edit-jam-tiga').val(dpmp_jam_tiga);
                            
                            }

                            let dpmp_jam_empat = '';
                            if(v.dpmp_jam_empat !== null){

                                let jam_empat = v.dpmp_jam_empat.split(':');
                                dpmp_jam_empat = jam_empat[0] + ':' + jam_empat[1];
                                $('#dpmp-edit-jam-empat').val(dpmp_jam_empat);
                            
                            }

                            let dpmp_jam_lima = '';
                            if(v.dpmp_jam_lima !== null){

                                let jam_lima = v.dpmp_jam_lima.split(':');
                                dpmp_jam_lima = jam_lima[0] + ':' + jam_lima[1];
                                $('#dpmp-edit-jam-lima').val(dpmp_jam_lima);
                            
                            }

                            let dpmp_jam_enam = '';
                            if(v.dpmp_jam_enam !== null){

                                let jam_enam = v.dpmp_jam_enam.split(':');
                                dpmp_jam_enam = jam_enam[0] + ':' + jam_enam[1];
                                $('#dpmp-edit-jam-enam').val(dpmp_jam_enam);
                            
                            }

                            let dpmp_jam_tujuh = '';
                            if(v.dpmp_jam_tujuh !== null){

                                let jam_tujuh = v.dpmp_jam_tujuh.split(':');
                                dpmp_jam_tujuh = jam_tujuh[0] + ':' + jam_tujuh[1];
                                $('#dpmp-edit-jam-tujuh').val(dpmp_jam_tujuh);
                            
                            }

                            let dpmp_jam_delapan = '';
                            if(v.dpmp_jam_delapan !== null){

                                let jam_delapan = v.dpmp_jam_delapan.split(':');
                                dpmp_jam_delapan = jam_delapan[0] + ':' + jam_delapan[1];
                                $('#dpmp-edit-jam-delapan').val(dpmp_jam_delapan);
                            
                            }

                        
                        
                        $('#table-edit-dpmp').empty();

                        let table_add_dpmp = '';

                        table_add_dpmp = `<tr>
                                            <td width="12%"><b>Keterangan</b></td>
                                            <td width="1%">:</td>
                                            <td colspan="2">
                                                <div class="input-group">
                                                    <input type="text" name="dpmp_keterangan" id="dpmp-edit-keterangan" class="custom-form clear-input d-inline-block col-lg-12 mr-1" placeholder="Keterangan Diet...">
                                                </div>
                                            </td>
                                            <td colspan="2">
                                                <div class="input-group">
                                                    <input type="number" name="dpmp_gram" id="dpmp-edit-gram" class="custom-form clear-input d-inline-block col-lg-3 mr-1"> Gr
                                                </div>
                                            </td>
                                        </tr>
                                        `;

                        $('#table-edit-dpmp').append(table_add_dpmp);

                        $('#dpmp-edit-keterangan').val(v.keterangan_diet_cair);
                        $('#dpmp-edit-gram').val(v.dpmp_gram);
                    })

                }

            },
            error: function(e) {
                accessFailed('Terjadi Kesalahan | Gagal mengambil data');
            }

        });
    }

    function updateEditDietCair() {

    	let id_dpmp = $('#d-id-dpmp').val();

    	bootbox.dialog({
            message: "Anda yakin akan memperbaharui data ini?",
            title: "Update Data",
            buttons: {
                batal: {
                    label: '<i class="fas fa-times-circle mr-1"></i>Batal',
                    className: "btn-secondary",
                    callback: function() {

                    }
                },
                edit: {
                    label: '<i class="fas fa-trash-alt mr-1"></i>Update',
                    className: "btn-info",
                    callback: function() {
                        $.ajax({
				            type: 'PUT',
				            url: '<?= base_url("gizi/api/gizi/update_diet_cair") ?>',
				            data: $('#form-edit-diet-cair').serialize(),
				            cache: false,
				            dataType: 'JSON',
				            success: function(data) {
				                if (data.status) {
				                    messageEditSuccess();
				                    editDPMP(id_dpmp);
				                } else {
				                    messageEditFailed();
				                }

				                $('#modal-edit-diet-cair').modal('hide');
				            },
				            error: function(e) {
				                messageEditFailed();
				            }
				        });
                    }
                }
            }
        });

    }

    function addDPMPDiet() {
		if ($('#dpmp-diet').val() === '') {
			syams_validation($('#dpmp-diet'), 'Pilihan Diet harus diisi!');
			return;
		} else {
			syams_validation_remove($('#dpmp-diet'));
		}

		if ($('#dpmp-item').val() === '') {
			syams_validation($('#dpmp-item'), 'Pilihan Item Diet harus diisi!');
			return;
		} else {
			syams_validation_remove($('#dpmp-item'));
		}

		if ($('#dpmp-keterangan').val() === '') {
			syams_validation($('#dpmp-keterangan'), 'Keterangan harus diisi!');
			return;
		} else {
			syams_validation_remove($('#dpmp-keterangan'));
		}

		if ($('#dpmp-gram').val() === '') {
			syams_validation($('#dpmp-gram'), 'Keterangan gram harus diisi!');
			return;
		} else {
			syams_validation_remove($('#dpmp-gram'));
		}

        let html = '';
        let number = $('.number-diet').length;
        let dpmp_diet = $('#s2id_dpmp-diet a .select2c-chosen').html();
        let id_dpmp_diet = $('#dpmp-diet').val();
        let dpmp_item = $('#s2id_dpmp-item a .select2c-chosen').html();
        let id_dpmp_item = $('#dpmp-item').val();

        let dpmp_jam_satu = $('#dpmp-jam-satu').val() || null;
        let dpmp_jam_dua = $('#dpmp-jam-dua').val() || null;
        let dpmp_jam_tiga = $('#dpmp-jam-tiga').val() || null;
        let dpmp_jam_empat = $('#dpmp-jam-empat').val() || null;
        let dpmp_jam_lima = $('#dpmp-jam-lima').val() || null;
        let dpmp_jam_enam = $('#dpmp-jam-enam').val() || null;
        let dpmp_jam_tujuh = $('#dpmp-jam-tujuh').val() || null;
        let dpmp_jam_delapan = $('#dpmp-jam-delapan').val() || null;
		
		let jamFields = [
			$('#dpmp-jam-satu').val(),
			$('#dpmp-jam-dua').val(),
			$('#dpmp-jam-tiga').val(),
			$('#dpmp-jam-empat').val(),
			$('#dpmp-jam-lima').val(),
			$('#dpmp-jam-enam').val(),
			$('#dpmp-jam-tujuh').val(),
			$('#dpmp-jam-delapan').val()
		];
		
		function processJamField(jamField) {
			return jamField !== '' ? jamField.split(':')[0] : null;
		}

		let jam_pemberian = jamFields
			.map(processJamField)
			.filter(jam => jam !== null)
			.join(', ');


        let keterangan = $('#dpmp-keterangan').val();
        let dpmp_gram = $('#dpmp-gram').val();

        
        html = /* html */ `
            <tr>
                <td class="number-diet" align="center">${++number}</td>
				<td>
					<input type="hidden" name="keterangan_diet_cair[]" value="${keterangan}">
					<input type="hidden" name="dpmp_item[]" value="${id_dpmp_item}">
					<input type="hidden" name="dpmp_diet[]" value="${id_dpmp_diet}">
					<input type="hidden" name="dpmp_gram[]" value="${dpmp_gram}">
					CAIR ${dpmp_item} ${keterangan} ${dpmp_gram} Gr
				</td>
                <td>
					<input type="hidden" name="dpmp_jam_satu[]" value="${dpmp_jam_satu}">
					<input type="hidden" name="dpmp_jam_dua[]" value="${dpmp_jam_dua}">
					<input type="hidden" name="dpmp_jam_tiga[]" value="${dpmp_jam_tiga}">
					<input type="hidden" name="dpmp_jam_empat[]" value="${dpmp_jam_empat}">
					<input type="hidden" name="dpmp_jam_lima[]" value="${dpmp_jam_lima}">
					<input type="hidden" name="dpmp_jam_enam[]" value="${dpmp_jam_enam}">
					<input type="hidden" name="dpmp_jam_tujuh[]" value="${dpmp_jam_tujuh}">
					<input type="hidden" name="dpmp_jam_delapan[]" value="${dpmp_jam_delapan}">
					<input type="hidden" name="user_account[]" value="<?= $this->session->userdata("id_translucent") ?>">
					<input type="hidden" name="created_date[]" value="<?= date("Y-m-d H:i:s") ?>">
					<input type="hidden">${jam_pemberian}
				</td>
                <td align="center" width="5%">
                    <button type="button" class="btn btn-secondary btn-xxs" onclick="removeList(this)"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
        `;
        $('#table-diet-cair tbody').append(html);

		// Clear the form fields
		$('#s2id_dpmp-diet a .select2c-chosen').html('');
		$('#dpmp-diet').val('');
		$('#s2id_dpmp-item a .select2c-chosen').html('');
		$('#dpmp-item').val('');
		$('#dpmp-jam-satu').val('');
		$('#dpmp-jam-dua').val('');
		$('#dpmp-jam-tiga').val('');
		$('#dpmp-jam-empat').val('');
		$('#dpmp-jam-lima').val('');
		$('#dpmp-jam-enam').val('');
		$('#dpmp-jam-tujuh').val('');
		$('#dpmp-jam-delapan').val('');
		$('#dpmp-keterangan').val('');
		$('#dpmp-gram').val('');
        
    }

	function riwayatDiagnosisPasien() {
		$('#wizard-form').bwizard('show', '0');
		let id_pendaftaran = $('#d-id-pendaftaran').val();
		let id_layanan = $('#d-id-layanan-pendaftaran').val();
		let riwayat_bed = $('#d-rwyt-bed').val();

		 $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_layanan_pendaftaran_detail") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan,
            cache: false,
            dataType: 'JSON',
            success: function(data) {

            	let pasien = data.pasien;
            	let umur = '';

				if (pasien.tanggal_lahir !== null) {
                        
                    umur = hitungUmur(pasien.tanggal_lahir) + ' (' + datefmysql(pasien.tanggal_lahir) + ')';

                }

                $('#identitas-pasien-diagnosis').html(pasien.id_pasien + ' / ' + pasien.nama + ' / ' + umur);

                if (data.diagnosa.length > 0) {
                    showDiagnosis(data.diagnosa);
                } else {
                    $('#table-diagnosis tbody').empty();
                }

                $('#modal-diagnosis').modal('show');
                $('#modal-diagnosis-label').html('Riwayat Diagnosis Pasien');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {

            }
        });
	}

	function showDiagnosis(data) {
        $('#table-diagnosis tbody').empty();
        if (data !== null) {
            $.each(data, function(i, v) {
                let kodeDiagnosa = '';
                let diagnosa = '';
                if (v.diangnosa_manual == 1) {
                    diagnosa = `<input type="hidden" name="gol_sebab_sakit_lain[]" value> ${((v.golongan_sebab_sakit_lain !== null) ? v.golongan_sebab_sakit_lain : '')}
                                <input type="hidden" name="id_golongan_sebab_sakit[]" value> ${((v.golongan_sebab_sakit !== null) ? v.golongan_sebab_sakit : '')}`;
                } else {
                    diagnosa = `<input type="hidden" name="id_golongan_sebab_sakit[]" value> ${((v.golongan_sebab_sakit !== null) ? v.golongan_sebab_sakit : '')}
                                <input type="hidden" name="gol_sebab_sakit_lain[]" value> ${((v.golongan_sebab_sakit_lain !== null) ? v.golongan_sebab_sakit_lain : '')}`;
                    kodeDiagnosa = v.golongan_sebab_sakit.substr(0, 3);
                }
                
                let html = /* html */ `
                    <tr>
                        <td class="number-diag center">
                            <input type="hidden"> ${(++i)}
                            <input type="hidden"">
                        </td>
                        <td class="nowrap">
                            ${v.dokter}
                        </td>
                        
                        <td>
                            ${diagnosa}
                        </td>
                        <td>
                            ${(v.diagnosa_klinis == 1) ? 'Ya' : 'Tidak' }
                        </td>
                        <td>
                            ${(v.prioritas)}
                        </td>
                        <td>
                            ${(v.diagnosa_banding)}
                        </td>
                        <td>
                            ${(v.diagnosa_akhir == 1) ? 'Ya' : 'Tidak' }
                        </td>
                        <td>
                            ${(v.penyebab_kematian == 1) ? 'Ya' : 'Tidak' }
                        </td>
                    </tr>
                `;

                $('#table-diagnosis tbody').append(html);
            });

        }
    }

    function riwayatCPPTPasien() {
    	$('#modal-cppt').modal('show');
    	$('#wizard-form-cppt').bwizard('show', '0');
    	$('#modal-cppt-label').html('Riwayat CPPT Pasien');
		let accountGroup = "<?= $this->session->userdata('account_group') ?>";
		let id_layanan_pendaftaran = $('#d-id-layanan-pendaftaran').val();
		let page = 1;
		let id_pendaftaran = $('#d-id-pendaftaran').val();

		$('#cppt-waktu-search').datepicker({
			format: 'dd/mm/yyyy',
			endDate: new Date(),
		}).on('changeDate', function() {
			$(this).datepicker('hide');
		});

		$('#cppt-waktu-search').change(function() {
			riwayatCPPTPasien();
		});

		$('#cppt-img-calendar').click(function() {
			$('#cppt-waktu-search').datepicker('show')
		});
		
		$.ajax({
		            type: 'GET',
		            url: '<?= base_url("pelayanan/api/pelayanan/get_layanan_pendaftaran_detail") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
		            cache: false,
		            dataType: 'JSON',
		            success: function(data) {

		            	let pasien = data.pasien;
		            	let umur = '';

						if (pasien.tanggal_lahir !== null) {
		                        
		                    umur = hitungUmur(pasien.tanggal_lahir) + ' (' + datefmysql(pasien.tanggal_lahir) + ')';

		                }

		                $('#identitas-pasien-cppt').html(pasien.id_pasien + ' / ' + pasien.nama + ' / ' + umur);

		            },
		            complete: function() {
		                hideLoader();
		            },
		            error: function(e) {

		            }
		        });
		$.ajax({
			type: 'GET',
			url: '<?= base_url("pelayanan/api/pelayanan/get_list_cppt") ?>/page/' + page + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran+ '/id_pendaftaran/' + id_pendaftaran,
			data: 'keyword=' + $('#cppt-keyword').val() + '&waktu=' + $('#cppt-waktu-search').val(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				if ((page - 1) & (data.data.length === 0)) {
					riwayatCPPTPasien('', page - 1);
					return false;
				}

				$('#cppt-pagination').html(pagination2(data.jumlah, data.limit, data.page, 1));
				$('#cppt-summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

				$('#table-cppt-gizi tbody').empty();
				$.each(data.data, function(i, v) {
					let no = ((i + 1) + ((data.page - 1) * data.limit));
					var hasil = '<h5><b>SOAP</b></h5>'+ '<br>';
					if (v.subject !== '') {
						hasil += '<b>Subjective : </b><div class="justify">' + (v.subject !== null ? v.subject : '-') + '</div>';
					}
					if (v.objective !== '') {
						hasil += '<br> <b>Objective : </b><div class="justify">' + (v.objective !== null ? v.objective : '-') + '</div>';
					}
					if (v.assessment !== '') {
						hasil += '<br> <b>Assessment : </b><div class="justify">' + (v.assessment !== null ? v.assessment : '-') + '</div>';
					}
					if (v.plan !== '') {
						hasil += '<br> <b>Plan : </b><div class="justify">' + (v.plan !== null ? v.plan : '-') + '</div>' + '<br>';
					}

					hasil += '<br><h5><b>ADIME</b></h5>' + '<br>';

					if (v.ademi_assesment !== '') {
						hasil += ' <b>Assessment : </b><div class="justify">' + (v.ademi_assesment !== null ? v.ademi_assesment : '-') + '</div>';
					}
					if (v.ademi_diag !== '') {
						hasil += '<br> <b>Diagnosis : </b><div class="justify">' + (v.ademi_diag !== null ? v.ademi_diag : '-') + '</div>';
					}
					if (v.ademi_interv !== '') {
						hasil += '<br> <b>Intervention : </b><div class="justify">' + (v.ademi_interv !== null ? v.ademi_interv : '-') + '</div>';
					}
					if (v.ademi_monev !== '') {
						hasil += '<br> <b>Monitoring / Evaluation : </b><div class="justify">' + (v.ademi_monev !== null ? v.ademi_monev : '-') + '</div>' + '<br>';
					}

					hasil += '<br><h5><b>SBAR</b></h5>' + '<br>';

					if (v.sbar_situation !== '') {
						hasil += '<b>Situation : </b><div class="justify">' + (v.sbar_situation !== null ? v.sbar_situation : '-') + '</div>';
					}
					if (v.sbar_background !== '') {
						hasil += '<br> <b>Background : </b><div class="justify">' + (v.sbar_background !== null ? v.sbar_background : '-') + '</div>';
					}
					if (v.sbar_assesment !== '') {
						hasil += '<br> <b>Assessment : </b><div class="justify">' + (v.sbar_assesment !== null ? v.sbar_assesment : '-') + '</div>';
					}
					if (v.sbar_recommend !== '') {
						hasil += '<br> <b>Recommendation : </b><div class="justify">' + (v.sbar_recommend !== null ? v.sbar_recommend : '-') + '</div>' + '<br>';
					}

					var html = /* html */ `
						<tr>
							<td class="center">${no}</td>
							<td class="center">${(v.waktu !== null ? datetimefmysql(v.waktu) : '-')}</td>
							<td class="center">${v.nadis}<br>(${v.profesi})</td>
							<td>${hasil}</td>
							<td>${v.instruksi_ppa}</td>
							<td class="center"></td>
						</tr>
					`;

					$('#table-cppt-gizi tbody').append(html);
				});
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed('Gagal mendapatkan data!');
			}
		});
	}

	function lihatHasilLAB() {
    	let id_pendaftaran = $('#d-id-pendaftaran').val();
    	let id_layanan_pendaftaran = $('#d-id-layanan-pendaftaran').val();
  		$.ajax({
			type: 'GET',
			url: '<?= base_url("pelayanan/api/pelayanan/get_layanan_pendaftaran_detail") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {
				let pasien = '';
				pasien = data.pasien;
				if (pasien !== null) {

					let kelamin = '';
					if (pasien.kelamin == 'L') {
						kelamin = 'Laki - laki';
					} else if (pasien.kelamin == 'P') {
						kelamin = 'Perempuan';
					}

					let umur = '';
					if (pasien.tanggal_lahir !== null | pasien.tanggal_lahir !== '') {
						umur = hitungUmur(pasien.tanggal_lahir) + ' (' + datefmysql(pasien.tanggal_lahir) + ')';
					}

					$('#no-rm-detail').text(pasien.id_pasien);
					$('#no-register-detail').text(pasien.no_register);
					$('#nama-detail').text(pasien.nama);
					$('#alamat-detail').text(pasien.alamat);
					$('#kelamin-detail').text(kelamin);
					$('#umur-detail').text(umur);
					$('#nama-pjwb-detail').text(pasien.nama_pjwb);
					$('#alamat-pjwb-detail').text(pasien.alamat_pjwb);
					$('#telp-pjwb-detail').text(pasien.telp_pjwb);
					$('#instansi-perujuk-detail').text(pasien.instansi_perujuk);
					$('#tenaga-medis-perujuk-detail').text(pasien.nadis_perujuk);
				}

				$('#modal-dpmp-lab').modal('show');

				ambilHasilLab(id_layanan_pendaftaran);

			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status);
			},
		});
	}

	function ambilHasilLab(id_layanan) {
		$('#hasil-pemeriksaan-laboratorium').empty();
		$.ajax({
			type: 'GET',
			url: '<?= base_url("gizi/api/gizi/ambil_hasil_lab") ?>/id_layanan/' + id_layanan,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader()
			},
			success: function(data) {

				if (data.length === 0) {

					let tipe = 'Error';
                    messageCustom('Data Laboratorium Belum Tersedia', tipe);
				}

				if(data !== null){

					let html = /* html */ `
									<div class="row mt-3" id="item-lab">
										<div class="col-md-12">
											<div class="widget">
												<div class="widget-header">
												</div>
												<div class="widget-body">
													<table class="table table-hover table-striped table-sm color-table info-table">
														<thead>
															<tr>
																<th width="30%">Jenis Pemeriksaan</th>
																<th width="20%" class="center">Hasil</th>
																<th width="15%" class="center">Satuan</th>
																<th width="10%" class="center">Nilai Rujukan</th>
															</tr>
														</thead>
														<tbody>


								`; 

					$.each(data, function(i, value) {

						
						
						if(i === 0){

							html += /* html */ `
													<tr>
														<td class="v-center bold">${value.test_group !== null ? value.test_group : 'Hasil Lab Belum Tersedia atau Tersinkronisasi'}</td>
														<td class="v-center bold">${value.ono !== null ? value.ono : '-'}</td>
													</tr>
												`;
						}

						

						html += /* html */ `
										<tr>
											<td class="v-center">${value.nama_item !== null ? value.nama_item : '-'}</td>
											<td class="v-center center">${value.result_value !== null ? value.result_value : '-'}</td>
											<td class="v-center center">${value.unit !== null ? value.unit : '-'}</td>
											<td class="v-center center">${value.ref_range !== null ? value.ref_range : '-'}</td>
										</tr>
										
									`;
						
					})
							 
						html += /* html */ `
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>						
							`;

						$('#hasil-pemeriksaan-laboratorium').append(html);
						
				

				}

			},
			complete: function() {
				hideLoader()
			},
			error: function(e) {
				accessFailed(e.status);
			},
		});
	}

    function resetFormDPMP() {
        $('#d-nadis, #dpmp-item, #d-id-dpmp, #d-waktu-dpmp').val('');
        $('#d-waktu-dpmp').attr('disabled', false);
        $('#s2id_d-nadis a .select2c-chosen').html('Pilih Pemberi Pelayanan');
        $('#s2id_dpmp-item a .select2c-chosen').html('Pilih Item Diet');
        $('#s2id_mp-mps a .select2c-chosen, #s2id_sp-mps a .select2c-chosen, #s2id_ms-mps a .select2c-chosen, #s2id_ss-mps a .select2c-chosen, #s2id_mm-mps a .select2c-chosen, #s2id_sm-mps a .select2c-chosen').html('Pilih Makan Pasien');
        $('#mp-mps, #sp-mps, #ms-mps, #ss-mps, #mm-mps, #sm-mps').val('');
        $('#s2id_btk-mkn-mp a .select2c-chosen, #s2id_btk-mkn-sp a .select2c-chosen, #s2id_btk-mkn-ms a .select2c-chosen, #s2id_btk-mkn-ss a .select2c-chosen, #s2id_btk-mkn-mm a .select2c-chosen, #s2id_btk-mkn-sm a .select2c-chosen').html('Pilih Bentuk Makanan');
        $('#btk-mkn-mp, #btk-mkn-sp, #btk-mkn-ms, #btk-mkn-ss, #btk-mkn-mm, #btk-mkn-sm').val('');
        $('#s2id_mp-diet-cair a .select2c-chosen, #s2id_ms-diet-cair a .select2c-chosen, #s2id_mm-diet-cair a .select2c-chosen, #s2id_sp-diet-cair a .select2c-chosen, #s2id_sm-diet-cair a .select2c-chosen').html('- Silakan Pilih Kode Diet -');
        $('#mp-diet-cair, #ms-diet-cair, #mm-diet-cair, #sp-diet-cair, #ss-diet-cair, #sm-diet-cair').val('');
        $('#btk-mkn-mp, #btk-mkn-sp, #btk-mkn-ms, #btk-mkn-ss, #btk-mkn-mm, #btk-mkn-sm').val('');
        $('#s2id_jns-diet-mp a .select2c-chosen, #s2id_jns-diet-sp a .select2c-chosen, #s2id_jns-diet-ms a .select2c-chosen, #s2id_jns-diet-ss a .select2c-chosen, #s2id_jns-diet-mm a .select2c-chosen, #s2id_jns-diet-sm a .select2c-chosen').html('Pilih Jenis Diet');
        $('#jns-diet-sm, #jns-diet-mm, #jns-diet-ss, #jns-diet-ms, #jns-diet-sp, #jns-diet-mp, #ket-makan-pasien, #dpmp-keterangan, #dpmp-gram').val('');
        $('#dpmp-dm, #dpmp-rg, #dpmp-rl, #dpmp-dj, #dpmp-rs, #dpmp-dl, #dpmp-ts, #dpmp-dh, #dpmp-tktp, #dpmp-tkal, #dpmp-rkal, #dpmp-rp, #dpmp-rpur, #dpmp-b, #dpmp-sonde, #dpmp-c, #dpmp-p, #d-ttd-nadis').prop('checked', false);
        $('#d-profesi, #dpmp-diet, #jns-diet-mp, #btk-mkn-mp, #jns-diet-sp, #btk-mkn-sp, #jns-diet-ms, #btk-mkn-ms, #jns-diet-ss, #btk-mkn-ss, #jns-diet-mm, #btk-mkn-mm, #jns-diet-sm, #btk-mkn-sm, #mp-mps, #sp-mps, #ms-mps, #ss-mps, #mm-mps, #sm-mps, #dpmp-diet, #mp-diet-cair, #ms-diet-cair, #mm-diet-cair, #sp-diet-cair, #ss-diet-cair, #sm-diet-cair, #d-ttd-nadis, #ket-makan-pasien').attr('disabled', false);
        $('#d-nadis, #dpmp-item').select2c('readonly', false);

        $('#d-ttd-nadis').show();
        $('#d-ttd-nadis-verified').hide();
        
        $('#table-diet-cair tbody').empty();

        let table_form_diet_cair = '';

        $('#table-form-diet-cair').empty();

        table_form_diet_cair = `<tr><td width="12%"><b>Diet</b></td>
                                                    <td width="1%">:</td>
                                                    <td width="87%">
                                                        <div class="input-group">
                                                            <?= form_dropdown('dpmp_diet', $dpmp_diet, array(), 'id=dpmp-diet class="custom-form col-lg-3" onchange="clearValidate(this)"') ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="12%"><b>Item Diet</b></td>
                                                    <td width="1%">:</td>
                                                    <td width="87%">
                                                        <div class="input-group">
                                                            <input type="text" name="dpmp_item" id="dpmp-item" class="select2c-input clear-input d-inline-block">
                                                        </div>
                                                    </td>
                                                </tr>`;

        $('#table-form-diet-cair').append(table_form_diet_cair);

        $('#dpmp-item').select2c({
            ajax: {
                url: "<?= base_url('gizi/api/gizi/item_diet') ?>",
                dataType: 'json',
                quietMillis: 100,
                allowClear: true,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                        jenis: $('#dpmp-diet').val(),
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
                var markup = '<b>' + data.nama + '</b>';
                return markup;
            },
            formatSelection: function(data) {
                return data.nama;
            }
        });

        $('#table-jam-pemberian').empty();

        let table_jam_pemberian = '';

        table_jam_pemberian = `<tr>
                                    <td width="12%"><b>Jam Pemberian</b></td>
                                    <td width="1%">:</td>
                                    <td width="21,75%">
                                        <div class="input-group">
                                            <input type="text" name="dpmp_jam_satu" id="dpmp-jam-satu" class="custom-form clear-input d-inline-block col-lg-4 ml-2">
                                        </div>
                                    </td>
                                    <td width="21.75%">
                                        <div class="input-group">
                                            <input type="text" name="dpmp_jam_dua" id="dpmp-jam-dua" class="custom-form clear-input d-inline-block col-lg-4 ml-2">
                                        </div>
                                    </td>
                                    <td width="21.75%">
                                        <div class="input-group">			
                                            <input type="text" name="dpmp_jam_tiga" id="dpmp-jam-tiga" class="custom-form clear-input d-inline-block col-lg-4 ml-2">
                                        </div>
                                    </td>
                                    <td width="21.75%">
                                        <div class="input-group">		
                                            <input type="text" name="dpmp_jam_empat" id="dpmp-jam-empat" class="custom-form clear-input d-inline-block col-lg-4 ml-2">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="12%"></td>
                                    <td width="1%"></td>
                                    <td width="21.75%">	
                                        <div class="input-group">	
                                            <input type="text" name="dpmp_jam_lima" id="dpmp-jam-lima" class="custom-form clear-input d-inline-block col-lg-4 ml-2">
                                        </div>
                                    </td>
                                    <td width="21.75%">
                                        <div class="input-group">
                                            <input type="text" name="dpmp_jam_enam" id="dpmp-jam-enam" class="custom-form clear-input d-inline-block col-lg-4 ml-2">
                                        </div>
                                    </td>
                                    <td width="21.75%">
                                        <div class="input-group">
                                            <input type="text" name="dpmp_jam_tujuh" id="dpmp-jam-tujuh" class="custom-form clear-input d-inline-block col-lg-4 ml-2">
                                        </div>
                                    </td>
                                    <td width="21.75%">
                                        <div class="input-group">
                                            <input type="text" name="dpmp_jam_delapan" id="dpmp-jam-delapan" class="custom-form clear-input d-inline-block col-lg-4 ml-2">
                                        </div>
                                    </td>
                                </tr>`;

        $('#table-jam-pemberian').append(table_jam_pemberian);

        $('#dpmp-jam-satu, #dpmp-jam-dua, #dpmp-jam-tiga, #dpmp-jam-empat, #dpmp-jam-lima, #dpmp-jam-enam, #dpmp-jam-tujuh, #dpmp-jam-delapan').timepicker({
            format: 'HH:mm',
            showInputs: true,
            showMeridian: false
        });

        $('#dpmp-jam-satu, #dpmp-jam-dua, #dpmp-jam-tiga, #dpmp-jam-empat, #dpmp-jam-lima, #dpmp-jam-enam, #dpmp-jam-tujuh, #dpmp-jam-delapan').val('');
        
        $('#table-add-dpmp').empty();

        let table_add_dpmp = '';

        table_add_dpmp = `<tr>
                            <td width="12%"><b>Keterangan</b></td>
                            <td width="1%">:</td>
                            <td width="50%">
                                <div class="input-group">
                                    <input type="text" name="dpmp_keterangan" id="dpmp-keterangan" class="custom-form clear-input d-inline-block col-lg-12 mr-1" placeholder="Keterangan Diet...">
                                </div>
                            </td>
                            <td width="37%">
                            <div class="input-group">
                                <input type="number" name="dpmp_gram" id="dpmp-gram" class="custom-form clear-input d-inline-block col-lg-6 mr-1"> Gr
                            </div>
                            </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <button type="button" class="btn btn-info" onclick="addDPMPDiet()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah Diet Cair</button>
                                </td>
                            </tr>`;

        $('#table-add-dpmp').append(table_add_dpmp);

        $('#dpmp-footer').empty();

        let dpmp_footer = '';

        dpmp_footer = `<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
                <button type="button" class="btn btn-info" onclick="simpanDPMP()"><span id="btn-dpmp"><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</span></button>`;

        $('#dpmp-footer').append(dpmp_footer);
    }

	function resetData() {

		$('#d-id-layanan-pendaftaran').val('');
		$('#d-id-pendaftaran').val('');
		$('#d-rwyt-bed').val('');
		$('#d-pasien-nama').empty();
		$('#d-pasien-no-rm').empty();
		$('#d-pasien-tanggal-lahir').empty();
		$('#d-pasien-jenis-kelamin').empty();
		$('#d-dpjp').empty();
		$('#d-bed').empty();

	}

    function entriDPMP(id_pendaftaran, id_layanan_pendaftaran, bed) {
        let table_form_diet_cair = '';

        $('#table-form-diet-cair').empty();

        table_form_diet_cair = `<tr><td width="12%"><b>Diet</b></td>
                                                    <td width="1%">:</td>
                                                    <td width="87%">
                                                        <div class="input-group">
                                                            <?= form_dropdown('dpmp_diet', $dpmp_diet, array(), 'id=dpmp-diet class="custom-form col-lg-3" onchange="clearValidate(this)"') ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="12%"><b>Item Diet</b></td>
                                                    <td width="1%">:</td>
                                                    <td width="87%">
                                                        <div class="input-group">
                                                            <input type="text" name="dpmp_item" id="dpmp-item" class="select2c-input clear-input d-inline-block">
                                                        </div>
                                                    </td>
                                                </tr>`;

        $('#table-form-diet-cair').append(table_form_diet_cair);

        $('#dpmp-item').select2c({
            ajax: {
                url: "<?= base_url('gizi/api/gizi/item_diet') ?>",
                dataType: 'json',
                quietMillis: 100,
                allowClear: true,
                data: function(term, page) { // page is the one-based page number tracked by Select2
                    return {
                        q: term, //search term
                        page: page, // page number
                        jenis: $('#dpmp-diet').val(),
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
                var markup = '<b>' + data.nama + '</b>';
                return markup;
            },
            formatSelection: function(data) {
                return data.nama;
            }
        });

        $('#table-jam-pemberian').empty();

        let table_jam_pemberian = '';

        table_jam_pemberian = `<tr>
                                                                <td width="12%"><b>Jam Pemberian</b></td>
                                                                <td width="1%">:</td>
                                                                <td width="21,75%">
                                                                    <div class="input-group">
                                                                        <input type="text" name="dpmp_jam_satu" id="dpmp-jam-satu" class="custom-form clear-input d-inline-block col-lg-4 ml-2">
                                                                    </div>
                                                                </td>
                                                                <td width="21.75%">
                                                                    <div class="input-group">
                                                                        <input type="text" name="dpmp_jam_dua" id="dpmp-jam-dua" class="custom-form clear-input d-inline-block col-lg-4 ml-2">
                                                                    </div>
                                                                </td>
                                                                <td width="21.75%">
                                                                    <div class="input-group">			
                                                                        <input type="text" name="dpmp_jam_tiga" id="dpmp-jam-tiga" class="custom-form clear-input d-inline-block col-lg-4 ml-2">
                                                                    </div>
                                                                </td>
                                                                <td width="21.75%">
                                                                    <div class="input-group">		
                                                                        <input type="text" name="dpmp_jam_empat" id="dpmp-jam-empat" class="custom-form clear-input d-inline-block col-lg-4 ml-2">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td width="12%"></td>
                                                                <td width="1%"></td>
                                                                <td width="21.75%">	
                                                                    <div class="input-group">	
                                                                        <input type="text" name="dpmp_jam_lima" id="dpmp-jam-lima" class="custom-form clear-input d-inline-block col-lg-4 ml-2">
                                                                    </div>
                                                                </td>
                                                                <td width="21.75%">
                                                                    <div class="input-group">
                                                                        <input type="text" name="dpmp_jam_enam" id="dpmp-jam-enam" class="custom-form clear-input d-inline-block col-lg-4 ml-2">
                                                                    </div>
                                                                </td>
                                                                <td width="21.75%">
                                                                    <div class="input-group">
                                                                        <input type="text" name="dpmp_jam_tujuh" id="dpmp-jam-tujuh" class="custom-form clear-input d-inline-block col-lg-4 ml-2">
                                                                    </div>
                                                                </td>
                                                                <td width="21.75%">
                                                                    <div class="input-group">
                                                                        <input type="text" name="dpmp_jam_delapan" id="dpmp-jam-delapan" class="custom-form clear-input d-inline-block col-lg-4 ml-2">
                                                                    </div>
                                                                </td>
                                                            </tr>`;

        $('#table-jam-pemberian').append(table_jam_pemberian);

        $('#dpmp-jam-satu, #dpmp-jam-dua, #dpmp-jam-tiga, #dpmp-jam-empat, #dpmp-jam-lima, #dpmp-jam-enam, #dpmp-jam-tujuh, #dpmp-jam-delapan').timepicker({
            format: 'HH:mm',
            showInputs: true,
            showMeridian: false
        });

        $('#table-add-dpmp').empty();

        let table_add_dpmp = '';

        table_add_dpmp = `<tr>
            <td width="12%"><b>Keterangan</b></td>
            <td width="1%">:</td>
            <td width="87%">
                <div class="input-group">
                    <input type="text" name="dpmp_keterangan" id="dpmp-keterangan" class="custom-form clear-input d-inline-block col-lg-12 mr-1" placeholder="Keterangan Diet...">
                </div>
            </td>
            <td width="37%">
                <div class="input-group">
                    <input type="number" name="dpmp_gram" id="dpmp-gram" class="custom-form clear-input d-inline-block col-lg-6 mr-1"> Gr
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <button type="button" class="btn btn-info" onclick="addDPMPDiet()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah Diet Cair</button>
            </td>
        </tr>`;

        $('#table-add-dpmp').append(table_add_dpmp);

        $('#dpmp-footer').empty();

        let dpmp_footer = '';

        dpmp_footer = `<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>
                <button type="button" class="btn btn-info" onclick="simpanDPMP()"><span id="btn-dpmp"><i class="fas fa-fw fa-save mr-1"></i>Konfirmasi</span></button>`;

        $('#dpmp-footer').append(dpmp_footer);

        resetFormDPMP();
        resetData();
        $('#wizard-dpmp').bwizard('show', '1');
        $('#wizard-diet-group').bwizard('show', '0');



        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_layanan_pendaftaran_detail") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran + '/tipe/dpmp',
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                $('#d-id-layanan-pendaftaran').val(id_layanan_pendaftaran);
                $('#d-id-pendaftaran').val(id_pendaftaran);
                $('#d-rwyt-bed').val(bed);
                if (data.pasien !== null) {
                    $('#d-pasien-nama').text(data.pasien.nama);
                    $('#d-pasien-no-rm').text(data.pasien.no_rm);
                    $('#d-pasien-tanggal-lahir').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
                    $('#d-pasien-jenis-kelamin').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));
                    $('#d-dpjp').text(data.layanan.dokter);


                    if(data.layanan.tindak_lanjut !== null){
                        if(data.layanan.tindak_lanjut === 'Rawat Inap'){

                            $.ajax({
                            type: 'GET',
                            url: '<?= base_url("gizi/api/gizi/cek_pindah_ruang_pasien_ranap") ?>/id_layanan/' + id_layanan_pendaftaran,
                            cache: false,
                            dataType: 'JSON',
                            beforeSend: function() {
                                showLoader();
                            },
                            success: function(data) {

                                if(data.bangsal_ri !== null){

                                    let bed_ri = data.bangsal_ri;
                                    bangsal_bed = bed_ri + ' kelas ' + data.kelas_ri + ' ruang ' + data.ruang_ri + ' No. Bed ' + data.bed_ri;
                                    $('#status-ruang-pasien').val(bangsal_bed);

                                } else {

                                    $('#status-ruang-pasien').val('Ruangan dan Bed Masih dalam status request');
                                }
                            },
                            complete: function() {
                                hideLoader();
                            },
                            error: function(e) {
                                accessFailed(e.status);
                            }
                        })
                            
                            

                        } else if(data.layanan.tindak_lanjut === 'Intensive Care'){

                            $.ajax({
                            type: 'GET',
                            url: '<?= base_url("gizi/api/gizi/cek_pindah_ruang_pasien_icare") ?>/id_layanan/' + id_layanan_pendaftaran,
                            cache: false,
                            dataType: 'JSON',
                            beforeSend: function() {
                                showLoader();
                            },
                            success: function(data) {

                                if(data.bangsal_ic !== null){

                                    let bed_ic = data.bangsal_ic;
                                    bangsal_bed = bed_ic + ' kelas ' + data.kelas_ic + ' ruang ' + data.ruang_ic + ' No. Bed ' + data.bed_ic;
                                    $('#status-ruang-pasien').val(bangsal_bed);

                                } else {

                                    $('#status-ruang-pasien').val('Ruangan dan Bed Masih dalam status request');
                                }

                            },
                            complete: function() {
                                hideLoader();
                            },
                            error: function(e) {
                                accessFailed(e.status);
                            }
                        })

                        } else {

                            $('#status-ruang-pasien').val('Masih Di tempat');
                        }

                    } else {

                        $('#status-ruang-pasien').val('Masih Di tempat');
                    }
                }

                $('#d-bed').text(bed);

                getListDPMP(id_layanan_pendaftaran, 1);
                $('#modal-dpmp').modal('show');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })

    }

	function simpanDPMP() {
		if ($('#d-profesi').val() === '') {
			$('#modal-dpmp').animate({
				scrollTop: 0
			}, '100');
			$('#wizard-dpmp').bwizard('show', '0');
			syams_validation('#d-profesi', 'Pilih profesi dahulu!');
			return false;
		}

		if ($('#d-nadis').val() === '') {
			$('#modal-dpmp').animate({
				scrollTop: 0
			}, '100');
			$('#wizard-dpmp').bwizard('show', '0');
			syams_validation('#d-nadis', 'Pilih pemberi pelayanan!');
			$("#d-nadis").select2c("open");
			return false;
		}

		if ($('#d-waktu-dpmp').val() === '') {
			$('#modal-dpmp').animate({
				scrollTop: 0
			}, '100');
			$('#wizard-dpmp').bwizard('show', '0');
			syams_validation('#d-waktu-dpmp', 'Silakan Tentukan Tanggal DPMP terlebih dahulu');
			return false;
		}

		if ($('#d-ttd-nadis').is(":visible")) {
			if ($('#d-ttd-nadis').is(":not(:checked)")) {
				$('#wizard-dpmp').bwizard('show', '0');
				swalAlert('warning', 'Validasi Simpan', 'Silahkan paraf terlebih dahulu!');
				return false;
			}
		}

		var id_dpmp = $('#d-id-dpmp').val();
		var id_layanan_pendaftaran = $('#d-id-layanan-pendaftaran').val();
		var pesan = 'Apakah anda yakin menyimpan data DPMP ini ?';
		var confirm_button = 'Simpan';
		if (id_dpmp !== '') {
			pesan = 'Apakah anda yakin mengubah data DPMP ini ?';
			confirm_button = 'Update';
		}

		swal.fire({
			title: 'Konfirmasi',
			html: pesan,
			icon: 'question',
			showCancelButton: true,
			confirmButtonText: '<i class="fas fa-save"></i> ' + confirm_button,
			cancelButtonText: '<i class="fas fa-times-circle"></i> Batal',
			reverseButtons: true,
			allowOutsideClick: false
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: 'POST',
					url: '<?= base_url("gizi/api/gizi/simpan_dpmp") ?>',
					data: $('#form-dpmp').serialize(),
					cache: false,
					dataType: 'JSON',
					beforeSend: function() {
						showLoader();
					},
					success: function(data) {
						if (data.status === false) {
							messageCustom(data.pesan, 'Error');
						} else {
							$('#wizard-dpmp').bwizard('show', '1');
							messageCustom(data.pesan, 'Success');
							resetFormDPMP();
							getListDPMP(id_layanan_pendaftaran, 1);
						}
					},
					complete: function() {
						hideLoader();
					},
					error: function(e) {
						messageCustom('Terjadi Kesalahan! | Gagal menyimpan/mengubah data')
					}
				})
			}
		});
	}

	function doCeklist(id, id_layanan) {

		let pesan = 'Apakah anda Sudah Menyelesaikan DPMP ini ?';
		let confirm_button = 'Simpan';
		

		swal.fire({
			title: 'Konfirmasi',
			html: pesan,
			icon: 'question',
			showCancelButton: true,
			confirmButtonText: '<i class="fas fa-save"></i> ' + confirm_button,
			cancelButtonText: '<i class="fas fa-times-circle"></i> Batal',
			reverseButtons: true,
			allowOutsideClick: false
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: 'POST',
					url: '<?= base_url("gizi/api/gizi/simpan_ceklist") ?>',
					data: 'id=' + id + '&id_layanan=' + id_layanan,
					cache: false,
					dataType: 'JSON',
					beforeSend: function() {
						showLoader();
					},
					success: function(data) {
						if (data.status === false) {
							messageCustom(data.pesan, 'Error');
						} else {
							$('#wizard-dpmp').bwizard('show', '1');
							messageCustom('Ceklist Selesai', 'Success');
							resetFormDPMP();
							getListDPMP(id_layanan, 1);
						}
					},
					complete: function() {
						hideLoader();
					},
					error: function(e) {
						messageCustom('Terjadi Kesalahan! | Gagal menyimpan/mengubah data')
					}
				})
			}
		});
	}

	function batalCeklist(id, id_layanan) {

		let pesan = 'Apakah Anda ingin Membatalkan Ceklist ini ?';
		let confirm_button = 'Simpan';
		

		swal.fire({
			title: 'Konfirmasi',
			html: pesan,
			icon: 'question',
			showCancelButton: true,
			confirmButtonText: '<i class="fas fa-save"></i> ' + confirm_button,
			cancelButtonText: '<i class="fas fa-times-circle"></i> Batal',
			reverseButtons: true,
			allowOutsideClick: false
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: 'POST',
					url: '<?= base_url("gizi/api/gizi/batal_ceklist") ?>',
					data: 'id=' + id + '&id_layanan=' + id_layanan,
					cache: false,
					dataType: 'JSON',
					beforeSend: function() {
						showLoader();
					},
					success: function(data) {
						if (data.status === false) {
							messageCustom(data.pesan, 'Error');
						} else {
							$('#wizard-dpmp').bwizard('show', '1');
							messageCustom('Batal Ceklist Berhasil', 'Success');
							resetFormDPMP();
							getListDPMP(id_layanan, 1);
						}
					},
					complete: function() {
						hideLoader();
					},
					error: function(e) {
						messageCustom('Terjadi Kesalahan! | Gagal menyimpan/mengubah data')
					}
				})
			}
		});
	}

	function removeList(el) {
        var parent = el.parentNode.parentNode;
        parent.parentNode.removeChild(parent);
    }

	function clearValidate(e) {
		if (e.value !== '') {
			syams_validation_remove(e);
		}
	}

	function getListDPMP(id_layanan_pendaftaran, page) {

		$('#wizard-dpmp').bwizard('show', '1');

		let accountGroup = "<?= $this->session->userdata('account_group') ?>";
		$.ajax({
			type: 'GET',
			url: '<?= base_url("gizi/api/gizi/get_list_dpmp") ?>/page/' + page + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
			data: 'keyword=' + $('#d-keyword').val() + '&waktu=' + $('#d-waktu-search').val(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				if ((page - 1) & (data.data.length === 0)) {
					getListDPMP('', page - 1);
					return false;
				}

				$('#d-pagination').html(pagination2(data.jumlah, data.limit, data.page, 1));
				$('#d-summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

				$('#table-dpmp tbody').empty();


				$.each(data.data, function(i, v) {
					console.log(v);

					let no = ((i + 1) + ((data.page - 1) * data.limit));
					let cek = '';
					let button_cek = '';

					if(v.ceklist !== null){

						cek = '<td class="center">Selesai</td>';
						button_cek = '<button type="button" class="btn btn-secondary btn-xxs" onclick="batalCeklist(' + v.id + ', ' + id_layanan_pendaftaran + ')"><i class="fas fa-sign m-r-5"></i>Batal Cek</button>';


					} else {

						cek = '<td class="center">Belum</td>';
						button_cek = '<button type="button" class="btn btn-secondary btn-xxs" onclick="doCeklist(' + v.id + ', ' + id_layanan_pendaftaran + ')"><i class="fas fa-sign m-r-5"></i>Cek</button>';

					}

					let hasil = '';
					let bentuk_makanan = [];
					bentuk_makanan = [v.btk_mkn_mp, v.btk_mkn_sp, v.btk_mkn_ms, v.btk_mkn_ss, v.btk_mkn_mm, v.btk_mkn_sm];

					let diet_cair = [];
					diet_cair = [v.mp_kode, v.ms_kode, v.mm_kode, v.ss_kode, v.sp_kode, v.sm_kode];

					let jnsDiet = [];
					jnsDiet = [v.jns_diet_mp, v.jns_diet_sp, v.jns_diet_ms, v.jns_diet_ss, v.jns_diet_mm, v.jns_diet_sm];

					let jnsKDC = [];
					jnsKDC = [v.kdc];

					let dpmpGram = [];
					dpmpGram = [v.dpmp_gram];

					let jam_pemberian = '';

			        if(v.dpmp_jam_satu !== null && (v.dpmp_jam_dua !== null | v.dpmp_jam_tiga !== null | v.dpmp_jam_empat !== null | v.dpmp_jam_lima !== null | v.dpmp_jam_enam !== null | v.dpmp_jam_tujuh !== null | v.dpmp_jam_delapan !== null)){

			        	let psh_jam_satu = v.dpmp_jam_satu.split(':');
			        	let jam_satu = psh_jam_satu[0];
			        	jam_pemberian += +jam_satu + ', ';
			        
			        } else if(v.dpmp_jam_satu !== null){

			        	let psh_jam_satu = v.dpmp_jam_satu.split(':');
			        	let jam_satu = psh_jam_satu[0];
			        	jam_pemberian += +jam_satu;

			        }

			        if(v.dpmp_jam_dua !== null && (v.dpmp_jam_tiga !== null | v.dpmp_jam_empat !== null | v.dpmp_jam_lima !== null | v.dpmp_jam_enam !== null | v.dpmp_jam_tujuh !== null | v.dpmp_jam_delapan !== null)){

			        	let psh_jam_dua = v.dpmp_jam_dua.split(':');
			        	let jam_dua = psh_jam_dua[0];
			        	jam_pemberian += +jam_dua + ', ';

			        } else if(v.dpmp_jam_dua !== null){

			        	let psh_jam_dua = v.dpmp_jam_dua.split(':');
			        	let jam_dua = psh_jam_dua[0];
			        	jam_pemberian += +jam_dua;

			        }

			        if(v.dpmp_jam_tiga !== null && (v.dpmp_jam_empat !== null | v.dpmp_jam_lima !== null | v.dpmp_jam_enam !== null | v.dpmp_jam_tujuh !== null | v.dpmp_jam_delapan !== null)){

			        	let psh_jam_tiga = v.dpmp_jam_tiga.split(':');
			        	let jam_tiga = psh_jam_tiga[0];
			        	jam_pemberian += +jam_tiga + ', ';

			        } else if(v.dpmp_jam_tiga !== null){

			        	let psh_jam_tiga = v.dpmp_jam_tiga.split(':');
			        	let jam_tiga = psh_jam_tiga[0];
			        	jam_pemberian += +jam_tiga;

			        }



			        if(v.dpmp_jam_empat !== null && (v.dpmp_jam_lima !== null | v.dpmp_jam_enam !== null | v.dpmp_jam_tujuh !== null | v.dpmp_jam_delapan !== null)){

			        	let psh_jam_empat = v.dpmp_jam_empat.split(':');
			        	let jam_empat = psh_jam_empat[0];
			        	jam_pemberian += +jam_empat + ', ';

			        } else if(v.dpmp_jam_empat !== null){

			        	let psh_jam_empat = v.dpmp_jam_empat.split(':');
			        	let jam_empat = psh_jam_empat[0];
			        	jam_pemberian += +jam_empat;

			        }

			        if(v.dpmp_jam_lima !== null && (v.dpmp_jam_enam !== null | v.dpmp_jam_tujuh !== null | v.dpmp_jam_delapan !== null)){

			        	let psh_jam_lima = v.dpmp_jam_lima.split(':');
			        	let jam_lima = psh_jam_lima[0];
			        	jam_pemberian += +jam_lima + ', ';

			        } else if(v.dpmp_jam_lima !== null){

			        	let psh_jam_lima = v.dpmp_jam_lima.split(':');
			        	let jam_lima = psh_jam_lima[0];
			        	jam_pemberian += +jam_lima;

			        }

			        if(v.dpmp_jam_enam !== null && (v.dpmp_jam_tujuh !== null | v.dpmp_jam_delapan !== null)){

			        	let psh_jam_enam = v.dpmp_jam_enam.split(':');
			        	let jam_enam = psh_jam_enam[0];
			        	jam_pemberian += +jam_enam + ', ';

			        } else if(v.dpmp_jam_enam !== null){

			        	let psh_jam_enam = v.dpmp_jam_enam.split(':');
			        	let jam_enam = psh_jam_enam[0];
			        	jam_pemberian += +jam_enam;

			        }

			        if(v.dpmp_jam_tujuh !== null && (v.dpmp_jam_delapan !== null)){

			        	let psh_jam_tujuh = v.dpmp_jam_tujuh.split(':');
			        	let jam_tujuh = psh_jam_tujuh[0];
			        	jam_pemberian += +jam_tujuh + ', ';

			        } else if(v.dpmp_jam_tujuh !== null){

			        	let psh_jam_tujuh = v.dpmp_jam_tujuh.split(':');
			        	let jam_tujuh = psh_jam_tujuh[0];
			        	jam_pemberian += +jam_tujuh;

			        }

			        if(v.dpmp_jam_delapan !== null){

			        	let psh_jam_delapan = v.dpmp_jam_delapan.split(':');
			        	let jam_delapan = psh_jam_delapan[0];
			        	jam_pemberian += +jam_delapan;

			        }

			        let getJamP = '';
			        if(jam_pemberian !== null){

			        	getJamP = 'JAM ' + jam_pemberian + ' wib ';
			        } 

					if (typeof jnsDiet != "undefined" && jnsDiet != null && jnsDiet.length != null && jnsDiet.length > 0) {
                        
                        let newjnsDiet = [...new Set(jnsDiet)];

                        hasil += newjnsDiet + ' ';
					
					}

					if (typeof bentuk_makanan != "undefined" && bentuk_makanan != null && bentuk_makanan.length != null && bentuk_makanan.length > 0) {
                        
                        let newBtkMkn = [...new Set(bentuk_makanan)];

                        hasil += newBtkMkn + ' ';
					
					}

					if (typeof diet_cair != "undefined" && diet_cair != null && diet_cair.length != null && diet_cair.length > 0 && diet_cair !=",,,,,") {
                        
                        let newDietCair = [...new Set(diet_cair)];

                        hasil += 'CAIR ' + newDietCair + ' ' + jnsKDC + ' ' + dpmpGram + ' Gr ' + getJamP;
					
					}
					
					let html = /* html */ `
						<tr>
							<td class="center">${no}</td>
							<td class="center">${(v.waktu_dpmp !== null ? datetimefmysql(v.waktu_dpmp) : '-')}</td>
							<td class="center">${v.nadis}<br>(${v.profesi})</td>
							<td>${hasil}</td>
							<td class="center">${(v.mp_makan_pasien !== null ? v.mp_makan_pasien : '-')}</td>
							<td class="center">${(v.sp_makan_pasien !== null ? v.sp_makan_pasien : '-')}</td>
							<td class="center">${(v.ms_makan_pasien !== null ? v.ms_makan_pasien : '-')}</td>
							<td class="center">${(v.ss_makan_pasien !== null ? v.ss_makan_pasien : '-')}</td>
							<td class="center">${(v.mm_makan_pasien !== null ? v.mm_makan_pasien : '-')}</td>
							<td class="center">${(v.sm_makan_pasien !== null ? v.sm_makan_pasien : '-')}</td>
							${cek}
							<td class="center"><input type="checkbox" name="dpmp_print" class="dpmp-print" value="${v.id}" ${v.dpmp_print == 1  ? 'checked' : ''}></td>
							<td class="right aksi">
								${button_cek}
								<button type="button" class="btn btn-secondary btn-xxs" onclick="detailDPMP(${v.id}, ${v.id_layanan_pendaftaran})"><i class="fas fa-eye m-r-5"></i>Lihat DPMP</button>
								<button type="button" class="btn btn-secondary btn-xs" onclick="editDPMP(${v.id})"><i class="fas fa-fw fa-edit mr-1"></i>Edit</button>
								${accountGroup === 'Admin' ? '<button type="button" class="btn btn-secondary btn-xs" onclick="hapusDPMP('+v.id+', '+id_layanan_pendaftaran+')"><i class="fas fa-fw fa-trash-alt mr-1"></i>Hapus</button>' : ''}
							</td>
						</tr>
					`;

					$('#table-dpmp tbody').append(html);

				})
				$('.dpmp-print').on('click', function(){
					$.ajax({
						type: 'POST',
						url: '<?= base_url("gizi/api/gizi/simpan_print_dpmp/") ?>' + $(this).val(),
						data: {
							id : $(this).val(),
							checked : $(this).is(':checked') ? 1 : 0
						},
						cache: false,
						dataType: 'JSON',
						beforeSend: function() {
							showLoader();
						},
						success: function(data) {
							// if (data.status === false) {
							// 	messageCustom(data.pesan, 'Error');
							// } else {
							// 	$('#wizard-dpmp').bwizard('show', '1');
							// 	messageCustom(data.pesan, 'Success');
							// 	resetFormDPMP();
							// 	getListDPMP(id_layanan_pendaftaran, 1);
							// }
						},
						complete: function() {
							hideLoader();
						},
						error: function(e) {
							messageCustom('Terjadi Kesalahan! | Gagal menyimpan/mengubah data')
						}
					})
				})
				
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed('Gagal mendapatkan data!');
			}
		});
	}

	function paging2(page) {
		getListDPMP($('#d-id-layanan-pendaftaran').val(), page);
	}

	function hapusDPMP(id, id_layanan_pendaftaran) {
		swal.fire({
			title: 'Konfirmasi',
			html: 'Apakah anda yakin menghapus data DPMP ini ?',
			icon: 'question',
			showCancelButton: true,
			confirmButtonText: '<i class="fas fa-check-circle mr-1"></i>Ya, Hapus',
			cancelButtonText: '<i class="fas fa-times-circle mr-1"></i>Batal',
			reverseButtons: true,
			allowOutsideClick: false
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: 'DELETE',
					url: '<?= base_url("gizi/api/gizi/hapus_dpmp/") ?>' + id,
					cache: false,
					dataType: 'JSON',
					success: function(data) {
						if (data.status === false) {
							messageCustom(data.message, 'Error');
						} else {
							messageCustom(data.message, 'Success');
							resetFormDPMP();
							getListDPMP(id_layanan_pendaftaran, 1);
						}
					},
					error: function(e) {
						messageCustom('Terjadi Kesalahan! | Gagal menghapus data')
					}
				})
			}
		});
	}

	
	function detailDPMP(id, id_layanan_pendaftaran) {
		resetFormDPMP();
		$('#wizard-dpmp').bwizard('show', '0');
		$.ajax({
			type: 'GET',
			url: '<?= base_url("gizi/api/gizi/ambil_data_dpmp") ?>/id/' + id + '/id_layanan/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			success: function(data) {
				if(data !== null){

					let dpmp = data.dpmp;
					$('#d-waktu-dpmp').val((dpmp.waktu_dpmp !== null ? datetimefmysql(dpmp.waktu_dpmp) : '')).attr('disabled', true);

					$('#d-profesi').val(dpmp.profesi).attr('disabled', true);
					$('#d-nadis').select2c('readonly', true);
					$('#s2id_d-nadis a .select2c-chosen').html(dpmp.petugas);

					if (dpmp.ttd_nadis !== null) {
						$('#d-ttd-nadis').hide();
						$('#d-ttd-nadis-verified').show();
						$('#d-ttd-nadis-old').val(dpmp.ttd_nadis);
					}
					$('#status-ruang-pasien').val('');		
					$('#status-ruang-pasien').val(dpmp.status_ruang).attr('disabled', true);

					$('#dpmp-dm').attr('disabled', true);
					if (dpmp.dpmp_dm !== null) { $('#dpmp-dm').prop('checked', true) }
					$('#d-ttd-nadis').attr('disabled', true);
					$('#jns-diet-mp').val(dpmp.jns_diet_mp).attr('disabled', true);
					$('#btk-mkn-mp').val(dpmp.btk_mkn_mp).attr('disabled', true);

					$('#dpmp-rg').attr('disabled', true);
					if (dpmp.dpmp_rg !== null) { $('#dpmp-rg').prop('checked', true) }
					$('#jns-diet-sp').val(dpmp.jns_diet_sp).attr('disabled', true);
					$('#btk-mkn-sp').val(dpmp.btk_mkn_sp).attr('disabled', true);

					$('#dpmp-rl').attr('disabled', true);
					if (dpmp.dpmp_rl !== null) { $('#dpmp-rl').prop('checked', true) }
					$('#jns-diet-ms').val(dpmp.jns_diet_ms).attr('disabled', true);
					$('#btk-mkn-ms').val(dpmp.btk_mkn_ms).attr('disabled', true);

					$('#dpmp-dj').attr('disabled', true);
					if (dpmp.dpmp_dj !== null) { $('#dpmp-dj').prop('checked', true) }
					$('#jns-diet-ss').val(dpmp.jns_diet_ss).attr('disabled', true);
					$('#btk-mkn-ss').val(dpmp.btk_mkn_ss).attr('disabled', true);

					$('#dpmp-rs').attr('disabled', true);
					if (dpmp.dpmp_rs !== null) { $('#dpmp-rs').prop('checked', true) }
					$('#jns-diet-mm').val(dpmp.jns_diet_mm).attr('disabled', true);
					$('#btk-mkn-mm').val(dpmp.btk_mkn_mm).attr('disabled', true);
					
					$('#dpmp-dl').attr('disabled', true);
					if (dpmp.dpmp_dl !== null) { $('#dpmp-dl').prop('checked', true) }
					$('#jns-diet-sm').val(dpmp.jns_diet_sm).attr('disabled', true);
					$('#btk-mkn-sm').val(dpmp.btk_mkn_sm).attr('disabled', true);
					
					$('#dpmp-ts').attr('disabled', true);
					if (dpmp.dpmp_ts !== null) { $('#dpmp-ts').prop('checked', true) }

					$('#dpmp-dh').attr('disabled', true);
					if (dpmp.dpmp_dh !== null) { $('#dpmp-dh').prop('checked', true) }

					$('#dpmp-tktp').attr('disabled', true);
					if (dpmp.dpmp_tktp !== null) { $('#dpmp-tktp').prop('checked', true) }

					$('#dpmp-tkal').attr('disabled', true);
					if (dpmp.dpmp_tkal !== null) { $('#dpmp-tkal').prop('checked', true) }
					
					$('#dpmp-rkal').attr('disabled', true);
					if (dpmp.dpmp_rkal !== null) { $('#dpmp-rkal').prop('checked', true) }

					$('#dpmp-rp').attr('disabled', true);
					if (dpmp.dpmp_rp !== null) { $('#dpmp-rp').prop('checked', true) }

					$('#dpmp-rpur').attr('disabled', true);
					if (dpmp.dpmp_rpur !== null) { $('#dpmp-rpur').prop('checked', true) }

					$('#dpmp-b').attr('disabled', true);
					if (dpmp.dpmp_b !== null) { $('#dpmp-b').prop('checked', true) }

					$('#dpmp-sonde').attr('disabled', true);
					if (dpmp.dpmp_sonde !== null) { $('#dpmp-sonde').prop('checked', true) }

					$('#dpmp-c').attr('disabled', true);
					if (dpmp.dpmp_c !== null) { $('#dpmp-c').prop('checked', true) }
					
					$('#dpmp-p').attr('disabled', true);
					if (dpmp.dpmp_p !== null) { $('#dpmp-p').prop('checked', true) }

					$('#mp-mps').val(dpmp.mp_makan_pasien).attr('disabled', true);

					$('#sp-mps').val(dpmp.sp_makan_pasien).attr('disabled', true);

					$('#ms-mps').val(dpmp.ms_makan_pasien).attr('disabled', true);

					$('#ss-mps').val(dpmp.ss_makan_pasien).attr('disabled', true);

					$('#mm-mps').val(dpmp.mm_makan_pasien).attr('disabled', true);

					$('#sm-mps').val(dpmp.sm_makan_pasien).attr('disabled', true);

					$('#ket-makan-pasien').val(dpmp.ket_makan_pasien).attr('disabled', true);

					$('#mp-diet-cair').val(dpmp.mp_diet_cair).attr('disabled', true);

					$('#ms-diet-cair').val(dpmp.ms_diet_cair).attr('disabled', true);

					$('#mm-diet-cair').val(dpmp.mm_diet_cair).attr('disabled', true);

					$('#sp-diet-cair').val(dpmp.sp_diet_cair).attr('disabled', true);

					$('#ss-diet-cair').val(dpmp.ss_diet_cair).attr('disabled', true);

					$('#sm-diet-cair').val(dpmp.sm_diet_cair).attr('disabled', true);

					$('#table-form-diet-cair').empty();
					$('#table-jam-pemberian').empty();
					$('#table-add-dpmp').empty();

					$('#dpmp-footer').empty();

					let dpmp_footer = '';

					dpmp_footer = `<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Keluar</button>`;

			        $('#dpmp-footer').append(dpmp_footer);

			        if (typeof data.diet_cair !== 'undefined' | data.diet_cair !== null) {
                        
                        showTabelDietCair(data.diet_cair);

                    } else {

                        $('#table-diet-cair tbody').empty();
                        
                    }

                }
			},
			error: function(e) {
				accessFailed('Terjadi Kesalahan | Gagal mengambil data');
			}
		});
		
	}

	function showTabelDietCair(data) {

		if (data !== null) {

			$.each(data, function(i, v) {

				let jam_pemberian = '';

			        if(v.dpmp_jam_satu !== null && (v.dpmp_jam_dua !== null | v.dpmp_jam_tiga !== null | v.dpmp_jam_empat !== null | v.dpmp_jam_lima !== null | v.dpmp_jam_enam !== null | v.dpmp_jam_tujuh !== null | v.dpmp_jam_delapan !== null)){

			        	let psh_jam_satu = v.dpmp_jam_satu.split(':');
			        	let jam_satu = psh_jam_satu[0];
			        	jam_pemberian += +jam_satu + ', ';
			        
			        } else if(v.dpmp_jam_satu !== null){

			        	let psh_jam_satu = v.dpmp_jam_satu.split(':');
			        	let jam_satu = psh_jam_satu[0];
			        	jam_pemberian += +jam_satu;

			        }

			        if(v.dpmp_jam_dua !== null && (v.dpmp_jam_tiga !== null | v.dpmp_jam_empat !== null | v.dpmp_jam_lima !== null | v.dpmp_jam_enam !== null | v.dpmp_jam_tujuh !== null | v.dpmp_jam_delapan !== null)){

			        	let psh_jam_dua = v.dpmp_jam_dua.split(':');
			        	let jam_dua = psh_jam_dua[0];
			        	jam_pemberian += +jam_dua + ', ';

			        } else if(v.dpmp_jam_dua !== null){

			        	let psh_jam_dua = v.dpmp_jam_dua.split(':');
			        	let jam_dua = psh_jam_dua[0];
			        	jam_pemberian += +jam_dua;

			        }

			        if(v.dpmp_jam_tiga !== null && (v.dpmp_jam_empat !== null | v.dpmp_jam_lima !== null | v.dpmp_jam_enam !== null | v.dpmp_jam_tujuh !== null | v.dpmp_jam_delapan !== null)){

			        	let psh_jam_tiga = v.dpmp_jam_tiga.split(':');
			        	let jam_tiga = psh_jam_tiga[0];
			        	jam_pemberian += +jam_tiga + ', ';

			        } else if(v.dpmp_jam_tiga !== null){

			        	let psh_jam_tiga = v.dpmp_jam_tiga.split(':');
			        	let jam_tiga = psh_jam_tiga[0];
			        	jam_pemberian += +jam_tiga;

			        }

			        if(v.dpmp_jam_empat !== null && (v.dpmp_jam_lima !== null | v.dpmp_jam_enam !== null | v.dpmp_jam_tujuh !== null | v.dpmp_jam_delapan !== null)){

			        	let psh_jam_empat = v.dpmp_jam_empat.split(':');
			        	let jam_empat = psh_jam_empat[0];
			        	jam_pemberian += +jam_empat + ', ';

			        } else if(v.dpmp_jam_empat !== null){

			        	let psh_jam_empat = v.dpmp_jam_empat.split(':');
			        	let jam_empat = psh_jam_empat[0];
			        	jam_pemberian += +jam_empat;

			        }

			        if(v.dpmp_jam_lima !== null && (v.dpmp_jam_enam !== null | v.dpmp_jam_tujuh !== null | v.dpmp_jam_delapan !== null)){

			        	let psh_jam_lima = v.dpmp_jam_lima.split(':');
			        	let jam_lima = psh_jam_lima[0];
			        	jam_pemberian += +jam_lima + ', ';

			        } else if(v.dpmp_jam_lima !== null){

			        	let psh_jam_lima = v.dpmp_jam_lima.split(':');
			        	let jam_lima = psh_jam_lima[0];
			        	jam_pemberian += +jam_lima;

			        }

			        if(v.dpmp_jam_enam !== null && (v.dpmp_jam_tujuh !== null | v.dpmp_jam_delapan !== null)){

			        	let psh_jam_enam = v.dpmp_jam_enam.split(':');
			        	let jam_enam = psh_jam_enam[0];
			        	jam_pemberian += +jam_enam + ', ';

			        } else if(v.dpmp_jam_enam !== null){

			        	let psh_jam_enam = v.dpmp_jam_enam.split(':');
			        	let jam_enam = psh_jam_enam[0];
			        	jam_pemberian += +jam_enam;

			        }

			        if(v.dpmp_jam_tujuh !== null && (v.dpmp_jam_delapan !== null)){

			        	let psh_jam_tujuh = v.dpmp_jam_tujuh.split(':');
			        	let jam_tujuh = psh_jam_tujuh[0];
			        	jam_pemberian += +jam_tujuh + ', ';

			        } else if(v.dpmp_jam_tujuh !== null){

			        	let psh_jam_tujuh = v.dpmp_jam_tujuh.split(':');
			        	let jam_tujuh = psh_jam_tujuh[0];
			        	jam_pemberian += +jam_tujuh;

			        }

			        if(v.dpmp_jam_delapan !== null){

			        	let psh_jam_delapan = v.dpmp_jam_delapan.split(':');
			        	let jam_delapan = psh_jam_delapan[0];
			        	jam_pemberian += +jam_delapan;

			        }

			    let html = /* html */ `
                    <tr>
		                <td class="number-diet" align="center">${++i}</td>
		                <td>CAIR ${v.nama_item} ${v.keterangan_diet_cair}</td>
		                <td>${jam_pemberian}</td>
		                <td align="center">
		                </td>
		            </tr>
                `;
                $('#table-diet-cair tbody').append(html);
            })

		}


			        

	}




</script>


<!-- end catatan perkembangan pasien terintegrasi -->

<!-- Modal -->
<input type="hidden" name="page_now" id="d-page-now">
<div class="modal fade" id="modal-dpmp">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width:95%">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 class="modal-title bold" id="modal-pengkajian-awal">FORM DPMP</h5>
					<h6 class="modal-title text-muted"><small>(Daftar Permintaan Makanan Pasien)</small></h6>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-dpmp class=form-horizontal') ?>
				<input type="hidden" name="id_dpmp" id="d-id-dpmp">
				<input type="hidden" name="id_layanan_pendaftaran" id="d-id-layanan-pendaftaran">
				<input type="hidden" name="id_pendaftaran" id="d-id-pendaftaran">
				<input type="hidden" name="riwayat_bed" id="d-rwyt-bed">
				<!-- header -->
				<div class="row">
					<div class="col-lg-6">
						<div class="table-responsive">
							<table class="table table-sm table-striped">
								<tr>
									<td width="20%" class="bold">Nama Pasien</td>
									<td wdith="80%">: <span id="d-pasien-nama"></span></td>
								</tr>
								<tr>
									<td class="bold">No. RM</td>
									<td>: <span id="d-pasien-no-rm"></span></td>
								</tr>
								<tr>
									<td class="bold">Tanggal Lahir</td>
									<td>: <span id="d-pasien-tanggal-lahir"></span></td>
								</tr>
								<tr>
									<td class="bold">Jenis Kelamin</td>
									<td>: <span id="d-pasien-jenis-kelamin"></span></td>
								</tr>
								<tr>
									<td width="30%" class="bold">Ruang Rawat/Unit Kerja</td>
									<td wdith="70%">: <span id="d-bed"></span></td>
								</tr>
							</table>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="table-responsive">
							<table class="table table-sm table-striped">
								<tr>
									<td width="30%" class="bold">Dokter Penanggung Jawab</td>
									<td wdith="70%">: <span id="d-dpjp"></span></td>
								</tr>
								<tr>
									<td width="30%" class="bold">Diagnosis Pasien</td>
									<td wdith="70%">: <span><button type="button" title="Klik untuk melihat diagnosis pasien" class="btn btn-secondary btn-xxs" onclick="riwayatDiagnosisPasien()"><i class="fas fa-eye m-r-5"></i>Lihat Diagnosis Pasien</button></span></td>
								</tr>
								<tr>
									<td width="30%" class="bold">CPPT</td>
									<td wdith="70%">: <span><button type="button" title="Klik untuk melihat CPPT pasien" class="btn btn-secondary btn-xxs" onclick="riwayatCPPTPasien()"><i class="fas fa-eye m-r-5"></i>Lihat CPPT Pasien</button></span></td>
								</tr>
								<tr>
									<td width="30%" class="bold">Hasil Lab</td>
									<td wdith="70%">: <span><button type="button" title="Klik untuk melihat CPPT pasien" class="btn btn-secondary btn-xxs" onclick="lihatHasilLAB()"><i class="fas fa-eye m-r-5"></i>Hasil Lab Pasien</button></span></td>
								</tr>
							</table>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="widget-body">
							<!-- form dpmp -->
							<div id="wizard-dpmp">
								<!-- Tab bwizard -->
								<ol>
									<li>Entri DPMP</li>
									<li>Data DPMP</li>
								</ol>

								<!-- Data bwizard -->
								<div class="form-entri-dpmp">
									<div class="row">
										<div class="col-lg-12">
											<table class="table table-sm table-striped">
												<tr>
													<td width="20%" class="bold">Tanggal dan Jam</td>
													<td wdith="80%"><input type="text" name="waktu_dpmp" id="d-waktu-dpmp" class="custom-form clear-input d-inline-block col-lg-3"></td>
												</tr>
												<tr>
													<td class="bold">Profesional Pemberi Asuhan</td>
													<td><?= form_dropdown('profesi', $profesi, array(), 'id=d-profesi class="custom-form col-lg-3" onchange="clearValidate(this)"') ?></td>
												</tr>
												<tr>
													<td class="bold">Pemberi Pelayanan</td>
													<td><input type="text" name="nadis" class="select2c-input" id="d-nadis"></td>
												</tr>
												<tr>
													<td class="bold">Paraf</td>
													<td>
														<input type="checkbox" name="ttd_nadis" id="d-ttd-nadis" class="custom-form" style="width:20px" value="1" class="mr-1">
														<input type="hidden" name="ttd_nadis_old" id="d-ttd-nadis-old">
														<?= digitalSignature('d-ttd-nadis-verified') ?>
													</td>
												</tr>
												<tr>
													<td class="bold">Status Ruang Pasien</td>
													<td><input type="text" name="status_ruang" class="custom-form col-lg-3" id="status-ruang-pasien" readonly ="readonly"></td>
												</tr>
											</table>
										</div>
									</div>
									<div class="col-lg-12">
										<div class="row">
											<div class="col-lg-6">
												<div class="box-well shadow">
													<div class="widget-body">
														<div id="wizard-diet-group">
															<ol>
																<li>DIET MAKAN</li>
																<li>DIET CAIR</li>
															</ol>
															<div class="form-diet-makan">
																<div class="row">
																	<div class="col-lg-12">
																		<table class="table table-sm table-no-border table-striped" style="margin-top: -15px">
																			<br>
																			<tr>
																				<td width="25%" class="bold">Diet</td>
																				<td colspan="2" width="31%" class="bold">Jenis Diet</td>
																				<td colspan="2" width="31%" class="bold">Bentuk Makanan</td>
																			</tr>
																		</table>
																		<table class="table table-sm table-no-border table-striped" style="margin-top: -15px">
																			<tr>
																				<td width="27%" class="bold">
																					<input type="checkbox" name="dpmp_dm" id="dpmp-dm" value="1" class="mr-1 ml-2">Diabetes Melitus<br>
																				</td>
																				<td width="1%">
																					MP
																				</td>
							                                                    <td width="30%">
							                                                        <?= form_dropdown('jns_diet_mp', $jns_diet, array(), 'id=jns-diet-mp class="custom-form col-lg-7"') ?>
							                                                    </td>
							                                                    <td width="1%">
																					MP
																				</td>
							                                                    <td width="30%">
							                                                        <?= form_dropdown('btk_mkn_mp', $btk_mkn, array(), 'id=btk-mkn-mp class="custom-form col-lg-7"') ?>
							                                                    </td>
																			</tr>
																			<tr>
																				<td width="27%" class="bold">
																					<input type="checkbox" name="dpmp_rg" id="dpmp-rg" value="1" class="mr-1 ml-2">Rendah Garam<br>
																				</td>
																				<td width="1%">
																					SP
																				</td>
							                                                    <td width="30%">
							                                                        <?= form_dropdown('jns_diet_sp', $jns_diet, array(), 'id=jns-diet-sp class="custom-form col-lg-7"') ?>
							                                                    </td>
							                                                    <td width="1%">
																					SP
																				</td>
							                                                    <td width="30%">
							                                                        <?= form_dropdown('btk_mkn_sp', $btk_mkn, array(), 'id=btk-mkn-sp class="custom-form col-lg-7"') ?>
							                                                    </td>
																			</tr>
																			<tr>
																				<td width="27%" class="bold">
																					<input type="checkbox" name="dpmp_rl" id="dpmp-rl" value="1" class="mr-1 ml-2">Rendah Lemak<br>
																				</td>
																				<td width="1%">
																					MS
																				</td>
							                                                    <td width="30%">
							                                                        <?= form_dropdown('jns_diet_ms', $jns_diet, array(), 'id=jns-diet-ms class="custom-form col-lg-7"') ?>
							                                                    </td>
							                                                    <td width="1%">
																					MS
																				</td>
							                                                    <td width="30%">
							                                                        <?= form_dropdown('btk_mkn_ms', $btk_mkn, array(), 'id=btk-mkn-ms class="custom-form col-lg-7"') ?>
							                                                    </td>
																			</tr>
																			<tr>
																				<td width="27%" class="bold">
																					<input type="checkbox" name="dpmp_dj" id="dpmp-dj" value="1" class="mr-1 ml-2">Diet Jantung<br>
																				</td>
																				<td width="1%">
																					SS
																				</td>
							                                                    <td width="30%">
							                                                        <?= form_dropdown('jns_diet_ss', $jns_diet, array(), 'id=jns-diet-ss class="custom-form col-lg-7"') ?>
							                                                    </td>
							                                                    <td width="1%">
																					SS
																				</td>
							                                                    <td width="30%">
							                                                        <?= form_dropdown('btk_mkn_ss', $btk_mkn, array(), 'id=btk-mkn-ss class="custom-form col-lg-7"') ?>
							                                                    </td>
																			</tr>
																			<tr>
																				<td width="27%" class="bold">
																					<input type="checkbox" name="dpmp_rs" id="dpmp-rs" value="1" class="mr-1 ml-2">Rendah Serat<br>
																				</td>
																				<td width="1%">
																					MM
																				</td>
							                                                    <td width="30%">
							                                                        <?= form_dropdown('jns_diet_mm', $jns_diet, array(), 'id=jns-diet-mm class="custom-form col-lg-7"') ?>
							                                                    </td>
							                                                    <td width="1%">
																					MM
																				</td>
							                                                    <td width="30%">
							                                                        <?= form_dropdown('btk_mkn_mm', $btk_mkn, array(), 'id=btk-mkn-mm class="custom-form col-lg-7"') ?>
							                                                    </td>
																			</tr>
																			<tr>
																				<td width="27%" class="bold">
																					<input type="checkbox" name="dpmp_dl" id="dpmp-dl" value="1" class="mr-1 ml-2">Diet Lambung<br>
																				</td>
																				<td width="1%">
																					SM
																				</td>
							                                                    <td width="30%">
							                                                        <?= form_dropdown('jns_diet_sm', $jns_diet, array(), 'id=jns-diet-sm class="custom-form col-lg-7"') ?>
							                                                    </td>
							                                                    <td width="1%">
																					SM
																				</td>
							                                                    <td width="30%">
							                                                        <?= form_dropdown('btk_mkn_sm', $btk_mkn, array(), 'id=btk-mkn-sm class="custom-form col-lg-7"') ?>
							                                                    </td>
																			</tr>
																			<tr>
																				<td width="27%" class="bold">
																					<input type="checkbox" name="dpmp_ts" id="dpmp-ts" value="1" class="mr-1 ml-2">Tinggi Serat<br>
																				</td>
																				<td width="1%">
																				</td>
							                                                    <td width="30%">
							                                                    </td>
							                                                    <td width="1%">
																				</td>
							                                                    <td width="30%">
							                                                    </td>
																			</tr>
																			<tr>
																				<td width="27%" class="bold">
																					<input type="checkbox" name="dpmp_dh" id="dpmp-dh" value="1" class="mr-1 ml-2">Diet Hati<br>
																				</td>
																				<td width="1%">
																				</td>
							                                                    <td width="30%">
							                                                    </td>
							                                                    <td width="1%">
																				</td>
							                                                    <td width="30%">
							                                                    </td>
																			</tr>
																			<tr>
																				<td width="27%" class="bold">
																					<input type="checkbox" name="dpmp_tktp" id="dpmp-tktp" value="1" class="mr-1 ml-2">Tinggi Kalori Tinggi Protein<br>
																				</td>
																				<td width="1%">
																				</td>
							                                                    <td width="30%">
							                                                    </td>
							                                                    <td width="1%">
																				</td>
							                                                    <td width="30%">
							                                                    </td>
																			</tr>
																			<tr>
																				<td width="27%" class="bold">
																					<input type="checkbox" name="dpmp_tkal" id="dpmp-tkal" value="1" class="mr-1 ml-2">Tinggi Kalium<br>
																				</td>
																				<td width="1%">
																				</td>
							                                                    <td width="30%">
							                                                    </td>
							                                                    <td width="1%">
																				</td>
							                                                    <td width="30%">
							                                                    </td>
																			</tr>
																			<tr>
																				<td width="27%" class="bold">
																					<input type="checkbox" name="dpmp_rkal" id="dpmp-rkal" value="1" class="mr-1 ml-2">Rendah Kalium<br>
																				</td>
																				<td width="1%">
																				</td>
							                                                    <td width="30%">
							                                                    </td>
							                                                    <td width="1%">
																				</td>
							                                                    <td width="30%">
							                                                    </td>
																			</tr>
																			<tr>
																				<td width="27%" class="bold">
																					<input type="checkbox" name="dpmp_rp" id="dpmp-rp" value="1" class="mr-1 ml-2">Rendah Protein<br>
																				</td>
																				<td width="1%">
																				</td>
							                                                    <td width="30%">
							                                                    </td>
							                                                    <td width="1%">
																				</td>
							                                                    <td width="30%">
							                                                    </td>
																			</tr>
																			<tr>
																				<td width="27%" class="bold">
																					<input type="checkbox" name="dpmp_rpur" id="dpmp-rpur" value="1" class="mr-1 ml-2">Rendah Purin<br>
																				</td>
																				<td width="1%">
																				</td>
							                                                    <td width="30%">
							                                                    </td>
							                                                    <td width="1%">
																				</td>
							                                                    <td width="30%">
							                                                    </td>
																			</tr>
																			<tr>
																				<td width="27%" class="bold">
																					<input type="checkbox" name="dpmp_b" id="dpmp-b" value="1" class="mr-1 ml-2">Biasa<br>
																				</td>
																				<td width="1%">
																				</td>
							                                                    <td width="30%">
							                                                    </td>
							                                                    <td width="1%">
																				</td>
							                                                    <td width="30%">
							                                                    </td>
																			</tr>
																			<tr>
																				<td width="27%" class="bold">
																					<input type="checkbox" name="dpmp_sonde" id="dpmp-sonde" value="1" class="mr-1 ml-2">Sode<br>
																				</td>
																				<td width="1%">
																				</td>
							                                                    <td width="30%">
							                                                    </td>
							                                                    <td width="1%">
																				</td>
							                                                    <td width="30%">
							                                                    </td>
																			</tr>
																			<tr>
																				<td width="27%" class="bold">
																					<input type="checkbox" name="dpmp_c" id="dpmp-c" value="1" class="mr-1 ml-2">Cair<br>
																				</td>
																				<td width="1%">
																				</td>
							                                                    <td width="30%">
							                                                    </td>
							                                                    <td width="1%">
																				</td>
							                                                    <td width="30%">
							                                                    </td>
																			</tr>
																			<tr>
																				<td width="27%" class="bold">
																					<input type="checkbox" name="dpmp_p" id="dpmp-p" value="1" class="mr-1 ml-2">Puasa<br>
																				</td>
																				<td width="1%">
																				</td>
							                                                    <td width="30%">
							                                                    </td>
							                                                    <td width="1%">
																				</td>
							                                                    <td width="30%">
							                                                    </td>
																			</tr>
																		</table>
																	</div>
																</div>
															</div>
															<div class="form-diet-cair">
																<div class="row">
																	<div class="col-lg-12">
																		<table class="table table-no-border table-sm table-striped" id="table-form-diet-cair">
																			
							                                            </table>
							                                            <table class="table table-no-border table-sm table-striped" id="table-jam-pemberian">
							                                             	
							                            				</table>
							                            				<table class="table table-no-border table-sm table-striped" id="table-add-dpmp">
							                            					
																		</table>
																		<table class="table table-sm table-striped table-bordered color-table info-table" id="table-diet-cair">
																			<thead>
																				<tr>
																					<th class="center v-center bold" width="5%">No.</th>
																					<th width="25%" class="bold">Diet</th>
																					<th width="10%" class="bold">Jam</th>
																					<th></th>
																				</tr>
																			</thead>
																			<tbody></tbody>
																		</table>
																		</br>
																		<table class="table table-no-border table-sm table-striped">
																			<tr>
							                     								<td><b>Diet Cair</b></td>
							                                                    <td></td>
																				<td></td>
							                                                </tr>
							                                            </table>
																		<table class="table table-no-border table-sm table-striped">
																			<tr>
							                     								<td width="2%"><b>MP</b></td>
							                                                    <td width="20%"><?= form_dropdown('mp_diet_cair', $kode_diet, array(), 'id=mp-diet-cair class="custom-form col-lg-5" onchange="clearValidate(this)"') ?></td>
																				<td width="2%"><b>MS</b></td>
																				<td width="20%"><?= form_dropdown('ms_diet_cair', $kode_diet, array(), 'id=ms-diet-cair class="custom-form col-lg-5" onchange="clearValidate(this)"') ?></td>
																				<td width="2%"><b>MM</b></td>
																				<td width="20%"><?= form_dropdown('mm_diet_cair', $kode_diet, array(), 'id=mm-diet-cair class="custom-form col-lg-5" onchange="clearValidate(this)"') ?></td>
																			</tr>
							                                            	<tr>
							                     								<td width="2%"><b>SP</b></td>
							                                                    <td width="20%"><?= form_dropdown('sp_diet_cair', $kode_diet, array(), 'id=sp-diet-cair class="custom-form col-lg-5" onchange="clearValidate(this)"') ?></td>
																				<td width="2%"><b>SS</b></td>
																				<td width="20%"><?= form_dropdown('ss_diet_cair', $kode_diet, array(), 'id=ss-diet-cair class="custom-form col-lg-5" onchange="clearValidate(this)"') ?></td>
																				<td width="2%"><b>SM</b></td>
																				<td width="20%"><?= form_dropdown('sm_diet_cair', $kode_diet, array(), 'id=sm-diet-cair class="custom-form col-lg-5" onchange="clearValidate(this)"') ?></td>
																			</tr> 	
																		</table>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>	
											</div>
											<div class="col-lg-6">
												<div class="box-well shadow">
													<table class="table table-no-border table-sm table-striped">
														<tr>
				             								<td><b>Makan Pasien</b></td>
				                                            <td></td>
															<td></td>
				                                        </tr>
				                                        <tr>
				             								<td><b>MP</b></td>
				                                            <td><?= form_dropdown('mp_makan_pasien', $mkn_pasien, array(), 'id=mp-mps class="custom-form col-lg-5" onchange="clearValidate(this)"') ?></td>
															<td></td>
				                                        </tr>
				                                        <tr>
				             								<td><b>SP</b></td>
				                                            <td><?= form_dropdown('sp_makan_pasien', $mkn_pasien, array(), 'id=sp-mps class="custom-form col-lg-5" onchange="clearValidate(this)"') ?></td>
															<td></td>
				                                        </tr>
				                                        <tr>
				             								<td><b>MS</b></td>
				                                            <td><?= form_dropdown('ms_makan_pasien', $mkn_pasien, array(), 'id=ms-mps class="custom-form col-lg-5" onchange="clearValidate(this)"') ?></td>
															<td></td>
				                                        </tr>
				                                        <tr>
				             								<td><b>SS</b></td>
				                                            <td><?= form_dropdown('ss_makan_pasien', $mkn_pasien, array(), 'id=ss-mps class="custom-form col-lg-5" onchange="clearValidate(this)"') ?></td>
															<td></td>
				                                        </tr>
				                                        <tr>
				             								<td><b>MM</b></td>
				                                            <td><?= form_dropdown('mm_makan_pasien', $mkn_pasien, array(), 'id=mm-mps class="custom-form col-lg-5" onchange="clearValidate(this)"') ?></td>
															<td></td>
				                                        </tr>
				                                        <tr>
				             								<td><b>SM</b></td>
				                                            <td><?= form_dropdown('sm_makan_pasien', $mkn_pasien, array(), 'id=sm-mps class="custom-form col-lg-5" onchange="clearValidate(this)"') ?></td>
															<td></td>
				                                        </tr>
				                                        <tr>
				             								<td><b>Keterangan</b></td>
				                                            <td><input type="text" name="ket_makan_pasien" id="ket-makan-pasien" class="custom-form clear-input d-inline-block col-lg-5 mr-1" placeholder="Keterangan Makan Pasien..."></td>
															<td></td>
				                                        </tr>
				                                    </table>
				                                    <table class="table table-no-border table-sm table-striped">
				                                    	<tr>
				                                    		<td width="20%">
				                                    			<button type="button" class="btn btn-info" onclick="bersihForm()"><span id="btn-bersih-form"><i class="fas fa-fw fa-save mr-1"></i>Bersihkan Form</span></button>
				                                    		</td>
				                                    		<td width="20%">
                												<button type="button" class="btn btn-info" onclick="panggilForm()"><span id="btn-panggil-form"><i class="fas fa-fw fa-save mr-1"></i>Panggil Form</span></button>
                											</td>
                											<td width="60%">
                											</td>	
                										</tr>
				                                    </table>
												</div>
											</div>
										</div>	
									</div>
								</div>
								<div class="form-data-dpmp">
									<div class="row">
										<div class="col-lg-12">
											<div class="row mb-2">
												<div class="col d-flex justify-content-start">
													<div class="input-group">
														<div class="input-group-prepend">
															<span class="input-group-text" id="d-img-calendar"><i class="fas fa-fw fa-calendar-alt"></i></span>
														</div>
														<input type="text" name="waktu_search" id="d-waktu-search" class="form-control col-lg-4" placeholder="Pencarian Tanggal">
													</div>
												</div>
												<div class="col d-flex justify-content-end">
													<div class="custom-search">
														<input type="text" class="search-query-white" onkeyup="getListDPMP($('#d-id-layanan-pendaftaran').val(), 1)" id="d-keyword" placeholder="Pencarian ...">
														<button type="button"><span class="fas fa-search" aria-hidden="true"></span></button>
													</div>
												</div>
											</div>
											<table class="table table-sm table-striped table-bordered color-table info-table" id="table-dpmp">
												<thead>
													<tr>
														<th class="center v-center" width="1%">No.</th>
														<th class="center v-center" width="15%">Waktu</th>
														<th class="center v-center" width="15%">Professional Pemberi Asuhan</th>
														<th class="center v-center" width="21%">Diet</th>
														<th class="center v-center" width="4%">MP</th>
														<th class="center v-center" width="4%">SP</th>
														<th class="center v-center" width="4%">MS</th>
														<th class="center v-center" width="4%">SS</th>
														<th class="center v-center" width="4%">MM</th>
														<th class="center v-center" width="4%">SM</th>
														<th class="center v-center" width="4%">Cek</th>
														<th class="center v-center" width="4%">Print</th>
														<th class="center v-center" width="16%"></th>
													</tr>
												</thead>
												<tbody></tbody>
											</table>
											<div id="d-pagination" class="float-left"></div>
											<div id="d-summary" class="float-right text-sm"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- end header -->
				<?= form_close() ?>
			</div>
			<div class="modal-footer" id='dpmp-footer'>
				
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?= resource_url() ?>assets/node_modules/wizard/bwizard.js"></script>

<!-- Modal Diagnosis Pasien-->
<div id="modal-diagnosis" class="modal bounceInDown animated" role="dialog" data-backdrop="static" aria-labelledby="modal-diagnosis-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 98%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-diagnosis-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget-body">
                            <div id="wizard-form">
                                <!-- Tab bwizard -->
                                <ol>
                                    <li>Diagnosis</li>
                                </ol>

                                <!-- Data bwizard -->
                                
                                <!-- Form diagnosis -->
                                <div class="form-diagnosis">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="col-lg-6">
                                                <table class="table table-sm table-detail table-striped" width="100%">
                                                    <tr>
                                                        <td width="150px"><b>Pasien</b></td>
                                                        <td width="1px">:</td>
                                                        <td><span id="identitas-pasien-diagnosis"></span></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <table class="table table-hover table-striped table-sm color-table info-table" id="table-diagnosis">
                                                <thead class="thead-theme">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Dokter</th>
                                                        <th>Diagnosis</th>
                                                        <th>Klinik</th>
                                                        <th>Prioritas</th>
                                                        <th>Diagnosis Banding</th>
                                                        <th>Diagnosis Akhir</th>
                                                        <th>Penyabab Kematian</th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Form diagnosis -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- End Modal Diagnosis Pasien -->

<!-- Modal CPPT Pasien-->
<div id="modal-cppt" class="modal bounceInDown animated" role="dialog" data-backdrop="static" aria-labelledby="modal-cppt-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 98%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-cppt-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget-body">
                            <div id="wizard-form-cppt">
                                <!-- Tab bwizard -->
                                <ol>
                                    <li>CPPT</li>
                                </ol>

                                <!-- Data bwizard -->
                                
                                <!-- Form CPPT -->
                                <div class="form-data-cppt">
									<div class="row">
										<div class="col-lg-6">
                                                <table class="table table-sm table-detail table-striped" width="100%">
                                                    <tr>
                                                        <td width="150px"><b>Pasien</b></td>
                                                        <td width="1px">:</td>
                                                        <td><span id="identitas-pasien-cppt"></span></td>
                                                    </tr>
                                                </table>
                                            </div>
										<div class="col-lg-12">
											<div class="row mb-2">
												<div class="col d-flex justify-content-start">
													<div class="input-group">
														<div class="input-group-prepend">
															<span class="input-group-text" id="cppt-img-calendar"><i class="fas fa-fw fa-calendar-alt"></i></span>
														</div>
														<input type="text" name="waktu_search" id="cppt-waktu-search" class="form-control col-lg-4" placeholder="Pencarian Tanggal">
													</div>
												</div>
												<div class="col d-flex justify-content-end">
													<div class="custom-search">
														<input type="text" class="search-query-white" onkeyup="riwayatCPPTPasien($('#d-id-layanan-pendaftaran').val(), 1)" id="cppt-keyword" placeholder="Pencarian ...">
														<button type="button"><span class="fas fa-search" aria-hidden="true"></span></button>
													</div>
												</div>
											</div>
											
											<table class="table table-sm table-striped table-bordered color-table info-table" id="table-cppt-gizi">
												<thead>
													<tr>
														<th class="center v-center" width="5%">No.</th>
														<th class="center v-center" width="10%">Waktu</th>
														<th class="center v-center" width="15%">Professional Pemberi Asuhan</th>
														<th class="center v-center" width="25%">Hasil Assessmen Pasien Dan Pemberian Pelayanan<br><span><i><small>(Tulis dengan format SOAP/ADIME, disertai sasaran, beri paraf pada akhir catatan)</small></i></span></th>
														<th class="center v-center" width="25%">Instruksi PPA Termasuk Pasca Bedah/Prosedur<br><span><i><small>(Instruksi ditulis dengan rinci dan jelas)</small></i></span></th>
														<th class="center v-center" width="10%">Review Dan Verifikasi DPJP</th>
													</tr>
												</thead>
												<tbody></tbody>
											</table>
											<div id="cppt-pagination" class="float-left"></div>
											<div id="cppt-summary" class="float-right text-sm"></div>
										</div>
									</div>
								</div>
                                <!-- End Form CPPT -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal CPPT Pasien -->

<!-- Modal Edit Diet Cair-->
<div id="modal-edit-diet-cair" class="modal bounceInDown animated" role="dialog" data-backdrop="static" aria-labelledby="modal-edit-diet-cair-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 98%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-edit-diet-cair-label"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
            </div>
            <div class="modal-body">
            	<?= form_open('', 'role=form class=form-horizontal id=form-edit-diet-cair'); ?>
            	<input type="hidden" name="id" id="id-diet-cair">
            	<input type="hidden" name="user_account" value="<?= $this->session->userdata("id_translucent") ?>">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="widget-body">
                            <div id="wizard-form-edit-diet-cair">
                                <!-- Tab bwizard -->
                                <ol>
                                    <li>Edit Diet Cair</li>
                                </ol>

                                <!-- Data bwizard -->
                                
                                <!-- Form edit-diet-cair -->
                                <div class="form-data-edit-diet-cair">
									<div class="row">
										<div class="form-edit-diet-cair">
											<div class="row">
												<div class="col-lg-12">
													<table class="table table-no-border table-sm table-striped" id="table-form-edit-diet-cair">
														
		                                            </table>
		                                            <table class="table table-no-border table-sm table-striped" id="table-edit-jam-pemberian">
		                                             	
		                            				</table>
		                            				<table class="table table-no-border table-sm table-striped" id="table-edit-dpmp">
		                            					
													</table>
													
												</div>
											</div>
										</div>
									</div>
								</div>
                                <!-- End Form edit-diet-cair -->

                            </div>
                        </div>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
                <button type="button" class="btn btn-info waves-effect" onclick="updateEditDietCair()"><i class="fas fa-save mr-1"></i>Update</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- End Modal Modal Edit Diet Cair -->

<!-- Modal Pemeriksaan -->
<!-- id = modal-detail-pemeriksaan -->
<div id="modal-dpmp-lab" class="modal fade">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width:80%">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hasil Pemeriksaan Laboratorium</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="fas fa-user mr-1"></i>Data Pasien
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <table class="table table-sm table-striped">
                                            <tbody>
                                                <tr>
                                                    <td>No. RM</td>
                                                    <td>:</td>
                                                    <td><b><span id="no-rm-detail"></span></b></td>
                                                </tr>
                                                <tr>
                                                    <td>No. Register</td>
                                                    <td>:</td>
                                                    <td><b><span id="no-register-detail"></span></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Nama</td>
                                                    <td>:</td>
                                                    <td><b><span id="nama-detail"></span></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Alamat</td>
                                                    <td>:</td>
                                                    <td><b><span id="alamat-detail"></span></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Kelamin</td>
                                                    <td>:</td>
                                                    <td><b><span id="kelamin-detail"></span></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Umur / Tgl. Lahir</td>
                                                    <td>:</td>
                                                    <td><b><span id="umur-detail"></span></b></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-lg-6">
                                        <table class="table table-sm table-striped">
                                            <tbody>
                                                <tr>
                                                    <td width="30%">Nama P. Jawab</td>
                                                    <td width="1%">:</td>
                                                    <td width="69%"><b><span id="nama-pjwb-detail"></span></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Alamat P. Jawab</td>
                                                    <td>:</td>
                                                    <td><b><span id="alaamt-pjwb-detail"></span></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Telp. P. Jawab</td>
                                                    <td>:</td>
                                                    <td><b><span id="telp-pjwb-detail"></span></b></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td>Instansi Perujuk</td>
                                                    <td>:</td>
                                                    <td><b><span id="instansi-perujuk-detail"></span></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Tenaga Medis Perujuk</td>
                                                    <td>:</td>
                                                    <td><b><span id="tenaga-medis-perujuk-detail"></span></b></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <i class="fas fa-list mr-1"></i>Hasil Laboratorium
                                </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="box-well">
                                            <div id="hasil-pemeriksaan-laboratorium"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Close</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Pemeriksaan -->

<!-- Modal Cetak Etiket -->
<div id="modal-cetak-etiket" class="modal fade" role="dialog" aria-labelledby="modal-cetak-label" aria-hidden="true">
	<div class="modal-dialog" style="max-width: 650px">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal-cetak-label">Form Cetak Etiket</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-cetak-etiket role=form class=form-horizontal') ?>
				<div class="form-group row tight">
					<label class="col-3 col-form-label">Tanggal</label>
					<div class="col-4">
						<input type="text" name="tanggal_awal" id="tanggal-awal-cetak" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
					<div class="col-1">
						<h5 class="m-t-10">s/d</h5>
					</div>
					<div class="col-4">
						<input type="text" name="tanggal_akhir" id="tanggal-akhir-cetak" class="form-control" value="<?= date('d/m/Y') ?>">
					</div>
				</div>
				<div class="form-group row tight">
					<label for="no_rm_search" class="col-3 col-form-label">No. RM</label>
					<div class="col">
						<input type="text" name="no_rm" id="no-rm-cetak" class="form-control">
					</div>
				</div>
				<div class="form-group row tight">
					<label for="nama_search" class="col-3 col-form-label">Nama</label>
					<div class="col">
						<input type="text" name="nama" id="nama-cetak" class="form-control">
					</div>
				</div>
				<div class="form-group row tight">
					<label for="diet_cetak" class="col-3 col-form-label">Diet</label>
					<div class="col">
						<?= form_dropdown('diet_cetak', $diet, array(), 'id=diet-cetak class="form-control" onchange="clearValidate(this)"') ?>
					</div>
				</div>
				<div class="form-group row tight">
					<label for="jam_pemberian" class="col-3 col-form-label">Jam Pemberian</label>
					<div class="col">
						<input type="text" name="jam_cetak" id="jam-cetak" class="form-control">
					</div>
				</div>
				<div class="form-group row tight">
                        <label for="ruangan_diet" class="col-3 col-form-label">Ruangan</label>
                        <div class="col">
                            <?= form_dropdown('ruangan_diet', $ruangan_diet, array(), 'id=ruangan_diet class="form-control" onchange="clearValidate(this)"') ?>
                        </div>
                    </div>
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"><i class="fas fa-window-close"></i> Keluar</button>
				<button type="button" class="btn btn-info waves-effect" onclick="cetakEtiket()"><i class="fas fa-print"></i> Cetak</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- End Modal Cetak Etiket -->