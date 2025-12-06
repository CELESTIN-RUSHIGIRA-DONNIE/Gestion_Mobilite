<?php include("inc/header.php"); ?>

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">

        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Faculté et Département</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Faculté & Département</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <ul class="nav nav-pills mb-3">
                    <li class="nav-item"><a href="#list-view" data-toggle="tab"
                            class="nav-link btn-primary mr-1 show active">Faculté</a></li>
                    <li class="nav-item"><a href="#grid-view" data-toggle="tab"
                            class="nav-link btn-primary">Département</a></li>
                </ul>
            </div>
            <div class="col-lg-12">
                <div class="row tab-content">
                    <div id="list-view" class="tab-pane fade active show col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Liste de Faculté </h4>
                                <?php if ($_SESSION['auth_user']['role'] == 'SGR'): ?>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#basicModal">+ Ajouter Faculté</button>
                                <?php endif; ?>
                            </div>
                            <div class="modal fade" id="basicModal">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-center"><strong>Ajouter Faculté</strong></h5>
                                            <button type="button" class="close"
                                                data-dismiss="modal"><span>&times;</span>
                                            </button>
                                        </div>
                                        <form action="function.php" method="POST">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="control-label">Nom</label>
                                                        <input class="form-control form-white" placeholder="Entrez nom"
                                                            type="text" name="name" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="control-label">Designation</label>
                                                        <input class="form-control form-white"
                                                            placeholder="Entrez designation" type="text"
                                                            name="designation" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="add_faculte"
                                                    class="btn btn-primary">Enregistrer les modifications</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive recentOrderTable">
                                    <table id="example3" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Nom</th>
                                                <th scope="col">Designation</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $affiche_fac = "SELECT * FROM faculte";
                                            $fac_run = mysqli_query($con, $affiche_fac);

                                            if (mysqli_num_rows($fac_run) > 0) {
                                                foreach ($fac_run as $list) {
                                                    ?>
                                                    <tr>
                                                        <td><?= $list['id']; ?></td>
                                                        <td><?= $list['name']; ?></td>
                                                        <td><span><?= $list['designation']; ?></span></td>
                                                        <td>
                                                            <a href="edit-student.html" class="btn btn-sm btn-success"><i
                                                                    class="la la-eye"></i></a>
                                                            <?php if($_SESSION['auth_user']['role'] == 'SGR'): ?>
                                                            <a href="edit-fac.php?id=<?= $list['id']; ?>" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
                                                            <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i class="la la-trash-o"></i></a>                                                        
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            } else {
                                                ?>
                                                <tr>
                                                    <td colspan="4" class="bg-danger text-white text-center">Pas des
                                                        facultés Enregistrer</td>
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
                    <div id="grid-view" class="tab-pane fade col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Departement</h4>
                                <?php if ($_SESSION['auth_user']['role'] == 'SGR'): ?>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#basicModal2">+ Ajouter Departement</button>
                                <?php endif; ?>
                            </div>
                            <div class="modal fade" id="basicModal2">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-center"><strong>Ajouter Departement</strong>
                                            </h5>
                                            <button type="button" class="close"
                                                data-dismiss="modal"><span>&times;</span>
                                            </button>
                                        </div>
                                        <form action="function.php" method="POST">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="control-label">Nom Departement</label>
                                                        <input class="form-control form-white" placeholder="Entrez nom"
                                                            type="text" name="name" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="control-label">Faculté ID</label>
                                                        <?php
                                                        $faculte = "SELECT * FROM faculte";
                                                        $faculte_run = mysqli_query($con, $faculte);

                                                        if (mysqli_num_rows($faculte_run) > 0) {
                                                            ?>
                                                            <select class="form-control form-white"
                                                                data-placeholder="Choisis le faculté..." name="id_faculte">
                                                                <?php
                                                                foreach ($faculte_run as $list_faculte) {
                                                                    ?>
                                                                    <option value="<?= $list_faculte['id']; ?>">
                                                                        <?= $list_faculte['name']; ?>
                                                                    </option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <select class="form-control form-white">
                                                                <option value="" class="text-danger">Aucune faculté
                                                                    disponible</option>
                                                            </select>
                                                            <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="add_departement"
                                                    class="btn btn-primary">Enregistrer le Departement</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body" id="departement_table">
                                <div class="table-responsive recentOrderTable">
                                    <table id="example3" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Faculté ID</th>
                                                <th scope="col">Departement</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $affiche_departement = "SELECT departement.id AS departement_id,
                                            departement.nom_departement, faculte.id
                                             AS faculte_id,faculte.name FROM departement 
                                            INNER JOIN faculte ON departement.id_faculte = faculte.id";
                                            $affiche_departement_run = mysqli_query($con, $affiche_departement);

                                            if (mysqli_num_rows($affiche_departement_run) > 0) {
                                                foreach ($affiche_departement_run as $list) {
                                                    ?>
                                                    <tr>
                                                        <td><?= $list['departement_id']; ?></td>
                                                        <td><?= $list['name']; ?></td>
                                                        <td><?= $list['nom_departement']; ?></td>
                                                        <td>
                                                            <a href="edit-student.html" class="btn btn-sm btn-success"><i
                                                                    class="la la-eye"></i></a>
                                                            <?php if ($_SESSION['auth_user']['role'] == 'SGR'): ?>
                                                                <a href="edit-dep.php?id=<?= $list['departement_id']; ?>" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
                                                                <button type="button" class="btn btn-danger btn-sm delete_departement_btn" value="<?= $list['departement_id']; ?>"><i class="la la-trash-o"></i></button>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            } else {
                                                ?>
                                                <tr>
                                                    <td colspan="4" class="bg-danger text-center text-danger">Pas de departement enregistré</td>
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

    <div class="footer">
        <div class="copyright">
            <p>Copyright © <a href="mailto:celestinrushigiradonnie@gmail.com">Celestin Rushigira</a> 2025</p>
        </div>
    </div>

</div>



 
<!-- Required vendors -->
<script src="assets/vendor/global/global.min.js"></script>
<script src="assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="assets/js/custom.min.js"></script>
<script src="assets/js/dlabnav-init.js"></script>

<!-- Svganimation scripts -->
<script src="assets/vendor/svganimation/vivus.min.js"></script>
<script src="assets/vendor/svganimation/svg.animation.js"></script>
<script src="assets/js/styleSwitcher.js"></script>

<!-- Toastr -->
<script src="assets/vendor/toastr/js/toastr.min.js"></script>

<!-- All init script -->
<script src="assets/js/plugins-init/toastr-init.js"></script>
<script>
    <?php if (!empty($toast)): ?>
        toastr.<?php echo $toast['type']; ?>("<?php echo addslashes($toast['message']); ?>");
    <?php endif; ?>
</script>

<!-- Datatable -->
<script src="assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="assets/js/plugins-init/datatables.init.js"></script>

<script src="assets/js/sweetalert.min.js"></script>
<script src="assets/js/custom.js"></script>

</body>

</html>