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
                    <h4>Departement</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><strong><a href="index.php">Home</a></strong></li>
                    <li class="breadcrumb-item active"><a href="fac-dep.php">Departement</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Modifier la Departement</a></li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-xxl-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title"><strong>Modifier le Departement</strong></h5>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_GET['id'])) {
                            $departement_id = $_GET['id'];
                            $departement = "SELECT * FROM departement WHERE id ='$departement_id'";
                            $departement_run = mysqli_query($con, $departement);

                            if (mysqli_num_rows($departement_run) > 0) {
                                $departement_row = mysqli_fetch_array($departement_run)

                                    ?>
                                <form action="function.php" method="post">
                                    <input type="hidden" name="departement_id" value="<?= $departement_row['id']; ?>">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Nom du Departement</label>
                                                <input type="text" name="nom_departement" class="form-control" value="<?= $departement_row['nom_departement']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Faculte</label>
                                                 <?php
                                                        $faculte = "SELECT * FROM faculte";
                                                        $faculte_run = mysqli_query($con, $faculte);

                                                        if (mysqli_num_rows($faculte_run) > 0) {
                                                            ?>
                                                            <select class="form-control form-white" data-placeholder="Entrez la faculté" name="id_faculte">
                                                                <?php
                                                                foreach ($faculte_run as $list_faculte) {
                                                                    ?>
                                                                    
                                                                    <option value="<?= $list_faculte['id']; ?>"<?= $list_faculte['id']== $departement_row['id_faculte']? 'selected':'' ?>><?= $list_faculte['name'] ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                            <?php
                                                        } else {
                                                            ?>
                                                                <select class="form-control form-white">
                                                                    <option value="" class="text-danger">Aucune faculté disponible</option>
                                                                </select>
                                                            <?php
                                                        }
                                                    ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <button type="submit" name="modifier_departement"
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