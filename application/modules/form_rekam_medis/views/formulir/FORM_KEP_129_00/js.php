<script>
    var nomer = 1;
        nomer++;

    function removeList(el) {
        var parent = el.parentNode.parentNode;
        parent.parentNode.removeChild(parent);
    } 

    function removeListTable(el) {
        var parent = el.parentNode.parentNode.parentNode;
        parent.parentNode.removeChild(parent);
    }

    function timerzmysql(waktu) {
        var tm = waktu.split(':');
        return tm[0] + ':' + tm[1];
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

    function tutupRapet(title, num) {
        let html = /* html */ `
                        </div>
                    </div>
                </div>
            </div>
        `;

        return html;
    } 

    function lihatFORM_KEP_129_00(data) {
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
        entriPreeklampsiaEarly(layanan.id_pendaftaran, layanan.id, layanan.layanan,  bed, action);
    }

    function editFORM_KEP_129_00(data) {
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
        entriPreeklampsiaEarly(layanan.id_pendaftaran, layanan.id, layanan.layanan,  bed, action);
    }

    function tambahFORM_KEP_129_00(data) {
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
        entriPreeklampsiaEarly(layanan.id_pendaftaran, layanan.id, layanan.layanan, bed,  action);
    }

    function entriPreeklampsiaEarly(id_pendaftaran, id_layanan_pendaftaran, layanan,  bed, action) {
        // $('#modal_preeklampesia_early').modal('show');
        // showPreeklampsiaEarly(nomer);  
              
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
            url: '<?= base_url("pelayanan/api/pelayanan/get_data_preeklampsia_early") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                // console.log(data);
                resetPreeklampsiaEarly(); 
                $('#id-layanan-pendaftaran-pert').val(id_layanan_pendaftaran);
                $('#id-pendaftaran-pert').val(id_pendaftaran);
                
                if (data.pasien !== null) {
                    $('#id-pasien-pert').val(data.pasien.id_pasien);
                    $('#nama-pasien-pert').text(data.pasien.nama);
                    $('#no-rm-pert').text(data.pasien.no_rm);
                    $('#tgl-lahir-pert').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
                    $('#jenis-kelamin-pert').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));
                }

                // NARIK DATA
                const diagUtamaRm = [...data.ds_manual_utama].sort((a, b) => b.id_layanan_pendaftaran - a.id_layanan_pendaftaran)[0]?.nama;
                $('#edit-diagnosa-pert').html(diagUtamaRm);

                // agar muncul di pembuka namanya diley
                setTimeout(() => {
                    $('#diagnosa-pert').html(diagUtamaRm);                 
                });
                // console.log(diagUtamaRm);

                // // Di entriPreeklampsiaEarly() PERBAIKAN
                // const diagUtamaRm = [...data.ds_manual_utama]
                //     .sort((a, b) => b.id_layanan_pendaftaran - a.id_layanan_pendaftaran)[0]?.nama || '-';

                // // Tetap tampilkan di form
                // $('#edit-diagnosa-pert').html(diagUtamaRm);
                // setTimeout(() => {
                //     $('#diagnosa-pert').html(diagUtamaRm);
                // });


                // TANGGAL
                $('#data-preeklampsia-early').one('click', function() {
                        $('#tanggal-pert, #edit-tanggal-pert').datetimepicker({
                        format: 'DD/MM/YYYY',
                        maxDate: new Date(),
                        beforeShow: function(i) {
                            if ($(i).attr('readonly')) {
                                return false;
                            }
                        }
                    });
                })

                // JAM
                $('#data-preeklampsia-early').one('click', function()  {
                    $('#jam-pert, #edit-jam-pert' )
                    .on('click', function() {
                        $(this).timepicker({
                            format: 'HH:mm',
                            showInputs: false,
                            showMeridian: false
                        });
                    })
                })
            
                // Perawat
                $('#data-preeklampsia-early').one('click', function() {
                    $('#perawat-pert, #edit-perawat-pert')
                    .select2c({
                        ajax: {
                            url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                            dataType: 'json',
                            quietMillis: 100,
                            data: function(term,
                                page) { // page is the one-based page number tracked by Select2
                                return {
                                    q: term, //search term
                                    page: page, // page number
                                    jenis: $('#c_profesi').val(),
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
                            var markup = data.nama + '<br/><i>' + data.spesialisasi + '</i>';
                            return markup;
                        },
                        formatSelection: function(data) {
                            return data.nama;
                        }
                    });
                })


                if (typeof data.preeklampsia_early !== 'undefined' && data.preeklampsia_early !== null) {
                    showPreeklampsiaEarlyRecognition(data.preeklampsia_early, id_pendaftaran, id_layanan_pendaftaran, bed, action);
                    showPreeklampsiaEarly(nomer);                 
                } else {
                    $('#tabel-pert .body-table').empty();
                }


                $('#bed-pert').text(bed);
               
                $('#modal_preeklampesia_early').modal('show');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })
    }

    function showPreeklampsiaEarly(num) {
        let html = bukaLebar('Form Preeklampsia Early Recognition Tool (PERT)');
        html += /* html */ `
            <div class="modal-body"> 
                <div class="row">
                    <hr>
                    <table class="table table-sm table-striped table-bordered" style="margin-top: -15px">
                        <thead>
                            <tr>
                                <td width="30%"> <b>TANGGAL 
                                    <input type="text" name="tanggal_pert"id="tanggal-pert" class="custom-form clear-input d-inline-block col-lg-3 ml-2" placeholder="dd/mm/yyyy">
                                </td>
                                <td width="30%">  <b>JAM
                                    <input type="text" name="jam_pert"id="jam-pert" class="custom-form clear-input d-inline-block col-lg-2 ml-2" placeholder="hh/ii">
                                </td>
                                <td width="30%"> <b>DIAGNOSIS   : 
                                    <label id="diagnosa-pert"> </label>
                                </td>
                            </tr>
                        </thead>
                    </table>
                    <br>
                    <table class="table table-sm table-striped table-bordered" style="margin-top: -15px">
                        <thead>
                            <tr>
                                <td width="15%" class="center" style="background-color: #D3D3D3; color: black;"> <b> PENILAIAN </b></td>
                                <td width="15%" class="center" style="background-color: #00FF00; color: black;"> <b> NORMAL </td>
                                <td width="2%" class="center" style="background-color: #00FF00; color: black;"> <b> V </td>
                                <td width="15%" class="center" style="background-color: #FFFF00; color: black;"> <b> MENGKHAWATIRKAN </td>
                                <td width="2%" class="center" style="background-color: #FFFF00; color: black;"> <b> V </td>
                                <td width="15%" class="center" style="background-color: #FF4500; color: black;"> <b> BAHAYA </td>
                                <td width="2%" class="center" style="background-color: #FF4500; color: black;"> <b> V </td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="center"> <b> Kesadaran </td> 
                                <td class="center"> Sadar </td> 
                                <td class="center" style="background-color: #00FF00; color: black;">
                                    <input type="checkbox" name="hijau_1 "id="hijau-1" value="1"class="mr-1">
                                </td> 
                                <td class="center">Gelisah <br> Mengantuk <br> Sulit berbicara  </td> 
                                <td class="center" style="background-color: #FFFF00; color: black;">
                                    <input type="checkbox" name="kuning_1 "id="kuning-1" value="1"class="mr-1">
                                </td> 
                                <td class="center"> Tidak memberikan <br> respon </td> 
                                <td class="center" style="background-color: #FF4500; color: black;">
                                    <input type="checkbox" name="merah_1 "id="merah-1" value="1"class="mr-1">
                                </td> 
                            </tr>   
                             <tr>
                                <td class="center"> <b> Nyeri kepala </td> 
                                <td class="center"> Tidak ada </td> 
                                <td class="center" style="background-color: #00FF00; color: black;">
                                    <input type="checkbox" name="hijau_2 "id="hijau-2" value="1"class="mr-1">
                                </td> 
                                <td class="center">Gelisah <br> Ringan <br> Mual/muntah  </td> 
                                <td class="center" style="background-color: #FFFF00; color: black;">
                                    <input type="checkbox" name="kuning_2 "id="kuning-2" value="1"class="mr-1">
                                </td> 
                                <td class="center"> Nyeri kepala hebat </td> 
                                <td class="center" style="background-color: #FF4500; color: black;">
                                    <input type="checkbox" name="merah_2 "id="merah-2" value="1"class="mr-1">
                                </td> 
                            </tr> 
                             <tr>
                                <td class="center"> <b> Pandangan  </td> 
                                <td class="center"> Normal </td> 
                                <td class="center" style="background-color: #00FF00; color: black;">
                                    <input type="checkbox" name="hijau_3 "id="hijau-3" value="1"class="mr-1">
                                </td> 
                                <td class="center">Gelisah <br> Kabur atau  <br> terganggu </td> 
                                <td class="center" style="background-color: #FFFF00; color: black;">
                                    <input type="checkbox" name="kuning_3 "id="kuning-3" value="1"class="mr-1">
                                </td> 
                                <td class="center"> Buta  </td> 
                                <td class="center" style="background-color: #FF4500; color: black;">
                                    <input type="checkbox" name="merah_3 "id="merah-3" value="1"class="mr-1">
                                </td> 
                            </tr> 
                             <tr>
                                <td class="center"> <b> TD sistolik </td> 
                                <td class="center"> 100-139 </td> 
                                <td class="center" style="background-color: #00FF00; color: black;">
                                    <input type="checkbox" name="hijau_4 "id="hijau-4" value="1"class="mr-1">
                                </td> 
                                <td class="center"> ≥155-159</td> 
                                <td class="center" style="background-color: #FFFF00; color: black;">
                                    <input type="checkbox" name="kuning_4 "id="kuning-4" value="1"class="mr-1">
                                </td> 
                                <td class="center"> ≥160  </td> 
                                <td class="center" style="background-color: #FF4500; color: black;">
                                    <input type="checkbox" name="merah_4 "id="merah-4" value="1"class="mr-1">
                                </td> 
                            </tr> 
                             <tr>
                                <td class="center"> <b> TD diastolik </td> 
                                <td class="center"> 50-89 </td> 
                                <td class="center" style="background-color: #00FF00; color: black;">
                                    <input type="checkbox" name="hijau_5 "id="hijau-5" value="1"class="mr-1">
                                </td> 
                                <td class="center"> 90-109 </td> 
                                <td class="center" style="background-color: #FFFF00; color: black;">
                                    <input type="checkbox" name="kuning_5 "id="kuning-5" value="1"class="mr-1">
                                </td> 
                                <td class="center"> ≥110 </td> 
                                <td class="center" style="background-color: #FF4500; color: black;">
                                    <input type="checkbox" name="merah_5 "id="merah-5" value="1"class="mr-1">
                                </td> 
                            </tr> 
                             <tr>
                                <td class="center"> <b> HR </td> 
                                <td class="center"> 61-110 </td> 
                                <td class="center" style="background-color: #00FF00; color: black;">
                                    <input type="checkbox" name="hijau_6 "id="hijau-6" value="1"class="mr-1">
                                </td> 
                                <td class="center"> 110-120 </td> 
                                <td class="center" style="background-color: #FFFF00; color: black;">
                                    <input type="checkbox" name="kuning_6 "id="kuning-6" value="1"class="mr-1">
                                </td> 
                                <td class="center"> ≥120 </td> 
                                <td class="center" style="background-color: #FF4500; color: black;">
                                    <input type="checkbox" name="merah_6 "id="merah-6" value="1"class="mr-1">
                                </td> 
                            </tr> 
                             <tr>
                                <td class="center"> <b> RR </td> 
                                <td class="center"> 11-24 </td> 
                                <td class="center" style="background-color: #00FF00; color: black;">
                                    <input type="checkbox" name="hijau_7 "id="hijau-7" value="1"class="mr-1">
                                </td> 
                                <td class="center"> <12 atau 25-30  </td> 
                                <td class="center" style="background-color: #FFFF00; color: black;">
                                    <input type="checkbox" name="kuning_7 "id="kuning-7" value="1"class="mr-1">
                                </td> 
                                <td class="center"> <10 atau >30 </td> 
                                <td class="center" style="background-color: #FF4500; color: black;">
                                    <input type="checkbox" name="merah_7 "id="merah-7" value="1"class="mr-1">
                                </td> 
                            </tr> 
                             <tr>
                                <td class="center"> <b> Sesak nafas </td> 
                                <td class="center"> Tidak  </td> 
                                <td class="center" style="background-color: #00FF00; color: black;">
                                    <input type="checkbox" name="hijau_8 "id="hijau-8" value="1"class="mr-1">
                                </td> 
                                <td class="center"> Ya </td> 
                                <td class="center" style="background-color: #FFFF00; color: black;">
                                    <input type="checkbox" name="kuning_8 "id="kuning-8" value="1"class="mr-1">
                                </td> 
                                <td class="center"> Ya</td> 
                                <td class="center" style="background-color: #FF4500; color: black;">
                                    <input type="checkbox" name="merah_8 "id="merah-8" value="1"class="mr-1">
                                </td> 
                            </tr> 
                             <tr>
                                <td class="center"> <b> Saturasi O2 </td> 
                                <td class="center"> ≥95 </td> 
                                <td class="center" style="background-color: #00FF00; color: black;">
                                    <input type="checkbox" name="hijau_9 "id="hijau-9" value="1"class="mr-1">
                                </td> 
                                <td class="center"> <95 </td> 
                                <td class="center" style="background-color: #FFFF00; color: black;">
                                    <input type="checkbox" name="kuning_9 "id="kuning-9" value="1"class="mr-1">
                                </td> 
                                <td class="center"> <93 </td> 
                                <td class="center" style="background-color: #FF4500; color: black;">
                                    <input type="checkbox" name="merah_9 "id="merah-9" value="1"class="mr-1">
                                </td> 
                            </tr> 
                             <tr>
                                <td class="center"> <b> Nyeri (abdomen atau dada)</td> 
                                <td class="center"> Tidak </td> 
                                <td class="center" style="background-color: #00FF00; color: black;">
                                    <input type="checkbox" name="hijau_10 "id="hijau-10" value="1"class="mr-1">
                                </td> 
                                <td class="center"> Mual/muntah <br> Nyeri dada <br> Nyeri abdomen  </td> 
                                <td class="center" style="background-color: #FFFF00; color: black;">
                                    <input type="checkbox" name="kuning_10 "id="kuning-10" value="1"class="mr-1">
                                </td> 
                                <td class="center"> Mual/muntah <br> Nyeri dada <br> Nyeri abdomen  </td> 
                                <td class="center" style="background-color: #FF4500; color: black;">
                                    <input type="checkbox" name="merah_10 "id="merah-10" value="1"class="mr-1">
                                </td> 
                            </tr> 
                             <tr>
                                <td class="center"> <b> Kondisi janin </td> 
                                <td class="center"> Reaktif/kategori 1 </td> 
                                <td class="center" style="background-color: #00FF00; color: black;">
                                    <input type="checkbox" name="hijau_11 "id="hijau-11" value="1"class="mr-1">
                                </td> 
                                <td class="center"> Non-reaktif <br> Kategori 2 IUGR </td> 
                                <td class="center" style="background-color: #FFFF00; color: black;">
                                    <input type="checkbox" name="kuning_11 "id="kuning-11" value="1"class="mr-1">
                                </td> 
                                <td class="center"> Kategori 3 </td> 
                                <td class="center" style="background-color: #FF4500; color: black;">
                                    <input type="checkbox" name="merah_11 "id="merah-11" value="1"class="mr-1">
                                </td> 
                            </tr> 
                             <tr>
                                <td class="center"> <b> Urine (ml/jam)</td> 
                                <td class="center"> ≥50 </td> 
                                <td class="center" style="background-color: #00FF00; color: black;">
                                    <input type="checkbox" name="hijau_12 "id="hijau-12" value="1"class="mr-1">
                                </td> 
                                <td class="center"> 35-49 </td> 
                                <td class="center" style="background-color: #FFFF00; color: black;">
                                    <input type="checkbox" name="kuning_12 "id="kuning-12" value="1"class="mr-1">
                                </td> 
                                <td class="center"> <35 (dalam 2 jam) </td> 
                                <td class="center" style="background-color: #FF4500; color: black;">
                                    <input type="checkbox" name="merah_12 "id="merah-12" value="1"class="mr-1">
                                </td> 
                            </tr> 
                             <tr>
                                <td class="center"> <b> Proteinuria </td> 
                                <td class="center"> trace </td> 
                                <td class="center" style="background-color: #00FF00; color: black;">
                                    <input type="checkbox" name="hijau_13 "id="hijau-13" value="1"class="mr-1">
                                </td> 
                                <td class="center"> Dipstick ≥+1 <br> ≥300mg/24jam </td> 
                                <td class="center" style="background-color: #FFFF00; color: black;">
                                    <input type="checkbox" name="kuning_13 "id="kuning-13" value="1"class="mr-1">
                                </td> 
                                <td class="center"> Protein/creatinine  <br> ration (PCR) > 0.3 <br> Dipstick ≥+2 </td> 
                                <td class="center" style="background-color: #FF4500; color: black;">
                                    <input type="checkbox" name="merah_13 "id="merah-13" value="1"class="mr-1">
                                </td> 
                            </tr> 
                             <tr>
                                <td class="center"> <b> Trombosit  </td> 
                                <td class="center"> >100 </td> 
                                <td class="center" style="background-color: #00FF00; color: black;">
                                    <input type="checkbox" name="hijau_14 "id="hijau-14" value="1"class="mr-1">
                                </td> 
                                <td class="center"> 50-100 </td> 
                                <td class="center" style="background-color: #FFFF00; color: black;">
                                    <input type="checkbox" name="kuning_14 "id="kuning-14" value="1"class="mr-1">
                                </td> 
                                <td class="center"> <50 </td> 
                                <td class="center" style="background-color: #FF4500; color: black;">
                                    <input type="checkbox" name="merah_14 "id="merah-14" value="1"class="mr-1">
                                </td> 
                            </tr> 
                             <tr>
                                <td class="center"> <b> SGOT/SGPT </td> 
                                <td class="center"> <70 </td> 
                                <td class="center" style="background-color: #00FF00; color: black;">
                                    <input type="checkbox" name="hijau_15 "id="hijau-15" value="1"class="mr-1">
                                </td> 
                                <td class="center"> >70 </td> 
                                <td class="center" style="background-color: #FFFF00; color: black;">
                                    <input type="checkbox" name="kuning_15 "id="kuning-15" value="1"class="mr-1">
                                </td> 
                                <td class="center"> >70 </td> 
                                <td class="center" style="background-color: #FF4500; color: black;">
                                    <input type="checkbox" name="merah_15 "id="merah-15" value="1"class="mr-1">
                                </td> 
                            </tr> 
                             <tr>
                                <td class="center"> <b> Creatinine  </td> 
                                <td class="center"> ≤0.8 </td> 
                                <td class="center" style="background-color: #00FF00; color: black;">
                                    <input type="checkbox" name="hijau_16 "id="hijau-16" value="1"class="mr-1">
                                </td> 
                                <td class="center"> 0.9 - 1.1  </td> 
                                <td class="center" style="background-color: #FFFF00; color: black;">
                                    <input type="checkbox" name="kuning_16 "id="kuning-16" value="1"class="mr-1">
                                </td> 
                                <td class="center"> ≥1.1 </td> 
                                <td class="center" style="background-color: #FF4500; color: black;">
                                    <input type="checkbox" name="merah_16 "id="merah-16" value="1"class="mr-1">
                                </td> 
                            </tr> 
                             <tr>
                                <td class="center"> <b> Tanda toksisitas MgSO4  </td> 
                                <td class="center"> RR 16-20 <br> Reflex patella + </td> 
                                <td class="center" style="background-color: #00FF00; color: black;">
                                    <input type="checkbox" name="hijau_17 "id="hijau-17" value="1"class="mr-1">
                                </td> 
                                <td class="center"> Reflex patella  <br> Menurun </td> 
                                <td class="center" style="background-color: #FFFF00; color: black;">
                                    <input type="checkbox" name="kuning_17 "id="kuning-17" value="1"class="mr-1">
                                </td> 
                                <td class="center"> RR<12 </td> 
                                <td class="center" style="background-color: #FF4500; color: black;">
                                    <input type="checkbox" name="merah_17 "id="merah-17" value="1"class="mr-1">
                                </td> 
                            </tr>     
                        </tbody>  
                    </table>
                    <table class="table table-sm table-striped table-bordered" style="margin-top: -15px">
                        <thead>
                            <tr>
                                <td width="30%" style="background-color: #00FF00; color: black;"> <b> HIJAU : Normal lanjutkan observasi dengan kehati-hatian tinggi                                 
                                </td>
                                <td width="30%" style="background-color: #FFFF00; color: black;"> <b> KUNING : Mengkhawatirkan - tingkatkan frekuensi observasi 1 atau 2 pemicu tambahan - naikan kewaspadaan menjadi MERAH
                                </td>
                                <td width="30%" style="background-color: #FF4500; color: black;"> <b> MERAH : Bahaya - lakukan penilaian ulang segera, aktivasi tim emergensi, perawatan HCU
                                </td
                            </tr>
                        </thead>
                    </table>
                    <table class="table table-no-border table-sm table-striped">
                        <tbody>
                            <tr>
                                <td> <b> Perawat</td>
                                <td colspan="2">
                                    <div class="input-group">
                                        <input type="text" name="perawat_pert" id="perawat-pert" class="select2c-input ml-2">  
                                    </div>
                                </td>
                            </tr>
                            <p>
                            <tr>
                                <td colspan="8">
                                    <button type="button" title="Tambah Preeklampsia Early Recognition Tool (PERT)" class="btn btn-info" onclick="tambahPreeklampsiaEarly()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah Preeklampsia Early Recognition Tool (PERT)</button>
                                </td>
                            </tr>
                        </tbody>                      
                    </table>
                    <table class="table table-no-border table-sm table-striped">
                        <tbody>
                            <tr>
                                <td colspan="8" style="text-align: right;">
                                    <p class="page__number" style="margin: 0;">HARAP DI PERHATIKAN <span style="font-weight: bold; color: red;">SEBELUM *KONFIRMASI* KLIK *TAMBAH PREEKLAMPSIA EARLY RECOGNITION TOOL (PERT)* TERLEBIH DAHULU..!!!</span></p>
                                </td>
                            </tr>
                        </tbody>                      
                    </table> 
                </div>
            </div>
        `;           
        html += tutupRapet();
        $('#buka-tutup-pert').append(html);
    }

    function formatTanggalKhusus(waktu) {
        var el = waktu.split('-');
        var tahun = el[0];
        var bulan = el[1];
        var hari = el[2];
        return hari + '/' + bulan + '/' + tahun;
    }

    function showPreeklampsiaEarlyRecognition(data, id_pendaftaran, id_layanan_pendaftaran, bed, action) {
        $('#tabel-pert .body-table').empty();
        if (data !== null) {
            $.each(data, function(i, v) {
                let btnAksesLihat = '';
                if (action != 'lihat') {
                    btnAksesLihat = '<button type="button" class="btn btn-secondary btn-xs" onclick="editPreeklampsiaEarly(this, ' +
                    v.id + ', ' + id_pendaftaran + ', ' + id_layanan_pendaftaran + ', \'' + bed +
                    '\')"><i class="fas fa-edit"></i> Edit</button> <button type="button" class="btn btn-secondary btn-xs" onclick="hapusPreeklampsiaEarly(this, ' +
                    v.id +
                    ')"> <i class="fas fa-trash-alt"></i> Hapus</button>';
                }
                const selOp =
                '<td align="center"><button type="button" class="btn btn-secondary btn-xs" onclick="lihatPreeklampsiaEarly(this, ' +
                v.id + ', ' + id_pendaftaran + ', ' + id_layanan_pendaftaran + ', \'' + bed +
                '\')"><i class="fas fa-eye"></i> Lihat</button>' +
                btnAksesLihat + 
                '</td>';

                let html = /* html */ `
                    <tr>
                        <td class="number-terapi" align="center">${(++i)}</td>
                        <td align="center">` + ((v.tanggal_pert !== null) ? formatTanggalKhusus(v.tanggal_pert) : '') + `</td>
                        <td align="center">${v.jam_pert || '-'}</td>                       
                        <td align="center">${v.perawat || '-'}</td>                            
                        <td align="center">${v.akun_user}</td>
                        ${selOp}
                    </tr>
                `;
                $('#tabel-pert tbody').append(html);
                numberPert = i;
            })
        }
    }

    function konfirmasiSimpanPreeklampsiaEarly() {

        if ($('#tanggal-pert').val() === '') {
            syams_validation('#tanggal-pert', 'Tanggal harus diisi.');
            return false;
        } else {
            syams_validation_remove('#tanggal-pert');
        }

        swal.fire({
            title: 'Konfirmasi',
            text: "Apakah anda yakin akan menyimpan data ini ?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-fw fa-save mr-1"></i>Simpan',
            cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                simpanPreeklampsiaEarly();
            }
        })
    }

    function simpanPreeklampsiaEarly() {
        var id_layanan_pendaftaran_pert = $('#id-layanan-pendaftaran-pert').val(); 
        $.ajax({
            type: 'POST',
            url: '<?= base_url("pelayanan/api/pelayanan/simpan_data_preeklampsia_early") ?>',
            data: $('#form_preeklampsia_early').serialize() + '&id-layanan-pendaftaran-pert=' + id_layanan_pendaftaran_pert,

            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.respon !== null) {
                    if (data.respon.show !== null) {
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
                        $('#modal_preeklampesia_early').modal('hide');
                        showListForm($('#id-pendaftaran-pert').val(), $('#id-layanan-pendaftaran-pert').val(), $('#id-pasien-pert').val());
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

    function resetPreeklampsiaEarly() {
        $('#form_preeklampsia_early')[0].reset();
        $("input[type='checkbox']").prop('checked',false);
        $("input[type='radio']").prop('checked',false);
        $('#buka-tutup-pert').empty();
    }

    function lihatPreeklampsiaEarly(obj, id, id_pendaftaran, id_layanan_pendaftaran, bed) {   
         $('#modal-edit-preeklampsia-early').modal('show');
         $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_edit_preeklampsia_early") ?>/id/' +
                id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#update-pert').empty();
                $('#id-edit-preeklampsia-early').val(id);
                function formatTanggalKhusus(waktu) {
                    var el = waktu.split('-');
                    var tahun = el[0];
                    var bulan = el[1];
                    var hari = el[2];
                    return hari + '/' + bulan + '/' + tahun;
                }
                let edit_tanggal_pert = formatTanggalKhusus(data.tanggal_pert);
                $('#edit-tanggal-pert').val(edit_tanggal_pert);                 
                let cttntndkn = '';
                cttntndkn =
                    `  <button type="button" class="btn btn-secondary waves-effect" onclick="$('#modal-edit-preeklampsia-early').modal('hide');"><i class="fas fa-times-circle mr-1"></i>Tutup</button>
                  `;
                $('#update-pert').append(cttntndkn);   

                $('#edit-jam-pert').val(data.jam_pert);

                data.hijau_1    == '1' ? $('#edit-hijau-1').prop('checked', true) : $('#edit-hijau-1').prop('checked', false);
                data.kuning_1   == '1' ? $('#edit-kuning-1').prop('checked', true) : $('#edit-kuning-1').prop('checked', false);
                data.merah_1    == '1' ? $('#edit-merah-1').prop('checked', true) : $('#edit-merah-1').prop('checked', false);

                data.hijau_2    == '1' ? $('#edit-hijau-2').prop('checked', true) : $('#edit-hijau-2').prop('checked', false);
                data.kuning_2   == '1' ? $('#edit-kuning-2').prop('checked', true) : $('#edit-kuning-2').prop('checked', false);
                data.merah_2    == '1' ? $('#edit-merah-2').prop('checked', true) : $('#edit-merah-2').prop('checked', false);

                data.hijau_3    == '1' ? $('#edit-hijau-3').prop('checked', true) : $('#edit-hijau-3').prop('checked', false);
                data.kuning_3   == '1' ? $('#edit-kuning-3').prop('checked', true) : $('#edit-kuning-3').prop('checked', false);
                data.merah_3    == '1' ? $('#edit-merah-3').prop('checked', true) : $('#edit-merah-3').prop('checked', false);

                data.hijau_4    == '1' ? $('#edit-hijau-4').prop('checked', true) : $('#edit-hijau-4').prop('checked', false);
                data.kuning_4   == '1' ? $('#edit-kuning-4').prop('checked', true) : $('#edit-kuning-4').prop('checked', false);
                data.merah_4    == '1' ? $('#edit-merah-4').prop('checked', true) : $('#edit-merah-4').prop('checked', false);

                data.hijau_5    == '1' ? $('#edit-hijau-5').prop('checked', true) : $('#edit-hijau-5').prop('checked', false);
                data.kuning_5   == '1' ? $('#edit-kuning-5').prop('checked', true) : $('#edit-kuning-5').prop('checked', false);
                data.merah_5    == '1' ? $('#edit-merah-5').prop('checked', true) : $('#edit-merah-5').prop('checked', false);

                data.hijau_6    == '1' ? $('#edit-hijau-6').prop('checked', true) : $('#edit-hijau-6').prop('checked', false);
                data.kuning_6   == '1' ? $('#edit-kuning-6').prop('checked', true) : $('#edit-kuning-6').prop('checked', false);
                data.merah_6    == '1' ? $('#edit-merah-6').prop('checked', true) : $('#edit-merah-6').prop('checked', false);

                data.hijau_7    == '1' ? $('#edit-hijau-7').prop('checked', true) : $('#edit-hijau-7').prop('checked', false);
                data.kuning_7   == '1' ? $('#edit-kuning-7').prop('checked', true) : $('#edit-kuning-7').prop('checked', false);
                data.merah_7    == '1' ? $('#edit-merah-7').prop('checked', true) : $('#edit-merah-7').prop('checked', false);

                data.hijau_8    == '1' ? $('#edit-hijau-8').prop('checked', true) : $('#edit-hijau-8').prop('checked', false);
                data.kuning_8   == '1' ? $('#edit-kuning-8').prop('checked', true) : $('#edit-kuning-8').prop('checked', false);
                data.merah_8    == '1' ? $('#edit-merah-8').prop('checked', true) : $('#edit-merah-8').prop('checked', false);

                data.hijau_9    == '1' ? $('#edit-hijau-9').prop('checked', true) : $('#edit-hijau-9').prop('checked', false);
                data.kuning_9   == '1' ? $('#edit-kuning-9').prop('checked', true) : $('#edit-kuning-9').prop('checked', false);
                data.merah_9    == '1' ? $('#edit-merah-9').prop('checked', true) : $('#edit-merah-9').prop('checked', false);

                data.hijau_10    == '1' ? $('#edit-hijau-10').prop('checked', true) : $('#edit-hijau-10').prop('checked', false);
                data.kuning_10   == '1' ? $('#edit-kuning-10').prop('checked', true) : $('#edit-kuning-10').prop('checked', false);
                data.merah_10    == '1' ? $('#edit-merah-10').prop('checked', true) : $('#edit-merah-10').prop('checked', false);

                data.hijau_11    == '1' ? $('#edit-hijau-11').prop('checked', true) : $('#edit-hijau-11').prop('checked', false);
                data.kuning_11   == '1' ? $('#edit-kuning-11').prop('checked', true) : $('#edit-kuning-11').prop('checked', false);
                data.merah_11    == '1' ? $('#edit-merah-11').prop('checked', true) : $('#edit-merah-11').prop('checked', false);

                data.hijau_12    == '1' ? $('#edit-hijau-12').prop('checked', true) : $('#edit-hijau-12').prop('checked', false);
                data.kuning_12   == '1' ? $('#edit-kuning-12').prop('checked', true) : $('#edit-kuning-12').prop('checked', false);
                data.merah_12    == '1' ? $('#edit-merah-12').prop('checked', true) : $('#edit-merah-12').prop('checked', false);

                data.hijau_13    == '1' ? $('#edit-hijau-13').prop('checked', true) : $('#edit-hijau-13').prop('checked', false);
                data.kuning_13   == '1' ? $('#edit-kuning-13').prop('checked', true) : $('#edit-kuning-13').prop('checked', false);
                data.merah_13    == '1' ? $('#edit-merah-13').prop('checked', true) : $('#edit-merah-13').prop('checked', false);

                data.hijau_14    == '1' ? $('#edit-hijau-14').prop('checked', true) : $('#edit-hijau-14').prop('checked', false);
                data.kuning_14   == '1' ? $('#edit-kuning-14').prop('checked', true) : $('#edit-kuning-14').prop('checked', false);
                data.merah_14    == '1' ? $('#edit-merah-14').prop('checked', true) : $('#edit-merah-14').prop('checked', false);

                data.hijau_15    == '1' ? $('#edit-hijau-15').prop('checked', true) : $('#edit-hijau-15').prop('checked', false);
                data.kuning_15   == '1' ? $('#edit-kuning-15').prop('checked', true) : $('#edit-kuning-15').prop('checked', false);
                data.merah_15    == '1' ? $('#edit-merah-15').prop('checked', true) : $('#edit-merah-15').prop('checked', false);

                data.hijau_16    == '1' ? $('#edit-hijau-16').prop('checked', true) : $('#edit-hijau-16').prop('checked', false);
                data.kuning_16   == '1' ? $('#edit-kuning-16').prop('checked', true) : $('#edit-kuning-16').prop('checked', false);
                data.merah_16    == '1' ? $('#edit-merah-16').prop('checked', true) : $('#edit-merah-16').prop('checked', false);

                data.hijau_17    == '1' ? $('#edit-hijau-17').prop('checked', true) : $('#edit-hijau-17').prop('checked', false);
                data.kuning_17   == '1' ? $('#edit-kuning-17').prop('checked', true) : $('#edit-kuning-17').prop('checked', false);
                data.merah_17    == '1' ? $('#edit-merah-17').prop('checked', true) : $('#edit-merah-17').prop('checked', false);
               
                $('#edit-perawat-pert').val(data.perawat_pert);
                $('#s2id_edit-perawat-pert a .select2c-chosen').html(data.perawat);      
   
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })      
    }

    function editPreeklampsiaEarly(obj, id, id_pendaftaran, id_layanan_pendaftaran, bed) {   
        const modal = $('#modal-edit-preeklampsia-early');
        $('#update-pert').children().remove();
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_edit_preeklampsia_early") ?>/id/' +
                id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#update-pert').empty();
                $('#id-edit-preeklampsia-early').val(id);
                function formatTanggalKhusus(waktu) {
                    var el = waktu.split('-');
                    var tahun = el[0];
                    var bulan = el[1];
                    var hari = el[2];
                    return hari + '/' + bulan + '/' + tahun;
                }

                let edit_tanggal_pert = formatTanggalKhusus(data.tanggal_pert);
                $('#edit-tanggal-pert').val(edit_tanggal_pert);   
                let cttntndkn = '';
                cttntndkn =
                    `  <button type="button" class="btn btn-secondary waves-effect" onclick="$('#modal-edit-preeklampsia-early').modal('hide');"><i class="fas fa-times-circle mr-1"></i>Tutup</button>
                    <button type="button" class="btn btn-info waves-effect" onclick="updatePreeklampsiaEarly(${id_pendaftaran}, ${id_layanan_pendaftaran}, '${bed}')"><i class="fas fa-save mr-1"></i>Update</button>`;

                    $('#update-pert').append(cttntndkn);   

                    $('#edit-jam-pert').val(data.jam_pert);

                    data.hijau_1    == '1' ? $('#edit-hijau-1').prop('checked', true) : $('#edit-hijau-1').prop('checked', false);
                    data.kuning_1   == '1' ? $('#edit-kuning-1').prop('checked', true) : $('#edit-kuning-1').prop('checked', false);
                    data.merah_1    == '1' ? $('#edit-merah-1').prop('checked', true) : $('#edit-merah-1').prop('checked', false);

                    data.hijau_2    == '1' ? $('#edit-hijau-2').prop('checked', true) : $('#edit-hijau-2').prop('checked', false);
                    data.kuning_2   == '1' ? $('#edit-kuning-2').prop('checked', true) : $('#edit-kuning-2').prop('checked', false);
                    data.merah_2    == '1' ? $('#edit-merah-2').prop('checked', true) : $('#edit-merah-2').prop('checked', false);

                    data.hijau_3    == '1' ? $('#edit-hijau-3').prop('checked', true) : $('#edit-hijau-3').prop('checked', false);
                    data.kuning_3   == '1' ? $('#edit-kuning-3').prop('checked', true) : $('#edit-kuning-3').prop('checked', false);
                    data.merah_3    == '1' ? $('#edit-merah-3').prop('checked', true) : $('#edit-merah-3').prop('checked', false);

                    data.hijau_4    == '1' ? $('#edit-hijau-4').prop('checked', true) : $('#edit-hijau-4').prop('checked', false);
                    data.kuning_4   == '1' ? $('#edit-kuning-4').prop('checked', true) : $('#edit-kuning-4').prop('checked', false);
                    data.merah_4    == '1' ? $('#edit-merah-4').prop('checked', true) : $('#edit-merah-4').prop('checked', false);

                    data.hijau_5    == '1' ? $('#edit-hijau-5').prop('checked', true) : $('#edit-hijau-5').prop('checked', false);
                    data.kuning_5   == '1' ? $('#edit-kuning-5').prop('checked', true) : $('#edit-kuning-5').prop('checked', false);
                    data.merah_5    == '1' ? $('#edit-merah-5').prop('checked', true) : $('#edit-merah-5').prop('checked', false);

                    data.hijau_6    == '1' ? $('#edit-hijau-6').prop('checked', true) : $('#edit-hijau-6').prop('checked', false);
                    data.kuning_6   == '1' ? $('#edit-kuning-6').prop('checked', true) : $('#edit-kuning-6').prop('checked', false);
                    data.merah_6    == '1' ? $('#edit-merah-6').prop('checked', true) : $('#edit-merah-6').prop('checked', false);

                    data.hijau_7    == '1' ? $('#edit-hijau-7').prop('checked', true) : $('#edit-hijau-7').prop('checked', false);
                    data.kuning_7   == '1' ? $('#edit-kuning-7').prop('checked', true) : $('#edit-kuning-7').prop('checked', false);
                    data.merah_7    == '1' ? $('#edit-merah-7').prop('checked', true) : $('#edit-merah-7').prop('checked', false);

                    data.hijau_8    == '1' ? $('#edit-hijau-8').prop('checked', true) : $('#edit-hijau-8').prop('checked', false);
                    data.kuning_8   == '1' ? $('#edit-kuning-8').prop('checked', true) : $('#edit-kuning-8').prop('checked', false);
                    data.merah_8    == '1' ? $('#edit-merah-8').prop('checked', true) : $('#edit-merah-8').prop('checked', false);

                    data.hijau_9    == '1' ? $('#edit-hijau-9').prop('checked', true) : $('#edit-hijau-9').prop('checked', false);
                    data.kuning_9   == '1' ? $('#edit-kuning-9').prop('checked', true) : $('#edit-kuning-9').prop('checked', false);
                    data.merah_9    == '1' ? $('#edit-merah-9').prop('checked', true) : $('#edit-merah-9').prop('checked', false);

                    data.hijau_10    == '1' ? $('#edit-hijau-10').prop('checked', true) : $('#edit-hijau-10').prop('checked', false);
                    data.kuning_10   == '1' ? $('#edit-kuning-10').prop('checked', true) : $('#edit-kuning-10').prop('checked', false);
                    data.merah_10    == '1' ? $('#edit-merah-10').prop('checked', true) : $('#edit-merah-10').prop('checked', false);

                    data.hijau_11    == '1' ? $('#edit-hijau-11').prop('checked', true) : $('#edit-hijau-11').prop('checked', false);
                    data.kuning_11   == '1' ? $('#edit-kuning-11').prop('checked', true) : $('#edit-kuning-11').prop('checked', false);
                    data.merah_11    == '1' ? $('#edit-merah-11').prop('checked', true) : $('#edit-merah-11').prop('checked', false);

                    data.hijau_12    == '1' ? $('#edit-hijau-12').prop('checked', true) : $('#edit-hijau-12').prop('checked', false);
                    data.kuning_12   == '1' ? $('#edit-kuning-12').prop('checked', true) : $('#edit-kuning-12').prop('checked', false);
                    data.merah_12    == '1' ? $('#edit-merah-12').prop('checked', true) : $('#edit-merah-12').prop('checked', false);

                    data.hijau_13    == '1' ? $('#edit-hijau-13').prop('checked', true) : $('#edit-hijau-13').prop('checked', false);
                    data.kuning_13   == '1' ? $('#edit-kuning-13').prop('checked', true) : $('#edit-kuning-13').prop('checked', false);
                    data.merah_13    == '1' ? $('#edit-merah-13').prop('checked', true) : $('#edit-merah-13').prop('checked', false);

                    data.hijau_14    == '1' ? $('#edit-hijau-14').prop('checked', true) : $('#edit-hijau-14').prop('checked', false);
                    data.kuning_14   == '1' ? $('#edit-kuning-14').prop('checked', true) : $('#edit-kuning-14').prop('checked', false);
                    data.merah_14    == '1' ? $('#edit-merah-14').prop('checked', true) : $('#edit-merah-14').prop('checked', false);

                    data.hijau_15    == '1' ? $('#edit-hijau-15').prop('checked', true) : $('#edit-hijau-15').prop('checked', false);
                    data.kuning_15   == '1' ? $('#edit-kuning-15').prop('checked', true) : $('#edit-kuning-15').prop('checked', false);
                    data.merah_15    == '1' ? $('#edit-merah-15').prop('checked', true) : $('#edit-merah-15').prop('checked', false);

                    data.hijau_16    == '1' ? $('#edit-hijau-16').prop('checked', true) : $('#edit-hijau-16').prop('checked', false);
                    data.kuning_16   == '1' ? $('#edit-kuning-16').prop('checked', true) : $('#edit-kuning-16').prop('checked', false);
                    data.merah_16    == '1' ? $('#edit-merah-16').prop('checked', true) : $('#edit-merah-16').prop('checked', false);

                    data.hijau_17    == '1' ? $('#edit-hijau-17').prop('checked', true) : $('#edit-hijau-17').prop('checked', false);
                    data.kuning_17   == '1' ? $('#edit-kuning-17').prop('checked', true) : $('#edit-kuning-17').prop('checked', false);
                    data.merah_17    == '1' ? $('#edit-merah-17').prop('checked', true) : $('#edit-merah-17').prop('checked', false);
                
                    $('#edit-perawat-pert').val(data.perawat_pert);
                    $('#s2id_edit-perawat-pert a .select2c-chosen').html(data.perawat); 
                             
                modal.modal('show');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })
    }

    if (typeof numberPert === 'undefined') {
        var numberPert = 1;
    }

    function tambahPreeklampsiaEarly() {      

        if ($('#tanggal-pert').val() === '') {
            syams_validation('#tanggal-pert', 'Tanggal harus diisi.');
            return false;
        } else {
            syams_validation_remove('#tanggal-pert');
        }
        if ($('#perawat-pert').val() === '') {
            syams_validation('#perawat-pert', 'Nama Perawat Belum dipilih.');
            return false;
        } else {
            syams_validation_remove('#perawat-pert');
        }
        if ($('#jam-pert').val() === '') {
            syams_validation('#jam-pert', 'Jam Belum diisi.');
            return false;
        } else {
            syams_validation_remove('#jam-pert');
        }

        let html = '';
        let tanggal_pert = $('#tanggal-pert').val();   
        let jam_pert = $('#jam-pert').val();
        let hijau_1     = $('#hijau-1').is(':checked');
        let kuning_1    = $('#kuning-1').is(':checked');
        let merah_1     = $('#merah-1').is(':checked');
        let hijau_2     = $('#hijau-2').is(':checked');
        let kuning_2    = $('#kuning-2').is(':checked');
        let merah_2     = $('#merah-2').is(':checked');
        let hijau_3     = $('#hijau-3').is(':checked');
        let kuning_3    = $('#kuning-3').is(':checked');
        let merah_3     = $('#merah-3').is(':checked');
        let hijau_4     = $('#hijau-4').is(':checked');
        let kuning_4    = $('#kuning-4').is(':checked');
        let merah_4     = $('#merah-4').is(':checked');
        let hijau_5     = $('#hijau-5').is(':checked');
        let kuning_5    = $('#kuning-5').is(':checked');
        let merah_5     = $('#merah-5').is(':checked');
        let hijau_6     = $('#hijau-6').is(':checked');
        let kuning_6    = $('#kuning-6').is(':checked');
        let merah_6     = $('#merah-6').is(':checked');
        let hijau_7     = $('#hijau-7').is(':checked');
        let kuning_7    = $('#kuning-7').is(':checked');
        let merah_7     = $('#merah-7').is(':checked');
        let hijau_8     = $('#hijau-8').is(':checked');
        let kuning_8    = $('#kuning-8').is(':checked');
        let merah_8     = $('#merah-8').is(':checked');
        let hijau_9     = $('#hijau-9').is(':checked');
        let kuning_9    = $('#kuning-9').is(':checked');
        let merah_9     = $('#merah-9').is(':checked');
        let hijau_10     = $('#hijau-10').is(':checked');
        let kuning_10    = $('#kuning-10').is(':checked');
        let merah_10     = $('#merah-10').is(':checked');
        let hijau_11     = $('#hijau-11').is(':checked');
        let kuning_11    = $('#kuning-11').is(':checked');
        let merah_11     = $('#merah-11').is(':checked');
        let hijau_12     = $('#hijau-12').is(':checked');
        let kuning_12    = $('#kuning-12').is(':checked');
        let merah_12     = $('#merah-12').is(':checked');
        let hijau_13     = $('#hijau-13').is(':checked');
        let kuning_13    = $('#kuning-13').is(':checked');
        let merah_13     = $('#merah-13').is(':checked');
        let hijau_14     = $('#hijau-14').is(':checked');
        let kuning_14    = $('#kuning-14').is(':checked');
        let merah_14     = $('#merah-14').is(':checked');
        let hijau_15     = $('#hijau-15').is(':checked');
        let kuning_15    = $('#kuning-15').is(':checked');
        let merah_15     = $('#merah-15').is(':checked');
        let hijau_16     = $('#hijau-16').is(':checked');
        let kuning_16    = $('#kuning-16').is(':checked');
        let merah_16     = $('#merah-16').is(':checked');      
        let hijau_17     = $('#hijau-17').is(':checked');
        let kuning_17    = $('#kuning-17').is(':checked');
        let merah_17     = $('#merah-17').is(':checked'); 
        let perawat = $('#s2id_perawat-pert a .select2c-chosen').html();   
        let perawat_pert = $('#perawat-pert').val();
        html = /* html */ `
            <tr class="row-in-${++numberPert}">
                <td class="number-pengkajian" align="center">${numberPert++}</td>
                <td align="center">
                    <input type="hidden" name="tanggal_pert[]" value="${tanggal_pert}">${tanggal_pert}
                </td>
                <td align="center">
                    <input type="hidden" name="jam_pert[]" value="${jam_pert}">${jam_pert}
                </td>
                <td align="center">
                    <input type="hidden" name="perawat_pert[]" value="${perawat_pert}">${perawat}
                </td>               
                <td align="center">
                    <?= $this->session->userdata('nama') ?>
                    <input type="hidden" name="user_preeklampsia[]" value="<?= $this->session->userdata("id_translucent") ?>">
                    <input type="hidden" name="pengkajian_date_preeklampsia[]" value="<?= date("Y-m-d H:i:s") ?>"> 
                    <input type="hidden" name="hijau_1[]" value="${hijau_1 ? 1 : 0}">                                    
                    <input type="hidden" name="kuning_1[]" value="${kuning_1 ? 1 : 0}">                                    
                    <input type="hidden" name="merah_1[]" value="${merah_1 ? 1 : 0}">  
                    <input type="hidden" name="hijau_2[]" value="${hijau_2 ? 1 : 0}">                                    
                    <input type="hidden" name="kuning_2[]" value="${kuning_2 ? 1 : 0}">                                    
                    <input type="hidden" name="merah_2[]" value="${merah_2 ? 1 : 0}">  
                    <input type="hidden" name="hijau_3[]" value="${hijau_3 ? 1 : 0}">                                    
                    <input type="hidden" name="kuning_3[]" value="${kuning_3 ? 1 : 0}">                                    
                    <input type="hidden" name="merah_3[]" value="${merah_3 ? 1 : 0}">  
                    <input type="hidden" name="hijau_4[]" value="${hijau_4 ? 1 : 0}">                                    
                    <input type="hidden" name="kuning_4[]" value="${kuning_4 ? 1 : 0}">                                    
                    <input type="hidden" name="merah_4[]" value="${merah_4 ? 1 : 0}">  
                    <input type="hidden" name="hijau_5[]" value="${hijau_5 ? 1 : 0}">                                    
                    <input type="hidden" name="kuning_5[]" value="${kuning_5 ? 1 : 0}">                                    
                    <input type="hidden" name="merah_5[]" value="${merah_5 ? 1 : 0}">  
                    <input type="hidden" name="hijau_6[]" value="${hijau_6 ? 1 : 0}">                                    
                    <input type="hidden" name="kuning_6[]" value="${kuning_6 ? 1 : 0}">                                    
                    <input type="hidden" name="merah_6[]" value="${merah_6 ? 1 : 0}">  
                    <input type="hidden" name="hijau_7[]" value="${hijau_7 ? 1 : 0}">                                    
                    <input type="hidden" name="kuning_7[]" value="${kuning_7 ? 1 : 0}">                                    
                    <input type="hidden" name="merah_7[]" value="${merah_7 ? 1 : 0}">  
                    <input type="hidden" name="hijau_8[]" value="${hijau_8 ? 1 : 0}">                                    
                    <input type="hidden" name="kuning_8[]" value="${kuning_8 ? 1 : 0}">                                    
                    <input type="hidden" name="merah_8[]" value="${merah_8 ? 1 : 0}">  
                    <input type="hidden" name="hijau_9[]" value="${hijau_9 ? 1 : 0}">                                    
                    <input type="hidden" name="kuning_9[]" value="${kuning_9 ? 1 : 0}">                                    
                    <input type="hidden" name="merah_9[]" value="${merah_9 ? 1 : 0}">  
                    <input type="hidden" name="hijau_10[]" value="${hijau_10 ? 1 : 0}">                                    
                    <input type="hidden" name="kuning_10[]" value="${kuning_10 ? 1 : 0}">                                    
                    <input type="hidden" name="merah_10[]" value="${merah_10 ? 1 : 0}">  
                    <input type="hidden" name="hijau_11[]" value="${hijau_11 ? 1 : 0}">                                    
                    <input type="hidden" name="kuning_11[]" value="${kuning_11 ? 1 : 0}">                                    
                    <input type="hidden" name="merah_11[]" value="${merah_11 ? 1 : 0}">  
                    <input type="hidden" name="hijau_12[]" value="${hijau_12 ? 1 : 0}">                                    
                    <input type="hidden" name="kuning_12[]" value="${kuning_12 ? 1 : 0}">                                    
                    <input type="hidden" name="merah_12[]" value="${merah_12 ? 1 : 0}">  
                    <input type="hidden" name="hijau_13[]" value="${hijau_13 ? 1 : 0}">                                    
                    <input type="hidden" name="kuning_13[]" value="${kuning_13 ? 1 : 0}">                                    
                    <input type="hidden" name="merah_13[]" value="${merah_13 ? 1 : 0}">  
                    <input type="hidden" name="hijau_14[]" value="${hijau_14 ? 1 : 0}">                                    
                    <input type="hidden" name="kuning_14[]" value="${kuning_14 ? 1 : 0}">                                    
                    <input type="hidden" name="merah_14[]" value="${merah_14 ? 1 : 0}">  
                    <input type="hidden" name="hijau_15[]" value="${hijau_15 ? 1 : 0}">                                    
                    <input type="hidden" name="kuning_15[]" value="${kuning_15 ? 1 : 0}">                                    
                    <input type="hidden" name="merah_15[]" value="${merah_15 ? 1 : 0}">  
                    <input type="hidden" name="hijau_16[]" value="${hijau_16 ? 1 : 0}">                                    
                    <input type="hidden" name="kuning_16[]" value="${kuning_16 ? 1 : 0}">                                    
                    <input type="hidden" name="merah_16[]" value="${merah_16 ? 1 : 0}">  
                    <input type="hidden" name="hijau_17[]" value="${hijau_17 ? 1 : 0}">                                    
                    <input type="hidden" name="kuning_17[]" value="${kuning_17 ? 1 : 0}">                                    
                    <input type="hidden" name="merah_17[]" value="${merah_17 ? 1 : 0}">                                                      
                </td>
                <td align="center">
                    <button type="button" class="btn btn-secondary btn-xxs" onclick="removeList(this)"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
        `;
        $('#tabel-pert .body-table').append(html);
    }

    // function updatePreeklampsiaEarly(id_pendaftaran, id_layanan_pendaftaran, bed) {
    //     // console.log($('#form-edit-preeklampsia-early').serialize());
    //     $.ajax({
    //         type: 'PUT',
    //         url: '<?= base_url("pelayanan/api/pelayanan/update_preeklampsia_early") ?>',
    //         data: $('#form-edit-preeklampsia-early').serialize(),
    //         cache: false,
    //         dataType: 'JSON',
    //         success: function(data) {
    //             if (data.status) {
    //                 messageEditSuccess();
    //                 entriPreeklampsiaEarly(id_pendaftaran, id_layanan_pendaftaran, bed);
    //             } else {
    //                 messageEditFailed();
    //             }
    //             $('#modal-edit-preeklampsia-early').modal('hide');
    //         },
    //         error: function(e) {
    //             messageEditFailed();
    //         }
    //     });
    // }

    // function hapusPreeklampsiaEarly(obj, id) {
    //     bootbox.dialog({
    //         message: "Anda yakin akan menghapus data ini?",
    //         title: "Hapus Data",
    //         buttons: {
    //             batal: {
    //                 label: '<i class="fas fa-times-circle mr-1"></i>Batal',
    //                 className: "btn-secondary",
    //                 callback: function() {
    //                 }
    //             },
    //             hapus: {
    //                 label: '<i class="fas fa-trash-alt mr-1"></i>Hapus',
    //                 className: "btn-info",
    //                 callback: function() {
    //                     $.ajax({
    //                         type: 'DELETE',
    //                         url: '<?= base_url("pelayanan/api/pelayanan/hapus_preeklampsia_early") ?>/' +
    //                             id,
    //                         cache: false,
    //                         dataType: 'JSON',
    //                         success: function(data) {
    //                             if (data.status) {
    //                                 messageCustom(data.message, 'Success');
    //                                 removeList(obj);
    //                             } else {
    //                                 customAlert('Hapus Preeklampsia Early Recognition Tool (PERT)', data
    //                                     .message);
    //                             }
    //                         },
    //                         error: function(e) {
    //                             messageDeleteFailed();
    //                         }
    //                     });
    //                 }
    //             }
    //         }
    //     });
    // }

    // 
    function updatePreeklampsiaEarly(id_pendaftaran, id_layanan_pendaftaran, bed) {
        // Ambil ID user dari input hidden
        const id_user = $('#id-user').val();

        $.ajax({
            type: 'PUT',
            url: '<?= base_url("pelayanan/api/pelayanan/update_preeklampsia_early") ?>',
            data: $('#form-edit-preeklampsia-early').serialize() + '&id_user=' + id_user, // tetap kirim juga kalau butuh
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                console.log('User yang update:', id_user); // debug

                if (data.status) {
                    messageEditSuccess();
                    entriPreeklampsiaEarly(id_pendaftaran, id_layanan_pendaftaran, bed);
                } else {
                    messageEditFailed();
                }
                $('#modal-edit-preeklampsia-early').modal('hide');
            },
            error: function(e) {
                messageEditFailed();
            }
        });
    }

    // 
    function hapusPreeklampsiaEarly(obj, id) {
        const id_user = $('#id-user').val();
        bootbox.dialog({
            message: "Anda yakin akan menghapus data ini?",
            title: "Hapus Data",
            buttons: {
                batal: {
                    label: '<i class="fas fa-times-circle mr-1"></i>Batal',
                    className: "btn-secondary",
                    callback: function() {}
                },
                hapus: {
                    label: '<i class="fas fa-trash-alt mr-1"></i>Hapus',
                    className: "btn-info",
                    callback: function() {
                        $.ajax({
                            type: 'DELETE',
                            url: '<?= base_url("pelayanan/api/pelayanan/hapus_preeklampsia_early") ?>/' + id,
                            data: { id_user: id_user }, // kirim id_user
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                            console.log('User yang hapus:', id_user); // debug

                                if (data.status) {
                                    messageCustom(data.message, 'Success');
                                    obj.closest('tr').remove();
                                } else {
                                    customAlert('Hapus Data', data.message);
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
 

</script>
