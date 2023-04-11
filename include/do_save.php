<?php
 
if(isset($_POST['data'])){
// $id=$_POST['match_id'];
// $_POST['data']['match_id'] = $_POST['match_id'];
// $status = $_POST['status'];	
//get summary data
if($_POST['TABLE']=="bank_loans"){
	$newdate = str_replace('/', '-', $_POST['data']['due_date']);
	$_POST['data']['due_date']=date("Y-m-d", strtotime($newdate));
}

if(isset($_GET['save'])){
	//echo var_dump($_POST['data']);
	$save_form = databaseInsert($_POST['TABLE'], $_POST['data']);
} else {
	$save_form = databaseUpdate($_POST['TABLE'], $_POST['data'], 'id', $id);
}
//*/run insert query
if ($conn->query($save_form) === TRUE){ //if insert query successful
	$errhdg = 'Success!';
	$errmsg = 'Account Successfully Added.';
	$divclass = "green";
	$errimg = "check";
}else

{
	$errhdg = 'Error!';
	$divclass = "red";
	$errmsg = "Error: The system was unbale to save your form at this time. We apologise for inconveniece caused. <br><i>".$conn->error."</i>"; 	
	$errimg = "close";
}	
}

?>


<div class="card-alert card <?php echo $divclass; ?>">
    <div class="card-content white-text">
        <span class="card-title white-text darken-1">
            <i class="material-icons"><?php echo $errimg; ?></i> <?php echo $errhdg; ?></span>
        <p><?php echo $errmsg; ?></p>
    </div>
    <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
