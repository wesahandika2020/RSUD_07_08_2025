<!-- // AAKC -->
<div class="modal fade" id="modal_asesmen_awal_keperawatan_cathlab" data-backdrop="static">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 class="modal-title bold" id="modal_asesmen_awal_keperawatan_cathlab_title"></h5>					
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>	
			<div class="modal-body">
				<?= form_open('', 'id=form-asesmen-awal-keperawatan-cathlab class="form-horizontal"') ?>
					<input type="hidden" name="id_layanan_pendaftaran" id="id-layanan-pendaftaran-aakc">
					<input type="hidden" name="id_pendaftaran" id="id-pendaftaran-aakc">
					<input type="hidden" name="id_pasien" id="id-pasien-aakc">
					<input type="hidden" name="id_aakc" id="id-aakc">
					<input type="hidden" name="action" id="action-aakc">

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="table-responsive">
                                <table class="table table-sm table-striped">
                                    <tr>
                                        <td width="20%" class="bold">Nama Pasien</td>
                                        <td wdith="80%">: <span id="nama-pasien-aakc"></span></td>
                                    </tr>
                                    <tr>
                                        <td class="bold">No. RM</td>
                                        <td>: <span id="norm-aakc"></span></td>
                                    </tr>
                                    <tr>
                                        <td class="bold">Tanggal Lahir</td>
                                        <td>: <span id="tanggal-lahir-aakc"></span></td>
                                    </tr>
                                    <tr>
                                        <td class="bold">Jenis Kelamin</td>
                                        <td>: <span id="jenis-kelamin-aakc"></span></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="table-responsive">
                                <table class="table table-sm table-striped">
                                    <tr>
                                        <td width="30%" class="bold">Ruang / Kelas</td>
                                        <td wdith="70%">: <span id="ruang-aakc"></span></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

					<div class="row">
						<div class="col-lg-12">
							<div class="widget-body">								
								<div id="wizard_form_ranap">	
									<div class="form-modal">  <!-- kalau pakek yang ini di LIHATYA hilang inputanya -->
									     <!-- <div class="form-asesmen-awal-keperawatan-cathlab"> jangan di hapus -->
                                        <br>
                                        <table class="table table-sm table-striped table-bordered" style="margin-top: -15px">
                                            <thead>
                                                <tr>
                                                    <td colspan="6"><b>Diagnosis</b>
                                                </tr>
                                                <tr>
                                                    <td width="5%">Nama Tindakan</td>
                                                    <td width="1%">:</td>
                                                    <td width="50%">
                                                       <textarea name="nm_tindakan" id="nm-tindakan" cols="10" rows="3" class="form-control clear-input custom-textarea"></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="5%">Nama Operator</td>
                                                    <td width="1%">:</td>
                                                    <td width="50%">
                                                       <input type="text" name="dokteroperator1_aakc" id="dokteroperator1-aakc" class="select2c-input ml-2">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="5%">Ruangan</td>
                                                    <td width="1%">:</td>
                                                    <td width="50%">
                                                       <span id="ruangan-aakc"></span>
                                                    </td>
                                                </tr>
                                            </thead>
                                        </table>

                                        <div class="row" style="margin-top: -15px;">
                                            <div class="col-lg-4">
                                                <table class="table table-no-border table-sm table-striped">
                                                    <tr>
                                                        <th colspan="4" style="background-color: #B0E0E6; color: black; text-align: left;">
                                                            <b>SIGN IN :</b>
                                                            <input type="text" name="signin_aakc" id="signin-aakc" class="custom-form clear-input d-inline-block" style="width: 80px; margin-left: 5px;">
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4">(Dilakukan sebelum induksi anestesi di ruang persiapan, minimal ada perawat dan dokter anestesi)</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="3%">1.</td>
                                                        <td width="60%">Konfirmasi informasi tentang pasien</td>
                                                        <td width="5%" class="center"><b>Sudah</b></td>
                                                        <td width="5%" class="center"><b>Belum</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="3%"></td>
                                                        <td width="60%">- Identitas dan gelang pasien</td>
                                                        <td width="5%" class="center"><input type="checkbox" name="identitas_aakc_1" id="identitas-aakc-1" value="1" class="mr-1"></td>
                                                        <td width="5%" class="center"><input type="checkbox" name="identitas_aakc_2" id="identitas-aakc-2" value="1" class="mr-1"></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="3%"></td>
                                                        <td width="60%">- Lokasi insisi / puncture</td>
                                                        <td width="5%" class="center"><input type="checkbox" name="lokasi_aakc_1" id="lokasi-aakc-1" value="1" class="mr-1"></td>
                                                        <td width="5%" class="center"><input type="checkbox" name="lokasi_aakc_2" id="lokasi-aakc-2" value="1" class="mr-1"></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="3%"></td>
                                                        <td width="60%">- Prosedur operasi / tindakan invasif</td>
                                                        <td width="5%" class="center"><input type="checkbox" name="prosedur_aakc_1" id="prosedur-aakc-1" value="1" class="mr-1"></td>
                                                        <td width="5%" class="center"><input type="checkbox" name="prosedur_aakc_2" id="prosedur-aakc-2" value="1" class="mr-1"></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="3%"></td>
                                                        <td width="60%">- Surat ijin operasi / tindakan invasif</td>
                                                        <td width="5%" class="center"><input type="checkbox" name="surat_aakc_1" id="surat-aakc-1" value="1" class="mr-1"></td>
                                                        <td width="5%" class="center"><input type="checkbox" name="surat_aakc_2" id="surat-aakc-2" value="1" class="mr-1"></td>
                                                    </tr>

                                                    <tr>
                                                        <td width="3%">2.</td>
                                                        <td width="60%">Lokasi operasi sudah diberi tanda</td>
                                                        <td width="5%" class="center"><input type="checkbox" name="tanda_aakc_1" id="tanda-aakc-1" value="1" class="mr-1"></td>
                                                        <td width="5%" class="center"><input type="checkbox" name="tanda_aakc_2" id="tanda-aakc-2" value="1" class="mr-1"></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="3%">3.</td>
                                                        <td width="60%">Mesin dan Obat-obatan sudah dicek lengkap</td>
                                                        <td width="5%" class="center"><input type="checkbox" name="mesin_aakc_1" id="mesin-aakc-1" value="1" class="mr-1"></td>
                                                        <td width="5%" class="center"><input type="checkbox" name="mesin_aakc_2" id="mesin-aakc-2" value="1" class="mr-1"></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="3%">4.</td>
                                                        <td width="60%">Monitor hemodinamik sudah terpasang dan berfungsi bai</td>
                                                        <td width="5%" class="center"><input type="checkbox" name="monitor_aakc_1" id="monitor-aakc-1" value="1" class="mr-1"></td>
                                                        <td width="5%" class="center"><input type="checkbox" name="monitor_aakc_2" id="monitor-aakc-2" value="1" class="mr-1"></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="3%"></td>
                                                        <td width="60%"></td>
                                                        <td width="5%" class="center"><b>Ya</b></td>
                                                        <td width="5%" class="center"><b>Tidak</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="3%">5.</td>
                                                        <td width="60%">Apakah pasien mempunyai riwayat alergi ? </td>
                                                        <td width="5%" class="center"><input type="checkbox" name="apakah_aakc_1" id="apakah-aakc-1" value="1" class="mr-1"></td>
                                                        <td width="5%" class="center"><input type="checkbox" name="apakah_aakc_2" id="apakah-aakc-2" value="1" class="mr-1"></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="3%">6.</td>
                                                        <td width="60%">Apakah pasien mempunyai riwayat asma ? </td>
                                                        <td width="5%" class="center"><input type="checkbox" name="asma_aakc_1" id="asma-aakc-1" value="1" class="mr-1"></td>
                                                        <td width="5%" class="center"><input type="checkbox" name="asma_aakc_2" id="asma-aakc-2" value="1" class="mr-1"></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="3%">7.</td>
                                                        <td width="60%">Kesulitan bernafas / risiko aspirasi dan menggunakan peralatan / bantuan </td>
                                                        <td width="5%" class="center"><input type="checkbox" name="kesulitan_aakc_1" id="kesulitan-aakc-1" value="1" class="mr-1"></td>
                                                        <td width="5%" class="center"><input type="checkbox" name="kesulitan_aakc_2" id="kesulitan-aakc-2" value="1" class="mr-1"></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="3%">8.</td>
                                                        <td width="60%">Risiko kehilangan darah >500 ml (7 ml/kg BB pada anak) </td>
                                                        <td width="5%" class="center"><input type="checkbox" name="darah_aakc_1" id="darah-aakc-1" value="1" class="mr-1"></td>
                                                        <td width="5%" class="center"><input type="checkbox" name="darah_aakc_2" id="darah-aakc-2" value="1" class="mr-1"></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="3%">9.</td>
                                                        <td width="60%">Akses intravena sudah terpasang </td>
                                                        <td width="5%" class="center"><input type="checkbox" name="akses_aakc_1" id="akses-aakc-1" value="1" class="mr-1"></td>
                                                        <td width="5%" class="center"><input type="checkbox" name="akses_aakc_2" id="akses-aakc-2" value="1" class="mr-1"></td>
                                                    </tr>
                                                </table>
                                            </div>

                                            <div class="col-lg-4">
                                                <table class="table table-no-border table-sm table-striped">
                                                    <tr>
                                                        <th colspan="4" style="background-color: #B0E0E6; color: black; text-align: left;">
                                                            <b>TIME OUT :</b>
                                                            <input type="text" name="timeout_aakc" id="timeout-aakc" class="custom-form clear-input d-inline-block" style="width: 80px; margin-left: 5px;">
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4">(Dilakukan sebelum insisi/punksi di ruang prosedur, dipandu oleh perawat sirkuler)</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"></td>
                                                        <td width="5%" class="center"><b>Sudah</b></td>
                                                        <td width="5%" class="center"><b>Belum</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="3%">1.</td>
                                                        <td width="60%">Konfirmasi seluruh anggota tim, nama dan peran masing-masing</td>
                                                        <td width="5%" class="center"><input type="checkbox" name="peran_aakc_1" id="peran-aakc-1" value="1" class="mr-1"></td>
                                                        <td width="5%" class="center"><input type="checkbox" name="peran_aakc_2" id="peran-aakc-2" value="1" class="mr-1"></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="3%">2.</td>
                                                        <td width="60%">Dokter operator, anestesi dan perawat</td>
                                                        <td colspan="2"></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="3%"></td>
                                                        <td width="60%">melakukan konfirmasi secara verbal tentang :</td>
                                                        <td colspan="2"></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="3%"></td>
                                                        <td width="60%">- Nama Pasien <input type="text" name="nama_aakc_1" id="nama-aakc-1"class="custom-form clear-input d-inline-block col-lg-9"></td>
                                                        <td width="5%" class="center"><input type="checkbox" name="nama_aakc_2" id="nama-aakc-2" value="1" class="mr-1"></td>
                                                        <td width="5%" class="center"><input type="checkbox" name="nama_aakc_3" id="nama-aakc-3" value="1" class="mr-1"></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="3%"></td>
                                                        <td width="60%">- Prosedur <input type="text" name="prosedure_aakc_1" id="prosedure-aakc-1"class="custom-form clear-input d-inline-block col-lg-9"></td>
                                                        <td width="5%" class="center"><input type="checkbox" name="prosedure_aakc_2" id="prosedure-aakc-2" value="1" class="mr-1"></td>
                                                        <td width="5%" class="center"><input type="checkbox" name="prosedure_aakc_3" id="prosedure-aakc-3" value="1" class="mr-1"></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="3%"></td>
                                                        <td width="60%">- Lokasi dimana insisi akan dibuat <input type="text" name="lokassie_aakc_1" id="lokassie-aakc-1"class="custom-form clear-input d-inline-block col-lg-6"></td>
                                                        <td width="5%" class="center"><input type="checkbox" name="lokassie_aakc_2" id="lokassie-aakc-2" value="1" class="mr-1"></td>
                                                        <td width="5%" class="center"><input type="checkbox" name="lokassie_aakc_3" id="lokassie-aakc-3" value="1" class="mr-1"></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"></td>
                                                        <td width="5%" class="center"><b>Ya</b></td>
                                                        <td width="5%" class="center"><b>Tidak</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="3%">3.</td>
                                                        <td width="60%">Apakah antibiotik profilaksis sudah diberikan</td>
                                                        <td width="5%" class="center"><input type="checkbox" name="antibiotik_aakc_1" id="antibiotik-aakc-1" value="1" class="mr-1"></td>
                                                        <td width="5%" class="center"><input type="checkbox" name="antibiotik_aakc_2" id="antibiotik-aakc-2" value="1" class="mr-1"></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="3%"></td>
                                                        <td colspan="3">- Nama antibiotik yang diberikan : <input type="text" name="namaantib_aakc" id="namaantib-aakc"class="custom-form clear-input d-inline-block col-lg-7"></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="3%"></td>
                                                        <td colspan="3">- Dosis antibiotik yang diberikan : <input type="text" name="dosies_aakc" id="dosies-aakc"class="custom-form clear-input d-inline-block col-lg-7"></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="3%">4.</td>
                                                        <td colspan="3">Review dokter operator : langkah apa saja yang akan dilakukan bila kondisi kritis atau kejadian yang tidak diharapkan 
                                                            <textarea name="reviiew_dokter" id="reviiew-dokter" cols="10" rows="3" class="form-control clear-input custom-textarea"></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="3%">5.</td>
                                                        <td colspan="3">Review tim anestesi : Apakah ada hal yang perlu diperhatikan pada pasien 
                                                            <textarea name="reviiew_anestesi" id="reviiew-anestesi" cols="10" rows="3" class="form-control clear-input custom-textarea"></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="3%">6.</td>
                                                        <td colspan="3">Review perawat : Apakah instrumen yang digunakan sudah dipastikan Steril dan apakah alat dan bhp yang diperlukan sudah tersedia
                                                            <textarea name="reviiew_perawat" id="reviiew-perawat" cols="10" rows="3" class="form-control clear-input custom-textarea"></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"></td>
                                                        <td width="5%" class="center"><b>Ya</b></td>
                                                        <td width="5%" class="center"><b>Tidak</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="3%">7.</td>
                                                        <td width="60%">Apakah foto rontgen / CT-Scan dan MRI perlu ditayangkan</td>
                                                        <td width="5%" class="center"><input type="checkbox" name="ctscan_aakc_1" id="ctscan-aakc-1" value="1" class="mr-1"></td>
                                                        <td width="5%" class="center"><input type="checkbox" name="ctscan_aakc_2" id="ctscan-aakc-2" value="1" class="mr-1"></td>
                                                    </tr>
                                                </table>
                                            </div>

                                            <div class="col-lg-4">
                                                <table class="table table-no-border table-sm table-striped">
                                                    <tr>
                                                        <th colspan="4" style="background-color: #B0E0E6; color: black; text-align: left;">
                                                            <b>SIGN OUT :</b>
                                                            <input type="text" name="signout_aakc" id="signout-aakc" class="custom-form clear-input d-inline-block" style="width: 80px; margin-left: 5px;">
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4">(Dilakukan sebelum pindah dari ruang prosedur, dipandu oleh perawat sirkuler)</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"></td>
                                                        <td width="5%" class="center"><b>Sudah</b></td>
                                                        <td width="5%" class="center"><b>Belum</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="3%">1.</td>
                                                        <td width="60%">Perawat melakukan komunikasi verbal dengan tim :</td>
                                                        <td width="5%" class="center"><input type="checkbox" name="komunikasie_aakc_1" id="komunikasie-aakc-1" value="1" class="mr-1"></td>
                                                        <td width="5%" class="center"><input type="checkbox" name="komunikasie_aakc_2" id="komunikasie-aakc-2" value="1" class="mr-1"></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="3%"></td>
                                                        <td width="60%">a. Nama prosedur tindakan telah dicatat</td>
                                                        <td width="5%" class="center"><input type="checkbox" name="dicatat_aakc_1" id="dicatat-aakc-1" value="1" class="mr-1"></td>
                                                        <td width="5%" class="center"><input type="checkbox" name="dicatat_aakc_2" id="dicatat-aakc-2" value="1" class="mr-1"></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="3%"></td>
                                                        <td width="60%">b. Instrumen, kasa dan alat sudah dihitung dengan benar</td>
                                                        <td width="5%" class="center"><input type="checkbox" name="benar_aakc_1" id="benar-aakc-1" value="1" class="mr-1"></td>
                                                        <td width="5%" class="center"><input type="checkbox" name="benar_aakc_2" id="benar-aakc-2" value="1" class="mr-1"></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="3%"></td>
                                                        <td width="60%">c. Spesimen telah diberi label (jika ada) dan asal jaringan spesimen</td>
                                                        <td width="5%" class="center"><input type="checkbox" name="spesimen_aakc_1" id="spesimen-aakc-1" value="1" class="mr-1"></td>
                                                        <td width="5%" class="center"><input type="checkbox" name="spesimen_aakc_2" id="spesimen-aakc-2" value="1" class="mr-1"></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"></td>
                                                        <td width="5%" class="center"><b>Ya</b></td>
                                                        <td width="5%" class="center"><b>Tidak</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="3%"></td>
                                                        <td width="60%">d. Adakah masalah dengan peralatan selama tindakan</td>
                                                        <td width="5%" class="center"><input type="checkbox" name="peralatan_aakc_1" id="peralatan-aakc-1" value="1" class="mr-1"></td>
                                                        <td width="5%" class="center"><input type="checkbox" name="peralatan_aakc_2" id="peralatan-aakc-2" value="1" class="mr-1"></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"></td>
                                                        <td width="5%" class="center"><b>Sudah</b></td>
                                                        <td width="5%" class="center"><b>Belum</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="3%">2.</td>
                                                        <td width="60%">Operator dan tim melakukan review masalah utama apa yang harus diperhatikan untuk penyembuhan dan manejemen pasien</td>
                                                        <td width="5%" class="center"><input type="checkbox" name="penyembuhan_aakc_1" id="penyembuhan-aakc-1" value="1" class="mr-1"></td>
                                                        <td width="5%" class="center"><input type="checkbox" name="penyembuhan_aakc_2" id="penyembuhan-aakc-2" value="1" class="mr-1"></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="3%">3.</td>
                                                        <td colspan="3">Pemasangan Implant</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="3%"></td>
                                                        <td colspan="3">- Ada <input type="checkbox" name="ada_aakc_1" id="ada-aakc-1" value="1" class="mr-1 ml-4"></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="3%"></td>
                                                        <td colspan="3">- Tidak ada <input type="checkbox" name="ada_aakc_2" id="ada-aakc-2" value="1" class="mr-1 ml-2"></td>
                                                    </tr>
                                                     <tr>
                                                        <td width="3%">4.</td>
                                                        <td colspan="3">Permasalahan terkait alat selama tindakan yang perlu ditangani</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="3%"></td>
                                                        <td colspan="3">- Tidak ada <input type="checkbox" name="tdada_aakc_1" id="tdada-aakc-1" value="1" class="mr-1 ml-2"></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="3%"></td>
                                                        <td colspan="3">- Ya jelaskan 
                                                            <input type="checkbox" name="ya_aakc_2" id="ya-aakc-2" value="1" class="mr-1 ml-2">
                                                            <textarea name="jelaskan_aakc" id="jelaskan-aakc" cols="10" rows="3" class="form-control clear-input custom-textarea"></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4">Jam verifikasi diisi sesuai waktu dan ditandatangani oleh dokter operator </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="3%"></td>
                                                        <td colspan="3"> Tanggal tindakan : 
                                                            <input type="text" name="tanggal_aakc" id="tanggal-aakc"class="custom-form clear-input d-inline-block col-lg-3">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="3%"></td>
                                                        <td colspan="3"> Jam Verifikasi : 
                                                            <input type="text" name="jamverifikasi_aakc" id="jamverifikasi-aakc"class="custom-form clear-input d-inline-block col-lg-2">
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="row" style="margin-top: -15px;">
                                            <div class="col-lg-4">
                                                <table class="table table-no-border table-sm table-striped">
                                                    <tr>
                                                        <th colspan="4" style="background-color:rgb(237, 242, 243); color: black; text-align: center;">
                                                            <b>DOKTER OPERATOR :</b>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <td class="center" colspan="4"><input type="text" name="dokteroperator2_aakc" id="dokteroperator2-aakc" class="select2c-input ml-2"></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-lg-4">
                                                <table class="table table-no-border table-sm table-striped">
                                                    <tr>
                                                        <th colspan="4" style="background-color:rgb(237, 242, 243); color: black; text-align: center;">
                                                            <b>PERAWAT SIRKULER :</b>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <td class="center" colspan="4"><input type="text" name="perawat_aakc" id="perawat-aakc" class="select2c-input ml-2"></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-lg-4">
                                                <table class="table table-no-border table-sm table-striped">
                                                    <tr>
                                                        <th colspan="4" style="background-color:rgb(237, 242, 243); color: black; text-align: center;">
                                                            <b>DOKTER OPERATOR :</b>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <td class="center" colspan="4"><input type="text" name="dokteroperator3_aakc" id="dokteroperator3-aakc" class="select2c-input ml-2"></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?= form_close() ?>

				<div class="row">
					<table width="100%">
						<tr>
							<td width="79%">
								<div class="col-lg-8">
									<button type="button" class="btn btn-primary mr-1" onclick="simpanAsesmenAwalKepCathlab()" id="btn_simpan"><i class="fas fa-fw fa-plus mr-1"></i>Tambah Form</button>
									<button type="button" class="btn btn-secondary" id="btn_reset"><i class="fas fa-history mr-1"></i>Reset Form</button>
									<button type="button" class="btn btn-success hide" onclick="simpanAsesmenAwalKepCathlab()" id="btn_update_aakc"> <i class="fas fa-edit mr-1"></i>Update Form</button>
								</div>
							</td>
						</tr>
						<tr>
							<td colspan="3">&nbsp;</td>
						</tr>
					</table>
				</div>
				<div class="widget-body mt-4">
					<div class="row">
						<div class="table-responsive">
                            <div class="col-lg">
                                <table class="table table-sm table-striped table-bordered" id="table-list-aakc">
                                    <thead class="text-center" style="background-color:rgb(93, 103, 242); color: white;">
                                        <tr>
                                            <th rowspan="2">No</th>
                                            <th rowspan="2">Tanggal</th>
                                            <th rowspan="2">Nama Pasien</th>
                                            <th colspan="2"><b>SIGN IN</b></th>
                                            <th colspan="2"><b>TIME OUT</b></th>
                                            <th colspan="2"><b>SIGN OUT</b></th>
                                            <th width="15%" rowspan="2">Alat</th>
                                        </tr>
                                        <tr>
                                            <th>Jam</th>
                                            <th>Dokter Operator</th>
                                            <th>Jam</th>
                                            <th>Perawat Sirkuler</th>
                                            <th>Jam</th>
                                            <th>Dokter Operator</th>
                                        </tr>
                                    </thead>
								    <tbody></tbody>
                                </table>
                            </div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
			</div>
		</div>
	</div>
</div>
