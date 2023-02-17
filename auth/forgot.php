<?PHP
include_once 'connection.php';
if (isset($_POST['formsubmit'])) {
    $email =   $_POST['useremail'];
    $pass =  $_POST['userpassword'];
    $select = "select * from signup where user_email = '{$email}'";
    $result1 = mysqli_query($conn,$select);
    if(mysqli_num_rows($result1)>0){
        $update = "update signup  set user_pass = '{$pass}' where user_email = '{$email}'";
        $result2 = mysqli_query($conn,$update);
        if($result1){
            echo '<div class="alert alert-success" role="alert">
            Password Changed! Check mail to verify
          </div>';
          header('LOCATION: index.php');
        }
    }else{
        echo '<div class="alert alert-danger" role="alert">
        Enter Correct Email
      </div>';
}
}

?>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 offset-3 mt-5">
            <center>
                <h3>Forgot Password</h3>
            </center>
            <form action="<?php $_SERVER['PHP_SELF']?>" method="POST" class="mb-5">
                <label for="" class="w-100">
                    Enter Your Email
                    <input type="email" class="form-control" name="useremail" placeholder="Enter Your Email" required>
                </label>
                <label for="" class="w-100">
                    Enter New Password
                    <input type="password" class="form-control" name="userpassword" placeholder="Enter Your Password" required>
                </label>
                                
                <input type="submit" name="formsubmit" class="btn btn-primary mt-2">
            </form>
        </div>
    </div>
</div>
