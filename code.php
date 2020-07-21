

<?php
session_start();
if(isset($_POST['addbtn'])){
    $id=$_POST['id'];
    $pname=$_POST['pname'];
    $mname=$_POST['mname'];
    $grade=$_POST['grade'];
    $mdate=$_POST['mdate'];
    $edate=$_POST['edate'];
    $pcost=$_POST['pcost'];
    $scost=$_POST['scost'];
    $psize=$_POST['psize'];
    
      $conn=mysqli_connect("localhost","root","","practise")or die('could not conect to database');
    $query="INSERT INTO items VALUES ('$id','$pname','$mname','$grade','$mdate','$edate','$pcost','$scost','$psize')";
    $res=mysqli_query($conn,$query);
    if($res){
//        echo "ADDED SUCESSFULLY";
        $_SESSION['status']="Added Sucessfully";
        $_SESSION['status_code']="sucess";
        header('location:index.php');
    }
    else{
//        echo "Error";
         $_SESSION['status']="Failed to Add";
        $_SESSION['status_code']="error";
        header('location: add.php');
    }
}

if(isset($_POST['update-btn'])){
     $id=$_POST['id'];
    $pname=$_POST['pname'];
    $mname=$_POST['mname'];
    $grade=$_POST['grade'];
    $mdate=$_POST['mdate'];
    $edate=$_POST['edate'];
    $pcost=$_POST['pcost'];
    $scost=$_POST['scost'];
    $psize=$_POST['psize'];
    $query_update="UPDATE items SET name='$pname',manufacturer='$mname',grade='$grade', manufacturing='$mdate',expiry='$edate',cost_purchase='$pcost',cost_sale='$scost',size='$psize' WHERE id='$id'";
      $conn=mysqli_connect("localhost","root","","practise")or die('could not conect to database');
    $query_run=mysqli_query($conn,$query_update);
    if($query_run){
        $_SESSION['status']="Updated Sucessfully";
        $_SESSION['status_code']="sucess";
//        echo "ADDED SUCESSFULLY";
        header('location:index.php');
    }
    else{
//        echo "Error";
        $_SESSION['status']="Failed to Update";
        $_SESSION['status_code']="error";
        header('location: index.php');
    }
}
if(isset($_POST['value_delete'])){
    $del_id=$_POST['delete_id'];
    $query_delete="DELETE from items WHERE id='$del_id'";
      $conn=mysqli_connect("localhost","root","","practise")or die('could not conect to database');
    $query_run=mysqli_query($conn,$query_delete);
    if($query_run){
      $_SESSION['status']="Deleted Sucessfully";
        $_SESSION['status_code']="sucess";
        header('location:index.php');
    }
    else{
//        echo "Error";
         $_SESSION['status']="Failed to Delete";
        $_SESSION['status_code']="error";
        header('location: index.php');
    }
}
if(isset($_POST['delete_btn_set'])){
    $delid=$_POST['delete_id'];
    $query_delete="DELETE from items WHERE id='$delid'";
      $conn=mysqli_connect("localhost","root","","practise")or die('could not conect to database');
    $query_run=mysqli_query($conn,$query_delete);
}

?>
