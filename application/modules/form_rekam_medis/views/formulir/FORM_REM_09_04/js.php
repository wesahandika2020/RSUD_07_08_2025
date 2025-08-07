<script>
  function lihatFORM_REM_09_04(data) {
    let pasien = data.pasien;
    let layanan = data.layanan;
    let action = 'lihat';

    let detail = layanan.id + '#' + pasien.id + '#' + pasien.nama + '#' + layanan.dokter + '#' + layanan.id_dokter + '#' + layanan.jenis_layanan + '#' + layanan.id_penjamin + '#' + layanan.penjamin + '#' + layanan.cara_bayar + '#' + pasien.telp + '#rajal';
    cetakIdentitasPasien(detail, action)
  }

  function editFORM_REM_09_04(data) {
    let pasien = data.pasien;
    let layanan = data.layanan;
    let action = 'edit';

    let detail = layanan.id + '#' + pasien.id + '#' + pasien.nama + '#' + layanan.dokter + '#' + layanan.id_dokter + '#' + layanan.jenis_layanan + '#' + layanan.id_penjamin + '#' + layanan.penjamin + '#' + layanan.cara_bayar + '#' + pasien.telp + '#rajal';
    cetakIdentitasPasien(detail, action)
  }

  function tambahFORM_REM_09_04(data) {
    let pasien = data.pasien;
    let layanan = data.layanan;
    let action = 'tambah';

    let detail = layanan.id + '#' + pasien.id + '#' + pasien.nama + '#' + layanan.dokter + '#' + layanan.id_dokter + '#' + layanan.jenis_layanan + '#' + layanan.id_penjamin + '#' + layanan.penjamin + '#' + layanan.cara_bayar + '#' + pasien.telp + '#rajal';
    cetakIdentitasPasien(detail, action)
  }

  function cetakIdentitasPasien(details, action) {
    let detail = details.split('#');
    window.open('<?= base_url('pendaftaran_igd/cetak_identitas_pasien/') ?>' + detail[0], 'Identitas Pasien', 'width=' +
      dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);
  }
</script>