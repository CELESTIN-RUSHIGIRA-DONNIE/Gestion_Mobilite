<?php include("inc/header.php"); ?>

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">

        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Liste des agents</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Agents</li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Liste des agents</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <ul class="nav nav-pills mb-3">
                    <li class="nav-item"><a href="#list-view" data-toggle="tab"
                            class="nav-link btn-primary mr-1 show active">List agents</a></li>
                    <li class="nav-item"><a href="#grid-view" data-toggle="tab" class="nav-link btn-primary">Grid
                            View</a></li>
                </ul>
            </div>
            <div class="col-lg-12">
                <div class="row tab-content">
                    <div id="list-view" class="tab-pane fade active show col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Liste de Agents </h4>
                                <a href="add-agent.php" class="btn btn-primary">+ Ajouter Agents</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive recentOrderTable">
                                    <table class="table verticle-middle table-responsive-md">
                                        <thead>
                                            <tr>
                                                <th scope="col">No.</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Assigned Professor</th>
                                                <th scope="col">Date Of Admit</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Subject</th>
                                                <th scope="col">Fees</th>
                                                <th scope="col">Edit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>01</td>
                                                <td>Jack Ronan</td>
                                                <td>Airi Satou</td>
                                                <td>01 August 2020</td>
                                                <td><span class="badge badge-rounded badge-primary">Checkin</span></td>
                                                <td>Commerce</td>
                                                <td>120$</td>
                                                <td>
                                                    <a href="edit-student.html" class="btn btn-sm btn-primary"><i
                                                            class="la la-pencil"></i></a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i
                                                            class="la la-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>02 </td>
                                                <td>Jimmy Morris</td>
                                                <td>Angelica Ramos</td>
                                                <td>31 July 2020</td>
                                                <td><span class="badge badge-rounded badge-warning">Panding</span></td>
                                                <td>Mechanical</td>
                                                <td>120$</td>
                                                <td>
                                                    <a href="edit-student.html" class="btn btn-sm btn-primary"><i
                                                            class="la la-pencil"></i></a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i
                                                            class="la la-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>03 </td>
                                                <td>Nashid Martines</td>
                                                <td>Ashton Cox</td>
                                                <td>30 July 2020</td>
                                                <td><span class="badge badge-rounded badge-danger">Canceled</span></td>
                                                <td>Science</td>
                                                <td>520$</td>
                                                <td>
                                                    <a href="edit-student.html" class="btn btn-sm btn-primary"><i
                                                            class="la la-pencil"></i></a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i
                                                            class="la la-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>04</td>
                                                <td>Roman Aurora</td>
                                                <td>Cara Stevens</td>
                                                <td>29 July 2020</td>
                                                <td><span class="badge badge-rounded badge-success">Checkin</span></td>
                                                <td>Arts</td>
                                                <td>220$</td>
                                                <td>
                                                    <a href="edit-student.html" class="btn btn-sm btn-primary"><i
                                                            class="la la-pencil"></i></a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i
                                                            class="la la-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>05</td>
                                                <td>Samantha</td>
                                                <td>Bruno Nash </td>
                                                <td>28 July 2020</td>
                                                <td><span class="badge badge-rounded badge-success">Checkin</span></td>
                                                <td>Maths</td>
                                                <td>130$</td>
                                                <td>
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
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="card card-profile">
                                    <div class="card-header justify-content-end pb-0">
                                        <div class="dropdown">
                                            <button class="btn btn-link" type="button" data-toggle="dropdown">
                                                <span class="dropdown-dots fs--1"></span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right border py-0">
                                                <div class="py-2">
                                                    <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                                                    <a class="dropdown-item text-danger"
                                                        href="javascript:void(0);">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body pt-2">
                                        <div class="text-center">
                                            <div class="profile-photo">
                                                <img src="assets/images/profile/small/pic2.jpg" width="100"
                                                    class="img-fluid rounded-circle" alt="">
                                            </div>
                                            <h3 class="mt-4 mb-1">Alexander</h3>
                                            <p class="text-muted">M.COM., P.H.D.</p>
                                            <ul class="list-group mb-3 list-group-flush">
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <span class="mb-0">Gender :</span><strong>Male</strong>
                                                </li>
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <span class="mb-0">Phone No. :</span><strong>+01 123 456
                                                        7890</strong>
                                                </li>
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <span class="mb-0">Email:</span><strong>info@example.com</strong>
                                                </li>
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <span class="mb-0">Address:</span><strong>#8901 Marmora
                                                        Road</strong>
                                                </li>
                                            </ul>
                                            <a class="btn btn-outline-primary btn-rounded mt-3 px-4"
                                                href="professor-profile.html">Read More</a>
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