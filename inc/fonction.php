<?php
    $user_id = $_SESSION['auth_user']['id'];
    $sql = "SELECT ver_doyen, ver_sgr, ver_acad, ver_rect FROM demande_bourse WHERE id_ut_bour_fk = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $demande_validee = false;
    if ($row) {
        $demande_validee =
            $row['ver_doyen'] === 'verify' &&
            $row['ver_sgr'] === 'verify' &&
            $row['ver_acad'] === 'verify' &&
            $row['ver_rect'] === 'verify';
    }

?>