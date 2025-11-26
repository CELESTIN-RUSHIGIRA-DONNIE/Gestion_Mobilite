<?php include("inc/header.php"); ?>

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">

        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Liste des agents</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">View</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Voir les demandes</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <ul class="nav nav-pills mb-3">
                    <li class="nav-item"><a href="#list-view" data-toggle="tab"
                            class="nav-link btn-primary mr-1 show active">demandes</a></li>
                    <li class="nav-item"><a href="#grid-view" data-toggle="tab" class="nav-link btn-success">Me
                            validation</a></li>
                </ul>
            </div>
            <div class="col-lg-12">
                <div class="row tab-content">
                    <div id="list-view" class="tab-pane fade active show col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Profile Datatable</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Noms</th>
                                                <th>Grade</th>
                                                <th>Email</th>
                                                <th>Date demande</th>
                                                <th>Doyen</th>
                                                <th>SGR</th>
                                                <th>SGAC</th>
                                                <th>RECTORAT</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <?php if ($_SESSION['auth_user']['role'] == 'SGR'): ?>
                                            <tbody>
                                                <?php
                                                $demande = "SELECT agents.*, demande_Bourse.* FROM demande_Bourse
                                                INNER JOIN agents ON demande_bourse.id_ut_bour_fk = agents.id 
                                                AND demande_bourse.ver_sgr='no_verify'";
                                                $demande_run = mysqli_query($con, $demande);

                                                if (mysqli_num_rows($demande_run) > 0) {
                                                    foreach ($demande_run as $list) {
                                                        ?>
                                                        <tr>
                                                            <td class="py-1">
                                                                <?php echo '<img class="rounded-circle" width="35" src="uploads/' . $list['photo'] . '" alt="User Image">' ?>
                                                            </td>
                                                            <td><?= $list['nom'] . ' ' . $list['postnom'] ?></td>
                                                            <td><?= $list['Grade'] ?></td>
                                                            <td><a
                                                                    href="javascript:void(0);"><strong><?= $list['email']; ?></strong></a>
                                                            </td>
                                                            <td><?= $list['date_enre_bourse']; ?></td>
                                                            <td
                                                                class="<?= $list['ver_doyen'] == 'no_verify' ? 'text-danger' : 'text-success' ?>">
                                                                <?= $list['ver_doyen'] == 'no_verify' ? 'Non Valide' : 'Valider'; ?>
                                                            </td>
                                                            <td
                                                                class="<?= $list['ver_sgr'] == 'no_verify' ? 'text-danger' : 'text-success' ?>">
                                                                <?= $list['ver_sgr'] == 'no_verify' ? 'Non Valide' : 'Valider'; ?>
                                                            </td>
                                                            <td
                                                                class="<?= $list['ver_acad'] == 'no_verify' ? 'text-danger' : 'text-success' ?>">
                                                                <?= $list['ver_acad'] == 'no_verify' ? 'Non Valide' : 'Valider'; ?>
                                                            </td>
                                                            <td
                                                                class="<?= $list['ver_rect'] == 'no_verify' ? 'text-danger' : 'text-success' ?>">
                                                                <?= $list['ver_rect'] == 'no_verify' ? 'Non Valide' : 'Valider'; ?>
                                                            </td>
                                                            <td>
                                                                <a href="view-demande-details.php?id=<?= $list['id_ut_bour_fk']; ?>"
                                                                    class="btn btn-sm btn-primary"><i class="la la-eye"></i></a>
                                                            </td>
                                                        </tr>

                                                        <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <tr>
                                                        <td colspan="7" class="bg-danger text-white text-center">Not record
                                                            found</td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </tbody>
                                        <?php endif; ?>
                                        <?php if ($_SESSION['auth_user']['role'] == 'DOYEN'): ?>
                                            <tbody>
                                                <?php
                                                $user_id = $_SESSION['auth_user']['id_faculte'];
                                                $demande = "SELECT agents.*, demande_Bourse.* FROM demande_Bourse
                                                INNER JOIN agents ON demande_bourse.id_ut_bour_fk = agents.id 
                                                AND demande_bourse.ver_doyen='no_verify' AND agents.id_faculte='$user_id'";
                                                $demande_run = mysqli_query($con, $demande);

                                                if (mysqli_num_rows($demande_run) > 0) {
                                                    foreach ($demande_run as $list) {
                                                        ?>
                                                        <tr>
                                                            <td class="py-1">
                                                                <?php echo '<img class="rounded-circle" width="35" src="uploads/' . $list['photo'] . '" alt="User Image">' ?>
                                                            </td>
                                                            <td><?= $list['nom'] . ' ' . $list['postnom'] ?></td>
                                                            <td><?= $list['Grade'] ?></td>
                                                            <td><a
                                                                    href="javascript:void(0);"><strong><?= $list['email']; ?></strong></a>
                                                            </td>
                                                            <td><?= $list['date_enre_bourse']; ?></td>
                                                            <td
                                                                class="<?= $list['ver_doyen'] == 'no_verify' ? 'text-danger' : 'text-success' ?>">
                                                                <?= $list['ver_doyen'] == 'no_verify' ? 'Non Valide' : 'Valider'; ?>
                                                            </td>
                                                            <td
                                                                class="<?= $list['ver_sgr'] == 'no_verify' ? 'text-danger' : 'text-success' ?>">
                                                                <?= $list['ver_sgr'] == 'no_verify' ? 'Non Valide' : 'Valider'; ?>
                                                            </td>
                                                            <td
                                                                class="<?= $list['ver_acad'] == 'no_verify' ? 'text-danger' : 'text-success' ?>">
                                                                <?= $list['ver_acad'] == 'no_verify' ? 'Non Valide' : 'Valider'; ?>
                                                            </td>
                                                            <td
                                                                class="<?= $list['ver_rect'] == 'no_verify' ? 'text-danger' : 'text-success' ?>">
                                                                <?= $list['ver_rect'] == 'no_verify' ? 'Non Valide' : 'Valider'; ?>
                                                            </td>
                                                            <td>
                                                                <a href="view-demande-details.php?id=<?= $list['id_ut_bour_fk']; ?>"
                                                                    class="btn btn-sm btn-primary"><i class="la la-eye"></i></a>
                                                            </td>
                                                        </tr>

                                                        <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <tr>
                                                        <td colspan="7" class="bg-danger text-white text-center">Not record
                                                            found</td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </tbody>
                                        <?php endif; ?>
                                        <?php if ($_SESSION['auth_user']['role'] == 'SGAC'): ?>
                                            <tbody>
                                                <?php
                                                $demande = "SELECT agents.*, demande_Bourse.* FROM demande_Bourse
                                                INNER JOIN agents ON demande_bourse.id_ut_bour_fk = agents.id 
                                                AND demande_bourse.ver_acad='no_verify'";
                                                $demande_run = mysqli_query($con, $demande);

                                                if (mysqli_num_rows($demande_run) > 0) {
                                                    foreach ($demande_run as $list) {
                                                        ?>
                                                        <tr>
                                                            <td class="py-1">
                                                                <?php echo '<img class="rounded-circle" width="35" src="uploads/' . $list['photo'] . '" alt="User Image">' ?>
                                                            </td>
                                                            <td><?= $list['nom'] . ' ' . $list['postnom'] ?></td>
                                                            <td><?= $list['Grade'] ?></td>
                                                            <td><a
                                                                    href="javascript:void(0);"><strong><?= $list['email']; ?></strong></a>
                                                            </td>
                                                            <td><?= $list['date_enre_bourse']; ?></td>
                                                            <td
                                                                class="<?= $list['ver_doyen'] == 'no_verify' ? 'text-danger' : 'text-success' ?>">
                                                                <?= $list['ver_doyen'] == 'no_verify' ? 'Non Valide' : 'Valider'; ?>
                                                            </td>
                                                            <td
                                                                class="<?= $list['ver_sgr'] == 'no_verify' ? 'text-danger' : 'text-success' ?>">
                                                                <?= $list['ver_sgr'] == 'no_verify' ? 'Non Valide' : 'Valider'; ?>
                                                            </td>
                                                            <td
                                                                class="<?= $list['ver_acad'] == 'no_verify' ? 'text-danger' : 'text-success' ?>">
                                                                <?= $list['ver_acad'] == 'no_verify' ? 'Non Valide' : 'Valider'; ?>
                                                            </td>
                                                            <td
                                                                class="<?= $list['ver_rect'] == 'no_verify' ? 'text-danger' : 'text-success' ?>">
                                                                <?= $list['ver_rect'] == 'no_verify' ? 'Non Valide' : 'Valider'; ?>
                                                            </td>
                                                            <td>
                                                                <a href="view-demande-details.php?id=<?= $list['id_ut_bour_fk']; ?>"
                                                                    class="btn btn-sm btn-primary"><i class="la la-eye"></i></a>
                                                            </td>
                                                        </tr>

                                                        <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <tr>
                                                        <td colspan="7" class="bg-danger text-white text-center">Not record
                                                            found</td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </tbody>
                                        <?php endif; ?>
                                        <?php if ($_SESSION['auth_user']['role'] == 'RECTORAT'): ?>
                                            <tbody>
                                                <?php
                                                $demande = "SELECT agents.*, demande_Bourse.* FROM demande_Bourse
                                                INNER JOIN agents ON demande_bourse.id_ut_bour_fk = agents.id 
                                                AND demande_bourse.ver_rect='no_verify'";
                                                $demande_run = mysqli_query($con, $demande);

                                                if (mysqli_num_rows($demande_run) > 0) {
                                                    foreach ($demande_run as $list) {
                                                        ?>
                                                        <tr>
                                                            <td class="py-1">
                                                                <?php echo '<img class="rounded-circle" width="35" src="uploads/' . $list['photo'] . '" alt="User Image">' ?>
                                                            </td>
                                                            <td><?= $list['nom'] . ' ' . $list['postnom'] ?></td>
                                                            <td><?= $list['Grade'] ?></td>
                                                            <td><a
                                                                    href="javascript:void(0);"><strong><?= $list['email']; ?></strong></a>
                                                            </td>
                                                            <td><?= $list['date_enre_bourse']; ?></td>
                                                            <td
                                                                class="<?= $list['ver_doyen'] == 'no_verify' ? 'text-danger' : 'text-success' ?>">
                                                                <?= $list['ver_doyen'] == 'no_verify' ? 'Non Valide' : 'Valider'; ?>
                                                            </td>
                                                            <td
                                                                class="<?= $list['ver_sgr'] == 'no_verify' ? 'text-danger' : 'text-success' ?>">
                                                                <?= $list['ver_sgr'] == 'no_verify' ? 'Non Valide' : 'Valider'; ?>
                                                            </td>
                                                            <td
                                                                class="<?= $list['ver_acad'] == 'no_verify' ? 'text-danger' : 'text-success' ?>">
                                                                <?= $list['ver_acad'] == 'no_verify' ? 'Non Valide' : 'Valider'; ?>
                                                            </td>
                                                            <td
                                                                class="<?= $list['ver_rect'] == 'no_verify' ? 'text-danger' : 'text-success' ?>">
                                                                <?= $list['ver_rect'] == 'no_verify' ? 'Non Valide' : 'Valider'; ?>
                                                            </td>
                                                            <td>
                                                                <a href="view-demande-details.php?id=<?= $list['id_ut_bour_fk']; ?>"
                                                                    class="btn btn-sm btn-primary"><i class="la la-eye"></i></a>
                                                            </td>
                                                        </tr>

                                                        <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <tr>
                                                        <td colspan="7" class="bg-danger text-white text-center">Not record
                                                            found</td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </tbody>
                                        <?php endif; ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="grid-view" class="tab-pane fade col-lg-12">
                        <div class="row">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Profile Datatable</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example3" class="display" style="min-width: 845px">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Noms</th>
                                                    <th>Grade</th>
                                                    <th>Email</th>
                                                    <th>Date demande</th>
                                                    <th>Doyen</th>
                                                    <th>SGR</th>
                                                    <th>SGAC</th>
                                                    <th>RECTORAT</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <?php if ($_SESSION['auth_user']['role'] == 'SGR'): ?>
                                                <tbody>
                                                    <?php
                                                    $demande = "SELECT agents.*, demande_Bourse.* FROM demande_Bourse
                                                    INNER JOIN agents ON demande_bourse.id_ut_bour_fk = agents.id 
                                                    AND demande_bourse.ver_sgr='no_verify'";
                                                    $demande_run = mysqli_query($con, $demande);

                                                    if (mysqli_num_rows($demande_run) > 0) {
                                                        foreach ($demande_run as $list) {
                                                            ?>
                                                            <tr>
                                                                <td class="py-1">
                                                                    <?php echo '<img class="rounded-circle" width="35" src="uploads/' . $list['photo'] . '" alt="User Image">' ?>
                                                                </td>
                                                                <td><?= $list['nom'] . ' ' . $list['postnom'] ?></td>
                                                                <td><?= $list['Grade'] ?></td>
                                                                <td><a
                                                                        href="javascript:void(0);"><strong><?= $list['email']; ?></strong></a>
                                                                </td>
                                                                <td><?= $list['date_enre_bourse']; ?></td>
                                                                <td
                                                                    class="<?= $list['ver_doyen'] == 'no_verify' ? 'text-danger' : 'text-success' ?>">
                                                                    <?= $list['ver_doyen'] == 'no_verify' ? 'Non Valide' : 'Valider'; ?>
                                                                </td>
                                                                <td
                                                                    class="<?= $list['ver_sgr'] == 'no_verify' ? 'text-danger' : 'text-success' ?>">
                                                                    <?= $list['ver_sgr'] == 'no_verify' ? 'Non Valide' : 'Valider'; ?>
                                                                </td>
                                                                <td
                                                                    class="<?= $list['ver_acad'] == 'no_verify' ? 'text-danger' : 'text-success' ?>">
                                                                    <?= $list['ver_acad'] == 'no_verify' ? 'Non Valide' : 'Valider'; ?>
                                                                </td>
                                                                <td
                                                                    class="<?= $list['ver_rect'] == 'no_verify' ? 'text-danger' : 'text-success' ?>">
                                                                    <?= $list['ver_rect'] == 'no_verify' ? 'Non Valide' : 'Valider'; ?>
                                                                </td>
                                                                <td>
                                                                    <a href="view-demande-details.php?id=<?= $list['id_ut_bour_fk']; ?>"
                                                                        class="btn btn-sm btn-primary"><i class="la la-eye"></i></a>
                                                                </td>
                                                            </tr>

                                                            <?php
                                                        }
                                                    } else {
                                                        ?>
                                                        <tr>
                                                            <td colspan="7" class="bg-danger text-white text-center">Not record
                                                                found</td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            <?php endif; ?>
                                            <?php if ($_SESSION['auth_user']['role'] == 'DOYEN'): ?>
                                                <tbody>
                                                    <?php
                                                    $user_id = $_SESSION['auth_user']['id_faculte'];
                                                    $demande = "SELECT agents.*, demande_Bourse.* FROM demande_Bourse
                                                    INNER JOIN agents ON demande_bourse.id_ut_bour_fk = agents.id 
                                                    AND demande_bourse.ver_doyen='no_verify' AND agents.id_faculte='$user_id'";
                                                    $demande_run = mysqli_query($con, $demande);

                                                    if (mysqli_num_rows($demande_run) > 0) {
                                                        foreach ($demande_run as $list) {
                                                            ?>
                                                            <tr>
                                                                <td class="py-1">
                                                                    <?php echo '<img class="rounded-circle" width="35" src="uploads/' . $list['photo'] . '" alt="User Image">' ?>
                                                                </td>
                                                                <td><?= $list['nom'] . ' ' . $list['postnom'] ?></td>
                                                                <td><?= $list['Grade'] ?></td>
                                                                <td><a
                                                                        href="javascript:void(0);"><strong><?= $list['email']; ?></strong></a>
                                                                </td>
                                                                <td><?= $list['date_enre_bourse']; ?></td>
                                                                <td
                                                                    class="<?= $list['ver_doyen'] == 'no_verify' ? 'text-danger' : 'text-success' ?>">
                                                                    <?= $list['ver_doyen'] == 'no_verify' ? 'Non Valide' : 'Valider'; ?>
                                                                </td>
                                                                <td
                                                                    class="<?= $list['ver_sgr'] == 'no_verify' ? 'text-danger' : 'text-success' ?>">
                                                                    <?= $list['ver_sgr'] == 'no_verify' ? 'Non Valide' : 'Valider'; ?>
                                                                </td>
                                                                <td
                                                                    class="<?= $list['ver_acad'] == 'no_verify' ? 'text-danger' : 'text-success' ?>">
                                                                    <?= $list['ver_acad'] == 'no_verify' ? 'Non Valide' : 'Valider'; ?>
                                                                </td>
                                                                <td
                                                                    class="<?= $list['ver_rect'] == 'no_verify' ? 'text-danger' : 'text-success' ?>">
                                                                    <?= $list['ver_rect'] == 'no_verify' ? 'Non Valide' : 'Valider'; ?>
                                                                </td>
                                                                <td>
                                                                    <a href="view-demande-details.php?id=<?= $list['id_ut_bour_fk']; ?>"
                                                                        class="btn btn-sm btn-primary"><i class="la la-eye"></i></a>
                                                                </td>
                                                            </tr>

                                                            <?php
                                                        }
                                                    } else {
                                                        ?>
                                                        <tr>
                                                            <td colspan="7" class="bg-danger text-white text-center">Not record
                                                                found</td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            <?php endif; ?>
                                            <?php if ($_SESSION['auth_user']['role'] == 'SGAC'): ?>
                                                <tbody>
                                                    <?php
                                                    $demande = "SELECT agents.*, demande_Bourse.* FROM demande_Bourse
                                                    INNER JOIN agents ON demande_bourse.id_ut_bour_fk = agents.id 
                                                    AND demande_bourse.ver_acad='no_verify'";
                                                    $demande_run = mysqli_query($con, $demande);

                                                    if (mysqli_num_rows($demande_run) > 0) {
                                                        foreach ($demande_run as $list) {
                                                            ?>
                                                            <tr>
                                                                <td class="py-1">
                                                                    <?php echo '<img class="rounded-circle" width="35" src="uploads/' . $list['photo'] . '" alt="User Image">' ?>
                                                                </td>
                                                                <td><?= $list['nom'] . ' ' . $list['postnom'] ?></td>
                                                                <td><?= $list['Grade'] ?></td>
                                                                <td><a
                                                                        href="javascript:void(0);"><strong><?= $list['email']; ?></strong></a>
                                                                </td>
                                                                <td><?= $list['date_enre_bourse']; ?></td>
                                                                <td
                                                                    class="<?= $list['ver_doyen'] == 'no_verify' ? 'text-danger' : 'text-success' ?>">
                                                                    <?= $list['ver_doyen'] == 'no_verify' ? 'Non Valide' : 'Valider'; ?>
                                                                </td>
                                                                <td
                                                                    class="<?= $list['ver_sgr'] == 'no_verify' ? 'text-danger' : 'text-success' ?>">
                                                                    <?= $list['ver_sgr'] == 'no_verify' ? 'Non Valide' : 'Valider'; ?>
                                                                </td>
                                                                <td
                                                                    class="<?= $list['ver_acad'] == 'no_verify' ? 'text-danger' : 'text-success' ?>">
                                                                    <?= $list['ver_acad'] == 'no_verify' ? 'Non Valide' : 'Valider'; ?>
                                                                </td>
                                                                <td
                                                                    class="<?= $list['ver_rect'] == 'no_verify' ? 'text-danger' : 'text-success' ?>">
                                                                    <?= $list['ver_rect'] == 'no_verify' ? 'Non Valide' : 'Valider'; ?>
                                                                </td>
                                                                <td>
                                                                    <a href="view-demande-details.php?id=<?= $list['id_ut_bour_fk']; ?>"
                                                                        class="btn btn-sm btn-primary"><i class="la la-eye"></i></a>
                                                                </td>
                                                            </tr>

                                                            <?php
                                                        }
                                                    } else {
                                                        ?>
                                                        <tr>
                                                            <td colspan="7" class="bg-danger text-white text-center">Not record
                                                                found</td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            <?php endif; ?>
                                            <?php if ($_SESSION['auth_user']['role'] == 'RECTORAT'): ?>
                                                <tbody>
                                                    <?php
                                                    $demande = "SELECT agents.*, demande_Bourse.* FROM demande_Bourse
                                                    INNER JOIN agents ON demande_bourse.id_ut_bour_fk = agents.id 
                                                    AND demande_bourse.ver_rect='no_verify'";
                                                    $demande_run = mysqli_query($con, $demande);

                                                    if (mysqli_num_rows($demande_run) > 0) {
                                                        foreach ($demande_run as $list) {
                                                            ?>
                                                            <tr>
                                                                <td class="py-1">
                                                                    <?php echo '<img class="rounded-circle" width="35" src="uploads/' . $list['photo'] . '" alt="User Image">' ?>
                                                                </td>
                                                                <td><?= $list['nom'] . ' ' . $list['postnom'] ?></td>
                                                                <td><?= $list['Grade'] ?></td>
                                                                <td><a
                                                                        href="javascript:void(0);"><strong><?= $list['email']; ?></strong></a>
                                                                </td>
                                                                <td><?= $list['date_enre_bourse']; ?></td>
                                                                <td
                                                                    class="<?= $list['ver_doyen'] == 'no_verify' ? 'text-danger' : 'text-success' ?>">
                                                                    <?= $list['ver_doyen'] == 'no_verify' ? 'Non Valide' : 'Valider'; ?>
                                                                </td>
                                                                <td
                                                                    class="<?= $list['ver_sgr'] == 'no_verify' ? 'text-danger' : 'text-success' ?>">
                                                                    <?= $list['ver_sgr'] == 'no_verify' ? 'Non Valide' : 'Valider'; ?>
                                                                </td>
                                                                <td
                                                                    class="<?= $list['ver_acad'] == 'no_verify' ? 'text-danger' : 'text-success' ?>">
                                                                    <?= $list['ver_acad'] == 'no_verify' ? 'Non Valide' : 'Valider'; ?>
                                                                </td>
                                                                <td
                                                                    class="<?= $list['ver_rect'] == 'no_verify' ? 'text-danger' : 'text-success' ?>">
                                                                    <?= $list['ver_rect'] == 'no_verify' ? 'Non Valide' : 'Valider'; ?>
                                                                </td>
                                                                <td>
                                                                    <a href="view-demande-details.php?id=<?= $list['id_ut_bour_fk']; ?>"
                                                                        class="btn btn-sm btn-primary"><i class="la la-eye"></i></a>
                                                                </td>
                                                            </tr>

                                                            <?php
                                                        }
                                                    } else {
                                                        ?>
                                                        <tr>
                                                            <td colspan="7" class="bg-danger text-white text-center">Not record
                                                                found</td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            <?php endif; ?>
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
</div>

<?php include("inc/footer.php"); ?>