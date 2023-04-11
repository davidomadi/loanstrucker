<?php include("include/header.php");  

?>

    <!-- BEGIN: Page Main-->
    <div id="main">
        <div class="row">
            <div class="content-wrapper-before blue-grey lighten-5"></div>
            <div class="col s12">
                <div class="container">
                    <div class="section">
                        
                            <div class="col s12 m6 l8">
                                <div class="card subscriber-list-card animate fadeRight">
                                    <div class="card-content pb-1">
                                        <h4 class="card-title mb-0">Accounts Holders<i class="material-icons float-right">more_vert</i></h4>
                                    </div>
                                    <table class="subscription-table responsive-table highlight">
                                        <thead>
                                            <tr>
                                                <th>Account Name</th>
                                                <th>Account Number</th>
                                                <th>Branch</th>
                                                <th>Loans</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php 

                                            $accts=$conn->query("SELECT * FROM bank_accounts");
                                            while ($acct = $accts->fetch_assoc()) {
                                                
                                                                                        
                                        ?>

                                            <tr>
                                                <td><?=$acct['account_name']; ?></td>
                                                <td><?=$acct['account_number']; ?></td>
                                                <td><?=$acct['branch']; ?></td>
                                                <td><?= countLoans($acct['account_number']); ?></td>
                                                <td><span class="badge pink lighten-5 pink-text text-accent-2">Close</span></td>
                                                <td class="center-align"><a href="#"><i class="material-icons pink-text">clear</i></a></td>
                                            </tr>
                                            <?php } ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><!-- START RIGHT SIDEBAR NAV -->
                    
                    
            </div>
        </div>
    </div>
    <!-- END: Page Main-->
<?php include("include/footer.php"); ?>