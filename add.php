<?php include('includes/header.php'); ?>
<div class="container">
<div class="row">
<div class="card">
    <div class="card-header">
    <h3>Enter the details of product you want to add</h3>
    </div>
<form action="code.php" method="post">
  <div class="row p-2">
  <div class="col">
    <label for="id">ID</label>
    <input type="number"  class="form-control" name="id" aria-describedby="emailHelp" placeholder="Enter ID" required>
    
  </div>
  <div class="col">
    <label for="name">Name</label>
    <input type="text" class="form-control" name="pname"  placeholder="Enter name">
    
  </div>
  <div class="col">
    <label for="name">Manufacturer</label>
    <input type="text" class="form-control" name="mname"  placeholder="Enter manufacturer">
    
  </div>
  </div>
  <div class="row p-2">
  <div class="col">
    <label for="name">Grade</label>
    <input type=text class="form-control" name="grade"  placeholder="Enter Grade">
    
  </div>
  <div class="col">
    <label for="name">Manufacturing DATE</label>
    <input type=date class="form-control" name="mdate">
    
  </div>
  <div class="col">
    <label for="name">Expiry DATE</label>
    <input type=date class="form-control" name="edate">
    
  </div>
    </div>
  <div class="row p-2">
  <div class="col ">
    <label for="name">Purchase Cost</label>
    <input type="number" class="form-control" name="pcost" placeholder="Enter Purchase Cost" step=".01">
    
  </div>
  <div class="col">
    <label for="name">Selling Cost</label>
    <input type="number" class="form-control" name="scost" placeholder="Enter Selling Cost" step="0.01">
    
  </div>
  <div class="col ">
    <label for="name">Size of packaging</label>
    <input type="text" class="form-control" name="psize" placeholder="Enter Size of packaging">
    
  </div>
    </div>
 <div class="row">
  <div class="col p-2 ml-4" float-left >
    <button type="submit" class="btn btn-primary " name="addbtn">Submit</button>

  <a href="index.php" class="btn btn-danger ml-4 ">Cancel</a></div>
    </div>
</form>    
</div>
</div>
</div>
<?php include('includes/footer.php'); ?>