<!-- // PAPAK -->
<script>  
    var nomer = 1;
        nomer++;
        
    $('#btn-expand-all-code-blue').click(function() {
            $('.multi-collapse').addClass('show');
    });

    $('#btn-collapse-all-code-blue').click(function() {
        $('.multi-collapse').removeClass('show');
    });
    
    $("#wizard-code-blue").bwizard();


    $('#tgl-jam-fcb')
    .datetimepicker({
        format: 'DD/MM/YYYY HH:mm',
        pickSecond: false,
        pick12HourFormat: false,
        maxDate: new Date(),
        beforeShow: function(i) {
            if ($(i).attr('readonly')) {
                return false;
            }
        }
    });

    $('#paska-fcb-8')
    .on('click', function() {
        $(this).timepicker({
            format: 'HH:mm',
            showInputs: false,
            showMeridian: false
        });
    })

    // NAMA DOKTER 
    $('#dokter-fcb').select2c({
        ajax: {
            url: "<?= base_url('masterdata/api/masterdata_auto/dokter_auto') ?>",
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

    // FCB Hanya nama kamar yang muncul
    $('#bangsal-fcb').select2c({
        ajax: {
            url: "<?= base_url('pelayanan/api/pelayanan/kamar_auto') ?>",
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
            // console.log(data);
            var markup = data.nama;
            return markup;
        },
        formatSelection: function(data) {
            getNoBed(data.id);
            return data.nama;
        }
    });

    // FCB 
    function getNoBed(id_kamar) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url("bed/api/bed/get_no_bed") ?>/' + id_kamar,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                if (data !== null) {
                    $('#no-bed').val(data.nama_bangsal);
                } else {
                    $('#no-bed').val('');
                }

                syams_validation_remove('#no-bed');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    // LMDT
    function removeList(el) {
        var parent = el.parentNode.parentNode;
        parent.parentNode.removeChild(parent);
    } 

    // LMDT
    function removeListTable(el) {
        var parent = el.parentNode.parentNode.parentNode;
        parent.parentNode.removeChild(parent);
    }

    // LMDT
    function timerzmysql(waktu) {
        var tm = waktu.split(':');
        return tm[0] + ':' + tm[1];
    }

    // LMDT
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

    // LMDT
    function tutupRapet(title, num) {
        let html = /* html */ `
                        </div>
                    </div>
                </div>
            </div>
        `;

        return html;
    }    
  

    function lihatFORM_KEP_127_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed;

        if (layanan.bangsal_ic && layanan.no_bed_ic) {
            bed = `${layanan.bangsal_ic} No. Bed ${layanan.no_bed_ic}`;
        } else if (layanan.bangsal && layanan.kelas && layanan.no_ruang && layanan.no_bed) {
            bed = `${layanan.bangsal} kelas ${layanan.kelas} ruang ${layanan.no_ruang} No. Bed ${layanan.no_bed}`;
        } else {
            bed = `${layanan.jenis_layanan}`;
        }
        
        let action = 'lihat';
        entriFormCodeBlue(layanan.id_pendaftaran, layanan.id, layanan.layanan, bed, action);
    }

    function editFORM_KEP_127_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed;

        if (layanan.bangsal_ic && layanan.no_bed_ic) {
            bed = `${layanan.bangsal_ic} No. Bed ${layanan.no_bed_ic}`;
        } else if (layanan.bangsal && layanan.kelas && layanan.no_ruang && layanan.no_bed) {
            bed = `${layanan.bangsal} kelas ${layanan.kelas} ruang ${layanan.no_ruang} No. Bed ${layanan.no_bed}`;
        } else {
            bed = `${layanan.jenis_layanan}`;
        }
        
        let action = 'edit';
        entriFormCodeBlue(layanan.id_pendaftaran, layanan.id, layanan.layanan, bed, action);
    }

    function tambahFORM_KEP_127_00(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed;

        if (layanan.bangsal_ic && layanan.no_bed_ic) {
            bed = `${layanan.bangsal_ic} No. Bed ${layanan.no_bed_ic}`;
        } else if (layanan.bangsal && layanan.kelas && layanan.no_ruang && layanan.no_bed) {
            bed = `${layanan.bangsal} kelas ${layanan.kelas} ruang ${layanan.no_ruang} No. Bed ${layanan.no_bed}`;
        } else {
            bed = `${layanan.jenis_layanan}`;
        }
        
        let action = 'tambah';
        entriFormCodeBlue(layanan.id_pendaftaran, layanan.id, layanan.layanan, bed, action);
    }
  
    function entriFormCodeBlue(id_pendaftaran, id_layanan_pendaftaran, layanan, bed, action) {
        // $('#modal_code_blue').modal('show');  

        $('#wizard-code-blue').bwizard('show', '0');

        $('#btn-simpan').hide();

        var groupAccount = '<?= $this->session->userdata('account_group') ?>';
        var profesi = '<?= $this->session->userdata('profesi_nadis') ?>';
        if (groupAccount == 'Admin') {
            profesi = 'Perawat';
        }

        if (action !== 'lihat') {
            $('#btn-simpan').show();
        } else {
            $('#btn-simpan').hide();
        } 

        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_data_code_blue") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function (data) {
                resetFormCodeBlue(); 
                $('#id-layanan-pendaftaran-fcb').val(id_layanan_pendaftaran);
                $('#id_layanan_pendaftaran').val(id_layanan_pendaftaran);
                $('#id-pendaftaran-fcb').val(id_pendaftaran);
                if (data.pasien !== null) {
                    $('#id-pasien-fcb').val(data.pasien.id_pasien);
                    $('#nama-pasien-fcb').text(data.pasien.nama);
                    $('#no-fcb').text(data.pasien.no_rm);
                    $('#tanggal-lahir-fcb').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
                    $('#jenis-kelamin-fcb').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));                       
                }
                
                let code_blue = data.code_blue;
                if (data.code_blue !== null) {  

                    $('#id-fcb').val(data.code_blue.id);

                    const respon_fcb = JSON.parse(data.code_blue.respon_fcb);  
                    if (respon_fcb.respon_fcb_1 !== null) { $('#respon-fcb-1').prop('checked', true) }
                    if (respon_fcb.respon_fcb_2 !== null) { $('#respon-fcb-2').prop('checked', true) }
                    if (respon_fcb.respon_fcb_3 !== null) { $('#respon-fcb-3').prop('checked', true) }
                    if (respon_fcb.respon_fcb_4 !== null) { $('#respon-fcb-4').prop('checked', true) }
                    if (respon_fcb.respon_fcb_5 !== null) { $('#respon-fcb-5').prop('checked', true) }
                    if (respon_fcb.respon_fcb_6 !== null) { $('#respon-fcb-6').prop('checked', true) }
                    if (respon_fcb.respon_fcb_7 !== null) { $('#respon-fcb-7').prop('checked', true) }
                    if (respon_fcb.respon_fcb_8 !== null) { $('#respon-fcb-8').prop('checked', true) }
                    if (respon_fcb.respon_fcb_9 !== null) {$('#respon-fcb-9').val(respon_fcb.respon_fcb_9);}


                    $('#tgl-jam-fcb').val((data.code_blue.tgl_jam_fcb !== null ? datetimefmysql(data.code_blue.tgl_jam_fcb) : ''));

                    $('#bangsal-fcb').val(data.code_blue.bansal_fcb);
                    $('#s2id_bangsal-fcb a .select2c-chosen').html(data.code_blue.nama_bangsal);          
                    
                    const kriteria_fcb = JSON.parse(data.code_blue.kriteria_fcb);  
                    if (kriteria_fcb.kriteria_fcb_1 !== null) { $('#kriteria-fcb-1').prop('checked', true) }
                    if (kriteria_fcb.kriteria_fcb_2 !== null) { $('#kriteria-fcb-2').prop('checked', true) }
                    if (kriteria_fcb.kriteria_fcb_3 !== null) { $('#kriteria-fcb-3').prop('checked', true) }
                    if (kriteria_fcb.kriteria_fcb_4 !== null) { $('#kriteria-fcb-4').prop('checked', true) }
                    if (kriteria_fcb.kriteria_fcb_5 !== null) { $('#kriteria-fcb-5').prop('checked', true) }
                    if (kriteria_fcb.kriteria_fcb_6 !== null) { $('#kriteria-fcb-6').prop('checked', true) }
                    if (kriteria_fcb.kriteria_fcb_7 !== null) { $('#kriteria-fcb-7').prop('checked', true) }
                    if (kriteria_fcb.kriteria_fcb_8 !== null) { $('#kriteria-fcb-8').prop('checked', true) }
                    if (kriteria_fcb.kriteria_fcb_9 !== null) {$('#kriteria-fcb-9').val(kriteria_fcb.kriteria_fcb_9);}
                    if (kriteria_fcb.kriteria_fcb_10 !== null) {$('#kriteria-fcb-10').val(kriteria_fcb.kriteria_fcb_10);}


                    const awal_fcb = JSON.parse(data.code_blue.awal_fcb);  
                    if (awal_fcb.awal_fcb_1 !== null) { $('#awal-fcb-1').prop('checked', true) }
                    if (awal_fcb.awal_fcb_2 !== null) { $('#awal-fcb-2').prop('checked', true) }
                    if (awal_fcb.awal_fcb_3 !== null) { $('#awal-fcb-3').prop('checked', true) }
                    if (awal_fcb.awal_fcb_4 !== null) { $('#awal-fcb-4').prop('checked', true) }

                    const jalan_fcb = JSON.parse(data.code_blue.jalan_fcb);  
                    if (jalan_fcb.jalan_fcb_1 !== null) { $('#jalan-fcb-1').prop('checked', true) }
                    if (jalan_fcb.jalan_fcb_2 !== null) { $('#jalan-fcb-2').prop('checked', true) }
                    if (jalan_fcb.jalan_fcb_3 !== null) { $('#jalan-fcb-3').prop('checked', true) }
                    if (jalan_fcb.jalan_fcb_4 !== null) { $('#jalan-fcb-4').prop('checked', true) }
                    if (jalan_fcb.jalan_fcb_5 !== null) { $('#jalan-fcb-5').prop('checked', true) }
                    if (jalan_fcb.jalan_fcb_6 !== null) { $('#jalan-fcb-6').prop('checked', true) }
                    if (jalan_fcb.jalan_fcb_7 !== null) { $('#jalan-fcb-7').prop('checked', true) }
                    if (jalan_fcb.jalan_fcb_8 !== null) { $('#jalan-fcb-8').prop('checked', true) }
                    if (jalan_fcb.jalan_fcb_9 !== null) { $('#jalan-fcb-9').prop('checked', true) }
                    if (jalan_fcb.jalan_fcb_10 !== null) { $('#jalan-fcb-10').prop('checked', true) }
                    if (jalan_fcb.jalan_fcb_11 !== null) { $('#jalan-fcb-11').prop('checked', true) }
                    if (jalan_fcb.jalan_fcb_12 !== null) { $('#jalan-fcb-12').prop('checked', true) }
                    if (jalan_fcb.jalan_fcb_13 !== null) { $('#jalan-fcb-13').prop('checked', true) }
                    if (jalan_fcb.jalan_fcb_14 !== null) {$('#jalan-fcb-14').val(jalan_fcb.jalan_fcb_14);}
                    if (jalan_fcb.jalan_fcb_15 !== null) { $('#jalan-fcb-15').prop('checked', true) }
                    if (jalan_fcb.jalan_fcb_16 !== null) { $('#jalan-fcb-16').prop('checked', true) }
                    if (jalan_fcb.jalan_fcb_17 !== null) {$('#jalan-fcb-17').val(jalan_fcb.jalan_fcb_17);}
                    if (jalan_fcb.jalan_fcb_18 !== null) { $('#jalan-fcb-18').prop('checked', true) }

                    const sirkulasi_fcb = JSON.parse(data.code_blue.sirkulasi_fcb);  
                    if (sirkulasi_fcb.sirkulasi_fcb_1 !== null) { $('#sirkulasi-fcb-1').prop('checked', true) }
                    if (sirkulasi_fcb.sirkulasi_fcb_2 !== null) { $('#sirkulasi-fcb-2').prop('checked', true) }
                    if (sirkulasi_fcb.sirkulasi_fcb_3 !== null) { $('#sirkulasi-fcb-3').prop('checked', true) }
                    if (sirkulasi_fcb.sirkulasi_fcb_4 !== null) { $('#sirkulasi-fcb-4').prop('checked', true) }
                    if (sirkulasi_fcb.sirkulasi_fcb_5 !== null) { $('#sirkulasi-fcb-5').prop('checked', true) }
                    if (sirkulasi_fcb.sirkulasi_fcb_6 !== null) {$('#sirkulasi-fcb-6').val(sirkulasi_fcb.sirkulasi_fcb_6);}
                    if (sirkulasi_fcb.sirkulasi_fcb_7 !== null) { $('#sirkulasi-fcb-7').prop('checked', true) }
                    if (sirkulasi_fcb.sirkulasi_fcb_8 !== null) { $('#sirkulasi-fcb-8').prop('checked', true) }
                    if (sirkulasi_fcb.sirkulasi_fcb_9 !== null) { $('#sirkulasi-fcb-9').prop('checked', true) }
                    if (sirkulasi_fcb.sirkulasi_fcb_10 !== null) {$('#sirkulasi-fcb-10').val(sirkulasi_fcb.sirkulasi_fcb_10);}
                    if (sirkulasi_fcb.sirkulasi_fcb_11 !== null) { $('#sirkulasi-fcb-11').prop('checked', true) }
                    if (sirkulasi_fcb.sirkulasi_fcb_12 !== null) { $('#sirkulasi-fcb-12').prop('checked', true) }
                    if (sirkulasi_fcb.sirkulasi_fcb_13 !== null) {$('#sirkulasi-fcb-13').val(sirkulasi_fcb.sirkulasi_fcb_13);}
                    if (sirkulasi_fcb.sirkulasi_fcb_14 !== null) { $('#sirkulasi-fcb-14').prop('checked', true) }
                    if (sirkulasi_fcb.sirkulasi_fcb_15 !== null) { $('#sirkulasi-fcb-15').prop('checked', true) }
                    if (sirkulasi_fcb.sirkulasi_fcb_16 !== null) { $('#sirkulasi-fcb-16').prop('checked', true) }
                    if (sirkulasi_fcb.sirkulasi_fcb_17 !== null) { $('#sirkulasi-fcb-17').prop('checked', true) }

                    const gcs_fcb = JSON.parse(data.code_blue.gcs_fcb);                    
                    if (gcs_fcb.gcs_fcb_1 !== null) {$('#gcs-fcb-1').val(gcs_fcb.gcs_fcb_1);}
                    if (gcs_fcb.gcs_fcb_2 !== null) {$('#gcs-fcb-2').val(gcs_fcb.gcs_fcb_2);}
                    if (gcs_fcb.gcs_fcb_3 !== null) {$('#gcs-fcb-3').val(gcs_fcb.gcs_fcb_3);}
                    if (gcs_fcb.gcs_fcb_4 !== null) {$('#gcs-fcb-4').val(gcs_fcb.gcs_fcb_4);}

                    const tanda_vital_fcb = JSON.parse(data.code_blue.tanda_vital_fcb);                    
                    if (tanda_vital_fcb.tanda_vital_fcb_1 !== null) {$('#tanda-vital-fcb-1').val(tanda_vital_fcb.tanda_vital_fcb_1);}
                    if (tanda_vital_fcb.tanda_vital_fcb_2 !== null) {$('#tanda-vital-fcb-2').val(tanda_vital_fcb.tanda_vital_fcb_2);}
                    if (tanda_vital_fcb.tanda_vital_fcb_3 !== null) {$('#tanda-vital-fcb-3').val(tanda_vital_fcb.tanda_vital_fcb_3);}
                    if (tanda_vital_fcb.tanda_vital_fcb_4 !== null) {$('#tanda-vital-fcb-4').val(tanda_vital_fcb.tanda_vital_fcb_4);}
                    if (tanda_vital_fcb.tanda_vital_fcb_5 !== null) {$('#tanda-vital-fcb-5').val(tanda_vital_fcb.tanda_vital_fcb_5);}
                    if (tanda_vital_fcb.tanda_vital_fcb_6 !== null) {$('#tanda-vital-fcb-6').val(tanda_vital_fcb.tanda_vital_fcb_6);}

                    $('#anamnesa-fcb').val(data.code_blue.anamnesa_fcb);

                    const alergi_fcb = JSON.parse(data.code_blue.alergi_fcb);  
                    if (alergi_fcb.alergi_fcb_1 !== null) { $('#alergi-fcb-1').prop('checked', true) }
                    if (alergi_fcb.alergi_fcb_2 !== null) { $('#alergi-fcb-2').prop('checked', true) }
                    if (alergi_fcb.alergi_fcb_3 !== null) { $('#alergi-fcb-3').prop('checked', true) }
                    if (alergi_fcb.alergi_fcb_4 !== null) {$('#alergi-fcb-4').val(alergi_fcb.alergi_fcb_4);}
                    if (alergi_fcb.alergi_fcb_5 !== null) { $('#alergi-fcb-5').prop('checked', true) }

                    $('#pemeriksaan-fcb').val(data.code_blue.pemeriksaan_fcb);

                    $('#diagnosis-fcb').val(data.code_blue.diagnosis_fcb);

                    const paska_fcb = JSON.parse(data.code_blue.paska_fcb);  
                    if (paska_fcb.paska_fcb_1 !== null) { $('#paska-fcb-1').prop('checked', true) }
                    if (paska_fcb.paska_fcb_2 !== null) { $('#paska-fcb-2').prop('checked', true) }
                    if (paska_fcb.paska_fcb_3 !== null) { $('#paska-fcb-3').prop('checked', true) }
                    if (paska_fcb.paska_fcb_4 !== null) { $('#paska-fcb-4').prop('checked', true) }
                    if (paska_fcb.paska_fcb_5 !== null) { $('#paska-fcb-5').prop('checked', true) }
                    if (paska_fcb.paska_fcb_6 !== null) { $('#paska-fcb-6').prop('checked', true) }
                    if (paska_fcb.paska_fcb_7 !== null) {$('#paska-fcb-7').val(paska_fcb.paska_fcb_7);}
                    if (paska_fcb.paska_fcb_8 !== null) {$('#paska-fcb-8').val(paska_fcb.paska_fcb_8);}

                    $('#keterangan-fcb').val(data.code_blue.keterangan_fcb);

                    if (data.code_blue.ttd_fcb == '1') { $('#ttd-fcb').prop('checked', true) }
    
                    // if (data.code_blue.dokter_fcb !== null) { $('#dokter-fcb').select2c('readonly', true)}
                    $('#dokter-fcb').val(data.code_blue.dokter_fcb);
                    $('#s2id_dokter-fcb a .select2c-chosen').html(data.code_blue.dokter);                       
                }   

                // LMTD Tanggal
                $('#data-lembar-lmdt').one('click', function() {
                        $('#tgl-fcb, #tgl-fcb-edit').datetimepicker({
                        format: 'DD/MM/YYYY',
                        maxDate: new Date(),
                        beforeShow: function(i) {
                            if ($(i).attr('readonly')) {
                                return false;
                            }
                        }
                    });
                })

                // LMTD Jam
                $('#data-lembar-lmdt').one('click', function() {
                    $('#jam-fcb, #jam-fcb-edit')
                    .on('click', function() {
                        $(this).timepicker({
                            format: 'HH:mm',
                            showInputs: false,
                            showMeridian: false
                        });
                    })
                })              
                
                if (typeof data.lembar_monitoring !== 'undefined' && data.lembar_monitoring !== null) {
                    showLLembarMonitoringDanTerapi(data.lembar_monitoring, id_pendaftaran, id_layanan_pendaftaran, bed);
                    showLembarMonitoringDanTerapi(nomer);
                } else {
                    $('#tabel-lmdt .body-table').empty();
                }
                $('#modal_code_blue').modal('show');
                
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })
    } 

    function showLembarMonitoringDanTerapi(num) {
        let html = bukaLebar('Form Lembar Monitoring dan Terapi ', num);
        html += /* html */ `
            <div class="from-group">
                                
            </div>
            <hr>
            <table class="table table-sm table-striped table-bordered" style="margin-top: -15px" id="form-lmdt">
                <thead style="background-color: #F0FFF0;">
                    <tr>
                        <td colspan="10"><b></b></td>                            
                    </tr>                      
                    <tr>
                        <th width="10%" class="center">Tanggal</th>
                        <th width="5%" class="center">Jam</th>
                        <th width="80%" class="center">Terapi,Monitoring dan evaluasi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="10" class="bold text-uppercase"></td>
                    </tr>
                    <tr>
                        <td class="center"><input type="text" name="tgl_fcb" id="tgl-fcb"class="custom-form clear-input d-inline-block col-lg-12"></td>
                        <td class="center"><input type="text" name="jam_fcb" id="jam-fcb"class="custom-form clear-input d-inline-block col-lg-10"></td>
                        <td class="center"><textarea name="terapi_eva_fcb" id="terapi-eva-fcb"rows="3" class="form-control clear-input"placeholder="Keterangan"></textarea></td>                          
                    </tr>                      
                    <tr>
                        <td colspan="10">
                            <button type="button" title="Tambah Lembar Monitoring" class="btn btn-info" onclick="tambahLembarMonitoring()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah Lembar Monitoring</button>
                        </td>
                    </tr>
                </tbody>


                <table class="table table-no-border table-sm table-striped">
                    <tr>
                        <td colspan="8" style="text-align: right;">
                            <p class="page__number marquee-text" style="margin: 0;">
                            <span style="font-weight: bold; color: black; font-size: 1.5em;">
                                    😏HARAP DI PERHATIKAN 
                                </span>
                                <span style="font-weight: bold; color: red; font-size: 1.5em;">
                                    🥴SEBELUM *KONFIRMASI* KLIK *TAMBAH LEMBAR MONITORING...! TERLEBIH DAHULU
                                </span>
                            </p>
                        </td>
                    </tr>
                </table>
                <style>
                    /* Styling marquee text to make it scroll */
                    .marquee-text {
                        display: inline-block;
                        overflow: hidden;
                        white-space: nowrap;
                        animation: scroll-text 20s linear infinite;
                    }

                    @keyframes scroll-text {
                        0% { transform: translateX(100%); }
                        100% { transform: translateX(-100%); }
                    }
                </style> 

            </table>`;
        html += tutupRapet();
        $('#buka-tutup-lmdt').append(html);
    }

    // FCB
    // function konfirmasiSimpanFormCodeBlue() {
    //     swal.fire({
    //         title: 'Konfirmasi',
    //         text: "Apakah anda yakin akan menyimpan datan ini ?",
    //         icon: 'question',
    //         showCancelButton: true,
    //         confirmButtonText: '<i class="fas fa-fw fa-save mr-1"></i>Simpan',
    //         cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
    //         reverseButtons: true
    //     }).then((result) => {
    //         if (result.value) {
    //             simpanFormCodeBlue();
    //         }
    //     })
    // }

    // FCB
    function konfirmasiSimpanFormCodeBlue() {
        var stop = false;
        if ($('#tgl-jam-fcb').val() === '') {
            syams_validation('#tgl-jam-fcb', 'Kolom jam & tanggal belum diisi!');
            $('#tgl-jam-fcb').focus();
            $('#wizard-code-blue').bwizard('show', '0');
            stop = true;
        }

        if ($('#bangsal-fcb').val() === '') {
            syams_validation('#bangsal-fcb', 'Kolom bangsal harus dipilih!');
            $('#wizard-code-blue').bwizard('show', '0');
            stop = true;
        }

        if (!stop) {
            var id_fcb = $('#id-fcb').val();
            var text;
            var btnTextConfirmFcb;

            if (id_fcb) {
                text = 'Apakah anda yakin ingin mengupdate data ini ?';
                btnTextConfirmFcb = 'Update';
            } else {
                text = 'Apakah anda yakin ingin menyimpan data ini ?';
                btnTextConfirmFcb = 'Simpan';
            }

            swal.fire({
                title: 'Konfirmasi ?',
                html: text,
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: '<i class="fas fa-fw fa-save mr-1"></i>' + btnTextConfirmFcb,
                cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    simpanFormCodeBlue();
                }
            });
        }
    }

    // FCB
    function simpanFormCodeBlue() {
        var id_layanan_pendaftaran_fcb = $('#id-layanan-pendaftaran-fcb').val(); 
        $.ajax({
            type: 'POST',
            url: '<?= base_url("pelayanan/api/pelayanan/simpan_data_code_blue") ?>',
            data: $('#form_code_blue').serialize() + '&id-layanan-pendaftaran-fcb=' + id_layanan_pendaftaran_fcb,

            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {

                if (data.respon !== null) {

                    if (data.respon.show !== null) {

                        $('#wizard-code-blue').bwizard('show', data.respon.show);

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
                        $('#modal_code_blue').modal('hide');
                        showListForm($('#id-pendaftaran-fcb').val(), $('#id-layanan-pendaftaran-fcb').val(), $('#id-pasien-fcb').val());
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

    // <td align="center">${v.tgl_fcb || '-'}</td>
    // LMDT   
    // function showLLembarMonitoringDanTerapi(data, id_pendaftaran, id_layanan_pendaftaran, bed) {
    //     $('#tabel-lmdt .body-table').empty();
    //     if (data !== null) {
    //         $.each(data, function(i, v) {
    //             const selOp =
    //                 '<td align="center"><button type="button" class="btn btn-secondary btn-xs" onclick="editLembarMonitoring(this, ' +
    //                 v.id + ', ' + id_pendaftaran + ', ' + id_layanan_pendaftaran + ', \'' + bed +
    //                 '\')"><i class="fas fa-edit"></i> </button> <button type="button" class="btn btn-secondary btn-xs" onclick="hapusLembarMonitoring(this, ' +
    //                 v.id + ')"> <i class="fas fa-trash-alt"></i> </button> </td>';
    //             let html = /* html */ `
    //                 <tr>
    //                     <td class="number-terapi" align="center">${(++i)}</td>           
	// 					<td class="center">${datefmysql(v.tgl_fcb)}</td>
    //                     <td align="center">${v.jam_fcb || '-'}</td>
    //                     <td>${v.terapi_eva_fcb || '-'}</td>
    //                     <td align="center" >${v.akun_user}</td>
    //                     ${selOp}
	// 					<td align="center"></td>
    //                 </tr>
    //             `;
    //             $('#tabel-lmdt .body-table').append(html);
    //             numberLmdt = i;
    //         })
    //     }
    // }

    function showLLembarMonitoringDanTerapi(data, id_pendaftaran, id_layanan_pendaftaran, bed) {
        $('#tabel-lmdt .body-table').empty();
        if (data !== null) {
            $.each(data, function(i, v) {
                const selOp = `
                    <td align="center">
                        <button type="button" class="btn btn-info btn-sm" onclick="editLembarMonitoring(this, ${v.id}, ${id_pendaftaran}, ${id_layanan_pendaftaran}, '${bed}')">
                            <i class="fas fa-edit"></i> <small>Edit</small>
                        </button>
                        <button type="button" class="btn btn-danger btn-sm" onclick="hapusLembarMonitoring(this, ${v.id})">
                            <i class="fas fa-trash-alt"></i> <small>Hapus</small>
                        </button>
                    </td>`;
                let html = `
                    <tr>
                        <td class="number-terapi" align="center">${(++i)}</td>
                        <td class="center">${datefmysql(v.tgl_fcb)}</td>
                        <td align="center">${v.jam_fcb || '-'}</td>
                        <td>${v.terapi_eva_fcb || '-'}</td>
                        <td align="center">${v.akun_user}</td>
                        ${selOp}
                        <td align="center"></td>
                    </tr>`;
                $('#tabel-lmdt .body-table').append(html);
                numberLmdt = i;
            });
        }
    }

  
    // FCB
    function resetFormCodeBlue() {
        $('#wizard-code-blue').bwizard('show', '0');
        $('#form_code_blue')[0].reset();
        $("input[type='checkbox']").prop('checked',false);
        $("input[type='radio']").prop('checked',false);
        $('#id-fcb').val('');
        $('#s2id_dokter-fcb a .select2c-chosen').html('Pilih dokter');
        $('#dokter-fcb').val('');
        $('#s2id_dokter-fcb a .select2c-chosen').empty();
        $('#dokter-fcb').select2c('readonly',false);

        $('#tanggal-jam-prltddp').attr('disabled', false);

        $('#buka-tutup-lmdt').empty();

        $('.disabled').prop('disabled', true)

        // LMDT
        setTimeout(() => {
            $('#tgl-fcb, #jam-fcb, #terapi-eva-fcb')
                .val('');
            $('#form-lmdt').find('input').each(function() {
                if ($(this).is(':checked')) {
                    $(this).prop('checked', false);
                }
            })
        }, 100)
    }

    // LMDT
    function editLembarMonitoring(obj, id, id_pendaftaran, id_layanan_pendaftaran, bed){
        // console.log('12345');
        const modal = $('#modal-edit-lembar-monitoring');
        $('#update-lmdt').children().remove();
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_lembar_monitoring") ?>/id/' +
                id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                // console.log(data);
                $('#update-lmdt').empty();
                $('#id-lembar-monitoring').val(id);
                let cttntndkn = '';
                cttntndkn =
                    `  <button type="button" class="btn btn-secondary waves-effect" onclick="$('#modal-edit-lembar-monitoring').modal('hide');"><i class="fas fa-times-circle mr-1"></i>Tutup</button>
                        <button type="button" class="btn btn-info waves-effect" onclick="updateLembarMonitoring(${id_pendaftaran}, ${id_layanan_pendaftaran}, '${bed}')"><i class="fas fa-save mr-1"></i>Update</button>`;
                $('#update-lmdt').append(cttntndkn);
                // $('#tgl-fcb-edit').val(data.tgl_fcb);
                $('#tgl-fcb-edit').val(data.tgl_fcb.split('-').reverse().join('-'));
                $('#jam-fcb-edit').val(data.jam_fcb);
                $('#terapi-eva-fcb-edit').val(data.terapi_eva_fcb);
                modal.modal('show');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })
    }

    // LMDT
    function updateLembarMonitoring(id_pendaftaran, id_layanan_pendaftaran, bed) {
        $.ajax({
            type: 'PUT',
            url: '<?= base_url("pelayanan/api/pelayanan/update_lembar_monitoring") ?>',
            data: $('#form-edit-lembar-monitoring').serialize(),
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                if (data.status) {
                    messageEditSuccess();
                    $('#wizard-code-blue').bwizard('show', '0');
                    entriFormCodeBlue(id_pendaftaran, id_layanan_pendaftaran, bed);
                } else {
                    messageEditFailed();
                }

                $('#modal-edit-lembar-monitoring').modal('hide');
            },
            error: function(e) {
                messageEditFailed();
            }
        });
    }

    // LMDT
    if (typeof numberLmdt === 'undefined') {
        var numberLmdt = 1;
    }

    function tambahLembarMonitoring() {
        let html = '';       
        let tgl_fcb = $('#tgl-fcb').val();
        let jam_fcb = $('#jam-fcb').val();
        let terapi_eva_fcb = $('#terapi-eva-fcb').val();
        html = /* html */ `
            <tr class="row-in-${++numberLmdt}">
                <td class="number-pemantauan" align="center">${numberLmdt}</td>

                <td align="center">
                	<input type="hidden" name="tgl_fcb[]" value="${tgl_fcb}">${tgl_fcb}
                </td>
                <td align="center">
                	<input type="hidden" name="jam_fcb[]" value="${jam_fcb}">${jam_fcb}
                </td>
                <td>
                	<input type="hidden" name="terapi_eva_fcb[]" value="${terapi_eva_fcb}">${terapi_eva_fcb}
                </td>

                <td align="center">
					<?= $this->session->userdata('nama') ?>
					<input type="hidden" name="user_pemantauan[]" value="<?= $this->session->userdata("id_translucent") ?>">
					<input type="hidden" name="pencegahan_date_lmdt[]" value="<?= date("Y-m-d H:i:s") ?>">					
                </td>

                <td align="center">
                    <button type="button" id="pepel" class="btn btn-secondary btn-xxs" onclick="(() => {$(this).parent().parent().parent().find('.row-in-' + numberLmdt).remove(); numberLmdt--;})()"><i class="fas fa-trash-alt"></i></button>
                </td>              
            </tr>
        `;
        $('#tabel-lmdt .body-table').append(html);
    }

    // LMDT
    function hapusLembarMonitoring(obj, id) {
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
                            url: '<?= base_url("pelayanan/api/pelayanan/lembar_monitoring") ?>/' +
                                id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                if (data.status) {
                                    messageCustom(data.message, 'Success');
                                    removeList(obj);
                                } else {
                                    customAlert('Hapus Pemantauan Dekubitus', data
                                        .message);
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

    // GCS
    $('.gcsfcb').on('keyup', function() {
        let sum = 0
        $('.gcsfcb').each(function() {
            sum += Number($(this).val());
        });
        $('#gcs-fcb-4').val(sum);
    })

</script>

