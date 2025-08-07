<script type="text/javascript" src="<?= resource_url() ?>assets/node_modules/wizard/bwizard.js"></script>
<script>
    var dWidth = $(window).width();
    var dHeight = $(window).height();
    var x = screen.width / 2 - dWidth / 2;
    var y = screen.height / 2 - dHeight / 2;
    var numeroo = 1;

   $(function() {
        $('#tabKunjungan a:last').click(function() {
            if ($('#id-pendaftaran-rm').val() !== '') {
                getKjgn($('#id-pendaftaran-rm').val())
                $('#list-kjgt li:first').addClass('active');
            }
        });
    });

    

    

	

    function riwayatKunjunganPasien(no_rm, id){
        $('#kunjungan-area').empty();
        $('#tabKunjungan a:first').tab('show');

        $.ajax({
            type: 'GET',
            url: '<?= base_url("pemeriksaan_poli/api/protokol_terapi/get_riwayat_kunjungan") ?>/id/' + no_rm,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                
                showDataPAS(data.pasien);
                showDataRIKUN(data.kunjungan, id);
                let dataKu = '';
                dataKu = data.data_kunjungan;
                if(dataKu !== null){

                    getJgn(dataKu, id)
                    $('#modal-kunjungan').modal('show');

                } else {

                    messageCustom('Belum ada Riwayat Kunjungan', 'Error');
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

    function showDataPAS(pasien) {

        let kelamin = '';
        if (pasien.kelamin == 'L') {
            kelamin = 'Laki - laki';
        } else {
            kelamin = 'Perempuan';
        }

        if (pasien.tanggal_lahir !== null) {
            umur = hitungUmur(pasien.tanggal_lahir) + ' (' + datefmysql(pasien.tanggal_lahir) + ')';
        }

        $('#judul-kunjungan').html('<b>' + pasien.id + '</b> ' + pasien.nama);
        
    }

    function showDataRIKUN(kunjungan, id_layanan) {
        $('#list-kjgt').empty();
        $.each(kunjungan, function(i, v) {
            if (i === 0) {
                $('#id-pendaftaran-rm').val(v.id);
            }

            $('#list-kjgt').append(/* html */ `
                <li class="li_side pointer" onclick="getKjgn(${v.id}, ${id_layanan}, this)">
                    <a style="font-size: 16pt">${v.tanggal_kunjungan}</a>
                </li>    
            `);
        });
    }

    function getKjgn(id_kunjungan, id, obj) {
        numeroo = 1;
        $('.li_side').removeClass('active');
        $(obj).addClass('active');
        $('#tabKunjungan a:last').tab('show');
        $('#kunjungan-area').empty();

        $.ajax({
            type: 'GET',
            url: '<?= base_url("pemeriksaan_poli/api/protokol_terapi/get_riwayat_kunjungan_pasien") ?>/id/' + id_kunjungan,
            cache: false,
            data: '',
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                showDAKUN(data, id);
            },
            complete: function() {
                hideLoader();
            },
            error: function(e){
                messageCustom('Akses data Gagal', 'Error');
            }
        })
    }

    function getJgn(id_kunjungan, id) {
        numeroo = 1;
        $('.li_side').addClass('active');
        $('#tabKunjungan a:last').tab('show');
        $('#kunjungan-area').empty();

        $.ajax({
            type: 'GET',
            url: '<?= base_url("pemeriksaan_poli/api/protokol_terapi/get_riwayat_kunjungan_pasien") ?>/id/' + id_kunjungan,
            cache: false,
            data: '',
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                $('#id-layanan-rhm').val(id);
                showDAKUN(data, id);
            },
            complete: function() {
                hideLoader();
            },
            error: function(e){
                messageCustom('Akses data Gagal', 'Error');
            }
        })
    }

    function showDAKUN(data, id_layanan) {
        $('#cetak-rehab').empty();
        $('#kunjungan-area').empty();
        let tgl_kunjungan = '';
        tgl_kunjungan = indo_tgl(data.tanggal_kunjungan);

        let id_pendaftaran = id_layanan;

        if(id_pendaftaran !== undefined){

            id_dftr = id_pendaftaran;

        } else {

            id_dftr = $('#id-layanan-rhm').val();

        }

        $('#cetak-rehab').append(/* html */ `<button type="button" class="btn btn-info waves-effect" onclick="cetakRehab(${data.id}, '${data.nama}', '${tgl_kunjungan}', ${id_dftr})"><i class="fas fa-save"></i> Cetak</button>`);

        
        let html = '';

        html += /* html */ `
            <div class="row mb-2">
                <div class="col-lg-12 ry_title">
                    <h3 class="title_section float-left">PROTOKOL TERAPI</h3>
                    <h5 class="float-right"><b>PROGRAM TERAPI : ${data.total} TINDAKAN</b></h5>
                </div>
            </div>
        `;

        html += /* html */ `
            <div class="row mb-2">
                <div class="col-lg-12 ry_title">
                    
                    <h5 class="float-left"><b>TANGGAL : ${tgl_kunjungan}</b></h5>
                    
                </div>
            </div>
        `;

        let status = data.status;

        if(status === null){

            html += /* html */ `
            <div class="row">
                <div class="col-lg-6">
                    <table class="table table-no-border table-striped table-hover table-sm">
                        <tbody>
                            <tr>
                                <td width="40%"><b>STATUS PROGRAM TERAPI</b></td>
                                <td><span>BELUM SELESAI</span></td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
                
            </div>
        `;
        

        } else {

            html += /* html */ `
            <div class="row">
                <div class="col-lg-6">
                    <table class="table table-no-border table-striped table-hover table-sm">
                        <tbody>
                            <tr>
                                <td width="40%"><b>STATUS PROGRAM TERAPI</b></td>
                                <td><span>SELESAI</span></td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
                
            </div>
        `;


        }
        

        $('#kunjungan-area').append(html);

        html = '';
        $.each(data.layanan, function(i, v) {
            $('#kunjungan-area').append(showLaKun(v));
        });

        $('#kunjungan-area').append('<br><br><br>');
    }

    function showLaKun(v) {
        let html = '';
        numeroo ++;
        

        html = /* html */ `
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="title">
                                <h6 class="text-error">Tindakan</h6> 
                                ${showRMT(v.tindakan)}
                         </div>
                        </div>
                    </div>
        `;

        return html;
    }

    function showRMT(data) {

        let html = '';

        html += /* html */ `
            <table width="100%" class="table table-sm table-striped table-hover color-table info-table">
                <thead>
                    <tr>
                        <th class="center" width="2%">No.</th>
                        <th class="center" width="5%">Tanggal</th>
                        <th class="left" width="10%">Tindakan</th>
                        <th class="left" width="10%">Catatan</th>
                        <th class="center" width="8%">Operator</th>
                        <th class="center" width="5%">Status</th>
                    </tr>
                </thead>
                <tbody>
        `;

        $.each(data, function(i, v) {
            html += /* html */ `
                    <tr>
                        <td class="center">${++i}</td>
                        <td class="center">${((v.tanggal !== null) ? datetimefmysql(v.tanggal) : '')}</td>
                        <td class="left">${((v.item !== null) ? v.item : '')}</td>
                        <td class="left">${((v.catatan !== null) ? v.catatan : '')}</td>
                        <td class="center">${((v.operator !== null) ? v.operator : '')}</td>
                        <td class="center">${((v.keterangan !== null) ? v.keterangan : '')}</td>
                    </tr>
            `;
        });

        if (data.length === 0) {
            html += /* html */ `
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
            `;    
        }

        html += /* html */ `
                </tbody>
            </table>
        `;

        

        return html;
    }

    function cetakRehab(id_kunjungan, nama, tgl, id_layanan_pendaftaran) {
        
        bootbox.dialog({
            message: "Anda yakin akan mencetak riwayat program terapi tanggal " + tgl + " untuk pasien a/n " + nama,
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
                        cetakDataRehab(id_kunjungan, id_layanan_pendaftaran);
                    }
                }
            }
        });
    }

    function cetakDataRehab(id_kunjungan, id_layanan_pendaftaran) {
        window.open("<?php echo base_url('pemeriksaan_poli/pemeriksaan_poli/cetak_riwayat_program_terapi') ?>?id_kunjungan=" + id_kunjungan + "&id_layanan_pendaftaran=" + id_layanan_pendaftaran, "Cetak Riwayat Terapi",'width='+dWidth+', height='+dHeight+', left='+x+',top='+y);
    }

    function formRehabilitasMedik(id_pendaftaran, noReM, id) {
        // console.log(id);
        resetModalRehabMedik()
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pemeriksaan_poli/api/protokol_terapi/get_rehab_medik") ?>/id_pendaftaran/' + id_pendaftaran + '/noReM/' + noReM + '/id/' + id,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                // console.log(data.dataAwal.id_layanan_pendaftaran);

                if (data.dataAwal != null) {
                    // Set values in Penolakan Tindakan Kedokteran modal
                    $('#modal-rehab-medik-title').html(
                        `<h4 class="modal-title" id="modal-kunjungan-label"><span id="judul-kunjungan"></span></h4> <b>Form Rehabilitas Medik</b> |  No. RM: ${data.dataAwal.no_rm}, Nama: ${data.dataAwal.nama}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${data.dataAwal.telp}</b></i>`
                    );


                    $('#id-pendaftaran-awal').val(id_pendaftaran);
                    $('#id-layanan-pendaftaran-awal').val(id);
                    $('#id-layanan-pendaftaran-rmf').val(data.dataAwal.id_layanan_pendaftaran);
                    $('#id-pendaftaran-rmf').val(data.dataAwal.id_pendaftaran);
                    $('#id-pasien-rmf').val(data.dataAwal.no_rm);
                    $('#id-rmf').val(data.dataAwal.id_rmf);

                    // AESSMEN AWAL
                    $('#rmf-tanggal-pelayanan').val(datetimefmysql(data.dataAwal.tanggal_pelayanan));
                    $('#rmf-anamnesa').val(data.dataAwal.keluhan_utama);
                    $('#rmf-pemeriksaan-penunjang').val(data.dataAwal.pemeriksaan_penunjang);
                    $('#rmf-tata-laksana').val(data.dataAwal.usul_tindak_lanjut);
                    
                    if (data.dataAwal.keadaan_umum != null) {
                        let html = '';
                        html = /* html */ `
                            <tr>
                                <td width="10%">Keadaan Umum</td>
                                <td width="1%">:</td>
                                <td><input type="text" id="rmf-keadaan-umum" name="rmf_keadaan_umum" class="custom-form clear-input d-inline-block col-lg-5" readonly></td>
                            </tr>
                        `;
                        $('#rmf-pemeriksaan').append(html);
                        $('#rmf-keadaan-umum').val(data.dataAwal.keadaan_umum);
                        }
                        if (data.dataAwal.gcs != null) {
                        let html = '';
                        html = /* html */ `
                            <tr>
                                <td width="10%">GCS</td>
                                <td width="1%">:</td>
                                <td><input type="text" id="rmf-gcs" name="rmf_gcs" class="custom-form clear-input d-inline-block col-lg-5" readonly></td>
                            </tr>
                        `;
                        $('#rmf-pemeriksaan').append(html);
                        $('#rmf-gcs').val(data.dataAwal.gcs);
                        }
                        if (data.dataAwal.kesadaran != null) {
                        let html = '';
                        html = /* html */ `
                            <tr>
                                <td width="10%">Kesadaran</td>
                                <td width="1%">:</td>
                                <td><input type="text" id="rmf-kesadaran" name="rmf_kesadaran" class="custom-form clear-input d-inline-block col-lg-5" readonly></td>
                            </tr>
                        `;
                        $('#rmf-pemeriksaan').append(html);
                        $('#rmf-kesadaran').val(data.dataAwal.kesadaran);
                        }
                        if (data.dataAwal.alergi != null) {
                        let html = '';
                        html = /* html */ `
                            <tr>
                                <td width="10%">Alergi</td>
                                <td width="1%">:</td>
                                <td><input type="text" id="rmf-alergi" name="rmf_alergi" class="custom-form clear-input d-inline-block col-lg-5" readonly></td>
                            </tr>
                        `;
                        $('#rmf-pemeriksaan').append(html);
                        $('#rmf-alergi').val(data.dataAwal.alergi);
                        }
                        if (data.dataAwal.tensi_sistolik != null) {
                        let html = '';
                        html = /* html */ `
                            <tr>
                                <td width="10%">Sistolik</td>
                                <td width="1%">:</td>
                                <td>
                                    <div class="input-group">
                                        <input type="text" id="rmf-tensi-sistolik" name="rmf_tensi_sistolik" class="custom-form clear-input d-inline-block col-lg-1" readonly>
                                        <div class="input-group-append">
                                            <span class="input-group-custom">mmHg</span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `;
                        $('#rmf-pemeriksaan').append(html);
                        $('#rmf-tensi-sistolik').val(data.dataAwal.tensi_sistolik);
                        }
                        if (data.dataAwal.tensi_diastolik != null) {
                        let html = '';
                        html = /* html */ `
                            <tr>
                                <td width="10%">Diastolik</td>
                                <td width="1%">:</td>
                                <td>
                                    <div class="input-group">
                                        <input type="text" id="rmf-tensi-diastolik" name="rmf_tensi_diastolik" class="custom-form clear-input d-inline-block col-lg-1" readonly>
                                        <div class="input-group-append">
                                            <span class="input-group-custom">mmHg</span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `;
                        $('#rmf-pemeriksaan').append(html);
                        $('#rmf-tensi-diastolik').val(data.dataAwal.tensi_diastolik);
                        }
                        if (data.dataAwal.suhu != null) {
                        let html = '';
                        html = /* html */ `
                            <tr>
                                <td width="10%">Suhu</td>
                                <td width="1%">:</td>
                                <td>
                                    <div class="input-group">
                                        <input type="text" id="rmf-suhu" name="rmf_suhu" class="custom-form clear-input d-inline-block col-lg-1" readonly>
                                        <div class="input-group-append">
                                            <span class="input-group-custom">°C</span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `;
                        $('#rmf-pemeriksaan').append(html);
                        $('#rmf-suhu').val(data.dataAwal.suhu);
                        }
                        if (data.dataAwal.nadi != null) {
                        let html = '';
                        html = /* html */ `
                            <tr>
                                <td width="10%">Nadi</td>
                                <td width="1%">:</td>
                                <td>
                                    <div class="input-group">
                                        <input type="text" id="rmf-nadi" name="rmf_nadi" class="custom-form clear-input d-inline-block col-lg-1" readonly>
                                        <div class="input-group-append">
                                            <span class="input-group-custom">/Mnt</span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `;
                        $('#rmf-pemeriksaan').append(html);
                        $('#rmf-nadi').val(data.dataAwal.nadi);
                        }
                        if (data.dataAwal.rr != null) {
                        let html = '';
                        html = /* html */ `
                            <tr>
                                <td width="10%">Respirasi Rate</td>
                                <td width="1%">:</td>
                                <td>
                                    <div class="input-group">
                                        <input type="text" id="rmf-rr" name="rmf_rr" class="custom-form clear-input d-inline-block col-lg-1" readonly>
                                        <div class="input-group-append">
                                            <span class="input-group-custom">/Mnt</span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `;
                        $('#rmf-pemeriksaan').append(html);
                        $('#rmf-rr').val(data.dataAwal.rr);
                        }
                        if (data.dataAwal.tinggi_badan != null) {
                        let html = '';
                        html = /* html */ `
                            <tr>
                                <td width="10%">Tinggi Badan</td>
                                <td width="1%">:</td>
                                <td>
                                    <div class="input-group">
                                        <input type="text" id="rmf-tinggi-badan" name="rmf_tinggi_badan" class="custom-form clear-input d-inline-block col-lg-1" readonly>
                                        <div class="input-group-append">
                                            <span class="input-group-custom">Cm</span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `;
                        $('#rmf-pemeriksaan').append(html);
                        $('#rmf-tinggi-badan').val(data.dataAwal.tinggi_badan);
                        }
                        if (data.dataAwal.berat_badan != null) {
                        let html = '';
                        html = /* html */ `
                            <tr>
                                <td width="10%">Berat Badan</td>
                                <td width="1%">:</td>
                                <td>
                                    <div class="input-group">
                                        <input type="text" id="rmf-berat-badan" name="rmf_berat_badan" class="custom-form clear-input d-inline-block col-lg-1" readonly>
                                        <div class="input-group-append">
                                            <span class="input-group-custom">Kg</span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `;
                        $('#rmf-pemeriksaan').append(html);
                        $('#rmf-berat-badan').val(data.dataAwal.berat_badan);
                        }
                        if (data.dataAwal.kepala != null) {
                        let html = '';
                        html = /* html */ `
                            <tr>
                                <td width="10%">Kepala</td>
                                <td width="1%">:</td>
                                <td><input type="text" id="rmf-kepala" name="rmf_kepala" class="custom-form clear-input d-inline-block col-lg-5" readonly></td>
                            </tr>
                        `;
                        $('#rmf-pemeriksaan').append(html);
                        $('#rmf-kepala').val(data.dataAwal.kepala);
                        }
                        if (data.dataAwal.leher != null) {
                        let html = '';
                        html = /* html */ `
                            <tr>
                                <td width="10%">Leher</td>
                                <td width="1%">:</td>
                                <td><input type="text" id="rmf-leher" name="rmf_leher" class="custom-form clear-input d-inline-block col-lg-5" readonly></td>
                            </tr>
                        `;
                        $('#rmf-pemeriksaan').append(html);
                        $('#rmf-leher').val(data.dataAwal.leher);
                        }
                        if (data.dataAwal.thorax != null) {
                        let html = '';
                        html = /* html */ `
                            <tr>
                                <td width="10%">Thorax</td>
                                <td width="1%">:</td>
                                <td><input type="text" id="rmf-thorax" name="rmf_thorax" class="custom-form clear-input d-inline-block col-lg-5" readonly></td>
                            </tr>
                        `;
                        $('#rmf-pemeriksaan').append(html);
                        $('#rmf-thorax').val(data.dataAwal.thorax);
                        }
                        if (data.dataAwal.pulmo != null) {
                        let html = '';
                        html = /* html */ `
                            <tr>
                                <td width="10%">Pulmo</td>
                                <td width="1%">:</td>
                                <td><input type="text" id="rmf-pulmo" name="rmf_pulmo" class="custom-form clear-input d-inline-block col-lg-5" readonly></td>
                            </tr>
                        `;
                        $('#rmf-pemeriksaan').append(html);
                        $('#rmf-pulmo').val(data.dataAwal.pulmo);
                        }
                        if (data.dataAwal.cor != null) {
                        let html = '';
                        html = /* html */ `
                            <tr>
                                <td width="10%">Cor</td>
                                <td width="1%">:</td>
                                <td><input type="text" id="rmf-cor" name="rmf_cor" class="custom-form clear-input d-inline-block col-lg-5" readonly></td>
                            </tr>
                        `;
                        $('#rmf-pemeriksaan').append(html);
                        $('#rmf-cor').val(data.dataAwal.cor);
                        }
                        if (data.dataAwal.abdomen != null) {
                        let html = '';
                        html = /* html */ `
                            <tr>
                                <td width="10%">Abdomen</td>
                                <td width="1%">:</td>
                                <td><input type="text" id="rmf-abdomen" name="rmf_abdomen" class="custom-form clear-input d-inline-block col-lg-5" readonly></td>
                            </tr>
                        `;
                        $('#rmf-pemeriksaan').append(html);
                        $('#rmf-abdomen').val(data.dataAwal.abdomen);
                        }
                        if (data.dataAwal.genitalia != null) {
                        let html = '';
                        html = /* html */ `
                            <tr>
                                <td width="10%">Genitalia</td>
                                <td width="1%">:</td>
                                <td><input type="text" id="rmf-genitalia" name="rmf_genitalia" class="custom-form clear-input d-inline-block col-lg-5" readonly></td>
                            </tr>
                        `;
                        $('#rmf-pemeriksaan').append(html);
                        $('#rmf-genitalia').val(data.dataAwal.genitalia);
                        }
                        if (data.dataAwal.ekstrimitas != null) {
                        let html = '';
                        html = /* html */ `
                            <tr>
                                <td width="10%">Ekstrimitas</td>
                                <td width="1%">:</td>
                                <td><input type="text" id="rmf-ekstrimitas" name="rmf_ekstrimitas" class="custom-form clear-input d-inline-block col-lg-5" readonly></td>
                            </tr>
                        `;
                        $('#rmf-pemeriksaan').append(html);
                        $('#rmf-ekstrimitas').val(data.dataAwal.ekstrimitas);
                        }
                        if (data.dataAwal.prognosis != null) {
                        let html = '';
                        html = /* html */ `
                            <tr>
                                <td width="10%">Prognosis</td>
                                <td width="1%">:</td>
                                <td><input type="text" id="rmf-prognosis" name="rmf_prognosis" class="custom-form clear-input d-inline-block col-lg-5" readonly></td>
                            </tr>
                        `;
                        $('#rmf-pemeriksaan').append(html);
                        $('#rmf-prognosis').val(data.dataAwal.prognosis);
                        }
                        if (data.dataAwal.status_mentalis != null) {
                        let html = '';
                        html = /* html */ `
                            <tr>
                                <td width="10%">Status Mentalis</td>
                                <td width="1%">:</td>
                                <td><input type="text" id="rmf-status-mentalis" name="rmf_status_mentalis" class="custom-form clear-input d-inline-block col-lg-5" readonly></td>
                            </tr>
                        `;
                        $('#rmf-pemeriksaan').append(html);
                        $('#rmf-status-mentalis').val(data.dataAwal.status_mentalis);
                        }
                        if (data.dataAwal.lingkar_kepala != null) {
                        let html = '';
                        html = /* html */ `
                            <tr>
                                <td width="10%">Lingkar Kepala</td>
                                <td width="1%">:</td>
                                <td><input type="text" id="rmf-lingkar-kepala" name="rmf_lingkar_kepala" class="custom-form clear-input d-inline-block col-lg-5" readonly></td>
                            </tr>
                        `;
                        $('#rmf-pemeriksaan').append(html);
                        $('#rmf-lingkar-kepala').val(data.dataAwal.lingkar_kepala);
                        }
                        if (data.dataAwal.status_gizi != null) {
                        let html = '';
                        html = /* html */ `
                            <tr>
                                <td width="10%">Status Gizi</td>
                                <td width="1%">:</td>
                                <td><input type="text" id="rmf-status-gizi" name="rmf_status_gizi" class="custom-form clear-input d-inline-block col-lg-5" readonly></td>
                            </tr>
                        `;
                        $('#rmf-pemeriksaan').append(html);
                        $('#rmf-status-gizi').val(data.dataAwal.status_gizi);
                        }
                        if (data.dataAwal.telinga != null) {
                        let html = '';
                        html = /* html */ `
                            <tr>
                                <td width="10%">Telinga</td>
                                <td width="1%">:</td>
                                <td><input type="text" id="rmf-telinga" name="rmf_telinga" class="custom-form clear-input d-inline-block col-lg-5" readonly></td>
                            </tr>
                        `;
                        $('#rmf-pemeriksaan').append(html);
                        $('#rmf-telinga').val(data.dataAwal.telinga);
                        }
                        if (data.dataAwal.hidung != null) {
                        let html = '';
                        html = /* html */ `
                            <tr>
                                <td width="10%">Hidung</td>
                                <td width="1%">:</td>
                                <td><input type="text" id="rmf-hidung" name="rmf_hidung" class="custom-form clear-input d-inline-block col-lg-5" readonly></td>
                            </tr>
                        `;
                        $('#rmf-pemeriksaan').append(html);
                        $('#rmf-hidung').val(data.dataAwal.hidung);
                        }
                        if (data.dataAwal.tenggorok != null) {
                        let html = '';
                        html = /* html */ `
                            <tr>
                                <td width="10%">Tenggorok</td>
                                <td width="1%">:</td>
                                <td><input type="text" id="rmf-tenggorok" name="rmf_tenggorok" class="custom-form clear-input d-inline-block col-lg-5" readonly></td>
                            </tr>
                        `;
                        $('#rmf-pemeriksaan').append(html);
                        $('#rmf-tenggorok').val(data.dataAwal.tenggorok);
                        }
                        if (data.dataAwal.mata != null) {
                        let html = '';
                        html = /* html */ `
                            <tr>
                                <td width="10%">Mata</td>
                                <td width="1%">:</td>
                                <td><input type="text" id="rmf-mata" name="rmf_mata" class="custom-form clear-input d-inline-block col-lg-5" readonly></td>
                            </tr>
                        `;
                        $('#rmf-pemeriksaan').append(html);
                        $('#rmf-mata').val(data.dataAwal.mata);
                        }
                        if (data.dataAwal.kulit_kelamin != null) {
                        let html = '';
                        html = /* html */ `
                            <tr>
                                <td width="10%">Kulit Kelamin</td>
                                <td width="1%">:</td>
                                <td><input type="text" id="rmf-kulit-kelamin" name="rmf_kulit_kelamin" class="custom-form clear-input d-inline-block col-lg-5" readonly></td>
                            </tr>
                        `;
                        $('#rmf-pemeriksaan').append(html);
                        $('#rmf-kulit-kelamin').val(data.dataAwal.kulit_kelamin);
                    }

                    // DIAGNOSA MEDIS
                    showDiagnosaMedis(data.dataAwal.id_pendaftaran);

                    // JADWAL PROGRAM TERAPI
                    $('#table-program tbody').empty();
                    if (typeof data.dataProgram !== 'undefined' || data.dataProgram !== null) {
                        let p = $('.tr-paraf').length;
                        $.each(data.dataProgram, function(i,v) {
                        let html = '';
                        html = /* html */ `
                            <tr class="tr-paraf">
                                <td><input type="text" id="rmf-program-${i}" name="rmf_program_${i}" class="custom-form clear-input d-inline-block" value="${v.nama_tindakan}" readonly></td>
                                <td width="20%" class="text-center"><input type="text" id="rmf-tanggal-program-${i}" name="rmf_tanggal_program_${i}" class="custom-form clear-input d-inline-block" value="${datefmysql(v.tanggal_tindakan)}" readonly></td>
                                <td class="text-center"><input type="checkbox" value="1" name="rmf_paraf_pasien_${i}" id="rmf-paraf-pasien-${i}"></td>
                                <td class="text-center"><input type="checkbox" value="1" name="rmf_paraf_dokter_${i}" id="rmf-paraf-dokter-${i}"></td>
                                <td class="text-center"><input type="checkbox" value="1" name="rmf_paraf_terapis_${i}" id="rmf-paraf-terapis-${i}"></td>
                            </tr>
                        `;
                        if (p > 9) return;

                        $('#table-program tbody').append(html);
                        })
                    } else {
                        $('#table-program tbody').empty();
                    }

                } else {
                    document.getElementById("rmf-status-0").checked = true;
                }

                $('#modal-rehab-medik').modal('show');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function showDiagnosaMedis(id_pendaftaran){
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pemeriksaan_poli/api/protokol_terapi/get_diagnosis_rehab_medik") ?>/id_pendaftaran/' + id_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (typeof data.dataDiagnosa !== 'undefined' || data.dataDiagnosa !== null) {
                    $.each(data.dataDiagnosa, function(i,v) {
                    let html = '';
                    html = /* html */ `
                        <div class="mb-2"><input type="text" id="rmf-diagnosa-[]" name="rmf_diagnosa_[]" class="custom-form clear-input d-inline-block col-lg-7" value="${v.sebab_sakit}${v.sebab_sakit_lain}" readonly></div>
                    `;
                    $('#rmf-diagnosa').append(html);
                    })
                } else {
                    $('#table-diagnosa').empty();
                }

                // console.log(data.dataMedik.id_rmf);

                if (typeof data.dataMedik !== 'undefined' && data.dataMedik !== null) {
                    // $('#id-rmf').val(data.dataMedik.id_rmf);
                    $('#rmf-diagnosis-fungsi').val(data.dataMedik.rmf_diagnosis_fungsi);
                    $('#rmf-rekomendasi-asessmen').val(data.dataMedik.rmf_rekomendasi_asessmen);
                    $('#rmf-evaluasi').val(data.dataMedik.rmf_evaluasi);

                    $('#rmf-instrumen-uji').val(data.dataMedik.rmf_instrumen_uji);
                    $('#rmf-hasil').val(data.dataMedik.rmf_hasil);
                    $('#rmf-kesimpulan').val(data.dataMedik.rmf_kesimpulan);

                    if (data.dataMedik.rmf_rekomendasi === '1') {
                        document.getElementById("rmf-rekomendasi-1").checked = true;
                    }
                    if (data.dataMedik.rmf_rekomendasi === '0') {
                        document.getElementById("rmf-rekomendasi-0").checked = true;
                    }
                    
                    $('#rmf-dokter').val(data.dataMedik.rmf_dokter);
                    $('#s2id_rmf-dokter a .select2c-chosen').html(data.dataMedik.nama_dokter_frm)

                    if (data.dataMedik.rmf_status !== '1') {
                        document.getElementById("rmf-status-0").checked = true;
                        // $('#btn-simpan').prop('hidden', false)
                    }else{
                        document.getElementById("rmf-status-1").checked = true;
                        // buat semua form menjadi readonly
                        resetRMF();
                    }

                    if (data.dataMedik.rmf_suspek_penyakit === '1') {
                        document.getElementById("rmf-suspek-penyakit-1").checked = true;
                    }
                    if (data.dataMedik.rmf_suspek_penyakit === '0') {
                        document.getElementById("rmf-suspek-penyakit-0").checked = true;
                    }

                    $('#rmf-permintaan-terapi').val(data.dataMedik.rmf_permintaan_terapi);
                    if (data.dataMedik.rmf_paraf_pasien_0 === '1') {
                        document.getElementById("rmf-paraf-pasien-0").checked = true;
                    }
                    if (data.dataMedik.rmf_paraf_pasien_1 === '1') {
                        document.getElementById("rmf-paraf-pasien-1").checked = true;
                    }
                    if (data.dataMedik.rmf_paraf_pasien_2 === '1') {
                        document.getElementById("rmf-paraf-pasien-2").checked = true;
                    }
                    if (data.dataMedik.rmf_paraf_pasien_3 === '1') {
                        document.getElementById("rmf-paraf-pasien-3").checked = true;
                    }
                    if (data.dataMedik.rmf_paraf_pasien_4 === '1') {
                        document.getElementById("rmf-paraf-pasien-4").checked = true;
                    }
                    if (data.dataMedik.rmf_paraf_pasien_5 === '1') {
                        document.getElementById("rmf-paraf-pasien-5").checked = true;
                    }
                    if (data.dataMedik.rmf_paraf_pasien_6 === '1') {
                        document.getElementById("rmf-paraf-pasien-6").checked = true;
                    }
                    if (data.dataMedik.rmf_paraf_pasien_7 === '1') {
                        document.getElementById("rmf-paraf-pasien-7").checked = true;
                    }
                    if (data.dataMedik.rmf_paraf_pasien_8 === '1') {
                        document.getElementById("rmf-paraf-pasien-8").checked = true;
                    }
                    if (data.dataMedik.rmf_paraf_pasien_9 === '1') {
                        document.getElementById("rmf-paraf-pasien-9").checked = true;
                    }

                    if (data.dataMedik.rmf_paraf_dokter_0 === '1') {
                        document.getElementById("rmf-paraf-dokter-0").checked = true;
                    }
                    if (data.dataMedik.rmf_paraf_dokter_1 === '1') {
                        document.getElementById("rmf-paraf-dokter-1").checked = true;
                    }
                    if (data.dataMedik.rmf_paraf_dokter_2 === '1') {
                        document.getElementById("rmf-paraf-dokter-2").checked = true;
                    }
                    if (data.dataMedik.rmf_paraf_dokter_3 === '1') {
                        document.getElementById("rmf-paraf-dokter-3").checked = true;
                    }
                    if (data.dataMedik.rmf_paraf_dokter_4 === '1') {
                        document.getElementById("rmf-paraf-dokter-4").checked = true;
                    }
                    if (data.dataMedik.rmf_paraf_dokter_5 === '1') {
                        document.getElementById("rmf-paraf-dokter-5").checked = true;
                    }
                    if (data.dataMedik.rmf_paraf_dokter_6 === '1') {
                        document.getElementById("rmf-paraf-dokter-6").checked = true;
                    }
                    if (data.dataMedik.rmf_paraf_dokter_7 === '1') {
                        document.getElementById("rmf-paraf-dokter-7").checked = true;
                    }
                    if (data.dataMedik.rmf_paraf_dokter_8 === '1') {
                        document.getElementById("rmf-paraf-dokter-8").checked = true;
                    }
                    if (data.dataMedik.rmf_paraf_dokter_9 === '1') {
                        document.getElementById("rmf-paraf-dokter-9").checked = true;
                    }
                    
                    if (data.dataMedik.rmf_paraf_terapis_0 === '1') {
                        document.getElementById("rmf-paraf-terapis-0").checked = true;
                    }
                    if (data.dataMedik.rmf_paraf_terapis_1 === '1') {
                        document.getElementById("rmf-paraf-terapis-1").checked = true;
                    }
                    if (data.dataMedik.rmf_paraf_terapis_2 === '1') {
                        document.getElementById("rmf-paraf-terapis-2").checked = true;
                    }
                    if (data.dataMedik.rmf_paraf_terapis_3 === '1') {
                        document.getElementById("rmf-paraf-terapis-3").checked = true;
                    }
                    if (data.dataMedik.rmf_paraf_terapis_4 === '1') {
                        document.getElementById("rmf-paraf-terapis-4").checked = true;
                    }
                    if (data.dataMedik.rmf_paraf_terapis_5 === '1') {
                        document.getElementById("rmf-paraf-terapis-5").checked = true;
                    }
                    if (data.dataMedik.rmf_paraf_terapis_6 === '1') {
                        document.getElementById("rmf-paraf-terapis-6").checked = true;
                    }
                    if (data.dataMedik.rmf_paraf_terapis_7 === '1') {
                        document.getElementById("rmf-paraf-terapis-7").checked = true;
                    }
                    if (data.dataMedik.rmf_paraf_terapis_8 === '1') {
                        document.getElementById("rmf-paraf-terapis-8").checked = true;
                    }
                    if (data.dataMedik.rmf_paraf_terapis_9 === '1') {
                        document.getElementById("rmf-paraf-terapis-9").checked = true;
                    }
                } else {
                    document.getElementById("rmf-status-0").checked = true;
                }
        
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function resetModalRehabMedik() {
        $('#id-rmf').val('')
        $('#rmf-pemeriksaan').empty()
        $('#rmf-diagnosa').empty()
        $('#form-rehab-medik')[0].reset()
        $('.checked').prop('checked', false)
        $('#rmf-dokter').val('')
        $('#s2id_rmf-dokter a .select2c-chosen').html('')
        $('#table-program tbody').empty();
        // $('#btn-cetak').prop('hidden', true)
        // $('#btn-simpan').prop('hidden', true)
    }

    function resetRMF(){
        $('#id-rmf-log').val('')
        $('#rmf-diagnosis-fungsi').val('')
        $('#rmf-rekomendasi-asessmen').val('')
        $('#rmf-evaluasi').val('')
        $('#rmf-suspek-penyakit-1').prop('checked', false)
        $('#rmf-suspek-penyakit-0').prop('checked', false)
        $('#rmf-permintaan-terapi').val('')

        $('#rmf-paraf-pasien-0').prop('checked', false)
        $('#rmf-paraf-pasien-1').prop('checked', false)
        $('#rmf-paraf-pasien-2').prop('checked', false)
        $('#rmf-paraf-pasien-3').prop('checked', false)
        $('#rmf-paraf-pasien-4').prop('checked', false)
        $('#rmf-paraf-pasien-5').prop('checked', false)
        $('#rmf-paraf-pasien-6').prop('checked', false)
        $('#rmf-paraf-pasien-7').prop('checked', false)
        $('#rmf-paraf-pasien-8').prop('checked', false)
        $('#rmf-paraf-pasien-9').prop('checked', false)

        $('#rmf-paraf-dokter-0').prop('checked', false)
        $('#rmf-paraf-dokter-1').prop('checked', false)
        $('#rmf-paraf-dokter-2').prop('checked', false)
        $('#rmf-paraf-dokter-3').prop('checked', false)
        $('#rmf-paraf-dokter-4').prop('checked', false)
        $('#rmf-paraf-dokter-5').prop('checked', false)
        $('#rmf-paraf-dokter-6').prop('checked', false)
        $('#rmf-paraf-dokter-7').prop('checked', false)
        $('#rmf-paraf-dokter-8').prop('checked', false)
        $('#rmf-paraf-dokter-9').prop('checked', false)

        $('#rmf-paraf-terapis-0').prop('checked', false)
        $('#rmf-paraf-terapis-1').prop('checked', false)
        $('#rmf-paraf-terapis-2').prop('checked', false)
        $('#rmf-paraf-terapis-3').prop('checked', false)
        $('#rmf-paraf-terapis-4').prop('checked', false)
        $('#rmf-paraf-terapis-5').prop('checked', false)
        $('#rmf-paraf-terapis-6').prop('checked', false)
        $('#rmf-paraf-terapis-7').prop('checked', false)
        $('#rmf-paraf-terapis-8').prop('checked', false)
        $('#rmf-paraf-terapis-9').prop('checked', false)

        $('#rmf-instrumen-uji').val('')
        $('#rmf-hasil').val('')
        $('#rmf-kesimpulan').val('')
        $('#rmf-rekomendasi-1').prop('checked', false)
        $('#rmf-rekomendasi-0').prop('checked', false)
        $('#rmf-dokter').val('')
        $('#s2id_rmf-dokter a .select2c-chosen').html('')
        // $('#btn-cetak').prop('hidden', true)
        // $('#btn-simpan').prop('hidden', false)
    }

    function historyFmr(id_pendaftaran, noReM) {
        console.log(noReM);
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pemeriksaan_poli/api/protokol_terapi/get_history_rehab_medik") ?>/id_pendaftaran/' + id_pendaftaran + '/noReM/' + noReM,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                // alert("bisa");
                // console.log(data);
                $('#tabel-hisory-rehab-medik tbody').empty();
                $.each(data, function(i, v) {
                    let html = /* html */ `
                            <tr>
                                <td>${i +1}</td>
                                <td>${datetimefmysql(v.created_at)}</td>
                                <td>${v.no_rm}</td>
                                <td>${v.nama}</td>
                                <td>${v.nama_dokter_frm}</td>
                                <td><button type="button" class="ml-2 btn btn-secondary btn-xxs" onclick="detailFRM(${v.id_rmf_log})"><i class="fas fa-eye m-r-5"></i>Detail Rehabilitas Medik</button></td>
                            </tr>
                        `;

                    $('#tabel-hisory-rehab-medik tbody').append(html);
                });
                $('#modal-hisory-rehab-medik').modal('show');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }
    
    function detailFRM(id_rmf_log) {
        resetDetailRehabMedik()
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pemeriksaan_poli/api/protokol_terapi/get_detail_history_rehab_medik") ?>/id_rmf_log/' + id_rmf_log,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            // success: function(data){
            //     alert("tinggal input data sesuai id yg ada di modal detail");
            //     console.log(data);
            // },
            success: function(data) {
                $('#id-rmf-log').val(data.id_rmf_log);
                $('#modal-detail-history-rehab-medik-title').html(`<h4 class="modal-title" id="modal-kunjungan-label"><span id="judul-kunjungan"></span></h4> <b>Form Rehabilitas Medik</b> |  No. RM: ${data.no_rm}, Nama: ${data.nama}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${data.telp}</b></i>`);
                $('#drmf-tanggal-pelayanan').html(datetimefmysql(data.rmf_tanggal_pelayanan));
                $('#drmf-anamnesa').html(data.rmf_keadaan_umum);

                if (data.rmf_keadaan_umum != null) {
                let html = '';
                html = /* html */ `
                    <tr>
                        <td width="10%">Keadaan Umum</td>
                        <td width="1%">:</td>
                        <td><span id="drmf-keadaan-umum"></span></td>
                    </tr>
                `;
                $('#drmf-pemeriksaan').append(html);
                $('#drmf-keadaan-umum').html(data.rmf_keadaan_umum);
                }
                if (data.rmf_gcs != null) {
                let html = '';
                html = /* html */ `
                    <tr>
                        <td width="10%">GCS</td>
                        <td width="1%">:</td>
                        <td><span id="drmf-gcs"></span></td>
                    </tr>
                `;
                $('#drmf-pemeriksaan').append(html);
                $('#drmf-gcs').html(data.rmf_gcs);
                }
                if (data.rmf_kesadaran != null) {
                let html = '';
                html = /* html */ `
                    <tr>
                        <td width="10%">Kesadaran</td>
                        <td width="1%">:</td>
                        <td><span id="drmf-kesadaran"></span></td>
                    </tr>
                `;
                $('#drmf-pemeriksaan').append(html);
                $('#drmf-kesadaran').html(data.rmf_kesadaran);
                }
                if (data.rmf_alergi != null) {
                let html = '';
                html = /* html */ `
                    <tr>
                        <td width="10%">Alergi</td>
                        <td width="1%">:</td>
                        <td><span id="drmf-alergi"></span></td>
                    </tr>
                `;
                $('#drmf-pemeriksaan').append(html);
                $('#drmf-alergi').html(data.rmf_alergi);
                }
                if (data.rmf_tensi_sistolik != null) {
                let html = '';
                html = /* html */ `
                    <tr>
                        <td width="10%">Sistolik</td>
                        <td width="1%">:</td>
                        <td><span id="drmf-tensi-sistolik"></span> mmHg</td>
                    </tr>
                `;
                $('#drmf-pemeriksaan').append(html);
                $('#drmf-tensi-sistolik').html(data.rmf_tensi_sistolik);
                }
                if (data.rmf_tensi_diastolik != null) {
                let html = '';
                html = /* html */ `
                    <tr>
                        <td width="10%">Diastolik</td>
                        <td width="1%">:</td>
                        <td><span id="drmf-tensi-diastolik"></span> mmHg</td>
                    </tr>
                `;
                $('#drmf-pemeriksaan').append(html);
                $('#drmf-tensi-diastolik').html(data.rmf_tensi_diastolik);
                }
                if (data.rmf_suhu != null) {
                let html = '';
                html = /* html */ `
                    <tr>
                        <td width="10%">Suhu</td>
                        <td width="1%">:</td>
                        <td><span id="drmf-suhu"></span> °C</td>
                    </tr>
                `;
                $('#drmf-pemeriksaan').append(html);
                $('#drmf-suhu').html(data.rmf_suhu);
                }
                if (data.rmf_nadi != null) {
                let html = '';
                html = /* html */ `
                    <tr>
                        <td width="10%">Nadi</td>
                        <td width="1%">:</td>
                        <td><span id="drmf-nadi"></span> /Mnt</td>
                    </tr>
                `;
                $('#drmf-pemeriksaan').append(html);
                $('#drmf-nadi').html(data.rmf_nadi);
                }
                if (data.rmf_rr != null) {
                let html = '';
                html = /* html */ `
                    <tr>
                        <td width="10%">Respirasi Rate</td>
                        <td width="1%">:</td>
                        <td><span id="drmf-rr"></span> /Mnt</td>
                    </tr>
                `;
                $('#drmf-pemeriksaan').append(html);
                $('#drmf-rr').html(data.rmf_rr);
                }
                if (data.rmf_tinggi_badan != null) {
                let html = '';
                html = /* html */ `
                    <tr>
                        <td width="10%">Tinggi Badan</td>
                        <td width="1%">:</td>
                        <td><span id="drmf-tinggi-badan"></span> Cm</td>
                    </tr>
                `;
                $('#drmf-pemeriksaan').append(html);
                $('#drmf-tinggi-badan').html(data.rmf_tinggi_badan);
                }
                if (data.rmf_berat_badan != null) {
                let html = '';
                html = /* html */ `
                    <tr>
                        <td width="10%">Berat Badan</td>
                        <td width="1%">:</td>
                        <td><span id="drmf-berat-badan"></span> Kg</td>
                    </tr>
                `;
                $('#drmf-pemeriksaan').append(html);
                $('#drmf-berat-badan').html(data.rmf_berat_badan);
                }
                if (data.rmf_kepala != null) {
                let html = '';
                html = /* html */ `
                    <tr>
                        <td width="10%">Kepala</td>
                        <td width="1%">:</td>
                        <td><span id="drmf-kepala"></span></td>
                    </tr>
                `;
                $('#drmf-pemeriksaan').append(html);
                $('#drmf-kepala').html(data.rmf_kepala);
                }
                if (data.rmf_leher != null) {
                let html = '';
                html = /* html */ `
                    <tr>
                        <td width="10%">Leher</td>
                        <td width="1%">:</td>
                        <td><span id="drmf-leher"></span></td>
                    </tr>
                `;
                $('#drmf-pemeriksaan').append(html);
                $('#drmf-leher').html(data.rmf_leher);
                }
                if (data.rmf_thorax != null) {
                let html = '';
                html = /* html */ `
                    <tr>
                        <td width="10%">Thorax</td>
                        <td width="1%">:</td>
                        <td><span id="drmf-thorax"></span></td>
                    </tr>
                `;
                $('#drmf-pemeriksaan').append(html);
                $('#drmf-thorax').html(data.rmf_thorax);
                }
                if (data.rmf_pulmo != null) {
                let html = '';
                html = /* html */ `
                    <tr>
                        <td width="10%">Pulmo</td>
                        <td width="1%">:</td>
                        <td><span id="drmf-pulmo"></span></td>
                    </tr>
                `;
                $('#drmf-pemeriksaan').append(html);
                $('#drmf-pulmo').html(data.rmf_pulmo);
                }
                if (data.rmf_cor != null) {
                let html = '';
                html = /* html */ `
                    <tr>
                        <td width="10%">Cor</td>
                        <td width="1%">:</td>
                        <td><span id="drmf-cor"></span></td>
                    </tr>
                `;
                $('#drmf-pemeriksaan').append(html);
                $('#drmf-cor').html(data.rmf_cor);
                }
                if (data.rmf_abdomen != null) {
                let html = '';
                html = /* html */ `
                    <tr>
                        <td width="10%">Abdomen</td>
                        <td width="1%">:</td>
                        <td><span id="drmf-abdomen"></span></td>
                    </tr>
                `;
                $('#drmf-pemeriksaan').append(html);
                $('#drmf-abdomen').html(data.rmf_abdomen);
                }
                if (data.rmf_genitalia != null) {
                let html = '';
                html = /* html */ `
                    <tr>
                        <td width="10%">Genitalia</td>
                        <td width="1%">:</td>
                        <td><span id="drmf-genitalia"></span></td>
                    </tr>
                `;
                $('#drmf-pemeriksaan').append(html);
                $('#drmf-genitalia').html(data.rmf_genitalia);
                }
                if (data.rmf_ekstrimitas != null) {
                let html = '';
                html = /* html */ `
                    <tr>
                        <td width="10%">Ekstrimitas</td>
                        <td width="1%">:</td>
                        <td><span id="drmf-ekstrimitas"></span></td>
                    </tr>
                `;
                $('#drmf-pemeriksaan').append(html);
                $('#drmf-ekstrimitas').html(data.rmf_ekstrimitas);
                }
                if (data.rmf_prognosis != null) {
                let html = '';
                html = /* html */ `
                    <tr>
                        <td width="10%">Prognosis</td>
                        <td width="1%">:</td>
                        <td><span id="drmf-prognosis"></span></td>
                    </tr>
                `;
                $('#drmf-pemeriksaan').append(html);
                $('#drmf-prognosis').html(data.rmf_prognosis);
                }
                if (data.rmf_status_mentalis != null) {
                let html = '';
                html = /* html */ `
                    <tr>
                        <td width="10%">Status Mentalis</td>
                        <td width="1%">:</td>
                        <td><span id="drmf-status-mentalis"></span></td>
                    </tr>
                `;
                $('#drmf-pemeriksaan').append(html);
                $('#drmf-status-mentalis').html(data.rmf_status_mentalis);
                }
                if (data.rmf_lingkar_kepala != null) {
                let html = '';
                html = /* html */ `
                    <tr>
                        <td width="10%">Lingkar Kepala</td>
                        <td width="1%">:</td>
                        <td><span id="drmf-lingkar-kepala"></span></td>
                    </tr>
                `;
                $('#drmf-pemeriksaan').append(html);
                $('#drmf-lingkar-kepala').html(data.rmf_lingkar_kepala);
                }
                if (data.rmf_status_gizi != null) {
                let html = '';
                html = /* html */ `
                    <tr>
                        <td width="10%">Status Gizi</td>
                        <td width="1%">:</td>
                        <td><span id="drmf-status-gizi"></span></td>
                    </tr>
                `;
                $('#drmf-pemeriksaan').append(html);
                $('#drmf-status-gizi').html(data.rmf_status_gizi);
                }
                if (data.rmf_telinga != null) {
                let html = '';
                html = /* html */ `
                    <tr>
                        <td width="10%">Telinga</td>
                        <td width="1%">:</td>
                        <td><span id="drmf-telinga"></span></td>
                    </tr>
                `;
                $('#drmf-pemeriksaan').append(html);
                $('#drmf-telinga').html(data.rmf_telinga);
                }
                if (data.rmf_hidung != null) {
                let html = '';
                html = /* html */ `
                    <tr>
                        <td width="10%">Hidung</td>
                        <td width="1%">:</td>
                        <td><span id="drmf-hidung"></span></td>
                    </tr>
                `;
                $('#drmf-pemeriksaan').append(html);
                $('#drmf-hidung').html(data.rmf_hidung);
                }
                if (data.rmf_tenggorok != null) {
                let html = '';
                html = /* html */ `
                    <tr>
                        <td width="10%">Tenggorok</td>
                        <td width="1%">:</td>
                        <td><span id="drmf-tenggorok"></span></td>
                    </tr>
                `;
                $('#drmf-pemeriksaan').append(html);
                $('#drmf-tenggorok').html(data.rmf_tenggorok);
                }
                if (data.rmf_mata != null) {
                let html = '';
                html = /* html */ `
                    <tr>
                        <td width="10%">Mata</td>
                        <td width="1%">:</td>
                        <td><span id="drmf-mata"></span></td>
                    </tr>
                `;
                $('#drmf-pemeriksaan').append(html);
                $('#drmf-mata').html(data.rmf_mata);
                }
                if (data.rmf_kulit_kelamin != null) {
                let html = '';
                html = /* html */ `
                    <tr>
                        <td width="10%">Kulit Kelamin</td>
                        <td width="1%">:</td>
                        <td><span id="drmf-kulit-kelamin"></span></td>
                    </tr>
                `;
                $('#drmf-pemeriksaan').append(html);
                $('#drmf-kulit-kelamin').html(data.rmf_kulit_kelamin);
                }

                // DIAGNOSA MEDIS
                $('#drmf-diagnosa').html(JSON.parse(data.rmf_diagnosa).join('<br>'));
                
                
                $('#drmf-diagnosis-fungsi').html(data.rmf_diagnosis_fungsi);
                $('#drmf-pemeriksaan-penunjang').html(data.rmf_pemeriksaan_penunjang);
                $('#drmf-tata-laksana').html(data.rmf_tata_laksana);
                $('#drmf-rekomendasi-asessmen').html(data.rmf_rekomendasi_asessmen);
                $('#drmf-evaluasi').html(data.rmf_evaluasi);
                if (data.rmf_suspek_penyakit == '1') {
                    $('#drmf-suspek-penyakit').html('Ya');
                }else{
                    $('#drmf-suspek-penyakit').html('Tidak');
                }
                $('#drmf-permintaan-terapi').html(data.rmf_permintaan_terapi);
                
                // JADWAL PROGRAM TERAPI
                if (data.rmf_program_0 !== null) {
                    $('#tr-0').prop('hidden', false);
                    $('#drmf-program-0').html(data.rmf_program_0);
                    $('#drmf-tanggal-program-0').html(datefmysql(data.rmf_tanggal_program_0));
                }
                if (data.rmf_program_1 !== null) {
                    $('#tr-1').prop('hidden', false);
                    $('#drmf-program-1').html(data.rmf_program_1);
                    $('#drmf-tanggal-program-1').html(datefmysql(data.rmf_tanggal_program_1));
                }
                if (data.rmf_program_2 !== null) {
                    $('#tr-2').prop('hidden', false);
                    $('#drmf-program-2').html(data.rmf_program_2);
                    $('#drmf-tanggal-program-2').html(datefmysql(data.rmf_tanggal_program_2));
                }
                if (data.rmf_program_3 !== null) {
                    $('#tr-3').prop('hidden', false);
                    $('#drmf-program-3').html(data.rmf_program_3);
                    $('#drmf-tanggal-program-3').html(datefmysql(data.rmf_tanggal_program_3));
                }
                if (data.rmf_program_4 !== null) {
                    $('#tr-4').prop('hidden', false);
                    $('#drmf-program-4').html(data.rmf_program_4);
                    $('#drmf-tanggal-program-4').html(datefmysql(data.rmf_tanggal_program_4));
                }
                if (data.rmf_program_5 !== null) {
                    $('#tr-5').prop('hidden', false);
                    $('#drmf-program-5').html(data.rmf_program_5);
                    $('#drmf-tanggal-program-5').html(datefmysql(data.rmf_tanggal_program_5));
                }
                if (data.rmf_program_6 !== null) {
                    $('#tr-6').prop('hidden', false);
                    $('#drmf-program-6').html(data.rmf_program_6);
                    $('#drmf-tanggal-program-6').html(datefmysql(data.rmf_tanggal_program_6));
                }
                if (data.rmf_program_7 !== null) {
                    $('#tr-7').prop('hidden', false);
                    $('#drmf-program-7').html(data.rmf_program_7);
                    $('#drmf-tanggal-program-7').html(datefmysql(data.rmf_tanggal_program_7));
                }
                if (data.rmf_program_8 !== null) {
                    $('#tr-8').prop('hidden', false);
                    $('#drmf-program-8').html(data.rmf_program_8);
                    $('#drmf-tanggal-program-8').html(datefmysql(data.rmf_tanggal_program_8));
                }
                if (data.rmf_program_9 !== null) {
                    $('#tr-9').prop('hidden', false);
                    $('#drmf-program-9').html(data.rmf_program_9);
                    $('#drmf-tanggal-program-9').html(datefmysql(data.rmf_tanggal_program_9));
                }
                
                if (data.rmf_paraf_pasien_0 == '1') {
                    $('#drmf-paraf-pasien-0').html('✓');
                }else{
                    $('#drmf-paraf-pasien-0').html('✕');
                }
                if (data.rmf_paraf_pasien_1 == '1') {
                    $('#drmf-paraf-pasien-1').html('✓');
                }else{
                    $('#drmf-paraf-pasien-1').html('✕');
                }
                if (data.rmf_paraf_pasien_2 == '1') {
                    $('#drmf-paraf-pasien-2').html('✓');
                }else{
                    $('#drmf-paraf-pasien-2').html('✕');
                }
                if (data.rmf_paraf_pasien_3 == '1') {
                    $('#drmf-paraf-pasien-3').html('✓');
                }else{
                    $('#drmf-paraf-pasien-3').html('✕');
                }
                if (data.rmf_paraf_pasien_4 == '1') {
                    $('#drmf-paraf-pasien-4').html('✓');
                }else{
                    $('#drmf-paraf-pasien-4').html('✕');
                }
                if (data.rmf_paraf_pasien_5 == '1') {
                    $('#drmf-paraf-pasien-5').html('✓');
                }else{
                    $('#drmf-paraf-pasien-5').html('✕');
                }
                if (data.rmf_paraf_pasien_6 == '1') {
                    $('#drmf-paraf-pasien-6').html('✓');
                }else{
                    $('#drmf-paraf-pasien-6').html('✕');
                }
                if (data.rmf_paraf_pasien_7 == '1') {
                    $('#drmf-paraf-pasien-7').html('✓');
                }else{
                    $('#drmf-paraf-pasien-7').html('✕');
                }
                if (data.rmf_paraf_pasien_8 == '1') {
                    $('#drmf-paraf-pasien-8').html('✓');
                }else{
                    $('#drmf-paraf-pasien-8').html('✕');
                }
                if (data.rmf_paraf_pasien_9 == '1') {
                    $('#drmf-paraf-pasien-9').html('✓');
                }else{
                    $('#drmf-paraf-pasien-9').html('✕');
                }
                if (data.rmf_paraf_dokter_0 == '1') {
                    $('#drmf-paraf-dokter-0').html('✓');
                }else{
                    $('#drmf-paraf-dokter-0').html('✕');
                }
                if (data.rmf_paraf_dokter_1 == '1') {
                    $('#drmf-paraf-dokter-1').html('✓');
                }else{
                    $('#drmf-paraf-dokter-1').html('✕');
                }
                if (data.rmf_paraf_dokter_2 == '1') {
                    $('#drmf-paraf-dokter-2').html('✓');
                }else{
                    $('#drmf-paraf-dokter-2').html('✕');
                }
                if (data.rmf_paraf_dokter_3 == '1') {
                    $('#drmf-paraf-dokter-3').html('✓');
                }else{
                    $('#drmf-paraf-dokter-3').html('✕');
                }
                if (data.rmf_paraf_dokter_4 == '1') {
                    $('#drmf-paraf-dokter-4').html('✓');
                }else{
                    $('#drmf-paraf-dokter-4').html('✕');
                }
                if (data.rmf_paraf_dokter_5 == '1') {
                    $('#drmf-paraf-dokter-5').html('✓');
                }else{
                    $('#drmf-paraf-dokter-5').html('✕');
                }
                if (data.rmf_paraf_dokter_6 == '1') {
                    $('#drmf-paraf-dokter-6').html('✓');
                }else{
                    $('#drmf-paraf-dokter-6').html('✕');
                }
                if (data.rmf_paraf_dokter_7 == '1') {
                    $('#drmf-paraf-dokter-7').html('✓');
                }else{
                    $('#drmf-paraf-dokter-7').html('✕');
                }
                if (data.rmf_paraf_dokter_8 == '1') {
                    $('#drmf-paraf-dokter-8').html('✓');
                }else{
                    $('#drmf-paraf-dokter-8').html('✕');
                }
                if (data.rmf_paraf_dokter_9 == '1') {
                    $('#drmf-paraf-dokter-9').html('✓');
                }else{
                    $('#drmf-paraf-dokter-9').html('✕');
                }
                if (data.rmf_paraf_terapis_0 == '1') {
                    $('#drmf-paraf-terapis-0').html('✓');
                }else{
                    $('#drmf-paraf-terapis-0').html('✕');
                }
                if (data.rmf_paraf_terapis_1 == '1') {
                    $('#drmf-paraf-terapis-1').html('✓');
                }else{
                    $('#drmf-paraf-terapis-1').html('✕');
                }
                if (data.rmf_paraf_terapis_2 == '1') {
                    $('#drmf-paraf-terapis-2').html('✓');
                }else{
                    $('#drmf-paraf-terapis-2').html('✕');
                }
                if (data.rmf_paraf_terapis_3 == '1') {
                    $('#drmf-paraf-terapis-3').html('✓');
                }else{
                    $('#drmf-paraf-terapis-3').html('✕');
                }
                if (data.rmf_paraf_terapis_4 == '1') {
                    $('#drmf-paraf-terapis-4').html('✓');
                }else{
                    $('#drmf-paraf-terapis-4').html('✕');
                }
                if (data.rmf_paraf_terapis_5 == '1') {
                    $('#drmf-paraf-terapis-5').html('✓');
                }else{
                    $('#drmf-paraf-terapis-5').html('✕');
                }
                if (data.rmf_paraf_terapis_6 == '1') {
                    $('#drmf-paraf-terapis-6').html('✓');
                }else{
                    $('#drmf-paraf-terapis-6').html('✕');
                }
                if (data.rmf_paraf_terapis_7 == '1') {
                    $('#drmf-paraf-terapis-7').html('✓');
                }else{
                    $('#drmf-paraf-terapis-7').html('✕');
                }
                if (data.rmf_paraf_terapis_8 == '1') {
                    $('#drmf-paraf-terapis-8').html('✓');
                }else{
                    $('#drmf-paraf-terapis-8').html('✕');
                }
                if (data.rmf_paraf_terapis_9 == '1') {
                    $('#drmf-paraf-terapis-9').html('✓');
                }else{
                    $('#drmf-paraf-terapis-9').html('✕');
                }
                
                $('#drmf-instrumen-uji').html(data.rmf_instrumen_uji);
                $('#drmf-hasil').html(data.rmf_hasil);
                $('#drmf-kesimpulan').html(data.rmf_kesimpulan);
                if (data.rmf_rekomendasi == '1') {
                    $('#drmf-rekomendasi').html('Ya');
                }else{
                    $('#drmf-rekomendasi').html('Tidak');
                }
                if (data.rmf_status == '1') {
                    $('#drmf-status').html('Selesai');
                }else{
                    $('#drmf-status').html('Belum Selesai');
                }
                $('#drmf-dokter').html(data.nama_dokter_frm);

                $('#modal-detail-history-rehab-medik').modal('show');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function resetDetailRehabMedik() {
        $('#drmf-pemeriksaan').empty()
        // $('#drmf-diagnosa').empty()
        // $('#form-rehab-medik')[0].reset()
        // $('.checked').prop('checked', false)
        // $('#id-drmf').val('')
        // $('#drmf-dokter').val('')
        // $('#s2id_drmf-dokter a .select2c-chosen').html('')
    }


</script>