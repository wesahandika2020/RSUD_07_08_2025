
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<title>.:FORMULIR TATA TERTIB PASIEN RAWAT INAP:.</title>
	<style>
		* {
			font-family: Arial, Helvetica, sans-serif;
			font-size: 11pt;
		}

		body{ 
			background:#FFF; 
		}
		.kotak{
			border:1px solid #000000;
			width:20px;
			height:20px;
			vertical-align:middle; 
			text-align:center;
		}
	</style>
	<script>
		function cetak() {
			setTimeout(function() { window.close() }, 300);
			window.print();
		}
	</script>
</head>

<body onload="cetak()">
	<div id="tampil_input" align="center" style="display:blok">
		<form action="" method="get" name="tata_tertib" id="tata_tertib">
			<input type="hidden" id="act" name="act" value="hapus" /> 
			<input type="hidden" id="id" name="id" />
			<br>
			<center>
				<table width="1065" style="border:1px solid #000; border-collapse:collapse;">
					<tr>
						<th scope="col">&nbsp;</th>
						<th scope="col">&nbsp;</th>
						<th scope="col">&nbsp;</th>
						<th scope="col">&nbsp;</th>
						<th scope="col">&nbsp;</th>
						<th scope="col">&nbsp;</th>
						<th scope="col">&nbsp;</th>
						<th scope="col">&nbsp;</th>
						<th scope="col">&nbsp;</th>
						<th scope="col">&nbsp;</th>
						<th scope="col">&nbsp;</th>
						<th scope="col">&nbsp;</th>
						<th scope="col">&nbsp;</th>
						<th scope="col">&nbsp;</th>
					</tr>
					<tr>
						<th scope="col">&nbsp;</th>
						<th colspan="6" rowspan="3" scope="col">PEMERINTAH KOTA TANGERANG<br />RUMAH SAKIT UMUM DAERAH</th>
						<th colspan="6" rowspan="3" scope="col" style="border:1px solid #000;">TATA TERTIB<br />PASIEN RAWAT INAP <BR />( REGULATION INPATIENT )</th>
						<th scope="col">&nbsp;</th>
					</tr>
					<tr>
						<th scope="col">&nbsp;</th>
						<th scope="col">&nbsp;</th>
					</tr>
					<tr>
						<th scope="col">&nbsp;</th>
						<th scope="col">&nbsp;</th>
					</tr>
					<tr>
						<th scope="col">&nbsp;</th>
						<th scope="col">&nbsp;</th>
						<th scope="col">&nbsp;</th>
						<th scope="col">&nbsp;</th>
						<th scope="col">&nbsp;</th>
						<th scope="col">&nbsp;</th>
						<th scope="col">&nbsp;</th>
						<th scope="col">&nbsp;</th>
						<th scope="col">&nbsp;</th>
						<th scope="col">&nbsp;</th>
						<th scope="col">&nbsp;</th>
						<th scope="col">&nbsp;</th>
						<th scope="col">&nbsp;</th>
						<th scope="col">&nbsp;</th>
					</tr>
					<tr>
						<td colspan="14" style="border-top:#000 1px solid;">&nbsp;</td>
					</tr>
					<tr>
						<td width="17">&nbsp;</td>
						<td width="26">&nbsp;</td>
						<td width="23">&nbsp;</td>
						<td width="23">&nbsp;</td>
						<td width="154">&nbsp;</td>
						<td width="16">&nbsp;</td>
						<td width="316">&nbsp;</td>
						<td width="89">&nbsp;</td>
						<td width="80">&nbsp;</td>
						<td width="75">&nbsp;</td>
						<td width="90">&nbsp;</td>
						<td width="48">&nbsp;</td>
						<td width="23">&nbsp;</td>
						<td width="25">&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td colspan="4">Nama Pasien / <em>Patient Name</em></td>
						<td>:</td>
						<td><?= $pendaftaran['pasien']->nama ?></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td colspan="4">No. RM</td>
						<td>:</td>
						<td><?= $pendaftaran['pasien']->id_pasien ?></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td colspan="3">&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td colspan="4">Ruang &amp; Kelas / <em>Rom &amp; Class</em></td>
						<td>:</td>
						<td>KELAS <?= $pendaftaran['layanan']->kelas ?></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td colspan="3">&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td colspan="4">Tanggal Masuk Rawat Inap</td>
						<td>:</td>
						<td><?= datetimefmysql($pendaftaran['layanan']->waktu_konfirmasi_ranap, true) ?></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td colspan="13">&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td colspan="12">&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><strong>I.</strong></td>
						<td colspan="5"><strong>Kondisi Pelayanan / <em>Condition of Service</em></strong></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td colspan="9">&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>1.</td>
						<td colspan="10" rowspan="2"><div align="justify">Pasien tersebut diatas setuju untuk dilakukan perawatan rawat inap di RSUD Tangerang / <em>Patieny is listed above to perform inpatient care at RSUD Tangerang.</em></div></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>2.</td>
						<td colspan="10" rowspan="3"><div align="justify">Selama dalam perawatan di RSUD Tangerang pasien diwajibkan menggunakan sarana dan prasarana yang tersedia di Rumah Sakit seperti pemeriksaan laboratorium, radiologi, farmasi dan sebagainya.<em>/ During the hospitalization, patieny is obligated to use RSUD Tangerang Hospital facilities,eg: laboratory examination, radiology, pharmacy, etc.</em></div></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>3.</td>
						<td colspan="10" rowspan="3"><div align="justify">Selama dalam perawatan di RSUD Tangerang, pasien dianjurkan untuk tidak mengenakan atau menyimpan barang-barang berharga. kehilangan atau kerusakan barang bukan menjadi tanggung jawab Rumah Sakit.<em>/ During hospitalization, patient is advised not to bring and wear valuables. Therefore the hospital is not reliable for any lost or damage of patient's valuables.</em></div></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>4.</td>
						<td colspan="10" rowspan="3"><div align="justify">Pasien bertanggung jawab atas kerusakan atau kehilangan barang milik RSUD Tangerang yang disebabkan oleh kelalaian pasien/keluarga pasien.<em>/ Patient will be responsible for any damage or lost of hospital's property due to patient/relative of patient negligence.</em></div></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>5.</td>
						<td colspan="10" rowspan="5"><div align="justify">Barang-barang yang diperboehkan untuk dibawa kedalam kamar perawatan adalah barang-barang keperluan pasien, barang bawaan pribadi berupa peralatan tidur (Bantal, kasur, tikar, dsb) dan peralatan selain yang telah disediakan oleh pihak rumah sakit tidak diperkenankan untuk dibawa ke dalam kamar perawatan.<em>/ Belongings that are allowed to be brought into the patient's room are only those of imfortance to the patient However, bad equipment (pillow, matterss, mat, etc) &amp; others equipment which are not provided by the hospital are prohibited to be broughy from outside into the patients room.</em></div></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><strong>II.</strong></td>
						<td colspan="3"><strong>Pembayaran / <em>Payent</em></strong><em></em></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>1.</td>
						<td colspan="10" rowspan="3"><div align="justify">Pasien diwajibkan membayar uang muka pada saat registrasi rawat inap. Jumlah uang muka yang dibayar sesuai dengan kebijakan yang berlaku di RSUD Tangerang./<em> Patient is obligated to pay deposit admission. The deposite amount to be paid is in accordance with the regulations of RSUD Tangerang</em></div></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>2.</td>
						<td colspan="10" rowspan="3"><div align="justify">Bila pasien belum dapat memenuhi kewajiban pembayaran deposit, maka rumah sakit memberikan tenggang waktu selama 1 x 24 jam terhitung setelah registrasi rawat inap untuk menyelesaikan pembayaran uang muka./<em> If the patient could not settle the deposit upon admission, the deposit has to be settled within 24 hours after admission.</em></div></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td colspan="10" rowspan="4"><div align="justify">Selama pasien dirawat, rumah sakit akan membuat tagihan uang muka berjalan, apabila total biaya perawatan telah mencapai 90% dari total uang muka yang telah dibayarkan pasien./<em> During hospitalization the hospital will send a deposit invoice if the total cost of treatment has reached 90% of the deposit.</em></div></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>3.</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>4.</td>
						<td colspan="10" rowspan="4"><div align="justify">Pasien yang biaya perawatan di tanggung oleh pihak ketiga (<em>Insurance</em>/Perusahaan) wajib memberikan surat jaminan kepada RSUD Tangerang selambat-lambatnya dalam jangka waktu 1 x 24 jam setelah registrasi rawat inap. Selama rumah sakit belum menerima surat jaminan, maka pasien akan diberlakukan sebagai pasien pribadi./ <em>Patient who financed by third party (employer, company, or insurance) must provide a letter of guarantee to the hospital at the latest within 24 hours after admission. Before receiving the letter of guarantee. the patient is considered as a self pay and he/she has to sign a of consent that he/she will pay the hospital bill, if the third party does not provide the letter of guarantee.</em></div></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td colspan="10">&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>5.</td>
						<td colspan="10" rowspan="3"><div align="justify">Sebelum dilakukan tindakan operasi, pasien wajib membayar deposit sebesar perkiraan biaya operasi. Keterlambatan dapat menunda pelaksanaan operasi.<em>/ Before the procedure of surgeon taken, patient is obligated to pay deposit at the amount of the cost estimation of the procedure. Delay upon settlig the deposit will cancel the procedure.</em></div></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>6.</td>
						<td colspan="10" rowspan="5"><div align="justify">Selama masa perawatan pasien dapat berpindah kelas apabila kamar yang diinginkan tersedia. Bila pasien pindah kelas setelah menjalani operasi, tindakan atau perawatan di ICU ke kelas lebih tinggi, maka biaya yang dikeluarkan sebelumnya akan disesuaikan dengan kelas yang baru./ During hospitalization if the patient, desired to change room and if the room are available. If the patient moves to another room with higher rate after having a procedure or stay in ICU the hospital bill will be adjusted to higher rates according to the new room rate chosen.</div></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>7.</td>
						<td colspan="10" rowspan="5"><div align="justify">Bila pasien pindah kamar dari perawatan umum ke ICU maka biaya kamar yang dikenakan hari itu adalah biaya kamar ICU, bila pasien meninggalkan kamar ICU sebelum Pk. 12.00 WIB, makan pasien akan dikenakan biaya perawatan bangsal pada hari itu. Sedangkan bila perpindahan dari ICU ke bangsal melewati Pk. 12.00 WIB, maka pasien akan dikenakan biaya perawatan ICU./ Room charge for the day patient leaves ward to ICU room charge, if the patient leaves ICU to ward before 12 pm, the charge would be room charge, however if the patient leaves ICU after 12 pm, the room charge for the day is ICU room charge.</div></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>8.</td>
						<td colspan="10" rowspan="4"><div align="justify">Butir 2,3 dan 5 wajib dilunasi dalam waktu 1 x 24 jam sejak tagihan / surat pemberitahuan diterima, dan apabila sampai dengan batas waktu yang ditentukan diatas RSUD Tangerang belum menerima pembayaran, maka pihak Rumah Sakit berhak melakukan tindakan sebagai berikut :/<em> Details of 2,3 and 5 have to be repaid in 24 hours since the bill/letter of notification is received, and when it came to the time limit spesified in the RSUD Tangerang have not received payment, then the hospital is entitled to take action as follews :</em></div></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td><div align="justify">&bull;</div></td>
						<td colspan="9" rowspan="2"><div align="justify">Obat yang diresepkan harus dibeli sendiri di Farmasi RSUD Tangerang dan dibayar tunai./ <em>Prescribed drug must be purchased at RSUD Tangerang pharmacy and paid in cash.</em></div></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td><div align="justify"></div></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td><div align="justify">&bull;</div></td>
						<td colspan="9" rowspan="2"><div align="justify">Pemeriksaan penunjang medis lainya harus dibayar tunai./<em> Examination of other medical support (Labboratory, Radiology, etc) must be paid in cash.</em></div></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td><div align="justify"></div></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td><div align="justify">&bull;</div></td>
						<td colspan="9"><div align="justify">Memindahkan pasien ke ruang perawatan kelas 3 (Tiga)./<em> Transfering patient to the treatment area class 3.</em></div></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td><div align="justify">&bull;</div></td>
						<td colspan="9"><div align="justify">Merujuk pasien ke rumah sakit lain./ <em>Refer patient to other hospitals.</em></div></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>9.</td>
						<td colspan="10" rowspan="2"><div align="justify">RSUD Tangerang akan menarik biaya administrasi dan service yang besarnya sesuai dengan kebijakan yang berlaku./<em> RSUD Tangerang will charge an administrative and service fee in accardance with the prevalling polices.</em></div></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>10.</td>
						<td colspan="10" rowspan="4"><div align="justify">Rumah Sakit akan memberikan perincian/detil biaya penggunaan pasien selama dirawat setelah dilakukan pelunasan. Rumah Sakit hanya mengeluarkan satu kali invoice asli dan tidak bisa mengeluarkan invoice manual, kecuali bila sistem informasi Rumah Sakit terganggu fungsinya./<em> The hospital will give a detail of invoice of the patient during hospitalization after bill has been settled. The hospital only release one true copy of the invoice, a manual invoice will not be produced, unless there is a problem with the hospital system.</em></div></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>11.</td>
						<td colspan="10" rowspan="3"><div align="justify">Biaya perawatan pasien harus dilunasi pada saat pasien meninggalkan rumah sakit. Pelunasan hanya dapat dilakukan dengan pembayaran tunai atau dengan kartu kredit. Kami tidak menerima pembaran dengan menggunakan giro/chek./ <em>The hospital bill must be paid upon discharge. payment can be made only by cash or credit card and the hospital does not received payment with any kind of personal check.</em></div></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><strong>III.</strong></td>
						<td colspan="3"><strong>Perawatan / Treatment</strong></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>1.</td>
						<td colspan="10" rowspan="2"><div align="justify">RSUD Tangerang mempunyai wewenang untuk memindahkan pasien kekamar lain sesuai dengan kelas perawatan./ <em>RSUD Tangerang has the authority to transfer patient to other rooms in accardance with its treatment class.</em></div></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>2.</td>
						<td colspan="10" rowspan="2"><div align="justify">Staf medis RSUD Tangerang berwenang untuk melakukan tindakan pertolongan medis pada keadaan kegawatan untuk menolong jiwa pasien./<em> RSUD Tangerang staff authorized to give medical life saving to the emergenciens situation.</em></div></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><strong>IV.</strong></td>
						<td colspan="3"><strong>Pemualangan Pasien / </strong></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>1.</td>
						<td colspan="9"><div align="justify">Harus sepengetahuan atau seizin dokter yang merawat./ <em>Should the knowledge or permisson of the treating doctor.</em></div></td>
						<td><div align="justify"></div></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>2.</td>
						<td colspan="10" rowspan="3"><div align="justify">Diluar ketentuan tersebut, pasien dinyatakan pulang atas permintaan sendiri dan pasien/keluarganya diminta untuk menandatangani formulir pulang atas permintaan sendiri./<em> Excluding the provisions, the patient is avowed to go home, based on his / her own demand and also his / her family request.</em></div></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>3.</td>
						<td colspan="10" rowspan="4"><div align="justify">Batas waktu kepulangan pasien adalah pk. 12.00 WIB. kepulangan sebelum pk. 12.00 WIB, tidak dikenakan biaya dan tidak disediakan makan siang. Kepualangan pasien setelah pk 15.00 WIB maka pasien dikenakan biaya setengah hari./<em> Time of discharge is 12 pm. It a patient is discharge before 12 pm, additional room cost will not be charge and lunch meal is not available. If a patient is discharge after 15 pm. The hospital will charge half day room rate.</em></div></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td><div align="justify"></div></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>4.</td>
						<td colspan="10" rowspan="3"><div align="justify">Toleransi waktu akan diberikan sampai dengan pk 15.00 WIB pada waktu pasien menunggu kunjungan terakhir dokter. Bila pasien pulang setelah pk. 18.00 WIB maka akan dikenakan biaya sebesar satu hari biaya kamar./ <em>Late-check out is until 15 pm in case waiting for last doctor visit. The hospital will charge full day room for check-out after 18 pm.</em></div></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td colspan="12" rowspan="5">Yang bertanda tangan di bawah ini menerangkan bahwa telah membaca syarat-syarat diatas, menerima satu buah salinanya dan setuju terikat di bawahnya, jika yang bertanda tangan di bawah ini bukan pasien yang bersangkutan, maka ia menjamin bahwa ia mendapat kuasa dari pasien untuk menerima syarat-syarat tersebut, atas nama pasien./ <em>The undersigned certifies that he/she has read the after going condition, received a copy therefore and agrees to be bound thereunder, Where the undersigned is other than the patient the undersigned warrants that he/she has the patient's authority to accept there fore going condition on be half of the patient.</em></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td colspan="4">Tangerang, 8 September 2020</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>A.</td>
						<td colspan="5">Disetujui oleh pasien / Agreed by patient</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td colspan="12">&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td colspan="5">&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td colspan="4" align="center"><strong>(<u><?= $pendaftaran['pasien']->nama ?></u>)</strong></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td colspan="4"><div align="center">Tanda Tangan / Signature</div></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>B. </td>
						<td colspan="5">Disetujui oleh Penjamin / Agreed by guarantor</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td colspan="3">Saya / <em>I, Myself</em></td>
						<td>:</td>
						<td><?= $penjamin['nama_guarantor'] ?></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td colspan="3">No. Identitas / <em>Id No</em></td>
						<td>:</td>
						<td><?= $penjamin['no_identitas_guarantor'] ?></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td colspan="3">Beralamat di / <em>Of</em></td>
						<td>:</td>
						<td><?= $penjamin['alamat_guarantor'] ?></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td colspan="3">No Telp / Phone Number</td>
						<td>:</td>
						<td><?= $penjamin['telp_guarantor'] ?></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td colspan="11" rowspan="2"><div align="justify">Setuju untuk bertanggung jawab atas rekening pasien dan patuh kepada persyaratan di atas./ <em>Here be agree to be jointly and severally liable for the patien's account observance of the above condotions.</em></div></td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td colspan="5">&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td colspan="5">&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td colspan="5">&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td colspan="5">&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td colspan="5">&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td colspan="5">&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td colspan="4" align="center"><strong>(<u><?= $penjamin['nama_guarantor'] ?></u>)</strong></td>
						<td>&nbsp;</td>
						<td colspan="5">&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td colspan="4"><div align="center">Tanda Tangan / Signature</div></td>
						<td>&nbsp;</td>
						<td colspan="5">&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td colspan="5">&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td colspan="4">&nbsp;
							
						</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
				</table>
			</center>
		</form>
	</div>	
</body>
</html>