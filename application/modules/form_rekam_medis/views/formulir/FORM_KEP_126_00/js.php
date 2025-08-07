<script>
    var num = 1;
    num++;
    var numberTable = 0;

    $(function() {
        $('#data_chas, #edit_data_chas, #detail_data_chas').on('click', function() {
            $('#chas_tgl, #edit_chas_tgl, #chas_tgl_pemasangan, #edit_chas_tgl_pemasangan').datetimepicker({
                format: 'DD/MM/YYYY',
                maxDate: new Date(),
                beforeShow: function(i) {
                    if ($(i).attr('readonly')) {
                        return false;
                    }
                }
            });

            // Perawat
            $('#chas_perawat_pagi, #chas_perawat_sore, #chas_perawat_malam, #edit_chas_perawat_pagi, #edit_chas_perawat_sore, #edit_chas_perawat_malam ').select2c({
                ajax: {
                    url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                    dataType: 'json',
                    quietMillis: 100,
                    data: function(term, page) { // page is the one-based page number tracked by Select2
                        return {
                            q: term, //search term
                            page: page, // page number
                        };
                    },
                    results: function(data, page) {
                        var more = (page * 20) < data
                            .total; // whether or not there are more results available

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
    })

    function timerzmysql(waktu) {
        var tm = waktu.split(':');
        return tm[0] + ':' + tm[1];
    }

    function resetChas() {
        numberTable = 0;

        // Reset all input values and clear relevant containers
        $('#chas_id, #chas_id_layanan_pendaftaran, #chas_id_pendaftaran, #chas_id_user, #chas_id_pasien').val('');
        
        $('input[name^="chas_"]').each(function() {
            const type = $(this).attr('type');
            if (type === 'radio' || type === 'checkbox') {
                $(this).prop('checked', false);
            } else if (type === 'text' || type === 'number') {
                $(this).val('');
            }
        });
        
        $('#chas_batas').val('');
        
        // Clear content in specific elements
        $('#chas_buka_tutup, #table_chas .body-table, #table_edit_chas .body-table, #table_detail_chas .body-table').empty();
    }

    function resetEditChas() {
        $('input[name^="chas_"]').each(function() {
            const type = $(this).attr('type');
            if (type === 'radio' || type === 'checkbox') {
                $(this).prop('checked', false);
            } else if (type === 'text' || type === 'number') {
                $(this).val('');
            }
        });
    }

    function tambahFORM_KEP_126_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'tambah';

        resetChas();
        entriChas(layanan.id_pendaftaran, layanan.id, bed, action);

    }

    function lihatFORM_KEP_126_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'lihat';

        resetChas();
        entriChas(layanan.id_pendaftaran, layanan.id, bed, action);
        
    }

    function editFORM_KEP_126_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'edit';

        resetChas();
        entriChas(layanan.id_pendaftaran, layanan.id, bed, action);

    }

    function entriChas(id_pendaftaran, id_layanan_pendaftaran, bed, action) {

        $('#btn_simpan_chas').hide();
        $('#action_chas').val(action);

        var groupAccount = '<?= $this->session->userdata('account_group') ?>';
        var profesi = '<?= $this->session->userdata('profesinadis') ?>';
        if (groupAccount == 'Admin') {
            profesi = 'Perawat';
        }

        if (action !== 'lihat') {
			$('#btn_simpan_chas').show();
		} else {
			$('#btn_simpan_chas').hide();
            $('#chas_buka_tutup').hide();
		}
        $('#chas_bed').val(bed);

        $.ajax({
			type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_data_entri_keperawatan") ?>/id/' + id_pendaftaran +'/id_layanan/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {

				// Pasien
				resetChas();
                $('#chas_id_layanan_pendaftaran').val(id_layanan_pendaftaran);
                $('#chas_id_pendaftaran').val(id_pendaftaran);
                $('#chas_id_bed, #chas_bed').val(bed).text(bed);
                if (data.pasien !== null) {
                    $('#chas_id_pasien, #chas_no_rm').val(data.pasien.id_pasien).text(data.pasien.id_pasien);
                    $('#chas_nama_pasien').text(data.pasien.nama);
                    $('#chas_tanggal_lahir').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
                    $('#chas_jenis_kelamin').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));
                    $('#chas_alamat').text(data.pasien.alamat);
                }

                if (typeof data.chas !== 'undefined' && data.chas !== null) {
                    showDataChas(data.chas, action);
                    showInputChas(num, bed);
                }
                
				$('#modal_chas').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});

    }

    function showInputChas(num, bed) {
        let html = bukaLebar('CEKLIS HARIAN AKSES SENTRAL', num);
        html += /* html */ `
            <table class="table table-sm table-borderless table-striped" style="margin-top: -15px; border: none;">
                <tr>
                    <td width="20%">Jenis Pemasangan</td>
                    <td width="1%">:</td>
                    <td width="10%"><input type="checkbox" name="chas_Pemasangan_picc" id="chas_Pemasangan_picc" value="1"> PICC</td>
                    <td width="10%"><input type="checkbox" name="chas_Pemasangan_cdl" id="chas_Pemasangan_cdl" value="1"> CDL</td>
                    <td width="10%"><input type="checkbox" name="chas_Pemasangan_cvc" id="chas_Pemasangan_cvc" value="1"> CVC</td>
                    <td width="10%"><input type="checkbox" name="chas_Pemasangan_uac" id="chas_Pemasangan_uac" value="1"> UAC</td>
                    <td width="10%"><input type="checkbox" name="chas_Pemasangan_uvc" id="chas_Pemasangan_uvc" value="1"> UVC</td>
                </tr>
                <tr>
                    <td>Jenis Kateter</td>
                    <td>:</td=>
                    <td><input type="checkbox" name="chas_kateter_premicath" id="chas_kateter_premicath" value="1"> Premicath</td>
                    <td><input type="checkbox" name="chas_kateter_nutriline" id="chas_kateter_nutriline" value="1"> Nutriline Twin Flow</td>
                    <td><input type="checkbox" name="chas_kateter_doble" id="chas_kateter_doble" value="1"> Double Lumen</td>
                    <td><input type="checkbox" name="chas_kateter_triple" id="chas_kateter_triple" value="1"> Triple Lumen</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Tanggal Pemasangan</td>
                    <td>:</td>
                    <td colspan="5"><input type="text" name="chas_tgl_pemasangan" id="chas_tgl_pemasangan" class="custom-form clear-input d-inline-block col-lg-2" placeholder="dd/mm/yyyy"></td>
                </tr>
                <tr>
                    <td>Lokasi Pemasangan Kateter</td>
                    <td>:</td>
                    <td colspan="5"><input type="text" name="chas_lokasi" id="chas_lokasi" class="custom-form clear-input d-inline-block col-lg-2"></td>
                </tr>
                <tr>
                    <td>Batas Kateter Pada kulit</td>
                    <td>:</td>
                    <td colspan="5"><input type="number" name="chas_batas" id="chas_batas" class="custom-form clear-input d-inline-block col-lg-2"> Cm</td>
                </tr>
            </table>
            <table class="table table-sm" style="margin-top: -15px">
                <thead>
                    <tr>
                        <th class="text-center" rowspan="3" width="3%">No</th>
                        <th class="text-center" rowspan="3">KETERANGAN</th>
                        <th class="text-left" colspan="6">Tanggal : <input type="text" name="chas_tgl" id="chas_tgl" class="custom-form clear-input d-inline-block col-lg-2" placeholder="dd/mm/yyyy"></th>
                    </tr>
                    <tr>
                        <th class="text-center" colspan="2">PAGI</th>
                        <th class="text-center" colspan="2">SORE</th>
                        <th class="text-center" colspan="2">MALAM</th>
                    </tr>
                    <tr>
                        <th class="text-center" width="12%">YA</th>
                        <th class="text-center" width="12%">TIDAK</th>
                        <th class="text-center" width="12%">YA</th>
                        <th class="text-center" width="12%">TIDAK</th>
                        <th class="text-center" width="12%">YA</th>
                        <th class="text-center" width="12%">TIDAK</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td rowspan="8" class="text-center"><b>1</b></td>
                        <td colspan="7"><b>KLINIS PASIEN</b></td>
                    </tr>
                    <tr>
                        <td>Alert</td>
                        <td class="text-center"><input type="radio" name="chas_alert_pagi" id="chas_alert_pagi_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_alert_pagi" id="chas_alert_pagi_tidak" value="2"></td>
                        <td class="text-center"><input type="radio" name="chas_alert_sore" id="chas_alert_sore_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_alert_sore" id="chas_alert_sore_tidak" value="2"></td>
                        <td class="text-center"><input type="radio" name="chas_alert_malam" id="chas_alert_malam_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_alert_malam" id="chas_alert_malam_tidak" value="2"></td>
                    </tr>
                    <tr>
                        <td>Verbal</td>
                        <td class="text-center"><input type="radio" name="chas_verbal_pagi" id="chas_verbal_pagi_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_verbal_pagi" id="chas_verbal_pagi_tidak" value="2"></td>
                        <td class="text-center"><input type="radio" name="chas_verbal_sore" id="chas_verbal_sore_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_verbal_sore" id="chas_verbal_sore_tidak" value="2"></td>
                        <td class="text-center"><input type="radio" name="chas_verbal_malam" id="chas_verbal_malam_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_verbal_malam" id="chas_verbal_malam_tidak" value="2"></td>
                    </tr>
                    <tr>
                        <td>Pain</td>
                        <td class="text-center"><input type="radio" name="chas_pain_pagi" id="chas_pain_pagi_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_pain_pagi" id="chas_pain_pagi_tidak" value="2"></td>
                        <td class="text-center"><input type="radio" name="chas_pain_sore" id="chas_pain_sore_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_pain_sore" id="chas_pain_sore_tidak" value="2"></td>
                        <td class="text-center"><input type="radio" name="chas_pain_malam" id="chas_pain_malam_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_pain_malam" id="chas_pain_malam_tidak" value="2"></td>
                    </tr>
                    <tr>
                        <td>Unrespon</td>
                        <td class="text-center"><input type="radio" name="chas_unrespon_pagi" id="chas_unrespon_pagi_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_unrespon_pagi" id="chas_unrespon_pagi_tidak" value="2"></td>
                        <td class="text-center"><input type="radio" name="chas_unrespon_sore" id="chas_unrespon_sore_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_unrespon_sore" id="chas_unrespon_sore_tidak" value="2"></td>
                        <td class="text-center"><input type="radio" name="chas_unrespon_malam" id="chas_unrespon_malam_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_unrespon_malam" id="chas_unrespon_malam_tidak" value="2"></td>
                    </tr>
                    <tr>
                        <td>Demam</td>
                        <td class="text-center"><input type="radio" name="chas_demam_pagi" id="chas_demam_pagi_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_demam_pagi" id="chas_demam_pagi_tidak" value="2"></td>
                        <td class="text-center"><input type="radio" name="chas_demam_sore" id="chas_demam_sore_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_demam_sore" id="chas_demam_sore_tidak" value="2"></td>
                        <td class="text-center"><input type="radio" name="chas_demam_malam" id="chas_demam_malam_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_demam_malam" id="chas_demam_malam_tidak" value="2"></td>
                    </tr>
                    <tr>
                        <td>Takikardi</td>
                        <td class="text-center"><input type="radio" name="chas_takikardi_pagi" id="chas_takikardi_pagi_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_takikardi_pagi" id="chas_takikardi_pagi_tidak" value="2"></td>
                        <td class="text-center"><input type="radio" name="chas_takikardi_sore" id="chas_takikardi_sore_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_takikardi_sore" id="chas_takikardi_sore_tidak" value="2"></td>
                        <td class="text-center"><input type="radio" name="chas_takikardi_malam" id="chas_takikardi_malam_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_takikardi_malam" id="chas_takikardi_malam_tidak" value="2"></td>
                    </tr>
                    <tr>
                        <td>Takipnoe</td>
                        <td class="text-center"><input type="radio" name="chas_takipnoe_pagi" id="chas_takipnoe_pagi_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_takipnoe_pagi" id="chas_takipnoe_pagi_tidak" value="2"></td>
                        <td class="text-center"><input type="radio" name="chas_takipnoe_sore" id="chas_takipnoe_sore_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_takipnoe_sore" id="chas_takipnoe_sore_tidak" value="2"></td>
                        <td class="text-center"><input type="radio" name="chas_takipnoe_malam" id="chas_takipnoe_malam_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_takipnoe_malam" id="chas_takipnoe_malam_tidak" value="2"></td>
                    </tr>
                    <tr>
                        <td rowspan="5" class="text-center"><b>2</b></td>
                        <td colspan="7"><b>KATETER</b></td>
                    </tr>
                    <tr>
                        <td>Kateter Tertekuk</td>
                        <td class="text-center"><input type="radio" name="chas_tertekuk_pagi" id="chas_tertekuk_pagi_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_tertekuk_pagi" id="chas_tertekuk_pagi_tidak" value="2"></td>
                        <td class="text-center"><input type="radio" name="chas_tertekuk_sore" id="chas_tertekuk_sore_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_tertekuk_sore" id="chas_tertekuk_sore_tidak" value="2"></td>
                        <td class="text-center"><input type="radio" name="chas_tertekuk_malam" id="chas_tertekuk_malam_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_tertekuk_malam" id="chas_tertekuk_malam_tidak" value="2"></td>
                    </tr>
                    <tr>
                        <td>Kateter Rembes/Bocor</td>
                        <td class="text-center"><input type="radio" name="chas_rembes_pagi" id="chas_rembes_pagi_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_rembes_pagi" id="chas_rembes_pagi_tidak" value="2"></td>
                        <td class="text-center"><input type="radio" name="chas_rembes_sore" id="chas_rembes_sore_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_rembes_sore" id="chas_rembes_sore_tidak" value="2"></td>
                        <td class="text-center"><input type="radio" name="chas_rembes_malam" id="chas_rembes_malam_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_rembes_malam" id="chas_rembes_malam_tidak" value="2"></td>
                    </tr>
                    <tr>
                        <td>Adakah Aliran Balik</td>
                        <td class="text-center"><input type="radio" name="chas_aliran_pagi" id="chas_aliran_pagi_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_aliran_pagi" id="chas_aliran_pagi_tidak" value="2"></td>
                        <td class="text-center"><input type="radio" name="chas_aliran_sore" id="chas_aliran_sore_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_aliran_sore" id="chas_aliran_sore_tidak" value="2"></td>
                        <td class="text-center"><input type="radio" name="chas_aliran_malam" id="chas_aliran_malam_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_aliran_malam" id="chas_aliran_malam_tidak" value="2"></td>
                    </tr>
                    <tr>
                        <td>Sumbatan Kateter</td>
                        <td class="text-center"><input type="radio" name="chas_sumbatan_pagi" id="chas_sumbatan_pagi_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_sumbatan_pagi" id="chas_sumbatan_pagi_tidak" value="2"></td>
                        <td class="text-center"><input type="radio" name="chas_sumbatan_sore" id="chas_sumbatan_sore_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_sumbatan_sore" id="chas_sumbatan_sore_tidak" value="2"></td>
                        <td class="text-center"><input type="radio" name="chas_sumbatan_malam" id="chas_sumbatan_malam_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_sumbatan_malam" id="chas_sumbatan_malam_tidak" value="2"></td>
                    </tr>
                    <tr>
                        <td rowspan="6" class="text-center"><b>3</b></td>
                        <td colspan="7"><b>KONDISI KULIT AREA INSERSI</b></td>
                    </tr>
                    <tr>
                        <td>Kemerahan</td>
                        <td class="text-center"><input type="radio" name="chas_kemerahan_pagi" id="chas_kemerahan_pagi_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_kemerahan_pagi" id="chas_kemerahan_pagi_tidak" value="2"></td>
                        <td class="text-center"><input type="radio" name="chas_kemerahan_sore" id="chas_kemerahan_sore_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_kemerahan_sore" id="chas_kemerahan_sore_tidak" value="2"></td>
                        <td class="text-center"><input type="radio" name="chas_kemerahan_malam" id="chas_kemerahan_malam_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_kemerahan_malam" id="chas_kemerahan_malam_tidak" value="2"></td>
                    </tr>
                    <tr>
                        <td>Bengkak</td>
                        <td class="text-center"><input type="radio" name="chas_bengkak_pagi" id="chas_bengkak_pagi_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_bengkak_pagi" id="chas_bengkak_pagi_tidak" value="2"></td>
                        <td class="text-center"><input type="radio" name="chas_bengkak_sore" id="chas_bengkak_sore_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_bengkak_sore" id="chas_bengkak_sore_tidak" value="2"></td>
                        <td class="text-center"><input type="radio" name="chas_bengkak_malam" id="chas_bengkak_malam_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_bengkak_malam" id="chas_bengkak_malam_tidak" value="2"></td>
                    </tr>
                    <tr>
                        <td>Nyeri</td>
                        <td class="text-center"><input type="radio" name="chas_nyeri_pagi" id="chas_nyeri_pagi_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_nyeri_pagi" id="chas_nyeri_pagi_tidak" value="2"></td>
                        <td class="text-center"><input type="radio" name="chas_nyeri_sore" id="chas_nyeri_sore_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_nyeri_sore" id="chas_nyeri_sore_tidak" value="2"></td>
                        <td class="text-center"><input type="radio" name="chas_nyeri_malam" id="chas_nyeri_malam_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_nyeri_malam" id="chas_nyeri_malam_tidak" value="2"></td>
                    </tr>
                    <tr>
                        <td>Vena Mengeras</td>
                        <td class="text-center"><input type="radio" name="chas_vena_pagi" id="chas_vena_pagi_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_vena_pagi" id="chas_vena_pagi_tidak" value="2"></td>
                        <td class="text-center"><input type="radio" name="chas_vena_sore" id="chas_vena_sore_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_vena_sore" id="chas_vena_sore_tidak" value="2"></td>
                        <td class="text-center"><input type="radio" name="chas_vena_malam" id="chas_vena_malam_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_vena_malam" id="chas_vena_malam_tidak" value="2"></td>
                    </tr>
                    <tr>
                        <td>Timbul Pus</td>
                        <td class="text-center"><input type="radio" name="chas_pus_pagi" id="chas_pus_pagi_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_pus_pagi" id="chas_pus_pagi_tidak" value="2"></td>
                        <td class="text-center"><input type="radio" name="chas_pus_sore" id="chas_pus_sore_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_pus_sore" id="chas_pus_sore_tidak" value="2"></td>
                        <td class="text-center"><input type="radio" name="chas_pus_malam" id="chas_pus_malam_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_pus_malam" id="chas_pus_malam_tidak" value="2"></td>
                    </tr>
                    <tr>
                        <td rowspan="5" class="text-center"><b>4</b></td>
                        <td colspan="7"><b>DRESSING</b></td>
                    </tr>
                    <tr>
                        <td>Terfikasi Baik</td>
                        <td class="text-center"><input type="radio" name="chas_terfikasi_pagi" id="chas_terfikasi_pagi_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_terfikasi_pagi" id="chas_terfikasi_pagi_tidak" value="2"></td>
                        <td class="text-center"><input type="radio" name="chas_terfikasi_sore" id="chas_terfikasi_sore_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_terfikasi_sore" id="chas_terfikasi_sore_tidak" value="2"></td>
                        <td class="text-center"><input type="radio" name="chas_terfikasi_malam" id="chas_terfikasi_malam_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_terfikasi_malam" id="chas_terfikasi_malam_tidak" value="2"></td>
                    </tr>
                    <tr>
                        <td>Darah</td>
                        <td class="text-center"><input type="radio" name="chas_darah_pagi" id="chas_darah_pagi_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_darah_pagi" id="chas_darah_pagi_tidak" value="2"></td>
                        <td class="text-center"><input type="radio" name="chas_darah_sore" id="chas_darah_sore_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_darah_sore" id="chas_darah_sore_tidak" value="2"></td>
                        <td class="text-center"><input type="radio" name="chas_darah_malam" id="chas_darah_malam_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_darah_malam" id="chas_darah_malam_tidak" value="2"></td>
                    </tr>
                    <tr>
                        <td>Kotor</td>
                        <td class="text-center"><input type="radio" name="chas_kotor_pagi" id="chas_kotor_pagi_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_kotor_pagi" id="chas_kotor_pagi_tidak" value="2"></td>
                        <td class="text-center"><input type="radio" name="chas_kotor_sore" id="chas_kotor_sore_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_kotor_sore" id="chas_kotor_sore_tidak" value="2"></td>
                        <td class="text-center"><input type="radio" name="chas_kotor_malam" id="chas_kotor_malam_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_kotor_malam" id="chas_kotor_malam_tidak" value="2"></td>
                    </tr>
                    <tr>
                        <td>Basah</td>
                        <td class="text-center"><input type="radio" name="chas_basah_pagi" id="chas_basah_pagi_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_basah_pagi" id="chas_basah_pagi_tidak" value="2"></td>
                        <td class="text-center"><input type="radio" name="chas_basah_sore" id="chas_basah_sore_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_basah_sore" id="chas_basah_sore_tidak" value="2"></td>
                        <td class="text-center"><input type="radio" name="chas_basah_malam" id="chas_basah_malam_ya" value="1"></td>
                        <td class="text-center"><input type="radio" name="chas_basah_malam" id="chas_basah_malam_tidak" value="2"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>TINDAKAN</b></td>
                        <td colspan="2"><textarea name="chas_tindakan_pagi" id="chas_tindakan_pagi" class="form-control"></textarea></td>
                        <td colspan="2"><textarea name="chas_tindakan_sore" id="chas_tindakan_sore" class="form-control"></textarea></td>
                        <td colspan="2"><textarea name="chas_tindakan_malam" id="chas_tindakan_malam" class="form-control"></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>Nama Perawat</b></td>
                        <td colspan="2"><input type="text" name="chas_perawat_pagi" id="chas_perawat_pagi" class="select2c-input"></td>
                        <td colspan="2"><input type="text" name="chas_perawat_sore" id="chas_perawat_sore" class="select2c-input"></td>
                        <td colspan="2"><input type="text" name="chas_perawat_malam" id="chas_perawat_malam" class="select2c-input"></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="8" class="ml-2">
                            <button type="button" title="Tambah Data" class="btn btn-info" onclick="tambahChas()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah Data</button>
                        </td>
                    </tr>
                </tfoot>
                
            </table>
        `;
        html += tutupRapet();
        $('#chas_buka_tutup').append(html);
    }

    function showDataChas(data, action) {
        if (data !== null) {
            $.each(data, function(i, v) {
                $('#chas_id').val(v.id);
                let alatAction = '';
                if (action !== 'lihat') {
                    alatAction = `
                        <td align="center">
                            <button type="button" class="btn btn-secondary btn-xs" onclick="detailChas(${v.id}, ${v.id_pendaftaran}, ${v.id_layanan_pendaftaran})">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button type="button" class="btn btn-secondary btn-xs" onclick="editChas(${v.id}, ${v.id_pendaftaran}, ${v.id_layanan_pendaftaran})">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button type="button" class="btn btn-secondary btn-xs" onclick="hapusCHas(${v.id})">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    `;
                }
                if (action === 'lihat') {
                    alatAction = `
                        <td align="center">
                            <button type="button" class="btn btn-secondary btn-xs" onclick="detailChas(${v.id}, ${v.id_pendaftaran}, ${v.id_layanan_pendaftaran})">
                                <i class="fas fa-eye"></i>
                            </button>
                        </td>
                    `;
                }

                let html = `
                    <tr>
                        <td class="number-pemantauan" align="center">${i + 1}</td>
                        <td align="center">${v.chas_tgl ? datefmysql(v.chas_tgl) : ''}</td>
                        <td align="center">${v.chas_nama_perawat_pagi ?? ''}</td>
                        <td align="center">${v.chas_nama_perawat_sore ?? ''}</td>
                        <td align="center">${v.chas_nama_perawat_malam ?? ''}</td>
                        <td align="center">${v.nama_user ?? ''}</td>
                        ${alatAction}
                    </tr>
                `;
                $('#table_chas .body-table').append(html);
            });
        }
    }

    function detailChas(id, id_pendaftaran, id_layanan) {
        $.ajax({
			type: 'GET',
            url: '<?= base_url("form_rekam_medis/api/entri_keperawatan/get_detail_chas") ?>/' + id + '/' + id_pendaftaran + '/' + id_layanan,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {

                let chas = data.chas_detail;
                console.log(chas.chas_lokasi);
                if (chas !== null) {
                    $('#detail_chas_id').val(chas.id);
                    $('#detail_chas_id_pendaftaran').val(chas.id_pendaftaran);
                    $('#detail_chas_id_layanan_pendaftaran').val(chas.id_layanan_pendaftaran);

                    $('#detail_chas_tgl').text(chas.chas_tgl !== null ? datefmysql(chas.chas_tgl) : '');
                    $('#detail_chas_tgl_pemasangan').text(chas.chas_tgl_pemasangan !== null ? datefmysql(chas.chas_tgl_pemasangan) : '');
                    $('#detail_chas_lokasi').text(chas.chas_lokasi);
                    $('#detail_chas_batas').text(chas.chas_batas);
                    
                    // checkbox
                    if (chas.chas_Pemasangan_picc == '1') {
                        $(`#detail_chas_Pemasangan_picc`).text('✓ PICC');
                    } else {
                        $(`#detail_chas_Pemasangan_picc`).text('- PICC');
                    }
                    
                    if (chas.chas_Pemasangan_cdl == '1') {
                        $(`#detail_chas_Pemasangan_cdl`).text('✓ CDL');
                    } else {
                        $(`#detail_chas_Pemasangan_cdl`).text('- CDL');
                    }

                    if (chas.chas_Pemasangan_cvc == '1') {
                        $(`#detail_chas_Pemasangan_cvc`).text('✓ CVC');
                    } else {
                        $(`#detail_chas_Pemasangan_cvc`).text('- CVC');
                    }

                    if (chas.chas_Pemasangan_uac == '1') {
                        $(`#detail_chas_Pemasangan_uac`).text('✓ UAC');
                    } else {
                        $(`#detail_chas_Pemasangan_uac`).text('- UAV');
                    }

                    if (chas.chas_Pemasangan_uvc == '1') {
                        $(`#detail_chas_Pemasangan_uvc`).text('✓ UVC');
                    } else {
                        $(`#detail_chas_Pemasangan_uvc`).text('- UVC');
                    }

                    if (chas.chas_kateter_premicath == '1') {
                        $(`#detail_chas_kateter_premicath`).text('✓ Premicath');
                    } else {
                        $(`#detail_chas_kateter_premicath`).text('- Premicath');
                    }
                    
                    if (chas.chas_kateter_nutriline == '1') {
                        $(`#detail_chas_kateter_nutriline`).text('✓ Nutriline Twin Flow');
                    } else {
                        $(`#detail_chas_kateter_nutriline`).text('- Nutriline Twin Flow');
                    }

                    if (chas.chas_kateter_doble == '1') {
                        $(`#detail_chas_kateter_doble`).text('✓ Double Lumen');
                    } else {
                        $(`#detail_chas_kateter_doble`).text('- Double Lumen');
                    }

                    if (chas.chas_kateter_triple == '1') {
                        $(`#detail_chas_kateter_triple`).text('✓ Triple Lumen');
                    } else {
                        $(`#detail_chas_kateter_triple`).text('- Triple Lumen');
                    }

                    // Radio
                    const times = ['pagi', 'sore', 'malam'];
                    const fields = ['alert', 'verbal', 'pain', 'unrespon', 'demam', 'takikardi', 'takipnoe', 'tertekuk', 'rembes', 'aliran', 'sumbatan', 'kemerahan', 'bengkak', 'nyeri', 'vena', 'pus', 'terfikasi', 'darah', 'kotor'];
                    
                    times.forEach(time => {
                        fields.forEach(field => {
                            let value = chas[`chas_${field}_${time}`];
                            if (value == '1') {
                                $(`#detail_chas_${field}_${time}_ya`).text('✓');
                                $(`#detail_chas_${field}_${time}_tidak`).text('');
                            } else if (value == '2') {
                                $(`#detail_chas_${field}_${time}_ya`).text('');
                                $(`#detail_chas_${field}_${time}_tidak`).text('✓');
                            }
                        });
                    });

                    $('#detail_chas_tindakan_pagi').text(chas.chas_tindakan_pagi !== null ? chas.chas_tindakan_pagi : '');
                    $('#detail_chas_tindakan_sore').text(chas.chas_tindakan_sore !== null ? chas.chas_tindakan_sore : '');
                    $('#detail_chas_tindakan_malam').text(chas.chas_tindakan_malam !== null ? chas.chas_tindakan_malam : '');

                    $('#detail_chas_perawat_pagi').text(chas.chas_nama_perawat_pagi !== null ? chas.chas_nama_perawat_pagi : '');
                    $('#detail_chas_perawat_sore').text(chas.chas_nama_perawat_sore !== null ? chas.chas_nama_perawat_sore : '');
                    $('#detail_chas_perawat_malam').text(chas.chas_nama_perawat_malam !== null ? chas.chas_nama_perawat_malam : '');

                }
                
				$('#modal_detail_chas').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});

    }

    function editChas(id, id_pendaftaran, id_layanan) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url("form_rekam_medis/api/entri_keperawatan/get_detail_chas") ?>/' + id + '/' + id_pendaftaran + '/' + id_layanan,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();  // Show loader before the request
            },
            success: function(data) {
                resetEditChas();  // Reset the form

                let chas = data.chas_detail;
                if (chas !== null) {
                    // Set the CHAS details
                    $('#edit_chas_id').val(chas.id);
                    $('#edit_chas_id_pendaftaran').val(chas.id_pendaftaran);
                    $('#edit_chas_id_layanan_pendaftaran').val(chas.id_layanan_pendaftaran);
                    $('#edit_chas_tgl').val(chas.chas_tgl !== null ? datefmysql(chas.chas_tgl) : '');

                    $('#edit_chas_tgl_pemasangan').val(chas.chas_tgl_pemasangan !== null ? datefmysql(chas.chas_tgl_pemasangan) : '');
                    $('#edit_chas_lokasi').val(chas.chas_lokasi);
                    $('#edit_chas_batas').val(chas.chas_batas);
                    // Check for Pemasangan fields
                    const pemasanganFields = ['picc', 'cdl', 'cvc', 'uac', 'uvc'];
                    pemasanganFields.forEach(field => {
                        if (chas[`chas_Pemasangan_${field}`] === '1') {
                            $(`#edit_chas_Pemasangan_${field}`).prop('checked', true);
                        } else {
                            $(`#edit_chas_Pemasangan_${field}`).prop('checked', false);
                        }
                    });

                     // Check for kateter fields
                    const kateterFields = ['premicath', 'nutriline', 'doble', 'triple'];
                    kateterFields.forEach(field => {
                        if (chas[`chas_kateter_${field}`] === '1') {
                            $(`#edit_chas_kateter_${field}`).prop('checked', true);
                        } else {
                            $(`#edit_chas_kateter_${field}`).prop('checked', false);
                        }
                    });

                    // Define the times and fields
                    const times = ['pagi', 'sore', 'malam'];
                    const fields = ['alert', 'verbal', 'pain', 'unrespon', 'demam', 'takikardi', 'takipnoe', 'tertekuk', 'rembes', 'aliran', 'sumbatan', 'kemerahan', 'bengkak', 'nyeri', 'vena', 'pus', 'terfikasi', 'darah', 'kotor', 'basah'];

                    // Iterate over each time and field to set the checkbox values
                    fields.forEach(field => {
                        times.forEach(time => {
                            let value = chas[`chas_${field}_${time}`];
                            if (value === '1') {
                                $(`#edit_chas_${field}_${time}_ya`).prop('checked', true);
                                $(`#edit_chas_${field}_${time}_tidak`).prop('checked', false);
                            } else if (value === '2') {
                                $(`#edit_chas_${field}_${time}_ya`).prop('checked', false);
                                $(`#edit_chas_${field}_${time}_tidak`).prop('checked', true);
                            } else {
                                $(`#edit_chas_${field}_${time}_ya`).prop('checked', false);
                                $(`#edit_chas_${field}_${time}_tidak`).prop('checked', false);
                            }
                        });
                    });

                    // Set tindakan fields
                    $('#edit_chas_tindakan_pagi').text(chas.chas_tindakan_pagi !== null ? chas.chas_tindakan_pagi : '');
                    $('#edit_chas_tindakan_sore').text(chas.chas_tindakan_sore !== null ? chas.chas_tindakan_sore : '');
                    $('#edit_chas_tindakan_malam').text(chas.chas_tindakan_malam !== null ? chas.chas_tindakan_malam : '');

                    // Set perawat fields
                    $('#edit_chas_perawat_pagi').val(chas.chas_perawat_pagi !== null ? chas.chas_perawat_pagi : '');
                    $('#edit_chas_perawat_sore').val(chas.chas_perawat_sore !== null ? chas.chas_perawat_sore : '');
                    $('#edit_chas_perawat_malam').val(chas.chas_perawat_malam !== null ? chas.chas_perawat_malam : '');

                    // Update Select2 fields with chosen values
                    $('#s2id_edit_chas_perawat_pagi a .select2c-chosen').html(chas.chas_nama_perawat_pagi);
                    $('#s2id_edit_chas_perawat_sore a .select2c-chosen').html(chas.chas_nama_perawat_sore);
                    $('#s2id_edit_chas_perawat_malam a .select2c-chosen').html(chas.chas_nama_perawat_malam);
                }

                // Show the modal
                $('#modal_edit_chas').modal('show');
            },
            complete: function() {
                hideLoader();  // Hide loader after the request
            },
            error: function(e) {
                accessFailed(e.status);  // Handle errors
            }
        });
    }


    function bukaLebar(title, num) {
        let html = /* html */ `
            <div class="accordion">
                <div class="card">
                    <div class="card-header" id="heading-${num}">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse-${num}" aria-expanded="false" aria-controls="collapse-${num}">
                                ${title}
                            </button>
                        </h2>
                    </div>
                    <div id="collapse-${num}" class="collapse" aria-labelledby="heading-${num}">
                        <div class="card-body">       
        `;

        return html;
    }

    function tutupRapet() {
        let html = /* html */ `
                        </div>
                    </div>
                </div>
            </div>
        `;

        return html;
    }

    function tambahChas() {
        if ($('#chas_tgl_pemasangan').val() === '') {
            syams_validation('#chas_tgl_pemasangan', 'Tanggal harus diisi.');
            return false;
        } else {
            syams_validation_remove('#chas_tgl_pemasangan');
        }

        if ($('#chas_tgl').val() === '') {
            syams_validation('#chas_tgl', 'Tanggal harus diisi.');
            return false;
        } else {
            syams_validation_remove('#chas_tgl');
        }

        let chas_Pemasangan_picc = $('#chas_Pemasangan_picc').is(':checked');
        let chas_Pemasangan_cdl = $('#chas_Pemasangan_cdl').is(':checked');
        let chas_Pemasangan_cvc = $('#chas_Pemasangan_cvc').is(':checked');
        let chas_Pemasangan_uac = $('#chas_Pemasangan_uac').is(':checked');
        let chas_Pemasangan_uvc = $('#chas_Pemasangan_uvc').is(':checked');
        let chas_kateter_premicath = $('#chas_kateter_premicath').is(':checked');
        let chas_kateter_nutriline = $('#chas_kateter_nutriline').is(':checked');
        let chas_kateter_doble = $('#chas_kateter_doble').is(':checked');
        let chas_kateter_triple = $('#chas_kateter_triple').is(':checked');

        let chas_tgl_pemasangan = $('#chas_tgl_pemasangan').val();
        let chas_lokasi = $('#chas_lokasi').val();
        let chas_batas = $('#chas_batas').val();

        let chas_tgl = $('#chas_tgl').val();

        const chas_fields = [
            'alert', 'verbal', 'pain', 'unrespon', 'demam',
            'takikardi', 'takipnoe', 'tertekuk', 'rembes',
            'aliran', 'sumbatan', 'kemerahan', 'bengkak',
            'nyeri', 'vena', 'pus', 'terfikasi', 'darah',
            'kotor', 'basah'
        ];

        let chas_data = {};

        chas_fields.forEach(field => {
            chas_data[`${field}_pagi`] = $(`input[name="chas_${field}_pagi"]:checked`).val() || null;
            chas_data[`${field}_sore`] = $(`input[name="chas_${field}_sore"]:checked`).val() || null;
            chas_data[`${field}_malam`] = $(`input[name="chas_${field}_malam"]:checked`).val() || null;
        });

        let chas_tindakan_pagi = $('#chas_tindakan_pagi').val() || null;
        let chas_tindakan_sore = $('#chas_tindakan_sore').val() || null;
        let chas_tindakan_malam = $('#chas_tindakan_malam').val() || null;

        let nama_chas_perawat_pagi = $('#s2id_chas_perawat_pagi a .select2c-chosen').html() || null;
        let chas_perawat_pagi = $('#chas_perawat_pagi').val() || null;
        let nama_chas_perawat_sore = $('#s2id_chas_perawat_sore a .select2c-chosen').html() || null;
        let chas_perawat_sore = $('#chas_perawat_sore').val() || null;
        let nama_chas_perawat_malam = $('#s2id_chas_perawat_malam a .select2c-chosen').html() || null;
        let chas_perawat_malam = $('#chas_perawat_malam').val() || null;

        numberTable++;

        let html = `
            <tr>
                <td class="number-pemantauan" align="center">${numberTable}</td>
                <td align="center">${chas_tgl}</td>
                <td align="center">${nama_chas_perawat_pagi}</td>
                <td align="center">${nama_chas_perawat_sore}</td>
                <td align="center">${nama_chas_perawat_malam}</td>
                <td align="center"><?= $this->session->userdata('nama') ?></td>
                <td align="center">
                    <button type="button" class="btn btn-secondary btn-xxs" onclick="removeRow(this)"><i class="fas fa-trash-alt"></i></button>
                </td>
                <input type="hidden" name="chas_tgl_pemasangan[]" value="${chas_tgl_pemasangan}">
                <input type="hidden" name="chas_lokasi[]" value="${chas_lokasi}">
                <input type="hidden" name="chas_batas[]" value="${chas_batas}">
                <input type="hidden" name="chas_tgl[]" value="${chas_tgl}">
        `;

        chas_fields.forEach(field => {
            html += `
                <input type="hidden" name="chas_${field}_pagi[]" value="${chas_data[`${field}_pagi`]}">
                <input type="hidden" name="chas_${field}_sore[]" value="${chas_data[`${field}_sore`]}">
                <input type="hidden" name="chas_${field}_malam[]" value="${chas_data[`${field}_malam`]}">
            `;
        });

        html += `
            <input type="hidden" name="chas_Pemasangan_picc[]" value="${chas_Pemasangan_picc ? 1 : 2}">
            <input type="hidden" name="chas_Pemasangan_cdl[]" value="${chas_Pemasangan_cdl ? 1 : 2}">
            <input type="hidden" name="chas_Pemasangan_uac[]" value="${chas_Pemasangan_uac ? 1 : 2}">
            <input type="hidden" name="chas_Pemasangan_cvc[]" value="${chas_Pemasangan_cvc ? 1 : 2}">
            <input type="hidden" name="chas_Pemasangan_uvc[]" value="${chas_Pemasangan_uvc ? 1 : 2}">
            <input type="hidden" name="chas_kateter_premicath[]" value="${chas_kateter_premicath ? 1 : 2}">
            <input type="hidden" name="chas_kateter_nutriline[]" value="${chas_kateter_nutriline ? 1 : 2}">
            <input type="hidden" name="chas_kateter_doble[]" value="${chas_kateter_doble ? 1 : 2}">
            <input type="hidden" name="chas_kateter_triple[]" value="${chas_kateter_triple ? 1 : 2}">

            <input type="hidden" name="chas_tindakan_pagi[]" value="${chas_tindakan_pagi}">
            <input type="hidden" name="chas_tindakan_sore[]" value="${chas_tindakan_sore}">
            <input type="hidden" name="chas_tindakan_malam[]" value="${chas_tindakan_malam}">
            <input type="hidden" name="chas_perawat_pagi[]" value="${chas_perawat_pagi}">
            <input type="hidden" name="chas_perawat_sore[]" value="${chas_perawat_sore}">
            <input type="hidden" name="chas_perawat_malam[]" value="${chas_perawat_malam}">
            <input type="hidden" name="id_user[]" value="<?= $this->session->userdata("id_translucent") ?>">
            </tr>
        `;

        $('#table_chas .body-table').append(html);
        $('input[type="radio"][name^="chas_"]').prop('checked', false);
        $('input[type="checkbox"][name^="chas_"]').prop('checked', false);
        $('input[type="text"][name^="chas_"], #chas_tindakan_pagi, #chas_tindakan_sore, #chas_tindakan_malam').html('').val('');
    }

    function removeRow(el) {
        $(el).closest('tr').remove();
        updateRowNumbers();
    }

    function updateRowNumbers() {
        $('#table_chas .body-table .number-pemantauan').each(function(index) {
            $(this).text(index + 1);
        });
        numberTable = $('#table_chas .body-table tr').length;
    }

    function konfirmasiSimpanEntriChas() {
        var stop = false;
        swal.fire({
            title: 'Simpan Entri Keperawatan',
            text: "Apakah anda yakin akan menyimpan form ini?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-fw fa-save mr-1"></i>Simpan',
            cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                simpanEntriChas();
            }
        })
    }

    function simpanEntriChas() {
        var id_layanan_pendaftaran = $('#chas_id_layanan_pendaftaran').val();
        var id_pendaftaran = $('#chas_id_pendaftaran').val();
        var id_pasien = $('#chas_id_pasien').val();

        $.ajax({
            type: 'POST',
            url: '<?= base_url("form_rekam_medis/api/entri_keperawatan/simpan_chas") ?>',
            data: $('#form_chas').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.respon) {
                    if (data.respon.show) {
                        if (data.respon.status === false) {
                            bootbox.dialog({
                                message: data.respon.message,
                                title: "Penyimpanan Data Gagal",
                                buttons: {
                                    batal: {
                                        label: '<i class="fas fa-times-circle"></i> Close',
                                        className: "btn-danger",
                                    }
                                }
                            });
                            return;
                        }
                    }
                } else {
                    $('input[name=csrf_syam]').val(data.token);
                    if (data.status) {
                        messageAddSuccess();
                        $('#modal_chas').modal('hide');
                        resetChas();
                        showListForm(id_pendaftaran, id_layanan_pendaftaran, id_pasien);
                    } else {
                        messageAddFailed();
                    }
                }
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageAddFailed();
            }
        });
    }

    function updateChas() {
        var id_layanan_pendaftaran = $('#chas_id_layanan_pendaftaran').val();
        var id_pendaftaran = $('#chas_id_pendaftaran').val();
        var bed = $('#chas_bed').val();

        $.ajax({
            type: 'PUT',
            url: '<?= base_url("form_rekam_medis/api/entri_keperawatan/update_chas") ?>',
            data: $('#form_edit_chas').serialize(),
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                if (data.status) {
                    messageEditSuccess();
                    entriChas(id_pendaftaran, id_layanan_pendaftaran, bed);
                } else {
                    messageEditFailed();
                }

                $('#modal_edit_chas').modal('hide');
            },
            error: function(e) {
                messageEditFailed();
            }
        });
    }

    function hapusCHas(id) {
        var id_layanan_pendaftaran = $('#chas_id_layanan_pendaftaran').val();
        var id_pendaftaran = $('#chas_id_pendaftaran').val();
        var bed = $('#chas_bed').val();

        // console.log(id);
        // console.log(id_pendaftaran);
        // console.log(id_layanan_pendaftaran);
        // console.log(bed);
        
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
                            type: 'DELETE',
                            url: '<?= base_url("form_rekam_medis/api/entri_keperawatan/hapus_chas") ?>/' + id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                if (data.status) {
                                    messageEditSuccess();
                                    entriChas(id_pendaftaran, id_layanan_pendaftaran, bed);
                                } else {
                                    messageEditFailed();
                                }
                            },
                            error: function(e) {
                                messageDeleteFailed();
                            }
                        });
                    }
                }
            }
        });
    }

    function cekDateTime(id, form) {
        // ekspresi reguler untuk mencocokkan format tanggal yang dibutuhkan

        re = /^(\d{1,2})[-\/](\d{1,2})[-\/](\d{4})$/;
        if (form != '') {

            if (regs = form.match(re)) {
                // nilai hari antara 1 s.d 31
                if (regs[1] < 1 || regs[1] > 31) {
                    alert("Nilai tidak valid untuk hari: " + regs[1]);
                    syams_validation(id, 'Format Tanggal tidak sesuai');
                    return false;
                }
                // nilai bulan antara 1 s.d 12
                if (regs[2] < 1 || regs[2] > 12) {
                    alert("Nilai tidak valid untuk bulan: " + regs[2]);
                    syams_validation(id, 'Format Tanggal tidak sesuai');
                    return false;
                }
                // nilai tahun antara 2000 s.d sekarang
                if (regs[3] < ((new Date()).getFullYear()) - 1 || regs[3] > ((new Date()).getFullYear()) + 1) {
                    alert("Nilai tidak valid untuk tahun: " + regs[3] + " - harus antara " + (((new Date()).getFullYear()) -
                        1) + " dan " + (((new Date()).getFullYear()) + 1));
                    syams_validation(id, 'Format Tanggal tidak sesuai');
                    return false;
                }

            } else {

                syams_validation(id, 'Format Tanggal tidak sesuai');
                return false;

            }
        }

    }

</script>