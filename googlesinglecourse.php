<?php
include 'header.php';
if(!isset($_SESSION['$userid'])){
    header("LOCATION: /courses/auth/index.php");
  }

?>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
      <?php
      $sql2 = "select *from subject LEFT JOIN bank ON subject.s_id = bank.s_id
      LEFT JOIN google ON bank.user_id = google.google_id 
      where google.google_id = '{$userid}'";
      $result2 = mysqli_query($conn,$sql2);
      if(mysqli_num_rows($result2)>0){
      while($row2 = mysqli_fetch_assoc($result2)){  
      ?>
        <a class="nav-link" href="singlecourse.php?course=<?php echo $row2['s_id'];?>" value="<?php echo $row2['s_id'];?>"><?php echo $row2['s_name'];?></a>
      </li>
      <?php
      }
    }
      ?>
    </ul>
  </div>
</nav>
<?php
 // session_start();
 $course = $_GET['course'];
  $userid = $_SESSION['$userid'];
  $sql1 = "SELECT * FROM bank
                    LEFT JOIN google ON bank.user_id = google.google_id where google.google_id  = '{$userid}'";
                    $result1 = mysqli_query($conn,$sql1);
                    //$row1 = mysqli_fetch_assoc($result1);
                    if(mysqli_num_rows($result1) == 0){
                      header("LOCATION: index.php");
                    }
              $sql = "select * from vedio 
              where vedio.s_id = '{$course}'";
              $result = mysqli_query($conn,$sql);
              if(mysqli_num_rows($result)>0){
              while($row = mysqli_fetch_assoc($result)){    
?>

<video width="320" height="240" controls>
  <source src="<?php  echo "upload/".$row['v_name'];?>" type="video/mp4">
</video>
<?php
              }
            }
?>
<?php
include 'footer.php';
?>