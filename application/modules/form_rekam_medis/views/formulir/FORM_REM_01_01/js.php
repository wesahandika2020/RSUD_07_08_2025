<script type="text/javascript">
  function lihatFORM_REM_01_01(data) {
    let pasien = data.pasien;
    let layanan = data.layanan;
    let action = 'lihat';

    let bed;

    if (layanan.bangsal_ic && layanan.no_bed_ic) {
      bed = `${layanan.bangsal_ic} No. Bed ${layanan.no_bed_ic}`;
    } else if (layanan.bangsal && layanan.kelas && layanan.no_ruang && layanan.no_bed) {
      bed = `${layanan.bangsal} kelas ${layanan.kelas} ruang ${layanan.no_ruang} No. Bed ${layanan.no_bed}`;
    } else {
      bed = `${layanan.jenis_layanan}`;
    }
    let details = 0 + '#' + layanan.id_pendaftaran + '#' + layanan.id + '#' + 0 + '#' + bed;

    cetakResumeMedis(layanan.id_pendaftaran, layanan.id, details, action)
  }

  function editFORM_REM_01_01(data) {
    let pasien = data.pasien;
    let layanan = data.layanan;
    let action = 'edit';

    let bed;

    if (layanan.bangsal_ic && layanan.no_bed_ic) {
      bed = `${layanan.bangsal_ic} No. Bed ${layanan.no_bed_ic}`;
    } else if (layanan.bangsal && layanan.kelas && layanan.no_ruang && layanan.no_bed) {
      bed = `${layanan.bangsal} kelas ${layanan.kelas} ruang ${layanan.no_ruang} No. Bed ${layanan.no_bed}`;
    } else {
      bed = `${layanan.jenis_layanan}`;
    }
    let details = 0 + '#' + layanan.id_pendaftaran + '#' + layanan.id + '#' + 0 + '#' + bed;

    cetakResumeMedis(layanan.id_pendaftaran, layanan.id, details, action)
  }

  function tambahFORM_REM_01_01(data) {
    let pasien = data.pasien;
    let layanan = data.layanan;
    let action = 'tambah';

    let bed;

    if (layanan.bangsal_ic && layanan.no_bed_ic) {
      bed = `${layanan.bangsal_ic} No. Bed ${layanan.no_bed_ic}`;
    } else if (layanan.bangsal && layanan.kelas && layanan.no_ruang && layanan.no_bed) {
      bed = `${layanan.bangsal} kelas ${layanan.kelas} ruang ${layanan.no_ruang} No. Bed ${layanan.no_bed}`;
    } else {
      bed = `${layanan.jenis_layanan}`;
    }
    let details = 0 + '#' + layanan.id_pendaftaran + '#' + layanan.id + '#' + 0 + '#' + bed;

    cetakResumeMedis(layanan.id_pendaftaran, layanan.id, details, action)
  }

  function cetakResumeMedis(id, id_layanan_pendaftaran, details, action) {
    // $('#btn_simpan').html('<button type="button" class="btn btn-info" onclick="simpanResumeMedisRanap()"><i class="fas fa-fw fa-save mr-1"></i>Simpan</button>');
    // $('#btn_simpan').hide();
    $('#btn___simpan').hide();

    $('#button-cppt').hide();
    $('#button-rad').hide();
    $('#button-lab').hide();

    $('#action').val(action);
    var groupAccount = '<?= $this->session->userdata('account_group') ?>';
    var profesi = '<?= $this->session->userdata('profesinadis') ?>';
    if (groupAccount == 'Admin') {
      profesi = 'Perawat';
    }

    if (action !== 'lihat') {
      // $('#btn_simpan').show();
      $('#btn___simpan').show();
    } else {
      // $('#btn_simpan').hide();
      $('#btn___simpan').hide();
    }

    $('#button-cppt').click(function() {
      printCPPT(id, id_layanan_pendaftaran, 1);
    });

    $('#button-rad').click(function() {
      viewHasilRadiologi(id, id_layanan_pendaftaran, 1);
    });

    $('#button-lab').click(function() {
      viewHasilLaboratorium(id, id_layanan_pendaftaran, 1);
    });

    $.ajax({
      type: 'GET',
      url: '<?= base_url('rawat_inap/api/rawat_inap/resume_medis') ?>/id/' + id + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
      cache: false,
      dataType: 'JSON',
      beforeSend: function() {
        showLoader();
      },
      success: function(data) {
        $('#identitas-pasien-diagnosa-resume').empty()

        let detail = details.split('#');
        let buttonEditDiagnosa = `
          <button type="button" class="btn btn-secondary btn-xs mr-1 nowrap" title="Klik untuk edit Diagnosa" onclick="KonfirmDetailPemeriksaanResume('0', '${detail[1]}', '${detail[2]}', '${detail[3]}', '${detail[4]}')">
            <i class="fas fa-edit mr-1"></i>Edit Diagnosa
          </button>
        `;
        $('#button-edit-diagnosa').append(buttonEditDiagnosa);
        $('#identitas-pasien-diagnosa-resume').html(data.resume_medis.id_pasien + ' / ' + data.resume_medis.nama_pasien + ' / ' + data.resume_medis.umur);

        // Show Diagnosa Manual
        $('.golongan-sebab-sakit-lain-resume').hide();
        $('#diagnosa-manual-resume').change(function() {
          $('#diagnosa-manual-resume').each(function() {
            let val = this.type == "checkbox" ? +this.checked : this.value;
            $('#diagnosa-manual-resume').val(val);
          });

          if ($('#diagnosa-manual-resume').val() > 0) {
            $('.golongan-sebab-sakit-lain-resume').show();
            $('.golongan-sebab-sakit-resume').hide();
          } else {
            $('.golongan-sebab-sakit-lain-resume').hide();
            $('.golongan-sebab-sakit-lain-resume').val('');
            $('.golongan-sebab-sakit-resume').show();
          }
        });

        if (data.resume_medis.id_cppt !== null) {
          $('#button-cppt').show();
        }

        if (data.resume_medis.id_radiologi !== null) {
          $('#button-rad').show();
        }

        if (data.resume_medis.id_laboratorium !== null) {
          $('#button-lab').show();
        }

        // $('#btn_simpan').html('<button type="button" class="btn btn-info" id="btn-simpan" onclick="simpanResumeMedisRanap()"><i class="fas fa-pencil-alt mr-1"></i>Update</button>');

        // console.log(data.resume_medis.id_rmr)
        if (data.resume_medis.id_rmr !== null) {
          $('#btn_xetak').show();
          $('#btn___simpan').html('<i class="fas fa-pencil-alt mr-1"></i>Update');
        } else {
          $('#btn_xetak').hide();
          $('#btn___simpan').html('<i class="fas fa-fw fa-save mr-1"></i>Simpan');
        }

        $('#table-kontrol-resume tbody').empty();
        $('#table-terapi-rm tbody').empty();

        // Set values in Resume Medis Modal
        $('#modal-resume-medis-title').html(
          `<b>Form Resume Medis</b> | No. RM: ${data.pendaftaran_detail.pasien.no_rm}, Nama: ${data.pendaftaran_detail.pasien.nama}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${data.pendaftaran_detail.pasien.telp}</b></i>`
        );
        $('#id-layanan-pendaftaran-resume').val(id_layanan_pendaftaran);

        $('#rm_id_layanan_pendaftaran').val(id_layanan_pendaftaran);
        $('#rm-id-pendaftaran').val(id);
        $('#ek_id_pasien').val(data.pendaftaran_detail.pasien.no_rm);

        $('#btn_close, #btn_keluar').click(function() {
          showListForm(id, id_layanan_pendaftaran, data.pendaftaran_detail.pasien.id_pasien);
        });

        if (data.pendaftaran_detail.pasien !== null) {
          $('#resume_id_pasien').val(data.pendaftaran_detail.pasien.id_pasien);
          $('#resume_pasien_nama').text(data.pendaftaran_detail.pasien.nama);
          $('#resume_pasien_no_rm').text(data.pendaftaran_detail.pasien.no_rm);
          $('#resume_pasien_tanggal_lahir').text((data.pendaftaran_detail.pasien.tanggal_lahir !==
            null ? datefmysql(data.pendaftaran_detail.pasien.tanggal_lahir) : '-') + (' (' +
            hitungUmur(data.pendaftaran_detail.pasien.tanggal_lahir) + ')'));
          $('#resume_pasien_jenis_kelamin').text((data.pendaftaran_detail.pasien.kelamin === 'L' ?
            'Laki - laki' : 'Perempuan'));
        }

        $('#resume_bed').text(data.resume_medis.ruangan + ' Kelas ' + data.resume_medis.kelas +
          ' Ruang ' + data.resume_medis.no_ruang + ' No.Bed ' + data.resume_medis.no_bed);
        $('#tanggal-masuk-rm').val(datetimefmysql(data.resume_medis.tgl_masuk));
        $('#tanggal-keluar-rm').val(datetimefmysql(data.resume_medis.tgl_keluar));
        $('#tanggal-keluar-rm').val(datetimefmysql(data.resume_medis.tgl_keluar));
        $('#ruang-rawat-terakhir-rm').val(data.resume_medis.ruangan);
        $('#pemeriksaan-fisik').val((data.resume_medis.pemeriksaan_fisik === null ? "" : data
          .resume_medis.pemeriksaan_fisik));
        $('#penunjang-diagnostik').val((data.resume_medis.penunjang_diagnostik === null ? "" : data
          .resume_medis.penunjang_diagnostik));
        $('#ringkasan-riwayat').val((data.resume_medis.ringkasan_riwayat === null ? "" : data
          .resume_medis.ringkasan_riwayat));
        $('#tanggung-jawab-pembayaran-rm').val(data.resume_medis.penjamin);
        $('#diagnosis-waktu-masuk-rm').html(data.diagnosa_awal === "" || data.diagnosa_awal === null ? data.diag_manual : data.diagnosa_awal);
        $('#hasil-konsultasi-rm').val(data.resume_medis.hasil_konsultasi);
        $('#cara-terapi-pengobatan-rm').val(data.resume_medis.cara_terapi_pengobatan);
        $('#alergi-rm').val(data.resume_medis.alergi_obat);
        $('#hasil-laboratoraium-rm').val(data.resume_medis.pending_lab);
        $('#diet-rm').val(data.resume_medis.diet);
        $('#instruksi-rm').val(data.resume_medis.anjuran_edukasi);

        $('#ringkasan-riwayat-penyakit-rm').html(`${(data.resume_medis.keluhan_utama == null ? "" : "Keluhan Utama: " + data.resume_medis.keluhan_utama + `<br>`)}
            ${(data.resume_medis.subject == null ? "" : data.resume_medis.subject)}`);
        $('#pemeriksaan-fisik-rm').html(`
                ${(data.resume_medis.sistolik == null ? "" : "Tensi Sistolik: " + data.resume_medis.sistolik + " mmHg. ")}
                ${(data.resume_medis.suhu == null ? "" : "Suhu: " + data.resume_medis.suhu + "℃. ")}
                ${(data.resume_medis.rr == null ? "" : "Respirasi: " + data.resume_medis.rr + "/Mnt. ")}
                ${(data.resume_medis.tinggi_badan_ranap == null ? "" : "TB: " + data.resume_medis.tinggi_badan_ranap + " cm. " + `<br>`)}
                ${(data.resume_medis.diastolik == null ? "" : "Tensi DIastolik: " + data.resume_medis.diastolik + " mmHg. ")}
                ${(data.resume_medis.nadi == null ? "" : "Nadi: " + data.resume_medis.nadi + "/Mnt. ")}
                ${(data.resume_medis.nps == null ? "" : "Nafas: " + data.resume_medis.nps + "/Mnt. ")}
                ${(data.resume_medis.berat_badan_ranap == null ? "" : "BB: " + data.resume_medis.berat_badan_ranap + " Kg. " + `<br>`)}
                ${(data.resume_medis.objective == null ? "" : data.resume_medis.objective + `<br>`)}
                ${(data.resume_medis.assessment == null ? "" : data.resume_medis.assessment + `<br>`)}
                ${(data.resume_medis.plan == null ? "" : data.resume_medis.plan)}`);
        $('#pemeriksaan-penunjang-rm').html(

        );

        const diagUtamaRm = data.diagnosa_utama?.[0]?.nama || '';

        $('#diagnosis-utama-rm').html(diagUtamaRm);
        $('#diagnosis-sekunder-rm').html(
          (data.diagnosa_sekunder) +
          (data.ds_manual_sekunder) +
          (data.diagnosa_utama_instalasi_lainnya)
        );

        if (data.cek_obat !== undefined) {

          if (data.cek_obat.length > 0) {

            let cekDataObat = data.cek_obat;

            let arrDatObat = new Array();

            let uniqueObat = '';

            $.each(cekDataObat, function(i, j) {

              // namaObat = j.nama_lengkap;

              // freeSpasiObat = namaObat.replace(/\s+/g, " ");

              // if(j.aturan_pakai !== '' && (j.aturan_pakai_manual === null || j.aturan_pakai_manual === '0')){
              //   freeSpasiObat += ' (' + j.aturan_pakai + ')';
              // }

              // if(j.aturan_pakai_manual !== null || j.aturan_pakai_manual !== '0'){
              //   freeSpasiObat += ' (' + j.aturan_pakai + ')';
              // }

              arrDatObat.push(j.nama);

            })

            const newObjObat = new Object();

            newObjObat.arrObat = new Array();

            $.each(arrDatObat, function(k, l) {

              newObjObat.arrObat.push(l);

            })

            const obatData = newObjObat.arrObat.filter((arrObat, indexObat) => {
              const _thingObat = JSON.stringify(arrObat);
              return indexObat === newObjObat.arrObat.findIndex(objObat => {
                return JSON.stringify(objObat) === _thingObat;
              });
            });

            uniqueObat = obatData;

            $('#terapi-pengobatan').html(
              `<b>` + uniqueObat?.map(obat => `${obat}, `)?.join('') + `</b>`
            );

          }

        }

        if (data.tindakan !== undefined) {

          if (data.tindakan.length > 0) {

            let daTin = data.tindakan;

            let arrDat = new Array();

            let arrDatOK = new Array();

            let namaKecil = '';

            let namaTindakan = '';

            let freeSpasi = '';

            let freeSpasiOK = '';

            let dataOK = '';

            let namaOK = '';

            let namaKecilOK = '';

            let uniqueOK = '';

            if (data.tindakan_ok.length > 0) {

              dataOK = data.tindakan_ok;

              $.each(dataOK, function(e, f) {

                namaOK = f.nama;

                namaKecilOK = namaOK.toLowerCase();

                freeSpasiOK = namaKecilOK.replace(/\s+/g, " ");

                arrDatOK.push(freeSpasiOK);

              })

              const newObjOK = new Object();

              newObjOK.arrOK = new Array();

              $.each(arrDatOK, function(g, h) {

                newObjOK.arrOK.push(h);

              })

              const okData = newObjOK.arrOK.filter((arrOK, indexOK) => {
                const _thingOK = JSON.stringify(arrOK);
                return indexOK === newObjOK.arrOK.findIndex(objOK => {
                  return JSON.stringify(objOK) === _thingOK;
                });
              });

              uniqueOK = okData;

            }

            $.each(daTin, function(a, b) {

              namaTindakan = b.nama;

              namaKecil = namaTindakan.toLowerCase();

              freeSpasi = namaKecil.replace(/\s+/g, " ");

              arrDat.push(freeSpasi);

            })

            const newObj = new Object();

            newObj.arr = new Array();

            $.each(arrDat, function(c, d) {

              newObj.arr.push(d);

            })

            const uniqueArray = newObj.arr.filter((arr, index) => {
              const _thing = JSON.stringify(arr);
              return index === newObj.arr.findIndex(obj => {
                return JSON.stringify(obj) === _thing;
              });
            });

            let cekUnik = '';

            if (uniqueOK === '') {

              cekUnik = '';

            } else {

              cekUnik = `<b>` + uniqueOK?.map(ok => `${ok}<br>`)?.join('') + `</b>`;

            }


            $('#tindakan-rm').html(
              cekUnik +
              uniqueArray?.map(value => `<b>${value}</b><br>`)?.join('')
            );

          }

        }

        $('#kondisi-keluar-rm').html((data.resume_medis.cara_keluar == null ? `-` : `<b>` + data
          .resume_medis.cara_keluar + `</b>`));

        if (data.resume_medis.cara_keluar == 'Pemulasaran Jenazah') {
          document.getElementById("poliklinik-rm").disabled = true;
          document.getElementById("rs-lain-rm").disabled = true;
          document.getElementById("puskesmas-rm").disabled = true;
          document.getElementById("dokter-luar-rm").disabled = true;
        } else {
          document.getElementById("poliklinik-rm").disabled = false;
          document.getElementById("rs-lain-rm").disabled = false;
          document.getElementById("puskesmas-rm").disabled = false;
          document.getElementById("dokter-luar-rm").disabled = false;
        }

        if (data.resume_medis.pengobatan_dilanjutkan == null) {
          document.getElementById("poliklinik-rm").checked = false;
          document.getElementById("rs-lain-rm").checked = false;
          document.getElementById("puskesmas-rm").checked = false;
          document.getElementById("dokter-luar-rm").checked = false;
        } else if (data.resume_medis.pengobatan_dilanjutkan !== null) {
          if (data.resume_medis.pengobatan_dilanjutkan == 'Poliklinik') {
            document.getElementById("poliklinik-rm").checked = true;
          } else if (data.resume_medis.pengobatan_dilanjutkan == 'RS Lain') {
            document.getElementById("rs-lain-rm").checked = true;
          } else if (data.resume_medis.pengobatan_dilanjutkan == 'Puskesmas') {
            document.getElementById("puskesmas-rm").checked = true;
          } else if (data.resume_medis.pengobatan_dilanjutkan == 'Dokter Luar') {
            document.getElementById("dokter-luar-rm").checked = true;
          }
        }

        $('#resume-hasil-laboratorium').empty();
        $('#resume-hasil-radiologi').empty();
        $('#table-resume-lab tbody').empty();

        let obj = '';
        let rlab = '';
        let rOption = '';
        let pesanLab = '';
        let nomorONO = '';

        obj = data.resume_lab;

        if (obj !== null) {

          statusLab = data.status_lab;

          if (statusLab === false) {

            let rlab = /* html */ `
                            <div class="row mt-3" id="item-lab">
                                <div class="col-md-12">
                                    <div class="widget">
                                        <div class="widget-header">
                                        </div>
                                        <div class="widget-body">
                                            <table id="table-resume-lab" class="table table-hover table-striped table-sm color-table info-table">
                                                <thead>
                                                    <tr>
                                                        <th width="30%">Jenis Pemeriksaan</th>
                                                        <th width="1%"></th>
                                                        <th width="10%" class="center">Nama</th>
                                                        <th width="19%" class="center">Hasil</th>
                                                        <th width="15%" class="center">Satuan</th>
                                                        <th width="15%" class="center">Nilai Rujukan</th>
                                                        <th width="10%"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                        `;

            rlab += /* html */ `
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;

            $('#resume-hasil-laboratorium').append(rlab);

            if (obj !== null || obj.length > 0) {

              let noS = 0;
              pesanLab = data.pesan_lab;

              rOption = ` <tr>
                                        <td><label id="ono-pesan">${obj[0] && obj[0][0] && obj[0][0].ono ? obj[0][0].ono : 'Data tidak ditemukan'} ${pesanLab[0] ? pesanLab[0] : ''}</label></td>
                                    </tr>
                                    `;

              $.each(obj, function(i, value) {

                if (obj[i][0].flag !== 'N') {

                  if (i !== noS) {

                    rOption += `<tr>
                                                    <td><label id="ono-pesan">${obj[i][0].ono} ${pesanLab[i]}</label></td>
                                                </tr>
                                                `;

                  }

                  rOption += /* html */ `
                                                    <tr>
                                                        <td class="v-center">${obj[i][0].test_group}</td>
                                                        <td class="v-center center">${obj[i][0].flag}</td>
                                                        <td class="v-center center">${obj[i][0].order_testnm}</td>
                                                        <td class="v-center center">${obj[i][0].result_value}</td>
                                                        <td class="v-center center">${obj[i][0].unit}</td>
                                                        <td class="v-center center">${obj[i][0].ref_range}</td>
                                                    </tr>
                                                `;

                  noS = i;

                }

              })

              $('#table-resume-lab tbody').append(rOption);

            }

          } else {

            function groupAndSort(array, groupField, sortField) {

              var groups = {};
              for (var i = 0; i < array.length; i++) {
                var row = array[i];
                var groupValue = row[groupField];
                groups[groupValue] = groups[groupValue] || [];
                groups[groupValue].push(row);
              }
              // Sort each group
              for (var groupValue in groups) {
                groups[groupValue] = groups[groupValue].sort(function(a, b) {
                  // return a[sortField] - b[sortField];
                  var firstCase = a[sortField].toLowerCase();
                  var secondCase = b[sortField].toLowerCase();
                  if (firstCase < secondCase) {
                    return -1;
                  } else if (firstCase > secondCase) {
                    return 1;
                  } else {
                    return 0;
                  }

                });
              }
              // Return the results
              return groups;

            }

            let rlab = /* html */ `
                        <div class="row mt-3" id="item-lab">
                            <div class="col-md-12">
                                <div class="widget">
                                    <div class="widget-header">
                                        <label id="ono-pesan"></label>
                                    </div>
                                    <div class="widget-body">
                                        <table id="table-resume-lab" class="table table-hover table-striped table-sm color-table info-table">
                                            <thead>
                                                <tr>
                                                    <th width="30%">Jenis Pemeriksaan</th>
                                                    <th width="1%"></th>
                                                    <th width="29%" class="center">Hasil</th>
                                                    <th width="15%" class="center">Satuan</th>
                                                    <th width="15%" class="center">Nilai Rujukan</th>
                                                    <th width="10%"></th>
                                                </tr>
                                            </thead>
                                            <tbody>

                    `;

            var statVal = [];
            var iVal = [];
            var arrFlag = [];

            statVal.push(obj);

            function urutan(maSuk) {

              iVal.push(maSuk);
              return iVal.sort(function(a, b) {
                var firstCase = a.ono.toLowerCase();
                var secondCase = b.ono.toLowerCase();
                if (firstCase < secondCase) {
                  return -1;
                } else if (firstCase > secondCase) {
                  return 1;
                } else {
                  return 0;
                }

              });

            }

            $.each(statVal, function(a, value) {

              $.each(value, function(b, c) {

                urutan(c);

              })
            })

            var groupedTegr = groupAndSort(iVal, "ono", "ono");

            $.each(groupedTegr, function(i, value) {

              var groupedOtgroup = groupAndSort(value, "test_group", "test_group");

              keyGroup = Object.keys(groupedOtgroup);
              objectGroup = Object.values(groupedOtgroup);

              for (let n = 0; n < keyGroup.length; n++) {

                for (let o = 0; o < objectGroup[n].length; o++) {

                  if (objectGroup[n][o].flag !== '') {

                    if (objectGroup[n][o].flag !== 'N') {

                      arrFlag.push(objectGroup[n][o]);

                    }

                  }

                }

              }

            })

            var elementTegr = groupAndSort(arrFlag, "ono", "ono");

            $.each(elementTegr, function(eT, eTval) {

              let dateR = eTval[0].release.date;
              let tahunR = dateR.substr(0, 4);
              let bulanR = dateR.substr(4, 2);
              let tanggalR = dateR.substr(6, 2);

              let dateRelease = tanggalR + '/' + bulanR + '/' + tahunR;

              rlab += /* html */ `
                            <tr>
                                <td style="padding-left:40px;" class="v-center bold">${eT} (tanggal : ${dateRelease})</td>
                                <td class="v-center bold"></td>
                                <td class="v-center bold"></td>
                                <td class="v-center bold"></td>
                                <td class="v-center bold"></td>
                                <td class="v-center bold"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        `;

              var etvalOtgroup = groupAndSort(eTval, "test_group", "test_group");

              $.each(etvalOtgroup, function(d, e) {

                rlab += /* html */ `
                                <tr>
                                    <td style="padding-left:60px;" class="v-center bold">${d}</td>
                                    <td class="v-center bold"></td>
                                    <td class="v-center bold"></td>
                                    <td class="v-center bold"></td>
                                    <td class="v-center bold"></td>
                                    <td class="v-center bold"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            `;

                var groupedOtname = groupAndSort(e, "order_testnm",
                  "order_testnm");

                $.each(groupedOtname, function(j, k) {

                  rlab += /* html */ `
                                    <tr>
                                        <td style="padding-left:60px;" class="v-center bold">${j}</td>
                                        <td class="v-center bold"></td>
                                        <td class="v-center bold"></td>
                                        <td class="v-center bold"></td>
                                        <td class="v-center bold"></td>
                                        <td class="v-center bold"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                `;

                  rlab += /* html */ `<tr>`;

                  var status = [];

                  status.push(k);

                  $.each(status, function(l, m) {

                    const sorter = (a, b) => {
                      return parseFloat(a.disp_seq
                          .replace(/[_]/g, "")) -
                        parseFloat(b.disp_seq
                          .replace(/[_]/g, ""));
                    };
                    const sortByAge = arr => {
                      arr.sort(sorter);
                    };

                    sortByAge(m);

                    $.each(m, function(y, z) {

                      if (Array.isArray(z.nama) &&
                        !z.nama.length) {

                        rlab += /* html */ `

                                                <td style="padding-left:80px;" class="v-center"></td>

                                            `;

                      } else {

                        $.each(z.nama, function(
                          n, o) {

                          if (o
                            .nama ===
                            'Hitung Jenis'
                          ) {
                            rlab += /* html */ `

                                                                    <td style="padding-left:80px;" class="v-center bold" >${(o.nama !== null ? o.nama : '')}</td>

                                                            `;

                          } else {

                            rlab += /* html */ `

                                                                    <td style="padding-left:80px;" class="v-center" >${(o.nama !== null ? o.nama : '')}</td>

                                                            `;

                          }
                        })
                      }

                      let mFlag = '';
                      let sResult = '';

                      mFlag =
                        `<td style="color:red;" class="v-center center">${z.flag}</td>`;

                      if (z.unit === '' && z
                        .ref_range === '') {

                        if (z.result_value
                          .length < 10) {

                          sResult = /* html */ `
                                                    <td class="v-center center">${z.result_value}</td>
                                                    <td class="v-center center">${z.unit}</td>
                                                    <td class="v-center center">${z.ref_range}</td>`;

                        } else {

                          sResult = /* html */ `

                                                <td class="v-center center" colspan="3">${z.result_value}</td> `;

                        }

                      } else {

                        sResult = /* html */ `
                                                    <td class="v-center center">${z.result_value}</td>
                                                    <td class="v-center center">${z.unit}</td>
                                                    <td class="v-center center">${z.ref_range}</td>`;

                      }

                      rlab += /* html */ `
                                                    ${mFlag}
                                                    ${sResult}
                                                    <td class="v-center center">${(z.test_comment !== null ? z.test_comment : '')}</td>
                                                </tr>
                                                `;

                    })

                  })

                })

              })

            })

            rlab += /* html */ `
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                `;

            $('#resume-hasil-laboratorium').append(rlab);

          }

        }

        dataRadiologi = data.cek_radiologi;

        if (dataRadiologi !== undefined) {

          let hRad = /* html */ `
                    <div class="row mt-3" id="hasil-radiologi">
                        <div class="col-md-12">
                            <div class="widget">
                                <div class="widget-header">
                                </div>
                                <div class="widget-body">
                                    <table class="table table-hover table-striped table-sm color-table info-table">
                                        <thead>
                                            <tr>
                                                <th width="10%">No</th>
                                                <th width="20%" class="center">Nama Layanan</th>
                                                <th width="70%" class="center">Hasil Radiologi</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                `;

          $.each(dataRadiologi, function(ind, radVal) {

            hRad += /* html */ `
                        <tr>
                            <td class="center">${radVal.kode}</td>
                            <td class="center">${radVal.layanan}</td>
                            <td class="center">${radVal.hasil}</td>
                        </tr>
                    `;


          })

          hRad += /* html */ `
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                `;

          $('#resume-hasil-radiologi').append(hRad);

        }

        $.each(data.kontrol_resume, function(i, v) {

          var myDays = ['Ahad', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];

          function dateTime(waktu) {
            var el = waktu.split(' ');
            var tgl = date2mysql(el[0]);
            return tgl;
          }

          function timeAja(waktu) {
            var el = waktu.split(' ');
            var tgl = date2mysql(el[0]);
            var tm = el[1].split(':');
            return tm[0] + ':' + tm[1];
          }

          function tanggalAja(waktu) {
            var el = waktu.split(' ');
            var tgl = el[0];
            var tm = el[1].split(':');
            return tgl;
          }

          function takeTanggal(waktu) {
            var el = waktu.split(' ');
            var tgl = el[0];
            var s_tgl = tgl.split('/');
            var tm = el[1].split(':');
            return s_tgl[2] + '-' + s_tgl[1] + '-' + s_tgl[0] + ' ' + tm[0] + ':' + tm[1] +
              ':' + '00';
          }

          var cariHariKontrol = dateTime(v.tanggal_kontrol);
          var cari_jam_kontrol = timeAja(v.tanggal_kontrol);
          var hari_kontrol = new Date(cariHariKontrol);
          var ambil_hari_kontrol = hari_kontrol.getDay(),
            ambil_hari_kontrol = myDays[ambil_hari_kontrol];
          var ambil_tanggal_kontrol = tanggalAja(v.tanggal_kontrol);

          let html = /* html */ `
                    <tr>
                        <td class="number-kontrol" align="center">${i + 1}</td>
                        <td align="center">${ambil_tanggal_kontrol}</td>
                        <td align="center">${ambil_hari_kontrol}</td>
                        <td align="center">${cari_jam_kontrol}</td>
                        <td align="center">${v.dokter}</td>
                        <td align="center">${v.tempat_kontrol !== null ? v.tempat_kontrol : '-'}</td>
                        <td align="center"><input type="hidden" name="ek_operator[]" value="${v.id_users}">${v.akun_user}<input type="hidden" name="tanggal_dibuat[]" value="<?= date("Y-m-d H:i:s") ?>"></td>
                        <td align="center">
                        <button type="button" class="btn btn-secondary btn-xs" onclick="hapusKontrolKembaliRM(this, ${v.id}, ${data.kontrol_resume_keperawatan[i]?.id})"><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                `;
          $('#table-kontrol-resume tbody').append(html);
        })


        //Punya Mas Reza
        // $.each(data.terapi_resume, function(i, v) {

        //     html = /* html */ `
        //         <tr>
        //             <td class="number-terapi" align="center">${i+1}</td>
        //             <td align="left">${((v.barang_auto !== null) ? v.barang_auto : '')}</td>
        //             <td align="center">${((v.jumlah_obat !== null) ? v.jumlah_obat : '')}</td>
        //             <td align="center">${((v.dosis !== null) ? v.dosis : '')}</td>
        //             <td align="center">${((v.frekuensi !== null) ? v.frekuensi : '')}</td>
        //             <td align="center">${((v.cara_pemberian !== null) ? v.cara_pemberian : '')}</td>
        //             <td align="center">${((v.ek_jam_pemberian !== null) ? timerzmysql(v.ek_jam_pemberian) : '')}</td>
        //             <td align="center">${((v.ek_jam_pemberian_satu !== null) ? timerzmysql(v.ek_jam_pemberian_satu) : '')}</td>
        //             <td align="center">${((v.ek_jam_pemberian_dua !== null) ? timerzmysql(v.ek_jam_pemberian_dua) : '')}</td>
        //             <td align="center">${((v.ek_jam_pemberian_tiga !== null) ? timerzmysql(v.ek_jam_pemberian_tiga) : '')}</td>
        //             <td align="center">${((v.ek_jam_pemberian_empat !== null) ? timerzmysql(v.ek_jam_pemberian_empat) : '')}</td>
        //             <td align="center">${((v.ek_jam_pemberian_lima !== null) ? timerzmysql(v.ek_jam_pemberian_lima) : '')}</td>
        //             <td align="center">${((v.petunjuk_khusus !== null) ? v.petunjuk_khusus : '')}</td>
        //         </tr>

        //     `;
        //     $('#table-terapi-rm tbody').append(html);
        // });

        // $.each(data.terapi_resume, function(i, v) {

        //   html = /* html */ `
        //             <tr>
        //                 <td class="number-terapi" align="center">${i + 1}</td>
        //                 <td align="center">${v.obat_rm}</td>
        //                 <td align="center">${v.jumlah_obat}</td>
        //                 <td align="center">${v.dosis}</td>
        //                 <td align="center">${v.frekuensi}</td>
        //                 <td align="center">${v.cara_pemberian}</td>
        //                 <td align="center">${!v.ek_jam_pemberian ? '-' : v.ek_jam_pemberian}</td>
        //                 <td align="center">${!v.ek_jam_pemberian_satu ? '-' : v.ek_jam_pemberian_satu}</td>
        //                 <td align="center">${!v.ek_jam_pemberian_dua ? '-' : v.ek_jam_pemberian_dua}</td>
        //                 <td align="center">${!v.ek_jam_pemberian_tiga ? '-' : v.ek_jam_pemberian_tiga}</td>
        //                 <td align="center">${!v.ek_jam_pemberian_empat ? '-' : v.ek_jam_pemberian_empat}</td>
        //                 <td align="center">${!v.ek_jam_pemberian_lima ? '-' : v.ek_jam_pemberian_lima}</td>
        //                 <td align="center">${v.petunjuk_khusus}</td>
        //                 <td align="center"><input type="hidden" name="trp_users[]" value="${v.id_users}">${v.akun_user}<input type="hidden" name="tanggal_dibuat[]" value="<?= date("Y-m-d H:i:s") ?>"></td>
        //                 <td align="center">
        //                     <button type="button" class="btn btn-secondary btn-xs" onclick="hapusTerapiResume(this, ${v.id}, ${data.terapi_resume_keperawatan[i]?.id})"><i class="fas fa-trash-alt"></i></button>
        //                 </td>
        //             </tr>

        //         `;
        //   $('#table-terapi-rm tbody').append(html);
        // });

        $.each(data.terapi_resume, function(i, v) {

          html = /* html */ `
            <tr>
              <td class="number-terapi" align="center">${i + 1}</td>
              <td align="center">${v.nama_obat}</td>
              <td align="center">${v.jumlah_obat}</td>
              <td align="center">${v.dosis}</td>
              <td align="center">${v.frekuensi}</td>
              <td align="center">${v.cara_pemberian || ''}</td>
              <td align="center">${!v.ek_jam_pemberian ? '-' : v.ek_jam_pemberian}</td>
              <td align="center">${!v.ek_jam_pemberian_satu ? '-' : v.ek_jam_pemberian_satu}</td>
              <td align="center">${!v.ek_jam_pemberian_dua ? '-' : v.ek_jam_pemberian_dua}</td>
              <td align="center">${!v.ek_jam_pemberian_tiga ? '-' : v.ek_jam_pemberian_tiga}</td>
              <td align="center">${!v.ek_jam_pemberian_empat ? '-' : v.ek_jam_pemberian_empat}</td>
              <td align="center">${!v.ek_jam_pemberian_lima ? '-' : v.ek_jam_pemberian_lima}</td>
              <td align="center">${v.petunjuk_khusus ? v.petunjuk_khusus : ''}</td>
              <td align="center"><input type="hidden" name="trp_users[]" value="${v.id_users}">${v.akun_user}<input type="hidden" name="tanggal_dibuat[]" value="<?= date("Y-m-d H:i:s") ?>"></td>
              <td align="center">
            	<button type="button" ${!v.can_edit && 'disabled'} class="btn btn-secondary btn-xs" onclick="hapusTerapiResume(this, ${v.id}, ${data.terapi_resume_keperawatan[i]?.id})"><i class="fas fa-trash-alt"></i></button>
              </td>
            </tr>

          `;
          $('#table-terapi-rm tbody').append(html);
        });

        $('#modal-resume-medis').modal('show');
      },
      complete: function() {
        hideLoader();
      },
      error: function(e) {
        accessFailed(e.status);
      }
    });
  }

  function printCPPT(id_pendaftaran, id_layanan_pendaftaran) {
    window.open('<?= base_url('pelayanan/printing_cppt/') ?>' + id_pendaftaran + '/' + id_layanan_pendaftaran + '/view', 'Cetak Catatan Perkembangan Pasien Terintegrasi', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
  }

  function viewHasilRadiologi(id_pendaftaran, id_layanan_pendaftaran) {
    window.open('<?= base_url('folder_pasien/view_hasil_radiologi/') ?>' + id_pendaftaran + '/' + id_layanan_pendaftaran, 'Cetak Hasil Radiologi', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
  }

  function viewHasilLaboratorium(id_pendaftaran, id_layanan_pendaftaran) {
    window.open('<?= base_url('folder_pasien/view_hasil_laboratorium/') ?>' + id_pendaftaran + '/' + id_layanan_pendaftaran, 'Cetak Hasil Laboratorium', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
  }
</script>