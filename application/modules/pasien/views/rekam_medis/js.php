<script>
	var numeroo = 1;
	var dWidth = $(window).width();
	var dHeight = $(window).height();
	var x = screen.width / 2 - dWidth / 2;
	var y = screen.height / 2 - dHeight / 2;

	$(function() {	
		$('#rmb-layanan').val('');	
		$('#rmb-layanan').change(function() {
			riwayatRekamMedisPasienBaru(1, $('#rmb-layanan').val());
		});
	});
	
	function reloadDataRMB() {
		$('#rmb-layanan').val('');
        riwayatRekamMedisPasienBaru(1);
    }
			
	function riwayatRekamMedisPasienBaru(p, type = null) {
        p <= 0 ? p=1 : p=p;
        $('#page_now_rmb').val(p); 
		$('#rmb-layanan').val('');

		let no_rm = '';		
		if($('#id-pasien').val() === ''){
			no_rm = $('#id-x-pasien').val();
		} else if ($('#id-pasien').val() === undefined) {
			no_rm = $('#id-x-pasien').val();	    	
		} else {
	    	no_rm = $('#id-pasien').val();	    
	    }

	    $.ajax({
			type: 'GET',
			url: '<?= base_url("rekam_medis/api/rekam_medis/get_data_pasien_baru") ?>/page/' + p + '/id/' + no_rm + '/type/' + type,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				$('#table_rmb tbody').empty();				
		        $('#rmb-layanan').val(type);
                $('#pagination_rmb').html(pagination_rmb(data.jumlah, data.limit, data.page, 1));
                $('#summary_rmb').html(page_summary(data.jumlah, data.kunjungan.length, data.limit, data.page));

                if (data.jumlah > 0) {
                    showDataPasienRmb(data.pasien);
                    showDataRiwayatKunjunganRmb(data.kunjungan, data.pasien, data.page, data.limit  );
                    $('#modal-rekam-medis').modal('show');
                } else {
                    messageCustom('Data tidak ada!', 'Info');
                }
                        
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				messageCustom('Akses data Gagal', 'Error');
			}
		});
	}

    function showDataPasienRmb(pasien) {
		let kelamin = '';
        let alamat  = pasien.alamat;
		pasien.kelamin == 'L' ? kelamin = 'Laki - laki' : kelamin = 'Perempuan';
		pasien.tanggal_lahir !== null ? umur = hitungUmur(pasien.tanggal_lahir) + ' (' + datefmysql(pasien.tanggal_lahir) + ')' : "";
        pasien.nama_kel  !== null ? alamat += ', Kel. '+pasien.nama_kel : '';
        pasien.nama_kec  !== null ? alamat += ', Kec. '+pasien.nama_kec : '';
        pasien.nama_kab  !== null ? alamat += ', Kab. '+pasien.nama_kab : '';
        pasien.nama_prop !== null ? alamat += ', Prop. '+pasien.nama_prop : '';

        $('#rmb-id-pasien').html(pasien.id);
        $('#rmb-nama-pasien').html(pasien.nama);
        $('#rmb-umur').html(umur);
        $('#rmb-kelamin').html(kelamin);
        $('#rmb-alamat').html(alamat);
	}


    function showDataRiwayatKunjunganRmb(kunjungan, pasien, page, limit) {
        let tableContent = '';
        $('#table_rmb tbody').empty();

        pasien.tanggal_lahir !== null ? umur = hitungUmur(pasien.tanggal_lahir) + ' (' + datefmysql(pasien.tanggal_lahir) + ')' : "";
        $('#detail-pasien').html('<b>Pasien :</b>   ' + pasien.id +' / '+ pasien.nama +' / '+ umur);
        

        $.each(kunjungan, function(i, v) {
            let no = ((i + 1) + ((page - 1) * limit));
            let tanggal = `Masuk:<br>${v.tanggal_daftar || ''}<br><br>Keluar:<br>${v.tanggal_keluar || 'Belum keluar'}`;
            let layanan   = '';
            let penunjang = '';
            let resep     = '';
            let soap      = '';

            $.each(v.layanan, function(i2, v2) {
                // LAYANAN
                let diagnosaList = v2.diagnosa.map((v3, i3) => `<br>${i3 + 1}. ${v3.diagnosa} [${v3.prioritas}]`).join('');
                let tindakanList = v2.tindakan.map((v3, i3) => `<br>${i3 + 1}. ${v3.item}`).join('');
                let operasiList  = v2.operasi.map((v3, i3) => `<br>${i3 + 1}. ${v3.tindakan}`).join('');
                let vkList       = v2.vk.map((v3, i3) => `<br>${i3 + 1}. ${v3.tindakan}`).join('');
                let btnAnamnesa  = `<button type="button" class="btn btn-info btn-xxs m-l-5" onclick="getAnamnesa('${v2.id}')"><i class="fas fa-eye m-r-5"></i> Detail</button>`;    
                let btnTandaVital= `<button type="button" class="btn btn-info btn-xxs m-l-5" onclick="getTandaVital('${v.id}','${v2.id}')"><i class="fas fa-fw fa-print m-r-5"></i> Cetak</button>`;                   

                layanan += `<b>${v2.ruang}</b> - ${v2.dokter}<br>`;
                v2.jenis_layanan == 'Poliklinik' ? layanan += `<b>Anamnesa:</b> ${btnAnamnesa}<br>` : '';
                v2.jenis_layanan == 'Rawat Inap' ? layanan += `<b>Tanda Vital:</b> ${btnTandaVital}<br>` : '';
                diagnosaList != '' ? layanan += `<b>Diagnosa:</b> ${diagnosaList}<br>` : '' ;
                tindakanList != '' ? layanan += `<b>Tindakan:</b> ${tindakanList}<br>` : '' ;
                operasiList != ''  ? layanan += `<b>Operasi:</b> ${operasiList}<br>` : '' ;
                vkList != ''       ? layanan += `<b>VK:</b> ${vkList}<br>` : '' ;
                layanan != ''      ? layanan += `<br>` : '' ;
                
                // PENUNJANG
                let labList = v2.laboratorium.map((v3, i3) => {
                    let btnLab = `<button type="button" class="btn btn-info btn-xxs m-l-5" onclick="cetakHasilLab('${v3.kode}')"><i class="fas fa-eye m-r-5"></i>${v3.kode}</button>`;
                    let labListDetail = v3.order.map((v4) => `<br><span style="padding-left: 20px;"> - ${v4.tindakan}</span>`).join('');
                    return `${i3 + 1}. ${v3.waktu_konfirm} ${btnLab} ${labListDetail}<br>`;
                }).join('');

                let radList = v2.radiologi.map((v3, i3) => {
                    let btnRad = `<button type="button" class="btn btn-info btn-xxs m-l-5" onclick="cetakHasilRad('${v3.id}')"><i class="fas fa-eye m-r-5"></i>${v3.kode}</button>`;
                    let btnPacs = `<button type="button" class="btn btn-info btn-xxs m-l-5" onclick="viewPacs('${v3.accessnumber}', '${v3.id_rad_detail}')"><i class="fas fa-history m-r-5"></i>PACS</button>`;
                    let radListDetail = v3.order.map((v4) => `<br><span style="padding-left: 20px;"> - ${v4.tindakan}</span>`).join('');
                    return `${i3 + 1}. ${v3.waktu_konfirm} ${btnRad} ${btnPacs} ${radListDetail}<br>`;
                }).join('');                
                
                if (labList && radList) {
                    penunjang += `<b>${v2.ruang}<br>Laboratorium:</b><br>${labList}`;
                    penunjang += `<b>Radiologi:</b><br>${radList}<br>`;
                } else if (labList) {
                    penunjang += `<b>${v2.ruang}<br>Laboratorium:</b><br>${labList}<br>`;
                } else if (radList) {
                    penunjang += `<b>${v2.ruang}<br>Radiologi:</b><br>${radList}<br>`;
                }

                // RESEP
                let resepList = v2.resep.map((v3, i3) => `<br>${i3 + 1}. ${v3.nama_obat}<br>  <span style="padding-left: 20px;">${v3.aturan_pakai} (${v3.dosis}) - Qty: ${v3.qty}</span>`).join('');
                resepList != '' ? resep += `<b>${v2.ruang}</b>${resepList}<br>` : '' ;                
                resep != ''     ? resep += `<br>` : '' ;

                // SOAP
                let soapList = v2.soap.map((v3, i3) => {
                    const s_soap = v3.s_soap || '-';
                    const o_soap = v3.o_soap || '-';
                    const a_soap = v3.a_soap || '-';
                    const p_soap = v3.p_soap || '-';
                    const usul_tindak_lanjut = v3.usul_tindak_lanjut || '-';
                    if (s_soap === '-' && o_soap === '-' && a_soap === '-' && p_soap === '-' ) {
                        return '';
                    }
                    return `<b>Subjective:</b><br>${s_soap}<br><b>Objective:</b><br>${o_soap}<br><b>Assessment:</b><br>${a_soap}<br><b>Plan:</b><br>${p_soap}<br><b>Usul:</b><br>${usul_tindak_lanjut}<br>`;
                }).filter(entry => entry !== '').join('');

                let sbarList = v2.sbar.map((v3, i3) => {
                    const s_sbar = v3.s_sbar || '-';
                    const b_sbar = v3.b_sbar || '-';
                    const a_sbar = v3.a_sbar || '-';
                    const r_sbar = v3.r_sbar || '-';
                    if (s_sbar === '-' && b_sbar === '-' && a_sbar === '-' && r_sbar === '-') {
                        return '';
                    }
                    return `<b>Situation:</b><br>${s_sbar}<br><b>Background:</b><br>${b_sbar}<br><b>Assessment:</b><br>${a_sbar}<br><b>Recommendation:</b><br>${r_sbar}<br>`;
                }).filter(entry => entry !== '').join('');

                if (soapList && sbarList) {
                    soap += `<b>${v2.ruang}<br>SOAP</b><br>${soapList}`;
                    soap += `<b>SBAR</b><br>${sbarList}<br>`;
                } else if (soapList) {
                    soap += `<b>${v2.ruang}<br>SOAP</b><br>${soapList}<br>`;
                } else if (sbarList) {
                    soap += `<b>${v2.ruang}<br>SBAR</b><br>${sbarList}<br>`;
                }

            });

            tableContent += `
                <tr>
                    <td align="center">${no}</td>
                    <td align="left">${tanggal}</td>
                    <td align="left">${layanan}</td>
                    <td align="left">${penunjang}</td>
                    <td align="left">${resep}</td>
                    <td align="left">${soap}</td>
                </tr>`;
        });

        $('#table_rmb tbody').append(tableContent);
    }

    function cetakHasilLab(kode) {
		var ono = $('#no-ono').val();
		window.open('<?php echo base_url() ?>hasil_laboratorium/cetak_pdf_laboratorium/' + kode,
			'Cetak PDF Hasil Laboratorium', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ',top=' + y);		
	}

    function cetakHasilRad(id) {
		window.open('<?php echo base_url() ?>hasil_radiologi/printing_hasil_radiologi/' + id, 'Cetak Hasil Radiologi', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
	}

    function viewPacs(uid, xid) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url("hasil_radiologi/api/hasil_radiologi/viewPacs") ?>',
            data: 'uid=' + uid + '&xid=' + xid,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader()
            },
            success: function(data) {
                if (typeof data.metaData !== 'undefined') {
                    if (data.metaData.code !== 200) {
                        messageCustom(data.metaData.message, 'Error');
                    } else {
                        messageCustom(data.metaData.message, 'Success');
                        showUrl(data.metaData.url);
                    }
                }
            },
            complete: function() {
                hideLoader()
            },
            error: function(e) {
                accessFailed(e.status)
            },
        })

    }

    function showUrl(url) {
		window.open(url, '_blank');
	}
	
	function getTandaVital(id_pendaftaran,id_layanan_pendaftaran) {
		window.open('<?= base_url('pelayanan/printing_tanda_vital/') ?>' + id_pendaftaran + '/' + id_layanan_pendaftaran, 'Cetak Pemeriksaan Tanda Vital', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
	}

    function getAnamnesa(id_layanan_pendaftaran) {
        $.ajax({
			type: 'GET',
			url: '<?= base_url("rekam_medis/api/rekam_medis/get_data_anamnesa") ?>/id/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
                if (data.data != null) {
                    showAnamnesaRmb(data.data);                 
		            $('#modal-rekam-medis-anamnesa').modal('show');
                } else {
                    messageCustom('Data anamnesa tidak ada!', 'Info');
                }                        
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				messageCustom('Akses data Anamnesa Gagal', 'Error');
			}
		});
	}

    function showAnamnesaRmb(data) {
        $('#rmb-a1').html(data.keluhan_utama);
        $('#rmb-a2').html(data.riwayat_penyakit_keluarga);
        $('#rmb-a3').html(data.riwayat_penyakit_sekarang);
        $('#rmb-a4').html(data.anamnesa_sosial);
        $('#rmb-a5').html(data.riwayat_penyakit_dahulu);

        $('#rmb-b1').html(data.keadaan_umum);
        $('#rmb-b2').html(data.kesadaran);
        $('#rmb-b3').html(data.gcs);
        $('#rmb-b4').html(data.alergi);
        $('#rmb-b5').html(data.tensi_sistolik != null ? data.tensi_sistolik + ' mmHg' : '');
        $('#rmb-b6').html(data.tensi_diastolik != null ? data.tensi_diastolik + ' mmHg' : '');
        $('#rmb-b7').html(data.suhu != null ? data.suhu + ' ℃' : '');
        $('#rmb-b8').html(data.nadi != null ? data.nadi + ' /Mnt' : '');
        $('#rmb-b9').html(data.rr != null ? data.rr + ' /Mnt' : '');
        $('#rmb-b10').html(data.tinggi_badan != null ? data.tinggi_badan + ' cm' : '');
        $('#rmb-b11').html(data.berat_badan != null ? data.berat_badan + ' Kg' : '');

        $('#rmb-b12').html(data.kepala);
        $('#rmb-b13').html(data.thorax);
        $('#rmb-b14').html(data.cor);
        $('#rmb-b15').html(data.genitalia);
        $('#rmb-b16').html(data.pemeriksaan_penunjang);
        $('#rmb-b17').html(data.status_mentalis);
        $('#rmb-b18').html(data.status_gizi);
        $('#rmb-b19').html(data.hidung);
        $('#rmb-b20').html(data.mata);
        $('#rmb-b21').html(data.usul_tindak_lanjut);

        $('#rmb-b22').html(data.leher);
        $('#rmb-b23').html(data.pulmo);
        $('#rmb-b24').html(data.abdomen);
        $('#rmb-b25').html(data.ekstrimitas);
        $('#rmb-b26').html(data.prognosis);
        $('#rmb-b27').html(data.lingkar_kepala);
        $('#rmb-b28').html(data.telinga);
        $('#rmb-b29').html(data.tenggorok);
        $('#rmb-b30').html(data.kulit_kelamin);

        let pupil = '';
        if(data.pupil_dbn == "on"){
            data.pupil_bentuk != null ? pupil += 'Bentuk: '+data.pupil_bentuk+'<br>' : '';
            data.pupil_ukuran != null ? pupil += 'Ukuran: '+data.pupil_ukuran+'<br>' : '';
            data.pupil_reflek_cahaya != null ? pupil += 'Reflek Cahaya: '+data.pupil_reflek_cahaya+'<br>' : '';
        } else {
            pupil = data.pupil_dbn;
        }

        let nervi = '';
        if(data.nervi_cranialis_dbn == "on"){
            data.nervi_cranialis_paresis != null ? nervi += 'Paresis: '+data.nervi_cranialis_paresis+'<br>' : '';
        } else {
            nervi = data.nervi_cranialis_dbn;
        }

        let reflek_fisiologi = '';
        data.rf_kiri_atas   != null ? reflek_fisiologi += 'Kiri Atas: '+data.rf_kiri_atas+'<br>' : '';
        data.rf_kiri_bawah  != null ? reflek_fisiologi += 'Kiri Bawah: '+data.rf_kiri_bawah+'<br>' : '';
        data.rf_kanan_atas  != null ? reflek_fisiologi += 'Kanan Atas: '+data.rf_kanan_atas+'<br>' : '';
        data.rf_kanan_bawah != null ? reflek_fisiologi += 'Kanan Atas: '+data.rf_kanan_bawah+'<br>' : '';

        
        let sensorik = '';
        if(data.sensorik_dbn == "on"){
            data.sensorik_lain != null ? nervi += 'Lain: '+data.sensorik_lain+'<br>' : '';
        } else {
            sensorik = data.sensorik_dbn;
        }

        let trm = '';
        if(data.trm_dbn == "on"){
            data.trm_kaku_kuduk != null ? trm += 'Kaku Kuduk: '+data.trm_kaku_kuduk+'<br>' : '';
            data.trm_laseque    != null ? trm += 'Laseque: '+data.trm_laseque+'<br>' : '';
            data.trm_kerning    != null ? trm += 'Kerning: '+data.trm_kerning+'<br>' : '';
        } else {
            trm = data.trm_dbn;
        }

        let motorik = '';
        data.motorik_kiri_atas   != null ? motorik += 'Kiri Atas: '+data.motorik_kiri_atas+'<br>' : '';
        data.motorik_kiri_bawah  != null ? motorik += 'Kiri Bawah: '+data.motorik_kiri_bawah+'<br>' : '';
        data.motorik_kanan_atas  != null ? motorik += 'Kanan Atas: '+data.motorik_kanan_atas+'<br>' : '';
        data.motorik_kanan_bawah != null ? motorik += 'Kanan Atas: '+data.motorik_kanan_bawah+'<br>' : '';
        
        $('#rmb-c1').html(pupil);
        $('#rmb-c2').html(nervi);
        $('#rmb-c3').html(reflek_fisiologi);
        $('#rmb-c4').html(sensorik);
        $('#rmb-c5').html(data.pemeriksaan_khusus);

        $('#rmb-c6').html(trm);
        $('#rmb-c7').html(motorik);
        $('#rmb-c8').html(data.reflek_patologis);
        $('#rmb-c9').html(data.otonom);

        $('#rmb-d1').html(data.riwayat_kelahiran);
        $('#rmb-d2').html(data.riwayat_nutrisi);
        $('#rmb-d3').html(data.riwayat_imunisasi);
        $('#rmb-d4').html(data.riwayat_tumbuh_kembang);

	}

    function pagination_rmb(total_data, limit, page, tab) {
        var str = '';
        var total_page = Math.ceil(total_data / limit);

        var first = '<li class="page-item"><a style="cursor:pointer;" class="page-link" onclick="paging_rmb(1,' + tab + ')">First</a></li>';
        var last = '<li class="page-item"><a style="cursor:pointer;" class="page-link" onclick="paging_rmb(' + ((total_page === 0) ? 1 : total_page) + ',' + tab + ')">Last</a></li>';
        var click_prev = '';
        if (page > 1) {
            click_prev = 'onclick="paging_rmb(' + (page - 1) + ',' + tab + ')"';
        };
        var prev = '<li class="page-item"><a style="cursor:pointer;" class="page-link" ' + click_prev + '>&laquo;</a></li>';

        var click_next = '';
        if (page < total_page) {
            click_next = 'onclick="paging_rmb(' + (page + 1) + ',' + tab + ')"';
        };
        var next = '<li class="page-item"><a style="cursor:pointer;" class="page-link" ' + click_next + '>&raquo;</a></li>';

        var page_numb = '';
        var act_click = '';
        var start = page - 2;
        var finish = page + 2;
        if (start < 1) {
            start = 1;
        }

        if (finish > total_page) {
            finish = total_page;
        }

        for (var p = start; p <= finish; p++) {

            if (p !== page) {
                page_numb += '<li class="page-item"><a style="cursor:pointer;" class="page-link" onclick="paging_rmb(' + p + ',' + tab + ')">' + p + '</a></li>';
            } else {
                page_numb += '<li class="active"><input min="1" class="form-control-paging" onkeyup="KuduAngka(this)" type="number" value="' + page + '" style="width:60px;"/><button type="button" class="btn btn-info btn-sm mb-1" title="Lompat ke halaman" onclick="gotopage(this, ' + tab + ')"><i class="fas fa-search"></i></button></li>' + '';
            }

        };

        return '<ul class="pagination pagination-sm">' + first + prev + page_numb + next + last + '</ul>';
    }

    function paging_rmb(p) {
        riwayatRekamMedisPasienBaru(p);
	}



</script>