<?php include('header.php'); ?>

<!-- Main Content -->
<div id="content">

    <!-- Topbar -->
    <?php include('topNavBar.php'); ?>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Content Row -->
        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Cadastrar especialidades</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <form class="user row" enctype="multipart/form-data" method="post" action="especialidadesCadastroController.php">
                            <div class="form-group col-xl-6">
                                <input type="text" class="form-control form-control-user" name="titulo" placeholder="Titulo" />
                            </div>
                            <div class="form-group col-xl-6">
                                <input type="text" class="form-control form-control-user" name="subTitulo" placeholder="SubTitulo" />
                            </div>
                            <div class="form-group col-xl-6">
                                <input type="file" name="image[]" accept="image/png, image/jpeg" multiple="multiple">
                            </div>
                            <div class="form-group col-xl-6">
                                <label for="tipoEspecialidade">Selecione o tipo do projeto: </label>
                                <select id="tipoEspecialidade" name="tipo">
                                    <option value="DESFILE">EXPOSIÇÕES</option>
                                    <option value="ATRACAO">ESCULTURAS</option>
                                    <option value="CONCERTO">ILUMINAÇÃO CÊNICA</option>
                                </select>
                            </div>
                            <div class="form-group col-xl-12">
                                <textarea type="text" class="form-control form-control-user" name="description" placeholder="Descrição"></textarea>
                            </div>

                            <div class="form-group col-xl-3">
                                <input type="number" class="form-control form-control-user" name="altura" placeholder="Altura (centímetros)" />
                            </div>
                            <div class="form-group col-xl-3">
                                <input type="number" class="form-control form-control-user" name="largura" placeholder="Largura (centímetros)" />
                            </div>
                            <div class="form-group col-xl-3">
                                <input type="number" class="form-control form-control-user" name="comprimento" placeholder="Comprimento (centímetros)" />
                            </div>
                            <div class="form-group col-xl-3">
                                <input type="number" class="form-control form-control-user" name="profundidade" placeholder="Profundidade (centímetros)" />
                            </div>

                            <div class="form-group col-xl-9">
                                <input type="text" class="form-control form-control-user" name="material" placeholder="Material" />
                            </div>

                            <div class="form-group col-xl-3">
                                <input type="text" class="form-control form-control-user" name="tempo" placeholder="Tempo de producao (Ex: 5 meses)" />
                            </div>

                            <div class="form-group col-xl-12">
                                <div style="display: inline-block;">
                                    <input type="submit" value="Enviar" class="btn btn-primary btn-user btn-block"></input>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script>
    const $ = document.querySelector.bind(document);

    const previewImg = $('.imagem');
    const fileChooser = $('.input-file');

    fileChooser.onchange = e => {
        const fileToUpload = e.target.files.item(0);
        const reader = new FileReader();
        reader.onload = e => previewImg.src = e.target.result;
        reader.readAsDataURL(fileToUpload);
    };
</script>

<?php include('footer.php') ?>