		<?php
		
			$ch = curl_init();
			curl_setopt_array($ch, array(
				CURLOPT_URL => 'http://10.10.10.11/rsud/' . $noRm->id_pasien . '_' . $ono . '.pdf',
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13',
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 120,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "GET",
			));

			$response = curl_exec($ch);
			$response_getinfo = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
			curl_close($ch);

			if ($response_getinfo === 200) {

		?>

				<embed type="application/pdf" src="https://labrsud.tangerangkota.go.id/rsud/<?php echo $noRm->id_pasien . '_' . $ono . '.pdf'; ?>" width="1000" height="2000"></embed>

				<?php } else if ($response_getinfo === 404) {


				$cekCh = curl_init();
				curl_setopt_array($cekCh, array(
					CURLOPT_URL => 'http://10.10.10.11/rsud/' . $ono . '.pdf',
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13',
					CURLOPT_ENCODING => "",
					CURLOPT_MAXREDIRS => 10,
					CURLOPT_TIMEOUT => 120,
					CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					CURLOPT_CUSTOMREQUEST => "GET",
				));

				$responseNext = curl_exec($cekCh);
				$responseCekinfo = curl_getinfo($cekCh, CURLINFO_RESPONSE_CODE);
				curl_close($cekCh);

				if ($responseCekinfo === 200) {

				?>

					<embed type="application/pdf" src="https://labrsud.tangerangkota.go.id/rsud/<?php echo $ono . '.pdf'; ?>" width="1000" height="2000"></embed>

		<?php

				} else {

					echo 'File format PDF belum Tersedia di server SIMRS.';
				}
			} else {

				echo "File format PDF belum Tersedia di server SIMRS";
			}
		
		?>