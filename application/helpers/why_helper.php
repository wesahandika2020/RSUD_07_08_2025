<?php

// Contoh kata
function sentenseCase($input)
{
  return ucfirst(strtolower($input));
}

// contoh kata
function lowercase($input)
{
  return strtolower($input);
}

// Coontoh Kata
function capitalizeWords($input)
{
  return ucwords(strtolower($input));
}

// CONTOH KATA
function uppercaseWords($input)
{
  return strtoupper($input);
}

// cONTOH kATA
function toggleCase($input)
{
  return lcfirst($input);
}


function dateFormattedCSV($dateString)
{
  $timestamp = strtotime(str_replace('/', '-', $dateString));
  $formattedDate = date('Y-m-d', $timestamp);

  return $formattedDate;
}

function convertDateFormatMDYYYY($date)
{
  // Buat objek DateTime dari format asli
  $dateTime = DateTime::createFromFormat('n/j/Y', $date);

  // Pastikan objek DateTime valid
  if ($dateTime) {
    // Format ulang menjadi YYYY-MM-DD
    return $dateTime->format('Y-m-d');
  }

  // Return null jika format tidak sesuai
  return null;
}

function convertDateFormatDMYYYY($date)
{
  $dateTime = DateTime::createFromFormat('d/m/Y', $date);

  if ($dateTime) {
    return $dateTime->format('Y-m-d');
  }

  return null;
}


function convertAnswerCSV($answer)
{
  $answers = [
    'Ada' => 1,
    'Tidak Ada' => 0,

    'Tidak' => 0,
    'Ya' => 1,

    'Tidak pernah' => 1,
    'Jarang sekali' => 2,
    'Jarang' => 3,
    'Kadang-kadang' => 4,
    'Sering' => 5,
    'Sering kali' => 6,
    'Selalu' => 7
  ];

  return isset($answers[$answer]) ? $answers[$answer] : 69;
}

function splitRtRw($value)
{
  // Hapus spasi
  $cleaned_value = str_replace(' ', '', $value);

  // Cek apakah mengandung '/' dan kedua bagian ada setelah dipecah
  if (strpos($cleaned_value, '/') === false || count(explode('/', $cleaned_value)) !== 2) {
    return [
      'rt' => null,
      'rw' => null
    ];
  }

  // Pisahkan berdasarkan tanda '/'
  list($rt, $rw) = explode('/', $cleaned_value);

  // Pastikan rt dan rw berisi angka dan tidak kosong
  if (!is_numeric($rt) || !is_numeric($rw)) {
    return [
      'rt' => null,
      'rw' => null
    ];
  }

  // Hasilkan array sesuai dengan yang diinginkan
  return [
    'rt' => $rt,
    'rw' => $rw
  ];
}
