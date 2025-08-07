<title><?= $title_file_download ?></title>
<link rel="icon" type="image/png" href="<?= base_url('resources/images/favicons/favicon-32x32.png') ?>" sizes="32x32">
<link rel="icon" type="image/png" href="<?= base_url('resources/images/favicons/favicon-16x16.png') ?>" sizes="16x16">
<script src="<?= base_url() ?>resources/assets/node_modules/jquery/jquery-3.5.1.js"></script>

<body>

  <!-- EKLAIM -->
  <div>

    <!-- Hasil Radiologi -->
    <?php if (!empty($data_laboratorium)) : ?>

      <?php foreach ($data_laboratorium as $data) : ?>

        <?php if (($data->code_link == 200)) :
          $link = "https://labrsud.tangerangkota.go.id/rsud/" . $data->id_pasien ."_". $data->kode . ".pdf";
        ?>

          <div style="page-break-after: always;">
            <iframe src="<?= $link ?>" width="100%" height="600px"></iframe>
          </div>
          <br><br>

        <?php else : ?>
          <h1><?= $data->pesan_code ?></h1>
        <?php endif ?>

      <?php endforeach; ?>
    <?php endif ?>

  </div>
</body>