<?php

require __DIR__ . '/vendor/autoload.php';

use phpseclib3\Crypt\PublicKeyLoader;
use phpseclib3\Crypt\RSA;
use phpseclib3\Crypt\AES;
use phpseclib3\Crypt\Random;


function generateKey()
{
    // Generate a new RSA key pair
    $config = [
        'private_key_type' => OPENSSL_KEYTYPE_RSA,
        'private_key_bits' => 2048,
    ];

    $keyPair = openssl_pkey_new($config);

    // Extract the public key
    $publicKey = openssl_pkey_get_details($keyPair)['key'];

    // Export the private key
    openssl_pkey_export($keyPair, $privateKey);

    return [
        'publicKey' => $publicKey,
        'privateKey' => $privateKey,
    ];
}

function chunkSplit($body, $chunklen = 76, $end = "\r\n") {
    $chunklen = intval($chunklen) || 76;
    if ($chunklen < 1) {
        return false;
    }
    return chunk_split($body, $chunklen, $end);
}

////////// crptography


function str2ab($str) {
  $buf = '';
  for ($i = 0, $strLen = strlen($str); $i < $strLen; $i++) {
    $buf .= pack('C', ord($str[$i]));
  }
  return $buf;
}

function ab2str($buf) {
  $bytes = unpack('C*', $buf);
  $chars = array_map('chr', $bytes);
  return implode('', $chars);
}


function importRsaKey($pem) {
  // Fetch the part of the PEM string between header and footer
  $pemHeader = "-----BEGIN PUBLIC KEY-----";
  $pemFooter = "-----END PUBLIC KEY-----";
  $pemContents = substr($pem, strlen($pemHeader), strlen($pem) - strlen($pemFooter));
  
  // Base64 decode the string to get the binary data
  $binaryDerString = base64_decode($pemContents);
  
  // Save the binary DER data to a temporary file
  $tempFile = tempnam(sys_get_temp_dir(), 'rsa_key');
  file_put_contents($tempFile, $binaryDerString);
  
  // Import the RSA key using openssl
  $key = openssl_pkey_get_public("file://" . $tempFile);
  
  // Generate the key details for encryption
  $keyDetails = openssl_pkey_get_details($key);
  
  // Clean up the temporary file
  unlink($tempFile);
  
  return $key;
}

function generateSymmetricKey() {
  // Generate a random key using OpenSSL
  $cryptoStrong = true;
  $key = openssl_random_pseudo_bytes(32, $cryptoStrong);
  
  if ($cryptoStrong !== true) {
    // Error occurred during key generation
    return null;
  }
  
  // Return the generated key
  return $key;
}

function generateRSAKeyPair() {
    // Generate private key
    $privateKeyConfig = [
        "digest_alg" => "sha256",
        "private_key_bits" => 2048,
        "private_key_type" => OPENSSL_KEYTYPE_RSA
    ];
    $privateKeyResource = openssl_pkey_new($privateKeyConfig);

    // Extract the public key from the private key
    $privateKeyDetails = openssl_pkey_get_details($privateKeyResource);
    $publicKey = $privateKeyDetails['key'];

    // Prepare the result
    $result = [
        "privateKey" => $privateKeyResource,
        "publicKey" => $publicKey
    ];

    return $result;
}

function formatMessage($data) {
    $dataAsBase64 = chunk_split(base64_encode($data));
    return "-----BEGIN ENCRYPTED MESSAGE-----\r\n{$dataAsBase64}-----END ENCRYPTED MESSAGE-----";
}

function aesEncrypt($data, $symmetricKey) {

  $cipher = "aes-256-gcm";
  $ivLength = 12;
	$tag = '';
  $iv = "";
	
    // Generate random IV
    if (function_exists('random_bytes')) {
        $iv = random_bytes($ivLength);
    } elseif (function_exists('openssl_random_pseudo_bytes')) {
        $iv = openssl_random_pseudo_bytes($ivLength);
    } else {
        // Fallback if random bytes generation is not available
        $iv = "";
        for ($i = 0; $i < $ivLength; $i++) {
            $iv .= chr(mt_rand(0, 255));
        }
    }
	

    // $cipher = new AES(AES::MODE_GCM);
    $cipher = new AES('gcm');
    $cipher->setKeyLength(256);
    $cipher->setKey($symmetricKey);
    $cipher->setNonce($iv);

    $ciphertext = $cipher->encrypt($data);
    $tag = $cipher->getTag();
    
    // Concatenate the IV, ciphertext, and tag
    $encryptedData = $iv . $ciphertext. $tag;

    return $encryptedData;
}


function aesDecrypt($encryptedData, $symmetricKey) {
    $cipher = "aes-256-gcm";
    $ivLength = 12;

    // Extract IV and encrypted bytes
    $iv = substr($encryptedData, 0, $ivLength);
    $encryptedBytes = substr($encryptedData, $ivLength);


    $ivlen = openssl_cipher_iv_length($cipher);
    $tag_length = 16;
    $iv = substr($encryptedData, 0, $ivlen);
    $tag = substr($encryptedData, -$tag_length);
    $ciphertext = substr($encryptedData, $ivlen, -$tag_length);

    $ciphertext_raw = openssl_decrypt($ciphertext, $cipher, $symmetricKey, OPENSSL_NO_PADDING, $iv, $tag);
    return $ciphertext_raw;    

    // Decrypt the data
    $decryptedData = openssl_decrypt(
        $encryptedBytes,
        $cipher,
        $symmetricKey,
        OPENSSL_RAW_DATA,
        $iv
    );

    return $decryptedData;
}


function encryptMessage($message, $pubPEM) {
    // Generate a symmetric key
    $aesKey = generateSymmetricKey(); // Generate a 256-bit key (32 bytes)

    $serverKey = PublicKeyLoader::load($pubPEM);
    $serverKey = $serverKey->withPadding(RSA::ENCRYPTION_OAEP);
    $wrappedAesKey = $serverKey->encrypt($aesKey);


    // echo ($wrappedAesKey);
	
    // Encrypt the message using the generated AES key
    $encryptedMessage = aesEncrypt($message, $aesKey);

    // Combine wrapped AES key and encrypted message
    $payload = $wrappedAesKey . $encryptedMessage;

    return formatMessage($payload);
}


function decryptMessage($message, $privateKey)
{
    $beginTag = "-----BEGIN ENCRYPTED MESSAGE-----";
    $endTag = "-----END ENCRYPTED MESSAGE-----";

    // Fetch the part of the PEM string between beginTag and endTag
    $messageContents = substr(
        $message,
        strlen($beginTag) + 1,
        strlen($message) - strlen($endTag) - strlen($beginTag) - 2
    );

    // Base64 decode the string to get the binary data
    $binaryDerString = base64_decode($messageContents);

    // Split the binary data into wrapped key and encrypted message
    $wrappedKeyLength = 256;
    $wrappedKey = substr($binaryDerString, 0, $wrappedKeyLength);
    $encryptedMessage = substr($binaryDerString, $wrappedKeyLength);

    // Unwrap the key using RSA private key
    // $unwrappedKey = unwrapKey($wrappedKey, $privateKey);

    // $key = new RSA();

    // $key->loadKey($privateKey);
    $key = PublicKeyLoader::load($privateKey);
    // $key = $key->withPadding(RSA::ENCRYPTION_OAEP);
    $aesKey = $key->decrypt($wrappedKey);


    // Decrypt the encrypted message using the unwrapped key
    $decryptedMessage = aesDecrypt($encryptedMessage, $aesKey);
    //echo "decryptedMessage = $decryptedMessage\n";

    return $decryptedMessage;
}

function loadPublicKeyFromPEM($pemPublicKey) {
  $key = openssl_pkey_get_public($pemPublicKey);
  
  if ($key === false) {
      throw new Exception('Failed to load public key');
  }
  
  return $key;
}

function generateUrl($agen,$nik_agen,$accessToken,$apiUrl) {
  $keyPair = generateKey();
  $publicKey = $keyPair['publicKey'];
  $privateKey = $keyPair['privateKey'];

  // key for non-prod environment
  $pubPEM = "-----BEGIN PUBLIC KEY-----
    MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAwqoicEXIYWYV3PvLIdvB
    qFkHn2IMhPGKTiB2XA56enpPb0UbI9oHoetRF41vfwMqfFsy5Yd5LABxMGyHJBbP
    +3fk2/PIfv+7+9/dKK7h1CaRTeT4lzJBiUM81hkCFlZjVFyHUFtaNfvQeO2OYb7U
    kK5JrdrB4sgf50gHikeDsyFUZD1o5JspdlfqDjANYAhfz3aam7kCjfYvjgneqkV8
    pZDVqJpQA3MHAWBjGEJ+R8y03hs0aafWRfFG9AcyaA5Ct5waUOKHWWV9sv5DQXmb
    EAoqcx0ZPzmHJDQYlihPW4FIvb93fMik+eW8eZF3A920DzuuFucpblWU9J9o5w+2
    oQIDAQAB
    -----END PUBLIC KEY-----";

  if (strpos($apiUrl , 'dev') === false  || strpos($apiUrl , 'stg') === false){
    // key for production
    $pubPEM = "-----BEGIN PUBLIC KEY-----
    MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAxLwvebfOrPLIODIxAwFp
    4Qhksdtn7bEby5OhkQNLTdClGAbTe2tOO5Tiib9pcdruKxTodo481iGXTHR5033I
    A5X55PegFeoY95NH5Noj6UUhyTFfRuwnhtGJgv9buTeBa4pLgHakfebqzKXr0Lce
    /Ff1MnmQAdJTlvpOdVWJggsb26fD3cXyxQsbgtQYntmek2qvex/gPM9Nqa5qYrXx
    8KuGuqHIFQa5t7UUH8WcxlLVRHWOtEQ3+Y6TQr8sIpSVszfhpjh9+Cag1EgaMzk+
    HhAxMtXZgpyHffGHmPJ9eXbBO008tUzrE88fcuJ5pMF0LATO6ayXTKgZVU0WO/4e
    iQIDAQAB
    -----END PUBLIC KEY-----";
  }

  // Set the request data
  $data = array(
    'agent_name' => $agen,
    'agent_nik' => $nik_agen,
    'public_key' => $publicKey
  );

  $jsonData = json_encode($data);

  $encryptedPayload = encryptMessage($jsonData, $pubPEM);

  // Initialize cURL
  $ch = curl_init();

  // Set the cURL options
  curl_setopt($ch, CURLOPT_URL, $apiUrl);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $encryptedPayload);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'X-Debug-Mode: 0',
    'Content-Type: text/plain',
    'Authorization: Bearer ' . $accessToken
  ));

  // Execute the request
  $response = curl_exec($ch);

  // Check for cURL errors
  if(curl_errno($ch)) {
    echo 'cURL error: ' . curl_error($ch);
  }

  // Close cURL
  curl_close($ch);

  // Output the response
  return decryptMessage($response,$privateKey);
}
