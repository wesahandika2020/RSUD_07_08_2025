<script>
  function lihatFORM_IFRS_09_00(data) {
    let pasien = data.pasien;
    let layanan = data.layanan;

    window.open('<?= base_url() ?>rekonsiliasi_obat/cetak_rekonsiliasi_view_all?id=' + layanan.id_pendaftaran + '&id_layanan=' + layanan.id, 'Cetak Rekonsiliasi Obat', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
  }

</script>

