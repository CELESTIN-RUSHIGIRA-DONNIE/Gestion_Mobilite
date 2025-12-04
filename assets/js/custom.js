$(document).ready(function() {
 
    $('.delete_agents_btn').click(function(e){
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
                        'agent_id':id,
                        'delete_agents_btn':true
                    },
                    success: function(response){
                        if(response == 200)
                        {
                            swal("Success", "Agent supprimé avec succès", "success");
                            $("#agents_table").load(location.href + " #agents_table");
                        }
                        else if(response == 500)
                        {
                            swal("error", "Agent non supprimé", "error");
                        }
                    }
                });
            }
          });
    });
      
    $('.delete_demande_btn').click(function(e){
        e.preventDefault();   
        var id = $(this).val();
        //alert(id);

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover!",
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
                        'demande_id':id,
                        'delete_demande_btn':true
                    },
                    success: function(response){
                        if(response == 200)
                        {
                            swal("Success", "demande deleted", "success");
                            $("#demande_table").load(location.href + " #demande_table");
                        }
                        else if(response == 500)
                        {
                            swal("error", "demande not deleted", "error");
                        }
                    }
                });
            }
          });
    });
});

