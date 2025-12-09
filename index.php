<?php include("inc/header.php"); ?>

<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-3 col-xxl-3 col-sm-6">
                <div class="widget-stat card bg-primary">
                    <div class="card-body">
                        <div class="media">
                            <span class="mr-3">
                                <i class="la la-users"></i>
                            </span>
                            <div class="media-body text-white">
                                <p class="mb-1">Total Agents</p>
                                <?php
                                $dash_agents = "SELECT * FROM agents ";
                                $dash_agents_run = mysqli_query($con, $dash_agents);
                                if ($agents_total = mysqli_num_rows($dash_agents_run)) {
                                    echo '<h3 class="text-white">' . $agents_total . '</h3>';
                                } else {
                                    echo '<h4 class="mb-0">0</h4>';
                                }
                                ?>
                                <div class="progress mb-2 bg-white">
                                    <div class="progress-bar progress-animated bg-light" style="width: 80%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-xxl-3 col-sm-6">
                <div class="widget-stat card bg-warning">
                    <div class="card-body">
                        <div class="media">
                            <span class="mr-3">
                                <i class="la la-graduation-cap"></i>
                            </span>
                            <div class="media-body text-white">
                                <p class="mb-1">Nbre de faculté</p>
                                <?php
                                $dash_faculte = "SELECT * FROM faculte ";
                                $dash_faculte_run = mysqli_query($con, $dash_faculte);
                                if ($faculte_total = mysqli_num_rows($dash_faculte_run)) {
                                    echo '<h3 class="text-white">' . $faculte_total . '</h3>';
                                } else {
                                    echo '<h4 class="mb-0">0</h4>';
                                }
                                ?>
                                <div class="progress mb-2 bg-white">
                                    <div class="progress-bar progress-animated bg-light" style="width: 50%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-xxl-3 col-sm-6">
                <div class="widget-stat card bg-secondary">
                    <div class="card-body">
                        <div class="media">
                            <span class="mr-3">
                                <i class="la la-user"></i>
                            </span>
                            <div class="media-body text-white">
                                <p class="mb-1">Nbre de demande</p>
                                <?php
                                $dash_faculte = "SELECT * FROM demande_bourse ";
                                $dash_faculte_run = mysqli_query($con, $dash_faculte);
                                if ($faculte_total = mysqli_num_rows($dash_faculte_run)) {
                                    echo '<h3 class="text-white">' . $faculte_total . '</h3>';
                                } else {
                                    echo '<h4 class="mb-0">0</h4>';
                                }
                                ?>
                                <div class="progress mb-2 bg-white">
                                    <div class="progress-bar progress-animated bg-light" style="width: 50%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-xxl-3 col-sm-6">
                <div class="widget-stat card bg-success">
                    <div class="card-body">
                        <div class="media">
                            <span class="mr-3">
                                <i class="la la-dollar"></i>
                            </span>
                            <div class="media-body text-white">
                                <p class="mb-1">Demande Validée</p>
                                <?php
                                $dash_faculte = "SELECT * FROM faculte ";
                                $dash_faculte_run = mysqli_query($con, $dash_faculte);
                                if ($faculte_total = mysqli_num_rows($dash_faculte_run)) {
                                    echo '<h3 class="text-white">' . $faculte_total . '</h3>';
                                } else {
                                    echo '<h4 class="mb-0">0</h4>';
                                }
                                ?>
                                <div class="progress mb-2 bg-white">
                                    <div class="progress-bar progress-animated bg-light" style="width: 30%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><strong>Liste de Agents</strong></h4>
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
                                                <td><?= $list['nom'] . ' ' . $list['postnom'] . ' ' . $list['prenom'] ?></td>
                                                <td><?= $list['email'] ?></td>
                                                <td><?= $list['role'] ?></td>
                                                <?php if ($_SESSION['auth_user']['role'] == 'SGR'): ?>
                                                    <td>
                                                        <a href="edit-agent.php?id=<?= $list['id'] ?>"
                                                            class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
                                                        <button type="button" class="btn btn-danger btn-sm delete_agents_btn"
                                                            value="<?= $list['id']; ?>"><i class="la la-trash-o"></i></button>
                                                    </td>
                                                <?php endif; ?>
                                            </tr>

                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="5" class="bg-danger text-white text-center">Pas d'agent enregistré
                                            </td>
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
<!--**********************************
            Content body end
        ***********************************-->

<?php include("inc/footer.php"); ?>