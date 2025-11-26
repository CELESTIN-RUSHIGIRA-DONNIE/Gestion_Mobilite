<?php include("inc/header.php");?>
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">

                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Fiche de Mobilité</h4>
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

                <?php if ($demande_en_attente): ?>
                    <div class="alert alert-danger alert-dismissible alert-alt solid fade show">
                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span></button>
                        <strong>Attention!!! </strong> Vous avez déjà une demande de mobilité en attente. Veuillez attendre la décision avant de soumettre une nouvelle demande.
                    </div>
                <?php endif; ?>

                <div class="row">
                    <div class="col-xl-12 col-xxl-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title"><strong>Completer la fiche de mobilité</strong></h5>
                            </div>
                            <div class="card-body">
                                <form action="function.php" method="post">
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
                                                <label class="form-label">Organisation d'acceuil</label>
                                                <input type="text" name="organisation_acceuil" class="form-control">
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
                                                <input name="date_depart" class="datepicker-default form-control"
                                                    id="datepicker">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Date de Retour</label>
                                                <input type="date" name="date_retour" class="datepicker-default form-control">
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
                                            <?php if ($demande_en_attente): ?>
                                                <button class="btn btn-warning" disabled>
                                                    Vous avez déjà une demande en attente
                                                </button>                                              
                                            <?php else: ?>
                                                <button type="submit" name="send_demande" class="btn btn-primary">Submit</button>
                                                <button type="submit" class="btn btn-light">Cencel</button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
<?php include("inc/footer.php");?>