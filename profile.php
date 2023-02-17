<?php
include "header.php";
if(!isset($_SESSION['$username'])){
    header("LOCATION: index.php");
  }

  
if(isset($_POST['formsubmit'])){
    include 'connection.php';
    $userid = $_SESSION['$userid'];
    $username = $_POST['username'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];

    $file = $_FILES['userimage'];
    $file_name = $file['name'];
    $file_type = $file['type'];
    $temp_name = $file['tmp_name'];
    $file_size = $file['size'];
    $fileext = explode('.',$file_name);
        $filecheck = strtolower(end($fileext));
        $fileextstored = array('jpg','jpeg');

    $sql = "select *from userinformation where user_id = '{$userid}'";
    $result1 = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result1)>0){
        
        if(in_array($filecheck,$fileextstored)){
            $file_destination = "auth/profileimage/".$file_name;
        if(move_uploaded_file($temp_name,$file_destination)){
        $update = "update  userinformation set gender = '{$gender}',address = '{$address}',user_img = '{$file_name}' where user_id = '{$userid}'";
    $result2 = mysqli_query($conn, $update);
    header("LOCATION: index.php");
}}
    else{
        echo '<div class="alert alert-danger" role="alert">
            please upload image in jpg or jpeg format!
          </div>';
    }
    }else{
       
        if(in_array($filecheck,$fileextstored)){
            $file_destination = "auth/profileimage/".$file_name;
        if(move_uploaded_file($temp_name,$file_destination)){
        $insert = "insert into userinformation (gender,address,user_id,user_img) values ('$gender','$address','$userid','$file_name')";
    $result3 = mysqli_query($conn, $insert);
    header("LOCATION: index.php");
}}else{
        echo '<div class="alert alert-danger" role="alert">
            please upload image in jpg or jpeg format!
          </div>';
    }
    }


    $sql1 = "select *from signup where user_id = '{$userid}'";
    $result4 = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_assoc($result4);
    // if($row['user_name'] == ""){
    //     $insert1 = "insert into signup (user_name) values ('$username') where user_id = '{$userid}'";
    // $result5 = mysqli_query($conn, $insert1);
    // }else{
        $update1 = "update  signup set user_name = '{$username}' where user_id = '{$userid}'";
    $result2 = mysqli_query($conn, $update1);
    //}
    
}
?>
<style>
.gender{
    display: flex;
    justify-content: left;
}
.gender input{
    border: 0px;
    width: 5%;
    height: 1.4em;
}
</style>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 offset-3 mt-5">
            <center>
                <h3>Profile</h3>
            </center>
            <?php
            include "connection.php";
           
           // session_start();
            $user_id = $_SESSION['$userid'];
            ?>
            <form action="<?php $_SERVER['PHP_SELF']?>" method="POST" class="mb-5" enctype="multipart/form-data">
           
                <label for="" class="w-100">
                    Image
                    <input type="file" class="form-control" name="userimage" required>
                </label>
                <label for="" class="w-100 mb-2">
                    Enter Your Userame
                    <input type="text" class="form-control" name="username" value="<?php echo $_SESSION['$username'] ?>" placeholder="Enter Your userame">
                </label>
                <br>
                <?php
                $sql = "SELECT * FROM userinformation
                LEFT JOIN signup ON userinformation.user_id = signup.user_id
                WHERE signup.user_id = {$user_id}";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($result); 
                // echo $row['gender'];
                // echo $row['address'];
                ?>
               Gender <label for="" class="w-100 gender  mb-2">
                    Male: <input type="radio" class="" name="gender" value="male" <?php
                    if(empty($row['gender'])){
                        echo ""; 
                }else{
                       
                       if($row['gender']=="male"){
                        echo 'checked';
                    }else{
                        echo "";
                    }
                    }
                    ?> >
                   Female: <input type="radio" class="" name="gender" value="female" <?php
                   if(empty($row['gender'])){
                    echo "";
                }else{
                    if($row['gender']=="female"){
                        echo 'checked';
                    }else{
                        echo "";
                    }
                        
                    }
                    ?> >
                </label>
                
                <div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Enter your Address</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" name="address" rows="3"><?php
if(mysqli_num_rows($result) > 0){
    echo $row['address']; 
}
else{
    echo ""; 
}
   ?></textarea>
</div>
                
                <input type="submit" value="Update" name="formsubmit" class="btn btn-primary mt-2">
            </form>
        </div>
    </div>
</div>

<?php
include "footer.php";
?>
