<script>
  $(document).ready(function() {

    // summaryDataKlaim();

    $('#tanggal_awal_lap, #tanggal_akhir_lap, #tanggal_awal_grouper, #tanggal_akhir_grouper').datepicker({
      format: 'dd/mm/yyyy'
    }).on('changeDate', function() {
      $(this).datepicker('hide')
    });

    // $('#jenis_rawat_kdo, #filter_kdo, #tanggal_seacrh_kdo').change(function() {
    //   summaryDataKlaim();
    //   $('.table-klaim-data-kdo').hide();
    // })

    $('#btn-filter-laporan').click(function() {
      $('#modal-filter-laporan').modal('show');
      $('#table-data-laporan').hide();
    });

    $('#btn-tampilkan-data-lap').click(function() {
      getLaporanEklaim(1);
      $('#modal-filter-laporan').modal('hide');
      $('#table-data-laporan').show();
    });

  });

  $('#petugas_klaim').select2({
    width: '100%',
    ajax: {
      url: "<?= base_url('eklaim_bpjs/api/Eklaim_bpjs_auto/petugas_eklaim') ?>",
      dataType: 'json',
      quietMillis: 100,
      data: function(term, page) { // page is the one-based page number tracked by Select2
        return {
          q: term, //search term
          page: page, // page number
        };
      },
      results: function(data, page) {
        var more = (page * 20) < data.total; // whether or not there are more results available

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

  $('#btn-download-laporan').click(function() {
    if ($('#jenis_download').val() == 'rekap-pdf') {
      window.open('<?= base_url('eklaim_bpjs/export_rekap_pdf?') ?>' + $('#form-filter-laporan').serialize());
    } else if ($('#jenis_download').val() == 'rekap-xlsx') {
      window.open('<?= base_url('eklaim_bpjs/export_rekap_xlsx?') ?>' + $('#form-filter-laporan').serialize());
    } 
  });

  function getLaporanEklaim(page) {
    $('#page-now-lap').val(page)

    $.ajax({
      type: 'GET',
      url: '<?= base_url('eklaim_bpjs/api/eklaim_bpjs/get_laporan_eklaim') ?>/page/' + page,
      data: $('#form-filter-laporan').serialize(),
      cache: false,
      dataType: 'JSON',
      beforeSend: function() {
        showLoader()
      },
      success: function(data) {
        if ((page - 1) & (data.data.length === 0)) {
          getLaporanEklaim(page - 1);
          return false;
        }

        $('#pagination-lap').html(pagination(data.jumlah, data.limit, data.page, 1));
        $('#summary-lap').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));

        $('#table-laporan-terkirim tbody').empty();
        $('#label-julah-hasil-laporan').empty().append(`Hasil ketemu &nbsp; ${data.jumlah}`);

        $.each(data.data, function(i, v) {
          let petugasGrouper = "";
          if (v.nama_petugas != null) {
            petugasGrouper = `<small>${uppercaseWords(v.nama_petugas)}</small><br>
                                <small>${v.tgl_kirim}</small>`;
          } else {
            petugasGrouper = "-";
          }

          let html = /* html */ `
              <tr>
                <td class="center">${((i+1) + ((data.page - 1) * data.limit))}</td>
                <!-- td class="center">${v.no_register}</td -->
                <td class="center">${dateIndo(v.tgl_masuk)}</td>
                <td class="center">${dateIndo(v.tgl_pulang)}</td>
                <td class="left">${v.nomor_sep}</td>
                <td class="left">${v.nama_pasien} <br><small>${v.nomor_rm}</small></td>
                <td class="center">${v.cbg ?? "-"}</td>
                <td class="right">${v.tarif_eklaim != null ? money_format(v.tarif_eklaim) : "-"}</td>
                <td class="right">${money_format(v.billing_rs)}</td>
                <td class="center">${v.rawat}</td>
                <td class="center">
                  ${petugasGrouper}
                </td>
              </tr>
            `;

          $('#table-laporan-terkirim tbody').append(html);

        });

      },
      complete: function() {
        hideLoader()
        $('#modal-filter-laporan').modal('hide')
      },
      error: function(e) {
        accessFailed(e.status)
      }
    })
  }

  function paging(page) {
    getLaporanEklaim(page)
  }
</script>