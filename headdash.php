<?php
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
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="dash.php">All Users</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="dashadmin.php">Admins</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="dashbuyer.php">Buyers</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="uploadvedio.php">Upload Vedio</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="offeredcourse.php">Offered Courses</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="allvedio.php">Uploaded vedio</a>
      </li>
    </ul>
    <li class="nav-item ms-auto me-2" style="list-style:none;">
      <a href="addcourse.php"><button type="button" class="btn btn-primary">Add Course<i class="fa-solid fa-plus adduser"></i></button></a>
      </li>
    <li class="nav-item ms-auto" style="list-style:none;  display: contents;">
      <a href="adduser.php"><button type="button" class="btn btn-primary">Add User<i class="fa-solid fa-plus adduser"></i></button></a>
      </li>
  </div>
</nav>