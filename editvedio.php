<?php include_once 'header.php';
//session_start();
if(!isset($_SESSION['$username'])){
  header("LOCATION: auth/index.php");
}
if(isset($_SESSION['$username'])){
  $userid = $_SESSION['$userid'];
  $sql = "select * from signup where user_id = '{$userid}'";
                    $result = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_assoc($result);
                    if($row['status']!='admin'){
                      header("LOCATION: index.php");
                    }
}
include 'headdash.php';
include "connection.php";
$vedioid = $_GET['vedio'];
if(isset($_POST['formsubmit'])){
    $file = $_FILES['coursevedio'];
    $file_name = $file['name'];
    $file_type = $file['type'];
    $temp_name = $file['tmp_name'];
    $file_size = $file['size'];
    $file_destination = "upload/".$file_name;
    if(move_uploaded_file($temp_name,$file_destination)){
    $insert = "UPDATE vedio SET v_name ='{$file_name}' WHERE v_id = '{$vedioid}'";
    $result = mysqli_query($conn,$insert);
    if($result){
        echo '<div class="alert alert-success" role="alert">
        Vedio Uploaded
      </div>';
    }
    else{
        echo '<div class="alert alert-danger" role="alert">
        Vedio Cannot Upload!
      </div>';
    }
}
}
?>



    <div class="row">
        <div class="col-md-6 offset-3 mt-5 mb-5">
        
            <center>
                <h3>Dashboard</h3>
                <p class="text-uppercase">HI <?php echo $_SESSION['$username'] ?></p>
                <!-- <a href="auth/logout.php">Logout</a>
                <a href="auth/profile.php">Profile</a> -->
                
            </center>

            <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data">
                
                <label for="" class="w-100">
                    Select a Vedio
                    <input type="file" class="form-control" name="coursevedio" required>
                </label>
                <input type="submit" name="formsubmit" value="Update" class="btn btn-primary mt-2 mb-5">
            </form>
            
        </div>
    </div>

    



<?php include_once 'footer.php'; ?>
