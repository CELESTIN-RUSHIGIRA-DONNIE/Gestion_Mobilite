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
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Liste des agents</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <ul class="nav nav-pills mb-3">
                    <li class="nav-item"><a href="#list-view" data-toggle="tab"
                            class="nav-link btn-primary mr-1 show active">List agents</a></li>
                    <li class="nav-item"><a href="#grid-view" data-toggle="tab" class="nav-link btn-primary">Grid
                            View</a></li>
                </ul>
            </div>
            <div class="col-lg-12">
                <div class="row tab-content">
                    <div id="list-view" class="tab-pane fade active show col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Liste de Agents </h4>
                                <?php if ($_SESSION['auth_user']['role'] == 'SGR'): ?>
                                    <a href="add-agent.php" class="btn btn-primary">+ Ajouter Agents</a>
                                <?php endif; ?>
                            </div>
                            <div class="card-body" id="agents_table">
                                <div class="table-responsive">
                                    <table id="example3" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Matricule</th>
                                                <th>Noms</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <?php if ($_SESSION['auth_user']['role'] == 'SGR'): ?>
                                                <th>Action</th>
                                                <?php endif; ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $affiche_agents = "SELECT * FROM agents";
                                            $agents_run = mysqli_query($con, $affiche_agents);

                                            if (mysqli_num_rows($agents_run) > 0) {
                                                foreach ($agents_run as $list) {
                                                    ?>
                                                    <tr>
                                                        <td class="py-1">
                                                            <?php echo '<img class="rounded-circle" width="35" src="uploads/' . $list['photo'] . '" alt="User Image">' ?>
                                                        </td>
                                                        <td><?= $list['matricule'] ?></td>
                                                        <td><?= $list['nom'] .' '. $list['postnom'].' '. $list['prenom'] ?></td>
                                                        <td><?= $list['email'] ?></td>
                                                        <td><?= $list['role'] ?></td>
                                                        <?php if ($_SESSION['auth_user']['role'] == 'SGR'): ?>
                                                        <td>
                                                            <a href="edit-agent.php?id=<?= $list['id'] ?>"class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
                                                            <button type="button" class="btn btn-danger btn-sm delete_agents_btn" value="<?= $list['id']; ?>"><i class="la la-trash-o"></i></button>
                                                        </td>
                                                        <?php endif; ?>
                                                    </tr>

                                                    <?php
                                                }
                                            } else {
                                                ?>
                                                    <tr>
                                                        <td colspan="5" class="bg-danger text-white text-center">Pas d'agent enregistré</td>
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
                        <div class="row">
                            <?php
                            $affiche_agents = "SELECT * FROM agents";
                            $agents_run = mysqli_query($con, $affiche_agents);

                            if (mysqli_num_rows($agents_run) > 0) {
                                foreach ($agents_run as $list) {
                                    ?>
                                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="card card-profile">
                                            <div class="card-header justify-content-end pb-0">
                                                <div class="dropdown">
                                                    <button class="btn btn-link" type="button" data-toggle="dropdown">
                                                        <span class="dropdown-dots fs--1"></span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right border py-0">
                                                        <div class="py-2">
                                                            <a href="edit-agent.php?id=<?= $list['id'] ?>"class="dropdown-item">Modifier</a>
                                                            <button type="button" class="dropdown-item text-danger delete_agents_btn" value="<?= $list['id']; ?>">Delete</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body pt-2">
                                                <div class="text-center">
                                                    <div class="profile-photo">
                                                        <?php echo '<img class="img-fluid rounded-circle" width="100" src="uploads/' . $list['photo'] . '" alt="User Image">' ?>
                                                    </div>
                                                    <h4 class="mt-4 mb-1"><?= $list['nom'].' '. $list['postnom'].' '. $list['prenom'] ?></h4>
                                                    <p class="text-muted"><?= $list['email']?></p>
                                                    <ul class="list-group mb-3 list-group-flush">
                                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                                            <span class="mb-0">Grade :</span><strong><?= $list['Grade']?></strong>
                                                        </li>
                                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                                            <span class="mb-0">Genre :</span><strong><?= $list['sexe']?></strong>
                                                        </li>
                                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                                            <span class="mb-0">Phone :</span><strong><?= $list['telephone']?></strong>
                                                        </li>
                                                        <li class="list-group-item px-0 d-flex justify-content-between">
                                                            <span class="mb-0">Role:</span><strong><?= $list['role']?></strong>
                                                        </li>
                                                    </ul>
                                                    <a class="btn btn-outline-primary btn-rounded mt-3 px-4"
                                                        href="professor-profile.html">Plus de details</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="4" class="bg-danger text-white text-center">Pas d'agent enregistré</td>
                                </tr>

                                <?php
                            }
                            ?>

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