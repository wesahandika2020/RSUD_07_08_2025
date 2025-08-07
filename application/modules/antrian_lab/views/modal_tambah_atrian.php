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

<div class="card">
	<div class="card-body">
		<div class="h-100 d-flex justify-content-center align-items-center">
			<div class="btn-container">
				<button class="btn btn-info bold waves-effect waves-light" id="btn-antrian">Ambil Antrian</button>
				<button class="btn btn-success bold waves-effect waves-light" id="btn-hasil">Ambil Hasil</button>
			</div>
		</div>
	</div>
</div>

<?php
$this->load->view('js_tambah');
$this->load->view('js_master');
$this->load->view('modal');
?>
