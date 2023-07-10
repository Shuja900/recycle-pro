<?php 
// Page Class contains all functions to manage admin page content. 
class ProductClass{
function __construct(){
	$this->db = new database(DATABASE_HOST,DATABASE_PORT,DATABASE_USER,DATABASE_PASSWORD,DATABASE_NAME);
}
function ShowAll(){
	?>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
			   <div class="x_title"> 
				  <h2>All Products</h2>
				  <div class="pull-right"><a class="btn btn-info" href="manageproduct.php?index=add">Add New</a></div>
				  <div class="clearfix"></div>
			   </div>
			   <div class="x_content">
			   		<p>Manage all <code>Products</code> of the website.</p>
                              <div class="table-responsive">
                                 <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                       <tr class="headings">
                                          <th>#</th>
                                          <th class="column-title">Product</th>
                                          <th class="column-title">Product Name</th>
                                          <th class="column-title">Sorting</th>
                                          <th class="column-title no-link last"><span class="nobr">Action</span></th>
                                       </tr>
                                    </thead>
                                    <tbody>
									<?php 
										$x=1;
										$sql = "select * from ".WR_PRODUCT." where 1 order by id desc";
										$record = $this->db->fetch_query($sql,$this->db->pdo_open());
										foreach ($record as $arr)
										{
									?>
                                       <tr class="even pointer odd pointer">
                                          <td class="a-center "><?php echo $x; ?></td>
                                          <td class=" "><img src="uploads/<?php echo $arr['pro_img']; ?>" style="width:100px;" /></td>
                                          <td class=" "><?php echo $arr['productname']; //echo $this->db->getTableData("WR_PROCAT","category",'id',$arr['category'],$this->db->pdo_open()); ?></td>
                                          <td class=" "><?php echo $arr['sorting']; ?></td>
                                          <td class=" last">
                                          <a href="manageproduct.php?index=edit&id=<?php echo $arr['id']; ?>">Edit</a> / 
										  <a class="btn_delete" id="<?php echo $arr['id'];?>"  href="javascript:void;">Delete </a>
                                          </td>
                                       </tr>
                                    <?php 
										$x++;
										} ?>   
									</tbody>
                                 </table>
                              </div>
			   </div>
			</div>
		</div>
	</div>
	<?php 
}
function AddEditData($mode='Add',$id=''){
		if($mode=='Edit'){
			$sql = "select * from ".WR_PRODUCT." where id='".$id."' ";
			$record = $this->db->row($sql,$this->db->pdo_open());
			$this->productname=$record['productname'];
			$this->pro_img=$record['pro_img'];
			$this->pro_img_alt=$record['pro_img_alt'];
			$this->pro_img_title=$record['pro_img_title'];
			$this->brand=$record['brand'];
			$this->category=$record['category'];
			$this->variant=$record['variant'];
			//$this->network=$record['network'];
			//$this->condition=$record['condition'];
			//$this->icloudlock=$record['icloudlock'];
			//$this->price=$record['price'];
			$this->decrease_percent=$record['decrease_percent'];
			$this->decrease_in_days =$record['decrease_in_days'];
			$this->title=$record['title'];
			$this->keywords =$record['keywords'];
			$this->metadescription =$record['metadescription'];
			$this->sorting=$record['sorting'];
			$this->status=$record['status'];
		}
		else{
			$this->productname=$_POST['productname'];
			$this->pro_img=$_POST['pro_img'];
			$this->pro_img_alt=$_POST['pro_img_alt'];
			$this->pro_img_title=$_POST['pro_img_title'];
			$this->brand=$_POST['brand'];
			$this->category=$_POST['category'];
			$this->variant=$_POST['variant'];
			//$this->network=$_POST['network'];
			//$this->condition=$_POST['condition'];
			//$this->icloudlock=$_POST['icloudlock'];
			//$this->price=$_POST['price'];
			$this->decrease_percent=$_POST['decrease_percent'];
			$this->decrease_in_days =$_POST['decrease_in_days'];
			$this->title=$_POST['title'];
			$this->keywords =$_POST['keywords'];
			$this->metadescription =$_POST['metadescription'];
			$this->sorting=$_POST['sorting'];
			$this->status=$_POST['status'];
		}
	?>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
			   <div class="x_title">
				  <h2><?php echo $mode; ?> Product</h2>
				  <div class="pull-right"><a class="btn btn-info" href="manageproduct.php">Back</a></div>
				  <div class="clearfix"></div>
			   </div>
			   <div class="x_content">
			   		<p>Mannualy <?php echo $mode; ?> <code>Product</code>.</p>
			   		<form class="form-horizontal form-label-left" action="" method="post" name="adduserfrm" id="adduserfrm" enctype="multipart/form-data">
                                 <span class="section">Product Info</span>
								 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="category">Brand <span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                       <select name="brand" id="brand" class="form-control col-md-7 col-xs-12" required>
                                       	<option value="">Select</option>
                                       	<?php 
										$x=1;
										$sql_cat = "select * from ".WR_BRANDS." order by sorting asc";
										$row_cat = $this->db->fetch_query($sql_cat,$this->db->pdo_open());
										foreach ($row_cat as $r_cat)
										{
										?>
                                       	<option value="<?php echo $r_cat['id']; ?>" <?php if($this->brand==$r_cat['id']) echo 'selected'; ?>><?php echo $r_cat['brand_name']; ?></option>
                                       	<?php } ?>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product">Product Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                       <input type="text" id="productname" name="productname" required="required" class="form-control col-md-10 col-xs-12" value="<?php echo $this->productname; ?>">
                                    </div>
                                 </div>
                                 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="pro_img">Product Image <span class="required">*</span>
                                    </label>
                                    <div class="col-md-2 col-sm-4 col-xs-12">
                                       <input type="file" id="pro_img" name="pro_img" class="form-control col-md-4 col-xs-12">
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                       <input type="text" id="pro_img_alt" name="pro_img_alt" class="form-control col-md-4col-xs-12" placeholder="Alt text" value="<?php echo $this->pro_img_alt; ?>">
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                       <input type="text" id="pro_img_title" name="pro_img_title" class="form-control col-md-4 col-xs-12" placeholder="Image Title" value="<?php echo $this->pro_img_title; ?>">
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                       <?php if($mode=="Edit") { ?>
										<img src="uploads/<?php echo $this->pro_img; ?>" style="max-height: 80px;" />
										<?php } ?>
                                    </div>
                                 </div>
								 <span class="section">Product Type</span>
                                 
								 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="category">Product Category <span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                       <select name="category" id="category" class="form-control col-md-7 col-xs-12" required>
                                       	<option value="">Select</option>
                                       	<?php 
										$x=1;
										$sql_cat = "select * from ".WR_PROCAT." order by sorting asc";
										$row_cat = $this->db->fetch_query($sql_cat,$this->db->pdo_open());
										foreach ($row_cat as $r_cat)
										{
										?>
                                       	<option value="<?php echo $r_cat['id']; ?>" <?php if($this->category==$r_cat['id']) echo 'selected'; ?>><?php echo $r_cat['category']; ?></option>
                                       	<?php } ?>
                                       </select>
                                    </div>
                                 </div>
								 <div id="showmodels">
								 <?php 
								 	if($mode=='Edit'){
										$this->getModels($this->category,$this->variant,$id);
									}
								 ?>
								 </div>
								 <?php /*?><div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product">Product Variant or Model <span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                       <input type="text" id="variant" name="variant" required="required" class="form-control col-md-10 col-xs-12" value="<?php echo $this->variant; ?>">
                                    </div>
                                 </div><?php */?>
								 <?php /*?><div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product">Network <span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                       <input type="text" id="network" name="network" required="required" class="form-control col-md-10 col-xs-12" value="<?php echo $this->network; ?>">
                                    </div>
                                 </div><?php */?>
								 <?php /*?><div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product">Condition <span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                       <input type="text" id="condition" name="condition" required="required" class="form-control col-md-10 col-xs-12" value="<?php echo $this->condition; ?>">
                                    </div>
                                 </div><?php */?>
								 <?php /*?><div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product">iCloud Lock <span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                       <input type="text" id="icloudlock" name="icloudlock" required="required" class="form-control col-md-10 col-xs-12" value="<?php echo $this->icloudlock; ?>">
                                    </div>
                                 </div><?php */?>
								 <?php /*?><div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product">Price <span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                       <input type="number" id="price" name="price" required="required" data-validate-minmax="1,1500" class="form-control col-md-10 col-xs-12"  value="<?php echo $this->price; ?>">
                                    </div>
                                 </div><?php */?>
								 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product">Price Decrease Percentage<span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                       <input type="number" id="decrease_percent" name="decrease_percent" required="required" data-validate-minmax="1,100" class="form-control col-md-10 col-xs-12"  value="<?php echo $this->decrease_percent; ?>" min="1" max="100">
                                    </div>
                                 </div>
								 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product">Price Decrease in Days<span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                       <input type="number" id="decrease_in_days" name="decrease_in_days" required="required" data-validate-minmax="1,366" class="form-control col-md-10 col-xs-12"  value="<?php echo $this->decrease_in_days; ?>" min="1" max="365">
                                    </div>
                                 </div>
                                 <span class="section">Important SEO Info</span> 
                                 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product">Page Title <span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                       <input type="text" id="title" name="title" required="required" class="form-control col-md-10 col-xs-12"  value="<?php echo $this->title; ?>">
                                    </div>
                                 </div>
                                 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product">Keywords
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                       <input type="text" id="keywords" name="keywords" class="form-control col-md-10 col-xs-12"  value="<?php echo $this->keywords; ?>">
                                    </div>
                                 </div> 
                                 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product">Meta Description
                                    </label>
                                    <div class="col-md-10 col-sm-10 col-xs-12">
                                       <textarea id="metadescription" name="metadescription" class="form-control col-md-10 col-xs-12"><?php echo $this->metadescription; ?></textarea>
                                    </div>
                                 </div>    
                                 <span class="section">Other Options</span>
                                 <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Page Sorting <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="number" id="sorting" name="sorting" required="required" data-validate-minmax="1,500" class="form-control col-md-7 col-xs-12"  value="<?php echo $this->sorting; ?>">
                                    </div>
                                 </div>
                                 <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Status <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <select name="status" id="status" class="form-control col-md-7 col-xs-12" required>
                                       	<option value="">Select</option>
                                       	<option value="Show" <?php if($this->status=='Show') echo 'selected'; ?>>Show</option>
                                       	<option value="Hide" <?php if($this->status=='Hide') echo 'selected'; ?>>Hide</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="ln_solid"></div>
                                 <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                       <input type="hidden" name="sbtfrm" value="sbtval" id="hdn">
                                       <input type="submit" name="sbtbtn" class="btn btn-primary btn-lg" value="Submit"/>
                                    </div>
                                 </div>
                    </form>
			   </div>
			</div>
		</div>
	</div>
	<?php 
}
function AddFromToDb(){
	extract($_REQUEST);
	$tmx=time();
	if ($_FILES["pro_img"]["error"] > 0)
	{
		$path='';
	}
	else
	{
	$tmpname=$_FILES["pro_img"]["name"];
	$ext = pathinfo($tmpname, PATHINFO_EXTENSION);
	$ext = strtolower($ext);
		if($ext== 'jpeg')
			$ext='jpg';
	if($ext=='jpg' || $ext=='png' || $ext=='gif')
	{						
	$path= 'product'.$tmx.".".$ext;
	move_uploaded_file($_FILES["pro_img"][tmp_name],"uploads/".$path); 
	}
		else
		{
			echo 'Invalid file';
		}
	}
	
	$variant_2=implode(',',$model);
	
	$insert_sql_array=array();
	$insert_sql_array['productname'] = $productname;
	if($path!='') {
		$insert_sql_array['pro_img'] = $path;
	}
	$insert_sql_array['pro_img_alt'] = $pro_img_alt;
	$insert_sql_array['pro_img_title'] = $pro_img_title;
	$insert_sql_array['brand'] = $brand;
	$insert_sql_array['category'] = $category;
	$insert_sql_array['variant'] = $variant_2;
	/*$insert_sql_array['network'] = $network;
	$insert_sql_array['condition'] = $condition;
	$insert_sql_array['icloudlock'] = $icloudlock;*/
	/*$insert_sql_array['price'] = $price;*/
	$insert_sql_array['decrease_percent'] = $decrease_percent;
	$insert_sql_array['decrease_in_days'] = $decrease_in_days;
	$insert_sql_array['title'] = $title;
	$insert_sql_array['keywords'] = $keywords;
	$insert_sql_array['metadescription'] = $metadescription;
	$insert_sql_array['sorting'] = $sorting;
	$insert_sql_array['status'] = $status;
	$id=$this->db->pdoinsert(WR_PRODUCT,$insert_sql_array);
	
	foreach($model as $vr){
		$pricename='modelprice'.$vr;
		$faltyprice='faultyprice'.$vr;
		$scrapprice='scrapprice'.$vr;
		$insert_sql_array2=array();
		$insert_sql_array2['product_id'] = $id;
		$insert_sql_array2['variant'] = $vr;
		$insert_sql_array2['price'] = $_REQUEST[$pricename];
		$insert_sql_array2['faulty_price'] = $_REQUEST[$faltyprice];
		$insert_sql_array2['scrap_price'] = $_REQUEST[$scrapprice];
		$this->db->pdoinsert(WR_PRODUCT_PRICE,$insert_sql_array2);
	}
	?>
	<script>window.location='manageproduct.php';</script>
	<?php
}
function UpdateFormDb($id){
	extract($_REQUEST);
	$tmx=time();
	if ($_FILES["pro_img"]["error"] > 0)
	{
		$path='';
	}
	else
	{
	$tmpname=$_FILES["pro_img"]["name"];
	$ext = pathinfo($tmpname, PATHINFO_EXTENSION);
	$ext = strtolower($ext);
		if($ext== 'jpeg')
			$ext='jpg';
	if($ext=='jpg' || $ext=='png' || $ext=='gif')
	{						
	$path= 'product'.$tmx.".".$ext;
	move_uploaded_file($_FILES["pro_img"][tmp_name],"uploads/".$path); 
	}
		else
		{
			echo 'Invalid file';
		}
	}
	
	$variant_2=implode(',',$model);
	
	$update_sql_array=array();
	$update_sql_array['productname'] = $productname;
	if($path!='') {
		$update_sql_array['pro_img'] = $path;
	}
	$update_sql_array['pro_img_alt'] = $pro_img_alt;
	$update_sql_array['pro_img_title'] = $pro_img_title;
	$update_sql_array['brand'] = $brand;
	$update_sql_array['category'] = $category;
	$update_sql_array['variant'] = $variant_2;
	/*$update_sql_array['network'] = $network;
	$update_sql_array['condition'] = $condition;
	$update_sql_array['icloudlock'] = $icloudlock;*/
	/*$update_sql_array['price'] = $price;*/
	$update_sql_array['decrease_percent'] = $decrease_percent;
	$update_sql_array['decrease_in_days'] = $decrease_in_days;
	$update_sql_array['title'] = $title;
	$update_sql_array['keywords'] = $keywords;
	$update_sql_array['metadescription'] = $metadescription;
	$update_sql_array['sorting'] = $sorting;
	$update_sql_array['status'] = $status;
	$this->db->pdoupdate(WR_PRODUCT,$update_sql_array,'id',$id);
	
	$this->DeleteProductPrice($id);
	foreach($model as $vr){
		$pricename='modelprice'.$vr;
		$faltyprice='faultyprice'.$vr;
		$scrapprice='scrapprice'.$vr;
		$insert_sql_array2=array();
		$insert_sql_array2['product_id'] = $id;
		$insert_sql_array2['variant'] = $vr;
		$insert_sql_array2['price'] = $_REQUEST[$pricename];
		$insert_sql_array2['faulty_price'] = $_REQUEST[$faltyprice];
		$insert_sql_array2['scrap_price'] = $_REQUEST[$scrapprice];
		$this->db->pdoinsert(WR_PRODUCT_PRICE,$insert_sql_array2);
	}
	
	?>
	<script>window.location='manageproduct.php';</script>
	<?php
}
function DeleteJSCall(){
	?>
		<script type="text/javascript">
		$(document).on('click','.btn_delete',function() {
		var element = $(this);
		var del_id = element.attr("id");
		var info = 'id=' + del_id;
		if(confirm("Are you sure you want to delete this record?"))
		{
		 $.ajax({
		   type: "POST",
		   url: "ajaxcall.php?index=DeleteProduct",
		   data: info,
		   success: function(){
			   location.reload();
		 }
		});
		  $(this).parents(".tr_delete").animate({ backgroundColor: "#003" }, "slow")
		  .animate({ opacity: "hide" }, "slow");
		 }
		return false;
		});
		</script>
		
		<script type="text/javascript">
		$(document).on('change','#category',function() {
		/*var element = $(this);*/
		var val_id = $(this).val();
		var info = 'id=' + val_id;
		
		 $.ajax({
		   type: "POST",
		   url: "ajaxcall.php?index=getModels",
		   data: info,
		   success: function(data, textStatus) {
				$("#showmodels").html(data);    
			}
		});

		return false;
		});
		</script>
	<?php 
}
function getModels($id,$variant='',$pid=''){
$vari_val=explode(',',$variant);
?>
		<script>
		$(function(){
			var requiredCheckboxes = $('.options :checkbox[required]');
			requiredCheckboxes.change(function(){
				if(requiredCheckboxes.is(':checked')) {
					requiredCheckboxes.removeAttr('required');
				} else {
					requiredCheckboxes.attr('required', 'required');
				}
			});
		});
		</script>
		<div class="item form-group options">
			<label class="control-label col-md-2 col-sm-2 col-xs-12" for="category">Product Model <span class="required">*</span>
			</label>
			<div class="col-md-10 col-sm-10 col-xs-12">
			   <table class="table table-striped jambo_table bulk_action">
			   	<thead>
			   	<tr class="headings">
					<th>Model</th>
					<th>Good Price</th>
					<th>Faulty Price</th>
					<th>Scrap Price</th>
				</tr>
				</thead>
				<tbody>
				<?php 
				$x=1;
				$sql_cat = "select * from ".WR_MODEL." where category='".$id."' order by sorting asc";
				$row_cat = $this->db->fetch_query($sql_cat,$this->db->pdo_open());
				foreach ($row_cat as $r_cat)
				{
					if($pid!='') {
					$sql_pp = "select * from ".WR_PRODUCT_PRICE." where product_id='".$pid."' and variant='".$r_cat['id']."' ";
					$record_pp = $this->db->row($sql_pp,$this->db->pdo_open());
					$mpval=$record_pp['price'];
					$faval=$record_pp['faulty_price'];
					$scval=$record_pp['scrap_price'];
					}
					
					
					
				?>
				<?php /*?><option value="<?php echo $r_cat['id']; ?>"><?php echo $r_cat['model']; ?></option><?php */?>
				<tr>
					<td>
				<input type="checkbox" name="model[]" id="model<?php echo $r_cat['id']; ?>" value="<?php echo $r_cat['id']; ?>" <?php if (in_array($r_cat['id'], $vari_val)) { echo 'checked="checked"'; } if($pid=='') { echo 'required'; } ?> /> <label for="model<?php echo $r_cat['id']; ?>"><?php echo $r_cat['model']; ?></label>
					</td>
					<td> 				
				<input type="text" name="modelprice<?php echo $r_cat['id']; ?>" id="modelprice<?php echo $r_cat['id']; ?>" placeholder="Good Price" value="<?php echo $mpval;?>" />
					</td>
					<td>
				<input type="text" name="faultyprice<?php echo $r_cat['id']; ?>" id="faultyprice<?php echo $r_cat['id']; ?>" placeholder="Faulty Price" value="<?php echo $faval;?>" />
					</td>
					<td>
				<input type="text" name="scrapprice<?php echo $r_cat['id']; ?>" id="scrapprice<?php echo $r_cat['id']; ?>" placeholder="Scrap Price" value="<?php echo $scval;?>" />
					</td>
				</tr>
				<?php } ?>
				</tbody>
			  </table>
			</div>
		 </div>
<?php 
}
function DeleteData($id){
	$this->unlinkfile(WR_PRODUCT,'pro_img',$id,'uploads/');
	$sql = "delete from ".WR_PRODUCT." where id='".$id."' ";
	$record = $this->db->fetch_query($sql,$this->db->pdo_open());
}
function unlinkfile($table,$col,$id,$dir=''){
	$sql = "select ".$col." from ".$table." where id='".$id."' ";
	$row = $this->db->row($sql,$this->db->pdo_open());
	$delpath=$dir.$row['pro_img'];
	unlink($delpath);
}	

function DeleteProductPrice($id){
	$sql = "delete from ".WR_PRODUCT_PRICE." where product_id='".$id."' ";
	$record = $this->db->fetch_query($sql,$this->db->pdo_open());
}

} // end of class/
?>