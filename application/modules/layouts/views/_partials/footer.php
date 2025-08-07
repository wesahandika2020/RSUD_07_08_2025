<footer class="footer">
    <div class="row">
        <div class="col-lg-3 d-flex justify-content-start">
            <span>Build With IT RSUD Kota Tangerang</span>
        </div>
        <div class="col-lg-6 d-flex justify-content-center" style="border-right: 1px solid #ccc;border-left : 1px solid #ccc;">
            <marquee direction="" onmouseover="this.stop();" onmouseout="this.start();" scrollamount="5" style="vertical-align:middle">
                <?php $running_text = $this->running_text->getInformasi('On'); ?>
                <?php if (!empty($running_text)) : ?>
                    <span class="text-informasi">"<?= $running_text->pesan ?>"</span>
                <?php endif; ?>
            </marquee>
        </div>
        <div class="col-lg-3 d-flex justify-content-end" style="align-items: center; gap: .5rem">
			<span><b>IP Client : <?php echo $this->input->ip_address() ?></b></span>
            <span><em>© 2019 - <?= date('Y') ?> SIMRS.</em></span>
        </div>
    </div>
</footer>