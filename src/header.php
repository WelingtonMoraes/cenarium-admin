<?php
session_start();

if (empty($_SESSION['accessToken'])) {
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<?php

if (isset($_GET['status'])) {

    if ($_GET['status'] == 1) {
        echo '<div class="alert alert-success" role="alert">
            Tarefa realizada com sucesso
        </div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">
        Ops ! algo deu errado
      </div>';
    }
}

?>


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Capiware - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        .alert {
            position: absolute;
            z-index: 99;
            width: 300px;
            top: 40px;
            right: 40px;
        }

        .formatImage {
            width: 50px;
            height: 50px;
            border-radius: 90px;
            object-fit: cover;
        }

        .form-upload {
            background: #333;
            display: block;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
            width: 350px;
        }

        .botao-selecionar {
            background-color: #dc9713;
            color: #fff;
            padding: 5px 15px;
            border-radius: 31px;
        }

        .input-personalizado {
            cursor: pointer;
        }

        .imagem {
            width: 100%;
            max-width: 430px;
            margin-top: 20px;
        }

        .input-file {
            display: none;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include('navBar.php'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">