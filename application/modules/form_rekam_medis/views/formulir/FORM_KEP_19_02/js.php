<style>
  .btn-tooltip {
    position: relative;
    display: inline-block;
  }

  .tooltip-text {
    visibility: hidden;
    font-weight: bold;
    background-color: transparent;
    color: #000;
    text-shadow: 0 0 2px #fff;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    white-space: nowrap;
    z-index: 1000;
    pointer-events: none;
  }

  .btn-tooltip:hover .tooltip-text {
    visibility: visible;
  }

  .tooltip-left {
    right: 120%; /* Tooltip ke kiri */
    left: auto;
    text-align: right;
  }

  .tooltip-right {
    left: 120%; /* Tooltip ke kanan */
    right: auto;
    text-align: left;
  }
</style>


<script>
    var userLoginId = <?= json_encode($this->session->userdata('nama')) ?>;
    console.log("User Login ID:", userLoginId);
    var nomer = 1;
    $(function() {
        nomer++;

        $("#wizard-resume-group").bwizard();

        $('#pur-btn-expand-all').click(function() {
            $('.multi-collapse').addClass('show');
        });

        $('#pur-btn-collapse-all').click(function() {
            $('.multi-collapse').removeClass('show');
        });

        // PURJPD
        showPengkajianUlang(nomer);

        // UPRJPD
        showFormPemantauanDewasa(nomer);   
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

    function lihatFORM_KEP_19_02(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'lihat';

        entriKeperawatan(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function editFORM_KEP_19_02(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'edit';

        entriKeperawatan(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function tambahFORM_KEP_19_02(data) {
        let pasien = data.pasien;
        let layanan = data.layanan;
        let bed = layanan.bangsal + ' kelas ' + layanan.kelas + ' ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed;
        let action = 'tambah';

        entriKeperawatan(layanan.id_pendaftaran, layanan.id, bed, action);
    }

    function entriKeperawatan(id_pendaftaran, id_layanan_pendaftaran, bed, action) {

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
            url: '<?= base_url("pelayanan/api/pelayanan/get_data_entri_purjpd_uprjpd") ?>/id/' + id_pendaftaran +
                '/id_layanan/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader()
            },
            success: function(data) {

                // PURJPD
                $('#purjpd-tanggal-pengkajian').datetimepicker({
                    format: 'DD/MM/YYYY',
                    maxDate: new Date(),
                    beforeShow: function(i) {
                        if ($(i).attr('readonly')) {
                            return false;
                        }
                    }
                });

                // UPRJPD
                $('#uprjpd-tanggal-pengkajian, #uprjpd-edit-tanggal-pengkajian')
                .datetimepicker({
                    format: 'DD/MM/YYYY',
                    maxDate: new Date(),
                    beforeShow: function(i) {
                        if ($(i).attr('readonly')) {
                            return false;
                        }
                    }
                });


                // PURJPD
                $('#purjpd-alat-bantu-jalan-1').click(function() {
                    if ($(this).is(":checked")) {
                        $('#purjpd-alat-bantu-jalan-1-ya').prop('disabled', false);
                        $('#purjpd-alat-bantu-jalan-1-ya').prop('checked', true).change();
                    } else {
                        $('#purjpd-alat-bantu-jalan-1-ya').prop('checked', false).change();
                        $('#purjpd-alat-bantu-jalan-1-ya').prop('disabled', true);
                    }
                });

                $('#purjpd-alat-bantu-jalan-2').click(function() {
                    if ($(this).is(":checked")) {
                        $('#purjpd-alat-bantu-jalan-2-ya').prop('disabled', false);
                        $('#purjpd-alat-bantu-jalan-2-ya').prop('checked', true).change();
                    } else {
                        $('#purjpd-alat-bantu-jalan-2-ya').prop('checked', false).change();
                        $('#purjpd-alat-bantu-jalan-2-ya').prop('disabled', true);
                    }
                });

                $('#purjpd-alat-bantu-jalan-3').click(function() {
                    if ($(this).is(":checked")) {
                        $('#purjpd-alat-bantu-jalan-3-ya').prop('disabled', false);
                        $('#purjpd-alat-bantu-jalan-3-ya').prop('checked', true).change();
                    } else {
                        $('#purjpd-alat-bantu-jalan-3-ya').prop('checked', false).change();
                        $('#purjpd-alat-bantu-jalan-3-ya').prop('disabled', true);
                    }
                });

                $('#purjpd-cara-berjalan').click(function() {
                    if ($(this).is(":checked")) {
                        $('#purjpd-cara-berjalan-ya').prop('disabled', false);
                        $('#purjpd-cara-berjalan-ya').prop('checked', true).change();
                    } else {
                        $('#purjpd-cara-berjalan-ya').prop('checked', false).change();
                        $('#purjpd-cara-berjalan-ya').prop('disabled', true);
                    }
                });

                $('#purjpd-cara-berjalan-2').click(function() {
                    if ($(this).is(":checked")) {
                        $('#purjpd-cara-berjalan-2-ya').prop('disabled', false);
                        $('#purjpd-cara-berjalan-2-ya').prop('checked', true).change();
                    } else {
                        $('#purjpd-cara-berjalan-2-ya').prop('checked', false).change();
                        $('#purjpd-cara-berjalan-2-ya').prop('disabled', true);
                    }
                });

                $('#purjpd-cara-berjalan-3').click(function() {
                    if ($(this).is(":checked")) {
                        $('#purjpd-cara-berjalan-3-ya').prop('disabled', false);
                        $('#purjpd-cara-berjalan-3-ya').prop('checked', true).change();
                    } else {
                        $('#purjpd-cara-berjalan-3-ya').prop('checked', false).change();
                        $('#purjpd-cara-berjalan-3-ya').prop('disabled', true);
                    }
                });

                $('#purjpd-status-mental-1').click(function() {
                    if ($(this).is(":checked")) {
                        $('#purjpd-status-mental-1-ya').prop('disabled', false);
                        $('#purjpd-status-mental-1-ya').prop('checked', true).change();
                    } else {
                        $('#purjpd-status-mental-1-ya').prop('checked', false).change();
                        $('#purjpd-status-mental-1-ya').prop('disabled', true);
                    }
                });

                $('#purjpd-status-mental-2').click(function() {
                    if ($(this).is(":checked")) {
                        $('#purjpd-status-mental-2-ya').prop('disabled', false);
                        $('#purjpd-status-mental-2-ya').prop('checked', true).change();
                    } else {
                        $('#purjpd-status-mental-2-ya').prop('checked', false).change();
                        $('#purjpd-status-mental-2-ya').prop('disabled', true);
                    }
                });

                // PURJPD
                $('#data-pengkajian-ulang-resiko').one('click', function() {  
                    $('#perawat-purjpd')
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

                resetFormEntriPurjpdUprjpd();
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

                // PURJPD
                if (typeof data.pengkajian_ulang !== 'undefined' | data.pengkajian_ulang !== null) {
                    showKajiUlang(data.pengkajian_ulang, id_pendaftaran, id_layanan_pendaftaran, bed);
                } else {
                    $('#tabel-pengkajian-ulang tbody').empty();
                }

                //  UPRJPD
                if (typeof data.upaya_pencegahan_risiko_jatuh_pasien_dewasa !== 'undefined' || data.upaya_pencegahan_risiko_jatuh_pasien_dewasa !== null) {
                    showUpayaPencegahanRisikoJatuhPasienDewasa(data.upaya_pencegahan_risiko_jatuh_pasien_dewasa, id_pendaftaran, id_layanan_pendaftaran, bed);
                } else {
                    $('#tabel-uprjpd .body-table').empty();
                }

                $('#ek_bed').text(bed);

                $('.ek-logo-pasien-alergi').hide();
                if (data.profil !== null) {
                    if (data.profil.is_alergi == 'Ya') {
                        $('.ek-logo-pasien-alergi').show();
                    }
                }

                if (action === 'lihat') {
                    // Disable semua input dan textarea, tapi biarkan tombol expand/collapse tetap aktif
                    $('#modal_resiko_jatuh_pasien_dewasa :input')
                        .not('[data-dismiss="modal"], #pur-btn-expand-all, #pur-btn-collapse-all')
                        .prop('disabled', true);

                    $('#modal_resiko_jatuh_pasien_dewasa textarea').prop('readonly', true);
                    $('#btn-simpan').hide();

                    // Disable select dan Select2
                    $('#modal_resiko_jatuh_pasien_dewasa select')
                        .not('[data-dismiss="modal"]')
                        .prop('disabled', true)
                        .trigger('change.select2c');

                    $('#modal_resiko_jatuh_pasien_dewasa [id^="s2id_"]').css({
                        'pointer-events': 'none',
                        'opacity': 0.6
                    });
                }

                $('#modal_resiko_jatuh_pasien_dewasa').modal('show');
            },
            complete: function() {
                hideLoader()
            },
            error: function(e) {
                accessFailed(e.status);
            },
        });
    }



    // PURJPD
    function showKajiUlang(data, id_pendaftaran, id_layanan_pendaftaran, bed) {
        $('#tabel-pengkajian-ulang .body-table').empty(); 
        if (data !== null) {
            $.each(data, function(i, v) {
                const selOp = `
                    <td align="center">
                        <button type="button" class="btn btn-danger btn-xs btn-tooltip" onclick="hapusKajiUlang($(this), ${v.id})">
                            <i class="fas fa-trash-alt" style="color:rgb(39, 44, 49);"></i>
                            <span class="tooltip-text">Hapus</span>
                        </button>
                    </td>
                `;                
                let html = /* html */ `
                 

                    <tr>
                        <td class="number-terapi" align="center">${(++i)}</td>
                        <td class="center">${datefmysql(v.tanggal_pengkajian)}</td>
                        <td align="center">${v.jumlah_skor || '-'}</td>
                        <td align="center">${v.perawat || v.akun_user || '-'}</td>
                        <td align="center"></td>
                        ${selOp}
                        <td align="center"></td>
                    </tr>


                `;
                $('#tabel-pengkajian-ulang .body-table').append(html);
                numberPurjpd = i;
            })
        }
    }
    // <td align="center">${v.akun_user}</td>

                    // <tr>
                    //     <td class="number-terapi" align="center">${(++i)}</td>
                    //     <td class="center">${datefmysql(v.tanggal_pengkajian)}</td>
                    //     <td align="center">${v.jumlah_skor || '-' }</td>
                    //     <td align="center">${v.perawat || '-'}</td>
                    //     <td align="center"></td>
                    //     ${selOp}
                    //     <td align="center"></td>
                    // </tr>

    // PURJPD
    function showPengkajianUlang(num) {
        let html = bukaLebar('FORM PENGKAJIAN ULANG RISIKO JATUH PASIEN DEWASA 𖣫' , num);
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
                        <input type="text" name="purjd_tanggal_pengkajian" id="purjpd-tanggal-pengkajian" class="custom-form clear-input d-inline-block col-lg-5 ml-2" placeholder="dd/mm/yyyy">
                    </td>
                </tr>
            </table>
            <hr>
            <table class="table table-sm table-striped table-bordered" style="margin-top: -15px">
                <thead>
                    <tr>
                        <th width="60%" class="center"><b>Parameter</b></th>
                        <th width="20%" class="center"><b>Nilai</b></th>
                        <th width="20%" class="center"><b>Skor</b></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td rowspan="2"><input type="hidden" id="purjpd-riwayat-jatuh">Riwayat jatuh dalam waktu 3 bulan sebab apapun</td>
                        <td><input type="radio" name="purjpd_riwayat_jatuh" id="purjpd-riwayat-jatuh-ya" value="25" class="mr-1" onchange="calcscorepurjpd()">Ya</td>
                        <td class="center">25</td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="purjpd_riwayat_jatuh" id="purjpd-riwayat-jatuh-tidak" value="0" class="mr-1" onchange="calcscorepurjpd()" checked>Tidak</td>
                        <td class="center">0</td>
                    </tr>
                    <tr>
                        <td rowspan="2"><input type="hidden" id="purjpd-diagnosis-sekunder">Diagnosis Sekunder (≥ 2 Diagnosis Medis)</td>
                        <td><input type="radio" name="purjpd_diagnosis_sekunder" id="purjpd-diagnosis-sekunder-ya" value="15" class="mr-1" onchange="calcscorepurjpd()">Ya</td>
                        <td class="center">15</td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="purjpd_diagnosis_sekunder" id="purjpd-diagnosis-sekunder-tidak" value="0" class="mr-1" onchange="calcscorepurjpd()" checked>Tidak</td>
                        <td class="center">0</td>
                    </tr>
                    <tr>
                        <td colspan="3"><input type="hidden" id="purjpd-alat-bantu-jalan">Alat Bantu Jalan</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="purjpd_alat_bantu_jalan_1" id="purjpd-alat-bantu-jalan-1" value="1" class="mr-1">Tidak Ada / Kursi Roda</td>
                        <td><input type="radio" name="purjpd_alat_bantu_jalan_1_ya" id="purjpd-alat-bantu-jalan-1-ya" value="0" class="mr-1 disabled" onchange="calcscorepurjpd()">Ya</td>
                        <td class="center">0</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="purjpd_alat_bantu_jalan_2" id="purjpd-alat-bantu-jalan-2" value="1" class="mr-1">Kruk / Tongkat / Walker</td>
                        <td><input type="radio" name="purjpd_alat_bantu_jalan_2_ya" id="purjpd-alat-bantu-jalan-2-ya" value="15" class="mr-1 disabled" onchange="calcscorepurjpd()">Ya</td>
                        <td class="center">15</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="purjpd_alat_bantu_jalan_3" id="purjpd-alat-bantu-jalan-3" value="1" class="mr-1">Berpegangan pada benda-benda disekitar / Furniture</td>
                        <td><input type="radio" name="purjpd_alat_bantu_jalan_3_ya" id="purjpd-alat-bantu-jalan-3-ya" value="30" class="mr-1 disabled" onchange="calcscorepurjpd()">Ya</td>
                        <td class="center">30</td>
                    </tr>
                    <tr>
                        <td rowspan="2"><input type="hidden" id="purjpd-terpasang-infus">Terpasang Infus / Heparin Lock</td>
                        <td><input type="radio" name="purjpd_terpasang_infus" id="purjpd-terpasang-infus-ya" value="20" class="mr-1" onchange="calcscorepurjpd()">Ya</td>
                        <td class="center">20</td>
                    </tr>
                    <tr>
                        <td><input type="radio" name="purjpd_terpasang_infus" id="purjpd-terpasang-infus-tidak" value="0" class="mr-1" onchange="calcscorepurjpd()" checked>Tidak</td>
                        <td class="center">0</td>
                    </tr>
                    <tr>
                        <td colspan="3"><input type="hidden" id="purjpd-cara-berpindah">Cara Berjalan atau Berpindah</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="purjpd_cara_berjalan" id="purjpd-cara-berjalan" value="1" class="mr-1">Normal / Bedrest / Imobilisasi</td>
                        <td><input type="radio" name="purjpd_cara_berjalan_ya" id="purjpd-cara-berjalan-ya" value="0" class="mr-1 disabled" onchange="calcscorepurjpd()">Ya</td>
                        <td class="center">0</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="purjpd_cara_berjalan_2" id="purjpd-cara-berjalan-2" value="1" class="mr-1">Lemah</td>
                        <td><input type="radio" name="purjpd_cara_berjalan_2_ya" id="purjpd-cara-berjalan-2-ya" value="10" class="mr-1 disabled" onchange="calcscorepurjpd()">Ya</td>
                        <td class="center">10</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="purjpd_cara_berjalan_3" id="purjpd-cara-berjalan-3" value="1" class="mr-1">Terganggu</td>
                        <td><input type="radio" name="purjpd_cara_berjalan_3_ya" id="purjpd-cara-berjalan-3-ya" value="20" class="mr-1 disabled" onchange="calcscorepurjpd()">Ya</td>
                        <td class="center">20</td>
                    </tr>
                    <tr>
                        <td colspan="3"><input type="hidden" id="purjpd-status-mental">Status Mental</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="purjpd_status_mental_1" id="purjpd-status-mental-1" value="1" class="mr-1">Sadar Akan Kemampuan Diri Sendiri</td>
                        <td><input type="radio" name="purjpd_status_mental_1_ya" id="purjpd-status-mental-1-ya" value="0" class="mr-1 disabled" onchange="calcscorepurjpd()">Ya</td>
                        <td class="center">0</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="purjpd_status_mental_2" id="purjpd-status-mental-2" value="1" class="mr-1">Sering Lupa akan Keterbatasan Yang dimiliki</td>
                        <td><input type="radio" name="purjpd_status_mental_2_ya" id="purjpd-status-mental-2-ya" value="15" class="mr-1 disabled" onchange="calcscorepurjpd()">Ya</td>
                        <td class="center">15</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="bold">JUMLAH SKOR</td>
                        <td class="center"><input type="number" min="0" name="purjpd_jumlah_skor" id="purjpd-jumlah-skor" class="custom-form clear-input center" placeholder="Jumlah" value="0" readonly></td>
                    </tr>
                    <tr>
                        <td class="center"><b>Perawat</b></td>
                        <td class="center">
                            <input type="text"name="perawat_purjpd" id="perawat-purjpd"class="select2c-input ml-2">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button type="button" title="Tambah Pengkajian" class="btn btn-info" onclick="tambahPengkajian()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah Pengkajian</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        `;
        html += tutupRapet();
        $('#buka-tutup-pengkajian').append(html);
    }

    // PURJPD 
    if (typeof numberPurjpd === 'undefined') {
        var numberPurjpd = 1;
    }

    // PURJPD 
    function tambahPengkajian() {
        // console.log('kontol')        
        if ($('#purjpd-tanggal-pengkajian').val() === '') {
            syams_validation('#purjpd-tanggal-pengkajian', 'Tanggal Pengkajian harus diisi.');
            return false;
        } else {
            syams_validation_remove('#purjpd-tanggal-pengkajian');
        }

        if ($('#purjpd-alat-bantu-jalan').val() === '') {
            syams_validation('#purjpd-alat-bantu-jalan', 'Alat Bantu Jalan belum diisi');
            return false;
        } else {
            syams_validation_remove('#purjpd-alat-bantu-jalan');
        }

        if ($('#purjpd-cara-berpindah').val() === '') {
            syams_validation('#purjpd-cara-berpindah', 'Cara Berjalan belum diisi');
            return false;
        } else {
            syams_validation_remove('#purjpd-cara-berpindah');
        }

        if ($('#purjpd-status-mental').val() === '') {
            syams_validation('#purjpd-status-mental', 'Status Mental belum diisi');
            return false;
        } else {
            syams_validation_remove('#purjpd-status-mental');
        }

        if ($('#perawat-purjpd').val() === '') {
            syams_validation('#perawat-purjpd', 'Nama Perawat harap diisi');
            return false;
        } else {
            syams_validation_remove('#perawat-purjpd');
        }


        let html = '';
        let number = $('.number-pengkajian').length;
        let tanggal_pengkajian = $('#purjpd-tanggal-pengkajian').val();
        let jumlah_skor = $('#purjpd-jumlah-skor').val();
        let perawat_purjpd = $('#perawat-purjpd').val();
        let perawat = $('#s2id_perawat-purjpd a .select2c-chosen').html();
        let riwayat_jatuh = $('#purjpd-riwayat-jatuh').val();
        let diagnosis_sekunder = $('#purjpd-diagnosis-sekunder').val();
        // let diagnosis_sekunder_purjpd = $('#purjpd-diagnosis-sekunder').val();
        let alat_bantu_dua = $('#purjpd-alat-bantu-jalan').val();
        let infus = $('#purjpd-terpasang-infus').val();
        let cara_berjalan = $('#purjpd-cara-berpindah').val();
        let status_mental = $('#purjpd-status-mental').val();

        html = /* html */ `
            <tr class="row-in-${++numberPurjpd}">  
                <td class="number-pengkajian" align="center">${numberPurjpd}</td>
                <td align="center">
                    <input type="hidden" name="tanggal_pengkajian[]" value="${tanggal_pengkajian}">${tanggal_pengkajian}
                </td>
                <td align="center">
                    <input type="hidden" name="jumlah_skor[]" value="${jumlah_skor}">${jumlah_skor}
                </td>
                <td align="center">
                    <input type="hidden" name="perawat_purjpd[]" value="${perawat_purjpd}">${perawat}
                </td>
                <td align="center">
                    <input type="hidden" name="user_pengkajian[]" value="<?= $this->session->userdata("id_translucent") ?>">
                    <input type="hidden" name="pengkajian_date[]" value="<?= date("Y-m-d H:i:s") ?>">
                    <input type="hidden" name="riwayat_jatuh[]" value="${riwayat_jatuh}">
                    <input type="hidden" name="diagnosis_sekunder[]" value="${diagnosis_sekunder}">
                    <input type="hidden" name="alat_bantu_dua[]" value="${alat_bantu_dua}">
                    <input type="hidden" name="infus[]" value="${infus}">
                    <input type="hidden" name="cara_berjalan[]" value="${cara_berjalan}">
                    <input type="hidden" name="status_mental[]" value="${status_mental}">
                </td>              
                <td align="center">
                    <button type="button" id="pepel" class="btn btn-secondary btn-xxs" onclick="(() => {$(this).parent().parent().next().addBack().remove(); numberPurjpd--;})()"><i class="fas fa-trash-alt"></i></button>
                </td> 
            </tr>
        `;
        $('#tabel-pengkajian-ulang .body-table').append(html);
    }

        // <td align="center">
        //     <!?= $this->session->userdata('nama') ?>
        //     <input type="hidden" name="user_pengkajian[]" value="<!?= $this->session->userdata("id_translucent") ?>">
        //     <input type="hidden" name="pengkajian_date[]" value="<!?= date("Y-m-d H:i:s") ?>"> 
        //     <input type="hidden" name="riwayat_jatuh[]" value="${riwayat_jatuh}">
        //     <input type="hidden" name="diagnosis_sekunder[]" value="${diagnosis_sekunder}">
        //     <input type="hidden" name="alat_bantu_dua[]" value="${alat_bantu_dua}">
        //     <input type="hidden" name="infus[]" value="${infus}">
        //     <input type="hidden" name="cara_berjalan[]" value="${cara_berjalan}">
        //     <input type="hidden" name="status_mental[]" value="${status_mental}">
        // </td>

        

    // PURJPD
    // function hapusKajiUlang(obj, id) {
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
    //                         url: '<?= base_url("pelayanan/api/pelayanan/hapus_kaji_ulang") ?>/' + id,
    //                         cache: false,
    //                         dataType: 'JSON',
    //                         success: function(data) {
    //                             if (data.status) {
    //                                 messageCustom(data.message, 'Success');
    //                                 obj.parent().parent().remove();
    //                                 // removeList(obj);
    //                             } else {
    //                                 customAlert('Hapus Terapi Pulang', data.message);
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

    function hapusKajiUlang(obj, id) {
        bootbox.dialog({
            message: "Anda yakin akan menghapus data ini?",
            title: "Hapus Data",
            buttons: {
                batal: {
                    label: '<i class="fas fa-times-circle mr-1"></i>Batal',
                    className: "btn-secondary"
                },
                hapus: {
                    label: '<i class="fas fa-trash-alt mr-1"></i>Hapus',
                    className: "btn-info",
                    callback: function() {
                        // console.log('User yang hapus:', userLoginId); // debug
                        $.ajax({
                            type: 'POST',
                            url: '<?= base_url("pelayanan/api/pelayanan/hapus_kaji_ulang") ?>/' + id,
                            data: {
                                deleted_by: userLoginId,
                                _method: 'DELETE'
                            },
                            dataType: 'JSON',
                            success: function(data) {
                                if (data.status) {
                                    messageCustom(data.message, 'Success');
                                    obj.closest('tr').remove();
                                } else {
                                    customAlert('Hapus Terapi Pulang', data.message);
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

    // PURJPD
    function calcscorepurjpd() {
        var score = 0;
        $("input[name='purjpd_riwayat_jatuh']:checked").each(function() {
            if ($(this).val() == '25') {
                score += parseInt(25);
                $('#purjpd-riwayat-jatuh').val(25);
            } else if ($(this).val() == '0') {
                score += parseInt(0);
                $('#purjpd-riwayat-jatuh').val(0);
            }
        });
        $("input[name='purjpd_diagnosis_sekunder']:checked").each(function() {
            if ($(this).val() == '15') {
                score += parseInt(15);
                $('#purjpd-diagnosis-sekunder').val(15);
            } else if ($(this).val() == '0') {
                score += parseInt(0);
                $('#purjpd-diagnosis-sekunder').val(0);
            }
        });
        $("input[name='purjpd_terpasang_infus']:checked").each(function() {
            if ($(this).val() == '20') {
                score += parseInt(20);
                $('#purjpd-terpasang-infus').val(20);
            } else if ($(this).val() == '0') {
                score += parseInt(0);
                $('#purjpd-terpasang-infus').val(0);
            }
        });
        $("input[name='purjpd_alat_bantu_jalan_1_ya']:checked").each(function() {
            if ($(this).val() == '0') {
                score += parseInt(0);
                $('#purjpd-alat-bantu-jalan').val(0);
            }
        });
        $("input[name='purjpd_alat_bantu_jalan_2_ya']:checked").each(function() {
            if ($(this).val() == '15') {
                score += parseInt(15);
                $('#purjpd-alat-bantu-jalan').val(15);
            }
        });
        $("input[name='purjpd_alat_bantu_jalan_3_ya']:checked").each(function() {
            if ($(this).val() == '30') {
                score += parseInt(30);
                $('#purjpd-alat-bantu-jalan').val(30);
            }
        });
        $("input[name='purjpd_cara_berjalan_ya']:checked").each(function() {
            if ($(this).val() == '0') {
                score += parseInt(0);
                $('#purjpd-cara-berpindah').val(0);
            }
        });
        $("input[name='purjpd_cara_berjalan_2_ya']:checked").each(function() {
            if ($(this).val() == '10') {
                score += parseInt(10);
                $('#purjpd-cara-berpindah').val(10);
            }
        });
        $("input[name='purjpd_cara_berjalan_3_ya']:checked").each(function() {
            if ($(this).val() == '20') {
                score += parseInt(20);
                $('#purjpd-cara-berpindah').val(20);
            }
        });
        $("input[name='purjpd_status_mental_1_ya']:checked").each(function() {
            if ($(this).val() == '0') {
                score += parseInt(0);
                $('#purjpd-status-mental').val(0);
            }
        });
        $("input[name='purjpd_status_mental_2_ya']:checked").each(function() {
            if ($(this).val() == '15') {
                score += parseInt(15);
                $('#purjpd-status-mental').val(15);
            }
        });

        $("input[name='purjpd_jumlah_skor']").val(score);
    }

    //  purjpd // UPRJPN
    function resetFormEntriPurjpdUprjpd() {
        $('#form_entri_purjpd_uprjpd')[0].reset();
        // UPRJPN
        $('#s2id_perawat-1 a .select2c-chosen').empty();
        $('#s2id_perawat-2 a .select2c-chosen').empty();
        $('#s2id_perawat-3 a .select2c-chosen').empty();
        $('#uprjpn-tanggal-pengkajian').val('');
        $('#perawat-1').val('');
        $('#perawat-2').val('');
        $('#perawat-3').val('');

        setTimeout(() => {
            $('#form-uprjpn').find('input').each(function() {
                if ($(this).is(':checked')) {
                    $(this).prop('checked', false);
                }
            })
        }, 100)

        // PURJPD
        $('#s2id_perawat-purjpd a .select2c-chosen').empty();
        $('#perawat-purjpd').val('');
        $('#purjpd-tanggal-pengkajian').val('');   
    }

    function konfirmasiSimpanEntriKeperawatan() {
        swal.fire({
            title: 'Simpan Entri Keperawatan',
            text: "Apakah anda yakin akan menyimpan Form Pengkajian Ulang Dan Pemantauan Risiko Jatuh Pasien Dewasa?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-fw fa-save mr-1"></i>Simpan',
            cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                simpanEntriKeperawatan();
            }
        })   
    }

    // JANGAN DI HAPUS
    function simpanEntriKeperawatan() {
        $.ajax({
            type: 'POST',
            url: '<?= base_url("pelayanan/api/pelayanan/simpan_purjpd_uprjpd") ?>',
            data: $('#form_entri_purjpd_uprjpd').serialize(),
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
                        $('#modal_resiko_jatuh_pasien_dewasa').modal('hide');
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


    // UPRJPD
    function showFormPemantauanDewasa(num) {
        let html = bukaLebar('FORM UPAYA PENCEGAHAN RISIKO JATUH PASIEN DEWASA 𖣫', num);
        html += /* html */ `
            <div class="from-group">
                <label for="uprjpd-tanggal-pengkajian">Tanggal Tindakan Pencegahan : </label>
                <input type="text" name="uprjpd_tanggal_pengkajian" id="uprjpd-tanggal-pengkajian" class="custom-form clear-input d-inline-block col-1 ml-2" placeholder="dd/mm/yyyy">
            </div>
            <hr>
            <table class="table table-sm table-striped table-bordered" style="margin-top: -15px" id="form-uprjpd">
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
                        <td colspan="8" class="bold text-uppercase">Risiko Rendah</td>
                    </tr>
                    <tr>
                        <td>Bel berfungsi dan mudah dijangkau</td>
                        <td class="center"><input type="checkbox" name="uprjpd_bel_p_ho" id="uprjpd-bel-p-ho"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_bel_p_10" id="uprjpd-bel-p-10"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_bel_s_ho" id="uprjpd-bel-s-ho"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_bel_s_18" id="uprjpd-bel-s-18"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_bel_m_ho" id="uprjpd-bel-m-ho"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_bel_m_23" id="uprjpd-bel-m-23"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_bel_m_4" id="uprjpd-bel-m-4"></td>
                    </tr>
                    <tr>
                        <td>Roda tempat tidur terkunci</td>
                        <td class="center"><input type="checkbox" name="uprjpd_roda_p_ho" id="uprjpd-roda-p-ho"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_roda_p_10" id="uprjpd-roda-p-10"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_roda_s_ho" id="uprjpd-roda-s-ho"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_roda_s_18" id="uprjpd-roda-s-18"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_roda_m_ho" id="uprjpd-roda-m-ho"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_roda_m_23" id="uprjpd-roda-m-23"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_roda_m_4" id="uprjpd-roda-m-4"></td>
                    </tr>
                    <tr>
                        <td>Posisikan tempat tidur pada posisi terendah</td>
                        <td class="center"><input type="checkbox" name="uprjpd_ptt_p_ho" id="uprjpd-ptt-p-ho"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_ptt_p_10" id="uprjpd-ptt-p-10"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_ptt_s_ho" id="uprjpd-ptt-s-ho"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_ptt_s_18" id="uprjpd-ptt-s-18"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_ptt_m_ho" id="uprjpd-ptt-m-ho"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_ptt_m_23" id="uprjpd-ptt-m-23"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_ptt_m_4" id="uprjpd-ptt-m-4"></td>
                    </tr>
                    <tr>
                        <td>Pagar pengaman tempat tidur dinaikan</td>
                        <td class="center"><input type="checkbox" name="uprjpd_ppt_p_ho" id="uprjpd-ppt-p-ho"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_ppt_p_10" id="uprjpd-ppt-p-10"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_ppt_s_ho" id="uprjpd-ppt-s-ho"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_ppt_s_18" id="uprjpd-ppt-s-18"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_ppt_m_ho" id="uprjpd-ppt-m-ho"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_ppt_m_23" id="uprjpd-ppt-m-23"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_ppt_m_4" id="uprjpd-ppt-m-4"></td>
                    </tr>
                    <tr>
                        <td>Penerangan cukup</td>
                        <td class="center"><input type="checkbox" name="uprjpd_penerangan_p_ho" id="uprjpd-penerangan-p-ho"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_penerangan_p_10" id="uprjpd-penerangan-p-10"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_penerangan_s_ho" id="uprjpd-penerangan-s-ho"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_penerangan_s_18" id="uprjpd-penerangan-s-18"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_penerangan_m_ho" id="uprjpd-penerangan-m-ho"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_penerangan_m_23" id="uprjpd-penerangan-m-23"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_penerangan_m_4" id="uprjpd-penerangan-m-4"></td>
                    </tr>
                    <tr>
                        <td>Pastikan alas kaki yang tidak licin untuk pasien yang dapat berjalan</td>
                        <td class="center"><input type="checkbox" name="uprjpd_alas_p_ho" id="uprjpd-alas-p-ho"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_alas_p_10" id="uprjpd-alas-p-10"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_alas_s_ho" id="uprjpd-alas-s-ho"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_alas_s_18" id="uprjpd-alas-s-18"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_alas_m_ho" id="uprjpd-alas-m-ho"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_alas_m_23" id="uprjpd-alas-m-23"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_alas_m_4" id="uprjpd-alas-m-4"></td>
                    </tr>
                    <tr>
                        <td>Lantai kering dan tidak licin</td>
                        <td class="center"><input type="checkbox" name="uprjpd_lantai_p_ho" id="uprjpd-lantai-p-ho"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_lantai_p_10" id="uprjpd-lantai-p-10"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_lantai_s_ho" id="uprjpd-lantai-s-ho"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_lantai_s_18" id="uprjpd-lantai-s-18"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_lantai_m_ho" id="uprjpd-lantai-m-ho"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_lantai_m_23" id="uprjpd-lantai-m-23"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_lantai_m_4" id="uprjpd-lantai-m-4"></td>
                    </tr>
                    <tr>
                        <td colspan="8" class="bold text-uppercase">Risiko Sedang</td>
                    </tr>
                    <tr>
                        <td>Dekatkan alat-alat pasien</td>
                        <td class="center"><input type="checkbox" name="uprjpd_alat_p_ho" id="uprjpd-alat-p-ho"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_alat_p_10" id="uprjpd-alat-p-10"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_alat_s_ho" id="uprjpd-alat-s-ho"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_alat_s_18" id="uprjpd-alat-s-18"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_alat_m_ho" id="uprjpd-alat-m-ho"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_alat_m_23" id="uprjpd-alat-m-23"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_alat_m_4" id="uprjpd-alat-m-4"></td>
                    </tr>
                    <tr>
                        <td>Edukasi pasien tentang efek samping obat yang diberikan</td>
                        <td class="center"><input type="checkbox" name="uprjpd_edukasi_p_ho" id="uprjpd-edukasi-p-ho"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_edukasi_p_10" id="uprjpd-edukasi-p-10"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_edukasi_s_ho" id="uprjpd-edukasi-s-ho"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_edukasi_s_18" id="uprjpd-edukasi-s-18"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_edukasi_m_ho" id="uprjpd-edukasi-m-ho"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_edukasi_m_23" id="uprjpd-edukasi-m-23"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_edukasi_m_4" id="uprjpd-edukasi-m-4"></td>
                    </tr>
                    <tr>
                        <td>Tidak meninggalkan pasien di kamar mandi saat menggunakan commode</td>
                        <td class="center"><input type="checkbox" name="uprjpd_commode_p_ho" id="uprjpd-commode-p-ho"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_commode_p_10" id="uprjpd-commode-p-10"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_commode_s_ho" id="uprjpd-commode-s-ho"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_commode_s_18" id="uprjpd-commode-s-18"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_commode_m_ho" id="uprjpd-commode-m-ho"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_commode_m_23" id="uprjpd-commode-m-23"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_commode_m_4" id="uprjpd-commode-m-4"></td>
                    </tr>
                    <tr>
                        <td colspan="8" class="bold text-uppercase">Risiko Tinggi</td>
                    </tr>
                    <tr>
                        <td>Pasang gelang khusus (Warna Kuning)</td>
                        <td class="center"><input type="checkbox" name="uprjpd_gelang_p_ho" id="uprjpd-gelang-p-ho"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_gelang_p_10" id="uprjpd-gelang-p-10"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_gelang_s_ho" id="uprjpd-gelang-s-ho"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_gelang_s_18" id="uprjpd-gelang-s-18"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_gelang_m_ho" id="uprjpd-gelang-m-ho"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_gelang_m_23" id="uprjpd-gelang-m-23"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_gelang_m_4" id="uprjpd-gelang-m-4"></td>
                    </tr>
                    <tr>
                        <td>Tempatkan pasien di kamar yang paling dekat dengan Nurse Station (jika memungkinkan)</td>
                        <td class="center"><input type="checkbox" name="uprjpd_station_p_ho" id="uprjpd-station-p-ho"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_station_p_10" id="uprjpd-station-p-10"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_station_s_ho" id="uprjpd-station-s-ho"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_station_s_18" id="uprjpd-station-s-18"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_station_m_ho" id="uprjpd-station-m-ho"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_station_m_23" id="uprjpd-station-m-23"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_station_m_4" id="uprjpd-station-m-4"></td>
                    </tr>
                    <tr>
                        <td class="bold">Paraf</td>
                        <td class="center"><input type="checkbox" name="uprjpd_paraf_p_ho" id="uprjpd-paraf-p-ho"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_paraf_p_10" id="uprjpd-paraf-p-10"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_paraf_s_ho" id="uprjpd-paraf-s-ho"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_paraf_s_18" id="uprjpd-paraf-s-18"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_paraf_m_ho" id="uprjpd-paraf-m-ho"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_paraf_m_23" id="uprjpd-paraf-m-23"></td>
                        <td class="center"><input type="checkbox" name="uprjpd_paraf_m_4" id="uprjpd-paraf-m-4"></td>
                    </tr>
                    <tr>
                        <td class="bold">Perawat</td>
                        <td colspan="2">
                            <div class="input-group">
                                <input type="text" name="uprjpd_perawat_p" id="uprjpd-perawat-p" class="select2c-input ml-2">
                            </div>
                        </td>
                        <td colspan="2">
                            <div class="input-group">
                                <input type="text" name="uprjpd_perawat_s" id="uprjpd-perawat-s" class="select2c-input ml-2">
                            </div>
                        </td>
                        <td colspan="3">
                            <div class="input-group">
                                <input type="text" name="uprjpd_perawat_m" id="uprjpd-perawat-m" class="select2c-input ml-2">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="8">
                            <button type="button" title="Tambah Upaya Pencegahan" class="btn btn-info" onclick="tambahUpayaPencegahanDewasa()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah Upaya Pencegahan</button>
                        </td>
                    </tr>
                </tbody>
            </table>`;
        html += tutupRapet();
        $('#buka-tutup-uprjpd').append(html);
    }

    // UPRJPD
    $('#data-upaya-pencegahan-risiko-jatuh-pasien-dewasa').one('click', function() {
        $('#uprjpd-perawat-p, #uprjpd-perawat-s, #uprjpd-perawat-m, #uprjpd-edit-perawat-p, #uprjpd-edit-perawat-s, #uprjpd-edit-perawat-m')
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

    // UPRJPD
    if (typeof numberUprjpd === 'undefined') {
        var numberUprjpd = 1;
    }

    // UPRJPD
    function tambahUpayaPencegahanDewasa() {
        if ($('#uprjpd-tanggal-pengkajian').val() === '') {
            syams_validation('#uprjpd-tanggal-pengkajian', 'Tanggal Pengkajian harus diisi.');
            return false;
        } else {
            syams_validation_remove('#uprjpd-tanggal-pengkajian');
        }

        if ($('#uprjpd-perawat').val() === '') {
            syams_validation('#uprjpd-perawat', 'Nama perawat belum diisi.');
            return false;
        } else {
            syams_validation_remove('#uprjpd-perawat');
        }

        let html = '';
        let uprjpd_tanggal_pengkajian = $('#uprjpd-tanggal-pengkajian').val();
        let nama_perawat_p = $('#s2id_uprjpd-perawat-p a .select2c-chosen').html();
        let nama_perawat_s = $('#s2id_uprjpd-perawat-s a .select2c-chosen').html();
        let nama_perawat_m = $('#s2id_uprjpd-perawat-m a .select2c-chosen').html();
        let id_perawat_p = $('#uprjpd-perawat-p').val();
        let id_perawat_s = $('#uprjpd-perawat-s').val();
        let id_perawat_m = $('#uprjpd-perawat-m').val();

        // Bel berfungsi dan mudah dihangkau
        let bel_p_ho = $('#uprjpd-bel-p-ho').is(':checked');
        let bel_p_10 = $('#uprjpd-bel-p-10').is(':checked');
        let bel_s_ho = $('#uprjpd-bel-s-ho').is(':checked');
        let bel_s_18 = $('#uprjpd-bel-s-18').is(':checked');
        let bel_m_ho = $('#uprjpd-bel-m-ho').is(':checked');
        let bel_m_23 = $('#uprjpd-bel-m-23').is(':checked');
        let bel_m_4 = $('#uprjpd-bel-m-4').is(':checked');

        // Roda tempat tidur terkunci
        let roda_p_ho = $('#uprjpd-roda-p-ho').is(':checked');
        let roda_p_10 = $('#uprjpd-roda-p-10').is(':checked');
        let roda_s_ho = $('#uprjpd-roda-s-ho').is(':checked');
        let roda_s_18 = $('#uprjpd-roda-s-18').is(':checked');
        let roda_m_ho = $('#uprjpd-roda-m-ho').is(':checked');
        let roda_m_23 = $('#uprjpd-roda-m-23').is(':checked');
        let roda_m_4 = $('#uprjpd-roda-m-4').is(':checked');

        // Posisikan tempat tidur pada posisi terendah
        let ptt_p_ho = $('#uprjpd-ptt-p-ho').is(':checked');
        let ptt_p_10 = $('#uprjpd-ptt-p-10').is(':checked');
        let ptt_s_ho = $('#uprjpd-ptt-s-ho').is(':checked');
        let ptt_s_18 = $('#uprjpd-ptt-s-18').is(':checked');
        let ptt_m_ho = $('#uprjpd-ptt-m-ho').is(':checked');
        let ptt_m_23 = $('#uprjpd-ptt-m-23').is(':checked');
        let ptt_m_4 = $('#uprjpd-ptt-m-4').is(':checked');

        // Pagar pengaman tempat tidur dinaikan
        let ppt_p_ho = $('#uprjpd-ppt-p-ho').is(':checked');
        let ppt_p_10 = $('#uprjpd-ppt-p-10').is(':checked');
        let ppt_s_ho = $('#uprjpd-ppt-s-ho').is(':checked');
        let ppt_s_18 = $('#uprjpd-ppt-s-18').is(':checked');
        let ppt_m_ho = $('#uprjpd-ppt-m-ho').is(':checked');
        let ppt_m_23 = $('#uprjpd-ppt-m-23').is(':checked');
        let ppt_m_4 = $('#uprjpd-ppt-m-4').is(':checked');

        // Penerang cukup
        let penerangan_p_ho = $('#uprjpd-penerangan-p-ho').is(':checked');
        let penerangan_p_10 = $('#uprjpd-penerangan-p-10').is(':checked');
        let penerangan_s_ho = $('#uprjpd-penerangan-s-ho').is(':checked');
        let penerangan_s_18 = $('#uprjpd-penerangan-s-18').is(':checked');
        let penerangan_m_ho = $('#uprjpd-penerangan-m-ho').is(':checked');
        let penerangan_m_23 = $('#uprjpd-penerangan-m-23').is(':checked');
        let penerangan_m_4 = $('#uprjpd-penerangan-m-4').is(':checked');

        // Pastikan alas kaki yang tidak licin untuk pasien yang dapat berjalan
        let alas_p_ho = $('#uprjpd-alas-p-ho').is(':checked');
        let alas_p_10 = $('#uprjpd-alas-p-10').is(':checked');
        let alas_s_ho = $('#uprjpd-alas-s-ho').is(':checked');
        let alas_s_18 = $('#uprjpd-alas-s-18').is(':checked');
        let alas_m_ho = $('#uprjpd-alas-m-ho').is(':checked');
        let alas_m_23 = $('#uprjpd-alas-m-23').is(':checked');
        let alas_m_4 = $('#uprjpd-alas-m-4').is(':checked');

        // Lantai kering dan tidak licin
        let lantai_p_ho = $('#uprjpd-lantai-p-ho').is(':checked');
        let lantai_p_10 = $('#uprjpd-lantai-p-10').is(':checked');
        let lantai_s_ho = $('#uprjpd-lantai-s-ho').is(':checked');
        let lantai_s_18 = $('#uprjpd-lantai-s-18').is(':checked');
        let lantai_m_ho = $('#uprjpd-lantai-m-ho').is(':checked');
        let lantai_m_23 = $('#uprjpd-lantai-m-23').is(':checked');
        let lantai_m_4 = $('#uprjpd-lantai-m-4').is(':checked');

        // Dekatkan alat-alat pasien
        let alat_p_ho = $('#uprjpd-alat-p-ho').is(':checked');
        let alat_p_10 = $('#uprjpd-alat-p-10').is(':checked');
        let alat_s_ho = $('#uprjpd-alat-s-ho').is(':checked');
        let alat_s_18 = $('#uprjpd-alat-s-18').is(':checked');
        let alat_m_ho = $('#uprjpd-alat-m-ho').is(':checked');
        let alat_m_23 = $('#uprjpd-alat-m-23').is(':checked');
        let alat_m_4 = $('#uprjpd-alat-m-4').is(':checked');

        // Edukasi pasien tentang efek samping obat yang diberikan
        let edukasi_p_ho = $('#uprjpd-edukasi-p-ho').is(':checked');
        let edukasi_p_10 = $('#uprjpd-edukasi-p-10').is(':checked');
        let edukasi_s_ho = $('#uprjpd-edukasi-s-ho').is(':checked');
        let edukasi_s_18 = $('#uprjpd-edukasi-s-18').is(':checked');
        let edukasi_m_ho = $('#uprjpd-edukasi-m-ho').is(':checked');
        let edukasi_m_23 = $('#uprjpd-edukasi-m-23').is(':checked');
        let edukasi_m_4 = $('#uprjpd-edukasi-m-4').is(':checked');

        // Tidak meninggalkan pasien di kamar mandi saat menggunakan commode
        let commode_p_ho = $('#uprjpd-commode-p-ho').is(':checked');
        let commode_p_10 = $('#uprjpd-commode-p-10').is(':checked');
        let commode_s_ho = $('#uprjpd-commode-s-ho').is(':checked');
        let commode_s_18 = $('#uprjpd-commode-s-18').is(':checked');
        let commode_m_ho = $('#uprjpd-commode-m-ho').is(':checked');
        let commode_m_23 = $('#uprjpd-commode-m-23').is(':checked');
        let commode_m_4 = $('#uprjpd-commode-m-4').is(':checked');

        // Pasang gelang khusus
        let gelang_p_ho = $('#uprjpd-gelang-p-ho').is(':checked');
        let gelang_p_10 = $('#uprjpd-gelang-p-10').is(':checked');
        let gelang_s_ho = $('#uprjpd-gelang-s-ho').is(':checked');
        let gelang_s_18 = $('#uprjpd-gelang-s-18').is(':checked');
        let gelang_m_ho = $('#uprjpd-gelang-m-ho').is(':checked');
        let gelang_m_23 = $('#uprjpd-gelang-m-23').is(':checked');
        let gelang_m_4 = $('#uprjpd-gelang-m-4').is(':checked');

        // Tempatkan pasien di kamar yang paling dekat dengan Nurse Station
        let station_p_ho = $('#uprjpd-station-p-ho').is(':checked');
        let station_p_10 = $('#uprjpd-station-p-10').is(':checked');
        let station_s_ho = $('#uprjpd-station-s-ho').is(':checked');
        let station_s_18 = $('#uprjpd-station-s-18').is(':checked');
        let station_m_ho = $('#uprjpd-station-m-ho').is(':checked');
        let station_m_23 = $('#uprjpd-station-m-23').is(':checked');
        let station_m_4 = $('#uprjpd-station-m-4').is(':checked');

        // Paraf
        let paraf_p_ho = $('#uprjpd-paraf-p-ho').is(':checked');
        let paraf_p_10 = $('#uprjpd-paraf-p-10').is(':checked');
        let paraf_s_ho = $('#uprjpd-paraf-s-ho').is(':checked');
        let paraf_s_18 = $('#uprjpd-paraf-s-18').is(':checked');
        let paraf_m_ho = $('#uprjpd-paraf-m-ho').is(':checked');
        let paraf_m_23 = $('#uprjpd-paraf-m-23').is(':checked');
        let paraf_m_4 = $('#uprjpd-paraf-m-4').is(':checked');

        // LOGINNYA MASIH BELUM KETEMU  BESIOK LANJUT LAGIHH
        // <!?= $this->session->userdata('nama') ?>

        html = /* html */ `
            <tr class="row-in-${++numberUprjpd}">
                <td class="number-pengkajian" align="center">${numberUprjpd}</td>
                <td align="center">
                    <input type="hidden" name="uprjpd_tanggal_pengkajian[]" value="${uprjpd_tanggal_pengkajian}">${uprjpd_tanggal_pengkajian}
                </td>
                <td align="center">
                    <input type="hidden" name="uprjpd_perawat_p[]" value="${id_perawat_p}">${nama_perawat_p}
                </td>
                <td align="center">
                    <input type="hidden" name="uprjpd_perawat_s[]" value="${id_perawat_s}">${nama_perawat_s}
                </td>
                <td align="center">
                    <input type="hidden" name="uprjpd_perawat_m[]" value="${id_perawat_m}">${nama_perawat_m}
                </td>
                <td align="center">
                    <input type="hidden" name="user_uprjpd[]" value="<?= $this->session->userdata("id_translucent") ?>">
                    <input type="hidden" name="pencegahan_date_dewasa[]" value="<?= date("Y-m-d H:i:s") ?>">
                    <input type="hidden" name="uprjpd_bel_p_ho[]" value="${bel_p_ho ? 1 : 0}">
                    <input type="hidden" name="uprjpd_bel_p_10[]" value="${bel_p_10 ? 1 : 0}">
                    <input type="hidden" name="uprjpd_bel_s_ho[]" value="${bel_s_ho ? 1 : 0}">
                    <input type="hidden" name="uprjpd_bel_s_18[]" value="${bel_s_18 ? 1 : 0}">
                    <input type="hidden" name="uprjpd_bel_m_ho[]" value="${bel_m_ho ? 1 : 0}">
                    <input type="hidden" name="uprjpd_bel_m_23[]" value="${bel_m_23 ? 1 : 0}">
                    <input type="hidden" name="uprjpd_bel_m_4[]" value="${bel_m_4 ? 1 : 0}">

                    <input type="hidden" name="uprjpd_roda_p_ho[]" value="${roda_p_ho ? 1 : 0}">
                    <input type="hidden" name="uprjpd_roda_p_10[]" value="${roda_p_10 ? 1 : 0}">
                    <input type="hidden" name="uprjpd_roda_s_ho[]" value="${roda_s_ho ? 1 : 0}">
                    <input type="hidden" name="uprjpd_roda_s_18[]" value="${roda_s_18 ? 1 : 0}">
                    <input type="hidden" name="uprjpd_roda_m_ho[]" value="${roda_m_ho ? 1 : 0}">
                    <input type="hidden" name="uprjpd_roda_m_23[]" value="${roda_m_23 ? 1 : 0}">
                    <input type="hidden" name="uprjpd_roda_m_4[]" value="${roda_m_4 ? 1 : 0}">

                    <input type="hidden" name="uprjpd_ptt_p_ho[]" value="${ptt_p_ho ? 1 : 0}">
                    <input type="hidden" name="uprjpd_ptt_p_10[]" value="${ptt_p_10 ? 1 : 0}">
                    <input type="hidden" name="uprjpd_ptt_s_ho[]" value="${ptt_s_ho ? 1 : 0}">
                    <input type="hidden" name="uprjpd_ptt_s_18[]" value="${ptt_s_18 ? 1 : 0}">
                    <input type="hidden" name="uprjpd_ptt_m_ho[]" value="${ptt_m_ho ? 1 : 0}">
                    <input type="hidden" name="uprjpd_ptt_m_23[]" value="${ptt_m_23 ? 1 : 0}">
                    <input type="hidden" name="uprjpd_ptt_m_4[]" value="${ptt_m_4 ? 1 : 0}">

                    <input type="hidden" name="uprjpd_ppt_p_ho[]" value="${ppt_p_ho ? 1 : 0}">
                    <input type="hidden" name="uprjpd_ppt_p_10[]" value="${ppt_p_10 ? 1 : 0}">
                    <input type="hidden" name="uprjpd_ppt_s_ho[]" value="${ppt_s_ho ? 1 : 0}">
                    <input type="hidden" name="uprjpd_ppt_s_18[]" value="${ppt_s_18 ? 1 : 0}">
                    <input type="hidden" name="uprjpd_ppt_m_ho[]" value="${ppt_m_ho ? 1 : 0}">
                    <input type="hidden" name="uprjpd_ppt_m_23[]" value="${ppt_m_23 ? 1 : 0}">
                    <input type="hidden" name="uprjpd_ppt_m_4[]" value="${ppt_m_4 ? 1 : 0}">

                    <input type="hidden" name="uprjpd_penerangan_p_ho[]" value="${penerangan_p_ho ? 1 : 0}">
                    <input type="hidden" name="uprjpd_penerangan_p_10[]" value="${penerangan_p_10 ? 1 : 0}">
                    <input type="hidden" name="uprjpd_penerangan_s_ho[]" value="${penerangan_s_ho ? 1 : 0}">
                    <input type="hidden" name="uprjpd_penerangan_s_18[]" value="${penerangan_s_18 ? 1 : 0}">
                    <input type="hidden" name="uprjpd_penerangan_m_ho[]" value="${penerangan_m_ho ? 1 : 0}">
                    <input type="hidden" name="uprjpd_penerangan_m_23[]" value="${penerangan_m_23 ? 1 : 0}">
                    <input type="hidden" name="uprjpd_penerangan_m_4[]" value="${penerangan_m_4 ? 1 : 0}">

                    <input type="hidden" name="uprjpd_alas_p_ho[]" value="${alas_p_ho ? 1 : 0}">
                    <input type="hidden" name="uprjpd_alas_p_10[]" value="${alas_p_10 ? 1 : 0}">
                    <input type="hidden" name="uprjpd_alas_s_ho[]" value="${alas_s_ho ? 1 : 0}">
                    <input type="hidden" name="uprjpd_alas_s_18[]" value="${alas_s_18 ? 1 : 0}">
                    <input type="hidden" name="uprjpd_alas_m_ho[]" value="${alas_m_ho ? 1 : 0}">
                    <input type="hidden" name="uprjpd_alas_m_23[]" value="${alas_m_23 ? 1 : 0}">
                    <input type="hidden" name="uprjpd_alas_m_4[]" value="${alas_m_4 ? 1 : 0}">

                    <input type="hidden" name="uprjpd_lantai_p_ho[]" value="${lantai_p_ho ? 1 : 0}">
                    <input type="hidden" name="uprjpd_lantai_p_10[]" value="${lantai_p_10 ? 1 : 0}">
                    <input type="hidden" name="uprjpd_lantai_s_ho[]" value="${lantai_s_ho ? 1 : 0}">
                    <input type="hidden" name="uprjpd_lantai_s_18[]" value="${lantai_s_18 ? 1 : 0}">
                    <input type="hidden" name="uprjpd_lantai_m_ho[]" value="${lantai_m_ho ? 1 : 0}">
                    <input type="hidden" name="uprjpd_lantai_m_23[]" value="${lantai_m_23 ? 1 : 0}">
                    <input type="hidden" name="uprjpd_lantai_m_4[]" value="${lantai_m_4 ? 1 : 0}">

                    <input type="hidden" name="uprjpd_alat_p_ho[]" value="${alat_p_ho ? 1 : 0}">
                    <input type="hidden" name="uprjpd_alat_p_10[]" value="${alat_p_10 ? 1 : 0}">
                    <input type="hidden" name="uprjpd_alat_s_ho[]" value="${alat_s_ho ? 1 : 0}">
                    <input type="hidden" name="uprjpd_alat_s_18[]" value="${alat_s_18 ? 1 : 0}">
                    <input type="hidden" name="uprjpd_alat_m_ho[]" value="${alat_m_ho ? 1 : 0}">
                    <input type="hidden" name="uprjpd_alat_m_23[]" value="${alat_m_23 ? 1 : 0}">
                    <input type="hidden" name="uprjpd_alat_m_4[]" value="${alat_m_4 ? 1 : 0}">

                    <input type="hidden" name="uprjpd_edukasi_p_ho[]" value="${edukasi_p_ho ? 1 : 0}">
                    <input type="hidden" name="uprjpd_edukasi_p_10[]" value="${edukasi_p_10 ? 1 : 0}">
                    <input type="hidden" name="uprjpd_edukasi_s_ho[]" value="${edukasi_s_ho ? 1 : 0}">
                    <input type="hidden" name="uprjpd_edukasi_s_18[]" value="${edukasi_s_18 ? 1 : 0}">
                    <input type="hidden" name="uprjpd_edukasi_m_ho[]" value="${edukasi_m_ho ? 1 : 0}">
                    <input type="hidden" name="uprjpd_edukasi_m_23[]" value="${edukasi_m_23 ? 1 : 0}">
                    <input type="hidden" name="uprjpd_edukasi_m_4[]" value="${edukasi_m_4 ? 1 : 0}">

                    <input type="hidden" name="uprjpd_commode_p_ho[]" value="${commode_p_ho ? 1 : 0}">
                    <input type="hidden" name="uprjpd_commode_p_10[]" value="${commode_p_10 ? 1 : 0}">
                    <input type="hidden" name="uprjpd_commode_s_ho[]" value="${commode_s_ho ? 1 : 0}">
                    <input type="hidden" name="uprjpd_commode_s_18[]" value="${commode_s_18 ? 1 : 0}">
                    <input type="hidden" name="uprjpd_commode_m_ho[]" value="${commode_m_ho ? 1 : 0}">
                    <input type="hidden" name="uprjpd_commode_m_23[]" value="${commode_m_23 ? 1 : 0}">
                    <input type="hidden" name="uprjpd_commode_m_4[]" value="${commode_m_4 ? 1 : 0}">

                    <input type="hidden" name="uprjpd_gelang_p_ho[]" value="${gelang_p_ho ? 1 : 0}">
                    <input type="hidden" name="uprjpd_gelang_p_10[]" value="${gelang_p_10 ? 1 : 0}">
                    <input type="hidden" name="uprjpd_gelang_s_ho[]" value="${gelang_s_ho ? 1 : 0}">
                    <input type="hidden" name="uprjpd_gelang_s_18[]" value="${gelang_s_18 ? 1 : 0}">
                    <input type="hidden" name="uprjpd_gelang_m_ho[]" value="${gelang_m_ho ? 1 : 0}">
                    <input type="hidden" name="uprjpd_gelang_m_23[]" value="${gelang_m_23 ? 1 : 0}">
                    <input type="hidden" name="uprjpd_gelang_m_4[]" value="${gelang_m_4 ? 1 : 0}">

                    <input type="hidden" name="uprjpd_station_p_ho[]" value="${station_p_ho ? 1 : 0}">
                    <input type="hidden" name="uprjpd_station_p_10[]" value="${station_p_10 ? 1 : 0}">
                    <input type="hidden" name="uprjpd_station_s_ho[]" value="${station_s_ho ? 1 : 0}">
                    <input type="hidden" name="uprjpd_station_s_18[]" value="${station_s_18 ? 1 : 0}">
                    <input type="hidden" name="uprjpd_station_m_ho[]" value="${station_m_ho ? 1 : 0}">
                    <input type="hidden" name="uprjpd_station_m_23[]" value="${station_m_23 ? 1 : 0}">
                    <input type="hidden" name="uprjpd_station_m_4[]" value="${station_m_4 ? 1 : 0}">

                    <input type="hidden" name="uprjpd_paraf_p_ho[]" value="${paraf_p_ho ? 1 : 0}">
                    <input type="hidden" name="uprjpd_paraf_p_10[]" value="${paraf_p_10 ? 1 : 0}">
                    <input type="hidden" name="uprjpd_paraf_s_ho[]" value="${paraf_s_ho ? 1 : 0}">
                    <input type="hidden" name="uprjpd_paraf_s_18[]" value="${paraf_s_18 ? 1 : 0}">
                    <input type="hidden" name="uprjpd_paraf_m_ho[]" value="${paraf_m_ho ? 1 : 0}">
                    <input type="hidden" name="uprjpd_paraf_m_23[]" value="${paraf_m_23 ? 1 : 0}">
                    <input type="hidden" name="uprjpd_paraf_m_4[]" value="${paraf_m_4 ? 1 : 0}">
                </td>
                <td align="center">
                    <button type="button" id="pepel" class="btn btn-secondary btn-xxs" onclick="(() => {$(this).parent().parent().parent().find('.row-in-' + numberUprjpd).remove(); numberUprjpd--;})()"><i class="fas fa-trash-alt"></i></button>
                </td>
                <td align="center"><button type="button" class="btn btn-info btn-xxs" data-toggle="collapse" data-target="#data-collapse-${numberUprjpd}" aria-expanded="false" aria-controls="data-collapse-${numberUprjpd}"><i class="fas fa-expand"></i> Expand</button></td>
            </tr>
            <tr class="collapse row-in-${numberUprjpd}" id="data-collapse-${numberUprjpd}">
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
                            <td colspan="8" class="bold text-uppercase">Risiko Rendah/Sedang</td>
                        </tr>
                        <tr>
                            <td>Bel berfungsi dan mudah dijangkau</td>
                            <td class="center">${bel_p_ho ? '&check;' : ''}</td>
                            <td class="center">${bel_p_10 ? '&check;' : ''}</td>
                            <td class="center">${bel_s_ho ? '&check;' : ''}</td>
                            <td class="center">${bel_s_18 ? '&check;' : ''}</td>
                            <td class="center">${bel_m_ho ? '&check;' : ''}</td>
                            <td class="center">${bel_m_23 ? '&check;' : ''}</td>
                            <td class="center">${bel_m_4 ? '&check;' : ''}</td>
                        </tr>
                        <tr>
                            <td>Roda tempat tidur terkunci</td>
                            <td class="center">${roda_p_ho ? '&check;' : ''}</td>
                            <td class="center">${roda_p_10 ? '&check;' : ''}</td>
                            <td class="center">${roda_s_ho ? '&check;' : ''}</td>
                            <td class="center">${roda_s_18 ? '&check;' : ''}</td>
                            <td class="center">${roda_m_ho ? '&check;' : ''}</td>
                            <td class="center">${roda_m_23 ? '&check;' : ''}</td>
                            <td class="center">${roda_m_4 ? '&check;' : ''}</td>
                        </tr>
                        <tr>
                            <td>Posisikan tempat tidur pada posisi terendah</td>
                            <td class="center">${ptt_p_ho ? '&check;' : ''}</td>
                            <td class="center">${ptt_p_10 ? '&check;' : ''}</td>
                            <td class="center">${ptt_s_ho ? '&check;' : ''}</td>
                            <td class="center">${ptt_s_18 ? '&check;' : ''}</td>
                            <td class="center">${ptt_m_ho ? '&check;' : ''}</td>
                            <td class="center">${ptt_m_23 ? '&check;' : ''}</td>
                            <td class="center">${ptt_m_4 ? '&check;' : ''}</td>
                        </tr>
                        <tr>
                            <td>Pagar pengaman tempat tidur dinaikan</td>
                            <td class="center">${ppt_p_ho ? '&check;' : ''}</td>
                            <td class="center">${ppt_p_10 ? '&check;' : ''}</td>
                            <td class="center">${ppt_s_ho ? '&check;' : ''}</td>
                            <td class="center">${ppt_s_18 ? '&check;' : ''}</td>
                            <td class="center">${ppt_m_ho ? '&check;' : ''}</td>
                            <td class="center">${ppt_m_23 ? '&check;' : ''}</td>
                            <td class="center">${ppt_m_4 ? '&check;' : ''}</td>
                        </tr>
                        <tr>
                            <td>Penerang cukup</td>
                            <td class="center">${penerangan_p_ho ? '&check;' : ''}</td>
                            <td class="center">${penerangan_p_10 ? '&check;' : ''}</td>
                            <td class="center">${penerangan_s_ho ? '&check;' : ''}</td>
                            <td class="center">${penerangan_s_18 ? '&check;' : ''}</td>
                            <td class="center">${penerangan_m_ho ? '&check;' : ''}</td>
                            <td class="center">${penerangan_m_23 ? '&check;' : ''}</td>
                            <td class="center">${penerangan_m_4 ? '&check;' : ''}</td>
                        </tr>
                        <tr>
                            <td>Pastikan alas kaki yang tidak licin untuk pasien yang dapat berjalan</td>
                            <td class="center">${alas_p_ho ? '&check;' : ''}</td>
                            <td class="center">${alas_p_10 ? '&check;' : ''}</td>
                            <td class="center">${alas_s_ho ? '&check;' : ''}</td>
                            <td class="center">${alas_s_18 ? '&check;' : ''}</td>
                            <td class="center">${alas_m_ho ? '&check;' : ''}</td>
                            <td class="center">${alas_m_23 ? '&check;' : ''}</td>
                            <td class="center">${alas_m_4 ? '&check;' : ''}</td>
                        </tr>
                        <tr>
                            <td>Lantai kering dan tidak licin</td>
                            <td class="center">${lantai_p_ho ? '&check;' : ''}</td>
                            <td class="center">${lantai_p_10 ? '&check;' : ''}</td>
                            <td class="center">${lantai_s_ho ? '&check;' : ''}</td>
                            <td class="center">${lantai_s_18 ? '&check;' : ''}</td>
                            <td class="center">${lantai_m_ho ? '&check;' : ''}</td>
                            <td class="center">${lantai_m_23 ? '&check;' : ''}</td>
                            <td class="center">${lantai_m_4 ? '&check;' : ''}</td>
                        </tr>
            
                        <tr>
                            <td>Dekatkan alat-alat pasien</td>
                            <td class="center">${alat_p_ho ? '&check;' : ''}</td>
                            <td class="center">${alat_p_10 ? '&check;' : ''}</td>
                            <td class="center">${alat_s_ho ? '&check;' : ''}</td>
                            <td class="center">${alat_s_18 ? '&check;' : ''}</td>
                            <td class="center">${alat_m_ho ? '&check;' : ''}</td>
                            <td class="center">${alat_m_23 ? '&check;' : ''}</td>
                            <td class="center">${alat_m_4 ? '&check;' : ''}</td>
                        </tr>
                        <tr>
                            <td>Edukasi pasien tentang efek samping obat yang diberikan</td>
                            <td class="center">${edukasi_p_ho ? '&check;' : ''}</td>
                            <td class="center">${edukasi_p_10 ? '&check;' : ''}</td>
                            <td class="center">${edukasi_s_ho ? '&check;' : ''}</td>
                            <td class="center">${edukasi_s_18 ? '&check;' : ''}</td>
                            <td class="center">${edukasi_m_ho ? '&check;' : ''}</td>
                            <td class="center">${edukasi_m_23 ? '&check;' : ''}</td>
                            <td class="center">${edukasi_m_4 ? '&check;' : ''}</td>
                        </tr>
                        <tr>
                            <td>Tidak meninggalkan pasien di kamar mandi saat menggunakan commode</td>
                            <td class="center">${commode_p_ho ? '&check;' : ''}</td>
                            <td class="center">${commode_p_10 ? '&check;' : ''}</td>
                            <td class="center">${commode_s_ho ? '&check;' : ''}</td>
                            <td class="center">${commode_s_18 ? '&check;' : ''}</td>
                            <td class="center">${commode_m_ho ? '&check;' : ''}</td>
                            <td class="center">${commode_m_23 ? '&check;' : ''}</td>
                            <td class="center">${commode_m_4 ? '&check;' : ''}</td>
                        </tr>
                        <tr>
                            <td colspan="8" class="bold text-uppercase">Risiko Tinggi</td>
                        </tr>
                        <tr>
                            <td>Pasang gelang khusus (Warna Kuning)</td>
                            <td class="center">${gelang_p_ho ? '&check;' : ''}</td>
                            <td class="center">${gelang_p_10 ? '&check;' : ''}</td>
                            <td class="center">${gelang_s_ho ? '&check;' : ''}</td>
                            <td class="center">${gelang_s_18 ? '&check;' : ''}</td>
                            <td class="center">${gelang_m_ho ? '&check;' : ''}</td>
                            <td class="center">${gelang_m_23 ? '&check;' : ''}</td>
                            <td class="center">${gelang_m_4 ? '&check;' : ''}</td>
                        </tr>
                        <tr>
                            <td>Tempatkan pasien di kamar yang paling dekat dengan Nurse Station (jika memungkinkan)</td>
                            <td class="center">${station_p_ho ? '&check;' : ''}</td>
                            <td class="center">${station_p_10 ? '&check;' : ''}</td>
                            <td class="center">${station_s_ho ? '&check;' : ''}</td>
                            <td class="center">${station_s_18 ? '&check;' : ''}</td>
                            <td class="center">${station_m_ho ? '&check;' : ''}</td>
                            <td class="center">${station_m_23 ? '&check;' : ''}</td>
                            <td class="center">${station_m_4 ? '&check;' : ''}</td>
                        </tr>
                        <tr>
                            <td class="bold">Paraf</td>
                            <td class="center">${paraf_p_ho ? '&check;' : '&#10006;'}</td>
                            <td class="center">${paraf_p_10 ? '&check;' : '&#10006;'}</td>
                            <td class="center">${paraf_s_ho ? '&check;' : '&#10006;'}</td>
                            <td class="center">${paraf_s_18 ? '&check;' : '&#10006;'}</td>
                            <td class="center">${paraf_m_ho ? '&check;' : '&#10006;'}</td>
                            <td class="center">${paraf_m_23 ? '&check;' : '&#10006;'}</td>
                            <td class="center">${paraf_m_4 ? '&check;' : '&#10006;'}</td>
                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        `;
        $('#tabel-uprjpd .body-table').append(html);
    }

    // UPRJPD
    function showUpayaPencegahanRisikoJatuhPasienDewasa(data, id_pendaftaran, id_layanan_pendaftaran, bed) {
        $('#tabel-uprjpd .body-table').empty();
        if (data !== null) {
            $.each(data, function(i, v) {

                const selOp =
                  

                    '<td align="center">' +
                        '<button type="button" class="btn btn-success btn-xs btn-tooltip" onclick="editUpayaPencegahanRisikoJatuhPasienDewasa(this, ' + v.id + ', ' + id_pendaftaran + ', ' + id_layanan_pendaftaran + ', \'' + bed + '\')">' +
                            '<i class="fas fa-edit" style="color:rgb(39, 44, 49);"></i>' +
                            '<span class="tooltip-text tooltip-left">Edit</span>' + // Tooltip ke kiri
                        '</button> ' +

                        '<button type="button" class="btn btn-danger btn-xs btn-tooltip" onclick="hapusUpayaPencegahanResikoJatuhPasienDewasa(this, ' + v.id + ')">' +
                            '<i class="fas fa-trash-alt" style="color:rgb(39, 44, 49);"></i>' +
                            '<span class="tooltip-text tooltip-right">Hapus</span>' + // Tooltip ke kanan
                        '</button>' +
                    '</td>';



                let html = /* html */ `
                <tr>
                    <td class="number-terapi" align="center">${(++i)}</td>
                    <td class="center">${datefmysql(v.tanggal_pengkajian)}</td>
                    <td align="center">${v.perawat_p || '-' }</td>
                    <td align="center">${v.perawat_s || '-'}</td>
                    <td align="center">${v.perawat_m || '-'}</td>
                    <td align="center"></td>
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
                                <td colspan="8" class="bold text-uppercase">Risiko Rendah/Sedang</td>
                            </tr>
                            <tr>
                                <td>Bel berfungsi dan mudah dijangkau</td>
                                <td class="center">${v.bel_p_ho == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.bel_p_10 == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.bel_s_ho == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.bel_s_18 == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.bel_m_ho == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.bel_m_23 == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.bel_m_4 == '1' ? '&check;' : ''}</td>
                            </tr>
                            <tr>
                                <td>Roda tempat tidur terkunci</td>
                                <td class="center">${v.roda_p_ho == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.roda_p_10 == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.roda_s_ho == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.roda_s_18 == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.roda_m_ho == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.roda_m_23 == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.roda_m_4 == '1' ? '&check;' : ''}</td>
                            </tr>
                            <tr>
                                <td>Posisikan tempat tidur pada posisi terendah</td>
                                <td class="center">${v.ptt_p_ho == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.ptt_p_10 == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.ptt_s_ho == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.ptt_s_18 == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.ptt_m_ho == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.ptt_m_23 == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.ptt_m_4 == '1' ? '&check;' : ''}</td>
                            </tr>
                            <tr>
                                <td>Pagar pengaman tempat tidur dinaikan</td>
                                <td class="center">${v.ppt_p_ho == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.ppt_p_10 == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.ppt_s_ho == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.ppt_s_18 == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.ppt_m_ho == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.ppt_m_23 == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.ppt_m_4 == '1' ? '&check;' : ''}</td>
                            </tr>
                            <tr>
                                <td>Penerangan cukup</td>
                                <td class="center">${v.penerangan_p_ho == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.penerangan_p_10 == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.penerangan_s_ho == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.penerangan_s_18 == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.penerangan_m_ho == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.penerangan_m_23 == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.penerangan_m_4 == '1' ? '&check;' : ''}</td>
                            </tr>
                            <tr>
                                <td>Pastikan alas kaki yang tidak licin untuk pasien yang dapat berjalan</td>
                                <td class="center">${v.alas_p_ho == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.alas_p_10 == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.alas_s_ho == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.alas_s_18 == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.alas_m_ho == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.alas_m_23 == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.alas_m_4 == '1' ? '&check;' : ''}</td>
                            </tr>
                            <tr>
                                <td>Lantai kering dan tidak licin</td>
                                <td class="center">${v.lantai_p_ho == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.lantai_p_10 == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.lantai_s_ho == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.lantai_s_18 == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.lantai_m_ho == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.lantai_m_23 == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.lantai_m_4 == '1' ? '&check;' : ''}</td>
                            </tr>
                            <tr>
                                <td colspan="8" class="bold text-uppercase">Risiko Sedang</td>
                            </tr>
                            <tr>
                                <td>Dekatkan alat-alat pasien</td>
                                <td class="center">${v.alat_p_ho == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.alat_p_10 == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.alat_s_ho == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.alat_s_18 == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.alat_m_ho == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.alat_m_23 == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.alat_m_4 == '1' ? '&check;' : ''}</td>
                            </tr>
                            <tr>
                                <td>Edukasi pasien tentang efek samping obat yang diberikan</td>
                                <td class="center">${v.edukasi_p_ho == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.edukasi_p_10 == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.edukasi_s_ho == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.edukasi_s_18 == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.edukasi_m_ho == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.edukasi_m_23 == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.edukasi_m_4 == '1' ? '&check;' : ''}</td>
                            </tr>
                            <tr>
                                <td>Tidak meninggalkan pasien di kamar mandi saat menggunakan commode</td>
                                <td class="center">${v.commode_p_ho == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.commode_p_10 == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.commode_s_ho == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.commode_s_18 == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.commode_m_ho == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.commode_m_23 == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.commode_m_4 == '1' ? '&check;' : ''}</td>
                            </tr>
                            <tr>
                                <td colspan="8" class="bold text-uppercase">Risiko Tinggi</td>
                            </tr>
                            <tr>
                                <td>Pasang gelang khusus (Warna Kuning)</td>
                                <td class="center">${v.gelang_p_ho == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.gelang_p_10 == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.gelang_s_ho == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.gelang_s_18 == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.gelang_m_ho == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.gelang_m_23 == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.gelang_m_4 == '1' ? '&check;' : ''}</td>
                            </tr>
                            <tr>
                                <td>Tempatkan pasien di kamar yang paling dekat dengan Nurse Station (jika memungkinkan)</td>
                                <td class="center">${v.station_p_ho == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.station_p_10 == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.station_s_ho == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.station_s_18 == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.station_m_ho == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.station_m_23 == '1' ? '&check;' : ''}</td>
                                <td class="center">${v.station_m_4 == '1' ? '&check;' : ''}</td>
                            </tr>
                            <tr>
                                <td class="bold">Paraf</td>
                                <td class="center">${v.paraf_p_ho == '1' ? '&check;' : '&#10006;'}</td>
                                <td class="center">${v.paraf_p_10 == '1' ? '&check;' : '&#10006;'}</td>
                                <td class="center">${v.paraf_s_ho == '1' ? '&check;' : '&#10006;'}</td>
                                <td class="center">${v.paraf_s_18 == '1' ? '&check;' : '&#10006;'}</td>
                                <td class="center">${v.paraf_m_ho == '1' ? '&check;' : '&#10006;'}</td>
                                <td class="center">${v.paraf_m_23 == '1' ? '&check;' : '&#10006;'}</td>
                                <td class="center">${v.paraf_m_4 == '1' ? '&check;' : '&#10006;'}</td>
                            </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            `;

                $('#tabel-uprjpd .body-table').append(html);

                numberUprjpl = i;
            })
        }
    }

    // UPRJPD
    function editUpayaPencegahanRisikoJatuhPasienDewasa(obj, id, id_pendaftaran, id_layanan_pendaftaran, bed) {
        const modal = $('#modal-edit-upaya-pencegahan-risiko-jatuh-pasien-dewasa');
        $('#update-uprjpd').children().remove();

        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_upaya_pencegahan_risiko_jatuh_pasien_dewasa") ?>/id/' +
                id,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $('#update-uprjpd').empty();
                $('#id-upaya-pencegahan-risiko-jatuh-pasien-dewasa').val(id);

                function formatTanggalKhusus(waktu) {
                    var el = waktu.split('-');
                    var tahun = el[0];
                    var bulan = el[1];
                    var hari = el[2];
                    return hari + '/' + bulan + '/' + tahun;

                }

                let edit_tanggal_pengkajian = formatTanggalKhusus(data.tanggal_pengkajian);
                $('#uprjpd-edit-tanggal-pengkajian').val(edit_tanggal_pengkajian);

                let cttntndkn = '';
                cttntndkn =
                    `  <button type="button" class="btn btn-secondary waves-effect" onclick="$('#modal-edit-upaya-pencegahan-risiko-jatuh-pasien-dewasa').modal('hide');"><i class="fas fa-times-circle mr-1"></i>Tutup</button>
                <button type="button" class="btn btn-info waves-effect" onclick="updateUpayaPencegahanRisikoJatuhPasienDewasa(${id_pendaftaran}, ${id_layanan_pendaftaran}, '${bed}')"><i class="fas fa-save mr-1"></i>Update</button>`;
                $('#update-uprjpd').append(cttntndkn);

                // Bel berfungsi dan mudah dihangkau
                data.bel_p_ho == '1' ? $('#uprjpd-edit-bel-p-ho').prop('checked', true) : $(
                    '#uprjpd-edit-bel-p-ho').prop('checked', false);
                data.bel_p_10 == '1' ? $('#uprjpd-edit-bel-p-10').prop('checked', true) : $(
                    '#uprjpd-edit-bel-p-10').prop('checked', false);
                data.bel_s_ho == '1' ? $('#uprjpd-edit-bel-s-ho').prop('checked', true) : $(
                    '#uprjpd-edit-bel-s-ho').prop('checked', false);
                data.bel_s_18 == '1' ? $('#uprjpd-edit-bel-s-18').prop('checked', true) : $(
                    '#uprjpd-edit-bel-s-18').prop('checked', false);
                data.bel_m_ho == '1' ? $('#uprjpd-edit-bel-m-ho').prop('checked', true) : $(
                    '#uprjpd-edit-bel-m-ho').prop('checked', false);
                data.bel_m_23 == '1' ? $('#uprjpd-edit-bel-m-23').prop('checked', true) : $(
                    '#uprjpd-edit-bel-m-23').prop('checked', false);
                data.bel_m_4 == '1' ? $('#uprjpd-edit-bel-m-4').prop('checked', true) : $(
                    '#uprjpd-edit-bel-m-4').prop('checked', false);

                // Roda tempat tidur terkunci
                data.roda_p_ho == '1' ? $('#uprjpd-edit-roda-p-ho').prop('checked', true) : $(
                    '#uprjpd-edit-roda-p-ho').prop('checked', false);
                data.roda_p_10 == '1' ? $('#uprjpd-edit-roda-p-10').prop('checked', true) : $(
                    '#uprjpd-edit-roda-p-10').prop('checked', false);
                data.roda_s_ho == '1' ? $('#uprjpd-edit-roda-s-ho').prop('checked', true) : $(
                    '#uprjpd-edit-roda-s-ho').prop('checked', false);
                data.roda_s_18 == '1' ? $('#uprjpd-edit-roda-s-18').prop('checked', true) : $(
                    '#uprjpd-edit-roda-s-18').prop('checked', false);
                data.roda_m_ho == '1' ? $('#uprjpd-edit-roda-m-ho').prop('checked', true) : $(
                    '#uprjpd-edit-roda-m-ho').prop('checked', false);
                data.roda_m_23 == '1' ? $('#uprjpd-edit-roda-m-23').prop('checked', true) : $(
                    '#uprjpd-edit-roda-m-23').prop('checked', false);
                data.roda_m_4 == '1' ? $('#uprjpd-edit-roda-m-4').prop('checked', true) : $(
                    '#uprjpd-edit-roda-m-4').prop('checked', false);

                // Posisikan tempat tidur pada posisi terendah
                data.ptt_p_ho == '1' ? $('#uprjpd-edit-ptt-p-ho').prop('checked', true) : $(
                    '#uprjpd-edit-ptt-p-ho').prop('checked', false);
                data.ptt_p_10 == '1' ? $('#uprjpd-edit-ptt-p-10').prop('checked', true) : $(
                    '#uprjpd-edit-ptt-p-10').prop('checked', false);
                data.ptt_s_ho == '1' ? $('#uprjpd-edit-ptt-s-ho').prop('checked', true) : $(
                    '#uprjpd-edit-ptt-s-ho').prop('checked', false);
                data.ptt_s_18 == '1' ? $('#uprjpd-edit-ptt-s-18').prop('checked', true) : $(
                    '#uprjpd-edit-ptt-s-18').prop('checked', false);
                data.ptt_m_ho == '1' ? $('#uprjpd-edit-ptt-m-ho').prop('checked', true) : $(
                    '#uprjpd-edit-ptt-m-ho').prop('checked', false);
                data.ptt_m_23 == '1' ? $('#uprjpd-edit-ptt-m-23').prop('checked', true) : $(
                    '#uprjpd-edit-ptt-m-23').prop('checked', false);
                data.ptt_m_4 == '1' ? $('#uprjpd-edit-ptt-m-4').prop('checked', true) : $(
                    '#uprjpd-edit-ptt-m-4').prop('checked', false);

                // Pagar pengaman tempat tidur dinaikan
                data.ppt_p_ho == '1' ? $('#uprjpd-edit-ppt-p-ho').prop('checked', true) : $(
                    '#uprjpd-edit-ppt-p-ho').prop('checked', false);
                data.ppt_p_10 == '1' ? $('#uprjpd-edit-ppt-p-10').prop('checked', true) : $(
                    '#uprjpd-edit-ppt-p-10').prop('checked', false);
                data.ppt_s_ho == '1' ? $('#uprjpd-edit-ppt-s-ho').prop('checked', true) : $(
                    '#uprjpd-edit-ppt-s-ho').prop('checked', false);
                data.ppt_s_18 == '1' ? $('#uprjpd-edit-ppt-s-18').prop('checked', true) : $(
                    '#uprjpd-edit-ppt-s-18').prop('checked', false);
                data.ppt_m_ho == '1' ? $('#uprjpd-edit-ppt-m-ho').prop('checked', true) : $(
                    '#uprjpd-edit-ppt-m-ho').prop('checked', false);
                data.ppt_m_23 == '1' ? $('#uprjpd-edit-ppt-m-23').prop('checked', true) : $(
                    '#uprjpd-edit-ppt-m-23').prop('checked', false);
                data.ppt_m_4 == '1' ? $('#uprjpd-edit-ppt-m-4').prop('checked', true) : $(
                    '#uprjpd-edit-ppt-m-4').prop('checked', false);

                // Penerang cukup
                data.penerangan_p_ho == '1' ? $('#uprjpd-edit-penerangan-p-ho').prop('checked', true) : $(
                    '#uprjpd-edit-penerangan-p-ho').prop('checked', false);
                data.penerangan_p_10 == '1' ? $('#uprjpd-edit-penerangan-p-10').prop('checked', true) : $(
                    '#uprjpd-edit-penerangan-p-10').prop('checked', false);
                data.penerangan_s_ho == '1' ? $('#uprjpd-edit-penerangan-s-ho').prop('checked', true) : $(
                    '#uprjpd-edit-penerangan-s-ho').prop('checked', false);
                data.penerangan_s_18 == '1' ? $('#uprjpd-edit-penerangan-s-18').prop('checked', true) : $(
                    '#uprjpd-edit-penerangan-s-18').prop('checked', false);
                data.penerangan_m_ho == '1' ? $('#uprjpd-edit-penerangan-m-ho').prop('checked', true) : $(
                    '#uprjpd-edit-penerangan-m-ho').prop('checked', false);
                data.penerangan_m_23 == '1' ? $('#uprjpd-edit-penerangan-m-23').prop('checked', true) : $(
                    '#uprjpd-edit-penerangan-m-23').prop('checked', false);
                data.penerangan_m_4 == '1' ? $('#uprjpd-edit-penerangan-m-4').prop('checked', true) : $(
                    '#uprjpd-edit-penerangan-m-4').prop('checked', false);

                // Pastikan alas kaki yang tidak licin untuk pasien yang dapat berjalan
                data.alas_p_ho == '1' ? $('#uprjpd-edit-alas-p-ho').prop('checked', true) : $(
                    '#uprjpd-edit-alas-p-ho').prop('checked', false);
                data.alas_p_10 == '1' ? $('#uprjpd-edit-alas-p-10').prop('checked', true) : $(
                    '#uprjpd-edit-alas-p-10').prop('checked', false);
                data.alas_s_ho == '1' ? $('#uprjpd-edit-alas-s-ho').prop('checked', true) : $(
                    '#uprjpd-edit-alas-s-ho').prop('checked', false);
                data.alas_s_18 == '1' ? $('#uprjpd-edit-alas-s-18').prop('checked', true) : $(
                    '#uprjpd-edit-alas-s-18').prop('checked', false);
                data.alas_m_ho == '1' ? $('#uprjpd-edit-alas-m-ho').prop('checked', true) : $(
                    '#uprjpd-edit-alas-m-ho').prop('checked', false);
                data.alas_m_23 == '1' ? $('#uprjpd-edit-alas-m-23').prop('checked', true) : $(
                    '#uprjpd-edit-alas-m-23').prop('checked', false);
                data.alas_m_4 == '1' ? $('#uprjpd-edit-alas-m-4').prop('checked', true) : $(
                    '#uprjpd-edit-alas-m-4').prop('checked', false);

                // Lantai kering dan tidak licin
                data.lantai_p_ho == '1' ? $('#uprjpd-edit-lantai-p-ho').prop('checked', true) : $(
                    '#uprjpd-edit-lantai-p-ho').prop('checked', false);
                data.lantai_p_10 == '1' ? $('#uprjpd-edit-lantai-p-10').prop('checked', true) : $(
                    '#uprjpd-edit-lantai-p-10').prop('checked', false);
                data.lantai_s_ho == '1' ? $('#uprjpd-edit-lantai-s-ho').prop('checked', true) : $(
                    '#uprjpd-edit-lantai-s-ho').prop('checked', false);
                data.lantai_s_18 == '1' ? $('#uprjpd-edit-lantai-s-18').prop('checked', true) : $(
                    '#uprjpd-edit-lantai-s-18').prop('checked', false);
                data.lantai_m_ho == '1' ? $('#uprjpd-edit-lantai-m-ho').prop('checked', true) : $(
                    '#uprjpd-edit-lantai-m-ho').prop('checked', false);
                data.lantai_m_23 == '1' ? $('#uprjpd-edit-lantai-m-23').prop('checked', true) : $(
                    '#uprjpd-edit-lantai-m-23').prop('checked', false);
                data.lantai_m_4 == '1' ? $('#uprjpd-edit-lantai-m-4').prop('checked', true) : $(
                    '#uprjpd-edit-lantai-m-4').prop('checked', false);

                // Dekatkan alat-alat pasien
                data.alat_p_ho == '1' ? $('#uprjpd-edit-alat-p-ho').prop('checked', true) : $(
                    '#uprjpd-edit-alat-p-ho').prop('checked', false);
                data.alat_p_10 == '1' ? $('#uprjpd-edit-alat-p-10').prop('checked', true) : $(
                    '#uprjpd-edit-alat-p-10').prop('checked', false);
                data.alat_s_ho == '1' ? $('#uprjpd-edit-alat-s-ho').prop('checked', true) : $(
                    '#uprjpd-edit-alat-s-ho').prop('checked', false);
                data.alat_s_18 == '1' ? $('#uprjpd-edit-alat-s-18').prop('checked', true) : $(
                    '#uprjpd-edit-alat-s-18').prop('checked', false);
                data.alat_m_ho == '1' ? $('#uprjpd-edit-alat-m-ho').prop('checked', true) : $(
                    '#uprjpd-edit-alat-m-ho').prop('checked', false);
                data.alat_m_23 == '1' ? $('#uprjpd-edit-alat-m-23').prop('checked', true) : $(
                    '#uprjpd-edit-alat-m-23').prop('checked', false);
                data.alat_m_4 == '1' ? $('#uprjpd-edit-alat-m-4').prop('checked', true) : $(
                    '#uprjpd-edit-alat-m-4').prop('checked', false);

                // Edukasi pasien tentang efek samping obat yang diberikan
                data.edukasi_p_ho == '1' ? $('#uprjpd-edit-edukasi-p-ho').prop('checked', true) : $(
                    '#uprjpd-edit-edukasi-p-ho').prop('checked', false);
                data.edukasi_p_10 == '1' ? $('#uprjpd-edit-edukasi-p-10').prop('checked', true) : $(
                    '#uprjpd-edit-edukasi-p-10').prop('checked', false);
                data.edukasi_s_ho == '1' ? $('#uprjpd-edit-edukasi-s-ho').prop('checked', true) : $(
                    '#uprjpd-edit-edukasi-s-ho').prop('checked', false);
                data.edukasi_s_18 == '1' ? $('#uprjpd-edit-edukasi-s-18').prop('checked', true) : $(
                    '#uprjpd-edit-edukasi-s-18').prop('checked', false);
                data.edukasi_m_ho == '1' ? $('#uprjpd-edit-edukasi-m-ho').prop('checked', true) : $(
                    '#uprjpd-edit-edukasi-m-ho').prop('checked', false);
                data.edukasi_m_23 == '1' ? $('#uprjpd-edit-edukasi-m-23').prop('checked', true) : $(
                    '#uprjpd-edit-edukasi-m-23').prop('checked', false);
                data.edukasi_m_4 == '1' ? $('#uprjpd-edit-edukasi-m-4').prop('checked', true) : $(
                    '#uprjpd-edit-edukasi-m-4').prop('checked', false);

                // Tidak meninggalkan pasien di kamar mandi saat menggunakan commode
                data.commode_p_ho == '1' ? $('#uprjpd-edit-commode-p-ho').prop('checked', true) : $(
                    '#uprjpd-edit-commode-p-ho').prop('checked', false);
                data.commode_p_10 == '1' ? $('#uprjpd-edit-commode-p-10').prop('checked', true) : $(
                    '#uprjpd-edit-commode-p-10').prop('checked', false);
                data.commode_s_ho == '1' ? $('#uprjpd-edit-commode-s-ho').prop('checked', true) : $(
                    '#uprjpd-edit-commode-s-ho').prop('checked', false);
                data.commode_s_18 == '1' ? $('#uprjpd-edit-commode-s-18').prop('checked', true) : $(
                    '#uprjpd-edit-commode-s-18').prop('checked', false);
                data.commode_m_ho == '1' ? $('#uprjpd-edit-commode-m-ho').prop('checked', true) : $(
                    '#uprjpd-edit-commode-m-ho').prop('checked', false);
                data.commode_m_23 == '1' ? $('#uprjpd-edit-commode-m-23').prop('checked', true) : $(
                    '#uprjpd-edit-commode-m-23').prop('checked', false);
                data.commode_m_4 == '1' ? $('#uprjpd-edit-commode-m-4').prop('checked', true) : $(
                    '#uprjpd-edit-commode-m-4').prop('checked', false);

                // Pasang gelang khusus
                data.gelang_p_ho == '1' ? $('#uprjpd-edit-gelang-p-ho').prop('checked', true) : $(
                    '#uprjpd-edit-gelang-p-ho').prop('checked', false);
                data.gelang_p_10 == '1' ? $('#uprjpd-edit-gelang-p-10').prop('checked', true) : $(
                    '#uprjpd-edit-gelang-p-10').prop('checked', false);
                data.gelang_s_ho == '1' ? $('#uprjpd-edit-gelang-s-ho').prop('checked', true) : $(
                    '#uprjpd-edit-gelang-s-ho').prop('checked', false);
                data.gelang_s_18 == '1' ? $('#uprjpd-edit-gelang-s-18').prop('checked', true) : $(
                    '#uprjpd-edit-gelang-s-18').prop('checked', false);
                data.gelang_m_ho == '1' ? $('#uprjpd-edit-gelang-m-ho').prop('checked', true) : $(
                    '#uprjpd-edit-gelang-m-ho').prop('checked', false);
                data.gelang_m_23 == '1' ? $('#uprjpd-edit-gelang-m-23').prop('checked', true) : $(
                    '#uprjpd-edit-gelang-m-23').prop('checked', false);
                data.gelang_m_4 == '1' ? $('#uprjpd-edit-gelang-m-4').prop('checked', true) : $(
                    '#uprjpd-edit-gelang-m-4').prop('checked', false);

                // Tempatkan pasien di kamar yang paling dekat dengan Nurse Station
                data.station_p_ho == '1' ? $('#uprjpd-edit-station-p-ho').prop('checked', true) : $(
                    '#uprjpd-edit-station-p-ho').prop('checked', false);
                data.station_p_10 == '1' ? $('#uprjpd-edit-station-p-10').prop('checked', true) : $(
                    '#uprjpd-edit-station-p-10').prop('checked', false);
                data.station_s_ho == '1' ? $('#uprjpd-edit-station-s-ho').prop('checked', true) : $(
                    '#uprjpd-edit-station-s-ho').prop('checked', false);
                data.station_s_18 == '1' ? $('#uprjpd-edit-station-s-18').prop('checked', true) : $(
                    '#uprjpd-edit-station-s-18').prop('checked', false);
                data.station_m_ho == '1' ? $('#uprjpd-edit-station-m-ho').prop('checked', true) : $(
                    '#uprjpd-edit-station-m-ho').prop('checked', false);
                data.station_m_23 == '1' ? $('#uprjpd-edit-station-m-23').prop('checked', true) : $(
                    '#uprjpd-edit-station-m-23').prop('checked', false);
                data.station_m_4 == '1' ? $('#uprjpd-edit-station-m-4').prop('checked', true) : $(
                    '#uprjpd-edit-station-m-4').prop('checked', false);

                // Paraf
                data.paraf_p_ho == '1' ? $('#uprjpd-edit-paraf-p-ho').prop('checked', true) : $(
                    '#uprjpd-edit-paraf-p-ho').prop('checked', false);
                data.paraf_p_10 == '1' ? $('#uprjpd-edit-paraf-p-10').prop('checked', true) : $(
                    '#uprjpd-edit-paraf-p-10').prop('checked', false);
                data.paraf_s_ho == '1' ? $('#uprjpd-edit-paraf-s-ho').prop('checked', true) : $(
                    '#uprjpd-edit-paraf-s-ho').prop('checked', false);
                data.paraf_s_18 == '1' ? $('#uprjpd-edit-paraf-s-18').prop('checked', true) : $(
                    '#uprjpd-edit-paraf-s-18').prop('checked', false);
                data.paraf_m_ho == '1' ? $('#uprjpd-edit-paraf-m-ho').prop('checked', true) : $(
                    '#uprjpd-edit-paraf-m-ho').prop('checked', false);
                data.paraf_m_23 == '1' ? $('#uprjpd-edit-paraf-m-23').prop('checked', true) : $(
                    '#uprjpd-edit-paraf-m-23').prop('checked', false);
                data.paraf_m_4 == '1' ? $('#uprjpd-edit-paraf-m-4').prop('checked', true) : $(
                    '#uprjpd-edit-paraf-m-4').prop('checked', false);

                $('#uprjpd-edit-perawat-p').val(data.id_perawat_p);
                $('#s2id_uprjpd-edit-perawat-p a .select2c-chosen').html(data.perawat_p);

                $('#uprjpd-edit-perawat-s').val(data.id_perawat_s);
                $('#s2id_uprjpd-edit-perawat-s a .select2c-chosen').html(data.perawat_s);

                $('#uprjpd-edit-perawat-m').val(data.id_perawat_m);
                $('#s2id_uprjpd-edit-perawat-m a .select2c-chosen').html(data.perawat_m);

                modal.modal('show');
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })
    }

    // UPRJPD
    // function updateUpayaPencegahanRisikoJatuhPasienDewasa(id_pendaftaran, id_layanan_pendaftaran, bed) {
    //     $.ajax({
    //         type: 'PUT',
    //         url: '<?= base_url("pelayanan/api/pelayanan/update_upaya_pencegahan_risiko_jatuh_pasien_dewasa") ?>',
    //         data: $('#form-edit-upaya-pencegahan-risiko-jatuh-pasien-dewasa').serialize(),
    //         cache: false,
    //         dataType: 'JSON',
    //         success: function(data) {
    //             if (data.status) {
    //                 messageEditSuccess();
    //                 entriKeperawatan(id_pendaftaran, id_layanan_pendaftaran, bed);
    //             } else {
    //                 messageEditFailed();
    //             }

    //             $('#modal-edit-upaya-pencegahan-risiko-jatuh-pasien-dewasa').modal('hide');
    //         },
    //         error: function(e) {
    //             messageEditFailed();
    //         }
    //     });
    // }

    // UPRJPD
    // function hapusUpayaPencegahanResikoJatuhPasienDewasa(obj, id) {
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
    //                         url: '<?= base_url("pelayanan/api/pelayanan/hapus_upaya_pencegahan_risiko_jatuh_pasien_dewasa") ?>/' +
    //                             id,
    //                         cache: false,
    //                         dataType: 'JSON',
    //                         success: function(data) {
    //                             if (data.status) {
    //                                 messageCustom(data.message, 'Success');
    //                                 removeList(obj);
    //                             } else {
    //                                 customAlert('Hapus Pengkajian Uang Resiko Jatuh Dewasa ?', data
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

    // function updateUpayaPencegahanRisikoJatuhPasienDewasa(id_pendaftaran, id_layanan_pendaftaran, bed) {
    //     const formData = $('#form-edit-upaya-pencegahan-risiko-jatuh-pasien-dewasa').serializeArray();
        
    //     // Ubah ke objek data
    //     const dataObj = {};
    //     $.each(formData, function(_, field) {
    //         dataObj[field.name] = field.value;
    //     });

    //     // Tambahkan ID user yang mengedit
    //     dataObj['updated_by'] = userLoginId;
    //     dataObj['_method'] = 'POST'; // Jika dibutuhkan

    //     $.ajax({
    //         type: 'POST', // Tetap pakai POST karena beberapa server tidak support PUT langsung
    //         url: '<?= base_url("pelayanan/api/pelayanan/update_upaya_pencegahan_risiko_jatuh_pasien_dewasa") ?>',
    //         data: dataObj,
    //         cache: false,
    //         dataType: 'JSON',
    //         success: function(data) {
    //             console.log('User yang update:', userLoginId); // debug
    //             if (data.status) {
    //                 messageEditSuccess();
    //                 entriKeperawatan(id_pendaftaran, id_layanan_pendaftaran, bed);
    //             } else {
    //                 messageEditFailed();
    //             }

    //             $('#modal-edit-upaya-pencegahan-risiko-jatuh-pasien-dewasa').modal('hide');
    //         },
    //         error: function(e) {
    //             messageEditFailed();
    //         }
    //     });
    // }

    function updateUpayaPencegahanRisikoJatuhPasienDewasa(id_pendaftaran, id_layanan_pendaftaran, bed) {
        const formData = $('#form-edit-upaya-pencegahan-risiko-jatuh-pasien-dewasa').serializeArray();

        // Ubah ke objek data
        const dataObj = {};
        $.each(formData, function(_, field) {
            dataObj[field.name] = field.value;
        });

        // Tambahkan ID user yang mengedit
        dataObj['updated_by'] = userLoginId;

        $.ajax({
            type: 'POST',
            url: '<?= base_url("pelayanan/api/pelayanan/update_upaya_pencegahan_risiko_jatuh_pasien_dewasa") ?>',
            data: dataObj,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                console.log('User yang update:', userLoginId); // debug
                if (data.status) {
                    messageEditSuccess();
                    entriKeperawatan(id_pendaftaran, id_layanan_pendaftaran, bed);
                } else {
                    messageEditFailed();
                }

                $('#modal-edit-upaya-pencegahan-risiko-jatuh-pasien-dewasa').modal('hide');
            },
            error: function(e) {
                messageEditFailed();
            }
        });
    }

    function hapusUpayaPencegahanResikoJatuhPasienDewasa(obj, id) {
        bootbox.dialog({
            message: "Anda yakin akan menghapus data ini?",
            title: "Hapus Data",
            buttons: {
                batal: {
                    label: '<i class="fas fa-times-circle mr-1"></i>Batal',
                    className: "btn-secondary"
                },
                hapus: {
                    label: '<i class="fas fa-trash-alt mr-1"></i>Hapus',
                    className: "btn-info",
                    callback: function() {
                        console.log('User yang hapus:', userLoginId); // debug
                        $.ajax({
                            type: 'POST',
                            url: '<?= base_url("pelayanan/api/pelayanan/hapus_upaya_pencegahan_risiko_jatuh_pasien_dewasa") ?>/' + id,
                            data: {
                                deleted_by: userLoginId,
                                _method: 'DELETE'
                            },
                            dataType: 'JSON',
                            success: function(data) {
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