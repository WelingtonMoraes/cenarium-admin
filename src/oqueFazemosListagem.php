<?php

include('consfig.php');
include('classCurl.php');

$url = $urlApi . "what-we-do";

$arrayWhat = getRequest($url);

?>

<?php include('header.php'); ?>

<!-- Page Wrapper -->
<div id="content">

    <?php include('topNavBar.php'); ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">O que fazemos</h1>
                <p class="mb-4">Para cadastrar <a href="timeCadastro.php">mais o que fazemos</a>.</p>

                <?php if (!empty($arrayWhat)) : ?>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Lista de o que fizemos</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Foto</th>
                                            <th>Nome</th>
                                            <th>Descrição</th>
                                            <th>Editar</th>
                                            <th>Excluir</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Foto</th>
                                            <th>Nome</th>
                                            <th>Descrição</th>
                                            <th>Editar</th>
                                            <th>Excluir</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($arrayWhat as $key => $value) : ?>
                                            <tr>
                                                <td>
                                                    <img class="formatImage" src="<?= $value->image ?>" alt="<?= $value->description ?>">
                                                </td>
                                                <td><?= $value->name ?></td>
                                                <td><?= $value->description ?></td>
                                                <td><a href="#">
                                                        <i class="fa fa-wrench" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="<?= 'oqueFazemosDelete.php?id=' . $value->id ?>">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

</div>

<?php include('footer.php') ?>