<script type="text/javascript" src="<?= resource_url() ?>assets/node_modules/wizard/bwizard.js"></script>
<script>
  $(document).ready(function() {
    // batasan function prosedur dan diagnosa


  });

  var timer;
  var currentPage = 1; // Halaman saat ini
  var itemsPerPage = 5; // Batasan jumlah item per halaman

  // let currentPage = 1; // Halaman awal
  // const limit = 5; // Jumlah item per halaman
  // let totalData = 0; // Total data (akan diupdate dari API)

  function handleEnterDiag(event, diagId) {
    $(`#diagnosaResult-${diagId}`).hide();

    actionEnterDiagnosa(diagId);
  }

  function actionEnterDiagnosa(diagId) {
    $(`#search-diagnosa-${diagId}`).on('keyup', function() {
      clearTimeout(timer); // Bersihkan timer sebelumnya
      let keyword = $(this).val().toLowerCase(); // Ambil input user

      if (keyword.length > 1) { // Trigger jika input lebih dari 1 karakter
        timer = setTimeout(function() { // Debounce
          getDataDiagnosaINA(diagId, 1);
        }, 750); // Delay 750ms untuk debounce
      } else {
        $(`#diagnosaResult-${diagId}`).hide(); // Sembunyikan hasil jika input kurang dari 2 karakter
      }
    });
  }

  function getDataDiagnosaINA(diagId, page) {
    let keyword = $(`#search-diagnosa-${diagId}`).val().toLowerCase();
    let resultSelector = `#diagnosaResult-${diagId}`;

    $.ajax({
      url: "<?= base_url('eklaim_bpjs/api/eklaim_bpjs_auto/diagnosa_ina') ?>", // URL API
      type: 'GET',
      dataType: 'json',
      data: {
        q: keyword, // Parameter pencarian
        page: page // Kirimkan halaman saat ini
      },
      beforeSend: function() {
        $(resultSelector).html('<a class="dropdown-item disabled" href="#">Loading...</a>').show(); // Loader
      },
      success: function(response) {

        let filteredOptions = '';
        filteredOptions += `
                ${paginationDiag(response.jumlah, response.limit, response.page, response.startIndex, response.endIndex, diagId)}
                <div class="dropdown-result" id="dropdownResult${diagId}">
              `;

        if (response.data && response.data.length > 0) {
          response.data.forEach(function(item) {
            let kodeID = item.kode.replace(/\./g, "-");
            var markup = `<div class="row">
                            <div class="col-lg-9 d-flex" style="white-space: normal;">
                              ${item.nama}
                            </div>
                            <div class="col-lg-3 d-flex justify-content-end">
                              <b>${item.kode}</b>
                            </div>
                          </div>`;

            filteredOptions += `
                        <a class="dropdown-item item-diag-${kodeID}" onclick="klikOptionDiag('${diagId}', '${item.kode}' ,'${item.nama}')">
                            ${markup}
                        </a>`;
          });

          filteredOptions += `</div>`;
        } else {
          filteredOptions += '<a class="dropdown-item disabled" href="#">Data tidak ditemukan</a>';
        }

        $(resultSelector).html(filteredOptions).show();

      },
      error: function() {
        $(resultSelector).html('<a class="dropdown-item disabled" href="#">Error memuat data</a>').show();
      }
    });
  }

  function pagingDiag(page, diagId) {
    getDataDiagnosaINA(diagId, page);
  }

  function paginationDiag(total_data, limit, page, startIndex, endIndex, diagId) {
    var total_page = Math.ceil(total_data / limit);
    let previewPage = `${startIndex} - ${endIndex} ( ${total_data} )`;

    var prev_disabled = total_page === 1 ? 'disabled' : '';
    var next_disabled = total_page === 1 ? 'disabled' : '';

    var prev_button = `
        <div class="col-lg-3 d-flex">
            <button id="prev" class="btn btn-sm btn-primary" 
                    style="cursor:pointer;" 
                    onclick="pagingDiag(${page === 1 ? total_page : page - 1}, '${diagId}')" 
                    ${prev_disabled}>
                <i class="fas fa-caret-square-left"></i>
            </button>
        </div>`;

    var middleInfo = `<div class="col-lg-6"><b>${previewPage}</b></div>`;

    var next_button = `
        <div class="col-lg-3 d-flex justify-content-end">
            <button id="next" class="btn btn-sm btn-primary" 
                    style="cursor:pointer;" 
                    onclick="pagingDiag(${page === total_page ? 1 : page + 1}, '${diagId}')" 
                    ${next_disabled}>
                <i class="fas fa-caret-square-right"></i>
            </button>
        </div>`;

    return `
        <div class="pagination-container row" style="text-align: center; margin: 10px;">
            ${prev_button} ${middleInfo} ${next_button}
        </div>`;
  }

  // Menangani klik pada item dropdown
  function klikOptionDiag(diagId, kode, nama) {
    $(`#diagnosaResult-${diagId}`).hide();
    $(`#search-diagnosa-${diagId}`).val('');

    if (diagId == 'unu' || diagId == 'ina') {
      tambahDiagnosa(diagId, kode, nama)
    } else {
      ubahDiagnosa(diagId, kode);
    }

  }

  function ubahDiagnosa(diagId, kode) {
    let idPendaftaran = $('#id-pendaftaran-gpr').val();

    let firstSixChars = diagId.slice(0, 6);
    if (firstSixChars == 'unuUNU') {
      listDiagnosa = $('#gpr_diagnosis').val();
      listNo = diagId.replace("unuUNU", "");
    } else {
      listDiagnosa = $('#gpr_diagnosis_inagrouper').val();
      listNo = diagId.replace("inaINA", "");
    }

    $.ajax({
      type: 'POST',
      url: '<?= base_url("eklaim_bpjs/api/Eklaim_bpjs/ubah_diagnosa") ?>',
      data: {
        jenis: firstSixChars,
        kode: kode,
        id_pendaftaran: idPendaftaran,
        list_diagnosa: listDiagnosa,
        list_no: listNo
      },
      cache: false,
      dataType: 'JSON',
      beforeSend: function() {
        showLoader();
      },
      success: function(data) {
        if (data.status) {
          // ShowDiagnosaUNU(idPendaftaran, 'Normal');
          setClaimData(idPendaftaran, $('#jenis-rawat-gpr').val())
          $('#gpr_diagnosis').val(data.listDiagnosa);

          // messageCustom(data.message, data.ket);

        } else {
          messageCustom(data.message, data.ket);

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

  function tambahDiagnosa(diagId, kode, nama) {
    let idPendaftaran = $('#id-pendaftaran-gpr').val();

    if (diagId == 'unu') {
      listDiagnosa = $('#gpr_diagnosis').val();
    } else {
      listDiagnosa = $('#gpr_diagnosis_inagrouper').val();
    }

    $.ajax({
      type: 'POST',
      url: '<?= base_url("eklaim_bpjs/api/Eklaim_bpjs/tambah_diagnosa") ?>',
      data: {
        jenis: diagId,
        kode: kode,
        id_pendaftaran: idPendaftaran,
        list_diagnosa: listDiagnosa
      },
      cache: false,
      dataType: 'JSON',
      beforeSend: function() {
        showLoader();
      },
      success: function(data) {
        if (data.status) {
          // ShowDiagnosaUNU(idPendaftaran, 'Normal');
          setClaimData(idPendaftaran, $('#jenis-rawat-gpr').val())
          $('#gpr_diagnosis').val(data.listDiagnosa);

          // messageCustom(data.message, data.ket);

        } else {
          messageCustom(data.message, data.ket);

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

  function hapusDiagnosa(diagId, idPendaftaran, kode) {
    if (diagId == 'unu') {
      listDiagnosa = $('#gpr_diagnosis').val();
    } else {
      listDiagnosa = $('#gpr_diagnosis_inagrouper').val();
    }

    $.ajax({
      type: 'POST',
      url: '<?= base_url("eklaim_bpjs/api/Eklaim_bpjs/hapus_diagnosa") ?>',
      data: {
        jenis: diagId,
        kode: kode,
        id_pendaftaran: idPendaftaran,
        list_diagnosa: listDiagnosa
      },
      cache: false,
      dataType: 'JSON',
      beforeSend: function() {
        showLoader();
      },
      success: function(data) {
        if (data.status) {
          // ShowDiagnosaUNU(idPendaftaran, 'Normal');
          setClaimData(idPendaftaran, $('#jenis-rawat-gpr').val())
          $('#gpr_diagnosis').val(data.listDiagnosa);

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

  function setPrimerDiagnosa(diagId, idPendaftaran, kode) {
    if (diagId == 'unu') {
      listDiagnosa = $('#gpr_diagnosis').val();
    } else {
      listDiagnosa = $('#gpr_diagnosis_inagrouper').val();
    }

    $.ajax({
      type: 'POST',
      url: '<?= base_url("eklaim_bpjs/api/Eklaim_bpjs/set_primary_diagnosa") ?>',
      data: {
        jenis: diagId,
        kode: kode,
        id_pendaftaran: idPendaftaran,
        list_diagnosa: listDiagnosa
      },
      cache: false,
      dataType: 'JSON',
      beforeSend: function() {
        showLoader();
      },
      success: function(data) {
        if (data.status) {
          // ShowDiagnosaUNU(idPendaftaran, 'Normal');
          setClaimData(idPendaftaran, $('#jenis-rawat-gpr').val())
          $('#gpr_diagnosis').val(data.listDiagnosa);

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



  // Diagnosa NEW
  function handleEnterDiagNEW(event, diagID) {
    $(`#diagnosaResult-${diagID}`).hide();

    actionEnterDiagnosaNEW(diagID);
  }

  function actionEnterDiagnosaNEW(diagID) {
    $(`#search-diagnosa-${diagID}`).on('keyup', function() {
      clearTimeout(timer); // Bersihkan timer sebelumnya
      let keyword = $(this).val().toLowerCase(); // Ambil input user

      if (keyword.length > 1) { // Trigger jika input lebih dari 1 karakter
        timer = setTimeout(function() { // Debounce
          getDataDiagnosaNEW(diagID, 1);
        }, 750); // Delay 750ms untuk debounce
      } else {
        $(`#diagnosaResult-${diagID}`).hide(); // Sembunyikan hasil jika input kurang dari 2 karakter
      }
    });
  }

  function getDataDiagnosaNEW(diagID, page) {
    let keyword = $(`#search-diagnosa-${diagID}`).val().toLowerCase();
    let resultSelector = `#diagnosaResult-${diagID}`;

    $.ajax({
      url: "<?= base_url('eklaim_bpjs/api/eklaim_bpjs_auto/diagnosa_ina') ?>", // URL API
      type: 'GET',
      dataType: 'json',
      data: {
        q: keyword, // Parameter pencarian
        jenis: diagID.slice(0, 3), // Parameter pencarian
        page: page // Kirimkan halaman saat ini
      },
      beforeSend: function() {
        $(resultSelector).html('<a class="dropdown-item disabled" href="#">Loading...</a>').show(); // Loader
      },
      success: function(response) {

        let filteredOptions = '';
        filteredOptions += `
                ${paginationDiagNEW(response.jumlah, response.limit, response.page, response.startIndex, response.endIndex, diagID)}
                <div class="dropdown-result-diag" id="dropdownResult${diagID}">
              `;

        if (response.data && response.data.length > 0) {
          let noUrut = diagID.slice(3);
          response.data.forEach(function(item) {
            let kodeID = item.kode.replace(/\./g, "-");
            let itemNama = item.nama.replace(/'/g, "\\'"); // Escape single quotes for JS string

            var markup = `<div class="row">
                            <div class="col-lg-9 d-flex" style="white-space: normal;">
                              ${item.nama}
                            </div>
                            <div class="col-lg-3 d-flex justify-content-end">
                              <b>${item.kode}</b>
                            </div>
                          </div>`;

            filteredOptions += `
                        <a class="dropdown-item item-diag-${noUrut}" onclick="klikOptionDiagNEW('${noUrut}', '${diagID}', '${item.kode}' ,'${itemNama}')">
                            ${markup}
                        </a>`;
          });

          filteredOptions += `</div>`;
        } else {
          filteredOptions += '<a class="dropdown-item disabled" href="#">Data tidak ditemukan</a>';
        }

        $(resultSelector).html(filteredOptions).show();

      },
      error: function() {
        $(resultSelector).html('<a class="dropdown-item disabled" href="#">Error memuat data</a>').show();
      }
    });
  }

  function pagingDiagNEW(page, diagID) {
    getDataDiagnosaNEW(diagID, page);
  }

  function paginationDiagNEW(total_data, limit, page, startIndex, endIndex, diagID) {
    var total_page = Math.ceil(total_data / limit);
    let previewPage = `${startIndex} - ${endIndex} ( ${total_data} )`;

    var prev_disabled = total_page === 1 ? 'disabled' : '';
    var next_disabled = total_page === 1 ? 'disabled' : '';

    var prev_button = `
        <div class="col-lg-3 d-flex">
            <button id="prev" class="btn btn-sm btn-primary" 
                    style="cursor:pointer;" 
                    onclick="pagingDiagNEW(${page === 1 ? total_page : page - 1}, '${diagID}')" 
                    ${prev_disabled}>
                <i class="fas fa-caret-square-left"></i>
            </button>
        </div>`;

    var middleInfo = `<div class="col-lg-6"><b>${previewPage}</b></div>`;

    var next_button = `
        <div class="col-lg-3 d-flex justify-content-end">
            <button id="next" class="btn btn-sm btn-primary" 
                    style="cursor:pointer;" 
                    onclick="pagingDiagNEW(${page === total_page ? 1 : page + 1}, '${diagID}')" 
                    ${next_disabled}>
                <i class="fas fa-caret-square-right"></i>
            </button>
        </div>`;

    return `
        <div class="pagination-container row" style="text-align: center; margin: 10px;">
            ${prev_button} ${middleInfo} ${next_button}
        </div>`;
  }

  // Menangani klik pada item dropdown
  function klikOptionDiagNEW(no, diagID, kode, nama) {
    $(`#diagnosaResult-${diagID}`).hide();
    $(`#search-diagnosa-${diagID}`).val('');

    if (diagID == 'unu' || diagID == 'ina') {
      tambahDiagnosaNEW(diagID, kode, nama)
    } else {
      ubahDiagnosaNEW(no, diagID, kode, nama);
    }

  }

  function tambahDiagnosaNEW(diagID, kode, nama) {
    let idPendaftaran = $('#id-pendaftaran-gpr').val();
    let isUnu = diagID === 'unu';
    let $tbody = isUnu ? $('#table-list-diagnosa-unu tbody') : $('#table-list-diagnosa-ina tbody');
    let rowClass = isUnu ? 'diagnosis_unu' : 'diagnosis_ina';
    let inputSelector = isUnu ? '#gpr_diagnosis' : '#gpr_diagnosis_inagrouper';
    let listDiagnosa = $(inputSelector).val();
    let diagnosaArray = listDiagnosa.split('#');
    let num = $tbody.find(`tr.${rowClass}`).length + 1;
    let prioritas = num === 1 ? 'Primer' : 'Sekunder';
    let btnSetPrimer = num === 1 ? '' : `<button id="btn-set-primary" type="button" onclick="setPrimerDiagnosa('${diagID}', '${idPendaftaran}', '${kode}')" class="btn btn-secondary"><i class="far fa-edit mr-1"></i>Set Primer</button>`;

    if (!diagnosaArray.includes(kode)) {
      let html = `<tr class="${rowClass}">
                    <td style="border-bottom: 1px solid #aaa; padding: 5px;">
                      <div class="row ml-1" id="label-edit-diag-${diagID}${num}">
                        ${ isUnu ? "" : `<h6><span class="fas fa-list-ul mr-2"></span></h6>`}
                        <h6 class="pointer" onclick="toggleEditDiag('${diagID}${num}')">${nama}<span class="badge badge-primary ml-1">${kode}</span></h6>
                        <span id="lbl-prioritas-diag-${diagID}${num}" class="ml-1">${prioritas}</span>
                      </div>
                      <div class="row" id="edit-diag-${diagID}${num}" style="display: none;">
                        <div class="col-lg-3">
                            <input type="text" style="border-radius: 25px;" class="form-control" onkeydown="handleEnterDiagNEW(event, '${diagID}${num}')" id="search-diagnosa-${diagID}${num}" placeholder="Cari Diagnosa">
                            <div id="diagnosaResult-${diagID}${num}" class="diagnosa-${diagID}${num} diagnosa-class" style="display: none;"></div>
                        </div>
                        <div class="col-lg-1">
                            <button type="button" onclick="hapusDiagnosaNEW(this, '${diagID}', '${idPendaftaran}', '${kode}')" class="btn btn-danger"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
                        </div>
                        <div class="col-lg-2">${btnSetPrimer}</div>
                        <div class="col-lg-6"></div>
                      </div>
                    </td>
                  </tr>`;

      $tbody.append(html);
      if (listDiagnosa === '') {
        $(inputSelector).val(kode);
      } else {
        $(inputSelector).val(listDiagnosa + '#' + kode);
      }
    }
  }

  function ubahDiagnosaNEW(no, diagID, kode, nama) {
    let idPendaftaran = $('#id-pendaftaran-gpr').val();

    let prefix = diagID.slice(0, 3); // ambil awalan (unu/ina)
    let listDiagnosa = prefix === 'unu' ? $('#gpr_diagnosis').val() : $('#gpr_diagnosis_inagrouper').val();

    if (!listDiagnosa.includes(kode)) {
      let arr = listDiagnosa.split('#');
      let index = parseInt(no, 10) - 1;

      arr[index] = kode;
      listDiagnosa = arr.join('#');

      // simpan kembali ke input hidden
      if (prefix === 'unu') {
        $('#gpr_diagnosis').val(listDiagnosa);
      } else {
        $('#gpr_diagnosis_inagrouper').val(listDiagnosa);
      }

      // Update teks nama dan kode di label
      let $label = $(`#label-edit-diag-${diagID} h6`);
      let $kodeSpan = $label.find('span.badge');

      // Ganti teks nama (node teks pertama)
      $label.contents().filter(function() {
        return this.nodeType === 3; // text node
      }).first().replaceWith(nama + ' ');

      // Ganti isi span kode
      $kodeSpan.text(kode);

      // Update parameter kode di tombol hapus
      let $hapusBtn = $(`#edit-diag-${diagID} button.btn-danger`);
      let oldOnclick = $hapusBtn.attr('onclick');

      if (oldOnclick) {
        // Ganti parameter kode terakhir di dalam onclick
        let newOnclick = oldOnclick.replace(/hapusDiagnosaNEW\(([^,]+),\s*'[^']+',\s*'[^']+',\s*'[^']+'\)/,
          `hapusDiagnosaNEW($1, '${prefix}', '${idPendaftaran}', '${kode}')`);
        $hapusBtn.attr('onclick', newOnclick);
      }

      // Update parameter kode di tombol set primer
      let $setPrimerBtn = $(`#edit-diag-${diagID} button#btn-set-primary`);
      let oldSetPrimerOnclick = $setPrimerBtn.attr('onclick');
      if (oldSetPrimerOnclick) {
        // Ganti parameter kode terakhir di dalam onclick
        let newSetPrimerOnclick = oldSetPrimerOnclick.replace(/setPrimerDiagnosa\(([^,]+),\s*'[^']+',\s*'[^']+'\)/,
          `setPrimerDiagnosa('${prefix}', '${idPendaftaran}', '${kode}')`);
        $setPrimerBtn.attr('onclick', newSetPrimerOnclick);
      }
    }
  }

  function hapusDiagnosaNEW(el, diagID, idPendaftaran, kode) {
    let $row = $(el).closest('tr');
    let $table = diagID === 'unu' ? $('#table-list-diagnosa-unu') : $('#table-list-diagnosa-ina');
    let inputSelector = diagID === 'unu' ? '#gpr_diagnosis' : '#gpr_diagnosis_inagrouper';
    let rowClass = diagID === 'unu' ? 'diagnosis_unu' : 'diagnosis_ina';

    $row.remove();
    updateTableStateDiag(diagID);

    let listDiagnosa = $(inputSelector).val();
    let diagnosaArray = listDiagnosa.split('#');
    let diagnosaBaru = diagnosaArray.filter(item => item !== kode);
    $(inputSelector).val(diagnosaBaru.join('#'));

    function updateTableStateDiag(diagID) {
      renumberTableDiag(diagID);
      let $thead = diagID === 'unu' ? $('#table-list-diagnosa-unu thead') : $('#table-list-diagnosa-ina thead');
      $thead.toggle($(`#table-list-diagnosa-${diagID} tbody tr`).length > 0);
    }
  }

  function setPrimerDiagnosa(prefix, idPendaftaran, kodePrimer) {
    const $tbody = $('#table-list-diagnosa-' + prefix + ' tbody');
    const $rows = $tbody.find('tr.diagnosis_' + prefix);
    let $targetRow = null;

    // Loop setiap row diagnosa
    $rows.each(function() {
      const $row = $(this);
      const $badge = $row.find('span.badge');
      const kode = $badge.text().trim();

      const $labelSpan = $row.find('span[id^="lbl-prioritas-diag-"]');
      const $btn = $row.find('#btn-set-primary');

      if (kode === kodePrimer) {
        // Simpan baris yang akan dipindah
        $targetRow = $row;
        $labelSpan.text('Primer');
        $btn.remove(); // tombol "Set Primer" hilang di baris primer
      } else {
        $labelSpan.text('Sekunder');
        // Tambahkan tombol Set Primer kalau belum ada
        if ($btn.length === 0) {
          const newBtn = `
          <button id="btn-set-primary" type="button" onclick="setPrimerDiagnosa('${prefix}', '${idPendaftaran}', '${kode}')" class="btn btn-secondary">
            <i class="far fa-edit mr-1"></i>Set Primer
          </button>`;
          $row.find('.col-lg-2').html(newBtn);
        }
      }
    });

    // Pindahkan baris target ke atas tbody
    if ($targetRow) {
      $tbody.prepend($targetRow);
    }

    // Update hidden input juga supaya sinkron
    let listDiagnosa = prefix === 'unu' ?
      $('#gpr_diagnosis').val() :
      $('#gpr_diagnosis_inagrouper').val();

    let arr = listDiagnosa.split('#');
    const idx = arr.indexOf(kodePrimer);
    if (idx > -1) {
      arr.splice(idx, 1);
      arr.unshift(kodePrimer);
    }

    const updatedList = arr.join('#');
    if (prefix === 'unu') {
      $('#gpr_diagnosis').val(updatedList);
      // $('#gpr_primary_diagnosis').val(kodePrimer);
    } else {
      $('#gpr_diagnosis_inagrouper').val(updatedList);
      // $('#gpr_primary_diagnosis_inagrouper').val(kodePrimer);
    }

    $(`div[id^="edit-diag-${prefix}"]`).hide();

    renumberTableDiag(prefix);
  }

  function renumberTableDiag(diagID) {
    let rowSelector = diagID === 'unu' ? '.diagnosis_unu' : '.diagnosis_ina';

    $(`#table-list-diagnosa-${diagID} tbody tr${rowSelector}`).each(function(index) {
      let num = index + 1;

      $(this).find('[id]').each(function() {
        let oldId = $(this).attr('id');
        if (oldId) {
          let newId = oldId.replace(/(unu|ina)\d+/, `${diagID}${num}`);
          $(this).attr('id', newId);
        }
      });

      $(this).find('[onclick]').each(function() {
        let oldonclick = $(this).attr('onclick');
        if (oldonclick) {
          let newOnclick = oldonclick.replace(/toggleEditDiag\('.*?'\)/, `toggleEditDiag('${diagID}${num}')`);
          $(this).attr('onclick', newOnclick);
        }
      });

      $(this).find('input.form-control').each(function() {
        let oldOnkeydown = $(this).attr('onkeydown');
        if (oldOnkeydown) {
          let newOnkeydown = oldOnkeydown.replace(/handleEnterDiagNEW\(event,\s*'[^']+'\)/, `handleEnterDiagNEW(event, '${diagID}${num}')`);
          $(this).attr('onkeydown', newOnkeydown);
        }
      });

      // Update label primer/sekuner
      if (num === 1) {
        $(this).find('#btn-set-primary').remove();
        $(`#lbl-prioritas-diag-${diagID}${num}`).text('Primer');
      } else {
        $(`#lbl-prioritas-diag-${diagID}${num}`).text('Sekunder');
        const $btnCol = $(this).find('.col-lg-2');
        if ($btnCol.find('#btn-set-primary').length === 0) {
          const kode = $(this).find('span.badge').text().trim();
          const idPendaftaran = $('#id-pendaftaran-gpr').val();
          $btnCol.html(`
          <button id="btn-set-primary" type="button" onclick="setPrimerDiagnosa('${diagID}', '${idPendaftaran}', '${kode}')" class="btn btn-secondary">
            <i class="far fa-edit mr-1"></i>Set Primer
          </button>`);
        }
      }
    });
  }



  // Procedure
  function handleEnterProcNEW(event, procId) {
    $(`#prosedurResult-${procId}`).hide();

    actionEnterProsedurNEW(procId);
  }

  function actionEnterProsedurNEW(procId) {
    $(`#search-prosedur-${procId}`).on('keyup', function() {
      clearTimeout(timer); // Bersihkan timer sebelumnya
      let keyword = $(this).val().toLowerCase(); // Ambil input user

      if (keyword.length > 1) { // Trigger jika input lebih dari 1 karakter
        timer = setTimeout(function() { // Debounce
          getDataProsedurNEW(procId, 1);
        }, 750); // Delay 750ms untuk debounce
      } else {
        $(`#prosedurResult-${procId}`).hide(); // Sembunyikan hasil jika input kurang dari 2 karakter
      }
    });
  }

  function getDataProsedurNEW(procId, page) {
    let keyword = $(`#search-prosedur-${procId}`).val().toLowerCase();
    let resultSelector = `#prosedurResult-${procId}`;

    $.ajax({
      url: "<?= base_url('eklaim_bpjs/api/eklaim_bpjs_auto/prosedur_ina') ?>", // URL API
      type: 'GET',
      dataType: 'json',
      data: {
        q: keyword, // Parameter pencarian
        jenis: procId.slice(0, 3), // Parameter pencarian
        page: page // Kirimkan halaman saat ini
      },
      beforeSend: function() {
        $(resultSelector).html('<a class="dropdown-item disabled" href="#">Loading...</a>').show(); // Loader
      },
      success: function(response) {

        let filteredOptions = '';
        filteredOptions += `
                ${paginationProcNEW(response.jumlah, response.limit, response.page, response.startIndex, response.endIndex, procId)}
                <div class="dropdown-result-proc" id="dropdownResult${procId}">
              `;

        if (response.data && response.data.length > 0) {
          let noUrut = procId.slice(3);
          response.data.forEach(function(item) {
            let kodeID = item.kode.replace(/\./g, "-");
            var markup = `<div class="row">
                            <div class="col-lg-9 d-flex" style="white-space: normal;">
                              ${item.nama}
                            </div>
                            <div class="col-lg-3 d-flex justify-content-end">
                              <b>${item.kode}</b>
                            </div>
                          </div>`;

            filteredOptions += `
                        <a class="dropdown-item item-proc-${noUrut}" onclick="klikOptionProcNEW('${noUrut}', '${procId}', '${item.kode}' ,'${item.nama}')">
                            ${markup}
                        </a>`;
          });

          filteredOptions += `</div>`;
        } else {
          filteredOptions += '<a class="dropdown-item disabled" href="#">Data tidak ditemukan</a>';
        }

        $(resultSelector).html(filteredOptions).show();

      },
      error: function() {
        $(resultSelector).html('<a class="dropdown-item disabled" href="#">Error memuat data</a>').show();
      }
    });
  }

  function pagingProcNEW(page, procId) {
    getDataProsedurNEW(procId, page);
  }

  function paginationProcNEW(total_data, limit, page, startIndex, endIndex, procId) {
    var total_page = Math.ceil(total_data / limit);
    let previewPage = `${startIndex} - ${endIndex} ( ${total_data} )`;

    var prev_disabled = total_page === 1 ? 'disabled' : '';
    var next_disabled = total_page === 1 ? 'disabled' : '';

    var prev_button = `
        <div class="col-lg-3 d-flex">
            <button id="prev" class="btn btn-sm btn-primary" 
                    style="cursor:pointer;" 
                    onclick="pagingProcNEW(${page === 1 ? total_page : page - 1}, '${procId}')" 
                    ${prev_disabled}>
                <i class="fas fa-caret-square-left"></i>
            </button>
        </div>`;

    var middleInfo = `<div class="col-lg-6"><b>${previewPage}</b></div>`;

    var next_button = `
        <div class="col-lg-3 d-flex justify-content-end">
            <button id="next" class="btn btn-sm btn-primary" 
                    style="cursor:pointer;" 
                    onclick="pagingProcNEW(${page === total_page ? 1 : page + 1}, '${procId}')" 
                    ${next_disabled}>
                <i class="fas fa-caret-square-right"></i>
            </button>
        </div>`;

    return `
        <div class="pagination-container row" style="text-align: center; margin: 10px;">
            ${prev_button} ${middleInfo} ${next_button}
        </div>`;
  }

  // Menangani klik pada item dropdown
  function klikOptionProcNEW(no, procId, kode, nama) {
    $(`#prosedurResult-${procId}`).hide();
    $(`#search-prosedur-${procId}`).val('');

    if (procId == 'unu' || procId == 'ina') {
      tambahProsedurNEW(procId, kode, nama)
    } else {
      ubahProsedurNEW(no, procId, kode, nama);
    }

  }

  function tambahProsedurNEW(procId, kode, nama) {
    let idPendaftaran = $('#id-pendaftaran-gpr').val();
    let isUnu = procId === 'unu';
    let $tbody = isUnu ? $('#table-list-prosedur-unu tbody') : $('#table-list-prosedur-ina tbody');
    let rowClass = isUnu ? 'procedure_unu' : 'procedure_ina';
    let inputSelector = isUnu ? '#gpr_procedure' : '#gpr_procedure_inagrouper';
    let listProsedur = $(inputSelector).val();
    let prosedurArray = listProsedur.split('#');
    let num = $tbody.find(`tr.${rowClass}`).length + 1;
    let prioritas = num === 1 ? 'Primer' : 'Sekunder';
    let btnSetPrimer = num === 1 ? '' : `<button id="btn-set-primary" type="button" onclick="setPrimerProsedur('${procId}', '${idPendaftaran}', '${kode}')" class="btn btn-secondary"><i class="far fa-edit mr-1"></i>Set Primer</button>`;

    if (!prosedurArray.includes(kode)) {
      let html = `<tr class="${rowClass}">
                    <td style="border-bottom: 1px solid #aaa; padding: 5px;">
                      <div class="row ml-1" id="label-edit-proc-${procId}${num}">
                        ${ isUnu ? "" : `<h6><span class="fas fa-list-ul mr-2"></span></h6>`}
                        <h6 class="pointer" onclick="toggleEditProc('${procId}${num}')">${nama}<span class="badge badge-primary ml-1">${kode}</span></h6>
                        <span id="lbl-prioritas-proc-${procId}${num}" class="ml-1">${prioritas}</span>
                      </div>
                      <div class="row" id="edit-proc-${procId}${num}" style="display: none;">
                        <div class="col-lg-3">
                            <input type="text" style="border-radius: 25px;" class="form-control" onkeydown="handleEnterProcNEW(event, '${procId}${num}')" id="search-prosedur-${procId}${num}" placeholder="Cari Prosedur">
                            <div id="prosedurResult-${procId}${num}" class="prosedur-${procId}${num} prosedur-class" style="display: none;"></div>
                        </div>
                        <div class="col-lg-1">
                            <button type="button" onclick="hapusProsedurNEW(this, '${procId}', '${idPendaftaran}', '${kode}')" class="btn btn-danger"><i class="fas fa-trash-alt mr-1"></i>Hapus</button>
                        </div>
                        <div class="col-lg-2">${btnSetPrimer}</div>
                        <div class="col-lg-6"></div>
                      </div>
                    </td>
                  </tr>`;

      $tbody.append(html);
      if (listProsedur === '') {
        $(inputSelector).val(kode);
      } else {
        $(inputSelector).val(listProsedur + '#' + kode);
      }
    }
  }

  function ubahProsedurNEW(no, procId, kode, nama) {
    let idPendaftaran = $('#id-pendaftaran-gpr').val();

    let prefix = procId.slice(0, 3); // ambil awalan (unu/ina)
    let listProsedur = prefix === 'unu' ? $('#gpr_procedure').val() : $('#gpr_procedure_inagrouper').val();

    if (!listProsedur.includes(kode)) {
      let arr = listProsedur.split('#');
      let index = parseInt(no, 10) - 1;

      arr[index] = kode;
      listProsedur = arr.join('#');

      // simpan kembali ke input hidden
      if (prefix === 'unu') {
        $('#gpr_procedure').val(listProsedur);
      } else {
        $('#gpr_procedure_inagrouper').val(listProsedur);
      }

      // Update teks nama dan kode di label
      let $label = $(`#label-edit-proc-${procId} h6`);
      let $kodeSpan = $label.find('span.badge');

      // Ganti teks nama (node teks pertama)
      $label.contents().filter(function() {
        return this.nodeType === 3; // text node
      }).first().replaceWith(nama + ' ');

      // Ganti isi span kode
      $kodeSpan.text(kode);

      // Update parameter kode di tombol hapus
      let $hapusBtn = $(`#edit-proc-${procId} button.btn-danger`);
      let oldOnclick = $hapusBtn.attr('onclick');

      if (oldOnclick) {
        // Ganti parameter kode terakhir di dalam onclick
        let newOnclick = oldOnclick.replace(/hapusProsedurNEW\(([^,]+),\s*'[^']+',\s*'[^']+',\s*'[^']+'\)/,
          `hapusProsedurNEW($1, '${prefix}', '${idPendaftaran}', '${kode}')`);
        $hapusBtn.attr('onclick', newOnclick);
      }

      // Update parameter kode di tombol set primer
      let $setPrimerBtn = $(`#edit-proc-${procId} button#btn-set-primary`);
      let oldSetPrimerOnclick = $setPrimerBtn.attr('onclick');
      if (oldSetPrimerOnclick) {
        // Ganti parameter kode terakhir di dalam onclick
        let newSetPrimerOnclick = oldSetPrimerOnclick.replace(/setPrimerProsedur\(([^,]+),\s*'[^']+',\s*'[^']+'\)/,
          `setPrimerProsedur('${prefix}', '${idPendaftaran}', '${kode}')`);
        $setPrimerBtn.attr('onclick', newSetPrimerOnclick);
      }
    }
  }

  function hapusProsedurNEW(el, procId, idPendaftaran, kode) {
    let $row = $(el).closest('tr');
    let $table = procId === 'unu' ? $('#table-list-prosedur-unu') : $('#table-list-prosedur-ina');
    let inputSelector = procId === 'unu' ? '#gpr_procedure' : '#gpr_procedure_inagrouper';
    let rowClass = procId === 'unu' ? 'procedure_unu' : 'procedure_ina';

    $row.remove();
    updateTableStateProc(procId);

    let listProsedur = $(inputSelector).val();
    let prosedurArray = listProsedur.split('#');
    let prosedurBaru = prosedurArray.filter(item => item !== kode);
    $(inputSelector).val(prosedurBaru.join('#'));

    function updateTableStateProc(procID) {
      renumberTableProc(procID);
      let $thead = procID === 'unu' ? $('#table-list-prosedur-unu thead') : $('#table-list-prosedur-ina thead');
      $thead.toggle($(`#table-list-prosedur-${procID} tbody tr`).length > 0);
    }
  }

  function setPrimerProsedur(prefix, idPendaftaran, kodePrimer) {
    const $tbody = $('#table-list-prosedur-' + prefix + ' tbody');
    const $rows = $tbody.find('tr.procedure_' + prefix);
    let $targetRow = null;

    // Loop setiap row prosedur
    $rows.each(function() {
      const $row = $(this);
      const $badge = $row.find('span.badge');
      const kode = $badge.text().trim();

      const $labelSpan = $row.find('span[id^="lbl-prioritas-proc-"]');
      const $btn = $row.find('#btn-set-primary');

      if (kode === kodePrimer) {
        // Simpan baris yang akan dipindah
        $targetRow = $row;
        $labelSpan.text('Primer');
        $btn.remove(); // tombol "Set Primer" hilang di baris primer
      } else {
        $labelSpan.text('Sekunder');
        // Tambahkan tombol Set Primer kalau belum ada
        if ($btn.length === 0) {
          const newBtn = `
          <button id="btn-set-primary" type="button" onclick="setPrimerProsedur('${prefix}', '${idPendaftaran}', '${kode}')" class="btn btn-secondary">
            <i class="far fa-edit mr-1"></i>Set Primer
          </button>`;
          $row.find('.col-lg-2').html(newBtn);
        }
      }
    });

    // Pindahkan baris target ke atas tbody
    if ($targetRow) {
      $tbody.prepend($targetRow);
    }

    // Update hidden input juga supaya sinkron
    let listProsedur = prefix === 'unu' ?
      $('#gpr_procedure').val() :
      $('#gpr_procedure_inagrouper').val();

    let arr = listProsedur.split('#');
    const idx = arr.indexOf(kodePrimer);
    if (idx > -1) {
      arr.splice(idx, 1);
      arr.unshift(kodePrimer);
    }

    const updatedList = arr.join('#');
    if (prefix === 'unu') {
      $('#gpr_procedure').val(updatedList);
      // $('#gpr_primary_procedure').val(kodePrimer);
    } else {
      $('#gpr_procedure_inagrouper').val(updatedList);
      // $('#gpr_primary_procedure_inagrouper').val(kodePrimer);
    }

    $(`div[id^="edit-proc-${prefix}"]`).hide();

    renumberTableProc(prefix);
  }

  function renumberTableProc(procID) {
    let rowSelector = procID === 'unu' ? '.procedure_unu' : '.procedure_ina';

    $(`#table-list-prosedur-${procID} tbody tr${rowSelector}`).each(function(index) {
      let num = index + 1;

      $(this).find('[id]').each(function() {
        let oldId = $(this).attr('id');
        if (oldId) {
          let newId = oldId.replace(/(unu|ina)\d+/, `${procID}${num}`);
          $(this).attr('id', newId);
        }
      });

      $(this).find('[onclick]').each(function() {
        let oldonclick = $(this).attr('onclick');
        if (oldonclick) {
          let newOnclick = oldonclick.replace(/toggleEditProc\('.*?'\)/, `toggleEditProc('${procID}${num}')`);
          $(this).attr('onclick', newOnclick);
        }
      });

      $(this).find('input.form-control').each(function() {
        let oldOnkeydown = $(this).attr('onkeydown');
        if (oldOnkeydown) {
          let newOnkeydown = oldOnkeydown.replace(/handleEnterProcNEW\(event,\s*'[^']+'\)/, `handleEnterProcNEW(event, '${procID}${num}')`);
          $(this).attr('onkeydown', newOnkeydown);
        }
      });

      // Update label primer/sekuner
      if (num === 1) {
        $(this).find('#btn-set-primary').remove();
        $(`#lbl-prioritas-proc-${procID}${num}`).text('Primer');
      } else {
        $(`#lbl-prioritas-proc-${procID}${num}`).text('Sekunder');
        const $btnCol = $(this).find('.col-lg-2');
        if ($btnCol.find('#btn-set-primary').length === 0) {
          const kode = $(this).find('span.badge').text().trim();
          const idPendaftaran = $('#id-pendaftaran-gpr').val();
          $btnCol.html(`
          <button id="btn-set-primary" type="button" onclick="setPrimerProsedur('${procID}', '${idPendaftaran}', '${kode}')" class="btn btn-secondary">
            <i class="far fa-edit mr-1"></i>Set Primer
          </button>`);
        }
      }
    });
  }

  function importCoding() {
    // forUpdate_set_claim_data();

    $.ajax({
      type: 'POST',
      url: '<?= base_url("eklaim_bpjs/api/Eklaim_bpjs/import_coding") ?>',
      data: $('#form-gpr-eklaim').serialize(),
      cache: false,
      dataType: 'JSON',
      beforeSend: function() {
        showLoader();
      },
      success: function(data) {
        console.log(data);
        // ShowDiagnosaINA($('#id-pendaftaran-gpr').val(), 'Normal');
        // ShowProsedurINA($('#id-pendaftaran-gpr').val(), 'Normal');
        ShowDiagnosaINA($('#id-pendaftaran-gpr').val(), $('#gpr_status_klaim').val(), $('#gpr_method_status').val());
        ShowProsedurINA($('#id-pendaftaran-gpr').val(), $('#gpr_status_klaim').val(), $('#gpr_method_status').val());

        if (data.status) {
          setClaimData($('#id-pendaftaran-gpr').val(), $('#jenis-rawat-gpr').val())

          $('#gpr_diagnosis_inagrouper').val(data.data.diagnosa_inagrouper);
          $('#gpr_procedure_inagrouper').val(data.data.procedure_inagrouper);
          // messageCustom(data.message, 'Success');

          forUpdate_set_claim_data();
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
  };

  function backtoHome() {
    loadMenuReload('eklaim_bpjs/Eklaim_bpjs/page_eklaim_bpjs', 'Eklaim v.5.9.x', '', 'Modal Eklaim');
  }

  function loadMenuReload(url, nama_modul, modul, menu) {
    localStorage.setItem('sm_menu', '<?= base_url("' + url + '") ?>');
    localStorage.setItem('sm_nama_menu', menu);
    localStorage.setItem('sm_modul', nama_modul);
    setBreadcrumb(menu, nama_modul);
    showLoader();

    $.ajax({
      url: '<?= base_url("' + url + '") ?>',
      data: '',
      cache: false,
      success: function(data) {
        $('.main-content').empty();
        $('.main-content').html(data)
        // $('.main-content').html(data).addClass('bounceIn animated');
        // setTimeout(function() {
        //     $('.main-content').removeClass('bounceIn animated');
        // }, 300);
      },
      complete: function() {
        hideLoader();
      }
    });

    // location.reload();
  }
</script>