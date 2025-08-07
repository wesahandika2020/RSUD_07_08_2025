<!-- // PRLTDDP -->
<script>
    var nomer = 1;
        nomer++;
   
        $('#btn-expand-all-pengkajian-dekubitus').click(function() {
            $('.multi-collapse').addClass('show');
        });

        $('#btn-collapse-all-pengkajian-dekubitus').click(function() {
            $('.multi-collapse').removeClass('show');
        });
        
        // $("#wizard-pengkajian-dekubitus").bwizard();
        
        // PPRLT
        function removeList(el) {
           var parent = el.parentNode.parentNode;
            parent.parentNode.removeChild(parent);
        } 

        // PPRLT
        function removeListTable(el) {
            var parent = el.parentNode.parentNode.parentNode;
            parent.parentNode.removeChild(parent);
        }

        // PPRLT
        function timerzmysql(waktu) {
            var tm = waktu.split(':');
            return tm[0] + ':' + tm[1];
        }

        // PPRLT
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

        // PPRLT
        function tutupRapet(title, num) {
            let html = /* html */ `
                            </div>
                        </div>
                    </div>
                </div>
            `;

            return html;
        }    

        function lihatFORM_KEP_03_01(data) {
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
            entriPengkajianDekubitus(layanan.id_pendaftaran, layanan.id, layanan.layanan, layanan.tanggal_layanan,  bed, action);
        }

        function editFORM_KEP_03_01(data) {
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
            entriPengkajianDekubitus(layanan.id_pendaftaran, layanan.id, layanan.layanan, layanan.tanggal_layanan,  bed, action);
        }

        function tambahFORM_KEP_03_01(data) {
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
            entriPengkajianDekubitus(layanan.id_pendaftaran, layanan.id, layanan.layanan, layanan.tanggal_layanan,  bed, action);           
        }
       

        // PRLTDDP
        function showPengkajianDekubitus(num) {
            let html = bukaLebar('Form Pengkajian Dekubitus', num);
            html += /* html */ `             
                <table class="table table-no-border table-sm table-striped">
                    <tr>
                        <td>
                            Tanggal Pengkajian
                        </td>
                        <td>
                            :
                        </td>
                        <td>
                            <input type="text" name="tanggal_jam_prltddp" id="tanggal-jam-prltddp" class="custom-form clear-input d-inline-block col-lg-2 ml-2" placeholder="dd/mm/yyyy">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Jam Pengkajian
                        </td>
                        <td>
                            :
                        </td>
                        <td>
                            <input type="text" name="prltddp_jam" id="prltddp-jam" class="custom-form clear-input d-inline-block col-lg-2 ml-2" placeholder="masukan jam">
                        </td>
                    </tr>
                </table>
                <hr>
                <table class="table table-sm table-striped table-bordered" style="margin-top: -15px" id="form-prltddp">
                    <table class="table table-sm table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width="10%" class="center"><b>PENILAIAN</b></th>
                                <th width="15%" class="center"><b>4</b></th>
                                <th width="15%" class="center"><b>3</b></th>
                                <th width="15%" class="center"><b>2</b></th>
                                <th width="15%" class="center"><b>1</b></th>
                               
                            </tr>                          
                            <tr>

                                <th class="center v-center"> <input type="hidden" id="penilaian-prd-fisik"> Kondisi Fisik</th>
                                <td class="center"><input type="radio" name="prd_fisik" id="prd-fisik-4" value="4" class="mr-1" onchange="calcscoreprltddp()">Baik</td>
                                <td class="center"><input type="radio" name="prd_fisik" id="prd-fisik-3" value="3" class="mr-1" onchange="calcscoreprltddp()">Sedang</td>
                                <td class="center"><input type="radio" name="prd_fisik" id="prd-fisik-2" value="2" class="mr-1" onchange="calcscoreprltddp()">Buruk</td>
                                <td class="center"><input type="radio" name="prd_fisik" id="prd-fisik-1" value="1" class="mr-1" onchange="calcscoreprltddp()">Sangat buruk</td>             
                            </tr>
                            <tr>
                                <th  class="center v-center"> <input type="hidden" id="penilaian-prd-mental"> Status Mental</th>

                                <td class="center"><input type="radio" name="prd_mental" id="prd-mental-4" value="4" class="mr-1" onchange="calcscoreprltddp()">Sadar</td>
                                <td class="center"><input type="radio" name="prd_mental" id="prd-mental-3" value="3" class="mr-1" onchange="calcscoreprltddp()">Apatis</td>
                                <td class="center"><input type="radio" name="prd_mental" id="prd-mental-2" value="2" class="mr-1" onchange="calcscoreprltddp()">Bingung</td>
                                <td class="center"><input type="radio" name="prd_mental" id="prd-mental-1" value="1" class="mr-1" onchange="calcscoreprltddp()">Stupor</td>                            
                            </tr>
                            <tr>
                                <th  class="center v-center">  <input type="hidden" id="penilaian-prd-aktifitas"> Aktifitas</th>
                                <td class="center"><input type="radio" name="prd_aktifitas" id="prd-aktifitas-4" value="4" class="mr-1" onchange="calcscoreprltddp()">Jalan sendiri</td>
                                <td class="center"><input type="radio" name="prd_aktifitas" id="prd-aktifitas-3" value="3" class="mr-1" onchange="calcscoreprltddp()">Jalan dengan bantuan</td>
                                <td class="center"><input type="radio" name="prd_aktifitas" id="prd-aktifitas-2" value="2" class="mr-1" onchange="calcscoreprltddp()">Kursi roda</td>
                                <td class="center"><input type="radio" name="prd_aktifitas" id="prd-aktifitas-1" value="1" class="mr-1" onchange="calcscoreprltddp()">Di tempat tidur</td>
                            </tr>
                            <tr>
                                <th  class="center v-center"> <input type="hidden" id="penilaian-prd-mobilitas"> Mobilitas</th>                               
                                <td class="center"><input type="radio" name="prd_mobilitas" id="prd-mobilitas-4" value="4" class="mr-1" onchange="calcscoreprltddp()">Bebas bergerak</td>
                                <td class="center"><input type="radio" name="prd_mobilitas" id="prd-mobilitas-3" value="3" class="mr-1" onchange="calcscoreprltddp()">Agak terbatas</td>
                                <td class="center"><input type="radio" name="prd_mobilitas" id="prd-mobilitas-2" value="2" class="mr-1" onchange="calcscoreprltddp()">Sangat terbatas</td>
                                <td class="center"><input type="radio" name="prd_mobilitas" id="prd-mobilitas-1" value="1" class="mr-1" onchange="calcscoreprltddp()">Tidak mampu bergerak</td>                              
                            </tr>
                            <tr>
                                <th  class="center v-center"> <input type="hidden" id="penilaian-prd-inkontinensia"> Inkontinensia</th>
                                <td class="center"><input type="radio" name="prd_inkontinensia" id="prd-inkontinensia-4" value="4" class="mr-1" onchange="calcscoreprltddp()">Kontinen</td>
                                <td class="center"><input type="radio" name="prd_inkontinensia" id="prd-inkontinensia-3" value="3" class="mr-1" onchange="calcscoreprltddp()">Kadang-kadang inkontinensia urin</td>
                                <td class="center"><input type="radio" name="prd_inkontinensia" id="prd-inkontinensia-2" value="2" class="mr-1" onchange="calcscoreprltddp()">Selalu inkontinensia urin</td>
                                <td class="center"><input type="radio" name="prd_inkontinensia" id="prd-inkontinensia-1" value="1" class="mr-1" onchange="calcscoreprltddp()">Inkontinensia urin & Alvi</td>                           
                            </tr>
                            <tr>
                                <th  class="center v-center"><b>Total Skor</b></th>
                                <td class="center"><input type="number" min="0" name="total_nilai_prd" id="total-nilai-prd" class="custom-form clear-input center" placeholder="Jumlah" value="0" readonly></td>                              
                            </tr>
                        </thead>
                    </table>

                    <table class="table table-no-border table-sm table-striped"style="margin-top:15px">
                        <tr>
                            <span class="bold">Keterangan :</span><br>
                        </tr>
                        <tr>
                            <span class="bold">Tidak terjadi resiko dekubitus : 16-20 </span><br>
                        </tr>
                        <tr>
                            <span class="bold">Kemungkinan kecil terjadi resiko dekubitus : 12-15</span><br>
                        </tr>
                        <tr>
                            <span class="bold">Besar terjadi dekubitus : < 12 </span><br>
                        </tr>
                    </table>

                    <table class="table table-no-border table-sm table-striped"style="margin-top:15px">
                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                        </tr>
                    </table>

                    <table class="table table-sm table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width="20%" class="center"><b></b></th>
                                <th width="1%" class="center"><b></b></th>
                                <th width="10%" class="center"><b></b></th>
                                <th width="10%" class="center"><b></b></th>
                                <th width="10%" class="center"><b></b></th>
                                <th width="10%" class="center"><b></b></th>
                            </tr>
                            <tr>
                                <th class="bold">Luka yang di dapat di RS</th>
                                <td class="center">:</td>
                                <td class=""><input type="checkbox" name="luka_rs_1" id="luka-rs-1" value="1" class="mr-1 ">Tidak</td>
                                <td class=""><input type="checkbox" name="luka_rs_2" id="luka-rs-2" value="1" class="mr-1 ">Ya,</td>
                                <td colspan="3">sejak kapan &nbsp;&nbsp;<input type="text" name="luka_rs_3" id="luka-rs-3" class="custom-form clear-input d-inline-block col-lg-8" placeholder="....." ></td>
                                                                                
                            </tr>
                            <tr>
                                <th class="bold">Jika Ya,</th>
                                <td class="center"></td>
                                <td class="center"></td>
                                <td class="center"></td>
                                <td class="center"></td>
                                <td class="center"></td>
                            </tr>
                            <tr>
                                <th class="bold">Etiologi Luka</th>
                                <td class="center">:</td>
                                <td class=""><input type="checkbox" name="etiologi_luka_1" id="etiologi-luka-1" value="1" class="mr-1 ">Bedah</td>
                                <td class=""><input type="checkbox" name="etiologi_luka_2" id="etiologi-luka-2" value="1" class="mr-1 ">Trauma</td>
                                <td class=""><input type="checkbox" name="etiologi_luka_3" id="etiologi-luka-3" value="1" class="mr-1 ">Tekanan</td>
                                <td class=""><input type="checkbox" name="etiologi_luka_4" id="etiologi-luka-4" value="1" class="mr-1 ">Lain-lain</td>
                                <td class=""><input type="text" name="etiologi_luka_5" id="etiologi-luka-5" class="custom-form clear-input d-inline-block col-lg-8" placeholder="....." ></td>                                                           
                            </tr>
                            <tr>
                                <th class="bold">Gambaran klinis Luka</th>
                                <td class="center">:</td>
                                <td class=""><input type="checkbox" name="gambar_klinis_1" id="gambar-klinis-1" value="1" class="mr-1 ">Necrotic/hitam</td>
                                <td class=""><input type="checkbox" name="gambar_klinis_2" id="gambar-klinis-2" value="1" class="mr-1 ">Kuning</td>
                                <td class=""><input type="checkbox" name="gambar_klinis_3" id="gambar-klinis-3" value="1" class="mr-1 ">Merah/Granul</td>
                                <td class=""><input type="checkbox" name="gambar_klinis_4" id="gambar-klinis-4" value="1" class="mr-1 ">Ephitelisasi</td>
                                <td class="center"></td>                                                           
                            </tr>
                            <tr>
                                <th class="bold">Eksudat</th>
                                <td class="center">:</td>
                                <td class=""><input type="checkbox" name="eksudat_1" id="eksudat-1" value="1" class="mr-1 ">Tidak ada</td>
                                <td class=""><input type="checkbox" name="eksudat_2" id="eksudat-2" value="1" class="mr-1 ">Sedikit</td>
                                <td class=""><input type="checkbox" name="eksudat_3" id="eksudat-3" value="1" class="mr-1 ">Sedang</td>
                                <td class=""><input type="checkbox" name="eksudat_4" id="eksudat-4" value="1" class="mr-1 ">Banyak</td>
                                <td class="center"></td>                                                           
                            </tr>
                            <tr>
                                <th class="bold">Bau</th>
                                <td class="center">:</td>
                                <td class=""><input type="checkbox" name="bau_1" id="bau-1" value="1" class="mr-1 ">Tidak</td>
                                <td class=""><input type="checkbox" name="bau_2" id="bau-2" value="1" class="mr-1 ">Sedikit</td>
                                <td class=""><input type="checkbox" name="bau_3" id="bau-3" value="1" class="mr-1 ">Sangat</td>
                                <td class="center"></td>
                                <td class="center"></td>                                                        
                            </tr>                     
                        </thead>
                    </table>

                    <table class="table table-no-border table-sm table-striped"style="margin-top:15px">
                        <tr>
                            <td>
                                <span class="bold">*Jika sudah terjadi luka Tekan/Decubitus</span><br>
                            </td>                                                    
                            <td>
                            </td>                                                 
                        </tr>
                    </table>

                    <table class="table table-sm table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width="15%" class="center"><b></b></th>
                                <th width="15%" class="center"><b></b></th>
                                <th width="15%" class="center"><b></b></th>
                                <th width="15%" class="center"><b></b></th>
                                <th width="15%" class="center"><b></b></th>
                                <th width="20%" class="center"><b></b></th>
                            </tr>
                            <tr>
                                <td colspan="5"></td>  
                                <td class="center"> <span class="bold">(Perawat / Bidan)</span></td>                                                     
                            </tr>
                            <tr>
                                <td colspan="5"></td>  
                                <td class="center"> 
                                    <input type="text" name="perawat_bidan_prltddp" id="perawat-bidan-prltddp" class="select2c-input ml-2">                              
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5"></td>  
                                <td class="center"> 
                                    <span class="bold">( Tanda Tangan dan Nama Jelas )</span>
                                </td>                                                                                                                                                                                                         
                            </tr>
                            <tr>
                                <td colspan="5"></td>  
                                <td class="center"> 
                                    <input type="checkbox" name="ceklis_prltddp" id="ceklis-prltddp" class="mr-1 ">  
                                </td>                                                                                                                                              
                            </tr>
                        </thead>
                    </table>
                    <tr>
                        <td colspan="8">
                            <button type="button" title="Tambah Pengkajian Dekubitus" class="btn btn-info" onclick="tambahPengkajianDekubitus()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah Pengkajian Dekubitus</button>
                            </td>
                    </tr>

                </table>`;
            html += tutupRapet();
            $('#buka-tutup-prltddp').append(html);
        } 

        // PRLTDDP 
        function entriPengkajianDekubitus(id_pendaftaran, id_layanan_pendaftaran, layanan, tanggal, bed, action) {
            // $('#modal_pengkajian_dekubitus').modal('show');  
            // showPengkajianDekubitus(nomer);

            // $('#wizard-pengkajian-dekubitus').bwizard('show', '0');

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
                url: '<?= base_url("pelayanan/api/pelayanan/get_data_pengkajian_dekubitus") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
                cache: false,
                dataType: 'JSON',
                beforeSend: function() {
                    showLoader();
                },
                success: function (data) {
                    resetFormPengkajianDekubitus(); 
                    $('#id-layanan-pendaftaran-prltddp').val(id_layanan_pendaftaran);
                    $('#id_layanan_pendaftaran').val(id_layanan_pendaftaran);
                    $('#id-pendaftaran-prltddp').val(id_pendaftaran);
                    if (data.pasien !== null) {
                        $('#id-pasien-prltddp').val(data.pasien.id_pasien);
                        $('#nama-pasien-prltddp').text(data.pasien.nama);
                        $('#no-prltddp').text(data.pasien.no_rm);
                        $('#tanggal-lahir-prltddp').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
                        $('#jenis-kelamin-prltddp').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));                       
                    }


                    if (typeof data.pengkajian_dekubitus !== 'undefined' && data.pengkajian_dekubitus !== null) {
                        showPPengkajianDekubitus(data.pengkajian_dekubitus, id_pendaftaran, id_layanan_pendaftaran, bed, action);
                        showPengkajianDekubitus(nomer);
                    } else {
                        $('#tabel-prltddp .body-table').empty();
                    }

                                     
                    if (typeof data.pemantauan_dekubitus !== 'undefined' && data.pemantauan_dekubitus !== null) {
                        showPPemantauanDekubitus(data.pemantauan_dekubitus, id_pendaftaran, id_layanan_pendaftaran, bed);
                            showPemantauanDekubitus(nomer);
                    } else {
                        $('#tabel-pprlt .body-table').empty();
                    }

                    // PRLTDDP
                    $('#data-pengkajian-dekubitus').one('click', function() { 
                            $('#tanggal-jam-prltddp, #edit-tanggal-jam-prltddp').datetimepicker({
                            format: 'DD/MM/YYYY',
                            maxDate: new Date(),
                            beforeShow: function(i) {
                                if ($(i).attr('readonly')) {
                                    return false;
                                }
                            }
                        });
                    })

                    // PPRLT TGL
                    $('#data-pemantauan-dekubitus').one('click', function() {
                            $('#pprlt-tanggal-pemantauan, #pprlt-edit-tanggal-pemantauan').datetimepicker({
                            format: 'DD/MM/YYYY',
                            maxDate: new Date(),
                            beforeShow: function(i) {
                                if ($(i).attr('readonly')) {
                                    return false;
                                }
                            }
                        });
                    })

                    // PRLTDDP JAM
                    $('#data-pengkajian-dekubitus').one('click', function() {
                        $('#prltddp-jam, #edit-prltddp-jam')
                        .on('click', function() {
                            $(this).timepicker({
                                format: 'HH:mm',
                                showInputs: false,
                                showMeridian: false
                            });
                        })
                    })

                    // PRLTDDP PERAWAT / BIDAN
                    $('#data-pengkajian-dekubitus').one('click', function() {
                        $('#perawat-bidan-prltddp, #edit-perawat-bidan-prltddp')
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

                     // PPRLT
                    $('#data-pemantauan-dekubitus').one('click', function() {
                        $('#inisialt-perawat-1, #inisialt-perawat-2, #inisialt-perawat-3, #inisialt-perawat-edit-1, #inisialt-perawat-edit-2, #inisialt-perawat-edit-3')
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
                            
                    $('#bed-prltddp').text(bed);
                    $('#tanggal-prltddp').text(tanggal);
                    $('#modal_pengkajian_dekubitus').modal('show');
                    
                },

                complete: function() {
                    hideLoader();
                },
                error: function(e) {
                    accessFailed(e.status);
                }
            })
        }       
    

        // PRLTDDP
        function konfirmasiSimpanPengkajianDekubitus() {
            swal.fire({
                title: 'Konfirmasi',
                text: "Apakah anda yakin akan menyimpan datan ini ?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: '<i class="fas fa-fw fa-save mr-1"></i>Simpan',
                cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    simpanPengkajianDekubitus();
                }
            })
        }

        // PRLTDDP
        function simpanPengkajianDekubitus() {
            var id_layanan_pendaftaran_prltddp = $('#id-layanan-pendaftaran-prltddp').val(); 
            $.ajax({
                type: 'POST',
                url: '<?= base_url("pelayanan/api/pelayanan/simpan_data_pengkajian_dekubitus") ?>',
                data: $('#form_pengkajian_dekubitus').serialize() + '&id-layanan-pendaftaran-prltddp=' + id_layanan_pendaftaran_prltddp,
                cache: false,
                dataType: 'JSON',
                beforeSend: function() {
                    showLoader();
                },
                success: function(data) {

                    if (data.respon !== null) {

                        if (data.respon.show !== null) {

                            // $('#wizard-pengkajian-dekubitus').bwizard('show', data.respon.show);

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
                            $('#modal_pengkajian_dekubitus').modal('hide');
                            showListForm($('#id-pendaftaran-prltddp').val(), $('#id-layanan-pendaftaran-prltddp').val(), $('#id-pasien-prltddp').val());
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

        // PRLTDDP
        function showPPengkajianDekubitus(data, id_pendaftaran, id_layanan_pendaftaran, bed, action) {
            $('#tabel-prltddp .body-table').empty();
            if (data !== null) {
                $.each(data, function(i, v) {

                    let btnAksesLihat = '';
                    if (action != 'lihat') {
                        btnAksesLihat = '<button type="button" class="btn btn-success btn-xs" onclick="editPengkajianDekubitus(this, ' +
                        v.id + ', ' + id_pendaftaran + ', ' + id_layanan_pendaftaran + ', \'' + bed +
                        '\')"><i class="fas fa-edit"></i> Edit</button> <button type="button" class="btn btn-danger btn-xs" onclick="hapusPengkajianDekubitus(this, ' +
                        v.id +
                        ')"> <i class="fas fa-trash-alt"></i> Hapus</button>';
                    }
                    const selOp =
                    '<td align="center"><button type="button" class="btn btn-warning btn-xs" onclick="lihatPengkajianDekubitus(this, ' +
                    v.id + ', ' + id_pendaftaran + ', ' + id_layanan_pendaftaran + ', \'' + bed +
                    '\')"><i class="fas fa-eye"></i> Lihat</button>' +
                    btnAksesLihat + 
                    '</td>';


                    // '<td align="center"><button type="button" class="btn btn-secondary btn-xs" onclick="lihatPengkajianDekubitus(this, ' +
                    // v.id + ', ' + id_pendaftaran + ', ' + id_layanan_pendaftaran + ', \'' + bed +
                    // '\')"><i class="fas fa-eye"> </i><span class="label">Lihat</span></button>' +   
                    // btnAksesLihat + 
                    // '</td>';


                    let html = /* html */ `
                        <tr>
                            <td class="number-terapi" align="center">${(++i)}</td>
                            <td class="center">${v.tanggal_jam_prltddp ? datefmysql(v.tanggal_jam_prltddp) : '-'}</td>
                            <td align="center">${v.prltddp_jam || '-'}</td>
                            <td align="center">${v.total_nilai_prd || '-'}</td>  
                            <td align="center">${v.ceklis_prltddp == '1' ? '&check;' : ''}</td>
                            <td align="center">${v.perawat_or_bidan || '-'}</td>
                            <td align="center">${v.akun_user}</td>
                            ${selOp}
                        </tr>
                    `;
                    $('#tabel-prltddp tbody').append(html);
                    numberPrltddp = i;
                })
            }
        }


        // PRLTDDP
        function lihatPengkajianDekubitus(obj, id, id_pendaftaran, id_layanan_pendaftaran, bed){
            $('#modal-edit-pengkajian-dekubitus').modal('show');
            // $('#update-prltddp').children().remove();
            $.ajax({
                type: 'GET',
                url: '<?= base_url("pelayanan/api/pelayanan/get_pengkajian_dekubitus") ?>/id/' +
                    id,
                cache: false,
                dataType: 'JSON',
                success: function(data) {

                    // console.log(data);
                    $('#update-prltddp').empty();
                    $('#id-pengkajian-dekubitus').val(id);

                    // function formatTanggalKhusus(waktu) {
                    //     var el = waktu.split('-');
                    //     var tahun = el[0];
                    //     var bulan = el[1];
                    //     var hari = el[2];
                    //     return hari + '/' + bulan + '/' + tahun;
                    // }

                    // INI KETIKA NILAI LUPA DIISI YANG NULL JADI TIDAK NULL ATAU TIDAK EROR
                    function formatTanggalKhusus(waktu) {
                        if (waktu) {
                            var el = waktu.split('-');
                            var tahun = el[0];
                            var bulan = el[1];
                            var hari = el[2];
                            return hari + '/' + bulan + '/' + tahun;
                        } else {
                            // Tindakan yang sesuai jika waktu adalah null
                            // return 'Format waktu tidak valid';
                        }
                    }

                    let edit_tanggal_jam_prltddp = formatTanggalKhusus(data.tanggal_jam_prltddp);
                    $('#edit-tanggal-jam-prltddp').val(edit_tanggal_jam_prltddp);
                    let cttntndkn = '';
                    cttntndkn =
                        `  <button type="button" class="btn btn-secondary waves-effect" onclick="$('#modal-edit-pengkajian-dekubitus').modal('hide');"><i class="fas fa-times-circle mr-1"></i>Tutup</button>
        					`;
                    $('#update-prltddp').append(cttntndkn);

                    $('#penilaian-edit-prd-fisik').val(data.prd_fisik);
                    // Menyinkronkan nilai checkbox dengan data.prd_fisik
                    $('table input[name="prd_fisik"]').each(function() {
                        if ($(this).val() === data.prd_fisik) {
                            $(this).prop('checked', true);
                        } else {
                            $(this).prop('checked', false);
                        }
                    });
                
                    $('#penilaian-edit-prd-mental').val(data.prd_mental);
                    $('table input[name="prd_mental"]').each(function() {
                        if ($(this).val() === data.prd_mental) {
                            $(this).prop('checked', true);
                        } else {
                            $(this).prop('checked', false);
                        }
                    });
                  
                    $('#penilaian-edit-prd-aktifitas').val(data.prd_aktifitas);
                    $('table input[name="prd_aktifitas"]').each(function() {
                        if ($(this).val() === data.prd_aktifitas) {
                            $(this).prop('checked', true);
                        } else {
                            $(this).prop('checked', false);
                        }
                    });
                  
                    $('#penilaian-edit-prd-mobilitas').val(data.prd_mobilitas);
                    $('table input[name="prd_mobilitas"]').each(function() {
                        if ($(this).val() === data.prd_mobilitas) {
                            $(this).prop('checked', true);
                        } else {
                            $(this).prop('checked', false);
                        }
                    });
                  
                    $('#penilaian-edit-prd-inkontinensia').val(data.prd_inkontinensia);
                    $('table input[name="prd_inkontinensia"]').each(function() {
                        if ($(this).val() === data.prd_inkontinensia) {
                            $(this).prop('checked', true);
                        } else {
                            $(this).prop('checked', false);
                        }
                    });

                    $('#edit-prltddp-jam').val(data.prltddp_jam);

                    $('#edit-total-nilai-prd').val(data.total_nilai_prd);

                   
                    data.luka_rs_1 == '1' ? $('#edit-luka-rs-1').prop('checked', true)   : $('#edit-luka-rs-1').prop('checked', false);
                    data.luka_rs_2 == '1' ? $('#edit-luka-rs-2').prop('checked', true)   : $('#edit-luka-rs-2').prop('checked', false);
                    $('#edit-luka-rs-3').val(data.luka_rs_3);

                    data.etiologi_luka_1 == '1' ? $('#edit-etiologi-luka-1').prop('checked', true)   : $('#edit-etiologi-luka-1').prop('checked', false);
                    data.etiologi_luka_2 == '1' ? $('#edit-etiologi-luka-2').prop('checked', true)   : $('#edit-etiologi-luka-2').prop('checked', false);
                    data.etiologi_luka_3 == '1' ? $('#edit-etiologi-luka-3').prop('checked', true)   : $('#edit-etiologi-luka-3').prop('checked', false);
                    data.etiologi_luka_4 == '1' ? $('#edit-etiologi-luka-4').prop('checked', true)   : $('#edit-etiologi-luka-4').prop('checked', false);
                    $('#edit-etiologi-luka-5').val(data.etiologi_luka_5);

                    data.gambar_klinis_1 == '1' ? $('#edit-gambar-klinis-1').prop('checked', true)   : $('#edit-gambar-klinis-1').prop('checked', false);
                    data.gambar_klinis_2 == '1' ? $('#edit-gambar-klinis-2').prop('checked', true)   : $('#edit-gambar-klinis-2').prop('checked', false);
                    data.gambar_klinis_3 == '1' ? $('#edit-gambar-klinis-3').prop('checked', true)   : $('#edit-gambar-klinis-3').prop('checked', false);
                    data.gambar_klinis_4 == '1' ? $('#edit-gambar-klinis-4').prop('checked', true)   : $('#edit-gambar-klinis-4').prop('checked', false);

                    data.eksudat_1 == '1' ? $('#edit-eksudat-1').prop('checked', true)   : $('#edit-eksudat-1').prop('checked', false);
                    data.eksudat_2 == '1' ? $('#edit-eksudat-2').prop('checked', true)   : $('#edit-eksudat-2').prop('checked', false);
                    data.eksudat_3 == '1' ? $('#edit-eksudat-3').prop('checked', true)   : $('#edit-eksudat-3').prop('checked', false);
                    data.eksudat_4 == '1' ? $('#edit-eksudat-4').prop('checked', true)   : $('#edit-eksudat-4').prop('checked', false);

                    data.bau_1 == '1' ? $('#edit-bau-1').prop('checked', true)   : $('#edit-bau-1').prop('checked', false);
                    data.bau_2 == '1' ? $('#edit-bau-2').prop('checked', true)   : $('#edit-bau-2').prop('checked', false);
                    data.bau_3 == '1' ? $('#edit-bau-3').prop('checked', true)   : $('#edit-bau-3').prop('checked', false);
                    
                    data.ceklis_prltddp == '1' ? $('#edit-ceklis-prltddp').prop('checked', true) : $('#edit-ceklis-prltddp').prop('checked', false);

                    $('#edit-perawat-bidan-prltddp').val(data.perawat_bidan_prltddp);
                    $('#s2id_edit-perawat-bidan-prltddp a .select2c-chosen').html(data.perawat_or_bidan);
                    // modal.modal('show');
                },
                error: function(e) {
                    accessFailed(e.status);
                }
            })
        }

  
        // PRLTDDP
        function calcscoreprltddp() {
            let fisikScore = 0;
            let mentalScore = 0;
            let aktifitasScore = 0;      
            let mobilitasScore = 0;
            let inkontinensiaScore = 0;
     

            $("input[name='prd_fisik']:checked").each(function () {
                fisikScore += parseInt($(this).val());
            });
            $('#penilaian-prd-fisik').val(fisikScore);


            $("input[name='prd_mental']:checked").each(function () {
                mentalScore += parseInt($(this).val());
            });
            $('#penilaian-prd-mental').val(mentalScore);


            $("input[name='prd_aktifitas']:checked").each(function () {
                aktifitasScore += parseInt($(this).val());
            });
            $('#penilaian-prd-aktifitas').val(aktifitasScore);


            $("input[name='prd_mobilitas']:checked").each(function () {
                mobilitasScore += parseInt($(this).val());
            });
            $('#penilaian-prd-mobilitas').val(mobilitasScore);


            $("input[name='prd_inkontinensia']:checked").each(function () {
                inkontinensiaScore += parseInt($(this).val());
            });
            $('#penilaian-prd-inkontinensia').val(inkontinensiaScore);


            // console.log("Kewaspadaan Score: " + kewaspadaanScore);
            // console.log("Ketenangan Score: " + ketenanganScore);
            // console.log("Distress Score: " + distressScore);
            // console.log("Menangis Score: " + menangisScore);
            // console.log("Pergerakan Score: " + pergerakanScore);

            const totalScore = fisikScore + mentalScore + aktifitasScore + mobilitasScore + inkontinensiaScore ;
            $("input[name='total_nilai_prd']").val(totalScore);
        }

        // PRLTDDP  // PPRLT
        function resetFormPengkajianDekubitus() {
            // $('#wizard-pengkajian-dekubitus').bwizard('show', '0');
            $('#form_pengkajian_dekubitus')[0].reset();
            $("input[type='checkbox']").prop('checked',false);
            $("input[type='radio']").prop('checked',false);

            $('#buka-tutup-pprlt').empty();
            $('#buka-tutup-prltddp').empty();

            $('.disabled').prop('disabled', true)
            $('#s2id_perawat-bidan-prltddp a .select2c-chosen').empty();
            $('#tanggal-jam-prltddp').val('');
            $('#prltddp-jam').val('');
            $('#perawat-bidan-prltddp').val('');

            // PPRLT
            $('#s2id_inisialt-perawat-1 a .select2c-chosen').empty();
            $('#s2id_inisialt-perawat-2 a .select2c-chosen').empty();
            $('#s2id_inisialt-perawat-3 a .select2c-chosen').empty();
            $('#pprlt-tanggal-pemantauan').val('');
            $('#inisialt-perawat-1').val('');
            $('#inisialt-perawat-2').val('');
            $('#inisialt-perawat-3').val('');
            setTimeout(() => {
                $('#penilaian-edit-prd-fisik, #penilaian-edit-prd-mental, #penilaian-edit-prd-aktifitas, #penilaian-edit-prd-mobilitas, #penilaian-edit-prd-inkontinensia,   #penilaian-prd-fisik, #penilaian-prd-mental, #penilaian-prd-aktifitas, #penilaian-prd-mobilitas, #penilaian-prd-inkontinensia')
                    .val('');
                $('#form-prltddp').find('input').each(function() {
                    if ($(this).is(':checked')) {
                        $(this).prop('checked', false);
                    }
                })
                $('#form-pprlt').find('input').each(function() {
                    if ($(this).is(':checked')) {
                        $(this).prop('checked', false);
                    }
                })

            }, 100)
        }

        // PRLTDDP
        function editPengkajianDekubitus(obj, id, id_pendaftaran, id_layanan_pendaftaran, bed){
            const modal = $('#modal-edit-pengkajian-dekubitus');
            $('#update-prltddp').children().remove();
            $.ajax({
                type: 'GET',
                url: '<?= base_url("pelayanan/api/pelayanan/get_pengkajian_dekubitus") ?>/id/' +
                    id,
                cache: false,
                dataType: 'JSON',
                success: function(data) {

                    // console.log(data);
                    $('#update-prltddp').empty();
                    $('#id-pengkajian-dekubitus').val(id);

                    // function formatTanggalKhusus(waktu) {
                    //     var el = waktu.split('-');
                    //     var tahun = el[0];
                    //     var bulan = el[1];
                    //     var hari = el[2];
                    //     return hari + '/' + bulan + '/' + tahun;
                    // }


                    // INI KETIKA NILAI LUPA DIISI YANG NULL JADI TIDAK NULL ATAU TIDAK EROR
                    function formatTanggalKhusus(waktu) {
                        if (waktu) {
                            var el = waktu.split('-');
                            var tahun = el[0];
                            var bulan = el[1];
                            var hari = el[2];
                            return hari + '/' + bulan + '/' + tahun;
                        } else {
                            // Tindakan yang sesuai jika waktu adalah null
                            // return 'Format waktu tidak valid';
                        }
                    }




                    let edit_tanggal_jam_prltddp = formatTanggalKhusus(data.tanggal_jam_prltddp);
                    $('#edit-tanggal-jam-prltddp').val(edit_tanggal_jam_prltddp);
                    let cttntndkn = '';
                    cttntndkn =
                        `  <button type="button" class="btn btn-secondary waves-effect" onclick="$('#modal-edit-pengkajian-dekubitus').modal('hide');"><i class="fas fa-times-circle mr-1"></i>Tutup</button>
        						<button type="button" class="btn btn-info waves-effect" onclick="updatePengkajianDekubitus(${id_pendaftaran}, ${id_layanan_pendaftaran}, '${bed}')"><i class="fas fa-save mr-1"></i>Update</button>`;
                    $('#update-prltddp').append(cttntndkn);
               
                    $('#penilaian-edit-prd-fisik').val(data.prd_fisik);
                    modal.find('table input[name="prd_fisik"]').each(function() {
                        if ($(this).val() === data.prd_fisik) {
                            $(this).prop('checked', true);
                        } else {
                            $(this).prop('checked', false);
                        }
                    });
                  
                    $('#penilaian-edit-prd-mental').val(data.prd_mental);
                    modal.find('table input[name="prd_mental"]').each(function() {
                        if ($(this).val() === data.prd_mental) {
                            $(this).prop('checked', true);
                        } else {
                            $(this).prop('checked', false);
                        }
                    });
                  
                    $('#penilaian-edit-prd-aktifitas').val(data.prd_aktifitas);
                    modal.find('table input[name="prd_aktifitas"]').each(function() {
                        if ($(this).val() === data.prd_aktifitas) {
                            $(this).prop('checked', true);
                        } else {
                            $(this).prop('checked', false);
                        }
                    });
                  
                    $('#penilaian-edit-prd-mobilitas').val(data.prd_mobilitas);
                    modal.find('table input[name="prd_mobilitas"]').each(function() {
                        if ($(this).val() === data.prd_mobilitas) {
                            $(this).prop('checked', true);
                        } else {
                            $(this).prop('checked', false);
                        }
                    });
                  
                    $('#penilaian-edit-prd-inkontinensia').val(data.prd_inkontinensia);
                    modal.find('table input[name="prd_inkontinensia"]').each(function() {
                        if ($(this).val() === data.prd_inkontinensia) {
                            $(this).prop('checked', true);
                        } else {
                            $(this).prop('checked', false);
                        }
                    });

                    $('#edit-prltddp-jam').val(data.prltddp_jam);

                    $('#edit-total-nilai-prd').val(data.total_nilai_prd);

                   
                    data.luka_rs_1 == '1' ? $('#edit-luka-rs-1').prop('checked', true)   : $('#edit-luka-rs-1').prop('checked', false);
                    data.luka_rs_2 == '1' ? $('#edit-luka-rs-2').prop('checked', true)   : $('#edit-luka-rs-2').prop('checked', false);
                    $('#edit-luka-rs-3').val(data.luka_rs_3);

                    data.etiologi_luka_1 == '1' ? $('#edit-etiologi-luka-1').prop('checked', true)   : $('#edit-etiologi-luka-1').prop('checked', false);
                    data.etiologi_luka_2 == '1' ? $('#edit-etiologi-luka-2').prop('checked', true)   : $('#edit-etiologi-luka-2').prop('checked', false);
                    data.etiologi_luka_3 == '1' ? $('#edit-etiologi-luka-3').prop('checked', true)   : $('#edit-etiologi-luka-3').prop('checked', false);
                    data.etiologi_luka_4 == '1' ? $('#edit-etiologi-luka-4').prop('checked', true)   : $('#edit-etiologi-luka-4').prop('checked', false);
                    $('#edit-etiologi-luka-5').val(data.etiologi_luka_5);

                    data.gambar_klinis_1 == '1' ? $('#edit-gambar-klinis-1').prop('checked', true)   : $('#edit-gambar-klinis-1').prop('checked', false);
                    data.gambar_klinis_2 == '1' ? $('#edit-gambar-klinis-2').prop('checked', true)   : $('#edit-gambar-klinis-2').prop('checked', false);
                    data.gambar_klinis_3 == '1' ? $('#edit-gambar-klinis-3').prop('checked', true)   : $('#edit-gambar-klinis-3').prop('checked', false);
                    data.gambar_klinis_4 == '1' ? $('#edit-gambar-klinis-4').prop('checked', true)   : $('#edit-gambar-klinis-4').prop('checked', false);

                    data.eksudat_1 == '1' ? $('#edit-eksudat-1').prop('checked', true)   : $('#edit-eksudat-1').prop('checked', false);
                    data.eksudat_2 == '1' ? $('#edit-eksudat-2').prop('checked', true)   : $('#edit-eksudat-2').prop('checked', false);
                    data.eksudat_3 == '1' ? $('#edit-eksudat-3').prop('checked', true)   : $('#edit-eksudat-3').prop('checked', false);
                    data.eksudat_4 == '1' ? $('#edit-eksudat-4').prop('checked', true)   : $('#edit-eksudat-4').prop('checked', false);

                    data.bau_1 == '1' ? $('#edit-bau-1').prop('checked', true)   : $('#edit-bau-1').prop('checked', false);
                    data.bau_2 == '1' ? $('#edit-bau-2').prop('checked', true)   : $('#edit-bau-2').prop('checked', false);
                    data.bau_3 == '1' ? $('#edit-bau-3').prop('checked', true)   : $('#edit-bau-3').prop('checked', false);
                    
                    data.ceklis_prltddp == '1' ? $('#edit-ceklis-prltddp').prop('checked', true) : $('#edit-ceklis-prltddp').prop('checked', false);

                    $('#edit-perawat-bidan-prltddp').val(data.perawat_bidan_prltddp);
                    $('#s2id_edit-perawat-bidan-prltddp a .select2c-chosen').html(data.perawat_or_bidan);
                    modal.modal('show');
                },
                error: function(e) {
                    accessFailed(e.status);
                }
            })
        }

        // PRLTDDP
        function updatePengkajianDekubitus(id_pendaftaran, id_layanan_pendaftaran, bed) {
            $.ajax({
                type: 'PUT',
                url: '<?= base_url("pelayanan/api/pelayanan/update_pengkajian_dekubitus") ?>',
                data: $('#form-edit-pengkajian-dekubitus').serialize(),
                cache: false,
                dataType: 'JSON',
                success: function(data) {
                    if (data.status) {
                        messageEditSuccess();
                        // $('#wizard-pengkajian-dekubitus').bwizard('show', '0');
                        entriPengkajianDekubitus(id_pendaftaran, id_layanan_pendaftaran, bed);
                    } else {
                        messageEditFailed();
                    }

                    $('#modal-edit-pengkajian-dekubitus').modal('hide');
                },
                error: function(e) {
                    messageEditFailed();
                }
            });
        }

        // PRLTDDP
        if (typeof numberPrltddp === 'undefined') {
            var numberPrltddp = 1;
        }

        // PRLTDDP
        function tambahPengkajianDekubitus() {
            // console.log(tambahPengkajianNyeriConfortScale());   
            if ($('#tanggal-jam-prltddp').val() === '') {
                syams_validation('#tanggal-jam-prltddp', 'Tanggal pengkajian harus diisi.');
                return false;
            } else {
                syams_validation_remove('#tanggal-jam-prltddp');
            }

            if ($('#prltddp-jam').val() === '') {
                syams_validation('#prltddp-jam', 'Jam pengkajian harus diisi.');
                return false;
            } else {
                syams_validation_remove('#prltddp-jam');
            }


            if ($('#perawat-bidan-prltddp').val() === '') {
                syams_validation('#perawat-bidan-prltddp', 'Nama perawat or bidan belum diisi.');
                return false;
            } else {
                syams_validation_remove('#perawat-bidan-prltddp');
            }

            let html = '';
            let tanggal_jam_prltddp = $('#tanggal-jam-prltddp').val();
            let prltddp_jam = $('#prltddp-jam').val();
            let ceklis_prltddp = $('#ceklis-prltddp').is(':checked');
            let perawat_or_bidan = $('#s2id_perawat-bidan-prltddp a .select2c-chosen').html();              
            let perawat_bidan_prltddp = $('#perawat-bidan-prltddp').val();   
            
            let prd_fisik = $('#penilaian-prd-fisik').val();
            let prd_mental = $('#penilaian-prd-mental').val();
            let prd_aktifitas = $('#penilaian-prd-aktifitas').val();
            let prd_mobilitas = $('#penilaian-prd-mobilitas').val();
            let prd_inkontinensia = $('#penilaian-prd-inkontinensia').val();
            let total_nilai_prd = $('#total-nilai-prd').val();

            let luka_rs_1 = $('#luka-rs-1').is(':checked');
            let luka_rs_2 = $('#luka-rs-2').is(':checked');
            let luka_rs_3 = $('#luka-rs-3').val();   

            let etiologi_luka_1 = $('#etiologi-luka-1').is(':checked');
            let etiologi_luka_2 = $('#etiologi-luka-2').is(':checked');
            let etiologi_luka_3 = $('#etiologi-luka-3').is(':checked');
            let etiologi_luka_4 = $('#etiologi-luka-4').is(':checked');
            let etiologi_luka_5 = $('#etiologi-luka-5').val();   

            let gambar_klinis_1 = $('#gambar-klinis-1').is(':checked');
            let gambar_klinis_2 = $('#gambar-klinis-2').is(':checked');
            let gambar_klinis_3 = $('#gambar-klinis-3').is(':checked');
            let gambar_klinis_4 = $('#gambar-klinis-4').is(':checked');

            let eksudat_1 = $('#eksudat-1').is(':checked');
            let eksudat_2 = $('#eksudat-2').is(':checked');
            let eksudat_3 = $('#eksudat-3').is(':checked');
            let eksudat_4 = $('#eksudat-4').is(':checked');

            let bau_1 = $('#bau-1').is(':checked');
            let bau_2 = $('#bau-2').is(':checked');
            let bau_3 = $('#bau-3').is(':checked');
        
            html = /* html */ `
                <tr class="row-in-${++numberPrltddp}">
                    <td class="number-pengkajian" align="center">${numberPrltddp++}</td>
                    <td align="center">
                        <input type="hidden" name="tanggal_jam_prltddp[]" value="${tanggal_jam_prltddp}">${tanggal_jam_prltddp}
                    </td>
                    <td align="center">
                        <input type="hidden" name="prltddp_jam[]" value="${prltddp_jam}">${prltddp_jam}
                    </td>
                    <td align="center">
                        <input type="hidden" name="total_nilai_prd[]" value="${total_nilai_prd}">${total_nilai_prd}
                    </td>
                    <td align="center">
                        <input type="hidden" name="ceklis_prltddp[]" value="${ceklis_prltddp ? 1 : 0}">${ceklis_prltddp ? '&check;' : '&#10006;'}
                    </td>
                    <td align="center">
                        <input type="hidden" name="perawat_bidan_prltddp[]" value="${perawat_bidan_prltddp}">${perawat_or_bidan}
                    </td>                  
                    <td align="center">
                        <?= $this->session->userdata('nama') ?>
                        <input type="hidden" name="user_pengkajian[]" value="<?= $this->session->userdata("id_translucent") ?>">
                        <input type="hidden" name="pengkajian_date_prltddp[]" value="<?= date("Y-m-d H:i:s") ?>">

                        <input type="hidden" name="prd_fisik[]" value="${prd_fisik}">
                        <input type="hidden" name="prd_mental[]" value="${prd_mental}">
                        <input type="hidden" name="prd_aktifitas[]" value="${prd_aktifitas}">
                        <input type="hidden" name="prd_mobilitas[]" value="${prd_mobilitas}">
                        <input type="hidden" name="prd_inkontinensia[]" value="${prd_inkontinensia}">

                        <input type="hidden" name="luka_rs_1[]" value="${luka_rs_1 ? 1 : 0}">
                        <input type="hidden" name="luka_rs_2[]" value="${luka_rs_2 ? 1 : 0}">
                        <input type="hidden" name="luka_rs_3[]" value="${luka_rs_3}">

                        <input type="hidden" name="etiologi_luka_1[]" value="${etiologi_luka_1 ? 1 : 0}">
                        <input type="hidden" name="etiologi_luka_2[]" value="${etiologi_luka_2 ? 1 : 0}">
                        <input type="hidden" name="etiologi_luka_3[]" value="${etiologi_luka_3 ? 1 : 0}">
                        <input type="hidden" name="etiologi_luka_4[]" value="${etiologi_luka_4 ? 1 : 0}">
                        <input type="hidden" name="etiologi_luka_5[]" value="${etiologi_luka_5}">

                        <input type="hidden" name="gambar_klinis_1[]" value="${gambar_klinis_1 ? 1 : 0}">
                        <input type="hidden" name="gambar_klinis_2[]" value="${gambar_klinis_2 ? 1 : 0}">
                        <input type="hidden" name="gambar_klinis_3[]" value="${gambar_klinis_3 ? 1 : 0}">
                        <input type="hidden" name="gambar_klinis_4[]" value="${gambar_klinis_4 ? 1 : 0}">

                        <input type="hidden" name="eksudat_1[]" value="${eksudat_1 ? 1 : 0}">
                        <input type="hidden" name="eksudat_2[]" value="${eksudat_2 ? 1 : 0}">
                        <input type="hidden" name="eksudat_3[]" value="${eksudat_3 ? 1 : 0}">
                        <input type="hidden" name="eksudat_4[]" value="${eksudat_4 ? 1 : 0}">

                        <input type="hidden" name="bau_1[]" value="${bau_1 ? 1 : 0}">
                        <input type="hidden" name="bau_2[]" value="${bau_2 ? 1 : 0}">
                        <input type="hidden" name="bau_3[]" value="${bau_3 ? 1 : 0}">                                     
                    </td>
                      <td align="center">
                        <button type="button" class="btn btn-secondary btn-xxs" onclick="removeList(this)"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
            `;
            $('#tabel-prltddp .body-table').append(html);
        }

        // PRLTDDP
        function hapusPengkajianDekubitus(obj, id) {
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
                                url: '<?= base_url("pelayanan/api/pelayanan/hapus_pengkajian_dekubitus") ?>/' +
                                    id,
                                cache: false,
                                dataType: 'JSON',
                                success: function(data) {
                                    if (data.status) {
                                        messageCustom(data.message, 'Success');
                                        removeList(obj);
                                    } else {
                                        customAlert('Hapus pengkajian Dekubitus', data
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

         // PPRLT 
        function showPemantauanDekubitus(num) {
            let html = bukaLebar('Form Pemantauan Dekubitus', num);
            html += /* html */ `
                <div class="from-group">
                    <label for="pprlt-tanggal-pemantauan">Tanggal Tindakan : </label>
                    <input type="text" name="pprlt_tanggal_pemantauan"id="pprlt-tanggal-pemantauan" class="custom-form clear-input d-inline-block col-lg-3 ml-2" placeholder="dd/mm/yyyy">
                </div>
                <hr>
                <table class="table table-sm table-striped table-bordered" style="margin-top: -15px" id="form-pprlt">
                    <thead>
                        <tr>
                            <th class="center" rowspan="2"><b>Tindakan Pencegahan</b></th>
                            <th class="center" colspan="2">Pagi</th>
                            <th class="center" colspan="2">Siang</th>
                            <th class="center" colspan="3">Malam</th>
                        </tr>
                        <tr>
                            <th class="center">Hand Over</th>
                            <th class="center">Jam 10</th>
                            <th class="center">Hand Over</th>
                            <th class="center">Jam 18</th>
                            <th class="center">Hand Over</th>
                            <th class="center">Jam 23</th>
                            <th class="center">Jam 4</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Mengecek kondisi kulit pasien</td> 
                            <td class="center"><input type="checkbox" name="mengecek_p_ho" id="mengecek-p-ho"></td>
                            <td class="center"><input type="checkbox" name="mengecek_p_10" id="mengecek-p-10"></td>
                            <td class="center"><input type="checkbox" name="mengecek_s_ho" id="mengecek-s-ho"></td>
                            <td class="center"><input type="checkbox" name="mengecek_s_18" id="mengecek-s-18"></td>
                            <td class="center"><input type="checkbox" name="mengecek_m_ho" id="mengecek-m-ho"></td>
                            <td class="center"><input type="checkbox" name="mengecek_m_23" id="mengecek-m-23"></td>
                            <td class="center"><input type="checkbox" name="mengecek_m_4" id="mengecek-m-4"></td>
                        </tr>
                        <tr>
                            <td>Mempertahankan kebersihan tempat tidur pasien</td>
                            <td class="center"><input type="checkbox" name="mempertahankan_p_ho" id="mempertahankan-p-ho"></td>
                            <td class="center"><input type="checkbox" name="mempertahankan_p_10" id="mempertahankan-p-10"></td>
                            <td class="center"><input type="checkbox" name="mempertahankan_s_ho" id="mempertahankan-s-ho"></td>
                            <td class="center"><input type="checkbox" name="mempertahankan_s_18" id="mempertahankan-s-18"></td>
                            <td class="center"><input type="checkbox" name="mempertahankan_m_ho" id="mempertahankan-m-ho"></td>
                            <td class="center"><input type="checkbox" name="mempertahankan_m_23" id="mempertahankan-m-23"></td>
                            <td class="center"><input type="checkbox" name="mempertahankan_m_4" id="mempertahankan-m-4"></td>
                        </tr>
                        <tr>
                            <td>Mengubah posisi pasien secara teratur</td>
                            <td class="center"><input type="checkbox" name="mengubah_p_ho" id="mengubah-p-ho"></td>
                            <td class="center"><input type="checkbox" name="mengubah_p_10" id="mengubah-p-10"></td>
                            <td class="center"><input type="checkbox" name="mengubah_s_ho" id="mengubah-s-ho"></td>
                            <td class="center"><input type="checkbox" name="mengubah_s_18" id="mengubah-s-18"></td>
                            <td class="center"><input type="checkbox" name="mengubah_m_ho" id="mengubah-m-ho"></td>
                            <td class="center"><input type="checkbox" name="mengubah_m_23" id="mengubah-m-23"></td>
                            <td class="center"><input type="checkbox" name="mengubah_m_4" id="mengubah-m-4"></td>
                        </tr>
                        <tr>
                            <td>Memeriksa kondisi matras decubitus pasien</td>
                            <td class="center"><input type="checkbox" name="memeriksa_p_ho" id="memeriksa-p-ho"></td>
                            <td class="center"><input type="checkbox" name="memeriksa_p_10" id="memeriksa-p-10"></td>
                            <td class="center"><input type="checkbox" name="memeriksa_s_ho" id="memeriksa-s-ho"></td>
                            <td class="center"><input type="checkbox" name="memeriksa_s_18" id="memeriksa-s-18"></td>
                            <td class="center"><input type="checkbox" name="memeriksa_m_ho" id="memeriksa-m-ho"></td>
                            <td class="center"><input type="checkbox" name="memeriksa_m_23" id="memeriksa-m-23"></td>
                            <td class="center"><input type="checkbox" name="memeriksa_m_4" id="memeriksa-m-4"></td>
                        </tr>               
                        <tr>
                            <td class="bold">Paraf</td>
                            <td class="center"><input type="checkbox" name="ttdd_p_ho" id="ttdd-p-ho"></td>
                            <td class="center"><input type="checkbox" name="ttdd_p_10" id="ttdd-p-10"></td>
                            <td class="center"><input type="checkbox" name="ttdd_s_ho" id="ttdd-s-ho"></td>
                            <td class="center"><input type="checkbox" name="ttdd_s_18" id="ttdd-s-18"></td>
                            <td class="center"><input type="checkbox" name="ttdd_m_ho" id="ttdd-m-ho"></td>
                            <td class="center"><input type="checkbox" name="ttdd_m_23" id="ttdd-m-23"></td>
                            <td class="center"><input type="checkbox" name="ttdd_m_4" id="ttdd-m-4"></td>
                        </tr>
                        <tr>
                            <td class="bold">Perawat</td>
                            <td colspan="2">
                                <div class="input-group">
                                    <input type="text" name="inisialt_perawat_1" id= "inisialt-perawat-1" class="select2c-input ml-2">  
                                </div>
                            </td>
                            <td colspan="2">
                                <div class="input-group">
                                    <input type="text" name="inisialt_perawat_2" id= "inisialt-perawat-2" class="select2c-input ml-2">
                                </div>
                            </td>
                            <td colspan="3">
                                <div class="input-group">
                                    <input type="text" name="inisialt_perawat_3" id= "inisialt-perawat-3" class="select2c-input ml-2">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="8">
                                <button type="button" title="Tambah Pemantauan Dekubitus" class="btn btn-info" onclick="tambahPemantauanDekubitus()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah Pemantauan Dekubitus</button>
                            </td>
                        </tr>
                    </tbody>
                </table>`;
            html += tutupRapet();
            $('#buka-tutup-pprlt').append(html);
        }     

        // PPRLT   
        function showPPemantauanDekubitus(data, id_pendaftaran, id_layanan_pendaftaran, bed) {
            $('#tabel-pprlt .body-table').empty();

            if (data !== null) {
                $.each(data, function(i, v) {
                    const selOp =
                        '<td align="center"><button type="button" class="btn btn-success btn-xs" onclick="editPemantauanDekubitus(this, ' +
                        v.id + ', ' + id_pendaftaran + ', ' + id_layanan_pendaftaran + ', \'' + bed +
                        '\')"><i class="fas fa-edit"></i> </button> <button type="button" class="btn btn-danger btn-xs" onclick="hapusPemantauanDekubitus(this, ' +
                        v.id + ')"> <i class="fas fa-trash-alt"></i> </button> </td>';

                    let html = /* html */ `
                        <tr>
                            <td class="number-terapi" align="center">${(++i)}</td>
                            <td class="center">${v.tanggal_pemantauan ? datefmysql(v.tanggal_pemantauan) : '-'}</td>
                            <td align="center">${v.perawat_1 || '-' }</td>
                            <td align="center">${v.perawat_2 || '-'}</td>
                            <td align="center">${v.perawat_3 || '-'}</td>
                            <td align="center">${v.akun_user}</td>
                            ${selOp}
                            <td align="center"><button type="button" class="btn btn-info btn-xxs" data-toggle="collapse" data-target="#data-collapse-${i}" aria-expanded="false" aria-controls="data-collapse-${i}"><i class="fas fa-expand"></i> Expand</button></td>
                        </tr>
                        
                        <tr class="collapse" id="data-collapse-${i}">
                            <td colspan="8">
                                <table class="table table-sm table-striped table-bordered" style="margin-top: .5rem">
                                    <thead>
                                    <tr>
                                        <th class="center" rowspan="2"><b>Tindakan Pencegahan</b></th>
                                        <th class="center" colspan="2">Pagi</th>
                                        <th class="center" colspan="2">Siang</th>
                                        <th class="center" colspan="3">Malam</th>
                                    </tr>
                                    <tr>
                                        <th class="center">Hand Over</th>
                                        <th class="center">Jam 10</th>
                                        <th class="center">Hand Over</th>
                                        <th class="center">Jam 18</th>
                                        <th class="center">Hand Over</th>
                                        <th class="center">Jam 23</th>
                                        <th class="center">Jam 4</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td colspan="8" class="bold text-uppercase"></td>
                                    </tr>
                                    <tr>
                                        <td>Mengecek kondisi kulit pasien</td>
                                        <td class="center">${v.mengecek_p_ho == '1' ? '&check;' : ''}</td>
                                        <td class="center">${v.mengecek_p_10 == '1' ? '&check;' : ''}</td>
                                        <td class="center">${v.mengecek_s_ho == '1' ? '&check;' : ''}</td>
                                        <td class="center">${v.mengecek_s_18 == '1' ? '&check;' : ''}</td>
                                        <td class="center">${v.mengecek_m_ho == '1' ? '&check;' : ''}</td>
                                        <td class="center">${v.mengecek_m_23 == '1' ? '&check;' : ''}</td>
                                        <td class="center">${v.mengecek_m_4 == '1' ? '&check;' : ''}</td>
                                    </tr>
                                    <tr>
                                        <td>Mempertahankan kebersihan tempat tidur pasien</td>
                                        <td class="center">${v.mempertahankan_p_ho == '1' ? '&check;' : ''}</td>
                                        <td class="center">${v.mempertahankan_p_10 == '1' ? '&check;' : ''}</td>
                                        <td class="center">${v.mempertahankan_s_ho == '1' ? '&check;' : ''}</td>
                                        <td class="center">${v.mempertahankan_s_18 == '1' ? '&check;' : ''}</td>
                                        <td class="center">${v.mempertahankan_m_ho == '1' ? '&check;' : ''}</td>
                                        <td class="center">${v.mempertahankan_m_23 == '1' ? '&check;' : ''}</td>
                                        <td class="center">${v.mempertahankan_m_4 == '1' ? '&check;' : ''}</td>
                                    </tr>
                                    <tr>
                                        <td>Mengubah posisi pasien secara teratur</td>
                                        <td class="center">${v.mengubah_p_ho == '1' ? '&check;' : ''}</td>
                                        <td class="center">${v.mengubah_p_10 == '1' ? '&check;' : ''}</td>
                                        <td class="center">${v.mengubah_s_ho == '1' ? '&check;' : ''}</td>
                                        <td class="center">${v.mengubah_s_18 == '1' ? '&check;' : ''}</td>
                                        <td class="center">${v.mengubah_m_ho == '1' ? '&check;' : ''}</td>
                                        <td class="center">${v.mengubah_m_23 == '1' ? '&check;' : ''}</td>
                                        <td class="center">${v.mengubah_m_4 == '1' ? '&check;' : ''}</td>
                                    </tr>

                                    <tr>
                                        <td>Memeriksa kondisi matras decubitus pasien</td>
                                        <td class="center">${v.memeriksa_p_ho == '1' ? '&check;' : ''}</td>
                                        <td class="center">${v.memeriksa_p_10 == '1' ? '&check;' : ''}</td>
                                        <td class="center">${v.memeriksa_s_ho == '1' ? '&check;' : ''}</td>
                                        <td class="center">${v.memeriksa_s_18 == '1' ? '&check;' : ''}</td>
                                        <td class="center">${v.memeriksa_m_ho == '1' ? '&check;' : ''}</td>
                                        <td class="center">${v.memeriksa_m_23 == '1' ? '&check;' : ''}</td>
                                        <td class="center">${v.memeriksa_m_4 == '1' ? '&check;' : ''}</td>
                                    </tr>
                        
                                    <tr>
                                        <td class="bold">Paraf</td>
                                        <td class="center">${v.ttdd_p_ho == '1' ? '&check;' : '&#10006;'}</td>
                                        <td class="center">${v.ttdd_p_10 == '1' ? '&check;' : '&#10006;'}</td>
                                        <td class="center">${v.ttdd_s_ho == '1' ? '&check;' : '&#10006;'}</td>
                                        <td class="center">${v.ttdd_s_18 == '1' ? '&check;' : '&#10006;'}</td>
                                        <td class="center">${v.ttdd_m_ho == '1' ? '&check;' : '&#10006;'}</td>
                                        <td class="center">${v.ttdd_m_23 == '1' ? '&check;' : '&#10006;'}</td>
                                        <td class="center">${v.ttdd_m_4 == '1' ? '&check;' : '&#10006;'}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    `;
                    $('#tabel-pprlt .body-table').append(html);
                    numberPprlt = i;
                })
            }
        }

        // PPRLT
        function editPemantauanDekubitus(obj, id, id_pendaftaran, id_layanan_pendaftaran, bed){
            // console.log('12345');
            const modal = $('#modal-edit-pemantauan-dekubitus');
            $('#update-pprlt').children().remove();
            $.ajax({
                type: 'GET',
                url: '<?= base_url("pelayanan/api/pelayanan/get_pemantauan_dekubitus") ?>/id/' +
                    id,
                cache: false,
                dataType: 'JSON',
                success: function(data) {

                    // console.log(data);
                    $('#update-pprlt').empty();
                    $('#id-pemantauan-dekubitus').val(id);

                    function formatTanggalKhusus(waktu) {
                        var el = waktu.split('-');
                        var tahun = el[0];
                        var bulan = el[1];
                        var hari = el[2];
                        return hari + '/' + bulan + '/' + tahun;
                    }
                    let edit_tanggal_pemantauan = formatTanggalKhusus(data.tanggal_pemantauan);
                    $('#pprlt-edit-tanggal-pemantauan').val(edit_tanggal_pemantauan);
                    let cttntndkn = '';
                    cttntndkn =
                        `  <button type="button" class="btn btn-secondary waves-effect" onclick="$('#modal-edit-pemantauan-dekubitus').modal('hide');"><i class="fas fa-times-circle mr-1"></i>Tutup</button>
        						<button type="button" class="btn btn-info waves-effect" onclick="updatePemantauanDekubitus(${id_pendaftaran}, ${id_layanan_pendaftaran}, '${bed}')"><i class="fas fa-save mr-1"></i>Update</button>`;
                    $('#update-pprlt').append(cttntndkn);
                  
                    data.mengecek_p_ho == '1' ? $('#mengecek-edit-p-ho').prop('checked', true) : $('#mengecek-edit-p-ho').prop('checked', false);
                    data.mengecek_p_10 == '1' ? $('#mengecek-edit-p-10').prop('checked', true) : $('#mengecek-edit-p-10').prop('checked', false);
                    data.mengecek_s_ho == '1' ? $('#mengecek-edit-s-ho').prop('checked', true) : $('#mengecek-edit-s-ho').prop('checked', false);
                    data.mengecek_s_18 == '1' ? $('#mengecek-edit-s-18').prop('checked', true) : $('#mengecek-edit-s-18').prop('checked', false);
                    data.mengecek_m_ho == '1' ? $('#mengecek-edit-m-ho').prop('checked', true) : $('#mengecek-edit-m-ho').prop('checked', false);
                    data.mengecek_m_23 == '1' ? $('#mengecek-edit-m-23').prop('checked', true) : $('#mengecek-edit-m-23').prop('checked', false);
                    data.mengecek_m_4 == '1' ? $('#mengecek-edit-m-4').prop('checked', true)   : $('#mengecek-edit-m-4').prop('checked', false);
                
                    data.mempertahankan_p_ho == '1' ? $('#mempertahankan-edit-p-ho').prop('checked', true) : $('#mempertahankan-edit-p-ho').prop('checked', false);
                    data.mempertahankan_p_10 == '1' ? $('#mempertahankan-edit-p-10').prop('checked', true) : $('#mempertahankan-edit-p-10').prop('checked', false);
                    data.mempertahankan_s_ho == '1' ? $('#mempertahankan-edit-s-ho').prop('checked', true) : $('#mempertahankan-edit-s-ho').prop('checked', false);
                    data.mempertahankan_s_18 == '1' ? $('#mempertahankan-edit-s-18').prop('checked', true) : $('#mempertahankan-edit-s-18').prop('checked', false);
                    data.mempertahankan_m_ho == '1' ? $('#mempertahankan-edit-m-ho').prop('checked', true) : $('#mempertahankan-edit-m-ho').prop('checked', false);
                    data.mempertahankan_m_23 == '1' ? $('#mempertahankan-edit-m-23').prop('checked', true) : $('#mempertahankan-edit-m-23').prop('checked', false);
                    data.mempertahankan_m_4 == '1' ? $('#mempertahankan-edit-m-4').prop('checked', true)   : $('#mempertahankan-edit-m-4').prop('checked', false);

                    data.mengubah_p_ho == '1' ? $('#mengubah-edit-p-ho').prop('checked', true) : $('#mengubah-edit-p-ho').prop('checked', false);
                    data.mengubah_p_10 == '1' ? $('#mengubah-edit-p-10').prop('checked', true) : $('#mengubah-edit-p-10').prop('checked', false);
                    data.mengubah_s_ho == '1' ? $('#mengubah-edit-s-ho').prop('checked', true) : $('#mengubah-edit-s-ho').prop('checked', false);
                    data.mengubah_s_18 == '1' ? $('#mengubah-edit-s-18').prop('checked', true) : $('#mengubah-edit-s-18').prop('checked', false);
                    data.mengubah_m_ho == '1' ? $('#mengubah-edit-m-ho').prop('checked', true) : $('#mengubah-edit-m-ho').prop('checked', false);
                    data.mengubah_m_23 == '1' ? $('#mengubah-edit-m-23').prop('checked', true) : $('#mengubah-edit-m-23').prop('checked', false);
                    data.mengubah_m_4 == '1' ? $('#mengubah-edit-m-4').prop('checked', true)   : $('#mengubah-edit-m-4').prop('checked', false);

                    data.memeriksa_p_ho == '1' ? $('#memeriksa-edit-p-ho').prop('checked', true) : $('#memeriksa-edit-p-ho').prop('checked', false);
                    data.memeriksa_p_10 == '1' ? $('#memeriksa-edit-p-10').prop('checked', true) : $('#memeriksa-edit-p-10').prop('checked', false);
                    data.memeriksa_s_ho == '1' ? $('#memeriksa-edit-s-ho').prop('checked', true) : $('#memeriksa-edit-s-ho').prop('checked', false);
                    data.memeriksa_s_18 == '1' ? $('#memeriksa-edit-s-18').prop('checked', true) : $('#memeriksa-edit-s-18').prop('checked', false);
                    data.memeriksa_m_ho == '1' ? $('#memeriksa-edit-m-ho').prop('checked', true) : $('#memeriksa-edit-m-ho').prop('checked', false);
                    data.memeriksa_m_23 == '1' ? $('#memeriksa-edit-m-23').prop('checked', true) : $('#memeriksa-edit-m-23').prop('checked', false);
                    data.memeriksa_m_4 == '1' ? $('#memeriksa-edit-m-4').prop('checked', true)   : $('#memeriksa-edit-m-4').prop('checked', false);
                  
                    data.ttdd_p_ho == '1' ? $('#ttdd-edit-p-ho').prop('checked', true) : $('#ttdd-edit-p-ho').prop('checked', false);
                    data.ttdd_p_10 == '1' ? $('#ttdd-edit-p-10').prop('checked', true) : $('#ttdd-edit-p-10').prop('checked', false);
                    data.ttdd_s_ho == '1' ? $('#ttdd-edit-s-ho').prop('checked', true) : $('#ttdd-edit-s-ho').prop('checked', false);
                    data.ttdd_s_18 == '1' ? $('#ttdd-edit-s-18').prop('checked', true) : $('#ttdd-edit-s-18').prop('checked', false);
                    data.ttdd_m_ho == '1' ? $('#ttdd-edit-m-ho').prop('checked', true) : $('#ttdd-edit-m-ho').prop('checked', false);
                    data.ttdd_m_23 == '1' ? $('#ttdd-edit-m-23').prop('checked', true) : $('#ttdd-edit-m-23').prop('checked', false);
                    data.ttdd_m_4 == '1' ? $('#ttdd-edit-m-4').prop('checked', true)   : $('#ttdd-edit-m-4').prop('checked', false);

                    $('#inisialt-perawat-edit-1').val(data.inisialt_perawat_1);
                    $('#s2id_inisialt-perawat-edit-1 a .select2c-chosen').html(data.perawat_1);

                    $('#inisialt-perawat-edit-2').val(data.inisialt_perawat_2);
                    $('#s2id_inisialt-perawat-edit-2 a .select2c-chosen').html(data.perawat_2);

                    $('#inisialt-perawat-edit-3').val(data.inisialt_perawat_3);
                    $('#s2id_inisialt-perawat-edit-3 a .select2c-chosen').html(data.perawat_3);

                    modal.modal('show');
                },
                error: function(e) {
                    accessFailed(e.status);
                }
            })
        }

        // PPRLT
        function updatePemantauanDekubitus(id_pendaftaran, id_layanan_pendaftaran, bed) {
            $.ajax({
                type: 'PUT',
                url: '<?= base_url("pelayanan/api/pelayanan/update_pemantauan_dekubitus") ?>',
                data: $('#form-edit-pemantauan-dekubitus').serialize(),
                cache: false,
                dataType: 'JSON',
                success: function(data) {
                    if (data.status) {
                        messageEditSuccess();
                        // $('#wizard-pengkajian-dekubitus').bwizard('show', '0');
                        entriPengkajianDekubitus(id_pendaftaran, id_layanan_pendaftaran, bed);
                    } else {
                        messageEditFailed();
                    }

                    $('#modal-edit-pemantauan-dekubitus').modal('hide');
                },
                error: function(e) {
                    messageEditFailed();
                }
            });
        }

        // PPRLT
        if (typeof numberPprlt === 'undefined') {
            var numberPprlt = 1;
        }

        function tambahPemantauanDekubitus() {
            // console.log('kontol')        
            if ($('#pprlt-tanggal-pemantauan').val() === '') {
                syams_validation('#pprlt-tanggal-pemantauan', 'Tanggal Pemantauan harus diisi.');
                return false;
            } else {
                syams_validation_remove('#pprlt-tanggal-pemantauan');
            }

            if ($('#pprlt-perawat').val() === '') {
                syams_validation('#pprlt-perawat', 'Nama perawat belum diisi.');
                return false;
            } else {
                syams_validation_remove('#pprlt-perawat');
            }

            let html = '';
            let pprlt_tanggal_pemantauan = $('#pprlt-tanggal-pemantauan').val();
            let perawat_1 = $('#s2id_inisialt-perawat-1 a .select2c-chosen').html();
            let perawat_2 = $('#s2id_inisialt-perawat-2 a .select2c-chosen').html();
            let perawat_3 = $('#s2id_inisialt-perawat-3 a .select2c-chosen').html();
            let inisialt_perawat_1 = $('#inisialt-perawat-1').val();
            let inisialt_perawat_2 = $('#inisialt-perawat-2').val();
            let inisialt_perawat_3 = $('#inisialt-perawat-3').val();

            
            let mengecek_p_ho = $('#mengecek-p-ho').is(':checked');
            let mengecek_p_10 = $('#mengecek-p-10').is(':checked');
            let mengecek_s_ho = $('#mengecek-s-ho').is(':checked');
            let mengecek_s_18 = $('#mengecek-s-18').is(':checked');
            let mengecek_m_ho = $('#mengecek-m-ho').is(':checked');
            let mengecek_m_23 = $('#mengecek-m-23').is(':checked');
            let mengecek_m_4 = $('#mengecek-m-4').is(':checked');

            
            let mempertahankan_p_ho = $('#mempertahankan-p-ho').is(':checked');
            let mempertahankan_p_10 = $('#mempertahankan-p-10').is(':checked');
            let mempertahankan_s_ho = $('#mempertahankan-s-ho').is(':checked');
            let mempertahankan_s_18 = $('#mempertahankan-s-18').is(':checked');
            let mempertahankan_m_ho = $('#mempertahankan-m-ho').is(':checked');
            let mempertahankan_m_23 = $('#mempertahankan-m-23').is(':checked');
            let mempertahankan_m_4 = $('#mempertahankan-m-4').is(':checked');

            
            let mengubah_p_ho = $('#mengubah-p-ho').is(':checked');
            let mengubah_p_10 = $('#mengubah-p-10').is(':checked');
            let mengubah_s_ho = $('#mengubah-s-ho').is(':checked');
            let mengubah_s_18 = $('#mengubah-s-18').is(':checked');
            let mengubah_m_ho = $('#mengubah-m-ho').is(':checked');
            let mengubah_m_23 = $('#mengubah-m-23').is(':checked');
            let mengubah_m_4 = $('#mengubah-m-4').is(':checked');

        
            let memeriksa_p_ho = $('#memeriksa-p-ho').is(':checked');
            let memeriksa_p_10 = $('#memeriksa-p-10').is(':checked');
            let memeriksa_s_ho = $('#memeriksa-s-ho').is(':checked');
            let memeriksa_s_18 = $('#memeriksa-s-18').is(':checked');
            let memeriksa_m_ho = $('#memeriksa-m-ho').is(':checked');
            let memeriksa_m_23 = $('#memeriksa-m-23').is(':checked');
            let memeriksa_m_4 = $('#memeriksa-m-4').is(':checked');

            
            let ttdd_p_ho = $('#ttdd-p-ho').is(':checked');
            let ttdd_p_10 = $('#ttdd-p-10').is(':checked');
            let ttdd_s_ho = $('#ttdd-s-ho').is(':checked');
            let ttdd_s_18 = $('#ttdd-s-18').is(':checked');
            let ttdd_m_ho = $('#ttdd-m-ho').is(':checked');
            let ttdd_m_23 = $('#ttdd-m-23').is(':checked');
            let ttdd_m_4 = $('#ttdd-m-4').is(':checked');

            html = /* html */ `
                <tr class="row-in-${++numberPprlt}">
                    <td class="number-pemantauan" align="center">${numberPprlt}</td>
                    <td align="center">
                    	<input type="hidden" name="pprlt_tanggal_pemantauan[]" value="${pprlt_tanggal_pemantauan}">${pprlt_tanggal_pemantauan}
                    </td>
                    <td align="center">
                    	<input type="hidden" name="inisialt_perawat_1[]" value="${inisialt_perawat_1}">${perawat_1}
                    </td>
                    <td align="center">
                    	<input type="hidden" name="inisialt_perawat_2[]" value="${inisialt_perawat_2}">${perawat_2}
                    </td>
                    <td align="center">
                    	<input type="hidden" name="inisialt_perawat_3[]" value="${inisialt_perawat_3}">${perawat_3}
                    </td>
                    <td align="center">
        				<?= $this->session->userdata('nama') ?>
        				<input type="hidden" name="user_pemantauan[]" value="<?= $this->session->userdata("id_translucent") ?>">
        				<input type="hidden" name="pencegahan_date_pprlt[]" value="<?= date("Y-m-d H:i:s") ?>">

        				<input type="hidden" name="mengecek_p_ho[]" value="${mengecek_p_ho ? 1 : 0}">
        				<input type="hidden" name="mengecek_p_10[]" value="${mengecek_p_10 ? 1 : 0}">
        				<input type="hidden" name="mengecek_s_ho[]" value="${mengecek_s_ho ? 1 : 0}">
        				<input type="hidden" name="mengecek_s_18[]" value="${mengecek_s_18 ? 1 : 0}">
        				<input type="hidden" name="mengecek_m_ho[]" value="${mengecek_m_ho ? 1 : 0}">
        				<input type="hidden" name="mengecek_m_23[]" value="${mengecek_m_23 ? 1 : 0}">
        				<input type="hidden" name="mengecek_m_4[]" value="${mengecek_m_4 ? 1 : 0}">

        				<input type="hidden" name="mempertahankan_p_ho[]" value="${mempertahankan_p_ho ? 1 : 0}">
        				<input type="hidden" name="mempertahankan_p_10[]" value="${mempertahankan_p_10 ? 1 : 0}">
        				<input type="hidden" name="mempertahankan_s_ho[]" value="${mempertahankan_s_ho ? 1 : 0}">
        				<input type="hidden" name="mempertahankan_s_18[]" value="${mempertahankan_s_18 ? 1 : 0}">
        				<input type="hidden" name="mempertahankan_m_ho[]" value="${mempertahankan_m_ho ? 1 : 0}">
        				<input type="hidden" name="mempertahankan_m_23[]" value="${mempertahankan_m_23 ? 1 : 0}">
        				<input type="hidden" name="mempertahankan_m_4[]" value="${mempertahankan_m_4 ? 1 : 0}">

        				<input type="hidden" name="mengubah_p_ho[]" value="${mengubah_p_ho ? 1 : 0}">
        				<input type="hidden" name="mengubah_p_10[]" value="${mengubah_p_10 ? 1 : 0}">
        				<input type="hidden" name="mengubah_s_ho[]" value="${mengubah_s_ho ? 1 : 0}">
        				<input type="hidden" name="mengubah_s_18[]" value="${mengubah_s_18 ? 1 : 0}">
        				<input type="hidden" name="mengubah_m_ho[]" value="${mengubah_m_ho ? 1 : 0}">
        				<input type="hidden" name="mengubah_m_23[]" value="${mengubah_m_23 ? 1 : 0}">
        				<input type="hidden" name="mengubah_m_4[]" value="${mengubah_m_4 ? 1 : 0}">

                        <input type="hidden" name="memeriksa_p_ho[]" value="${memeriksa_p_ho ? 1 : 0}">
        				<input type="hidden" name="memeriksa_p_10[]" value="${memeriksa_p_10 ? 1 : 0}">
        				<input type="hidden" name="memeriksa_s_ho[]" value="${memeriksa_s_ho ? 1 : 0}">
        				<input type="hidden" name="memeriksa_s_18[]" value="${memeriksa_s_18 ? 1 : 0}">
        				<input type="hidden" name="memeriksa_m_ho[]" value="${memeriksa_m_ho ? 1 : 0}">
        				<input type="hidden" name="memeriksa_m_23[]" value="${memeriksa_m_23 ? 1 : 0}">
        				<input type="hidden" name="memeriksa_m_4[]" value="${memeriksa_m_4 ? 1 : 0}">

        				<input type="hidden" name="ttdd_p_ho[]" value="${ttdd_p_ho ? 1 : 0}">
        				<input type="hidden" name="ttdd_p_10[]" value="${ttdd_p_10 ? 1 : 0}">
        				<input type="hidden" name="ttdd_s_ho[]" value="${ttdd_s_ho ? 1 : 0}">
        				<input type="hidden" name="ttdd_s_18[]" value="${ttdd_s_18 ? 1 : 0}">
        				<input type="hidden" name="ttdd_m_ho[]" value="${ttdd_m_ho ? 1 : 0}">
        				<input type="hidden" name="ttdd_m_23[]" value="${ttdd_m_23 ? 1 : 0}">
        				<input type="hidden" name="ttdd_m_4[]" value="${ttdd_m_4 ? 1 : 0}">
                    </td>
                    <td align="center">
                        <button type="button" id="pepel" class="btn btn-secondary btn-xxs" onclick="(() => {$(this).parent().parent().parent().find('.row-in-' + numberPprlt).remove(); numberPprlt--;})()"><i class="fas fa-trash-alt"></i></button>
                    </td>
                    <td align="center"><button type="button" class="btn btn-info btn-xxs" data-toggle="collapse" data-target="#data-collapse-${numberPprlt}" aria-expanded="false" aria-controls="data-collapse-${numberPprlt}"><i class="fas fa-expand"></i> Expand</button></td>
                </tr>
                <tr class="collapse row-in-${numberPprlt}" id="data-collapse-${numberPprlt}">
                	<td colspan="8">
                		<table class="table table-sm table-striped table-bordered" style="margin-top: .5rem">
        					<thead>
        					<tr>
        						<th class="center" rowspan="2"><b>Tindakan Pencegahan</b></th>
        						<th class="center" colspan="2">Pagi</th>
        						<th class="center" colspan="2">Siang</th>
        						<th class="center" colspan="3">Malam</th>
        					</tr>
        					<tr>
        						<th class="center">Hand Over</th>
        						<th class="center">Jam 10</th>
        						<th class="center">Hand Over</th>
        						<th class="center">Jam 18</th>
        						<th class="center">Hand Over</th>
        						<th class="center">Jam 23</th>
        						<th class="center">Jam 4</th>
        					</tr>
        					</thead>
        					<tbody>
        					<tr>
        						<td colspan="8" class="bold text-uppercase"></td>
        					</tr>
        					<tr>
        						<td>Mengecek kondisi kulit pasien</td>
        						<td class="center">${mengecek_p_ho ? '&check;' : ''}</td>
        						<td class="center">${mengecek_p_10 ? '&check;' : ''}</td>
        						<td class="center">${mengecek_s_ho ? '&check;' : ''}</td>
        						<td class="center">${mengecek_s_18 ? '&check;' : ''}</td>
        						<td class="center">${mengecek_m_ho ? '&check;' : ''}</td>
        						<td class="center">${mengecek_m_23 ? '&check;' : ''}</td>
        						<td class="center">${mengecek_m_4 ? '&check;' : ''}</td>
        					</tr>
        					<tr>
        						<td>Mempertahankan kebersihan tempat tidur pasien</td>
        						<td class="center">${mempertahankan_p_ho ? '&check;' : ''}</td>
        						<td class="center">${mempertahankan_p_10 ? '&check;' : ''}</td>
        						<td class="center">${mempertahankan_s_ho ? '&check;' : ''}</td>
        						<td class="center">${mempertahankan_s_18 ? '&check;' : ''}</td>
        						<td class="center">${mempertahankan_m_ho ? '&check;' : ''}</td>
        						<td class="center">${mempertahankan_m_23 ? '&check;' : ''}</td>
        						<td class="center">${mempertahankan_m_4 ? '&check;' : ''}</td>
        					</tr>
        					<tr>
        						<td>Mengubah posisi pasien secara teratur</td>
        						<td class="center">${mengubah_p_ho ? '&check;' : ''}</td>
        						<td class="center">${mengubah_p_10 ? '&check;' : ''}</td>
        						<td class="center">${mengubah_s_ho ? '&check;' : ''}</td>
        						<td class="center">${mengubah_s_18 ? '&check;' : ''}</td>
        						<td class="center">${mengubah_m_ho ? '&check;' : ''}</td>
        						<td class="center">${mengubah_m_23 ? '&check;' : ''}</td>
        						<td class="center">${mengubah_m_4 ? '&check;' : ''}</td>
        					</tr>

                            <tr>
        						<td>Memeriksa kondisi matras decubitus pasien</td>
        						<td class="center">${memeriksa_p_ho ? '&check;' : ''}</td>
        						<td class="center">${memeriksa_p_10 ? '&check;' : ''}</td>
        						<td class="center">${memeriksa_s_ho ? '&check;' : ''}</td>
        						<td class="center">${memeriksa_s_18 ? '&check;' : ''}</td>
        						<td class="center">${memeriksa_m_ho ? '&check;' : ''}</td>
        						<td class="center">${memeriksa_m_23 ? '&check;' : ''}</td>
        						<td class="center">${memeriksa_m_4 ? '&check;' : ''}</td>
        					</tr>

        					<tr>
        						<td class="bold">Paraf</td>
        						<td class="center">${ttdd_p_ho ? '&check;' : '&#10006;'}</td>
        						<td class="center">${ttdd_p_10 ? '&check;' : '&#10006;'}</td>
        						<td class="center">${ttdd_s_ho ? '&check;' : '&#10006;'}</td>
        						<td class="center">${ttdd_s_18 ? '&check;' : '&#10006;'}</td>
        						<td class="center">${ttdd_m_ho ? '&check;' : '&#10006;'}</td>
        						<td class="center">${ttdd_m_23 ? '&check;' : '&#10006;'}</td>
        						<td class="center">${ttdd_m_4 ? '&check;' : '&#10006;'}</td>
        					</tr>
        					</tbody>
        				</table>
                	</td>
                </tr>
            `;
            $('#tabel-pprlt .body-table').append(html);
        }

        // PPRLT
        function hapusPemantauanDekubitus(obj, id) {
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
                                url: '<?= base_url("pelayanan/api/pelayanan/pemantauan_dekubitus") ?>/' +
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

</script>