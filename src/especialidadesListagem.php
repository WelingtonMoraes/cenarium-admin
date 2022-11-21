<?php

include('consfig.php');
include('classCurl.php');

$url = $urlApi . "speciality";

$arraySpeciality = getRequest($url);

foreach ($arraySpeciality as $key => $value) {

    if ($value->type == 'DESFILE') {
        $desfile = $value->specialities;
    }

    if ($value->type == 'ATRACAO') {
        $atracao = $value->specialities;
    }

    if ($value->type == 'CONCERTO') {
        $concerto = $value->specialities;
    }
}


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
                <h1 class="h3 mb-2 text-gray-800">Especialidades</h1>
                <p class="mb-4">Para cadastrar <a href="especialidadesCadastro.php">mais especialidades</a>.</p>


                <?php if (!empty($desfile)) : ?>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">EXPOSIÇÕES</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Foto</th>
                                            <!-- <th>Nome</th>
                                            <th>Descrição</th>
                                            <th>Editar</th> -->
                                            <th>Excluir</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Foto</th>
                                            <!-- <th>Nome</th>
                                            <th>Descrição</th>
                                            <th>Editar</th> -->
                                            <th>Excluir</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($desfile as $key => $value) : ?>
                                            <tr>
                                                <td>
                                                    <img class="formatImage" src="<?= $value->image ?>">
                                                </td>
                                                <!-- <td>naosei</td>
                                                <td>naosei</td>
                                                <td><a href="#">
                                                        <i class="fa fa-wrench" aria-hidden="true"></i>
                                                    </a>
                                                </td> -->
                                                <td>
                                                    <a href="<?= 'especialidadesDelete.php?id=' . $value->id ?>">
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

                <?php if (!empty($atracao)) : ?>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">ESCULTURAS</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Foto</th>
                                            <!-- <th>Nome</th>
                                            <th>Descrição</th>
                                            <th>Editar</th> -->
                                            <th>Excluir</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Foto</th>
                                            <!-- <th>Nome</th>
                                            <th>Descrição</th>
                                            <th>Editar</th> -->
                                            <th>Excluir</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($atracao as $key => $value) : ?>
                                            <tr>
                                                <td>
                                                    <img class="formatImage" src="<?= $value->image ?>">
                                                </td>
                                                <!-- <td>naosei</td>
                                                <td>naosei</td>
                                                <td><a href="#">
                                                        <i class="fa fa-wrench" aria-hidden="true"></i>
                                                    </a>
                                                </td> -->
                                                <td>
                                                    <a href="<?= 'especialidadesDelete.php?id=' . $value->id ?>">
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

                <?php if (!empty($concerto)) : ?>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">ILUMINAÇÃO CÊNICA</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Foto</th>
                                            <!-- <th>Nome</th>
                                            <th>Descrição</th>
                                            <th>Editar</th> -->
                                            <th>Excluir</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Foto</th>
                                            <!-- <th>Nome</th>
                                            <th>Descrição</th>
                                            <th>Editar</th> -->
                                            <th>Excluir</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($concerto as $key => $value) : ?>
                                            <tr>
                                                <td>
                                                    <img class="formatImage" src="<?= $value->image ?>">
                                                </td>
                                                <!-- <td>naosei</td>
                                                <td>naosei</td>
                                                <td><a href="#">
                                                        <i class="fa fa-wrench" aria-hidden="true"></i>
                                                    </a>
                                                </td> -->
                                                <td>
                                                    <a href="<?= 'especialidadesDelete.php?id=' . $value->id ?>">
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