<?php if (!defined("BASEPATH")) exit("No direct script access allowed");

function safe_show($str) 
{
    echo htmlentities($str, ENT_QUOTES, 'UTF-8');
}

function encrypt_url($str)
{
    $output = false;
    // Read security.ini file & get encryption_key | iv | encryption_mechanism value for generating encryption code
    
    $security       = parse_ini_file("security.ini");
    $secret_key     = $security["encryption_key"];
    $secret_iv      = $security["iv"];
    $encrypt_method = $security["encryption_mechanism"];

    // hash
    $key    = hash("sha256", $secret_key);
    // iv – encrypt method AES-256-CBC expects 16 bytes – else you will get a warning
    $iv     = substr(hash("sha256", $secret_iv), 0, 16);
    //do the encryption given text/str/number
    $result = openssl_encrypt($str, $encrypt_method, $key, 0, $iv);
    $output = base64_encode($result);
    return $output;
}

function decrypt_url($str)
{
    $output = false;
    // Read security.ini file & get encryption_key | iv | encryption_mechanism value for generating encryption code

    $security       = parse_ini_file("security.ini");
    $secret_key     = $security["encryption_key"];
    $secret_iv      = $security["iv"];
    $encrypt_method = $security["encryption_mechanism"];
    
    // hash
    $key    = hash("sha256", $secret_key);
    // iv – encrypt method AES-256-CBC expects 16 bytes – else you will get a warning
    $iv = substr(hash("sha256", $secret_iv), 0, 16);
    //do the decryption given text/str/number
    $output = openssl_decrypt(base64_decode($str), $encrypt_method, $key, 0, $iv);
    return $output;
}