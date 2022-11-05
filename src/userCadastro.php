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
                        <h6 class="m-0 font-weight-bold text-primary">Cadastrar Usuário</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <form class="user row" method="post" action="userCadastroController.php">
                            <div class="form-group col-xl-6">
                                <input type="text" class="form-control form-control-user" name="name" placeholder="Enter name" />
                            </div>
                            <div class="form-group col-xl-6">
                                <input type="email" class="form-control form-control-user" name="email" placeholder="Enter email" />
                            </div>
                            <input type="submit" value="Login" class="btn btn-primary btn-user btn-block col-xl-6"></input>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include('footer.php') ?>