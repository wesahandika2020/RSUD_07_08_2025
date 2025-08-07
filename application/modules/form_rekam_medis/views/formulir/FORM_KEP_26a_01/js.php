<script>
    // FODTI
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


    function lihatFORM_KEP_26a_01(data) {
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
        entriFormulirObservasiIGD(layanan.id_pendaftaran, layanan.id, layanan.layanan,  bed, action);
    }

    function editFORM_KEP_26a_01(data) {
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
        entriFormulirObservasiIGD(layanan.id_pendaftaran, layanan.id, layanan.layanan,  bed, action);
    }

    function tambahFORM_KEP_26a_01(data) {
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
        entriFormulirObservasiIGD(layanan.id_pendaftaran, layanan.id, layanan.layanan, bed,  action);
    }

    function entriFormulirObservasiIGD(id_pendaftaran, id_layanan_pendaftaran, layanan,  bed, action) {
        // $('#modal_formulir_observasi_igd').modal('show');
        // showFormulirObservasiIGD(nomer);          
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
            url: '<?= base_url("order_operasi/api/Order_operasi/get_data_formulir_observasi_IGD") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                // console.log(data);
                resetFormulirObservasiIGD(); 
                $('#id-layanan-pendaftaran-fodti').val(id_layanan_pendaftaran);
                $('#id-pendaftaran-fodti').val(id_pendaftaran);              
                if (data.pasien !== null) {
                    $('#id-pasien-fodti').val(data.pasien.id_pasien);
                    $('#nama-pasien-fodti').text(data.pasien.nama);
                    $('#no-rm-fodti').text(data.pasien.no_rm);
                    $('#tgl-lahir-fodti').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
                    $('#jenis-kelamin-fodti').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));
                }

                // TANGGAL
                $('#data-formulir-observasi-igd').one('click', function() {
                        $('#tanggal-1-fodti, #edit-tanggal-1-fodti, #tanggal-2-fodti, #edit-tanggal-2-fodti').datetimepicker({
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
                $('#data-formulir-observasi-igd').one('click', function()  {
                    $('#jam-1-fodti, #edit-jam-1-fodti, #jam-2-fodti, #edit-jam-2-fodti')
                    .on('click', function() {
                        $(this).timepicker({
                            format: 'HH:mm',
                            showInputs: false,
                            showMeridian: false
                        });
                    })
                })
            

                // Perawat
                $('#data-formulir-observasi-igd').one('click', function() {
                    $('#perawat-fodti, #edit-perawat-fodti')
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

      
                if (typeof data.formulir_observasi_IGD !== 'undefined' && data.formulir_observasi_IGD !== null) {
                    showFormulirObservasiIGDE(data.formulir_observasi_IGD, id_pendaftaran, id_layanan_pendaftaran, bed, action);
                    showFormulirObservasiIGD(nomer);                 
                } else {
                    $('#tabel-fodti .body-table').empty();
                }
               
                $('#modal_formulir_observasi_igd').modal('show');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })
    }

    function showFormulirObservasiIGD(num) {
        let html = bukaLebar('Form Formulir Observasi Dan Tindakan IGD');
        html += /* html */ ` 
            <div class="table-responsive">
                <div class="row">                
                    <div class="col">
                        <table class="table table-bordered table-sm table-striped">
                            <thead>
                                <tr>
                                    <th class="center" rowspan="3" style="background-color: #B0E0E6; color: black;">Tgl</th>
                                    <th class="center" rowspan="3" style="background-color: #B0E0E6; color: black;">Jam</th>
                                    <th class="center" rowspan="3" style="background-color: #B0E0E6; color: black; writing-mode: vertical-rl; -moz-transform: rotate(180deg); -webkit-transform: rotate(180deg); -o-transform: rotate(180deg); -ms-transform: rotate(180deg); transform: rotate(180deg);">
                                        Bismillahirrohmanirrohim
                                    </th>
                                    <th class="center" colspan="2" style="background-color: #B0E0E6; color: black;">Td</th>
                                    <th class="center" rowspan="2" style="background-color: #B0E0E6; color: black;">Nadi</th>
                                    <th class="center" rowspan="2" style="background-color: #B0E0E6; color: black;">RR</th>
                                    <th class="center" rowspan="2" style="background-color: #B0E0E6; color: black;">Suhu</th>
                                    <th class="center" rowspan="2" style="background-color: #B0E0E6; color: black;">Sat o2</th>
                                    <th class="center" rowspan="3" style="background-color: #B0E0E6; color: black;">Kategori EWS</th>
                                    <th class="center" rowspan="3" style="background-color: #B0E0E6; color: black;">Skala Nyeri</th>
                                    <th class="center" rowspan="3" style="background-color: #B0E0E6; color: black;">Resiko Jatuh</th>
                                    <th class="center" rowspan="3" style="background-color: #B0E0E6; color: black;">Kesadaran</th>
                                    <th class="center" colspan="3" style="background-color: #B0E0E6; color: black;">Neuorogi</th>
                                    <th class="center" rowspan="3" style="background-color: #B0E0E6; color: black;">Pemeriksaan Diagnostik</th>
                                    <th class="center" rowspan="3" style="background-color: #B0E0E6; color: black;">Tgl</th>
                                    <th class="center" rowspan="3" style="background-color: #B0E0E6; color: black;">Jam</th>
                                    <th class="center" rowspan="3" style="background-color: #B0E0E6; color: black;">Implementasi</th>
                                    <th class="center" rowspan="3" style="background-color: #B0E0E6; color: black; writing-mode: vertical-rl; -moz-transform: rotate(180deg); -webkit-transform: rotate(180deg); -o-transform: rotate(180deg); -ms-transform: rotate(180deg); transform: rotate(180deg);">
                                    Alhamdulillahirobbil'alamin</th>
                                    <th class="center" rowspan="3" style="background-color: #B0E0E6; color: black;">TTd</th>
                                    <th class="center" rowspan="3" style="background-color: #B0E0E6; color: black;">Nama Perawat</th>                           
                                </tr>  
                                <tr>
                                    <th class="center" style="background-color: #B0E0E6; color: black;">S</th>
                                    <th class="center" style="background-color: #B0E0E6; color: black;">D</th>
                                    <th class="center" rowspan="2" style="background-color: #B0E0E6; color: black;">GCS / E / M / V Total</th>
                                    <th class="center" colspan="2" style="background-color: #B0E0E6; color: black;">Pupil</th>
                                </tr>   
                                <tr>
                                    <th class="center" style="background-color: #B0E0E6; color: black;">mmHg</th>
                                    <th class="center" style="background-color: #B0E0E6; color: black;">mmHg</th>
                                    <th class="center" style="background-color: #B0E0E6; color: black;">/menit</th>
                                    <th class="center" style="background-color: #B0E0E6; color: black;">/menit</th>
                                    <th class="center" style="background-color: #B0E0E6; color: black;">℃</th>
                                    <th class="center" style="background-color: #B0E0E6; color: black;">%</th>
                                    <th class="center" style="background-color: #B0E0E6; color: black;">Kanan</th>
                                    <th class="center" style="background-color: #B0E0E6; color: black;">Kiri</th>
                                </tr>
                                                                                                
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="text" name="tanggal_1_fodti" id="tanggal-1-fodti" class="custom-form clear-input" style="width: 100px;" placeholder="dd/mm/yyyy"></td>
                                    <td><input type="text" name="jam_1_fodti" id="jam-1-fodti" class="custom-form clear-input" style="width: 100px;" placeholder="hh:mm"></td>
                                    <td><input type="checkbox" name="bismilah_fodti" id="bismilah-fodti" value="1" class="mr-1" ></td>
                                    <td><input type="text" name="td_s_fodti" id="td-s-fodti" class="custom-form clear-input" style="width: 60px;"></td>
                                    <td><input type="text" name="td_d_fodti" id="td-d-fodti" class="custom-form clear-input" style="width: 60px;"></td>
                                    <td><input type="text" name="nadi_fodti" id="nadi-fodti" class="custom-form clear-input" style="width: 60px;"></td>
                                    <td><input type="text" name="rr_fodti" id="rr-fodti" class="custom-form clear-input" style="width: 60px;"></td>
                                    <td><input type="text" name="suhu_fodti" id="suhu-fodti" class="custom-form clear-input" style="width: 60px;"></td>
                                    <td><input type="text" name="sat_o2_fodti" id="sat-o2-fodti" class="custom-form clear-input" style="width: 60px;"></td>
                                    <td><input type="text" name="kategori_fodti" id="kategori-fodti" class="custom-form clear-input" style="width: 60px;"></td>
                                    <td><input type="text" name="skala_fodti" id="skala-fodti" class="custom-form clear-input" style="width: 60px;"></td>
                                    <td>
                                        <textarea name="resiko_fodti" id="resiko-fodti" class="custom-form clear-input" style="width: 200px; height: 150px;"></textarea>
                                    </td>

                                    <td>
                                        <textarea name="kesadaran_fodti" id="kesadaran-fodti" class="custom-form clear-input" style="width: 200px; height: 150px;"></textarea>
                                    </td>
                                    
                                    <td>
                                        <div style="display: flex; align-items: center;">
                                            <span style="margin-right: 5px;">E</span>
                                            <input type="text" name="gcs_e_fodti" id="gcs-e-fodti" class="custom-form clear-input" style="width: 50px;" onkeypress="return hanyaAngka(event)">
                                        </div>
                                        <p>
                                        <div style="display: flex; align-items: center;">
                                            <span style="margin-right: 5px;">M</span>
                                            <input type="text" name="gcs_m_fodti" id="gcs-m-fodti" class="custom-form clear-input" style="width: 50px;" onkeypress="return hanyaAngka(event)">
                                        </div>
                                        <p>
                                        <div style="display: flex; align-items: center;">
                                            <span style="margin-right: 5px;">V</span>
                                            <input type="text" name="gcs_v_fodti" id="gcs-v-fodti" class="custom-form clear-input" style="width: 50px;" onkeypress="return hanyaAngka(event)">
                                        </div>
                                        <p>
                                        <div style="display: flex; align-items: center;">
                                            <span style="margin-right: 5px;">Total</span>
                                            <input type="text" name="total_gcs_fodti" id="total-gcs-fodti" class="custom-form clear-input" style="width: 60px;" placeholder="0">
                                        </div>
                                    </td>

                                    <td><input type="text" name="pupil_kanan_fodti" id="pupil-kanan-fodti" class="custom-form clear-input" style="width: 60px;"></td>
                                    <td><input type="text" name="pupil_kiri_fodti" id="pupil-kiri-fodti" class="custom-form clear-input" style="width: 60px;"></td>
                                    <td>
                                        <textarea name="pemeriksaan_fodti" id="pemeriksaan-fodti" class="custom-form clear-input" style="width: 200px; height: 150px;"></textarea>
                                    </td>                                   
                                    <td><input type="text" name="tanggal_2_fodti" id="tanggal-2-fodti" class="custom-form clear-input" style="width: 100px;" placeholder="dd/mm/yyyy"></td>
                                    <td><input type="text" name="jam_2_fodti" id="jam-2-fodti" class="custom-form clear-input" style="width: 100px;" placeholder="hh:mm"></td>
                                    <td>
                                        <textarea name="implementasi_fodti" id="implementasi-fodti" class="custom-form clear-input" style="width: 300px; height: 150px;"></textarea>
                                    </td>
                                    <td><input type="checkbox" name="alhamdulilah_fodti" id="alhamdulilah-fodti" value="1" class="mr-1" ></td>
                                    <td><input type="checkbox" name="ttd_fodti" id="ttd-fodti" value="1" class="mr-1"></td>
                                    <td><input type="text" name="perawat_fodti" id="perawat-fodti" class="select2c-input"></td>                                                      
                                </tr>
                            </tbody>                   
                        </table> 
                        <table class="table table-no-border table-sm table-striped">
                            <tbody>
                                <p>
                                <tr>
                                    <td colspan="8">
                                        <button type="button" title="Tambah Formulir Observasi IGD" class="btn btn-info" onclick="tambahFormulirObservasiIGD()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah Formulir Observasi IGD</button>
                                    </td>
                                </tr>
                            </tbody>                      
                        </table>    
                    </div>
                </div>        
            </div>    
            <table class="table table-no-border table-sm table-striped">
                <tbody>
                    <tr>
                        <td colspan="8" style="text-align: right;">
                            <p class="page__number" style="margin: 0;">HARAP DI PERHATIKAN <span style="font-weight: bold; color: red;">SEBELUM *KONFIRMASI* KLIK *TAMBAH FORMULIR OBSERVASI IGD* TERLEBIH DAHULU..!!!</span></p>
                        </td>
                    </tr>
                </tbody>                      
            </table>  
        `;           
        html += tutupRapet();
        $('#buka-tutup-fodti').append(html);
    }

    function showFormulirObservasiIGDE(data, id_pendaftaran, id_layanan_pendaftaran, bed, action) {

        function formatTanggalKhusus(waktu) {
            var el = waktu.split('-');
            var tahun = el[0];
            var bulan = el[1];
            var hari = el[2];
            return hari + '/' + bulan + '/' + tahun;
        }
        
        $('#tabel-fodti .body-table').empty();
        if (data !== null) {
            $.each(data, function(i, v) {
                let btnAksesLihat = '';
                if (action != 'lihat') {
                    btnAksesLihat = '<button type="button" class="btn btn-secondary btn-xxs" onclick="editFormulirObservasiIGD(this, ' +
                    v.id + ', ' + id_pendaftaran + ', ' + id_layanan_pendaftaran + ', \'' + bed +
                    '\')"><i class="fas fa-edit m-r-5"></i> Edit</button> <button type="button" class="btn btn-secondary btn-xs" onclick="hapusFormulirObservasiIGD(this, ' +
                    v.id +
                    ')"> <i class="fas fa-fw fa-trash-alt m-r-5"></i> Hapus</button>';
                }
                const selOp =
                '<td align="center"><button type="button" class="btn btn-secondary btn-xxs" onclick="lihatFormulirObservasiIGD(this, ' +
                v.id + ', ' + id_pendaftaran + ', ' + id_layanan_pendaftaran + ', \'' + bed +
                '\')"><i class="fas fa-eye m-r-5"></i> Lihat</button> ' +
                btnAksesLihat + 
                '</td>';
                let html = /* html */ `     
                    <tr>
                        <td class="number-terapi" align="center">${(++i)}</td>
                        <td align="center">` + ((v.tanggal_1_fodti !== null) ? formatTanggalKhusus(v.tanggal_1_fodti) : '') + `</td>
                        <td align="center">${v.jam_1_fodti || '-'}</td>                       
                        <td class="center">${v.bismilah_fodti == '1' ? '&check;' : '&#10006;'}</td>
                        <td class="center">${v.alhamdulilah_fodti == '1' ? '&check;' : '&#10006;'}</td>
                        <td class="center">${v.ttd_fodti == '1' ? '&check;' : '&#10006;'}</td>
                        <td align="center">${v.perawat || '-'}</td>                            
                        <td align="center">${v.akun_user}</td>
                        ${selOp} 
                    </tr>
                `;
                $('#tabel-fodti tbody').append(html);
                numberFOIGD = i;
            })
        }
    }


    function konfirmasiSimpanFormulirObservasiIGD() {

        if ($('#tabel-fodti .body-table').children().length === 0) {
            // Kondisi validasi jika length == 0 menggunakan SweetAlert
            Swal.fire({
                title: 'Perhatian!',
                text: 'Anda Belum mengklik tombol Tambah Formulir Observasi IGD!!!',
                icon: 'warning',
                confirmButtonText: 'OK'
            });
            return false;
        } else {
            // Kondisi jika tabel memiliki data
            console.log('Tabel memiliki data.');
        }

        if ($('#tanggal-1-fodti').val() === '') {
            syams_validation('#tanggal-1-fodti', 'Tanggal harus diisi.');
            return false;
        } else {
            syams_validation_remove('#tanggal-1-fodti');
        }

        if ($('#tanggal-2-fodti').val() === '') {
            syams_validation('#tanggal-2-fodti', 'Tanggal harus diisi.');
            return false;
        } else {
            syams_validation_remove('#tanggal-2-fodti');
        }

        if ($('#perawat-fodti').val() === '') {
            syams_validation('#perawat-fodti', 'Nama Perawat Belum dipilih.');
            return false;
        } else {
            syams_validation_remove('#perawat-fodti');
        }

        swal.fire({
            title: 'Simpan Data',
            text: "Apakah anda yakin akan menyimpan data ini ?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-fw fa-save mr-1"></i>Simpan',
            cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                simpanFormulirObservasiIGD();
            }
        })
    }

    function simpanFormulirObservasiIGD() {
        var id_layanan_pendaftaran_fodti = $('#id-layanan-pendaftaran-fodti').val(); 
        $.ajax({
            type: 'POST',
            url: '<?= base_url("order_operasi/api/Order_operasi/simpan_data_formulir_observasi_IGD") ?>',
            data: $('#form_formulir_observasi_igd').serialize() + '&id-layanan-pendaftaran-fodti=' + id_layanan_pendaftaran_fodti,
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
                        $('#modal_formulir_observasi_igd').modal('hide');
                        showListForm($('#id-pendaftaran-fodti').val(), $('#id-layanan-pendaftaran-fodti').val(), $('#id-pasien-fodti').val());
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

    function resetFormulirObservasiIGD() {
        $('#form_formulir_observasi_igd')[0].reset();
        $("input[type='checkbox']").prop('checked',false);
        $("input[type='radio']").prop('checked',false); 
        $('#gcs-e-fodti, #edit-gcs-e-fodti, #gcs-m-fodti, #edit-gcs-m-fodti, #gcs-v-fodti, #edit-gcs-v-fodti, #total-gcs-fodti, #edit-total-gcs-fodti').val('');
        $('#buka-tutup-fodti').empty();      
    }

    // GCS WESA yang sudah benar dan tidak nan / GCS Jangan di taroh di dalem  entriFormulirObservasiIGD, di karenakan tidak bisa di reset
    $('#data-formulir-observasi-igd').one('click', function() {
        $('#gcs-e-fodti, #edit-gcs-e-fodti, #gcs-m-fodti, #edit-gcs-m-fodti, #gcs-v-fodti, #edit-gcs-v-fodti').on('keyup', function(e) {
            let total = 0;
            // Loop melalui setiap input dan tambahkan nilai mereka ke total
            $('#gcs-e-fodti, #edit-gcs-e-fodti, #gcs-m-fodti, #edit-gcs-m-fodti, #gcs-v-fodti, #edit-gcs-v-fodti').each(function() {
                // Parse nilai input sebagai integer dan gunakan 0 jika bukan angka yang valid
                let value = parseInt($(this).val(), 10);
                if (isNaN(value)) {
                    value = 0;
                }
                total += value;
            });
            $('#total-gcs-fodti, #edit-total-gcs-fodti').val(total);
        });
    });


    // function hanyaAngkaWH(event) {
    //     var charCode = event.which ? event.which : event.keyCode;
    //     // Memastikan hanya angka (0-9) dan tombol kontrol (backspace, delete, arrow keys) yang diperbolehkan
    //     if (charCode > 31 && (charCode < 48 || charCode > 57)) {
    //         return false;
    //     }
    //     return true;
    // }


    function lihatFormulirObservasiIGD(obj, id, id_pendaftaran, id_layanan_pendaftaran, bed) {   
         $('#modal-edit-formulir-observasi-igd').modal('show');
         $.ajax({
            type: 'GET',
            url: '<?= base_url("order_operasi/api/Order_operasi/get_formulir_observasi_igd") ?>/id/' +
                id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#update-fodti').empty();
                $('#id-formulir-observasi-igd').val(id);

                function formatTanggalKhusus(waktu) {
                    var el = waktu.split('-');
                    var tahun = el[0];
                    var bulan = el[1];
                    var hari = el[2];
                    return hari + '/' + bulan + '/' + tahun;
                }
                let edit_tanggal_1_fodti = formatTanggalKhusus(data.tanggal_1_fodti);
                $('#edit-tanggal-1-fodti').val(edit_tanggal_1_fodti); 

                let edit_tanggal_2_fodti = formatTanggalKhusus(data.tanggal_2_fodti);
                $('#edit-tanggal-2-fodti').val(edit_tanggal_2_fodti); 

                let cttntndkn = '';
                cttntndkn =
                    `  <button type="button" class="btn btn-secondary waves-effect" onclick="$('#modal-edit-formulir-observasi-igd').modal('hide');"><i class="fas fa-times-circle mr-1"></i>Tutup</button>
                  `;

                $('#update-fodti').append(cttntndkn);       
                $('#edit-jam-1-fodti').val(data.jam_1_fodti);  
                data.bismilah_fodti == '1' ? $('#edit-bismilah-fodti').prop('checked', true) : $('#edit-bismilah-fodti').prop('checked', false);               
                $('#edit-td-s-fodti').val(data.td_s_fodti);
                $('#edit-td-d-fodti').val(data.td_d_fodti);
                $('#edit-nadi-fodti').val(data.nadi_fodti);
                $('#edit-rr-fodti').val(data.rr_fodti);
                $('#edit-suhu-fodti').val(data.suhu_fodti);
                $('#edit-sat-o2-fodti').val(data.sat_o2_fodti);
                $('#edit-kategori-fodti').val(data.kategori_fodti);
                $('#edit-skala-fodti').val(data.skala_fodti);
                $('#edit-resiko-fodti').val(data.resiko_fodti);
                $('#edit-kesadaran-fodti').val(data.kesadaran_fodti);
                $('#edit-gcs-e-fodti').val(data.gcs_e_fodti);
                $('#edit-gcs-m-fodti').val(data.gcs_m_fodti);
                $('#edit-gcs-v-fodti').val(data.gcs_v_fodti);
                $('#edit-total-gcs-fodti').val(data.total_gcs_fodti);
                $('#edit-pupil-kanan-fodti').val(data.pupil_kanan_fodti);
                $('#edit-pupil-kiri-fodti').val(data.pupil_kiri_fodti);
                $('#edit-pemeriksaan-fodti').val(data.pemeriksaan_fodti);
                $('#edit-jam-2-fodti').val(data.jam_2_fodti);
                $('#edit-implementasi-fodti').val(data.implementasi_fodti);
                data.alhamdulilah_fodti == '1' ? $('#edit-alhamdulilah-fodti').prop('checked', true) : $('#edit-alhamdulilah-fodti').prop('checked', false); 
                data.ttd_fodti == '1' ? $('#edit-ttd-fodti').prop('checked', true) : $('#edit-ttd-fodti').prop('checked', false); 
                $('#edit-perawat-fodti').val(data.perawat_fodti);
                $('#s2id_edit-perawat-fodti a .select2c-chosen').html(data.perawat);     
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })      
    }

    function editFormulirObservasiIGD(obj, id, id_pendaftaran, id_layanan_pendaftaran, bed) {   
        const modal = $('#modal-edit-formulir-observasi-igd');
        $('#update-fodti').children().remove();
        $.ajax({
            type: 'GET',
            url: '<?= base_url("order_operasi/api/Order_operasi/get_formulir_observasi_igd") ?>/id/' +
                id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                // console.log(data);
                $('#update-fodti').empty();
                $('#id-formulir-observasi-igd').val(id);

                function formatTanggalKhusus(waktu) {
                    var el = waktu.split('-');
                    var tahun = el[0];
                    var bulan = el[1];
                    var hari = el[2];
                    return hari + '/' + bulan + '/' + tahun;
                }
                let edit_tanggal_1_fodti = formatTanggalKhusus(data.tanggal_1_fodti);
                $('#edit-tanggal-1-fodti').val(edit_tanggal_1_fodti); 

                let edit_tanggal_2_fodti = formatTanggalKhusus(data.tanggal_2_fodti);
                $('#edit-tanggal-2-fodti').val(edit_tanggal_2_fodti);     

                let cttntndkn = '';
                cttntndkn =
                    `  <button type="button" class="btn btn-secondary waves-effect" onclick="$('#modal-edit-formulir-observasi-igd').modal('hide');"><i class="fas fa-times-circle mr-1"></i>Tutup</button>
                    <button type="button" class="btn btn-info waves-effect" onclick="updateFormulirObservasiIGD(${id_pendaftaran}, ${id_layanan_pendaftaran}, '${bed}')"><i class="fas fa-save mr-1"></i>Update</button>`;

                $('#update-fodti').append(cttntndkn);       
                $('#edit-jam-1-fodti').val(data.jam_1_fodti);  
                data.bismilah_fodti == '1' ? $('#edit-bismilah-fodti').prop('checked', true) : $('#edit-bismilah-fodti').prop('checked', false);               
                $('#edit-td-s-fodti').val(data.td_s_fodti);
                $('#edit-td-d-fodti').val(data.td_d_fodti);
                $('#edit-nadi-fodti').val(data.nadi_fodti);
                $('#edit-rr-fodti').val(data.rr_fodti);
                $('#edit-suhu-fodti').val(data.suhu_fodti);
                $('#edit-sat-o2-fodti').val(data.sat_o2_fodti);
                $('#edit-kategori-fodti').val(data.kategori_fodti);
                $('#edit-skala-fodti').val(data.skala_fodti);
                $('#edit-resiko-fodti').val(data.resiko_fodti);
                $('#edit-kesadaran-fodti').val(data.kesadaran_fodti);
                $('#edit-gcs-e-fodti').val(data.gcs_e_fodti);
                $('#edit-gcs-m-fodti').val(data.gcs_m_fodti);
                $('#edit-gcs-v-fodti').val(data.gcs_v_fodti);
                $('#edit-total-gcs-fodti').val(data.total_gcs_fodti);
                $('#edit-pupil-kanan-fodti').val(data.pupil_kanan_fodti);
                $('#edit-pupil-kiri-fodti').val(data.pupil_kiri_fodti);
                $('#edit-pemeriksaan-fodti').val(data.pemeriksaan_fodti);
                $('#edit-jam-2-fodti').val(data.jam_2_fodti);
                $('#edit-implementasi-fodti').val(data.implementasi_fodti);
                data.alhamdulilah_fodti == '1' ? $('#edit-alhamdulilah-fodti').prop('checked', true) : $('#edit-alhamdulilah-fodti').prop('checked', false); 
                data.ttd_fodti == '1' ? $('#edit-ttd-fodti').prop('checked', true) : $('#edit-ttd-fodti').prop('checked', false); 
                $('#edit-perawat-fodti').val(data.perawat_fodti);
                $('#s2id_edit-perawat-fodti a .select2c-chosen').html(data.perawat);                 
                modal.modal('show');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })
    }

    function updateFormulirObservasiIGD(id_pendaftaran, id_layanan_pendaftaran, bed) {
        // console.log($('#form-edit-formulir-observasi-igd').serialize());
        $.ajax({
            type: 'PUT',
            url: '<?= base_url("order_operasi/api/Order_operasi/update_formulir_observasi_igd") ?>',
            data: $('#form-edit-formulir-observasi-igd').serialize(),
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                if (data.status) {
                    messageEditSuccess();
                    entriFormulirObservasiIGD(id_pendaftaran, id_layanan_pendaftaran, bed);
                } else {
                    messageEditFailed();
                }
                $('#modal-edit-formulir-observasi-igd').modal('hide');
            },
            error: function(e) {
                messageEditFailed();
            }
        });
    }

    if (typeof numberFOIGD === 'undefined') {
        var numberFOIGD = 1;
    }

    function tambahFormulirObservasiIGD() {      
        if ($('#tanggal-1-fodti').val() === '') {
            syams_validation('#tanggal-1-fodti', 'Tanggal harus diisi.');
            return false;
        } else {
            syams_validation_remove('#tanggal-1-fodti');
        }

        if ($('#tanggal-2-fodti').val() === '') {
            syams_validation('#tanggal-2-fodti', 'Tanggal harus diisi.');
            return false;
        } else {
            syams_validation_remove('#tanggal-2-fodti');
        }

        if ($('#perawat-fodti').val() === '') {
            syams_validation('#perawat-fodti', 'Nama Perawat Belum dipilih.');
            return false;
        } else {
            syams_validation_remove('#perawat-fodti');
        }

        let html = '';
        let tanggal_1_fodti = $('#tanggal-1-fodti').val();  
        let jam_1_fodti = $('#jam-1-fodti').val();
        let bismilah_fodti = $('#bismilah-fodti').is(':checked');
        let td_s_fodti = $('#td-s-fodti').val();
        let td_d_fodti = $('#td-d-fodti').val();
        let nadi_fodti = $('#nadi-fodti').val();
        let rr_fodti = $('#rr-fodti').val();
        let suhu_fodti = $('#suhu-fodti').val();
        let sat_o2_fodti = $('#sat-o2-fodti').val();
        let kategori_fodti = $('#kategori-fodti').val();
        let skala_fodti = $('#skala-fodti').val();
        let resiko_fodti = $('#resiko-fodti').val();
        let kesadaran_fodti = $('#kesadaran-fodti').val();
        let gcs_e_fodti = $('#gcs-e-fodti').val();
        let gcs_m_fodti = $('#gcs-m-fodti').val();
        let gcs_v_fodti = $('#gcs-v-fodti').val();
        let total_gcs_fodti = $('#total-gcs-fodti').val();
        let pupil_kanan_fodti = $('#pupil-kanan-fodti').val();
        let pupil_kiri_fodti = $('#pupil-kiri-fodti').val();
        let pemeriksaan_fodti = $('#pemeriksaan-fodti').val();
        let tanggal_2_fodti = $('#tanggal-2-fodti').val();  
        let jam_2_fodti = $('#jam-2-fodti').val();
        let implementasi_fodti = $('#implementasi-fodti').val();
        let alhamdulilah_fodti = $('#alhamdulilah-fodti').is(':checked');
        let ttd_fodti = $('#ttd-fodti').is(':checked');
        let perawat = $('#s2id_perawat-fodti a .select2c-chosen').html();   
        let perawat_fodti = $('#perawat-fodti').val();
        html = /* html */ `
            <tr class="row-in-${++numberFOIGD}">
                <td class="number-pengkajian" align="center">${numberFOIGD++}</td>
                <td align="center">
                    <input type="hidden" name="tanggal_1_fodti[]" value="${tanggal_1_fodti}">${tanggal_1_fodti}
                </td>
                <td align="center">
                    <input type="hidden" name="jam_1_fodti[]" value="${jam_1_fodti}">${jam_1_fodti}
                </td>
                <td align="center">
                    <input class="mr-1" type="hidden" name="bismilah_fodti[]" value="${bismilah_fodti ? 1 : 0}">${bismilah_fodti ? '&check;':'&#10006;'}
                </td>
                <td align="center">
                    <input class="mr-1" type="hidden" name="alhamdulilah_fodti[]" value="${alhamdulilah_fodti ? 1 : 0}">${alhamdulilah_fodti ? '&check;':'&#10006;'}
                </td>
                <td align="center">
                    <input class="mr-1" type="hidden" name="ttd_fodti[]" value="${ttd_fodti ? 1 : 0}">${ttd_fodti ? '&check;':'&#10006;'}
                </td>

                <td align="center">
                    <input type="hidden" name="perawat_fodti[]" value="${perawat_fodti}">${perawat}
                </td>             
                <td align="center">
                    <?= $this->session->userdata('nama') ?>
                    <input type="hidden" name="user_formulir[]" value="<?= $this->session->userdata("id_translucent") ?>">
                    <input type="hidden" name="formulir_date[]" value="<?= date("Y-m-d H:i:s") ?>">  
                    <input type="hidden" name="td_s_fodti[]" value="${td_s_fodti}">
                    <input type="hidden" name="td_d_fodti[]" value="${td_d_fodti}">
                    <input type="hidden" name="nadi_fodti[]" value="${nadi_fodti}">
                    <input type="hidden" name="rr_fodti[]" value="${rr_fodti}">
                    <input type="hidden" name="suhu_fodti[]" value="${suhu_fodti}">
                    <input type="hidden" name="sat_o2_fodti[]" value="${sat_o2_fodti}">
                    <input type="hidden" name="kategori_fodti[]" value="${kategori_fodti}">
                    <input type="hidden" name="skala_fodti[]" value="${skala_fodti}">
                    <input type="hidden" name="resiko_fodti[]" value="${resiko_fodti}">
                    <input type="hidden" name="kesadaran_fodti[]" value="${kesadaran_fodti}">
                    <input type="hidden" name="gcs_e_fodti[]" value="${gcs_e_fodti}">
                    <input type="hidden" name="gcs_m_fodti[]" value="${gcs_m_fodti}">
                    <input type="hidden" name="gcs_v_fodti[]" value="${gcs_v_fodti}">
                    <input type="hidden" name="total_gcs_fodti[]" value="${total_gcs_fodti}">
                    <input type="hidden" name="pupil_kanan_fodti[]" value="${pupil_kanan_fodti}">
                    <input type="hidden" name="pupil_kiri_fodti[]" value="${pupil_kiri_fodti}">
                    <input type="hidden" name="pemeriksaan_fodti[]" value="${pemeriksaan_fodti}">
                    <input type="hidden" name="tanggal_2_fodti[]" value="${tanggal_2_fodti}">
                    <input type="hidden" name="jam_2_fodti[]" value="${jam_2_fodti}">
                    <input type="hidden" name="implementasi_fodti[]" value="${implementasi_fodti}">                                   
                </td>
                <td align="center">
                    <button type="button" class="btn btn-secondary btn-xxs" onclick="removeList(this)"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
        `;
        $('#tabel-fodti .body-table').append(html);
    }

    function hapusFormulirObservasiIGD(obj, id) {
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
                            url: '<?= base_url("order_operasi/api/Order_operasi/hapus_formulir_observasi_IGD") ?>/' +
                                id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                if (data.status) {
                                    messageCustom(data.message, 'Success');
                                    removeList(obj);
                                } else {
                                    customAlert('Hapus Formulir Observasi IGD', data
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
