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
                        <h6 class="m-0 font-weight-bold text-primary">Cadastrar o que nós já fizemos</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <form class="user row" enctype="multipart/form-data" method="post" action="oqueFazemosCadastroController.php">
                            <div class="form-group col-xl-6">
                                <input type="text" class="form-control form-control-user" name="name" placeholder="Enter name" />
                            </div>
                            <div class="form-group col-xl-6">
                                <label class="input-personalizado">
                                    <span class="botao-selecionar">Selecione uma imagem</span>
                                    <img class="imagem" />
                                    <input type="file" class="input-file" name="image" accept="image/png, image/jpeg">
                                </label>
                            </div>
                            <div class="form-group col-xl-12">
                                <textarea type="text" class="form-control form-control-user" name="description" placeholder="Enter email"></textarea>
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