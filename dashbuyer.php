<?php include_once 'header.php';
//session_start();
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
include 'headdash.php';
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 offset-3 mt-5 mb-5">
            <center>
                <h3>Dashboard</h3>
                <p class="text-uppercase">HI <?php echo $_SESSION['$username'] ?></p>
                <!-- <a href="auth/logout.php">Logout</a>
                <a href="auth/profile.php">Profile</a> -->
                
            </center>
            
        </div>
    </div>
    <div class="row">
    <div class="col-9">
    <table class="table mt-5 mb-5">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">CARD NUMBER</th>
      <th scope="col">CARD NAME</th>
      <th scope="col">CVV</th>
      <th scope="col">EMAIL</th>
      <th scope="col">COUNTRY</th>
      <th scope="col">EXPIRY DATE</th>
      <!-- <th scope="col">EDIT</th> -->
      <th scope="col">DELETE</th>
    </tr>
  </thead>
  <tbody>
  
    <?php
  include 'connection.php';
  $limit = 5;
  if(isset($_GET['page'])){
      $page = $_GET['page'];
   }else{
       $page = 1;
   }
   $offset = ($page - 1) * $limit;
   $admin ="admin";
  $sql = "select * from bank LEFT JOIN signup ON bank.user_id = signup.user_id LEFT JOIN contries ON bank.ct_id = contries.ct_id  order by bank.id desc limit {$offset},{$limit} ";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result)>0){
      while($rows = mysqli_fetch_assoc($result)){
          echo "<tr>";
          echo "<th>$rows[id]</th>";
          echo "<td>$rows[card_id]</td>";
          echo "<td>$rows[card_name]</td>";
          echo "<td>$rows[cvv]</td>";
          echo "<td>$rows[user_email]</td>";
          echo "<td>$rows[ct_name]</td>";
          echo "<td>$rows[expiry_date]</td>";
        //   echo "<td><a href='edit.php?user=$rows[id]'><i class='fa fa-edit'></i></a></td>";
          echo "<td><a href='deletebuy.php?user=$rows[id]'><i class='fa fa-trash-o'></i></a></td>";
          echo "</tr>";
      }
  }
  
  ?>
    

  </tbody>
</table>


</div>
    </div>
    <?php
$sql1 = "select * from bank";
$result1 = mysqli_query($conn, $sql1);
$total_record = mysqli_num_rows($result1);
$limit = 5;
$total_page = ceil($total_record/$limit);
echo "<ul class='pagination'>";
if($page>1){
  echo '<li><a href="dashbuyer.php?page='.($page - 1).'">Prev</a></li>';
}
for($i = 1; $i<=$total_page; $i++){
  if($i == $page){
    $active = "active";
}
else{
    $active = "";
}
  echo '<li><a class="'.$active.'" href="dashbuyer.php?page='.$i.'">'.$i.'</a></li>';
}
if($total_page > $page){
  echo '<li><a href="dashbuyer.php?page='.($page + 1).'">Next</a></li>';
}
echo " </ul>";
?>
</div>




<?php include_once 'footer.php'; ?>