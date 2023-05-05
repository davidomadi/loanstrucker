
<?php include("include/header.php");  

?>


    <!-- BEGIN: Page Main-->
    <div id="main">

        <div class="row">
            <div class="content-wrapper-before blue-grey lighten-5"></div>
            <div class="col s12">
                <div class="container">
                    <div class="section">

                        <?php if(isset($_GET['save'])){ include("include/do_save.php"); } ?>
                        <?php if(isset($_GET['edit'])){ include("include/do_save.php"); } ?>
                        <?php if(isset($_GET['delete'])){ include("include/delete.php"); } ?>
                        <?php    
                            $table="bank_accounts";
                            $accts=$conn->query("SELECT * FROM ".$table);
                            $accounts = $accts->num_rows;
                        ?>


    <?php 
    	$account=$conn->query("SELECT * FROM bank_accounts");
    	while($acct=$account->fetch_assoc()) { 
    ?>
    	                           <!--  -->
                   <div id="editAccount_<?php echo $acct['id']; ?>" class="modal">
                    <div class="modal-content">
                        <h4>Accounts</h4>
                        <div id="basic-form" class="card card card-default scrollspy">
                            <div class="card-content">
                                <h4 class="card-title">Edit Account</h4>
                                <form action="accounts.php?edit" method="POST">
                                    <input type="hidden" name="TABLE" value="bank_accounts" >
                                    <input type="hidden" name="account_id" value="<?php echo $acct['id']; ?>" >
			                        <div class="row">
			                            <div class="input-field col s12">
			                                <input type="text" name="data[account_name]" id="fn" value="<?=$acct['account_name']; ?>">
			                                <label for="fn">Account Name</label>
			                            </div>
			                        </div>
			                        <div class="row">
			                            <div class="input-field col s12">
			                                <input id="account" name="data[account_number]" type="text" value="<?=$acct['account_number']; ?>">
			                                <label for="account">Account Number</label>
			                            </div>
			                        </div>
			                        <div class="row">
			                            <div class="input-field col s12">
			                                <input id="nin" name="data[nin_number]" type="text" value="<?=$acct['nin_number']; ?>">
			                                <label for="nin">NIN Number</label>
			                            </div>
			                        </div>
			                        <div class="row">
			                            <div class="input-field col s12">
			                                <input id="Branch" name="data[branch]" type="text" value="<?=$acct['branch']; ?>">
			                                <label for="Branch">Branch</label>
			                            </div>
			                        </div>
			                        <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Submit
			                            <i class="material-icons right">send</i>
			                        </button>
                                </form>
                                  
                                <button class="btn red waves-effect modal-close  waves-light" type="close" name="action">Close
                                    <i class="material-icons right">close</i>
                                </button>

                            </div>
                        </div>
                    </div>
                </div>
                  
    <?php } ?>
                        <div class="row">
                            <div class="col s12 m6 l4">
                                <div class="card padding-4 animate fadeLeft">
                                    <div class="row">
                                        <div class="col s5 m5">
                                        <a class="waves-effect waves-light btn green modal-trigger mb-2 mr-1" href="#modal1">Add New Account</a>
                                            <h5 class="mb-0 pt-16"><?php echo $accounts; ?></h5>
                                        </div>
                                        <div class="col s7 m7 right-align">
                                            <i class="material-icons background-round mt-5 mb-5 gradient-45deg-purple-amber gradient-shadow white-text">perm_identity</i>
                                            <p class="mb-0">Total Clients</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                                <th>National ID number</th>
												<th>Branch</th>
                                                <th>Loans</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php 
                                            
                                            while ($acct = $accts->fetch_assoc()) {          
                                                                                        
                                        ?>
                                            <tr>
                                                <td><?=$acct['account_name']; ?></td>
                                                <td><?=$acct['account_number']; ?></td>
                                                <td><?=$acct['nin_number']; ?></td>
                                                <td><?=$acct['branch']; ?></td>
                                                <td><?= countLoans($acct['account_number']); ?></td>
                                                <td class="center-align">
	                                               
	                                                	<a href="#" onclick="del_item('<?php echo $acct['id']; ?>', '<?php echo $table; ?>')"><i class="material-icons pink-text">clear</i></a> &nbsp;
	                                                	<a href="#editAccount_<?= $acct['id']; ?>" class="modal-trigger"><i class="material-icons pink-text">edit</i></a>
	                                               
                                                </td>
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
    <div id="modal1" class="modal">
        <div class="modal-content">
            <h4>Accounts</h4>
            <div id="basic-form" class="card card card-default scrollspy">
                <div class="card-content">
                    <h4 class="card-title">Add New Account</h4>
                    <form action="accounts.php?save" method="POST">
                        <input type="hidden" name="TABLE" value="bank_accounts" >
                        <div class="row">
                            <div class="input-field col s12">
                                <input type="text" name="data[account_name]" id="fn">
                                <label for="fn">Account Name</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="account" name="data[account_number]" type="text">
                                <label for="account">Account Number</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="account" name="data[nin_number]" type="text">
                                <label for="account">NIN Number</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="Branch" name="data[branch]" type="text">
                                <label for="Branch">Branch</label>
                            </div>
                        </div>
                        <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Submit
                            <i class="material-icons right">send</i>
                        </button>
                    </form>

                    <button class="btn red waves-effect modal-close  waves-light" type="close" name="action">Close
                        <i class="material-icons right">close</i>
                    </button>

                </div>
            </div>
        </div>
    </div>


<?php include("include/footer.php"); ?>