<?PHP
include_once 'connection.php';
if (isset($_POST['formsubmit'])) {
    $name =  $_POST['username'];
    $email =   $_POST['useremail'];
    $pass =  $_POST['userpassword'];
    $hashed_password = password_hash($pass, PASSWORD_DEFAULT);
    $status = $_POST['status'];
    $select = "select * from signup where user_email = '{$email}'";
    $result1 = mysqli_query($conn,$select);
    if(mysqli_num_rows($result1)>0){
        echo '<div class="alert alert-danger" role="alert">
        Already Taken choose Another!
      </div>';
    }else{
    $INSERT = "INSERT INTO signup (user_name,user_email,user_pass,status) VALUES ('$name','$email','$hashed_password','$status')";
    $query = mysqli_query($conn, $INSERT);
    if ($query) {
        header('LOCATION: index.php');
    } else {
        echo mysqli_error($conn);
    }
}
}

?>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 offset-3 mt-5">
            <center>
                <h3>Sign up</h3>
            </center>
            <form action="<?php $_SERVER['PHP_SELF']?>" method="POST" class="mb-5">
                <label for="" class="w-100">
                    Enter Your Name
                    <input type="text" class="form-control" name="username" placeholder="Enter Your Name" required>
                </label>
                <label for="" class="w-100">
                    Enter Your Email
                    <input type="email" class="form-control" name="useremail" placeholder="Enter Your Email" required>
                </label>
                <label for="" class="w-100">
                    Enter Your Password
                    <input type="password" class="form-control" name="userpassword" placeholder="Enter Your Password" required>
                </label>
                
                    <input type="hidden" class="form-control" name="status" value="user">
                
                <input type="submit" name="formsubmit" class="btn btn-primary mt-2">
            </form>
        </div>
    </div>
</div>
