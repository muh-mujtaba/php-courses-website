<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- font family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Mulish:wght@200;300;500;600;700&display=swap" rel="stylesheet">


<!-- stylesheet -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="./assets/img/fav.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Education</title>
</head>
<body>

<?php
                    include 'connection.php';
                    include 'google_connection.php';                    
                   // session_start();
                    if(isset($_SESSION['$userid'])){
                    $userid = $_SESSION['$userid'];
                    }
                    ?>
    <nav class="navbar navbar-expand-lg navbar-light custom-nav">
        <div class="container-fluid inside-nav">
            <a class="navbar-brand text-white" href="index.php">COURSES</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                    <li class="nav-item">
                        <a class="nav-link text-white"  href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="courses.php">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="contact.php">Contact</a>
                    </li>
                    <?php
                    if(isset($_SESSION['$username'])){
                    $sql = "select * from signup where user_id = '{$userid}'";
                    $result = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_assoc($result);
                    if($row['status']=='admin'){
                        echo "<li class='nav-item'>";
                        echo "<a class='nav-link text-white' href='dash.php'>Dashboard</a>";
                        echo "</li>";
                    }
                    $sql1 = "SELECT * FROM bank
                    LEFT JOIN signup ON bank.user_id = signup.user_id where signup.user_id = '{$userid}'";
                    $result1 = mysqli_query($conn,$sql1);
                   // $row1 = mysqli_fetch_assoc($result1);
                    if(mysqli_num_rows($result1)>0){
                        echo "<li class='nav-item'>";
                        echo "<a class='nav-link text-white' href='enroll.php'>My Course</a>";
                        echo "</li>";
                    }
                   
                }elseif(isset($_SESSION['$userid'])){
                    $sqlg = "SELECT * FROM bank
                    LEFT JOIN google ON bank.user_id = google.google_id where google.google_id = '{$userid}'";
                    $resultg = mysqli_query($conn,$sqlg);
                    if(mysqli_num_rows($resultg)>0){
                        echo "<li class='nav-item'>";
                        echo "<a class='nav-link text-white' href='googlenroll.php'>My Course</a>";
                        echo "</li>";
                    }
                }
                    ?>
                    
                </ul>


                
                    <?php
                    if(isset($_SESSION['$username'])){
                     //   include 'connection.php';
                        $sql3 = "select *from userinformation  where user_id = '{$userid}'";
                        $result3 = mysqli_query($conn,$sql3);
                        $row3 = mysqli_fetch_assoc($result3);

                        if(empty($row3['user_img'])){
                        echo '<div class="dropdown">';
  echo '<button class="btn btn-secondary profile" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">';
  echo '<i class="fa-solid fa-user"></i>';
  echo '</button>';
  echo '<ul class="dropdown-menu " aria-labelledby="dropdownMenuButton1">';
      
          echo '<li><a href="profile.php">Profile</a></li>';
          echo '<li><a href="auth/logout.php">Logout</a></li>';
     
  echo '</ul>';
echo '</div>'; 
}
else{
    echo '<div class="dropdown">';
  echo '<button class="btn btn-secondary profile p-0" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">';
  ?>
<img src="<?php echo "auth/profileimage/".$row3['user_img']?>" style="width: 100%;
    height: 3em;
    border-radius: 25px;"; alt="course image">
  <?php
  echo '</button>';
  echo '<ul class="dropdown-menu " aria-labelledby="dropdownMenuButton1">';
      
          echo '<li><a href="profile.php">Profile</a></li>';
          echo '<li><a href="auth/logout.php">Logout</a></li>';
     
  echo '</ul>';
echo '</div>';
}

                        
                    }
                    elseif(isset($_SESSION['login_id'])){
                    include_once 'google_connection.php';
                    $google_id = $_SESSION['login_id'];
                    $sql4 = "select * from google  where google_id = '{$google_id}'";
                    $result4 = mysqli_query($google_connection,$sql4);
                    $row4 = mysqli_fetch_assoc($result4);
                    echo '<div class="dropdown">';
                      echo '<button class="btn btn-secondary profile p-0" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">';
                      ?>
                    <img src="<?php echo $row4['profile_image']; ?>" style="width: 100%;
                        height: 3em;
                        border-radius: 25px;"; alt="course image">
                      <?php
                      echo '</button>';
                      echo '<ul class="dropdown-menu " aria-labelledby="dropdownMenuButton1">';
                          
                            //  echo '<li><a href="auth/profile.php">Profile</a></li>';
                              echo '<li><a href="auth/logout.php">Logout</a></li>';
                         
                      echo '</ul>';
                    echo '</div>';
                    }
                    
                    else{
                        echo '<li style="list-style:none;"><a href="auth/index.php"><button class="css-button css-button-sliding-to-right css-button-sliding-to-left--black">Log In</button></a></li>';        
}
?>

               





            </div>
        </div>
    </nav>
<!-- fontawesome -->
<script src="https://kit.fontawesome.com/fe6e3dccf7.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>