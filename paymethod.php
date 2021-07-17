<?php include ("menu2.php"); ?>
<section id="breadcrumb-section" class="breadcrumb-section clearfix"
         style="background-image: url(assets/images/breadcrumb-bg.jpg);" xmlns="http://www.w3.org/1999/html">
    <div class="overlay-black">
        <div class="container">
            <h2 class="page-title">Transfer Method</h2>
        </div>
    </div>
</section>
<div class="breadcrumb-list">
    <div class="container">
        <ul>
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <!--                <li class="breadcrumb-item"><a href="shop.html">Shop</a></li>-->
            <li class="breadcrumb-item active">Transfer Method</li>
        </ul>
    </div>
</div>

<?php include ("mu.php");


// When form submitted, insert values into the database.
if (isset($_REQUEST['username'])) {
    // removes backslashes
    $username = stripslashes($_REQUEST['username']);
    //escapes special characters in a string
    $username = mysqli_real_escape_string($con, $username);
    $number    = stripslashes($_REQUEST['number']);
    $number   = mysqli_real_escape_string($con, $number);
    $acct = stripslashes($_REQUEST['value']);
    $acct = mysqli_real_escape_string($con, $acct);



//echo mysqli_query($con,"insert into `users`(`active`,`username`,`password`,`fname`,`email`,`ipaddress`,`mobile`,`country`) values(1,'$username','$passmd','$name','$email','$ip','$phone','$country')");
    $query = ("INSERT INTO `banks` (`username`, `bank_name` ,`account_no`) VALUES ('$username', '$acct', '$number')");

    $result   = mysqli_query($con, $query);
    if ($result) {
        echo "
    <div class=payment_transfer_Wrapper float_left>
        <div class=row>
<div class=alert alert-success role=alert>
  <h4 class=alert-heading>Well done!</h4>
  <p>Aww yeah, you successfully Create a new payment Method.</p>
  <hr>
  <p class=mb-0>Click Here To View The Payment Method.<button type=submit class=btn btn-outline-primary btn-rounded><a href=view.php>View Payment Method</a></button>
</p>
</div>
";

//        print "
//                    <script language='javascript'>
//                        window.location = 'my account.php';
//                    </script>
//                    ";

    } else {
        echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='view.php'>registration</a> again.</p>
                  </div>";
    }
} else {

}


?>

<div class="col-xl-9 col-md-8">
    <div class="tab-content pt-0">
        <div class="tab-pane show active" id="user_profile_settings">
            <div class="widget">
                <div class="content-wrapper">
                    <div class="container-fluid">


                        <div class="row">
                            <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                                <div class="sv_heading_wraper heading_center">
                                    <!--                    <div class="card" style="width: 18rem;">-->
                                    <!--                    <div class="card-header">-->
                                    <!--                        Payment Method-->
                                    <!--                    </div>-->
                                    <!--                        --><?php
                                    //                        $code=0;
                                    //                        $nu=0;
                                    //                        $query="SELECT * FROM  banks WHERE username = '".$loggedin_session."'";
                                    //                        $result = mysqli_query($con,$query);
                                    //
                                    //                        while($row = mysqli_fetch_array($result))
                                    //                        {
                                    //                            $user="$row[username]";
                                    //                            $code=$row["bank_name"];
                                    //                            $nu=$row["account_no"];
                                    //
                                    //
                                    //                        If($code=='1'){
                                    //                            echo 'Access Bank';
                                    //                        }
                                    //                        if($code=='050'){
                                    //                            echo 'EcoBank Nigeria PLC';
                                    //                        }
                                    //                        if($code=='3'){
                                    //                            echo 'Fidelity Bank PLC';
                                    //                        }
                                    //                        if($code=='011'){
                                    //                            echo 'First Bank of Nigeria PLC';
                                    //                        }
                                    //                        if($code=='058'){
                                    //                            echo 'Guaranty Trust Bank PLC';
                                    //                        }
                                    //                        if($code=='6'){
                                    //                            echo 'Unity Bank PLC';
                                    //                        }
                                    //                        if($code=='7'){
                                    //                            echo 'United Bank for Africa';
                                    //                        }
                                    //                        if($code==8){
                                    //                            echo 'Union Bank of Nigeria PLC';
                                    //                        }
                                    //                        if($code=='232'){
                                    //                            echo 'Sterling Bank PLC';
                                    //                        }
                                    //                        if($code=='221'){
                                    //                            echo 'Stanbic IBTC Bank PLC';
                                    //                        }
                                    //                        if($code=='101'){
                                    //                            echo 'Providus Bank Limited';
                                    //                        }
                                    //                        if($code=='035'){
                                    //                            echo 'Wema Bank PLC';
                                    //                        }
                                    //                        if($code=='057'){
                                    //                            echo 'Zenith Bank PLC';
                                    //                        }
                                    //                        if($code=='076'){
                                    //                            echo 'Polaris Bank Ltd';
                                    //                        }
                                    //                        ?>
                                    <!--                    <ul class="list-group list-group-flush">-->
                                    <!--                        <li class="list-group-item">Bank: --><?php //echo $code; ?><!--</li>-->
                                    <!--                        <li class="list-group-item">Account No: --><?php //echo $nu; ?><!--</li>-->
                                    <!--                    </ul>-->
                                    <!--                        --><?php //}?>
                                    <!--                </div>-->

<!--                                    <h3>Payment Account</h3>-->

                                </div>
                                <center>
                                    <button type="submit" class="btn btn-outline-primary btn-rounded">
                                        <h5>You can register More than one Payment Account</h5>
                                        <h6><b>NOTE: it has to be an account you want to make payment from</b></h6>

                                    </button>
                                </center>
                                <div class="row">
                                    <div class="col-md-12 col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-sm-12 col-12">
                                        <div class="change_password_wrapper float_left">
                                            <div class="change_pass_field float_left">
                                                <form action="paymethod.php" method="post">
                                                    <div class="payment_gateway_wrapper payment_select_wrapper">
                                                        <label>Select Your Bank :</label>
                                                        <select data-required="true" class="form-control" name="value" required>

                                                            <option selected>choose Bank Name</option>
                                                            <option value="1">Access Bank</option>
                                                            <option value="050">EcoBank Nigeria PLC</option>
                                                            <option value="3">Fidelity Bank PLC</option>
                                                            <option value="011">First Bank of Nigeria PLC</option>
                                                            <option value="058">Guaranty Trust Bank PLC</option>
                                                            <option value="6">Unity Bank PLC</option>
                                                            <option value="7">United Bank for Africa</option>
                                                            <option value="8">Union Bank of Nigeria PLC</option>
                                                            <option value="232">Sterling Bank PLC</option>
                                                            <option value="221">Stanbic IBTC Bank PLC</option>
                                                            <option value="101">Providus Bank Limited</option>
                                                            <option value="035">Wema Bank PLC</option>
                                                            <option value="057">Zenith Bank PLC</option>
                                                            <option value="076">Polaris Bank Ltd</option>
                                                        </select>
                                                    </div>
                                                    <div class="change_field">
                                                        <label>Account Number :</label>
                                                        <input type="number" name="number" placeholder="">
                                                    </div>
                                                    <?php
                                                    $query="SELECT * FROM  users WHERE username = '".$loggedin_session."'";
                                                    $result = mysqli_query($con,$query);

                                                    while($row = mysqli_fetch_array($result))
                                                    {
                                                        $user="$row[username]";
                                                    }
                                                    ?>
                                                    <div class="change_field">
                                                        <input type="hidden" name="username" value="<?php echo $user; ?>">
                                                    </div>
                                                    <button type="submit"><i class="fa fa-check"></i> Add Payment Method</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


</section>
                            <?php include ("footer.php"); ?>