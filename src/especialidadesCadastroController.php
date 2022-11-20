<?php
session_start();
include('consfig.php');
include('classCurl.php');

// if (empty($_POST['name']) || empty($_POST['description']) || empty($_FILES)) {
//     header("Location: oqueFazemosCadastro.php?status=0");
// }

echo '<pre>';
print_r($_POST);
echo '</pre>';

echo '<pre>';
print_r($_FILES);
echo '</pre>';

try {

    $files = array();

    foreach ($_FILES["image"]["error"] as $key => $error) {
        if ($error == UPLOAD_ERR_OK) {

            $files["image[$key]"] = curl_file_create(
                $_FILES['image']['tmp_name'][$key],
                $_FILES['image']['type'][$key],
                $_FILES['image']['name'][$key]
            );
        }
    }

    $url = $urlApi . "speciality";
    $data = [
        "Titulo"  => $_POST['titulo'],
        "SubTitulo" => $_POST['subTitulo'],
        "Imagens" => $files,
        "Tipo" => $_POST['tipo'],
        "Descricao" => $_POST['description'],
        "PaginaInicial" => 'true',
        "Detalhes.Altura" => $_POST['altura'],
        "Detalhes.Largura" => $_POST['largura'],
        "Detalhes.Comprimento" => $_POST['comprimento'],
        "Detalhes.Profundidade" => $_POST['profundidade'],
        "Detalhes.Material" => $_POST['material'],
        "Detalhes.TempoDeProducao" => $_POST['tempo'],
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
        //header("Location: especialidadesCadastro.php?status=0");
    } else {
        echo $response;
        //header("Location: especialidadesCadastro.php?status=1");
    }
} catch (Exception $e) {
    echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    //header("Location: especialidadesCadastro.php?status=2");
}
