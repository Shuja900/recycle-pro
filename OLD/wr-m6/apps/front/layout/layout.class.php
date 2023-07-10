<?php 
// Front Website Layout Class contains all functions to manage front website layout functions. 
class LayoutClass{

function __construct(){
	$this->db = new database(DATABASE_HOST,DATABASE_PORT,DATABASE_USER,DATABASE_PASSWORD,DATABASE_NAME);
}
function pageHead($pgname=''){
?>
		<header class="header">
			<!-- Header Top Area -->
			<div class="header-top bg-white">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-7 col-md-7 col-sm-7 col-12">
							<p class="header-welcomemsg">Welcome to <span>M6Repairs Online</span> Shopping Store !</p>
						</div>
						<div class="col-lg-5 col-md-5 col-sm-5 col-12">
							<?php if($_SESSION['userid']){ ?>
							<div class="header-langcurr">
								<div class="select-currency">
									<a class="select-currency-current" href="myaccount.php">Hi <?php echo $_SESSION['username']; ?>!</a>
								</div>
								<div class="select-language">
									<a class="select-language-current" href="logout.php">Logout</a>
								</div>
							</div>
							<?php } 
							else {
							?>
							<div class="header-langcurr">
								<div class="select-currency">
									<a class="select-currency-current" href="login.php">Login</a>
								</div>
								<div class="select-language">
									<a class="select-language-current" href="register.php">Register</a>
								</div>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<!--// Header Top Area -->
			<!-- Header Middle Area -->
			<div class="header-middle bg-theme">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-3 col-md-6 col-sm-6 order-1 order-lg-1">
							<a href="index.php" class="header-logo">
								<img src="img/m6-logo-1.png" alt="logo">
							</a>
						</div>
						<div class="col-lg-6 col-12 order-3 order-lg-2">
							<?php /*?><form action="#" class="header-searchbox">
								<select class="select-searchcategory">
									<option value="0">All categories</option>
									<option value="1">Mobile</option>
									<option value="2">Laptops</option>
									<option value="3">Tablets</option>
									<option value="4">Ipods</option>
									<option value="5">Game Consoles</option>
								</select>
								<input type="text" placeholder="Enter your model name ...">
								<button type="submit"><i class="lnr lnr-magnifier"></i></button>
							</form><?php */?>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6 order-2 order-lg-3">
							<div class="header-icons">
								<div class="header-account">
									<button class="header-accountbox-trigger"><span class="lnr lnr-user"></span> My Account <i class="ion ion-ios-arrow-down"></i></button>
									<ul class="header-accountbox dropdown-list">
										<li>
											<a href="myaccount.php">My account</a>
										</li>
										<?php if($_SESSION['userid']){ ?>
										<li>
											<a href="logout.php">Logout</a>
										</li>
										<?php } 
										else {?>
										<li>
											<a href="login.php">Sign in</a>
										</li>
										<?php } ?>
									</ul>
								</div>
								<div class="header-cart">
									<a class="header-carticon" href="cart.php" onclick="window.location='cart.php'"><i class="lnr lnr-cart"></i><span class="count"><?php echo count($_SESSION['products']); ?></span></a>
									<?php /*?><!-- Minicart -->
									<div class="header-minicart minicart">
										<div class="minicart-header">
											<div class="minicart-product">
												<div class="minicart-productimage">
													<a href="#">
														<img src="images/products/s1.jpg" alt="product image">
													</a>
													<span class="minicart-productquantity">S1</span>
												</div>
												<div class="minicart-productcontent">
													<h6><a href="#">Lorem ipsum dolor</a></h6>
													<span class="minicart-productprice">$43.00</span>
												</div>
												<button class="minicart-productclose"><i class="ion ion-ios-close-circle"></i></button>
											</div>
										</div>
										<ul class="minicart-pricing">
											<li>Total <span>$31.12</span></li>
										</ul>
										<div class="minicart-footer">
											<a href="#" class="ho-button ho-button-fullwidth">
												<span>Confirm selling</span>
											</a>
											<!--<a href="checkout.html" class="ho-button ho-button-dark ho-button-fullwidth">
												<span>Checkout</span>
											</a>-->
										</div>
									</div>
									<!--// Minicart --><?php */?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--// Header Middle Area -->
			<!-- Header Bottom Area -->
			<div class="header-bottom bg-theme">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-10 d-none d-lg-block">
							<!-- Navigation -->
							<nav class="ho-navigation">
								<ul>
									<li class="<?php if($pgname=='home') echo 'active'; ?>">
										<a href="index.php">Home</a>
									</li>
									<li class="dropdown-holder <?php if($pgname=='services') echo 'active'; ?>">
										<a href="brands.php">Our Services</a>
										<ul class="hodropdown">
											<?php 
											$sql = "select * from ".WR_PROCAT." order by sorting asc";
											$record = $this->db->fetch_query($sql,$this->db->pdo_open());
											foreach ($record as $arr)
											{
											?>
											<li><a href="brands.php?p=<?php echo $arr['category']; ?>"><?php echo $arr['category']; ?></a></li>
											<?php
											}
											?>
										</ul>
									</li>
									<li class="dropdown-holder <?php if($pgname=='device') echo 'active'; ?>">
										<a href="brands.php">Sell Your Device</a>
										<ul class="hodropdown">
											<?php 
											$sql = "select * from ".WR_BRANDS." order by sorting asc";
											$record = $this->db->fetch_query($sql,$this->db->pdo_open());
											foreach ($record as $arr)
											{
											?>
											<li><a href="products.php?b=<?php echo $arr['url']; ?>&bid=<?php echo $arr['id']; ?>&pc=1"><?php echo $arr['brand_name']; ?></a></li>
											<?php
											}
											?>
										</ul>
									</li>
									<li class="<?php if($pgname=='blog') echo 'active'; ?>">
										<a href="blog.php">Blog</a>
									</li>
									<li class="<?php if($pgname=='about') echo 'active'; ?>">
										<a href="page.php?p=1&h=about-us">About Us</a>
									</li>
									<li class="<?php if($pgname=='contact') echo 'active'; ?>">
										<a href="contact.php"> Contact</a>
									</li>
								</ul>
							</nav>
							<!--// Navigation -->
						</div>
						<div class="col-lg-2">
							<div class="header-contactinfo">
								<i class="flaticon-support"></i>
								<span>Call Us Now:</span>
								<b>+0123456789</b>
							</div>
						</div>
						<div class="col-12 d-block d-lg-none">
							<div class="mobile-menu clearfix"></div>
						</div>
					</div>
				</div>
			</div>
			<!--// Header Bottom Area -->
		</header>
<?php 
}	
function footer(){
?>
		<footer class="footer bg-white">
			<!-- Footer Top Area -->
			<div class="footer-toparea">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-12">
							<div class="footer-widget widget-info">
								<h5 class="footer-widget-title">Contact Info</h5>
								<ul>
									<li><i class="ion ion-ios-pin"></i> 170, Slade Road, Birmingham, B23 7PX. UK</li>
									<li><i class="ion ion-ios-call"></i> Call us: +44 (121) 382-2532</li>
									<li><i class="ion ion-ios-mail"></i> Email us: <a href="mailto:info@m6repairs.co.uk">info@m6repairs.co.uk</a></li>
									<li><i class="ion ion-ios-glode"></i> www.m6repairs.co.uk</li>
								</ul>
							</div>
						</div>
						<div class="col-lg-2 col-md-4">
							<div class="footer-widget widget-links">
								<h5 class="footer-widget-title">Our Services</h5>
								<ul>
									<li><a href="page.php?p=2&h=pc-laptop-repair">Mac PC & Laptop Repair</a></li>
									<li><a href="page.php?p=3&h=mobile-screen-repair">Mobile/Tablet Screen Repair</a></li>
									<li><a href="page.php?p=4&h=tablet-ipad-repair">Tablet/ IPadRepair</a></li>
									<li><a href="page.php?p=5&h=game-consoles-repair">Game Consoles Repair</a></li>
									<li><a href="page.php?p=6&h=phone-network-unlock">Phone Network Unlocking</a></li>
									<li><a href="page.php?p=7&h=water-damage-repair">Water Damage Repair</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-2 col-md-4">
							<div class="footer-widget widget-links">
								<h5 class="footer-widget-title">Our Company</h5>
								<ul>
									<li><a href="page.php?p=1&h=about-us">About us</a></li>
									<li><a href="page.php?p=7&h=terms-and-conditions">Terms and Conditions</a></li>
									<li><a href="page.php?p=7&h=privacy-policy">Privacy Policy</a></li>
									<li><a href="contact.php">Contact Us</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-2 col-md-4">
							<div class="footer-widget widget-links">
								<h5 class="footer-widget-title">Your Account</h5>
								<ul>
									<li><a href="#">Personal info</a></li>
									<li><a href="#">Orders</a></li>
									<li><a href="#">Addresses</a></li>
									<li><a href="#">My wishlists</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-3 col-12">
							<div class="footer-widget widget-customerservice">
								<div class="info">
									<h5 class="footer-widget-title">CUSTOMER SERVICE</h5>
									<h5>SEND AN EMAIL</h5>
									<h5>HOTLINE: <br /><a href="#">+44 (121) 382-2532</a></h5>
									<h6>8:00AM-5.30PM AEST MON-FRI</h6>
								</div>
								<div class="payment">
									<h6>SECURE PAYMENT VIA</h6>
									<img src="images/icons/payment.png" alt="footer payment">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--// Footer Top Area -->
			<!-- Footer Bottom -->
			<div class="footer-bottomarea">
				<div class="container">
					<div class="footer-copyright">
						<p class="copyright">Copyright &copy; <a href="#">M6Repairs</a> . All Rights Reserved</p>
					</div>
				</div>
			</div>
			<!--// Footer Bottom -->
		</footer>
<?php 
}	

function NewsLetterArea(){
?>
<div class="ho-section newsletter-area bg-grey ptb-50">
	<div class="container">
		<div class="newsletter">
			<div class="newsletter-title">
				<h2>Subscribe to our <span>Newsletter!</span></h2>

			</div>
			<div class="newsletter-content">
				<form id="mc-form" class="newsletter-form">
					<input id="mc-email" type="email" autocomplete="off" placeholder="Your email address...">
					<button id="mc-submit" type="submit">Subscribe</button>
				</form>
				<!-- mailchimp-alerts start -->
				<div class="mailchimp-alerts text-centre">
					<div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
					<div class="mailchimp-success"></div><!-- mailchimp-success end -->
					<div class="mailchimp-error"></div><!-- mailchimp-error end -->
				</div><!-- mailchimp-alerts end -->
			</div>
			<div class="newsletter-socialicons socialicons socialicons-radial">
				<ul>
					<li><a href="#"><i class="ion ion-logo-facebook"></i></a></li>
					<li><a href="#"><i class="ion ion-logo-twitter"></i></a></li>
					<li><a href="#"><i class="ion ion-logo-youtube"></i></a></li>
					<li><a href="#"><i class="ion ion-logo-google"></i></a></li>
					<li><a href="#"><i class="ion ion-logo-instagram"></i></a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<?php 
}

	function getCenters(){
	?>
	<div class="section-full content-inner bg-white">
		<div class="container">
			<?php 
				$x=1;
				$sql = "select * from ".WR_CENTERS." where status='Show' order by sorting asc";
				$record = $this->db->fetch_query($sql,$this->db->pdo_open());
				foreach ($record as $arr)
				{
					if($x==1){
					echo '<div class="row m-b50">';
					}
				?>
				<div class="col-md-4">
					<div class="locationdiv">
						<h4 class="centerhead"><span><?php echo $arr['center_name']; ?></span></h4>
						<h6 class="m-b0">Address</h6>
						<?php echo $arr['address']; ?>
						<div class="dottedbottom"><a href="#"><strong><i class="fa fa-map-marker text-blue"></i>&nbsp; Get directions</strong></a></div>
						<div class="dottedbottom"><a href="#"><strong><i class="fa fa-map text-blue"></i> View on map</strong></a></div>
						<div class="showservice">
						<h6 class="service-head">Services Offered</h6>
						<?php echo $arr['services']; ?>
						</div>
					</div>
				</div>
			<?php 
					if($x==3){
					echo '</div>';
					$x=0;
					}
					$x++;
				} ?>
		</div>
	</div>	
	<?php 
	}
}