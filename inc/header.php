<?php
session_start();
include('conf/dbcon.php');

$toast = null;
if (isset($_SESSION['toastr'])) {
    $toast = $_SESSION['toastr'];
    unset($_SESSION['toastr']); // pour ne l’afficher qu’une fois
}

if (!isset($_SESSION['auth_user'])) {
    $_SESSION['message'] = "Connectez-vous d'abord d'abord.";
    $_SESSION["msg_type"] = "warning";
    header("Location: login.php");
    exit(0);
}

$user_id = $_SESSION['auth_user']['id'];
$id_faculte = $_SESSION['auth_user']['id_faculte'];
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Edumin - Bootstrap Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <link rel="stylesheet" href="assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/vendor/toastr/css/toastr.min.css">

    <!-- Datatable -->
    <link href="assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- Pick date -->
    <link rel="stylesheet" href="assets/vendor/pickadate/themes/default.css">
    <link rel="stylesheet" href="assets/vendor/pickadate/themes/default.date.css">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.php" class="brand-logo">
                <img class="logo-abbr" src="assets/images/logo-white.png" alt="">
                <img class="logo-compact" src="assets/images/logo-text-white.png" alt="">
                <img class="brand-title" src="assets/images/logo-text-white.png" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="search_bar dropdown">
                                <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                    <i class="mdi mdi-magnify"></i>
                                </span>
                                <div class="dropdown-menu p-0 m-0">
                                    <form>
                                        <input class="form-control" type="search" placeholder="Search"
                                            aria-label="Search">
                                    </form>
                                </div>
                            </div>
                        </div>

                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link bell ai-icon" href="#" role="button" data-toggle="dropdown">
                                    <svg id="icon-user" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
                                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                        <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                                    </svg>
                                    <div class="pulse-css"></div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="list-unstyled">
                                        <li class="media dropdown-item">
                                            <span class="success"><i class="ti-user"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>Martin</strong> has added a <strong>customer</strong>
                                                        Successfully
                                                    </p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="primary"><i class="ti-shopping-cart"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>Jennifer</strong> purchased Light Dashboard 2.0.</p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="danger"><i class="ti-bookmark"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>Robin</strong> marked a <strong>ticket</strong> as
                                                        unsolved.
                                                    </p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="primary"><i class="ti-heart"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>David</strong> purchased Light Dashboard 1.0.</p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="success"><i class="ti-image"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong> James.</strong> has added a<strong>customer</strong>
                                                        Successfully
                                                    </p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                    </ul>
                                    <a class="all-notification" href="#">See all notifications <i
                                            class="ti-arrow-right"></i></a>
                                </div>
                            </li>
                            <li class="nav-item dropdown header-profile">
                                <a><?= $_SESSION['auth_user']['nom'] . ' ' . $_SESSION['auth_user']['postnom'] ?></a>
                                <?php
                                // Vérifie si une image est définie pour l'utilisateur connecté
                                $user_image = !empty($_SESSION['auth_user']['photo'])
                                    ? 'uploads/' . $_SESSION['auth_user']['photo']   // Chemin vers la photo uploadée
                                    : 'assets/images/default.jpg';             // Image par défaut
                                ?>
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <img src="<?= htmlspecialchars($user_image); ?>" width="20" alt="">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="app-profile.html" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="email-inbox.html" class="dropdown-item ai-icon">
                                        <svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail">
                                            <path
                                                d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                            </path>
                                            <polyline points="22,6 12,13 2,6"></polyline>
                                        </svg>
                                        <span class="ml-2">Inbox </span>
                                    </a>
                                    <form action="logout.php" method="POST">
                                        <button type="submit" name="logout" class="dropdown-item ai-icon">
                                            <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" width="18"
                                                height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-log-out">
                                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                                <polyline points="16 17 21 12 16 7"></polyline>
                                                <line x1="21" y1="12" x2="9" y2="12"></line>
                                            </svg>
                                            <span class="ml-2">Logout</span>
                                        </button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="dlabnav">
            <div class="dlabnav-scroll">
                <ul class="metismenu" id="menu">
                    <li><a class="has-icon" href="index.php" aria-expanded="false">
                            <i class="la la-home"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li><a class="ai-icon" href="event-management.html" aria-expanded="false">
                            <i class="la la-calendar"></i>
                            <span class="nav-text">Event Management</span>
                        </a>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="la la-user"></i>
                            <span class="nav-text">Profile</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="add-profile.php">Ajouter Profile</a></li>
                            <li><a href="view-profile.php">Voir mon profile</a></li>
                            <li><a href="info.php">Mes infos</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="la la-users"></i>
                            <span class="nav-text">Agents</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="add-agent.php">Ajouter agents</a></li>
                            <li><a href="list-agents.php">Agents</a></li>
                            <li><a href="edit-agent.html">Edit Agents</a></li>
                            <li><a href="about-agent.html">About Agents</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="la la-graduation-cap"></i>
                            <span class="nav-text">School</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="fac-dep.php">FAC et Departement</a></li>
                            <li><a href="add-courses.html">Add Courses</a></li>
                            <li><a href="edit-courses.html">Edit Courses</a></li>
                            <li><a href="about-courses.html">About Courses</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="la la-book"></i>
                            <span class="nav-text">Operations</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="demande.php">Mobilite</a></li>
                            <li><a href="rapport.php">Rapport</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="la la-building"></i>
                            <span class="nav-text">Demande</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="view-demande.php">Voir les demandes</a></li>
                            <li><a href="add-departments.ht">Add Departments</a></li>
                            <li><a href="edit-departments.html">Edit Departments</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="la la-users"></i>
                            <span class="nav-text">Staff</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="all-staff.html">All Staff</a></li>
                            <li><a href="add-staff.html">Add Staff</a></li>
                            <li><a href="edit-staff.html">Edit Staff</a></li>
                            <li><a href="staff-profile.html">Staff Profile</a></li>
                        </ul>
                    </li>
                    
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->