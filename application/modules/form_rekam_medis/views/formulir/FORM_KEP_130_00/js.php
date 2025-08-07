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

    function lihatFORM_KEP_130_00(data) {
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
        entriSkriningAdmisi(layanan.id_pendaftaran, layanan.id, layanan.layanan,  bed, action);
    }

    function editFORM_KEP_130_00(data) {
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
        entriSkriningAdmisi(layanan.id_pendaftaran, layanan.id, layanan.layanan,  bed, action);
    }

    function tambahFORM_KEP_130_00(data) {
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
        entriSkriningAdmisi(layanan.id_pendaftaran, layanan.id, layanan.layanan, bed,  action);
    }

    function entriSkriningAdmisi(id_pendaftaran, id_layanan_pendaftaran, layanan,  bed, action) {
        // $('#modal_skrining_admisi').modal('show');
        // showSkriningAdmisi(nomer);  
              
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
            url: '<?= base_url("pelayanan/api/pelayanan/get_data_skrining_admisi") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                // console.log(data);
                resetSkriningAdmisi(); 
                $('#id-layanan-pendaftaran-safr').val(id_layanan_pendaftaran);
                $('#id-pendaftaran-safr').val(id_pendaftaran);
                
                if (data.pasien !== null) {
                    $('#id-pasien-safr').val(data.pasien.id_pasien);
                    $('#nama-pasien-safr').text(data.pasien.nama);
                    $('#no-rm-safr').text(data.pasien.no_rm);
                    $('#tgl-lahir-safr').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
                    $('#jenis-kelamin-safr').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));
                }

                // NARIK DATA
                const diagUtamaRm = [...data.ds_manual_utama].sort((a, b) => b.id_layanan_pendaftaran - a.id_layanan_pendaftaran)[0]?.nama;
                $('#edit-diagnosa-safr').html(diagUtamaRm);

                // agar muncul di pembuka namanya diley
                setTimeout(() => {
                    $('#diagnosa-safr').html(diagUtamaRm);                 
                });
                // console.log(diagUtamaRm);

                // TANGGAL
                $('#data-skrining-admisi').one('click', function() {
                        $('#tanggal-safr, #edit-tanggal-safr').datetimepicker({
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
                $('#data-skrining-admisi').one('click', function()  {
                    $('#jam-safr, #edit-jam-safr' )
                    .on('click', function() {
                        $(this).timepicker({
                            format: 'HH:mm',
                            showInputs: false,
                            showMeridian: false
                        });
                    })
                })
            
                // Perawat
                $('#data-skrining-admisi').one('click', function() {
                    $('#perawat-safr, #edit-perawat-safr')
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


                if (typeof data.skrining_admisi !== 'undefined' && data.skrining_admisi !== null) {
                    showSkriningAdmisiFaktor(data.skrining_admisi, id_pendaftaran, id_layanan_pendaftaran, bed, action);
                    showSkriningAdmisi(nomer);                 
                } else {
                    $('#tabel-safr .body-table').empty();
                }
                $('#bed-safr').text(bed);
               
                $('#modal_skrining_admisi').modal('show');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })


    }

    // <label id="diagnosa-safr"> </label>


    function showSkriningAdmisi(num) {
        let html = bukaLebar('Form Skrining Admisi Faktor Risiko');
        html += /* html */ `
            <div class="modal-body"> 
                <div class="row">
                    <hr>
                    <table class="table table-sm table-striped table-bordered" style="margin-top: -15px">
                        <thead>
                            <tr>
                                <td width="30%"> <b>TANGGAL 
                                    <input type="text" name="tanggal_safr"id="tanggal-safr" class="custom-form clear-input d-inline-block col-lg-3 ml-2" placeholder="dd/mm/yyyy">
                                </td>
                                <td width="30%">  <b>JAM
                                    <input type="text" name="jam_safr"id="jam-safr" class="custom-form clear-input d-inline-block col-lg-2 ml-2" placeholder="hh/ii">
                                </td>
                                <td width="30%"> <b>DIAGNOSIS   : 
                                    <label id="diagnosa-safr"> </label>
                                </td>
                            </tr>
                            <br>
                            <tr>
                                <td width="30%" class="center" style="background-color: orange; color: black;"></td>
                                <td width="30%" class="center" style="background-color: orange; color: black;">
                                    <b>PENGENALAN FAKTOR RISIKO SAAT ADMISI DAN PERSALINAN</b>
                                </td>
                                <td width="30%" class="center" style="background-color: orange; color: black;"></td>
                            </tr>
                            <tr>
                                <td width="30%" class="center" style="background-color: #00BFFF; color: black;"><b>AWASI PERDARAHAN</b> <br> <i> Perawatan Kebidanan Rutin</td>
                                <td width="30%" class="center" style="background-color: #FFFFE0; color: black;"><b>NOTIFIKASI TIM RESPON AWAL EMERGENSI</b> 
                                    <br> <i> PPA yang terlibat dalam penanganan
                                    <br> lanjut perdarahan telah bersiap siaga
                                    <br> untuk penatalaksanaan lanjut perdarahan
                                </td>
                                <td width="30%" class="center" style="background-color: #FF4500; color: black;"> <b> NOTIFIKASI DAN
                                    <br> AKTIFASI TIM RESPON 
                                    <br> AWAL EMERGENSI 
                                </td>
                            </tr>
                            <tr>
                                <td width="30%" class="center"> <b> Rendah </td>
                                <td width="30%" class="center"> <b> Medium </td>
                                <td width="30%" class="center"> <b> Tinggi</td>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td> 
                                    <input type="checkbox" name="rendah_safr_1 "id="rendah-safr-1" value="1"class="mr-1">
                                    Tidak ada riwayat operasi Rahim (sesar, operasi myoma)
                                </td>  
                                <td> 
                                    <input type="checkbox" name="medium_safr_1 "id="medium-safr-1" value="1"class="mr-1">
                                    Bekas sesar atau operasi rahim sebelumnya    
                                </td>
                                <td>
                                    <input type="checkbox" name="tinggi_safr_1 "id="tinggi-safr-1" value="1"class="mr-1">
                                    Plasenta previa, plasenta letak rendah
                                </td> 
                            </tr>   
                            <tr>
                                <td> 
                                    <input type="checkbox" name="rendah_safr_2 "id="rendah-safr-2" value="1"class="mr-1">
                                    Kehamilan tunggal
                                </td>  
                                <td> 
                                    <input type="checkbox" name="medium_safr_2 "id="medium-safr-2" value="1"class="mr-1">
                                    Kehamilan ganda    
                                </td>
                                <td>
                                    <input type="checkbox" name="tinggi_safr_2 "id="tinggi-safr-2" value="1"class="mr-1">
                                    Dicurigai/diketahui plasenta akreta 
                                </td> 
                            </tr> 
                            <tr>
                                <td> 
                                    <input type="checkbox" name="rendah_safr_3 "id="rendah-safr-3" value="1"class="mr-1">
                                    Gravida 4 atau kurang 
                                </td>  
                                <td> 
                                    <input type="checkbox" name="medium_safr_3 "id="medium-safr-3" value="1"class="mr-1">
                                    Gravida 5 atau lebih    
                                </td>
                                <td>
                                    <input type="checkbox" name="tinggi_safr_3 "id="tinggi-safr-3" value="1"class="mr-1">
                                    Solusio plasenta 
                                </td> 
                            </tr>   
                            <tr>
                                <td> 
                                    <input type="checkbox" name="rendah_safr_4 "id="rendah-safr-4" value="1"class="mr-1">
                                    Tidak ada kelainan perdarahan
                                </td>  
                                <td> 
                                    <input type="checkbox" name="medium_safr_4 "id="medium-safr-4" value="1"class="mr-1">
                                    Infeksi intra partum/korioamnionitis   
                                </td>
                                <td>
                                    <input type="checkbox" name="tinggi_safr_4 "id="tinggi-safr-4" value="1"class="mr-1">
                                    Gangguan koagulopati 
                                </td> 
                            </tr>   
                            <tr>
                                <td> 
                                    <input type="checkbox" name="rendah_safr_5 "id="rendah-safr-5" value="1"class="mr-1">
                                    Tidak ada riwayat HPP 
                                </td>  
                                <td> 
                                    <input type="checkbox" name="medium_safr_5 "id="medium-safr-5" value="1"class="mr-1">
                                    Riwayat HPP pada persalinan sebelumnya    
                                </td>
                                <td>
                                    <input type="checkbox" name="tinggi_safr_5 "id="tinggi-safr-5" value="1"class="mr-1">
                                    Riwayat > 1 HPP
                                </td> 
                            </tr>   
                            <tr>
                                <td> 
                                    <input type="checkbox" name="rendah_safr_6 "id="rendah-safr-6" value="1"class="mr-1">
                                    Hasil pemeriksaan Hb (dalam 1 bulan) >10
                                </td>  
                                <td> 
                                    <input type="checkbox" name="medium_safr_6 "id="medium-safr-6" value="1"class="mr-1">
                                    Mioma uteri besar    
                                </td>
                                <td>
                                    <input type="checkbox" name="tinggi_safr_6 "id="tinggi-safr-6" value="1"class="mr-1">
                                    HELLP Syndrome
                                </td> 
                            </tr>   

                             <tr>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="medium_safr_7 "id="medium-safr-7" value="1"class="mr-1">
                                    Kadar trombosit  50,000 - 100,000   
                                </td>
                                <td>
                                    <input type="checkbox" name="tinggi_safr_7 "id="tinggi-safr-7" value="1"class="mr-1">
                                    Trombosit < 50,000
                                </td> 
                            </tr> 
                             <tr>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="medium_safr_8 "id="medium-safr-8" value="1"class="mr-1">
                                    Kadar hematocrit  < 30% (Hgb < 10)   
                                </td>
                                <td>
                                    <input type="checkbox" name="tinggi_safr_8 "id="tinggi-safr-8" value="1"class="mr-1">
                                    Hematokrit < 24% (Hgb < 8)
                                </td> 
                            </tr> 
                             <tr>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="medium_safr_9 "id="medium-safr-9" value="1"class="mr-1">
                                    Polihidramnion    
                                </td>
                                <td>
                                    <input type="checkbox" name="tinggi_safr_9 "id="tinggi-safr-9" value="1"class="mr-1">
                                    Kematian janin 
                                </td> 
                            </tr> 
                             <tr>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="medium_safr_10 "id="medium-safr-10" value="1"class="mr-1">
                                    Usia gestasi  < 37 mgg atau  > 41 minggu   
                                </td>
                                <td>
                                    <input type="checkbox" name="tinggi_safr_10 "id="tinggi-safr-10" value="1"class="mr-1">
                                    Didapat 2 atau lebih factor risiko medium 
                                </td> 
                            </tr> 
                            <tr>
                                <td></td>  
                                <td>
                                    <input type="checkbox" name="medium_safr_11 "id="medium-safr-11" value="1"class="mr-1">
                                    Preeclampsia
                                </td> 
                                <td></td>  
                            </tr>   
                            <tr>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="medium_safr_12 "id="medium-safr-12" value="1"class="mr-1">
                                    Persalinan memanjang/lama /Induction (> 24 hrs)   
                                </td>
                                <td></td> 
                            </tr> 

                            <tr>
                                <td width="30%" class="center"> <b> Jika Risiko Rendah :</td>
                                <td width="30%" class="center"> <b> Jika Risiko Medium :</td>
                                <td width="30%" class="center"> <b> Jika Risiko Tinggi :</td>
                            </tr> 
                            <tr>
                                <td> 
                                    <input type="checkbox" name="rendah_safr_13 "id="rendah-safr-13" value="1"class="mr-1">
                                    Contoh darah telah disiapkan dalam spuit 
                                </td>  
                                <td> 
                                    <input type="checkbox" name="medium_safr_13 "id="medium-safr-13" value="1"class="mr-1">
                                    Lakukan pemeriksaan Gol Darah dan cross match sesuai intruksi dokter   
                                </td>
                                <td>
                                    <input type="checkbox" name="tinggi_safr_13 "id="tinggi-safr-13" value="1"class="mr-1">
                                    Lakukan pemeriksaan gol darah dan Crossmatch 2 kantong PRC sesuai intruksi dokter
                                </td> 
                            </tr> 
                            <tr>
                                <td></td>  
                                <td> 
                                    <input type="checkbox" name="medium_safr_14 "id="medium-safr-14" value="1"class="mr-1">
                                    Kaji ulang Protokol Perdarahan    
                                </td>
                                <td>
                                    <input type="checkbox" name="tinggi_safr_14 "id="tinggi-safr-14" value="1"class="mr-1">
                                    Kaji ulang protocol perdarahan 
                                </td> 
                            </tr> 
                            <tr>
                                <td></td>  
                                <td></td>  
                                <td>
                                    <input type="checkbox" name="tinggi_safr_15 "id="tinggi-safr-15" value="1"class="mr-1">
                                    Notifikasi kepada tim anestesi 
                                </td> 
                            </tr> 
                            
                        </tbody>  
                    </table>

                    <table class="table table-no-border table-sm table-striped">
                        <tbody>
                            <tr>
                                <td> <b> Perawat</td>
                                <td colspan="2">
                                    <div class="input-group">
                                        <input type="text" name="perawat_safr" id= "perawat-safr" class="select2c-input ml-2">  
                                    </div>
                                </td>
                            </tr>
                            <p>
                            <tr>
                                <td colspan="8">
                                    <button type="button" title="Tambah Skrining Admisi Faktor Risiko" class="btn btn-info" onclick="tambahSkriningAdmisi()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah Skrining Admisi Faktor Risiko</button>
                                </td>
                            </tr>
                        </tbody>                      
                    </table>
                    <table class="table table-no-border table-sm table-striped">
                        <tbody>
                            <tr>
                                <td colspan="8" style="text-align: right;">
                                    <p class="page__number" style="margin: 0;">HARAP DI PERHATIKAN <span style="font-weight: bold; color: red;">SEBELUM *KONFIRMASI* KLIK *TAMBAH SKRINING ADMISI FAKTOR RISIKO* TERLEBIH DAHULU..!!!</span></p>
                                </td>
                            </tr>
                        </tbody>                      
                    </table> 
                </div>
            </div>
        `;           
        html += tutupRapet();
        $('#buka-tutup-safr').append(html);
    }

    function formatTanggalKhusus(waktu) {
        var el = waktu.split('-');
        var tahun = el[0];
        var bulan = el[1];
        var hari = el[2];
        return hari + '/' + bulan + '/' + tahun;
    }

    function showSkriningAdmisiFaktor(data, id_pendaftaran, id_layanan_pendaftaran, bed, action) {
        $('#tabel-safr .body-table').empty();
        if (data !== null) {
            $.each(data, function(i, v) {
                let btnAksesLihat = '';
                if (action != 'lihat') {
                    btnAksesLihat = '<button type="button" class="btn btn-secondary btn-xs" onclick="editSkriningAdmisi(this, ' +
                    v.id + ', ' + id_pendaftaran + ', ' + id_layanan_pendaftaran + ', \'' + bed +
                    '\')"><i class="fas fa-edit"></i> Edit</button> <button type="button" class="btn btn-secondary btn-xs" onclick="hapusSkriningAdmisi(this, ' +
                    v.id +
                    ')"> <i class="fas fa-trash-alt"></i> Hapus</button>';
                }
                const selOp =
                '<td align="center"><button type="button" class="btn btn-secondary btn-xs" onclick="lihatSkriningAdmisi(this, ' +
                v.id + ', ' + id_pendaftaran + ', ' + id_layanan_pendaftaran + ', \'' + bed +
                '\')"><i class="fas fa-eye"></i> Lihat</button>' +
                btnAksesLihat + 
                '</td>';

                let html = /* html */ `
                    <tr>
                        <td class="number-terapi" align="center">${(++i)}</td>
                        <td align="center">` + ((v.tanggal_safr !== null) ? formatTanggalKhusus(v.tanggal_safr) : '') + `</td>
                        <td align="center">${v.jam_safr || '-'}</td>                       
                        <td align="center">${v.perawat || '-'}</td>                            
                        <td align="center">${v.akun_user}</td>
                        ${selOp}
                    </tr>
                `;
                $('#tabel-safr tbody').append(html);
                numberSafr = i;
            })
        }
    }


    function konfirmasiSimpanSkriningAdmisi() {

        if ($('#tanggal-safr').val() === '') {
            syams_validation('#tanggal-safr', 'Tanggal harus diisi.');
            return false;
        } else {
            syams_validation_remove('#tanggal-safr');
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
                simpanSkriningAdmisi();
            }
        })
    }

    function simpanSkriningAdmisi() {
        var id_layanan_pendaftaran_safr = $('#id-layanan-pendaftaran-safr').val(); 
        $.ajax({
            type: 'POST',
            url: '<?= base_url("pelayanan/api/pelayanan/simpan_data_skrining_admisi") ?>',
            data: $('#form_skrining_admisi').serialize() + '&id-layanan-pendaftaran-safr=' + id_layanan_pendaftaran_safr,

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
                        $('#modal_skrining_admisi').modal('hide');
                        showListForm($('#id-pendaftaran-safr').val(), $('#id-layanan-pendaftaran-safr').val(), $('#id-pasien-safr').val());
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


    function resetSkriningAdmisi() {
        $('#form_skrining_admisi')[0].reset();
        $("input[type='checkbox']").prop('checked',false);
        $("input[type='radio']").prop('checked',false);
        $('#buka-tutup-safr').empty();
    }


    function lihatSkriningAdmisi(obj, id, id_pendaftaran, id_layanan_pendaftaran, bed) {   
         $('#modal-edit-skrining-admisi').modal('show');
         $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_edit_skrining_admisi") ?>/id/' +
                id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#update-safr').empty();
                $('#id-edit-skrining-admisi').val(id);
                function formatTanggalKhusus(waktu) {
                    var el = waktu.split('-');
                    var tahun = el[0];
                    var bulan = el[1];
                    var hari = el[2];
                    return hari + '/' + bulan + '/' + tahun;
                }
                let edit_tanggal_safr = formatTanggalKhusus(data.tanggal_safr);
                $('#edit-tanggal-safr').val(edit_tanggal_safr);                 
                let cttntndkn = '';
                cttntndkn =
                    `  <button type="button" class="btn btn-secondary waves-effect" onclick="$('#modal-edit-skrining-admisi').modal('hide');"><i class="fas fa-times-circle mr-1"></i>Tutup</button>
                  `;
                $('#update-safr').append(cttntndkn);   

                $('#edit-jam-safr').val(data.jam_safr);

                data.rendah_safr_1 == '1' ? $('#edit-rendah-safr-1').prop('checked', true) : $('#edit-rendah-safr-1').prop('checked', false);
                data.medium_safr_1 == '1' ? $('#edit-medium-safr-1').prop('checked', true) : $('#edit-medium-safr-1').prop('checked', false);
                data.tinggi_safr_1 == '1' ? $('#edit-tinggi-safr-1').prop('checked', true) : $('#edit-tinggi-safr-1').prop('checked', false);

                data.rendah_safr_2 == '1' ? $('#edit-rendah-safr-2').prop('checked', true) : $('#edit-rendah-safr-2').prop('checked', false);
                data.medium_safr_2 == '1' ? $('#edit-medium-safr-2').prop('checked', true) : $('#edit-medium-safr-2').prop('checked', false);
                data.tinggi_safr_2 == '1' ? $('#edit-tinggi-safr-2').prop('checked', true) : $('#edit-tinggi-safr-2').prop('checked', false);

                data.rendah_safr_3 == '1' ? $('#edit-rendah-safr-3').prop('checked', true) : $('#edit-rendah-safr-3').prop('checked', false);
                data.medium_safr_3 == '1' ? $('#edit-medium-safr-3').prop('checked', true) : $('#edit-medium-safr-3').prop('checked', false);
                data.tinggi_safr_3 == '1' ? $('#edit-tinggi-safr-3').prop('checked', true) : $('#edit-tinggi-safr-3').prop('checked', false);

                data.rendah_safr_4 == '1' ? $('#edit-rendah-safr-4').prop('checked', true) : $('#edit-rendah-safr-4').prop('checked', false);
                data.medium_safr_4 == '1' ? $('#edit-medium-safr-4').prop('checked', true) : $('#edit-medium-safr-4').prop('checked', false);
                data.tinggi_safr_4 == '1' ? $('#edit-tinggi-safr-4').prop('checked', true) : $('#edit-tinggi-safr-4').prop('checked', false);

                data.rendah_safr_5 == '1' ? $('#edit-rendah-safr-5').prop('checked', true) : $('#edit-rendah-safr-5').prop('checked', false);
                data.medium_safr_5 == '1' ? $('#edit-medium-safr-5').prop('checked', true) : $('#edit-medium-safr-5').prop('checked', false);
                data.tinggi_safr_5 == '1' ? $('#edit-tinggi-safr-5').prop('checked', true) : $('#edit-tinggi-safr-5').prop('checked', false);

                data.rendah_safr_6 == '1' ? $('#edit-rendah-safr-6').prop('checked', true) : $('#edit-rendah-safr-6').prop('checked', false);
                data.medium_safr_6 == '1' ? $('#edit-medium-safr-6').prop('checked', true) : $('#edit-medium-safr-6').prop('checked', false);
                data.tinggi_safr_6 == '1' ? $('#edit-tinggi-safr-6').prop('checked', true) : $('#edit-tinggi-safr-6').prop('checked', false);

                data.medium_safr_7 == '1' ? $('#edit-medium-safr-7').prop('checked', true) : $('#edit-medium-safr-7').prop('checked', false);
                data.tinggi_safr_7 == '1' ? $('#edit-tinggi-safr-7').prop('checked', true) : $('#edit-tinggi-safr-7').prop('checked', false);

                data.medium_safr_8 == '1' ? $('#edit-medium-safr-8').prop('checked', true) : $('#edit-medium-safr-8').prop('checked', false);
                data.tinggi_safr_8 == '1' ? $('#edit-tinggi-safr-8').prop('checked', true) : $('#edit-tinggi-safr-8').prop('checked', false);

                data.medium_safr_9 == '1' ? $('#edit-medium-safr-9').prop('checked', true) : $('#edit-medium-safr-9').prop('checked', false);
                data.tinggi_safr_9 == '1' ? $('#edit-tinggi-safr-9').prop('checked', true) : $('#edit-tinggi-safr-9').prop('checked', false);

                data.medium_safr_10 == '1' ? $('#edit-medium-safr-10').prop('checked', true) : $('#edit-medium-safr-10').prop('checked', false);
                data.tinggi_safr_10 == '1' ? $('#edit-tinggi-safr-10').prop('checked', true) : $('#edit-tinggi-safr-10').prop('checked', false);

                data.medium_safr_11 == '1' ? $('#edit-medium-safr-11').prop('checked', true) : $('#edit-medium-safr-11').prop('checked', false);
                data.medium_safr_12 == '1' ? $('#edit-medium-safr-12').prop('checked', true) : $('#edit-medium-safr-12').prop('checked', false);

                data.rendah_safr_13 == '1' ? $('#edit-rendah-safr-13').prop('checked', true) : $('#edit-rendah-safr-13').prop('checked', false);
                data.medium_safr_13 == '1' ? $('#edit-medium-safr-13').prop('checked', true) : $('#edit-medium-safr-13').prop('checked', false);
                data.tinggi_safr_13 == '1' ? $('#edit-tinggi-safr-13').prop('checked', true) : $('#edit-tinggi-safr-13').prop('checked', false);

                data.medium_safr_14 == '1' ? $('#edit-medium-safr-14').prop('checked', true) : $('#edit-medium-safr-14').prop('checked', false);
                data.tinggi_safr_14 == '1' ? $('#edit-tinggi-safr-14').prop('checked', true) : $('#edit-tinggi-safr-14').prop('checked', false);

                data.tinggi_safr_15 == '1' ? $('#edit-tinggi-safr-15').prop('checked', true) : $('#edit-tinggi-safr-15').prop('checked', false);
               
                $('#edit-perawat-safr').val(data.perawat_safr);
                $('#s2id_edit-perawat-safr a .select2c-chosen').html(data.perawat);      
   
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })      
    }


    function editSkriningAdmisi(obj, id, id_pendaftaran, id_layanan_pendaftaran, bed) {   
        const modal = $('#modal-edit-skrining-admisi');
        $('#update-safr').children().remove();
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_edit_skrining_admisi") ?>/id/' +
                id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#update-safr').empty();
                $('#id-edit-skrining-admisi').val(id);
                function formatTanggalKhusus(waktu) {
                    var el = waktu.split('-');
                    var tahun = el[0];
                    var bulan = el[1];
                    var hari = el[2];
                    return hari + '/' + bulan + '/' + tahun;
                }

                let edit_tanggal_safr = formatTanggalKhusus(data.tanggal_safr);
                $('#edit-tanggal-safr').val(edit_tanggal_safr);   
                let cttntndkn = '';
                cttntndkn =
                    `  <button type="button" class="btn btn-secondary waves-effect" onclick="$('#modal-edit-skrining-admisi').modal('hide');"><i class="fas fa-times-circle mr-1"></i>Tutup</button>
                    <button type="button" class="btn btn-info waves-effect" onclick="updateSkriningAdmisi(${id_pendaftaran}, ${id_layanan_pendaftaran}, '${bed}')"><i class="fas fa-save mr-1"></i>Update</button>`;

                    $('#update-safr').append(cttntndkn);   

                    $('#edit-jam-safr').val(data.jam_safr);

                    data.rendah_safr_1 == '1' ? $('#edit-rendah-safr-1').prop('checked', true) : $('#edit-rendah-safr-1').prop('checked', false);
                    data.medium_safr_1 == '1' ? $('#edit-medium-safr-1').prop('checked', true) : $('#edit-medium-safr-1').prop('checked', false);
                    data.tinggi_safr_1 == '1' ? $('#edit-tinggi-safr-1').prop('checked', true) : $('#edit-tinggi-safr-1').prop('checked', false);

                    data.rendah_safr_2 == '1' ? $('#edit-rendah-safr-2').prop('checked', true) : $('#edit-rendah-safr-2').prop('checked', false);
                    data.medium_safr_2 == '1' ? $('#edit-medium-safr-2').prop('checked', true) : $('#edit-medium-safr-2').prop('checked', false);
                    data.tinggi_safr_2 == '1' ? $('#edit-tinggi-safr-2').prop('checked', true) : $('#edit-tinggi-safr-2').prop('checked', false);

                    data.rendah_safr_3 == '1' ? $('#edit-rendah-safr-3').prop('checked', true) : $('#edit-rendah-safr-3').prop('checked', false);
                    data.medium_safr_3 == '1' ? $('#edit-medium-safr-3').prop('checked', true) : $('#edit-medium-safr-3').prop('checked', false);
                    data.tinggi_safr_3 == '1' ? $('#edit-tinggi-safr-3').prop('checked', true) : $('#edit-tinggi-safr-3').prop('checked', false);

                    data.rendah_safr_4 == '1' ? $('#edit-rendah-safr-4').prop('checked', true) : $('#edit-rendah-safr-4').prop('checked', false);
                    data.medium_safr_4 == '1' ? $('#edit-medium-safr-4').prop('checked', true) : $('#edit-medium-safr-4').prop('checked', false);
                    data.tinggi_safr_4 == '1' ? $('#edit-tinggi-safr-4').prop('checked', true) : $('#edit-tinggi-safr-4').prop('checked', false);

                    data.rendah_safr_5 == '1' ? $('#edit-rendah-safr-5').prop('checked', true) : $('#edit-rendah-safr-5').prop('checked', false);
                    data.medium_safr_5 == '1' ? $('#edit-medium-safr-5').prop('checked', true) : $('#edit-medium-safr-5').prop('checked', false);
                    data.tinggi_safr_5 == '1' ? $('#edit-tinggi-safr-5').prop('checked', true) : $('#edit-tinggi-safr-5').prop('checked', false);

                    data.rendah_safr_6 == '1' ? $('#edit-rendah-safr-6').prop('checked', true) : $('#edit-rendah-safr-6').prop('checked', false);
                    data.medium_safr_6 == '1' ? $('#edit-medium-safr-6').prop('checked', true) : $('#edit-medium-safr-6').prop('checked', false);
                    data.tinggi_safr_6 == '1' ? $('#edit-tinggi-safr-6').prop('checked', true) : $('#edit-tinggi-safr-6').prop('checked', false);

                    data.medium_safr_7 == '1' ? $('#edit-medium-safr-7').prop('checked', true) : $('#edit-medium-safr-7').prop('checked', false);
                    data.tinggi_safr_7 == '1' ? $('#edit-tinggi-safr-7').prop('checked', true) : $('#edit-tinggi-safr-7').prop('checked', false);

                    data.medium_safr_8 == '1' ? $('#edit-medium-safr-8').prop('checked', true) : $('#edit-medium-safr-8').prop('checked', false);
                    data.tinggi_safr_8 == '1' ? $('#edit-tinggi-safr-8').prop('checked', true) : $('#edit-tinggi-safr-8').prop('checked', false);

                    data.medium_safr_9 == '1' ? $('#edit-medium-safr-9').prop('checked', true) : $('#edit-medium-safr-9').prop('checked', false);
                    data.tinggi_safr_9 == '1' ? $('#edit-tinggi-safr-9').prop('checked', true) : $('#edit-tinggi-safr-9').prop('checked', false);

                    data.medium_safr_10 == '1' ? $('#edit-medium-safr-10').prop('checked', true) : $('#edit-medium-safr-10').prop('checked', false);
                    data.tinggi_safr_10 == '1' ? $('#edit-tinggi-safr-10').prop('checked', true) : $('#edit-tinggi-safr-10').prop('checked', false);

                    data.medium_safr_11 == '1' ? $('#edit-medium-safr-11').prop('checked', true) : $('#edit-medium-safr-11').prop('checked', false);
                    data.medium_safr_12 == '1' ? $('#edit-medium-safr-12').prop('checked', true) : $('#edit-medium-safr-12').prop('checked', false);

                    data.rendah_safr_13 == '1' ? $('#edit-rendah-safr-13').prop('checked', true) : $('#edit-rendah-safr-13').prop('checked', false);
                    data.medium_safr_13 == '1' ? $('#edit-medium-safr-13').prop('checked', true) : $('#edit-medium-safr-13').prop('checked', false);
                    data.tinggi_safr_13 == '1' ? $('#edit-tinggi-safr-13').prop('checked', true) : $('#edit-tinggi-safr-13').prop('checked', false);

                    data.medium_safr_14 == '1' ? $('#edit-medium-safr-14').prop('checked', true) : $('#edit-medium-safr-14').prop('checked', false);
                    data.tinggi_safr_14 == '1' ? $('#edit-tinggi-safr-14').prop('checked', true) : $('#edit-tinggi-safr-14').prop('checked', false);

                    data.tinggi_safr_15 == '1' ? $('#edit-tinggi-safr-15').prop('checked', true) : $('#edit-tinggi-safr-15').prop('checked', false);

                    $('#edit-perawat-safr').val(data.perawat_safr);
                    $('#s2id_edit-perawat-safr a .select2c-chosen').html(data.perawat);  
                             
                modal.modal('show');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })
    }

    function updateSkriningAdmisi(id_pendaftaran, id_layanan_pendaftaran, bed) {
        // console.log($('#form-edit-skrining-admisi').serialize());
        $.ajax({
            type: 'PUT',
            url: '<?= base_url("pelayanan/api/pelayanan/update_skrining_admisi") ?>',
            data: $('#form-edit-skrining-admisi').serialize(),
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                if (data.status) {
                    messageEditSuccess();
                    entriSkriningAdmisi(id_pendaftaran, id_layanan_pendaftaran, bed);
                } else {
                    messageEditFailed();
                }
                $('#modal-edit-skrining-admisi').modal('hide');
            },
            error: function(e) {
                messageEditFailed();
            }
        });
    }

    if (typeof numberSafr === 'undefined') {
        var numberSafr = 1;
    }

    function tambahSkriningAdmisi() {      
        if ($('#tanggal-safr').val() === '') {
            syams_validation('#tanggal-safr', 'Tanggal harus diisi.');
            return false;
        } else {
            syams_validation_remove('#tanggal-safr');
        }
        if ($('#perawat-safr').val() === '') {
            syams_validation('#perawat-safr', 'Nama Perawat Belum dipilih.');
            return false;
        } else {
            syams_validation_remove('#perawat-safr');
        }
        if ($('#jam-safr').val() === '') {
            syams_validation('#jam-safr', 'Jam Belum diisi.');
            return false;
        } else {
            syams_validation_remove('#jam-safr');
        }

        let html = '';
        let tanggal_safr = $('#tanggal-safr').val();   
        let jam_safr = $('#jam-safr').val();

        let rendah_safr_1 = $('#rendah-safr-1').is(':checked');
        let medium_safr_1 = $('#medium-safr-1').is(':checked');
        let tinggi_safr_1 = $('#tinggi-safr-1').is(':checked');

        let rendah_safr_2 = $('#rendah-safr-2').is(':checked');
        let medium_safr_2 = $('#medium-safr-2').is(':checked');
        let tinggi_safr_2 = $('#tinggi-safr-2').is(':checked');

        let rendah_safr_3 = $('#rendah-safr-3').is(':checked');
        let medium_safr_3 = $('#medium-safr-3').is(':checked');
        let tinggi_safr_3 = $('#tinggi-safr-3').is(':checked');

        let rendah_safr_4 = $('#rendah-safr-4').is(':checked');
        let medium_safr_4 = $('#medium-safr-4').is(':checked');
        let tinggi_safr_4 = $('#tinggi-safr-4').is(':checked');

        let rendah_safr_5 = $('#rendah-safr-5').is(':checked');
        let medium_safr_5 = $('#medium-safr-5').is(':checked');
        let tinggi_safr_5 = $('#tinggi-safr-5').is(':checked');

        let rendah_safr_6 = $('#rendah-safr-6').is(':checked');
        let medium_safr_6 = $('#medium-safr-6').is(':checked');
        let tinggi_safr_6 = $('#tinggi-safr-6').is(':checked');

        let medium_safr_7 = $('#medium-safr-7').is(':checked');
        let tinggi_safr_7 = $('#tinggi-safr-7').is(':checked');

        let medium_safr_8 = $('#medium-safr-8').is(':checked');
        let tinggi_safr_8 = $('#tinggi-safr-8').is(':checked');

        let medium_safr_9 = $('#medium-safr-9').is(':checked');
        let tinggi_safr_9 = $('#tinggi-safr-9').is(':checked');

        let medium_safr_10 = $('#medium-safr-10').is(':checked');
        let tinggi_safr_10 = $('#tinggi-safr-10').is(':checked');

        let medium_safr_11 = $('#medium-safr-11').is(':checked');
        let medium_safr_12 = $('#medium-safr-12').is(':checked');

        let rendah_safr_13 = $('#rendah-safr-13').is(':checked');
        let medium_safr_13 = $('#medium-safr-13').is(':checked');
        let tinggi_safr_13 = $('#tinggi-safr-13').is(':checked');

        let medium_safr_14 = $('#medium-safr-14').is(':checked');
        let tinggi_safr_14 = $('#tinggi-safr-14').is(':checked');

        let tinggi_safr_15 = $('#tinggi-safr-15').is(':checked');
     
        let perawat = $('#s2id_perawat-safr a .select2c-chosen').html();   
        let perawat_safr = $('#perawat-safr').val();
        html = /* html */ `
            <tr class="row-in-${++numberSafr}">
                <td class="number-pengkajian" align="center">${numberSafr++}</td>
                <td align="center">
                    <input type="hidden" name="tanggal_safr[]" value="${tanggal_safr}">${tanggal_safr}
                </td>
                <td align="center">
                    <input type="hidden" name="jam_safr[]" value="${jam_safr}">${jam_safr}
                </td>
                <td align="center">
                    <input type="hidden" name="perawat_safr[]" value="${perawat_safr}">${perawat}
                </td>               
                <td align="center">
                    <?= $this->session->userdata('nama') ?>
                    <input type="hidden" name="user_skrining[]" value="<?= $this->session->userdata("id_translucent") ?>">
                    <input type="hidden" name="pengkajian_date_skrining_admisi[]" value="<?= date("Y-m-d H:i:s") ?>"> 

                    <input type="hidden" name="rendah_safr_1[]" value="${rendah_safr_1 ? 1 : 0}">                                    
                    <input type="hidden" name="medium_safr_1[]" value="${medium_safr_1 ? 1 : 0}">                                    
                    <input type="hidden" name="tinggi_safr_1[]" value="${tinggi_safr_1 ? 1 : 0}">  
                    
                    <input type="hidden" name="rendah_safr_2[]" value="${rendah_safr_2 ? 1 : 0}">                                    
                    <input type="hidden" name="medium_safr_2[]" value="${medium_safr_2 ? 1 : 0}">                                    
                    <input type="hidden" name="tinggi_safr_2[]" value="${tinggi_safr_2 ? 1 : 0}">  

                    <input type="hidden" name="rendah_safr_3[]" value="${rendah_safr_3 ? 1 : 0}">                                    
                    <input type="hidden" name="medium_safr_3[]" value="${medium_safr_3 ? 1 : 0}">                                    
                    <input type="hidden" name="tinggi_safr_3[]" value="${tinggi_safr_3 ? 1 : 0}">  

                    <input type="hidden" name="rendah_safr_4[]" value="${rendah_safr_4 ? 1 : 0}">                                    
                    <input type="hidden" name="medium_safr_4[]" value="${medium_safr_4 ? 1 : 0}">                                    
                    <input type="hidden" name="tinggi_safr_4[]" value="${tinggi_safr_4 ? 1 : 0}">  

                    <input type="hidden" name="rendah_safr_5[]" value="${rendah_safr_5 ? 1 : 0}">                                    
                    <input type="hidden" name="medium_safr_5[]" value="${medium_safr_5 ? 1 : 0}">                                    
                    <input type="hidden" name="tinggi_safr_5[]" value="${tinggi_safr_5 ? 1 : 0}">  

                    <input type="hidden" name="rendah_safr_6[]" value="${rendah_safr_6 ? 1 : 0}">                                    
                    <input type="hidden" name="medium_safr_6[]" value="${medium_safr_6 ? 1 : 0}">                                    
                    <input type="hidden" name="tinggi_safr_6[]" value="${tinggi_safr_6 ? 1 : 0}">  

                    <input type="hidden" name="medium_safr_7[]" value="${medium_safr_7 ? 1 : 0}">                                    
                    <input type="hidden" name="tinggi_safr_7[]" value="${tinggi_safr_7 ? 1 : 0}"> 

                    <input type="hidden" name="medium_safr_8[]" value="${medium_safr_8 ? 1 : 0}">                                    
                    <input type="hidden" name="tinggi_safr_8[]" value="${tinggi_safr_8 ? 1 : 0}"> 

                    <input type="hidden" name="medium_safr_9[]" value="${medium_safr_9 ? 1 : 0}">                                    
                    <input type="hidden" name="tinggi_safr_9[]" value="${tinggi_safr_9 ? 1 : 0}"> 

                    <input type="hidden" name="medium_safr_10[]" value="${medium_safr_10 ? 1 : 0}">                                    
                    <input type="hidden" name="tinggi_safr_10[]" value="${tinggi_safr_10 ? 1 : 0}"> 

                    <input type="hidden" name="medium_safr_11[]" value="${medium_safr_11 ? 1 : 0}">                                    
                    <input type="hidden" name="medium_safr_12[]" value="${medium_safr_12 ? 1 : 0}">     
                    
                    <input type="hidden" name="rendah_safr_13[]" value="${rendah_safr_13 ? 1 : 0}">                                    
                    <input type="hidden" name="medium_safr_13[]" value="${medium_safr_13 ? 1 : 0}">                                    
                    <input type="hidden" name="tinggi_safr_13[]" value="${tinggi_safr_13 ? 1 : 0}"> 

                    <input type="hidden" name="medium_safr_14[]" value="${medium_safr_14 ? 1 : 0}">                                    
                    <input type="hidden" name="tinggi_safr_14[]" value="${tinggi_safr_14 ? 1 : 0}"> 

                    <input type="hidden" name="tinggi_safr_15[]" value="${tinggi_safr_15 ? 1 : 0}">                                      
                </td>
                <td align="center">
                    <button type="button" class="btn btn-secondary btn-xxs" onclick="removeList(this)"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
        `;
        $('#tabel-safr .body-table').append(html);
    }


    function hapusSkriningAdmisi(obj, id) {
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
                            url: '<?= base_url("pelayanan/api/pelayanan/hapus_skrining_admisi") ?>/' +
                                id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                if (data.status) {
                                    messageCustom(data.message, 'Success');
                                    removeList(obj);
                                } else {
                                    customAlert('Hapus Skrining Admisi Faktor Risiko', data
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
