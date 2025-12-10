<?php include("inc/header.php"); ?>

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Mon profile</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">App</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Profile</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="profile">
                    <div class="profile-head">
                        <div class="photo-content">
                            <div class="cover-photo"></div>
                        </div>
                        <div class="profile-info">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="profile-photo">
                                        <img src="uploads/<?= htmlspecialchars($_SESSION['auth_user']['photo']) ?>"
                                            class="img-fluid rounded-circle" alt="">
                                    </div>
                                </div>
                                <div class="col-sm-9 col-12">
                                    <div class="row">
                                        <div class="col-xl-4 col-sm-6 border-right-1">
                                            <div class="profile-name">
                                                <h4 class="text-primary mb-0">
                                                    <?= $_SESSION['auth_user']['nom'] . ' ' . $_SESSION['auth_user']['postnom'] . ' ' . $_SESSION['auth_user']['prenom'] ?>
                                                </h4>
                                                <p><?= $_SESSION['auth_user']['role'] ?></p>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-sm-6 border-right-1">
                                            <div class="profile-email">
                                                <h4 class="text-muted mb-0"><?= $_SESSION['auth_user']['email'] ?></h4>
                                                <p>Email</p>
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
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-statistics">
                            <div class="text-center mt-4 border-bottom-1 pb-3">
                                <div class="row">
                                    <div class="col">
                                        <h3 class="m-b-0">150</h3><span>Follower</span>
                                    </div>
                                    <div class="col">
                                        <h3 class="m-b-0">140</h3><span>Place Stay</span>
                                    </div>
                                    <div class="col">
                                        <h3 class="m-b-0">45</h3><span>Reviews</span>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <a href="javascript:void()" class="btn btn-primary px-5 mr-3 mb-4">Follow</a>
                                    <a href="javascript:void()" class="btn btn-dark px-3 mb-4">Send Message</a>
                                </div>
                            </div>
                        </div>
                        <div class="profile-blog pt-3 border-bottom-1 pb-1">
                            <h5 class="text-primary d-inline">Today Highlights</h5><a href="javascript:void()"
                                class="pull-right f-s-16">More</a>
                            <img src="assets/images/profile/1.jpg" alt="" class="img-fluid mt-4 mb-4 w-100">
                            <h4>Darwin Creative Agency Theme</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-tab">
                            <div class="custom-tab-1">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a href="#my-posts" data-toggle="tab"
                                            class="nav-link active show">About me</a></li>
                                    <li class="nav-item"><a href="#about-me" data-toggle="tab" class="nav-link">Edit
                                            Profile</a></li>
                                    <li class="nav-item"><a href="#profile-settings" data-toggle="tab"
                                            class="nav-link">Mot de passe</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="my-posts" class="tab-pane fade active show">

                                        <div class="profile-personal-info pt-3">
                                            <h4 class="text-primary mb-4">Informations personnelles</h4>
                                            <div class="row mb-4">
                                                <div class="col-3">
                                                    <h5 class="f-w-500">Matricule <span class="pull-right">:</span></h5>
                                                </div>
                                                <div class="col-9">
                                                    <span><strong><?php echo $_SESSION['auth_user']['matricule']; ?></strong></span>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-3">
                                                    <h5 class="f-w-500">Noms <span class="pull-right">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-9">
                                                    <span><?php echo $_SESSION['auth_user']['nom'] . ' ' . $_SESSION['auth_user']['postnom'] . ' ' . $_SESSION['auth_user']['prenom']; ?></span>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-3">
                                                    <h5 class="f-w-500">Email <span class="pull-right">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-9">
                                                    <span><?php echo $_SESSION['auth_user']['email']; ?></span>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-3">
                                                    <h5 class="f-w-500">telephone <span class="pull-right">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-9">
                                                    <span><?php echo $_SESSION['auth_user']['telephone']; ?></span>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-3">
                                                    <h5 class="f-w-500">Date de naissance <span
                                                            class="pull-right">:</span>
                                                    </h5>
                                                </div>
                                                <div class="col-9">
                                                    <span><?php echo $_SESSION['auth_user']['date_nais']; ?></span>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-3">
                                                    <h5 class="f-w-500">Adresse <span class="pull-right">:</span></h5>
                                                </div>
                                                <div class="col-9">
                                                    <span><?php echo $_SESSION['auth_user']['adress']; ?></span>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <?php
                                                $id_use = $_SESSION['auth_user']['id'];
                                                $sql = "SELECT f.name, d.nom_departement 
                                                        FROM agents a
                                                        INNER JOIN faculte f ON a.id_faculte = f.id
                                                        INNER JOIN departement d ON a.id_departement = d.id
                                                        WHERE a.id = ?";
                                                $stmt = mysqli_prepare($con, $sql);
                                                mysqli_stmt_bind_param($stmt, "i", $id_use);
                                                mysqli_stmt_execute($stmt);
                                                $result = mysqli_stmt_get_result($stmt);
                                                if (mysqli_num_rows($result) > 0) {
                                                    $row = mysqli_fetch_assoc($result);
                                                    ?>
                                                    <div class="col-3">
                                                        <h5 class="f-w-500">Faculté <span class="pull-right">:</span></h5>
                                                    </div>
                                                    <div class="col-9"><span><?= $row['name'] ?></span></div><br><br>
                                                    <div class="col-3 ">
                                                        <h5 class="f-w-500">Département <span class="pull-right">:</span></h5>
                                                    </div>
                                                    <div class="col-9"><span><?= $row['nom_departement'] ?></span></div>
                                                    <?php
                                                }

                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="about-me" class="tab-pane fade">
                                        <div class="pt-3">
                                            <?php
                                                $sql = "SELECT * FROM agents WHERE id = ?";
                                                $stmt = mysqli_prepare($con, $sql);
                                                mysqli_stmt_bind_param($stmt, "i", $user_id);
                                                mysqli_stmt_execute($stmt);
                                                $result = mysqli_stmt_get_result($stmt);
                                                $user = mysqli_fetch_assoc($result);
                                                ?>
                                                <div class="settings-form">
                                                    <h3 class="text-primary">Modifer Le Profile</h3>
                                                    <form action="function.php" method="post">
                                                        <div class="form-group">
                                                            <input type="text" name="matricule" value="<?= $user['matricule']; ?>"
                                                                class="form-control" disabled>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <input type="text" name="nom" value="<?= $user['nom']; ?>"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <input type="text" name="postnom" value="<?= $user['postnom']; ?>"
                                                                    class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <input type="text" name="prenom" value="<?= $user['prenom']; ?>"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <input type="text" name="Grade" value="<?= $user['Grade']; ?>"
                                                                    class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <input type="text" name="date_n" value="<?= $user['date_nais']; ?>"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <input type="text" name="Genre" value="<?= $user['sexe']; ?>"
                                                                    class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <input type="text" name="adress" value="<?= $user['adress']; ?>"
                                                                    class="form-control">
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <input type="text" name="telephone" value="<?= $user['telephone']; ?>"
                                                                    class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="post-input">
                                                            <textarea name="textarea" id="textarea" cols="30" rows="5"
                                                                class="form-control bg-transparent"
                                                                placeholder="Entrez votre Bios"></textarea>
                                                        </div>
                                                        <button class="btn btn-primary" type="submit" name="modifier-profile">Modifier</button>
                                                    </form>
                                                </div>
                                                <?php
                                            ?>
                                        </div>
                                    </div>
                                    <div id="profile-settings" class="tab-pane fade">
                                        <div class="pt-3">
                                            <div class="settings-form">
                                                <h3 class="text-primary">Parametre de compte</h3>

                                                <form action="function.php" method="post">
                                                    <div class="form-group">
                                                        <input type="password" name="ancien_motdepasse"
                                                            placeholder="Ancien Mot de passe" class="form-control">
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <input type="password" name="nouveau_motdepasse"
                                                                placeholder="Nouveau Mot de passe" class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <input type="password" name="confirmer_nouveau_motdepasse"
                                                                placeholder="Confirmer le nouveau mot de passe"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-primary" type="submit"
                                                        name="changer_mot_de_passe">Valider</button>
                                                </form>
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
    </div>
</div>

<?php include("inc/footer.php"); ?>