<?php include ("menu2.php"); ?>
<section id="breadcrumb-section" class="breadcrumb-section clearfix"
         style="background-image: url(assets/images/breadcrumb-bg.jpg);" xmlns="http://www.w3.org/1999/html">
    <div class="overlay-black">
        <div class="container">
            <h2 class="page-title">View Transfer Method</h2>
        </div>
    </div>
</section>
<div class="breadcrumb-list">
    <div class="container">
        <ul>
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <!--                <li class="breadcrumb-item"><a href="shop.html">Shop</a></li>-->
            <li class="breadcrumb-item active">View Transfer Method</li>
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


                                                    <div class="plan_investment_wrapper float_left">
                                                        <div class="row">
                                                            <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                                                                <div class="sv_heading_wraper">

                                                                </div>

                                                            </div>
                                                            <button type="submit" class="btn btn-outline-primary btn-rounded"><a href="paymethod.php">Create New Payment Method</a></button>
                                                            <?php
                                                            if(isset($_GET["username"])){
                                                                $todelete= mysqli_real_escape_string($con,$_GET["username"]);

                                                                $result=mysqli_query($con,"DELETE FROM banks WHERE username='$todelete'");
                                                            }
                                                            ?>
                                                            <div id="shopping-cart-section" class="shopping-cart-section sec-ptb-100 clearfix">
                                                                <div class="container">
                                                                    <div class="shopping-cart-table">
                                                                        <table class="table table-hover">
                                                                            <thead class="table-head">
                                                                    <tr>
                                                                        <th>Username</th>
                                                                        <th>Bank Name</th>
                                                                        <th>Account No</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <tr>
                                                                        <?php
                                                                        $code=0;
                                                                        $nu=0;
                                                                        $query="SELECT * FROM  banks WHERE username = '".$loggedin_session."'";
                                                                        $result = mysqli_query($con,$query);

                                                                        while($row = mysqli_fetch_array($result)) {
                                                                        $user = "$row[username]";
                                                                        $code = $row["bank_name"];
                                                                        $nu = $row["account_no"];


                                                                        if ($code == '1') {
                                                                            $a='Access Bank';
                                                                        }
                                                                        if ($code == '050') {
                                                                            $a='EcoBank Nigeria PLC';
                                                                        }
                                                                        if ($code == '3') {
                                                                            $a= 'Fidelity Bank PLC';
                                                                        }
                                                                        if ($code == '011') {
                                                                            $a= 'First Bank of Nigeria PLC';
                                                                        }
                                                                        if ($code == '058') {
                                                                            $a= 'Guaranty Trust Bank PLC';
                                                                        }
                                                                        if ($code == '6') {
                                                                            $a= 'Unity Bank PLC';
                                                                        }
                                                                        if ($code == '7') {
                                                                            $a='United Bank for Africa';
                                                                        }
                                                                        if ($code == '8') {
                                                                            $a='Union Bank of Nigeria PLC';
                                                                        }
                                                                        if ($code == '232') {
                                                                            $a= 'Sterling Bank PLC';
                                                                        }
                                                                        if ($code == '221') {
                                                                            $a= 'Stanbic IBTC Bank PLC';
                                                                        }
                                                                        if ($code == '101') {
                                                                            $a='Providus Bank Limited';
                                                                        }
                                                                        if ($code == '035') {
                                                                            $a= 'Wema Bank PLC';
                                                                        }
                                                                        if ($code == '057') {
                                                                            $a= 'Zenith Bank PLC';
                                                                        }
                                                                        if ($code == '076') {
                                                                            $a= 'Polaris Bank Ltd';
                                                                        }
                                                                        ?>
                                                                        <td><?php  echo $user; ?></td>
                                                                        <td><?php  echo $a ?></td>
                                                                        <td><?php  echo $nu; ?></td>
                                                                        <td>
                                                                            <a href="view.php?username=<?php print $row["username"]; ?>" class="delete" title="Delete" data-toggle="tooltip"><i class="fa-trash-o fa"></i></a>
                                                                            <button type="submit" class="btn btn-rounded btn-outline-info"><i class="fa fa-check"> </i><a href="view.php?username=<?php print $row["username"]; ?>">Delete</a> </button>

                                                                        </td>
                                                                    </tr>
                                                                    <?php } ?>

                                                                    </tbody>
                                                                </table>
                                                                    </section>
                                                                        <?php include ("footer.php"); ?>