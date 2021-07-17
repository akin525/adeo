<?php include ("menu2.php");

if($_SERVER['REQUEST_METHOD'] == 'POST') {
// Collect the data from post method of form submission //
    $amount = mysqli_real_escape_string($con, $_POST['amount']);
    $number = mysqli_real_escape_string($con, $_POST['number']);

    $status = "OK";
    $msg = "";
    if (!isset($number) or strlen($number) < 11) {
        $msg = $msg . "number Should Contain Minimum 11 CHARACTERS.<br />";
        $status = "NOTOK";
    }
    if ($status == "OK") {

        $suss= "<div class='card'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>Select Payment Method </br></strong></div>";
        //printing error if found in validation
        print "
				<script language='javascript'>
window.location = 'wall.php?amount=".$amount."&number=".$number."';
</script>
";
    }else{
        $errormsg= "<div class='card'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>Please Fix Below Errors : </br></strong>".$msg."</div>"; //printing error if found in validation
    }

}
?>
<section id="breadcrumb-section" class="breadcrumb-section clearfix"
         style="background-image: url(assets/images/breadcrumb-bg.jpg);" xmlns="http://www.w3.org/1999/html">
    <div class="overlay-black">
        <div class="container">
<!--            <h2 class="page-title">Add To Lock Wallet</h2>-->
        </div>
    </div>
</section>
<div class="breadcrumb-list">
    <div class="container">
        <ul>
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <!--                <li class="breadcrumb-item"><a href="shop.html">Shop</a></li>-->
<!--            <li class="breadcrumb-item active">Add To Lock Wallet</li>-->
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


                        <div class="row">

                            <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                                <div class="sv_heading_wraper">
                                    <div class="plan_investment_wrapper float_left">
                                        <div class="row">
                                            <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                                                <div class="sv_heading_wraper">


                                                    <!--  profile wrapper start -->
                                                    <div class="payment_transfer_Wrapper float_left">
                                                        <div class="row">
                                                            <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                                                                <div class="sv_heading_wraper heading_center">
<!--                                                                    <h3>Add to Safe Lock</h3>-->

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12 col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-sm-12 col-12">
                                                                <div class="change_password_wrapper float_left">
                                                                    <div class="change_pass_field float_left">
                                                                        <div class="payment_gateway_wrapper payment_select_wrapper">
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

                                                                            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"], ENT_QUOTES, "utf-8"); ?>"method="post">

                                                                                <!--                                        <label>Select Payment Mode :</label>-->
                                                                                <!--                                        <select name="action" id="action">-->
                                                                                <!--                                            <option selected>choose gateway</option>-->
                                                                                <!--                                            <option value="1">Wallet</option>-->
                                                                                <!--                                            <option value="2">Atm Card</option>-->
                                                                                <!--                                        </select>-->
                                                                        </div>
                                                                        <div class="change_field">
                                                                            <label>Amount To Add :</label>
                                                                            <input type="tel" name="amount" required />
                                                                        </div
                                                                        <div class="change_field">
                                                                            <label>Phone Number:</label>
                                                                            <input type="tel"  name="number" required/>
                                                                        </div>
                                                                        <button type="submit" class="btn btn-outline-primary btn-rounded"><i class="fa fa-check"></i> Continue</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
                                                    <?php include ("footer.php"); ?>