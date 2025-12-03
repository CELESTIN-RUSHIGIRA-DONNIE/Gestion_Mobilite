<?php include("inc/header.php"); ?>

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <?php
        if (isset($_GET['id'])) {
            $demande_id = $_GET['id'];
            $query = "SELECT agents.*, demande_Bourse.*
                            FROM demande_Bourse
                            INNER JOIN agents ON demande_bourse.id_ut_bour_fk = agents.id
                             WHERE demande_bourse.id_ut_bour_fk='$demande_id'";
            $query_run = mysqli_query($con, $query);
            if (mysqli_num_rows($query_run) > 0) {
                foreach ($query_run as $list) {
                    ?>

                    <div class="row page-titles mx-0">
                        <div class="col-sm-6 p-md-0">
                            <div class="welcome-text">
                                <h4>Voir la fiche de Mobilité</h4>
                            </div>
                        </div>
                        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active"><a href="#">Demande</a></li>
                                <li class="breadcrumb-item active"><a
                                        href="javascript:void(0);"><Strong><?= $list['nom'] . ' ' . $list['postnom'] ?></Strong></a>
                                </li>
                            </ol>
                        </div>
                    </div>
                    <?php if ($_SESSION['auth_user']['role'] == 'SGR' && $list['ver_doyen'] == 'no_verify'): ?>
                        <div class="alert alert-danger alert-dismissible alert-alt solid fade show">
                            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span></button>
                            <strong>Attention!!! </strong> La demande n'a pas encore été validée par le Doyen de la faculté.
                        </div>
                    <?php endif; ?>
                    <?php if ($_SESSION['auth_user']['role'] == 'SGAC' && $list['ver_sgr'] == 'no_verify'): ?>
                        <div class="alert alert-danger alert-dismissible alert-alt solid fade show">
                            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span></button>
                            <strong>Attention!!! </strong>  La demande n'a pas encore été validée par le sécretaire chargé de recherche.
                        </div>
                    <?php endif; ?>
                    <?php if ($_SESSION['auth_user']['role'] == 'RECTORAT' && $list['ver_acad'] == 'no_verify'): ?>
                        <div class="alert alert-danger alert-dismissible alert-alt solid fade show">
                            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span></button>
                            <strong>Attention!!! </strong> La demande n'a pas encore été validée par le sécretaire général academique
                        </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col-xl-3 col-xxl-4 col-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="text-center p-3 overlay-box"
                                            style="background-image: url(assets/images/big/img1.jpg);">
                                            <div class="profile-photo">
                                                <img src="uploads/<?= $list['photo'] ?>" width="100"
                                                    class="img-fluid rounded-circle" alt="">
                                            </div>
                                            <h3 class="mt-3 mb-1 text-white">
                                                <Strong><?= $list['nom'] . ' ' . $list['postnom'] . ' ' . $list['prenom'] ?></Strong>
                                            </h3>
                                            <p class="text-white mb-0"><Strong><?= $list['Grade'] ?></Strong></p>
                                        </div>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item d-flex justify-content-between"><span
                                                    class="mb-0">Email</span> <strong
                                                    class="text-muted"><?= $list['email'] ?></strong>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between"><span
                                                    class="mb-0">Telephone</span> <strong
                                                    class="text-muted"><?= $list['telephone'] ?></strong>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between"><span
                                                    class="mb-0">Adresse</span> <strong
                                                    class="text-muted"><?= $list['adress'] ?></strong>
                                            </li>
                                        </ul>
                                        <div class="card-footer text-center border-0 mt-0">
                                            <a href="fiche.php?id=<?= $list['id_ut_bour_fk']; ?>"
                                                class="btn btn-primary btn-rounded px-4">Visualiser</a>
                                            <?php if ($_SESSION['auth_user']['role'] == 'DOYEN'): ?>
                                                <form action="function.php" method="POST">
                                                    <button type="submit" name="validation_doyen" value="<?= $list['id_ut_bour_fk']; ?>"class="btn btn-success btn-rounded px-4">Valider</button>
                                                </form>
                                            <?php endif; ?>
                                            <?php if ($_SESSION['auth_user']['role'] == 'SGR' && $list['ver_doyen'] == 'verify'): ?>
                                                <form action="function.php" method="POST">
                                                    <button type="submit" name="validation_sgr" value="<?= $list['id_ut_bour_fk']; ?>"
                                                        class="btn btn-success btn-rounded px-4">Valider</button>
                                                </form>
                                            <?php endif; ?>
                                            <?php if ($_SESSION['auth_user']['role'] == 'SGAC' && $list['ver_sgr'] == 'verify'): ?>
                                                <form action="function.php" method="POST">
                                                    <button type="submit" name="validation_sgac" value="<?= $list['id_ut_bour_fk']; ?>"
                                                        class="btn btn-success btn-rounded px-4">Valider</button>
                                                </form>
                                            <?php endif; ?>
                                            <?php if ($_SESSION['auth_user']['role'] == 'RECTORAT' && $list['ver_acad'] == 'verify'): ?>
                                                <form action="function.php" method="POST">
                                                    <button type="submit" name="validation_rectorat" value="<?= $list['id_ut_bour_fk']; ?>"
                                                        class="btn btn-success btn-rounded px-4">Valider</button>
                                                </form>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h2 class="card-title"><B>Situation des prestations</B></h2>
                                        </div>
                                        <div class="card-body pb-0">
                                            <p>Situation des prestations à la faculté d’attache et avis du Doyen</p>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item d-flex px-0 justify-content-between">
                                                    <strong>Charge horaire</strong>
                                                    <span class="mb-0">150H</span>
                                                </li>
                                                <li class="list-group-item d-flex px-0 justify-content-between">
                                                    <strong>Charge horaire déjà prestée</strong>
                                                    <span class="mb-0">80H</span>
                                                </li>
                                                <li class="list-group-item d-flex px-0 justify-content-between">
                                                    <strong>Nombre d’étudiants sous encadrement</strong>
                                                    <span class="mb-0">40</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-footer pt-0 pb-0 text-center">
                                            <div class="row">
                                                <div class="col-4 pt-3 pb-3 border-right">
                                                    <h3 class="mb-1 text-primary">150</h3>
                                                    <span>Projects</span>
                                                </div>
                                                <div class="col-4 pt-3 pb-3 border-right">
                                                    <h3 class="mb-1 text-primary">140</h3>
                                                    <span>Uploads</span>
                                                </div>
                                                <div class="col-4 pt-3 pb-3">
                                                    <h3 class="mb-1 text-primary">45</h3>
                                                    <span>Tasks</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header text-center">
                                            <h2 class="card-title"><B>Validation Doyen</B></h2>
                                        </div>
                                        <div class="card-body pb-0">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item d-flex px-0 justify-content-between">
                                                    <strong>Date Validation</strong>
                                                    <span class="mb-0">150H</span>
                                                </li>
                                                <li class="list-group-item d-flex px-0 justify-content-between">
                                                    <strong>Nom du Doyen</strong>
                                                    <span class="mb-0">KANAMBE</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-xxl-8 col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="profile-tab">
                                        <div class="custom-tab-1">
                                            <ul class="nav nav-tabs">
                                                <li class="nav-item"><a href="#about-me" data-toggle="tab"
                                                        class="nav-link active show">A propos de l'agent</a></li>
                                                <li class="nav-item"><a href="#my-posts" data-toggle="tab"
                                                        class="nav-link">Posts</a></li>
                                            </ul>
                                            <br>
                                            <div class="profile-personal-info">
                                                <h4 class="text-primary mb-4">Information sur la mobilité</h4>
                                                <div class="row mb-4">
                                                    <div class="col-lg-6 col-md-4 col-sm-6 col-6">
                                                        <h5 class="f-w-500">Type de Mobilite <span class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-lg-6 col-md-8 col-sm-6 col-6">
                                                        <strong><?= $list['type_mobilite'] ?></strong>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-lg-6 col-md-6 col-sm-8 col-8">
                                                        <h5 class="f-w-500">Objectif de la Mobilite <span
                                                                class="pull-right">:</span></h5>
                                                    </div>
                                                    <div class="col-lg-6 col-md-8 col-sm-6 col-6">
                                                        <strong><?= $list['objectif_mobilite'] ?></strong>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-lg-6 col-md-4 col-sm-6 col-6">
                                                        <h5 class="f-w-500">Durée du séjour <span class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-lg-6 col-md-8 col-sm-6 col-6">
                                                        <strong><?= $list['dure_sejour'] ?></strong>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-lg-6 col-md-4 col-sm-6 col-6">
                                                        <h5 class="f-w-500">organisation d’accueil <span class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-lg-6 col-md-8 col-sm-6 col-6">
                                                        <strong><?= $list['organisation_accueil'] ?></strong>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-lg-6 col-md-4 col-sm-6 col-6">
                                                        <h5 class="f-w-500">Programme d'intervention <span
                                                                class="pull-right">:</span></h5>
                                                    </div>
                                                    <div class="col-lg-6 col-md-8 col-sm-6 col-6">
                                                        <strong><?= $list['programme_intervention'] ?></strong>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-lg-6 col-md-4 col-sm-6 col-6">
                                                        <h5 class="f-w-500">Date probable de depart <span
                                                                class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-lg-6 col-md-8 col-sm-6 col-6">
                                                        <strong><?= $list['date_depart'] ?></strong><br>
                                                        <?php $depart = new DateTime($list['date_depart']);  ?>
                                                        <?php $retour = new DateTime($list['date_retour']);  ?>
                                                        
                                                        <?php $interval = $depart->diff($retour);
                                                        echo $interval->format('%a jours, %h heures, %i minutes, %s secondes');?><br>

                                                        <?php
                                                        $depart = $list['date_depart']; // format "Y-m-d H:i:s"
                                                        ?>
                                                        <span id="countdown"></span>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-lg-6 col-md-4 col-sm-6 col-6">
                                                        <h5 class="f-w-500">Date probable de retour <span
                                                                class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-lg-6 col-md-8 col-sm-6 col-6">
                                                        <strong><?= $list['date_retour'] ?></strong><br>
                                                        <?php
                                                            // $aller  = $list['date_depart'];
                                                            $aller = date('Y-m-d', strtotime($list['date_depart']));
                                                            $retour = date('Y-m-d', strtotime($list['date_retour'])); // ex: 2025-12-20 18:30:00
                                                        ?>
                                                        <span id="countdown-retour"></span>
                                                    </div>
                                                </div>
                                                <div class="row mb-4">
                                                    <div class="col-lg-6 col-md-4 col-sm-6 col-6">
                                                        <h5 class="f-w-500">Soutient requis de la part de l’UEA <span
                                                                class="pull-right">:</span>
                                                        </h5>
                                                    </div>
                                                    <div class="col-lg-6 col-md-8 col-sm-8 col-8">
                                                        <strong><?= $list['soutient_uea'] ?></strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if ($_SESSION['auth_user']['role'] == 'DOYEN'): ?>
                                        <div class="card-header">
                                            <h4 class="card-title">Avis du Doyen de la Faculté</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="basic-form">
                                                <form action="function.php" method="post">
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Avis</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="avis" class="form-control"
                                                                placeholder="Votre avis">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Justification</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="justification" class="form-control"
                                                                placeholder="Justification">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-10">
                                                            <button type="submit" name="avis_doyen"
                                                                value="<?= $list['id_ut_bour_fk']; ?>"
                                                                class="btn btn-primary">Enregistrer</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }
            }
        }
        ?>
</div>
</div>

<?php include("inc/footer.php"); ?>