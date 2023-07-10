<?php 
class MyAccountClass{
function __construct(){
	$this->db = new database(DATABASE_HOST,DATABASE_PORT,DATABASE_USER,DATABASE_PASSWORD,DATABASE_NAME);
}


function MyAccount(){
?>
		<div class="account-page-area ptb-30">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-3">
                            <ul class="nav myaccount-tab-trigger" id="account-page-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="account-dashboard-tab" data-toggle="tab" href="#account-dashboard"
                                        role="tab" aria-controls="account-dashboard" aria-selected="true">Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="account-orders-tab" data-toggle="tab" href="#account-orders"
                                        role="tab" aria-controls="account-orders" aria-selected="false">Orders</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="account-details-tab" data-toggle="tab" href="#account-details"
                                        role="tab" aria-controls="account-details" aria-selected="false">Account
                                        Details</a>
                                </li>
								<li class="nav-item">
                                    <a class="nav-link" id="account-address-tab" data-toggle="tab" href="#account-address"
                                        role="tab" aria-controls="account-address" aria-selected="false">Change Password</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="account-logout-tab" href="logout.php" role="tab"
                                        aria-selected="false">Logout</a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-lg-9">
                            <div class="tab-content myaccount-tab-content" id="account-page-tab-content">
                                <div class="tab-pane fade show active" id="account-dashboard" role="tabpanel"
                                    aria-labelledby="account-dashboard-tab">
                                    <div class="myaccount-dashboard">
                                        <p>Hello <b><?php echo $_SESSION['username']; ?></b></p>
                                        <p>Check out your latest Order.</p>
										
										<h4 class="small-title">RECENT ORDERS</h4>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                <tbody>
                                                    <tr>
                                                        <th>ORDER ID</th>
                                                        <th>DATE</th>
														<th>ORDER STATUS</th>
                                                        <th>SHIPPING STATUS</th>
														<th>PAYMENT STATUS</th>
                                                        <th>TOTAL</th>
														<th>SHOPPING</th>
														<th>GRAND TOTAL</th>
                                                        <th></th>
                                                    </tr>
													<?php 
													$x=1;
													$sql = "select * from ".WR_ORDER." where user_id='".$_SESSION['userid']."' order by timestamp desc limit 0,2";
													$record = $this->db->fetch_query($sql,$this->db->pdo_open());
													foreach ($record as $row)
													{
													?>
                                                    <tr>
                                                        <td><a class="account-order-id" href="#">#<?php echo $row['id']; ?></a></td>
                                                        <td><?php echo date('F d, Y', strtotime($row['timestamp'])); ?></td>
														<td><?php echo $row['order_status']; ?></td>
                                                        <td><?php echo $row['shipping_status']; ?></td>
														<td><?php echo $row['payment_status']; ?></td>
														<td><?php echo $row['total']; ?></td>
														<td><?php echo $row['shipping']; ?></td>
														<td><?php echo $row['g_total']; ?></td>
                                                        <td><a href="#" class="ho-button ho-button-sm"><span>View</span></a></td>
                                                    </tr>
													<?php } ?>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
										
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="account-orders" role="tabpanel" aria-labelledby="account-orders-tab">
                                    <div class="myaccount-orders">
                                        <h4 class="small-title">MY ORDERS</h4>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                <tbody>
                                                    <tr>
                                                        <th>ORDER ID</th>
                                                        <th>DATE</th>
														<th>ORDER STATUS</th>
                                                        <th>SHIPPING STATUS</th>
														<th>PAYMENT STATUS</th>
                                                        <th>TOTAL</th>
														<th>SHOPPING</th>
														<th>GRAND TOTAL</th>
                                                        <th></th>
                                                    </tr>
													<?php 
													$x=1;
													$sql = "select * from ".WR_ORDER." where user_id='".$_SESSION['userid']."' order by timestamp desc";
													$record = $this->db->fetch_query($sql,$this->db->pdo_open());
													foreach ($record as $row)
													{
													?>
                                                    <tr>
                                                        <td><a class="account-order-id" href="#">#<?php echo $row['id']; ?></a></td>
                                                        <td><?php echo date('F d, Y', strtotime($row['timestamp'])); ?></td>
														<td><?php echo $row['order_status']; ?></td>
                                                        <td><?php echo $row['shipping_status']; ?></td>
														<td><?php echo $row['payment_status']; ?></td>
														<td><?php echo $row['total']; ?></td>
														<td><?php echo $row['shipping']; ?></td>
														<td><?php echo $row['g_total']; ?></td>
                                                        <td><a href="#" class="ho-button ho-button-sm"><span>View</span></a></td>
                                                    </tr>
													<?php } ?>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="tab-pane fade" id="account-details" role="tabpanel" aria-labelledby="account-details-tab">
                                    <div class="myaccount-details">
									 <h4 class="small-title">UPDATE ACCOUNT INFORMATION</h4>
									<?php 
										extract($_REQUEST);
										if($usrsbt=='saveuserdata')
											$this->updateUserToDB();
										else
											$this->updateUser();
									?>
                                    </div>
                                </div>
								
								<div class="tab-pane fade" id="account-address" role="tabpanel" aria-labelledby="account-address-tab">
                                    <div class="myaccount-address">
										 <h4 class="small-title">CHANGE PASSWORD</h4>
                                        <?php 
										extract($_REQUEST);
										if($passsbt=='changepassdb')
											$this->updatePassToDB();
										else
											$this->ChangePassword();
										?>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php 
}


function updateUser(){
?>
		<?php 
			$sql_usr = "select * from ".WR_USER." where id='".$_SESSION['userid']."' ";
			$row_usr = $this->db->row($sql_usr,$this->db->pdo_open());
		?>
		<form action="" class="ho-form" method="post">
			<div class="ho-form-inner">
				<div class="single-input single-input-half">
					<label for="account-details-firstname">First Name*</label>
					<input type="text" id="firstname" name="firstname" value="<?php echo $row_usr['fname']; ?>" required>
				</div>
				<div class="single-input single-input-half">
					<label for="account-details-lastname">Last Name*</label>
					<input type="text" id="lastname" name="lastname" value="<?php echo $row_usr['lname']; ?>" required>
				</div>
				<div class="single-input">
					<label for="account-details-email">Email*</label>
					<input type="email" id="email" name="email" value="<?php echo $row_usr['email']; ?>" required>
				</div>
				<div class="single-input">
					<label for="account-details-oldpass">Phone Number*</label>
					<input type="text" id="phone" name="phone" value="<?php echo $row_usr['phone']; ?>" required>
				</div>
				
				
				<div class="single-input">
					<button class="ho-button ho-button-dark" type="submit" name="usrsbt" value="saveuserdata"><span>SAVE CHANGES</span></button>
				</div>
			</div>
		</form>
<?php 
}

function updateUserToDB(){
extract($_REQUEST);
$update_sql_array=array();
$update_sql_array['fname'] = $firstname;
$update_sql_array['lname'] = $lastname;
$update_sql_array['email'] = $email;
$update_sql_array['phone'] = $phone;
$this->db->pdoupdate(WR_USER,$update_sql_array,'id',$_SESSION['userid']);
?><script>alert('Information Updated Successfully.'); window.location='myaccount.php';</script><?php 
}

function ChangePassword(){
?>

		<form action="" class="ho-form" method="post">
			<div class="ho-form-inner">
				<div class="single-input">
					<label for="account-details-firstname">Current Password</label>
					<input type="password" id="oldpassword" name="oldpassword" required placeholder="Old Password">
				</div>
				<div class="single-input single-input-half">
					<label for="account-details-lastname">New Password*</label>
					
					<input type="password" placeholder="Password" id="password" name="newpassword" required>
        
					
				</div>
				<div class="single-input  single-input-half">
					<label for="account-details-email">Confirm New Password*</label>
					<input type="password" placeholder="Confirm Password" id="confirm_password" name="repassword" required>
				</div>
				
				
				
				<div class="single-input">
					<button class="ho-button ho-button-dark" type="submit" name="passsbt" value="changepassdb"><span>CHANGES</span></button>
				</div>
			</div>
		</form>

<?php 
}

function updatePassToDB(){
	extract($_REQUEST);
	
	$sql_usr = "select * from ".WR_USER." where id='".$_SESSION['userid']."' ";
	$row_usr = $this->db->row($sql_usr,$this->db->pdo_open());
	if($oldpassword!=$row_usr['password']){
		?><script>alert('Wrong Old Password.'); window.location='myaccount.php';</script><?php 
	}
	else{
		$update_sql_array=array();
		$update_sql_array['password'] = $newpassword;
		$this->db->pdoupdate(WR_USER,$update_sql_array,'id',$_SESSION['userid']);
		?><script>alert('Password Updated Successfully.'); window.location='myaccount.php';</script><?php 
	}
}

function footerJS(){
?>
<script>
	var password = document.getElementById("password")
	, confirm_password = document.getElementById("confirm_password");
	
	function validatePassword(){
		if(password.value != confirm_password.value) {
			confirm_password.setCustomValidity("Passwords Don't Match");
		} else {
			confirm_password.setCustomValidity('');
		}
	}
	
	password.onchange = validatePassword;
	confirm_password.onkeyup = validatePassword;
</script>
<?php 
}



} // End of Class
?>