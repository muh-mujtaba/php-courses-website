<?php include_once 'header.php';
include 'connection.php';
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

  if(isset($_POST['formsubmit'])){
    $coursename = $_POST['coursename'];
    $coursedisc = $_POST['coursedisc'];
    $courseprice = $_POST['courseprice'];
    $file = $_FILES['courseimage'];
    $file_name = $file['name'];
    $file_type = $file['type'];
    $temp_name = $file['tmp_name'];
    $file_size = $file['size'];
    $fileext = explode('.',$file_name);
    $filecheck = strtolower(end($fileext));
    $fileextstored = array('jpg','jpeg');
    if(in_array($filecheck,$fileextstored)){
    $file_destination = "uploadimage/".$file_name;
    if(move_uploaded_file($temp_name,$file_destination)){
        $sql1 = "INSERT INTO subject (s_name,s_disc,s_price,s_img) VALUES ('$coursename','$coursedisc','$courseprice','$file_name')";
    $result1 = mysqli_query($conn, $sql1) or die("query failed update");
    header("LOCATION: dash.php");
    }
}else{
    echo '<div class="alert alert-danger" role="alert">
        please upload image in jpg or jpeg format!
      </div>';
}
  }
?>

<div class="container-fluid mb-5 mt-5">
    <div class="row">
        <div class="col-md-6 offset-3">
            <center>
                <h3>Add Course</h3>
            </center>
            <form action="<?php $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
                <label for="" class="w-100">
                    Course Name
                    <input type="text" value="" class="form-control" name="coursename" placeholder="Enter Your Name">
                </label>
                <label for="" class="w-100">
                    Course Discription
                    <input type="text" value="" class="form-control" name="coursedisc" placeholder="Description">
                </label>
                <label for="" class="w-100">
                    Price
                    <input type="number" value="" class="form-control" name="courseprice" placeholder="Price">
                </label>
                <label for="" class="w-100">
                    Image
                    <input type="file" class="form-control" name="courseimage" required>
                </label>
                <input type="submit" name="formsubmit" class="btn btn-primary mt-2 mb-4" value="Add">
            </form>
        </div>
    </div>
    
</div>

<?php include_once 'footer.php'; ?>