<?php
session_start();
include('consfig.php');
include('classCurl.php');

$id = $_GET['id'];

if (empty($id)) {
    header("Location: timeListagem.php?status=0");
} else {
    $url = $urlApi . "team/" . $id;
    echo ($url);
    $response = deleteRequest($url);
    echo $response;
    header("Location: timeListagem.php?status=1");
}
