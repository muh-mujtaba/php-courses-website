<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- font family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Mulish:wght@200;300;500;600;700&display=swap" rel="stylesheet">

<!-- fontawesome -->
<script src="https://kit.fontawesome.com/fe6e3dccf7.js" crossorigin="anonymous"></script>
<!-- stylesheet -->
    <link rel="stylesheet" href="./assets/css/style.css">
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="./assets/img/fav.png">
    <title>Education</title>
</head>
<body>

<?php include_once 'header.php';
//session_start();
// if(!isset($_SESSION['$username'])){
//   header("LOCATION: auth/index.php");
// }
?>
    <div class="overflow" >
    <section class="head">
        
        <div class="hero">
            <div class="hero_inside">
                <h1>Online Learning <br> Platform </h1>
                <p>Build skills with courses, certificates, and degrees online from world-class universities and companies</p>
                <a href="courses.php"><button class="css-button css-button-sliding-to-right css-button-sliding-to-left--black">Join Us</button></a>
            </div>
        </div>
    </section>

<!-- ============================== -->

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
                    
                    for($i=1;$i<=3;$i++){
                        $row = mysqli_fetch_assoc($result);
                   
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
<!-- ======================= -->
      <!-- static data -->
    <!-- <div class="featured">
        <div class="featured_head">
            <h4>Our featured courses</h4>
        </div>
        <div class="featured_card">
            <div class="featured_card_inside">
                <img src="./assets/img/xfeatured1.png.pagespeed.ic.W3ZqHn6gqT.webp" alt="course image">
                <p>User Experience</p>
                <a href="">Fundamental of UX for Application</a>
                <p>The automated process all your website tasks. Discover tools and techniques to engage effectively with vulnerable children and young people.</p>
                <div>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star-half-stroke"></i>
                </div>
                <div class="featured_card_inside_order">
                    <div class="featured_card_inside_order_review"><p><span>(4.5)</span> based on 120</p></div>
                    <p id="price">$135</p>
                </div>
                <div class="featured_card_inside_btn">
                    <a href="courses.php"><button class="css-button-sliding-to-bottom--black">Find Out More</button></a>
                </div>
                
            </div>
            <div class="featured_card_inside">
                <img src="./assets/img/xfeatured2.png.pagespeed.ic.Miyo7rIRaW.webp" alt="course image">
                <p>User Experience</p>
                <a href="">Fundamental of Web Programming</a>
                <p>The automated process all your website tasks. Discover tools and techniques to engage effectively with vulnerable children and young people.</p>
                <div>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star-half-stroke"></i>
                </div>
                <div class="featured_card_inside_order">
                    <div class="featured_card_inside_order_review"><p><span>(4.5)</span> based on 120</p></div>
                    <p id="price">$120</p>
                </div>
                <div class="featured_card_inside_btn">
                    <a href="courses.php"><button class="css-button-sliding-to-bottom--black">Find Out More</button></a>
                </div>
                
            </div>
            <div class="featured_card_inside">
                <img src="./assets/img/xfeatured3.png.pagespeed.ic.hYf7aL-I4_.webp" alt="course image">
                <p>User Experience</p>
                <a href="">Artificial Intellegence</a>
                <p>The automated process all your website tasks. Discover tools and techniques to engage effectively with vulnerable children and young people.</p>
                <div>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star-half-stroke"></i>
                </div>
                <div class="featured_card_inside_order">
                    <div class="featured_card_inside_order_review"><p><span>(4.5)</span> based on 120</p></div>
                    <p id="price">$199</p>
                </div>
                <div class="featured_card_inside_btn">
                    <a href="courses.php"><button class="css-button-sliding-to-bottom--black">Find Out More</button></a>
                </div>
                
            </div>
        </div>
    </div> -->

    <div class="skills">

        <div class="skills_head">
            <img src="./assets/img/about.svg" alt="">
        </div>

        <div class="skills_container">

            <div class="left_skills">
                <h2>Learn new skills online with top educators</h2>
                <p>The automated process all your website tasks. Discover tools and techniques to engage effectively with vulnerable children and young people.</p>
                <div class="left_skills_points">
                    <img src="./assets/img/right-icon.svg" alt="">
                    <p>Techniques to engage effectively with vulnerable children and young people</p>
                </div>
                <div class="left_skills_points">
                    <img src="./assets/img/right-icon.svg" alt="">
                    <p>Join millions of people from around the world learning together.</p>
                </div>
                <div class="left_skills_points">
                    <img src="./assets/img/right-icon.svg" alt="">
                    <p>Join millions of people from around the world learning together. Online learning is as easy and natural.</p>
                </div>
        </div>

            <div class="right_skills">
                <a href="https://www.youtube.com/watch?v=rfscVS0vtbw&ab_channel=freeCodeCamp.org" target="_blank">
                <i class="fa-solid fa-circle-play"></i></a>
            </div>

        </div>

    </div>

    <div class="outcomes">

        <div class="left_outcomes">
            <img src="./assets/img/xabout3.png.pagespeed.ic.nc8f2vikQH.webp" alt="">
        </div>

        <div class="right_outcomes">
            <h2>Learner outcomes on courses you will take</h2>
            <div class="right_outcomes_points">
                <img src="./assets/img/right-icon.svg" alt="">
                <p>Techniques to engage effectively with vulnerable children and young people</p>
            </div>
            <div class="right_outcomes_points">
                <img src="./assets/img/right-icon.svg" alt="">
                <p>Join millions of people from around the world learning together.</p>
            </div>
            <div class="right_outcomes_points">
                <img src="./assets/img/right-icon.svg" alt="">
                <p>Join millions of people from around the world learning together. Online learning is as easy and natural.</p>
            </div>
    </div>
        
    </div>

    <div class="community">
        <div class="community_head">
            <h4>Community experts</h4>
        </div>
        <div class="community_container">
            <div>
                <img src="./assets/img/xteam1.png.pagespeed.ic.J3CG9reTvh.webp" alt="">
                <h4>Mr. Urela</h4>
                <p>The automated process all your website tasks.</p>
            </div>

            <div>
                <img src="./assets/img/xteam2.png.pagespeed.ic.JeCc9cCrWh.webp" alt="">
                <h4>Mr. Urela</h4>
                <p>The automated process all your website tasks.</p>
            </div>
            <div>
                <img src="./assets/img/xteam3.png.pagespeed.ic.3liGjBrsrd.webp" alt="">
                <h4>Mr. Urela</h4>
                <p>The automated process all your website tasks.</p>
            </div>

        </div>
    </div>

    <div class="join">
        <div class="join_left">
            <img src="./assets/img/xabout2.png.pagespeed.ic.N3ytPGt7yu.webp" alt="">
        </div>
        <div class="join_right">
            <h4>Take the next step toward your personal and professional goals with us.</h4>
            <p>The automated process all your website tasks. Discover tools and techniques to engage effectively with vulnerable children and young people.</p>
            <a href="courses.php"><button class="css-button-sliding-to-bottom--black">Join Now</button></a>

        </div>
    </div>

    </section>

</div>
</body>
</html>

<?php include_once 'footer.php'; ?>