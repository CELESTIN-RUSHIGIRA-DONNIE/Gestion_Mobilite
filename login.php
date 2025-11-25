<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Edumin - Bootstrap Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <link href="assets/css/style.css" rel="stylesheet">
    
    <link rel="stylesheet" href="assets/vendor/toastr/css/toastr.min.css">

</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">

                                    <?php if (isset($_SESSION['message'])) { ?>
                                        <div class="col-xl-12 alert alert-<?php echo $_SESSION['msg_type']; ?> solid alert-dismissible fade show">
                                            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close">
                                                <span><i class="mdi mdi-close"></i></span>
                                            </button>
                                            <strong>
                                                <i class="mdi mdi-alert-circle"></i>
                                            </strong>
                                            <?php echo $_SESSION['message']; ?>
                                        </div>
                                        <?php unset($_SESSION['message'], $_SESSION['msg_type']); ?>
                                    <?php } ?>

                                    <h4 class="text-center mb-4">Connectez-vous</h4>
                                    <form action="function.php" method="POST">
                                        <div class="form-group">
                                            <label><strong>Matricule</strong></label>
                                            <input type="text" class="form-control" name="matricule">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Password</strong></label>
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            <div class="form-group">
                                               <div class="custom-control custom-checkbox ml-1">
													<input type="checkbox" class="custom-control-input" id="basic_checkbox_1">
													<label class="custom-control-label" for="basic_checkbox_1">Remember my preference</label>
												</div>
                                            </div>
                                            <div class="form-group">
                                                <a href="page-forgot-password.html">Forgot Password?</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" name="login" class="btn btn-primary btn-block">Connecter vous</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Don't have an account? <a class="text-primary" href="register.php">Sign up</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="assets/vendor/global/global.min.js"></script>
	<script src="assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="assets/js/custom.min.js"></script>
    <script src="assets/js/dlabnav-init.js"></script>

    <!-- Toastr -->
    <script src="assets/vendor/toastr/js/toastr.min.js"></script>

    <!-- All init script -->
    <script src="assets/js/plugins-init/toastr-init.js"></script>
    <script>
        <?php if (!empty($toast)): ?>
            toastr.<?php echo $toast['type']; ?>("<?php echo addslashes($toast['message']); ?>");
        <?php endif; ?>
    </script>

</body>

</html>