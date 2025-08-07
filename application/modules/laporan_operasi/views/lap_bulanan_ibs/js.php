<script>
  var dWidth = $(window).width();
  var dHeight = $(window).height();
  var x = screen.width / 2 - dWidth / 2;
  var y = screen.height / 2 - dHeight / 2;
  var baseUrl = '<?= base_url('laporan_inventory/api/laporan_inventory') ?>';


  $('#unit-search').select2({
    ajax: {
      url: "<?= base_url('masterdata/api/masterdata_auto/unit_auto') ?>",
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
  })

  function getLaporanBedahSentral(page) {
    //Laporan 01
    $('#page-now').val(page)
    openData();
    $('#modal-search').modal('hide')

    if ($('#jenis-laporan').val() == "1") {
      $('.lap-bulanan-ibs, #table-lap-bulanan-ibs tbody').show()

      $.ajax({
        type: 'GET',
        url: '<?= base_url('laporan_operasi/api/laporan_operasi/get_list_laporan_operasi_01') ?>/page/' + page + '/jenis/',
        data: $('#form-search').serialize(),
        cache: false,
        dataType: 'JSON',
        beforeSend: function() {
          showLoader()
        },
        success: function(data) {
          if ((page - 1) & (data.data.length === 0)) {
            getLaporanBedahSentral(page - 1);
            return false;
          }

          $('#jenis-periode').html('Periode : ' + data.periode);
          $('#pagination01').html(pagination(data.jumlah, data.limit, data.page, 1));
          $('#summary01').html(page_summary(data.jumlah, data.data.length, data.limit, data.page));
          $('.lap-bulanan-ibs, #table-lap-bulanan-ibs tbody').show()
          $('#table-lap-bulanan-ibs tbody').empty();
          $('#table-lap-bulanan-ibs tfoot').empty();

          let html = '';
          $.each(data.data, function(i, v) {
            html += /* html */ `
                  <tr>
                    <td class="center">${((i + 1) + ((data.page - 1) * data.limit))}</td>
                    <td class="center">${v.tindakan?.[0]?.tindakan_bulan ?? '-'}</td>
                    <td class="center">${v.tindakan?.[0]?.tindakan_hari ?? '-'}</td>
                    <td class="center">${v.tanggal ?? '-'}</td>
                    <td class="center">${v.rencana_mulai ?? '-'}</td>
                    <td class="center">${v.rencana_selesai ?? '-'}</td>
                    <td class="center">${v.mulai ?? '-'}</td>
                    <td class="center">${v.selesai ?? '-'}</td>
                    <td class="center">${v.sign_out ?? '-'}</td>
                    <td class="center">${v.nama_pasien}</td>
                    <td class="center">${v.umur}</td>
                    <td class="center">${v.kelamin}</td>
                    <td class="center">${v.no_rm}</td>
                    <td class="center">${v.ruang ?? '-'}</td>
                    <td class="center">${v.diagnosa ?? '-'}</td>
                    <td class="center">${v.tindakan?.[0]?.nama ?? ''}</td>
                    <td class="center">${v.klasifikasi ?? '-'}</td>
                    <td class="center">${v.operator ?? '-'}</td>
                    <td class="center">${v.asisten_operator ?? '-'}</td>
                    <td class="center">${v.instrumen ?? '-'}</td>
                    <td class="center">${v.sirkuler ?? '-'}</td>
                    <td class="center">${v.anestesi ?? '-'}</td>
                    <td class="center">${v.ok ?? '-'}</td>
                    <td class="center">${v.kategori_tindakan ?? '-'}</td>
                    <td class="center">${v.dokter_anesthesi ?? '-'}</td>
                    <td class="center">${v.asisten_anesthesi ?? '-'}</td>
                    <td class="center">${v.jenis_operasi ?? '-'}</td>
                  </tr>
                `;

            // Tambahan baris jika tindakan lebih dari 1
            $.each(v.tindakan, function(ind, val) {
              if (ind === 0) return; // skip yang sudah ditampilkan

              if (val.tindakan_bulan == null && val.tindakan_hari == null) {

              } // skip jika tidak ada tindakan
              html += /* html */ `
                    <tr>
                      <td class="center"></td>
                      <td class="center">${val.tindakan_bulan ?? '-'}</td>
                      <td class="center">${val.tindakan_hari ?? '-'}</td>
                      <td class="center">${v.tanggal ?? '-'}</td>
                      <td class="center">${v.rencana_mulai ?? '-'}</td>
                      <td class="center">${v.rencana_selesai ?? '-'}</td>
                      <td class="center">${v.mulai ?? '-'}</td>
                      <td class="center">${v.selesai ?? '-'}</td>
                      <td class="center">${v.sign_out ?? '-'}</td>
                      <td class="center">${v.nama_pasien ?? '-'}</td>
                      <td class="center">${v.umur ?? '-'}</td>
                      <td class="center">${v.kelamin ?? '-'}</td>
                      <td class="center">${v.no_rm ?? '-'}</td>
                      <td class="center">${v.ruang ?? '-'}</td>
                      <td class="center">${v.diagnosa ?? '-'}</td>
                      <td class="center">${val.nama ?? '-'}</td>
                      <td class="center">${v.klasifikasi ?? '-'}</td>
                      <td class="center">${v.operator ?? '-'}</td>
                      <td class="center">${v.asisten_operator ?? '-'}</td>
                      <td class="center">${v.instrumen ?? '-'}</td>
                      <td class="center">${v.sirkuler ?? '-'}</td>
                      <td class="center">${v.anestesi ?? '-'}</td>
                      <td class="center">${v.ok ?? '-'}</td>
                      <td class="center">${v.kategori_tindakan ?? '-'}</td>
                      <td class="center">${v.dokter_anesthesi ?? '-'}</td>
                      <td class="center">${v.asisten_anesthesi ?? '-'}</td>
                      <td class="center">${v.jenis_operasi ?? '-'}</td>
                    </tr>
                  `;
            });
          });

          // Setelah semua data selesai di-loop, append html-nya sekali saja
          $('#table-lap-bulanan-ibs tbody').append(html);


          // })

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
  }
</script>