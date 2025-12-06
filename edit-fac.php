<?php include("inc/header.php"); ?>
<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">

        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Faculté</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><strong><a href="index.php">Home</a></strong></li>
                    <li class="breadcrumb-item active"><a href="fac-dep.php">Faculté</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Modifier la Faculté</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-xxl-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title"><strong>Modifier la Faculté</strong></h5>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_GET['id'])) {
                            $faculte_id = $_GET['id'];
                            $faculte = "SELECT * FROM faculte WHERE id ='$faculte_id'";
                            $faculte_run = mysqli_query($con, $faculte);

                            if (mysqli_num_rows($faculte_run) > 0) {
                                $fac_row = mysqli_fetch_array($faculte_run)

                                    ?>
                                <form action="function.php" method="post">
                                    <input type="hidden" name="faculte_id" value="<?= $fac_row['id']; ?>">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Nom de la Faculté</label>
                                                <input type="text" name="nom_faculte" class="form-control" value="<?= $fac_row['name']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Designation</label>
                                                <input type="text" name="designation" class="form-control" value="<?= $fac_row['designation']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <button type="submit" name="modifier_faculte"
                                                class="btn btn-primary">Modifier</button>
                                        </div>
                                    </div>

                                </form>
                            <?php

                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("inc/footer.php"); ?>