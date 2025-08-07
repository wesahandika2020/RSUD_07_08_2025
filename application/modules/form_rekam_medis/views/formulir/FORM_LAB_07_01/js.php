<!-- // CPT DK DCT-->
<script>
    var nomer = 1;
        nomer++;
  
    $('#btn-expand-all-catatan-pelaksanaan-transfusi').click(function() {
        $('.multi-collapse').addClass('show');
    });

    $('#btn-collapse-all-catatan-pelaksanaan-transfusi').click(function() {
        $('.multi-collapse').removeClass('show');
    });
    
    $("#wizard_catatan_pelaksanaan_tranfusi").bwizard();

    // TANGGAL
    $("#tanggal-tranfusi-cpt").datepicker({
        format: 'dd/mm/yyyy',
    }).on('changeDate', function() {
        $(this).datepicker('hide');
    });

    // DOKTER
    $('#dokter-cpt').select2c({
        ajax: {
            url: "<?= base_url('masterdata/api/masterdata_auto/dokter_auto') ?>",
            dataType: 'json',
            quietMillis: 100,
            data: function (term, page) { // page is the one-based page number tracked by Select2
                return {
                    q: term, //search term
                    page: page, // page number
                };
            },
            results: function (data, page) {
                var more = (page * 20) < data.total; // whether or not there are more results available

                // notice we return the value of more so Select2 knows if more results can be loaded
                return {results: data.data, more: more};
            }
        },
        formatResult: function(data){
            var markup = '<b>' + data.nama + '</b><br/><i>' + data.spesialisasi + '</i>';
            return markup;
        },
        formatSelection: function(data){
            return data.nama;
        }
    });	


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

  
    function lihatFORM_LAB_07_01(data) {
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

        resetFormCatatanPelaksanaanTranfusi();
        entriCatatanPelaksanaanTransfusi(layanan.id_pendaftaran, layanan.id,  bed, action);
        setTimeout(function() {
            $('#hapus-catatan-kantung-ck').hide();
        }, 1500);

        setTimeout(function() {
            $('#edit-catatan-kantung-ck').hide();
        }, 1500);


    }

    function editFORM_LAB_07_01(data) {
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

        resetFormCatatanPelaksanaanTranfusi();
        entriCatatanPelaksanaanTransfusi(layanan.id_pendaftaran, layanan.id,  bed, action);
        setTimeout(function() {
            $('#lihat-catatan-kantung-ck').hide();
        }, 1500);
    }

    function tambahFORM_LAB_07_01(data) {
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


        // resetFormCatatanPelaksanaanTranfusi();
        entriCatatanPelaksanaanTransfusi(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function entriCatatanPelaksanaanTransfusi(id_pendaftaran, id_layanan_pendaftaran,  bed, action) {
        $('#wizard_catatan_pelaksanaan_tranfusi').bwizard('show', '0');
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
            url: '<?= base_url("order_laboratorium/api/order_laboratorium/get_data_catatan_pelaksanaan_tranfusi") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function (data) {

                // console.log(data);

                // $('#cpt-waktu-search').change(function() {
                //     getListDataCatatanKantung($('#id-pendaftaran-cpt').val(), bed, 1);
                // });

                resetFormCatatanPelaksanaanTranfusi(); 
                getListDataCatatanKantungT(id_pendaftaran, bed, 1);

                $('#id_data_catatan_tranfusi').val(data.data_catatan);
                // $('#id_data_catatan_tranfusi').val(data.id_data_catatan_tranfusi);
                // $('#id_data_catatan_tranfusi').val(data.data_catatan.data.id_data_catatan_tranfusi);
                // $('#id_data_catatan_tranfusi').val(id_data_catatan_tranfusi);

                $('#id-layanan-pendaftaran-cpt').val(id_layanan_pendaftaran);
                $('#id-pendaftaran-cpt').val(id_pendaftaran);
                if (data.pasien !== null) {
                    $('#id-pasien-cpt').val(data.pasien.id_pasien);
                    $('#nama-pasien-cpt').text(data.pasien.nama);
                    $('#no-cpt').text(data.pasien.no_rm);
                    $('#tanggal-lahir-cpt').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
                    $('#jenis-kelamin-cpt').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));

                }

                $('#data-kantung').one('click', function() {
                    $("#cpt-tanggal-pengkajian, #edit-cpt-tanggal-pengkajian").datepicker({
                        format: 'dd/mm/yyyy',
                    }).on('changeDate', function() {
                        $(this).datepicker('hide');
                    });
                })

                // Jam
                $('#data-kantung').one('click', function() {
                    $('#jam-keluar-utd, #edit-jam-keluar-utd, #jam-ruangan-cpt, #edit-jam-ruangan-cpt, #waktu-mulai-cpt, #edit-waktu-mulai-cpt, #waktu-selesai-cpt, #edit-waktu-selesai-cpt, #jam-ob-1, #edit-jam-ob-1, #jam-ob-2, #edit-jam-ob-2, #jam-ob-3, #edit-jam-ob-3, #jam-ob-4, #edit-jam-ob-4')
                    .on('click', function() {
                        $(this).timepicker({
                            format: 'HH:mm',
                            showInputs: false,
                            showMeridian: false
                        });
                    })
                })    
                
                // Perawat
                $('#data-kantung').one('click', function() {
                    $('#petugas-cpt-1, #edit-petugas-cpt-1, #petugas-cpt-2, #edit-petugas-cpt-2, #petugas-cpt-3, #edit-petugas-cpt-3, #petugas-cpt-4, #edit-petugas-cpt-4, #petugas-tambah-I, #edit-petugas-tambah-I, #petugas-tambah-II, #edit-petugas-tambah-II')
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
                
                if (typeof data.catatan_kantung !== 'undefined' && data.catatan_kantung !== null) {
                    showKkantung(data.catatan_kantung, id_pendaftaran, id_layanan_pendaftaran, bed, action);
                    showkantung(nomer);
                } else {
                    $('#tabel-dk .body-table').empty();
                }                             
                $('#bed-cpt').text(bed);
                $('#modal_catatan_pelaksanaan_tranfusi').modal('show');        
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })
    }  

    function showkantung(num) {
        let html = bukaLebar('Form kantung ', num);
        html += /* html */ `
            <div class="from-group"></div>           
            <hr>
            <table class="table table-sm table-striped table-bordered" style="margin-top: -15px" id="form-dk">              
                <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                    <tr>
                        <td width="10%"><b>Nomor Formulir Permintaan Darah</b></td>
                        <td width="1%" class="center"><b>:</b></td>
                        <td width="50%">
                            <input type="text" name="nomor_for_cpt" id="nomor-for-cpt"class="custom-form clear-input d-inline-block col-lg-4">
                        </td>                 
                    </tr>                                    
                </table>
                    
                <div class="row">
                    <div class="col-lg-6">
                        <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                            <tr>
                                <td width="20%" class="bold">Nomor Stok</td>
                                <td width="1%" class="bold">:</td>
                                <td width="50%">
                                    <input type="text" name="nomor_stok_cpt" id="nomor-stok-cpt"class="custom-form clear-input d-inline-block col-lg-4">
                                </td>
                            </tr>
                            <tr>
                                <td width="20%" class="bold">Asal Kantong</td>
                                <td width="1%" class="bold">:</td>
                                <td width="50%">
                                    <input type="checkbox" name="asal_kantong_cpt_1"id="asal-kantong-cpt-1" value="1"class="mr-1"> PMI DKI
                                    <input type="checkbox" name="asal_kantong_cpt_2"id="asal-kantong-cpt-2" value="2"class="mr-1 ml-4"> Non DKI
                                </td>
                            </tr>
                            <tr>
                                <td width="20%" class="bold">Hasil crossmatch</td>
                                <td width="1%" class="bold">:</td>
                                <td width="50%">
                                    <input type="checkbox" name="hasil_cross_cpt_1" id="hasil-cross-cpt-1" value="1"class="mr-1"> Cocok 
                                    <input type="checkbox" name="hasil_cross_cpt_2" id="hasil-cross-cpt-2" value="2"class="mr-1 ml-4"> Tidak cocok
                                    <input type="checkbox" name="hasil_cross_cpt_3" id="hasil-cross-cpt-3" value="3"class="mr-1 ml-4"> Tanpa cross
                                    <input type="checkbox" name="hasil_cross_cpt_4" id="hasil-cross-cpt-4" value="4"class="mr-1 ml-4"> Emergency
                                </td>
                            </tr>
                            <tr>
                                <td width="20%"><b>Tanggal Kedaluarsa</b></td>
                                <td width="1%" class="center"><b>:</b></td>
                                <td width="50%">
                                    <input type="text" name="cpt_tanggal_pengkajian"id="cpt-tanggal-pengkajian" class="custom-form clear-input d-inline-block col-lg-3"placeholder="dd/mm/yy">
                                </td>                 
                            </tr>
                            <tr>
                                <td width="20%" class="bold">Jenis Komponen</td>
                                <td width="1%" class="bold">:</td>
                                <td width="50%">
                                    <input type="checkbox" name="jk_cpt_1" id="jk-cpt-1" value="1"class="mr-1"> WB 
                                    <input type="checkbox" name="jk_cpt_2" id="jk-cpt-2" value="2"class="mr-1 ml-4"> PRC
                                    <input type="checkbox" name="jk_cpt_3" id="jk-cpt-3" value="3"class="mr-1 ml-4"> TC
                                    <input type="checkbox" name="jk_cpt_4" id="jk-cpt-4" value="4"class="mr-1 ml-4"> FFP
                                    <input type="checkbox" name="jk_cpt_5" id="jk-cpt-5" value="5"class="mr-1 ml-4"> AHF
                                    <input type="checkbox" name="jk_cpt_6" id="jk-cpt-6" value="6"class="mr-1 ml-4"> WE
                                </td>
                            </tr>
                            <tr>
                                <td width="20%" class="bold">Gol Darah</td>
                                <td width="1%" class="bold">:</td>
                                <td width="50%">
                                    <input type="checkbox" name="golongan_cpt_1" id="golongan-cpt-1" value="1"class="mr-1"> A 
                                    <input type="checkbox" name="golongan_cpt_2" id="golongan-cpt-2" value="2"class="mr-1 ml-4"> B
                                    <input type="checkbox" name="golongan_cpt_3" id="golongan-cpt-3" value="3"class="mr-1 ml-4"> AB
                                    <input type="checkbox" name="golongan_cpt_4" id="golongan-cpt-4" value="4"class="mr-1 ml-4"> O
                                </td>
                            </tr>
                            <tr>
                                <td width="20%" class="bold">Rhesus</td>
                                <td width="1%" class="bold">:</td>
                                <td width="50%">
                                    <input type="checkbox" name="rh_cpt_1 "id="rh-cpt-1" value="1"class="mr-1"> Positif
                                    <input type="checkbox" name="rh_cpt_2 "id="rh-cpt-2" value="2"class="mr-1 ml-4"> Negatif
                                </td>
                            </tr>
                            <tr>
                                <td width="20%" class="bold">Volume</td>
                                <td width="1%" class="bold">:</td>
                                <td width="50%">
                                    <input type="text" name="volume_cpt" id="volume-cpt"class="custom-form clear-input d-inline-block col-lg-2"> ml
                                </td>
                            </tr>                            
                            <tr>
                                <td width="20%" class="bold">Petugas I</td>
                                <td width="1%" class="bold">:</td>
                                <td width="50%">
                                    <input type="text" name="petugas_tambah_I" id="petugas-tambah-I" class="select2c-input ml-2">
                                </td>
                            </tr>                            
                        </table>
                    </div>

                    <div class="col-lg-6">
                        <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                            <tr>
                                <td width="20%" class="bold">Jam Keluar UTD</td>
                                <td width="1%" class="bold">:</td>
                                <td width="50%">
                                    <input type="text" name="jam_keluar_utd" id="jam-keluar-utd"class="custom-form clear-input d-inline-block col-lg-4"placeholder="HH/mm">
                                </td>
                            </tr> 
                            <tr>
                                <td width="20%" class="bold">Identifikasi Kantung</td>
                                <td width="1%" class="bold">:</td>
                                <td width="50%">
                                    <input type="checkbox" name="identifikasi_kantung_cpt_1" id="identifikasi-kantung-cpt-1" value="1"class="mr-1"> Sesuai 
                                    <input type="checkbox" name="identifikasi_kantung_cpt_2" id="identifikasi-kantung-cpt-2" value="2"class="mr-1 ml-4"> Tidak
                                </td>
                            </tr> 
                            <tr>
                                <td width="20%" class="bold">Identifikasi Pasien</td>
                                <td width="1%" class="bold">:</td>
                                <td width="50%">
                                    <input type="checkbox" name="identifikasi_pasien_cpt_1" id="identifikasi-pasien-cpt-1" value="1"class="mr-1"> Sesuai 
                                    <input type="checkbox" name="identifikasi_pasien_cpt_2" id="identifikasi-pasien-cpt-2" value="2"class="mr-1 ml-4"> Tidak
                                </td>
                            </tr>
                            <tr>
                                <td width="20%" class="bold">Keadaan Kantung</td>
                                <td width="1%" class="bold">:</td>
                                <td width="50%">
                                    <input type="checkbox" name="keadaan_kantung_cpt_1" id="keadaan-kantung-cpt-1" value="1"class="mr-1"> Baik 
                                    <input type="checkbox" name="keadaan_kantung_cpt_2" id="keadaan-kantung-cpt-2" value="2"class="mr-1 ml-4"> Tidak
                                </td>
                            </tr>
                            <tr>
                                <td width="20%" class="bold">Jam diterima Ruangan</td>
                                <td width="1%" class="bold">:</td>
                                <td width="50%">
                                    <input type="text" name="jam_ruangan_cpt" id="jam-ruangan-cpt"class="custom-form clear-input d-inline-block col-lg-4"placeholder="HH/mm">
                                </td>
                            </tr>
                            <tr>
                                <td width="20%" class="bold">Waktu Mulai</td>
                                <td width="1%" class="bold">:</td>
                                <td width="50%">
                                    <input type="text" name="waktu_mulai_cpt" id="waktu-mulai-cpt"class="custom-form clear-input d-inline-block col-lg-4"placeholder="HH/mm">
                                </td>
                            </tr>
                            <tr>
                                <td width="20%" class="bold">Waktu Selesai</td>
                                <td width="1%" class="bold">:</td>
                                <td width="50%">
                                    <input type="text" name="waktu_selesai_cpt" id="waktu-selesai-cpt"class="custom-form clear-input d-inline-block col-lg-4"placeholder="HH/mm">
                                </td>
                            </tr>
                            <tr>
                                <td width="20%"></td>
                                <td width="1%"></td>
                                <td width="50%"></td>
                            </tr>

                            <tr>
                                <td width="20%" class="bold">Petugas II</td>
                                <td width="1%" class="bold">:</td>
                                <td width="50%">
                                    <input type="text" name="petugas_tambah_II" id="petugas-tambah-II" class="select2c-input ml-2">
                                </td>
                            </tr> 
                        </table>
                        <br>
                        <br>
                    </div>                                               
                </div>  

                <div class="table-responsive">  
                    <table class="table table-no-border table-sm table-striped"style="margin-top:-15px">
                        <tr>
                            <td width="100%">
                                <table class="table table-sm table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="center" colspan="6"><b></b></th>
                                        </tr>
                                        <tr>                                    
                                            <th width="10%" class="center"><b>Waktu</b></th>
                                            <th width="20%" class="center"><b>Saat tranfusi dimulai</b></th>
                                            <th width="20%" class="center"><b>15 menit setelah tranfusi dimulai</b></th>
                                            <th width="20%" class="center"><b>Saat selesai tranfusi </b></th>
                                            <th width="20%"  class="center"><b>4 jam Ranap atau 1 jam Rajal setelah selesai tranfusi(**)</b></th>               
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <tr>                                   
                                            <td class="center"><b>Jam observasi</td>
                                            <td class="center">
                                                <input type="text" name="jam_ob_1" id="jam-ob-1"class="custom-form clear-input d-inline-block col-lg-12"placeholder="HH/mm">
                                            </td>
                                            <td class="center">
                                                <input type="text" name="jam_ob_2" id="jam-ob-2"class="custom-form clear-input d-inline-block col-lg-12"placeholder="HH/mm">
                                            </td>
                                            <td class="center">
                                                <input type="text" name="jam_ob_3" id="jam-ob-3"class="custom-form clear-input d-inline-block col-lg-12"placeholder="HH/mm"
                                            </td>
                                            <td class="center">
                                                <input type="text" name="jam_ob_4" id="jam-ob-4"class="custom-form clear-input d-inline-block col-lg-12"placeholder="HH/mm">
                                            </td>
                                        </tr>

                                        <tr>                                     
                                            <td class="center"><b>Tensi</td>
                                            <td class="center">
                                                <input type="text" name="tensi_cpt_1" id="tensi-cpt-1"class="custom-form clear-input d-inline-block col-lg-12">
                                            </td>
                                            <td class="center">
                                                <input type="text" name="tensi_cpt_2" id="tensi-cpt-2"class="custom-form clear-input d-inline-block col-lg-12">
                                            </td>
                                            <td class="center">
                                                <input type="text" name="tensi_cpt_3" id="tensi-cpt-3"class="custom-form clear-input d-inline-block col-lg-12">
                                            </td>
                                            <td class="center">
                                                <input type="text" name="tensi_cpt_4" id="tensi-cpt-4"class="custom-form clear-input d-inline-block col-lg-12">
                                            </td>
                                        </tr>

                                        <tr>                                     
                                            <td class="center"><b>RR</td>
                                            <td class="center">
                                                <input type="text" name="rr_cpt_1" id="rr-cpt-1"class="custom-form clear-input d-inline-block col-lg-12">
                                            </td>
                                            <td class="center">
                                                <input type="text" name="rr_cpt_2" id="rr-cpt-2"class="custom-form clear-input d-inline-block col-lg-12">
                                            </td>
                                            <td class="center">
                                                <input type="text" name="rr_cpt_3" id="rr-cpt-3"class="custom-form clear-input d-inline-block col-lg-12">
                                            </td>
                                            <td class="center">
                                                <input type="text" name="rr_cpt_4" id="rr-cpt-4"class="custom-form clear-input d-inline-block col-lg-12">
                                            </td>
                                        </tr>

                                        <tr>                                 
                                            <td class="center"><b>Suhu</td>
                                            <td class="center">
                                                <input type="text" name="suhu_cpt_1" id="suhu-cpt-1"class="custom-form clear-input d-inline-block col-lg-12">
                                            </td>
                                            <td class="center">
                                                <input type="text" name="suhu_cpt_2" id="suhu-cpt-2"class="custom-form clear-input d-inline-block col-lg-12">
                                            </td>
                                            <td class="center">
                                                <input type="text" name="suhu_cpt_3" id="suhu-cpt-3"class="custom-form clear-input d-inline-block col-lg-12">
                                            </td>
                                            <td class="center">
                                                <input type="text" name="suhu_cpt_4" id="suhu-cpt-4"class="custom-form clear-input d-inline-block col-lg-12">
                                            </td>
                                        </tr>

                                        <tr>                                     
                                            <td class="center"><b>Nadi</td>
                                            <td class="center">
                                                <input type="text" name="nadi_cpt_1" id="nadi-cpt-1"class="custom-form clear-input d-inline-block col-lg-12">
                                            </td>
                                            <td class="center">
                                                <input type="text" name="nadi_cpt_2" id="nadi-cpt-2"class="custom-form clear-input d-inline-block col-lg-12">
                                            </td>
                                            <td class="center">
                                                <input type="text" name="nadi_cpt_3" id="nadi-cpt-3"class="custom-form clear-input d-inline-block col-lg-12">
                                            </td>
                                            <td class="center">
                                                <input type="text" name="nadi_cpt_4" id="nadi-cpt-4"class="custom-form clear-input d-inline-block col-lg-12">
                                            </td>
                                        </tr>

                                        <tr>                                 
                                            <td class="center"><b>Reaksi Transfusi</td>
                                            <td class="center">
                                                <input type="text" name="reaksi_cpt_1" id="reaksi-cpt-1"class="custom-form clear-input d-inline-block col-lg-12">
                                            </td>
                                            <td class="center">
                                                <input type="text" name="reaksi_cpt_2" id="reaksi-cpt-2"class="custom-form clear-input d-inline-block col-lg-12">
                                            </td>
                                            <td class="center">
                                                <input type="text" name="reaksi_cpt_3" id="reaksi-cpt-3"class="custom-form clear-input d-inline-block col-lg-12">
                                            </td>
                                            <td class="center">
                                                <input type="text" name="reaksi_cpt_4" id="reaksi-cpt-4"class="custom-form clear-input d-inline-block col-lg-12">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="center"> <b>Paraf</td>                                                            
                                            <td class="center">
                                                <input type="text" name="petugas_cpt_1" id="petugas-cpt-1" class="select2c-input ml-2">
                                            </td>
                                            <td class="center">
                                                <input type="text" name="petugas_cpt_2" id="petugas-cpt-2" class="select2c-input ml-2">
                                            </td>
                                            <td class="center">
                                                <input type="text" name="petugas_cpt_3" id="petugas-cpt-3" class="select2c-input ml-2">
                                            </td>
                                            <td class="center">
                                                <input type="text" name="petugas_cpt_4" id="petugas-cpt-4" class="select2c-input ml-2">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="10">
                                                <button type="button" title="Tambah Kantung" class="btn btn-info" onclick="tambahKantung()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah Kantung</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </table>    
                </div>
            </table>`;
        html += tutupRapet();
        $('#buka-tutup-dk').append(html);
    }

    // DK   
    function showKkantung(data, id_pendaftaran, id_layanan_pendaftaran, bed, action) {
        $('#tabel-dk .body-table').empty();
    }


    function konfirmasiSimpanCatatanPelaksanaanTranfusi() {
        var stop = false;
        // if ($('#tanggal-tranfusi-cpt').val() === '') {
        //     syams_validation('#tanggal-tranfusi-cpt', 'Tanggal harus diisi!');
        //     $('#tanggal-tranfusi-cpt').focus();
        //     $('#wizard_catatan_pelaksanaan_tranfusi').bwizard('show', '0');
        //     stop = true;
        // }

        // if ($('#dokter-cpt').val() === '') {
        //     syams_validation('#dokter-cpt', 'Kolom Dokter harus dipilih!');
        //     $('#wizard_catatan_pelaksanaan_tranfusi').bwizard('show', '0');
        //     stop = true;
        // }

        // if ($('#cpt-tanggal-pengkajian').val() === '') {
        //     syams_validation('#cpt-tanggal-pengkajian', 'Tanggal belum diisi!');
        //     $('#cpt-tanggal-pengkajian').focus();
        //     $('#wizard_catatan_pelaksanaan_tranfusi').bwizard('show', '0');
        //     stop = true;
        // }

        // // Mengambil nilai dari elemen dengan ID 'id_data_catatan_tranfusi' dan menyimpannya dalam variabel
        // var id_data_catatan_tranfusi_value = document.getElementById("id_data_catatan_tranfusi").value;

        // // Mengecek nilai yang disimpan dalam variabel
        // console.log("Nilai dari elemen input adalah: " + id_data_catatan_tranfusi_value);

        if (!stop) {
            var id_cpt = $('#id-cpt').val();
            var text;
            var btnTextConfirmCpt;

            if (id_cpt) {
                text = 'Apakah anda yakin ingin mengupdate data ini ?';
                btnTextConfirmCpt = 'Update';
            } else {
                text = 'Apakah anda yakin ingin menyimpan data ini ?';
                btnTextConfirmCpt = 'Simpan';
            }

            swal.fire({
                title: 'Konfirmasi ?',
                html: text,
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: '<i class="fas fa-fw fa-save mr-1"></i>' + btnTextConfirmCpt,
                cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    SimpanCatatanPelaksanaanTranfusi();
                }
            });
        }
    }


    function SimpanCatatanPelaksanaanTranfusi() {
        var id_layanan_pendaftaran_cpt = $('#id-layanan-pendaftaran-cpt').val(); 
        $.ajax({
            type: 'POST',
            url: '<?= base_url("order_laboratorium/api/order_laboratorium/simpan_data_catatan_pelaksanaan_tranfusi") ?>',
            data: $('#form_entri_catatan_pelaksanaan_tranfusi').serialize() + '&id-layanan-pendaftaran-cpt=' + id_layanan_pendaftaran_cpt,

            
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {

                // console.log(data);

                if (data.respon !== null) {

                    if (data.respon.show !== null) {

                        $('#wizard_catatan_pelaksanaan_tranfusi').bwizard('show', data.respon.show);

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
                        $('#modal_catatan_pelaksanaan_tranfusi').modal('hide');
                        showListForm($('#id-pendaftaran-cpt').val(), $('#id-layanan-pendaftaran-cpt').val(), $('#id-pasien-cpt').val());
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
    


    function resetFormCatatanPelaksanaanTranfusi() {
        $('#wizard_catatan_pelaksanaan_tranfusi').bwizard('show', '0');
        $('#form_entri_catatan_pelaksanaan_tranfusi')[0].reset();
        $("input[type='checkbox']").prop('checked',false);
        $("input[type='radio']").prop('checked',false);
        $('#buka-tutup-dk').empty();

        $('#lihat-catatan-kantung-ck').empty();
        $('#hapus-catatan-kantung-ck').empty();
        $('#edit-catatan-kantung-ck').empty();

        $('#hapus-catatan-kantung-ck').val(''); 
        $('#lihat-catatan-kantung-ck').val(''); 
        $('#edit-catatan-kantung-ck').val(''); 
   
        $('#id_data_catatan_tranfusi, #tanggal-tranfusi-cpt, #diagnosis-cpt, #jenis-darah-cpt, #alasan-cpt, #target-cpt, #pemberian-cpt').val('');
        $('#gol-darah-cpt-1, #gol-darah-cpt-2, #gol-darah-cpt-3, #gol-darah-cpt-4, #rhesus-cpt-1, #rhesus-cpt-2, #pre-cpt-1, #pre-cpt-2, #ttd-dokter-cpt').prop('checked', false);
        $('#s2id_dokter-cpt a .select2c-chosen').html('');
        setTimeout(() => {
            $('#volume-cpt')
                .val('');
            $('#form-dk').find('input').each(function() {
                if ($(this).is(':checked')) {
                    $(this).prop('checked', false);
                }
            })
        }, 100)
    }



    function lihatKantung(obj, id, id_pendaftaran, id_layanan_pendaftaran, bed) {   
         $('#modal-edit-catatan-kantung').modal('show');
         $.ajax({
            type: 'GET',
            url: '<?= base_url("order_laboratorium/api/order_laboratorium/get_edit_catatan_kantung") ?>/id/' +
                id,
            cache: false,
            dataType: 'JSON',

            success: function(data) {
                // console.log(data);
                $('#update-dk').empty();
                $('#id-catatan-kantung').val(id);

                function formatTanggalKhusus(waktu) {
                    var el = waktu.split('-');
                    var tahun = el[0];
                    var bulan = el[1];
                    var hari = el[2];
                    return hari + '/' + bulan + '/' + tahun;
                }
                let edit_tanggal_pengkajian = formatTanggalKhusus(data.tanggal_pengkajian);
                $('#edit-cpt-tanggal-pengkajian').val(edit_tanggal_pengkajian); 
                let cttntndkn = '';
                cttntndkn =
                    `  <button type="button" class="btn btn-secondary waves-effect" onclick="$('#modal-edit-catatan-kantung').modal('hide');"><i class="fas fa-times-circle mr-1"></i>Tutup</button>
                    `;
                $('#update-dk').append(cttntndkn);

                $('#edit-nomor-for-cpt').val(data.nomor_for_cpt);
                $('#edit-nomor-stok-cpt').val(data.nomor_stok_cpt);

                data.asal_kantong_cpt_1 == '1' ? $('#edit-asal-kantong-cpt-1').prop('checked', true) : $('#edit-asal-kantong-cpt-1').prop('checked', false);
                data.asal_kantong_cpt_2 == '2' ? $('#edit-asal-kantong-cpt-2').prop('checked', true) : $('#edit-asal-kantong-cpt-2').prop('checked', false);         

                data.hasil_cross_cpt_1 == '1' ? $('#edit-hasil-cross-cpt-1').prop('checked', true) : $('#edit-hasil-cross-cpt-1').prop('checked', false);
                data.hasil_cross_cpt_2 == '2' ? $('#edit-hasil-cross-cpt-2').prop('checked', true) : $('#edit-hasil-cross-cpt-2').prop('checked', false);
                data.hasil_cross_cpt_3 == '3' ? $('#edit-hasil-cross-cpt-3').prop('checked', true) : $('#edit-hasil-cross-cpt-3').prop('checked', false);
                data.hasil_cross_cpt_4 == '4' ? $('#edit-hasil-cross-cpt-4').prop('checked', true) : $('#edit-hasil-cross-cpt-4').prop('checked', false);

                data.jk_cpt_1 == '1' ? $('#edit-jk-cpt-1').prop('checked', true) : $('#edit-jk-cpt-1').prop('checked', false);
                data.jk_cpt_2 == '2' ? $('#edit-jk-cpt-2').prop('checked', true) : $('#edit-jk-cpt-2').prop('checked', false);
                data.jk_cpt_3 == '3' ? $('#edit-jk-cpt-3').prop('checked', true) : $('#edit-jk-cpt-3').prop('checked', false);
                data.jk_cpt_4 == '4' ? $('#edit-jk-cpt-4').prop('checked', true) : $('#edit-jk-cpt-4').prop('checked', false);
                data.jk_cpt_5 == '5' ? $('#edit-jk-cpt-5').prop('checked', true) : $('#edit-jk-cpt-5').prop('checked', false);
                data.jk_cpt_6 == '6' ? $('#edit-jk-cpt-6').prop('checked', true) : $('#edit-jk-cpt-6').prop('checked', false);

                data.golongan_cpt_1 == '1' ? $('#edit-golongan-cpt-1').prop('checked', true) : $('#edit-golongan-cpt-1').prop('checked', false);
                data.golongan_cpt_2 == '2' ? $('#edit-golongan-cpt-2').prop('checked', true) : $('#edit-golongan-cpt-2').prop('checked', false);
                data.golongan_cpt_3 == '3' ? $('#edit-golongan-cpt-3').prop('checked', true) : $('#edit-golongan-cpt-3').prop('checked', false);
                data.golongan_cpt_4 == '4' ? $('#edit-golongan-cpt-4').prop('checked', true) : $('#edit-golongan-cpt-4').prop('checked', false);

                data.rh_cpt_1 == '1' ? $('#edit-rh-cpt-1').prop('checked', true) : $('#edit-rh-cpt-1').prop('checked', false);
                data.rh_cpt_2 == '2' ? $('#edit-rh-cpt-2').prop('checked', true) : $('#edit-rh-cpt-2').prop('checked', false);

                $('#edit-volume-cpt').val(data.volume_cpt);
                $('#edit-jam-keluar-utd').val(data.jam_keluar_utd);

                data.identifikasi_kantung_cpt_1 == '1' ? $('#edit-identifikasi-kantung-cpt-1').prop('checked', true) : $('#edit-identifikasi-kantung-cpt-1').prop('checked', false);
                data.identifikasi_kantung_cpt_2 == '2' ? $('#edit-identifikasi-kantung-cpt-2').prop('checked', true) : $('#edit-identifikasi-kantung-cpt-2').prop('checked', false);

                data.identifikasi_pasien_cpt_1 == '1' ? $('#edit-identifikasi-pasien-cpt-1').prop('checked', true) : $('#edit-identifikasi-pasien-cpt-1').prop('checked', false);
                data.identifikasi_pasien_cpt_2 == '2' ? $('#edit-identifikasi-pasien-cpt-2').prop('checked', true) : $('#edit-identifikasi-pasien-cpt-2').prop('checked', false);

                data.keadaan_kantung_cpt_1 == '1' ? $('#edit-keadaan-kantung-cpt-1').prop('checked', true) : $('#edit-keadaan-kantung-cpt-1').prop('checked', false);
                data.keadaan_kantung_cpt_2 == '2' ? $('#edit-keadaan-kantung-cpt-2').prop('checked', true) : $('#edit-keadaan-kantung-cpt-2').prop('checked', false);


                $('#edit-jam-ruangan-cpt').val(data.jam_ruangan_cpt);
                $('#edit-waktu-mulai-cpt').val(data.waktu_mulai_cpt);
                $('#edit-waktu-selesai-cpt').val(data.waktu_selesai_cpt);

                $('#edit-jam-ob-1').val(data.jam_ob_1);
                $('#edit-jam-ob-2').val(data.jam_ob_2);
                $('#edit-jam-ob-3').val(data.jam_ob_3);
                $('#edit-jam-ob-4').val(data.jam_ob_4);

                $('#edit-tensi-cpt-1').val(data.tensi_cpt_1);
                $('#edit-tensi-cpt-2').val(data.tensi_cpt_2);
                $('#edit-tensi-cpt-3').val(data.tensi_cpt_3);
                $('#edit-tensi-cpt-4').val(data.tensi_cpt_4);

                $('#edit-rr-cpt-1').val(data.rr_cpt_1);
                $('#edit-rr-cpt-2').val(data.rr_cpt_2);
                $('#edit-rr-cpt-3').val(data.rr_cpt_3);
                $('#edit-rr-cpt-4').val(data.rr_cpt_4);

                $('#edit-suhu-cpt-1').val(data.suhu_cpt_1);
                $('#edit-suhu-cpt-2').val(data.suhu_cpt_2);
                $('#edit-suhu-cpt-3').val(data.suhu_cpt_3);
                $('#edit-suhu-cpt-4').val(data.suhu_cpt_4);

                $('#edit-nadi-cpt-1').val(data.nadi_cpt_1);
                $('#edit-nadi-cpt-2').val(data.nadi_cpt_2);
                $('#edit-nadi-cpt-3').val(data.nadi_cpt_3);
                $('#edit-nadi-cpt-4').val(data.nadi_cpt_4);

                $('#edit-reaksi-cpt-1').val(data.reaksi_cpt_1);
                $('#edit-reaksi-cpt-2').val(data.reaksi_cpt_2);
                $('#edit-reaksi-cpt-3').val(data.reaksi_cpt_3);
                $('#edit-reaksi-cpt-4').val(data.reaksi_cpt_4);

                $('#edit-petugas-cpt-1').val(data.petugas_cpt_1);
                $('#s2id_edit-petugas-cpt-1 a .select2c-chosen').html(data.perawat_1);

                $('#edit-petugas-cpt-2').val(data.petugas_cpt_2);
                $('#s2id_edit-petugas-cpt-2 a .select2c-chosen').html(data.perawat_2);

                $('#edit-petugas-cpt-3').val(data.petugas_cpt_3);
                $('#s2id_edit-petugas-cpt-3 a .select2c-chosen').html(data.perawat_3);

                $('#edit-petugas-cpt-4').val(data.petugas_cpt_4);
                $('#s2id_edit-petugas-cpt-4 a .select2c-chosen').html(data.perawat_4);

                $('#edit-petugas-tambah-I').val(data.petugas_tambah_I);
                $('#s2id_edit-petugas-tambah-I a .select2c-chosen').html(data.perawat_5);

                $('#edit-petugas-tambah-II').val(data.petugas_tambah_II);
                $('#s2id_edit-petugas-tambah-II a .select2c-chosen').html(data.perawat_6);

            },
            error: function(e) {
                accessFailed(e.status);
            }
        })      
    }


    function editKantung(obj, id, id_pendaftaran, id_layanan_pendaftaran, bed){
        const modal = $('#modal-edit-catatan-kantung');
        $('#update-dk').children().remove();   
        $.ajax({
            type: 'GET',
            url: '<?= base_url("order_laboratorium/api/order_laboratorium/get_edit_catatan_kantung") ?>/id/' +
                id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                // console.log(data);
                $('#update-dk').empty();
                $('#id-catatan-kantung').val(id);

                function formatTanggalKhusus(waktu) {
                    var el = waktu.split('-');
                    var tahun = el[0];
                    var bulan = el[1];
                    var hari = el[2];
                    return hari + '/' + bulan + '/' + tahun;
                }
                let edit_tanggal_pengkajian = formatTanggalKhusus(data.tanggal_pengkajian);
                $('#edit-cpt-tanggal-pengkajian').val(edit_tanggal_pengkajian); 


                let cttntndkn = '';
                cttntndkn =
                    `  <button type="button" class="btn btn-secondary waves-effect" onclick="$('#modal-edit-catatan-kantung').modal('hide');"><i class="fas fa-times-circle mr-1"></i>Tutup</button>

                    <button type="button" class="btn btn-info waves-effect" onclick="updateKantung(${id_pendaftaran}, ${id_layanan_pendaftaran}, '${bed}')"><i class="fas fa-save mr-1"></i>Update</button>`;
                       
                $('#update-dk').append(cttntndkn);

                $('#edit-nomor-for-cpt').val(data.nomor_for_cpt);
                $('#edit-nomor-stok-cpt').val(data.nomor_stok_cpt);

                data.asal_kantong_cpt_1 == '1' ? $('#edit-asal-kantong-cpt-1').prop('checked', true) : $('#edit-asal-kantong-cpt-1').prop('checked', false);
                data.asal_kantong_cpt_2 == '2' ? $('#edit-asal-kantong-cpt-2').prop('checked', true) : $('#edit-asal-kantong-cpt-2').prop('checked', false);

                data.hasil_cross_cpt_1 == '1' ? $('#edit-hasil-cross-cpt-1').prop('checked', true) : $('#edit-hasil-cross-cpt-1').prop('checked', false);
                data.hasil_cross_cpt_2 == '2' ? $('#edit-hasil-cross-cpt-2').prop('checked', true) : $('#edit-hasil-cross-cpt-2').prop('checked', false);
                data.hasil_cross_cpt_3 == '3' ? $('#edit-hasil-cross-cpt-3').prop('checked', true) : $('#edit-hasil-cross-cpt-3').prop('checked', false);
                data.hasil_cross_cpt_4 == '4' ? $('#edit-hasil-cross-cpt-4').prop('checked', true) : $('#edit-hasil-cross-cpt-4').prop('checked', false);

                data.jk_cpt_1 == '1' ? $('#edit-jk-cpt-1').prop('checked', true) : $('#edit-jk-cpt-1').prop('checked', false);
                data.jk_cpt_2 == '2' ? $('#edit-jk-cpt-2').prop('checked', true) : $('#edit-jk-cpt-2').prop('checked', false);
                data.jk_cpt_3 == '3' ? $('#edit-jk-cpt-3').prop('checked', true) : $('#edit-jk-cpt-3').prop('checked', false);
                data.jk_cpt_4 == '4' ? $('#edit-jk-cpt-4').prop('checked', true) : $('#edit-jk-cpt-4').prop('checked', false);
                data.jk_cpt_5 == '5' ? $('#edit-jk-cpt-5').prop('checked', true) : $('#edit-jk-cpt-5').prop('checked', false);
                data.jk_cpt_6 == '6' ? $('#edit-jk-cpt-6').prop('checked', true) : $('#edit-jk-cpt-6').prop('checked', false);

                data.golongan_cpt_1 == '1' ? $('#edit-golongan-cpt-1').prop('checked', true) : $('#edit-golongan-cpt-1').prop('checked', false);
                data.golongan_cpt_2 == '2' ? $('#edit-golongan-cpt-2').prop('checked', true) : $('#edit-golongan-cpt-2').prop('checked', false);
                data.golongan_cpt_3 == '3' ? $('#edit-golongan-cpt-3').prop('checked', true) : $('#edit-golongan-cpt-3').prop('checked', false);
                data.golongan_cpt_4 == '4' ? $('#edit-golongan-cpt-4').prop('checked', true) : $('#edit-golongan-cpt-4').prop('checked', false);

                data.rh_cpt_1 == '1' ? $('#edit-rh-cpt-1').prop('checked', true) : $('#edit-rh-cpt-1').prop('checked', false);
                data.rh_cpt_2 == '2' ? $('#edit-rh-cpt-2').prop('checked', true) : $('#edit-rh-cpt-2').prop('checked', false);

                $('#edit-volume-cpt').val(data.volume_cpt);
                $('#edit-jam-keluar-utd').val(data.jam_keluar_utd);

                data.identifikasi_kantung_cpt_1 == '1' ? $('#edit-identifikasi-kantung-cpt-1').prop('checked', true) : $('#edit-identifikasi-kantung-cpt-1').prop('checked', false);
                data.identifikasi_kantung_cpt_2 == '2' ? $('#edit-identifikasi-kantung-cpt-2').prop('checked', true) : $('#edit-identifikasi-kantung-cpt-2').prop('checked', false);

                data.identifikasi_pasien_cpt_1 == '1' ? $('#edit-identifikasi-pasien-cpt-1').prop('checked', true) : $('#edit-identifikasi-pasien-cpt-1').prop('checked', false);
                data.identifikasi_pasien_cpt_2 == '2' ? $('#edit-identifikasi-pasien-cpt-2').prop('checked', true) : $('#edit-identifikasi-pasien-cpt-2').prop('checked', false);

                data.keadaan_kantung_cpt_1 == '1' ? $('#edit-keadaan-kantung-cpt-1').prop('checked', true) : $('#edit-keadaan-kantung-cpt-1').prop('checked', false);
                data.keadaan_kantung_cpt_2 == '2' ? $('#edit-keadaan-kantung-cpt-2').prop('checked', true) : $('#edit-keadaan-kantung-cpt-2').prop('checked', false);

                $('#edit-jam-ruangan-cpt').val(data.jam_ruangan_cpt);
                $('#edit-waktu-mulai-cpt').val(data.waktu_mulai_cpt);
                $('#edit-waktu-selesai-cpt').val(data.waktu_selesai_cpt);

                $('#edit-jam-ob-1').val(data.jam_ob_1);
                $('#edit-jam-ob-2').val(data.jam_ob_2);
                $('#edit-jam-ob-3').val(data.jam_ob_3);
                $('#edit-jam-ob-4').val(data.jam_ob_4);

                $('#edit-tensi-cpt-1').val(data.tensi_cpt_1);
                $('#edit-tensi-cpt-2').val(data.tensi_cpt_2);
                $('#edit-tensi-cpt-3').val(data.tensi_cpt_3);
                $('#edit-tensi-cpt-4').val(data.tensi_cpt_4);

                $('#edit-rr-cpt-1').val(data.rr_cpt_1);
                $('#edit-rr-cpt-2').val(data.rr_cpt_2);
                $('#edit-rr-cpt-3').val(data.rr_cpt_3);
                $('#edit-rr-cpt-4').val(data.rr_cpt_4);

                $('#edit-suhu-cpt-1').val(data.suhu_cpt_1);
                $('#edit-suhu-cpt-2').val(data.suhu_cpt_2);
                $('#edit-suhu-cpt-3').val(data.suhu_cpt_3);
                $('#edit-suhu-cpt-4').val(data.suhu_cpt_4);

                $('#edit-nadi-cpt-1').val(data.nadi_cpt_1);
                $('#edit-nadi-cpt-2').val(data.nadi_cpt_2);
                $('#edit-nadi-cpt-3').val(data.nadi_cpt_3);
                $('#edit-nadi-cpt-4').val(data.nadi_cpt_4);

                $('#edit-reaksi-cpt-1').val(data.reaksi_cpt_1);
                $('#edit-reaksi-cpt-2').val(data.reaksi_cpt_2);
                $('#edit-reaksi-cpt-3').val(data.reaksi_cpt_3);
                $('#edit-reaksi-cpt-4').val(data.reaksi_cpt_4);

                $('#edit-petugas-cpt-1').val(data.petugas_cpt_1);
                $('#s2id_edit-petugas-cpt-1 a .select2c-chosen').html(data.perawat_1);

                $('#edit-petugas-cpt-2').val(data.petugas_cpt_2);
                $('#s2id_edit-petugas-cpt-2 a .select2c-chosen').html(data.perawat_2);

                $('#edit-petugas-cpt-3').val(data.petugas_cpt_3);
                $('#s2id_edit-petugas-cpt-3 a .select2c-chosen').html(data.perawat_3);

                $('#edit-petugas-cpt-4').val(data.petugas_cpt_4);
                $('#s2id_edit-petugas-cpt-4 a .select2c-chosen').html(data.perawat_4);   
                
                $('#edit-petugas-tambah-I').val(data.petugas_tambah_I);
                $('#s2id_edit-petugas-tambah-I a .select2c-chosen').html(data.perawat_5);

                $('#edit-petugas-tambah-II').val(data.petugas_tambah_II);
                $('#s2id_edit-petugas-tambah-II a .select2c-chosen').html(data.perawat_6);
                
                modal.modal('show');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })
    }

    function updateKantung(id_pendaftaran, id_layanan_pendaftaran, bed) {
        $.ajax({
            type: 'PUT',
            url: '<?= base_url("order_laboratorium/api/order_laboratorium/update_catatan_kantung") ?>',
            data: $('#form-edit-catatan-kantung').serialize(),
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                // console.log(data);
                if (data.status) {
                    messageEditSuccess();
                    // $('#wizard_catatan_pelaksanaan_tranfusi').bwizard('show', '0');
                    entriCatatanPelaksanaanTransfusi(id_pendaftaran, id_layanan_pendaftaran, bed);
                } else {
                    messageEditFailed();
                }

                $('#modal-edit-catatan-kantung').modal('hide');
            },
            error: function(e) {
                messageEditFailed();
            }
        });
    }

    // if (typeof numberDk === 'undefined') {
    //     var numberDk = 0;
    // }



    var numberDk = 0;
    // Deklarasi variabel numberDk di luar fungsi agar bersifat global
    function addInput() {
        // Setiap kali fungsi dipanggil, increment numberDk dengan 1
        numberDk++;
    }



    function tambahKantung() {

        // if ($('#cpt-tanggal-pengkajian').val() === '') {
        //     syams_validation('#cpt-tanggal-pengkajian', 'Tanggal belum diisi!');
        //     $('#cpt-tanggal-pengkajian').focus();
        //     $('#wizard_catatan_pelaksanaan_tranfusi').bwizard('show', '0');
        //     stop = true;
        // }

        let html = '';       
        let nomor_for_cpt = $('#nomor-for-cpt').val();
        let nomor_stok_cpt = $('#nomor-stok-cpt').val();

        let asal_kantong_cpt_1 = $('#asal-kantong-cpt-1').is(':checked');
        let asal_kantong_cpt_2 = $('#asal-kantong-cpt-2').is(':checked');

        let hasil_cross_cpt_1 = $('#hasil-cross-cpt-1').is(':checked');
        let hasil_cross_cpt_2 = $('#hasil-cross-cpt-2').is(':checked');
        let hasil_cross_cpt_3 = $('#hasil-cross-cpt-3').is(':checked');
        let hasil_cross_cpt_4 = $('#hasil-cross-cpt-4').is(':checked');

        let cpt_tanggal_pengkajian = $('#cpt-tanggal-pengkajian').val();

        let jk_cpt_1 = $('#jk-cpt-1').is(':checked');
        let jk_cpt_2 = $('#jk-cpt-2').is(':checked');
        let jk_cpt_3 = $('#jk-cpt-3').is(':checked');
        let jk_cpt_4 = $('#jk-cpt-4').is(':checked');
        let jk_cpt_5 = $('#jk-cpt-5').is(':checked');
        let jk_cpt_6 = $('#jk-cpt-6').is(':checked');

        let golongan_cpt_1 = $('#golongan-cpt-1').is(':checked');
        let golongan_cpt_2 = $('#golongan-cpt-2').is(':checked');
        let golongan_cpt_3 = $('#golongan-cpt-3').is(':checked');
        let golongan_cpt_4 = $('#golongan-cpt-4').is(':checked');

        let rh_cpt_1 = $('#rh-cpt-1').is(':checked');
        let rh_cpt_2 = $('#rh-cpt-2').is(':checked');

        let volume_cpt = $('#volume-cpt').val();

        let jam_keluar_utd = $('#jam-keluar-utd').val();

        let identifikasi_kantung_cpt_1 = $('#identifikasi-kantung-cpt-1').is(':checked');
        let identifikasi_kantung_cpt_2 = $('#identifikasi-kantung-cpt-2').is(':checked');

        let identifikasi_pasien_cpt_1 = $('#identifikasi-pasien-cpt-1').is(':checked');
        let identifikasi_pasien_cpt_2 = $('#identifikasi-pasien-cpt-2').is(':checked');

        let keadaan_kantung_cpt_1 = $('#keadaan-kantung-cpt-1').is(':checked');
        let keadaan_kantung_cpt_2 = $('#keadaan-kantung-cpt-1').is(':checked');

        let jam_ruangan_cpt = $('#jam-ruangan-cpt').val();
        let waktu_mulai_cpt = $('#waktu-mulai-cpt').val();
        let waktu_selesai_cpt = $('#waktu-selesai-cpt').val();


        let jam_ob_1 = $('#jam-ob-1').val();
        let jam_ob_2 = $('#jam-ob-2').val();
        let jam_ob_3 = $('#jam-ob-3').val();
        let jam_ob_4 = $('#jam-ob-4').val();


        let tensi_cpt_1 = $('#tensi-cpt-1').val();
        let tensi_cpt_2 = $('#tensi-cpt-2').val();
        let tensi_cpt_3 = $('#tensi-cpt-3').val();
        let tensi_cpt_4 = $('#tensi-cpt-4').val();
        
        let rr_cpt_1 = $('#rr-cpt-1').val();
        let rr_cpt_2 = $('#rr-cpt-2').val();
        let rr_cpt_3 = $('#rr-cpt-3').val();
        let rr_cpt_4 = $('#rr-cpt-4').val();
        
        let suhu_cpt_1 = $('#suhu-cpt-1').val();
        let suhu_cpt_2 = $('#suhu-cpt-2').val();
        let suhu_cpt_3 = $('#suhu-cpt-3').val();
        let suhu_cpt_4 = $('#suhu-cpt-4').val();
        
        let nadi_cpt_1 = $('#nadi-cpt-1').val();
        let nadi_cpt_2 = $('#nadi-cpt-2').val();
        let nadi_cpt_3 = $('#nadi-cpt-3').val();
        let nadi_cpt_4 = $('#nadi-cpt-4').val();
        
        let reaksi_cpt_1 = $('#reaksi-cpt-1').val();
        let reaksi_cpt_2 = $('#reaksi-cpt-2').val();
        let reaksi_cpt_3 = $('#reaksi-cpt-3').val();
        let reaksi_cpt_4 = $('#reaksi-cpt-4').val();
        

        let perawat_1 = $('#s2id_petugas-cpt-1 a .select2c-chosen').html();
        let perawat_2 = $('#s2id_petugas-cpt-2 a .select2c-chosen').html();
        let perawat_3 = $('#s2id_petugas-cpt-3 a .select2c-chosen').html();
        let perawat_4 = $('#s2id_petugas-cpt-4 a .select2c-chosen').html();
        let petugas_cpt_1 = $('#petugas-cpt-1').val();
        let petugas_cpt_2 = $('#petugas-cpt-2').val();
        let petugas_cpt_3 = $('#petugas-cpt-3').val();
        let petugas_cpt_4 = $('#petugas-cpt-4').val();

        let perawat_5 = $('#s2id_petugas-tambah-I a .select2c-chosen').html();
        let petugas_tambah_I = $('#petugas-tambah-I').val();
        let perawat_6 = $('#s2id_petugas-tambah-II a .select2c-chosen').html();
        let petugas_tambah_II = $('#petugas-tambah-II').val();


        html = /* html */ `
            <tr class="row-in-${++numberDk}">
                <td class="number-pemantauan" align="center">${numberDk++}</td>         
                <td align="center">
                	<input type="hidden" name="cpt_tanggal_pengkajian[]" value="${cpt_tanggal_pengkajian}">${cpt_tanggal_pengkajian}
                </td>
                <td align="center">
                    <input type="hidden" name="petugas_tambah_I[]" value="${petugas_tambah_I}">${perawat_5}
                </td> 
                <td align="center">
                    <input type="hidden" name="petugas_tambah_II[]" value="${petugas_tambah_II}">${perawat_6}
                </td> 
                <td align="center">
					<?= $this->session->userdata('nama') ?>
					<input type="hidden" name="user_pemantauan[]" value="<?= $this->session->userdata("id_translucent") ?>">
					<input type="hidden" name="pencegahan_date_kantung[]" value="<?= date("Y-m-d H:i:s") ?>">		
                    
                    <input type="hidden" name="nomor_for_cpt[]" value="${nomor_for_cpt}">
                    <input type="hidden" name="nomor_stok_cpt[]" value="${nomor_stok_cpt}">

                    <input type="hidden" name="asal_kantong_cpt_1[]" value="${asal_kantong_cpt_1 ? 1 : 0}">   
                    <input type="hidden" name="asal_kantong_cpt_2[]" value="${asal_kantong_cpt_2 ? 2 : 0}">   

                    <input type="hidden" name="hasil_cross_cpt_1[]" value="${hasil_cross_cpt_1 ? 1 : 0}">   
                    <input type="hidden" name="hasil_cross_cpt_2[]" value="${hasil_cross_cpt_2 ? 2 : 0}">   
                    <input type="hidden" name="hasil_cross_cpt_3[]" value="${hasil_cross_cpt_3 ? 3 : 0}">   
                    <input type="hidden" name="hasil_cross_cpt_4[]" value="${hasil_cross_cpt_4 ? 4 : 0}"> 
                    
                    
                    <input type="hidden" name="jk_cpt_1[]" value="${jk_cpt_1 ? 1 : 0}">   
                    <input type="hidden" name="jk_cpt_2[]" value="${jk_cpt_2 ? 2 : 0}">   
                    <input type="hidden" name="jk_cpt_3[]" value="${jk_cpt_3 ? 3 : 0}">   
                    <input type="hidden" name="jk_cpt_4[]" value="${jk_cpt_4 ? 4 : 0}">   
                    <input type="hidden" name="jk_cpt_5[]" value="${jk_cpt_5 ? 5 : 0}">   
                    <input type="hidden" name="jk_cpt_6[]" value="${jk_cpt_6 ? 6 : 0}"> 
                    
                    <input type="hidden" name="golongan_cpt_1[]" value="${golongan_cpt_1 ? 1 : 0}">   
                    <input type="hidden" name="golongan_cpt_2[]" value="${golongan_cpt_2 ? 2 : 0}">   
                    <input type="hidden" name="golongan_cpt_3[]" value="${golongan_cpt_3 ? 3 : 0}">   
                    <input type="hidden" name="golongan_cpt_4[]" value="${golongan_cpt_4 ? 4 : 0}"> 

                    <input type="hidden" name="rh_cpt_1[]" value="${rh_cpt_1 ? 1 : 0}">   
                    <input type="hidden" name="rh_cpt_2[]" value="${rh_cpt_2 ? 2 : 0}"> 

                    <input type="hidden" name="volume_cpt[]" value="${volume_cpt}">
                    <input type="hidden" name="jam_keluar_utd[]" value="${jam_keluar_utd}">

                    <input type="hidden" name="identifikasi_kantung_cpt_1[]" value="${identifikasi_kantung_cpt_1 ? 1 : 0}">   
                    <input type="hidden" name="identifikasi_kantung_cpt_2[]" value="${identifikasi_kantung_cpt_2 ? 2 : 0}">

                    <input type="hidden" name="identifikasi_pasien_cpt_1[]" value="${identifikasi_pasien_cpt_1 ? 1 : 0}">   
                    <input type="hidden" name="identifikasi_pasien_cpt_2[]" value="${identifikasi_pasien_cpt_2 ? 2 : 0}">

                    <input type="hidden" name="keadaan_kantung_cpt_1[]" value="${keadaan_kantung_cpt_1 ? 1 : 0}">   
                    <input type="hidden" name="keadaan_kantung_cpt_2[]" value="${keadaan_kantung_cpt_2 ? 2 : 0}">

                    <input type="hidden" name="jam_ruangan_cpt[]" value="${jam_ruangan_cpt}">
                    <input type="hidden" name="waktu_mulai_cpt[]" value="${waktu_mulai_cpt}">
                    <input type="hidden" name="waktu_selesai_cpt[]" value="${waktu_selesai_cpt}">


                    <input type="hidden" name="jam_ob_1[]" value="${jam_ob_1}">
                    <input type="hidden" name="jam_ob_2[]" value="${jam_ob_2}">
                    <input type="hidden" name="jam_ob_3[]" value="${jam_ob_3}">
                    <input type="hidden" name="jam_ob_4[]" value="${jam_ob_4}">


                    <input type="hidden" name="tensi_cpt_1[]" value="${tensi_cpt_1}">
                    <input type="hidden" name="tensi_cpt_2[]" value="${tensi_cpt_2}">
                    <input type="hidden" name="tensi_cpt_3[]" value="${tensi_cpt_3}">
                    <input type="hidden" name="tensi_cpt_4[]" value="${tensi_cpt_4}">

                    <input type="hidden" name="rr_cpt_1[]" value="${rr_cpt_1}">
                    <input type="hidden" name="rr_cpt_2[]" value="${rr_cpt_2}">
                    <input type="hidden" name="rr_cpt_3[]" value="${rr_cpt_3}">
                    <input type="hidden" name="rr_cpt_4[]" value="${rr_cpt_4}">

                    <input type="hidden" name="suhu_cpt_1[]" value="${suhu_cpt_1}">
                    <input type="hidden" name="suhu_cpt_2[]" value="${suhu_cpt_2}">
                    <input type="hidden" name="suhu_cpt_3[]" value="${suhu_cpt_3}">
                    <input type="hidden" name="suhu_cpt_4[]" value="${suhu_cpt_4}">

                    <input type="hidden" name="nadi_cpt_1[]" value="${nadi_cpt_1}">
                    <input type="hidden" name="nadi_cpt_2[]" value="${nadi_cpt_2}">
                    <input type="hidden" name="nadi_cpt_3[]" value="${nadi_cpt_3}">
                    <input type="hidden" name="nadi_cpt_4[]" value="${nadi_cpt_4}">

                    <input type="hidden" name="reaksi_cpt_1[]" value="${reaksi_cpt_1}">
                    <input type="hidden" name="reaksi_cpt_2[]" value="${reaksi_cpt_2}">
                    <input type="hidden" name="reaksi_cpt_3[]" value="${reaksi_cpt_3}">
                    <input type="hidden" name="reaksi_cpt_4[]" value="${reaksi_cpt_4}">

                    <input type="hidden" name="petugas_cpt_1[]" value="${petugas_cpt_1}">
                    <input type="hidden" name="petugas_cpt_2[]" value="${petugas_cpt_2}">
                    <input type="hidden" name="petugas_cpt_3[]" value="${petugas_cpt_3}">
                    <input type="hidden" name="petugas_cpt_4[]" value="${petugas_cpt_4}">                  
                </td>                      
                <td align="center">
                    <button type="button" class="btn btn-secondary btn-xxs" onclick="removeList(this)"><i class="fas fa-trash-alt"></i></button>
                </td> 
                
            </tr>
        `;
        $('#tabel-dk .body-table').append(html);
    }             

    function hapusKantung(obj, id) {
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
                            url: '<?= base_url("order_laboratorium/api/order_laboratorium/hapus_catatan_kantung") ?>/' +
                                id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                if (data.status) {
                                    messageCustom(data.message, 'Success');
                                    removeList(obj);
                                } else {
                                    customAlert('Hapus Data Kantung', data
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

 
    // DCT 
    function getListDataCatatanKantungT (id_pendaftaran, bed, page) {
        let accountGroup = "<?= $this->session->userdata('account_group') ?>";
        $.ajax({
            type: 'GET',
            url: '<?= base_url("order_laboratorium/api/order_laboratorium/get_list_data_catatan_kantung") ?>/page/' + page +
                '/id_pendaftaran/' + id_pendaftaran,
            // data: 'keyword=' + $('#cpt-keyword').val() + '&waktu=' + $('#cpt-waktu-search').val(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                // console.log(data);
                $('#wizard_catatan_pelaksanaan_tranfusi').bwizard('show', '1');
                $('#table-catatan-kantung tbody').empty();
                $.each(data.data, function(i, v) {
                    // let no = ((i + 1) + ((data.page - 1) * data.limit));
                    let selPetugas = '';
                    let idEkLayanan = $('#id-layanan-pendaftaran-cpt').val();
                    let butHapus = '';
                    if (v.id_layanan_pendaftaran === idEkLayanan) {
                        butHapus =
                            `<button id="hapus-catatan-kantung-ck" type="button" class="btn btn-secondary btn-xs" onclick="hapusDataCatatanKantung(this, ${v.id_data_catatan_tranfusi})" ><i class="fas fa-fw fa-trash-alt mr-1"></i>Hapus</button>`;
                    } else {
                        butHapus = '';
                    }
                    let html = /* html */ `
                        <tr>
                            <td class="center">${(++i)}</td>
                            <td class="center">${((v.tanggal_tranfusi_cpt !== null) ? datefmysql(v.tanggal_tranfusi_cpt) : '')}</td>
                            <td class="center">${((v.diagnosis_cpt !== null) ? v.diagnosis_cpt : '')}</td>
                            <td class="center">${((v.gol_darah_cpt !== null) ? v.gol_darah_cpt : '')}</td>
                            <td class="center">${((v.user !== null) ? v.user : '')}</td>
                            <td class="center">${((v.dokter !== null) ? v.dokter : '')}</td>
                            <td class="Alat">                                                         
                                <button id="lihat-catatan-kantung-ck" type="button" class="btn btn-secondary btn-xxs" onclick="lihatDataCatatanKantung(${v.id_data_catatan_tranfusi},'${v.id_pendaftaran}','${v.id_layanan_pendaftaran}')"><i class="fas fa-eye m-r-5"></i>Lihat</button>           
                                <button id="edit-catatan-kantung-ck" type="button" class="btn btn-secondary btn-xxs" onclick="editDataCatatanKantung(${v.id_data_catatan_tranfusi},'${v.id_pendaftaran}','${v.id_layanan_pendaftaran}')"><i class="fas fa-edit m-r-5"></i>Edit</button>
                                ${butHapus}
                            </td>
                        </tr>
                    `;
                    $('#table-catatan-kantung tbody').append(html);
                })
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed('Gagal mendapatkan data!');
            }
        });
    }

    

    // DCT 
    function formatTanggalKhusus(waktu) {
        if (waktu !== undefined && waktu !== null) { 
            var el = waktu.split('-');
            var tahun = el[0];
            var bulan = el[1];
            var hari = el[2];
            return hari + '/' + bulan + '/' + tahun;
        } else {
            return '';
        }
    }


    // DCT EDIT
    function editDataCatatanKantung(id, id_pendaftaran, id_layanan_pendaftaran, bed, action) {   
        $('#wizard_catatan_pelaksanaan_tranfusi').bwizard('show', '0');
        $.ajax({
            type: 'GET',
            url: '<?= base_url("order_laboratorium/api/order_laboratorium/get_edit_data_catatan_kantung") ?>/id/' + id + '/id_pendaftaran/' + id_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader()
            },   
            success: function(data) {
                // console.log(data.catatan_kantung);

                $('#id_data_catatan_tranfusi').val(data.id_data_catatan_tranfusi);
                $('#cpt_id_layanan_pendaftaran').val(data.id_layanan_pendaftaran);

                if (data !== null) {
                    $('#id-cpt').val(data.data.id);     
                    $('#id_data_catatan_tranfusi').val(data.data_catatan.data.id_data_catatan_tranfusi);
                    // $('#id_data_catatan_tranfusi_cb').val(data.data_catatan.data.id_data_catatan_tranfusi);

                    $('#tanggal-tranfusi-cpt').val(data.data.tanggal_tranfusi_cpt !== null ? datefmysql(data.data.tanggal_tranfusi_cpt) : '');
                    $('#diagnosis-cpt').val(data.data.diagnosis_cpt);
                    if (data.data.gol_darah_cpt == 'A') { $('#gol-darah-cpt-1').prop('checked', true) }
                    if (data.data.gol_darah_cpt == 'B') { $('#gol-darah-cpt-2').prop('checked', true) }
                    if (data.data.gol_darah_cpt == 'AB') { $('#gol-darah-cpt-3').prop('checked', true) }
                    if (data.data.gol_darah_cpt == 'O') { $('#gol-darah-cpt-4').prop('checked', true) }
                    if (data.data.rhesus_cpt == 'ya') { $('#rhesus-cpt-1').prop('checked', true) }
                    if (data.data.rhesus_cpt == 'tidak') { $('#rhesus-cpt-2').prop('checked', true) }
                    if (data.data.pre_cpt == 'ya') { $('#pre-cpt-1').prop('checked', true) }
                    if (data.data.pre_cpt == 'tidak') { $('#pre-cpt-2').prop('checked', true) }
                    $('#jenis-darah-cpt').val(data.data.jenis_darah_cpt);
                    $('#alasan-cpt').val(data.data.alasan_cpt);
                    $('#target-cpt').val(data.data.target_cpt);
                    $('#pemberian-cpt').val(data.data.pemberian_cpt);
                    $('#dokter-cpt').val(data.data.dokter_cpt);
                    $('#s2id_dokter-cpt a .select2c-chosen').html(data.data.dokter);
                    if (data.data.ttd_dokter_cpt == '1') { $('#ttd-dokter-cpt').prop('checked', true) }   
                }

                // BATAS 
                if (data !== null) {
                    $('#cpt-tanggal-pengkajian').val(data.data.tanggal_pengkajian !== null ? datefmysql(data.data.tanggal_pengkajian) : '');                   
                    $('#edit-nomor-for-cpt').val(data.data.nomor_for_cpt);
                    $('#edit-nomor-stok-cpt').val(data.data.nomor_stok_cpt);
                    data.data.asal_kantong_cpt_1 == '1' ? $('#edit-asal-kantong-cpt-1').prop('checked', true) : $('#edit-asal-kantong-cpt-1').prop('checked', false);
                    data.data.asal_kantong_cpt_2 == '2' ? $('#edit-asal-kantong-cpt-2').prop('checked', true) : $('#edit-asal-kantong-cpt-2').prop('checked', false);
                    data.data.hasil_cross_cpt_1 == '1' ? $('#edit-hasil-cross-cpt-1').prop('checked', true) : $('#edit-hasil-cross-cpt-1').prop('checked', false);
                    data.data.hasil_cross_cpt_2 == '2' ? $('#edit-hasil-cross-cpt-2').prop('checked', true) : $('#edit-hasil-cross-cpt-2').prop('checked', false);
                    data.data.hasil_cross_cpt_3 == '3' ? $('#edit-hasil-cross-cpt-3').prop('checked', true) : $('#edit-hasil-cross-cpt-3').prop('checked', false);
                    data.data.hasil_cross_cpt_4 == '4' ? $('#edit-hasil-cross-cpt-4').prop('checked', true) : $('#edit-hasil-cross-cpt-4').prop('checked', false);
                    data.data.jk_cpt_1 == '1' ? $('#edit-jk-cpt-1').prop('checked', true) : $('#edit-jk-cpt-1').prop('checked', false);
                    data.data.jk_cpt_2 == '2' ? $('#edit-jk-cpt-2').prop('checked', true) : $('#edit-jk-cpt-2').prop('checked', false);
                    data.data.jk_cpt_3 == '3' ? $('#edit-jk-cpt-3').prop('checked', true) : $('#edit-jk-cpt-3').prop('checked', false);
                    data.data.jk_cpt_4 == '4' ? $('#edit-jk-cpt-4').prop('checked', true) : $('#edit-jk-cpt-4').prop('checked', false);
                    data.data.jk_cpt_5 == '5' ? $('#edit-jk-cpt-5').prop('checked', true) : $('#edit-jk-cpt-5').prop('checked', false);
                    data.data.jk_cpt_6 == '6' ? $('#edit-jk-cpt-6').prop('checked', true) : $('#edit-jk-cpt-6').prop('checked', false);
                    data.data.golongan_cpt_1 == '1' ? $('#edit-golongan-cpt-1').prop('checked', true) : $('#edit-golongan-cpt-1').prop('checked', false);
                    data.data.golongan_cpt_2 == '2' ? $('#edit-golongan-cpt-2').prop('checked', true) : $('#edit-golongan-cpt-2').prop('checked', false);
                    data.data.golongan_cpt_3 == '3' ? $('#edit-golongan-cpt-3').prop('checked', true) : $('#edit-golongan-cpt-3').prop('checked', false);
                    data.data.golongan_cpt_4 == '4' ? $('#edit-golongan-cpt-4').prop('checked', true) : $('#edit-golongan-cpt-4').prop('checked', false);
                    data.data.rh_cpt_1 == '1' ? $('#edit-rh-cpt-1').prop('checked', true) : $('#edit-rh-cpt-1').prop('checked', false);
                    data.data.rh_cpt_2 == '2' ? $('#edit-rh-cpt-2').prop('checked', true) : $('#edit-rh-cpt-2').prop('checked', false);
                    $('#edit-volume-cpt').val(data.data.volume_cpt);
                    $('#edit-jam-keluar-utd').val(data.data.jam_keluar_utd);

                    data.data.identifikasi_kantung_cpt_1 == '1' ? $('#edit-identifikasi-kantung-cpt-1').prop('checked', true) : $('#edit-identifikasi-kantung-cpt-1').prop('checked', false);
                    data.data.identifikasi_kantung_cpt_2 == '2' ? $('#edit-identifikasi-kantung-cpt-2').prop('checked', true) : $('#edit-identifikasi-kantung-cpt-2').prop('checked', false);

                    data.data.identifikasi_pasien_cpt_1 == '1' ? $('#edit-identifikasi-pasien-cpt-1').prop('checked', true) : $('#edit-identifikasi-pasien-cpt-1').prop('checked', false);
                    data.data.identifikasi_pasien_cpt_2 == '2' ? $('#edit-identifikasi-pasien-cpt-2').prop('checked', true) : $('#edit-identifikasi-pasien-cpt-2').prop('checked', false);

                    data.data.keadaan_kantung_cpt_1 == '1' ? $('#edit-keadaan-kantung-cpt-1').prop('checked', true) : $('#edit-keadaan-kantung-cpt-1').prop('checked', false);
                    data.data.keadaan_kantung_cpt_2 == '2' ? $('#edit-keadaan-kantung-cpt-2').prop('checked', true) : $('#edit-keadaan-kantung-cpt-2').prop('checked', false);

                    $('#edit-jam-ruangan-cpt').val(data.data.jam_ruangan_cpt);
                    $('#edit-waktu-mulai-cpt').val(data.data.waktu_mulai_cpt);
                    $('#edit-waktu-selesai-cpt').val(data.data.waktu_selesai_cpt);

                    $('#edit-jam-ob-1').val(data.data.jam_ob_1);
                    $('#edit-jam-ob-2').val(data.data.jam_ob_2);
                    $('#edit-jam-ob-3').val(data.data.jam_ob_3);
                    $('#edit-jam-ob-4').val(data.data.jam_ob_4);

                    $('#edit-tensi-cpt-1').val(data.data.tensi_cpt_1);
                    $('#edit-tensi-cpt-2').val(data.data.tensi_cpt_2);
                    $('#edit-tensi-cpt-3').val(data.data.tensi_cpt_3);
                    $('#edit-tensi-cpt-4').val(data.data.tensi_cpt_4);

                    $('#edit-rr-cpt-1').val(data.data.rr_cpt_1);
                    $('#edit-rr-cpt-2').val(data.data.rr_cpt_2);
                    $('#edit-rr-cpt-3').val(data.data.rr_cpt_3);
                    $('#edit-rr-cpt-4').val(data.data.rr_cpt_4);

                    $('#edit-suhu-cpt-1').val(data.data.suhu_cpt_1);
                    $('#edit-suhu-cpt-2').val(data.data.suhu_cpt_2);
                    $('#edit-suhu-cpt-3').val(data.data.suhu_cpt_3);
                    $('#edit-suhu-cpt-4').val(data.data.suhu_cpt_4);

                    $('#edit-nadi-cpt-1').val(data.data.nadi_cpt_1);
                    $('#edit-nadi-cpt-2').val(data.data.nadi_cpt_2);
                    $('#edit-nadi-cpt-3').val(data.data.nadi_cpt_3);
                    $('#edit-nadi-cpt-4').val(data.data.nadi_cpt_4);

                    $('#edit-reaksi-cpt-1').val(data.data.reaksi_cpt_1);
                    $('#edit-reaksi-cpt-2').val(data.data.reaksi_cpt_2);
                    $('#edit-reaksi-cpt-3').val(data.data.reaksi_cpt_3);
                    $('#edit-reaksi-cpt-4').val(data.data.reaksi_cpt_4);

                    $('#edit-petugas-cpt-1').val(data.data.petugas_cpt_1);
                    $('#s2id_edit-petugas-cpt-1 a .select2c-chosen').html(data.data.perawat_1);

                    $('#edit-petugas-cpt-2').val(data.data.petugas_cpt_2);
                    $('#s2id_edit-petugas-cpt-2 a .select2c-chosen').html(data.data.perawat_2);

                    $('#edit-petugas-cpt-3').val(data.data.petugas_cpt_3);
                    $('#s2id_edit-petugas-cpt-3 a .select2c-chosen').html(data.data.perawat_3);

                    $('#edit-petugas-cpt-4').val(data.data.petugas_cpt_4);
                    $('#s2id_edit-petugas-cpt-4 a .select2c-chosen').html(data.data.perawat_4); 
                    
                    $('#edit-petugas-tambah-I').val(data.petugas_tambah_I);
                    $('#s2id_edit-petugas-tambah-I a .select2c-chosen').html(data.perawat_5);

                    $('#edit-petugas-tambah-II').val(data.petugas_tambah_II);
                    $('#s2id_edit-petugas-tambah-II a .select2c-chosen').html(data.perawat_6);
                }

                $('#tabel-dk .body-table').empty();          
                $.each(data.catatan_kantung.data, function(i, v) {
                    let btnAksesLihat = '';
                    if (action != 'lihat') {
                        btnAksesLihat = '<button type="button" class="btn btn-secondary btn-xs" onclick="editKantung(this, ' +
                        v.id + ', ' + id_pendaftaran + ', ' + id_layanan_pendaftaran + ', \'' + bed +
                        '\')"><i class="fas fa-fw fa-edit mr-1"></i> Edit</button> <button type="button" class="btn btn-secondary btn-xs" onclick="hapusKantung(this, ' +
                        v.id +
                        ')"> <i class="fas fa-fw fa-trash-alt mr-1"></i> Hapus</button>';
                    }
                    const selOp =
                    '<td align="center"> <button type="button" class="btn btn-secondary btn-xs" onclick="lihatKantung(this, ' +
                    v.id + ', ' + id_pendaftaran + ', ' + id_layanan_pendaftaran + ', \'' + bed +
                    '\')"><i class="fas fa-fw fa-eye mr-1"></i> Lihat</button> ' +
                    btnAksesLihat + 
                    '</td>';
                    let html = /* html */ `
                        <tr>
                            <td class="number-terapi" align="center">${(++i)}</td>           
                            <td align="center">${(v.tanggal_pengkajian !== null) ? formatTanggalKhusus(v.tanggal_pengkajian) : ''}</td>
                            <td align="center">${v.perawat_5 || '-'}</td>
                            <td align="center">${v.perawat_6 || '-'}</td>
                            <td align="center">${v.akun_user}</td>
                            ${selOp}
                        </tr>
                    `;
                    $('#tabel-dk tbody').append(html);
                })                       
            },
            complete: function() {
                hideLoader()
            },
            error: function(e) {
                accessFailed(e.status);
            },
        });
    }

    // DCT LIHATTT
    function lihatDataCatatanKantung(id, id_pendaftaran, id_layanan_pendaftaran, bed, action) {   
        $('#wizard_catatan_pelaksanaan_tranfusi').bwizard('show', '0');
        $.ajax({
            type: 'GET',
            // url: '<!?= base_url("order_laboratorium/api/order_laboratorium/get_edit_data_catatan_kantung") ?>/id/' + id,
            url: '<?= base_url("order_laboratorium/api/order_laboratorium/get_edit_data_catatan_kantung") ?>/id/' + id + '/id_pendaftaran/' + id_pendaftaran,

            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader()
            },
            success: function(data) {

                $('#id_data_catatan_tranfusi').val(data.id_data_catatan_tranfusi);
                $('#cpt_id_layanan_pendaftaran').val(data.id_layanan_pendaftaran);

                if (data !== null) {
                    $('#id-cpt').val(data.data.id);     
                    $('#id_data_catatan_tranfusi').val(data.data_catatan.data.id_data_catatan_tranfusi);
                    // $('#id_data_catatan_tranfusi_cb').val(data.data_catatan.data.id_data_catatan_tranfusi);
                    $('#tanggal-tranfusi-cpt').val(data.data.tanggal_tranfusi_cpt !== null ? datefmysql(data.data.tanggal_tranfusi_cpt) : '');
                    $('#diagnosis-cpt').val(data.data.diagnosis_cpt);
                    if (data.data.gol_darah_cpt == 'A') { $('#gol-darah-cpt-1').prop('checked', true) }
                    if (data.data.gol_darah_cpt == 'B') { $('#gol-darah-cpt-2').prop('checked', true) }
                    if (data.data.gol_darah_cpt == 'AB') { $('#gol-darah-cpt-3').prop('checked', true) }
                    if (data.data.gol_darah_cpt == 'O') { $('#gol-darah-cpt-4').prop('checked', true) }

                    if (data.data.rhesus_cpt == 'ya') { $('#rhesus-cpt-1').prop('checked', true) }
                    if (data.data.rhesus_cpt == 'tidak') { $('#rhesus-cpt-2').prop('checked', true) }

                    if (data.data.pre_cpt == 'ya') { $('#pre-cpt-1').prop('checked', true) }
                    if (data.data.pre_cpt == 'tidak') { $('#pre-cpt-2').prop('checked', true) }

                    $('#jenis-darah-cpt').val(data.data.jenis_darah_cpt);

                    $('#alasan-cpt').val(data.data.alasan_cpt);
                    $('#target-cpt').val(data.data.target_cpt);
                    $('#pemberian-cpt').val(data.data.pemberian_cpt);


                    $('#dokter-cpt').val(data.data.dokter_cpt);
                    $('#s2id_dokter-cpt a .select2c-chosen').html(data.data.dokter);

                    if (data.data.ttd_dokter_cpt == '1') { $('#ttd-dokter-cpt').prop('checked', true) }   
                }

                // BATAS 
                if (data !== null) {
                    $('#cpt-tanggal-pengkajian').val(data.data.tanggal_pengkajian !== null ? datefmysql(data.data.tanggal_pengkajian) : '');                   

                    $('#edit-nomor-for-cpt').val(data.data.nomor_for_cpt);
                    $('#edit-nomor-stok-cpt').val(data.data.nomor_stok_cpt);

                    data.data.asal_kantong_cpt_1 == '1' ? $('#edit-asal-kantong-cpt-1').prop('checked', true) : $('#edit-asal-kantong-cpt-1').prop('checked', false);
                    data.data.asal_kantong_cpt_2 == '2' ? $('#edit-asal-kantong-cpt-2').prop('checked', true) : $('#edit-asal-kantong-cpt-2').prop('checked', false);

                    data.data.hasil_cross_cpt_1 == '1' ? $('#edit-hasil-cross-cpt-1').prop('checked', true) : $('#edit-hasil-cross-cpt-1').prop('checked', false);
                    data.data.hasil_cross_cpt_2 == '2' ? $('#edit-hasil-cross-cpt-2').prop('checked', true) : $('#edit-hasil-cross-cpt-2').prop('checked', false);
                    data.data.hasil_cross_cpt_3 == '3' ? $('#edit-hasil-cross-cpt-3').prop('checked', true) : $('#edit-hasil-cross-cpt-3').prop('checked', false);
                    data.data.hasil_cross_cpt_4 == '4' ? $('#edit-hasil-cross-cpt-4').prop('checked', true) : $('#edit-hasil-cross-cpt-4').prop('checked', false);

                    data.data.jk_cpt_1 == '1' ? $('#edit-jk-cpt-1').prop('checked', true) : $('#edit-jk-cpt-1').prop('checked', false);
                    data.data.jk_cpt_2 == '2' ? $('#edit-jk-cpt-2').prop('checked', true) : $('#edit-jk-cpt-2').prop('checked', false);
                    data.data.jk_cpt_3 == '3' ? $('#edit-jk-cpt-3').prop('checked', true) : $('#edit-jk-cpt-3').prop('checked', false);
                    data.data.jk_cpt_4 == '4' ? $('#edit-jk-cpt-4').prop('checked', true) : $('#edit-jk-cpt-4').prop('checked', false);
                    data.data.jk_cpt_5 == '5' ? $('#edit-jk-cpt-5').prop('checked', true) : $('#edit-jk-cpt-5').prop('checked', false);
                    data.data.jk_cpt_6 == '6' ? $('#edit-jk-cpt-6').prop('checked', true) : $('#edit-jk-cpt-6').prop('checked', false);

                    data.data.golongan_cpt_1 == '1' ? $('#edit-golongan-cpt-1').prop('checked', true) : $('#edit-golongan-cpt-1').prop('checked', false);
                    data.data.golongan_cpt_2 == '2' ? $('#edit-golongan-cpt-2').prop('checked', true) : $('#edit-golongan-cpt-2').prop('checked', false);
                    data.data.golongan_cpt_3 == '3' ? $('#edit-golongan-cpt-3').prop('checked', true) : $('#edit-golongan-cpt-3').prop('checked', false);
                    data.data.golongan_cpt_4 == '4' ? $('#edit-golongan-cpt-4').prop('checked', true) : $('#edit-golongan-cpt-4').prop('checked', false);

                    data.data.rh_cpt_1 == '1' ? $('#edit-rh-cpt-1').prop('checked', true) : $('#edit-rh-cpt-1').prop('checked', false);
                    data.data.rh_cpt_2 == '2' ? $('#edit-rh-cpt-2').prop('checked', true) : $('#edit-rh-cpt-2').prop('checked', false);

                    $('#edit-volume-cpt').val(data.data.volume_cpt);
                    $('#edit-jam-keluar-utd').val(data.data.jam_keluar_utd);

                    data.data.identifikasi_kantung_cpt_1 == '1' ? $('#edit-identifikasi-kantung-cpt-1').prop('checked', true) : $('#edit-identifikasi-kantung-cpt-1').prop('checked', false);
                    data.data.identifikasi_kantung_cpt_2 == '2' ? $('#edit-identifikasi-kantung-cpt-2').prop('checked', true) : $('#edit-identifikasi-kantung-cpt-2').prop('checked', false);

                    data.data.identifikasi_pasien_cpt_1 == '1' ? $('#edit-identifikasi-pasien-cpt-1').prop('checked', true) : $('#edit-identifikasi-pasien-cpt-1').prop('checked', false);
                    data.data.identifikasi_pasien_cpt_2 == '2' ? $('#edit-identifikasi-pasien-cpt-2').prop('checked', true) : $('#edit-identifikasi-pasien-cpt-2').prop('checked', false);

                    data.data.keadaan_kantung_cpt_1 == '1' ? $('#edit-keadaan-kantung-cpt-1').prop('checked', true) : $('#edit-keadaan-kantung-cpt-1').prop('checked', false);
                    data.data.keadaan_kantung_cpt_2 == '2' ? $('#edit-keadaan-kantung-cpt-2').prop('checked', true) : $('#edit-keadaan-kantung-cpt-2').prop('checked', false);


                    $('#edit-jam-ruangan-cpt').val(data.data.jam_ruangan_cpt);
                    $('#edit-waktu-mulai-cpt').val(data.data.waktu_mulai_cpt);
                    $('#edit-waktu-selesai-cpt').val(data.data.waktu_selesai_cpt);

                    $('#edit-jam-ob-1').val(data.data.jam_ob_1);
                    $('#edit-jam-ob-2').val(data.data.jam_ob_2);
                    $('#edit-jam-ob-3').val(data.data.jam_ob_3);
                    $('#edit-jam-ob-4').val(data.data.jam_ob_4);

                    $('#edit-tensi-cpt-1').val(data.data.tensi_cpt_1);
                    $('#edit-tensi-cpt-2').val(data.data.tensi_cpt_2);
                    $('#edit-tensi-cpt-3').val(data.data.tensi_cpt_3);
                    $('#edit-tensi-cpt-4').val(data.data.tensi_cpt_4);

                    $('#edit-rr-cpt-1').val(data.data.rr_cpt_1);
                    $('#edit-rr-cpt-2').val(data.data.rr_cpt_2);
                    $('#edit-rr-cpt-3').val(data.data.rr_cpt_3);
                    $('#edit-rr-cpt-4').val(data.data.rr_cpt_4);

                    $('#edit-suhu-cpt-1').val(data.data.suhu_cpt_1);
                    $('#edit-suhu-cpt-2').val(data.data.suhu_cpt_2);
                    $('#edit-suhu-cpt-3').val(data.data.suhu_cpt_3);
                    $('#edit-suhu-cpt-4').val(data.data.suhu_cpt_4);

                    $('#edit-nadi-cpt-1').val(data.data.nadi_cpt_1);
                    $('#edit-nadi-cpt-2').val(data.data.nadi_cpt_2);
                    $('#edit-nadi-cpt-3').val(data.data.nadi_cpt_3);
                    $('#edit-nadi-cpt-4').val(data.data.nadi_cpt_4);

                    $('#edit-reaksi-cpt-1').val(data.data.reaksi_cpt_1);
                    $('#edit-reaksi-cpt-2').val(data.data.reaksi_cpt_2);
                    $('#edit-reaksi-cpt-3').val(data.data.reaksi_cpt_3);
                    $('#edit-reaksi-cpt-4').val(data.data.reaksi_cpt_4);

                    $('#edit-petugas-cpt-1').val(data.data.petugas_cpt_1);
                    $('#s2id_edit-petugas-cpt-1 a .select2c-chosen').html(data.data.perawat_1);

                    $('#edit-petugas-cpt-2').val(data.data.petugas_cpt_2);
                    $('#s2id_edit-petugas-cpt-2 a .select2c-chosen').html(data.data.perawat_2);

                    $('#edit-petugas-cpt-3').val(data.data.petugas_cpt_3);
                    $('#s2id_edit-petugas-cpt-3 a .select2c-chosen').html(data.data.perawat_3);

                    $('#edit-petugas-cpt-4').val(data.data.petugas_cpt_4);
                    $('#s2id_edit-petugas-cpt-4 a .select2c-chosen').html(data.data.perawat_4);

                    $('#edit-petugas-tambah-I').val(data.petugas_tambah_I);
                    $('#s2id_edit-petugas-tambah-I a .select2c-chosen').html(data.perawat_5);

                    $('#edit-petugas-tambah-II').val(data.petugas_tambah_II);
                    $('#s2id_edit-petugas-tambah-II a .select2c-chosen').html(data.perawat_6);

                }

                $('#tabel-dk .body-table').empty();          
                $.each(data.catatan_kantung.data, function(i, v) {
                    let btnAksesLihat = '';
                    if (action != 'lihat') {
                        btnAksesLihat = '<button type="button" class="btn btn-Success btn-xs" onclick="editKantung(this, ' +
                        v.id + ', ' + id_pendaftaran + ', ' + id_layanan_pendaftaran + ', \'' + bed +
                        '\')"><i class="fas fa-edit"></i> Edit</button> <button type="button" class="btn btn-Warning btn-xs" onclick="hapusKantung(this, ' +
                        v.id +
                        ')"> <i class="fas fa-trash-alt"></i> Hapus</button>';
                    }
                    const selOp =
                    '<td align="center"><button type="button" class="btn btn-Primary btn-xs" onclick="lihatKantung(this, ' +
                    v.id + ', ' + id_pendaftaran + ', ' + id_layanan_pendaftaran + ', \'' + bed +
                    '\')"><i class="fas fa-eye"></i> Lihat</button>' +
                    btnAksesLihat + 
                    '</td>';
                    let html = /* html */ `
                        <tr>
                            <td class="number-terapi" align="center">${(++i)}</td>           
                            <td align="center">${(v.tanggal_pengkajian !== null) ? formatTanggalKhusus(v.tanggal_pengkajian) : ''}</td>
                            <td align="center">${v.perawat_5 || '-'}</td>
                            <td align="center">${v.perawat_6 || '-'}</td>
                            <td align="center">${v.akun_user}</td>
                            ${selOp}
                        </tr>
                    `;
                    $('#tabel-dk tbody').append(html);
                })                       
            },

            complete: function() {
                hideLoader()
            },
            error: function(e) {
                accessFailed(e.status);
            },
        });

    }

    // DCT HAPUS
    function hapusDataCatatanKantung(obj, id) {
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
                            url: '<?= base_url("order_laboratorium/api/order_laboratorium/apus_catatan_kantung") ?>/' + id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                if (data.status) {
                                    messageCustom(data.message, 'Success');
                                    removeList(obj);
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