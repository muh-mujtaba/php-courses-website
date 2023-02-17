<?php include_once 'header.php';
if(!isset($_SESSION['$username'])){
    header("LOCATION: index.php");
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
?>

<div class="container-fluid mb-5 mt-5">
    <div class="row">
        <div class="col-md-6 offset-3">
            <center>
                <h3>Edit Data</h3>
            </center>
            <?php
include 'connection.php';
$user_id = $_GET['user'];
$sql = "select *from signup where user_id = $user_id";
$result = mysqli_query($conn, $sql) or die("query failed");
$row = mysqli_fetch_assoc($result);
?>
            <form action="save.php" method="POST">
            <input type="hidden" value="<?php echo $row['user_id']; ?>" class="form-control" name="userid" placeholder="Enter Your Id">
                <label for="" class="w-100">
                    Enter Your Name
                    <input type="text" value="<?php echo $row['user_name']; ?>" class="form-control" name="username" placeholder="Enter Your Name">
                </label>
                <label for="" class="w-100">
                    Enter Your Email
                    <input type="email" value="<?php echo $row['user_email']; ?>" class="form-control" name="useremail" placeholder="Enter Your Email">
                </label>

        <select name="status" id="" class="mt-3 mb-3">
                <option value="user" <?php
                    if(empty($row['status'])){
                        echo ""; 
                }else{
                       
                       if($row['status']=="user"){
                        echo 'selected';
                    }else{
                        echo "";
                    }
                    }
                    ?>>user</option>
                <option value="admin"<?php
                    if(empty($row['status'])){
                        echo ""; 
                }else{
                       
                       if($row['status']=="admin"){
                        echo 'selected';
                    }else{
                        echo "";
                    }
                    }
                    ?>>admin</option>
        </select>
        <br>
                <input type="submit" name="formsubmit" class="btn btn-primary mt-2 mb-4" value="Save">
            </form>
        </div>
    </div>
    
</div>

<?php include_once 'footer.php'; ?>