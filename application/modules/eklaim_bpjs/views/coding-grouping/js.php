<script type="text/javascript" src="<?= resource_url() ?>assets/node_modules/wizard/bwizard.js"></script>
<script>
  $(document).ready(function() {
    // getListEklaim(1)
    if ("<?= $no_rm ?>" !== "") {
      $('#keyword').val("<?= $no_rm ?>");
      searchingByName("<?= $no_rm ?>")
      // // $('#keyword-rm').val("");
      // getListEklaim(1)
    }

    $('#label-by-name').hide();

    $('#table-by-name tbody').empty();
    $('#table-by-name').hide();
    $('#table-by-date tbody').empty();
    $('#table-by-date').hide();

    $('#tanggal-awal, #tanggal-akhir').datepicker({
      format: 'dd/mm/yyyy'
    }).on('changeDate', function() {
      $(this).datepicker('hide')
    })
    $('#btn-search').click(function() {
      $('#modal-search').modal('show')
    })
    $('#btn-cari-data').click(function() {
      $('#keyword').val("");
      $('#keyword-rm').val("");
      getListEklaim(1)
    })

    $('#keyword').keyup(debounceTime(function() {
      if ($('#keyword').val() == '') {
        // getListEklaim(1)
        // } else {
        // $('#tanggal-awal').val('<?= date('d/m/Y') ?>')
        if ($('#page-now-bydate').val() !== "") {
          getListEklaim($('#page-now-bydate').val())
        } else {
          getListEklaim(1)
        }
      }
    }, 750));

    // $('#keyword').select2({
    //   ajax: {
    //     url: "<?= base_url('eklaim_bpjs/api/eklaim_bpjs_auto/pasien_auto') ?>",
    //     dataType: 'json',
    //     quietMillis: 100,
    //     data: function(term, page) { // page is the one-based page number tracked by Select2
    //       return {
    //         q: term, //search term
    //         page: page, // page number
    //       };
    //     },
    //     results: function(data, page) {
    //       var more = (page * 20) < data.total; // whether or not there are more results available

    //       // notice we return the value of more so Select2 knows if more results can be loaded
    //       return {
    //         results: data.data,
    //         more: more
    //       };
    //     }
    //   },

    //   formatResult: function(data) {
    //     let tglLahir = dateIndo(data.tanggal_lahir);
    //     let umur = umurHanyaTahun(data.tanggal_lahir) + ' TAHUN';
    //     let lahir = 'LAHIR: ' + tglLahir + ' (' + umur + ')';
    //     var markup = data.id + ' <b>' + data.nama + '</b>' + '<br/>' + 'KARTU: ' + data.no_polish + '<br/>' + lahir;
    //     return markup;
    //   },

    //   formatSelection: function(data) {
    //     // let umur = '';
    //     // if (data.tanggal_lahir !== null) {
    //     //   umur = hitungUmur(data.tanggal_lahir) + ' (' + datefmysql(data.tanggal_lahir) + ')';
    //     // }
    //     // $('#identitas-pasien-formulir').html(data.id + ' / ' + data.nama + ' / ' + umur);

    //     // $('#id_pasien_search').val(data.id);

    //     return data.id + ' ' + data.nama;
    //   }
    // });

    var timer = 750; // Timer untuk debouncing

    $('#keyword').on('keyup', function() {
      clearTimeout(timer); // Bersihkan timer sebelumnya
      let keyword = $(this).val().toLowerCase(); // Ambil input user

      if (keyword.length > 2) { // Hanya trigger jika keyword lebih dari 2 karakter
        timer = setTimeout(function() { // Debounce untuk menghindari banyak request
          $.ajax({
            url: "<?= base_url('eklaim_bpjs/api/eklaim_bpjs_auto/pasien_auto') ?>", // URL API
            type: 'GET',
            dataType: 'json',
            data: {
              q: keyword, // Parameter pencarian
              page: 1 // Halaman default
            },
            beforeSend: function() {
              showLoader(); // Tampilkan loader sebelum request dikirim
            },
            success: function(response) {
              let uniqueItems = new Set();
              let filteredOptions = '';

              if (response.data && response.data.length > 0) {
                response.data.forEach(function(item) {
                  if (!uniqueItems.has(item.id)) { // Periksa apakah id sudah ada di Set
                    uniqueItems.add(item.id); // Tambahkan id ke Set

                    let tglLahir = dateIndo(item.tanggal_lahir);
                    let umur = umurHanyaTahun(item.tanggal_lahir) + ' TAHUN';
                    let lahir = 'LAHIR: ' + tglLahir + ' (' + umur + ')';
                    var markup = item.id + ' <b>' + item.nama + '</b>' + '<br/>' + 'KARTU: ' + item.no_polish + '<br/>' + lahir;

                    filteredOptions += `
                                    <a class="dropdown-item" href="#" data-id="${item.id}" data-nama="${item.nama}" data-tanggal-lahir="${item.tanggal_lahir}">
                                        ${markup}
                                    </a>`;
                  }
                });
              } else {
                filteredOptions = '<a class="dropdown-item disabled" href="#">Data tidak ditemukan</a>';
              }

              $('#dropdownResult').html(filteredOptions).show(); // Tampilkan hasil filter
            },
            error: function() {
              $('#dropdownResult').html('<a class="dropdown-item disabled" href="#">Error memuat data</a>').show();
            },
            complete: function() {
              hideLoader(); // Sembunyikan loader setelah request selesai
            }
          });
        }, 750); // Delay 300ms untuk debounce
      } else {
        $('#dropdownResult').hide(); // Sembunyikan dropdown jika input kurang dari 3 karakter
      }
    });

    // Event saat salah satu opsi diklik
    $(document).on('click', '#dropdownResult .dropdown-item', function(e) {
      e.preventDefault();

      if (!$(this).hasClass('disabled')) {
        let id = $(this).data('id');
        let nama = $(this).data('nama');

        // Set value input dan sembunyikan dropdown
        let umur = '';
        if ($(this).data('tanggal-lahir') !== null) {
          umur = umurHanyaTahun($(this).data('tanggal-lahir')) + ' Tahun (' + datefmysql($(this).data('tanggal-lahir')) + ')';
        }
        $('#keyword').val($(this).data('id'));
        $('#keyword-rm').val($(this).data('id'));
        getListEklaim(1)

        // $('#keyword').val(nama);
        $('#dropdownResult').hide();

        // console.log('ID Pasien:', id, 'Nama Pasien:', nama); // Debug: ID dan Nama Pasien
      }
    });

    // Menyembunyikan dropdown jika klik di luar area
    $(document).click(function(e) {
      if (!$(e.target).closest('#keyword, #dropdownResult').length) {
        $('#dropdownResult').hide();
      }
    });

  });

  // function reloadData() {
  //   let filterLayanan = $('#jenis-layanan').val('rawat_jalan')
  //   $('#jenis-layanan').val('rawat_jalan')
  //   $('#id, #keyword-search').val('')
  //   $('#tanggal-awal, #tanggal-akhir').val('<?= date('d/m/Y') ?>')
  //   $('#penjamin-search, #cara-bayar-search, #dokter-search, #keyword-search').val('')
  //   $('#s2id_penjamin-search a .select2-chosen').html('Pilih Penjamin')
  //   $('#s2id_dokter-search a .select2-chosen').html('Pilih Dokter DPJP')
  //   $('.penjamin-group-search').hide()
  //   // syams_validation_remove('.form-control')
  //   // syams_validation_remove('.select2-input')
  // }

  function umurHanyaTahun(dateString) {
    const targetDate = new Date(dateString); // Ubah string tanggal jadi objek Date
    var currentDate = new Date(); // Tanggal sekarang

    // Selisih tahun
    return currentDate.getFullYear() - targetDate.getFullYear();
  }

  function searchingByName(noRM) {
    $('#keyword').val(noRM)
    $('#keyword-rm').val(noRM)
    getListEklaim(1)
  }

  function backByName() {
    if ($('#page-now-bydate').val() !== "") {
      $('#keyword').val("");
      $('#keyword-rm').val("");
      getListEklaim($('#page-now-bydate').val())
    } else {
      $('#keyword').val("");
      $('#keyword-rm').val("");
      getListEklaim(1)
    }
  }

  function getListEklaim(page) {
    $('#page-now').val(page)

    $.ajax({
      type: 'GET',
      url: '<?= base_url('eklaim_bpjs/api/eklaim_bpjs/get_list_eklaim') ?>/page/' + page,
      data: $('#form-search').serialize() + '&keyword=' + $('#keyword-rm').val(),
      cache: false,
      dataType: 'JSON',
      beforeSend: function() {
        showLoader()
      },
      success: function(data) {
        if ((page - 1) & (data.data.length === 0)) {
          getListEklaim(page - 1);
          return false;
        }

        $('#pagination').html(paginationEklaim(data.jumlah, data.limit, data.page, 1));
        $('#summary').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

        $('#label-by-name').empty().hide();

        $('#table-by-date tbody').empty();
        $('#table-by-name tbody').empty();
        $('#table-by-date').hide();
        $('#table-by-name').hide();

        if (data.tipe == 'by-name') {
          if (data.jumlah > 0) {
            let kl = data.data[0].kelamin === 'L' ? 'LAKI-LAKI' : 'PEREMPUAN';
            let noRM = `<span class="pointer" onclick="editDataPasien('${data.data[0].no_rm}')"><b>${data.data[0].no_rm}</b></span>`;
            let labelName = noRM + " •• " + data.data[0].nama_pasien + " •• " + kl + " •• " + dateFullIndo(data.data[0].tanggal_lahir);
            // $('#label-by-name').append('<div class="row"> <i class="fas fa-reply-all"></i> &ensp; <h4>' + labelName + '</h4></div>').show();

            $('#label-by-name').append(`
            <div class="row">
              <h4 class="pointer" onclick="backByName()" style="padding-left: 15px;"><i class="fas fa-reply-all"></i></h4>
              <h4 style="padding-left: 20px;">${labelName}</h4>
            </div>
            `).show();
          }

          $.each(data.data, function(i, v) {
            let jenisRawat = (v.rawat == 'RJ' ? 'Jalan' : 'Inap');

            // <td class="center"><span onclick="setClaimData('${v.id}', '${jenisRawat}', true)" class="pointer">${dateIndo(v.tgl_masuk)}</span></td>
            let html = /* html */ `
              <tr>
                <td class="center">${((i+1) + ((data.page - 1) * data.limit))}</td>
                <td class="center">${v.no_register}</td>
                <td class="center"><span onclick="loadMenuReload('eklaim_bpjs/Eklaim_bpjs/modal_eklaim/${v.id}/${jenisRawat}', 'E-Klaim', '', 'Modal Eklaim')" class="pointer">${dateIndo(v.tgl_masuk)}</span></td>
                <td class="center">${dateIndo(v.tgl_pulang)}</td>
                <td class="left">${v.jaminan}</td>
                <td class="left">${v.no_sep}</td>
                <td class="left">${v.rawat}</td>
                <td class="left">${v.cbg ?? "-"}</td>
                <td class="left">${v.status_klaim != null ? capitalizeWords(v.status_klaim) : "-"}</td>
                <td class="left">${capitalizeWords(v.coder)}</td>
              </tr>
            `;

            $('#table-by-name').show();
            $('#table-by-name tbody').append(html);

          });

        } else {
          $('#page-now-bydate').val(page)

          $.each(data.data, function(i, v) {
            let petugasGrouper = "";
            if (v.nama_petugas != null) {
              petugasGrouper = `<small>${uppercaseWords(v.nama_petugas)}</small><br>
                                <small>${v.tgl_kirim}</small>`;
            } else {
              petugasGrouper = "-";
            }

            let htmlByDate = /* htmlByDate */ `
              <tr>
                <td class="center">${((i+1) + ((data.page - 1) * data.limit))}</td>
                <td class="center">${v.no_register}</td>
                <td class="center"><span onclick="searchingByName('${v.no_rm}')" class="pointer">${dateIndo(v.tgl_masuk)}</span></td>
                <td class="center">${dateIndo(v.tgl_pulang)}</td>
                <td class="left">${v.no_sep}</td>
                <td class="left">${v.nama_pasien} <br><small>${v.no_rm}</small></td>
                <td class="center">${v.cbg ?? "-"}</td>
                <td class="right">${v.tarif_eklaim != null ? money_format(v.tarif_eklaim) : "-"}</td>
                <td class="right">${money_format(v.billing_rs)}</td>
                <td class="center">${v.rawat}</td>
                <td class="center">${v.status_klaim != null ? capitalizeWords(v.status_klaim) : "-"}</td>
                <td class="center">
                  ${petugasGrouper}
                </td>
              </tr>
            `;

            $('#table-by-date').show();
            $('#table-by-date tbody').append(htmlByDate);

          });
        }

      },
      complete: function() {
        hideLoader()
        $('#modal-search').modal('hide')
      },
      error: function(e) {
        accessFailed(e.status)
      }
    })
  }




  function pagingCustom(page) {
    getListEklaim(page)
  }


  function paginationEklaim(total_data, limit, page, tab) {
    var str = '';
    var total_page = Math.ceil(total_data / limit);

    var first = '<li class="page-item"><a style="cursor:pointer;" class="page-link" onclick="pagingCustom(1,' + tab + ')">First</a></li>';
    var last = '<li class="page-item"><a style="cursor:pointer;" class="page-link" onclick="pagingCustom(' + ((total_page === 0) ? 1 : total_page) + ',' + tab + ')">Last</a></li>';
    var click_prev = '';
    if (page > 1) {
      click_prev = 'onclick="pagingCustom(' + (page - 1) + ',' + tab + ')"';
    };
    var prev = '<li class="page-item"><a style="cursor:pointer;" class="page-link" ' + click_prev + '>&laquo;</a></li>';

    var click_next = '';
    if (page < total_page) {
      click_next = 'onclick="pagingCustom(' + (page + 1) + ',' + tab + ')"';
    };
    var next = '<li class="page-item"><a style="cursor:pointer;" class="page-link" ' + click_next + '>&raquo;</a></li>';

    var page_numb = '';
    var act_click = '';
    var start = page - 2;
    var finish = page + 2;
    if (start < 1) {
      start = 1;
    }

    if (finish > total_page) {
      finish = total_page;
    }

    for (var p = start; p <= finish; p++) {

      if (p !== page) {
        page_numb += '<li class="page-item"><a style="cursor:pointer;" class="page-link" onclick="pagingCustom(' + p + ',' + tab + ')">' + p + '</a></li>';
      } else {
        page_numb += '<li class="active"><input min="1" class="form-control-paging" onkeyup="KuduAngka(this)" type="number" value="' + page + '" style="width:60px;"/><button type="button" class="btn btn-primary btn-sm mb-1" title="Lompat ke halaman" onclick="gotopageCustom(this, ' + tab + ')"><i class="fas fa-search"></i></button></li>' + '';
      }

    };

    return '<ul class="pagination pagination-sm">' + first + prev + page_numb + next + last + '</ul>';
  }

  function gotopageCustom(obj, tab) {
    var a = $(obj).prev().val();
    var b = parseInt(a);
    if (b === 0) {
      b = 1;
    };
    pagingCustom(b, tab);
  }
</script>