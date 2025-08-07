<script>

    function resetFormBfb() {
        $('#tabel_bfb .body-table').empty();
    }

    function tambahFORM_PMD_46a2_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'tambah';

        resetFormBfb();
        entriBfb(layanan.id_pendaftaran, layanan.id, bed, action);
 
    }

    function lihatFORM_PMD_46a2_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'lihat';

        resetFormBfb();
        entriBfb(layanan.id_pendaftaran, layanan.id, bed, action);
        
    }

    function editFORM_PMD_46a2_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'edit';

        resetFormBfb();
        entriBfb(layanan.id_pendaftaran, layanan.id, bed, action);

    }

    function entriBfb(id_pendaftaran, id_layanan_pendaftaran, bed, action) {

        var groupAccount = '<?= $this->session->userdata('account_group') ?>';
        var profesi = '<?= $this->session->userdata('profesinadis') ?>';
        if (groupAccount == 'Admin') {
            profesi = 'Perawat';
        }

        $.ajax({
			type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_data_entri_keperawatan") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				// Set all values first
				resetFormBfb();
                $('#bfb_id_layanan_pendaftaran').val(id_layanan_pendaftaran);
                $('#bfb_id_pendaftaran').val(id_pendaftaran);
                $('#bfb_id_bed, #bfb_bed').val(bed).text(bed);
                if (data.pasien !== null) {
                    $('#id_pasien, #bfb_no_rm').val(data.pasien.id_pasien).text(data.pasien.id_pasien);
                    $('#bfb_nama_pasien').text(data.pasien.nama);
                    $('#bfb_tanggal_lahir').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
                    $('#bfb_jenis_kelamin').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));
                    if (data.pasien.alergi !== null) {
                        $('#bfb_riwayat_alergi').val(data.pasien.alergi).attr('readonly', true)
                    };
                    $('#bfb_alamat').text(data.pasien.alamat);
                }
                $('.bfb_logo_alergi').hide();
                if (data.profil !== null) {
                    // status profil pasien
                    if (data.profil.is_alergi == 'Ya') {
                        $('.logo-alergi').show();
                    }
                }

                // grafik length
                if (typeof data.grafik_bmi !== 'undefined' && data.grafik_bmi !== null) {
                    // Mengganti nilai null pada berat_badan dengan 0
                    data.grafik_bmi.forEach(function (v) {
                        v.berat_badan = (v.berat_badan !== null) ? v.berat_badan : 0;
                    });

                    $.each(data.grafik_bmi, function (i, v) {
                        let berat_badan = v.berat_badan ?? 0;
                        let berat_badan_cleaned = (berat_badan.toString().replace(/,/g, '.')).replace(/[^\d.]/g, '');
                        berat_badan = parseFloat(berat_badan_cleaned);

                        let tinggi_badan_cleaned = (v.tinggi_badan ?? 0).toString().replace(/,/g, '.').replace(/[^\d.]/g, '');
                        let tinggi_badan_meter = parseFloat(tinggi_badan_cleaned) / 100;

                        let bmi = 0;
                        let bmiFormatted = 0;
                        if (berat_badan !== 0 && tinggi_badan_meter !== 0) {
                            bmi = berat_badan / (tinggi_badan_meter * tinggi_badan_meter); // Hitung BMI
                            bmiFormatted = bmi.toFixed(2);
                        }

                        let umur_formatted = `${v.umur_tahun} Tahun ${v.umur_bulan} Bulan`;
                        let waktu_formatted = datetimefmysql(v.waktu);

                        let html = `
                            <tr class="row-in-${i + 1}">
                                <td class="number-monitoring" align="center">${i + 1}</td>
                                <td align="center">${waktu_formatted}</td>
                                <td align="center">${umur_formatted}</td>
                                <td align="center">${bmiFormatted} Kg/m²</td>
                            </tr>
                        `;
                        $('#tabel_bfb .body-table').append(html);

                        // Tambahkan bmiFormatted ke dalam objek
                        v.bmiFormatted = bmiFormatted;
                    });
                    grafik(data.grafik_bmi, id_layanan_pendaftaran, action);

                } else {
                    $('#tabel_bfb .body-table').empty();
                }

				$('#modal_bfb').modal('show');
			},
			complete: function() {
				hideLoader();
			},
			error: function(e) {
				accessFailed(e.status);
			}
		});
    }

    // MP-A + GRAFIK
    var chart;

    function grafik(data, id_layanan_pendaftaran, action) {
        var boyData8 = [];

        $.each(data, function (i, v) {
            // Konversi nilai berat_badan ke tipe data numerik
            var bmiNumeric = parseFloat(v.bmiFormatted);

            // Pastikan bahwa nilai bmiNumeric adalah angka valid
            if (!isNaN(bmiNumeric)) {
                boyData8.push([v.umur_bulan_saja, bmiNumeric]);
                console.log(boyData8);
            }
        });

        var boyData1 = [
            [24, 12.9],
            [36, 12.4],
            [48, 12.1],
            [60, 12]
        ];

        var boyData2 = [
            [24, 13.8],
            [36, 13.4],
            [48, 13.1],
            [60, 12.9]
        ];

        var boyData3 = [
            [24, 14.8],
            [36, 14.4],
            [48, 14.1],
            [60, 14]
        ];
        

        var boyData4 = [
            [24, 16],
            [36, 15.6],
            [48, 15.3],
            [60, 15.2]
        ];
        

        var boyData5 = [
            [24, 17.3],
            [36, 16.9],
            [48, 16.7],
            [60, 16.6]
        ];
        

        var boyData6 = [
            [24, 18.9],
            [36, 18.4],
            [48, 18.2],
            [60, 18.3]
        ];
        

        var boyData7 = [
            [24, 20.6],
            [36, 20],
            [48, 19.9],
            [60, 20.3]
        ];
        

        var options = {
            title: {
                text: 'BMI-for-age BOYS',
                align: 'center'
            },
            subtitle: {
                text: '2 to 5 years (z-scores)',
                align: 'center'
            },
            chart: {
                height: 500,
                type: 'spline',
                resetZoomButton: {
                    position: {
                        x: 0,
                        y: 0
                    }
                }
            },

            xAxis: {
                reversed: false,
                title: {
                    enabled: true,
                    text: 'Age (completed months and years)'
                },
                accessibility: {
                    rangeDescription: 'Range: 1 to 5.'
                },
                maxPadding: 0.05,
                showLastLabel: true,
                min: 24,
                max: 60,
                tickInterval: 2,
                labels: {
                    formatter: function () {
                        var years = Math.floor(this.value / 12);
                        var months = this.value % 12;
                        if (months === 0) {
                            return years + ' year';
                        } else {
                            return months;
                        }
                    }
                }
            },

            yAxis: {
                title: {
                    text: 'BMI (kg/m²)'
                },
                accessibility: {
                    rangeDescription: 'Range: 0 to 21 kg/m².'
                },
                lineWidth: 2,
                min: 11,
                max: 21,
                tickInterval: 1
            },
            tooltip: {
                enabled: false,
            },
            plotOptions: {
                spline: {
                    marker: {
                        enabled: false
                    }
                },
                series: {
                    marker: {
                        enabled: false
                    },
                    states: {
                        hover: {
                            enabled: false
                        }
                    }
                }
            },
            series: [
                { name: '-3', data: boyData1, color: '#DC143C' }, // Ganti warna sesuai keinginan
                { name: '-2', data: boyData2, color: '#ff1493' }, // Ganti warna sesuai keinginan
                { name: '-1', data: boyData3, color: '#DAA520' }, // Ganti warna sesuai keinginan
                { name: '0', data: boyData4, color: '#32CD32' }, // Ganti warna sesuai keinginan
                { name: '1', data: boyData5, color: '#DAA520' }, // Ganti warna sesuai keinginan
                { name: '2', data: boyData6, color: '#ff1493' }, // Ganti warna sesuai keinginan
                { name: '3', data: boyData7, color: '#DC143C' }, // Ganti warna sesuai keinginan
                {
                    name: 'Pasien',
                    data: boyData8,
                    color: '#7cb5ec',
                    marker: {
                        enabled: true, // Aktifkan marker hanya untuk seri Pasien
                        radius: 5, // Sesuaikan radius marker sesuai keinginan
                        symbol: 'circle' // Ganti simbol marker sesuai keinginan
                    }
                },
            ]
        };

        chart = Highcharts.chart('grafik_bfb', options);
    }

    function simpanBfb() {
        $.ajax({
            type: 'POST',
            url: '<?= base_url("form_rekam_medis/api/entri_keperawatan/simpan_bfb") ?>',
            data: $('#form_bfb').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {

                if (data.respon !== null) {
                    if (data.respon.show !== null) {
                        if (data.respon.add_show !== undefined) {
                            if (data.respon.id !== undefined) {
                                $(data.respon.id).addClass('show');
                            }
                        } else {
                            if (data.respon.id !== undefined) {
                                $(data.respon.id).addClass('show');
                            }
                        }
                        if (data.respon.status === false) {
                            bootbox.dialog({
                                message: data.respon.message,
                                title: "Penyimpanan Data Gagal",
                                buttons: {
                                    batal: {
                                        label: '<i class=" fas fa-times-circle"></i> Close',
                                        className: "btn-danger",
                                        callback: function() {
                                        }
                                    }
                                }
                            });
                        }
                    }
                } else {
                    $('input[name=csrf_syam]').val(data.token);
                    if (data.status) {
                        messageAddSuccess();
                        $('#modal_bfb').modal('hide');
                        showListForm($('#bfb_id_pendaftaran').val(), $('#bfb_id_layanan_pendaftaran').val(), $('#bfb_id_pasien').val());
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


</script>