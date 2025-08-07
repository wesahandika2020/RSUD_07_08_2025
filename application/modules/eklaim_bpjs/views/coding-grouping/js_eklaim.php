<script type="text/javascript" src="<?= resource_url() ?>assets/node_modules/wizard/bwizard.js"></script>
<script>
  $(document).ready(function() {

    $('#billing_amount_pex').on('keyup', function() {
      $('#billing_amount_pex_txt').empty();
      $('#billing_amount_pex_txt').append(money_format($('#billing_amount_pex').val()));
    })

    $('input[name="tariff_class"]').on('change', function(event) {
      change_upgrade_class(this, event);
    });

    calculateSum();

  });

  function dateFullIndo(tanggal) {
    const bulanIndo = [
      "JANUARI", "FEBRUARI", "MARET", "APRIL", "MEI", "JUNI",
      "JULI", "AGUSTUS", "SEPTEMBER", "OKTOBER", "NOVEMBER", "DESEMBER"
    ];

    // Memecah format tanggal (YYYY-MM-DD)
    const [tahun, bulan, hari] = tanggal.split("-");

    // Mengambil nama bulan berdasarkan indeks (bulan - 1)
    const namaBulan = bulanIndo[parseInt(bulan, 10) - 1];

    // Menggabungkan kembali dalam format "DD MMM YYYY"
    return `${hari} ${namaBulan} ${tahun}`;
  }

  function dateIndo(tanggal) {
    const bulanIndo = [
      "Jan", "Feb", "Mar", "Apr", "Mei", "Jun",
      "Jul", "Agu", "Sep", "Okt", "Nov", "Des"
    ];

    // Memecah format tanggal (YYYY-MM-DD)
    const [tahun, bulan, hari] = tanggal.split("-");

    // Mengambil nama bulan berdasarkan indeks (bulan - 1)
    const namaBulan = bulanIndo[parseInt(bulan, 10) - 1];

    // Menggabungkan kembali dalam format "DD MMM YYYY"
    return `${hari} ${namaBulan} ${tahun}`;
  }

  function calculateSum() {
    let sum = 0;

    $('.tarif-input').each(function() {
      let val = $(this).val().replace(/[^0-9]/g, ''); // Ambil angka saja
      sum += parseInt(val) || 0; // Tambahkan ke total
    });

    // Tampilkan total dalam format ribuan
    $('#gpr-total-tarif-rs').text(money_format(sum)); // Total dalam label
    $('#gpr_total_tarif_rs').val(sum); // Total dalam input hidden
  }

  $('.tarif-input').on('input', function() {
    let value = $(this).val().replace(/[^0-9]/g, ''); // Ambil angka saja

    // Hapus angka nol di depan kecuali jika input hanya "0"
    if (value.startsWith('00')) {
      value = value.replace(/^0+/, '0');
    } else if (value.startsWith('0')) {
      value = value.replace(/^0+/, '');
    } else if (value === '0' || value === '') {
      value = '0'; // Hilangkan nol di depan
    }


    $(this).val(money_format(value)); // Format ulang ke format ribuan
    calculateSum(); // Hitung ulang total
  });

  var currentDate = new Date();
  $('#ventilator_stop_dttm, #ventilator_start_dttm, #tgl_masuk, #tgl_pulang').each(function() {
    const inputVal = $(this).val(); // Ambil value dari input

    console.log(inputVal);

    $(this).datetimepicker({
      format: 'YYYY-MM-DD HH:mm:ss',
      pickSecond: false,
      pick12HourFormat: false,
      useCurrent: false,
      maxDate: new Date(currentDate.getFullYear(), currentDate.getMonth() + 2, 0),
      defaultDate: inputVal || false, // ← Set defaultDate hanya kalau ada value
      beforeShow: function(i) {
        if ($(i).attr('readonly')) {
          return false;
        }
      }
    });
  });

  function formatDatetime(datetime) {
    // Buat objek Date dari string datetime
    const dateObj = new Date(datetime);

    // Daftar bulan dalam format singkat
    const months = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"];

    // Ekstrak bagian tanggal, bulan, tahun, jam, dan menit
    const day = dateObj.getDate(); // Tanggal
    const month = months[dateObj.getMonth()]; // Bulan
    const year = dateObj.getFullYear(); // Tahun
    const hours = dateObj.getHours().toString().padStart(2, "0"); // Jam dengan padding 0
    const minutes = dateObj.getMinutes().toString().padStart(2, "0"); // Menit dengan padding 0

    // Gabungkan menjadi format yang diinginkan
    return `${day} ${month} ${year} ${hours}:${minutes}`;
  }

  function ranapCondition() {
    // Rawat Inap
    $('.tab-upgrade-class').show();
    $('.tab-chg-icu').show();
    $('.tab-executive-class').hide();
    $('#tab-is-pasien-covid').show();
    $('.hak-kelas-inap').show();
    $('.hak-kelas-jalan').hide();

    if ($('#upgrade_class_ind').is(':checked')) {
      $('#tr-upgrade-class').show();
    } else {
      $('#tr-upgrade-class').hide();
    }

    if ($('#icu_ind').is(':checked')) {
      $('#gpr-ventilator').show();
    } else {
      $('#gpr-ventilator').hide();
    }

    $('#gpr-tarif-poli-eks').hide();
  }

  function rajalCondition() {
    // Rawat Jalan
    $('.tab-upgrade-class').hide();
    $('.tab-chg-icu').hide();
    $('.tab-executive-class').show();
    $('#tab-is-pasien-covid').hide();
    $('.hak-kelas-inap').hide();
    $('.hak-kelas-jalan').show();

    $('#tr-upgrade-class').hide();
    $('#gpr-ventilator').hide();

    if ($('#executive_class_ind').is(':checked')) {
      $('#gpr-tarif-poli-eks').show();
    } else {
      $('#gpr-tarif-poli-eks').hide();
    }
  }

  function chg_jenis(jenis, el, event) {
    // let selectedJenis = $('input[name="jenis_rawat_type"]:checked').val();

    if (jenis === 'outpatient') {
      rajalCondition();

      const tglMasuk = $('#tgl_masuk').val();
      $('#tgl_pulang').val(tglMasuk);

      const tglKeluar = $('#tgl_pulang').val(); // pastikan variabel ini tersedia
      hitungSelisihTanggal(tglMasuk, tglKeluar);
    } else if (jenis === 'inpatient') {
      ranapCondition();
    }
  }

  function chg_upgrade_class(checkbox, event) {
    if (checkbox.checked) {
      $('#tr-upgrade-class').show();
      change_upgrade_class(this, event);
    } else {
      $('#tr-upgrade-class').hide();
    }
  }

  function change_upgrade_class(el, event) {
    let selectedTariffClass = $('input[name="tariff_class"]:checked').val();

    if (selectedTariffClass === 'kelas_1') {
      $('input[name="upgrade_class"]').prop('disabled', false);
      $('#upgrade_class_1').prop('disabled', true);
    } else if (selectedTariffClass === 'kelas_2') {
      $('input[name="upgrade_class"]').prop('disabled', false);
      $('#upgrade_class_2').prop('disabled', true);
    } else {
      $('input[name="upgrade_class"]').prop('disabled', true);
      $('#upgrade_class_3').prop('checked', true);
    }
  }

  function chg_icu(checkbox, event) {
    if (checkbox.checked) {
      $('#gpr-ventilator').show();
    } else {
      $('#gpr-ventilator').hide();
    }
  }

  function chg_ventilator_use(checkbox, event) {
    if (checkbox.checked) {
      $('.gpr-ventilator-input').show();
      $('#ventilator_use').val(1);

      $('#ventilator_start_dttm').val('??-??-????');
      $('#ventilator_stop_dttm').val('??-??-????');
    } else {
      $('.gpr-ventilator-input').hide();
      $('#ventilator_use').val(0);

      $('#ventilator_start_dttm').val('');
      $('#ventilator_stop_dttm').val('');
    }
  }

  function chg_jkn_sitb_noreg(checkbox, event) {
    if (checkbox.checked) {
      $('.sitb_noreg').show();
      $('#gpr_is_pasien_tb').val(1);
      $('#hdn_is_pasien_tb').val(1);
      // $('#jkn_sitb_noreg').val('');
    } else {
      $('.sitb_noreg').hide();
      $('#gpr_is_pasien_tb').val(0);
      $('#hdn_is_pasien_tb').val(0);
      // $('#jkn_sitb_noreg').val('');
    }
  }

  function chg_co_insidense(checkbox, event) {
    if (checkbox.checked) {
      $('.covid19_no_sep').show();
      // $('#covid19_no_sep').val('');
    } else {
      $('.covid19_no_sep').hide();
      // $('#covid19_no_sep').val('');
    }
  }

  function chg_op_class(checkbox, event) {
    if (checkbox.checked) {
      $('#gpr-tarif-poli-eks').show();

      $('#billing_amount_pex').val('0');
      $('#billing_amount_pex_txt').empty();
    } else {
      $('#gpr-tarif-poli-eks').hide();

      $('#billing_amount_pex').val('0');
      $('#billing_amount_pex_txt').empty();
    }
  }


  // function handleEnterDiag(event, diagId) {
  //   // Cek jika tombol yang ditekan adalah Enter (kode 13)
  //   if (event.key === 'Enter') {

  //   }
  // }



  function resetGprInputModal() {
    $('#data-apgar').hide();
    $('#data-kelahiran').hide();
    $('#table-kelahiran-eklaim tbody').empty();
    $('#table-kelahiran-eklaim thead').hide();

    $('#type-jalan').prop('checked', true);
    $('.hak-kelas-inap').hide();
    $('.hak-kelas-jalan').show();
    $('.tab-upgrade-class').hide();
    $('.tab-chg-icu').hide();
    $('.tab-executive-class').show();
    $('#tab-is-pasien-covid').hide();

    $('#upgrade_class_ind').prop('checked', false);
    $('#tr-upgrade-class').hide();

    $('#icu_ind').prop('checked', false);
    $('#gpr-ventilator').hide();

    $('#ventilator_use').prop('checked', false);
    $('.gpr-ventilator-input').hide();
    $('#ventilator_stop_dttm, #ventilator_start_dttm').val('');

    $('#executive_class_ind').prop('checked', false);
    $('#billing_amount_pex_txt').append('0');
    $('#gpr-tarif-poli-eks').hide();

    $('#gpr_is_pasien_tb').prop('checked', false);
    $('#hdn_is_pasien_tb').val(0);
    $('.sitb_noreg').hide();
    $('#jkn_sitb_noreg').val('');

    $('#gpr_is_pasien_covid').prop('checked', false);
    $('.covid19_no_sep').hide();
    $('#covid19_no_sep').val('');

    $('#gpr-cara-bayar').val('00003');
    $('#gpr_cob').val('');
    // $('#gpr-tgl-masuk').empty();
    // $('#gpr-tgl-pulang').empty();

    $('#tr_jkn_apgar').hide();
    $('.tr_jkn_persalinan').hide();

    $('.tarif-input').val(0);
    $('#gpr-total-tarif-rs').empty();
    $('#gpr_total_tarif_rs').val('');
    calculateSum();

    $('#is-persalinan-gpr').val('0');
    $('#is-apgar-gpr').val('0');
    $('#jkn_usia_kehamilan').val('0');
    $('#jkn_gravida').val('0');
    $('#jkn_partus').val('0');
    $('#jkn_abortus').val('0');
    $('#jkn_ck_spontan').prop('checked', true);

    $('#diagnosaResult-unu').hide();
    $('#search-diagnosa-unu').val('');

    $('#prosedurResult-unu').hide();
    $('#search-prosedur-unu').val('');
  }

  // function setWaktuMasuk & setWaktuPulang {
  $('#tgl_masuk, #tgl_pulang').on('change', function(e) {
    const tglMasuk = $('#tgl_masuk').val(); // pastikan variabel ini tersedia
    const tglKeluar = $('#tgl_pulang').val(); // pastikan variabel ini tersedia
    hitungSelisihTanggal(tglMasuk, tglKeluar);
  });

  function hitungSelisihTanggal(tglMasukStr, tglKeluarStr) {
    const masuk = moment(tglMasukStr, 'YYYY-MM-DD HH:mm:ss');
    const keluar = moment(tglKeluarStr, 'YYYY-MM-DD HH:mm:ss');

    if (!masuk.isValid() || !keluar.isValid()) return;

    // Total detik (epoch)
    const selisihDetik = keluar.diff(masuk, 'seconds');

    // Hitung hari, jam, dan menit
    const selisihHari = Math.ceil(selisihDetik / (60 * 60 * 24)); // dibulatkan ke atas
    const jumlahJam = Math.floor(selisihDetik / 3600); // total jam tanpa menit
    const jumlahMenit = Math.floor((selisihDetik % 3600) / 60); // sisa menit

    // Format menit dengan leading zero
    const menitFormatted = jumlahMenit.toString().padStart(2, '0');

    // Tampilkan ke elemen
    $('#gpr-los-hari').html(`${selisihHari} <span>Hari</span>`);
    $('#gpr-los-jam').html(`( ${jumlahJam}:${menitFormatted} <span>Jam</span> )`);
  }



  function setClaimData(idPendaftaran, jenis_rawat, onClick = false) {
    // console.log(idPendaftaran)

    $('#import-coding').show();
    $('#left-button-footer').empty();
    $('#right-button-footer').empty();
    $('#btn-after-grouper').empty()
    $('#tab-ina-grouper').hide();
    $('#grouper_result').empty()
    $('#tr_dializer_use').empty()
    $('#tr_kantong_darah').empty()

    $(document).ready(function() {
      $('#form-gpr-eklaim :input').prop('disabled', false);
    });

    $('#validasi-sitb-status').empty().append(`
    <button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="validate_jkn_sitb_noreg()">Validasi</button>
    <div id="jkn_sitb_noreg_result" validasi-sitb-status class="bold ml-2"></div>
    `);

    $.ajax({
      type: 'GET',
      url: '<?= base_url("eklaim_bpjs/api/Eklaim_bpjs/get_detail_layanan_eclaim") ?>/id/' + idPendaftaran + '/jenis_rawat/' + jenis_rawat,
      cache: false,
      dataType: 'JSON',
      beforeSend: function() {
        showLoader()
      },

      success: function(data) {
        resetGprInputModal()

        let eclaim = data.eclaim;
        let status_eklaim = data.status_eklaim;
        let pasien = data.pendaftaran;
        let kelahiran = data.data_kelahiran;

        if (onClick) {
          ShowDiagnosaUNU(idPendaftaran, eclaim.status_klaim, eclaim.method_status);
          ShowProsedurUNU(idPendaftaran, eclaim.status_klaim, eclaim.method_status);
          ShowDiagnosaINA(idPendaftaran, eclaim.status_klaim, eclaim.method_status);
          ShowProsedurINA(idPendaftaran, eclaim.status_klaim, eclaim.method_status);
        }

        $('#gpr_status_klaim').val(eclaim.status_klaim);
        $('#gpr_method_status').val(eclaim.method_status);

        // Show KELAHIRAN
        if (kelahiran !== null) {

          $('#jkn_usia_kehamilan').val(kelahiran.usia_kehamilan ?? 0);
          $('#jkn_gravida').val(kelahiran.gravida ?? 0);
          $('#jkn_partus').val(kelahiran.partus ?? 0);
          $('#jkn_abortus').val(kelahiran.abortus ?? 0);

          if (kelahiran.onset_kontraksi == 'spontan') {
            $('#jkn_ck_spontan').prop('checked', true);
          } else if (kelahiran.onset_kontraksi == 'induksi') {
            $('#jkn_ck_induksi').prop('checked', true);
          } else if (kelahiran.onset_kontraksi == 'non_spontan_non_induksi') {
            $('#jkn_ck_non_spontan_non_induksi').prop('checked', true);
          }

          if (kelahiran.detail_kelahiran.length > 0) {
            showDetailKelahiran(kelahiran.detail_kelahiran);
            $('#table-kelahiran-eklaim thead').show();
          } else {
            $('#table-kelahiran-eklaim tbody').empty();
            $('#table-kelahiran-eklaim thead').hide();
          }
        }

        if (getAge(pasien.tanggal_lahir) == '0 Tahun') {
          $('#data-apgar').show();
          $('#is-apgar-gpr').val(1);
        }

        // Set the hidden content
        $('#id-pendaftaran-gpr').val(data.eclaim.id_pendaftaran);
        $('#id-layanan-pendaftaran-gpr').val(data.eclaim.id);
        $('#id-pasien-gpr').val(pasien.id_pasien);
        $('#id-dokter-gpr').val(pasien.id_dokter);
        $('#no-ktp-pasien-gpr').val(pasien.no_identitas);
        // $('#jenis-pendaftaran-gpr').html(pasien.jenis_layanan);
        $('#jenis-rawat-gpr').val(jenis_rawat);

        $('#nomor-rm-gpr').val(status_eklaim.nomor_rm);
        $('#nama-pasien-gpr').val(status_eklaim.nama_pasien);
        $('#tgl-lahir-gpr').val(status_eklaim.tgl_lahir);
        $('#gender-gpr').val(status_eklaim.gender);

        $('#label-header-eklaim').empty()
        let kl = eclaim.gender === '1' ? 'LAKI-LAKI' : 'PEREMPUAN';
        let labelName = eclaim.nomor_rm + " •• " + eclaim.nama_pasien + " •• " + kl + " •• " + dateFullIndo(eclaim.tgl_lahir);

        $('#label-header-eklaim').append(`
          <div class="col-lg d-flex align-items-center justify-content-center">
            <h4 class="center mr-3" style="padding-left: 20px; margin-bottom: 0px;"><b>${labelName}</b></h4>
            <button type="button" class="btn btn-info" onclick="showDokumen('${idPendaftaran}', '${pasien.id}', '${pasien.id_radiologi}', '${pasien.id_laboratorium}', null, '${pasien.jenis_layanan}')"><i class="fas fa-eye mr-1"></i>Lihat Dokumen Pasien</button>
          </div>
        `);

        $('#table-eklaim-get tbody').empty();
        let tglMasuk = status_eklaim.tgl_masuk.split(' ')[0];
        let tglPulang = status_eklaim.tgl_pulang.split(' ')[0];
        let jaminan = (eclaim.nama_penjamin == 'BPJS' ? 'JKN' : eclaim.nama_penjamin);

        let namaCoder = "";
        if (eclaim.status_klaim == null) {
          namaCoder = "-";
        } else {
          namaCoder = status_eklaim.coder_nama;
        }

        $('#table-eklaim-get tbody').append(`
          <tr>
            <td style="border-left: none !important;" class="center">
              ${dateIndo(tglMasuk)}
              
            </td>
            <td class="center">
              ${dateIndo(tglPulang)}
              
             </td>
            <td>${jaminan}</td>
            <td>${eclaim.nomor_sep}</td>
            <td>${jenis_rawat}</td>
            <td>${data.status_grouper?.cbg_code || '-'}</td>
            <td>${eclaim.status_klaim ?? '-'}</td>
            <td style="border-right: none !important;">${namaCoder}</td>
          </tr>
        `);

        $('#gpr-no-nik').val(pasien.no_identitas);
        $('#gpr-no-peserta').val(pasien.no_polish);
        $('#gpr-no-sep').val(pasien.no_sep);

        $('#tgl_masuk').val(status_eklaim.tgl_masuk);
        let losJam;
        if (status_eklaim.jenis_rawat == '2') {
          $('#tgl_pulang').val(status_eklaim.tgl_masuk);
          losJam = "( 00:00 <span>Jam</span> )";
          $('#type-jalan').prop('checked', true);
          rajalCondition();

        } else {
          $('#tgl_pulang').val(status_eklaim.tgl_pulang);
          losJam = "( " + status_eklaim.selisih_waktu + " <span>Jam</span> )";
          $('#type-inap').prop('checked', true);
          ranapCondition();

        }

        $('#gpr-umur').html(getAge(pasien.tanggal_lahir));
        // LOS
        $('#gpr-los-hari').html(status_eklaim.selisih_hari + " <span>Hari</span>");
        $('#gpr-los-jam').html(losJam);
        $('#gpr_nama_dokter').val(pasien.nama_dokter);
        $('#gpr-cara-pulang').val(pasien.kode_tindak_lanjut);

        let left_btn_html = ``;
        let right_btn_html = ``;

        if (eclaim.status_klaim == null) {

          let kelas_rawat = eclaim.kelas_rawat
          let check_kelas_rawat = '3';

          if (kelas_rawat == '1') {
            check_kelas_rawat = 'kelas_1'
          } else if (kelas_rawat == '2') {
            check_kelas_rawat = 'kelas_2'
          } else {
            check_kelas_rawat = 'kelas_3'
          }

          $("input[name='tariff_class'][value='" + check_kelas_rawat + "']").prop("checked", true);

          let TarifRad = (data.eclaim.tarif_radiologi !== null ? parseInt(data.eclaim.tarif_radiologi) : 0);
          let TarifLab = (data.eclaim.tarif_laboratorium !== null ? parseInt(data.eclaim.tarif_laboratorium) : 0);
          let TarifKamar = (data.eclaim.tarif_kamar !== null ? parseInt(data.eclaim.tarif_kamar) : 0);
          let TarifAkomodasi = (data.eclaim.tarif_akomodasi !== null ? parseInt(data.eclaim.tarif_akomodasi) : 0);
          let TarifICare = (data.eclaim.tarif_intensive_care !== null ? parseInt(data.eclaim.tarif_intensive_care) : 0);
          let TarifDarah = (data.eclaim.tarif_pelayanan_darah !== null ? parseInt(data.eclaim.tarif_pelayanan_darah) : 0);
          let TarifHemo = (data.eclaim.tarif_hemodialisa !== null ? parseInt(data.eclaim.tarif_hemodialisa) : 0);
          let TarifKonsul = (data.eclaim.tarif_konsultasi !== null ? parseInt(data.eclaim.tarif_konsultasi) : 0);
          let TarifKeperawatan = (data.eclaim.tarif_keperawatan !== null ? parseInt(data.eclaim.tarif_keperawatan) : 0);
          let TarifTenagaAhli = (data.eclaim.tarif_tenaga_ahli !== null ? parseInt(data.eclaim.tarif_tenaga_ahli) : 0);
          let TarifRehab = (data.eclaim.tarif_rehabilitas !== null ? parseInt(data.eclaim.tarif_rehabilitas) : 0);
          let TarifNonBedah = (data.eclaim.tarif_non_bedah_vk !== null ? parseInt(data.eclaim.tarif_non_bedah_vk) : 0);
          let TarifBedah = (data.eclaim.tarif_bedah_ok !== null ? parseInt(data.eclaim.tarif_bedah_ok) : 0);
          let TarifObat = (data.eclaim.tarif_obat !== null ? parseInt(data.eclaim.tarif_obat) : 0);
          let TarifBHP = (data.eclaim.tarif_bhp !== null ? parseInt(data.eclaim.tarif_bhp) : 0);
          let TarifKronis = (data.eclaim.tarif_obat_kronis !== null ? parseInt(data.eclaim.tarif_obat_kronis) : 0);
          let TarifKemoterapi = (data.eclaim.tarif_obat_kemoterapi !== null ? parseInt(data.eclaim.tarif_obat_kemoterapi) : 0);
          let TarifAlkes = (data.eclaim.tarif_alkes !== null ? parseInt(data.eclaim.tarif_alkes) : 0);
          let TarifSewaAlat = (data.eclaim.tarif_sewa_alat !== null ? parseInt(data.eclaim.tarif_sewa_alat) : 0);
          let TarifAkomdasiRanap = TarifKamar;
          let TarifKeperawatandanAkomodasi = TarifKeperawatan + TarifAkomodasi;

          // TARIF
          $('#tarif-prosedur-non-bedah').val(money_format(TarifNonBedah));
          $('#tarif-tenaga-ahli').val(money_format(TarifTenagaAhli));
          $('#tarif-radiologi').val(money_format(TarifRad));
          $('#tarif-rehabilitasi').val(money_format(TarifRehab));
          $('#tarif-obat').val(money_format(TarifObat));
          $('#tarif-alkes').val(money_format(TarifAlkes));

          $('#tarif-prosedur-bedah').val(money_format(TarifBedah));
          $('#tarif-keperawatan').val(money_format(TarifKeperawatandanAkomodasi));
          $('#tarif-laboratorium').val(money_format(TarifLab));
          $('#tarif-kamar-akomodasi').val(money_format(TarifAkomdasiRanap));
          $('#tarif-obat-kronis').val(money_format(TarifKronis));
          $('#tarif-bmhp').val(money_format(TarifBHP));

          $('#tarif-konsultasi').val(money_format(TarifKonsul));
          $('#tarif-penunjang').val(money_format(TarifHemo));
          $('#tarif-pelayanan-darah').val(money_format(TarifDarah));
          $('#tarif-rawat-intensif').val(money_format(TarifICare));
          $('#tarif-obat-kemoterapi').val(money_format(TarifKemoterapi));
          $('#tarif-sewa-alat').val(money_format(TarifSewaAlat));

          calculateSum();

          $('#gpr_procedure').val((data?.prosedur?.map(diag => `${diag.code}`)?.join('#')) + (data.tindakan_ok == null ? '' : data?.tindakan_ok?.map(diag => `#${diag.code}`)?.join('')) + (data.tindakan_lab == null ? '' : data?.tindakan_lab?.map(diag => `#${diag.code}`)?.join('')) + (data.tindakan_rad == null ? '' : data?.tindakan_rad?.map(diag => `#${diag.code}`)?.join('')));
          $('#gpr_diagnosis').val(data?.diagnosa?.map(diag => `${diag.code}`)?.join('#'));
          // $('#diagnosa').val(data?.diagnosa_utama?.map(diag => `${diag.code}`)?.join('#') + data?.diagnosa_sekunder?.map(diag => `#${diag.code}`)?.join(''));


          left_btn_html = `
					  <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Close</button>
          `;

          right_btn_html = /* html */ `
            <button type="button" class="btn btn-info waves-effect" onclick="konfirmasiSimpanEklaim()"><i class="fas fa-save"></i> Simpan Grouper</button>
          `;

          $('#left-button-footer').append(left_btn_html);
          $('#right-button-footer').append(right_btn_html);

        } else {
          $('#tab-ina-grouper').show();
          $('#id-eklaim-gpr').val(status_eklaim.id);
          $('#is-hd-gpr').val(status_eklaim.is_hd);
          $('#gpr_cob').val(status_eklaim.cob);

          // let procedureCodes = ["73.8", "73.8", "73.92", "74.4"]; // Kode target
          // let diagnosisCodes = ["O80", "O81", "O82", "O83", "O84", "Z37"]; // Kode diagnosa persalinan

          // $('#gpr-cara-bayar').val(status_eklaim.payor_id);
          $('#gpr-cara-bayar').val('00003');
          // $('#gpr-payor-cd').val(status_eklaim.payor_cd);
          $('#gpr-no-nik').val(eclaim.no_identitas);
          $('#gpr-no-peserta').val(status_eklaim.nomor_kartu);
          $('#gpr-no-sep').val(status_eklaim.nomor_sep);
          // $('#gpr_cob').val(status_eklaim.nomor_sep);

          let kelas_rawat = status_eklaim.kelas_rawat
          let check_kelas_rawat = '';

          if (kelas_rawat == '1') {
            check_kelas_rawat = 'kelas_1'
          } else if (kelas_rawat == '2') {
            check_kelas_rawat = 'kelas_2'
          } else if (kelas_rawat == '3') {
            check_kelas_rawat = 'kelas_3'
          }

          $("input[name='tariff_class'][value='" + check_kelas_rawat + "']").prop("checked", true);

          $('#jkn_sitb_noreg').val(status_eklaim.jkn_sitb_noreg);
          $('#hdn_sitb_noreg').val(status_eklaim.jkn_sitb_noreg);
          if (status_eklaim.is_pasien_tb === "1") {
            $('#gpr_is_pasien_tb').prop('checked', true);
            $('#hdn_is_pasien_tb').val(1);
            $('.sitb_noreg').show();

            if (status_eklaim.validasi_sitb === "1") {
              $('#validasi-sitb-status').empty().append(`
                <button type="button" class="btn waves-effect waves-light btn-danger btn-xs" onclick="invalidate_jkn_sitb_noreg()">Ubah</button>
                <div id="jkn_sitb_noreg_result" style="color: green;" class="bold ml-2">Nomor register valid</div>
              `);

              $('#gpr_is_pasien_tb').prop('disabled', true);
              $('#jkn_sitb_noreg').prop('disabled', true);
            }
          }

          if (status_eklaim.jenis_rawat == '2') {
            $('#tgl_pulang').val(status_eklaim.tgl_masuk);
            losJam = "( 00:00 <span>Jam</span> )";
            $('#type-jalan').prop('checked', true);

            if (status_eklaim.executive_class_ind === "1") {
              $('#executive_class_ind').prop('checked', true);

              $('#billing_amount_pex').val(status_eklaim.billing_amount_pex);
              $('#billing_amount_pex_txt').append(money_format(status_eklaim.billing_amount_pex));
            }

            rajalCondition();

          } else {
            $('#tgl_pulang').val(status_eklaim.tgl_pulang);
            losJam = "( " + status_eklaim.selisih_waktu + " <span>Jam</span> )";
            $('#type-inap').prop('checked', true);

            $('#upgrade_class_los').val(eclaim.selisih_hari);
            if (status_eklaim.upgrade_class_ind === "1") {
              $('#upgrade_class_ind').prop('checked', true);
              $("input[name='upgrade_class'][value='" + status_eklaim.upgrade_class_class + "']").prop("checked", true);
            }

            let icu_indikator = "0";
            if (Number(eclaim.icu_los) > 0) {
              icu_indikator = "1";
            } else {
              icu_indikator = "0";
            }

            if (icu_indikator == "1") {
              $('#icu_ind').prop('checked', true);
              $('#gpr_icu_los').val(eclaim.icu_los);

              if (status_eklaim.use_ind === "1") {
                $('#ventilator_use').prop('checked', true);
                $('#ventilator_start_dttm').val(status_eklaim.start_dttm);
                $('#ventilator_stop_dttm').val(status_eklaim.stop_dttm);
                $('.gpr-ventilator-input').show();
              }
              $("input[name='upgrade_class'][value='" + status_eklaim.upgrade_class_class + "']").prop("checked", true);
            }

            $('#covid19_no_sep').val(status_eklaim.covid19_no_sep);
            if (status_eklaim.is_pasien_covid === "1") {
              $('#gpr_is_pasien_covid').prop('checked', true);
              $('.covid19_no_sep').show();
            }

            ranapCondition();

          }

          // LOS
          $('#gpr-los-hari').html(status_eklaim.selisih_hari + " <span>Hari</span>");
          $('#gpr-los-jam').html(losJam);
          $('#gpr_nama_dokter').val(status_eklaim.nama_dokter);
          $('#gpr-cara-pulang').val(status_eklaim.discharge_status);

          // TARIF
          let TarifRad = (data.eclaim.tarif_radiologi !== null ? parseInt(data.eclaim.tarif_radiologi) : 0);
          let TarifLab = (data.eclaim.tarif_laboratorium !== null ? parseInt(data.eclaim.tarif_laboratorium) : 0);
          let TarifICare = (data.eclaim.tarif_intensive_care !== null ? parseInt(data.eclaim.tarif_intensive_care) : 0);
          let TarifDarah = (data.eclaim.tarif_pelayanan_darah !== null ? parseInt(data.eclaim.tarif_pelayanan_darah) : 0);
          let TarifHemo = (data.eclaim.tarif_hemodialisa !== null ? parseInt(data.eclaim.tarif_hemodialisa) : 0);
          let TarifKonsul = (data.eclaim.tarif_konsultasi !== null ? parseInt(data.eclaim.tarif_konsultasi) : 0);
          let TarifTenagaAhli = (data.eclaim.tarif_tenaga_ahli !== null ? parseInt(data.eclaim.tarif_tenaga_ahli) : 0);
          let TarifRehab = (data.eclaim.tarif_rehabilitas !== null ? parseInt(data.eclaim.tarif_rehabilitas) : 0);
          let TarifNonBedah = (data.eclaim.tarif_non_bedah_vk !== null ? parseInt(data.eclaim.tarif_non_bedah_vk) : 0);
          let TarifBedah = (data.eclaim.tarif_bedah_ok !== null ? parseInt(data.eclaim.tarif_bedah_ok) : 0);
          let TarifObat = (data.eclaim.tarif_obat !== null ? parseInt(data.eclaim.tarif_obat) : 0);
          let TarifBHP = (data.eclaim.tarif_bhp !== null ? parseInt(data.eclaim.tarif_bhp) : 0);
          let TarifKronis = (data.eclaim.tarif_obat_kronis !== null ? parseInt(data.eclaim.tarif_obat_kronis) : 0);
          let TarifKemoterapi = (data.eclaim.tarif_obat_kemoterapi !== null ? parseInt(data.eclaim.tarif_obat_kemoterapi) : 0);
          let TarifAlkes = (data.eclaim.tarif_alkes !== null ? parseInt(data.eclaim.tarif_alkes) : 0);
          let TarifSewaAlat = (data.eclaim.tarif_sewa_alat !== null ? parseInt(data.eclaim.tarif_sewa_alat) : 0);
          let TarifKeperawatan = (data.eclaim.tarif_keperawatan !== null ? parseInt(data.eclaim.tarif_keperawatan) : 0);
          let TarifKamar = (data.eclaim.tarif_kamar !== null ? parseInt(data.eclaim.tarif_kamar) : 0);
          let TarifAkomodasi = (data.eclaim.tarif_akomodasi !== null ? parseInt(data.eclaim.tarif_akomodasi) : 0);
          let TarifAkomdasiRanap = TarifKamar;
          let TarifKeperawatandanAkomodasi = TarifKeperawatan + TarifAkomodasi;

          // TARIF
          $('#tarif-prosedur-non-bedah').val(money_format(TarifNonBedah));
          $('#tarif-tenaga-ahli').val(money_format(TarifTenagaAhli));
          $('#tarif-radiologi').val(money_format(TarifRad));
          $('#tarif-rehabilitasi').val(money_format(TarifRehab));
          $('#tarif-obat').val(money_format(TarifObat));
          $('#tarif-alkes').val(money_format(TarifAlkes));

          $('#tarif-prosedur-bedah').val(money_format(TarifBedah));
          $('#tarif-keperawatan').val(money_format(TarifKeperawatandanAkomodasi));
          $('#tarif-laboratorium').val(money_format(TarifLab));
          $('#tarif-kamar-akomodasi').val(money_format(TarifAkomdasiRanap));
          $('#tarif-obat-kronis').val(money_format(TarifKronis));
          $('#tarif-bmhp').val(money_format(TarifBHP));

          $('#tarif-konsultasi').val(money_format(TarifKonsul));
          $('#tarif-penunjang').val(money_format(TarifHemo));
          $('#tarif-pelayanan-darah').val(money_format(TarifDarah));
          $('#tarif-rawat-intensif').val(money_format(TarifICare));
          $('#tarif-obat-kemoterapi').val(money_format(TarifKemoterapi));
          $('#tarif-sewa-alat').val(money_format(TarifSewaAlat));
          $('#jkn_sistole').val(status_eklaim.sistole) ?? 0;
          $('#jkn_diastole').val(status_eklaim.diastole) ?? 0;
          // $('#tarif-prosedur-non-bedah').val(money_format(status_eklaim.prosedur_non_bedah) ?? 0);
          // $('#tarif-tenaga-ahli').val(money_format(status_eklaim.tenaga_ahli) ?? 0);
          // $('#tarif-radiologi').val(money_format(status_eklaim.radiologi) ?? 0);
          // $('#tarif-rehabilitasi').val(money_format(status_eklaim.rehabilitasi) ?? 0);
          // $('#tarif-obat').val(money_format(status_eklaim.obat) ?? 0);
          // $('#tarif-alkes').val(money_format(status_eklaim.alkes) ?? 0);

          // $('#tarif-prosedur-bedah').val(money_format(status_eklaim.prosedur_bedah) ?? 0);
          // $('#tarif-keperawatan').val(money_format(status_eklaim.keperawatan) ?? 0);
          // $('#tarif-laboratorium').val(money_format(status_eklaim.laboratorium) ?? 0);
          // $('#tarif-kamar-akomodasi').val(money_format(status_eklaim.kamar) ?? 0);
          // $('#tarif-obat-kronis').val(money_format(status_eklaim.obat_kronis) ?? 0);
          // $('#tarif-bmhp').val(money_format(status_eklaim.bmhp) ?? 0);

          // $('#tarif-konsultasi').val(money_format(status_eklaim.konsultasi) ?? 0);
          // $('#tarif-penunjang').val(money_format(status_eklaim.penunjang) ?? 0);
          // $('#tarif-pelayanan-darah').val(money_format(status_eklaim.pelayanan_darah) ?? 0);
          // $('#tarif-rawat-intensif').val(money_format(status_eklaim.rawat_intensif) ?? 0);
          // $('#tarif-obat-kemoterapi').val(money_format(status_eklaim.obat_kemoterapi) ?? 0);
          // $('#tarif-sewa-alat').val(money_format(status_eklaim.sewa_alat) ?? 0);

          // $('#jkn_sistole').val(status_eklaim.sistole) ?? 0;
          // $('#jkn_diastole').val(status_eklaim.diastole) ?? 0;

          calculateSum();

          $('#gpr_procedure').val(status_eklaim.procedure);
          $('#gpr_diagnosis').val(status_eklaim.diagnosa);
          $('#gpr_procedure_inagrouper').val(status_eklaim.procedure_inagrouper);
          $('#gpr_diagnosis_inagrouper').val(status_eklaim.diagnosa_inagrouper);

          if (eclaim.method_status == 'set_claim_data') {
            left_btn_html = `
              <button type="button" class="btn btn-danger waves-effect" onclick="hapusEklaim()"><i class="fas fa-trash mr-1"></i>Hapus Klaim</button>
              <button type="button" class="btn btn-secondary" onclick="closeTabEklaim()" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Close</button>
            `;

            right_btn_html = /* html */ `
              <button type="button" class="btn btn-secondary waves-effect" onclick="set_claim_data()"><i class="fas fa-save"></i> Simpan</button>
              <button type="button" class="btn btn-info waves-effect" onclick="grouper_stage()"><i class="fas fa-save"></i> Grouper</button>
            `;
          }

          if (eclaim.method_status == 'grouper' && data.status_grouper !== null) {

            $('#btn-after-grouper').append(
              `<div class="row col-md m-0" style="background-color:#cccccc;">
                <div class="modal-footer col-lg-4 d-flex justify-content-start">
                  <button type="button" class="btn btn-danger waves-effect" onclick="hapusEklaim()"><i class="fas fa-trash mr-1"></i>Hapus Klaim</button>
                </div>
                <div class="modal-footer col-lg-8 d-flex justify-content-end">
                  <button type="button" class="btn btn-secondary waves-effect" onclick="set_claim_data()"><i class="fas fa-save mr-1"></i>Simpan</button>
                  <button type="button" class="btn btn-info waves-effect" onclick="grouper_stage()"><i class="fas fa-save mr-1"></i>Grouper</button>
                </div>
              </div>`
            );

            showGrouperResult(data, jenis_rawat);

            left_btn_html = `
              <button type="button" class="btn btn-secondary" onclick="closeTabEklaim()" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Close</button>
            `;

            right_btn_html = /* html */ `
              <button type="button" class="btn btn-success waves-effect" onclick="claim_final()"><i class="fas fa-save mr-1"></i> Final</button>
            `;

          }

          if (eclaim.method_status == 'final' || eclaim.status_klaim == 'Terkirim') {
            $('#import-coding').hide();
            showGrouperResult(data, jenis_rawat)

            $(document).ready(function() {
              $('#form-gpr-eklaim :input').prop('disabled', true);
            });

            left_btn_html = `
              <button type="button" class="btn btn-success waves-effect" onclick="claim_print()"><i class="fas fa-print mr-1"></i>Cetak Klaim</button>
              <button type="button" class="btn btn-info waves-effect" onclick="send_claim_individual()"><i class="fab fa-telegram-plane mr-1"></i>Kirim Klaim Online</button>
              <button type="button" class="btn btn-secondary" onclick="closeTabEklaim()" data-dismiss="modal"><i class="fas fa-times-circle mr-1"></i>Close</button>
            `;

            right_btn_html = /* html */ `
              <button type="button" class="btn btn-info waves-effect" onclick="reedit_claim()"><i class="fas fa-save mr-1"></i>Edit Ulang Klaim</button>
            `;

            $('#btn-after-grouper').empty();
          }

          $('#left-button-footer').append(left_btn_html);
          $('#right-button-footer').append(right_btn_html);
        }

        // getListHistoryResepEclaim(1, pasien.id_pasien);
        $('#modal-grouper-eklaim').modal('show')

      },
      complete: function() {
        hideLoader()
        $('#tab-index-eklaim').removeClass('tab-content');
      },
      error: function(e) {
        accessFailed(e.status);
      },
    });

  }


  // Diagnosa
  function ShowDiagnosaUNU(id_pendaftaran, status_kalim, method_status) {
    $('#table-list-diagnosa-unu tbody').empty();

    $.ajax({
      type: 'GET',
      url: '<?= base_url("eklaim_bpjs/api/Eklaim_bpjs/get_diagnosa_unu") ?>/id/' + id_pendaftaran + '/status_klaim/' + status_kalim,
      cache: false,
      dataType: 'JSON',
      beforeSend: function() {
        showLoader();
      },
      success: function(data) {
        let html = ``;
        let apgarCodes = ["73.8", "73.8", "73.92", "74.4"]; // Kode target
        let HDCodes = ["39.95"]; // Kode diagnosa HD
        let apgarVisible = false; // Status untuk memunculkan elemen

        if (data.length != 0) {
          $.each(data, function(i, v) {
            let prioritas = "Sekunder";
            let btnSetPrimer = `<button id="btn-set-primary" type="button" onclick="setPrimerDiagnosa('unu', '${id_pendaftaran}', '${v.code}')" class="btn btn-secondary">
                                  <i class="far fa-edit mr-1"></i>Set Primer
                                </button>`;

            if (i === 0) {
              btnSetPrimer = "";
              prioritas = 'Primer';
            }

            if (apgarCodes.includes(v.code)) {
              apgarVisible = true;
            }

            if ((status_kalim == 'Terkirim' || status_kalim == 'Final')) {
              html += /* html */ `
                        <tr>
                          <td style="border-bottom: 1px solid #aaa; padding: 5px;">
                            <div class="row ml-1">
                              <h6>${v.nama}<span class="badge badge-primary ml-1">${v.code}</span></h6>
                              <span id="lbl-prioritas-diag-unu" class="ml-1">${prioritas}</span>
                            </div>
                          </td>
                        </tr>`;
            } else {
              html += /* html */ `
                        <tr class="diagnosis_unu">
                          <td style="border-bottom: 1px solid #aaa; padding: 5px;">
                            <div class="row ml-1" id="label-edit-diag-unu${i+1}">
                              <h6 class="pointer" onclick="toggleEditDiag('unu${i+1}')">${v.nama}<span class="badge badge-primary ml-1">${v.code}</span></h6>
                              <span id="lbl-prioritas-diag-unu${i+1}" class="ml-1">${prioritas}</span>
                              
                            </div>
                            <div class="row" id="edit-diag-unu${i+1}" style="display: none;">
                              <div class="col-lg-3">
                                  <input type="text" style="border-radius: 25px;" class="form-control" onkeydown="handleEnterDiagNEW(event, 'unu${i+1}')" id="search-diagnosa-unu${i+1}" placeholder="Cari Diagnosa">
                                  <div id="diagnosaResult-unu${i+1}" class="diagnosa-unu${i+1} diagnosa-class" style="display: none;"></div>
                              </div>
                              <div class="col-lg-1">
                                  <button type="button" onclick="hapusDiagnosaNEW(this, 'unu', '${id_pendaftaran}', '${v.code}')" class="btn btn-danger"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
                              </div>
                              <div class="col-lg-2">
                                  ${btnSetPrimer}
                              </div>
                              <div class="col-lg-6"></div>
                            </div>
                          </td>
                        </tr>`;
            }

            let combinedCodes = data.map(item => item.code).join('#');
            $('#gpr_diagnosis').val(combinedCodes);
          });

          if (apgarVisible) {
            $('#data-kelahiran').show();
            $('#is-persalinan-gpr').val('1');
          }

          $('#table-list-diagnosa-unu tbody').append(html);
        }
      },
      complete: function() {
        hideLoader();
      },
      error: function(e) {
        messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT', 'Error');
      }
    });
  }

  function ShowDiagnosaINA(id_pendaftaran, status_kalim, method_status) {
    $('#table-list-diagnosa-ina tbody').empty();

    $.ajax({
      type: 'GET',
      url: '<?= base_url("eklaim_bpjs/api/Eklaim_bpjs/get_diagnosa_ina") ?>/id/' + id_pendaftaran + '/status_klaim/' + status_kalim,
      cache: false,
      dataType: 'JSON',
      beforeSend: function() {
        showLoader();
      },
      success: function(data) {
        let html = ``;
        let apgarCodes = ["73.8", "73.8", "73.92", "74.4"]; // Kode target
        let HDCodes = ["39.95"]; // Kode diagnosa HD
        let apgarVisible = false; // Status untuk memunculkan elemen

        if (data.length != 0) {
          $.each(data, function(i, v) {
            let prioritas = "Sekunder";
            let btnSetPrimer = `<button id="btn-set-primary" type="button" onclick="setPrimerDiagnosa('ina', '${id_pendaftaran}', '${v.code}')" class="btn btn-secondary">
                                  <i class="far fa-edit mr-1"></i>Set Primer
                                </button>`;

            if (i === 0) {
              btnSetPrimer = "";
              prioritas = 'Primer';
            }

            if (apgarCodes.includes(v.code)) {
              apgarVisible = true;
            }

            if ((status_kalim == 'Terkirim' || status_kalim == 'Final')) {
              html += /* html */ `
                        <tr>
                          <td style="border-bottom: 1px solid #aaa; padding: 5px;">
                            <div class="row ml-1">
                              <h6><span class="fas fa-list-ul mr-2"></span></h6>
                              <h6>${v.nama}<span class="badge badge-primary ml-1">${v.code}</span></h6>
                              <span id="lbl-prioritas-diag-ina" class="ml-1">${prioritas}</span>
                            </div>
                          </td>
                        </tr>`;
            } else {
              html += /* html */ `
                        <tr class="diagnosis_ina">
                          <td style="border-bottom: 1px solid #aaa; padding: 5px;">
                            <div class="row ml-1" id="label-edit-diag-ina${i+1}">
                              <h6><span class="fas fa-list-ul mr-2"></span></h6>
                              <h6 class="pointer" onclick="toggleEditDiag('ina${i+1}')">${v.nama}<span class="badge badge-primary ml-1">${v.code}</span></h6>
                              <span id="lbl-prioritas-diag-ina${i+1}" class="ml-1">${prioritas}</span>
                            </div>
                            <div class="row" id="edit-diag-ina${i+1}" style="display: none;">
                              <div class="col-lg-3">
                                  <input type="text" style="border-radius: 25px;" class="form-control" onkeydown="handleEnterDiagNEW(event, 'ina${i+1}')" id="search-diagnosa-ina${i+1}" placeholder="Cari Diagnosa">
                                  <div id="diagnosaResult-ina${i+1}" class="diagnosa-ina${i+1} diagnosa-class" style="display: none;"></div>
                              </div>
                              <div class="col-lg-1">
                                  <button type="button" onclick="hapusDiagnosaNEW(this, 'ina', '${id_pendaftaran}', '${v.code}')" class="btn btn-danger"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
                              </div>
                              <div class="col-lg-2">
                                  ${btnSetPrimer}
                              </div>
                              <div class="col-lg-6"></div>
                            </div>
                          </td>
                        </tr>`;
            }
          });

          if (apgarVisible) {
            $('#data-kelahiran').show();
            $('#is-persalinan-gpr').val('1');
          }

          $('#table-list-diagnosa-ina tbody').append(html);
        }
      },
      complete: function() {
        hideLoader();
      },
      error: function(e) {
        messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT', 'Error');
      }
    });
  }

  var currentOpenId = null; // Variabel untuk menyimpan ID elemen yang sedang terbuka
  function toggleEditDiag(id) {
    const editDiag = document.getElementById(`edit-diag-${id}`);

    // Jika ada elemen yang terbuka dan itu bukan elemen yang diklik, tutup elemen tersebut
    if (currentOpenId && currentOpenId !== id) {
      const previousOpen = document.getElementById(`edit-diag-${currentOpenId}`);
      if (previousOpen) {
        previousOpen.style.display = "none";
      }
    }

    // Toggle elemen yang diklik
    if (editDiag.style.display === "none" || editDiag.style.display === "") {
      editDiag.style.display = "flex";
      currentOpenId = id; // Simpan ID elemen yang baru dibuka
    } else {
      editDiag.style.display = "none";
      currentOpenId = null; // Reset jika elemen yang sama ditutup
    }
  }


  // Procedure
  function ShowProsedurUNU(id_pendaftaran, status_kalim, method_status) {
    $('#table-list-prosedur-unu tbody').empty();

    $.ajax({
      type: 'GET',
      url: '<?= base_url("eklaim_bpjs/api/Eklaim_bpjs/get_prosedur_unu") ?>/id/' + id_pendaftaran + '/status_klaim/' + status_kalim,
      cache: false,
      dataType: 'JSON',
      beforeSend: function() {
        showLoader();
      },
      success: function(data) {
        let html = ``;
        let apgarCodes = ["73.8", "73.8", "73.92", "74.4"]; // Kode target
        let HDCodes = ["39.95"]; // Kode diagnosa HD
        let apgarVisible = false; // Status untuk memunculkan elemen

        if (data.length != 0) {
          $.each(data, function(i, v) {
            let prioritas = "Sekunder";
            let btnSetPrimer = `<button id="btn-set-primary" type="button" onclick="setPrimerProsedur('unu', '${id_pendaftaran}', '${v.code}')" class="btn btn-secondary">
                                  <i class="far fa-edit mr-1"></i>Set Primer
                                </button>`;

            if (i === 0) {
              btnSetPrimer = "";
              prioritas = 'Primer';
            }

            if (apgarCodes.includes(v.code)) {
              apgarVisible = true;
            }

            if ((status_kalim == 'Terkirim' || status_kalim == 'Final')) {
              html += /* html */ `
                        <tr>
                          <td style="border-bottom: 1px solid #aaa; padding: 5px;">
                            <div class="row ml-1">
                              <h6>${v.nama}<span class="badge badge-primary ml-1">${v.code}</span></h6>
                              <span id="lbl-prioritas-proc-unu" class="ml-1">${prioritas}</span>
                            </div>
                          </td>
                        </tr>`;
            } else {
              html += /* html */ `
                        <tr class="procedure_unu">
                          <td style="border-bottom: 1px solid #aaa; padding: 5px;">
                            <div class="row ml-1" id="label-edit-proc-unu${i+1}">
                              <h6 class="pointer" onclick="toggleEditProc('unu${i+1}')">${v.nama}<span class="badge badge-primary ml-1">${v.code}</span></h6>
                              <span id="lbl-prioritas-proc-unu${i+1}" class="ml-1">${prioritas}</span>
                              
                            </div>
                            <div class="row" id="edit-proc-unu${i+1}" style="display: none;">
                              <div class="col-lg-3">
                                  <input type="text" style="border-radius: 25px;" class="form-control" onkeydown="handleEnterProcNEW(event, 'unu${i+1}')" id="search-prosedur-unu${i+1}" placeholder="Cari Prosedur">
                                  <div id="prosedurResult-unu${i+1}" class="prosedur-unu${i+1} prosedur-class" style="display: none;"></div>
                              </div>
                              <div class="col-lg-1">
                                  <button type="button" onclick="hapusProsedurNEW(this, 'unu', '${id_pendaftaran}', '${v.code}')" class="btn btn-danger"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
                              </div>
                              <div class="col-lg-2">
                                  ${btnSetPrimer}
                              </div>
                              <div class="col-lg-6"></div>
                            </div>
                          </td>
                        </tr>`;
            }
          });

          if (apgarVisible) {
            $('#data-kelahiran').show();
            $('#is-persalinan-gpr').val('1');
          }

          $('#table-list-prosedur-unu tbody').append(html);
        }
      },
      complete: function() {
        hideLoader();
      },
      error: function(e) {
        messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT', 'Error');
      }
    });
  }

  function ShowProsedurINA(id_pendaftaran, status_kalim, method_status) {
    $('#table-list-prosedur-ina tbody').empty();

    $.ajax({
      type: 'GET',
      url: '<?= base_url("eklaim_bpjs/api/Eklaim_bpjs/get_prosedur_ina") ?>/id/' + id_pendaftaran + '/status_klaim/' + status_kalim,
      cache: false,
      dataType: 'JSON',
      beforeSend: function() {
        showLoader();
      },
      success: function(data) {
        let html = ``;
        let apgarCodes = ["73.8", "73.8", "73.92", "74.4"]; // Kode target
        let HDCodes = ["39.95"]; // Kode diagnosa HD
        let apgarVisible = false; // Status untuk memunculkan elemen

        if (data.length != 0) {
          $.each(data, function(i, v) {
            let prioritas = "Sekunder";
            let btnSetPrimer = `<button id="btn-set-primary" type="button" onclick="setPrimerProsedur('ina', '${id_pendaftaran}', '${v.code}')" class="btn btn-secondary">
                                  <i class="far fa-edit mr-1"></i>Set Primer
                                </button>`;

            if (i === 0) {
              btnSetPrimer = "";
              prioritas = 'Primer';
            }

            if (apgarCodes.includes(v.code)) {
              apgarVisible = true;
            }

            if ((status_kalim == 'Terkirim' || status_kalim == 'Final')) {
              html += /* html */ `
                        <tr>
                          <td style="border-bottom: 1px solid #aaa; padding: 5px;">
                            <div class="row ml-1">
                              <h6><span class="fas fa-list-ul mr-2"></span></h6>
                              <h6>${v.nama}<span class="badge badge-primary ml-1">${v.code}</span></h6>
                              <span id="lbl-prioritas-proc-ina" class="ml-1">${prioritas}</span>
                            </div>
                          </td>
                        </tr>`;
            } else {
              html += /* html */ `
                        <tr class="procedure_ina">
                          <td style="border-bottom: 1px solid #aaa; padding: 5px;">
                            <div class="row ml-1" id="label-edit-proc-ina${i+1}">
                              <h6><span class="fas fa-list-ul mr-2"></span></h6>
                              <h6 class="pointer" onclick="toggleEditProc('ina${i+1}')">${v.nama}<span class="badge badge-primary ml-1">${v.code}</span></h6>
                              <span id="lbl-prioritas-proc-ina${i+1}" class="ml-1">${prioritas}</span>
                            </div>
                            <div class="row" id="edit-proc-ina${i+1}" style="display: none;">
                              <div class="col-lg-3">
                                  <input type="text" style="border-radius: 25px;" class="form-control" onkeydown="handleEnterProcNEW(event, 'ina${i+1}')" id="search-prosedur-ina${i+1}" placeholder="Cari Prosedur">
                                  <div id="prosedurResult-ina${i+1}" class="prosedur-ina${i+1} prosedur-class" style="display: none;"></div>
                              </div>
                              <div class="col-lg-1">
                                  <button type="button" onclick="hapusProsedurNEW(this, 'ina', '${id_pendaftaran}', '${v.code}')" class="btn btn-danger"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
                              </div>
                              <div class="col-lg-2">
                                  ${btnSetPrimer}
                              </div>
                              <div class="col-lg-6"></div>
                            </div>
                          </td>
                        </tr>`;
            }
          });

          if (apgarVisible) {
            $('#data-kelahiran').show();
            $('#is-persalinan-gpr').val('1');
          }

          $('#table-list-prosedur-ina tbody').append(html);
        }
      },
      complete: function() {
        hideLoader();
      },
      error: function(e) {
        messageCustom('Terjadi Kesalahan Silahkan Hubungi Bagian IT', 'Error');
      }
    });
  }

  var currentOpenIdProc = null; // Variabel untuk menyimpan ID elemen yang sedang terbuka
  function toggleEditProc(id) {
    const editProc = document.getElementById(`edit-proc-${id}`);

    // Jika ada elemen yang terbuka dan itu bukan elemen yang diklik, tutup elemen tersebut
    if (currentOpenIdProc && currentOpenIdProc !== id) {
      const previousOpen = document.getElementById(`edit-proc-${currentOpenIdProc}`);
      if (previousOpen) {
        previousOpen.style.display = "none";
      }
    }

    // Toggle elemen yang diklik
    if (editProc.style.display === "none" || editProc.style.display === "") {
      editProc.style.display = "flex";
      currentOpenIdProc = id; // Simpan ID elemen yang baru dibuka
    } else {
      editProc.style.display = "none";
      currentOpenIdProc = null; // Reset jika elemen yang sama ditutup
    }
  }


  function set_claim_data() {
    let idPendaftaran = $('#id-pendaftaran-gpr').val();

    if ($('#gpr-cara-bayar').val() === '') {
      syams_validation('#gpr-cara-bayar', 'Jaminan / Cara Bayar harus terisi.');
      return false;
    }
    syams_validation_remove('#gpr-cara-bayar');

    $.ajax({
      type: 'POST',
      url: '<?= base_url("eklaim_bpjs/api/Eklaim_bpjs/simpan_data_eklaim") ?>',
      data: $('#form-gpr-eklaim').serialize(),
      cache: false,
      dataType: 'JSON',
      beforeSend: function() {
        showLoader();
      },
      success: function(data) {
        // getListDataKunjunganPasien($('#page-now-kunjungan-pasien').val());
        if (data.status) {
          setClaimData($('#id-pendaftaran-gpr').val(), $('#jenis-rawat-gpr').val())
          // messageCustom(data.message, 'Success');
          // $('#modal-eclaim').modal('hide');
          searchingByName($('#id-pasien-gpr').val());
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

  function forUpdate_set_claim_data() {
    $.ajax({
      type: 'POST',
      url: '<?= base_url("eklaim_bpjs/api/Eklaim_bpjs/simpan_data_eklaim") ?>',
      data: $('#form-gpr-eklaim').serialize(),
      cache: false,
      dataType: 'JSON',
      beforeSend: function() {
        showLoader();
      },
      success: function(data) {
        // getListDataKunjunganPasien($('#page-now-kunjungan-pasien').val());
        if (data.status) {
          // setClaimData($('#id-pendaftaran-gpr').val(), $('#jenis-rawat-gpr').val())
          // messageCustom(data.message, 'Success');
          // $('#modal-eclaim').modal('hide');
          searchingByName($('#id-pasien-gpr').val());
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

  function grouper_stage() {
    // Update claim data
    $('#gpr_status_klaim').val('normal');
    $('#gpr_method_status').val('grouper');

    if ($('#gpr-cara-bayar').val() === '') {
      syams_validation('#gpr-cara-bayar', 'Jaminan / Cara Bayar harus terisi.');
      return false;
    }
    syams_validation_remove('#gpr-cara-bayar');

    // forUpdate_set_claim_data();

    $.ajax({
      type: 'POST',
      url: '<?= base_url("eklaim_bpjs/api/Eklaim_bpjs/grouping_stage_1") ?>',
      data: $('#form-gpr-eklaim').serialize(),
      cache: false,
      dataType: 'JSON',
      beforeSend: function() {
        showLoader();
      },
      success: function(data) {
        // getListDataKunjunganPasien($('#page-now-kunjungan-pasien').val());
        if (data.status) {
          searchingByName($('#id-pasien-gpr').val());
          setClaimData($('#id-pendaftaran-gpr').val(), $('#jenis-rawat-gpr').val())
          // messageCustom(data.message, 'Success');

          // $('#modal-eclaim').modal('hide');
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

  function claim_final() {

    $.ajax({
      type: 'POST',
      url: '<?= base_url("eklaim_bpjs/api/Eklaim_bpjs/claim_final") ?>',
      data: $('#form-gpr-eklaim').serialize(),
      cache: false,
      dataType: 'JSON',
      beforeSend: function() {
        showLoader();
      },
      success: function(data) {
        if (data.status) {
          searchingByName($('#id-pasien-gpr').val());
          setClaimData($('#id-pendaftaran-gpr').val(), $('#jenis-rawat-gpr').val(), true)
          // messageCustom(data.message, 'Success');
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

  function claim_print() {

    $.ajax({
      type: 'POST',
      url: '<?= base_url("eklaim_bpjs/api/Eklaim_bpjs/cetak_klaim") ?>',
      data: {
        nomor_sep: $('#gpr-no-sep').val()
      },
      cache: false,
      dataType: 'JSON',
      beforeSend: function() {
        showLoader();
      },
      success: function(data) {
        if (data.status) {
          var pdfBase64 = data.data; // Ambil data PDF dalam base64

          var byteArray = Uint8Array.from(atob(pdfBase64), c => c.charCodeAt(0));
          var pdfBlob = new Blob([byteArray], {
            type: 'application/pdf'
          });

          var pdfURL = URL.createObjectURL(pdfBlob);

          window.open(pdfURL, '_blank');
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

  function reedit_claim() {

    Swal.fire({
      title: 'Edit Ulang Data Klaim!',
      text: "Anda akan membatalkan status final dan melakukan edit ulang klaim ?",
      icon: 'warning',
      allowOutsideClick: false,
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      cancelButtonText: '<i class="fas fa-times-circle mr-1"></i>Tidak (batal edit)',
      confirmButtonText: '<i class="fas fa-pencil-alt mr-1"></i>Ya (edit ulang)',
    }).then((result) => {
      if (result.value) {
        $.ajax({
          type: 'POST',
          url: '<?= base_url("eklaim_bpjs/api/Eklaim_bpjs/reedit_claim") ?>',
          data: {
            nomor_sep: $('#gpr-no-sep').val(),
            id_pendaftaran: $('#id-pendaftaran-gpr').val(),
          },
          cache: false,
          dataType: 'JSON',
          beforeSend: function() {
            showLoader();
          },
          success: function(data) {
            if (data.status) {
              searchingByName($('#id-pasien-gpr').val());
              setClaimData($('#id-pendaftaran-gpr').val(), $('#jenis-rawat-gpr').val(), true)
              // messageCustom(data.message, 'Success');
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
    });
  }

  function send_claim_individual() {

    Swal.fire({
      title: 'Kirim Klaim Online!',
      text: "Anda akan yakin ingin mengirim data klaim online?",
      icon: 'warning',
      allowOutsideClick: false,
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      // cancelButtonColor: '#d33',
      cancelButtonText: '<i class="fas fa-times-circle mr-1"></i>Tidak (batal kirim)',
      confirmButtonText: '<i class="fab fa-telegram-plane mr-1"></i>Ya (kirim data)',
    }).then((result) => {
      if (result.value) {
        $.ajax({
          type: 'POST',
          url: '<?= base_url("eklaim_bpjs/api/Eklaim_bpjs/send_claim_individual") ?>',
          data: {
            nomor_sep: $('#gpr-no-sep').val(),
            id_pendaftaran: $('#id-pendaftaran-gpr').val(),
          },
          cache: false,
          dataType: 'JSON',
          beforeSend: function() {
            showLoader();
          },
          success: function(data) {
            if (data.status) {
              searchingByName($('#id-pasien-gpr').val());
              setClaimData($('#id-pendaftaran-gpr').val(), $('#jenis-rawat-gpr').val())
              // messageCustom(data.message, 'Success');
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
    });
  }

  function hapusEklaim() {
    let idPendaftaran = $('#id-pendaftaran-gpr').val();

    Swal.fire({
      title: 'Hapus Data Klaim!',
      text: "Apakah anda yakin ingin menghapus data klaiam ini ?",
      icon: 'warning',
      allowOutsideClick: false,
      showCancelButton: true,
      confirmButtonColor: '#d33',
      cancelButtonColor: '#3085d6',
      cancelButtonText: '<i class="fas fa-times-circle mr-1"></i>Batal',
      confirmButtonText: '<i class="fas fa-trash mr-1"></i>Hapus',
    }).then((result) => {
      if (result.value) {
        $.ajax({
          type: 'POST',
          url: '<?= base_url("eklaim_bpjs/api/Eklaim_bpjs/hapus_data_eklaim") ?>',
          data: $('#form-gpr-eklaim').serialize(),
          cache: false,
          dataType: 'JSON',
          beforeSend: function() {
            showLoader();
          },
          success: function(data) {
            // getListDataKunjunganPasien($('#page-now-kunjungan-pasien').val());
            if (data.status) {
              // messageCustom(data.message, 'Success');

              searchingByName($('#id-pasien-gpr').val());
              $('#modal-grouper-eklaim').modal('hide');

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
    });
  }

  function showDetailKelahiran(data) {
    let $tbody = $('#table-kelahiran-eklaim tbody');
    $tbody.empty();

    if (data !== null && data.length > 0) {

      let rows = data.map((v, i) => {
        let num = i + 1;

        let vaginalChecked = v.delivery_method === 'vaginal' ? 'checked' : '';
        let scChecked = v.delivery_method === 'sc' ? 'checked' : '';
        let vaginalDisplay = v.delivery_method === 'vaginal' ? 'block' : 'none';

        let manualChecked = v.use_manual == '1' ? 'checked' : '';
        let forcepChecked = v.use_forcep == '1' ? 'checked' : '';
        let vacuumChecked = v.use_vacuum == '1' ? 'checked' : '';

        let kepalaChecked = v.letak_janin === 'kepala' ? 'checked' : '';
        let sungsangChecked = v.letak_janin === 'sungsang' ? 'checked' : '';
        let lintangChecked = v.letak_janin === 'lintang' ? 'checked' : '';

        let livebirthChecked = v.kondisi_bayi !== 'stillbirth' ? 'checked' : '';
        let stillbirthChecked = v.kondisi_bayi === 'stillbirth' ? 'checked' : '';

        let shkYesChecked = v.shk_spesimen_ambil === 'ya' ? 'checked' : '';
        let shkNoChecked = v.shk_spesimen_ambil === 'tidak' ? 'checked' : '';

        let shkLokasiDisplay = 'none';
        let shkAlasanDisplay = 'none';
        let tumitChecked = '';
        let venaChecked = '';
        let tidakDapatChecked = '';
        let aksesSulitChecked = '';
        if (v.shk_spesimen_ambil === 'ya') {
          shkLokasiDisplay = 'block';
          shkAlasanDisplay = 'none';
          tumitChecked = v.shk_lokasi === 'tumit' ? 'checked' : '';
          venaChecked = v.shk_lokasi === 'vena' ? 'checked' : '';
        } else {
          shkLokasiDisplay = 'none';
          shkAlasanDisplay = 'block';
          tidakDapatChecked = v.shk_alasan === 'tidak-dapat' ? 'checked' : '';
          aksesSulitChecked = v.shk_alasan === 'akses-sulit' ? 'checked' : '';
        }

        return /* html */ `

                  <tr class="jkn_kelahiran">
											<td style="text-align:center;vertical-align:top; border-right: solid 1px #aaa; border-bottom: solid 1px #aaa;">
                        ${num}
                        <input type="hidden" name="num_${num}" value="${num}">
                      </td>
											<td style="text-align:center;vertical-align:top; border-right: solid 1px #aaa; border-bottom: solid 1px #aaa;">	
											  <input type="hidden" name="id_detail_kelahiran[]" value="${v.id}">
												<input type="hidden" name="num[]" value="${num}">	
                        <input type="text" id="jkn_delivery_dttm_${num}" name="delivery_dttm[]" class="custom-form clear-input ml-1 number-input col-lg-8" value="${v.delivery_dttm ?? ""}">
											</td>
											<td style="text-align:left;vertical-align:top; border-right: solid 1px #aaa; border-bottom: solid 1px #aaa;">
												<input ${vaginalChecked} type="radio" onchange="jkn_chg_delivery_method('${num}', 'vaginal');" id="jkn_ck_pt_vaginal_${num}" value="vaginal" name="delivery_method_${num}">&nbsp;
												<label for="jkn_ck_pt_vaginal_${num}" class="xlnk">Vaginal</label><br>
												<input ${scChecked} type="radio" onchange="jkn_chg_delivery_method('${num}', 'sc');" id="jkn_ck_pt_sc_${num}" value="sc" name="delivery_method_${num}">&nbsp;
												<label for="jkn_ck_pt_sc_${num}" class="xlnk">Sectio Caesarean</label><br><br>
                        <input type="hidden" id="delivery_method_${num}" name="delivery_method[]" value="${v.delivery_method}">
												<div id="jkn_vaginal_option_${num}" style="display:${vaginalDisplay};">
													<input onclick="jkn_ckb_manual_onclick('${num}')" type="checkbox" ${manualChecked} id="jkn_ckb_manual_${num}">&nbsp;
													<input type="hidden" id="jkn_ckb_manual_input_${num}" name="use_manual[]" value="${v.use_manual}">
                          <label for="jkn_ckb_manual_${num}" class="xlnk">Manual Aid</label><br>
													<input onclick="jkn_ckb_forcep_onclick('${num}')" type="checkbox" ${forcepChecked} id="jkn_ckb_forcep_${num}">&nbsp;
													<input type="hidden" id="jkn_ckb_forcep_input_${num}" name="use_forcep[]" value="${v.use_forcep}">
                          <label for="jkn_ckb_forcep_${num}" class="xlnk">Forcep</label><br>
													<input onclick="jkn_ckb_vacuum_onclick('${num}')" type="checkbox" ${vacuumChecked} id="jkn_ckb_vacuum_${num}">&nbsp;
													<input type="hidden" id="jkn_ckb_vacuum_input_${num}" name="use_vacuum[]" value="${v.use_vacuum}">
                          <label for="jkn_ckb_vacuum_${num}" class="xlnk">Vacuum</label>
												</div>
											</td>
											<td style="text-align:left;vertical-align:top; border-right: solid 1px #aaa; border-bottom: solid 1px #aaa;">
												<input onchange="changeLetak('${num}', 'kepala')" ${kepalaChecked} type="radio" id="jkn_ck_pt_kepala_${num}" value="kepala" name="letak_janin_${num}">&nbsp;
												<label for="jkn_ck_pt_kepala_${num}" class="xlnk">Kepala</label><br>
												<input onchange="changeLetak('${num}', 'sungsang')" ${sungsangChecked} type="radio" id="jkn_ck_pt_sungsang_${num}" value="sungsang" name="letak_janin_${num}">&nbsp;
												<label for="jkn_ck_pt_sungsang_${num}" class="xlnk">Sungsang</label><br>
												<input onchange="changeLetak('${num}', 'lintang')" ${lintangChecked} type="radio" id="jkn_ck_pt_lintang_${num}" value="lintang" name="letak_janin_${num}">&nbsp;
												<label for="jkn_ck_pt_lintang_${num}" class="xlnk">Lintang/Oblique</label>
                        <input type="hidden" id="letak_janin_${num}" name="letak_janin[]" value="${v.letak_janin}">
											</td>
											<td style="text-align:left;vertical-align:top; border-right: solid 1px #aaa; border-bottom: solid 1px #aaa;">
												<input onchange="changeKondisi('${num}', 'livebirth')" ${livebirthChecked} type="radio" id="jkn_ck_pt_livebirth_${num}" value="livebirth" name="kondisi_${num}">&nbsp;
												<label for="jkn_ck_pt_livebirth_${num}" class="xlnk">Hidup</label><br>
												<input onchange="changeKondisi('${num}', 'stillbirth')" ${stillbirthChecked} type="radio" id="jkn_ck_pt_stillbirth_${num}" value="stillbirth" name="kondisi_${num}">&nbsp;
												<label for="jkn_ck_pt_stillbirth_${num}" class="xlnk">Meninggal</label>
                        <input type="hidden" id="kondisi_${num}" name="kondisi[]" value="${v.kondisi}">
											</td>
											<td style="vertical-align:top; border-right: solid 1px #aaa; border-bottom: solid 1px #aaa;">
												<div style="min-height:150px;">
													<div>
														<input ${shkYesChecked} onchange="jkn_shk_onclick('${num}',1);" type="radio" id="jkn_ck_shk_yes_${num}" value="ya" name="shk_ambil_${num}">&nbsp;
														<label for="jkn_ck_shk_yes_${num}" class="xlnk">Diambil</label><br>
														<input ${shkNoChecked} onchange="jkn_shk_onclick('${num}',0);" type="radio" id="jkn_ck_shk_no_${num}" value="tidak" name="shk_ambil_${num}">&nbsp;
														<label for="jkn_ck_shk_no_${num}" class="xlnk">Tidak Diambil</label>
                            <input type="hidden" id="shk_spesimen_ambil_${num}" name="shk_spesimen_ambil[]" value="${v.shk_spesimen_ambil}">
													</div>
													<div style="margin-top:1em;display:${shkLokasiDisplay};" id="jkn_shk_lokasi_sampel_${num}">
														<div class="discreet">Lokasi pengambilan:</div>
														<input onchange="changeSHKLokasi('${num}','tumit')" ${tumitChecked} type="radio" id="jkn_ck_shk_tumit_${num}" value="tumit" name="shk_lokasi_${num}">&nbsp;
														<label for="jkn_ck_shk_tumit_${num}" class="xlnk">Tumit</label>&nbsp;&nbsp;
														<input onchange="changeSHKLokasi('${num}','vena')" ${venaChecked} type="radio" id="jkn_ck_shk_vena_${num}" value="vena" name="shk_lokasi_${num}">&nbsp;
														<label for="jkn_ck_shk_vena_${num}" class="xlnk">Vena</label><br>
                            <input type="hidden" id="shk_lokasi_${num}" name="shk_lokasi[]" value="${v.shk_lokasi ?? ""}">
														<div style="padding-top:1em;">
												      <input type="text" id="jkn_input_shk_spesimen_dttm_${num}" name="shk_spesimen_dttm[]" class="custom-form clear-input ml-1 number-input col-lg-10" value="${v.shk_spesimen_dttm ?? ""}">
                            </div>
													</div>
													<div style="margin-top:1em;display:${shkAlasanDisplay};" id="jkn_shk_alasan_${num}">
														<div class="discreet">Alasan tidak diambil:</div>
														<input onchange="changeSHKAlasan('${num}', 'tidak-dapat')" ${tidakDapatChecked} type="radio" id="jkn_ck_shk_alasan_1_${num}" value="tidak-dapat" name="shk_alasan_${num}">&nbsp;
														<label for="jkn_ck_shk_alasan_1_${num}" class="xlnk">Tidak dapat dilakukan</label><br>
														<input onchange="changeSHKAlasan('${num}', 'akses-sulit')" ${aksesSulitChecked} type="radio" id="jkn_ck_shk_alasan_2_${num}" value="akses-sulit" name="shk_alasan_${num}">&nbsp;
														<label for="jkn_ck_shk_alasan_2_${num}" class="xlnk">Akses sulit</label><br>
                            <input type="hidden" id="shk_alasan_${num}" name="shk_alasan[]" value="${v.shk_alasan ?? ""}">
													</div>
												</div>
											</td>
											<td style="border-left:0;text-align:center; border-bottom: solid 1px #aaa;">
												<i class="fas fa-trash-alt delete_kelahiran pointer" onclick="jkn_delivery_delete(this, '${num}', '${v.id}');"></i>
											</td>
										</tr>
                `;

      });

      $tbody.append(rows.join(''));
      changeFunctionKelahiran();

    }
  }

  function changeFunctionKelahiran() {
    let currentDateNow = new Date();

    // Seleksi semua input datetimepicker sekaligus
    $('input[id^="jkn_delivery_dttm_"], input[id^="jkn_input_shk_spesimen_dttm_"]').datetimepicker({
      format: 'YYYY-MM-DD HH:mm:ss',
      pickSecond: false,
      pick12HourFormat: false,
      maxDate: new Date(currentDateNow.getFullYear(), currentDateNow.getMonth() + 2, 0),
      beforeShow: function(i) {
        return !$(i).attr('readonly');
      }
    });
  }

  function jkn_chg_delivery_method(num, value) {
    let vaginalDisplay = value === 'vaginal' ? 'block' : 'none';
    $(`#jkn_vaginal_option_${num}`).css('display', vaginalDisplay);
    $(`#delivery_method_${num}`).val(value);
  }

  function changeLetak(num, value) {
    $(`#letak_janin_${num}`).val(value);
  }

  function changeKondisi(num, value) {
    $(`#kondisi_${num}`).val(value);
  }

  function changeSHKLokasi(num, value) {
    $(`#shk_lokasi_${num}`).val(value);
  }

  function changeSHKAlasan(num, value) {
    $(`#shk_alasan_${num}`).val(value);
  }

  function jkn_shk_onclick(num, value) {
    let shkLokasiDisplay = value === 1 ? 'block' : 'none';
    let shkAlasanDisplay = value === 0 ? 'block' : 'none';

    $(`#jkn_shk_lokasi_sampel_${num}`).css('display', shkLokasiDisplay);
    $(`#jkn_shk_alasan_${num}`).css('display', shkAlasanDisplay);
    $(`#shk_spesimen_ambil_${num}`).val(value === 1 ? 'ya' : 'tidak');
  }

  function jkn_ckb_manual_onclick(num) {
    let value = $(`#jkn_ckb_manual_${num}`).is(':checked') ? 1 : 0;
    $(`#jkn_ckb_manual_input_${num}`).val(value);
  }

  function jkn_ckb_forcep_onclick(num) {
    let value = $(`#jkn_ckb_forcep_${num}`).is(':checked') ? 1 : 0;
    $(`#jkn_ckb_forcep_input_${num}`).val(value);
  }

  function jkn_ckb_vacuum_onclick(num) {
    let value = $(`#jkn_ckb_vacuum_${num}`).is(':checked') ? 1 : 0;
    $(`#jkn_ckb_vacuum_input_${num}`).val(value);
  }

  function jkn_delivery_add() {
    $("#table-kelahiran-eklaim thead").show();

    let $tbody = $('#table-kelahiran-eklaim tbody');
    let num = $tbody.find('tr.jkn_kelahiran').length + 1; // Hitung jumlah data yang sudah ada

    let html = /* html */ `
    
        <tr class="jkn_kelahiran">
          <td style="text-align:center;vertical-align:top; border-right: solid 1px #aaa; border-bottom: solid 1px #aaa;">
            ${num}
            <input type="hidden" name="num_${num}" value="${num}">
          </td>
          <td style="text-align:center;vertical-align:top; border-right: solid 1px #aaa; border-bottom: solid 1px #aaa;">	
            <input type="hidden" name="id_detail_kelahiran[]" value="">
            <input type="hidden" name="num[]" value="${num}">  
            <input type="text" id="jkn_delivery_dttm_${num}" name="delivery_dttm[]" class="custom-form clear-input ml-1 number-input col-lg-8" value="">
          </td>
          <td style="text-align:left;vertical-align:top; border-right: solid 1px #aaa; border-bottom: solid 1px #aaa;">
            <input checked="checked" type="radio" onchange="jkn_chg_delivery_method('${num}', 'vaginal');" id="jkn_ck_pt_vaginal_${num}" value="vaginal" name="delivery_method_${num}">&nbsp;
            <label for="jkn_ck_pt_vaginal_${num}" class="xlnk">Vaginal</label><br>
            <input type="radio" onchange="jkn_chg_delivery_method('${num}', 'sc');" id="jkn_ck_pt_sc_${num}" value="sc" name="delivery_method_${num}">&nbsp;
            <label for="jkn_ck_pt_sc_${num}" class="xlnk">Sectio Caesarean</label><br><br>
            <input type="hidden" id="delivery_method_${num}" name="delivery_method[]" value="vaginal">
            <div id="jkn_vaginal_option_${num}" style="display:block;">
              <input onclick="jkn_ckb_manual_onclick('${num}')" type="checkbox" id="jkn_ckb_manual_${num}">&nbsp;
              <input type="hidden" id="jkn_ckb_manual_input_${num}" name="use_manual[]" value="0">
              <label for="jkn_ckb_manual_${num}" class="xlnk">Manual Aid</label><br>
              <input onclick="jkn_ckb_forcep_onclick('${num}')" type="checkbox" id="jkn_ckb_forcep_${num}">&nbsp;
              <input type="hidden" id="jkn_ckb_forcep_input_${num}" name="use_forcep[]" value="0">
              <label for="jkn_ckb_forcep_${num}" class="xlnk">Forcep</label><br>
              <input onclick="jkn_ckb_vacuum_onclick('${num}')" type="checkbox" id="jkn_ckb_vacuum_${num}">&nbsp;
              <input type="hidden" id="jkn_ckb_vacuum_input_${num}" name="use_vacuum[]" value="0">
              <label for="jkn_ckb_vacuum_${num}" class="xlnk">Vacuum</label>
            </div>
          </td>
          <td style="text-align:left;vertical-align:top; border-right: solid 1px #aaa; border-bottom: solid 1px #aaa;">
            <input checked="checked" type="radio" id="jkn_ck_pt_kepala_${num}" value="kepala" name="letak_janin_${num}">&nbsp;
            <label for="jkn_ck_pt_kepala_${num}" class="xlnk">Kepala</label><br>
            <input type="radio" id="jkn_ck_pt_sungsang_${num}" value="sungsang" name="letak_janin_${num}">&nbsp;
            <label for="jkn_ck_pt_sungsang_${num}" class="xlnk">Sungsang</label><br>
            <input type="radio" id="jkn_ck_pt_lintang_${num}" value="lintang" name="letak_janin_${num}">&nbsp;
            <label for="jkn_ck_pt_lintang_${num}" class="xlnk">Lintang/Oblique</label>
            <input type="hidden" id="letak_janin_${num}" name="letak_janin[]" value="kepala">
          </td>
          <td style="text-align:left;vertical-align:top; border-right: solid 1px #aaa; border-bottom: solid 1px #aaa;">
            <input onchange="changeKondisi('${num}', 'livebirth')" checked="checked" type="radio" id="jkn_ck_pt_livebirth_${num}" value="livebirth" name="kondisi_${num}">&nbsp;
            <label for="jkn_ck_pt_livebirth_${num}" class="xlnk">Hidup</label><br>
            <input onchange="changeKondisi('${num}', 'stillbirth')" type="radio" id="jkn_ck_pt_stillbirth_${num}" value="stillbirth" name="kondisi_${num}">&nbsp;
            <label for="jkn_ck_pt_stillbirth_${num}" class="xlnk">Meninggal</label>
            <input type="hidden" id="kondisi_${num}" name="kondisi[]" value="livebirth">
          </td>
          <td style="vertical-align:top; border-right: solid 1px #aaa; border-bottom: solid 1px #aaa;">
            <div style="min-height:150px;">
              <div>
                <input onchange="jkn_shk_onclick('${num}',1);" type="radio" id="jkn_ck_shk_yes_${num}" value="ya" name="shk_ambil_${num}">&nbsp;
                <label for="jkn_ck_shk_yes_${num}" class="xlnk">Diambil</label><br>
                <input checked="checked" onchange="jkn_shk_onclick('${num}',0);" type="radio" id="jkn_ck_shk_no_${num}" value="tidak" name="shk_ambil_${num}">&nbsp;
                <label for="jkn_ck_shk_no_${num}" class="xlnk">Tidak Diambil</label>
                <input type="hidden" id="shk_spesimen_ambil_${num}" name="shk_spesimen_ambil[]" value="tidak">
              </div>
              <div style="margin-top:1em;display:none;" id="jkn_shk_lokasi_sampel_${num}">
                <div class="discreet">Lokasi pengambilan:</div>
                <input onchange="changeSHKLokasi('${num}','tumit')" type="radio" id="jkn_ck_shk_tumit_${num}" value="tumit" name="shk_lokasi_${num}">&nbsp;
                <label for="jkn_ck_shk_tumit_${num}" class="xlnk">Tumit</label>&nbsp;&nbsp;
                <input onchange="changeSHKLokasi('${num}','vena')" type="radio" id="jkn_ck_shk_vena_${num}" value="vena" name="shk_lokasi_${num}">&nbsp;
                <label for="jkn_ck_shk_vena_${num}" class="xlnk">Vena</label><br>
                <input type="hidden" id="shk_lokasi_${num}" name="shk_lokasi[]" value="">
                <div style="padding-top:1em;">
                  <input type="text" id="jkn_input_shk_spesimen_dttm_${num}" name="shk_spesimen_dttm[]" class="custom-form clear-input ml-1 number-input col-lg-10" value="">
                </div>
              </div>
              <div style="margin-top:1em;display:block;" id="jkn_shk_alasan_${num}">
                <div class="discreet">Alasan tidak diambil:</div>
                <input onchange="changeSHKAlasan('${num}', 'tidak-dapat')" checked="checked" type="radio" id="jkn_ck_shk_alasan_1_${num}" value="tidak-dapat" name="shk_alasan_${num}">&nbsp;
                <label for="jkn_ck_shk_alasan_1_${num}" class="xlnk">Tidak dapat dilakukan</label><br>
                <input onchange="changeSHKAlasan('${num}', 'akses-sulit')" type="radio" id="jkn_ck_shk_alasan_2_${num}" value="akses-sulit" name="shk_alasan_${num}">&nbsp;
                <label for="jkn_ck_shk_alasan_2_${num}" class="xlnk">Akses sulit</label><br>
                <input type="hidden" id="shk_alasan_${num}" name="shk_alasan[]" value="tidak-dapat">
              </div>
            </div>
          </td>
          <td style="border-left:0;text-align:center; border-bottom: solid 1px #aaa;">
            <i class="fas fa-trash-alt delete_kelahiran pointer" onclick="jkn_delivery_delete(this, '${num}', '');"></i>
          </td>
        </tr>
    `;

    // Tambahkan ke tabel
    $tbody.append(html);

    // Inisialisasi datetimepicker untuk input baru
    $(`#jkn_delivery_dttm_${num}, #jkn_input_shk_spesimen_dttm_${num}`).datetimepicker({
      format: 'YYYY-MM-DD HH:mm:ss',
      pickSecond: false,
      pick12HourFormat: false,
      maxDate: new Date(new Date().getFullYear(), new Date().getMonth() + 2, 0)
    });
  }

  // Fungsi untuk menghapus baris data yang belum masuk ke DB
  function jkn_delivery_delete(el, num, id) {
    let $row = $(el).closest('tr');
    let $table = $("#table-kelahiran-eklaim");

    if (id) {
      Swal.fire({
        title: 'Hapus Data Kelahiran!',
        text: "Anda akan menghapus kelahiran ini?",
        icon: 'warning',
        allowOutsideClick: false,
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        cancelButtonText: '<i class="fas fa-times-circle mr-1"></i>Batal',
        confirmButtonText: '<i class="fas fa-trash mr-1"></i>Hapus',
      }).then((result) => {
        if (result.value) {
          $.ajax({
            type: 'POST',
            url: '<?= base_url("eklaim_bpjs/api/Eklaim_bpjs/hapus_detail_kelahiran") ?>',
            data: {
              id: id
            },
            cache: false,
            dataType: 'JSON',
            beforeSend: showLoader,
            success: function(data) {
              if (data.status) {
                // messageCustom(data.message, 'Success');
                $row.remove();
                updateTableState();
              } else {
                messageCustom(data.message, 'Error');
              }
            },
            complete: hideLoader,
            error: function() {
              messageCustom('Terjadi Kesalahan, Silakan Hubungi Bagian IT', 'Error');
            }
          });
        }
      });
    } else {
      $row.remove();
      updateTableState();
    }
  }

  function updateTableState() {
    renumberTable(); // Perbarui nomor urut
    let $thead = $("#table-kelahiran-eklaim thead");
    $thead.toggle($("#table-kelahiran-eklaim tbody tr").length > 0); // Sembunyikan header jika tbody kosong
  }

  // Fungsi untuk memperbaiki nomor urut setelah penghapusan
  function renumberTable() {
    $('#table-kelahiran-eklaim tbody tr.jkn_kelahiran').each(function(index) {
      let num = index + 1;
      $(this).find('td:first').html(`
            ${num}
            <input type="hidden" name="num_${num}" value="${num}">
        `);
      $(this).find('[id]').each(function() {
        let oldId = $(this).attr('id');
        if (oldId) {
          let newId = oldId.replace(/\d+$/, num);
          $(this).attr('id', newId);
        }
      });
      $(this).find('[name]').each(function() {
        let oldName = $(this).attr('name');
        if (oldName) {
          let newName = oldName.replace(/\d+$/, num);
          $(this).attr('name', newName);
        }
      });
    });
  }

  function changeSpecialCMG(item_special) {
    if (item_special == 'YY') {
      code = $('#special-procedure').val()
    }
    if (item_special == 'RR') {
      code = $('#special-prosthesis').val()
    }
    if (item_special == 'ZZ') {
      code = $('#special-investigation').val()
    }
    if (item_special == 'DD') {
      code = $('#special-drug').val()
    }

    $.ajax({
      type: 'POST',
      url: '<?= base_url("eklaim_bpjs/api/Eklaim_bpjs/grouping_stage_2") ?>',
      data: {
        id_pendaftaran: $('#id-pendaftaran-gpr').val(),
        no_sep: $('#gpr-no-sep').val(),
        special_cmg: code,
        item_special: item_special
      },
      cache: false,
      dataType: 'JSON',
      beforeSend: function() {
        showLoader();
      },
      success: function(data) {
        if (data.status) {
          if (item_special == 'YY') {
            $('#code_special_procedure').empty()
            $('#tarif_special_procedure').empty()
            $('#code_special_procedure').append(data.code)
            $('#tarif_special_procedure').append(money_format(data.base_tariff))
          }
          if (item_special == 'RR') {
            $('#code_special_prosthesis').empty()
            $('#tarif_special_prosthesis').empty()
            $('#code_special_prosthesis').append(data.code)
            $('#tarif_special_prosthesis').append(money_format(data.base_tariff))
          }
          if (item_special == 'ZZ') {
            $('#code_special_investigation').empty()
            $('#tarif_special_investigation').empty()
            $('#code_special_investigation').append(data.code)
            $('#tarif_special_investigation').append(money_format(data.base_tariff))
          }
          if (item_special == 'DD') {
            $('#code_special_drug').empty()
            $('#tarif_special_drug').empty()
            $('#code_special_drug').append(data.code)
            $('#tarif_special_drug').append(money_format(data.base_tariff))
          }
          $('#total-hasil-grouper').empty()
          $('#total-hasil-grouper').append(money_format(data.tariff))

          // messageCustom(data.message, 'Success');
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

  function showGrouperResult(data, jenis_rawat) {
    let grouper = data.status_grouper;
    let eclaim = data.eclaim;
    let pasien = data.pendaftaran;
    let status_eklaim = data.status_eklaim;

    let jenis_rawat_gpr = "";
    if (grouper.kelas == 'kelas_1') {
      jenis_rawat_gpr = 'Rawat ' + jenis_rawat + ' Kelas 1 (' + status_eklaim.selisih_hari + ' Hari)';
    } else if (grouper.kelas == 'kelas_2') {
      jenis_rawat_gpr = 'Rawat ' + jenis_rawat + ' Kelas 2 (' + status_eklaim.selisih_hari + ' Hari)';
    } else {
      jenis_rawat_gpr = 'Rawat ' + jenis_rawat + ' Kelas 3 (' + status_eklaim.selisih_hari + ' Hari)';
    }

    $('#code_special_procedure').empty()
    $('#tarif_special_procedure').empty()
    if (grouper.response_inagrouper !== null) {

      mdc_grouper = `<td>${grouper?.response_inagrouper?.mdc_description}</td>
                     <td>${grouper?.response_inagrouper?.mdc_number}</td>`;

      drg_grouper = `<td>${grouper?.response_inagrouper?.drg_description}</td>
                     <td>${grouper?.response_inagrouper?.drg_code}</td>`;

      if (grouper.response_inagrouper.mdc_number == "36") {
        mdc_grouper = `<td style="color:red;">${grouper?.response_inagrouper?.mdc_description}</td>
                       <td>${grouper?.response_inagrouper?.mdc_number}</td>`;
        drg_grouper = `<td style="color:red;">${grouper?.response_inagrouper?.drg_description}</td>
                       <td>${grouper?.response_inagrouper?.drg_code}</td>`;
      }
    } else {
      mdc_grouper = `<td style="color:red;">Ungroupable or Unrelated</td>
                     <td>36</td>`;
      drg_grouper = `<td style="color:red;">No diagnosis code can be used for MDC determination</td>
										 <td>3611489</td>`;
    }

    let specialCmgOptions = grouper.special_cmg_option;

    let option_procedure = ``;
    let option_prosthesis = ``;
    let option_investigation = ``;
    let option_drug = ``;

    if (Array.isArray(specialCmgOptions) && specialCmgOptions.length > 0) {
      let filteredProcedure = specialCmgOptions.filter(item => item.code.startsWith("YY"));
      if (filteredProcedure.length > 0) {
        option_procedure += `<select onchange="changeSpecialCMG('YY')" name="gpr_special_procedure" class="form-control-sm col-lg-5" id="special-procedure">
                                <option value="">None</option>`;
        filteredProcedure.forEach(item => {
          option_procedure += `<option value="${item.code}">${item.description}</option>`;
        });
        option_procedure += `</select>`;
      } else {
        option_procedure = `<select disabled name="gpr_special_procedure" class="form-control-sm col-lg-5" id="special-procedure">
                                <option value="">None</option>
                             </select>`;
      }

      let filteredProsthesis = specialCmgOptions.filter(item => item.code.startsWith("RR"));
      if (filteredProsthesis.length > 0) {
        option_prosthesis += `<select onchange="changeSpecialCMG('RR')" name="gpr_special_prosthesis" class="form-control-sm col-lg-5" id="special-prosthesis">
                                <option value="">None</option>`;
        filteredProsthesis.forEach(item => {
          option_prosthesis += `<option value="${item.code}">${item.description}</option>`;
        });
        option_prosthesis += `</select>`;
      } else {
        option_prosthesis = `<select disabled name="gpr_special_prosthesis" class="form-control-sm col-lg-5" id="special-prosthesis">
                                <option value="">None</option>
                              </select>`;
      }

      let filteredInvestigation = specialCmgOptions.filter(item => item.code.startsWith("ZZ"));
      if (filteredInvestigation.length > 0) {
        option_investigation += `<select onchange="changeSpecialCMG('ZZ')" name="gpr_special_investigation" class="form-control-sm col-lg-5" id="special-investigation">
                                    <option value="">None</option>`;
        filteredInvestigation.forEach(item => {
          option_investigation += `<option value="${item.code}">${item.description}</option>`;
        });
        option_investigation += `</select>`;
      } else {
        option_investigation = `<select disabled name="gpr_special_investigation" class="form-control-sm col-lg-5" id="special-investigation">
                                    <option value="">None</option>
                                 </select>`;
      }

      let filteredDrug = specialCmgOptions.filter(item => item.code.startsWith("DD"));
      if (filteredDrug.length > 0) {
        option_drug += `<select onclick="changeSpecialCMG('DD')" name="gpr_special_drug" class="form-control-sm col-lg-5" id="special-drug">
                          <option value="">None</option>`;
        filteredDrug.forEach(item => {
          option_drug += `<option value="${item.code}">${item.description}</option>`;
        });
        option_drug += `</select>`;
      } else {
        option_drug = `<select disabled name="gpr_special_drug" class="form-control-sm col-lg-5" id="special-drug">
                          <option value="">None</option>
                        </select>`;
      }
    }

    $('#grouper_result').append(
      `<div class="grouper_result" style="border:1px solid #bbb;border-radius:0.5em;padding:0.5em;">
        <table width=100%>
          <colgroup>
            <col width="190">
            <col>
            <col width="70">
            <col width="127">
          </colgroup>
          <tbody>
            <tr>
              <td colspan="4" style="text-align:center; background-color:#cccccc;" class="hdr_grouper_result"><b>Hasil Grouper E-Klaim v5</b></td>
            </tr>
            <tr>
              <td class="right" style="border-right: 1px solid #aaa;">Info</td>
              <td colspan="3" class="left">${uppercaseWords(grouper.coder_name)} @ ${grouper.created_at} •• Kelas C •• Tarif : TARIF RS KELAS C PEMERINTAH</td>
            </tr>
            <tr>
              <td class="right" style="border-right: 1px solid #aaa;">Jenis Rawat</td>
              <td class="left">${jenis_rawat_gpr}</td>
              <td class="left">&nbsp;</td>
              <td class="right">&nbsp;</td>
            </tr>
            <tr>
              <td class="right" style="border-right: 1px solid #aaa;">Group</td>
              <td class="left">
                <table class="invisible_debug" style="width:100%;">
                  <colgroup>
                    <col>
                    <col width="100">
                  </colgroup>
                  <tbody>
                    <tr>
                      <td>${grouper?.cbg?.description || '-'}</td>
                      <td>${grouper?.cbg?.code || '-'}</td>
                    </tr>
                  </tbody>
                </table>
              </td>
              <td class="right">&nbsp;Rp</td>
              <td class="right">${money_format(grouper?.cbg?.base_tariff || 0)}</td>
            </tr>
            <tr>
              <td class="right" style="border-right: 1px solid #aaa;">Sub Acute</td>
              <td class="left">
                <table class="invisible_debug" style="width:100%;">
                  <colgroup>
                    <col>
                    <col width="100">
                  </colgroup>
                  <tbody>
                    <tr>
                      <td>${grouper?.sub_acute?.description || '-'}</td>
                      <td>${grouper?.sub_acute?.code || '-'}</td>
                    </tr>
                  </tbody>
                </table>
              </td>
              <td class="right">&nbsp;Rp</td>
              <td class="right">${money_format(grouper?.sub_acute?.tariff || 0)}</td>
            </tr>
            <tr>
              <td class="right" style="border-right: 1px solid #aaa;">Chronic</td>
              <td class="left">
                <table class="invisible_debug" style="width:100%;">
                  <colgroup>
                    <col>
                    <col width="100">
                  </colgroup>
                  <tbody>
                    <tr>
                      <td>${grouper?.chronic?.description || '-'}</td>
                      <td>${grouper?.chronic?.code || '-'}</td>
                    </tr>
                  </tbody>
                </table>
              </td>
              <td class="right">&nbsp;Rp</td>
              <td class="right">${money_format(grouper?.chronic?.tariff || 0)}</td>
            </tr>
            <tr>
              <td class="right" style="border-right: 1px solid #aaa;">Special Procedure</td>
              <td class="left" style="padding: 0px 10px;">
                <table table class="invisible_debug" style="width:100%;">
                  <colgroup>
                    <col>
                    <col width="100">
                  </colgroup>
                  <tbody>
                    <tr>
                      <td>${option_procedure}</td>
                      <td><span id="code_special_procedure">${grouper?.special_procedure?.code || '-'}</span></td>
                    </tr>
                  </tbody>
                </table>
              </td>
              <td class="right">&nbsp;Rp</td>
              <td class="right"><span id="tarif_special_procedure">${money_format(grouper?.special_procedure?.base_tariff || 0)}</span></td>
            </tr>
            <tr>
              <td class="right" style="border-right: 1px solid #aaa;">Special Prosthesis</td>
              <td class="left" style="padding: 0px 10px;">
                <table class="invisible_debug" style="width:100%;">
                  <colgroup>
                    <col>
                    <col width="100">
                  </colgroup>
                  <tbody>
                    <tr>
                      <td>${option_prosthesis}</td>
                      <td><span id="code_special_prosthesis">${grouper?.special_prosthesis?.code || '-'}</span></td>
                    </tr>
                  </tbody>
                </table>
              </td>
              <td class="right">&nbsp;Rp</td>
              <td class="right"><span id="tarif_special_prosthesis">${money_format(grouper?.special_prosthesis?.base_tariff || 0)}</span></td>
            </tr>
            <tr>
              <td class="right" style="border-right: 1px solid #aaa;">Special Investigation</td>
              <td class="left" style="padding: 0px 10px;">
                <table class="invisible_debug" style="width:100%;">
                  <colgroup>
                    <col>
                    <col width="100">
                  </colgroup>
                  <tbody>
                    <tr>
                      <td>${option_investigation}</td>
                      <td><span id="code_special_investigation">${grouper?.special_investigation?.code || '-'}</span></td>
                    </tr>
                  </tbody>
                </table>
              </td>
              <td class="right">&nbsp;Rp</td>
              <td class="right"><span id="tarif_special_investigation">${money_format(grouper?.special_investigation?.base_tariff || 0)}</span></td>
            </tr>
            <tr>
              <td class="right" style="border-right: 1px solid #aaa;">Special Drug</td>
              <td class="left" style="padding: 0px 10px;">
                <table class="invisible_debug" style="width:100%;">
                  <colgroup>
                    <col>
                    <col width="100">
                  </colgroup>
                  <tbody>
                    <tr>
                      <td>${option_drug}</td>
                      <td><span id="code_special_drug">${grouper?.special_drug?.code || '-'}</span></td>
                    </tr>
                  </tbody>
                </table>
              </td>
              <td class="right">&nbsp;Rp</td>
              <td class="right"><span id="tarif_special_drug">${money_format(grouper?.special_drug?.base_tariff || 0)}</span></td>
            </tr>
            <tr id="tr_dializer_use"></tr>
            <tr id="tr_kantong_darah"></tr>
            <tr>
              <td style="border-bottom: 0px; text-align:left;">[ <span class="xlnk pointer" onclick="$('#trdebug').fadeToggle();">debug</span> ]</td>
              <td style="border-bottom: 0px;font-weight:bold;text-align:right;" colspan="2">Total Rp</td>
              <td style="border-bottom: 0px;font-weight:bold;text-align:right;"><span id="total-hasil-grouper" >${money_format(grouper?.cbg_tarif || 0)}</span></td>
            </tr>
            <tr id="trdebug" style="display:none;">
              <td colspan="4" style="border-top:0;text-align:left;color:#eee;font-family:Courier New;">
                <div style="background-color:#000;border-radius:0.5em;padding:1em;">
                  <table class="invisible_debug" align="center">
                    <tbody>
                      <tr>
                        <td style="text-align:left;">input&nbsp;</td>
                        <td>: ${status_eklaim.jenis_rawat} ${status_eklaim.tgl_masuk.split(" ")[0]} ${status_eklaim.tgl_pulang.split(" ")[0]} ${status_eklaim.tgl_lahir.split(" ")[0]} 0 ${status_eklaim.gender} 1 ${status_eklaim.diagnosa.includes("#") ?  status_eklaim.diagnosa.replaceAll("#", ";") :  status_eklaim.diagnosa} ${status_eklaim.procedure.includes("#") ?  status_eklaim.procedure.replaceAll("#", ";") :  status_eklaim.procedure} - - None None None None</td>
                      </tr>
                      <tr>
                        <td style="text-align:left;">response&nbsp;</td>
                        <td>: ${grouper?.cbg_code || '-'};None;None;None;None;None;None</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="grouper_result" style="margin-top:1em;border:1px solid #bbb;border-radius:0.5em;padding:0.5em;">
        <table class="xxfrm" style="width:100%;">
          <colgroup>
            <col width="170">
            <col>
            <col width="70">
            <col width="127">
          </colgroup>
          <tbody>
            <tr>
              <td colspan="4" style="text-align:center; background-color:#cccccc;" class="hdr_grouper_result"><b>Hasil Grouper E-Klaim v6</b></td>
            </tr>
            <tr>
              <td class="right" style="border-right: 1px solid #aaa;">Info</td>
              <td colspan="3" class="left">${uppercaseWords(grouper.coder_name)} @ ${grouper.created_at} - 1.0.17 / 0.2.1151.202501071647</td>
            </tr>
            <tr>
              <td class="right" style="border-right: 1px solid #aaa;">Jenis Rawat</td>
              <td class="left">${jenis_rawat_gpr}</td>
              <td class="right">&nbsp;</td>
              <td class="right">&nbsp;</td>
            </tr>
            <tr>
              <td class="right" style="border-right: 1px solid #aaa;">MDC</td>
              <td class="left">
                <table class="invisible_debug zero-padding" style="width:100%;">
                  <colgroup>
                    <col>
                    <col width="100">
                  </colgroup>
                  <tbody>
                    <tr>
                      ${mdc_grouper}
                    </tr>
                  </tbody>
                </table>
              </td>
              <td class="right">&nbsp;</td>
              <td class="right">&nbsp;</td>
            </tr>
            <tr>
              <td class="right" style="border-right: 1px solid #aaa;">DRG</td>
              <td class="left">
                <table class="invisible_debug zero-padding" style="width:100%;">
                  <colgroup>
                    <col>
                    <col width="100">
                  </colgroup>
                  <tbody>
                    <tr>
                      ${drg_grouper}
                    </tr>
                  </tbody>
                </table>
              </td>
              <td class="right">&nbsp;</td>
              <td class="right">&nbsp;</td>
            </tr>
            <tr>
              <td style="border-bottom: 0px; text-align:left;">[ <span class="xlnk pointer" onclick="$(' #trdebug_inagrouper').fadeToggle();">debug</span> ]</td>
              <td style="border-bottom: 0px;">&nbsp;</td>
              <td style="border-bottom: 0px;">&nbsp;</td>
              <td style="border-bottom: 0px;text-align:right;">&nbsp;</td>
            </tr>
            <tr id="trdebug_inagrouper" style="display:none;">
              <td colspan="4" style="border-top:0;text-align:left;color:#eee;font-family:Courier New;">
                <div style="background-color:#000;border-radius:0.5em;padding:1em;white-space:pre;">
                  <p>INA Grouper version: 1.0.17 / 0.2.1151.202501071647

                    I. Initial Data Checking:
                    =========================
                    1. Patient Type : ${status_eklaim.jenis_rawat == '1' ? '1 (Inpatient)' : '2 (Outpatient)'} is valid. &gt;&gt; Ok
                    2. Gender : ${status_eklaim.gender == '1' ? 'M (Male)' : 'F (Female)'} is valid. &gt;&gt; Ok
                    3. Age ${getJustAge(pasien.tanggal_lahir)} years is valid. &gt;&gt; Ok
                    4. Length of stay ${status_eklaim.selisih_hari} days is valid for ${status_eklaim.jenis_rawat == '1' ? 'inpatient' : 'outpatient'}. &gt;&gt; Ok
                    5. Diagnosis :
                        ${status_eklaim.diagnosa}
                    6. Procedures :
                        ${status_eklaim.procedure}
                    
                    II. Dagger - Asterisk Substitution:
                    ===================================
                    No dagger - asterisk pair.
                    ** Initial Data Checking is finished in failed state.
                    ** Stopped.
                  </p>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>`
    )


    let kantongDarahCodes = ["99.04", "99.03"];
    let procArray = status_eklaim.procedure.split("#");
    let adaKantongDarah = kantongDarahCodes.some(code => procArray.includes(code));

    if ($("#is-hd-gpr").val() == '1' || adaKantongDarah) {
      let label_dializer_percetase = `100%`;
      let label_dializer_tarif = `${money_format(841900)}`;

      if ($("#is-hd-gpr").val() == '1') {
        $('#tr_dializer_use').append(`
            <td class="right" style="border-right: 1px solid #aaa;">Penggunaan Dializer</td>
            <td class="left">
              <table class="invisible_debug" style="width:100%;">
                <colgroup>
                  <col>
                  <col width="100">
                </colgroup>
                <tbody>
                  <tr>
                    <td>
                      <div class="d-flex align-items-center">
                        <input type="radio" onchange="chg_hd_single_use(0);" name="dializer_single_use_change" value="0" id="dializer_singe_use_false">&nbsp;
                        <label class="xlnk mr-3" for="dializer_singe_use_false">Multiple Use (reuse)</label>&nbsp;&nbsp;
                        <input type="radio" onchange="chg_hd_single_use(1);" name="dializer_single_use_change" checked="checked" value="1" id="dializer_singe_use_true">&nbsp;
                        <label class="xlnk" for="dializer_singe_use_true">Single Use</label>
                      </div>
                      <input type="hidden" name="dializer_single_use" id="dializer_single_use">
                    </td>
                    <td><span id="dializer_percetase">${label_dializer_percetase}</span></td>
                  </tr>
                </tbody>
              </table>
            </td>
            <td class="right">&nbsp;Rp</td>
            <td class="right"><span id="dializer_tarif">${label_dializer_tarif}</span></td>
        `);
      }

      $('#tr_kantong_darah').append(`
          <td class="right" style="border-right: 1px solid #aaa;">Transfusi Darah</td>
          <td class="left" style="padding: 0px 10px;">
            <table class="invisible_debug" style="width:100%;">
              <colgroup>
                <col>
                <col width="100">
              </colgroup>
              <tbody>
                <tr>
                  <td>
                    <div class="row col-md d-flex align-items-center">
                      <span class="mr-1">Jumlah kantong darah:</span>
                      <input class="form-control-sm mr-1" type="text" style="width:50px;text-align:center;" name="kantong_darah" id="kantong_darah" value="0">
                      <span>kantong</span>
                    </div>
                  </td>
                  <td><span id="kd_kantong_darah">-</span></td>
                </tr>
              </tbody>
            </table>
          </td>
          <td colspan="2" class="right"></td>
      `);

      $('#kantong_darah').val(status_eklaim.kantong_darah ?? 0);


      $('#kantong_darah').on('keyup', function() {
        $.ajax({
          type: 'POST',
          url: '<?= base_url("eklaim_bpjs/api/Eklaim_bpjs/set_kantong_darah") ?>',
          data: $('#form-gpr-eklaim').serialize(),
          cache: false,
          dataType: 'JSON',
          beforeSend: function() {
            showLoader();
          },
          success: function(data) {
            if (data.status) {
              // setClaimData($('#id-pendaftaran-gpr').val(), $('#jenis-rawat-gpr').val())
              searchingByName($('#id-pasien-gpr').val());
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
      });
    }

    $('#special-procedure').val(grouper?.gpr_special_procedure || '');
    $('#special-prosthesis').val(grouper?.gpr_special_prosthesis || '');
    $('#special-investigation').val(grouper?.gpr_special_investigation || '');
    $('#special-drug').val(grouper?.gpr_special_drug || '');
  }

  function validate_jkn_sitb_noreg() {
    let idPendaftaran = $('#id-pendaftaran-gpr').val();
    let nomor_sep = $('#gpr-no-sep').val();
    let nomor_register_sitb = $('#jkn_sitb_noreg').val();

    $.ajax({
      type: 'POST',
      url: '<?= base_url("eklaim_bpjs/api/Eklaim_bpjs/sitb_validate") ?>',
      data: {
        id_pendaftaran: idPendaftaran,
        no_sep: nomor_sep,
        no_reg_sitb: nomor_register_sitb,
        val_validasi: null
      },
      cache: false,
      dataType: 'JSON',
      beforeSend: function() {
        showLoader();
      },
      success: function(data) {
        if (data.status) {
          $('#modal-konfirmasi-validasi-sitb').modal('show');

          $('#nama-val-sitb').empty().append(data.data[0].nama);
          $('#nik-val-sitb').empty().append(data.data[0].nik);

          // let jenisJKelamin = data.data[0].jenis_kelamin_id;
          let jenisJKelamin = 1;
          $('#jk-val-sitb').empty().append(jenisJKelamin == '2' ? 'Perempuan' : 'Laki-laki');
          // messageCustom(data.message, 'Success');
        } else {
          $('#validasi-sitb-status').empty().append(`
              <button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="validate_jkn_sitb_noreg()">Validasi</button>
              <div id="jkn_sitb_noreg_result" style="color: red;" class="bold ml-2">${data.message}</div>
            `);

          // $('#modal-konfirmasi-validasi-sitb').modal('hide');
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

  function invalidate_jkn_sitb_noreg() {
    let idPendaftaran = $('#id-pendaftaran-gpr').val();
    let nomor_sep = $('#gpr-no-sep').val();
    let nomor_register_sitb = $('#jkn_sitb_noreg').val();

    $.ajax({
      type: 'POST',
      url: '<?= base_url("eklaim_bpjs/api/Eklaim_bpjs/sitb_invalidate") ?>',
      data: {
        id_pendaftaran: idPendaftaran,
        no_sep: nomor_sep,
        no_reg_sitb: nomor_register_sitb,
        val_validasi: null
      },
      cache: false,
      dataType: 'JSON',
      beforeSend: function() {
        showLoader();
      },
      success: function(data) {
        if (data.status) {
          $('#validasi-sitb-status').empty().append(`
            <button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="validate_jkn_sitb_noreg()">Validasi</button>
            <div id="jkn_sitb_noreg_result" style="color: red;" class="bold ml-2"></div>
          `);

          $('#gpr_is_pasien_tb').prop('disabled', false);
          $('#gpr_is_pasien_tb').val(0);
          $('#hdn_is_pasien_tb').val(0);
          $('#jkn_sitb_noreg').prop('disabled', false);
          $('#hdn_sitb_noreg').val('');

          $('#modal-konfirmasi-validasi-sitb').modal('hide');
        } else {
          // $('#validasi-sitb-status').empty().append(`
          //   <button type="button" class="btn waves-effect waves-light btn-danger btn-xs" onclick="invalidate_jkn_sitb_noreg()">Ubah</button>
          //   <div id="jkn_sitb_noreg_result" style="color: green;" class="bold ml-2">${data.message}</div>
          // `);
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

  function konfirmValidasiYa() {
    let idPendaftaran = $('#id-pendaftaran-gpr').val();
    let nomor_sep = $('#gpr-no-sep').val();
    let nomor_register_sitb = $('#jkn_sitb_noreg').val();

    $.ajax({
      type: 'POST',
      url: '<?= base_url("eklaim_bpjs/api/Eklaim_bpjs/sitb_validate") ?>',
      data: {
        id_pendaftaran: idPendaftaran,
        no_sep: nomor_sep,
        no_reg_sitb: nomor_register_sitb,
        val_validasi: 1
      },
      cache: false,
      dataType: 'JSON',
      beforeSend: function() {
        showLoader();
      },
      success: function(data) {
        if (data.status) {
          $('#validasi-sitb-status').empty().append(`
            <button type="button" class="btn waves-effect waves-light btn-danger btn-xs" onclick="invalidate_jkn_sitb_noreg()">Ubah</button>
            <div id="jkn_sitb_noreg_result" style="color: green;" class="bold ml-2">Nomor register valid</div>
          `);

          $('#gpr_is_pasien_tb').prop('disabled', true);
          $('#gpr_is_pasien_tb').val('1');
          $('#hdn_is_pasien_tb').val('1');
          $('#jkn_sitb_noreg').prop('disabled', true);
          $('#hdn_sitb_noreg').val($('#jkn_sitb_noreg').val());

          $('#modal-konfirmasi-validasi-sitb').modal('hide');
        } else {
          $('#validasi-sitb-status').empty().append(`
              <button type="button" class="btn waves-effect waves-light btn-secondary btn-xs" onclick="validate_jkn_sitb_noreg()">Validasi</button>
              <div id="jkn_sitb_noreg_result" style="color: red;" class="bold ml-2">${data.message}</div>
            `);
          // messageCustom(data.message, 'Error');
          $('#modal-konfirmasi-validasi-sitb').modal('hide');
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

  function showDokumen(id_pendaftaran, id_layanan, id_radiologi, id_laboratorium, jenis_laboratorium, jenis_layanan) {
    window.open(`<?= base_url('folder_pasien/preview_dokumen/') ?>${id_pendaftaran}/${id_layanan}/${id_radiologi}/${id_laboratorium}/${jenis_laboratorium}/${jenis_layanan}`, 'Cetak Resume Medis', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
  }
</script>