<?php include("inc/header.php"); ?>

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">

        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Faculté et Département</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Faculté & Département</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <ul class="nav nav-pills mb-3">
                    <li class="nav-item"><a href="#list-view" data-toggle="tab"
                            class="nav-link btn-primary mr-1 show active">Faculté</a></li>
                    <li class="nav-item"><a href="#grid-view" data-toggle="tab"
                            class="nav-link btn-primary">Département</a></li>
                </ul>
            </div>
            <div class="col-lg-12">
                <div class="row tab-content">
                    <div id="list-view" class="tab-pane fade active show col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Liste de Faculté </h4>
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#basicModal">+ Ajouter Faculté</button>
                            </div>
                            <div class="modal fade" id="basicModal">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-center"><strong>Ajouter Faculté</strong></h5>
                                            <button type="button" class="close"
                                                data-dismiss="modal"><span>&times;</span>
                                            </button>
                                        </div>
                                        <form action="function.php" method="POST">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="control-label">Nom</label>
                                                        <input class="form-control form-white" placeholder="Entrez nom" type="text" name="name" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="control-label">Designation</label>
                                                        <input class="form-control form-white" placeholder="Entrez designation"
                                                            type="text" name="designation" required>
                                                    </div>            
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" name="add_faculte" class="btn btn-primary">Enregistrer les modifications</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive recentOrderTable">
                                    <table class="table verticle-middle table-responsive-md text-center">
                                        <thead>
                                            <tr>
                                                <th scope="col">No.</th>
                                                <th scope="col">Nom</th>
                                                <th scope="col">Designation</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>01</td>
                                                <td>Jack Ronan</td>
                                                <td><span>Checkin</span></td>
                                                <td>
                                                    <a href="edit-student.html" class="btn btn-sm btn-success"><i
                                                            class="la la-eye"></i></a>
                                                    <a href="edit-student.html" class="btn btn-sm btn-primary"><i
                                                            class="la la-pencil"></i></a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i
                                                            class="la la-trash-o"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="grid-view" class="tab-pane fade col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Departement</h4>
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#basicModal2">+ Ajouter Departement</button>
                            </div>
                                <div class="modal fade" id="basicModal2">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-center"><strong>Ajouter Departement</strong></h5>
                                            <button type="button" class="close"
                                                data-dismiss="modal"><span>&times;</span>
                                            </button>
                                        </div>
                                        <form action="" method="POST">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="control-label">Nom</label>
                                                        <input class="form-control form-white" placeholder="Entrez nom"
                                                            type="text" name="category-name">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="control-label">Faculté ID</label>
                                                        <select class="form-control form-white"
                                                            data-placeholder="Choisissez une couleur..." name="category-color">
                                                            <option value="success">Success</option>
                                                            <option value="primary">Primary</option>
                                                            <option value="warning">Warning</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive recentOrderTable">
                                    <table class="table verticle-middle table-responsive-md text-center">
                                        <thead>
                                            <tr>
                                                <th scope="col">No.</th>
                                                <th scope="col">Nom</th>
                                                <th scope="col">Faculté ID</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>01</td>
                                                <td>Jack Ronan</td>
                                                <td>120$</td>
                                                <td>
                                                    <a href="edit-student.html" class="btn btn-sm btn-success"><i class="la la-eye"></i></a>
                                                    <a href="edit-student.html" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i class="la la-trash-o"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
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