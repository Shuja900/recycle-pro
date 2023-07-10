<?php 
// Front Website User Class contains all functions to manage front website user functions. 
class UserClass{

function __construct(){
	$this->db = new database(DATABASE_HOST,DATABASE_PORT,DATABASE_USER,DATABASE_PASSWORD,DATABASE_NAME);
	$this->auth=new Authentication();
}


function UserRegister($runat){

	switch($runat){
		case 'local':
	?>
			<div class="my-account-area ptb-30">
                <div class="container">
                    <div class="row">
						<div class="col-lg-3"></div>
                        <!-- Login Form -->
                        <div class="col-lg-6">
							<div class="col-lg-12 login-tabs pl-0 pr-0">
								<div class="login-tabs-inner login-tab-1">
									<a href="login.html">I HAVE AN ACCOUNT</a>
								</div>
								<div class="login-tabs-inner login-tab-2 login-tab-active">
									<a href="javascript: void(0);">I AM NEW HERE &nbsp; &nbsp; &nbsp;</a>
								</div>
							</div>
                            <div class="login-form-wrapper logintab-clearfix">
                                	<form action="" class="ho-form ho-form-boxed" method="post">
										<div class="ho-form-inner">
											<div class="single-input">
												<label for="fname">First Name</label>
												<input type="text" name="fname" id="fname" required>
											</div>
											<div class="single-input">
												<label for="lname">Last Name</label>
												<input type="text" name="lname" id="lname" required>
											</div>
											<div class="single-input">
												<label for="email">Email Address</label>
												<input type="email" name="email" id="email" required>
											</div>
											<div class="single-input">
												<label for="phone">Phone Number</label>
												<input type="number" name="phone" id="phone" required>
											</div>
											<div class="single-input">
												<label for="password">Password</label>
												<input type="password" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
											</div>
											<div class="single-input">
												<button type="submit" name="regbtn" value="Register" class="ho-button ho-button-dark">
													<span>Create Account</span>
												</button>
											</div>
											<small class="mt-10">By creating an account you agree to our <a href="#">Terms and conditions</a> & <a href="#">Privacy policy</a></small>
										</div>
									</form>
                            </div>
                        </div>
                        <!--// Login Form -->
						<div class="col-lg-3"></div>

                    </div>
                </div>
            </div>
	<?php 
		break;
		case 'server':
				extract($_REQUEST);
				$sql = "select * from ".WR_USER." where email='".$email."' ";
				$record = $this->db->row($sql,$this->db->pdo_open());
				if($record['id']!=''){
				
					echo 'Your Email-ID is already registered with us. Please login using your Email-ID';
				
				}
				else{
					
					$insert_sql_array=array();
					$insert_sql_array['fname'] = $fname;
					$insert_sql_array['lname'] = $lname;
					$insert_sql_array['phone'] = $phone;
					$insert_sql_array['email'] = $email;
					$insert_sql_array['password'] = $password;
					$id=$this->db->pdoinsert(WR_USER,$insert_sql_array);
					
					//echo 'You have successfully registered with us. Now Please login to continue. Thank You!'.$id;
					?>
					
						<div class="my-account-area ptb-30">
							<div class="container">
								<div class="row">
									<div class="col-lg-3"></div>
									<!-- Login Form -->
									<div class="col-lg-6">
										<div class="login-form-wrapper logintab-clearfix">
											<div class="regsuccess">
												<h1>Registration Successful!</h1>
												<p>Thank You for registering with us. Now Please login to continue. </p>
											</div>	
											
											<h3 class="text-center mt-25"><a href="login.php">Click Here to go to Login Page</a></h3>
										</div>
									</div>
									<!--// Login Form -->
									<div class="col-lg-3"></div>
			
								</div>
							</div>
						</div>
					
					<?php 
				
				}
			
			
			
		break;
		
		default: 
			echo 'Wrong Page!';
			break;
		
	}
}

function LoginUser(){
?>
			<form action="" class="ho-form ho-form-boxed" method="post">
				<div class="ho-form-inner">
					<div class="single-input">
						<label for="login-form-email">Email address *</label>
						<input type="text" name="email" id="login-form-email">
					</div>
					<div class="single-input">
						<label for="login-form-password">Password *</label>
						<input type="password" name="password" id="login-form-password">
					</div>
					<div class="single-input">
						<button type="submit" name="loginsbt" value="loginfrm" class="ho-button ho-button-dark mr-3">
							<span>Login</span>
						</button>
						
					</div>
					<div class="single-input">
						<a href="#">Lost your password?</a>
					</div>
				</div>
			</form>
<?php 
}

function LoginSubmit(){
	extract($_REQUEST);
	$sql = "select * from ".WR_USER." where email='".$email."' and password='".$password."' ";
	$record = $this->db->row($sql,$this->db->pdo_open());
	if($record['id']!=''){
		$this->auth->Create_Session($record['id'],$record['fname'],'','','');
		?><script>window.location='index.php';</script><?php 
	}
	else{
		?>
		<div class="loginerr" style="background:#FF0033; padding:20px 20px;">
			<p>Invalid email or password. Please Try Again.</p>
		</div>
		<?php 
		$this->LoginUser();
	}
}

function AddFromToDb(){
	extract($_REQUEST);
	$insert_sql_array=array();
	$insert_sql_array['category'] = $category;
	$insert_sql_array['model'] = $model;
	$insert_sql_array['sorting'] = $sorting;
	$insert_sql_array['status'] = $status;
	$id=$this->db->pdoinsert(WR_USER,$insert_sql_array);
	?>
	<script>window.location='managemodel.php';</script>
	<?php
}
function UpdateFormDb($id){
	extract($_REQUEST);
	$update_sql_array1=array();
	$update_sql_array1['category'] = $category;
	$update_sql_array1['model'] = $model;
	$update_sql_array1['sorting'] = $sorting;
	$update_sql_array1['status'] = $status;
	$this->db->pdoupdate(WR_MODEL,$update_sql_array1,id,$id);
	?>
	<script>window.location='managemodel.php';</script>
	<?php 
}



} // End of Class
?>