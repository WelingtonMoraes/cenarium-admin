<?php
session_start();
include('consfig.php');
include('classCurl.php');

$id = $_GET['id'];

if (empty($id)) {
    header("Location: especialidadesListagem.php?status=0");
} else {
    $url = $urlApi . "speciality/" . $id;
    echo ($url);
    $response = deleteRequest($url);
    echo $response;
    header("Location: especialidadesListagem.php?status=1");
}
