$(document).ready(function() {
 
    $('.delete_product_btn').click(function(e){
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
                        'product_id':id,
                        'delete_product_btn':true
                    },
                    success: function(response){
                        if(response == 200)
                        {
                            swal("Success", "produit deleted", "success");
                            $("#products_table").load(location.href + " #products_table");
                        }
                        else if(response == 500)
                        {
                            swal("error", "produit not deleted", "error");
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

