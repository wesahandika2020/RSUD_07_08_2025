<meta http-equiv="refresh" content="10; URL=<?= base_url();?>">
<div class="row" id="warp-monitor-antrian">
	<div class="col-12">
		<div class="card" style="height:50vh;">
			<div class="card-header text-center"><h3><b>ANTRIAN</b></h3></div>
			<div class="card-body bg-info p-3" style="font-size: 1500%;font-weight: bold;text-align: center;"><span class="blinker" id="loket-panggil"></span></div>
			<div class="card-footer text-center" style="font-size: 150%;font-weight: bold;text-align: center; padding: 1px;" id="lokasi-loket"></div>

		</div>
	</div>
</div>
<div class="row">
	<div class="col">
		<div class="card" style="height:30vh;">
			<div class="card-header text-center"><h3><b>LOKET 1</b></h3></div>
			<div class="card-body bg-success p-3" style="font-size: 600%;font-weight: bold;text-align: center; padding-bottom: 66px; padding-top: 66px;" id="loket-satu">

			</div>
		</div>
	</div>
	<div class="col">
		<div class="card" style="height:30vh;">
			<div class="card-header text-center"><h3><b>LOKET 2</b></h3></div>
			<div class="card-body bg-primary p-3" style="font-size: 600%;font-weight: bold;text-align: center; padding-bottom: 66px; padding-top: 66px;" id="loket-dua">

			</div>
		</div>
	</div>
	<div class="col">
		<div class="card" style="height:30vh;">
			<div class="card-header text-center"><h3><b>LOKET 3</b></h3></div>
			<div class="card-body bg-warning p-3" style="font-size: 600%;font-weight: bold;text-align: center; padding-bottom: 66px; padding-top: 66px;" id="loket-tiga">

			</div>
		</div>
	</div>
    <div class="col">
        <div class="card" style="height:30vh;">
            <div class="card-header text-center"><h3><b>LOKET 4</b></h3></div>
            <div class="card-body bg-danger p-3" style="font-size: 600%;font-weight: bold;text-align: center; padding-bottom: 66px; padding-top: 66px;" id="loket-empat">

            </div>
        </div>
    </div>
</div>

<?php $this->load->view('js_monitor_antrian.php'); ?>
