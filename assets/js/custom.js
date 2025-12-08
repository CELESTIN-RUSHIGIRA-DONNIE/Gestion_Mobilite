$(document).ready(function () {

    $('.delete_demande_btn').click(function (e) {
        e.preventDefault();
        var id = $(this).val();
        //alert(id);

        swal({
            title: "Voulez-vous supprimer cette demande ?",
            text: "Une fois supprimée, vous ne pourrez pas la récupérer !",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        method: "POST",
                        url: "function.php",
                        data: {
                            'demande_id': id,
                            'delete_demande_btn': true
                        },
                        success: function (response) {
                            if (response == 200) {
                                swal("Success", "Demande supprimée avec succès", "success");
                                $("#demande_table").load(location.href + " #demande_table");
                            }
                            else if (response == 500) {
                                swal("error", "Demande non supprimée", "error");
                            }
                        }
                    });
                }
            });
    });

    $('.delete_agents_btn').click(function (e) {
        e.preventDefault();
        var id = $(this).val();
        //alert(id);

        swal({
            title: "Voulez-vous supprimer cet agent?",
            text: "Une fois supprimé, vous ne pourrez pas le récupérer !",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        method: "POST",
                        url: "function.php",
                        data: {
                            'agent_id': id,
                            'delete_agents_btn': true
                        },
                        success: function (response) {
                            if (response == 200) {
                                swal("Success", "Agent supprimé avec succès", "success");
                                $("#agents_table").load(location.href + " #agents_table");
                            }
                            else if (response == 500) {
                                swal("error", "Agent non supprimé", "error");
                            }
                        }
                    });
                }
            });
    });

    $('.delete_departement_btn').click(function (e) {
        e.preventDefault();
        var id = $(this).val();
        //alert(id);

        swal({
            title: "Voulez-vous supprimer cet agent?",
            text: "Une fois supprimé, vous ne pourrez pas le récupérer !",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        method: "POST",
                        url: "function.php",
                        data: {
                            'department_id': id,
                            'delete_department_btn': true
                        },
                        success: function (response) {
                            if (response == 200) {
                                swal("Success", "Département supprimé avec succès", "success");
                                $("#departments_table").load(location.href + " #departments_table");
                            }
                            else if (response == 500) {
                                swal("error", "Département non supprimé", "error");
                            }
                        }
                    });
                }
            });
    });
});

