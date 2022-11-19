<?php
session_start();
include('consfig.php');
include('classCurl.php');

if (empty($_POST['name']) || empty($_POST['description']) || empty($_FILES)) {
    header("Location: oqueFazemosCadastro.php?status=0");
}

try {

    $url = $urlApi . "what-we-do";
    $data = [
        "Nome"  => $_POST['name'],
        "Descricao" => $_POST['description'],
        "PaginaInicial" => 'false',
        "Imagem" => new \CurlFile($_FILES['image']['tmp_name'], $_FILES['image']['type'], $_FILES['image']['name'])
    ];

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $data,
        CURLOPT_HTTPHEADER => [
            "Accept: */*",
            "Authorization: Bearer " .  $_SESSION['accessToken'],
            "content-type: multipart/form-data"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
        header("Location: oqueFazemosCadastro.php?status=0");
    } else {
        echo $response;
        header("Location: oqueFazemosCadastro.php?status=1");
    }
} catch (Exception $e) {
    echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    header("Location: oqueFazemosCadastro.php?status=2");
}
