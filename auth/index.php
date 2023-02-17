<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-md-6 offset-3">
            <center>
                <h3>Login</h3>
            </center>
            <?php
            if(isset($_POST['formsubmit'])){
  include 'connection.php';
  $useremail = $_POST['useremail'];
  $userpassword = $_POST['userpassword'];
  $sql = "select * from signup where user_email = '{$useremail}'";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result)>0){
    $row = mysqli_fetch_assoc($result);
    $hashed_password = $row['user_pass'];
      if(password_verify($userpassword, $hashed_password)){ 

        session_start();
        
        $_SESSION['$username'] = $row['user_name'];
        $_SESSION['$useremail'] = $row['user_email'];
        $_SESSION['$userid'] = $row['user_id'];
        $_SESSION['$status'] = $row['status'];
          if($row['status'] == 'admin'){
            header("LOCATION: /courses/dash.php");
          }else{
            header("LOCATION: /courses/index.php");
          }

    }
    else{
      echo '<div class="alert alert-danger" role="alert">
        Incorrect email and password!
      </div>';
    }
  }else{
    echo '<div class="alert alert-danger" role="alert">
        Incorrect email and password!
      </div>';
}
            }
  ?>
            <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
                <label for="" class="w-100">
                    Enter Useremail
                    <input type="email" class="form-control" name="useremail" placeholder="Enter Useremail" required>
                </label>
                <label for="" class="w-100">
                    Enter Your Password
                    <input type="password" class="form-control" name="userpassword" placeholder="Enter Your Password" required>
                </label>
                <input type="submit" name="formsubmit" value="Login" class="btn btn-primary mt-2 mb-2">
            </form>
            <p><a href="forgot.php">Forgot Password</a></p>
            <p>if not registered,<a href="signup.php">get register</a></p>
            <?php
include_once 'google_login.php';
?>
        </div>
    </div>
