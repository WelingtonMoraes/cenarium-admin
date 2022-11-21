<?php
session_start();
include('consfig.php');
include('classCurl.php');

// if (empty($_POST['name']) || empty($_POST['description']) || empty($_FILES)) {
//     header("Location: oqueFazemosCadastro.php?status=0");
// }


try {
    $url = $urlApi . "speciality";

    $files = array();
    foreach ($_FILES["image"]["error"] as $key => $error) {
        if ($error == UPLOAD_ERR_OK) {

            $files[] = [
                'name' => $_FILES['image']['name'][$key],
                'tmp_name' => $_FILES['image']['tmp_name'][$key],
                'full_path' => $_FILES['image']['full_path'][$key],
                'type' => $_FILES['image']['type'][$key],
            ];
        }
    }

    $content = "-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"Titulo\"\r\n\r\n" . $_POST['titulo'] . "\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"SubTitulo\"\r\n\r\n" . $_POST['subTitulo'] . "\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"Tipo\"\r\n\r\n" . $_POST['tipo'] . "\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"Descricao\"\r\n\r\n" . $_POST['description'] . "\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"PaginaInicial\"\r\n\r\n" . "TRUE" . "\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"Detalhes.Altura\"\r\n\r\n" . $_POST['altura'] . "\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"Detalhes.Largura\"\r\n\r\n" . $_POST['largura'] . "\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"Detalhes.Comprimento\"\r\n\r\n" . $_POST['comprimento'] . "\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"Detalhes.Profundidade\"\r\n\r\n" . $_POST['profundidade'] . "\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"Detalhes.Material\"\r\n\r\n" . $_POST['material'] . "\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"Detalhes.TempoDeProducao\"\r\n\r\n" . $_POST['tempo'] . "\r\n";

    foreach ($files as $file) {
        $fileBaseName = basename($file['full_path']);
        $fileContent = file_get_contents($file['tmp_name']);

        $content .= "-----011000010111000001101001\r\n";
        $content .= "Content-Disposition: form-data; name=\"Imagens\"; filename=\"{$fileBaseName}\"\r\n";
        $content .= "Content-Type: " . $file['type'] . "\r\n\r\n{$fileContent}\r\n";
    }

    // foreach ($files as $file) {
    //     $content .= "-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"Imagens\"; filename=\"" . $file['name'] . "\"\r\nContent-Type: " . $file['type'] . "\r\n\r\n" . $file['tmp_name'] . "\r\n";
    // }

    $content .= "-----011000010111000001101001--\r\n";

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLINFO_HEADER_OUT => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $content,
        CURLOPT_HTTPHEADER => [
            "Accept: */*",
            "Authorization: Bearer " .  $_SESSION['accessToken'],
            "content-type: multipart/form-data; boundary=---011000010111000001101001"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
        header("Location: especialidadesCadastro.php?status=0");
    } else {
        echo $response;
        header("Location: especialidadesCadastro.php?status=1");
    }
} catch (Exception $e) {
    echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    header("Location: especialidadesCadastro.php?status=2");
}
