<?php include ("menu2.php"); ?>
    <section id="breadcrumb-section" class="breadcrumb-section clearfix" style="background-image: url(assets/images/breadcrumb-bg.jpg);">
        <div class="overlay-black">
            <div class="container">
                <h2 class="page-title">Create Lock Wallet</h2>
            </div>
        </div>
    </section>
    <div class="breadcrumb-list">
        <div class="container">
            <ul>
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <!--                <li class="breadcrumb-item"><a href="shop.html">Shop</a></li>-->
                <li class="breadcrumb-item active">Create Lock Wallet</li>
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

                        <!--  profile wrapper start -->
                        <div class="payment_transfer_Wrapper float_left">
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                                    <div class="sv_heading_wraper heading_center">
                                        <h3>Create Safe Lock</h3>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-sm-12 col-12">
                                    <div class="change_password_wrapper float_left">
                                        <div class="change_pass_field float_left">
                                            <div class="payment_gateway_wrapper payment_select_wrapper">
                                                <form action="paysafe.php" method="post">
                                                    <!--                                        <label>Select Payment Mode :</label>-->
                                                    <!--                                        <select name="action" id="action">-->
                                                    <!--                                            <option selected>choose gateway</option>-->
                                                    <!--                                            <option value="1">Wallet</option>-->
                                                    <!--                                            <option value="2">Atm Card</option>-->
                                                    <!--                                        </select>-->
                                            </div>
                                            <div class="change_field">
                                                <label>Amount To Lock :</label>
                                                <input type="tel" name="amount" required />
                                            </div>
                                            <div class="change_field">
                                                <label>full name :</label>
                                                <input type="tel" name="fname" required />
                                            </div>
                                            <div class="change_field">
                                                <label>Email:</label>
                                                <input type="email"  name="email" required/>
                                            </div>
                                            <div class="change_field">
                                                <label>Phone Number:</label>
                                                <input type="number"  name="number" required/>
                                            </div>
                                            <div class="change_field">
                                                <label>Duration :</label>
                                                <input type="date" name="date" placeholder="" required/>
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