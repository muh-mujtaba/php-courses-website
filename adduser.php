<?php include_once 'header.php'; ?>

<div class="container-fluid mb-5 mt-5">
    <div class="row">
        <div class="col-md-6 offset-3">
            <center>
                <h3>Add User</h3>
            </center>
            <?php
include 'connection.php';
if(!isset($_SESSION['$username'])){
    header("LOCATION: index.php");
  }
if(isset($_POST['formsubmit'])){
    $name =  $_POST['username'];
    $email =   $_POST['useremail'];
    $pass =  $_POST['userpassword'];
    $status = $_POST['status'];
    $select = "select * from signup where user_email = '{$email}'";
    $result1 = mysqli_query($conn,$select);
    if(mysqli_num_rows($result1)>0){
        echo '<div class="alert alert-success" role="alert">
        Already Taken choose Another!
      </div>';
    }else{
        $sql = "INSERT INTO signup (user_name,user_email,user_pass,status) VALUES ('$name','$email','$pass','$status')";
        $result = mysqli_query($conn, $sql) or die("query failed");
        header("LOCATION: dash.php");
        }
    }
?>
            <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
            
                <label for="" class="w-100">
                    Enter Your Name
                    <input type="text" value="" class="form-control" name="username" placeholder="Enter Your Name" required>
                </label>
                <label for="" class="w-100">
                    Enter Your Email
                    <input type="email" value="" class="form-control" name="useremail" placeholder="Enter Your Email" required>
                </label>
                <label for="" class="w-100">
                    Enter Your Password
                    <input type="password" value="" class="form-control" name="userpassword" placeholder="Enter Your Password" required>
                </label>

        <select name="status" id="" class="mt-3 mb-3" >
                <option value="user">user</option>
                <option value="admin">admin</option>
        </select>
        <br>
                <input type="submit" name="formsubmit" class="btn btn-primary mt-2 mb-4" value="Add User">
            </form>
        </div>
    </div>
    
</div>

<?php include_once 'footer.php'; ?>