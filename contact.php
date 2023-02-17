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
                <h1>Contact Us</h1>  
                </div>  

                <div class="course_container_data_back">
                    <p><a href="">Home</a></p>
                    <p>|</p>
                    <p><a href="">Contact</a></p>
                </div>

        </div>

    </div>

    </section>

    <section>

        <!-- <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4263.963950743067!2d73.06650456161714!3d31.418224078186867!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x392243450c1147b7%3A0x7a1253803d90ccb9!2sCareer%20Institute%20-%20Jinnah%20Colony%20Campus%20(CIFSD02)!5e0!3m2!1sen!2s!4v1649541973126!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div> -->

        <div class="contact">
        <?php
                    if(isset($_POST['contact'])){
                        echo '<div class="alert alert-success" role="alert">
  We got your message
</div>';

                    }
                    ?>
            <div class="contact_head">
                <h4>Get in Touch</h4>
            </div>

            <div class="contact_data">
                <div class="left_contact_data">
                    <form action="<?php $_SERVER['PHP_SELF']?>" method="post" required>
                    <div class="left_contact_data_user">
                        <input type="text" name="username" placeholder="Enter Your Name" required>
                        <input type="email" name="useremail" placeholder="Email" required>
                    </div>
                    <input type="text" name="usersubject" placeholder="Enter Subject" required>
                        <textarea style="margin-top:5px;" name="usermessage" id="" cols="80" rows="7" placeholder="Enter Message" required></textarea>
                        <a href="#"><button type="submit" name="contact" class="css-button css-button-sliding-to-right css-button-sliding-to-left--black">Contact Us</button></a>
                    </form>
                   
                </div>
                <div class="right_contact_data">

                    <div>
                        <div class="right_contact_data_left"><i class="fa-solid fa-house"></i></div>
                        <div class="right_contact_data_right">
                            <p>Career Institute</p>
                            <p class="right_contact_data_right_bt">Jinnah Colony</p>
                        </div>
                    </div>
                    <div>
                        <div class="right_contact_data_left"><i class="fa-solid fa-phone-office"></i></div>
                        <div class="right_contact_data_right">
                            <p>+1 253 565 2365</p>
                            <p class="right_contact_data_right_bt">Mon to Fri 9am to 6pm</p>
                        </div>
                    </div>
                    <div>
                        <div class="right_contact_data_left"><i class="fa-solid fa-envelope"></i></div>
                        <div class="right_contact_data_right">
                            <p>support@careerinstitute.com</p>
                            <p class="right_contact_data_right_bt">Send us your query anytime!</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </section>


</body>
</html>
<?php
include 'footer.php';
?>