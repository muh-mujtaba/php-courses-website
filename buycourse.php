<?php
include 'connection.php';
$sid = $_GET['id'];

include 'header.php';
if(!isset($_SESSION['$userid'])){
    header("LOCATION: /courses/auth/index.php");
  }

  if(isset($_POST['formsubmit'])){
    
    
    $card_name = $_POST['card_name'];
    $card_id = $_POST['card_id'];
    $exp_date = $_POST['exp_date'];
    $cvv = $_POST['cvv'];
    $country = $_POST['country'];
    session_start();
    $user_id = $_SESSION['$userid'];
   // echo $user_id;
    $sql = "INSERT INTO bank(card_id, card_name, cvv, ct_id, expiry_date,user_id,s_id) VALUES ('$card_id','$card_name','$cvv','$country','$exp_date','$user_id','$sid')";
    $result = mysqli_query($conn,$sql);
    if ($result) {
        header('LOCATION: enroll.php');
    } else {
        echo mysqli_error($conn);
    }
    
  }
?>

<!DOCTYPE html>
<html lang="en">

<body>
    <section>

        <div class="course_container">

        <div class="course_container_data">
            <div class="course_container_data_heading">
                <h1>Get a course</h1>  
                </div>  

                <div class="course_container_data_back">
                    <p><a href="">Home</a></p>
                    <p>|</p>
                    <p><a href="">course</a></p>
                </div>

        </div>

    </div>

    </section>

    <section>

        <div class="contact">

            <div class="contact_head">
                <h4>Fill The Form</h4>
            </div>

            <div class="contact_data">
                <div class="left_contact_data">
                    <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
                        <div class="left_contact_data_user">
                        <input type="text" name="card_name" placeholder="Enter Your Card Name" Required>
                        <input type="text" name="card_id" placeholder="Enter Your Card Number" Required>
                        <!-- <input type="email" placeholder="Email"> -->
                    </div>
                    <div class="left_contact_data_user">
                        
                        <input type="date" name="exp_date" Required>
                        <input type="text" name="cvv" placeholder="CVV" Required>
                    </div>
                    
                    <select name="country" id="" class="buy-select" Required>
                        <option value="" disabled selected >select a country</option>
                        <?php
                    $select = "select * from contries";
                    $countries = mysqli_query($conn,$select);
                    while($row1 = mysqli_fetch_assoc($countries)){
                    ?>
                        <option value="<?php echo $row1['ct_id'];?>"><?php echo $row1['ct_name'];?></option>
                        <?php
                    }
                    ?>
                    </select>
                    
                        <a><button type="submit" name="formsubmit" class="css-button css-button-sliding-to-right css-button-sliding-to-left--black">Submit</button></a>
                    </form>
                </div>
                <div class="buy-right_contact_data">

                <?php
                $sql = "select *from subject where s_id = '{$sid}'";
                $result = mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){

                   
                ?>
                <div class="buy-featured_card_inside">
                    <a href=""><?php echo $row['s_name']?></a>
                    <p><?php echo $row['s_disc']?></p>
                    <div>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <div class="buy-featured_card_inside_order">
                        <div class="buy-featured_card_inside_order_review"><p>Total Cost</p></div>
                        <p id="price">$<?php echo $row['s_price']?></p>
                    </div>
                    
                    
                </div>
                   
<?php
}
}
?>

                </div>
            </div>

        </div>

    </section>


</body>
</html>
<?php
include 'footer.php';
?>