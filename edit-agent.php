<?php include("inc/header.php");?>

        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">

                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Modifier Agent</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><strong>Home</strong></a></li>
                            <li class="breadcrumb-item active"><a href="list-agents.php">Agent</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Modifier Agent</a></li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12 col-xxl-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Modifier agent</h5>
                                <a href="list-agents.php" class="btn btn-primary">Liste des agents</a>
                            </div>
                            <div class="card-body">
                            <?php 
                            if(isset($_GET['id']))
                            {
                                $agent_id = $_GET['id'];
                                $agent = "SELECT * FROM agents WHERE id ='$agent_id'";
                                $agent_run = mysqli_query($con, $agent);

                                if(mysqli_num_rows($agent_run) > 0)
                                {
                                    $post_row = mysqli_fetch_array($agent_run)
                                    
                                ?>
                                <form action="function.php" method="post">
                                    <input type="hidden" name="agent_id" value="<?= $post_row['id']; ?>">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Matricule</label>
                                                <input type="text" value="<?= $post_row['matricule']; ?>" name="matricule" class="form-control" placeholder="Entrez le Matricule" required>
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
                                                            <select class="form-control form-white" data-placeholder="Entrez la faculté" name="id_faculte">
                                                                <?php
                                                                foreach ($faculte_run as $list_faculte) {
                                                                    ?>
                                                                    
                                                                    <option value="<?= $list_faculte['id']; ?>"<?= $list_faculte['id']== $post_row['id_faculte']? 'selected':'' ?>><?= $list_faculte['name'] ?></option>
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
                                                            <select class="form-control form-white" data-placeholder="Entrez le département" name="id_departement">
                                                                <?php
                                                                foreach ($departement_run as $list_departement) {
                                                                    ?>
                                                                    <option value="<?= $list_departement['id']; ?>"<?= $list_departement['id']==$post_row['id_departement']? 'selected':'' ?>><?= $list_departement['nom_departement']?></option>
                                                                    <?php
                                                                }
                                                                ?>
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
                                                    <option>Personnel</option>
                                                    <option>SGR</option>
                                                    <option>DOYEN</option>
                                                    <option>SGAC</option>
                                                    <option>RECTORAT</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <button type="submit" name="edit_agents" class="btn btn-primary">Modifier</button>
                                            <button type="submit" class="btn btn-light">Cencel</button>
                                        </div>
                                    </div>
                                </form>
                                <?php  

                                }
                                else
                                {
                                    ?>
                                        <h4>No record Found</h4>
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

<?php include("inc/footer.php");?>