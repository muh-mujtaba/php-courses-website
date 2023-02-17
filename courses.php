<?php
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<body>
    <section>

        <div class="course_container">    

        <div class="course_container_data">
            <div class="course_container_data_heading">
                <h1>Our courses</h1>  
                </div>  

                <div class="course_container_data_back">
                    <p><a href="index.php">Home</a></p>
                    <p>|</p>
                    <p><a href="courses.php">course</a></p>
                </div>

        </div>

    </div>

    </section>

    <section>


        <div class="featured">
            <div class="featured_head">
                <h4>Our courses</h4>
            </div>
            <div class="featured_card">
                <?php
                include 'connection.php';
                $sql = "select *from subject";
                $result = mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){
              
                ?>
                <div class="featured_card_inside">
                    <img src="<?php echo "uploadimage/".$row['s_img']?>" alt="course image">
                    <p>User Experience</p>
                    <a href=""><?php echo $row['s_name']?></a>
                    <p><?php echo $row['s_disc']?></p>
                    <div>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <div class="featured_card_inside_order">
                        <div class="featured_card_inside_order_review"><p><span>(4.5)</span> based on 120</p></div>
                        <p id="price">$<?php echo $row['s_price']?></p>
                    </div>
                    <div class="featured_card_inside_btn">
                        <a href="buycourse.php?id=<?php echo $row['s_id']?>"><button class="css-button-sliding-to-bottom--black">Buy Now</button></a>
                    </div>
                    
                </div>
<?php
 }
}
?>
            </div>
        </div>



    </section>


    

</body>
</html>
<?php
include 'footer.php';
?>