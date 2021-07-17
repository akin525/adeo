<?php session_start(); include("menubar.php"); ?>

<!-- preloader area end -->


<?php
include_once ("include/database.php");
if (isset($_SESSION['email'])) {

}
$sql="SELECT maintain FROM  settings WHERE sno=0";
if ($result = mysqli_query($con, $sql)) {

    /* fetch associative array */
    while ($row = mysqli_fetch_row($result)) {
        $main= $row[0];
    }
    if($main==2 || $main==3)
    {
        print "<script language='javascript'>window.location = '404.php';</script>";
    }

}


if($_SERVER['REQUEST_METHOD'] == 'POST') {

// Collect the data from post method of form submission //
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $password = md5($password);

    $query = "select * from users where email='$email' and password='$password'";
    $result = mysqli_query($con,$query);
    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row
    if($count == 1) {
        $result = mysqli_query($con,$query);

        while($row = mysqli_fetch_array($result))
        {
            $status=$row['status'];
        }

        if($status ==0){
            $errormsg= "<div class='alert alert-danger'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>You have been banned from accessing this portal </br></strong></div>"; //printing error if found in validation
        }else{
            $_SESSION['email'] = $email;
            $_SESSION['login_user']=$email;
            print "
                    <script language='javascript'>
                    
                    let message = 'Login Successful';
                                    alert(message);
                        window.location = 'dashboard.php';
                    </script>
                    ";
        }
    }else {
        $errormsg= "<div class='alert alert-danger'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>Incorrect login details </br></strong></div>"; //printing error if found in validation
    }

}

?>

<section id="register-section" class="register-section sec-ptb-100 bg-offwhite clearfix">
    <div class="container">

        <div class="row justify-content-lg-center justify-content-md-center">
            <div class="col-lg-6 col-md-6">
                <div class="login-form">
                    <h3 class="title-medium mb-15">Login from here</h3>
                    <center><?php
                        if(!empty($errormsg))
                        {
                            print $errormsg;

                        }
                        ?>
                    </center>
                    <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"], ENT_QUOTES, "utf-8"); ?>" method="post">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-md-12">
                                <div class="input-item">
                                    <input type="email" name="email" placeholder="Your Email" required/>
                                    <label><i class="ion-ios-email-outline"></i></label>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-md-12">
                                <div class="input-item">
                                    <input type="password" name="password" placeholder="Your Password" required/>
                                    <label><i class="ion-locked"></i></label>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-md-12">
                                <button type="submit" class="custom-btn waves-effect">
                                    Log In
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
