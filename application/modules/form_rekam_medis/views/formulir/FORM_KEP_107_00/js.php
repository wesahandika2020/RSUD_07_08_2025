<!-- // PNCS -->
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
        
        function lihatFORM_KEP_107_00(data) {
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
            entriPengkajianNyeriComfortScale(layanan.id_pendaftaran, layanan.id, layanan.layanan, bed, action);
        }

        function editFORM_KEP_107_00(data) {
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
            entriPengkajianNyeriComfortScale(layanan.id_pendaftaran, layanan.id, layanan.layanan, bed, action);
        }

        function tambahFORM_KEP_107_00(data) {
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
            entriPengkajianNyeriComfortScale(layanan.id_pendaftaran, layanan.id, layanan.layanan, bed, action);
        }

        function entriPengkajianNyeriComfortScale(id_pendaftaran, id_layanan_pendaftaran, layanan, bed, action ) {
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
                url: '<?= base_url("pelayanan/api/pelayanan/get_data_pengkajian_nyeri_comfort_scale") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
                cache: false,
                dataType: 'JSON',
                beforeSend: function() {
                    showLoader();
                },
                success: function (data) {
                    // console.log(data);
                    resetFormPengkajianNyeriComfortScale(); 
                    $('#id-layanan-pendaftaran-pncs').val(id_layanan_pendaftaran);
                    $('#id_layanan_pendaftaran').val(id_layanan_pendaftaran);
                    $('#id-pendaftaran-pncs').val(id_pendaftaran);
                    if (data.pasien !== null) {
                        $('#id-pasien-pncs').val(data.pasien.id_pasien);
                        $('#nama-pasien-pncs').text(data.pasien.nama);
                        // $('#no-rm-pncs').text(data.pasien.no_rm);
                        $('#no-rm-pncs').text(data.pasien.id);
                        $('#tgl-lahir-pncs').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
                        $('#jenis-kelamin-pncs').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));                       
                    }
                    // PNCS TGL
                    $('#data-pengkajian-nyeri-comfort-scale').one('click', function() {
                        $('#pncs-tanggal-pengkajian, #edit-pncs-tanggal-pengkajian').datetimepicker({
                            format: 'DD/MM/YYYY',
                            maxDate: new Date(),
                            beforeShow: function(i) {
                                if ($(i).attr('readonly')) {
                                    return false;
                                }
                            }
                        });
                    })

                    // PNCS JAM
                    $('#data-pengkajian-nyeri-comfort-scale').one('click', function() {
                        $('#pncs-jam, #edit-pncs-jam')
                        .on('click', function() {
                            $(this).timepicker({
                                format: 'HH:mm',
                                showInputs: false,
                                showMeridian: false
                            });
                        })
                    })
                
                    // PNCS 
                    if (typeof data.pengkajian_nyeri_comfort_scale !== 'undefined' && data.pengkajian_nyeri_comfort_scale !== null) {
                        showPPengkajianNyeriComfortScale(data.pengkajian_nyeri_comfort_scale, id_pendaftaran, id_layanan_pendaftaran, bed, action);
                        showPengkajianNyeriComfortScale(nomer);
                    } else {
                        $('#tabel-pncs .body-table').empty();

                    }
                    
                    $('#bed-pncs').text(bed);
                    $('#modal_pengkajian_nyeri_comfort_scale').modal('show');                   
                },
                complete: function() {
                    hideLoader();
                },
                error: function(e) {
                    accessFailed(e.status);
                }
            })
        }       
        
        function showPengkajianNyeriComfortScale(num) {
            let html = bukaLebar('Form Pengkajian Nyeri Comfort Scale', num);
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
                                <input type="text" name="pncs_tanggal_pengkajian" id="pncs-tanggal-pengkajian" class="custom-form clear-input d-inline-block col-lg-2 ml-2" placeholder="dd/mm/yyyy">
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
                                <input type="text" name="pncs_jam" id="pncs-jam" class="custom-form clear-input d-inline-block col-lg-2 ml-2" placeholder="masukan jam">
                            </td>
                        </tr>
                    </table>
                    <hr>
                    <table class="table table-sm table-striped table-bordered" style="margin-top: -15px" id="form-pncs">
                        <thead>
                            <tr>
                                <th width="5%" class="center">no</th>
                                <th width="15%" class="center"><b>Kategori</b></th>
                                <th width="60%" class="center"><b></b></th>
                                <th width="10%" class="center"><b>Skor</b></th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td class="center"> <b> 1 </b> </td>
                                <td> <input type="hidden" id="kategori-kewaspadaan-pncs"> <b> Kewaspadaan </b> </td>  
                                <td> 1 - tidur pulas/nyenyak </td>
                                <td class="center">
                                    <input type="radio" name="kewaspadaan_pncs" id="kewaspadaan-pncs-1" value="1" class="mr-1" onchange="calcscorepncs()"> 1
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 2 - tidur kurang nyenyak </td>
                                <td class="center">
                                    <input type="radio" name="kewaspadaan_pncs" id="kewaspadaan-pncs-2" value="2" class="mr-1" onchange="calcscorepncs()"> 2
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 3 - gelisah </td>
                                <td class="center">
                                    <input type="radio" name="kewaspadaan_pncs" id="kewaspadaan-pncs-3" value="3" class="mr-1" onchange="calcscorepncs()"> 3
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 4 - sadar sepenuhnya dan waspada </td>
                                <td class="center">
                                    <input type="radio" name="kewaspadaan_pncs" id="kewaspadaan-pncs-4" value="4" class="mr-1" onchange="calcscorepncs()"> 4
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 5 - hiper alert </td>
                                <td class="center">
                                    <input type="radio" name="kewaspadaan_pncs" id="kewaspadaan-pncs-5" value="5" class="mr-1" onchange="calcscorepncs()"> 5
                                </td> 
                            </tr>


                            <tr>
                                <td class="center"> <b> 2 </b> </td>
                                <td> <input type="hidden" id="kategori-ketenangan-pncs"> <b> Ketenangan </b> </td>  
                                <td> 1 - tenang </td>
                                <td class="center">
                                    <input type="radio" name="ketenangan_pncs" id="ketenangan-pncs-1" value="1" class="mr-1" onchange="calcscorepncs()"> 1
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 2 - agak cemas </td>
                                <td class="center">
                                    <input type="radio" name="ketenangan_pncs" id="ketenangan-pncs-2" value="2" class="mr-1" onchange="calcscorepncs()"> 2
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 3 - cemas </td>
                                <td class="center">
                                    <input type="radio" name="ketenangan_pncs" id="ketenangan-pncs-3" value="3" class="mr-1" onchange="calcscorepncs()"> 3
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 4 - sangat cemas </td>
                                <td class="center">
                                    <input type="radio" name="ketenangan_pncs" id="ketenangan-pncs-4" value="4" class="mr-1" onchange="calcscorepncs()"> 4
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 5 - panik </td>
                                <td class="center">
                                    <input type="radio" name="ketenangan_pncs" id="ketenangan-pncs-5" value="5" class="mr-1" onchange="calcscorepncs()"> 5
                                </td> 
                            </tr>


                            <tr>
                                <td class="center"> <b> 3 </b> </td>
                                <td> <input type="hidden" id="kategori-distress-pncs"><b> Distress pernapasan </b> </td>  
                                <td> 1 - tidak ada respirasi spontan dan tidak ada batuk </td>
                                <td class="center">
                                    <input type="radio" name="distress_pncs" id="distress-pncs-1" value="1" class="mr-1" onchange="calcscorepncs()"> 1
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 2 - respirasi spontan dengan sedikit / tidak ada respons terhadap ventilasi </td>
                                <td class="center">
                                    <input type="radio" name="distress_pncs" id="distress-pncs-2" value="2" class="mr-1" onchange="calcscorepncs()">  2
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 3 - kadang-kadang batuk atau terdapat tahanan terhadap ventilasi </td>
                                <td class="center">
                                    <input type="radio" name="distress_pncs" id="distress-pncs-3" value="3" class="mr-1" onchange="calcscorepncs()">  3
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 4 - sering batuk, terdapat tahanan / perlawanan terhadap ventilator </td>
                                <td class="center">
                                    <input type="radio" name="distress_pncs" id="distress-pncs-4" value="4" class="mr-1" onchange="calcscorepncs()">  4
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 5 - melawan secara aktif terhadap ventilator, batuk terus - menerus / tersedak </td>
                                <td class="center">
                                    <input type="radio" name="distress_pncs" id="distress-pncs-5" value="5" class="mr-1" onchange="calcscorepncs()">  5
                                </td> 
                            </tr>


                            <tr>
                                <td class="center"> <b> 4 </b> </td>
                                <td> <input type="hidden" id="kategori-menangis-pncs"><b> Menangis </b> </td>
                                <td> 1 - bernapas dengan tenang, tidak menangis </td>
                                <td class="center">
                                    <input type="radio" name="menangis_pncs" id="menangis-pncs-1" value="1" class="mr-1" onchange="calcscorepncs()"> 1
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 2 - terisak-isak </td>
                                <td class="center">
                                    <input type="radio" name="menangis_pncs" id="menangis-pncs-2" value="2" class="mr-1" onchange="calcscorepncs()"> 2
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 3 - meraung </td>
                                <td class="center">
                                    <input type="radio" name="menangis_pncs" id="menangis-pncs-3" value="3" class="mr-1" onchange="calcscorepncs()"> 3
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 4 - menangis </td>
                                <td class="center">
                                    <input type="radio" name="menangis_pncs" id="menangis-pncs-4" value="4" class="mr-1" onchange="calcscorepncs()"> 4
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 5 - berteriak </td>
                                <td class="center">
                                    <input type="radio" name="menangis_pncs" id="menangis-pncs-5" value="5" class="mr-1" onchange="calcscorepncs()">  5
                                </td> 
                            </tr>


                            <tr>
                                <td class="center"> <b> 5 </b> </td>
                                <td> <input type="hidden" id="kategori-pergerakan-pncs"><b> Pergerakan </b> </td>  
                                <td> 1 - tidak ada pergerakan </td>
                                <td class="center">
                                    <input type="radio" name="pergerakan_pncs" id="pergerakan-pncs-1" value="1" class="mr-1" onchange="calcscorepncs()"> 1
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 2 - kadang-kadang bergerak perlahan </td>
                                <td class="center">
                                    <input type="radio" name="pergerakan_pncs" id="pergerakan-pncs-2" value="2" class="mr-1" onchange="calcscorepncs()"> 2
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 3 - sering bergerak perlahan </td>
                                <td class="center">
                                    <input type="radio" name="pergerakan_pncs" id="pergerakan-pncs-3" value="3" class="mr-1" onchange="calcscorepncs()"> 3
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 4 - pergerakan aktif / gelisah </td>
                                <td class="center">
                                    <input type="radio" name="pergerakan_pncs" id="pergerakan-pncs-4" value="4" class="mr-1" onchange="calcscorepncs()"> 4
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 5 - pergerakan aktif termasuk badan dan kepala </td>
                                <td class="center">
                                    <input type="radio" name="pergerakan_pncs" id="pergerakan-pncs-5" value="5" class="mr-1" onchange="calcscorepncs()"> 5
                                </td> 
                            </tr>


                            <tr>
                                <td class="center"> <b> 6 </b> </td>
                                <td> <input type="hidden" id="kategori-tonus-pncs"><b> Tonus otot </b> </td>  
                                <td> 1 - otot relaks sepenuhnya, tidak ada tonus otot </td>
                                <td class="center">
                                    <input type="radio" name="tonus_pncs" id="tonus-pncs-1" value="1" class="mr-1" onchange="calcscorepncs()"> 1
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 2 - penurunan tonus otot </td>
                                <td class="center">
                                    <input type="radio" name="tonus_pncs" id="tonus-pncs-2" value="2" class="mr-1" onchange="calcscorepncs()"> 2
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 3 - tonus otot normal </td>
                                <td class="center">
                                    <input type="radio" name="tonus_pncs" id="tonus-pncs-3" value="3" class="mr-1" onchange="calcscorepncs()"> 3
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 4 - peningkatan tonus otot dan fleksi jari tangan dan kaki </td>
                                <td class="center">
                                    <input type="radio" name="tonus_pncs" id="tonus-pncs-4" value="4" class="mr-1" onchange="calcscorepncs()"> 4
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 5 - kekakuan otot exstrim dan fleksi jari tangan dan kaki </td>
                                <td class="center">
                                    <input type="radio" name="tonus_pncs" id="tonus-pncs-5" value="5" class="mr-1" onchange="calcscorepncs()"> 5
                                </td> 
                            </tr>



                            <tr>
                                <td class="center"> <b> 7 </b> </td>
                                <td> <input type="hidden" id="kategori-tegangan-pncs"><b> Tegangan Wajah </b> </td>  
                                <td> 1 - otot wajah relaks sepenuhnya </td>
                                <td class="center">
                                    <input type="radio" name="tegangan_pncs" id="tegangan-pncs-1" value="1" class="mr-1" onchange="calcscorepncs()"> 1
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 2 - tonus otot wajah normal, tidak terlihat tegangan otot wajah yang nyata </td>
                                <td class="center">
                                    <input type="radio" name="tegangan_pncs" id="tegangan-pncs-2" value="2" class="mr-1" onchange="calcscorepncs()"> 2
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 3 - tegangan beberapa otot wajah terlihat nyata </td>
                                <td class="center">
                                    <input type="radio" name="tegangan_pncs" id="tegangan-pncs-3" value="3" class="mr-1" onchange="calcscorepncs()"> 3
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 4 - tegangan hampir di seluruh otot wajah </td>
                                <td class="center">
                                    <input type="radio" name="tegangan_pncs" id="tegangan-pncs-4" value="4" class="mr-1" onchange="calcscorepncs()"> 4
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 5 - seluruh otot wajah tegang, meringis </td>
                                <td class="center">
                                    <input type="radio" name="tegangan_pncs" id="tegangan-pncs-5" value="5" class="mr-1" onchange="calcscorepncs()"> 5
                                </td> 
                            </tr>



                            <tr>
                                <td class="center"> <b> 8 </b> </td>
                                <td><input type="hidden" id="kategori-tekanan-pncs"><b> Tekanan darah basal </b> </td>  
                                <td> 1 - tekanan darah di bawah batas normal </td>
                                <td class="center">
                                    <input type="radio" name="tekanan_pncs" id="tekanan-pncs-1" value="1" class="mr-1" onchange="calcscorepncs()"> 1
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 2 - tekanan darah berada di batas normal secara konsisten </td>
                                <td class="center">
                                    <input type="radio" name="tekanan_pncs" id="tekanan-pncs-2" value="2" class="mr-1" onchange="calcscorepncs()"> 2
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 3 - peningkatan tekanan darah sesekali  ≥15% di atas batas normal (1-3 kali dalam observasi selama 2 menit) </td>
                                <td class="center">
                                    <input type="radio" name="tekanan_pncs" id="tekanan-pncs-3" value="3" class="mr-1" onchange="calcscorepncs()"> 3
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 4 - seringnya peningkatan tekanan darah  ≥15% di atas batas normal (>3 kali dalam observasi selama 2 menit) </td>
                                <td class="center">
                                    <input type="radio" name="tekanan_pncs" id="tekanan-pncs-4" value="4" class="mr-1" onchange="calcscorepncs()"> 4
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 5 - peningkatan tekanan darah terus - menerus  ≥15% </td>
                                <td class="center">
                                    <input type="radio" name="tekanan_pncs" id="tekanan-pncs-5" value="5" class="mr-1" onchange="calcscorepncs()"> 5
                                </td> 
                            </tr>



                            <tr>
                                <td class="center"> <b> 9 </b> </td>
                                <td> <input type="hidden" id="kategori-denyut-pncs"><b> Denyut jantung basal </b> </td>  
                                <td> 1 - denyut jantung di bawah batas normal </td>
                                <td class="center">
                                    <input type="radio" name="denyut_pncs" id="denyut-pncs-1" value="1" class="mr-1" onchange="calcscorepncs()"> 1
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 2 - denyut jantung berada di batas normal secara konsisten </td>
                                <td class="center">
                                    <input type="radio" name="denyut_pncs" id="denyut-pncs-2" value="2" class="mr-1" onchange="calcscorepncs()"> 2
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 3 - peningkatan denyut jantung sesekali  ≥15% di atas batas normal (1-3 kali dalam observasi selama 2 menit) </td>
                                <td class="center">
                                    <input type="radio" name="denyut_pncs" id="denyut-pncs-3" value="3" class="mr-1" onchange="calcscorepncs()"> 3
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 4 - seringnya peningkatan denyut jantung  ≥15% di atas batas normal (>3 kali dalam observasi selama 2 menit) </td>
                                <td class="center">
                                    <input type="radio" name="denyut_pncs" id="denyut-pncs-4" value="4" class="mr-1" onchange="calcscorepncs()"> 4
                                </td> 
                            </tr>
                            <tr>
                                <td class="center"></td>
                                <td></td>
                                <td> 5 - peningkatan denyut jantung terus - menerus  ≥15% </td>
                                <td class="center">
                                    <input type="radio" name="denyut_pncs" id="denyut-pncs-5" value="5" class="mr-1" onchange="calcscorepncs()"> 5
                                </td> 
                            </tr>
                            <tr>
                                <td colspan="3" class="bold">JUMLAH SKOR</td>
                                <td colspan="2" class="center"><input type="number" min="0" name="jumlah_skor_pncs" id="jumlah-skor-pncs" class="custom-form clear-input center" placeholder="Jumlah" value="0" readonly></td>
                            </tr>
                            <tr>
                                <td class="bold">Paraf</td>
                                <td colspan="2"><input type="checkbox" name="paraf_pncs" id="paraf-pncs" class="mr-1" ></td>
                            </tr>
                            <tr>
                                <td class="bold">Perawat</td>
                                <td colspan="5">
                                    <input type="text" name="perawat_pncs" id="perawat-pncs" class="select2c-input ml-2">                                 
                                </td>
                            </tr>
                            <br>
                            <tr>
                                <td colspan="5">
                                    <button type="button" title="Tambah Pengkajian Nyeri Confort Scale" class="btn btn-info" onclick="tambahPengkajianNyeriConfortScale()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah Pengkajian Nyeri Confort Scale</button>
                                </td>
                            </tr>

                        </tbody>
                    </table>`;
            html += tutupRapet();
            $('#buka-tutup-pncs').append(html);
        }
     
        function konfirmasiSimpanPengkajianNyeriComfortScale() {
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
                    simpanPengkajianNyeriComfortScale();
                }
            })
        }

        function simpanPengkajianNyeriComfortScale() {
            var id_layanan_pendaftaran_pncs = $('#id-layanan-pendaftaran-pncs').val(); 
            $.ajax({
                type: 'POST',
                url: '<?= base_url("pelayanan/api/pelayanan/simpan_data_pengkajian_nyeri_comfort_scale") ?>',
                data: $('#form_pengkajian_nyeri_comfort_scale').serialize() + '&id-layanan-pendaftaran-pncs=' + id_layanan_pendaftaran_pncs,

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
                            $('#modal_pengkajian_nyeri_comfort_scale').modal('hide');
                            showListForm($('#id-pendaftaran-pncs').val(), $('#id-layanan-pendaftaran-pncs').val(), $('#id-pasien-pncs').val());
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
          
        $('#data-pengkajian-nyeri-comfort-scale').one('click', function() {
            $('#perawat-pncs, #edit-perawat-pncs')
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
 
        function showPPengkajianNyeriComfortScale(data, id_pendaftaran, id_layanan_pendaftaran, bed, action) {
            $('#tabel-pncs .body-table').empty();
            if (data !== null) {
                $.each(data, function(i, v) {


                    let btnAksesLihat = '';
                    if (action != 'lihat') {
                        btnAksesLihat = '<button type="button" class="btn btn-secondary btn-xs" onclick="editPengkajianNyeriComfortScale(this, ' +
                        v.id + ', ' + id_pendaftaran + ', ' + id_layanan_pendaftaran + ', \'' + bed +
                        '\')"><i class="fas fa-edit"></i> Edit</button> <button type="button" class="btn btn-secondary btn-xs" onclick="hapusPengkajianNyeriComfortScale(this, ' +
                        v.id +
                        ')"> <i class="fas fa-trash-alt"></i> Hapus</button>';
                    }
                    const selOp =
                    '<td align="center"><button type="button" class="btn btn-secondary btn-xs" onclick="lihatPengkajianNyeriComfortScale(this, ' +
                    v.id + ', ' + id_pendaftaran + ', ' + id_layanan_pendaftaran + ', \'' + bed +
                    '\')"><i class="fas fa-eye"></i> Lihat</button>' +
                    btnAksesLihat + 
                    '</td>';


                    let html = /* html */ `
                        <tr>
                            <td class="number-terapi" align="center">${(++i)}</td>
                            <td align="center">${v.tanggal_pengkajian}</td>
                            <td align="center">${v.pncs_jam}</td>  
                            <td align="center">${v.jumlah_skor_pncs}</td>
                            <td align="center">${v.paraf_pncs == '1' ? '&check;' : ''}</td>
                            <td align="center">${v.nama_perawat}</td>
                            <td align="center">${v.akun_user}</td>
                            ${selOp}
                        </tr>
                    `;
                    $('#tabel-pncs tbody').append(html);
                    numberPncs = i;
                })
            }
        }

        function resetFormPengkajianNyeriComfortScale() {
            $('#form_pengkajian_nyeri_comfort_scale')[0].reset();
            $("input[type='checkbox']").prop('checked',false);
            $("input[type='radio']").prop('checked',false);
            $('#s2id_perawat-pncs a .select2c-chosen').empty();
            $('#pncs-tanggal-pengkajian').val('');
            $('#pncs-jam').val('');
            $('#jumlah-skor-pncs').val('');
            $('#perawat-pncs').val('');
            setTimeout(() => {
                $('#kategori-kewaspadaan-pncs, #kategori-ketenangan-pncs, #kategori-distress-pncs,  #kategori-menangis-pncs, #kategori-pergerakan-pncs, #kategori-tonus-pncs, #kategori-tegangan-pncs, #kategori-tekanan-pncs, #kategori-denyut-pncs,    #kategori-edit-ketenangan-pncs, #kategori-edit-ketenangan-pncs, #kategori-edit-distress-pncs,  #kategori-edit-menangis-pncs, #kategori-edit-pergerakan-pncs, #kategori-edit-tonus-pncs, #kategori-edit-tegangan-pncs, #kategori-edit-tekanan-pncs, #kategori-edit-denyut-pncs')
                    .val('');
                $('#form-pncs').find('input').each(function() {
                    if ($(this).is(':checked')) {
                        $(this).prop('checked', false);
                    }
                })
            }, 100)

            $('#buka-tutup-pncs').empty();
        }


        // LIHAT
        function lihatPengkajianNyeriComfortScale(obj, id, id_pendaftaran, id_layanan_pendaftaran, bed){
            $('#modal-edit-pengkajian-nyeri-comfort-scale').modal('show');
            // $('#update-pncs').children().remove();
            $.ajax({
                type: 'GET',
                url: '<?= base_url("pelayanan/api/pelayanan/get_pengkajian_nyeri_comfort_scale") ?>/id/' +
                    id,
                cache: false,
                dataType: 'JSON',
                success: function(data) {

                    // console.log(data);
                    $('#update-pncs').empty();
                    $('#id-pengkajian-nyeri-comfort-scale').val(id);

                    function formatTanggalKhusus(waktu) {
                        var el = waktu.split('-');
                        var tahun = el[0];
                        var bulan = el[1];
                        var hari = el[2];
                        return hari + '/' + bulan + '/' + tahun;
                    }
                    let edit_tanggal_pengkajian = formatTanggalKhusus(data.tanggal_pengkajian);
                    $('#edit-pncs-tanggal-pengkajian').val(edit_tanggal_pengkajian);
                    let cttntndkn = '';
                    cttntndkn =
                        `   <button type="button" class="btn btn-secondary waves-effect" onclick="$('#modal-edit-pengkajian-nyeri-comfort-scale').modal('hide');"><i class="fas fa-times-circle mr-1"></i>Tutup</button>
                        `;
                    $('#update-pncs').append(cttntndkn);
                  
                    $('#kategori-edit-ketenangan-pncs').val(data.ketenangan_pncs);
                    $('table input[name="ketenangan_pncs"]').each(function() {
                        if ($(this).val() === data.ketenangan_pncs) {
                            $(this).prop('checked', true);
                        } else {
                            $(this).prop('checked', false);
                        }
                    });

                    $('#kategori-edit-distress-pncs').val(data.distress_pncs);
                    $('table input[name="distress_pncs"]').each(function() {
                        if ($(this).val() === data.distress_pncs) {
                            $(this).prop('checked', true);
                        } else {
                            $(this).prop('checked', false);
                        }
                    });

                    $('#kategori-edit-menangis-pncs').val(data.menangis_pncs);
                    $('table input[name="menangis_pncs"]').each(function() {
                        if ($(this).val() === data.menangis_pncs) {
                            $(this).prop('checked', true);
                        } else {
                            $(this).prop('checked', false);
                        }
                    });

                    $('#kategori-edit-pergerakan-pncs').val(data.pergerakan_pncs);
                    $('table input[name="pergerakan_pncs"]').each(function() {
                        if ($(this).val() === data.pergerakan_pncs) {
                            $(this).prop('checked', true);
                        } else {
                            $(this).prop('checked', false);
                        }
                    });

                    $('#kategori-edit-tonus-pncs').val(data.tonus_pncs);
                    $('table input[name="tonus_pncs"]').each(function() {
                        if ($(this).val() === data.tonus_pncs) {
                            $(this).prop('checked', true);
                        } else {
                            $(this).prop('checked', false);
                        }
                    });

                    $('#kategori-edit-kewaspadaan-pncs').val(data.kewaspadaan_pncs);
                    $('table input[name="kewaspadaan_pncs"]').each(function() {
                        if ($(this).val() === data.kewaspadaan_pncs) {
                            $(this).prop('checked', true);
                        } else {
                            $(this).prop('checked', false);
                        }
                    });

                    $('#kategori-edit-tegangan-pncs').val(data.tegangan_pncs);
                    $('table input[name="tegangan_pncs"]').each(function() {
                        if ($(this).val() === data.tegangan_pncs) {
                            $(this).prop('checked', true);
                        } else {
                            $(this).prop('checked', false);
                        }
                    });

                    $('#kategori-edit-tekanan-pncs').val(data.tekanan_pncs);
                    $('table input[name="tekanan_pncs"]').each(function() {
                        if ($(this).val() === data.tekanan_pncs) {
                            $(this).prop('checked', true);
                        } else {
                            $(this).prop('checked', false);
                        }
                    });

                    $('#kategori-edit-denyut-pncs').val(data.denyut_pncs);
                    $('table input[name="denyut_pncs"]').each(function() {
                        if ($(this).val() === data.denyut_pncs) {
                            $(this).prop('checked', true);
                        } else {
                            $(this).prop('checked', false);
                        }
                    });

                    // Set nilai input
                    $('#edit-pncs-jam').val(data.pncs_jam);
                    $('#edit-jumlah-skor-pncs').val(data.jumlah_skor_pncs);
                    data.paraf_pncs == '1' ? $('#edit-paraf-pncs').prop('checked', true) : $('#edit-paraf-pncs').prop('checked', false);
                    $('#edit-perawat-pncs').val(data.perawat_pncs);
                    $('#s2id_edit-perawat-pncs a .select2c-chosen').html(data.nama_perawat);
                    // modal.modal('show');
                },
                error: function(e) {
                    accessFailed(e.status);
                }
            })
        }


        function editPengkajianNyeriComfortScale(obj, id, id_pendaftaran, id_layanan_pendaftaran, bed){
            // console.log('12345');
            const modal = $('#modal-edit-pengkajian-nyeri-comfort-scale');
            $('#update-pncs').children().remove();
            $.ajax({
                type: 'GET',
                url: '<?= base_url("pelayanan/api/pelayanan/get_pengkajian_nyeri_comfort_scale") ?>/id/' +
                    id,
                cache: false,
                dataType: 'JSON',
                success: function(data) {

                    // console.log(data);
                    $('#update-pncs').empty();
                    $('#id-pengkajian-nyeri-comfort-scale').val(id);

                    function formatTanggalKhusus(waktu) {
                        var el = waktu.split('-');
                        var tahun = el[0];
                        var bulan = el[1];
                        var hari = el[2];
                        return hari + '/' + bulan + '/' + tahun;
                    }
                    let edit_tanggal_pengkajian = formatTanggalKhusus(data.tanggal_pengkajian);
                    $('#edit-pncs-tanggal-pengkajian').val(edit_tanggal_pengkajian);
                    let cttntndkn = '';
                    cttntndkn =
                        `  <button type="button" class="btn btn-secondary waves-effect" onclick="$('#modal-edit-pengkajian-nyeri-comfort-scale').modal('hide');"><i class="fas fa-times-circle mr-1"></i>Tutup</button>
        						<button type="button" class="btn btn-info waves-effect" onclick="updatePengkajianNyeriComfortScale(${id_pendaftaran}, ${id_layanan_pendaftaran}, '${bed}')"><i class="fas fa-save mr-1"></i>Update</button>`;
                    $('#update-pncs').append(cttntndkn);
                  
                    $('#kategori-edit-kewaspadaan-pncs').val(data.kewaspadaan_pncs);
                    modal.find('table input[name="kewaspadaan_pncs"]').each(function() {
                        if ($(this).val() === data.kewaspadaan_pncs) {
                            $(this).prop('checked', true);
                        } else {
                            $(this).prop('checked', false);
                        }
                    });

                    $('#kategori-edit-ketenangan-pncs').val(data.ketenangan_pncs);
                    modal.find('table input[name="ketenangan_pncs"]').each(function() {
                        if ($(this).val() === data.ketenangan_pncs) {
                            $(this).prop('checked', true);
                        } else {
                            $(this).prop('checked', false);
                        }
                    });

                    $('#kategori-edit-distress-pncs').val(data.distress_pncs);
                    modal.find('table input[name="distress_pncs"]').each(function() {
                        if ($(this).val() === data.distress_pncs) {
                            $(this).prop('checked', true);
                        } else {
                            $(this).prop('checked', false);
                        }
                    });

                    $('#kategori-edit-menangis-pncs').val(data.menangis_pncs);
                    modal.find('table input[name="menangis_pncs"]').each(function() {
                        if ($(this).val() === data.menangis_pncs) {
                            $(this).prop('checked', true);
                        } else {
                            $(this).prop('checked', false);
                        }
                    });

                    $('#kategori-edit-pergerakan-pncs').val(data.pergerakan_pncs);
                    modal.find('table input[name="pergerakan_pncs"]').each(function() {
                        if ($(this).val() === data.pergerakan_pncs) {
                            $(this).prop('checked', true);
                        } else {
                            $(this).prop('checked', false);
                        }
                    });

                    $('#kategori-edit-tonus-pncs').val(data.tonus_pncs);
                    modal.find('table input[name="tonus_pncs"]').each(function() {
                        if ($(this).val() === data.tonus_pncs) {
                            $(this).prop('checked', true);
                        } else {
                            $(this).prop('checked', false);
                        }
                    });

                    $('#kategori-edit-tegangan-pncs').val(data.tegangan_pncs);
                    modal.find('table input[name="tegangan_pncs"]').each(function() {
                        if ($(this).val() === data.tegangan_pncs) {
                            $(this).prop('checked', true);
                        } else {
                            $(this).prop('checked', false);
                        }
                    });

                    $('#kategori-edit-tekanan-pncs').val(data.tekanan_pncs);
                    modal.find('table input[name="tekanan_pncs"]').each(function() {
                        if ($(this).val() === data.tekanan_pncs) {
                            $(this).prop('checked', true);
                        } else {
                            $(this).prop('checked', false);
                        }
                    });

                    $('#kategori-edit-denyut-pncs').val(data.denyut_pncs);
                    // Memeriksa elemen radio
                    modal.find('table input[name="denyut_pncs"]').each(function() {
                        if ($(this).val() === data.denyut_pncs) {
                            $(this).prop('checked', true);
                        } else {
                            $(this).prop('checked', false);
                        }
                    });

                    // Set nilai input
                    $('#edit-pncs-jam').val(data.pncs_jam);
                    $('#edit-jumlah-skor-pncs').val(data.jumlah_skor_pncs);
                    data.paraf_pncs == '1' ? $('#edit-paraf-pncs').prop('checked', true) : $('#edit-paraf-pncs').prop('checked', false);
                    $('#edit-perawat-pncs').val(data.perawat_pncs);
                    $('#s2id_edit-perawat-pncs a .select2c-chosen').html(data.nama_perawat);
                    modal.modal('show');
                },
                error: function(e) {
                    accessFailed(e.status);
                }
            })
        }


        function updatePengkajianNyeriComfortScale(id_pendaftaran, id_layanan_pendaftaran, bed) {
            // console.log($('#form-edit-pengkajian-nyeri-comfort-scale').serialize());
            $.ajax({
                type: 'PUT',
                url: '<?= base_url("pelayanan/api/pelayanan/update_pengkajian_nyeri_comfort_scale") ?>',
                data: $('#form-edit-pengkajian-nyeri-comfort-scale').serialize(),
                cache: false,
                dataType: 'JSON',
                success: function(data) {
                    if (data.status) {
                        messageEditSuccess();
                        entriPengkajianNyeriComfortScale(id_pendaftaran, id_layanan_pendaftaran, bed);
                    } else {
                        messageEditFailed();
                    }

                    $('#modal-edit-pengkajian-nyeri-comfort-scale').modal('hide');
                },
                error: function(e) {
                    messageEditFailed();
                }
            });
        }

        if (typeof numberPncs === 'undefined') {
            var numberPncs = 1;
        }

        function tambahPengkajianNyeriConfortScale() {
            // console.log(tambahPengkajianNyeriConfortScale());        
            if ($('#pncs-tanggal-pengkajian').val() === '') {
                syams_validation('#pncs-tanggal-pengkajian', 'Tanggal pengkajian harus diisi.');
                return false;
            } else {
                syams_validation_remove('#pncs-tanggal-pengkajian');
            }

            if ($('#pncs-jam').val() === '') {
                syams_validation('#pncs-jam', 'jam harus diisi.');
                return false;
            } else {
                syams_validation_remove('#pncs-jam');
            }

            if ($('#perawat-pncs').val() === '') {
                syams_validation('#perawat-pncs', 'Nama perawat belum diisi.');
                return false;
            } else {
                syams_validation_remove('#perawat-pncs');
            }

            let html = '';
            let pncs_jam = $('#pncs-jam').val();
            let pncs_tanggal_pengkajian = $('#pncs-tanggal-pengkajian').val();
            let jumlah_skor_pncs = $('#jumlah-skor-pncs').val();
            let paraf_pncs = $('#paraf-pncs').is(':checked');
            let nama_perawat = $('#s2id_perawat-pncs a .select2c-chosen').html();   
            let perawat_pncs = $('#perawat-pncs').val();           
            let kewaspadaan_pncs = $('#kategori-kewaspadaan-pncs').val();
            let ketenangan_pncs = $('#kategori-ketenangan-pncs').val();
            let distress_pncs = $('#kategori-distress-pncs').val();
            let menangis_pncs = $('#kategori-menangis-pncs').val();
            let pergerakan_pncs = $('#kategori-pergerakan-pncs').val();
            let tonus_pncs = $('#kategori-tonus-pncs').val();
            let tegangan_pncs = $('#kategori-tegangan-pncs').val();
            let tekanan_pncs = $('#kategori-tekanan-pncs').val();
            let denyut_pncs = $('#kategori-denyut-pncs').val();
         
            html = /* html */ `
                <tr class="row-in-${++numberPncs}">
                    <td class="number-pengkajian" align="center">${numberPncs++}</td>
                    <td align="center">
                        <input type="hidden" name="pncs_tanggal_pengkajian[]" value="${pncs_tanggal_pengkajian}">${pncs_tanggal_pengkajian}
                    </td>
                    <td align="center">
                        <input type="hidden" name="pncs_jam[]" value="${pncs_jam}">${pncs_jam}
                    </td>
                    <td align="center">
                        <input type="hidden" name="jumlah_skor_pncs[]" value="${jumlah_skor_pncs}">${jumlah_skor_pncs}
                    </td>
                    <td align="center">
                        <input type="hidden" name="paraf_pncs[]" value="${paraf_pncs ? 1 : 0}">${paraf_pncs ? '&check;' : '&#10006;'}
                    </td>
                    <td align="center">
                        <input type="hidden" name="perawat_pncs[]" value="${perawat_pncs}">${nama_perawat}
                    </td>

                    
                    <td align="center">
                        <?= $this->session->userdata('nama') ?>
                        <input type="hidden" name="user_pengkajian[]" value="<?= $this->session->userdata("id_translucent") ?>">
                        <input type="hidden" name="pengkajian_date_nyeri_comfort_scale[]" value="<?= date("Y-m-d H:i:s") ?>">
                        <input type="hidden" name="kewaspadaan_pncs[]" value="${kewaspadaan_pncs}">
                        <input type="hidden" name="ketenangan_pncs[]" value="${ketenangan_pncs}">
                        <input type="hidden" name="distress_pncs[]" value="${distress_pncs}">
                        <input type="hidden" name="menangis_pncs[]" value="${menangis_pncs}">
                        <input type="hidden" name="pergerakan_pncs[]" value="${pergerakan_pncs}">
                        <input type="hidden" name="tonus_pncs[]" value="${tonus_pncs}">
                        <input type="hidden" name="tegangan_pncs[]" value="${tegangan_pncs}">
                        <input type="hidden" name="tekanan_pncs[]" value="${tekanan_pncs}">
                        <input type="hidden" name="denyut_pncs[]" value="${denyut_pncs}">                                       
                    </td>

                      <td align="center">
                        <button type="button" class="btn btn-secondary btn-xxs" onclick="removeList(this)"><i class="fas fa-trash-alt"></i></button>
                    </td>

                </tr>
            `;
            $('#tabel-pncs .body-table').append(html);
        }

        function hapusPengkajianNyeriComfortScale(obj, id) {
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
                                url: '<?= base_url("pelayanan/api/pelayanan/hapus_pengkajian_nyeri_comfort_scale") ?>/' +
                                    id,
                                cache: false,
                                dataType: 'JSON',
                                success: function(data) {
                                    if (data.status) {
                                        messageCustom(data.message, 'Success');
                                        removeList(obj);
                                    } else {
                                        customAlert('Hapus Pengkajian Nyeri Comfort Scale', data
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

        function calcscorepncs() {
            let kewaspadaanScore = 0;
            let ketenanganScore = 0;
            let distressScore = 0;      
            let menangisScore = 0;
            let pergerakanScore = 0;
            let tonusScore = 0;
            let teganganScore = 0;
            let tekananScore = 0;
            let denyutScore = 0;

            $("input[name='kewaspadaan_pncs']:checked").each(function () {
                kewaspadaanScore += parseInt($(this).val());
            });
            $('#kategori-kewaspadaan-pncs').val(kewaspadaanScore);

            $("input[name='ketenangan_pncs']:checked").each(function () {
                ketenanganScore += parseInt($(this).val());
            });
            $('#kategori-ketenangan-pncs').val(ketenanganScore);

            $("input[name='distress_pncs']:checked").each(function () {
                distressScore += parseInt($(this).val());
            });
            $('#kategori-distress-pncs').val(distressScore);

            $("input[name='menangis_pncs']:checked").each(function () {
                menangisScore += parseInt($(this).val());
            });
            $('#kategori-menangis-pncs').val(menangisScore);

            $("input[name='pergerakan_pncs']:checked").each(function () {
                pergerakanScore += parseInt($(this).val());
            });
            $('#kategori-pergerakan-pncs').val(pergerakanScore);

            $("input[name='tonus_pncs']:checked").each(function () {
                tonusScore += parseInt($(this).val());
            });
            $('#kategori-tonus-pncs').val(tonusScore);

            $("input[name='tegangan_pncs']:checked").each(function () {
                teganganScore += parseInt($(this).val());
            });
            $('#kategori-tegangan-pncs').val(teganganScore);      

            $("input[name='tekanan_pncs']:checked").each(function () {
                tekananScore += parseInt($(this).val());
            });
            $('#kategori-tekanan-pncs').val(tekananScore);

            $("input[name='denyut_pncs']:checked").each(function () {
                denyutScore += parseInt($(this).val());
            });
            $('#kategori-denyut-pncs').val(denyutScore);

            // console.log("Kewaspadaan Score: " + kewaspadaanScore);
            // console.log("Ketenangan Score: " + ketenanganScore);
            // console.log("Distress Score: " + distressScore);
            // console.log("Menangis Score: " + menangisScore);
            // console.log("Pergerakan Score: " + pergerakanScore);
            // console.log("Tonus Score: " + tonusScore);
            // console.log("Tegangan Score: " + teganganScore);
            // console.log("Tekanan Score: " + tekananScore);
            // console.log("Denyut Score: " + denyutScore);


            const totalScore = kewaspadaanScore + ketenanganScore + distressScore + menangisScore + pergerakanScore + tonusScore + teganganScore + tekananScore + denyutScore;
            $("input[name='jumlah_skor_pncs']").val(totalScore);
        }

</script>