<?php
require 'vendor/autoload.php';

use \Firebase\JWT\JWT;

if(isset($_POST['dataset'])){ $dataset = $_POST['dataset']; }else{
  $dataset=array(
    'url'=>'https://www.dru.ac.th/',
    'email'=>'rapin.t@dru.ac.th',
    'fullname'=>'Raping Tonprasert',
  );
}
if(isset($_POST['token'])){ $token = $_POST['token']; }else{  $token=""; }


// $token_payload = [
//   'iss' => 'https://github.com/auth0/php-jwt-example',
//   'sub' => '123456',
//   'name' => 'John Doe',
//   'email' => 'info@auth0.com'
// ];
$token_payload = $dataset;

// This is your client secret
$key = 'tossapol.c@dru.ac.th';

// This is your id token
$jwt = JWT::encode($token_payload, base64_decode(strtr($key, '-_', '+/')), 'HS256');

print "JWT:\n";
print_r($jwt);

$decoded = JWT::decode($jwt, base64_decode(strtr($key, '-_', '+/')), ['HS256']);

print "\n\n";
print "Decoded:\n";
print_r($decoded);

?>
