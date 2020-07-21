<?php include('includes/header.php');
include('dbconfig.php');?>

<?php
$id=$_GET['id'];
$query="SELECT * FROM items WHERE ID=$id";
$conn=mysqli_connect("localhost","root","","practise")or die('could not conect to database');
$results=mysqli_query($conn,$query);
if(mysqli_num_rows($results)>0){
    while($row=mysqli_fetch_array($results)){
        echo $row['id']; ?>


<div class="container">
<div class="row">
<div class="card">
    <div class="card-header">
    <h3>Change the fields you want to Edit</h3>
    </div>
<form action="code.php" method="post">
  <div class="row p-2">
  
    
   
    

  <div class="col">
       <input type="number" hidden class="form-control" name="id"  value=<?php echo $row['id']; ?> required>
    <label for="name">Name</label>
    <input type="text" class="form-control" name="pname"   value=<?php echo $row['name']; ?> >
    
  </div>
  <div class="col">
    <label for="name">Manufacturer</label>
    <input type="text" class="form-control" name="mname"   value=<?php echo $row['manufacturer']; ?>>
    
  </div>
  </div>
  <div class="row p-2">
  <div class="col">
    <label for="name">Grade</label>
    <input type=text class="form-control" name="grade"   value=<?php echo $row['grade']; ?>>
    
  </div>
  <div class="col">
    <label for="name">Manufacturing DATE</label>
    <input type=date class="form-control"  name="mdate" value=<?php echo $row['manufacturing']; ?>>
    
  </div>
  <div class="col">
    <label for="name">Expiry DATE</label>
    <input type=date class="form-control" name="edate" value=<?php echo $row['expiry']; ?>>
    
  </div>
    </div>
  <div class="row p-2">
  <div class="col ">
    <label for="name">Purchase Cost</label>
    <input type="number" class="form-control" name="pcost" value=<?php echo $row['cost_purchase']; ?>  step=".01">
    
  </div>
  <div class="col">
    <label for="name">Selling Cost</label>
    <input type="number" class="form-control" name="scost"  value=<?php echo $row['cost_sale']; ?> step="0.01">
    
  </div>
  <div class="col ">
    <label for="name">Size of packaging</label>
    <input type="text" class="form-control" name="psize"  value=<?php echo $row['size']; ?>>
    
  </div>
    </div>
 <div class="row">
  <div class="col p-2 ml-4" float-left >
    <button type="submit" class="btn btn-primary " name="update-btn">Update</button>

  <a href="index.php" class="btn btn-danger ml-4 ">Cancel</a></div>
    </div>
</form>    
</div>
</div>
</div>

<?php
    } 
}
else{
    echo "no record found of such id";
}
?>


<?php include('includes/footer.php'); ?>