 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="scripts/sweetalert.js"></script>
    
<script>
    $(document).ready(function(){
        $('.delete_btn_ajax').click(function(e){
            e.preventDefault(); 
                
            var delid=$(this).closest("tr").find('.del_id').val();
            
            swal({
              title: "Are you sure?",
              text: "Once deleted, you will not be able to recover this Data!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
                })
            .then((willDelete) => {
              if (willDelete) {
                $.ajax({
                    type: "method",
                    url: "code.php",
                    data: {"delete_btn_set": 1, "delete_id":delid },
                    success: Function(response){
                    swal("Deleted", "Your data is permanently deleted", "success").then((result)->{ 
                    location.reload();
                    });
                    }
                    });
              } 
            });
            
        });
});
    
</script>

<!--
    
-->
  </body>
</html>