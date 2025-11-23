<?php include("inc/header.php");?>
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">

                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Fiche de Mobilité</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><strong><a href="index.php">Home</a></strong></li>
                            <li class="breadcrumb-item active"><a href="add-professor.html">Fiche</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Fiche de Mobilite</a></li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12 col-xxl-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Completer la fiche de mobilité</h5>
                            </div>
                            <div class="card-body">
                                <form action="#" method="post">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Type de Mobilité</label>
                                                <input type="text" name="type_mobilite" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Objectif de Mobilité</label>
                                                <input type="text" name="objectif_mobilite" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Durée de Sejour</label>
                                                <input type="text" name="dure_sejour" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Organisation d'acceuil</label>
                                                <input type="text" name="organisation_acceuil" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Programme d'intervention</label>
                                                <input type="text" name="programme_intervention" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Date de Depart</label>
                                                <input name="date_depart" class="datepicker-default form-control"
                                                    id="datepicker">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Date de Retour</label>
                                                <input name="date_retour" class="datepicker-default form-control"
                                                    id="datepicker">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Financement de la mobilité couvert par</label>
                                                <input type="text" name="financement_mobilite" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Genre</label>
                                                <select class="form-control">
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Adresse</label>
                                                <input type="text" name="adresse" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Numero Téléphone</label>
                                                <input type="text" name="telephone" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label class="form-label">Department</label>
                                                <select class="form-control">
                                                    <option value="Department">Department</option>
                                                    <option value="html">HTML</option>
                                                    <option value="css">CSS</option>
                                                    <option value="javascript">JavaScript</option>
                                                    <option value="angular">Angular</option>
                                                    <option value="angular">React</option>
                                                    <option value="vuejs">Vue.js</option>
                                                    <option value="ruby">Ruby</option>
                                                    <option value="php">PHP</option>
                                                    <option value="asp">ASP.NET</option>
                                                    <option value="python">Python</option>
                                                    <option value="mysql">MySQL</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group fallback w-100">
                                                <input type="file" name="photo" class="dropify" data-default-file="">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <button type="submit" class="btn btn-primary">Submit</button>
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
        <!--**********************************
            Content body end
        ***********************************-->
<?php include("inc/footer.php");?>