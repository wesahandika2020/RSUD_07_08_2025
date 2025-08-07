<script>
    var nomer = 1;
    $(function() {

        nomer++;

        $("#wizard-resume-group").bwizard();

        // CPDPO WPT ALL
        $('#cpdpo_btn_expand_all').click(function() {
            $('.multi-collapse').addClass('show');
        });

        $('#cpdpo_btn_collapse_all').click(function() {
            $('.multi-collapse').removeClass('show');
        });


        // CPDPO 
        function showRiwayatPemakaianObat(num) {
            let html = bukaLebar('Form Riwayat Pemakaian Obat', num);
            html += /* html */ `
                <div class="table-responsive">
                    <div class="from-group">
                        <label for="rpo-alergi">Alergi : &nbsp;&nbsp;&nbsp; </label>
                        <input type="radio" name="alergii" id="alergii-2"class="mr-1 ml-1" value="0" checked> Tidak Ada
                        <input type="radio" name="alergii" id="alergii-1" class="mr-1 ml-2"value="1">Ada          
                        <input type="text" name="alergii_ob"id="alergii-3"class="custom-form clear-input d-inline-block col-lg-3 ml-2"placeholder="sebutkan">
                    </div>
                    <hr>
                    <table class="table table-sm table-striped table-bordered" style="margin-top: -15px" id="form-rpo">
                        <thead>
                            <tr>
                                <td class="center"></td>
                                <td class="center"></td>
                                <td class="center"></td>
                                <td class="center"></td>
                                <td class="center" colspan="2">Mulai</td>
                                <td class="center" colspan="2">Stop</td>
                                <td class="center"></td>
                                <td class="center"></td>
                            </tr>
                            <tr>
                                <td class="center">Nama Obat</td>
                                <td width="15%"class="center">Rute</td>
                                <td width="15%"class="center">Dosis</td>
                                <td width="15%"class="center">Frekuensi</td>
                                <td width="15%"class="center">Tanggal Mulai</td>
                                <td class="center">Dokter</td>
                                <td width="15%"class="center">Tanggal Stop</td>
                                <td class="center">Dokter</td>
                                <td width="15%"class="center">Efek Samping Obat</td>
                                <td width="15%"class="center">Review Farmasi</td>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td colspan="11" class="bold text-uppercase"></td>
                            </tr>
                            <tr>
                                <td class="center"><input type="text" name="nama_obat_rpo" id="nama-obat-rpo"class="select2c-input ml-2"></td>
                                <td class="center"><input type="text" name="rute_rpo" id="rute-rpo" class="custom-form clear-input d-inline-block" style="width: 100px;"></td>
                                <td class="center"><input type="text" name="dosis_rpo" id="dosis-rpo" class="custom-form clear-input d-inline-block" style="width: 100px;"></td>
                                <td class="center"><input type="text" name="frekuensi_rpo" id="frekuensi-rpo" class="custom-form clear-input d-inline-block" style="width: 100px;"></td>
                                <td class="center"><input type="text" name="tanggal_rpo" id="tanggal-rpo" class="custom-form clear-input d-inline-block" style="width: 100px;" placeholder="dd/mm/yyyy"></td>
                                <td class="center"><input type="text" name="dokter_1_rpo" id="dokter-1-rpo"class="select2c-input ml-2"></td>
                                <td class="center"><input type="text" name="tangggal_rpo" id="tangggal-rpo" class="custom-form clear-input d-inline-block" style="width: 100px;" placeholder="dd/mm/yyyy"></td>
                                <td class="center"><input type="text" name="dokter_2_rpo" id="dokter-2-rpo"class="select2c-input ml-2"></td>
                                <td class="center"><input type="text" name="eso_rpo" id="eso-rpo" class="custom-form clear-input d-inline-block" style="width: 100px;"></td>
                                <td class="center"><input type="text" name="r_farmasi_rpo" id="r-farmasi-rpo" class="custom-form clear-input d-inline-block" style="width: 100px;"></td>
                            </tr>

                            <tr>
                                <td colspan="11">
                                    <button type="button" title="Tambah Riwayat Pemakaian Obat" class="btn btn-info" onclick="tambahRiwayatPemakaianObat()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah Riwayat Pemakaian Obat</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>`;
            html += tutupRapet();
            $('#buka-tutup-rpo').append(html);
        }

        // CPDPO
        $('#data-riwayat-pemakaian-obat').one('click', function() {  
            $('#nama-obat-rpo, #nama-obat-rpo-edit')
                .select2c({
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
        })

        // CPDPO
        $('#data-riwayat-pemakaian-obat').one('click', function() {  
            $('#dokter-1-rpo, #dokter-2-rpo, #dokter-1-rpo-edit, #dokter-2-rpo-edit')
                .select2c({
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
                    return data.nama;
                }
            });
        })

        // CPDPO
        showRiwayatPemakaianObat(nomer); 


        // ILLIS
        function showRiwayatPemakaianObatInfus(num) {
            let html = bukaLebar('Form Infus Inhalasi Suppositoria', num);
            html += /* html */ `
                <div class="table-responsive">

                    <div class="from-group">
                        <label for="rpo-alergi">Alergi : &nbsp;&nbsp;&nbsp; </label>
                        <input type="radio" name="alergiii" id="alergiii-2"class="mr-1 ml-1" value="0" checked> Tidak Ada
                        <input type="radio" name="alergiii" id="alergiii-1" class="mr-1 ml-2"value="1">Ada          
                        <input type="text" name="alergii_obb"id="alergiii-3"class="custom-form clear-input d-inline-block col-lg-3 ml-2"placeholder="sebutkan">
                    </div>
                    <hr>
                    <table class="table table-sm table-striped table-bordered" style="margin-top: -15px" id="form-rpo-infus">
                        <thead>
                            <tr>
                                <th class="center"></th>
                                <th class="center"></th>
                                <th class="center"></th>
                                <th class="center"></th>
                                <th class="center" colspan="2">Mulai</th>
                                <th class="center" colspan="2">Stop</th>
                                <th class="center"></th>
                                <th class="center"></th>
                            </tr>
                            <tr>
                                <th class="center">Nama Obat</th>
                                <th class="center">Rute</th>
                                <th class="center">Dosis</th>
                                <th class="center">Frekuensi</th>
                                <th class="center">Tanggal Mulai</th>
                                <th class="center">Dokter</th>
                                <th class="center">Tanggal Stop</th>
                                <th class="center">Dokter</th>
                                <th class="center">Efek Samping Obat</th>
                                <th class="center">Review Farmasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="10" class="bold text-uppercase"></td>
                            </tr>
                            <tr>
                                <td class="center"><input type="text" name="nama_obat_rpoo" id="nama-obat-rpoo"class="select2c-input ml-2"></td>
                                <td class="center"><input type="text" name="rute_rpoo" id="rute-rpoo" class="custom-form clear-input d-inline-block" style="width: 100px;"></td>
                                <td class="center"><input type="text" name="dosis_rpoo" id="dosis-rpoo" class="custom-form clear-input d-inline-block" style="width: 100px;"></td>
                                <td class="center"><input type="text" name="frekuensi_rpoo" id="frekuensi-rpoo" class="custom-form clear-input d-inline-block" style="width: 100px;"></td>
                                <td class="center"><input type="text" name="tanggal_rpoo" id="tanggal-rpoo" class="custom-form clear-input d-inline-block" style="width: 100px;" placeholder="dd/mm/yyyy"></td>
                                <td class="center"><input type="text" name="dokter_1_rpoo" id="dokter-1-rpoo"class="select2c-input ml-2"></td>
                                <td class="center"><input type="text" name="tangggal_rpoo" id="tangggal-rpoo" class="custom-form clear-input d-inline-block" style="width: 100px;" placeholder="dd/mm/yyyy"></td>
                                <td class="center"><input type="text" name="dokter_2_rpoo" id="dokter-2-rpoo"class="select2c-input ml-2"></td>
                                <td class="center"><input type="text" name="eso_rpoo" id="eso-rpoo" class="custom-form clear-input d-inline-block" style="width: 100px;"></td>
                                <td class="center"><input type="text" name="r_farmasi_rpoo" id="r-farmasi-rpoo" class="custom-form clear-input d-inline-block" style="width: 100px;"></td>
                            </tr>

                            <tr>
                                <td colspan="10">
                                    <button type="button" title="Tambah Infus Inhalasi Suppositoria" class="btn btn-info" onclick="tambahRiwayatPemakaianObatInfus()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah Infus Inhalasi Suppositoria</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>`;
            html += tutupRapet();
            $('#buka-tutup-rpo-infus').append(html);
        }

        // ILLIS
        $('#data-riwayat-pemakaian-obat-infus').one('click', function() {  
            $('#nama-obat-rpoo, #nama-obat-rpoo-edit')
                .select2c({
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
        })

        // ILLIS
        $('#data-riwayat-pemakaian-obat-infus').one('click', function() {  
            $('#dokter-1-rpoo, #dokter-2-rpoo, #dokter-1-rpoo-edit, #dokter-2-rpoo-edit')
                .select2c({
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
                    return data.nama;
                }
            });
        })

        // ILLIS
        showRiwayatPemakaianObatInfus(nomer); 


        // WPT
        function showWaktuPemberianTanggal(num) {
            let html = bukaLebar('Form Waktu Pemberian Tanggal ', num);
            html += /* html */ `
                <div class="from-group">
                </div>
                <hr>
                <table class="table table-sm table-striped table-bordered" style="margin-top: -15px" id="form-wpt">
                    <thead>
                        <tr>
                            <th class="center">Tanggal</th>
                            <th class="center">Hari Ke</th>
                            <th class="center">Jam</th>
                            <th class="center">Perawat</th>
                            <th class="center">Pasien / Keluarga</th>
                            <th class="center">Pagi</th>
                            <th class="center">Siang</th>
                            <th class="center">Sore</th>
                            <th class="center">Malam</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="10" class="bold text-uppercase"></td>
                        </tr>
                        <tr>
                            <td class="center"><input type="text" name="tanggal_wpt" id="tanggal-wpt"class="custom-form clear-input d-inline-block col-lg-10" placeholder="dd/mm/yyyy"></td>
                            <td class="center"><input type="text" name="hari_wpt" id="hari-wpt"class="custom-form clear-input d-inline-block col-lg-10"></td>
                            <td class="center"><input type="text" name="jam_wpt" id="jam-wpt"class="custom-form clear-input d-inline-block col-lg-10"></td>
                            <td class="center"><input type="text" name="perawat_1_wpt" id="perawat-1-wpt"class="select2c-input ml-2"></td>
                            <td class="center"><input type="text" name="pasien_keluarga_wpt" id="pasien-keluarga-wpt"class="custom-form clear-input d-inline-block col-lg-10"></td>
                            <td class="center"><input type="checkbox" name="pagi_wpt" id="pagi-wpt"></td>
                            <td class="center"><input type="checkbox" name="siang_wpt" id="siang-wpt"></td>
                            <td class="center"><input type="checkbox" name="sore_wpt" id="sore-wpt"></td>
                            <td class="center"><input type="checkbox" name="malam_wpt" id="malam-wpt"></td>
                        </tr>
                        <tr>
                            <td colspan="8">
                                <button type="button" title="Tambah Waktu Pemberian Tanggal" class="btn btn-info" onclick="tambahWaktuPemberianTanggal()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah Waktu Pemberian Tanggal</button>
                            </td>
                        </tr>
                    </tbody>
                </table>`;
            html += tutupRapet();
            $('#buka-tutup-wpt').append(html);
        }

        // WPT
        $('#waktu-pemberian-tanggal').one('click', function() {  
            $('#perawat-1-wpt, #perawat-1-wpt-edit')
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

        // WPT 
        showWaktuPemberianTanggal(nomer); 



        // IWPT
        function showWaktuPemberianTanggalInfus(num) {
            let html = bukaLebar('Form Tanggal Infus Inhalasi Suppositoria ', num);
            html += /* html */ `
                <div class="from-group">
                </div>
                <hr>
                <table class="table table-sm table-striped table-bordered" style="margin-top: -15px" id="form-wpt-infus">
                    <thead>
                        <tr>
                            <th class="center">Tanggal</th>
                            <th class="center">Hari Ke</th>
                            <th class="center">Jam</th>
                            <th class="center">Perawat</th>
                            <th class="center">Pasien / Keluarga</th>
                            <th class="center">Pagi</th>
                            <th class="center">Siang</th>
                            <th class="center">Sore</th>
                            <th class="center">Malam</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="10" class="bold text-uppercase"></td>
                        </tr>
                        <tr>
                            <td class="center"><input type="text" name="tanggal_wptt" id="tanggal-wptt"class="custom-form clear-input d-inline-block col-lg-10" placeholder="dd/mm/yyyy"></td>
                            <td class="center"><input type="text" name="hari_wptt" id="hari-wptt"class="custom-form clear-input d-inline-block col-lg-10"></td>
                            <td class="center"><input type="text" name="jam_wptt" id="jam-wptt"class="custom-form clear-input d-inline-block col-lg-10"></td>
                            <td class="center"><input type="text" name="perawat_2_wptt" id="perawat-2-wptt"class="select2c-input ml-2"></td>
                            <td class="center"><input type="text" name="pasien_keluarga_wptt" id="pasien-keluarga-wptt"class="custom-form clear-input d-inline-block col-lg-10"></td>
                            <td class="center"><input type="checkbox" name="pagi_wptt" id="pagi-wptt"></td>
                            <td class="center"><input type="checkbox" name="siang_wptt" id="siang-wptt"></td>
                            <td class="center"><input type="checkbox" name="sore_wptt" id="sore-wptt"></td>
                            <td class="center"><input type="checkbox" name="malam_wptt" id="malam-wptt"></td>
                        </tr>
                        <tr>
                            <td colspan="8">
                                <button type="button" title="Tambah Infus Inhalasi Suppositoria" class="btn btn-info" onclick="tambahWaktuPemberianTanggalInfus()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah Infus Inhalasi Suppositoria</button>
                            </td>
                        </tr>
                    </tbody>
                </table>`;
            html += tutupRapet();
            $('#buka-tutup-wpt-infus').append(html);
        }

        // IWPT
        $('#waktu-pemberian-tanggal-infus').one('click', function() {  
            $('#perawat-2-wptt, #perawat-2-wptt-edit')
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

        // IWPT
        showWaktuPemberianTanggalInfus(nomer); 

          // CPDPO // ILLIS Tanggal 
        $('#tanggal-rpo, #tanggal-rpo-edit, #tangggal-rpo, #tangggal-rpo-edit, #tanggal-rpoo, #tanggal-rpoo-edit, #tangggal-rpoo, #tangggal-rpoo-edit')
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

        // WPT // IWPT
        $('#jam-wpt, #jam-wptt, #jam-wpt-edit, #jam-wptt-edit')
        .on('click', function() {
            $(this).timepicker({
                format: 'HH:mm',
                showInputs: false,
                showMeridian: false
            });
        })

        // WPT  // IWPT
        $('#tanggal-wpt, #tanggal-wptt, #tanggal-wpt-edit, #tanggal-wptt-edit')
        .datetimepicker({
            format: 'DD/MM/YYYY',
            maxDate: new Date(),
            beforeShow: function(i) {
                if ($(i).attr('readonly')) {
                    return false;
                }
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

    function lihatFORM_KEP_80_02(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'lihat';
        entriCatatanPemberianObat(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function editFORM_KEP_80_02(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'edit';
        entriCatatanPemberianObat(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function tambahFORM_KEP_80_02(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'tambah';
        entriCatatanPemberianObat(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function entriCatatanPemberianObat(id_pendaftaran, id_layanan_pendaftaran, bed, action) {

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
            url: '<?= base_url("pelayanan/api/pelayanan/get_data_entri_catatan_pemberian_dan_pemantauan_obat") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader()
            },
            success: function(data) {               
                resetFormCatatanPemberianObat();
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

                // CPDPO 4
                if (typeof data.riwayat_pemakaian_obat !== 'undefined' || data.riwayat_pemakaian_obat !== null) {
                    showRiwayatPemakaianObat(data.riwayat_pemakaian_obat, id_pendaftaran, id_layanan_pendaftaran, bed);
                } else {
                    $('#tabel-rpo .body-table').empty();
                }

                
                // ILLIS
                if (typeof data.riwayat_pemakaian_obat_infus !== 'undefined' || data.riwayat_pemakaian_obat_infus !== null) {
                    showRiwayatPemakaianObatInfus(data.riwayat_pemakaian_obat_infus, id_pendaftaran, id_layanan_pendaftaran, bed);
                } else {
                    $('#tabel-rpo-infus .body-table').empty();
                }

                // WPT 
                if (typeof data.waktu_pemberian_tanggal !== 'undefined' || data.waktu_pemberian_tanggal !== null) {
                    showWaktuPemberianTanggal(data.waktu_pemberian_tanggal, id_pendaftaran, id_layanan_pendaftaran, bed);
                } else {
                    $('#tabel-wpt .body-table').empty();
                }

                // IWPT 
                if (typeof data.waktu_pemberian_tanggal_infus !== 'undefined' || data.waktu_pemberian_tanggal_infus !== null) {
                    showWaktuPemberianTanggalInfus(data.waktu_pemberian_tanggal_infus, id_pendaftaran, id_layanan_pendaftaran, bed);
                } else {
                    $('#tabel-wpt-infus .body-table').empty();
                }


                $('#ek_bed').text(bed);

                $('.ek-logo-pasien-alergi').hide();
                if (data.profil !== null) {
                    if (data.profil.is_alergi == 'Ya') {
                        $('.ek-logo-pasien-alergi').show();
                    }
                }

                $('#modal_catatan_pemberian_obat').modal('show');
            },
            complete: function() {
                hideLoader()
            },
            error: function(e) {
                accessFailed(e.status);
            },
        });
    }

    // CPDPO
    function editRiwayatPemakaianObat(obj, id, id_pendaftaran, id_layanan_pendaftaran, bed) {
        const modal = $('#modal-edit-riwayat-pemakaian-obat');
        $('#update-rpo').children().remove();
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_riwayat_pemakaian_obat") ?>/id/' +
                id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                // console.log(data);
                $('#update-rpo').empty();
                $('#id-riwayat-pemakaian-obat').val(id);
                let cttntndkn = '';
                cttntndkn =
                    `  <button type="button" class="btn btn-secondary waves-effect" onclick="$('#modal-edit-riwayat-pemakaian-obat').modal('hide');"><i class="fas fa-times-circle mr-1"></i>Tutup</button>
                            <button type="button" class="btn btn-info waves-effect" onclick="updateRiwayatPemakaianObat(${id_pendaftaran}, ${id_layanan_pendaftaran}, '${bed}')"><i class="fas fa-save mr-1"></i>Update</button>`;
                $('#update-rpo').append(cttntndkn);
                data.alergii == '1' ? $('#alergii-1-edit').prop('checked', true) : $('#alergii-1-edit').prop('checked', false);
                data.alergii == '0' ? $('#alergii-2-edit').prop('checked', true) : $('#alergii-2-edit').prop('checked', false);
                $('#alergii-3-edit').val(data.alergii_ob);
                $('#rute-rpo-edit').val(data.rute_rpo);
                $('#dosis-rpo-edit').val(data.dosis_rpo);
                $('#frekuensi-rpo-edit').val(data.frekuensi_rpo);
                $('#eso-rpo-edit').val(data.eso_rpo);
                $('#r-farmasi-rpo-edit').val(data.r_farmasi_rpo);
                $('#tanggal-rpo-edit').val(data.tanggal_rpo);
                $('#tangggal-rpo-edit').val(data.tangggal_rpo);
                $('#nama-obat-rpo-edit').val(data.nama_obat_rpo);
                $('#s2id_nama-obat-rpo-edit a .select2c-chosen').html(data.nama_obat_1);
                $('#dokter-1-rpo-edit').val(data.dokter_1_rpo);
                $('#s2id_dokter-1-rpo-edit a .select2c-chosen').html(data.nama_dokter_1);
                $('#dokter-2-rpo-edit').val(data.dokter_2_rpo);
                $('#s2id_dokter-2-rpo-edit a .select2c-chosen').html(data.nama_dokter_2);

                modal.modal('show');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })
    }

    // CPDPO
    function showRiwayatPemakaianObat(data, id_pendaftaran, id_layanan_pendaftaran, bed) {
        $('#tabel-rpo .body-table').empty();
        if (data !== null) {
            $.each(data, function(i, v) {
                const selOp =
                    '<td align="center"><button type="button" class="btn btn-success btn-xs"onclick="editRiwayatPemakaianObat(this, ' + v.id + ', ' + id_pendaftaran + ', ' + id_layanan_pendaftaran + ', \'' + bed +
                    '\')"><i class="fas fa-edit" ></i> </button> <button type="button" class="btn btn-danger btn-xs"onclick="hapusRiwayatPemakaianObat($(this),' + v.id + ')"> <i class="fas fa-trash-alt"></i> </button> </td>';

                let html = /* html */ `
                    <tr>
                        <td class="number-terapi" align="center">${(++i)}</td>
                        <td class="center">${v.alergii == '1' ? 'ada' : 'tidak ada'}</td>
                        <td align="center">${v.alergii_ob || '-'}</td>
                        <td align="center">${v.nama_obat_1 || '-'}</td>
                        <td align="center">${v.rute_rpo || '-'}</td>
                        <td align="center">${v.dosis_rpo || '-'}</td>
                        <td align="center">${v.frekuensi_rpo || '-'}</td>
                        <td class="center">${v.tanggal_rpo ? datefmysql(v.tanggal_rpo) : '-'}</td>
                        <td align="center">${v.nama_dokter_1 || '-'}</td>
                        <td class="center">${v.tangggal_rpo ? datefmysql(v.tangggal_rpo) : '-'}</td>
                        <td align="center">${v.nama_dokter_2 || '-'}</td>
                        <td align="center">${v.eso_rpo || '-'}</td>                   
                        <td align="center">${v.r_farmasi_rpo || '-'}</td>
                        <td align="center">${v.akun_user}</td>
                        ${selOp}
                        <td align="center"></td>
                    </tr>
                         
                `;
                $('#tabel-rpo .body-table').append(html);
                numberRpo = i;
            })
        }
    }

    // CPDPO
    function updateRiwayatPemakaianObat(id_pendaftaran, id_layanan_pendaftaran, bed) {
        $.ajax({
            type: 'PUT',
            url: '<?= base_url("pelayanan/api/pelayanan/update_riwayat_pemakaian_obat") ?>',
            data: $('#form-edit-riwayat-pemakaian-obat').serialize(),
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                if (data.status) {
                    messageEditSuccess();
                    entriCatatanPemberianObat(id_pendaftaran, id_layanan_pendaftaran, bed);
                } else {
                    messageEditFailed();
                }
                $('#modal-edit-riwayat-pemakaian-obat').modal('hide');
            },
            error: function(e) {
                messageEditFailed();
            }
        });
    }

    // CPDPO
    if (typeof numberRpo === 'undefined') {
        var numberRpo = 1;
    }
    function tambahRiwayatPemakaianObat() {

        if ($('#tanggal-rpo').val() === '') {
            syams_validation('#tanggal-rpo', 'Tanggal harus di isi.');
            return false;
        } else {
            syams_validation_remove('#tanggal-rpo');
        }

        if ($('#dokter-1-rpo').val() === '') {
            syams_validation('#dokter-1-rpo', 'Nama Dokter belum diisi.');
            return false;
        } else {
            syams_validation_remove('#dokter-1-rpo');
        }          
        let html = '';
        // atas
        let alergii_1= $('#alergii-1').is(':checked');
        let alergii_2 = $('#alergii-2').is(':checked');
        let alergii_ob = $('#alergii-3').val();
        let nama_obat_1 = $('#s2id_nama-obat-rpo a .select2c-chosen').html();
        let nama_obat_rpo = $('#nama-obat-rpo').val();
        let rute_rpo = $('#rute-rpo').val();
        let dosis_rpo = $('#dosis-rpo').val();
        let frekuensi_rpo = $('#frekuensi-rpo').val();
        let tanggal_rpo = $('#tanggal-rpo').val();
        let nama_dokter_1 = $('#s2id_dokter-1-rpo a .select2c-chosen').html();
        let dokter_1_rpo = $('#dokter-1-rpo').val();
        let tangggal_rpo = $('#tangggal-rpo').val();
        let nama_dokter_2 = $('#s2id_dokter-2-rpo a .select2c-chosen').html();
        let dokter_2_rpo = $('#dokter-2-rpo').val();       
        let eso_rpo = $('#eso-rpo').val();
        let r_farmasi_rpo = $('#r-farmasi-rpo').val();

        html = /* html */ `
            <tr class="row-in-${++numberRpo}">
                <td class="number-pengkajian" align="center">${numberRpo}</td>
                <td align="center">
                   ${alergii_1 ?'ada' : 'tidak ada'}
                    <input type="hidden" name="alergii[]" value="${alergii_1 ? 1 : 0}">
                </td>
                <td align="center">
                    <input type="hidden" name="alergii_ob[]" value="${alergii_ob}">${alergii_ob}
                </td>
                <td align="center">
                    <input type="hidden" name="nama_obat_rpo[]" value="${nama_obat_rpo}">${nama_obat_1}
                </td>
                <td align="center">
                    <input type="hidden" name="rute_rpo[]" value="${rute_rpo}">${rute_rpo}
                </td>
                <td align="center">
                    <input type="hidden" name="dosis_rpo[]" value="${dosis_rpo}">${dosis_rpo}
                </td>
                <td align="center">
                    <input type="hidden" name="frekuensi_rpo[]" value="${frekuensi_rpo}">${frekuensi_rpo}
                </td>
                <td align="center">
                    <input type="hidden" name="tanggal_rpo[]" value="${tanggal_rpo}">${tanggal_rpo}
                </td>
                 
                <td align="center">
                    <input type="hidden" name="dokter_1_rpo[]" value="${dokter_1_rpo}">${nama_dokter_1}
                </td>
                <td align="center">
                    <input type="hidden" name="tangggal_rpo[]" value="${tangggal_rpo}">${tangggal_rpo}
                </td>
                <td align="center">
                    <input type="hidden" name="dokter_2_rpo[]" value="${dokter_2_rpo}">${nama_dokter_2}
                </td>
                <td align="center">
                    <input type="hidden" name="eso_rpo[]" value="${eso_rpo}">${eso_rpo}
                </td>
                <td align="center">
                    <input type="hidden" name="r_farmasi_rpo[]" value="${r_farmasi_rpo}">${r_farmasi_rpo}
                </td>
                <td align="center">
                    <?= $this->session->userdata('nama') ?>
                    <input type="hidden" name="user_pengkajian[]" value="<?= $this->session->userdata("id_translucent") ?>">
                    <input type="hidden" name="pencegahan_date_rpo[]" value="<?= date("Y-m-d H:i:s") ?>">                   
                </td>
                   
                <td align="center">
                    <button type="button" id="pepel" class="btn btn-secondary btn-xxs" onclick="(() => {$(this).parent().parent().next().addBack().remove(); numberRpo--;})()"><i class="fas fa-trash-alt"></i></button>
                </td>  
                
            </tr>       
        `;
        $('#tabel-rpo .body-table').append(html);
    }

    // CPDPO
    function hapusRiwayatPemakaianObat(obj, id) {
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
                            url: '<?= base_url("pelayanan/api/pelayanan/hapus_riwayat_pemakaian_obat") ?>/' +
                                id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                if (data.status) {
                                    messageCustom(data.message, 'Success');
                                    // obj.parent().parent().next().addBack().remove();
                                    obj.parent().parent().remove();                              
                                } else {
                                    customAlert('Hapus Riwayat Pemakaian Obat', data
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




    // ILLIS
    function editRiwayatPemakaianObatInfus(obj, id, id_pendaftaran, id_layanan_pendaftaran, bed) {
        const modal = $('#modal-edit-riwayat-pemakaian-obat-infus');
        $('#update-rpo-infus').children().remove();
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_riwayat_pemakaian_obat_infus") ?>/id/' +
                id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#update-rpo-infus').empty();
                $('#id-riwayat-pemakaian-obat-infus').val(id);
                let cttntndkn = '';
                cttntndkn =
                    `  <button type="button" class="btn btn-secondary waves-effect" onclick="$('#modal-edit-riwayat-pemakaian-obat-infus').modal('hide');"><i class="fas fa-times-circle mr-1"></i>Tutup</button>
                            <button type="button" class="btn btn-info waves-effect" onclick="updateRiwayatPemakaianObatInfus(${id_pendaftaran}, ${id_layanan_pendaftaran}, '${bed}')"><i class="fas fa-save mr-1"></i>Update</button>`;
                $('#update-rpo-infus').append(cttntndkn);
 
                data.alergii == '1' ? $('#alergiii-1-edit').prop('checked', true) : $('#alergii-1-edit').prop('checked', false);
                data.alergii == '0' ? $('#alergiii-2-edit').prop('checked', true) : $('#alergii-2-edit').prop('checked', false);
                $('#alergiii-3-edit').val(data.alergii_obb);
                $('#rute-rpo-edit').val(data.rute_rpo);
                $('#dosis-rpo-edit').val(data.dosis_rpo);
                $('#frekuensi-rpo-edit').val(data.frekuensi_rpo);
                $('#eso-rpo-edit').val(data.eso_rpo);
                $('#r-farmasi-rpo-edit').val(data.r_farmasi_rpo);
                $('#rute-rpoo-edit').val(data.rute_rpoo);
                $('#dosis-rpoo-edit').val(data.dosis_rpoo);
                $('#frekuensi-rpoo-edit').val(data.frekuensi_rpoo);
                $('#eso-rpoo-edit').val(data.eso_rpoo);
                $('#r-farmasi-rpoo-edit').val(data.r_farmasi_rpoo);
                $('#tanggal-rpoo-edit').val(data.tanggal_rpoo);
                $('#tangggal-rpoo-edit').val(data.tangggal_rpoo);
                $('#nama-obat-rpoo-edit').val(data.nama_obat_rpoo);
                $('#s2id_nama-obat-rpoo-edit a .select2c-chosen').html(data.nama_obat_2);
                $('#dokter-1-rpoo-edit').val(data.dokter_1_rpoo);
                $('#s2id_dokter-1-rpoo-edit a .select2c-chosen').html(data.nama_dokter_3);
                $('#dokter-2-rpoo-edit').val(data.dokter_2_rpoo);
                $('#s2id_dokter-2-rpoo-edit a .select2c-chosen').html(data.nama_dokter_4);
                modal.modal('show');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })
    }
  
    // ILLIS
    function showRiwayatPemakaianObatInfus(data, id_pendaftaran, id_layanan_pendaftaran, bed) {
        $('#tabel-rpo-infus .body-table').empty();
        if (data !== null) {
            $.each(data, function(i, v) {
                const selOp =
                    '<td align="center"><button type="button" class="btn btn-success btn-xs"onclick="editRiwayatPemakaianObatInfus(this, ' + v.id + ', ' + id_pendaftaran + ', ' + id_layanan_pendaftaran + ', \'' + bed +
                    '\')"><i class="fas fa-edit" ></i> </button> <button type="button" class="btn btn-danger btn-xs"onclick="hapusRiwayatPemakaianObatInfus($(this),' + v.id + ')"> <i class="fas fa-trash-alt"></i> </button> </td>';

                let html = /* html */ `
                    <tr>                    
                        <td class="number-terapi" align="center">${(++i)}</td>
                        <td class="center">${v.alergiii == '1' ? 'ada' : 'tidak ada'}</td>
                        <td align="center">${v.alergii_obb || '-'}</td>
                        <td align="center">${v.nama_obat_2 || '-'}</td>
                        <td align="center">${v.rute_rpoo || '-'}</td>
                        <td align="center">${v.dosis_rpoo || '-'}</td>
                        <td align="center">${v.frekuensi_rpoo || '-'}</td>
                        <td class="center">${v.tanggal_rpoo ? datefmysql(v.tanggal_rpoo) : '-'}</td>
                        <td align="center">${v.nama_dokter_3 || '-'}</td>
                        <td class="center">${v.tangggal_rpoo ? datefmysql(v.tangggal_rpoo) : '-'}</td>
                        <td align="center">${v.nama_dokter_4 || '-'}</td>
                        <td align="center">${v.eso_rpoo || '-'}</td>                   
                        <td align="center">${v.r_farmasi_rpoo || '-'}</td>
                        <td align="center">${v.akun_user}</td>
                        ${selOp}
                        <td align="center"></td>>
                    </tr>                           
                `;
                $('#tabel-rpo-infus .body-table').append(html);
                numberRpoi = i;
            })
        }
    }

    // ILLIS
    function updateRiwayatPemakaianObatInfus(id_pendaftaran, id_layanan_pendaftaran, bed) {
        $.ajax({
            type: 'PUT',
            url: '<?= base_url("pelayanan/api/pelayanan/update_riwayat_pemakaian_obat_infus") ?>',
            data: $('#form-edit-riwayat-pemakaian-obat-infus').serialize(),
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                if (data.status) {
                    messageEditSuccess();
                    entriCatatanPemberianObat(id_pendaftaran, id_layanan_pendaftaran, bed);
                } else {
                    messageEditFailed();
                }
                $('#modal-edit-riwayat-pemakaian-obat-infus').modal('hide');
            },
            error: function(e) {
                messageEditFailed();
            }
        });
    }

    // ILLIS
    if (typeof numberRpof === 'undefined') {
        var numberRpof = 1;
    }
    function tambahRiwayatPemakaianObatInfus() {
        // console.log('kontol')    
        if ($('#tanggal-rpoo').val() === '') {
            syams_validation('#tanggal-rpoo', 'Tanggal harus di isi.');
            return false;
        } else {
            syams_validation_remove('#tanggal-rpoo');
        }

        if ($('#dokter-1-rpoo').val() === '') {
            syams_validation('#dokter-1-rpoo', 'Nama Dokter belum diisi.');
            return false;
        } else {
            syams_validation_remove('#dokter-1-rpoo');
        }          
        let html = '';
        // atas
        let alergiii_3= $('#alergiii-1').is(':checked');
        let alergiii_4 = $('#alergiii-2').is(':checked');
        let alergii_obb = $('#alergiii-3').val();
        let nama_obat_2 = $('#s2id_nama-obat-rpoo a .select2c-chosen').html();
        let nama_obat_rpoo = $('#nama-obat-rpoo').val();
        let rute_rpoo = $('#rute-rpoo').val();
        let dosis_rpoo = $('#dosis-rpoo').val();
        let frekuensi_rpoo = $('#frekuensi-rpoo').val();
        let tanggal_rpoo = $('#tanggal-rpoo').val();
        let nama_dokter_3 = $('#s2id_dokter-1-rpoo a .select2c-chosen').html();
        let dokter_1_rpoo = $('#dokter-1-rpoo').val();
        let tangggal_rpoo = $('#tangggal-rpoo').val();
        let nama_dokter_4 = $('#s2id_dokter-2-rpoo a .select2c-chosen').html();
        let dokter_2_rpoo = $('#dokter-2-rpoo').val();       
        let eso_rpoo = $('#eso-rpoo').val();
        let r_farmasi_rpoo = $('#r-farmasi-rpoo').val();
        html = /* html */ `
            <tr class="row-in-${++numberRpof}">
                <td class="number-pengkajian" align="center">${numberRpof}</td>

                <td align="center">
                ${alergiii_3 ?'ada' : 'tidak ada'}
                    <input type="hidden" name="alergiii[]" value="${alergiii_3 ? 1 : 0}">
                </td>

                <td align="center">
                    <input type="hidden" name="alergii_obb[]" value="${alergii_obb}">${alergii_obb}
                </td>   
                <td align="center">
                    <input type="hidden" name="nama_obat_rpoo[]" value="${nama_obat_rpoo}">${nama_obat_2}
                </td>
                <td align="center">
                    <input type="hidden" name="rute_rpoo[]" value="${rute_rpoo}">${rute_rpoo}
                </td>
                <td align="center">
                    <input type="hidden" name="dosis_rpoo[]" value="${dosis_rpoo}">${dosis_rpoo}
                </td>
                <td align="center">
                    <input type="hidden" name="frekuensi_rpoo[]" value="${frekuensi_rpoo}">${frekuensi_rpoo}
                </td>
                <td align="center">
                    <input type="hidden" name="tanggal_rpoo[]" value="${tanggal_rpoo}">${tanggal_rpoo}
                </td>                 
                <td align="center">
                    <input type="hidden" name="dokter_1_rpoo[]" value="${dokter_1_rpoo}">${nama_dokter_3}
                </td>
                <td align="center">
                    <input type="hidden" name="tangggal_rpoo[]" value="${tangggal_rpoo}">${tangggal_rpoo}
                </td>
                <td align="center">
                    <input type="hidden" name="dokter_2_rpoo[]" value="${dokter_2_rpoo}">${nama_dokter_4}
                </td>
                <td align="center">
                    <input type="hidden" name="eso_rpoo[]" value="${eso_rpoo}">${eso_rpoo}
                </td>
                <td align="center">
                    <input type="hidden" name="r_farmasi_rpoo[]" value="${r_farmasi_rpoo}">${r_farmasi_rpoo}
                </td>                   
            
                <td align="center">
                    <?= $this->session->userdata('nama') ?>
                    <input type="hidden" name="user_pengkajian[]" value="<?= $this->session->userdata("id_translucent") ?>">
                    <input type="hidden" name="pencegahan_date_rpo_infus[]" value="<?= date("Y-m-d H:i:s") ?>">                   
                </td>
                <td align="center">
                    <button type="button" id="pepel" class="btn btn-secondary btn-xxs" onclick="(() => {$(this).parent().parent().next().addBack().remove(); numberRpof--;})()"><i class="fas fa-trash-alt"></i></button>
                </td>               
            </tr>     
        `;
        $('#tabel-rpo-infus .body-table').append(html);
    }

    // ILLIS
    function hapusRiwayatPemakaianObatInfus(obj, id) {
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
                            url: '<?= base_url("pelayanan/api/pelayanan/hapus_riwayat_pemakaian_obat_infus") ?>/' +
                                id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                if (data.status) {
                                    messageCustom(data.message, 'Success');
                                    obj.parent().parent().remove();                                                                                                 
                                } else {
                                    customAlert('Hapus Infus Inhalasi Suppositoria', data
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




    // WPT  
    function editWaktuPemberianTanggal(obj, id, id_pendaftaran, id_layanan_pendaftaran, bed) {
        const modal = $('#modal-edit-waktu-pemberian-tanggal');
        $('#update-wpt').children().remove();
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_waktu_pemberian_tanggal") ?>/id/' +
                id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#update-wpt').empty();
                $('#id-waktu-pemberian-tanggal').val(id);
                let cttntndkn = '';
                cttntndkn =
                    `  <button type="button" class="btn btn-secondary waves-effect" onclick="$('#modal-edit-waktu-pemberian-tanggal').modal('hide');"><i class="fas fa-times-circle mr-1"></i>Tutup</button>
                            <button type="button" class="btn btn-info waves-effect" onclick="updateWaktuPemberianTanggal(${id_pendaftaran}, ${id_layanan_pendaftaran}, '${bed}')"><i class="fas fa-save mr-1"></i>Update</button>`;
                $('#update-wpt').append(cttntndkn);
                $('#hari-wpt-edit').val(data.hari_wpt);
                $('#jam-wpt-edit').val(data.jam_wpt);
                $('#pasien-keluarga-wpt-edit').val(data.pasien_keluarga_wpt);
                data.pagi_wpt == '1' ? $('#pagi-wpt-edit').prop('checked', true) : $('#pagi-wpt-edit').prop('checked', false);
                data.siang_wpt == '1' ? $('#siang-wpt-edit').prop('checked', true) : $('#siang-wpt-edit').prop('checked', false);
                data.sore_wpt == '1' ? $('#sore-wpt-edit').prop('checked', true) : $('#sore-wpt-edit').prop('checked', false);
                data.malam_wpt == '1' ? $('#malam-wpt-edit').prop('checked', true) : $('#malam-wpt-edit').prop('checked', false);
                $('#tanggal-wpt-edit').val(data.tanggal_wpt);
                $('#perawat-1-wpt-edit').val(data.perawat_1_wpt);
                $('#s2id_perawat-1-wpt-edit a .select2c-chosen').html(data.nama_perawat_1);
                modal.modal('show');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })
    }

    // <td class="center">${v.siang_wpt == '1' ? '&check;' : '&#10006;'}</td>
    // WPT  
    function showWaktuPemberianTanggal(data, id_pendaftaran, id_layanan_pendaftaran, bed) {
        $('#tabel-wpt .body-table').empty();
        if (data !== null) {
            $.each(data, function(i, v) {
                const selOp =

                     '<td align="center"><button type="button" class="btn btn-success btn-xs"onclick="editWaktuPemberianTanggal(this, ' + v.id + ', ' + id_pendaftaran + ', ' + id_layanan_pendaftaran + ', \'' + bed +
                    '\')"><i class="fas fa-edit" ></i> </button> <button type="button" class="btn btn-danger btn-xs" onclick="hapusWaktuPemberianTanggal($(this),' + v.id + ')"> <i class="fas fa-trash-alt"></i> </button> </td>';                               
                let html = /* html */ `
                    <tr>
                        <td class="number-terapi" align="center">${(++i)}</td>
                        <td class="center">${v.tanggal_wpt ? datefmysql(v.tanggal_wpt) : '-'}</td>
                        <td align="center">${v.hari_wpt || '-'}</td>
                        <td align="center">${v.jam_wpt || '-'}</td>
                        <td align="center">${v.nama_perawat_1 || '-'}</td>
                        <td align="center">${v.pasien_keluarga_wpt || '-'}</td>        
                        <td class="center">${v.pagi_wpt == '1' ? '&check;' : '-'}</td>
                        <td class="center">${v.siang_wpt == '1' ? '&check;' : '-'}</td>
                        <td class="center">${v.sore_wpt == '1' ? '&check;' : '-'}</td>
                        <td class="center">${v.malam_wpt == '1' ? '&check;' : '-'}</td>
                        <td align="center">${v.akun_user}</td>
                        ${selOp}
                        <td align="center"></td>
                    </tr>              
                `;
                $('#tabel-wpt .body-table').append(html);
                numberWpt = i;
            })
        }
    }

    // WPT 
    function updateWaktuPemberianTanggal(id_pendaftaran, id_layanan_pendaftaran, bed) {
        $.ajax({
            type: 'PUT',
            url: '<?= base_url("pelayanan/api/pelayanan/update_waktu_pemberian_tanggal") ?>',
            data: $('#form-edit-waktu-pemberian-tanggal').serialize(),
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                if (data.status) {
                    messageEditSuccess();
                    entriCatatanPemberianObat(id_pendaftaran, id_layanan_pendaftaran, bed);
                } else {
                    messageEditFailed();
                }
                $('#modal-edit-waktu-pemberian-tanggal').modal('hide');
            },
            error: function(e) {
                messageEditFailed();
            }
        });
    }

    // WPT 
    if (typeof numberWpt === 'undefined') {
        var numberWpt = 1;
    }
    function tambahWaktuPemberianTanggal() {
        // console.log('addBack')   
        if ($('#tanggal-wpt').val() === '') {
            syams_validation('#tanggal-wpt', 'Tanggal harus diisi.');
            return false;
        } else {
            syams_validation_remove('#tanggal-wpt');
        }
        if ($('#perawat-1-wpt').val() === '') {
            syams_validation('#perawat-1-wpt', 'Nama Perawat belum diisi.');
            return false;
        } else {
            syams_validation_remove('#perawat-1-wpt');
        }             
        let html = '';
        // atas
        let tanggal_wpt = $('#tanggal-wpt').val();
        let hari_wpt = $('#hari-wpt').val();
        let jam_wpt = $('#jam-wpt').val();
        let nama_perawat_1 = $('#s2id_perawat-1-wpt a .select2c-chosen').html();
        let perawat_1_wpt = $('#perawat-1-wpt').val();
        let pasien_keluarga_wpt = $('#pasien-keluarga-wpt').val();
        let pagi_wpt = $('#pagi-wpt').is(':checked');
        let siang_wpt = $('#siang-wpt').is(':checked');
        let sore_wpt = $('#sore-wpt').is(':checked');
        let malam_wpt = $('#malam-wpt').is(':checked');
        html = /* html */ `
            <tr class="row-in-${++numberWpt}">
                <td class="number-pengkajian" align="center">${numberWpt}</td>
                <td align="center">
                    <input type="hidden" name="tanggal_wpt[]" value="${tanggal_wpt}">${tanggal_wpt}
                </td>
                <td align="center">
                    <input type="hidden" name="hari_wpt[]" value="${hari_wpt}">${hari_wpt}
                </td>
                <td align="center">
                    <input type="hidden" name="jam_wpt[]" value="${jam_wpt}">${jam_wpt}
                </td>
                <td align="center">
                    <input type="hidden" name="perawat_1_wpt[]" value="${perawat_1_wpt}">${nama_perawat_1}
                </td>
                <td align="center">
                    <input type="hidden" name="pasien_keluarga_wpt[]" value="${pasien_keluarga_wpt}">${pasien_keluarga_wpt}
                </td>
                <td class="center">
                    <input type="hidden" name="pagi_wpt[]" value="${pagi_wpt ? 1 : 0}">${pagi_wpt ? '&check;' : '&#10006;'}
                </td>
                <td class="center">
                    <input type="hidden" name="siang_wpt[]" value="${siang_wpt ? 1 : 0}">${siang_wpt ? '&check;' : '&#10006;'}
                </td>
                <td class="center">
                    <input type="hidden" name="sore_wpt[]" value="${sore_wpt ? 1 : 0}">${sore_wpt ? '&check;' : '&#10006;'}
                </td>
                <td class="center">
                    <input type="hidden" name="malam_wpt[]" value="${malam_wpt ? 1 : 0}">${malam_wpt ? '&check;' : '&#10006;'}
                </td>
                <td align="center">
                    <?= $this->session->userdata('nama') ?>
                    <input type="hidden" name="user_pengkajian[]" value="<?= $this->session->userdata("id_translucent") ?>">
                    <input type="hidden" name="pencegahan_date_wpt[]" value="<?= date("Y-m-d H:i:s") ?>">                   
                </td>
                <td align="center">
                    <button type="button" id="pepel" class="btn btn-secondary btn-xxs" onclick="(() => {$(this).parent().parent().next().addBack().remove(); numberWpt--;})()"><i class="fas fa-trash-alt"></i></button>
                </td>              
            </tr>  
        `;
        $('#tabel-wpt .body-table').append(html);
    }

    // WPT
    function hapusWaktuPemberianTanggal(obj, id) {
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
                            url: '<?= base_url("pelayanan/api/pelayanan/hapus_waktu_pemberian_tanggal") ?>/' +
                                id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                if (data.status) {
                                    messageCustom(data.message, 'Success');
                                    obj.parent().parent().remove();                                                                                                   
                                } else {
                                    customAlert('Hapus Waktu Pemberian Tanggal', data
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




    // IWPT  
    function editWaktuPemberianTanggalInfus(obj, id, id_pendaftaran, id_layanan_pendaftaran, bed) {
        const modal = $('#modal-edit-waktu-pemberian-tanggal-infus');
        $('#update-wpt-infus').children().remove();
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_waktu_pemberian_tanggal_infus") ?>/id/' +
                id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                // console.log(split);
                $('#update-wpt-infus').empty();
                $('#id-waktu-pemberian-tanggal-infus').val(id);
                let cttntndkn = '';
                cttntndkn =
                    `  <button type="button" class="btn btn-secondary waves-effect" onclick="$('#modal-edit-waktu-pemberian-tanggal-infus').modal('hide');"><i class="fas fa-times-circle mr-1"></i>Tutup</button>
                            <button type="button" class="btn btn-info waves-effect" onclick="updateWaktuPemberianTanggalInfus(${id_pendaftaran}, ${id_layanan_pendaftaran}, '${bed}')"><i class="fas fa-save mr-1"></i>Update</button>`;
                $('#update-wpt-infus').append(cttntndkn);

                $('#hari-wptt-edit').val(data.hari_wptt);
                $('#jam-wptt-edit').val(data.jam_wptt);
                $('#pasien-keluarga-wptt-edit').val(data.pasien_keluarga_wptt);
                data.pagi_wptt == '1' ? $('#pagi-wptt-edit').prop('checked', true) : $('#pagi-wptt-edit').prop('checked', false);
                data.siang_wptt == '1' ? $('#siang-wptt-edit').prop('checked', true) : $('#siang-wptt-edit').prop('checked', false);
                data.sore_wptt == '1' ? $('#sore-wptt-edit').prop('checked', true) : $('#sore-wptt-edit').prop('checked', false);
                data.malam_wptt == '1' ? $('#malam-wptt-edit').prop('checked', true) : $('#malam-wptt-edit').prop('checked', false);

                $('#tanggal-wptt-edit').val(data.tanggal_wptt);

                $('#perawat-2-wptt-edit').val(data.perawat_2_wptt);
                $('#s2id_perawat-2-wptt-edit a .select2c-chosen').html(data.nama_perawat_2);

                modal.modal('show');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })
    }

    // IWPT
    function showWaktuPemberianTanggalInfus(data, id_pendaftaran, id_layanan_pendaftaran, bed) {
        $('#tabel-wpt-infus .body-table').empty();
        if (data !== null) {
            $.each(data, function(i, v) {
                const selOp =

                     '<td align="center"><button type="button" class="btn btn-success btn-xs"onclick="editWaktuPemberianTanggalInfus(this, ' + v.id + ', ' + id_pendaftaran + ', ' + id_layanan_pendaftaran + ', \'' + bed +
                    '\')"><i class="fas fa-edit" ></i> </button> <button type="button" class="btn btn-danger btn-xs"onclick="hapusWaktuPemberianTanggalInfus($(this),' + v.id + ')"> <i class="fas fa-trash-alt"></i> </button> </td>';                               
                let html = /* html */ `
                    <tr> 
                        <td class="number-terapi" align="center">${(++i)}</td>                                  
                        <td class="center">${v.tanggal_wptt ? datefmysql(v.tanggal_wptt) : '-'}</td>
                        <td align="center">${v.hari_wptt || '-'}</td>
                        <td align="center">${v.jam_wptt || '-'}</td>
                        <td align="center">${v.nama_perawat_2 || '-'}</td>
                        <td align="center">${v.pasien_keluarga_wptt || '-'}</td>
                        <td class="center">${v.pagi_wptt == '1' ? '&check;' : '-'}</td>
                        <td class="center">${v.siang_wptt == '1' ? '&check;' : '-'}</td>
                        <td class="center">${v.sore_wptt == '1' ? '&check;' : '-'}</td>
                        <td class="center">${v.malam_wptt == '1' ? '&check;' : '-'}</td>
                        <td align="center">${v.akun_user}</td>
                        ${selOp}
                        <td align="center"></td>                   
                    </tr>               
                `;
                $('#tabel-wpt-infus .body-table').append(html);
                numberWpti = i;
            })
        }
    }

    // IWPT
    function updateWaktuPemberianTanggalInfus(id_pendaftaran, id_layanan_pendaftaran, bed) {
        $.ajax({
            type: 'PUT',
            url: '<?= base_url("pelayanan/api/pelayanan/update_waktu_pemberian_tanggal_infus") ?>',
            data: $('#form-edit-waktu-pemberian-tanggal-infus').serialize(),
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                if (data.status) {
                    messageEditSuccess();
                    entriCatatanPemberianObat(id_pendaftaran, id_layanan_pendaftaran, bed);
                } else {
                    messageEditFailed();
                }
                $('#modal-edit-waktu-pemberian-tanggal-infus').modal('hide');
            },
            error: function(e) {
                messageEditFailed();
            }
        });
    }

    // IWPT 
    if (typeof numberWpti === 'undefined') {
        var numberWpti = 1;
    }
    function tambahWaktuPemberianTanggalInfus() {
        // console.log('addBack')   
        if ($('#tanggal-wptt').val() === '') {
            syams_validation('#tanggal-wptt', 'Tanggal harus diisi.');
            return false;
        } else {
            syams_validation_remove('#tanggal-wptt');
        }
        if ($('#perawat-2-wptt').val() === '') {
            syams_validation('#perawat-2-wptt', 'Nama Perawat belum diisi.');
            return false;
        } else {
            syams_validation_remove('#perawat-2-wptt');
        }             
        let html = '';
        // atas
        let tanggal_wptt = $('#tanggal-wptt').val();
        let hari_wptt = $('#hari-wptt').val();
        let jam_wptt = $('#jam-wptt').val();
        let nama_perawat_2 = $('#s2id_perawat-2-wptt a .select2c-chosen').html();
        let perawat_2_wptt = $('#perawat-2-wptt').val();
        let pasien_keluarga_wptt = $('#pasien-keluarga-wptt').val();
        let pagi_wptt = $('#pagi-wptt').is(':checked');
        let siang_wptt = $('#siang-wptt').is(':checked');
        let sore_wptt = $('#sore-wptt').is(':checked');
        let malam_wptt = $('#malam-wptt').is(':checked');
        html = /* html */ `
            <tr class="row-in-${++numberWpti}">
                <td class="number-pengkajian" align="center">${numberWpti}</td>
                <td align="center">
                    <input type="hidden" name="tanggal_wptt[]" value="${tanggal_wptt}">${tanggal_wptt}
                </td>
                <td align="center">
                    <input type="hidden" name="hari_wptt[]" value="${hari_wptt}">${hari_wptt}
                </td>
                <td align="center">
                    <input type="hidden" name="jam_wptt[]" value="${jam_wptt}">${jam_wptt}
                </td>
                <td align="center">
                    <input type="hidden" name="perawat_2_wptt[]" value="${perawat_2_wptt}">${nama_perawat_2}
                </td>
                <td align="center">
                    <input type="hidden" name="pasien_keluarga_wptt[]" value="${pasien_keluarga_wptt}">${pasien_keluarga_wptt}
                </td>
                <td class="center">
                    <input type="hidden" name="pagi_wptt[]" value="${pagi_wptt ? 1 : 0}">${pagi_wptt ? '&check;' : '&#10006;'}
                </td>

                <td class="center">
                    <input type="hidden" name="siang_wptt[]" value="${siang_wptt ? 1 : 0}">${siang_wptt ? '&check;' : '&#10006;'}
                </td>
                <td class="center">
                    <input type="hidden" name="sore_wptt[]" value="${sore_wptt ? 1 : 0}">${sore_wptt ? '&check;' : '&#10006;'}
                </td>
                <td class="center">
                    <input type="hidden" name="malam_wptt[]" value="${malam_wptt ? 1 : 0}">${malam_wptt ? '&check;' : '&#10006;'}
                </td> 
                <td align="center">
                    <?= $this->session->userdata('nama') ?>
                    <input type="hidden" name="user_pengkajian[]" value="<?= $this->session->userdata("id_translucent") ?>">
                    <input type="hidden" name="pencegahan_date_wptt_infus[]" value="<?= date("Y-m-d H:i:s") ?>">                   
                </td>
                <td align="center">
                    <button type="button" id="pepel" class="btn btn-secondary btn-xxs" onclick="(() => {$(this).parent().parent().next().addBack().remove(); numberWpti--;})()"><i class="fas fa-trash-alt"></i></button>
                </td>                                
            </tr>       
        `;
        $('#tabel-wpt-infus .body-table').append(html);
    }

    // IWPT
    function hapusWaktuPemberianTanggalInfus(obj, id) {
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
                            url: '<?= base_url("pelayanan/api/pelayanan/hapus_waktu_pemberian_tanggal_infus") ?>/' +
                                id,
                            cache: false,
                            dataType: 'JSON',
                            success: function(data) {
                                if (data.status) {
                                    messageCustom(data.message, 'Success');
                                    obj.parent().parent().remove();                                                                
                                } else {
                                    customAlert('Hapus Infus Inhalasi Suppositoria', data
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

    
    function resetFormCatatanPemberianObat() {
        $('#form_entri_catatan_pemberian_obat')[0].reset();
        $('#s2id_nama-obat-rpo a .select2c-chosen').empty();
        $('#s2id_dokter-1-rpo a .select2c-chosen').empty();
        $('#s2id_dokter-2-rpo a .select2c-chosen').empty();
        $('#tanggal-rpo').val('');
        $('#tangggal-rpo').val('');        
        $('#nama-obat-rpo').val('');
        $('#dokter-1-rpo').val('');
        $('#dokter-2-rpo').val('');
        $('#alergii-1, #alergii-2')
            .prop('checked', false);
        // For non-blocking code (Asyncronous) 
        setTimeout(() => {
            $('#rute-rpo, #dosis-rpo, #frekuensi-rpo, #eso-rpo, #r-farmasi-rpo, #alergii-3')
                .val('');
            $('#form-rpo').find('input').each(function() {
                if ($(this).is(':checked')) {
                    $(this).prop('checked', false);
                }
            })
        }, 100)
        // Catatan Pemberian Dan Pemantauan Obat 

        // ILLIS
        $('#s2id_nama-obat-rpoo a .select2c-chosen').empty();
        $('#s2id_dokter-1-rpoo a .select2c-chosen').empty();
        $('#s2id_dokter-2-rpoo a .select2c-chosen').empty();
        $('#tanggal-rpoo').val('');
        $('#tangggal-rpoo').val('');        
        $('#nama-obat-rpoo').val('');
        $('#dokter-1-rpoo').val('');
        $('#dokter-2-rpoo').val('');
        $('#alergiii-1, #alergiii-2')
            .prop('checked', false);
        // For non-blocking code (Asyncronous) 
        setTimeout(() => {
            $('#rute-rpoo, #dosis-rpoo, #frekuensi-rpoo, #eso-rpoo, #r-farmasi-rpoo, #alergiii-3')
                .val('');
            $('#form-rpo-infus').find('input').each(function() {
                if ($(this).is(':checked')) {
                    $(this).prop('checked', false);
                }
            })
        }, 100)

        // WPT 
        $('#s2id_perawat-1-wpt a .select2c-chosen').empty();
        $('#tanggal-wpt').val('');      
        $('#perawat-1-wpt').val('');
        setTimeout(() => {
            $('#hari-wpt, #jam-wpt, #pasien-keluarga-wpt')
                .val('');
            $('#form-wpt').find('input').each(function() {
                if ($(this).is(':checked')) {
                    $(this).prop('checked', false);
                }
            })
        }, 100)

     
        // IWPT
        $('#s2id_perawat-2-wptt a .select2c-chosen').empty();
        $('#tanggal-wptt').val('');        
        $('#perawat-2-wptt').val('');
        setTimeout(() => {
            $('#hari-wptt, #jam-wptt, #pasien-keluarga-wptt')
                .val('');
            $('#form-wpt-infus').find('input').each(function() {
                if ($(this).is(':checked')) {
                    $(this).prop('checked', false);
                }
            })
        }, 100)
    }

    function konfirmasiSimpanCatatanPemberianDanPemantauanObat() {
        swal.fire({
            title: 'Simpan Data Keperawatan',
            text: "Apakah anda yakin akan menyimpan Data Ini?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-fw fa-save mr-1"></i>Simpan',
            cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                simpanCatatanPemberianDanPemantauanObat();
            }
        }) 
    }

    function simpanCatatanPemberianDanPemantauanObat() {
        $.ajax({
            type: 'POST',
            url: '<?= base_url("pelayanan/api/pelayanan/simpan_entri_catatan_pemberian_dan_pemantauan_obat") ?>',
            data: $('#form_entri_catatan_pemberian_obat').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {

                if (data.respon !== null) {

                    if (data.respon.show !== null) {

                        if (data.respon.add_show !== undefined) {

                            $('#wizard-resume-group').bwizard('show', data.respon.add_show);

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
                        $('#modal_catatan_pemberian_obat').modal('hide');
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


</script>