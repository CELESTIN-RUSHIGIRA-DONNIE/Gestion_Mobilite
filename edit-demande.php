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
                    <h4>Modifier votre Fiche de Mobilité</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><strong><a href="index.php">Home</a></strong></li>
                    <li class="breadcrumb-item active"><a href="add-professor.html">Fiche</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Fiche de Mobilite</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-xxl-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title"><strong>Modifier la fiche de mobilité</strong></h5>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_GET['id'])) {
                            $faculte_id = $_GET['id'];
                            $faculte = "SELECT * FROM demande_bourse WHERE id ='$faculte_id'";
                            $faculte_run = mysqli_query($con, $faculte);

                            if (mysqli_num_rows($faculte_run) > 0) {
                                $fac_row = mysqli_fetch_array($faculte_run)

                                    ?>
                                <form action="function.php" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Type de Mobilité</label>
                                                <input type="text" name="type_mobilite" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Objectif de Mobilité</label>
                                                <input type="text" name="objectif_mobilite" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Durée de Sejour</label>
                                                <input type="text" name="dure_sejour" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Organisation d'accueil</label>
                                                <input type="text" name="organisation_accueil" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Programme d'intervention</label>
                                                <input type="text" name="programme_intervention" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Date de Depart</label>
                                                <input name="date_depart" type="date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Date de Retour</label>
                                                <input type="date" name="date_retour" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Financement de la mobilité couvert par</label>
                                                <input type="text" name="financement_mobilite" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Soutient de l'UEA</label>
                                                <input type="text" name="soutient_uea" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group fallback w-100">
                                                <label class="form-label">Votre fiche de contrat de bourse</label>
                                                <input type="file" name="mon_fichier" class="dropify" data-default-file="">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <button type="submit" name="send_demande" class="btn btn-primary">Modifier</button>
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