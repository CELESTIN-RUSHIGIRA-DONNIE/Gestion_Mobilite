<?php include("inc/header.php"); ?>

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">

        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Ma demande</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Demande</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Voir Ma demande</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <?php include("inc/fonction.php"); ?>

                <?php if ($demande_validee): ?>
                    <div class="alert alert-success alert-dismissible alert-alt solid fade show">
                        <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i
                                    class="mdi mdi-close"></i></span></button>
                        <strong>Félicitations!</strong> Votre demande de mobilité a été entièrement validée. Vous pouvez
                        maintenant télécharger votre lettre d'approbation.
                    </div>
                <?php endif; ?>
                <div class="row tab-content">
                    <div id="list-view" class="tab-pane fade active show col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><strong>Ma demande</strong></h4>
                            </div>
                            <div class="card-body" id="demande_table">
                                <div class="table-responsive">
                                    <table id="example3" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>Vérification Doyen</th>
                                                <th>Date</th>
                                                <th>Vérification SGR</th>
                                                <th>Date</th>
                                                <th>Vérification SGAC</th>
                                                <th>Date</th>
                                                <th>Vérification RECTORAT</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $demande = "SELECT agents.*, demande_Bourse.* FROM demande_Bourse
                                                INNER JOIN agents ON demande_bourse.id_ut_bour_fk = agents.id WHERE agents.id=$user_id";
                                            $demande_run = mysqli_query($con, $demande);

                                            if (mysqli_num_rows($demande_run) > 0) {
                                                foreach ($demande_run as $list) {
                                                    ?>
                                                    <?php if ($demande_validee): ?>
                                                        <tr>
                                                            <td colspan="9" class="text-center">
                                                                <?php
                                                                $depart = $list['date_depart']; // format "Y-m-d H:i:s"
                                                                ?>
                                                                <span id="countdown"></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="9" class="text-center">
                                                                <?php
                                                                    // $aller  = $list['date_depart'];
                                                                    $aller = date('Y-m-d', strtotime($list['date_depart']));
                                                                    $retour = date('Y-m-d', strtotime($list['date_retour'])); // ex: 2025-12-20 18:30:00
                                                                ?>
                                                                <span id="countdown-retour" class="fw-bold"></span>
                                                            </td>
                                                        </tr>
                                                    <?php endif; ?>
                                                    <tr>
                                                        <td
                                                            class="<?= $list['ver_doyen'] == 'no_verify' ? 'text-danger' : 'text-success' ?>">
                                                            <?= $list['ver_doyen'] == 'no_verify' ? 'Non Valide' : 'Valider'; ?>
                                                        </td>
                                                        <td><?= $list['date_ver_doyen']; ?></td>
                                                        <td
                                                            class="<?= $list['ver_sgr'] == 'no_verify' ? 'text-danger' : 'text-success' ?>">
                                                            <?= $list['ver_sgr'] == 'no_verify' ? 'Non Valide' : 'Valider'; ?>
                                                        </td>
                                                        <td><?= $list['date_ver_sgr']; ?></td>
                                                        <td
                                                            class="<?= $list['ver_acad'] == 'no_verify' ? 'text-danger' : 'text-success' ?>">
                                                            <?= $list['ver_acad'] == 'no_verify' ? 'Non Valide' : 'Valider'; ?>
                                                        </td>
                                                        <td><?= $list['date_ver_acad']; ?></td>
                                                        <td
                                                            class="<?= $list['ver_rect'] == 'no_verify' ? 'text-danger' : 'text-success' ?>">
                                                            <?= $list['ver_rect'] == 'no_verify' ? 'Non Valide' : 'Valider'; ?>
                                                        </td>
                                                        <td><?= $list['date_ver_rect']; ?></td>
                                                        <td>
                                                            <button type="button" class="btn btn-danger btn-sm delete_demande_btn" value="<?= $list['id']; ?>"><i class="la la-trash-o"></i></button>
                                                        </td>
                                                        
                                                    </tr>
                                                    <?php
                                                }
                                            } else {
                                                ?>
                                                <tr>
                                                    <td colspan="9" class="bg-danger text-white text-center">Vous n'avez
                                                        aucune demande de bourse.</td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("inc/footer.php"); ?>