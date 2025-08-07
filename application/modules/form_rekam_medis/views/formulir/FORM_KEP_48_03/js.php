<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"> -->

<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
  .nurse-icon {
    animation: bounce 1.5s infinite;
    color:rgb(84, 73, 234);
    font-size: 30px;
  }

  @keyframes bounce {
    0%, 100% {
      transform: translateY(0);
    }
    50% {
      transform: translateY(-6px);
    }
  }
</style> -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
  .nurse-icon {
    animation: bounce 1.5s infinite;
    font-size: 30px;
    margin: 0 5px;
  }

  .nurse-icon.female {
    color: hotpink;
  }

  .nurse-icon.male {
    color: dodgerblue;
  }

  @keyframes bounce {
    0%, 100% {
      transform: translateY(0);
    }
    50% {
      transform: translateY(-6px);
    }
  }
</style>


<script>
    var nomer = 1;
    $(function() {

        nomer++;

        // PKN
        function showPengawasanKhususNeonatus(num) {
            let html = bukaLebar('FORM PENGAWASAN KHUSUS NEONATUS 𖣫 ', num);
            html += /* html */ `
                <div class="from-group">                   
                </div>
                <hr>
                <table class="table table-sm table-striped table-bordered">  
                    <tr>
                        <td>
                            <b>Bb &nbsp;&nbsp; : &nbsp;&nbsp;</b><input type="text" name="bb_pkn"id="bb-pkn" class="custom-form clear-input d-inline-block col-lg-5" placeholder="B badan">
                        </td> 
                        <td>
                            <b>Lp &nbsp;&nbsp; : &nbsp;&nbsp;</b><input type="text" name="lp_pkn"id="lp-pkn" class="custom-form clear-input d-inline-block col-lg-5" placeholder="L pinggang">  
                        </td> 
                    </tr>
                </table>
                <table class="table table-sm table-striped table-bordered" style="margin-top: -15px" id="form-pkn">
                    <thead>
                        
                        <tr>
                            <td colspan="10"><b>Obvervasi</b></td>                            
                        </tr>                      
                        <tr>
                            <th class="center">Tanggal</th>
                            <th class="center">Jam</th>
                            <th class="center">Kesadaran</th>
                            <th class="center">Pasien</th>
                            <th class="center">Inkubator</th>
                            <th class="center">Nadi</th>
                            <th class="center">Rr</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="10" class="bold text-uppercase"></td>
                        </tr>
                        <tr>
                            <td class="center"><input type="text" name="tgl_pkn" id="tgl-pkn"class="custom-form clear-input d-inline-block col-lg-12"></td>
                            <td class="center"><input type="text" name="jam_pkn" id="jam-pkn"class="custom-form clear-input d-inline-block col-lg-8"></td>
                            <td class="center"><input type="text" name="kesadaran_pkn" id="kesadaran-pkn"class="custom-form clear-input d-inline-block col-lg-8"></td>
                            <td class="center"><input type="text" name="pasien_pkn" id="pasien-pkn"class="custom-form clear-input d-inline-block col-lg-8"></td>
                            <td class="center"><input type="text" name="inkubator_pkn" id="inkubator-pkn"class="custom-form clear-input d-inline-block col-lg-8"></td>
                            <td class="center"><input type="text" name="nadi_pkn" id="nadi-pkn"class="custom-form clear-input d-inline-block col-lg-8"></td>
                            <td class="center"><input type="text" name="rr_pkn" id="rr-pkn"class="custom-form clear-input d-inline-block col-lg-8"></td>                           
                        </tr>
                        <tr>
                            <td colspan="10"><b>Ventilasi</b></td>                            
                        </tr>
                        <tr>
                            <th class="center">Modus</th>
                            <th class="center">Peep Cm H20</th>
                            <th class="center">Buble</th>
                            <th class="center">Fio2</th>
                            <th class="center">Sp02</th>
                            <th class="center">Flow</th>
                            <th class="center">Air</th>
                            <th class="center">Suhu</th>
                        </tr>
                        <tr>
                            <td colspan="10" class="bold text-uppercase"></td>
                        </tr>
                        <tr>
                            <td class="center"><input type="text" name="modus_pkn" id="modus-pkn"class="custom-form clear-input d-inline-block col-lg-6"></td>
                            <td class="center"><input type="text" name="peep_pkn" id="peep-pkn"class="custom-form clear-input d-inline-block col-lg-8"></td>
                            <td class="center"><input type="text" name="buble_pkn" id="buble-pkn"class="custom-form clear-input d-inline-block col-lg-8"></td>
                            <td class="center"><input type="text" name="fio2_pkn" id="fio2-pkn"class="custom-form clear-input d-inline-block col-lg-8"></td>
                            <td class="center"><input type="text" name="spo2_pkn" id="spo2-pkn"class="custom-form clear-input d-inline-block col-lg-8"></td>
                            <td class="center"><input type="text" name="flow_pkn" id="flow-pkn"class="custom-form clear-input d-inline-block col-lg-8"></td>
                            <td class="center"><input type="text" name="air_pkn" id="air-pkn"class="custom-form clear-input d-inline-block col-lg-3"></td>
                            <td class="center"><input type="text" name="suhu_pkn" id="suhu-pkn"class="custom-form clear-input d-inline-block col-lg-3"></td>                            
                        </tr>
                        <tr>
                            <td colspan="10"><b>Cairan Masuk</b></td>                         
                        </tr>
                            <tr>
                                <th class="center">Line 1</th>
                                <th class="center">Line 2</th>
                                <th class="center">Plebitis</th>
                                <th class="center">Oral</th>
                            </tr>
                        <tr>
                            <td class="center"><input type="text" name="line1_pkn" id="line1-pkn"class="custom-form clear-input d-inline-block col-lg-6"></td>
                            <td class="center"><input type="text" name="line2_pkn" id="line2-pkn"class="custom-form clear-input d-inline-block col-lg-8"></td>
                            <td class="center"><input type="text" name="plebitis_pkn" id="plebitis-pkn"class="custom-form clear-input d-inline-block col-lg-8"></td>
                            <td class="center"><input type="text" name="oral_pkn" id="oral-pkn"class="custom-form clear-input d-inline-block col-lg-8"></td>
                        </tr>
                        <tr>
                            <td colspan="10"><b>Cairan Keluar</b></td>                         
                        </tr>
                            <tr>
                                <th class="center">Jml</th>
                                <th class="center">Muntah</th>
                                <th class="center">Residu</th>
                                <th class="center">BAK</th>
                                <th class="center">BAB</th>
                                <th class="center">Foto Therapy</th>
                                <th class="center">Obat</th>
                                <th class="center">Perawat</th>
                            </tr>
                        <tr>
                            <td class="center"><input type="text" name="jml_pkn" id="jml-pkn"class="custom-form clear-input d-inline-block col-lg-6"></td>
                            <td class="center"><input type="text" name="muntah_pkn" id="muntah-pkn"class="custom-form clear-input d-inline-block col-lg-8"></td>
                            <td class="center"><input type="text" name="residu_pkn" id="residu-pkn"class="custom-form clear-input d-inline-block col-lg-8"></td>
                            <td class="center"><input type="text" name="bak_pkn" id="bak-pkn"class="custom-form clear-input d-inline-block col-lg-8"></td>
                            <td class="center"><input type="text" name="bab_pkn" id="bab-pkn"class="custom-form clear-input d-inline-block col-lg-8"></td>
                            <td class="center"><input type="text" name="foto_therapy_pkn" id="foto-therapy-pkn"class="custom-form clear-input d-inline-block col-lg-8"></td>
                            <td class="center"><input type="text" name="obat_pkn" id="obat-pkn"class="select2c-input ml-2"></td>
                            <td class="center"><input type="text" name="perawat_pkn" id="perawat-pkn"class="select2c-input ml-2"></td>
                        </tr>
                        <tr>
                            <td colspan="10" style="text-align: center;">
                                <p style="font-weight: bold; color: black;">
                                <i class="fas fa-user-md nurse-icon female"></i>
                                ⇛ HARAP DI PERHATIKAN* 
                                <span style="font-weight: bold; color: red;">
                                    ⇛ SEBELUM *KONFIRMASI* ⇛ KLIK ⇛ 
                                    <i class="fas fa-user-nurse nurse-icon male"></i>
                                    TAMBAH PENGAWASAN KHUSUS NEONATUS ⇛TERLEBIH DAHULU..!!!
                                </span>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="10">
                                <button type="button" title="Tambah Pengawasan Khusus Neonatus" class="btn btn-info" onclick="tambahPengawasanKhususNeonatus()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah Pengawasan Khusus Neonatus</button>
                            </td>
                        </tr>
                    </tbody>
                </table>`;
            html += tutupRapet();
            $('#buka-tutup-pkn').append(html);
        }

        // <i class="fas fa-user-md"></i> <i class="fa-solid fa-user-shakespeare"></i>

        // <tr>
        //     <td colspan="10" style="text-align: middle;">
        //         <p style="font-weight: bold; color: black;"> 🤥⇛ HARAP DI PERHATIKAN* <span style="font-weight: bold; color: red;"> ⇛ SEBELUM *KONFIRMASI* ⇛ KLIK ⇛ 🫠TAMBAH PENGAWASAN KHUSUS NEONATUS ⇛TERLEBIH DAHULU..!!!</span></p>
        //     </td>
        // </tr> 

        // <tr>
        //     <td colspan="10" style="text-align: center;">
        //         <p style="font-weight: bold; color: black;">
        //         <i class="fas fa-user-md nurse-icon"></i> ⇛ HARAP DI PERHATIKAN* 
        //         <span style="font-weight: bold; color: red;">
        //             ⇛ SEBELUM *KONFIRMASI* ⇛ KLIK ⇛ 
        //             <i class="fas fa-user-md nurse-icon"></i> TAMBAH PENGAWASAN KHUSUS NEONATUS ⇛TERLEBIH DAHULU..!!!
        //         </span>
        //         </p>
        //     </td>
        // </tr>
    
        // PKN
        showPengawasanKhususNeonatus(nomer);
            
        // PKN-C Tanggal
        $('#tgl-pkn, #tgl-pkn-edit')
        .datetimepicker({
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

        // PKN-C JAM
        $('#jam-pkn, #jam-pkn-edit')
        .on('click', function() {
            $(this).timepicker({
                format: 'HH:mm',
                showInputs: false,
                showMeridian: false
            });
        })

        // PKN 
        $('#obat-pkn').select2c({
            minimumInputLength: 2,
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/obat_untuk_keperawatan') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term,
                    page) { // page is the one-based page number tracked by Select2

                    return {
                        q: term, //search term
                        page: page // page number
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
                var markup = data.nama;

                return markup;
            },
            formatSelection: function(data) {
                return data.nama;
            }
        });


        // PKN
        $('#obat-pkn-edit').select2c({
            minimumInputLength: 2,
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/obat_untuk_keperawatan') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term,
                    page) { // page is the one-based page number tracked by Select2

                    return {
                        q: term, //search term
                        page: page // page number
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
                var markup = data.nama;

                return markup;
            },
            formatSelection: function(data) {

                return data.nama;

            }

        })

        // PKN  BIDAN OR PERAWAT
        $('#perawat-pkn').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
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

        // PKN  BIDAN OR PERAWAT
        $('#perawat-pkn-edit').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/nadis_auto') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) { // page is the one-based page number tracked by Select2
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


    function removeList(el) {
        var parent = el.parentNode.parentNode;
        parent.parentNode.removeChild(parent);
    }

    function removeListTable(el) {
        var parent = el.parentNode.parentNode.parentNode;
        parent.parentNode.removeChild(parent);
    }

    function lihatFORM_KEP_48_03(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'lihat';
        entriKepPemantauanKhususNeonatus(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function editFORM_KEP_48_03(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'edit';
        entriKepPemantauanKhususNeonatus(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function tambahFORM_KEP_48_03(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'tambah';
        entriKepPemantauanKhususNeonatus(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function entriKepPemantauanKhususNeonatus(id_pendaftaran, id_layanan_pendaftaran, bed, action) {

        $('#btn-simpan').hide();

        var groupAccount = '<?= $this->session->userdata('account_group') ?>';
        var profesi = '<?= $this->session->userdata('profesinadis') ?>';
        if (groupAccount == 'Admin') {
            profesi = 'Perawat';
        }

        if (action !== 'lihat' ) {
            $('#btn-simpan').show();
        } else {
            $('#btn-simpan').hide();
        }

        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_data_entri_pemantauan_khusus_neonatus") ?>/id/' + id_pendaftaran +
                '/id_layanan/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader()
            },
            success: function(data) {

                resetFormEntriPkn();
                $('#ek_id_layanan_pendaftaran').val(id_layanan_pendaftaran);
                $('#ek-id-pendaftaran').val(id_pendaftaran);
                $('#ek-id-bed').val(bed);


                if (data.pasien !== null) {
                    $('#ek_id_pasien').val(data.pasien.id_pasien);
                    $('#ek_pasien_nama').text(data.pasien.nama);
                    $('#ek_pasien_no_rm').text(data.pasien.no_rm);
                    $('#ek_pasien_tanggal_lahir').text((data.pasien.tanggal_lahir !== null ? datefmysql(data
                        .pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) +
                        ')'));
                    $('#ek_pasien_jenis_kelamin').text((data.pasien.kelamin === 'L' ? 'Laki - laki' :
                        'Perempuan'));

                    if (data.pasien.alergi !== null) {
                        $('#ek_riwayat_alergi').val(data.pasien.alergi).attr('readonly', true)
                    };
                    $('#ek_pasien_alamat').text(data.pasien.alamat);
                }
                
                if (typeof data.pengawasan_khusus_neonatus !== 'undefined' || data.pengawasan_khusus_neonatus !== null) {
                    showPengawasanKhususNeonatus(data.pengawasan_khusus_neonatus, id_pendaftaran, id_layanan_pendaftaran, bed);
                } else {
                    $('#tabel-pkn .body-table').empty();
                }

                $('#ek_bed').text(bed);

                $('.ek-logo-pasien-alergi').hide();
                if (data.profil !== null) {
                    if (data.profil.is_alergi == 'Ya') {
                        $('.ek-logo-pasien-alergi').show();
                    }
                }

                $('#modal_pemantauan_khusus_neonatus').modal('show');
            },
            complete: function() {
                hideLoader()
            },
            error: function(e) {
                accessFailed(e.status);
            },
        });
    }

    function resetFormEntriPkn() {
        $('#form_entri_pemantauan_khusus_neonatus')[0].reset();
        $('#s2id_obat-pkn a .select2c-chosen').empty();
        $('#s2id_obat-pkn-edit a .select2c-chosen').empty();
        $('#s2id_perawat-pkn a .select2c-chosen').empty();
        $('#s2id_perawat-pkn-edit a .select2c-chosen').empty();
        $('#tgl-pkn').val('');
        $('#tgl-pkn-edit').val('');
        setTimeout(() => {
            $('#bb-pkn, #lp-pkn, #tgl-pkn, #jam-pkn, #kesadaran-pkn, #pasien-pkn, #inkubator-pkn, #nadi-pkn, #rr-pkn, #modus-pkn, #peep-pkn, #buble-pkn,#fio2-pkn, #spo2-pkn, #flow-pkn, #air-pkn, #suhu-pkn, #line1-pkn, #line2-pkn, #plebitis-pkn, #oral-pkn, #jml-pkn, #muntah-pkn, #residu-pkn, #bak-pkn, #bab-pkn, #foto-therapy-pkn')
                .val('');
            $('#form-pkn').find('input').each(function() {
                if ($(this).is(':checked')) {
                    $(this).prop('checked', false);
                }
            })
        }, 100)
    }

    function konfirmasiSimpanPemantauanKhususNeonatus() {
        if ($('#tgl-pkn').val() === '') {
            syams_validation('#tgl-pkn', 'Tanggal harus diisi.');
            return false;
        } else {
            syams_validation_remove('#tgl-pkn');
        }
        swal.fire({
            title: 'Simpan Entri Keperawatan',
            text: "Apakah anda yakin akan menyimpan Form Pengawasan Khusus Neonatus?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-fw fa-save mr-1"></i>Simpan',
            cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                simpanPemantauanKhususNeonatus();
            }
        }) 
    }

    function simpanPemantauanKhususNeonatus() {
        $.ajax({
            type: 'POST',
            url: '<?= base_url("pelayanan/api/pelayanan/simpan_pemantauan_khusus_neonatus") ?>',
            data: $('#form_entri_pemantauan_khusus_neonatus').serialize(),
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
                        $('#modal_pemantauan_khusus_neonatus').modal('hide');
                        showListForm($('#ek-id-pendaftaran').val(), $('#ek_id_layanan_pendaftaran').val(), $('#ek_id_pasien').val());
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

    function editPengawasanKhususNeonatus(obj, id, id_pendaftaran, id_layanan_pendaftaran, bed) {
        const modal = $('#modal-edit-pengawasan-khusus-neonatus');
        $('#update-pkn').children().remove();
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_pengawasan_khusus_neonatus") ?>/id/' +
                id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#update-pkn').empty();
                $('#id-pengawasan-khusus-neonatus').val(id);
                let cttntndkn = '';
                cttntndkn =
                    `  <button type="button" class="btn btn-secondary waves-effect" onclick="$('#modal-edit-pengawasan-khusus-neonatus').modal('hide');"><i class="fas fa-times-circle mr-1"></i>Tutup</button>
					<button type="button" class="btn btn-info waves-effect" onclick="updatePengawasanKhususNeonatus(${id_pendaftaran}, ${id_layanan_pendaftaran}, '${bed}')"><i class="fas fa-save mr-1"></i>Update</button>`;
                $('#update-pkn').append(cttntndkn);
                $('#bb-pkn-edit').val(data.bb_pkn);
                $('#lp-pkn-edit').val(data.lp_pkn);
                $('#tgl-pkn-edit').val(data.tgl_pkn);
                $('#jam-pkn-edit').val(data.jam_pkn);
                $('#kesadaran-pkn-edit').val(data.kesadaran_pkn);
                $('#pasien-pkn-edit').val(data.pasien_pkn);
                $('#inkubator-pkn-edit').val(data.inkubator_pkn);
                $('#nadi-pkn-edit').val(data.nadi_pkn);
                $('#rr-pkn-edit').val(data.rr_pkn);
                $('#modus-pkn-edit').val(data.modus_pkn);
                $('#peep-pkn-edit').val(data.peep_pkn);
                $('#buble-pkn-edit').val(data.buble_pkn);
                $('#fio2-pkn-edit').val(data.fio2_pkn);
                $('#spo2-pkn-edit').val(data.spo2_pkn);
                $('#flow-pkn-edit').val(data.flow_pkn);
                $('#air-pkn-edit').val(data.air_pkn);
                $('#suhu-pkn-edit').val(data.suhu_pkn);
                $('#line1-pkn-edit').val(data.line1_pkn);
                $('#line2-pkn-edit').val(data.line2_pkn);
                $('#plebitis-pkn-edit').val(data.plebitis_pkn);
                $('#oral-pkn-edit').val(data.oral_pkn);
                $('#jml-pkn-edit').val(data.jml_pkn);
                $('#muntah-pkn-edit').val(data.muntah_pkn);
                $('#residu-pkn-edit').val(data.residu_pkn);
                $('#bak-pkn-edit').val(data.bak_pkn);
                $('#bab-pkn-edit').val(data.bab_pkn);
                $('#foto-therapy-pkn-edit').val(data.foto_therapy_pkn);
                $('#obat-pkn-edit').val(data.obat_pkn);
                $('#s2id_obat-pkn-edit a .select2c-chosen').html(data.nama_obat);
                $('#perawat-pkn-edit').val(data.perawat_pkn);
                $('#s2id_perawat-pkn-edit a .select2c-chosen').html(data.nama_perawat);
                modal.modal('show');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })
    }

    function showPengawasanKhususNeonatus(data, id_pendaftaran, id_layanan_pendaftaran, bed) {
        $('#tabel-pkn .body-table').empty();
        if (data !== null) {
            $.each(data, function(i, v) {
                const selOp =

                     '<td align="center"><button type="button" class="btn btn-success btn-xs"onclick="editPengawasanKhususNeonatus(this, ' + v.id + ', ' + id_pendaftaran + ', ' + id_layanan_pendaftaran + ', \'' + bed +
                    '\')"><i class="fas fa-edit" ></i> </button> <button type="button" class="btn btn-danger btn-xs"onclick="hapusPengawasanKhususNeonatus($(this),' + v.id + ')"> <i class="fas fa-trash-alt"></i> </button> </td>';                               
                let html = /* html */ `
                    <tr>
                        <td class="number-terapi" align="center">${(++i)}</td>           
                        <td class="center">${v.tgl_pkn ? datefmysql(v.tgl_pkn) : '-'}</td>
                        <td align="center">${v.jam_pkn || '-'}</td>
                        <td align="center" >${v.bb_pkn || '-'}</td>
                        <td align="center" >${v.lp_pkn || '-'}</td>
                        <td align="center" >${v.kesadaran_pkn || '-'}</td>
                        <td align="center" >${v.pasien_pkn || '-'}</td>
                        <td align="center" >${v.inkubator_pkn || '-'}</td>
                        <td align="center" >${v.nadi_pkn || '-'}</td>
                        <td align="center" >${v.rr_pkn || '-'}</td>
                        <td align="center" >${v.modus_pkn || '-'}</td>
                        <td align="center" >${v.peep_pkn || '-'}</td>
                        <td align="center" >${v.buble_pkn || '-'}</td>
                        <td align="center" >${v.fio2_pkn || '-'}</td>
                        <td align="center" >${v.spo2_pkn || '-'}</td>
                        <td align="center" >${v.flow_pkn || '-'}</td>
                        <td align="center" >${v.air_pkn || '-'}</td>
                        <td align="center" >${v.suhu_pkn || '-'}</td>
                        <td align="center" >${v.line1_pkn || '-'}</td>
                        <td align="center" >${v.line2_pkn || '-'}</td>
                        <td align="center" >${v.plebitis_pkn || '-'}</td>
                        <td align="center" >${v.oral_pkn || '-'}</td>
                        <td align="center" >${v.jml_pkn || '-'}</td>
                        <td align="center" >${v.muntah_pkn || '-'}</td>
                        <td align="center" >${v.residu_pkn || '-'}</td>
                        <td align="center" >${v.bak_pkn || '-'}</td>
                        <td align="center" >${v.bab_pkn || '-'}</td>
                        <td align="center" >${v.foto_therapy_pkn || '-'}</td>
                        <td>${v.nama_obat || '-'}</td>
                        <td>${v.nama_perawat || '-'}</td>
                        <td align="center" >${v.akun_user}</td>
                        ${selOp}
                    </tr>				
                `;
                $('#tabel-pkn .body-table').append(html);
                numberPkn = i;
            })
        }
    }

    function updatePengawasanKhususNeonatus(id_pendaftaran, id_layanan_pendaftaran, bed) {
        $.ajax({
            type: 'PUT',
            url: '<?= base_url("pelayanan/api/pelayanan/update_pengawasan_khusus_neonatus") ?>',
            data: $('#form-edit-pengawasan-khusus-neonatus').serialize(),
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                if (data.status) {
                    messageEditSuccess();
                    entriKepPemantauanKhususNeonatus(id_pendaftaran, id_layanan_pendaftaran, bed);
                } else {
                    messageEditFailed();
                }
                $('#modal-edit-pengawasan-khusus-neonatus').modal('hide');
            },
            error: function(e) {
                messageEditFailed();
            }
        });
    }

    if (typeof numberPkn === 'undefined') {
        var numberPkn = 1;
    }

    function tambahPengawasanKhususNeonatus() {
        if ($('#perawat-pkn').val() === '') {
            syams_validation('#perawat-pkn', 'Nama Perawat belum diisi.');
            return false;
        } else {
            syams_validation_remove('#perawat-pkn');
        }

        if ($('#tgl-pkn').val() === '') {
            syams_validation('#tgl-pkn', 'Tanggal harus diisi.');
            return false;
        } else {
            syams_validation_remove('#tgl-pkn');
        }

        let html = '';
        let bb_pkn = $('#bb-pkn').val();
        let lp_pkn = $('#lp-pkn').val();
        let tgl_pkn = $('#tgl-pkn').val();
        let jam_pkn = $('#jam-pkn').val();
        let kesadaran_pkn = $('#kesadaran-pkn').val();
        let pasien_pkn = $('#pasien-pkn').val();
        let inkubator_pkn = $('#inkubator-pkn').val();
        let nadi_pkn = $('#nadi-pkn').val();
        let rr_pkn = $('#rr-pkn').val();
        let modus_pkn = $('#modus-pkn').val();
        let peep_pkn = $('#peep-pkn').val();
        let buble_pkn = $('#buble-pkn').val();
        let fio2_pkn = $('#fio2-pkn').val();
        let spo2_pkn = $('#spo2-pkn').val();
        let flow_pkn = $('#flow-pkn').val();
        let air_pkn = $('#air-pkn').val();
        let suhu_pkn = $('#suhu-pkn').val();
        let line1_pkn = $('#line1-pkn').val();
        let line2_pkn = $('#line2-pkn').val();
        let plebitis_pkn = $('#plebitis-pkn').val();
        let oral_pkn = $('#oral-pkn').val();
        let jml_pkn = $('#jml-pkn').val();
        let muntah_pkn = $('#muntah-pkn').val();
        let residu_pkn = $('#residu-pkn').val();
        let bak_pkn = $('#bak-pkn').val();
        let bab_pkn = $('#bab-pkn').val();
        let foto_therapy_pkn = $('#foto-therapy-pkn').val();
        let nama_obat = $('#s2id_obat-pkn a .select2c-chosen').html();
        let obat_pkn = $('#obat-pkn').val();
        let nama_perawat = $('#s2id_perawat-pkn a .select2c-chosen').html();
        let perawat_pkn = $('#perawat-pkn').val();
        html = /* html */ `
            <tr class="row-in-${++numberPkn}">
                <td class="number-pengkajian" align="center">${numberPkn}</td>
                <td align="center">
                	<input type="hidden" name="tgl_pkn[]" value="${tgl_pkn}">${tgl_pkn}
                </td>
                <td align="center">
                	<input type="hidden" name="jam_pkn[]" value="${jam_pkn}">${jam_pkn}
                </td>
                <td align="center">
                	<input type="hidden" name="bb_pkn[]" value="${bb_pkn}">${bb_pkn}
                </td>
                <td align="center">
                	<input type="hidden" name="lp_pkn[]" value="${lp_pkn}">${lp_pkn}
                </td>
                <td align="center">
                	<input type="hidden" name="kesadaran_pkn[]" value="${kesadaran_pkn}">${kesadaran_pkn}
                </td>
                <td align="center">
                	<input type="hidden" name="pasien_pkn[]" value="${pasien_pkn}">${pasien_pkn}
                </td>
                <td align="center">
                	<input type="hidden" name="inkubator_pkn[]" value="${inkubator_pkn}">${inkubator_pkn}
                </td>
                <td align="center">
                	<input type="hidden" name="nadi_pkn[]" value="${nadi_pkn}">${nadi_pkn}
                </td>
                <td align="center">
                	<input type="hidden" name="rr_pkn[]" value="${rr_pkn}">${rr_pkn}
                </td>
                <td align="center">
                	<input type="hidden" name="modus_pkn[]" value="${modus_pkn}">${modus_pkn}
                </td>
                <td align="center">
                	<input type="hidden" name="peep_pkn[]" value="${peep_pkn}">${peep_pkn}
                </td>
                <td align="center">
                	<input type="hidden" name="buble_pkn[]" value="${buble_pkn}">${buble_pkn}
                </td>
                <td align="center">
                	<input type="hidden" name="fio2_pkn[]" value="${fio2_pkn}">${fio2_pkn}
                </td>
                <td align="center">
                	<input type="hidden" name="spo2_pkn[]" value="${spo2_pkn}">${spo2_pkn}
                </td>
                <td align="center">
                	<input type="hidden" name="flow_pkn[]" value="${flow_pkn}">${flow_pkn}
                </td>
                <td align="center">
                	<input type="hidden" name="air_pkn[]" value="${air_pkn}">${air_pkn}
                </td>
                <td align="center">
                	<input type="hidden" name="suhu_pkn[]" value="${suhu_pkn}">${suhu_pkn}
                </td>

                <td align="center">
                	<input type="hidden" name="line1_pkn[]" value="${line1_pkn}">${line1_pkn}
                </td>
                <td align="center">
                	<input type="hidden" name="line2_pkn[]" value="${line2_pkn}">${line2_pkn}
                </td>
                <td align="center">
                	<input type="hidden" name="plebitis_pkn[]" value="${plebitis_pkn}">${plebitis_pkn}
                </td>
                <td align="center">
                	<input type="hidden" name="oral_pkn[]" value="${oral_pkn}">${oral_pkn}
                </td>
                <td align="center">
                	<input type="hidden" name="jml_pkn[]" value="${jml_pkn}">${jml_pkn}
                </td>
                <td align="center">
                	<input type="hidden" name="muntah_pkn[]" value="${muntah_pkn}">${muntah_pkn}
                </td>
                <td align="center">
                	<input type="hidden" name="residu_pkn[]" value="${residu_pkn}">${residu_pkn}
                </td>
                <td align="center">
                	<input type="hidden" name="bak_pkn[]" value="${bak_pkn}">${bak_pkn}
                </td>
                <td align="center">
                	<input type="hidden" name="bab_pkn[]" value="${bab_pkn}">${bab_pkn}
                </td>
                <td align="center">
                	<input type="hidden" name="foto_therapy_pkn[]" value="${foto_therapy_pkn}">${foto_therapy_pkn}
                </td>
                <td align="center">
                	<input type="hidden" name="obat_pkn[]" value="${obat_pkn}">${nama_obat}
                </td>
                <td align="center">
                	<input type="hidden" name="perawat_pkn[]" value="${perawat_pkn}">${nama_perawat}
                </td>
              
                <td align="center">
					<?= $this->session->userdata('nama') ?>
					<input type="hidden" name="user_pengkajian[]" value="<?= $this->session->userdata("id_translucent") ?>">
					<input type="hidden" name="pencegahan_date_pkn[]" value="<?= date("Y-m-d H:i:s") ?>">					
                </td>
                <td align="center">
                    <button type="button" id="pepel" class="btn btn-secondary btn-xxs" onclick="(() => {$(this).parent().parent().next().addBack().remove(); numberPkn--;})()"><i class="fas fa-trash-alt"></i></button>
                </td>              
            </tr>       
        `;
        $('#tabel-pkn .body-table').append(html);
    }

    function hapusPengawasanKhususNeonatus(obj, id) {
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
                            url: '<?= base_url("pelayanan/api/pelayanan/hapus_pengawasan_khusus_neonatus") ?>/' +
                                id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                if (data.status) {
                                    messageCustom(data.message, 'Success');
                                    // obj.parent().parent().next().addBack().remove();
                                    obj.parent().parent().remove();

                                    
                                } else {
                                    customAlert('Hapus Pengawasan Khusus Neonatus', data
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