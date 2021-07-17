<?php include ("menu2.php"); ?>
<section id="breadcrumb-section" class="breadcrumb-section clearfix"
         style="background-image: url(assets/images/breadcrumb-bg.jpg);" xmlns="http://www.w3.org/1999/html">
    <div class="overlay-black">
        <div class="container">
            <h2 class="page-title">Profile</h2>
        </div>
    </div>
</section>
<div class="breadcrumb-list">
    <div class="container">
        <ul>
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <!--                <li class="breadcrumb-item"><a href="shop.html">Shop</a></li>-->
            <li class="breadcrumb-item active">Profile</li>
        </ul>
    </div>
</div>

<?php include ("mu.php"); ?>

<div class="col-xl-9 col-md-8">
    <div class="tab-content pt-0">
        <div class="tab-pane show active" id="user_profile_settings">
            <div class="widget">
                <div class="content-wrapper">
                    <div class="container-fluid">

                        <div class="col-xl-9 col-md-8">
                            <div class="tab-content pt-0">
                                <div class="tab-pane show active" id="user_profile_settings">
                                    <div class="widget">
<!--                                        <h4 class="widget-title">Profile Settings</h4>-->
                                        <?php
                                        if (count($_POST) > 0) {
                                            $result = mysqli_query($con, "SELECT * from users WHERE email='" . $_SESSION["login_user"] . "'");
                                            $row = mysqli_fetch_array($result);
                                            mysqli_query($con, "UPDATE users set `name`='" . $_POST["name"] . "' WHERE email='". $_SESSION["login_user"] . "'");
                                            mysqli_query($con, "UPDATE users set email='" . $_POST["email"] . "' WHERE email='". $_SESSION["login_user"] . "'");
                                            mysqli_query($con, "UPDATE users set phone='" . $_POST["phone"] . "' WHERE email='". $_SESSION["login_user"] . "'");
                                            echo $message = "Profile Update Successfully";
                                            print "
				<script language='javascript'>
				 let message = 'Profile Update Successfully: ';
                                    alert(message);
window.location = 'dashboard.php';
</script>
";
                                        }
                                        ?>
                                        <form action="profiles.php" method="POST">

                                            <?php if(isset($error) != NULL):?>
                                                <p><?php echo $error; ?></p>
                                            <?php endif; ?>
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <h5 class="form-title">Basic Information</h5>
                                                </div>
                                                <div class="form-group col-xl-12">
                                                    <div class="media align-items-center mb-3">
<!--                                                        <img class="user-image" src="assets/img/customer/user-01.jpg" alt="">-->
                                                        <div class="media-body">
                                                            <h5 class="mb-0"><?php echo $name; ?></h5>
<!--                                                            <p>Max file size is 20mb</p>-->
<!--                                                            <div class="jstinput">	<a href="javascript:void(0);" class="avatar-view-btn browsephoto openfile">Browse</a>-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-xl-6">
                                                    <label class="mr-sm-2">Name</label>
                                                    <input class="form-control" type="text" value="<?php echo $name; ?>" name="name" placeholder="" required>
                                                </div>
                                                <div class="form-group col-xl-6">
                                                    <label class="mr-sm-2">Email</label>
                                                    <input class="form-control" type="email" value="<?php echo $email; ?>" name="email" placeholder="" required>
                                                </div>
                                                <div class="form-group col-xl-6">
                                                    <label class="mr-sm-2">Mobile Number</label>
                                                    <input class="form-control no_only" type="text" value="<?php echo $phone; ?>" name="phone" placeholder="" required>
                                                </div>
                                                <div class="form-group col-xl-6">
                                                    <label class="mr-sm-2">Username</label>
                                                    <input type="text" class="form-control datepicker" type="text" name="dob" value="<?php echo $username; ?>"  readonly>
                                                </div>
                                                <!--    <div class="col-xl-12">-->
                                                <!--        <h5 class="form-title">Address</h5>-->
                                                <!--    </div>-->
                                                <!--    <div class="form-group col-xl-12">-->
                                                <!--        <label class="mr-sm-2">Address</label>-->
                                                <!--        <input type="text" class="form-control" name="address" value="">-->
                                                <!--    </div>-->
                                                <div class="form-group col-xl-12">
                                                    <button name="form_submit" id="form_submit" class="btn btn-primary pl-5 pr-5" type="submit">Update</button>
                                                </div>
                                            </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

<?php include ("footer.php"); ?>