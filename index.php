<?php 
    $count=0;
     if(isset($_POST['search'])){
         $valuetosearch=$_POST['valueToSearch'];
         $query="SELECT * FROM `items` WHERE CONCAT( `id`, `name`, `manufacturer`, `grade`, `manufacturing`, `expiry`, `cost_purchase`, `cost_sale`, `size`) LIKE '%".$valuetosearch."%'" ;
         $search_result=filterTable($query);
         $count=mysqli_num_rows($search_result);
     }
    else{
        $query="SELECT * from items";
        $search_result=filterTable($query);
        $count=mysqli_num_rows($search_result);
    }
    function filterTable($query){
        $conn=mysqli_connect("localhost","root","","practise")or die('could not conect to database');
        $res=mysqli_query($conn,$query);
        return $res;
    }

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
      
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>View Stocks HERE!</title>
  </head>
  <body>
      <nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <a class="navbar-brand" href="#"><img src="includes/logo.png" height=30px> </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link disabled" href="index.php" aria-disabled="true">Items <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="payments.php">Payments</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="sales.php" tabindex="-1" >Sales Analysis</a>
      </li>
    </ul>
    
  </div>
</nav>

    <div class="container">
            <div class="row">
                <div class="col-md-12 mt-5">
                    <div class="card">
                        <div class="card-header">
                            <form class="form-inline my-2 my-lg-0" method="post" action="index.php">
      <input class="form-control mr-0" type="search" name="valueToSearch" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success ml-0 my-2 my-sm-0" type="submit" name="search">Search</button>
                                
    </form>
                            <a href="add.php" class="btn btn-primary float-right"  >ADD ITEM</a>
                            <div class="col">
                            
                            
                        </div>
                        <?php  if($count==0){?>
                            <script src="scripts/sweetalert.js"></script>
                        <script>
                            
                            swal("Sorrry!", "No such record found", "error");
                            </script>
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th>ID</th>
                           <th>name</th>
                           <th>manufacturer</th>
                           <th>grade</th>
                           <th>manufacturing</th>
                           <th>expiry</th>
                           <th><center>cost of <br>purchase</center></th>
                           <th><center>selling <br>price</center></th>
                           <th><center>size of <br>packaging</center></th>
                           <th>Edit</th>
                           <th>Delete</th>
                            </tr>
                          </thead>
                         
                          
                       <?php }?>
                         <?php  if($count>0):?> 
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th>ID</th>
                           <th>name</th>
                           <th>manufacturer</th>
                           <th>grade</th>
                           <th>manufacturing</th>
                           <th>expiry</th>
                           <th><center>cost of <br>purchase</center></th>
                           <th><center>selling <br>price</center></th>
                           <th><center>size of <br>packaging</center></th>
                           <th>Edit</th>
                           <th>Delete</th>
                            </tr>
                          </thead>
                          <tbody>
                             <?php     while($row=mysqli_fetch_array($search_result)) :?>
                       <tr>
                           <td><?php echo $row['id'];?></td>
                           <td><?php echo $row['name'];?></td> <td><?php echo $row['manufacturer']?></td>
                           <td><?php echo $row['grade'];?></td>
                           <td><?php echo $row['manufacturing'];?></td>
                           <td><?php echo $row['expiry'];?></td>
                           <td><?php echo $row['cost_purchase'];?></td>
                           <td><?php echo $row['cost_sale'];?></td>
                           <td><?php echo $row['size'];?></td>
                           <td><a href="index-edit.php?id=<?php echo $row['id'];?>"  class="btn btn-warning"  >EDIT</a></td>
                           <td><input type="hidden" class="del_id" value=<?php echo $row['id'];?>>
                               <a href="javascript:void(0)" class="delete_btn_ajax btn btn-danger">DELETE</a></td>
                       </tr>
                       <?php endwhile?>
                       <?php endif?>
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
      </div>

 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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
                    type: "POST",
                    url: "code.php",
                    data: {"delete_btn_set": 1, "delete_id":delid, },
                    success: function(response){
                    swal("Deleted", "Your data is permanently deleted", "success").then((result)=>{ 
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