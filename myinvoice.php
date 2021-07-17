
<?php include ("menu2.php"); ?>
<section id="breadcrumb-section" class="breadcrumb-section clearfix" style="background-image: url(assets/images/breadcrumb-bg.jpg);">
    <div class="overlay-black">
        <div class="container">
            <h2 class="page-title">Invoices</h2>
        </div>
    </div>
</section>
<div class="breadcrumb-list">
    <div class="container">
        <ul>
            <li class="breadcrumb-item"><a href="index-1.html">Home</a></li>
            <!--                <li class="breadcrumb-item"><a href="shop.html">Shop</a></li>-->
            <li class="breadcrumb-item active">Invoices</li>
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

                        <!-- Title & Breadcrumbs-->
<!--                        <div class="row page-breadcrumbs">-->
<!--                            <div class="col-md-12 align-self-center">-->
<!--                                <h4 class="theme-cl">Active Payment Invoice</h4>-->
<!--                            </div>-->
<!--                        </div>-->
                        <!-- Title & Breadcrumbs-->



                        <!-- row -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="flex-box padd-10 bb-1">
                                        <h4 class="mb-0">Payment Lists</h4>

                                    </div>
                                    <div id="shopping-cart-section" class="shopping-cart-section sec-ptb-100 clearfix">
                                        <div class="container">
                                            <div class="shopping-cart-table">
                                                <table class="table table-hover">
                                                    <thead class="table-head">
                                                <tr>
                                                    <th>Product Name</th>
                                                    <th>Payment ID</th>
                                                    <th>Price</th>
                                                    <th>Date</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                <?php
                                                $query="SELECT * FROM bill_payment where username = '".$loggedin_session."'";
                                                $result = mysqli_query($con,$query);
                                                while($row = mysqli_fetch_array($result))
                                                {
                                                    $status="$row[status]";
                                                    if($status==1)
                                                        $sta="Paid";
                                                    if($status==1)
                                                        $color="cl-success bg-success-light";
                                                    if ($status==2)
                                                        $sta="Declined";
                                                    if($status==2)
                                                        $color="danger";
                                                    if ($status==0)
                                                        $sta="Pending";
                                                    if($status==0)
                                                        $color="cl-danger bg-danger-light";
                                                    ?>
                                                    <tr>
                                                        <td><a href="#"><?php echo "$row[product]"; ?></a></td>
                                                        <td><i class="fa fa-lg"></i><?php echo "$row[transactionid]"; ?></td>
                                                        <td><div class="label <?php echo $color; ?> ">NGN.<?php echo "$row[amount]"; ?></div></td>
                                                        <td><?php echo "$row[timestamp]"; ?></td>
                                                        <form action="invoice.php" method="post">
                                                            <input type="hidden" name="id" value="<?php echo "$row[id]"; ?>">
                                                            <td><button type="submit" class="badge btn-outline-primary btn-rounded"><i class="fa fa-print"></i> Print Invoice</button>
                                                        </form>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                                </tbody>
                                            </table>


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