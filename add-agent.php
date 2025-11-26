<?php include("inc/header.php");?>

        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">

                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Ajouter Agent</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><strong>Home</strong></a></li>
                            <li class="breadcrumb-item active"><a href="list-agents.php">Agent</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Ajouter Agent</a></li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12 col-xxl-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Ajouter agent</h5>
                                <a href="list-agents.php" class="btn btn-primary">Liste agent</a>
                            </div>
                            <div class="card-body">
                                <form action="function.php" method="post">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Matricule</label>
                                                <input type="text" name="matricule" class="form-control" placeholder="Entrez le Matricule" required>
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
                                                            <select class="form-control form-white" data-placeholder="Entrez la faculté" name="faculte">
                                                                <?php
                                                                foreach ($faculte_run as $list_faculte) {
                                                                    ?>
                                                                    <option value="<?= $list_faculte['id']; ?>"><?= $list_faculte['name']; ?></option>
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
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Department</label>
                                                <?php
                                                        $departement = "SELECT * FROM departement";
                                                        $departement_run = mysqli_query($con, $departement);

                                                        if (mysqli_num_rows($departement_run) > 0) {
                                                            ?>
                                                            <select class="form-control form-white" data-placeholder="Entrez le département" name="departement">
                                                                <?php
                                                                foreach ($departement_run as $list_departement) {
                                                                    ?>
                                                                    <option value="<?= $list_departement['id']; ?>"><?= $list_departement['nom_departement']; ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </select>
                                                            <?php
                                                        } else {
                                                            ?>
                                                                <select class="form-control form-white">
                                                                    <option value="" class="text-danger">Aucun département disponible</option>
                                                                </select>
                                                            <?php
                                                        }
                                                    ?>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Role</label>
                                                <select class="form-control" name="role">
                                                    <option>SGR</option>
                                                    <option>DOYEN</option>
                                                    <option>SGAC</option>
                                                    <option>RECTORAT</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <button type="submit" name="add_agents" class="btn btn-primary">Enregistrer</button>
                                            <button type="submit" class="btn btn-light">Cencel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php include("inc/footer.php");?>