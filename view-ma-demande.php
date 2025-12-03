<?php include("inc/header.php"); ?>

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><strong>Details de ma demande</strong></h4>
                    </div>
                    <?php
                    if (isset($_GET['id'])) {
                        $demande_id = $_GET['id'];
                        $demande = "SELECT agents.*, demande_Bourse.*
                            FROM demande_Bourse
                            INNER JOIN agents ON demande_bourse.id_ut_bour_fk = agents.id
                            WHERE demande_bourse.id='$demande_id'";
                        $demande_run = mysqli_query($con, $demande);
                        if (mysqli_num_rows($demande_run) > 0) {
                            foreach ($demande_run as $list) {
                                ?>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-responsive-sm">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Status</th>
                                                    <th>Date</th>
                                                    <th>Price</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th>1</th>
                                                    <td
                                                        class="<?= $list['ver_doyen'] == 'no_verify' ? 'badge badge-danger' : 'badge badge-success' ?>">
                                                        <?= $list['ver_doyen'] == 'no_verify' ? 'Non Valide' : 'Valider'; ?>
                                                    </td>
                                                    <td><span class="badge badge-primary">Sale</span>
                                                    </td>
                                                    <td>January 22</td>
                                                    <td class="color-primary">$21.56</td>
                                                </tr>
                                                <tr>
                                                    <th>1</th>
                                                    <td>Kolor Tea Shirt For Man</td>
                                                    <td><span class="badge badge-primary">Sale</span>
                                                    </td>
                                                    <td>January 22</td>
                                                    <td class="color-primary">$21.56</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("inc/footer.php"); ?>