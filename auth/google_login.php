<?php
require 'google_connection.php';

if(isset($_SESSION['login_id'])){
    header('Location: /courses/index.php');
    exit;
}

require 'google-api/vendor/autoload.php';

// Creating new google client instance
$client = new Google_Client();

// Enter your Client ID
$client->setClientId('');
// Enter your Client Secrect
$client->setClientSecret('');
// Enter the Redirect URL
$client->setRedirectUri('http://localhost/courses/auth/index.php');

// Adding those scopes which we want to get (email & profile Information)
$client->addScope("email");
$client->addScope("profile");


if(isset($_GET['code'])):

    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

    if(!isset($token["error"])){

        $client->setAccessToken($token['access_token']);

        // getting profile information
        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();
    
        // Storing data into database
        $id = mysqli_real_escape_string($google_connection, $google_account_info->id);
        $full_name = mysqli_real_escape_string($google_connection, trim($google_account_info->name));
        $email = mysqli_real_escape_string($google_connection, $google_account_info->email);
        $profile_pic = mysqli_real_escape_string($google_connection, $google_account_info->picture);

        // checking user already exists or not
        $get_user = mysqli_query($google_connection, "SELECT * FROM `google` WHERE `google_id`='$id'");
        if(mysqli_num_rows($get_user) > 0){
            $get_result = mysqli_fetch_assoc($get_user);
            $_SESSION['login_id'] = $id;
            $_SESSION['$userid'] = $get_result['google_id'];
            header('Location: /courses/index.php');
            exit;

        }
        else{

            // if user not exists we will insert the user
            $insert = mysqli_query($google_connection, "INSERT INTO `google`(`google_id`,`name`,`email`,`profile_image`) VALUES('$id','$full_name','$email','$profile_pic')");

            if($insert){
                $_SESSION['login_id'] = $id; 
                $get_user1 = mysqli_query($google_connection, "SELECT * FROM `google` WHERE `google_id`='$id'");
                $get_result1 = mysqli_fetch_assoc($get_user1);
                $_SESSION['$userid'] = $get_result1['google_id'];
                //$_SESSION['$username'] = $full_name;
                header('Location: /courses/index.php');
                exit;
            }
            else{
                echo "Sign up failed!(Something went wrong).";
            }

        }

    }
    else{
        header('Location: index.php');
        exit;
    }
    
else: 
    // Google Login Url = $client->createAuthUrl(); 
?>

    <!-- <a class="login-btn" href="<?php echo $client->createAuthUrl(); ?>">Login</a> -->

    <div class="container-fluid">
    <div class="row">
                                <div class="col-md-12 offset-3">
                                  <a class="border border-secondary btn btn-lg btn-google btn-block  btn-outline" href="<?php echo $client->createAuthUrl(); ?>"><img src="https://img.icons8.com/color/16/000000/google-logo.png"> Signup Using Google</a>

                                </div>
                            </div>
    </div>

<?php endif; ?>