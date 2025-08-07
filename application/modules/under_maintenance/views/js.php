<style>
	.under-maintenance {
		display: flex;
		justify-content: center
	}

	.text-animation {
		position: relative;
		animation: text-anim 1.63s infinite;
		text-align: center;
		/* untuk membuat teks menjadi rata tengah */
	}

	.text-animation span {
		font-weight: bold;
		/* untuk membuat teks menjadi tebal */
		font-family: Arial, sans-serif;
		/* untuk mengubah jenis font */
		font-size: 2em;
		/* untuk membuat ukuran teks menjadi besar */
		color: #ff6464;
		/* untuk membuat warna teks menjadi merah */
	}

	/* Animasi keyframes */
	@keyframes text-anim {
		0% {
			opacity: 0;
			transform: translateY(-10px);
		}

		50% {
			opacity: 1;
			transform: translateY(0);
		}

		100% {
			opacity: 0;
			transform: translateY(10px);
		}
	}
</style>