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
if(isset($_POST['token'])){ $token = $_POST['token']; }else{  $token="authen_encode"; }


// $token_payload = [
//   'iss' => 'https://github.com/auth0/php-jwt-example',
//   'sub' => '123456',
//   'name' => 'John Doe',
//   'email' => 'info@auth0.com'
// ];
$token_payload = $dataset;

// This is your client secret
$key = base64_encode($dataset['email']);


switch ($token) {
  case 'authen_encode':
    // This is your id token
    $jwt = JWT::encode($token_payload, base64_decode(strtr($key, '-_', '+/')), 'HS256');
    // print "JWT:\n";
    // print_r($jwt);
    echo $jwt;
  break;
  case 'authen_decode':

    $decoded = JWT::decode($dataset, base64_decode(strtr($key, '-_', '+/')), ['HS256']);

    // print "\n\n";
    // print "Decoded:\n";
    // print_r($decoded);
    echo $decoded;
  break;
}



?>
