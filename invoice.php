<?php include ("menu2.php"); ?>
<section id="breadcrumb-section" class="breadcrumb-section clearfix" style="background-image: url(assets/images/breadcrumb-bg.jpg);">
    <div class="overlay-black">
        <div class="container">
            <h2 class="page-title">Print Invoice</h2>
        </div>
    </div>
</section>
<div class="breadcrumb-list">
    <div class="container">
        <ul>
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Print Invoice</li>
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

                        <div class="order-summary mb-50">
                            <h3 class="title-medium clr-yellow mb-30">Order Summary</h3>
                            <div>
                                <ul>


                        <?php
                        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id']))
                        {

                            $id=mysqli_real_escape_string($con,$_POST['id']);

                            $query="SELECT * FROM  bill_payment where  id = '$id'";
                            $result = mysqli_query($con,$query);

                            while($row = mysqli_fetch_array($result))
                            {
                                $name="$row[username]";
                                $product="$row[product]";
                                $amount="$row[amount]";
                                $tid="$row[transactionid]";
                                $pmeth="$row[paymentmethod]";
                                $date="$row[timestamp]";
                                $status="$row[status]";
//                $recipient="$row[recipient]";
                            }
                        }

                        $query="SELECT * FROM  users where  username = '$name'";
                        $result = mysqli_query($con,$query);

                        while($row = mysqli_fetch_array($result))
                        {
                            $fname="$row[name]";
                            $email="$row[email]";
                            $phone="$row[phone]";
//            $country="$row[country]";
                        }

                        $query="SELECT * FROM  settings";
                        $result = mysqli_query($con,$query);

                        while($row = mysqli_fetch_array($result))
                        {
                            $coname="$row[coname]";
                            $coemail="$row[email]";
                            $cophone="$row[phone]";
                            $cocountry="$row[address]";
                            $cur="$row[currency]";
                        }


                        ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="detail-wrapper padd-top-30 padd-bot-30">

                                        <div class="row text-center">
                                            <div class="col-md-12">
                                                <a href="javascript:window.print()" class="btn theme-btn">Print this invoice</a>
                                            </div>
                                        </div>

                                        <div class="row mrg-0">
                                            <div class="col-md-6">
                                                <div id="logo"><img src="../uploads/logo.png" class="img-responsive" alt=""></div>
                                            </div>

                                            <div class="col-md-6">
                                                <p id="invoice-info">
                                                <li>Order: <span> <?php echo $tid; ?> </span></li>
                                                <li>Issued: <span> <?php echo $date; ?> </span></li>

                                                </p>
                                            </div>

                                        </div>

                                        <div class="row  mrg-0 detail-invoice">

                                            <div class="col-md-12">
                                                <h2>INVOICE</h2>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-lg-7 col-md-7 col-sm-7">

                                                        <h4>Supplier: </h4>
                                                        <h5><?php echo $coname; ?></h5>
                                                        <p>
                                                            <a href="#" class="__cf_email__" data-cfemail="7f161119103f3e1b12161139161a0d511c1012"><?php echo $coemail; ?></a><br />

                                                            <?php echo $cophone; ?><br />

                                                            <!--                                            --><?php //echo $cocountry; ?>
                                                        </p>

                                                    </div>
                                                    <div class="col-lg-5 col-md-5 col-sm-5">
                                                        <h4>Client's Details :</h4>
                                                        <h5><?php echo $fname; ?></h5>
                                                        <p>
                                                            <a href="#" class="__cf_email__" data-cfemail="1b687a6e697a6d767a7277232c5b7c767a727735787476"><?php echo $email; ?></a><br />

                                                            <?php echo $phone; ?><br />

                                                            <!--                                            --><?php //echo $country; ?>

                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr />

                                            <div class="col-12 col-md-12">
                                                <strong>ITEM DESCRIPTION & DETAILS :</strong>
                                            </div>
                                            <hr>

                                            <div id="shopping-cart-section" class="shopping-cart-section sec-ptb-100 clearfix">
                                                <div class="container">
                                                    <div class="shopping-cart-table">
                                                        <table class="table table-hover">
                                                            <thead class="table-head">
                                                            <tr>
                                                                <th>Transaction ID</th>
                                                                <th>Product</th>
                                                                <th>Price</th>
                                                                <th>Payment Method</th>
                                                                <th>Status</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td><?php echo $tid; ?></td>
                                                                <td><?php echo $product; ?></td>
                                                                <td><?php echo $cur; ?> <?php echo $amount; ?></td>
                                                                <td><?php echo $pmeth; ?></td>
                                                                <!--                                                <td>--><?php //echo $recipient; ?><!--</td>-->
                                                                <td><?php if($status==1){
                                                                        echo "Delivered";
                                                                    }elseif ($status==0) {
                                                                        echo "Not Delivered";
                                                                    } ?></td>
                                                            </tr>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <hr>
                                                    <div>
                                                        <h5><b>Total : <?php echo $cur; ?> <?php echo $amount; ?> </h5></b>
                                                    </div>
                                                    <hr>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</section>
<?php include("footer.php"); ?>


