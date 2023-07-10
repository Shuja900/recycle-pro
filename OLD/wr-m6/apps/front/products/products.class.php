<?php 
// Front Product Class contains all functions to manage front website product functions. 
class FrontProductClass{
function __construct(){
	$this->db = new database(DATABASE_HOST,DATABASE_PORT,DATABASE_USER,DATABASE_PASSWORD,DATABASE_NAME);
}

function ShowAllProducts(){
?>
<div class="container">
	<!--<div class="banner-area">
		<div class="imgbanner imgbanner-2">
			<a href="product-details.html">
				<img src="images/banner/banner-image-20.jpg" alt="banner">
			</a>
		</div>
	</div>-->
	<div class="row">
		<div class="col-md-12">
			<h1>It's so easy to sell <span class="text-blue" style="text-transform:capitalize"><?php echo $_REQUEST['b']; ?></span> with <span class="text-blue">M6 Mobile</span>.</h1>
			<h3>Please select the gigabyte (GB) size of the Phone you want to sell.</h3>
		</div>
	</div>
	<div class="shop-page-products mt-30">
		<div class="row no-gutters">
			<?php 
			$x=1;
			$sql = "select * from ".WR_PRODUCT." where brand='".$_REQUEST['bid']."' and category='".$_REQUEST['pc']."' order by sorting asc";
			$record = $this->db->fetch_query($sql,$this->db->pdo_open());
			foreach ($record as $arr)
			{
			?>
			<div class="col-lg-3 col-md-4 col-sm-6 col-12">
				<!-- Single Product -->
				<article class="hoproduct">
					<div class="hoproduct-image">
						<a class="hoproduct-thumb" href="javascript:void(0);" style="cursor:auto;">
							<img class="hoproduct-frontimage" src="<?php echo BASE_FILRDIR.$arr['pro_img']; ?>" alt="<?php echo $arr['productname']; ?>">
							<img class="hoproduct-backimage" src="<?php echo BASE_FILRDIR.$arr['pro_img']; ?>" alt="<?php echo $arr['productname']; ?>">
						</a>
						
					</div>
					<div class="text-center">
						<h2 style="color:#333333; font-size:16px; margin-top:20px;"><?php echo $arr['productname']; ?></h2>
						<?php 
						$sql2 = "select * from ".WR_PRODUCT_PRICE." where product_id='".$arr['id']."' order by id asc";
						$record2 = $this->db->fetch_query($sql2,$this->db->pdo_open());
						foreach ($record2 as $arr2)
						{
						?>
						<a  href="product-view.php?pid=<?php echo $arr['id']; ?>&vid=<?php echo $arr2['variant']; ?>" class="btn btn-success btn-sm text-white" style="margin-bottom:5px;"><?php echo $this->getProductVariant($arr2['variant']); ?></a>
						<?php 
						}
						?>
					</div>
				</article>
				<!--// Single Product -->
			</div>
			<?php 
			}
			?>
		</div>
	</div>

	<!--<div class="cr-pagination pt-30">
		<p>Showing 1-12 of 13 item(s)</p>
		<ul>
			<li><a href="shop-rightsidebar.html"><i class="ion ion-ios-arrow-back"></i> Previous</a></li>
			<li class="active"><a href="shop-rightsidebar.html">1</a></li>
			<li><a href="shop-rightsidebar.html">2</a></li>
			<li><a href="shop-rightsidebar.html">Next <i class="ion ion-ios-arrow-forward"></i></a></li>
		</ul>
	</div>-->

</div>
<?php 
}


function getProductVariant($id){
$sql = "select model from ".WR_MODEL." where id='".$id."' ";
$record = $this->db->row($sql,$this->db->pdo_open());
return $record['model'];
}

function getBrandName($id,$col='brand_name'){
$sql = "select ".$col." from ".WR_BRANDS." where id='".$id."' ";
$record = $this->db->row($sql,$this->db->pdo_open());
return $record[$col];
}

function ProductBreadcrums($pid,$vid){
$sql = "select * from ".WR_PRODUCT." where id='".$pid."' ";
$row = $this->db->row($sql,$this->db->pdo_open());

$brandname = $this->getBrandName($row['brand']);
$brandURL = $this->getBrandName($row['brand'],'url');
?>
<div class="breadcrumb-area bg-grey">
	<div class="container">
		<div class="ho-breadcrumb">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="products.php?b=<?php echo $brandURL; ?>&bid=<?php echo $row['brand']; ?>&pc=<?php echo $row['category']; ?>"><?php echo $brandname; ?></a></li>
				<li>Sell <?php echo $brandname; ?> </li>
			</ul>
		</div>
	</div>
</div>
<?php 
}

function ProductView($pid,$vid){

$sql = "select * from ".WR_PRODUCT." where id='".$pid."' ";
$row = $this->db->row($sql,$this->db->pdo_open());

$sql_p = "select * from ".WR_PRODUCT_PRICE." where product_id='".$pid."' and variant='".$vid."' ";
$row_p = $this->db->row($sql_p,$this->db->pdo_open());

$price = $row_p['price']; 
$FLprice = $row_p['faulty_price'];
$SCprice = $row_p['scrap_price']; 
$varient = $this->getProductVariant($vid);
$brandname = $this->getBrandName($row['brand']);
$product = $row['productname'];
?>
<div class="container">
	<form name="prosell" id="procell" action="" method="post">
	<div class="pdetails">
		<div class="row">
			<div class="col-lg-12"><h2><span style="color:#0B88EE; text-transform:uppercase;"><?php echo $brandname; ?></span>: <?php echo $product; ?></h2></div>
			<!--<div class="col-lg-3">
				
			</div>-->
			<div class="col-lg-7">
				<div class="row">
				<div class="col-lg-4">
					<div class="pdetails-images">
						<div class="">
							<div class="pdetails-singleimage" style="border:#0b88ee 3px solid;">
								<img src="<?php echo BASE_FILRDIR.$row['pro_img']; ?>" alt="<?php echo $product; ?>">
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-8">
					<div class="pdetails-content">
						<div class="pdetails-pricebox">
							<!--<del class="oldprice">$35.90</del>-->
							<span class="price">Offer Price: &pound; <span class="propricediv"><?php echo $price; ?></span></span>
							<?php /*?><span class="badge">128 GB</span><?php */?>
						</div>
						<h5>Select your Network Below.</h5>
						<div class="col-md-12">
						<?php 
							$x=1;
							
							$sql = "select * from ".WR_NETWORK_CAT." order by sorting desc";
							$record = $this->db->fetch_query($sql,$this->db->pdo_open());
							foreach ($record as $arr)
							{
								?>
								<div class="row " style="margin-bottom:5px;">
								<a href="javascript:void;" class="netwrkval networkimg" data-id="<?php echo $arr['id']; ?>" data-pr="<?php echo $arr['price']; ?>">
								<?php 
								$allnetwork='';
								$sql2 = "select * from ".WR_MOBILE_NETWORK." where network_cat='".$arr['id']."' order by sorting asc";
								$record2 = $this->db->fetch_query($sql2,$this->db->pdo_open());
								foreach ($record2 as $row)
								{
									$allnetwork=$row['network_name'].', '.$allnetwork;
							?>
									<img src="<?php echo 'uploads/'.$row['network_img']; ?>" class="">
							<?php 
								}
								?>
								  <input type="hidden" value="<?php echo $allnetwork; ?>" name="allnet<?php echo $arr['id']; ?>" id="allnet<?php echo $arr['id']; ?>" />
								  </a>
								  </div>
								<?php 
								$x++;
							}
						?>
						<?php /*?><div class="row">
							<a href="#"><img src="img/network/Unlocked_Unselected.png" class="networkimg networkimgactive"></a>
							<a href="#"><img src="img/network/O2_Unselected.png" class="networkimg"></a>
							<a href="#"><img src="img/network/Orange_Unselected.png" class="networkimg"></a>
							<a href="#"><img src="img/network/Vodafone_Unselected.png" class="networkimg"></a>
							<a href="#"><img src="img/network/3_Unselected.png" class="networkimg"></a>
							<a href="#"><img src="img/network/EE_Unselected.png" class="networkimg"></a>
							<a href="#"><img src="img/network/Tesco_Unselected.png" class="networkimg"></a>
							<a href="#"><img src="img/network/Virgin_Unselected.png" class="networkimg"></a>
							<a href="#"><img src="img/network/T-Mobile_Unselected.png" class="networkimg"></a>
							<a href="#"><img src="img/network/Unknown_Unselected.png" class="networkimg"></a>
						</div><?php */?>
						</div>
						
					</div>
				</div>
				<div class="col-lg-12">
						<div class="pdetails-groupproduct">
							<div class="table-responsive">
								<table class="table table-bordered ">
									<tbody>
										<tr>
											<td class="product-quantity">
												<b>Qty</b>
												<div class="quantity-select">
													<input type="text" value="1" name="proqty" id="proqty" class="proqtycall">
													<div class="inc qtybutton" onclick="coset()">+<i class="ion ion-ios-arrow-up"></i></div>
													<div class="dec qtybutton">-<i class="ion ion-ios-arrow-down"></i></div>
												</div>
											</td>
											<td class="pro-title">
												<?php echo $product; ?> <?php echo $varient; ?>
											</td>
											<td class="pro-price"><span>&pound; <span class="propricediv"><?php echo $price; ?></span></span></td>
										</tr>
										
									</tbody>
								</table>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<h5 class="mt-30">Please select your condition</h5>
								<a href="javascript:void;" class="ho-button mobcondi" data-id="Good" data-val="<?php echo $price; ?>" id="goodprz">
								<span>Good</span>
								</a>
								<a href="javascript:void;" class="ho-button mobcondi" data-id="Faulty" data-val="<?php echo $FLprice; ?>" id="faultyprz">
								<span>Faulty</span>
								</a>
								<a href="javascript:void;" class="ho-button mobcondi" data-id="Scrap" data-val="<?php echo $SCprice; ?>" id="scrapprz">
								<span>Scrap</span>
								</a>
							</div>
							<div class="col-lg-12">
								<div class="bg-grey p-20 mt-25">
									<h5>Condition - Good:</h5>
									<p><strong>You don't need to send your charger, accessories or the original box!</strong></p>
									<ul class="pl-10">
										<li>Everything works as it should</li>
										<li>No major damage (i.e chips or cracks to the screen or phone)</li>
										<li>No water damage</li>
										<li>Light wear and tear acceptable</li>
									</ul>
									
								</div>

							</div>
						</div>
						
						<!--<div class="pdetails-categories">
							<span>Categories :</span>
							<ul>
								<li><a href="shop-rightsidebar.html">Mobile</a></li>
							</ul>
						</div>-->
						
						<!--<div class="pdetails-socialshare">
							<span>Share :</span>
							<ul>
								<li><a href="#"><i class="ion ion-logo-facebook"></i></a></li>
								<li><a href="#"><i class="ion ion-logo-twitter"></i></a></li>
								<li><a href="#"><i class="ion ion-logo-googleplus"></i></a></li>
								<li><a href="#"><i class="ion ion-logo-pinterest"></i></a></li>
							</ul>
						</div>-->
				</div>
				</div>
			</div>
			<div class="col-lg-5">
				<div class="order-infobox">
					
					<div class="checkout-table table-responsive">
						
						<table class="table">
							<thead>
								<tr>
									<th class="text-left"><h3>ITEM SUMMARY</h3></th>
									<th class="text-right"></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th class="text-left">Device</th>
									<td class="text-right text-blue"><?php echo $brandname; ?> <?php echo $product; ?></td>
								</tr>
								<tr>
									<th class="text-left">Storage</th>
									<td class="text-right text-blue"><?php echo $varient; ?></td>
								</tr>
								<tr>
									<th class="text-left">Network</th>
									<td class="text-right text-blue"><span id="nettxt">-</span></td>
								</tr>
								<tr>
									<th class="text-left">Condition</th>
									<td class="text-right text-blue"><span id="product_condition_text">-</span></td>
								</tr>
							</tbody>
							<tfoot>
								<tr class="total-price">
									<th class="text-left">Offer Price</th>
									<td class="text-right">&pound; <span id="totalrez"><?php echo $price; ?></span></td>
								</tr>
							</tfoot>
						</table>
					</div>
					<div class="payment-method">
						<div class="yellow-notice">
							<p><img src="img/imortant-icon.png" style="max-height:38px;" /><br>
							Please <strong>REMOVE</strong> your <strong>iCloud account</strong> before sending your device to us.</p>
						</div>
					</div>
					<button class="ho-button ho-button-fullwidth mt-30 pull-right" type="submit" name="submit" value="prosubmit">
						<i class="lnr lnr-cart"></i>
						<span>Proceed to Sell</span>
					</button>
					
					<span id="pgerr"></span>
				</div>
			</div>
		</div>
	</div>
	
	<input type="hidden" value="<?php echo $pid; ?>" name="pid" id="pid" required />
	<input type="hidden" value="<?php echo $vid; ?>" name="vid" id="vid" required />
	<input type="hidden" value="<?php echo $price; ?>" name="price" id="price" required />
	<input type="hidden" value="" name="network" id="network" required />
	<input type="hidden" value="" name="network_price" id="network_price" required />
	<input type="hidden" value="" name="product_condition" id="product_condition" required />
	<input type="hidden" value="" name="total" id="total" required />
	
	</form>
</div>
<?php 
//unset($_SESSION['products']);
/*echo '<pre>';
print_r($_SESSION['products']);
echo '</pre>';*/

/*$findKey = $this->search_revisions($_SESSION['products'],'15', 'pid');
print_r($findKey);*/
}

function multi_array_search($array, $search){
    // Create the result array
    $result = array();
    // Iterate over each array element
    foreach ($array as $key => $value)
    {
      // Iterate over each search condition
      foreach ($search as $k => $v)
      {
        // If the array element does not meet the search condition then continue to the next element
        if (!isset($value[$k]) || $value[$k] != $v)
        {
          continue 2;
        }
      }
      // Add the array element's key to the result array
      $result[] = $key;
    }
    // Return the result array
    return $result;
}

function AddToCart(){
extract($_REQUEST);
	if($_SESSION['products']!=''){
	$findKey = $this->multi_array_search($_SESSION['products'], array('pid' => $pid, 'vid' => $vid, 'network'=>$network, 'product_condition'=>$product_condition));
	$keyval =  $findKey[0];
	}
	
	if($findKey){
	$xx = $_SESSION['products'][$keyval]['proqty'];
	$totxx = $_SESSION['products'][$keyval]['total'];
	$condiprice = 0;
	if($product_condition=='Faulty')
	$condiprice = $price/2;
	$temp1=($condiprice*$proqty) - $network_price;
	$_SESSION['products'][$keyval]['proqty'] = $xx+$proqty;
	$_SESSION['products'][$keyval]['total'] = $totxx+$temp1;
	}
	else{
	$_SESSION['products'][] = array('pid'=>$pid, 'vid'=>$vid, 'price'=>$price, 'proqty'=>$proqty, 'network'=>$network, 'network_price'=>$network_price, 'product_condition'=>$product_condition, 'total'=>$total);
	}
	?>
	<script>window.location='cart.php';</script>
	<?php 
}

function ShowCart(){
/*echo '<pre>';
print_r($_SESSION['products']);
echo '</pre>';*/
?>
			<div class="cart-page-area ptb-30 bg-white">
                <div class="container">
					<form name="procart" id="procart" action="" method="post">
                    <!-- Cart Products -->
                    <div class="cart-table table-responsive">
                        <table class="table table-bordered table-hover mb-0">
                            <thead>
                                <tr>
                                    <th class="cart-column-image" scope="col">PRODUCT</th>
                                    <th class="cart-column-productname" scope="col">SPECIFICATIONS</th>
                                    <th class="cart-column-price" scope="col">PRICE</th>
                                    <th class="cart-column-quantity" scope="col">QUANTITY</th>
                                    <th class="cart-column-total" scope="col">TOTAL</th>
                                    <th class="cart-column-remove" scope="col">REMOVE</th>
                                </tr>
                            </thead>
                            <tbody>
							
										<?php 
										$x=1;
										$grandtotal=0;
										$num = count($_SESSION['products']);
										if($num>0){
										foreach($_SESSION['products'] AS $product){
										$sql = "select * from ".WR_PRODUCT." where id='".$product['pid']."' ";
										$row = $this->db->row($sql,$this->db->pdo_open());
										
										$sql_p = "select * from ".WR_PRODUCT_PRICE." where product_id='".$product['pid']."' and variant='".$product['vid']."' ";
										$row_p = $this->db->row($sql_p,$this->db->pdo_open());
										
										$varient = $this->getProductVariant($product['vid']);
										$brandname = $this->getBrandName($row['brand']);
										?>
										<tr>
											<td>
												<a href="product-view.php?pid=<?php echo $product['pid']; ?>&vid=<?php echo $product['vid']; ?>" class="product-image">
													<img src="wr-m6/uploads/<?php echo $row['pro_img']; ?>" alt="product image">
												</a>
												<p><a href="product-view.php?pid=<?php echo $product['pid']; ?>&vid=<?php echo $product['vid']; ?>" class="product-title">
												<?php echo $row['productname']; ?><br />
												(<?php echo $varient; ?>)
												</a></p>
											</td>
											<td>
												<?php if($product['product_condition']!='Scrap'){ ?>
												Network Fee: <?php //echo $product['network']; ?> - &pound;<?php echo $product['network_price']; ?><br />
												<?php } ?>
												Product Condition: <?php echo $product['product_condition']; ?>
											</td>
											<td>&pound; <?php echo $product['price']; ?></td>
											<td>
												<div class="quantity-select">
													<input type="text" value="<?php echo $product['proqty']; ?>">
													<div class="inc qtybutton">+<i class="ion ion-ios-arrow-up"></i></div>
													<div class="dec qtybutton">-<i class="ion ion-ios-arrow-down"></i></div>
												</div>
											</td>
											<td>
												<span class="total-price">&pound; <?php echo $product['total']; ?></span>
											</td>
											<td>
												<button class="remove-product delcart" data-id="<?php echo $x-1; ?>"><i class="ion ion-ios-close"></i></button>
											</td>
										</tr>
										<?php 
										$grandtotal=$grandtotal+$product['total'];
										$x++;
									}
									}
								?>
                            </tbody>
                        </table>
                    </div>
                    <!--// Cart Products -->

                    <!-- Cart Content -->
                    <div class="cart-content">
                        <div class="row justify-content-between">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="cart-content-left">
                                    <div class="ho-buttongroup">
										<a href="cart.php?index=clearcart" class="ho-button ho-button-sm" style="margin-bottom:5px;"><span>Clear Cart</span></a>
										
                                        <a href="#" class="ho-button ho-button-sm">
                                            <span>Update Cart</span>
                                        </a>
                                        <a href="brands.php" class="ho-button ho-button-sm">
                                            <span>Continue Shopping</span>
                                        </a>
                                    </div>
                                    <?php /*?><div class="cart-content-coupon">
                                        <h6>COUPON</h6>
                                        <p>Enter your coupon code if you have one.</p>
                                        <form action="#" class="coupon-form">
                                            <input type="text" placeholder="Coupon code">
                                            <button class="ho-button">
                                                <span>Apply Coupon</span>
                                            </button>
                                        </form>
                                    </div><?php */?>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="cart-content-right">
                                    <h2>CART TOTALS</h2>
                                    <table class="cart-pricing-table">
                                        <tbody>
                                            <?php /*?><tr class="cart-subtotal">
                                                <th>SUBTOTAL</th>
                                                <td>$715.00</td>
                                            </tr>
                                            <tr class="cart-shipping">
                                                <th>SHIPPING</th>
                                                <td>$7.00</td>
                                            </tr><?php */?>
                                            <tr class="cart-total">
                                                <th>Total</th>
                                                <td>&pound; <?php echo $grandtotal; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
									<?php 
										if($_SESSION['userid'])
										$linkkx= 'checkout.php';
										else 
										$linkkx= 'login.php';
									?>
									<a href="<?php echo $linkkx; ?>" class="ho-button">
                                        <span>Proceed to Checkout</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--// Cart Content -->
					</form>
                </div>
            </div>


<?php 
}

function ClearCart(){
	unset($_SESSION['products']);
	?>
	<script>window.location='cart.php';</script>
	<?php 
}

function CartJS(){
?>
<script>
$( ".delcart" ).click(function() {
	var delpro = $(this).attr("data-id");
});
</script>
<?php 
}

function ProductJS(){
?>
<script>
$( ".mobcondi" ).click(function() {
	var cundi = $(this).attr("data-id");
	var proprice = $(this).attr("data-val");
	$("a.ho-button-green").removeClass("ho-button-green");
   	$(this).addClass("ho-button-green");
	$("#product_condition_text").text(cundi);
	$("#product_condition").val(cundi);
	$("#price").val(proprice)
	coset();
});


$( ".proqtycall" ).change(function() {
	coset();
});
$( ".proqtycall" ).click(function() {
	coset();
});


$( ".netwrkval" ).click(function() {
	var netidzz = $(this).attr("data-id");
	var netvalzz = $(this).attr("data-pr");
	var dividval = $(this).find('input').val();
	
	$("a.networkimgactive").removeClass("networkimgactive");
   	$(this).addClass("networkimgactive");
	
	$("#network").val(netidzz);
	$("#network_price").val(netvalzz);
	$("#nettxt").text(dividval);
	coset();
});

function coset() {
    var prsxx = $("#price").val();
	var newprsxx = parseInt(prsxx);
	var condixx = $("#product_condition").val();
	var proqtyxx = $("#proqty").val();
	var netprzxx = $("#network_price").val();
	if(condixx=='Faulty'){
		var newprsxx = $("#faultyprz").attr("data-val");
		$(".propricediv").text(newprsxx);
		totalxx = (newprsxx * proqtyxx) - (netprzxx * proqtyxx);
		$("#totalrez").val(totalxx);
		$("#total").val(totalxx);
		document.getElementById('totalrez').innerHTML=totalxx;
	}
	else if(condixx=='Scrap'){
		var newprsxx = $("#scrapprz").attr("data-val");
		$(".propricediv").text(newprsxx);
		totalxx = (newprsxx * proqtyxx);
		$("#totalrez").val(totalxx);
		$("#total").val(totalxx);
		document.getElementById('totalrez').innerHTML=totalxx;
	}
	else{
		var newprsxx = $("#goodprz").attr("data-val");
		$(".propricediv").text(newprsxx);
		totalxx = (newprsxx * proqtyxx) - (netprzxx * proqtyxx);
		$("#totalrez").val(totalxx);
		$("#total").val(totalxx);
		document.getElementById('totalrez').innerHTML=totalxx;
	}
	
	
}

function validationIsTrue(){
	var val1 = $("#network").val();
	var val2 = $("#network_price").val();
	var val3 = $("#product_condition").val();
	
	if(val1!='' && val2!='' && val3!=''){
		return true;
	}
	else{
		return false;
		
	}

}

$("form").submit(function() {
  if (validationIsTrue()) {
	return true;
  }
  else {
  	document.getElementById('pgerr').innerHTML='Please complete all steps.';
	return false;
  }
});
</script>
<?php 
}

function CheckoutJS(){
?>
<script>
$( ".customer-country" ).change(function() {
	var countryval = $(this).val();
	if(countryval=='UK'){
	
	}
	else{
	
	}
});
</script>
<?php 
}

function CheckOutAddr(){
?>
<div class="checkout-area bg-white ptb-30">
	<div class="container">
		<form action="" class="billing-info" method="post">
			<div class="row">
			
				<!-- Billing Details -->
				<div class="col-lg-6">
			
					<h3 class="small-title">BILLING DETAILS</h3>
					<div class="ho-form">
						<div class="ho-form-inner">
							<div class="single-input single-input-half">
								<label for="f_name">First Name *</label>
								<input type="text" name="f_name" id="f_name">
							</div>
							<div class="single-input single-input-half">
								<label for="l_name">Last Name *</label>
								<input type="text" name="l_name" id="l_name">
							</div>
							<div class="single-input">
								<label for="company">Company Name (If Any)</label>
								<input type="text" name="company" id="company">
							</div>
							<div class="single-input single-input-half">
								<label for="email">Email *</label>
								<input type="email" name="email" id="email">
							</div>
							<div class="single-input single-input-half">
								<label for="phone">Phone *</label>
								<input type="text" name="phone" id="phone">
							</div>
							<div class="single-input">
								<label for="country">Country *</label>
								<select name="country" id="country">
									<option value="AU">Australia</option>
									<option value="AT">Austria</option>
									<option value="BD">Bangladesh</option>
									<option value="BE">Belgium</option>
									<option value="CA">Canada</option>
									<option value="DK">Denmark</option>
									<option value="FR">France</option>
									<option value="IT">Italy</option>
									<option value="GB">United Kingdom (UK)</option>
									<option value="US">United States (US)</option>
								</select>
							</div>
							<div class="single-input">
								<label for="address1">Address*</label>
								<input type="text" name="address1" id="address1"
									placeholder="Street Address">
								<input type="text" placeholder="Apartment, suite, unit etc. (optional)" name="address2" id="address2">
							</div>
							<div class="single-input single-input-half">
								<label for="state">State *</label>
								<input type="text" name="state" id="state">
							</div>
							<div class="single-input single-input-half">
								<label for="zip">Postcode / ZIP *</label>
								<input type="number" name="zip" id="zip">
							</div>
						</div>
					</div>

				</div>
				<!--// Billing Details -->
			
			
				<!-- Place Order -->
				<div class="col-lg-6">
					<div class="order-infobox">
						<h3 class="small-title">YOUR ORDER</h3>
						<div class="checkout-table table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th class="text-left">PRODUCT</th>
										<th class="text-right">TOTAL</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										$grandtotal=0;
										foreach($_SESSION['products'] AS $product){
										$sql = "select * from ".WR_PRODUCT." where id='".$product['pid']."' ";
										$row = $this->db->row($sql,$this->db->pdo_open());
										
										$sql_p = "select * from ".WR_PRODUCT_PRICE." where product_id='".$product['pid']."' and variant='".$product['vid']."' ";
										$row_p = $this->db->row($sql_p,$this->db->pdo_open());
										
										$varient = $this->getProductVariant($product['vid']);
										$brandname = $this->getBrandName($row['brand']);
									?>
									<tr>
										<td class="text-left">
										<?php echo $brandname.' - '.$row['productname']; ?><br />
										<?php echo $varient; ?>
										<span>&times; <?php echo $product['proqty']; ?></span>
										</td>
										<td class="text-right">&pound; <?php echo $product['total']; ?></td>
									</tr>
									<?php 
										$grandtotal=$grandtotal+$product['total'];
										} 
									?>
									
								</tbody>
								<tfoot>
									<?php /*?><tr>
										<th class="text-left">CART SUBTOTAL</th>
										<td class="text-right">&pound; <?php echo $grandtotal; ?></td>
									</tr>
									<tr>
										<th class="text-left">SHIPPING</th>
										<td class="text-right">Flat Rate: $7.00</td>
									</tr><?php */?>
									<tr class="total-price">
										<th class="text-left">CART TOTAL</th>
										<td class="text-right">&pound; <?php echo $grandtotal; ?></td>
									</tr>
								</tfoot>
							</table>
						</div>
						<?php /*?><div class="payment-method">
			
							<div class="check-payment">
								<input type="radio" name="payment-method" id="checkout-payment-method-1"
									class="ho-radio" checked="checked">
								<label for="checkout-payment-method-1">Cheque Payment</label>
								<p>Please send your cheque to Store Name, Store Street, Store Town, Store
									State / County, Store Postcode.</p>
							</div>
			
							<div class="paypal-payment">
								<input type="radio" name="payment-method" id="checkout-payment-method-2"
									class="ho-radio">
								<label for="checkout-payment-method-2">Paypal Payment</label>
								<p>Pay via PayPal; you can pay with your credit card if you don’t have a
									PayPal account.</p>
							</div>
			
						</div><?php */?>
						
						<input type="hidden" name="carttotal" id="carttotal" value="<?php echo $grandtotal; ?>" />
						<button class="ho-button ho-button-fullwidth mt-30" type="submit" name="proceed1" value="proceedsbt1">
							<span>Proceed</span>
						</button>
					</div>
				</div>
				<!--// Place Order -->
			
			</div>
		</form>
	</div>
</div>
<?php 
}

function CheckOutAddrSBT(){
	
	extract($_REQUEST);
	$user_id=$_SESSION['userid'];
	
	
	if($country=='GB')
	$shipping=SHIPPING_IN_UK;
	else
	$shipping=SHIPPING_OUTSIDE;
	
	$g_total=$carttotal+$shipping;
	
	$shipping_status='Not Done';
	$payment_status='Approval Pending';
	$order_status='Cart';

	$insert_sql_array=array();
	$insert_sql_array['user_id'] = $user_id;
	if($carttotal!='')
	$insert_sql_array['total'] = $carttotal;
	if($shipping!='')
	$insert_sql_array['shipping'] = $shipping;
	if($g_total!='')
	$insert_sql_array['g_total'] = $g_total;
	$insert_sql_array['shipping_status'] = $shipping_status;
	$insert_sql_array['payment_status'] = $payment_status;
	$insert_sql_array['order_status'] = $order_status;
	
	$id=$this->db->pdoinsert(WR_ORDER,$insert_sql_array);
	
	foreach($_SESSION['products'] AS $product){
		$sql = "select * from ".WR_PRODUCT." where id='".$product['pid']."' ";
		$row = $this->db->row($sql,$this->db->pdo_open());
		
		$sql_p = "select * from ".WR_PRODUCT_PRICE." where product_id='".$product['pid']."' and variant='".$product['vid']."' ";
		$row_p = $this->db->row($sql_p,$this->db->pdo_open());
		
		$varient = $this->getProductVariant($product['vid']);
		$brandname = $this->getBrandName($row['brand']);
		$insert_sql_array2=array();
		$insert_sql_array2['order_id'] = $id;
		$insert_sql_array2['user_id'] = $user_id;
		$insert_sql_array2['pid'] = $product['pid'];
		$insert_sql_array2['vid'] = $product['vid'];
		$insert_sql_array2['p_condition'] = $product['product_condition'];
		$insert_sql_array2['network'] = $product['network'];
		$insert_sql_array2['network_price'] = $product['network_price'];
		$insert_sql_array2['qty'] = $product['proqty'];
		$insert_sql_array2['price'] = $product['price'];
		$insert_sql_array2['total'] = $product['total'];
		$insert_sql_array2['product_name'] = $row['productname'];
		$insert_sql_array2['varient_name'] = $varient;
		
		$id2=$this->db->pdoinsert(WR_ORDER_DETAIL,$insert_sql_array2);
	}
	
	$insert_sql_array3=array();
	$insert_sql_array3['user_id'] = $user_id;
	$insert_sql_array3['order_id'] = $id;
	$insert_sql_array3['f_name'] = $f_name;
	$insert_sql_array3['l_name'] = $l_name;
	$insert_sql_array3['company'] = $company;
	$insert_sql_array3['email'] = $email;
	$insert_sql_array3['phone'] = $phone;
	$insert_sql_array3['country'] = $country;
	$insert_sql_array3['address1'] = $address1;
	$insert_sql_array3['address2'] = $address2;
	$insert_sql_array3['state'] = $state;
	$insert_sql_array3['zip'] = $zip;
	
	$id3=$this->db->pdoinsert(WR_ORDER_ADDRESS,$insert_sql_array3);
	
	?>
	<script>window.location='checkout.php?chk=1&oid=<?php echo $id; ?>';</script>
	<?php 

}

function CheckOut(){
extract($_REQUEST);
/*echo '<pre>';
print_r($_SESSION['products']);
echo '</pre>';*/
?>
			<div class="cart-page-area ptb-30 bg-white">
                <div class="container">
					<form name="procart" id="procart" action="" method="post">
                    <!-- Cart Products -->
					<h2>Confirm and Place Order</h2>
                    <div class="cart-table table-responsive">
                        <table class="table table-bordered table-hover mb-0">
                            <thead>
                                <tr>
                                    <th class="cart-column-image" scope="col">PRODUCT</th>
                                    <th class="cart-column-productname" scope="col">SPECIFICATIONS</th>
                                    <th class="cart-column-price" scope="col">PRICE</th>
                                    <th class="cart-column-quantity" scope="col">QUANTITY</th>
                                    <th class="cart-column-total" scope="col">TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
							
								<?php 
									$x=1;
									$grandtotal=0;
									$num = count($_SESSION['products']);
									if($num>0){
									foreach($_SESSION['products'] AS $product){
										$sql = "select * from ".WR_PRODUCT." where id='".$product['pid']."' ";
										$row = $this->db->row($sql,$this->db->pdo_open());
										
										$sql_p = "select * from ".WR_PRODUCT_PRICE." where product_id='".$product['pid']."' and variant='".$product['vid']."' ";
										$row_p = $this->db->row($sql_p,$this->db->pdo_open());
										
										$varient = $this->getProductVariant($product['vid']);
										$brandname = $this->getBrandName($row['brand']);
										?>
										<tr>
											<td>
												<a href="product-view.php?pid=<?php echo $product['pid']; ?>&vid=<?php echo $product['vid']; ?>" class="product-image">
													<img src="wr-m6/uploads/<?php echo $row['pro_img']; ?>" alt="product image">
												</a>
												<p><a href="product-view.php?pid=<?php echo $product['pid']; ?>&vid=<?php echo $product['vid']; ?>" class="product-title">
												<?php echo $row['productname']; ?><br />
												(<?php echo $varient; ?>)
												</a></p>
											</td>
											<td>
												Network: <?php echo $product['network']; ?> (- &pound;<?php echo $product['network_price']; ?>)<br />
												Product Condition: <?php echo $product['product_condition']; ?> <?php if($product['product_condition']=='Good') echo '(No deduction in price)'; else { echo '50% deduction in product price.'; } ?>
											</td>
											<td>&pound; <?php echo $product['price']; ?></td>
											<td>
												<div class="quantity-select">
													<input type="text" value="<?php echo $product['proqty']; ?>">
													<div class="inc qtybutton">+<i class="ion ion-ios-arrow-up"></i></div>
													<div class="dec qtybutton">-<i class="ion ion-ios-arrow-down"></i></div>
												</div>
											</td>
											<td>
												<span class="total-price">&pound; <?php echo $product['total']; ?></span>
											</td>
											
										</tr>
										<?php 
										$grandtotal=$grandtotal+$product['total'];
										$x++;
									}
									}
								?>

                                

                                

                                

                            </tbody>
                        </table>
                    </div>
                    <!--// Cart Products -->

                    <!-- Cart Content -->
                    <div class="cart-content">
                        <div class="row justify-content-between">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="cart-content-left">
                                    <div class="ho-buttongroup">
										<h3>Address Detail:</h3>
										<?php 
											$sql = "select * from ".WR_ORDER." where id='".$oid."' ";
											$row = $this->db->row($sql,$this->db->pdo_open());
										
											$sql2 = "select * from ".WR_ORDER_ADDRESS." where order_id='".$oid."' ";
											$record = $this->db->row($sql2,$this->db->pdo_open());
										?>
										<table class="table table-bordered table-hover mb-0">
										<tbody>
											<tr>
												<td><strong>Name:</strong> <?php echo $record['f_name']; ?>  <?php echo $record['l_name']; ?></td>
												<td><strong>Email:</strong> <?php echo $record['email']; ?></td>
											</tr>
											<tr>
												<td><strong>Phone:</strong> <?php echo $record['phone']; ?></td>
												<td><?php if($record['company']){ ?>
												<strong>Company Name:</strong> <?php echo $record['company']; ?><br />
												<?php } ?></td>
											</tr>
											<tr>
												<td><strong>Address:</strong> <?php echo $record['address1']; ?><br />
												<strong>Address Line 2:</strong> <?php echo $record['address2']; ?></td>
												<td><strong>State:</strong> <?php echo $record['state']; ?></td>
											</tr>
											<tr>
												<td><strong>Country:</strong> <?php echo $record['country']; ?></td>
												<td><strong>Postal code:</strong>  <?php echo $record['zip']; ?></td>
											</tr
										></tbody>
										</table>
                                    </div>
                                    <?php /*?><div class="cart-content-coupon">
                                        <h6>COUPON</h6>
                                        <p>Enter your coupon code if you have one.</p>
                                        <form action="#" class="coupon-form">
                                            <input type="text" placeholder="Coupon code">
                                            <button class="ho-button">
                                                <span>Apply Coupon</span>
                                            </button>
                                        </form>
                                    </div><?php */?>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="cart-content-right">
                                    <h2>CART TOTALS</h2>
                                    <table class="cart-pricing-table">
                                        <tbody>
                                            <tr class="cart-subtotal">
                                                <th>CART SUBTOTAL</th>
                                                <td>&pound; <?php echo $grandtotal; ?></td>
                                            </tr>
                                            <tr class="cart-shipping">
                                                <th>SHIPPING</th>
                                                <td>&pound; <?php echo $row['shipping']; ?></td>
                                            </tr>
                                            <tr class="cart-total">
                                                <th>Total</th>
                                                <td>&pound; <?php echo $grandtotal+$row['shipping']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
									<?php 
										if($_SESSION['userid'])
										$linkkx= 'checkout.php?chk=2&oid='.$oid;
										else 
										$linkkx= 'login.php';
									?>
									<a href="<?php echo $linkkx; ?>" class="ho-button">
                                        <span>Confirm Order</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--// Cart Content -->
					</form>
                </div>
            </div>


<?php 
}

function ConfirmCheckOut(){
	extract($_REQUEST);
	
	$sql = "select `user_id` from ".WR_ORDER." where id='".$oid."' ";
	$row = $this->db->row($sql,$this->db->pdo_open());
	
	if($row['user_id']==$_SESSION['userid']){
		$update_sql_array=array();
		$update_sql_array['order_status'] = 'Placed';
		$this->db->pdoupdate(WR_ORDER,$update_sql_array,'id',$oid);
		?>
				<div class="cart-page-area ptb-30 bg-white">
					<div class="container">
						<h2>Order Places Successfully!</h2>
						<p>All the details regarding how to ship will be emailed to you shortly.</p>
						<p>After we receive your device we will credit payments to your account.</p>
					</div>
				</div>
		<?php 
		unset($_SESSION['products']);
	}
	else{
		unset($_SESSION['products']);
		?><script>alert('Something went wrong. Please try again.'); window.location='index.php';</script><?php 
	}

}

function getOrderDetail($oid){
	$sql = "select * from ".WR_ORDER." where id='".$oid."' ";
	$row = $this->db->row($sql,$this->db->pdo_open());

}

} // End of Class
?>