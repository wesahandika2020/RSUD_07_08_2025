<script>
	function resumeMedis(id, id_layanan_pendaftaran) {
		$.ajax({
			type: 'GET',
			url: '<?= base_url('intensive_care/api/intensive_care/resume_medis') ?>/id/' + id + '/id_layanan_pendaftaran/' + id_layanan_pendaftaran,
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {

				$('#table-kontrol-resume tbody').empty();
				$('#table-terapi-rm tbody').empty();

				// Set values in Resume Medis Modal
				$('#modal-resume-medis-title').html(`<b>Form Resume Medis</b> | No. RM: ${data.pendaftaran_detail.pasien.no_rm}, Nama: ${data.pendaftaran_detail.pasien.nama}, <i class="alert alert-info"><i class="fas fa-phone-square"></i> : <b>${data.pendaftaran_detail.pasien.telp}</b></i>`);
				$('#id-layanan-pendaftaran-resume').val(id_layanan_pendaftaran);

				$('#rm_id_layanan_pendaftaran').val(id_layanan_pendaftaran);
				$('#rm-id-pendaftaran').val(id);

				if (data.pendaftaran_detail.pasien !== null) {
					$('#resume_id_pasien').val(data.pendaftaran_detail.pasien.id_pasien);
					$('#resume_pasien_nama').text(data.pendaftaran_detail.pasien.nama);
					$('#resume_pasien_no_rm').text(data.pendaftaran_detail.pasien.no_rm);
					$('#resume_pasien_tanggal_lahir').text((data.pendaftaran_detail.pasien.tanggal_lahir !== null ? datefmysql(data.pendaftaran_detail.pasien.tanggal_lahir) : '-') + (' (' + hitungUmur(data.pendaftaran_detail.pasien.tanggal_lahir) + ')'));
					$('#resume_pasien_jenis_kelamin').text((data.pendaftaran_detail.pasien.kelamin === 'L' ? 'Laki - laki' : 'Perempuan'));
				}

				$('#resume_bed').text(data.resume_medis.ruangan + ' Kelas ' + data.resume_medis.kelas + ' Ruang ' + data.resume_medis.no_ruang + ' No.Bed ' + data.resume_medis.no_bed);
				$('#tanggal-masuk-rm').val(datetimefmysql(data.resume_medis.tgl_masuk));
				$('#tanggal-keluar-rm').val(datetimefmysql(data.resume_medis.tgl_keluar));
				$('#tanggal-keluar-rm').val(datetimefmysql(data.resume_medis.tgl_keluar));
				$('#ruang-rawat-terakhir-rm').val(data.resume_medis.ruangan);
				$('#pemeriksaan-fisik').val((data.resume_medis.pemeriksaan_fisik === null ? "" : data.resume_medis.pemeriksaan_fisik));
				$('#penunjang-diagnostik').val((data.resume_medis.penunjang_diagnostik === null ? "" : data.resume_medis.penunjang_diagnostik));
				$('#ringkasan-riwayat').val((data.resume_medis.ringkasan_riwayat === null ? "" : data.resume_medis.ringkasan_riwayat));
				$('#tanggung-jawab-pembayaran-rm').val(data.resume_medis.penjamin);
				$('#diagnosis-waktu-masuk-rm').html(data.diag_awal === "" ? data.diag_manual : data.diag_awal);
				$('#hasil-konsultasi-rm').val(data.resume_medis.hasil_konsultasi);
				$('#alergi-rm').val(data.resume_medis.alergi_obat);
				$('#hasil-laboratoraium-rm').val(data.resume_medis.pending_lab);
				$('#diet-rm').val(data.resume_medis.diet);
				$('#instruksi-rm').val(data.resume_medis.anjuran_edukasi);

				$('#ringkasan-riwayat-penyakit-rm').html(`${(data.resume_medis.keluhan_utama == null ? "" : "Keluhan Utama: "+data.resume_medis.keluhan_utama+`<br>`)}
                ${(data.resume_medis.subject == null ? "" : data.resume_medis.subject)}`);
				$('#pemeriksaan-fisik-rm').html(`
                    ${(data.resume_medis.sistolik == null ? "" : "Tensi Sistolik: "+data.resume_medis.sistolik+" mmHg. ")}
                    ${(data.resume_medis.suhu == null ? "" : "Suhu: "+data.resume_medis.suhu+"℃. ")}
                    ${(data.resume_medis.rr == null ? "" : "Respirasi: "+data.resume_medis.rr+"/Mnt. ")}
                    ${(data.resume_medis.tinggi_badan_ranap == null ? "" : "TB: "+data.resume_medis.tinggi_badan_ranap+" cm. "+`<br>`)}
                    ${(data.resume_medis.diastolik == null ? "" : "Tensi DIastolik: "+data.resume_medis.diastolik+" mmHg. ")}
                    ${(data.resume_medis.nadi == null ? "" : "Nadi: "+data.resume_medis.nadi+"/Mnt. ")}
                    ${(data.resume_medis.nps == null ? "" : "Nafas: "+data.resume_medis.nps+"/Mnt. ")}
                    ${(data.resume_medis.berat_badan_ranap == null ? "" : "BB: "+data.resume_medis.berat_badan_ranap+" Kg. "+`<br>`)}
                    ${(data.resume_medis.objective == null ? "" : data.resume_medis.objective+`<br>`)}
                    ${(data.resume_medis.assessment == null ? "" : data.resume_medis.assessment+`<br>`)}
                    ${(data.resume_medis.plan == null ? "" : data.resume_medis.plan)}`);
				$('#pemeriksaan-penunjang-rm').html(

				);

				const diagUtamaRm = [...data.diagnosa_utama, ...data.ds_manual_utama].sort((a,b) => b.id_layanan_pendaftaran - a.id_layanan_pendaftaran)[0]?.nama;

				$('#diagnosis-utama-rm').html(diagUtamaRm);
				$('#diagnosis-sekunder-rm').html(
					data?.diagnosa_sekunder?.map(diag => `${diag.nama}<br>`)?.join('') +
					(data.ds_manual_sekunder == null ? "" : data?.ds_manual_sekunder?.map(diag => `${diag.nama}<br>`)?.join(''))
				);

				if(data.cek_obat !== undefined){

					if(data.cek_obat.length > 0){

						let cekDataObat = data.cek_obat;

						let arrDatObat = new Array();

						let uniqueObat = '';

						$.each(cekDataObat, function(i, j) {

							// namaObat = j.nama_lengkap;

							// freeSpasiObat = namaObat.replace(/\s+/g, " ");

							// if(j.aturan_pakai !== '' && (j.aturan_pakai_manual === null || j.aturan_pakai_manual === '0')){
							// 	freeSpasiObat += ' (' + j.aturan_pakai + ')';
							// }

							// if(j.aturan_pakai_manual !== null || j.aturan_pakai_manual !== '0'){
							// 	freeSpasiObat += ' (' + j.aturan_pakai + ')';
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

				if(data.tindakan !== undefined){

					if(data.tindakan.length > 0){

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

						if(data.tindakan_ok.length > 0){

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

						if(uniqueOK === ''){

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

				$('#kondisi-keluar-rm').html((data.resume_medis.cara_keluar == null ? `-` : `<b>` + data.resume_medis.cara_keluar + `</b>`));

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

				if(obj !== null){

					statusLab = data.status_lab;

					if(statusLab === false){

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

						if(obj !== null){

							let noS = 0;
							pesanLab = data.pesan_lab;

							rOption = ` <tr>
                                            <td><label id="ono-pesan">${obj[0][0].ono} ${pesanLab[0]}</label></td>
                                        </tr>
                                        `;

							$.each(obj, function(i, value) {

								if(obj[i][0].flag !== 'N'){

									if(i !== noS){

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

						function urutan(maSuk)
						{

							iVal.push(maSuk);
							return iVal.sort(function(a,b)
							{
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

							for(let n=0; n < keyGroup.length; n++){

								for(let o=0; o < objectGroup[n].length; o++){

									if(objectGroup[n][o].flag !== ''){

										if(objectGroup[n][o].flag !== 'N'){

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

							let dateRelease = tanggalR +'/'+ bulanR +'/' + tahunR;

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

								var groupedOtname = groupAndSort(e, "order_testnm", "order_testnm");

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
											return parseFloat(a.disp_seq.replace(/[_]/g, "")) - parseFloat(b.disp_seq.replace(/[_]/g, ""));
										};
										const sortByAge = arr => {
											arr.sort(sorter);
										};

										sortByAge(m);

										$.each(m, function(y, z) {

											if(Array.isArray(z.nama) && !z.nama.length){

												rlab += /* html */ `

                                                    <td style="padding-left:80px;" class="v-center"></td>

                                                `;

											} else {

												$.each(z.nama, function(n, o) {

													if(o.nama === 'Hitung Jenis'){
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

											mFlag = `<td style="color:red;" class="v-center center">${z.flag}</td>`;

											if(z.unit === '' && z.ref_range === ''){

												if(z.result_value.length < 10){

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

				if(dataRadiologi !== undefined){

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

					let tanggalKontrol = v.tanggal;

					var myDaysKontrol = ['Ahad', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];

					function dateTimeKontrol(waktu) {
						var el = waktu.split(' ');
						var tgl = date2mysql(el[0]);
						return tgl;
					}

					function timeAjaKontrol(waktu) {
						var el = waktu.split(' ');
						var tgl = date2mysql(el[0]);
						var tm = el[1].split(':');
						return tm[0] + ':' + tm[1];
					}

					function tanggalAjaKontrol(waktu) {
						if (waktu !== undefined && waktu !== null && waktu !== 'null') {
							var el = waktu.split(' ');
							var elem = el[0].split('-');
							var tahun = elem[0];
							var bulan = elem[1];
							var hari = elem[2];
							return hari + '/' + bulan + '/' + tahun;
						} else {
							return '';
						}
					}

					function formatTanggalKontrol(waktu) {

						var el = waktu.split(' ');
						var elem_tgl = el[0].split('-');
						var elem_waktu = el[1];
						var tahun = elem_tgl[0];
						var bulan = elem_tgl[1];
						var hari = elem_tgl[2];
						return hari + '/' + bulan + '/' + tahun + ' ' + elem_waktu;
					}

					var tanggalBaru = formatTanggalKontrol(tanggalKontrol);
					var cariHari = dateTimeKontrol(tanggalBaru);
					var cariJam = timeAjaKontrol(tanggalKontrol);
					var hariTsb = new Date(cariHari);
					var ambilHari = hariTsb.getDay(),
						ambilHari = myDaysKontrol[ambilHari];
					var ambilTanggal = tanggalAjaKontrol(tanggalKontrol);

					let html = /* html */ `
                        <tr>
                            <td class="number-kontrol" align="center">${i+1}</td>
                            <td align="center">${ambilTanggal}</td>
                            <td align="center">${ambilHari}</td>
                            <td align="center">${cariJam}</td>
                            <td align="center">${((v.dokter !== null) ? v.dokter : '')}</td>
                            <td align="center">${((v.tempat_kontrol !== null) ? v.tempat_kontrol : '')}</td>
							<td align="center">
                                <button type="button" class="btn btn-secondary btn-xs" onclick="hapusKontrolKembaliRM(this, ${v.id}, ${data.kontrol_resume_keperawatan[i]?.id})"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                    `;
					$('#table-kontrol-resume tbody').append(html);
				})


				$.each(data.terapi_resume, function(i, v) {

					html = /* html */ `
                        <tr>
                            <td class="number-terapi" align="center">${i+1}</td>
                            <td align="center">${v.obat_rm}</td>
                            <td align="center">${v.jumlah_obat}</td>
                            <td align="center">${v.dosis}</td>
                            <td align="center">${v.frekuensi}</td>
                            <td align="center">${v.cara_pemberian}</td>
                            <td align="center">${!v.ek_jam_pemberian ? '-' : v.ek_jam_pemberian}</td>
                            <td align="center">${!v.ek_jam_pemberian_satu ? '-' : v.ek_jam_pemberian_satu}</td>
                            <td align="center">${!v.ek_jam_pemberian_dua ? '-' : v.ek_jam_pemberian_dua}</td>
                            <td align="center">${!v.ek_jam_pemberian_tiga ? '-' : v.ek_jam_pemberian_tiga}</td>
                            <td align="center">${!v.ek_jam_pemberian_empat ? '-' : v.ek_jam_pemberian_empat}</td>
                            <td align="center">${!v.ek_jam_pemberian_lima ? '-' : v.ek_jam_pemberian_lima}</td>
                            <td align="center">${v.petunjuk_khusus}</td>
                            <td align="center"><input type="hidden" name="trp_users[]" value="<?= $this->session->userdata("id_translucent") ?>"><?= $this->session->userdata("nama") ?><input type="hidden" name="tanggal_dibuat[]" value="<?= date("Y-m-d H:i:s") ?>"></td>
                            <td align="center">
                                <button type="button" class="btn btn-secondary btn-xs" onclick="hapusTerapiResume(this, ${v.id}, ${data.terapi_resume_keperawatan[i]?.id})"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>

                    `;

					if(data.resume_medis?.id_rmr){
						$('#btn_xetak').show();
						$('#modal-resume-medis #btn_simpan').html('<i class="fas fa-pencil-alt mr-1"></i>Update');
					}else{
						$('#btn_xetak').hide();
						$('#modal-resume-medis #btn_simpan').html('<i class="fas fa-fw fa-save mr-1"></i>Simpan');
					}

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
	function addTerapiRM() {
		if ($('#obat_rm').val() === '') {
			syams_validation('#obat_rm', 'Pilihan Obat harus diisi.');
			return false;
		}

		if ($('#jumlah-obat_rm').val() === '') {
			syams_validation('#jumlah-obat_rm', 'Pilihan Jumlah Obat harus diisi.');
			return false;
		}

		let html = '';
		let number = $('.number-terapi').length;
		let obat_rm = $('#s2id_obat_rm a .select2c-chosen').html();
		let id_obat_rm = $('#obat_rm').val();
		let jumlah_obat_rm = $('#jumlah-obat-rm').val();
		let dosis_rm = $('#dosis-rm').val();
		let frekuensi_rm = $('#frekuensi-rm').val();
		let cara_pemberian_rm = $('#cara-pemberian-rm').val();
		let ek_jam_pemberian_rm = $('#ek_jam_pemberian_rm').val();
		let ek_jam_pemberian_satu_rm = $('#ek_jam_pemberian_satu_rm').val();
		let ek_jam_pemberian_dua_rm = $('#ek_jam_pemberian_dua_rm').val();
		let ek_jam_pemberian_tiga_rm = $('#ek_jam_pemberian_tiga_rm').val();
		let ek_jam_pemberian_empat_rm = $('#ek_jam_pemberian_empat_rm').val();
		let ek_jam_pemberian_lima_rm = $('#ek_jam_pemberian_lima_rm').val();
		let petunjuk_khusus_rm = $('#petunjuk-khusus-rm').val();


		html = /* html */ `
            <tr>
                <td class="number-terapi" align="center">${++number}</td>
                <td align="center"><input type="hidden" name="id_obat_rm[]" value="${id_obat_rm}">${obat_rm}</td>
                <td align="center"><input type="hidden" name="jumlah_obat_rm[]" value="${jumlah_obat_rm}">${jumlah_obat_rm}</td>
                <td align="center"><input type="hidden" name="dosis_rm[]" value="${dosis_rm}">${dosis_rm}</td>
                <td align="center"><input type="hidden" name="frekuensi_rm[]" value="${frekuensi_rm}">${frekuensi_rm}</td>
                <td align="center"><input type="hidden" name="cara_pemberian_rm[]" value="${cara_pemberian_rm}">${cara_pemberian_rm}</td>
                <td align="center"><input type="hidden" name="ek_jam_pemberian_rm[]" value="${ek_jam_pemberian_rm}">${ek_jam_pemberian_rm}</td>
                <td align="center"><input type="hidden" name="ek_jam_pemberian_satu_rm[]" value="${ek_jam_pemberian_satu_rm}">${ek_jam_pemberian_satu_rm}</td>
                <td align="center"><input type="hidden" name="ek_jam_pemberian_dua_rm[]" value="${ek_jam_pemberian_dua_rm}">${ek_jam_pemberian_dua_rm}</td>
                <td align="center"><input type="hidden" name="ek_jam_pemberian_tiga_rm[]" value="${ek_jam_pemberian_tiga_rm}">${ek_jam_pemberian_tiga_rm}</td>
                <td align="center"><input type="hidden" name="ek_jam_pemberian_empat_rm[]" value="${ek_jam_pemberian_empat_rm}">${ek_jam_pemberian_empat_rm}</td>
                <td align="center"><input type="hidden" name="ek_jam_pemberian_lima_rm[]" value="${ek_jam_pemberian_lima_rm}">${ek_jam_pemberian_lima_rm}</td>
                <td align="center"><input type="hidden" name="petunjuk_khusus_rm[]" value="${petunjuk_khusus_rm}">${petunjuk_khusus_rm}</td>
                <td align="center"><input type="hidden" name="trp_users[]" value="<?= $this->session->userdata("id_translucent") ?>"><?= $this->session->userdata("nama") ?><input type="hidden" name="created_date[]" value="<?= date("Y-m-d H:i:s") ?>"></td>
                <td align="center">
                    <button type="button" class="btn btn-secondary btn-xxs" onclick="removeList(this)"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
        `;
		$('#table-terapi-rm tbody').append(html);
	}

	$('#obat_rm').select2c({
		minimumInputLength: 2,
		ajax: {
			url: "<?= base_url('masterdata/api/masterdata_auto/obat_untuk_keperawatan') ?>",
			dataType: 'json',
			quietMillis: 100,
			data: function(term, page) { // page is the one-based page number tracked by Select2

				return {
					q: term, //search term
					page: page // page number
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



	// CPPRI IC WH
	$('#ek_kontrol_dokter_resume').datetimepicker({
		format: 'DD/MM/YYYY HH:mm',
		pickSecond: false,
		pick12HourFormat: false,
		maxDate: new Date(new Date().getFullYear(), new Date().getMonth() + 2, 0),
		beforeShow: function(i) {
			if ($(i).attr('readonly')) {
				return false;
			}
		}

	});








	// let currentDate = new Date();
	// $('#ek_kontrol_dokter_resume').datetimepicker({
	// 	format: 'DD/MM/YYYY HH:mm',
	// 	pickSecond: false,
	// 	pick12HourFormat: false,
	// 	maxDate: new Date(currentDate.getFullYear(), currentDate.getMonth() + 2, 0),
	// 	beforeShow: function(i) {
	// 		if ($(i).attr('readonly')) {
	// 			return false;
	// 		}
	// 	}

	// });





	$('#ek_nama_dokter_resume').select2c({
		ajax: {
			url: "<?= base_url('masterdata/api/masterdata_auto/dokter_auto') ?>",
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
			var markup = '<b>' + data.nama + '</b><br/><i>' + data.spesialisasi + '</i>';
			return markup;
		},
		formatSelection: function(data) {
			return data.nama;
		}
	});

	$('#ek_jam_pemberian_rm, #ek_jam_pemberian_satu_rm, #ek_jam_pemberian_dua_rm, #ek_jam_pemberian_tiga_rm, #ek_jam_pemberian_empat_rm, #ek_jam_pemberian_lima_rm').on('click', function(){
		$(this).timepicker({
			format: 'HH:mm',
			showInputs: false,
			showMeridian: false
		});
	})

	function addJadwalKontrolResume() {
		if ($('#ek_kontrol_dokter_resume').val() === '') {
			syams_validation('#ek_kontrol_dokter_resume', 'Tanggal Kontrol Dokter harus diisi.');
			return false;
		}

		if ($('#ek_nama_dokter_resume').val() === '') {
			syams_validation('#ek_nama_dokter_resume', 'Pilihan Nama Dokter harus diisi.');
			return false;
		}

		let html = '';
		let number = $('.number-kontrol').length;
		let tanggal_kontrol = $('#ek_kontrol_dokter_resume').val();
		let ek_nama_dokter = $('#s2id_ek_nama_dokter_resume a .select2c-chosen').html();
		let id_ek_nama_dokter = $('#ek_nama_dokter_resume').val();
		let ek_tempat_kontrol = $('#ek_tempat_kontrol').val();
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
			return s_tgl[2] + '-' + s_tgl[1] + '-' + s_tgl[0] + ' ' + tm[0] + ':' + tm[1] + ':' + '00';
		}

		var cariHariKontrol = dateTime(tanggal_kontrol);
		var cari_jam_kontrol = timeAja(tanggal_kontrol);
		var hari_kontrol = new Date(cariHariKontrol);
		var ambil_hari_kontrol = hari_kontrol.getDay(),
			ambil_hari_kontrol = myDays[ambil_hari_kontrol];
		var ambil_tanggal_kontrol = tanggalAja(tanggal_kontrol);
		var entri_tanggal_kontrol = takeTanggal(tanggal_kontrol);

		html = /* html */ `
            <tr>
                <td class="number-kontrol" align="center">${++number}</td>
                <td align="center"><input type="hidden" name="ambil_tanggal_kontrol[]" value="${entri_tanggal_kontrol}">${ambil_tanggal_kontrol}</td>
                <td align="center"><input type="hidden" name="ambil_hari_kontrol[]" value="${ambil_hari_kontrol}">${ambil_hari_kontrol}</td>
                <td align="center"><input type="hidden" name="cari_jam_kontrol[]" value="${cari_jam_kontrol}">${cari_jam_kontrol}</td>
                <td align="center"><input type="hidden" name="ek_nama_dokter_resume[]" value="${id_ek_nama_dokter}">${ek_nama_dokter}</td>
                <td align="center"><input type="hidden" name="ek_tempat_kontrol[]" value="${ek_tempat_kontrol}">${ek_tempat_kontrol}</td>
                <td align="center"><input type="hidden" name="ek_operator[]" value="<?= $this->session->userdata("id_translucent") ?>"><?= $this->session->userdata("nama") ?><input type="hidden" name="tanggal_dibuat[]" value="<?= date("Y-m-d H:i:s") ?>"></td>
                <td align="right">
                    <button type="button" class="btn btn-secondary btn-xxs" onclick="removeList(this)"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>

        `;
		$('#table-kontrol-resume tbody').append(html);
	}

	function simpanResumeMedisRanap() {
		const id = $('#id-layanan-pendaftaran-resume').val();
		const id_daftar = $('#rm-id-pendaftaran').val();
		$.ajax({
			type: 'POST',
			url: '<?= base_url("intensive_care/api/intensive_care/simpan_resume_medis_intensive_care") ?>',
			data: $('#form-modal-resume-medis').serialize(),
			cache: false,
			dataType: 'JSON',
			beforeSend: function() {
				showLoader();
			},
			success: function(data) {
				if (data.status) {
					messageCustom(data.message, 'Success');
					$('#btn_xetak').show();
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

	function hapusKontrolKembaliRM(obj, id, idKeperawatan) {
		bootbox.dialog({
			message: "Anda yakin akan menghapus data ini?",
			title: "Hapus Data",
			buttons: {
				batal: {
					label: '<i class="fas fa-times-circle mr-1"></i>Batal',
					className: "btn-secondary",
					callback: function() {

					}
				},
				hapus: {
					label: '<i class="fas fa-trash-alt mr-1"></i>Hapus',
					className: "btn-info",
					callback: function() {
						$.ajax({
							type: 'DELETE',
							url: '<?= base_url("intensive_care/api/intensive_care/hapus_kontrol_kembali_rm") ?>/' + id + '/' + idKeperawatan,
							cache: false,
							dataType: 'JSON',
							success: function(data) {
								if (data.status) {
									messageCustom(data.message, 'Success');
									removeList(obj);
								} else {
									customAlert('Hapus Kontrol Kembali', data.message);
								}
							},
							error: function(e) {
								messageDeleteFailed();
							}
						});
					}
				}
			}
		});
	}

	function hapusTerapiResume(obj, id,idKeperawatan) {
		bootbox.dialog({
			message: "Anda yakin akan menghapus data ini?",
			title: "Hapus Data",
			buttons: {
				batal: {
					label: '<i class="fas fa-times-circle mr-1"></i>Batal',
					className: "btn-secondary",
					callback: function() {

					}
				},
				hapus: {
					label: '<i class="fas fa-trash-alt mr-1"></i>Hapus',
					className: "btn-info",
					callback: function() {
						$.ajax({
							type: 'DELETE',
							url: '<?= base_url("intensive_care/api/intensive_care/hapus_terapi_pulang_rm") ?>/' + id + '/' + idKeperawatan,
							cache: false,
							dataType: 'JSON',
							success: function(data) {
								if (data.status) {
									messageCustom(data.message, 'Success');
									removeList(obj);
								} else {
									customAlert('Hapus Terapi Pulang', data.message);
								}
							},
							error: function(e) {
								messageDeleteFailed();
							}
						});
					}
				}
			}
		});
	}

	function cetakResumeMedisIntensiveCare(){
		const id = $('#id-layanan-pendaftaran-resume').val();
		const id_daftar = $('#rm-id-pendaftaran').val();

		const dWidth = $(window).width();
		const dHeight = $(window).height();
		const x = screen.width / 2 - dWidth / 2;
		const y = screen.height / 2 - dHeight / 2;

		window.open('<?= base_url('intensive_care/cetak_resume_medis_intensive_care/') ?>' + id + '/' + id_daftar, 'Cetak Formulir Resume Medis Intensive Care', 'width=' + dWidth + ', height=' + dHeight + ', left=' + x + ', top=' + y);

		$('#modal-resume-medis').modal('hide');
	}
</script>

<!-- Modal -->
<div class="modal fade" id="modal-resume-medis" data-backdrop="static">
	<div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%;">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">
					<h5 class="modal-title bold" id="modal-resume-medis-title"></h5>
				</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true" style="font-size: 16pt;">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?= form_open('', 'id=form-modal-resume-medis class="form-horizontal"') ?>
				<input type="hidden" name="id_layanan_pendaftaran_resume" id="id-layanan-pendaftaran-resume">
				<input type="hidden" name="id_layanan_pendaftaran" id="rm_id_layanan_pendaftaran">
				<input type="hidden" name="id_pendaftaran" id="rm-id-pendaftaran">
				<input type="hidden" name="id_bed" id="ek-id-bed">
				<input type="hidden" name="ek_id_pasien" id="ek_id_pasien">
				<input type="hidden" name="ek_jenis_layanan" value="Rawat Inap" id="ek-jenis-layanan">
				<input type="hidden" name="id_users" id="ek-id-users" <?php $nama = $this->session->userdata('nama');
				$nama_js = json_encode($nama); ?> value=<?php echo $nama_js; ?>>
				<input type="hidden" name="id_dpjp_utama_pagi_hidden" id="id-dpjp-utama-pagi-hidden">
				<input type="hidden" name="id_dokter_dpjp_sore_hidden" id="id-dokter-dpjp-sore-hidden">
				<input type="hidden" name="id_dokter_dpjp_malam_hidden" id="id-dokter-dpjp-malam-hidden">
				<input type="hidden" name="id_perawat_mengover_pagi_hidden" id="id-perawat-mengover-pagi-hidden">
				<input type="hidden" name="id_perawat_menerima_pagi_hidden" id="id-perawat-menerima-sore-hidden">
				<input type="hidden" name="id_perawat_mengover_sore_hidden" id="id-perawat-mengover-sore-hidden">
				<input type="hidden" name="id_perawat_menerima_sore_hidden" id="id-perawat-menerima-sore-hidden">
				<input type="hidden" name="id_perawat_mengover_malam_hidden" id="id-perawat-menover-malam-hidden">
				<input type="hidden" name="id_perawat_penerima_malam_hidden" id="id-perawat-menerima-malam-hidden">

				<!-- header -->
				<div class="row">
					<div class="col-lg-12">
						<div class="table-responsive">
							<table class="table table-sm table-striped">
								<tr>
									<td width="25%" class="bold">Nama Pasien</td>
									<td wdith="80%">: <span id="resume_pasien_nama"></span></td>
								</tr>
								<tr>
									<td class="bold">No. RM</td>
									<td>: <span id="resume_pasien_no_rm"></span></td>
								</tr>
								<tr>
									<td class="bold">Tanggal Lahir</td>
									<td>: <span id="resume_pasien_tanggal_lahir"></span></td>
								</tr>
								<tr>
									<td class="bold">Jenis Kelamin</td>
									<td>: <span id="resume_pasien_jenis_kelamin"></span></td>
								</tr>
								<tr>
									<td class="bold">Ruang Rawat/Unit Kerja</td>
									<td>: <span id="resume_bed"></span></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<!-- end header -->

				<!-- content -->
				<div class="row">
					<div class="col-lg-12">
						<div class="widget-body">
							<div id="wizard_form_ranap">
								<div class="form-modal-resume-medis">
									<table class="table table-no-border table-sm table-striped">
										<tr>
											<td width="25%"><b>Tanggal Masuk</b></td>
											<td width="1%"><b>:</b></td>
											<td>
												<input type="text" class="custom-form" id="tanggal-masuk-rm" disabled>
											</td>
										</tr>
										<tr>
											<td width="25%"><b>Tanggal Keluar / Meninggal</b></td>
											<td width="1%"><b>:</b></td>
											<td>
												<input type="text" class="custom-form" id="tanggal-keluar-rm" disabled>
											</td>
										</tr>
										<tr>
											<td width="25%"><b>Ruang Rawat Terakhir</b></td>
											<td width="1%"><b>:</b></td>
											<td>
												<input type="text" class="custom-form" id="ruang-rawat-terakhir-rm" disabled>
											</td>
										</tr>
										<tr>
											<td width="25%"><b>Tanggung Jawab Pembayaran</b></td>
											<td width="1%"><b>:</b></td>
											<td>
												<input type="text" class="custom-form" id="tanggung-jawab-pembayaran-rm" disabled>
											</td>
										</tr>
										<tr>
											<td width="25%"><b>Diagnosis / Masalah Waktu Masuk</b></td>
											<td width="1%"><b>:</b></td>
											<td>
												<label id="diagnosis-waktu-masuk-rm"></label>
											</td>
										</tr>
										<tr>
											<td width="25%"></td>
											<td width="1%"></td>
											<td>
												<label id="data-resume-radiologi"></label>
											</td>
										</tr>
										<tr>
											<td width="25%"><b>Ringkasan Riwayat Penyakit</b></td>
											<td width="1%"><b>:</b></td>
											<td>
												<textarea name="ringkasan_riwayat" id="ringkasan-riwayat" class="form-control" rows="4"></textarea>
											</td>
										</tr>
										<tr>
											<td width="25%"><b>Pemeriksaan Fisik</b></td>
											<td width="1%"><b>:</b></td>
											<td>
												<textarea name="pemeriksaan_fisik" id="pemeriksaan-fisik" class="form-control" rows="4"></textarea>
											</td>
										</tr>
									</table>
									<table class="table table-no-border table-sm table-striped">
										<tr>
											<td width="25%"><b>Terapi / Pengobatan Selama di Rumah Sakit</b></td>
											<td width="1%"><b>:</b></td>
											<td>
												<div id="terapi-pengobatan"></div>
											</td>
										</tr>
									</table>
									<!-- <table class="table table-no-border table-sm table-striped">
										<tr>
											<td width="100%"><b>Pemeriksaan Penunjang / Diagnostik Terpenting</b></td>
											</td>
										</tr>
										<tr>
											<td width="100%">
												<div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordionExample">
						                            <div class="card-body">
						                                <div class="row">
						                                    <div class="col-lg-12">
						                                        <div class="box-well">
						                                        	<div id="resume-hasil-laboratorium"></div>
						                                        </div>
						                                        <div class="box-well">
						                                        	<div id="resume-hasil-radiologi"></div>
						                                        </div>
						                                    </div>
						                                </div>
						                            </div>
						                        </div>
						                     </td>
										</tr>
									</table> -->
									<table class="table table-no-border table-sm table-striped">
										<tr>
											<td width="25%"><b>Hasil Konsultasi</b></td>
											<td width="1%"><b>:</b></td>
											<td>
												<input type="text" name="hasil_konsultasi_rm" class="custom-form" id="hasil-konsultasi-rm">
											</td>
										</tr>
										<tr>
											<td width="25%"><b>Diagnosis Utama</b></td>
											<td width="1%"><b>:</b></td>
											<td>
												<label id="diagnosis-utama-rm"></label>
												<!-- <input type="text" class="custom-form" id="diagnosis-utama-rm"> -->
											</td>
										</tr>
										<tr>
											<td width="25%"><b>Diagnosis Sekunder</b></td>
											<td width="1%"><b>:</b></td>
											<td>
												<label id="diagnosis-sekunder-rm"></label>
												<!-- <label id="ds-manual-sekunder-rm"></label> -->
												<!-- <input type="text" class="custom-form" id="diagnosis-sekunder-rm"> -->
											</td>
										</tr>
										<tr>
											<td width="25%"><b>Tindakan / Prosedur</b></td>
											<td width="1%"><b>:</b></td>
											<td>
												<label id="tindakan-rm"></label>
												<!-- <input type="text" class="custom-form" id="tindakan-rm"> -->
											</td>
										</tr>
										<tr>
											<td width="25%"><b>Pemeriksaan Penunjang / Diagnostik terpenting (input)</b></td>
											<td width="1%"><b>:</b></td>
											<td>
												<input type="text" name="penunjang_diagnostik" class="custom-form" id="penunjang-diagnostik">
											</td>
										</tr>
										<tr>
											<td width="25%"><b>Alergi (Reaksi Obat)</b></td>
											<td width="1%"><b>:</b></td>
											<td>
												<input type="text" name="alergi_obat_rm" class="custom-form" id="alergi-rm">
											</td>
										</tr>
										<tr>
											<td width="25%"><b>Hasil Penunjang Belum Selesai (Pending)</b></td>
											<td width="1%"><b>:</b></td>
											<td>
												<input type="text" name="pending_lab" class="custom-form" id="hasil-laboratoraium-rm">
											</td>
										</tr>
										<tr>
											<td width="25%"><b>Diet</b></td>
											<td width="1%"><b>:</b></td>
											<td>
												<input type="text" name="diet_rm" class="custom-form" id="diet-rm">
											</td>
										</tr>
										<tr>
											<td width="25%"><b>Instruksi / Anjuran dan Edukasi (Follow Up)</b></td>
											<td width="1%"><b>:</b></td>
											<td>
												<input type="text" name="anjuran_edukasi_rm" class="custom-form" id="instruksi-rm">
											</td>
										</tr>
										<tr>
											<td width="25%"><b>Kondisi Waktu Keluar</b></td>
											<td width="1%"><b>:</b></td>
											<td>
												<label id="kondisi-keluar-rm"></label>
											</td>
										</tr>
										<tr>
											<td width="25%"><b>Pengobatan Dilanjutkan</b></td>
											<td width="1%"><b>:</b></td>
											<td>
												<input type="radio" disabled name="pengobatan_dilanjutkan" id="poliklinik-rm" value="Poliklinik" class="mr-1"><b>Poliklinik</b>
												<input type="radio" disabled name="pengobatan_dilanjutkan" id="rs-lain-rm" value="RS Lain" class="mr-1 ml-2"><b>RS Lain</b>
												<input type="radio" disabled name="pengobatan_dilanjutkan" id="puskesmas-rm" value="Puskesmas" class="mr-1 ml-2"><b>Puskesmas</b>
												<input type="radio" disabled name="pengobatan_dilanjutkan" id="dokter-luar-rm" value="Dokter Luar" class="mr-1 ml-2"><b>Dokter Luar</b>
											</td>
										</tr>
									</table>

									<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
										<tr>
											<td colspan="3" class="center bold td-dark">
												<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-kontrol-kembali-resume"><i class="fas fa-expand mr-1"></i>Expand</button>TANGGAL KONTROL POLIKLIKNIK
											</td>
										</tr>
									</table>

									<div class="collapse multi-collapse mt-2" id="data-kontrol-kembali-resume">
										<table class="table table-no-border table-sm table-striped">
											<tr>
												<td width="2%"></td>
												<td width="15%"><b>Tanggal Kontrol</b></td>
												<td width="2%">:</td>
												<td>
													<div class="input-group">
														<input type="text" name="ek_kontrol_dokter_resume" id="ek_kontrol_dokter_resume" class="custom-form clear-input d-inline-block col-lg-4">
													</div>
												</td>
											</tr>
											<tr>
												<td></td>
												<td><b>Nama Dokter</b></td>
												<td>:</td>
												<td>
													<div class="input-group">
														<input type="text" name="ek_nama_dokter" id="ek_nama_dokter_resume" class="select2c-input clear-input d-inline-block">
													</div>
												</td>
											</tr>
											<tr>
												<td></td>
												<td><b>Tempat Kontrol</b></td>
												<td>:</td>
												<td>
													<div class="input-group">
														<input type="text" name="ek_tempat_kontrol" id="ek_tempat_kontrol" class="custom-form clear-input d-inline-block col-lg-4" placeholder="Tempat Kontrol">
													</div>
												</td>
											</tr>
											<tr>
												<td></td>
												<td>
													<button type="button" class="btn btn-info" onclick="addJadwalKontrolResume()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah Jadwal</button>
												</td>
												<td></td>
												<td></td>
											</tr>
										</table>
										<table class="table table-sm table-striped table-bordered" style="margin-top: -15px" id="table-kontrol-resume">
											<thead>
											<tr>
												<th class="center"><b>No</b></th>
												<th class="center"><b>Tanggal</b></th>
												<th class="center"><b>Hari</b></th>
												<th class="center"><b>Jam</b></th>
												<th class="center"><b>Nama Dokter</b></th>
												<th class="center"><b>Tempat</b></th>
												<th class="center"><b>Aksi</b></th>
											</tr>
											</thead>
											<tbody>
											</tbody>
										</table>
									</div>

									<!-- Punya MAs Reza -->
									<!-- <table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
										<tr>
											<td colspan="3" class="center bold td-dark">
												<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-terapi-pulang"><i class="fas fa-expand mr-1"></i>Expand</button>TERAPI PULANG
											</td>
										</tr>
									</table>

									<div class="collapse multi-collapse mt-2" id="data-terapi-pulang">
										<table class="table table-sm table-striped table-bordered" id="table-terapi-rm" style="margin-top: -15px">
											<thead>
												<tr>
													<th class="center" rowspan="2"><b>No</b></th>
													<th class="left" rowspan="2"><b>Nama Obat</b></th>
													<th class="center" rowspan="2"><b>Jumlah</b></th>
													<th class="center" rowspan="2"><b>Dosis</b></th>
													<th class="center" rowspan="2"><b>Frekuensi</b></th>
													<th class="center" rowspan="2"><b>Cara Pemberian</b></th>
													<th class="center" colspan="6"><b>Jam Pemberian</b></th>
													<th class="center" rowspan="2"><b>Petunjuk Khusus</b></th>
												</tr>
												<tr>
													<th class="center">a</th>
													<th class="center">b</th>
													<th class="center">c</th>
													<th class="center">d</th>
													<th class="center">e</th>
													<th class="center">f</th>
												</tr>
											</thead>
											<tbody>
											</tbody>
										</table>
									</div> -->

									<!--Perubahan Awal  -->
									<table class="table table-no-border table-sm table-striped" style="margin-top:-15px">
										<tr>
											<td colspan="3" class="center bold td-dark">
												<button class="btn btn-info btn-xs mr-1 float-left" type="button" data-toggle="collapse" data-target="#data-terapi-pulang"><i class="fas fa-expand mr-1"></i>Expand</button>TERAPI PULANG
											</td>
										</tr>
									</table>

									<div class="collapse multi-collapse mt-2" id="data-terapi-pulang">
										<table class="table table-no-border table-sm table-striped">
											<tr>
												<td width="2%"></td>
												<td><b>Obat</b></td>
												<td>:</td>
												<td>
													<div class="input-group">
														<input type="text" name="obat_rm" class="select2c-input clear-input d-inline-block" id="obat_rm">
													</div>
												</td>
											</tr>
											<tr>
												<td></td>
												<td><b>Jumlah</b></td>
												<td>:</td>
												<td>
													<div class="input-group">
														<input type="number" min="0" name="jumlah_obat_rm" class="custom-form clear-input d-inline-block col-lg-4" id="jumlah-obat-rm">
													</div>
												</td>
											</tr>
											<tr>
												<td></td>
												<td><b>Dosis</b></td>
												<td>:</td>
												<td>
													<div class="input-group">
														<input type="text" name="dosis_rm" id="dosis-rm" class="custom-form clear-input d-inline-block col-lg-4" placeholder="Dosis...">
													</div>
												</td>
											</tr>
											<tr>
												<td></td>
												<td><b>Frekuensi</b></td>
												<td>:</td>
												<td>
													<div class="input-group">
														<input type="text" name="frekuensi_rm" id="frekuensi-rm" class="custom-form clear-input d-inline-block col-lg-4" placeholder="Frekuensi...">
													</div>
												</td>
											</tr>
											<tr>
												<td></td>
												<td><b>Cara Pemberian</b></td>
												<td>:</td>
												<td>
													<div class="input-group">
														<input type="text" name="cara_pemberian_rm" id="cara-pemberian-rm" class="custom-form clear-input d-inline-block col-lg-4" placeholder="Cara Pemberian...">
													</div>
												</td>
											</tr>
											<tr>
												<td></td>
												<td><b>Jam Pemberian</b></td>
												<td>:</td>
												<td>
													<div class="input-group">
														<input type="text" name="ek_jam_pemberian_rm" id="ek_jam_pemberian_rm" class="custom-form clear-input d-inline-block col-lg-5 mr-1">

														<input type="text" name="ek_jam_pemberian_satu_rm" id="ek_jam_pemberian_satu_rm" class="custom-form clear-input d-inline-block col-lg-5 ml-2">

														<input type="text" name="ek_jam_pemberian_dua_rm" id="ek_jam_pemberian_dua_rm" class="custom-form clear-input d-inline-block col-lg-5 ml-2">

														<input type="text" name="ek_jam_pemberian_tiga_rm" id="ek_jam_pemberian_tiga_rm" class="custom-form clear-input d-inline-block col-lg-5 ml-2">

														<input type="text" name="ek_jam_pemberian_empat_rm" id="ek_jam_pemberian_empat_rm" class="custom-form clear-input d-inline-block col-lg-5 ml-2">

														<input type="text" name="ek_jam_pemberian_lima_rm" id="ek_jam_pemberian_lima_rm" class="custom-form clear-input d-inline-block col-lg-5 ml-2">
													</div>
												</td>
											</tr>
											<tr>
												<td></td>
												<td><b>Petunjuk Khusus</b></td>
												<td>:</td>
												<td>
													<div class="input-group">
														<input type="text" name="petunjuk_khusus_rm" id="petunjuk-khusus-rm" class="custom-form clear-input d-inline-block col-lg-4" placeholder="Petunjuk Khusus...">
														<input type="hidden" name="user_account" value="<?= $this->session->userdata("id_translucent") ?>"><input type="hidden" name="created_date" value="<?= date("Y-m-d H:i:s") ?>">
													</div>
												</td>
											</tr>
											<tr>
												<td></td>
												<td width="15%">
													<button type="button" class="btn btn-info" onclick="addTerapiRM()"><i class="fas fa-arrow-circle-down mr-1"></i>Tambah Terapi</button>
												</td>
												<td></td>
												<td></td>
											</tr>
										</table>
										<!-- <hr> -->
										<table class="table table-sm table-striped table-bordered" id="table-terapi-rm" style="margin-top: -15px">
											<thead>
											<tr>
												<th class="center" rowspan="2"><b>No</b></th>
												<th class="center" rowspan="2"><b>Nama Obat</b></th>
												<th class="center" rowspan="2"><b>Jumlah</b></th>
												<th class="center" rowspan="2"><b>Dosis</b></th>
												<th class="center" rowspan="2"><b>Frekuensi</b></th>
												<th class="center" rowspan="2"><b>Cara Pemberian</b></th>
												<th class="center" colspan="6"><b>Jam Pemberian</b></th>
												<th class="center" rowspan="2"><b>Petunjuk Khusus</b></th>
												<th class="center" rowspan="2">Petugas</th>
												<th class="center" rowspan="2">Aksi</th>
											</tr>
											<tr>
												<th class="center">a</th>
												<th class="center">b</th>
												<th class="center">c</th>
												<th class="center">d</th>
												<th class="center">e</th>
												<th class="center">f</th>
											</tr>
											</thead>
											<tbody>
											</tbody>
										</table>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- end content -->
				<?= form_close() ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-fw fa-times-circle mr-1"></i>Keluar</button>
				<button type="button" class="btn btn-info" onclick="simpanResumeMedisRanap()" id="btn_simpan"><i class="fas fa-fw fa-save mr-1"></i>Simpan</button>
				<button type="button" class="btn btn-info hide" onclick="cetakResumeMedisIntensiveCare()" id="btn_xetak"><i class="fas fa-print mr-1"></i>Cetak</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal -->
