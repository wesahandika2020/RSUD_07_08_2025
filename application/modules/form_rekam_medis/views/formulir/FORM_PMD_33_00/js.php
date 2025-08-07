<script type="text/javascript">
  function lihatFORM_PMD_33_00(data) {
    let pasien = data.pasien;
    let layanan = data.layanan;
    let action = 'lihat';

    cetakResumeMedisRajal(layanan.id, action)
  }

  function editFORM_PMD_33_00(data) {
    let pasien = data.pasien;
    let layanan = data.layanan;
    let action = 'edit';

    cetakResumeMedisRajal(layanan.id, action)
  }

  function tambahFORM_PMD_33_00(data) {
    let pasien = data.pasien;
    let layanan = data.layanan;
    let action = 'tambah';

    cetakResumeMedisRajal(layanan.id, action)
  }

  function cetakResumeMedisRajal(id, action) {
    window.open('<?= base_url('pemeriksaan_poli/cetak_resume_medis/') ?>' + id, 'Cetak Resume Medis', 'width=' +
      dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
  }
</script>