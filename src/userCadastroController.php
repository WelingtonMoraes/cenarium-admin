<?php

include('consfig.php');
include('classCurl.php');

$url = $urlApi . "register";

$Object = new CurlPost($url);

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
