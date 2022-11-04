<?php
include('../consfig.php');
include('../classCurl.php');

$url = $urlApi . "login";

$Object = new CurlPost($url);
try {
    // execute the request
    $response = $Object([
        'email' => $_POST['email'],
        'password' => $_POST['password'],
    ]);

    $response = json_decode($response, true);

    echo '<pre>';
    print_r($response);
    echo '</pre>';

    if ($response['accessToken']) {
        session_start();

        $_SESSION['userId'] = $response['id'];
        $_SESSION['userName'] = $response['name'];
        $_SESSION['accessToken'] = $response['accessToken'];

        header("Location: ../dashboard/");
    } else {
        header("Location: index.php");
    }
} catch (\RuntimeException $ex) {
    // catch errors
    die(sprintf('Http error %s with code %d', $ex->getMessage(), $ex->getCode()));
}
