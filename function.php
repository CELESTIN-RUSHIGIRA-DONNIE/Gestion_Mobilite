<?php
session_start();
include("conf/dbcon.php");


if (isset($_POST["add_agents"])) {

    $user_id = $_SESSION['auth_user']['id']; // ID de l'utilisateur connecté
      
    $matricule = mysqli_real_escape_string($con, $_POST['matricule']);
    $role = mysqli_real_escape_string($con, $_POST['role']);

    do {
        $code_agent = 'AG' . date('YmdHis') . rand(10,99);
        $check_code_query = "SELECT code_agent FROM agents WHERE code_agent = '$code_agent'";
        $check_code_run = mysqli_query($con, $check_code_query);
    } while (mysqli_num_rows($check_code_run) > 0);

    $check_matricule_query = "SELECT matricule FROM agents WHERE matricule = '$matricule'";
    $check_matricule_query_run = mysqli_query($con, $check_matricule_query);

    if (mysqli_num_rows($check_matricule_query_run) > 0) {
        $_SESSION['message'] = "Ce matricule existe déjà.";
        header('location: add-Tagent.php');
    } else {
        $sql_insert = "INSERT INTO agents (code_agent,matricule,role,id_ut_fk) VALUES (?,?,?,?)";
        if ($stmt = $con->prepare($sql_insert)) {
            $stmt->bind_param("sssi", $code_agent, $matricule, $role, $user_id);
            if ($stmt->execute()) {
                $_SESSION['message'] = "Enregistrement réussi.";
                $stmt->close();
                header("Location: add-Tagent.php");
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
    $designation = mysqli_real_escape_string($con, $_POST['designation']);

    $check_departement_query = "SELECT nom FROM departement WHERE nom = '$departement'";
    $check_departement_query_run = mysqli_query($con, $check_departement_query);
    
    if (mysqli_num_rows($check_departement_query_run) > 0) {
        $_SESSION['toastr'] = ['type' => 'error','message' => 'Ce département existe déjà.'];
        header("Location: fac-dep.php");
        exit;
    }
    else {
        $sql_insert = "INSERT INTO departement (id_faculte,nom,designation,id_user) VALUES (?,?,?,?)";
        if ($stmt = $con->prepare($sql_insert)) {
            $stmt->bind_param("issi", $faculte_id,$departement, $designation, $user_id);
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

    $check_faculte_query = "SELECT nom FROM faculte WHERE nom = '$name'";
    $check_faculte_query_run = mysqli_query($con, $check_faculte_query);
    
    if (mysqli_num_rows($check_faculte_query_run) > 0) {
        $_SESSION['toastr'] = ['type' => 'error','message' => 'Cette faculté existe déjà.'];
        header("Location: fac-dep.php");
        exit;
    }
    else {
        $sql_insert = "INSERT INTO faculte (nom,designation,id_user) VALUES (?,?,?)";
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
?>