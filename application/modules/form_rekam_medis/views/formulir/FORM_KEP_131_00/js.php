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

    function lihatFORM_KEP_131_00(data) {
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
        entriSkriningAdmisiUikr(layanan.id_pendaftaran, layanan.id, layanan.layanan,  bed, action);
    }

    function editFORM_KEP_131_00(data) {
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
        entriSkriningAdmisiUikr(layanan.id_pendaftaran, layanan.id, layanan.layanan,  bed, action);
    }

    function tambahFORM_KEP_131_00(data) {
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
        entriSkriningAdmisiUikr(layanan.id_pendaftaran, layanan.id, layanan.layanan, bed,  action);
    }

    function entriSkriningAdmisiUikr(id_pendaftaran, id_layanan_pendaftaran, layanan,  bed, action) {
        // $('#modal_skrining_admisi_uikr').modal('show');
        // showSkriningAdmisiUikr(nomer);  
              
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
            url: '<?= base_url("pelayanan/api/pelayanan/get_data_skrining_admisi_uikr") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                // console.log(data);
                resetSkriningAdmisiUikr(); 
                $('#id-layanan-pendaftaran-sauikr').val(id_layanan_pendaftaran);
                $('#id-pendaftaran-sauikr').val(id_pendaftaran);
                
                if (data.pasien !== null) {
                    $('#id-pasien-sauikr').val(data.pasien.id_pasien);
                    $('#nama-pasien-sauikr').text(data.pasien.nama);
                    $('#no-rm-sauikr').text(data.pasien.no_rm);
                    $('#tgl-lahir-sauikr').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
                    $('#jenis-kelamin-sauikr').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));
                }

                // NARIK DATA
                // const diagUtamaRm = [...data.ds_manual_utama].sort((a, b) => b.id_layanan_pendaftaran - a.id_layanan_pendaftaran)[0]?.nama;
                // $('#edit-diagnosa-sauikr').html(diagUtamaRm);

                // // agar muncul di pembuka namanya diley
                // setTimeout(() => {
                //     $('#diagnosa-sauikr').html(diagUtamaRm);                 
                // });
                // // console.log(diagUtamaRm);

                // TANGGAL
                $('#data-skrining-admisi-uikr').one('click', function() {
                        $('#tanggal-sauikr, #edit-tanggal-sauikr').datetimepicker({
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
                $('#data-skrining-admisi-uikr').one('click', function()  {
                    $('#jam-sauikr, #edit-jam-sauikr' )
                    .on('click', function() {
                        $(this).timepicker({
                            format: 'HH:mm',
                            showInputs: false,
                            showMeridian: false
                        });
                    })
                })
            
                // Perawat
                $('#data-skrining-admisi-uikr').one('click', function() {
                    $('#perawatsauikr, #edit-perawatsauikr')
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

                if (typeof data.skrining_admisi_uikr !== 'undefined' && data.skrining_admisi_uikr !== null) {
                    showSkriningAdmisiUikrT(data.skrining_admisi_uikr, id_pendaftaran, id_layanan_pendaftaran, bed, action);
                    showSkriningAdmisiUikr(nomer);                 
                } else {
                    $('#tabel-sauikr .body-table').empty();
                }
                $('#bed-sauikr').text(bed);
               
                $('#modal_skrining_admisi_uikr').modal('show');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })
    }

    // <label id="diagnosa-sauikr"> </label>

    function showSkriningAdmisiUikr(num) {
        let html = bukaLebar('Form Skrining Admisi Untuk Identifikasi Kebutuhan Resusitasi');
        html += /* html */ `
            <div class="modal-body"> 
                <div class="row">
                    <hr>
                    <table class="table table-sm table-striped table-bordered" style="margin-top: -15px">
                        <thead>
                            <tr>
                                <td width="25%"> <b>Tanggal
                                    <input type="text" name="tanggal_sauikr"id="tanggal-sauikr" class="custom-form clear-input d-inline-block col-lg-4" placeholder="dd/mm/yyyy">
                                </td>
                                <td width="25%">  <b>Jam
                                    <input type="text" name="jam_sauikr"id="jam-sauikr" class="custom-form clear-input d-inline-block col-lg-3" placeholder="hh/ii">
                                </td>
                                <td width="25%"> <b>Diagnosa ibu : 
                                    <input type="text" name="diagnosa_sauikr"id="diagnosa-sauikr" class="custom-form clear-input d-inline-block col-lg-8">
                                </td>
                                <td width="25%">  <b>Jenis persalinan :
                                    <input type="text" name="jenispersalinan_sauikr"id="jenispersalinan-sauikr" class="custom-form clear-input d-inline-block col-lg-6" placeholder="">
                                </td>
                            </tr>
                        </thead>
                    </table>
                    <br>
                    <table class="table table-sm table-striped table-bordered" style="margin-top: -15px">
                        <thead>
                            <tr>
                                <td width="33%" class="center" style="background-color: #D3D3D3; color: black;"> <b> RISIKO RENDAH </b></td>
                                <td width="33%" class="center" style="background-color: #D3D3D3; color: black;"> <b> RISIKO MEDIUM </td>
                                <td width="33%" class="center" style="background-color: #D3D3D3; color: black;"> <b> RISIKO TINGGI </td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td width="33%"><b>Aspek Maternal</b></td>
                                <td width="33%"></td>
                                <td width="33%"></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="aspekmaternal1" id="aspekmaternal1" value="1"class="mr-1 ml-2">
                                    Tidak ada riwayat komplikasi pada kehamilan sebelumnya
                                </td> 
                                <td><input type="checkbox" name="aspekmaternal2" id="aspekmaternal2" value="1"class="mr-1 ml-2">
                                    Preeklampsia 
                                </td> 
                                <td><input type="checkbox" name="aspekmaternal3" id="aspekmaternal3" value="1"class="mr-1 ml-2">
                                    Preeklampsia berat 
                                </td> 
                            </tr>
                            <tr>
                                <td></td> 
                                <td><input type="checkbox" name="aspekmaternal4" id="aspekmaternal4" value="1"class="mr-1 ml-2">
                                    DMG 
                                </td> 
                                <td><input type="checkbox" name="aspekmaternal5" id="aspekmaternal5" value="1"class="mr-1 ml-2">
                                    Eklampsia
                                </td> 
                            </tr> 
                            <tr>
                                <td></td> 
                                <td><input type="checkbox" name="aspekmaternal6" id="aspekmaternal6" value="1"class="mr-1 ml-2">
                                    Riwayat penyakit ibu sebelumnya 
                                </td> 
                                <td><input type="checkbox" name="aspekmaternal7" id="aspekmaternal7" value="1"class="mr-1 ml-2">
                                    Kelainan penyakit ibu saat ini
                                </td> 
                            </tr>   
                             <tr>
                                <td width="33%"><b>Aspek Janin</b></td>
                                <td width="33%"></td>
                                <td width="33%"></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="aspekjanin1" id="aspekjanin1" value="1"class="mr-1 ml-2">
                                    Taksiran berat janin 2500 - 4000 gr
                                </td> 
                                <td><input type="checkbox" name="aspekjanin2" id="aspekjanin2" value="1"class="mr-1 ml-2">
                                    Taksiran berat janin > 4000 gr atau 2000 - 2500 gr 
                                </td> 
                                <td><input type="checkbox" name="aspekjanin3" id="aspekjanin3" value="1"class="mr-1 ml-2">
                                    Taksiran berat janin <2000
                                </td> 
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="aspekjanin4" id="aspekjanin4" value="1"class="mr-1 ml-2">
                                    Denyut jantung janin teratur
                                </td> 
                                <td><input type="checkbox" name="aspekjanin5" id="aspekjanin5" value="1"class="mr-1 ml-2">
                                    Riwayat DJJ tidak normal
                                </td> 
                                <td><input type="checkbox" name="aspekjanin6" id="aspekjanin6" value="1"class="mr-1 ml-2">
                                    Riwayat CTG kategori 3
                                </td> 
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="aspekjanin7" id="aspekjanin7" value="1"class="mr-1 ml-2">
                                    Air ketuban normal
                                </td> 
                                <td><input type="checkbox" name="aspekjanin8" id="aspekjanin8" value="1"class="mr-1 ml-2">
                                    Air ketuban berkurang
                                </td> 
                                <td><input type="checkbox" name="aspekjanin9" id="aspekjanin9" value="1"class="mr-1 ml-2">
                                    Air ketuban hijau kental
                                </td> 
                            </tr>
                            <tr>
                                <td></td> 
                                <td><input type="checkbox" name="aspekjanin10" id="aspekjanin10" value="1"class="mr-1 ml-2">
                                    Air ketuban hijau
                                </td> 
                                <td></td> 
                            </tr>
                            <tr>
                                <td width="33%"><b>Aspek Penyulit Persalinan </b></td>
                                <td width="33%"></td>
                                <td width="33%"></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="aspekpenyulitpersalinan1" id="aspekpenyulitpersalinan1" value="1"class="mr-1 ml-2">
                                    Kehamilan tunggal
                                </td> 
                                <td><input type="checkbox" name="aspekpenyulitpersalinan2" id="aspekpenyulitpersalinan2" value="1"class="mr-1 ml-2">
                                    Kehamilan ganda 
                                </td> 
                                <td><input type="checkbox" name="aspekpenyulitpersalinan3" id="aspekpenyulitpersalinan3" value="1"class="mr-1 ml-2">
                                    Kehamilan ganda
                                </td> 
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="aspekpenyulitpersalinan4" id="aspekpenyulitpersalinan4" value="1"class="mr-1 ml-2">
                                    Gravida < dari 5
                                </td> 
                                <td><input type="checkbox" name="aspekpenyulitpersalinan5" id="aspekpenyulitpersalinan5" value="1"class="mr-1 ml-2">
                                    Gravida 5 atau lebih
                                </td> 
                                <td><input type="checkbox" name="aspekpenyulitpersalinan6" id="aspekpenyulitpersalinan6" value="1"class="mr-1 ml-2">
                                    Gravida 5 atau lebih
                                </td> 
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="aspekpenyulitpersalinan7" id="aspekpenyulitpersalinan7" value="1"class="mr-1 ml-2">
                                    Tidak ada riwayat komplikasi pada ANC
                                </td> 
                                <td><input type="checkbox" name="aspekpenyulitpersalinan8" id="aspekpenyulitpersalinan8" value="1"class="mr-1 ml-2">
                                    Infeksi intrapartum/korioamnionitis
                                </td> 
                                <td><input type="checkbox" name="aspekpenyulitpersalinan9" id="aspekpenyulitpersalinan9" value="1"class="mr-1 ml-2">
                                    Infeksi intrapartum/ korioamnionitis
                                </td> 
                            </tr>
                            <tr>
                                <td></td> 
                                <td><input type="checkbox" name="aspekpenyulitpersalinan10" id="aspekpenyulitpersalinan10" value="1"class="mr-1 ml-2">
                                    Perdarahan ante partum
                                </td> 
                                <td><input type="checkbox" name="aspekpenyulitpersalinan11" id="aspekpenyulitpersalinan11" value="1"class="mr-1 ml-2">
                                    KPD lebih dari 8 jam
                                </td> 
                            </tr>
                            <tr>
                                <td></td> 
                                <td><input type="checkbox" name="aspekpenyulitpersalinan12" id="aspekpenyulitpersalinan12" value="1"class="mr-1 ml-2">
                                    KPD lebih dari 8 jam
                                </td> 
                                <td><input type="checkbox" name="aspekpenyulitpersalinan13" id="aspekpenyulitpersalinan13" value="1"class="mr-1 ml-2">
                                    Persalinan lama/macet
                                </td> 
                            </tr>
                            <tr>
                                <td></td> 
                                <td><input type="checkbox" name="aspekpenyulitpersalinan14" id="aspekpenyulitpersalinan14" value="1"class="mr-1 ml-2">
                                    Persalinan lama/macet
                                </td> 
                                <td><input type="checkbox" name="aspekpenyulitpersalinan15" id="aspekpenyulitpersalinan15" value="1"class="mr-1 ml-2">
                                    Usia gestasi > 41minggu
                                </td> 
                            </tr>
                            <tr>
                                <td></td> 
                                <td><input type="checkbox" name="aspekpenyulitpersalinan16" id="aspekpenyulitpersalinan16" value="1"class="mr-1 ml-2">
                                    Usia gestasi > 41minggu
                                </td> 
                                <td><input type="checkbox" name="aspekpenyulitpersalinan17" id="aspekpenyulitpersalinan17" value="1"class="mr-1 ml-2">
                                    Perdarahan ante partum dengan syok
                                </td> 
                            </tr>
                            <tr>
                                <td></td> 
                                <td><input type="checkbox" name="aspekpenyulitpersalinan18" id="aspekpenyulitpersalinan18" value="1"class="mr-1 ml-2">
                                    Persalinan pervaginam berbantu, termasuk persalinan sungsang
                                </td> 
                                <td></td> 
                            </tr>
                            <tr>
                                <td></td> 
                                <td><input type="checkbox" name="aspekpenyulitpersalinan19" id="aspekpenyulitpersalinan19" value="1"class="mr-1 ml-2">
                                    Seksio sesaria
                                </td> 
                                <td></td> 
                            </tr>
                            <tr>
                                <td width="33%" class="center"><b>JIKA RISIKO RENDAH : </b></td>
                                <td width="33%" class="center"><b>JIKA RISIKO SEDANG : </b></td>
                                <td width="33%" class="center"><b>JIKA RISIKO TINGGI : </b></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="jikaresikorendah1" id="jikaresikorendah1" value="1"class="mr-1 ml-2">
                                    Radian warmer dihidupkan saat ibu dipimpin meneran
                                </td> 
                                <td><input type="checkbox" name="jikaresikosedang1" id="jikaresikosedang1" value="1"class="mr-1 ml-2">
                                    Tim resusitasi minimal 3 orang dengan lead dokter/SpA dan tim dokter/perawat/bidan yang kompeten melakukan resusitasi neonatus lanjut
                                </td> 
                                <td><input type="checkbox" name="jikaresikotinggi1" id="jikaresikotinggi1" value="1"class="mr-1 ml-2">
                                    Tim resusitasi minimal 3 orang dengan leader dokter spesialis anak dan tim dokter/perawat/bidan yang kompeten melakukan resusitasi neonatus lanjut
                                </td> 
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="jikaresikorendah2" id="jikaresikorendah2" value="1"class="mr-1 ml-2">
                                    Troli resusitasi dipastikan lengkap dan siap pakai
                                </td> 
                                <td><input type="checkbox" name="jikaresikosedang2" id="jikaresikosedang2" value="1"class="mr-1 ml-2">
                                    Berikan informasi segera kepada orang tua bayi terkait kemungkinan rujukan ke tingkat pelayanan lebih tinggi
                                </td> 
                                <td><input type="checkbox" name="jikaresikotinggi2" id="jikaresikotinggi2" value="1"class="mr-1 ml-2">
                                    Berikan informasi segera kepada orang tua bayi terkait kemungkinan perawatan yang lebih kompleks yang membutuhkan tim yang lebih luas dan sumber daya yang lebih banyak
                                </td>                               
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="jikaresikorendah3" id="jikaresikorendah3" value="1"class="mr-1 ml-2">
                                    Edukasi ulang IMD
                                </td> 
                                <td></td> 
                                <td></td> 
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="jikaresikorendah4" id="jikaresikorendah4" value="1"class="mr-1 ml-2">
                                    Tim resusitasi minimal 2 orang bidan/perawat/dokter dengan kompeten melakukan resusitasi neonatus
                                </td> 
                                <td></td> 
                                <td></td> 
                            </tr>              
                        </tbody>  
                    </table>
                    <table class="table table-no-border table-sm table-striped">
                        <tbody>
                            <tr>
                                <td> <b> Perawat</td>
                                <td colspan="2">
                                    <div class="input-group">
                                        <input type="text" name="perawatsauikr" id= "perawatsauikr" class="select2c-input ml-2">  
                                    </div>
                                </td>
                            </tr>
                            <p>
                            <tr>
                                <td colspan="8">
                                    <button type="button" title="Tambah Skrining Admisi Untuk Identifikasi Kebutuhan Resusitasi" class="btn btn-info" onclick="tambahSkriningAdmisiUikr()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah Skrining Admisi Untuk Identifikasi Kebutuhan Resusitasi</button>
                                </td>
                            </tr>
                        </tbody>                      
                    </table>
                    <table class="table table-no-border table-sm table-striped">
                        <tbody>
                            <tr>
                                <td colspan="8" style="text-align: right;">
                                    <p class="page__number" style="margin: 0;">HARAP DI PERHATIKAN <span style="font-weight: bold; color: red;">SEBELUM *KONFIRMASI* KLIK *TAMBAH SKRINING ADMISI UNTUK IDENTIFIKASI KEBUTUHAN RESUSITASI* TERLEBIH DAHULU..!!!</span></p>
                                </td>
                            </tr>
                        </tbody>                      
                    </table> 
                </div>
            </div>
        `;           
        html += tutupRapet();
        $('#buka-tutup-sauikr').append(html);
    }

    function formatTanggalKhusus(waktu) {
        var el = waktu.split('-');
        var tahun = el[0];
        var bulan = el[1];
        var hari = el[2];
        return hari + '/' + bulan + '/' + tahun;
    }

    function showSkriningAdmisiUikrT(data, id_pendaftaran, id_layanan_pendaftaran, bed, action) {
        $('#tabel-sauikr .body-table').empty();
        if (data !== null) {
            $.each(data, function(i, v) {
                let btnAksesLihat = '';
                if (action != 'lihat') {
                    btnAksesLihat = '<button type="button" class="btn btn-secondary btn-xs" onclick="editSkriningAdmisiUikr(this, ' +
                    v.id + ', ' + id_pendaftaran + ', ' + id_layanan_pendaftaran + ', \'' + bed +
                    '\')"><i class="fas fa-edit"></i> Edit</button> <button type="button" class="btn btn-secondary btn-xs" onclick="hapusSkriningAdmisiUikr(this, ' +
                    v.id +
                    ')"> <i class="fas fa-trash-alt"></i> Hapus</button>';
                }
                const selOp =
                '<td align="center"><button type="button" class="btn btn-secondary btn-xs" onclick="lihatSkriningAdmisiUikr(this, ' +
                v.id + ', ' + id_pendaftaran + ', ' + id_layanan_pendaftaran + ', \'' + bed +
                '\')"><i class="fas fa-eye"></i> Lihat</button>' +
                btnAksesLihat + 
                '</td>';
                let html = /* html */ `
                    <tr>
                        <td class="number-terapi" align="center">${(++i)}</td>
                        <td align="center">` + ((v.tanggal_sauikr !== null) ? formatTanggalKhusus(v.tanggal_sauikr) : '') + `</td>
                        <td align="center">${v.jam_sauikr || '-'}</td>                       
                        <td align="center">${v.diagnosa_sauikr || '-'}</td>                       
                        <td align="center">${v.jenispersalinan_sauikr || '-'}</td>                            
                        <td align="center">${v.perawat || '-'}</td>                            
                        <td align="center">${v.akun_user}</td>
                        ${selOp}
                    </tr>
                `;
                $('#tabel-sauikr tbody').append(html);
                numberSauikr = i;
            })
        }
    }

    function konfirmasiSimpanSkriningAdmisiUikr() {
        if ($('#tanggal-sauikr').val() === '') {
            syams_validation('#tanggal-sauikr', 'Tanggal harus diisi.');
            return false;
        } else {
            syams_validation_remove('#tanggal-sauikr');
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
                simpanSkriningAdmisiUikr();
            }
        })
    }

    function simpanSkriningAdmisiUikr() {
        var id_layanan_pendaftaran_sauikr = $('#id-layanan-pendaftaran-sauikr').val(); 
        $.ajax({
            type: 'POST',
            url: '<?= base_url("pelayanan/api/pelayanan/simpan_data_skrining_admisi_uikr") ?>',
            data: $('#form_skrining_admisi_uikr').serialize() + '&id-layanan-pendaftaran-sauikr=' + id_layanan_pendaftaran_sauikr,
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
                        $('#modal_skrining_admisi_uikr').modal('hide');
                        showListForm($('#id-pendaftaran-sauikr').val(), $('#id-layanan-pendaftaran-sauikr').val(), $('#id-pasien-sauikr').val());
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

    function resetSkriningAdmisiUikr() {
        $('#form_skrining_admisi_uikr')[0].reset();
        $("input[type='checkbox']").prop('checked',false);
        $("input[type='radio']").prop('checked',false);
        $('#buka-tutup-sauikr').empty();
    }

    function lihatSkriningAdmisiUikr(obj, id, id_pendaftaran, id_layanan_pendaftaran, bed) {   
         $('#modal-edit-skrining-admisi-uikr').modal('show');
         $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_edit_skrining_admisi_uikr") ?>/id/' +
                id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#update-sauikr').empty();
                $('#id-edit-skrining-admisi-uikr').val(id);
                function formatTanggalKhusus(waktu) {
                    var el = waktu.split('-');
                    var tahun = el[0];
                    var bulan = el[1];
                    var hari = el[2];
                    return hari + '/' + bulan + '/' + tahun;
                }
                let edit_tanggal_sauikr = formatTanggalKhusus(data.tanggal_sauikr);
                $('#edit-tanggal-sauikr').val(edit_tanggal_sauikr);                 
                let cttntndkn = '';
                cttntndkn =
                    `  <button type="button" class="btn btn-secondary waves-effect" onclick="$('#modal-edit-skrining-admisi-uikr').modal('hide');"><i class="fas fa-times-circle mr-1"></i>Tutup</button>
                  `;
                $('#update-sauikr').append(cttntndkn);   
                $('#edit-jam-sauikr').val(data.jam_sauikr);
                $('#edit-diagnosa-sauikr').val(data.diagnosa_sauikr);
                $('#edit-jenispersalinan-sauikr').val(data.jenispersalinan_sauikr);
                data.aspekmaternal1    == '1' ? $('#edit-aspekmaternal1').prop('checked', true) : $('#edit-aspekmaternal1').prop('checked', false);
                data.aspekmaternal2    == '1' ? $('#edit-aspekmaternal2').prop('checked', true) : $('#edit-aspekmaternal2').prop('checked', false);
                data.aspekmaternal3    == '1' ? $('#edit-aspekmaternal3').prop('checked', true) : $('#edit-aspekmaternal3').prop('checked', false);
                data.aspekmaternal4    == '1' ? $('#edit-aspekmaternal4').prop('checked', true) : $('#edit-aspekmaternal4').prop('checked', false);
                data.aspekmaternal5    == '1' ? $('#edit-aspekmaternal5').prop('checked', true) : $('#edit-aspekmaternal5').prop('checked', false);
                data.aspekmaternal6    == '1' ? $('#edit-aspekmaternal6').prop('checked', true) : $('#edit-aspekmaternal6').prop('checked', false);
                data.aspekmaternal7    == '1' ? $('#edit-aspekmaternal7').prop('checked', true) : $('#edit-aspekmaternal7').prop('checked', false);
                data.aspekjanin1    == '1' ? $('#edit-aspekjanin1').prop('checked', true) : $('#edit-aspekjanin1').prop('checked', false);
                data.aspekjanin2    == '1' ? $('#edit-aspekjanin2').prop('checked', true) : $('#edit-aspekjanin2').prop('checked', false);
                data.aspekjanin3    == '1' ? $('#edit-aspekjanin3').prop('checked', true) : $('#edit-aspekjanin3').prop('checked', false);
                data.aspekjanin4    == '1' ? $('#edit-aspekjanin4').prop('checked', true) : $('#edit-aspekjanin4').prop('checked', false);
                data.aspekjanin5    == '1' ? $('#edit-aspekjanin5').prop('checked', true) : $('#edit-aspekjanin5').prop('checked', false);
                data.aspekjanin6    == '1' ? $('#edit-aspekjanin6').prop('checked', true) : $('#edit-aspekjanin6').prop('checked', false);
                data.aspekjanin7    == '1' ? $('#edit-aspekjanin7').prop('checked', true) : $('#edit-aspekjanin7').prop('checked', false);
                data.aspekjanin8    == '1' ? $('#edit-aspekjanin8').prop('checked', true) : $('#edit-aspekjanin8').prop('checked', false);
                data.aspekjanin9    == '1' ? $('#edit-aspekjanin9').prop('checked', true) : $('#edit-aspekjanin9').prop('checked', false);
                data.aspekjanin10    == '1' ? $('#edit-aspekjanin10').prop('checked', true) : $('#edit-aspekjanin10').prop('checked', false);
                data.aspekpenyulitpersalinan1    == '1' ? $('#edit-aspekpenyulitpersalinan1').prop('checked', true) : $('#edit-aspekpenyulitpersalinan1').prop('checked', false);
                data.aspekpenyulitpersalinan2    == '1' ? $('#edit-aspekpenyulitpersalinan2').prop('checked', true) : $('#edit-aspekpenyulitpersalinan2').prop('checked', false);
                data.aspekpenyulitpersalinan3    == '1' ? $('#edit-aspekpenyulitpersalinan3').prop('checked', true) : $('#edit-aspekpenyulitpersalinan3').prop('checked', false);
                data.aspekpenyulitpersalinan4    == '1' ? $('#edit-aspekpenyulitpersalinan4').prop('checked', true) : $('#edit-aspekpenyulitpersalinan4').prop('checked', false);
                data.aspekpenyulitpersalinan5    == '1' ? $('#edit-aspekpenyulitpersalinan5').prop('checked', true) : $('#edit-aspekpenyulitpersalinan5').prop('checked', false);
                data.aspekpenyulitpersalinan6    == '1' ? $('#edit-aspekpenyulitpersalinan6').prop('checked', true) : $('#edit-aspekpenyulitpersalinan6').prop('checked', false);
                data.aspekpenyulitpersalinan7    == '1' ? $('#edit-aspekpenyulitpersalinan7').prop('checked', true) : $('#edit-aspekpenyulitpersalinan7').prop('checked', false);
                data.aspekpenyulitpersalinan8    == '1' ? $('#edit-aspekpenyulitpersalinan8').prop('checked', true) : $('#edit-aspekpenyulitpersalinan8').prop('checked', false);
                data.aspekpenyulitpersalinan9    == '1' ? $('#edit-aspekpenyulitpersalinan9').prop('checked', true) : $('#edit-aspekpenyulitpersalinan9').prop('checked', false);
                data.aspekpenyulitpersalinan10    == '1' ? $('#edit-aspekpenyulitpersalinan10').prop('checked', true) : $('#edit-aspekpenyulitpersalinan10').prop('checked', false);
                data.aspekpenyulitpersalinan11    == '1' ? $('#edit-aspekpenyulitpersalinan11').prop('checked', true) : $('#edit-aspekpenyulitpersalinan11').prop('checked', false);
                data.aspekpenyulitpersalinan12    == '1' ? $('#edit-aspekpenyulitpersalinan12').prop('checked', true) : $('#edit-aspekpenyulitpersalinan12').prop('checked', false);
                data.aspekpenyulitpersalinan13    == '1' ? $('#edit-aspekpenyulitpersalinan13').prop('checked', true) : $('#edit-aspekpenyulitpersalinan13').prop('checked', false);
                data.aspekpenyulitpersalinan14    == '1' ? $('#edit-aspekpenyulitpersalinan14').prop('checked', true) : $('#edit-aspekpenyulitpersalinan14').prop('checked', false);
                data.aspekpenyulitpersalinan15    == '1' ? $('#edit-aspekpenyulitpersalinan15').prop('checked', true) : $('#edit-aspekpenyulitpersalinan15').prop('checked', false);
                data.aspekpenyulitpersalinan16    == '1' ? $('#edit-aspekpenyulitpersalinan16').prop('checked', true) : $('#edit-aspekpenyulitpersalinan16').prop('checked', false);
                data.aspekpenyulitpersalinan17    == '1' ? $('#edit-aspekpenyulitpersalinan17').prop('checked', true) : $('#edit-aspekpenyulitpersalinan17').prop('checked', false);
                data.aspekpenyulitpersalinan18    == '1' ? $('#edit-aspekpenyulitpersalinan18').prop('checked', true) : $('#edit-aspekpenyulitpersalinan18').prop('checked', false);
                data.aspekpenyulitpersalinan19    == '1' ? $('#edit-aspekpenyulitpersalinan19').prop('checked', true) : $('#edit-aspekpenyulitpersalinan19').prop('checked', false);
                data.jikaresikorendah1    == '1' ? $('#edit-jikaresikorendah1').prop('checked', true) : $('#edit-jikaresikorendah1').prop('checked', false);
                data.jikaresikorendah2    == '1' ? $('#edit-jikaresikorendah2').prop('checked', true) : $('#edit-jikaresikorendah2').prop('checked', false);
                data.jikaresikosedang1    == '1' ? $('#edit-jikaresikosedang1').prop('checked', true) : $('#edit-jikaresikosedang1').prop('checked', false);
                data.jikaresikosedang2    == '1' ? $('#edit-jikaresikosedang2').prop('checked', true) : $('#edit-jikaresikosedang2').prop('checked', false);
                data.jikaresikotinggi1    == '1' ? $('#edit-jikaresikotinggi1').prop('checked', true) : $('#edit-jikaresikotinggi1').prop('checked', false);
                data.jikaresikotinggi2    == '1' ? $('#edit-jikaresikotinggi2').prop('checked', true) : $('#edit-jikaresikotinggi2').prop('checked', false);
                data.jikaresikorendah3    == '1' ? $('#edit-jikaresikorendah3').prop('checked', true) : $('#edit-jikaresikorendah3').prop('checked', false);
                data.jikaresikorendah4    == '1' ? $('#edit-jikaresikorendah4').prop('checked', true) : $('#edit-jikaresikorendah4').prop('checked', false);
                $('#edit-perawatsauikr').val(data.perawatsauikr);
                $('#s2id_edit-perawatsauikr a .select2c-chosen').html(data.perawat);       
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })      
    }

    function editSkriningAdmisiUikr(obj, id, id_pendaftaran, id_layanan_pendaftaran, bed) {   
        const modal = $('#modal-edit-skrining-admisi-uikr');
        $('#update-sauikr').children().remove();
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_edit_skrining_admisi_uikr") ?>/id/' +
                id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#update-sauikr').empty();
                $('#id-edit-skrining-admisi-uikr').val(id);
                function formatTanggalKhusus(waktu) {
                    var el = waktu.split('-');
                    var tahun = el[0];
                    var bulan = el[1];
                    var hari = el[2];
                    return hari + '/' + bulan + '/' + tahun;
                }
                let edit_tanggal_sauikr = formatTanggalKhusus(data.tanggal_sauikr);
                $('#edit-tanggal-sauikr').val(edit_tanggal_sauikr);      
                let cttntndkn = '';
                cttntndkn =
                    `  <button type="button" class="btn btn-secondary waves-effect" onclick="$('#modal-edit-skrining-admisi-uikr').modal('hide');"><i class="fas fa-times-circle mr-1"></i>Tutup</button>
                    <button type="button" class="btn btn-info waves-effect" onclick="updateSkriningAdmisiUikr(${id_pendaftaran}, ${id_layanan_pendaftaran}, '${bed}')"><i class="fas fa-save mr-1"></i>Update</button>`;
                $('#update-sauikr').append(cttntndkn);   
                $('#edit-jam-sauikr').val(data.jam_sauikr);
                $('#edit-diagnosa-sauikr').val(data.diagnosa_sauikr);
                $('#edit-jenispersalinan-sauikr').val(data.jenispersalinan_sauikr);
                data.aspekmaternal1    == '1' ? $('#edit-aspekmaternal1').prop('checked', true) : $('#edit-aspekmaternal1').prop('checked', false);
                data.aspekmaternal2    == '1' ? $('#edit-aspekmaternal2').prop('checked', true) : $('#edit-aspekmaternal2').prop('checked', false);
                data.aspekmaternal3    == '1' ? $('#edit-aspekmaternal3').prop('checked', true) : $('#edit-aspekmaternal3').prop('checked', false);
                data.aspekmaternal4    == '1' ? $('#edit-aspekmaternal4').prop('checked', true) : $('#edit-aspekmaternal4').prop('checked', false);
                data.aspekmaternal5    == '1' ? $('#edit-aspekmaternal5').prop('checked', true) : $('#edit-aspekmaternal5').prop('checked', false);
                data.aspekmaternal6    == '1' ? $('#edit-aspekmaternal6').prop('checked', true) : $('#edit-aspekmaternal6').prop('checked', false);
                data.aspekmaternal7    == '1' ? $('#edit-aspekmaternal7').prop('checked', true) : $('#edit-aspekmaternal7').prop('checked', false);
                data.aspekjanin1    == '1' ? $('#edit-aspekjanin1').prop('checked', true) : $('#edit-aspekjanin1').prop('checked', false);
                data.aspekjanin2    == '1' ? $('#edit-aspekjanin2').prop('checked', true) : $('#edit-aspekjanin2').prop('checked', false);
                data.aspekjanin3    == '1' ? $('#edit-aspekjanin3').prop('checked', true) : $('#edit-aspekjanin3').prop('checked', false);
                data.aspekjanin4    == '1' ? $('#edit-aspekjanin4').prop('checked', true) : $('#edit-aspekjanin4').prop('checked', false);
                data.aspekjanin5    == '1' ? $('#edit-aspekjanin5').prop('checked', true) : $('#edit-aspekjanin5').prop('checked', false);
                data.aspekjanin6    == '1' ? $('#edit-aspekjanin6').prop('checked', true) : $('#edit-aspekjanin6').prop('checked', false);
                data.aspekjanin7    == '1' ? $('#edit-aspekjanin7').prop('checked', true) : $('#edit-aspekjanin7').prop('checked', false);
                data.aspekjanin8    == '1' ? $('#edit-aspekjanin8').prop('checked', true) : $('#edit-aspekjanin8').prop('checked', false);
                data.aspekjanin9    == '1' ? $('#edit-aspekjanin9').prop('checked', true) : $('#edit-aspekjanin9').prop('checked', false);
                data.aspekjanin10    == '1' ? $('#edit-aspekjanin10').prop('checked', true) : $('#edit-aspekjanin10').prop('checked', false);
                data.aspekpenyulitpersalinan1    == '1' ? $('#edit-aspekpenyulitpersalinan1').prop('checked', true) : $('#edit-aspekpenyulitpersalinan1').prop('checked', false);
                data.aspekpenyulitpersalinan2    == '1' ? $('#edit-aspekpenyulitpersalinan2').prop('checked', true) : $('#edit-aspekpenyulitpersalinan2').prop('checked', false);
                data.aspekpenyulitpersalinan3    == '1' ? $('#edit-aspekpenyulitpersalinan3').prop('checked', true) : $('#edit-aspekpenyulitpersalinan3').prop('checked', false);
                data.aspekpenyulitpersalinan4    == '1' ? $('#edit-aspekpenyulitpersalinan4').prop('checked', true) : $('#edit-aspekpenyulitpersalinan4').prop('checked', false);
                data.aspekpenyulitpersalinan5    == '1' ? $('#edit-aspekpenyulitpersalinan5').prop('checked', true) : $('#edit-aspekpenyulitpersalinan5').prop('checked', false);
                data.aspekpenyulitpersalinan6    == '1' ? $('#edit-aspekpenyulitpersalinan6').prop('checked', true) : $('#edit-aspekpenyulitpersalinan6').prop('checked', false);
                data.aspekpenyulitpersalinan7    == '1' ? $('#edit-aspekpenyulitpersalinan7').prop('checked', true) : $('#edit-aspekpenyulitpersalinan7').prop('checked', false);
                data.aspekpenyulitpersalinan8    == '1' ? $('#edit-aspekpenyulitpersalinan8').prop('checked', true) : $('#edit-aspekpenyulitpersalinan8').prop('checked', false);
                data.aspekpenyulitpersalinan9    == '1' ? $('#edit-aspekpenyulitpersalinan9').prop('checked', true) : $('#edit-aspekpenyulitpersalinan9').prop('checked', false);
                data.aspekpenyulitpersalinan10    == '1' ? $('#edit-aspekpenyulitpersalinan10').prop('checked', true) : $('#edit-aspekpenyulitpersalinan10').prop('checked', false);
                data.aspekpenyulitpersalinan11    == '1' ? $('#edit-aspekpenyulitpersalinan11').prop('checked', true) : $('#edit-aspekpenyulitpersalinan11').prop('checked', false);
                data.aspekpenyulitpersalinan12    == '1' ? $('#edit-aspekpenyulitpersalinan12').prop('checked', true) : $('#edit-aspekpenyulitpersalinan12').prop('checked', false);
                data.aspekpenyulitpersalinan13    == '1' ? $('#edit-aspekpenyulitpersalinan13').prop('checked', true) : $('#edit-aspekpenyulitpersalinan13').prop('checked', false);
                data.aspekpenyulitpersalinan14    == '1' ? $('#edit-aspekpenyulitpersalinan14').prop('checked', true) : $('#edit-aspekpenyulitpersalinan14').prop('checked', false);
                data.aspekpenyulitpersalinan15    == '1' ? $('#edit-aspekpenyulitpersalinan15').prop('checked', true) : $('#edit-aspekpenyulitpersalinan15').prop('checked', false);
                data.aspekpenyulitpersalinan16    == '1' ? $('#edit-aspekpenyulitpersalinan16').prop('checked', true) : $('#edit-aspekpenyulitpersalinan16').prop('checked', false);
                data.aspekpenyulitpersalinan17    == '1' ? $('#edit-aspekpenyulitpersalinan17').prop('checked', true) : $('#edit-aspekpenyulitpersalinan17').prop('checked', false);
                data.aspekpenyulitpersalinan18    == '1' ? $('#edit-aspekpenyulitpersalinan18').prop('checked', true) : $('#edit-aspekpenyulitpersalinan18').prop('checked', false);
                data.aspekpenyulitpersalinan19    == '1' ? $('#edit-aspekpenyulitpersalinan19').prop('checked', true) : $('#edit-aspekpenyulitpersalinan19').prop('checked', false);
                data.jikaresikorendah1    == '1' ? $('#edit-jikaresikorendah1').prop('checked', true) : $('#edit-jikaresikorendah1').prop('checked', false);
                data.jikaresikorendah2    == '1' ? $('#edit-jikaresikorendah2').prop('checked', true) : $('#edit-jikaresikorendah2').prop('checked', false);
                data.jikaresikosedang1    == '1' ? $('#edit-jikaresikosedang1').prop('checked', true) : $('#edit-jikaresikosedang1').prop('checked', false);
                data.jikaresikosedang2    == '1' ? $('#edit-jikaresikosedang2').prop('checked', true) : $('#edit-jikaresikosedang2').prop('checked', false);
                data.jikaresikotinggi1    == '1' ? $('#edit-jikaresikotinggi1').prop('checked', true) : $('#edit-jikaresikotinggi1').prop('checked', false);
                data.jikaresikotinggi2    == '1' ? $('#edit-jikaresikotinggi2').prop('checked', true) : $('#edit-jikaresikotinggi2').prop('checked', false);
                data.jikaresikorendah3    == '1' ? $('#edit-jikaresikorendah3').prop('checked', true) : $('#edit-jikaresikorendah3').prop('checked', false);
                data.jikaresikorendah4    == '1' ? $('#edit-jikaresikorendah4').prop('checked', true) : $('#edit-jikaresikorendah4').prop('checked', false);  
                $('#edit-perawatsauikr').val(data.perawatsauikr);
                $('#s2id_edit-perawatsauikr a .select2c-chosen').html(data.perawat); 
                             
                modal.modal('show');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })
    }

    function updateSkriningAdmisiUikr(id_pendaftaran, id_layanan_pendaftaran, bed) {
        // console.log($('#form-edit-preeklampsia-early').serialize());
        $.ajax({
            type: 'PUT',
            url: '<?= base_url("pelayanan/api/pelayanan/update_skrining_admisi_uikr") ?>',
            data: $('#form-edit-skrining-admisi-uikr').serialize(),
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                if (data.status) {
                    messageEditSuccess();
                    entriSkriningAdmisiUikr(id_pendaftaran, id_layanan_pendaftaran, bed);
                } else {
                    messageEditFailed();
                }
                $('#modal-edit-skrining-admisi-uikr').modal('hide');
            },
            error: function(e) {
                messageEditFailed();
            }
        });
    }

    if (typeof numberSauikr === 'undefined') {
        var numberSauikr = 1;
    }

    function tambahSkriningAdmisiUikr() {      

        if ($('#tanggal-sauikr').val() === '') {
            syams_validation('#tanggal-sauikr', 'Tanggal harus diisi.');
            return false;
        } else {
            syams_validation_remove('#tanggal-sauikr');
        }
        if ($('#perawatsauikr').val() === '') {
            syams_validation('#perawatsauikr', 'Nama Perawat Belum dipilih.');
            return false;
        } else {
            syams_validation_remove('#perawatsauikr');
        }
        if ($('#jam-sauikr').val() === '') {
            syams_validation('#jam-sauikr', 'Jam Belum diisi.');
            return false;
        } else {
            syams_validation_remove('#jam-sauikr');
        }

        let html = '';
        let tanggal_sauikr = $('#tanggal-sauikr').val();   
        let jam_sauikr = $('#jam-sauikr').val();
        let diagnosa_sauikr = $('#diagnosa-sauikr').val();  
        let jenispersalinan_sauikr = $('#jenispersalinan-sauikr').val();


        let aspekmaternal1     = $('#aspekmaternal1').is(':checked');
        let aspekmaternal2     = $('#aspekmaternal2').is(':checked');
        let aspekmaternal3     = $('#aspekmaternal3').is(':checked');
        let aspekmaternal4     = $('#aspekmaternal4').is(':checked');
        let aspekmaternal5     = $('#aspekmaternal5').is(':checked');
        let aspekmaternal6     = $('#aspekmaternal6').is(':checked');
        let aspekmaternal7     = $('#aspekmaternal7').is(':checked');

        let aspekjanin1     = $('#aspekjanin1').is(':checked');
        let aspekjanin2     = $('#aspekjanin2').is(':checked');
        let aspekjanin3     = $('#aspekjanin3').is(':checked');
        let aspekjanin4     = $('#aspekjanin4').is(':checked');
        let aspekjanin5     = $('#aspekjanin5').is(':checked');
        let aspekjanin6     = $('#aspekjanin6').is(':checked');
        let aspekjanin7     = $('#aspekjanin7').is(':checked');
        let aspekjanin8     = $('#aspekjanin8').is(':checked');
        let aspekjanin9     = $('#aspekjanin9').is(':checked');
        let aspekjanin10     = $('#aspekjanin10').is(':checked');

        let aspekpenyulitpersalinan1     = $('#aspekpenyulitpersalinan1').is(':checked');
        let aspekpenyulitpersalinan2     = $('#aspekpenyulitpersalinan2').is(':checked');
        let aspekpenyulitpersalinan3     = $('#aspekpenyulitpersalinan3').is(':checked');
        let aspekpenyulitpersalinan4     = $('#aspekpenyulitpersalinan4').is(':checked');
        let aspekpenyulitpersalinan5     = $('#aspekpenyulitpersalinan5').is(':checked');
        let aspekpenyulitpersalinan6     = $('#aspekpenyulitpersalinan6').is(':checked');
        let aspekpenyulitpersalinan7     = $('#aspekpenyulitpersalinan7').is(':checked');
        let aspekpenyulitpersalinan8     = $('#aspekpenyulitpersalinan8').is(':checked');
        let aspekpenyulitpersalinan9     = $('#aspekpenyulitpersalinan9').is(':checked');
        let aspekpenyulitpersalinan10     = $('#aspekpenyulitpersalinan10').is(':checked');
        let aspekpenyulitpersalinan11     = $('#aspekpenyulitpersalinan11').is(':checked');
        let aspekpenyulitpersalinan12     = $('#aspekpenyulitpersalinan12').is(':checked');
        let aspekpenyulitpersalinan13     = $('#aspekpenyulitpersalinan13').is(':checked');
        let aspekpenyulitpersalinan14     = $('#aspekpenyulitpersalinan14').is(':checked');
        let aspekpenyulitpersalinan15     = $('#aspekpenyulitpersalinan15').is(':checked');
        let aspekpenyulitpersalinan16     = $('#aspekpenyulitpersalinan16').is(':checked');
        let aspekpenyulitpersalinan17     = $('#aspekpenyulitpersalinan17').is(':checked');
        let aspekpenyulitpersalinan18     = $('#aspekpenyulitpersalinan18').is(':checked');
        let aspekpenyulitpersalinan19     = $('#aspekpenyulitpersalinan19').is(':checked');

        let jikaresikorendah1     = $('#jikaresikorendah1').is(':checked');
        let jikaresikorendah2     = $('#jikaresikorendah2').is(':checked');
        let jikaresikosedang1     = $('#jikaresikosedang1').is(':checked');
        let jikaresikosedang2     = $('#jikaresikosedang2').is(':checked');
        let jikaresikotinggi1     = $('#jikaresikotinggi1').is(':checked');
        let jikaresikotinggi2     = $('#jikaresikotinggi2').is(':checked');
        let jikaresikorendah3     = $('#jikaresikorendah3').is(':checked');
        let jikaresikorendah4     = $('#jikaresikorendah4').is(':checked');

        let perawat = $('#s2id_perawatsauikr a .select2c-chosen').html();   
        let perawatsauikr = $('#perawatsauikr').val();
        html = /* html */ `
            <tr class="row-in-${++numberSauikr}">
                <td class="number-pengkajian" align="center">${numberSauikr++}</td>
                <td align="center">
                    <input type="hidden" name="tanggal_sauikr[]" value="${tanggal_sauikr}">${tanggal_sauikr}
                </td>
                <td align="center">
                    <input type="hidden" name="jam_sauikr[]" value="${jam_sauikr}">${jam_sauikr}
                </td>
                <td align="center">
                    <input type="hidden" name="diagnosa_sauikr[]" value="${diagnosa_sauikr}">${diagnosa_sauikr}
                </td>
                <td align="center">
                    <input type="hidden" name="jenispersalinan_sauikr[]" value="${jenispersalinan_sauikr}">${jenispersalinan_sauikr}
                </td>
                <td align="center">
                    <input type="hidden" name="perawatsauikr[]" value="${perawatsauikr}">${perawat}
                </td>               
                <td align="center">
                    <?= $this->session->userdata('nama') ?>
                    <input type="hidden" name="user_skrining_admisi_uikr[]" value="<?= $this->session->userdata("id_translucent") ?>">
                    <input type="hidden" name="pengkajian_date_skrining_admisi_uikr[]" value="<?= date("Y-m-d H:i:s") ?>"> 

                    <input type="hidden" name="aspekmaternal1[]" value="${aspekmaternal1 ? 1 : 0}">                                    
                    <input type="hidden" name="aspekmaternal2[]" value="${aspekmaternal2 ? 1 : 0}">                                    
                    <input type="hidden" name="aspekmaternal3[]" value="${aspekmaternal3 ? 1 : 0}">                                    
                    <input type="hidden" name="aspekmaternal4[]" value="${aspekmaternal4 ? 1 : 0}">                                    
                    <input type="hidden" name="aspekmaternal5[]" value="${aspekmaternal5 ? 1 : 0}">                                    
                    <input type="hidden" name="aspekmaternal6[]" value="${aspekmaternal6 ? 1 : 0}">                                    
                    <input type="hidden" name="aspekmaternal7[]" value="${aspekmaternal7 ? 1 : 0}">  
                    
                    <input type="hidden" name="aspekjanin1[]" value="${aspekjanin1 ? 1 : 0}">                                    
                    <input type="hidden" name="aspekjanin2[]" value="${aspekjanin2 ? 1 : 0}">                                    
                    <input type="hidden" name="aspekjanin3[]" value="${aspekjanin3 ? 1 : 0}">                                    
                    <input type="hidden" name="aspekjanin4[]" value="${aspekjanin4 ? 1 : 0}">                                    
                    <input type="hidden" name="aspekjanin5[]" value="${aspekjanin5 ? 1 : 0}">                                    
                    <input type="hidden" name="aspekjanin6[]" value="${aspekjanin6 ? 1 : 0}">                                    
                    <input type="hidden" name="aspekjanin7[]" value="${aspekjanin7 ? 1 : 0}"> 
                    <input type="hidden" name="aspekjanin8[]" value="${aspekjanin8 ? 1 : 0}"> 
                    <input type="hidden" name="aspekjanin9[]" value="${aspekjanin9 ? 1 : 0}"> 
                    <input type="hidden" name="aspekjanin10[]" value="${aspekjanin10 ? 1 : 0}"> 

                    <input type="hidden" name="aspekpenyulitpersalinan1[]" value="${aspekpenyulitpersalinan1 ? 1 : 0}">                                    
                    <input type="hidden" name="aspekpenyulitpersalinan2[]" value="${aspekpenyulitpersalinan2 ? 1 : 0}">                                    
                    <input type="hidden" name="aspekpenyulitpersalinan3[]" value="${aspekpenyulitpersalinan3 ? 1 : 0}">                                    
                    <input type="hidden" name="aspekpenyulitpersalinan4[]" value="${aspekpenyulitpersalinan4 ? 1 : 0}">                                    
                    <input type="hidden" name="aspekpenyulitpersalinan5[]" value="${aspekpenyulitpersalinan5 ? 1 : 0}">                                    
                    <input type="hidden" name="aspekpenyulitpersalinan6[]" value="${aspekpenyulitpersalinan6 ? 1 : 0}">                                    
                    <input type="hidden" name="aspekpenyulitpersalinan7[]" value="${aspekpenyulitpersalinan7 ? 1 : 0}"> 
                    <input type="hidden" name="aspekpenyulitpersalinan8[]" value="${aspekpenyulitpersalinan8 ? 1 : 0}"> 
                    <input type="hidden" name="aspekpenyulitpersalinan9[]" value="${aspekpenyulitpersalinan9 ? 1 : 0}"> 
                    <input type="hidden" name="aspekpenyulitpersalinan10[]" value="${aspekpenyulitpersalinan10 ? 1 : 0}"> 
                    <input type="hidden" name="aspekpenyulitpersalinan11[]" value="${aspekpenyulitpersalinan11 ? 1 : 0}"> 
                    <input type="hidden" name="aspekpenyulitpersalinan12[]" value="${aspekpenyulitpersalinan12 ? 1 : 0}"> 
                    <input type="hidden" name="aspekpenyulitpersalinan13[]" value="${aspekpenyulitpersalinan13 ? 1 : 0}"> 
                    <input type="hidden" name="aspekpenyulitpersalinan14[]" value="${aspekpenyulitpersalinan14 ? 1 : 0}"> 
                    <input type="hidden" name="aspekpenyulitpersalinan15[]" value="${aspekpenyulitpersalinan15 ? 1 : 0}"> 
                    <input type="hidden" name="aspekpenyulitpersalinan16[]" value="${aspekpenyulitpersalinan16 ? 1 : 0}"> 
                    <input type="hidden" name="aspekpenyulitpersalinan17[]" value="${aspekpenyulitpersalinan17 ? 1 : 0}"> 
                    <input type="hidden" name="aspekpenyulitpersalinan18[]" value="${aspekpenyulitpersalinan18 ? 1 : 0}"> 
                    <input type="hidden" name="aspekpenyulitpersalinan19[]" value="${aspekpenyulitpersalinan19 ? 1 : 0}"> 

                    <input type="hidden" name="jikaresikorendah1[]" value="${jikaresikorendah1 ? 1 : 0}">                                    
                    <input type="hidden" name="jikaresikorendah2[]" value="${jikaresikorendah2 ? 1 : 0}">
                    <input type="hidden" name="jikaresikosedang1[]" value="${jikaresikosedang1 ? 1 : 0}">                                    
                    <input type="hidden" name="jikaresikosedang2[]" value="${jikaresikosedang2 ? 1 : 0}">
                    <input type="hidden" name="jikaresikotinggi1[]" value="${jikaresikotinggi1 ? 1 : 0}">                                    
                    <input type="hidden" name="jikaresikotinggi2[]" value="${jikaresikotinggi2 ? 1 : 0}">
                    <input type="hidden" name="jikaresikorendah3[]" value="${jikaresikorendah3 ? 1 : 0}">                                    
                    <input type="hidden" name="jikaresikorendah4[]" value="${jikaresikorendah4 ? 1 : 0}">                                                                                   
                </td>
                <td align="center">
                    <button type="button" class="btn btn-secondary btn-xxs" onclick="removeList(this)"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
        `;
        $('#tabel-sauikr .body-table').append(html);
    }

    function hapusSkriningAdmisiUikr(obj, id) {
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
                            url: '<?= base_url("pelayanan/api/pelayanan/hapus_skrining_admisi_uikr") ?>/' +
                                id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                if (data.status) {
                                    messageCustom(data.message, 'Success');
                                    removeList(obj);
                                } else {
                                    customAlert('Hapus Skrining Admisi', data
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
