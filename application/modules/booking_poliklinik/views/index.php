<style>
	.btn-container {
		display: flex;
		flex-direction: column;
		gap: 2rem;
		margin: 2rem 0;
	}

	.btn-container button {
		font-size: 100px;
		border-radius: 20px;
	}
</style>
<?php  $user = $this->session->userdata() ?>
<div class="card">
	<div class="card-body">
		<div class="h-100 d-flex justify-content-center align-items-center">
			<div class="btn-container">
				<?php if($user['nama'] !== 'APM Pendaftaran Loket'): ?>
				<button class="btn btn-info bold waves-effect waves-light" id="btn-booking">Booking</button>
				<button class="btn btn-info bold waves-effect waves-light" id="btn-checkin">Check-In</button>
				<?php endif ?>
				<?php if($user['nama'] === 'APM Pendaftaran Loket' || $user['account_group'] === 'Admin'): ?>
				<!-- <button class="btn btn-info bold waves-effect waves-light" id="btn-antrian-loket">Antrian Loket</button>
				<button class="btn btn-info bold waves-effect waves-light" id="btn-informasi">Informasi</button>
				<button class="btn btn-info bold waves-effect waves-light" id="btn-buka-antrian-loket">Buka Antrian Loket</button> -->
				<button class="btn btn-info bold waves-effect waves-light" id="btn-buka-antrian-loket">Buka Antrian Loket</button>
				<?php endif ?>
			</div>
		</div>
	</div>
</div>

<?php
$this->load->view('js');
$this->load->view('modal');
?>
