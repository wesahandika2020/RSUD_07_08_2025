<script type="text/javascript" src="<?= resource_url() ?>assets/node_modules/wizard/bwizard.js"></script>
<script>
    var dWidth = $(window).width();
    var dHeight = $(window).height();
    var x = screen.width / 2 - dWidth / 2;
    var y = screen.height / 2 - dHeight / 2;

    var JENIS_LAYANAN = '<?= $jenis ?>';
    var GROUP = '<?= $group ?>';
    var FULLNAME = '<?= $fullname ?>';
    var baseUrl = '<?= base_url('pemulasaran_jenazah/api/pemulasaran_jenazah') ?>';

    $(function() {

        // wizard form init
        $("#wizard-form, #wizard-form-jenazah").bwizard();

        // date and time picker setup
        $('.timepicker').timepicker({
            minuteStep: 1,
            showSeconds: true,
            showMeridian: false,
            defaultTime: false,
            showInputs: false,
            disableFocus: true
        });

        getListPemeriksaan(1);
        $('#jenis-rawat').val('<?= $jenis_tindakan; ?>');

        $('#btn_reload').click(function() {
            // resetData();
            getListPemeriksaan(1);
        });

        $('#btn_search').click(function() {
            $('#modal_search').modal('show');
        })

        // datepicker search tanggal
        $('#kesediaan_penanggungbiaya_tgllahir, #tanggal-akhir').datepicker({
            format: 'dd/mm/yyyy',
            endDate: new Date()
        }).on('changeDate', function() {
            $(this).datepicker('hide');
        });

        // remove validasi keyup
        $('.validasi-input, .form-control').keyup(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this);
            }
        });

        // remove validasi change
        $('.validasi-input, .select2-input, .select2c-input, .custom-form').change(function() {
            if ($(this).val() !== '') {
                syams_validation_remove(this);
            }
        });
    });

    function resetData() {
        $('#form_search')[0].reset()
        $('#tanggal-awal, #tanggal-akhir').val('<?= date('d/m/Y') ?>')
    }

    function resetFieldDataJenazah() {
        $("#id_jenazah").val('');
        // $("#id_layanan_pendaftaran").val('');
        $("#id_pemulasaran_jenazah").val('');
        $("#id_penanggung_jawab").val('');
        $("#pemulasaran_petugas_ipj_detail_input").val('');
        $("#pemulasaran_petugas_ipj_detail_input").html('');
        $("#jam_penyerahan_jenazah").val('');
        $("#jam_penyerahan").val('');
        $(".form-staff-ipj").val('');
        $(".form-edit").val('');
        $(".form-penanggung-jawab").val('');
        $("#no_surat_kematian").val('');
        $("#check-keluarga").prop("checked", true);
        $("#check-kepolisian").prop("checked", false);
        $("#check-dinas-sosial").prop("checked", false);
    }

    // hitung umur
    function getAge(dateString) {
        var today = new Date();
        var birthDate = new Date(dateString);
        var age = today.getFullYear() - birthDate.getFullYear();
        var m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        return age;
    }

    function getHariDanTanggal() {
        const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        let date = new Date();
        const kota = "Tangerang";
        let day = date.getDate();
        let month = date.getMonth();
        let yy = date.getYear();
        let year = (yy < 1000) ? yy + 1900 : yy;

        $("#tanggalTTD").text(kota + ', ' + day + ' ' + months[month] + ' ' + year);
    }

    function getListPemeriksaan(page) {
        $('#page_now').val(page);
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pemulasaran_jenazah/api/pemulasaran_jenazah/get_list_pemulasaran_jenazah") ?>/page/' + page + '/jenis/Pemulasaran Jenazah',
            cache: false,
            data: $('#form_search').serialize(),
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {

                // console.log(data);

                if ((page > 1) & (data.data.length === 0)) {
                    getListPemeriksaan(page - 1);
                    return false;
                }
                $('#table_data tbody').empty();

                $('#pagination').html(pagination(data.jumlah, data.limit, data.page, 1));
                $('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

                let html = '';
                let status = '';
                let disable = '';
                let status_resep = '';
                let disable_lanjut = '';
                let disable_resep = '';
                let disable_btl_keluar = '';
                let disable_btl_klinik = '';
                let disable_cco_smtr = '';
                let disable_cco_smtr_btl = '';
                let disable_viewonly = '';
                let accountGroup = "<?= $this->session->userdata('account_group') ?>";

                $.each(data.data, function(i, v) {
                    // Untuk tindak lanjut
                    if (v.tindak_lanjut === null) {
                        disable_lanjut = '';
                        disable = '';
                        disable_cco_smtr = 'disabled';
                        disable_cco_smtr_btl = 'disabled';
                        disable_btl_keluar = 'disabled';
                        disable_btl_klinik = 'disabled';

                    } else if (v.tindak_lanjut === 'cco sementara') {
                        disable_lanjut = 'disabled';
                        disable = '';
                        disable_cco_smtr = 'disabled';

                        if (v.tindak_lanjut_sementara !== '') {
                            disable_cco_smtr_btl = '';
                        } else {
                            disable_cco_smtr_btl = 'disabled';
                        }

                    } else {
                        disable_lanjut = 'disabled';
                        disable = 'disabled';
                        disable_btl_keluar = '';
                        disable_btl_klinik = 'disabled';
                        disable_cco_smtr = '';
                        disable_cco_smtr_btl = 'disabled';
                    }

                    if (v.status_terlayani === 'Belum') {
                        status = '<span class="blinker"><i><i class="fas fa-fw fa-spinner fa-spin m-r-5"></i>Belum</i></span>';
                    } else if (v.status_terlayani === 'Batal') {
                        disable = 'disabled';
                        status = '<h5><span class="label label-danger"><i class="fas fa-fw fa-times m-r-5"></i>Batal</span></h5>';
                    } else {
                        status = '<h5><span class="label label-success"><i class="fas fa-fw fa-check-circle m-r-5"></i>Diperiksa</span></h5>';
                    }

                    if (v.id_resep === null) {
                        status_resep = '-';
                    } else {
                        status_resep = '&checkmark;';
                    }

                    let btn_hidden = '';
                    if ((accountGroup === 'Admin') || (accountGroup === 'Pemulasaran Jenazah') || (accountGroup === 'Kepala Instalasi Rawat Jalan') || (accountGroup === 'Kepala Ruangan Rawat Jalan') || (accountGroup === 'Admin Rekam Medis')) {
                        btn_hidden = '';
                        disable_viewonly = '';
                    } else if ((accountGroup === 'Komite Keperawatan') || accountGroup === 'Kasir') { //READ ONLY
                        btn_hidden = 'hidden';
                        disable_viewonly = 'disabled';
                    } else {
                        btn_hidden = 'hidden';
                        disable_viewonly = '';
                    }

                    let btn_cco_admin = '';
                    if (accountGroup === 'Admin') {
                        btn_cco_admin = '<a class="dropdown-item ' + disable_btl_keluar + ' ' + disable_viewonly + ' waves-effect waves-light btn-xs" ' + btn_hidden + ' href="javascript:void(0)" onclick="pembatalanStatusKeluar(' + v.id_pendaftaran + ',' + v.id + ')"><i class="fas fa-fw fa-times-circle m-r-5"></i>Pembatalan Status Keluar</a>' +
                            '<a class="dropdown-item ' + disable_cco_smtr + ' ' + disable_viewonly + ' waves-effect waves-light btn-xs" ' + btn_hidden + ' href="javascript:void(0)" onclick="statusKeluarSementara(' + v.id_pendaftaran + ',' + v.id + ', \'' + v.tindak_lanjut + '\' )"><i class="fas fa-fw fa-times-circle m-r-5"></i>Status Keluar Sementara</a>';
                    }

                    let no = ((i + 1) + ((data.page - 1) * data.limit));

                    let html = '<tr>' +
                        '<td class="center">' + no + '</td>' +
                        '<td class="center">' + v.no_register + '</td>' +
                        '<td class="nowrap center">' + ((v.tanggal_layanan !== null) ? datetimefmysql(v.tanggal_layanan) : '') + '</td>' +
                        '<td class="center">' + v.id_pasien + '</td>' +
                        '<td class="center">' + v.nama + '</td>' +
                        '<td align="center">' + ((v.bed !== null) ? v.bed : '') + '</td>' +
                        '<td align="center">' + status + '</td>' +
                        '<td align="center">' + ((v.tindak_lanjut !== null) ? v.tindak_lanjut : '-') + '</td>' +
                        '<td align="right">' +
                        '<div class="btn-group"><button type="button" ' + (v.tindak_lanjut == 'Batal' ? 'disabled' : '') + ' class="btn waves-effect waves-light btn-secondary btn-xs dropdown-toggle" data-toggle="dropdown"><i class="fas fa-fw fa-cog"></i></button> ' +
                        '<div class="dropdown-menu">' +
					    '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="showListForm(\'' + v.id_pendaftaran + '\', \'' + v.id + '\', \'' + v.id_pasien + '\')"><i class="fas fa-fw fas fa-notes-medical mr-1"></i>Entri Formulir</a>' +
                        <?php if ($this->session->userdata('account_group') === 'Admin') : ?> '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="detailPemeriksaan(' + v.id_pendaftaran + ',' + v.id + ')"><i class="fas fa-fw fa-pencil-alt m-r-5"></i>Entri Pemeriksaan</a>' +
                        <?php else : ?> '<a class="dropdown-item ' + disable + ' ' + disable_viewonly + ' waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="detailPemeriksaan(' + v.id_pendaftaran + ',' + v.id + ')"><i class="fas fa-fw fa-pencil-alt m-r-5"></i>Entri Pemeriksaan</a>' +
                        <?php endif ?> '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="detailDataJenazah(' + v.id_pendaftaran + ',' + v.id + ')"><i class="fas fa-fw fa-pencil-alt m-r-5"></i>Entri Data Jenazah</a>' +
                        '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="cetakFormTransportasiPribadi(' + v.id_pendaftaran + ',' + v.id + ')"><i class="fas fa-print m-r-5"></i> Transportasi Pribadi</a>' +
                        '<a class="dropdown-item waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="cetakFormInstalasiPJ(' + v.id_pendaftaran + ',' + v.id + ')"><i class="fas fa-print m-r-5"></i> Cetak Form IPJ</a>' +
                        '<a class="dropdown-item ' + (v.tindak_lanjut == 'Pulang' ? 'disabled ' : '') + 'waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="pembatalanIPJ(' + v.id + ')"><i class="fas fa-fw fa-trash-alt mr-1"></i>Pembatalan IPJ</a>' +
                        '<a class="dropdown-item ' + disable_lanjut + ' waves-effect waves-light btn-xs" href="javascript:void(0)" onclick="konfirmasiSelesaiIPJ(' + v.id + ',' + v.id_pendaftaran + ')"><i class="fas fa-fw fa-arrow-circle-right m-r-5"></i>Status Keluar</a>' +
                        btn_cco_admin +
                        '<a class="dropdown-item ' + disable_cco_smtr_btl + ' ' + disable_viewonly + ' waves-effect waves-light btn-xs" ' + btn_hidden + ' href="javascript:void(0)" onclick="pembatalanStatusKeluarSementara(' + v.id_pendaftaran + ',' + v.id + ', \'' + v.tindak_lanjut + '\' )"><i class="fas fa-fw fa-times-circle m-r-5"></i>Pembatalan Status Keluar Sementara</a>' +
                        '</div>' +
                        '</div>' +
                        '</td>' +
                        '</tr>';
                    $('#table_data tbody').append(html);
                });

            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        })
    }

    function paging(page) {
        getListPemeriksaan(page);
    }

    function konfirmasiSelesaiIPJ(id_layanan_pendaftaran, id_pendaftaran) {
        swal.fire({
            title: 'Pemulangan Jenazah',
            text: "Apakah anda yakin akan melakukan Pemulangan Jenazah ?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-save mr-1"></i>Iya',
            cancelButtonText: '<i class="fas fa-times-circle mr-1"></i>Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                simpanSelesaiIPJ(id_layanan_pendaftaran, id_pendaftaran);
            }
        })
    }

    // Simpan Data Pendaftaran
    function simpanSelesaiIPJ(id_layanan_pendaftaran, id_pendaftaran) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('pemulasaran_jenazah/api/pemulasaran_jenazah/simpan_selesai_ipj') ?>/id_layanan_pendaftaran/' + id_layanan_pendaftaran + '/id_pendaftaran/' + id_pendaftaran,
            cache: false,
            dataType: 'JSON',
            // beforeSend: function() {
            // 	showLoader();
            // },
            success: function(data) {
                $('input[name=csrf_syam]').val(data.token);
                if (data.status == false) {
                    swalCustom('warning', 'Pemulangan Jenazah Gagal', data.message);
                } else {
                    messageAddSuccess();
                    getListPemeriksaan('1')
                }
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                swalCustom('error', 'Error', 'Gagal melakukan pemulangan jenazah, silahkan hubungi IT Management');
            }
        });
    }

    function resetFormData() {
        // form search
        $('#tanggal-awal, #tanggal-akhir').val('<?= date('d/m/Y') ?>');

        if (GROUP !== 'Admin') {

            $('#no-register-search, #no-rm-search, #nik-search, #nama-search').val('');

        } else {

            $('#layanan, #no-register-search, #no-rm-search, #nik-search, #nama-search').val('');
        }

        $('.custom-textarea, .custom-form').val('');
        $('.select2-chosen').html('');

        $('#table-diagnosa tbody, #table-tindakan tbody').empty();

        // validasi
        syams_validation_remove('.validasi-input');
        syams_validation_remove('.select2-input');
    }

    function setTanggalPencarian() {
        let nik = $('#nik-search').val();
        let nama = $('#nama-search').val();
        let noRM = $('#no-rm-search').val();
        let tanggalAwal = $('#tanggal-awal').val();
        let tanggalAkhir = $('#tanggal-akhir').val();
        let noRegister = $('#no-register-search').val();

        resetFormData();

        $('#nik-search').val(nik);
        $('#nama-search').val(nama);
        $('#no-rm-search').val(noRM);
        $('#tanggal-awal').val(tanggalAwal);
        $('#tanggal-akhir').val(tanggalAkhir);
        $('#no-register-search').val(noRegister);
    }

    function detailPemeriksaan(id_pendaftaran, id_layanan) {
        $('#wizard-form').bwizard('show', '0');
        // generateNoKematian();

        setTanggalPencarian();
        $('#id-layanan').val(id_layanan);
        $('#id-pendaftaran-pasien').val(id_pendaftaran);

        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_layanan_pendaftaran_detail") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                let umur = '';
                let kelamin = '';
                let pasien = data.pasien;
                let layanan = data.layanan;
                let anamnesa = data.anamnesa[0];
                let fullname = FULLNAME;

                if (pasien !== null) {
                    if (pasien.kelamin == 'L') {
                        kelamin = 'Laki - laki';
                    } else {
                        kelamin = 'Perempuan';
                    }

                    if (pasien.tanggal_lahir !== null) {
                        umur = hitungUmur(pasien.tanggal_lahir) + ' (' + datefmysql(pasien.tanggal_lahir) + ')';
                    }

                    $('#id-pasien').val(pasien.id_pasien);
                    $('#nama-detail').html(pasien.nama);
                    $('#no-rm-detail').html(pasien.id_pasien);
                    $('#no-register-detail').html(pasien.no_register);
                    $('#kelamin-detail').html(kelamin);
                    $('#umur-detail').html(umur);
                    $('#alamat-detail').html(pasien.alamat);
                    $('#alergi-detail').html(pasien.alergi);


                    $("#pemulasaran_asalruangan_detail").html(layanan.bangsal + ' Kelas ' + layanan.kelas + ' Ruang ' + layanan.no_ruang + ' No. Bed ' + layanan.no_bed);

                    $('#alergi').val(pasien.alergi);

                    $('.logo-pasien-alergi').hide();
                    $('.logo-pasien-meninggal').hide();
                    $('.logo-pasien-hiv-aids').hide();
                    $('.logo-pasien-gonorrhea').hide();
                    $('.logo-pasien-hepatitis').hide();
                    $('.logo-pasien-kusta-lepra').hide();
                    $('.logo-pasien-tbc-kp').hide();
                    $('.logo-pasien-pejabat').hide();
                    $('.logo-pasien-pemilik-rs').hide();
                    $('.logo-pasien-potensi-komplain').hide();
                    if (data.profil !== null) {
                        // status profil pasien
                        if (data.profil.is_alergi == 'Ya') {
                            $('.logo-pasien-alergi').show();
                        }
                        if (data.profil.is_died == 'Ya') {
                            $('.logo-pasien-meninggal').show();
                        }
                        if (data.profil.is_hiv == 'Ya') {
                            $('.logo-pasien-hiv-aids').show();
                        }
                        if (data.profil.is_gonorrhea == 'Ya') {
                            $('.logo-pasien-gonorrhea').show();
                        }
                        if (data.profil.is_hepatitis == 'Ya') {
                            $('.logo-pasien-hepatitis').show();
                        }
                        if (data.profil.is_kusta == 'Ya') {
                            $('.logo-pasien-kusta-lepra').show();
                        }
                        if (data.profil.is_tbc == 'Ya') {
                            $('.logo-pasien-tbc-kp').show();
                        }
                        if (data.profil.is_pasien_pejabat == 'Ya') {
                            $('.logo-pasien-pejabat').show();
                        }
                        if (data.profil.is_pemilik_rs == 'Ya') {
                            $('.logo-pasien-pemilik-rs').show();
                        }
                        if (data.profil.is_potensi_komplain == 'Ya') {
                            $('.logo-pasien-potensi-komplain').show();
                        }
                    }

                    //instansi
                    $('instansi-detail').html(pasien.instansi_perujuk);
                    $('nadis-detail').html(pasien.nadis_perujuk);

                    // Penanggung Jawab
                    $('#nama-pjwb-detail').html(pasien.nama_pjwb);
                    $('#alamat-pjwb-detail').html(pasien.alamat_pjwb);
                    $('#telp-pjwb-detail').html(pasien.telp_pjwb);
                    $('#nama-pjwb-keuangan-detail').html(pasien.nama_pjwb_finansial);
                    $('#alamat-pjwb-keuangan-detail').html(pasien.alamat_pjwb_finansial);
                    $('#telp-pjwb-keuangan-detail').html(pasien.telp_pjwb_finansial);

                    // Layanan Pendaftaran
                    $('#layanan-detail').html(layanan.layanan);
                    $('#no-antrian-detail').html(layanan.no_antrian);
                    $('#dokter-detail').html(layanan.dokter);
                    $('#id-penjamin-tindakan').val(layanan.id_penjamin);

                    let cara_bayar = '<b>' + layanan.cara_bayar + ' ' + ((layanan.id_penjamin !== null) ? '(' + layanan.penjamin + ')' : '') + '</b>';
                    $('#cara-bayar-detail').html(cara_bayar);
                    $('#no-polish-detail').html(layanan.no_polish);
                    $('#no-sep-detail').html(layanan.no_sep);

                    $('#identitas-pasien-anamnesa, #identitas-pasien-diagnosa, #identitas-pasien-tindakan, #identitas-pasien-bhp').html(pasien.id_pasien + ' / ' + pasien.nama + ' / ' + umur);

                    $('#dokter').val(layanan.id_dokter);
                    $('#s2id_dokter a .select2c-chosen').html(layanan.dokter);

                    $('#operator').val(layanan.id_dokter);
                    $('#s2id_operator a .select2c-chosen').html(layanan.dokter);

                    // tindakan
                    $('#kelas-tindakan').val('<?= $kelas_tindakan ?>');
                    $('#profesi').val(8);
                    $('#jumlah-tindakan').val(1);
                    $('#unit').val(layanan.id_unit);
                    // $('#s2id_unit a .select2c-chosen').html(layanan.unit);

                    if (data.tindakan.length > 0) {
                        showTindakan(data.tindakan);
                    }

                    // BHP
                    if (data.bhp.length > 0) {
                        showBHP(data.bhp);
                    }

                    $('#modal-pemeriksaan').modal('show');
                    $('#modal-pemeriksaan-label').html('Form Pemeriksaan Pemulasaran Jenazah');
                }
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {

            }
        });
    }

    function konfirmasiSimpan() {
        if ($('.number-tindakan').length < 1) {
            swalAlert('warning', 'Validasi', 'Tindakan harus diisi minimal 1 data.')
            $('#wizard-form').bwizard('show', '1');
            return false;
        }

        bootbox.dialog({
            message: "Anda yakin akan menyimpan hasil pemeriksaan ?",
            title: "Simpan Pemeriksaan Pemulasaran Jenazah",
            buttons: {
                batal: {
                    label: '<i class="fas fa-fw fa-window-close"></i> Batal',
                    className: "btn-secondary",
                    callback: function() {

                    }
                },
                masuk: {
                    label: '<i class="fas fa-fw fa-check-circle"></i> Simpan',
                    className: "btn-info",
                    callback: function() {
                        simpanDataPemeriksaan();
                    }
                }
            }
        });
    }

    function konfirmasiSimpanForm() {

        bootbox.dialog({
            message: "Anda yakin akan menyimpan hasil pengisian form pemulasaran jenazah ?",
            title: "Simpan form Pemulasaran Jenazah",
            buttons: {
                batal: {
                    label: '<i class="fas fa-fw fa-window-close"></i> Batal',
                    className: "btn-secondary",
                    callback: function() {

                    }
                },
                masuk: {
                    label: '<i class="fas fa-fw fa-check-circle"></i> Simpan',
                    className: "btn-info",
                    callback: function() {
                        simpanEntriDataJenazah();
                    }
                }
            }
        });
    }

    function detailDataJenazah(id_pendaftaran, id_layanan_pendaftaran) {
        resetFieldDataJenazah();
        console.log(id_pendaftaran + ' ' + id_layanan_pendaftaran);

        $('#wizard-form').bwizard('show', '0');
        // generateNoKematian();

        // get data rawat inap
        let idPelayananRawatInap = 73;
        $('#id_pendaftaran').val(id_pendaftaran);
        $('#id_layanan_pendaftaran').val(id_layanan_pendaftaran);


        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_layanan_pendaftaran_detail_untuk_pemulasaran") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                console.log(data);
                $("#pemulasaran_asalruangan_detail").html(data.asal_ruangan.bed);

                if (data.diagnosa !== null) {
                    $.each(data.diagnosa, function(i, v) {
                        $("#pemulasaran_dokter_detail").html(v.dokter);
                    });
                }

                if (data.diagnosa.length > 0) {
                    getDiagnosa(data.diagnosa);
                } else {
                    console.log('data diagnosa kosong');
                }
            }
        });

        // get data jenazah
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_layanan_pendaftaran_detail") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                let umur = '';
                let kelamin = '';
                let pasien = data.pasien;
                let layanan = data.layanan;
                let anamnesa = data.anamnesa[0];

                if (pasien !== null) {
                    if (pasien.kelamin == 'L') {
                        kelamin = 'Laki - laki';
                    } else {
                        kelamin = 'Perempuan';
                    }

                    if (pasien.tanggal_lahir !== null) {
                        umur = hitungUmur(pasien.tanggal_lahir) + ' (' + datefmysql(pasien.tanggal_lahir) + ')';
                    }

                    $('#id_jenazah').val(data.pasien.id_pasien);
                    $('#pemulasaran-nama-detail').html(data.pasien.nama);
                    $('#pemulasaran-no-rm-detail').html(pasien.id_pasien);
                    $('#pemulasaran-no-register-detail').html(pasien.no_register);
                    $('#pemulasaran-kelamin-detail').html(kelamin);
                    $('#pemulasaran-umur-detail').html(umur);
                    $('#pemulasaran-alamat-detail').html(pasien.alamat);
                    $('#alamat_jenazah, #talqin_alamat_pasien').val(pasien.alamat);
                    $('#pemulasaran-agama-detail').html(pasien.agama);
                    $('#pemulasaran_tanggal_detail').html(pasien.tanggal_daftar);
                    // $('#pemulasaran_asalruangan_detail').html(data.asal_ruangan.bed);

                }
            }
        });


        // get data pemulasaran jenazah 
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pelayanan/api/pelayanan/get_layanan_pendaftaran_detail") ?>/id/' + id_pendaftaran + '/id_layanan/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                $('#c_id_layanan_pendaftaran').val(id_layanan_pendaftaran);
                if (data.pasien !== null) {

                    // tampilkan noRM ke semua bagian field (as unique ID)                    
                    $("#penyerahan_no_rm").val(data.pasien.no_rm);
                    $("#bukti_pelayanan_no_rm").val(data.pasien.no_rm);
                    $("#transport_no_rm").val(data.pasien.no_rm);

                    // tampilkan data yang sudah ada ke dalam input di bawah
                    $('#c_pasien_nama').text(data.pasien.nama);
                    $('#c_pasien_no_rm').text(data.pasien.no_rm);
                    $('#c_pasien_tanggal_lahir').text((data.pasien.tanggal_lahir !== null ? datefmysql(data.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pasien.tanggal_lahir) + ')'));
                    $('#c_pasien_jenis_kelamin').text((data.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));

                    $("#penyerahan_nama_jenazah, #nama_jenazah, #talqin_nama_pasien, #sja_nama_jenazah, #kesediaan_nama_jenazah").val(data.pasien.nama);
                    $("#penyerahan_usia_jenazah, #umur_jenazah, #kesediaan_penanggungbiaya_umur").val(hitungUmur(data.pasien.tanggal_lahir));
                    $("#talqin_tgllahir_pasien, #tanggal_lahir, #kesediaan_penanggungbiaya_tgllahir").val(data.pasien.tanggal_lahir);
                    $("#sja_alamat_jenazah, #kesediaan_penanggungbiaya_alamat").val(data.pasien.alamat);
                    $("#kesediaan_penanggungbiaya_agama").val(data.pasien.agama);
                    $("#tempat_lahir, #kesediaan_penanggungbiaya_tempatlahir").val(data.pasien.tempat_lahir);

                    if (data.pasien.kelamin == 'L') {
                        $('input:radio[name="genderjenazah"][value="L"]').prop('checked', true);
                        $('input:radio[name="genderpasientalqin"][value="Laki-laki"]').prop('checked', true);
                    } else if (data.pasien.kelamin == 'P') {
                        $('input:radio[name="genderjenazah"][value="P"]').prop('checked', true);
                        $('input:radio[name="genderpasientalqin"][value="Perempuan"]').prop('checked', true);
                    }

                    // fetch data jenazah
                    fetchDataJenazah(data.pasien.no_rm, data.pasien);
                    // fetch data tindakan
                    fetchDataTindakan(id_layanan_pendaftaran);

                    // hide
                    $(".form-res").hide();
                }

                // $('#c_bed').text(bed);

                $('#modal-jenazah').modal('show');
                $('#modal-jenazah-label').html('Form entri data Jenazah');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    // funngsi untuk mendapatkan diagnosa
    function getDiagnosa(data) {
        if (data !== null) {
            $.each(data, function(i, v) {
                let diagnosa = '';
                if (v.diangnosa_manual == 1) {
                    diagnosa = (v.golongan_sebab_sakit !== null) ? v.golongan_sebab_sakit : '';
                } else {
                    diagnosa = (v.golongan_sebab_sakit_lain !== null) ? v.golongan_sebab_sakit_lain : '';
                }
                $("#pemulasaran_diagnosa_dokter_detail").html(diagnosa);
            });
        }
    }

    function simpanDataPemeriksaan() {
        $.ajax({
            type: 'POST',
            url: '<?= base_url("pelayanan/api/pelayanan/simpan_pemeriksaan") ?>',
            data: $('#form-pemeriksaan').serialize(),
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                $('input[name=csrf_syam]').val(data.token);
                if (data.status) {
                    messageEditSuccess();
                    $('#modal-pemeriksaan').modal('hide');
                    getListPemeriksaan($('#page_now').val());
                } else {
                    messageEditFailed();
                }
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                messageEditFailed();
            }
        });
    }

    function selectPetugasIpj() {
        $('.ipj-ambulance').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/data_pegawai') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) {
                    return {
                        q: term,
                        page: page
                    };
                },
                results: function(data, page) {
                    var more = (page * 20) < data.total;
                    return {
                        results: data.data,
                        more: more
                    };
                }
            },
            formatResult: function(data) {
                var markup = '<b>' + data.nama + '</b>';
                return markup;
            },
            formatSelection: function(data) {
                $('#select_petugas_ipj_ambulance').val(data.nama);
                $(".ipj-ambulance-res").val(data.nama);
                return data.nama;
            }
        });

        $('.ipj-sopir-ambulance').select2c({
            ajax: {
                url: "<?= base_url('masterdata/api/masterdata_auto/data_pegawai') ?>",
                dataType: 'json',
                quietMillis: 100,
                data: function(term, page) {
                    return {
                        q: term,
                        page: page
                    };
                },
                results: function(data, page) {
                    var more = (page * 20) < data.total;
                    return {
                        results: data.data,
                        more: more
                    };
                }
            },
            formatResult: function(data) {
                var markup = '<b>' + data.nama + '</b>';
                return markup;
            },
            formatSelection: function(data) {
                $('#select_petugas_ipj_sopir_jenazah_input').val(data.id);
                $(".penitipan_jenazah_res").val(data.nama);
                return data.nama;
            }
        });
    }

    // ====================== DATA JENAZAH ==========================

    function simpanEntriDataJenazah() {
        event.preventDefault();

        let idJenazah = $("#id_jenazah").val();
        let petugasIpj = $("#pemulasaran_petugas_ipj_detail_input").val();
        let sopirAmbulance = $("#pemulasaran_sopir_jenazah_input").val();
        let waktuPanggilan = $("#pemulasaran_waktu_panggilan").val();
        let waktuMeninggal = $("#pemulasaran_waktu_meninggal").val();
        let waktuMasukRuangJenazah = $("#pemulasaran_waktu_masuk_ruangan").val();
        let waktuPengantaran = $("#pemulasaran_waktu_pengantaran").val();
        let idLayananPendaftaran = $("#id_layanan_pendaftaran").val();
        let idPemulasaranJenazah = $("#id_pemulasaran_jenazah").val();
        // let idPenanggungJawab       = $("#id_penanggung_jawab").val();
        let jamTugas = $("#ipj_jam_tugas").val();
        let hubunganKeluarga = $("#kesediaan_penanggungjawab_hubungankeluarga").val();
        let noMobil = $("#no_mobil_ambulance").val();
        let lainnya = $("").val();
        let penyerahanJenazah = '';
        let tindakan = [];
        let keteranganLain = $("#keterangan_lain").val();
        let isPemulasaran = '';
        let isPengantaran = '';
        let isPengawetan = '';
        let isLain = '';
        let isSupir = '';
        let isKerabat = '';
        let isKa = '';
        let keteranganTidakbersedia = $("#keterangan_tidak_bersedia").val();
        let umurTgllahirPJ = $("#kesediaan_penanggungjawab_umur").val();
        let tempatLahirPJ = $("#kesediaan_penanggungjawab_tempatlahir").val();
        let agamaPJ = $("#kesediaan_penanggungjawab_agama").val();
        let namaPJ = $("#nama_penerima_jenazah").val();
        let noktpPJ = $("#ktp_penanggung_jawab_serah_terima").val();
        let alamatPJ = $("#alamat_penerima_jenazah").val();
        let tlpPJ = $("#telp_penerima_jenazah").val();
        let kelaminPJ = $("#jk_penanggung_jawab").val();
        let suratKematian = $("#no_surat_kematian").val();




        var checkboxTindakan = document.getElementsByName('tindakan-pelayanan');

        for (var i = 0, length = checkboxTindakan.length; i < length; i++) {
            if (checkboxTindakan[i].checked) {
                tindakan.push(checkboxTindakan[i].value);
            }
        }

        if ($('#kesediaan_pemulasaran_jenazah').is(':checked')) {
            isPemulasaran = 1;
        } else {
            isPemulasaran = 0;
        }

        if ($('#kesediaan_pengantaran').is(':checked')) {
            isPengantaran = 1;
        } else {
            isPengantaran = 0;
        }

        if ($('#kesediaan_pengawetan').is(':checked')) {
            isPengawetan = 1;
        } else {
            isPengawetan = 0;
        }

        if ($('#kesediaan_lainnya').is(':checked')) {
            isLain = 1;
        } else {
            isLain = 0;
        }

        if ($('#ttd_sopir').is(':checked')) {
            isSupir = 1;
        } else {
            isSupir = 0;
        }

        if ($('#ttd_kerabat').is(':checked')) {
            isKerabat = 1;
        } else {
            isKerabat = 0;
        }

        if ($('#ttd_dokterjaga').is(':checked')) {
            isKa = 1;
        } else {
            isKa = 0;
        }


        if (document.getElementById("check-keluarga").checked) {
            penyerahanJenazah = 'Keluarga';
        } else if (document.getElementById("check-kepolisian").checked) {
            penyerahanJenazah = 'Kepolisian';
        } else if (document.getElementById("check-dinas-sosial").checked) {
            penyerahanJenazah = 'Dinas Social';
        }


        $.ajax({
            type: 'POST',
            url: '<?= base_url("pemulasaran_jenazah/api/Pemulasaran_jenazah/store_data_jenazah") ?>',
            data: {
                // idPenanggungJawab, 
                idPemulasaranJenazah,
                idLayananPendaftaran,
                sopirAmbulance,
                waktuPanggilan,
                waktuMeninggal,
                waktuMasukRuangJenazah,
                waktuPengantaran,
                jamTugas,
                suratKematian,
                hubunganKeluarga,
                penyerahanJenazah,
                tindakan,
                noMobil,
                keteranganLain,
                isPemulasaran,
                isPengantaran,
                isPengawetan,
                isLain,
                isSupir,
                isKerabat,
                isKa,
                keteranganTidakbersedia,
                umurTgllahirPJ,
                tempatLahirPJ,
                agamaPJ,
                noktpPJ,
                namaPJ,
                alamatPJ,
                tlpPJ,
                kelaminPJ
            },

            success: function(data) {
                if (data.status) {
                    messageCustom(data.message, 'Success');
                    detailDataJenazah($('#id_pendaftaran').val(), $('#id_layanan_pendaftaran').val())
                    // fetchDataJenazah(idJenazah);
                    // fetchDataTindakan(idLayananPendaftaran);
                } else {
                    messageCustom(data.message, 'Error');
                }
            },
        });
    }


    function fetchDataJenazah(noRegRM, dataPasien) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pemulasaran_jenazah/api/Pemulasaran_jenazah/fetch_data_jenazah") ?>/id/' + noRegRM,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                console.log(data);

                if (data.data !== null) {
                    $('#pemulasaran-no-detail').html(data.data.id);
                    $("#pemulasaran_petugas_ipj_detail_input").val(data.data.petugas_ipj);
                    $("#pemulasaran_petugas_ipj_detail_input").html(data.data.petugas_ipj);
                    $("#pemulasaran_sopir_jenazah_input").val(data.data.id_supir_mobil_jenazah);
                    $("#pemulasaran_waktu_panggilan").val(data.data.waktu_panggilan);
                    $("#pemulasaran_waktu_meninggal").val(data.data.waktu_meninggal);
                    $("#pemulasaran_waktu_masuk_ruangan").val(data.data.waktu_masuk_ruang_jenazah);
                    $("#pemulasaran_waktu_pengantaran").val(data.data.waktu_pengantaran);
                    $("#jam_penyerahan_jenazah").val(data.data.waktu_pengantaran);
                    $("#jam_penyerahan").val(data.data.waktu_pengantaran);
                    $("#id_pemulasaran_jenazah").val(data.data.id);
                    $("#id_penanggung_jawab").val(data.data.id_penanggung_jawab);
                    $("#ipj_jam_tugas").val(data.data.jam_tugas);
                    $("#kesediaan_penanggungjawab_hubungankeluarga").val(data.data.hubungan_keluarga);
                    $("#ktp_penanggung_jawab_serah_terima").val(data.data.no_ktp_pj);
                    $("#nama_penerima_jenazah").val(data.data.nama_penanggung_jawab);
                    $("#telp_penerima_jenazah").val(data.data.tlp_pj);
                    $("#alamat_penerima_jenazah").val(data.data.alamat_pj);
                    $("#ipj_nama").val(data.data.petugas_ipj);
                    $("#ipj_no_tkk").val(data.data.nip_petugas_ipj);
                    $("#no_surat_kematian").val(data.data.surat_kematian);
                    $("#sja_no_surat_kematian").val(data.data.surat_kematian);
                    $("#penanggung_jawab_ambulance").val(data.data.sopir_ambulance);
                    $("#no_mobil_ambulance").val(data.data.no_mobil);
                    $("#tanggal_jalan").val(data.data.created_at);
                    $("#keterangan_lain").val(data.data.keterangan_lainnya);
                    $("#keterangan_tidak_bersedia").val(data.data.alasan_tidak_bersedia);
                    $("#jk_penanggung_jawab").val(data.data.kelamin_pj);

                    //Data Penanggung Jawab Jenazah (Kesediaan Tindakan)
                    $("#kesediaan_nama_penanggung_jawab").val(data.data.nama_penanggung_jawab);
                    $("#kesediaan_penanggungjawab_tempatlahir").val(data.data.tempat_lahir_pj);
                    $("#kesediaan_penanggungjawab_umur").val(data.data.umur_tanggal_lahir_pj);

                    $("#kesediaan_penanggungjawab_agama").val(data.data.agama_pj);
                    $("#kesediaan_penanggungjawab_alamat").val(data.data.alamat_pj);
                    $("#kesediaan_penanggungjawab_telp").val(data.data.tlp_pj);

                    if (data.data.penyerahan_jenazah == 'Keluarga') {
                        $('#check-keluarga').prop('checked', true).attr('disabled', false);
                    } else if (data.data.penyerahan_jenazah == 'Kepolisian') {
                        $('#check-kepolisian').prop('checked', true).attr('disabled', false);
                    } else if (data.data.penyerahan_jenazah == 'Dinas Sosial') {
                        $('#check-dinas-sosial').prop('checked', true).attr('disabled', false);
                    }

                    //jenis kelamin data penerima jenazah (serah terima)
                    if (data.data.kelamin_pj == 'Laki-laki') {
                        $('#penyerahanJKLaki').prop('checked', true).attr('disabled', true);
                    } else if (data.data.kelamin_pj == 'Perempuan') {
                        $('#penyerahanJKPerempuan').prop('checked', true).attr('disabled', true);
                    }

                    if (data.data.is_pemulasaran_jenazah == '1') {
                        $('#kesediaan_pemulasaran_jenazah').prop('checked', true);
                    }

                    if (data.data.is_pengantaran_jenazah == '1') {
                        $('#kesediaan_pengantaran').prop('checked', true);
                    }

                    if (data.data.is_pengawetan_jenazah == '1') {
                        $('#kesediaan_pengawetan').prop('checked', true);
                    }

                    if (data.data.is_lainnya == '1') {
                        $('#kesediaan_lainnya').prop('checked', true);
                    }

                    if (data.data.is_ttd_supir_ambulan == '1') {
                        $('#ttd_sopir').prop('checked', true);
                    }

                    if (data.data.is_ttd_kerabat_almarhum == '1') {
                        $('#ttd_kerabat').prop('checked', true);
                    }

                    if (data.data.is_ttd_ka_ipj == '1') {
                        $('#ttd_dokterjaga').prop('checked', true);
                    }

                    //jenis kelamin data jenazah (serah terima)

                    $('.penyerahan-jenazah').change(function() {
                        var selectedValue = $(this).val();

                        console.log(selectedValue)

                        if (selectedValue === 'Keluarga' || $("#check-keluarga").prop('checked')) {
                            $('#ktp_penanggung_jawab_serah_terima').val(dataPasien.nik_pjwb || data.data.no_ktp_pj);
                            $('#nama_penerima_jenazah, #kesediaan_nama_penanggung_jawab').val(dataPasien.nama_pjwb || data.data.nama_penanggung_jawab);
                            $('#jk_penanggung_jawab').val(dataPasien.kelamin_pjwb === 'L' ? 'Laki-laki' : (dataPasien.kelamin_pjwb === 'P' ? 'Perempuan' : data.data.kelamin_pj));
                            $('#telp_penerima_jenazah, #kesediaan_penanggungjawab_telp').val(dataPasien.telp_pjwb || data.data.tlp_pj);
                            $('#alamat_penerima_jenazah, #kesediaan_penanggungjawab_alamat').val(dataPasien.alamat_pjwb || data.data.alamat_pj);

                            // $('#kesediaan_penanggungjawab_umur').val(dataPasien.tgl_lahir_pjwb !== null ? hitungUmur(dataPasien.tgl_lahir_pjwb) + ' / ' + dataPasien.tgl_lahir_pjwb : '');
                            $('#kesediaan_penanggungjawab_hubungankeluarga').val(dataPasien.hubungan_pjwb !== null ? dataPasien.hubungan_pjwb : '');
                        } else {
                            $("#ktp_penanggung_jawab_serah_terima").val(data.data.no_ktp_pj || "");
                            $("#nama_penerima_jenazah, #kesediaan_nama_penanggung_jawab").val(data.data.nama_penanggung_jawab || "");
                            $("#jk_penanggung_jawab").val(data.data.kelamin_pj || "");
                            $("#telp_penerima_jenazah, #kesediaan_penanggungjawab_telp").val(data.data.tlp_pj || "");
                            $("#alamat_penerima_jenazah, #kesediaan_penanggungjawab_alamat").val(data.data.alamat_pj || "");

                            $("#kesediaan_penanggungjawab_umur").val(data.data.umur_tanggal_lahir_pj || "");
                            $("#kesediaan_penanggungjawab_hubungankeluarga").val(data.data.hubungan_keluarga || "");
                        }
                    });

                } else {
                    resetFieldDataJenazah();
                    // Event handler untuk perubahan pada radio button

                    $('.penyerahan-jenazah').change(function() {
                        var selectedValue = $(this).val();

                        console.log(selectedValue)

                        if (selectedValue === 'Keluarga' || $("#check-keluarga").prop('checked')) {
                            $('#ktp_penanggung_jawab_serah_terima').val(dataPasien.nik_pjwb !== null ? dataPasien.nik_pjwb : '');
                            $('#nama_penerima_jenazah, #kesediaan_nama_penanggung_jawab').val(dataPasien.nama_pjwb !== null ? dataPasien.nama_pjwb : '');
                            $('#jk_penanggung_jawab').val(dataPasien.kelamin_pjwb === 'L' ? 'Laki-laki' : (dataPasien.kelamin_pjwb === 'P' ? 'Perempuan' : ''));
                            $('#telp_penerima_jenazah, #kesediaan_penanggungjawab_telp').val(dataPasien.telp_pjwb !== null ? dataPasien.telp_pjwb : '');
                            $('#alamat_penerima_jenazah, #kesediaan_penanggungjawab_alamat').val(dataPasien.alamat_pjwb !== null ? dataPasien.alamat_pjwb : '');

                            $('#kesediaan_penanggungjawab_umur').val(dataPasien.tgl_lahir_pjwb !== null ? hitungUmur(dataPasien.tgl_lahir_pjwb) + ' / ' + dataPasien.tgl_lahir_pjwb : '');
                            $('#kesediaan_penanggungjawab_hubungankeluarga').val(dataPasien.hubungan_pjwb !== null ? dataPasien.hubungan_pjwb : '');
                        } else {
                            $('.form-penanggung-jawab').val('');
                        }
                    });

                    if ($("#check-keluarga").prop('checked')) {

                        // console.log(dataPasien)
                        $('#ktp_penanggung_jawab_serah_terima').val(dataPasien.nik_pjwb !== null ? dataPasien.nik_pjwb : '');
                        $('#nama_penerima_jenazah, #kesediaan_nama_penanggung_jawab').val(dataPasien.nama_pjwb !== null ? dataPasien.nama_pjwb : '');
                        $('#jk_penanggung_jawab').val(dataPasien.kelamin_pjwb === 'L' ? 'Laki-laki' : (dataPasien.kelamin_pjwb === 'P' ? 'Perempuan' : ''));
                        $('#telp_penerima_jenazah, #kesediaan_penanggungjawab_telp').val(dataPasien.telp_pjwb !== null ? dataPasien.telp_pjwb : '');
                        $('#alamat_penerima_jenazah, #kesediaan_penanggungjawab_alamat').val(dataPasien.alamat_pjwb !== null ? dataPasien.alamat_pjwb : '');

                        $('#kesediaan_penanggungjawab_umur').val(dataPasien.tgl_lahir_pjwb !== null ? hitungUmur(dataPasien.tgl_lahir_pjwb) + ' / ' + dataPasien.tgl_lahir_pjwb : '');
                        $('#kesediaan_penanggungjawab_hubungankeluarga').val(dataPasien.hubungan_pjwb !== null ? dataPasien.hubungan_pjwb : '');
                    }
                }

            }
        });
    }

    function fetchDataTindakan(id_layanan_pendaftaran) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url("pemulasaran_jenazah/api/Pemulasaran_jenazah/fetch_data_jenazah_tindakan") ?>/id/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                $("input[name='tindakan-pelayanan']:checkbox").removeAttr('checked');
                $(".form-petugas-ipj-tindakan").val('');

                data.data.forEach((obj, i) => {
                    $('input:checkbox[name="tindakan-pelayanan"][value="' + obj.id_layanan + '"]').attr('checked', 'checked');

                    if (obj.id_layanan == 1965) {
                        $("#petugas-ipj-tindakan-kendaraan-jenazah").val(obj.petugas_ipj);
                    } else if (obj.id_layanan == 1713) {
                        $("#petugas-ipj-tindakan-pemulasaran-jenazah-lakilaki").val(obj.petugas_ipj);
                    } else if (obj.id_layanan == 1714) {
                        $("#petugas-ipj-tindakan-pemulasaran-jenazah-perempuan").val(obj.petugas_ipj);
                    } else if (obj.id_layanan == 1715) {
                        $("#petugas-ipj-tindakan-perawatan-jenazah").val(obj.petugas_ipj);
                    } else if (obj.id_layanan == 1717) {
                        $("#petugas-ipj-tindakan-pemulasaran-otopsi").val(obj.petugas_ipj);
                    } else if (obj.id_layanan == 1718) {
                        $("#petugas-ipj-tindakan-pemulasaran-lemari-pendingin").val(obj.petugas_ipj);
                    } else if (obj.id_layanan == 1966) {
                        $("#petugas-ipj-tindakan-pemulasaran-lemari-peti-jenazah-jumbo").val(obj.petugas_ipj);
                    } else if (obj.id_layanan == 1967) {
                        $("#petugas-ipj-tindakan-pemulasaran-lemari-peti-jenazah-standar").val(obj.petugas_ipj);
                    } else if (obj.id_layanan == 1968) {
                        $("#petugas-ipj-tindakan-pemulasaran-lemari-peti-jenazah-superior").val(obj.petugas_ipj);
                    }
                });
            }
        });
    }

    selectPetugasIpj();
    var tempData;

    // hitung umur

    $("#kesediaan_penanggungbiaya_tgllahir").change(function() {
        let umur = getAge($("#kesediaan_penanggungbiaya_tgllahir").val());
        $("#kesediaan_penanggungbiaya_umur").val(umur);
    });

    // Surat jalan ambulance , #ttd_kerabat, #ttd_dokterjaga
    $('.ttd_sopir, .ttd_kerabat, .ttd_dokterjaga').click(function() {
        if ($(this).prop("checked") == true) {
            $(".btn-simpan-suratjalan").removeAttr('disabled');
        }
    });

    // function fillDataPasien(data) {
    //     $('#ktp_penerima_jenazah').prop('disabled', true);
    //     $('#ktp_penanggung_jawab_serah_terima').val(data.no_identitas);
    //     $('#text_ktp').val(data.no_identitas);
    //     $('#nama_penerima_jenazah').val(data.nama);
    //     if(data.kelamin == 'L'){
    //         $('input:radio[name="genderpenerima"][value="L"]').prop('checked', true);           
    //     } else if(data.kelamin == 'P'){
    //         $('input:radio[name="genderpenerima"][value="P"]').prop('checked', true);
    //     }

    //     $('#telp_penerima_jenazah').val(data.telp);       
    //     $('#alamat_penerima_jenazah').val(data.alamat);      
    // }

    function cetakFormIPJ() {
        var id = $("#id_pemulasaran_jenazah").val();
        window.open('<?= base_url() ?>pemulasaran_jenazah/printing_laporan_ipj?id_pemulasaran_jenazah=' + id);
    }

    function cetakFormTransportasiPribadi(id_pendaftaran, id_layanan_pendaftaran) {
        window.open('<?= base_url() ?>pemulasaran_jenazah/printing_transportasi_pribadi?id_layanan_pendaftaran=' + id_layanan_pendaftaran, 'Cetak Surat Pernyataan Penggunaan Transportasi Pribadi', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
    }


    function cetakFormInstalasiPJ(id_pendaftaran, id_layanan_pendaftaran, bed) {
        idPendaftaran = id_pendaftaran;
        idLayananPendaftaran = id_layanan_pendaftaran;
        $('#modal_cetak_form_instalasi_pj').modal('show');
        $('#modal_cetak_form_instalasi_pj_label').html('Cetak Form Instalasi Pemulasaran Jenazah');

        $('#btn_surat_keterangan_kematian').click(function() {
            cetakSuratKeteranganKematian(id_pendaftaran);
        });
    }

    function cetakSuratKeteranganKematian(id_layanan_pendaftaran) {
        $.ajax({
            type: 'GET',
            url: '<?= base_url('rekam_medis/api/rekam_medis/check_surat_keterangan_kematian') ?>/id/' + id_layanan_pendaftaran,
            cache: false,
            dataType: 'JSON',
            beforeSend: function() {
                showLoader();
            },
            success: function(data) {
                // Set all values first
                resetModalSuratKeteranganKematian();

                // Set values in Penolakan Tindakan Kedokteran modal
                $('#modal-surat-keterangan-kematian-title').html(`<b>Form Surat Keterangan Kematian</b> | No. RM: ${data.no_rm}, Nama: ${data.nama_pasien}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${data.telp}</b></i>`);
                $('#id-layanan-pendaftaran-skk').val(id_layanan_pendaftaran);
                $('#id-pemeriksa-skk').val(data.id_pemeriksa);
                $('#nomor-surat-kematian-skk').val(data.nomor_surat_kematian);
                $('#nomor-urut-kematian-skk').val(data.nomor_urut_kematian);
                $('#nomor-kk-skk').val(data.nomor_kk);
                $('#alamat-meninggal-skk').val(data.alamat_meninggal);
                $('#kode-kematian-skk').val(data.kode_kematian);
                $('#yang-melapor-skk').val(data.yang_melapor);
                $('#ktp-skk').val(data.ktp);
                $('#waktu-pemeriksaan-skk').val(datetimefmysql(data.waktu_pemeriksaan));

                $('#s2id_dokter-pemeriksa-skk a .select2c-chosen').html(data.nama_pemeriksa);

                if (data.tempat_meninggal == 'Rumah Sakit') {
                    document.getElementById("rs-skk").checked = true;
                } else if (data.tempat_meninggal == 'Rumah Bersalin') {
                    document.getElementById("rb-skk").checked = true;
                } else if (data.tempat_meninggal == 'Puskesmas') {
                    document.getElementById("puskesmas-skk").checked = true;
                } else if (data.tempat_meninggal == 'Rumah') {
                    document.getElementById("rumah-skk").checked = true;
                } else if (data.tempat_meninggal == 'Lain-lain') {
                    document.getElementById("lain-lain-skk").checked = true;
                }

                if (data.jenis_pemeriksaan == 'Visum') {
                    document.getElementById("visum-skk").checked = true;
                } else if (data.jenis_pemeriksaan == 'Otopsi') {
                    document.getElementById("otopsi-skk").checked = true;
                } else if (data.jenis_pemeriksaan == 'Tidak divisum') {
                    document.getElementById("tidak-divisum-skk").checked = true;
                }

                if (data.sebab_kematian == 'Sakit') {
                    document.getElementById("sakit-skk").checked = true;
                } else if (data.sebab_kematian == 'Bersalin') {
                    document.getElementById("bersalin-skk").checked = true;
                } else if (data.sebab_kematian == 'Lahir Mati') {
                    document.getElementById("lahir-mati-skk").checked = true;
                } else if (data.sebab_kematian == 'Kecelakaan Lalu Lintas') {
                    document.getElementById("kecelakaan-lalin-skk").checked = true;
                } else if (data.sebab_kematian == 'Kecelakaan Industri') {
                    document.getElementById("kecelakaan-industri-skk").checked = true;
                } else if (data.sebab_kematian == 'Bunuh Diri') {
                    document.getElementById("bunuh-diri-skk").checked = true;
                } else if (data.sebab_kematian == 'Pembunuhan/Penganiayaan') {
                    document.getElementById("pembunuhan-skk").checked = true;
                } else if (data.sebab_kematian == 'Lain-lain') {
                    document.getElementById("lain-lain-sebab-kematian-skk").checked = true;
                } else if (data.sebab_kematian == 'Tidak Dapat Ditentukan') {
                    document.getElementById("tidak-dapat-ditentukan-skk").checked = true;
                }

                if (data.dikubur == 'Tangerang') {
                    document.getElementById("tangerang-skk").checked = true;
                } else if (data.dikubur == 'Luar Tangerang') {
                    document.getElementById("luar-tangerang-skk").checked = true;
                }

                if (data.awetkan == 1) {
                    document.getElementById("diawetkan-skk").checked = true;
                } else if (data.awetkan == 0) {
                    document.getElementById("tidak-diawetkan-skk").checked = true;
                }

                $('#modal-surat-keterangan-kematian').modal('show');
            },
            complete: function() {
                hideLoader();
            },
            error: function(e) {
                accessFailed(e.status);
            }
        });
    }

    function resetModalSuratKeteranganKematian() {
        // Set default fields
        $('#id-pendaftaran-skk').val('');
        $('#id-pemeriksa-skk').val('');
        $('#nomor-surat-kematian-skk').val('');
        $('#nomor-urut-kematian-skk').val('');
        $('#nomor-kk-skk').val('');
        $('#alamat-meninggal-skk').val('');
        $('#waktu-pemeriksaan-skk').val('');
        $('#kode-kematian-skk').val('');
        $('#yang-melapor-skk').val('');
        $('#ktp-skk').val('');
        $('#s2id_dokter-pemeriksa-skk a .select2c-chosen').html('Silahkan dipilih');

        // Unchecked fields
        document.getElementById("rs-skk").checked = false;
        document.getElementById("rb-skk").checked = false;
        document.getElementById("puskesmas-skk").checked = false;
        document.getElementById("rumah-skk").checked = false;
        document.getElementById("lain-lain-skk").checked = false;
        document.getElementById("visum-skk").checked = false;
        document.getElementById("otopsi-skk").checked = false;
        document.getElementById("tidak-divisum-skk").checked = false;
        document.getElementById("sakit-skk").checked = false;
        document.getElementById("bersalin-skk").checked = false;
        document.getElementById("lahir-mati-skk").checked = false;
        document.getElementById("kecelakaan-lalin-skk").checked = false;
        document.getElementById("kecelakaan-industri-skk").checked = false;
        document.getElementById("bunuh-diri-skk").checked = false;
        document.getElementById("pembunuhan-skk").checked = false;
        document.getElementById("lain-lain-sebab-kematian-skk").checked = false;
        document.getElementById("tidak-dapat-ditentukan-skk").checked = false;
        document.getElementById("tangerang-skk").checked = false;
        document.getElementById("luar-tangerang-skk").checked = false;
        document.getElementById("diawetkan-skk").checked = false;
        document.getElementById("tidak-diawetkan-skk").checked = false;
    }

    function pembatalanIPJ(id_layanan_pendaftaran) {
        swal.fire({
            title: 'Pembatalan Pemulasaran Jenazah',
            html: "Apakah anda yakin ingin membatalkan pasien pemulasaran jenazah ini ?",
            icon: 'warning',
            showCancelButton: true,
            buttonsStyling: true,
            confirmButtonText: '<i class="fas fa-fw fa-check-circle mr-1"></i>Proses',
            cancelButtonText: '<i class="fas fa-fw fa-times-circle mr-1"></i>Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'GET',
                    url: '<?= base_url("pemulasaran_jenazah/api/pemulasaran_jenazah/pembatalan_ipj") ?>/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
                    cache: false,
                    dataType: 'JSON',
                    beforeSend: function() {
                        showLoader()
                    },
                    success: function(data) {
                        getListPemeriksaan($('#page_now').val());
                        messageCustom('Berhasil melakukan pembatalan pemulasaran jenazah', 'Success');
                    },

                    complete: function() {
                        hideLoader()
                    },
                    error: function(e) {
                        messageCustom('Gagal melakukan pembatalan pemulasaran jenazah', 'Error');
                    },
                });
            }
        });
    }
</script>