<?php include("menu2.php"); ?>
    <section id="breadcrumb-section" class="breadcrumb-section clearfix" style="background-image: url(assets/images/breadcrumb-bg.jpg);">
        <div class="overlay-black">
            <div class="container">
                <h2 class="page-title">Fund Wallet</h2>
            </div>
        </div>
    </section>
    <div class="breadcrumb-list">
        <div class="container">
            <ul>
                <li class="breadcrumb-item"><a href="index-1.html">Home</a></li>
<!--                <li class="breadcrumb-item"><a href="shop.html">Shop</a></li>-->
                <li class="breadcrumb-item active">Fund Wallet</li>
            </ul>
        </div>
    </div>
<?php include ("mu.php"); ?>
<div class="col-xl-9 col-md-8">
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Wallet</h4>
                    <div class="wallet-details">
                        <span>Wallet Balance</span>
                        <h3>NGN <?php echo number_format(intval($balance *1),2);?></h3>
                        <div class="d-flex justify-content-between my-4">
                            <div>
                                <p class="mb-1">Early Balance</p>
                                <h4>NGN <?php echo number_format(intval($iwallet *1),2);?></h4>
                            </div>
                            <div>
                                <p class="mb-1">New Deposit</p>
                                <h4>NGN <?php echo number_format(intval($amount *1),2);?></h4>
                            </div>
                        </div>
                        <div class="wallet-progress-chart">
                            <div class="d-flex justify-content-between">
                                <span>NGN <?php echo number_format(intval($iwallet *1),2);?>
</span>
                                <span>NGN <?php echo number_format(intval($amount *1),2);?>
</span>
                            </div>
                            <div class="progress mt-1">
                                <div class="progress-bar bg-theme" role="progressbar" aria-valuenow="41" aria-valuemin="0" aria-valuemax="100" style="width:98%">98.44%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Wallet</h4>
                    <form id="paymentForm">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text display-5">NGN</label>
                                </div>
                                <input type="text" maxlength="4" class="form-control" name="amount" id="amount" placeholder="00.00">
                            </div>
                        </div>
                        <input type="hidden"  id="email-address" value="<?php echo $email; ?>">
                </div>
            </div>
            <div class="text-center mb-3">
                <h5 class="mb-3">OR</h5>
                <ul class="list-inline mb-0">
                    <li class="line-inline-item mb-0 d-inline-block">
                        <a href="javascript:;" name="amount" class="updatebtn">500</a>
                    </li>
                    <li class="line-inline-item mb-0 d-inline-block">
                        <a href="javascript:;" id="1000" class="updatebtn">1000</a>
                    </li>
                    <li class="line-inline-item mb-0 d-inline-block">
                        <a href="javascript:;" id="1500" class="updatebtn">1500</a>
                    </li>
                </ul>
            </div>
            <button class="btn btn-primary btn-block withdraw-btn" type="submit" onclick="payWithPaystack()"> Add to Wallet</button>
            <script src="https://js.paystack.co/v1/inline.js"></script>
            </form>
        </div>
    </div>
</div>
</div>
</section>
    <div id="shopping-cart-section" class="shopping-cart-section sec-ptb-100 clearfix">
    <div class="container">
        <div class="shopping-cart-table">
            <table class="table table-hover">
                <thead class="table-head">
    <tr>
        <th>S.No</th>
        <th>Date</th>
        <th>Username</th>
        <th>Total Balance</th>
        <th>Amount Before</th>
        <th>Amount After</th>
        <th>Payment_Ref</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $query = "SELECT * FROM deposit WHERE username ='".$loggedin_session."'";
    $result = mysqli_query($con,$query);
    while($row = mysqli_fetch_array($result)) { ?>

        <tr>
            <td><?php echo $row["id"] ; ?></td>
            <td><?php echo $row["date"] ; ?></td>
            <td><?php echo $row["username"] ; ?></td>
            <td>NGN.<?php echo $row["amount"] ; ?></td>
            <td>NGN.<?php echo $row["iwallet"] ; ?></td>
            <td>NGN.<?php echo $row["fwallet"] ; ?></td>
            <td><?php echo $row ["payment_ref"] ; ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
    </table>
    </div>
    </div>
    <script>
        const paymentForm = document.getElementById('paymentForm');
        paymentForm.addEventListener("submit", payWithPaystack, false);
        function payWithPaystack(e) {
            e.preventDefault();
            let handler = PaystackPop.setup({
                key: 'pk_test_17fd09d2f1b858a21859595153d9770573a7c996', // Replace with your public key
                email: document.getElementById("email-address").value,
                amount: document.getElementById("amount").value * 100,
                ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
// label: "Optional string that replaces customer email"
                onClose: function(){
                    alert('Window closed.');
                },
                callback: function(response){
                    let message = 'Payment complete! Reference: ' + response.reference;
                    // alert(message);

                    window.location = 'transaction.php?reference='+response.reference;

                }
            });
            handler.openIframe();
        }
    </script>

<?php include ("footer.php"); ?>