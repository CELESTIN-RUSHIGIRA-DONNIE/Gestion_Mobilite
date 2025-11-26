<?php
session_start();
include("conf/dbcon.php");


if (isset($_POST["add_agents"])) {

    $user_id = $_SESSION['auth_user']['id']; // ID de l'utilisateur connecté
    
    // Générer un code_agent unique
    do {
        $code_agent = 'AG' . date('YmdHis') . rand(10,99);
        $check_code_query = "SELECT code_agent FROM agents WHERE code_agent = '$code_agent'";
        $check_code_run = mysqli_query($con, $check_code_query);
    } while (mysqli_num_rows($check_code_run) > 0);

    $matricule = mysqli_real_escape_string($con, $_POST['matricule']);
    $faculte = mysqli_real_escape_string($con, $_POST['faculte']);
    $department = mysqli_real_escape_string($con, $_POST['departement']);
    $role = mysqli_real_escape_string($con, $_POST['role']);

    $check_matricule_query = "SELECT matricule FROM agents WHERE matricule = '$matricule'";
    $check_matricule_query_run = mysqli_query($con, $check_matricule_query);

    if (mysqli_num_rows($check_matricule_query_run) > 0) {
        $_SESSION['toastr'] = ['type' => 'error','message' => 'Ce matricule existe déjà.'];
        header("Location: add-agent.php");
        exit;
    } else {
        $sql_insert = "INSERT INTO agents (code_agent,matricule,role,id_ut_fk,id_faculte,id_departement) VALUES (?,?,?,?,?,?)";
        if ($stmt = $con->prepare($sql_insert)) {
            $stmt->bind_param("sssiii", $code_agent, $matricule, $role, $user_id, $faculte, $department);

            if ($stmt->execute()) {
                $_SESSION['toastr'] = ['type' => 'success','message' => 'Agent enregistré avec succès'];
                $stmt->close();
                header("Location: add-agent.php");
                exit;
            }
        }
    }
}

else if (isset($_POST["add_profile"])) {

    $user_id = $_SESSION['auth_user']['id']; // ID de l'utilisateur connecté

    $nom = mysqli_real_escape_string($con, $_POST['nom']);
    $postnom = mysqli_real_escape_string($con, $_POST['postnom']);
    $prenom = mysqli_real_escape_string($con, $_POST['prenom']);
    $grade = mysqli_real_escape_string($con, $_POST['grade']);
    $date_nais = mysqli_real_escape_string($con, $_POST['date_nais']);
    $genre = mysqli_real_escape_string($con, $_POST['genre']);
    $adress = mysqli_real_escape_string($con, $_POST['adresse']);
    $telephone = mysqli_real_escape_string($con, $_POST['telephone']);
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    // Vérification de l'image
    $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
    $file_extension = pathinfo($image, PATHINFO_EXTENSION);
    if (!in_array($file_extension, $allowed_extensions)) {
        $_SESSION['toastr'] = ['type' => 'error','message' => 'Format d\'image non valide.'];
        header("Location: add-profile.php");
        exit;
    }

    // Insertion dans la base de données
    $stmt = $con->prepare("UPDATE agents SET nom = ?, postnom = ?, prenom = ?, Grade = ?, sexe = ?, date_nais = ?, adress = ?, telephone = ?, photo = ? WHERE id = ?");
    $stmt->bind_param("sssssssssi", $nom, $postnom, $prenom, $grade, $genre, $date_nais, $adress, $telephone, $image, $user_id);
    if ($stmt->execute()) {
        move_uploaded_file($image_tmp, "uploads/" . $image);

        //Met à jour les infos dans la session pour affichage immédiat
        $_SESSION['auth_user']['nom'] = $nom;
        $_SESSION['auth_user']['postnom'] = $postnom;
        $_SESSION['auth_user']['prenom'] = $prenom;
        $_SESSION['auth_user']['email'] = $email;
        $_SESSION['auth_user']['photo'] = $image; //ici on remplace le photo par defaut a la nouvelle 

        $_SESSION['toastr'] = ['type' => 'success','message' => 'Profile mis à jour avec succès.'];
        header("Location: add-profile.php");
        exit;

    } else {
        $_SESSION['toastr'] = ['type' => 'error','message' => 'Erreur lors de la mise à jour du profil'];
        header("Location: add-profile.php");
        exit;
    }
} 

else if (isset($_POST["add_departement"])) {

    $user_id = $_SESSION['auth_user']['id']; // ID de l'utilisateur connecté
    
    $faculte_id = $_POST['id_faculte'];
    $departement = mysqli_real_escape_string($con, $_POST['name']);

    $check_departement_query = "SELECT nom_departement FROM departement WHERE nom_departement = '$departement'";
    $check_departement_query_run = mysqli_query($con, $check_departement_query);
    
    if (mysqli_num_rows($check_departement_query_run) > 0) {
        $_SESSION['toastr'] = ['type' => 'error','message' => 'Ce département existe déjà.'];
        header("Location: fac-dep.php");
        exit;
    }
    else {
        $sql_insert = "INSERT INTO departement (id_faculte,nom_departement,id_user) VALUES (?,?,?)";
        if ($stmt = $con->prepare($sql_insert)) {
            $stmt->bind_param("isi", $faculte_id,$departement, $user_id);
            if ($stmt->execute()) {
                $_SESSION['toastr'] = ['type' => 'success',
                'message' => 'Département enregistré avec succès'
            ];
                $stmt->close();
                header("Location: fac-dep.php");
                exit;
            } else {
                $_SESSION['toastr'] = ['type' => 'error',
                'message' => 'Erreur lors de l’enregistrement'
            ];
                header("Location: fac-dep.php");
                exit;
            }
        }
    }
}

else if (isset($_POST["add_faculte"])) {

    $user_id = $_SESSION['auth_user']['id']; // ID de l'utilisateur connecté
    
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $designation = mysqli_real_escape_string($con, $_POST['designation']);

    $check_faculte_query = "SELECT name FROM faculte WHERE name = '$name'";
    $check_faculte_query_run = mysqli_query($con, $check_faculte_query);
    
    if (mysqli_num_rows($check_faculte_query_run) > 0) {
        $_SESSION['toastr'] = ['type' => 'error','message' => 'Cette faculté existe déjà.'];
        header("Location: fac-dep.php");
        exit;
    }
    else {
        $sql_insert = "INSERT INTO faculte (name,designation,id_user) VALUES (?,?,?)";
        if ($stmt = $con->prepare($sql_insert)) {
            $stmt->bind_param("ssi", $name, $designation, $user_id);
            if ($stmt->execute()) {
                $_SESSION['toastr'] = ['type' => 'success',
                'message' => 'Faculté enregistrée avec succès'
            ];
                $stmt->close();
                header("Location: fac-dep.php");
                exit;
            } else {
                $_SESSION['toastr'] = ['type' => 'error',
                'message' => 'Erreur lors de l’enregistrement du produit'
            ];
                header("Location: fac-dep.php");
                exit;
            }
        }
    }
}

else if (isset($_POST['register'])) {

    $matricule = mysqli_real_escape_string($con, $_POST['matricule']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($con, $_POST['repeat_password']);

    if ($password == $confirm_password) {
        // Vérifier dans table_agent que le couple existe
        $stmt = $con->prepare("SELECT email, password FROM agents WHERE matricule = ? OR email = ?");
        $stmt->bind_param("ss", $matricule, $email);
        $stmt->execute();
        $stmt->bind_result($email_db, $password_db);
        if ($stmt->fetch()) {
            if (!empty($email_db) && !empty($password_db)) {
                $_SESSION['message'] = "Un compte existe déjà pour ce matricule ou mail.";
                $_SESSION['msg_type'] = "danger";
                header('Location: register.php');
                exit(0);
            }
        } else {
            $_SESSION['message'] = "Le matricule n'existe pas.";
            $_SESSION['msg_type'] = "danger";
            header('Location: register.php');
            exit(0);
        }
        $stmt->close();

        // Insertion
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $con->prepare("UPDATE agents SET email=?, password=? WHERE matricule=?");
        $stmt->bind_param("sss", $email, $passwordHash, $matricule);
        if ($stmt->execute()) {
            $_SESSION['message'] = "Inscription réussie";
            $_SESSION["msg_type"] = "success";
            header('Location: login.php');
            exit(0);
        } else {
            $_SESSION['message'] = "Erreur lors de la création du compte";
            $_SESSION["msg_type"] = "danger";
            header('Location: register.php');
            exit(0);
        }
    } else {
        $_SESSION['message'] = "Les mots de passe ne correspondent pas";
        $_SESSION["msg_type"] = "danger";
        header('Location: register.php');
        exit(0);
    }
} 

else if (isset($_POST['login'])) {

    $matricule = mysqli_real_escape_string($con, $_POST['matricule']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    //on va juste vérifier le mot de passe après avoir récupéré le hash

    $login_query = "SELECT * FROM agents WHERE matricule = '$matricule' LIMIT 1";
    $login_query_run = mysqli_query($con, $login_query);

    if (mysqli_num_rows($login_query_run) > 0) {
        $userdata = mysqli_fetch_array($login_query_run);

        //Récupère le mot de passe haché depuis la base de données
        $hashed_password = $userdata['password'];

        //Vérifie si le mot de passe saisi correspond au hash
        if (password_verify($password, $hashed_password)) {

            $user_id = $userdata['id'];
            $nom = $userdata['nom'];
            $postnom = $userdata['postnom'];
            $prenom = $userdata['prenom'];
            $email = $userdata['email'];
            $role = $userdata['role'];
            $image = $userdata['photo'];
            $id_faculte = $userdata['id_faculte'];

            $_SESSION['auth_user'] = [
                'id' => $user_id,
                'nom' => $nom,
                'postnom' => $postnom,
                'prenom' => $prenom,
                'email' => $email,
                'photo' => $image,
                'role' => $role,
                'id_faculte' => $id_faculte
            ];

            // Vérification du profil
            // $profil_incomplet = empty($user['nom']) || empty($user['postnom']) || empty($user['prenom']) || empty($user['photo']);
            // $profil_incomplet = empty($nom) || empty($postnom) || empty($userdata['prenom']) || empty($image);



            //Redirection selon le rôle
            if ($role == 'SGR') {
                $_SESSION['toastr'] = ['type' => 'success','message' => 'Bienvenue SGR'];
                header("Location: index.php");
                exit;
            }

            else if ($role == 'DOYEN') {
                $_SESSION['toastr'] = ['type' => 'success','message' => 'Bienvenue DOYEN'];
                header("Location: index.php");
                exit;
            }
            else if ($role == 'SGAC') {
                $_SESSION['toastr'] = ['type' => 'success','message' => 'Bienvenue SGAC'];
                header("Location: index.php");
                exit;
            }
            else if ($role == 'RECTORAT') {
                $_SESSION['toastr'] = ['type' => 'success','message' => 'Bienvenue RECTORAT'];
                header("Location: index.php");
                exit;
            }
            else {
                $_SESSION['toastr'] = ['type' => 'success','message' => 'Bienvenue'];
                header("Location: index.php");
                exit;   
            }

        } else {

            $_SESSION['message'] = "Mot de passe incorrect";
            $_SESSION['msg_type'] = "danger";
            header('Location: login.php');
            exit;
        }

    } else {
        $_SESSION['message'] = "Matricule Introuvable";
        $_SESSION['msg_type'] = "danger";
        header("Location: login.php");
        exit;
    }
} 


else if (isset($_POST["send_demande"])) {

    $user_id = $_SESSION['auth_user']['id']; // ID de l'utilisateur connecté
    
    do {
        $code_bourse = 'BOU' . date('YmdHis') . rand(10,99);
        $check_code_query = "SELECT code_bourse FROM demande_bourse WHERE code_bourse = '$code_bourse'";
        $check_code_run = mysqli_query($con, $check_code_query);
    } while (mysqli_num_rows($check_code_run) > 0);
    $type_mobilite = mysqli_real_escape_string($con, $_POST['type_mobilite']);
    $objectif_mobilite = mysqli_real_escape_string($con, $_POST['objectif_mobilite']);
    $dure_sejour = mysqli_real_escape_string($con, $_POST['dure_sejour']);
    $organisation_accueil = mysqli_real_escape_string($con, $_POST['organisation_accueil']);
    $programme_intervention = mysqli_real_escape_string($con, $_POST['programme_intervention']);
    $date_depart = mysqli_real_escape_string($con, $_POST['date_depart']);
    $date_retour = mysqli_real_escape_string($con, $_POST['date_retour']);
    $finance_mobilite = mysqli_real_escape_string($con, $_POST['financement_mobilite']);
    $soutient_uea = mysqli_real_escape_string($con, $_POST['soutient_uea']);
    $status = 'en attente';

    
    $sql_insert = "INSERT INTO demande_bourse (code_bourse,type_mobilite,objectif_mobilite,dure_sejour,organisation_accueil,programme_intervention,date_depart,date_retour,finance_mobilite,soutient_uea,status, id_ut_bour_fk) 
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
    if ($stmt = $con->prepare($sql_insert)) {
        $stmt->bind_param("ssssssssssss", $code_bourse,$type_mobilite,
        $objectif_mobilite,$dure_sejour,$organisation_accueil,$programme_intervention,$date_depart,$date_retour,$finance_mobilite,$soutient_uea,$status,$user_id);
        if ($stmt->execute()) {
            $_SESSION['toastr'] = ['type' => 'success','message' => 'Demande envoyée avec succès'];
            $stmt->close();
            header("Location: demande.php");
            exit;
        } else {
            $_SESSION['toastr'] = ['type' => 'error','message' => 'Erreur lors de l\'envoi de la demande.'];
            header("Location: demande.php");
            exit;
        }
    }
}

else if (isset($_POST["avis_doyen"])) {
    $id_ut = $_POST["avis_doyen"];
    $user_id = $_SESSION['auth_user']['id']; // ID de l'utilisateur connecté

    $avis = mysqli_real_escape_string($con, $_POST['avis']);
    $justification = mysqli_real_escape_string($con, $_POST['justification']);

    $query = "UPDATE demande_bourse SET avis_doyen='$avis', justification_doyen='$justification' WHERE id_ut_bour_fk='$id_ut'";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $_SESSION['toastr'] = ['type' => 'success','message' => 'Avis enregistré avec succès.'];
        header("Location: view-demande.php");
        exit;
    } else {
        $_SESSION['toastr'] = ['type' => 'error','message' => 'Erreur lors de l\'enregistrement de l\'avis.'];
        header('Location: view-demande-details.php');
        exit(0);
    }
}

else if (isset($_POST["validation_doyen"])) {
    
    $id_ut = $_POST["validation_doyen"];
    $user_id = $_SESSION['auth_user']['id']; // ID de l'utilisateur connecté

    $query = "UPDATE demande_bourse SET ver_doyen='verify', date_ver_doyen=NOW(), id_doyen=$user_id WHERE id_ut_bour_fk='$id_ut'";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $_SESSION['toastr'] = ['type' => 'success','message' => 'Validation réussie.'];
        header("Location: view-demande.php");
        exit;
    } else {
        $_SESSION['toastr'] = ['type' => 'error','message' => 'Erreur lors de la validation.'];
        header('Location: view-demande.php');
        exit(0);
    }
}

else if (isset($_POST["validation_sgr"])) {
    $id_ut = $_POST["validation_sgr"];
    $user_id = $_SESSION['auth_user']['id']; // ID de l'utilisateur connecté

    $query = "UPDATE demande_bourse SET ver_sgr='verify', date_ver_sgr=NOW(), id_sgr=$user_id  WHERE id_ut_bour_fk='$id_ut'";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
                $_SESSION['toastr'] = ['type' => 'success','message' => 'Validation réussie.'];
        header("Location: view-demande.php");
        exit;
    } else {
        $_SESSION['toastr'] = ['type' => 'error','message' => 'Erreur lors de la validation.'];
        header('Location: view-demande.php');
        exit(0);
    }
}

else if (isset($_POST["validation_sgac"])) {

    $id_ut = $_POST["validation_sgac"];
    $user_id = $_SESSION['auth_user']['id']; // ID de l'utilisateur connecté

    $query = "UPDATE demande_bourse SET ver_sgac='verify', date_ver_sgac=NOW(), id_sgac=$user_id  WHERE id_ut_bour_fk='$id_ut'";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $_SESSION['toastr'] = ['type' => 'success','message' => 'Validation réussie.'];
        header("Location: view-demande.php");
        exit;
    } else {
        $_SESSION['toastr'] = ['type' => 'error','message' => 'Erreur lors de la validation.'];
        header('Location: view-demande.php');
        exit(0);
    }
}

else if (isset($_POST["validation_rectorat"])) {
    $id_ut = $_POST["validation_rectorat"];
    $user_id = $_SESSION['auth_user']['id']; // ID de l'utilisateur connecté

    $query = "UPDATE demande_bourse SET ver_rect='verify', date_ver_rect=NOW(), id_rect=$user_id  WHERE id_ut_bour_fk='$id_ut'";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $_SESSION['toastr'] = ['type' => 'success','message' => 'Validation réussie.'];
        header("Location: view-demande.php");
        exit;
    } else {
        $_SESSION['toastr'] = ['type' => 'error','message' => 'Erreur lors de la validation.'];
        header('Location: view-demande.php');
        exit(0);
    }
}
?>