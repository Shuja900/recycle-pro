<?php 

// Front HomePage Class contains all functions to manage front website Home Page functions. 

class HomePage{



function __construct(){

	$this->db = new database(DATABASE_HOST,DATABASE_PORT,DATABASE_USER,DATABASE_PASSWORD,DATABASE_NAME);

}

function getProductVariant($id){
$sql = "select model from ".WR_MODEL." where id='".$id."' ";
$record = $this->db->row($sql,$this->db->pdo_open());
return $record['model'];
}

function HomeSLider(){
?>
<div class="herobanner slider-navigation slider-dots mt-30">
	<?php 
		$x=1;
		$sql = "select * from ".WR_SLIDER." where status='Show' order by sorting asc";
		$record = $this->db->fetch_query($sql,$this->db->pdo_open());
		foreach ($record as $row)
		{
	?>
	<!-- Herobanner Single -->
	<div class="herobanner-single">
		<img src="<?php echo 'uploads/'.$row['img_path']; ?>" alt="<?php echo $row['img_alt']; ?>" title="<?php echo $row['img_title']; ?>">
		<div class="herobanner-content">
			<div class="herobanner-box">
				<h4><?php echo $row['text1']; ?></h4>
			</div>
			<div class="herobanner-box">
				<h1><?php echo $row['text2']; ?><span> <?php echo $row['text3']; ?></span></h1>
			</div>
			<div class="herobanner-box">
				<p><?php echo $row['text4']; ?></p>
			</div>
			<div class="herobanner-box">
				<a href="<?php echo $row['text6']; ?>" class="ho-button">
					<?php /*?><i class="lnr lnr-cart"></i><?php */?>
					<span><?php echo $row['text5']; ?></span>
				</a>
			</div>
		</div>
		<span class="herobanner-progress"></span>
	</div>
	<!--// Herobanner Single -->
	<?php } ?>
</div>
<?php 
}
	
function HomeProductSlider(){
?>
<div class="our-products-area mt-30">
<div class="section-title">
	<h3>Top Brands</h3>
	<ul class="nav" id="bstab2" role="tablist">
		<?php 
			$x=1;
			$sql = "select * from ".WR_BRANDS." order by sorting asc limit 0,5";
			$record = $this->db->fetch_query($sql,$this->db->pdo_open());
			foreach ($record as $arr)
			{
				$sql = "select * from ".WR_PRODUCT." where brand='".$arr['id']."' and category='1' order by sorting asc limit 0,6";
				$record = $this->db->fetch_query($sql,$this->db->pdo_open());
				if(count($record)>0){
				?>
				<li class="nav-item <?php if($x==1) echo 'active'; ?>">
					<a class="nav-link" id="bstab2-area<?php echo $arr['id']; ?>-tab" data-toggle="tab" href="#bstab2-area<?php echo $arr['id']; ?>" role="tab" aria-controls="bstab2-area<?php echo $arr['id']; ?>" aria-selected="false"><?php echo $arr['brand_name']; ?></a>
				</li>
				<?php 
				}
			}
		?>
		
		
	</ul>
</div>

<div class="tab-content" id="bstab2-ontent">
	<?php 
		$x=1;
		$sql = "select * from ".WR_BRANDS." order by sorting asc limit 0,5";
		$record = $this->db->fetch_query($sql,$this->db->pdo_open());
		foreach ($record as $arr)
		{
		$sql = "select * from ".WR_PRODUCT." where brand='".$arr['id']."' and category='1' order by sorting asc limit 0,6";
		$record = $this->db->fetch_query($sql,$this->db->pdo_open());
		
		if(count($record)>0){
	?>
	<div class="tab-pane fade <?php if($x==1) echo 'show active'; ?>" id="bstab2-area<?php echo $arr['id']; ?>" role="tabpanel" aria-labelledby="bstab2-area<?php echo $arr['id']; ?>-tab">
		<div class="product-slider our-products-slider slider-navigation-2">
			<?php 
			
			foreach ($record as $arr)
			{
			?>
			<div class="product-slider-col">
				<!-- Single Product -->
				<article class="hoproduct">
					<div class="hoproduct-image">
						<a class="hoproduct-thumb" href="javascript:void;">
							<img class="hoproduct-frontimage" src="<?php echo BASE_FILRDIR.$arr['pro_img']; ?>" alt="<?php echo $arr['productname']; ?>">
							<img class="hoproduct-backimage" src="<?php echo BASE_FILRDIR.$arr['pro_img']; ?>" alt="<?php echo $arr['productname']; ?>">
						</a>
						<ul class="hoproduct-flags">
							<li class="flag-pack">Sell</li>
						</ul>
					</div>
					<div class="">
						<h5 class="hoproduct-title"><?php echo $arr['productname']; ?></h5>
						<div class="hoproduct-rattingbox">
							<div class="rattingbox">
								<span class="active"><i class="ion ion-ios-star"></i></span>
								<span class="active"><i class="ion ion-ios-star"></i></span>
								<span class="active"><i class="ion ion-ios-star"></i></span>
								<span class="active"><i class="ion ion-ios-star"></i></span>
								<span class="active"><i class="ion ion-ios-star"></i></span>
							</div>
						</div>
						<div class="hoproduct-pricebox">
							<div class="pricebox">
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
						</div>
					</div>
				</article>
				<!--// Single Product -->
			</div>
			<?php 
				}
			?>

		</div>
	</div>
	<?php 
		}
		$x++;
		}
	?>
	
</div>
</div>
<?php 
}
	
function ShowBrandsHome(){
?>
<div class="categories-area mt-30">
	<div class="section-title">
		<h3>Mobile Brands</h3>
	</div>
	<div class="categories-slider slider-navigation-2 slider-navigation-2-m0">
	
		
			<?php 
				$x=1;
				$sql = "select * from ".WR_BRANDS." order by sorting asc";
				$record = $this->db->fetch_query($sql,$this->db->pdo_open());
				foreach ($record as $arr)
				{
					$sql2 = "select * from ".WR_PRODUCT." where brand='".$arr['id']."' and category='1' order by sorting asc";
					$record2 = $this->db->fetch_query($sql2,$this->db->pdo_open());
					if($x==1)
					echo '<div class="category-wrapper">'; 
			?>
			<!-- Single Category -->
			<div class="category">
				<a href="products.php?b=<?php echo $arr['url']; ?>&bid=<?php echo $arr['id']; ?>&pc=1" class="category-thumb">
					<img src="<?php echo BASE_FILRDIR.$arr['brand_logo']; ?>" alt="<?php echo $arr['brand_name']; ?>" style="border-radius: 50%; border: #ccc solid 2px;">
				</a>
				<div class="category-content">
					<h5 class="category-title">Mobiles</h5>
					<span class="category-productcounter"><?php echo count($record2); ?> Product</span>
					<a href="products.php?b=<?php echo $arr['url']; ?>&bid=<?php echo $arr['id']; ?>&pc=1" class="category-productlink">Sell Now <i class="ion ion-md-arrow-dropright"></i></a>
				</div>
			</div>
			<!--// Single Category -->
			<?php 
					if($x==2){
					echo '</div>';
					$x=0;
					}
					$x++;
				}
			?>

	</div>
</div>
<?php 
}
	

	

}