<!-- // SKD -->
<script>
    // Mendapatkan tahun saat ini
    var tahunSekarang = new Date().getFullYear();                                                   
    // Menetapkan tahun ke elemen span dengan id "tahun"
    document.getElementById("tahun_skd").innerHTML = tahunSekarang;

    $(function() {
        $('#tanggalskd').datetimepicker({
            format: 'DD/MM/YYYY',
            pickSecond: false,
            pick12HourFormat: false,
            maxDate: new Date(),
            beforeShow: function(i) {
                if ($(i).attr('readonly')) {
                    return false;
                }
            }
        });

        $('#dokterskd').select2c({
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
                $('#dokter-informasi').val(data.id);
                return data.nama;
            }
        });
    })

    function simpanSuratKeteranganDisabilitas() {
        if ($('#tanggalskd').val() === '') {
            syams_validation('#tanggalskd', 'Tanggal belum diisi.');
            return false;
        } else {
            syams_validation_remove('#tanggalskd');
        }

        if ($('#dokterskd').val() === '') {
            syams_validation('#dokterskd', 'Nama Dokter belum diisi.');
            return false;
        } else {
            syams_validation_remove('#dokterskd');
        }

        var id_layanan_pendaftaran = $('#id-layanan-pendaftaran-skd').val();
        $.ajax({
            type: 'POST',
            url: '<?= base_url("medical_check_up/api/medical_check_up/simpan_surat_keterangan_disabilitas") ?>',
            data: $('#form_skd').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                if (data.status) {
                    messageCustom(data.message, 'Success');

                    var dWidth = $(window).width();
                    var dHeight = $(window).height();
                    var x = screen.width / 2 - dWidth / 2;
                    var y = screen.height / 2 - dHeight / 2;

                    $('#modal_skd').modal('hide');

                    window.open('<?= base_url('medical_check_up/cetak_surat_keterangan_disabilitas/') ?>' + id_layanan_pendaftaran,
                        'Cetak Surat Keterangan Disabilitas', 'width=' + dWidth + ', height=' +
                        dHeight +
                        ', left=' + x + ', top=' + y);
                } else {
                    messageCustom(data.message, 'Error');
                }
            },
            complete: function(data) {
                hideLoader();
            },
            error: function(e) {
                messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT', 'Error');
            }
        });
    }  

</script>


<div class="modal fade" id="modal_skd" data-backdrop="static">
    <div class="modal-dialog modal-dialog-scrollable" style="max-width: 70%;">
        <div class="modal-content">
            <div class="modal-header">
                <div class="title">
                    <h5 id="modal_skd_title"></h5>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="font-size: 16pt;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('', 'id=form_skd class="form-horizontal"') ?>
                <input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-skd">
                <input type="hidden" name="id_pendaftaran" id="id-pendaftaran-skd">
                <input type="hidden" name="id_user" id="id-user"value="<?= $this->session->userdata('id_translucent') ?>"> 		
                <div class="row">
                    <div class="col">
                        <div class="widget-body">
                            <div class="form_skd">
                                <table class="table table-no-border table-sm table-striped">
                                    <tr>
                                        <td class="bold" width="20%">Nomor</td>
                                        <td class="bold" width="1%">:</td>
                                        <td class="d-flex">
                                            <input type="number" name="nomorskd" id="nomorskd" class="custom-form col-lg-2 mx-2"> /MCU_RSUDKT / <span class="ml-1" id="tahun_skd"></span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="bold" width="20%">Nama</td>
                                        <td class="bold" width="1%">:</td>
                                        <td>
                                            <input type="text" class="custom-form col-lg-6" id="namapasienskd" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%">Tempat/Tanggal Lahir</td>
                                        <td class="bold" width="1%">:</td>
                                        <td>
                                            <input type="text" class="custom-form col-lg-6" id="ttlskd" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%">Umur</td>
                                        <td class="bold" width="1%">:</td>
                                        <td>
                                            <input type="text" class="custom-form col-lg-6" id="umurskd" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%">Jenis Kelamin</td>
                                        <td class="bold" width="1%">:</td>
                                        <td>
                                            <input type="text" class="custom-form col-lg-6" id="jkskd" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%">Alamat</td>
                                        <td class="bold" width="1%">:</td>
                                        <td>
                                            <textarea id="alamatskd" class="form-control clear-input d-inline-block col-lg-12" rows="2" disabled></textarea>
                                        </td>
                                    </tr>
                              
                                    <tr>
                                        <td class="bold" width="20%">Ada Disabilitas</td>
                                        <td class="bold" width="1%">:</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="checkbox" name="adadisabilitas" id="adadisabilitas" value="1"class="mr-1"> Ya  
                                                <input type="checkbox" name="adadisabilitasq" id="adadisabilitasq" value="1"class="mr-1 ml-2"> Tidak 
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%">Lokasi Disabilitas</td>
                                        <td class="bold" width="1%">:</td>
                                        <td>
                                            <input type="text" name="lokasiskd" id="lokasiskd" class="custom-form col-lg-8">
                                        </td>
                                    </tr>


                                    <tr>
                                        <td class="bold" width="20%">1. Susunan Saraf pusat Sebutkan </td>
                                        <td class="bold" width="1%">:</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="text" name="susunanskd" id="susunanskd" class="custom-form col-lg-8">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%">2. Organ Penginderaan Sebutkan </td>
                                        <td class="bold" width="1%">:</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="text" name="organskd" id="organskd" class="custom-form col-lg-8">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%">3. Extremitas Atas </td>
                                        <td class="bold" width="1%">:</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="checkbox" name="ektremitasataskanan" id="ektremitasataskanan" value="1"class="mr-1"> Kanan  
                                                <input type="checkbox" name="extremitasataskiri" id="extremitasataskiri" value="1"class="mr-1 ml-2"> Kiri 
                                                <input type="checkbox" name="extremitasataskeduanya" id="extremitasataskeduanya" value="1"class="mr-1 ml-2"> Keduanya 
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%">4. Tangan dominan  </td>
                                        <td class="bold" width="1%">:</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="checkbox" name="dominankanan" id="dominankanan" value="1"class="mr-1"> Kanan  
                                                <input type="checkbox" name="dominankiri" id="dominankiri" value="1"class="mr-1 ml-2"> Kiri 
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%">5. Extremitas Bawah </td>
                                        <td class="bold" width="1%">:</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="checkbox" name="ektremitasbawahkanan" id="ektremitasbawahkanan" value="1"class="mr-1"> Kanan  
                                                <input type="checkbox" name="extremitasbawahkiri" id="extremitasbawahkiri" value="1"class="mr-1 ml-2"> Kiri 
                                                <input type="checkbox" name="extremitasbawahkeduanya" id="extremitasbawahkeduanya" value="1"class="mr-1 ml-2"> Keduanya 
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%">6.	Lain - lain </td>
                                        <td class="bold" width="1%">:</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="text" name="lainskd" id="lainskd" class="custom-form col-lg-8">
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                <table class="table table-no-border table-sm table-striped">
                                    <tr>
                                        <td class="center bold">ANAMNESIS</td>
                                    </tr>
                                    <tr>
                                        <td class="bold">Setelah melakukan pemeriksaan kesehatan dan kemampuan fungsional bahwa yang bersangkutan benar-benar sebagai penyandang Disabilitas berupa :</td>
                                    </tr>
                                </table>
                                <table class="table table-no-border table-sm table-striped">
                                    <tr>
                                        <td class="bold" width="20%">1.	Riwayat Disabilitas  </td>
                                        <td class="bold" width="1%">:</td>
                                        <td>
                                            <div class="input-group">
                                            a. <input type="checkbox" name="sejakskd" id="sejakskd" value="1"class="mr-1"> Sejak lahir                             
                                                <input type="checkbox" name="kecelakaanskd" id="kecelakaanskd" value="1"class="mr-1 ml-2"> Kecelakaan dalam Pekerjaan 
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%"></td>
                                        <td class="bold" width="1%"></td>
                                        <td>
                                            <div class="input-group">
                                            b. <input type="checkbox" name="kecelaskd" id="kecelaskd" value="1"class="mr-1"> Kecelakaan lalu lintas                                     
                                                <input type="checkbox" name="strokeskd" id="strokeskd" value="1"class="mr-1 ml-2"> Akibat Stroke                   
                                                <input type="checkbox" name="kustaskd" id="kustaskd" value="1"class="mr-1 ml-2"> Akibat Kusta                    
                                                <input type="checkbox" name="laenskd" id="laenskd" value="1"class="mr-1 ml-2"> Lain-lain Sebutkan
                                                <input type="text" name="ptskd" id="ptskd" class="custom-form col-lg-5">, pada tahun :                    
                                                <input type="number" name="skdpt" id="skdpt" class="custom-form col-lg-5">                    
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%"></td>
                                        <td class="bold" width="1%"></td>
                                        <td>
                                            <div class="input-group">
                                            c. <input type="checkbox" name="sesudahskd" id="sesudahskd" value="1"class="mr-1"> Sesudah sakit, pada tahun :                                
                                                <input type="number" name="thskd" id="thskd" class="custom-form col-lg-2">              
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%">2.	Kemampuan mengurus diri </td>
                                        <td class="bold" width="1%">:</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="checkbox" name="kemampuanskd" id="kemampuanskd" value="1"class="mr-1"> Mampu                                     
                                                <input type="checkbox" name="tmskd" id="tmskd" value="1"class="mr-1 ml-2"> Tidak mampu	                                                   
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%"></td>
                                        <td class="bold" width="1%"></td>
                                        <td>
                                            <div class="input-group">                 
                                                <input type="checkbox" name="besarbisaskd" id="besarbisaskd" value="1"class="mr-1"> Sebagian besar bisa, jelaskan yang tidak bisa :                   
                                                <input type="text" name="jelasskd" id="jelasskd" class="custom-form col-lg-5">                
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%"></td>
                                        <td class="bold" width="1%"></td>
                                        <td>
                                            <div class="input-group">                               
                                                <input type="checkbox" name="perluskd" id="perluskd" value="1"class="mr-1"> Perlu bantuan penuh orang lain                                    
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%">3.	Bepergian keluar rumah </td>
                                        <td class="bold" width="1%">:</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="checkbox" name="bsaskb" id="bsaskb" value="1"class="mr-1"> Bisa sendiri                                      
                                                <input type="checkbox" name="anggotaskd" id="anggotaskd" value="1"class="mr-1 ml-2"> perlu diantar anggota keluarga	                                                   
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                <table class="table table-no-border table-sm table-striped">
                                    <tr>
                                        <td class="center bold">HASIL PEMERIKSAAN</td>
                                    </tr>
                                </table>
                                <table class="table table-no-border table-sm table-striped">
                                    <tr>
                                        <td class="bold" width="20%">4.	Jenis / Ragam Disabilitas   </td>
                                        <td class="bold" width="1%">:</td>
                                        <td>
                                            <div class="input-group">
                                                <strong>a. Disabilitas Fisik</strong> <br>
                                            </div>                                        
                                            <div class="input-group align-items-center">  
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span> 1. Amputasi</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="checkbox" name="atanganskd" id="atanganskd" value="1" class="mr-1"> Tangan
                                                <input type="checkbox" name="akakiskd" id="akakiskd" value="1" class="mr-1 ml-3"> Kaki
                                                <input type="text" name="tangankakiskd" id="tangankakiskd" class="custom-form ml-3 col-lg-3">
                                            </div>
                                            <br>
                                            <div class="input-group align-items-center">  
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span> 2. Kelemahan bagian atas anggota gerak atas dan bawah</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="text" name="akelemahanskd" id="akelemahanskd" class="custom-form ml-3 col-lg-3">
                                            </div>
                                            <br>
                                            <div class="input-group align-items-center">  
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span> 3. Paraplegi (anggota tubuh bagian bawah yang meliputi kedua tungkai dan organ panggul)</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="text" name="aparaplegiskd" id="aparaplegiskd" class="custom-form ml-3 col-lg-3">
                                            </div>
                                            <br>
                                            <div class="input-group align-items-center">  
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span> 4. Celebral Palsy (CP)</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="text" name="acelebral" id="acelebral" class="custom-form ml-3 col-lg-3">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%"></td>
                                        <td class="bold" width="1%"></td>
                                        <td>
                                            <div class="input-group">
                                                <strong>b. Disabilitas Sensorik</strong> <br>
                                            </div>                                        
                                            <div class="input-group align-items-center">  
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span> 1. Netra</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                                a.	Buta Total<input type="text" name="anetralskd" id="anetralskd" class="custom-form ml-3 col-lg-3">
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                b.	Persepsi Cahaya / Low Vision<input type="text" name="bnetralskd" id="bnetralskd" class="custom-form ml-3 col-lg-3">
                                            </div>
                                            <br>
                                            <div class="input-group align-items-center">  
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span> 2. Rungu</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="text" name="brunguskd" id="brunguskd" class="custom-form ml-3 col-lg-3">
                                            </div>
                                            <br>
                                            <div class="input-group align-items-center">  
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span> 3. Wicara</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="text" name="bwicaraskd" id="bwicaraskd" class="custom-form ml-3 col-lg-3">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%"></td>
                                        <td class="bold" width="1%"></td>
                                        <td>
                                            <div class="input-group">
                                                <strong>c. Disabilitas Intelektual</strong> <br>
                                            </div>                                        
                                            <div class="input-group align-items-center">  
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span> 1. Disabilitas Grahita</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="text" name="cgrahitaskd" id="cgrahitaskd" class="custom-form col-lg-3">
                                            </div>
                                            <br>
                                            <div class="input-group align-items-center">  
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span> 2. Disabilitas Syndrom</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="text" name="csyndromskd" id="csyndromskd" class="custom-form col-lg-3">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%"></td>
                                        <td class="bold" width="1%"></td>
                                        <td>
                                            <div class="input-group">
                                                <strong>d. Disabilitas Mental</strong> <br>
                                            </div>                                        
                                            <div class="input-group align-items-center">  
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span> 1. Psikososial (Skizofenia, Bipolar, Anxietas, dan Gangguan Kepribadian)*</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="text" name="dmentallskd" id="dmentallskd" class="custom-form col-lg-3">
                                            </div>
                                            <br>
                                            <div class="input-group align-items-center">  
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span> 2. Disabilitas Perkembangan (Autis / Hiperaktif)*</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <input type="text" name="dperkembanganskd" id="dperkembanganskd" class="custom-form col-lg-3">
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="bold" width="20%">5.	Derajat Disabilitas Fisik </td>
                                        <td class="bold" width="1%">:</td>
                                        <td> 
                                            <div class="input-group align-items-center">  
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="derajatskd1" id="derajatskd1" value="1" class="mr-1"> <span>Derajat 1 : mampu melaksanakan aktifitas atau mempertahankan sikap dengan kesulitan. </span>
                                            </div>
                                            <br>
                                            <div class="input-group align-items-center">  
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="derajatskd2" id="derajatskd2" value="1" class="mr-1"> <span>Derajat 2 : mampu melaksanakan kegiatan atau mempertahankan sikap dengan bantuan alat bantu.</span>
                                            </div>
                                            <br>
                                            <div class="input-group align-items-center">  
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="derajatskd3" id="derajatskd3" value="1" class="mr-1"> <span>Derajat 3 : mampu melaksanakan aktifitas sebagian memerlukan bantuan orang lain, dengan atau tanpa alat bantu. </span>
                                            </div>
                                            <br>
                                            <div class="input-group align-items-center">  
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="derajatskd4" id="derajatskd4" value="1" class="mr-1"> <span>Derajat 4 : dalam melaksanakan aktifitas, tergantung penuh terhadap pengawasan orang lain . </span>
                                            </div>
                                            <br>
                                            <div class="input-group align-items-center">  
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="derajatskd5" id="derajatskd5" value="1" class="mr-1"> <span>Derajat 5 : tidak mampu melakukan aktifitas tanpa bantuan penuh orang lain dan tersedianya lingkungan khusus. </span>
                                            </div>
                                            <br>
                                            <div class="input-group align-items-center">  
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" name="derajatskd6" id="derajatskd6" value="1" class="mr-1"> <span>Derajat 6 : tidak mampu penuh melaksanakan kegiatan sehari hari meskipun dibantu penuh orang lain. </span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%">6.	Kemampuan Mobilitas   </td>
                                        <td class="bold" width="1%">:</td>
                                        <td>
                                            <div class="input-group"> a.  &nbsp;&nbsp;
                                                <input type="checkbox" name="amjalanskd" id="amjalanskd" value="1"class="mr-1"> Jalan                           
                                                <input type="checkbox" name="amperlahanskd" id="amperlahanskd" value="1"class="mr-1 ml-3"> jalan perlahan   
                                                <input type="checkbox" name="amalatskd" id="amalatskd" value="1"class="mr-1 ml-3"> jalan dengan alat bantu       
                                                <input type="checkbox" name="ammampuskd" id="ammampuskd" value="1"class="mr-1 ml-3"> tidak mampu jalan   
                                            </div>
                                            <br>
                                            <div class="input-group"> b.  &nbsp;&nbsp;
                                                <input type="checkbox" name="bnaikskd" id="bnaikskd" value="1"class="mr-1"> Naik tangga                                
                                                <input type="checkbox" name="btanggaskd" id="btanggaskd" value="1"class="mr-1 ml-3"> naik tangga perlahan        
                                                <input type="checkbox" name="bnaeikskd" id="bnaeikskd" value="1"class="mr-1 ml-3"> tidak mampu naik tangga       
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="bold" width="20%">7.	Gangguan Extremitas atas  </td>
                                        <td class="bold" width="1%">:</td>
                                        <td>
                                            <div class="input-group"> a.  &nbsp;&nbsp;
                                                <input type="checkbox" name="aextrimskd1" id="aextrimskd1" value="1"class="mr-1">Kanan                             
                                                <input type="checkbox" name="aextrimskd2" id="aextrimskd2" value="1"class="mr-1 ml-3"> Kekuatan    
                                                <input type="checkbox" name="aextrimskd3" id="aextrimskd3" value="1"class="mr-1 ml-3"> 5      
                                                <input type="checkbox" name="aextrimskd4" id="aextrimskd4" value="1"class="mr-1 ml-3"> 4
                                                <input type="checkbox" name="aextrimskd5" id="aextrimskd5" value="1"class="mr-1 ml-3"> 3
                                                <input type="checkbox" name="aextrimskd6" id="aextrimskd6" value="1"class="mr-1 ml-3"> 2
                                                <input type="checkbox" name="aextrimskd7" id="aextrimskd7" value="1"class="mr-1 ml-3"> 1
                                                <input type="checkbox" name="aextrimskd8" id="aextrimskd8" value="1"class="mr-1 ml-3"> 0
                                            </div>
                                            <br>
                                            <div class="input-group"> b.  &nbsp;&nbsp;
                                                <input type="checkbox" name="bextrimskd1" id="bextrimskd1" value="1"class="mr-1">Kiri                                
                                                <input type="checkbox" name="bextrimskd2" id="bextrimskd2" value="1"class="mr-1 ml-3"> Kekuatan    
                                                <input type="checkbox" name="bextrimskd3" id="bextrimskd3" value="1"class="mr-1 ml-3"> 5      
                                                <input type="checkbox" name="bextrimskd4" id="bextrimskd4" value="1"class="mr-1 ml-3"> 4
                                                <input type="checkbox" name="bextrimskd5" id="bextrimskd5" value="1"class="mr-1 ml-3"> 3
                                                <input type="checkbox" name="bextrimskd6" id="bextrimskd6" value="1"class="mr-1 ml-3"> 2
                                                <input type="checkbox" name="bextrimskd7" id="bextrimskd7" value="1"class="mr-1 ml-3"> 1
                                                <input type="checkbox" name="bextrimskd8" id="bextrimskd8" value="1"class="mr-1 ml-3"> 0    
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%">8.	Alat Bantu yang di gunakan  </td>
                                        <td class="bold" width="1%">:</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="checkbox" name="gunakanskd" id="gunakanskd" value="1"class="mr-1">Tidak                                       
                                                <input type="checkbox" name="skdada" id="skdada" value="1"class="mr-1 ml-3"> Ada, Sebutkan   &nbsp;   
                                                <input type="text" name="skdsebutkan" id="skdsebutkan" class="custom-form col-lg-5">                                                  
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%">9.	Penyakit lain  </td>
                                        <td class="bold" width="1%">:</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="checkbox" name="tidakkakd" id="tidakkakd" value="1"class="mr-1">Tidak                                       
                                                <input type="checkbox" name="adaaskd" id="adaaskd" value="1"class="mr-1 ml-3"> Ada, Sebutkan   &nbsp;   
                                                <input type="text" name="sebuttkannskd" id="sebuttkannskd" class="custom-form col-lg-5">                                                  
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%">10. Pengobatan </td>
                                        <td class="bold" width="1%">:</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="checkbox" name="tidakpskd" id="tidakpskd" value="1"class="mr-1">Tidak                                       
                                                <input type="checkbox" name="adapskd" id="adapskd" value="1"class="mr-1 ml-3"> Ada, Sebutkan   &nbsp;   
                                                <input type="text" name="sebutkanpskd" id="sebutkanpskd" class="custom-form col-lg-5">                                                  
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- <tr>
                                        <td class="bold" width="20%">Catatan tambahan lainnya</td>
                                        <td class="bold" width="1%">:</td>
                                        <td>
                                            <textarea name="catatan_tambahan_skd" id="catatan-tambahan-skd" class="form-control clear-input w-100" rows="2"></textarea>
                                        </td>
                                    </tr> -->
                                    <tr>
                                        <td class="bold" width="20%">Keperluan Surat</td>
                                        <td class="bold" width="1%">:</td>
                                        <td>
                                            <textarea id="keperluanskd" class="form-control clear-input d-inline-block col-lg-12" rows="2" disabled></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%">Dokter Pemeriksa </td>
                                        <td class="bold" width="1%">:</td>
                                        <td>
                                            <input type="text" name="dokterskd" id="dokterskd" class="select2c-input">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%">NIP/SIP</td>
                                        <td class="bold" width="1%">:</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="radio" name="nip_sip_skd" id="nip-sip-skd" value="NIP" class="mr-1">NIP
                                                <input type="radio" name="nip_sip_skd" id="sip-nip-skd" value="SIP" class="mr-1 ml-2" >SIP
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="bold" width="20%">Tanggal</td>
                                        <td class="bold" width="1%">:</td>
                                        <td>
                                            <input type="text" name="tanggalskd" class="custom-form col-lg-2" id="tanggalskd">
                                        </td>
                                    </tr>
                                                                   
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
                <button type="button" class="btn btn-info" onclick="simpanSuratKeteranganDisabilitas()" id="btn_simpan"><i class="fas fa-fw fa-save mr-1"></i>Cetak</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Form SKD -->