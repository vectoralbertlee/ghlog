<html>
  <head>
    <title>Login Test/title>
  </head>
  <body>
    <h1>Login Test</h1>

    <?php

$service_url = 'http://vimsd.dtdns.net/8t8life/MemberLogin/ValidLogin';
$curl = curl_init($service_url);
$curl_post_data = array(
        'slogin' => 'user@a.com',
        'spassword' => '123',
        'sdeviceid' => '001'
);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);

$curl_response = curl_exec($curl);
if ($curl_response === false) {
    $info = curl_getinfo($curl);
    curl_close($curl);
    die('error occured during curl exec. Additioanl info: ' . var_export($info));
}
curl_close($curl);

$decoded = json_decode($curl_response);
if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
    die('error occured: ' . $decoded->response->errormessage);
}

echo 'response ok!';

var_export($decoded->response);

    ?>

    <div>
      <p>By continuing you agree to our terms of service. Thank You</p>
    </div>

  </body>
</html>
