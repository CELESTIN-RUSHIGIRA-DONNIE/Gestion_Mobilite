<?php include("inc/header.php"); ?>

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">

        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Fees Receipt</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Fees</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Fees Receipt</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <?php
                if (isset($_GET['id'])) {
                    $view_id = $_GET['id'];
                    $demande = "SELECT agents.*, demande_Bourse.*,    
                    a_doyen.nom AS nom_doyen,
                    a_doyen.postnom AS postnom_doyen,
                    a_doyen.prenom AS prenom_doyen,
                    a_doyen.role AS role_doyen,

                    a_sgr.nom AS nom_sgr,
                    a_sgr.postnom AS postnom_sgr,
                    a_sgr.prenom AS prenom_sgr,
                    a_sgr.role AS role_sgr,

                    a_acad.nom AS nom_acad,
                    a_acad.postnom AS postnom_acad,
                    a_acad.prenom AS prenom_acad,
                    a_acad.role AS role_acad,

                    a_rect.nom AS nom_rect, 
                    a_rect.postnom AS postnom_rect,
                    a_rect.prenom AS prenom_rect,
                    a_rect.role AS role_rect,

                    demande_bourse.id AS demande_id FROM demande_Bourse
                    LEFT JOIN agents a_doyen 
                    ON demande_bourse.id_doyen = a_doyen.id
                    LEFT JOIN agents a_sgr 
                    ON demande_bourse.id_sgr = a_sgr.id
                    LEFT JOIN agents a_acad
                    ON demande_bourse.id_acad = a_acad.id
                    LEFT JOIN agents a_rect
                    ON demande_bourse.id_rect = a_rect.id
                    INNER JOIN agents ON demande_bourse.id_ut_bour_fk = agents.id WHERE agents.id=$view_id";
                    $demande_run = mysqli_query($con, $demande);

                    if (mysqli_num_rows($demande_run) > 0) {
                        foreach ($demande_run as $list) {
                            ?>
                            <div class="card mt-3">
                                <div class="card-header"> Details <strong><?= date('d/m/Y'); ?></strong> <span class="float-right">
                                        <strong></strong> </span> </div>
                                <div class="card-body">
                                    <div class="row mb-5">
                                        <div class="mt-4 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                            <h6>Demande de :</h6>
                                            <div>
                                                <strong><?= $list['nom'] . ' ' . $list['postnom'] . ' ' . $list['prenom'] ?></strong>
                                            </div>
                                            <div>Matricule : <?= $list['matricule'] ?></div>
                                            <div>Email: <?= $list['email'] ?></div>
                                            <div>Phone: <?= $list['telephone'] ?></div>
                                        </div>
                                    </div>
                                    <div class="table-responsive-sm">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="center">N°</th>
                                                    <th class="left">nom</th>
                                                    <th>Niveau de Validation</th>
                                                    <th>STATUS</th>
                                                    <th class="right">DATE</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="center">1</td>
                                                    <td class="left strong">
                                                        <?= $list['nom_doyen'] . ' ' . $list['postnom_doyen'] . ' '. $list['prenom_doyen'] ?>
                                                    </td>
                                                    <td class="right"><?= $list['role_doyen'] == 'DOYEN' ? 'Doyen de la faculté' : '' ?></td>
                                                    <td
                                                        class="<?= $list['ver_doyen'] == 'no_verify' ? '' : 'badge badge-rounded badge-success' ?>">
                                                        <?= $list['ver_doyen'] == 'no_verify' ? '' : 'Valider'; ?>
                                                    </td>
                                                    <td class="right">
                                                        <?php if (!empty($list['date_ver_doyen'])): ?>
                                                            <?= date('d/m/Y', strtotime($list['date_ver_doyen'])) ?>
                                                        <?php else: ?>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="center">2</td>
                                                    <td class="left strong">
                                                        <?= $list['nom_sgr'] . ' ' . $list['postnom_sgr'] . ' '. $list['prenom_sgr'] ?>
                                                    </td>
                                                    <td class="right"><?= $list['role_sgr'] == 'SGR' ? 'Secrétaire charger de recherche' : '' ?></td>
                                                    <td
                                                        class="<?= $list['ver_sgr'] == 'no_verify' ? '' : 'badge badge-rounded badge-success' ?>">
                                                        <?= $list['ver_sgr'] == 'no_verify' ? '' : 'Valider'; ?>
                                                    </td>
                                                    <td class="right">
                                                        <?php if (!empty($list['date_ver_sgr'])): ?>
                                                            <?= date('d/m/Y', strtotime($list['date_ver_sgr'])) ?>
                                                        <?php else: ?>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="center">3</td>
                                                    <td class="left strong">
                                                        <?= $list['nom_acad'] . ' ' . $list['postnom_acad'] . ' '. $list['prenom_acad'] ?>
                                                    </td>
                                                    <td class="right"><?= $list['role_acad'] == 'SGAC' ? 'Secrétaire général académique' : '' ?></td>
                                                    <td
                                                        class="<?= $list['ver_acad'] == 'no_verify' ? '' : 'badge badge-rounded badge-success' ?>">
                                                        <?= $list['ver_acad'] == 'no_verify' ? '' : 'Valider'; ?>
                                                    </td>
                                                    <td class="right">
                                                        <?php if (!empty($list['date_ver_acad'])): ?>
                                                            <?= date('d/m/Y', strtotime($list['date_ver_acad'])) ?>
                                                        <?php else: ?>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="center">4</td>
                                                    <td class="left strong">
                                                        <?= $list['nom_rect'] . ' ' . $list['postnom_rect'] . ' '. $list['prenom_rect'] ?>
                                                    </td>
                                                    <td class="right"><?= $list['role_rect'] == 'RECTORAT' ? 'Le Rectorat' : '' ?></td>
                                                    <td
                                                        class="<?= $list['ver_rect'] == 'no_verify' ? '' : 'badge badge-rounded badge-success' ?>">
                                                        <?= $list['ver_rect'] == 'no_verify' ? '' : 'Valider'; ?>
                                                    </td>
                                                    <td class="right">
                                                        <?php if (!empty($list['date_ver_rect'])): ?>
                                                            <?= date('d/m/Y', strtotime($list['date_ver_rect'])) ?>
                                                        <?php else: ?>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12 text-right">
                                            <button class="btn btn-primary" type="submit"> Proceed to payment </button>
                                            <button onclick="javascript:window.print();" class="btn btn-light" type="button"> <i
                                                    class="fa fa-print"></i> Print </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                    <?php
                }
                ?>
            </div>
        </div>

    </div>
</div>

<?php include("inc/footer.php"); ?>