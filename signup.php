<?php include ("menubar.php"); ?>
<?php
if(!isset($_SESSION)){
//    session_start();
}
include ("include/database.php");
//    $result = mysqli_query($con,$query);

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username'])) {
    // Collect the data from post method of form submission //
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
//    $password2 = mysqli_real_escape_string($con, $_POST['password2']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    //$refer= mysqli_real_escape_string($con, $_POST['refer']);


    $status = "OK";
    $msg = "";
    if (!isset($username) or strlen($username) < 6) {
        $msg = $msg . "Username Should Contain Minimum 6 CHARACTERS.<br />";
        $status = "NOTOK";
    }

    if (!ctype_alnum($username)) {
        $msg = $msg . "Username Should Contain Alphanumeric Chars Only.<br />";
        $status = "NOTOK";
    }

    $remail = mysqli_query($con, "SELECT COUNT(*) FROM users WHERE email = '$email'");
    $re = mysqli_fetch_row($remail);
    $nremail = $re[0];
    if ($nremail == 1) {
        $msg = $msg  .  "E-Mail Id Already Registered. Please try another one<br />";
        $status = "NOTOK";
    }

    if (strlen($password) < 8) {
        $msg = $msg . "Password Must Be More Than 8 CHARACTERS Length.<br />";
        $status = "NOTOK";
    }

    if (strlen($email) < 1) {
        $msg = $msg . "Please Enter Your Email Id.<br />";
        $status = "NOTOK";
    }
    $sql = "SELECT username FROM users WHERE username='{$username}'";
    $result = mysqli_query($con,$sql) or die("Query unsuccessful") ;
    if (mysqli_num_rows($result) > 0) {
        $msg = $msg . "user id already Registered. please try another one<br />";
        $status = "NOTOK";
    }
    //Test if it is a shared client
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
//Is it a proxy address
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    if ($status == "OK") {
        $passmd=MD5($password);
//echo mysqli_query($con,"insert into `users`(`active`,`username`,`password`,`fname`,`email`,`ipaddress`,`mobile`,`country`) values(1,'$username','$passmd','$name','$email','$ip','$phone','$country')");
        mysqli_query($con, "INSERT INTO `users` ( `email`, `username`, `password`, `name`, `phone`) VALUES ('$email', '$username', '$passmd', '$name','$phone')");
        mysqli_query($con,"insert INTO wallet (username,balance) values('$username',0)");
//mysqli_query($con,"INSERT INTO referal (`username`, `newuserid`, amount) value ('$refer', '$username', 100)");
        $suss= "<div class='card'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>Account Registration successful : </br></strong>A mail has been sent to $email containing your login details for record purpose. Check your spam folder if message is not found in your inbox. $password</div>";
        //printing error if found in validation
        print "
				<script language='javascript'>
				let message = 'Account Registration successful : A mail has been sent to $email containing your login details for record purpose. Check your spam folder if message is not found in your inbox. ';
                                    alert(message);
window.location = 'dashboard.php';
</script>
";
    }else{
        $errormsg= "<div class='card'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>Please Fix Below Errors : </br></strong>".$msg."</div>"; //printing error if found in validation
    }
}
?>

<section id="register-section" class="register-section sec-ptb-100 bg-offwhite clearfix">
    <div class="container">
<div class="signup-form">
    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="signup-image">
                <img src="assets/images/signup-img.jpg" alt="image_not_found">
            </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <h3 class="title-medium clr-white mb-30">Sign Up With a new account</h3>
            <center>
                <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST' && ($status=="NOTOK"))
                {
                    print $errormsg;

                }
                ?>

                <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST' && ($status=="OK"))
                {
                    print $suss;

                }
                ?>
            </center>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"], ENT_QUOTES, "utf-8"); ?>"method="post">
            <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="input-item">
                            <input type="text" name="name" placeholder="Your Complete Name" required/>
                            <label><i class="ion-person"></i></label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="input-item">
                            <input type="email" name="email" placeholder="Your Email" required/>
                            <label><i class="ion-email"></i></label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="input-item">
                            <input type="tel" name="phone" placeholder="Your Phone" required/>
                            <label><i class="ion-android-call"></i></label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="input-item">
                            <input type="password" name="password" placeholder="Your Password" required/>
                            <label><i class="ion-locked"></i></label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="input-item">
                            <input type="text" name="username" placeholder="Username" required/>
                            <label><i class="ion-locked"></i></label>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <button type="submit" class="custom-btn waves-effect">
                            Sign Up Now
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
    </div>
</section>
<?php include ("footer.php"); ?>

