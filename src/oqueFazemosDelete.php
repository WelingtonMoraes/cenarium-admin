<?php
session_start();
include('consfig.php');
include('classCurl.php');

$id = $_GET['id'];

if (empty($id)) {
    header("Location: oqueFazemosListagem.php?status=0");
} else {
    $url = $urlApi . "what-we-do/" . $id;
    echo ($url);
    $response = deleteRequest($url);
    echo $response;
    header("Location: oqueFazemosListagem.php?status=1");
}
