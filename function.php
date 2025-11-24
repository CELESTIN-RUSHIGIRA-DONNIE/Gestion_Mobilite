<?php
session_start();
include("conf/dbcon.php");


if (isset($_POST["add_agents"])) {

    // $user_id = $_SESSION['auth_user']['id']; // ID de l'utilisateur connecté
    $user_id = 1;

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

else if (isset($_POST["add_departement"])) {

    // $user_id = $_SESSION['auth_user']['id']; // ID de l'utilisateur connecté
    $user_id =1;
    $faculte_id = $_POST['id_faculte'];
    $departement = mysqli_real_escape_string($con, $_POST['name']);

    $check_departement_query = "SELECT nom FROM departement WHERE nom = '$departement'";
    $check_departement_query_run = mysqli_query($con, $check_departement_query);
    
    if (mysqli_num_rows($check_departement_query_run) > 0) {
        $_SESSION['toastr'] = ['type' => 'error','message' => 'Ce département existe déjà.'];
        header("Location: fac-dep.php");
        exit;
    }
    else {
        $sql_insert = "INSERT INTO departement (id_faculte,nom,id_user) VALUES (?,?,?)";
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

    // $user_id = $_SESSION['auth_user']['id']; // ID de l'utilisateur connecté
    $user_id = 1;
    
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
                $_SESSION['message_code'] = "error";
                header('Location: register.php');
                exit(0);
            }
        } else {
            $_SESSION['message'] = "Le matricule n'existe pas.";
            $_SESSION['message_code'] = "error";
            header('Location: register.php');
            exit(0);
        }
        $stmt->close();

        // Insertion
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $con->prepare("UPDATE agents SET email = ?, password = ? WHERE matricule = ?");
        $stmt->bind_param("sss", $email, $passwordHash, $matricule);
        if ($stmt->execute()) {
            $_SESSION['message'] = "Inscription réussie";
            $_SESSION["message_code"] = "success";
            header('Location: login.php');
            exit(0);
        } else {
            $_SESSION['message'] = "Erreur lors de la création du compte";
            $_SESSION["message_code"] = "error";
            header('Location: register.php');
            exit(0);
        }
    } else {
        $_SESSION['message'] = "Les mots de passe ne correspondent pas";
        $_SESSION["message_code"] = "error";
        header('Location: register.php');
        exit(0);
    }
} 
?>