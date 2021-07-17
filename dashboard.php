<?php include ("menu2.php"); ?>
<section id="breadcrumb-section" class="breadcrumb-section clearfix" style="background-image: url(assets/images/breadcrumb-bg.jpg);">
    <div class="overlay-black">
        <div class="container">
            <h2 class="page-title">Mobile Data/Airtime</h2>
        </div>
    </div>
</section>
<div class="breadcrumb-list">
    <div class="container">
        <ul>
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
<!--            <li class="breadcrumb-item"><a href="buyairtime.php">Shop</a></li>-->
<!--            <li class="breadcrumb-item active">Product Checkout</li>-->
        </ul>
    </div>
</div>

<?php include ("mu.php");

$depositor=0;
$iwallet=0;
$query="SELECT * FROM deposit where username = '".$loggedin_session."'";
$result = mysqli_query($con,$query);
while($row = mysqli_fetch_array($result))
{
    $depositor=$row["amount"];
    $iwallet=$row["iwallet"];

}
$lock=0;
$query="SELECT * FROM safe_lock where username = '".$loggedin_session."'";
$result = mysqli_query($con,$query);
while($row = mysqli_fetch_array($result)) {
    $lock = $row["balance"];
    $da = $row["date"];
}
?>


<div class="col-xl-9 col-md-8">
    <h4 class="widget-title"></h4>
    <div class="row">
<!--        <div class="col-lg-4">-->
<!--            <a href="wallet.php" class="dash-widget dash-bg-1">-->
<!--                <img src="assets/img/wallet.png" alt="" class="mr-2 wallet-img">NGN --><?php //echo number_format(intval($balance *1),2);?>
<!---->
<!--                <div class="dash-widget-info">-->
<!--                    <span>Balance</span>-->
<!--                </div>-->
<!--            </a>-->
<!--        </div>-->
        <?php
        $query="SELECT  sum(amount) FROM bill_payment where username = '".$loggedin_session."'";
        $result = mysqli_query($con,$query);
        while($row = mysqli_fetch_array($result))
        {
            $sp=$row[0];


        }
        ?>
        <div class="col-lg-4">
            <a href="myinvoice.php" class="dash-widget dash-bg-2">
<!--                <img src="assets/img/wallet.png" alt="" class="mr-2 wallet-img">NGN --><?php //echo number_format(intval($sp *1),2);?>
<!---->
<!--                <div class="dash-widget-info">-->
<!--                    <span>Total Bills</span>-->
<!--                </div>-->
<!--            </a>-->
<!--        </div>-->
        <div class="col-lg-4">
            <div class="dash-widget dash-bg-3">

                <div class="dash-widget-info">
                    <span></span>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-0">
        <div class="row no-gutters">
            <div class="col-lg-8">
                <div class="card-body">
<!--                    <h6 class="title">Plan Details</h6>-->
                    <div class="sp-plan-name">

                        <?php
                        $status=0;
                        $query="SELECT * FROM safe_lock where username = '".$loggedin_session."'";
                        $result = mysqli_query($con,$query);
                        while($row = mysqli_fetch_array($result)) {
                            $status = $row["status"];
                            $da = $row["date"];
                        }

//                        if ($status == 0){ ?>
<!--                            <button type="submit" class="btn btn-outline-primary btn-rounded"><a href="safelock.php">Depsoit to Lock wallet</a></button>-->
<!--                        --><?php //}else{ ?>
<!--                            <button type="submit" class="btn btn-outline-primary btn-rounded"><a href="add.php">Add to Lock wallet</a></button>-->
<!--                        --><?php //} ?>
<!--                        <button type="submit" class="btn btn-outline-primary btn-rounded"><a href="logout.php">Logout Here</a></button>-->
<!--                        <button type="submit" class="btn btn-outline-primary btn-rounded"><a href="fundwallet.php">Fund Wallet</a></button>-->

                        <dl class="userdescc">
                            <dt>Registration Date</dt>
                            <dd>:  <?php echo $date; ?></dd>
                            <dt>Username</dt>
                            <dd>: <?php echo $loggedin_session; ?></dd>
<!--                            <dt>Referral Bonus</dt>-->
<!--                            <dd>:  NGN.--><?php //echo number_format(intval($refer *1),2);?><!--</dd>-->
                            <dt>Last Access IP</dt>
                            <dd>: <?php
                                echo ''.$_SERVER['REMOTE_ADDR'];
                                ?>  </dd>
                            <button type="submit" class="btn btn-outline-primary btn-rounded"><a href="view.php">view Payment Method</a></button>

                            <!--                --><?php
                            //                if ($account_no==1 && $account_name==1) {
                            //                    echo "<dd><a href=virtual.php>create Virtual account</a></dd>";
                            //                }
                            //                else {
                            //                    echo "<dt>Bank Name</dt>";
                            //                    echo "<dd> : ".$account_name."</dd>";
                            //                    echo "<dt>Account No</dt>";
                            //                    echo "<dd>: ".$account_no."</dd>";
                            //                }
                            //                ?>
                            <button type="submit" class="btn btn-outline-primary btn-rounded"><a href="paymethod.php">Create Payment Method</a></button>


                            <button type="submit" class="btn btn-outline-primary btn-rounded"><a href="fundwallet.php">Depsoit Here</a></button>
                            <?php
                            $status=0;
                            $query="SELECT * FROM safe_lock where username = '".$loggedin_session."'";
                            $result = mysqli_query($con,$query);
                            while($row = mysqli_fetch_array($result)) {
                                $status = $row["status"];
                                $da = $row["date"];
                            }

                            if ($status == 0){ ?>
                                <button type="submit" class="btn btn-outline-primary btn-rounded"><a href="safelock.php">Depsoit to Lock wallet</a></button>
                            <?php }else{ ?>
                                <button type="submit" class="btn btn-outline-primary btn-rounded"><a href="add.php">Add to Lock wallet</a></button>
                            <?php } ?>
                                <?php
//                            if ($bvn==0){ ?>
<!--                                <button type="submit" class="btn btn-outline-primary btn-rounded"><a href="profilebvn.php">Submit Your Bvn</a></button>-->
<!--                            --><?php //} else{ ?>
<!--                                <button type="submit" class="btn btn-outline-primary btn-rounded">Bvn: --><?php //echo $bvn; ?><!--</button>-->
<!--                            --><?php //} ?>
                            <button type="submit" class="btn btn-outline-primary btn-rounded"><a href="logout.php">Logout Here</a></button>
                        </dl>

                    </div>
                    <ul class="row">
                        <li class="col-6 col-lg-6">

<!--                            --><?php
//                            $query="SELECT * FROM  userbvn WHERE username='".$loggedin_session."'";
//                            $result = mysqli_query($con,$query);
//                            $bvn=0;
//                            $row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
//                            while($row = mysqli_fetch_array($result))
//                            {
//                                $bvn=$row["bvn"];
//                            }
//                            if ($bvn==0){ ?>
<!--                                <button type="submit" class="btn btn-outline-primary btn-rounded"><a href="profilebvn.php">Submit Your Bvn</a></button>-->
<!--                            --><?php //} else{ ?>
<!--                                <button type="submit" class="btn btn-outline-primary btn-rounded">Bvn: --><?php //echo $bvn; ?><!--</button>-->
<!--                            --><?php //} ?>
                            <!--                                        <p>Started On 15 Jul, 2020</p>-->
                        </li>
                        <!--                                    <li class="col-6 col-lg-6">-->
                        <!--                                        <p>Price $1502.00</p>-->
                        <!--                                    </li>-->
<!--                        <button type="submit" class="btn btn-outline-primary btn-rounded">Wallet: NGN --><?php //echo number_format(intval($balance *1),2);?><!--</button>-->

                    </ul>

<!--                    <h6 class="title">Last Payment</h6>-->
<!--                    <ul class="row">-->
<!--                        <li class="col-sm-6">-->
<!--                            <button type="submit" class="btn btn-outline-primary btn-rounded"><a href="paymethod.php">Create Payment Method</a></button>-->

                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sp-plan-action card-body">
                    <div class="mb-2">
                        <a href="provider-subscription.html" class="btn btn-primary"><span>Change Plan</span></a>
                    </div>
                    <div class="next-billing">
                        <p>Next Billing on <span>15 Jul, 2021</span></p>
                    </div>
                        <dl class="userdescc">
                            <dt>Wallet: NGN <?php echo number_format(intval($balance *1),2);?></dt>
                            <dt>Early Pay:&nbsp;&nbsp;NGN<?php echo number_format(intval($depositor *1),2);?></dt>
<!--                            <dt>New Deposit:&nbsp;&nbsp;NGN--><?php //echo number_format(intval($depositor *1),2);?><!--</dt>-->
                            <dt>Matured:&nbsp;&nbsp;NGN<?php echo number_format(intval($iwallet *1),2);?></dt>
                            <dt>Released:&nbsp;&nbsp;NGN<?php echo number_format(intval($balance *1),2); ?></dt>
                            <dt>Lock Wallet: NGN<?php echo number_format(intval($lock *1),2); ?></dt>

                            <button type="submit" class="btn btn-outline-primary btn-rounded"><a href="withdraw.php"> Click Here FOr Withdraw Option</a></button>

                            <button type="submit" class="btn btn-outline-primary btn-rounded"><a href="my%20profile.php">View Profile</a></button>

                            <!--                <dd><button type="submit" class="btn btn-outline-primary btn-rounded"><a href="history.php">View All Deposit</a></button></dd>-->

                        </dl>
                    </div>
                    <div class="sp-plan-action card-body">
                        <div class="mb-2">
<!--                            --><?php
//                            if ($account_no==1 && $account_name==1) {
//                                ?>
<!--                                <button type="submit" class="btn btn-outline-primary btn-rounded"><a href=virtual.php >create Virtual account </a></div>-->
<!--                           --><?php //}
//                            else { ?>
<!---->
<!--                                <div> <a> Bank Name:--><?php //echo $account_name; ?>
<!--Account No:--><?php //echo $account_no; ?>
<!--</a></div> --><?php //}
//                            ?>
                    </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>﻿
</section>

<?php include ("footer.php"); ?>
