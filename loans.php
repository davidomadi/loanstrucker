<?php include("include/header.php");  


$sql = "SELECT a.*, b.account_name FROM bank_loans a LEFT JOIN bank_accounts b on a.account_number=b.account_number";
$response=array();
$res= $conn->query($sql);

if($res) {
$x=0;
while($row=$res->fetch_assoc()){
	$response[$x]['id']=$row['id'];
	$response[$x]['description']=$row['description'];
	$response[$x]['account_name']=$row['account_name'];
	$response[$x]['account_number']=$row['account_number'];
	$response[$x]['due_date']=$row['due_date'];
	$response[$x]['date_disbursed']=$row['date_disbursed'];
	$response[$x]['amount']=$row['amount'];

	$p=$x;
	$x++;
}

$encode_data = json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
file_put_contents("include/JSON/loans.json", $encode_data);
}
else{
echo "No Loan Data Available";
}

$count=$res->num_rows;

?>

    <!-- BEGIN: Page Main-->
    <div id="main">
        <div class="row">
            <div class="content-wrapper-before blue-grey lighten-5"></div>
            <div class="col s12">
                <div class="container">
                    <div class="section">
						<?php if(isset($_GET['save'])){ include("include/do_save.php"); } ?>
                        <?php if(isset($_GET['delete'])){ include("include/delete.php"); } ?>

                        <div class="row">
                            <div class="col s12 m6 l4">
                                <div class="card padding-4 animate fadeLeft">
                                    <div class="row">
                                        <div class="col s5 m5">
                                        <a class="waves-effect waves-light btn green modal-trigger mb-2 mr-1" href="#modal1">Add New Loan</a>
                                            <h5 class="mb-0 pt-10"><?= $count; ?></h5>
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
                                                <th>Description</th>
                                                <th>Amount</th>
                                                <th>Due Date</th>
                                                <th>Disbused On</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php 
											$table="bank_loans";

                                            $accts=$conn->query("SELECT a.*, b.account_name FROM bank_loans a LEFT JOIN bank_accounts b on a.account_number=b.account_number");
                                            while ($acct = $accts->fetch_assoc()) {
                                                
                                        ?>

                                            <tr>
                                                <td><?=$acct['account_name']; ?></td>
                                                <td><?=$acct['account_number']; ?></td>
                                                <td><?=$acct['description']; ?></td>
                                                <td><?=$acct['amount']; ?></td>
                                                <td><?=date("d M, Y", strtotime($acct['due_date'])); ?></td>
                                                <td><?=date("d M, Y", strtotime($acct['date_disbursed'])); ?></td>
                                                <td class="center-align"><a href="#" onclick="del_item('<?php echo $acct['id']; ?>', '<?php echo $table; ?>')"><i class="material-icons pink-text">clear</i></a></td>
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
            <h4>Loans</h4>
            <div id="basic-form" class="card card card-default scrollspy">
                <div class="card-content">
                    <h4 class="card-title">Add New Loan</h4>
                    <form action="loans.php?save" method="POST">
					<input type="hidden" name="TABLE" value="bank_loans" >
                        <div class="row">
                            <div class="input-field col s12">
								<select class="select2 browser-default" name="data[account_number]">
									<option>SELECT ACCOUNT</option>
									<?php 
									$accts=$conn->query("SELECT * FROM bank_accounts"); 
									while($acct=$accts->fetch_assoc())
									{
									?>
									<option value="<?= $acct['account_number']; ?>"><?= $acct['account_number'] ?> [ <?= $acct['account_name'] ?> ]</option>
									<?php } ?>
								</select>
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="account" type="text" name="data[description]">
                                <label for="account">Loan Identifier</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="Branch" type="text" name="data[amount]">
                                <label for="Branch">Amount</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="Branch" type="text" name="data[due_date]" class="datepicker">
                                <label for="Branch">Due Date</label>
                            </div>
                        </div>
                        <button class="btn red waves-effect modal-close  waves-light" type="close" name="action">Close
                            <i class="material-icons right">close</i>
                        </button>

                        <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Submit
                            <i class="material-icons right">send</i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include("include/footer.php"); ?>