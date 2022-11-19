<?php
session_start();
include('consfig.php');
include('classCurl.php');

$url = $urlApi . "login";

$Object = new CurlPost($url);
try {
    // execute the request
    $response = $Object([
        'email' => $_POST['email'],
        'password' => $_POST['password'],
    ]);

    $response = json_decode($response, true);

    if (!empty($response['accessToken'])) {

        $_SESSION['userId'] = $response['id'];
        $_SESSION['userName'] = $response['name'];
        $_SESSION['accessToken'] = $response['accessToken'];

        header("Location: dashboard.php");
    } else {
        header("Location: index.php");
    }
} catch (\RuntimeException $ex) {
    // catch errors
    header("Location: index.php");
}
