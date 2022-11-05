<?php

include('consfig.php');
include('classCurl.php');

$url = $urlApi . "register";

$Object = new CurlPost($url);

foreach ($_FILES as $key => $file) {
    if (!isset($file) || !isset($file['name'])) continue;
    $uploadfile = $uploaddir . basename($file['name']);

    if (move_uploaded_file($file['tmp_name'], $uploadfile)) {
        echo "$key file > $uploadfile .\n";
    } else {
        echo " Error $key  file.\n";
    }
}

try {
    // execute the request
    $response = $Object([
        'name' => $_POST['name'],
        'email' => $_POST['email'],
    ]);

    $response = json_decode($response, true);

    header("Location: userCadastro.php");
} catch (\RuntimeException $ex) {
    // catch errors
    header("Location: index.php");
}
