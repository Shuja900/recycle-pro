<?php 
class OrderClass{
function __construct(){
	$this->db = new database(DATABASE_HOST,DATABASE_PORT,DATABASE_USER,DATABASE_PASSWORD,DATABASE_NAME);
}

function ShowAll(){
	?>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
			   <div class="x_title"> 
				  <h2>All Orders</h2>
				  <?php /*?><div class="pull-right"><a class="btn btn-info" href="manageusers.php?index=add">Add New</a></div><?php */?>
				  <div class="clearfix"></div>
			   </div>
			   <div class="x_content">
			   		<p>Manage all <code>Orders</code> of the website.</p>
                              <div class="table-responsive">
                                 <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                       <tr class="headings">
                                          <th>#</th>
                                          <th class="column-title">Order Detail</th>
										  <th class="column-title">User Detail</th>
                                          <th class="column-title">Email</th>
                                          <th class="column-title">Phone</th>
										  <th class="column-title">Status</th>
                                          <th class="column-title no-link last"><span class="nobr">Action</span></th>
                                       </tr>
                                    </thead>
                                    <tbody>
									<?php 
									$x=1;
									$sql = "select * from ".WR_ORDER." where 1 order by id desc";
									$record = $this->db->fetch_query($sql,$this->db->pdo_open());
									foreach ($record as $row)
									{
										$sql2 = "select * from ".WR_USER." where id='".$row['user_id']."' ";
										$row2 = $this->db->row($sql2,$this->db->pdo_open());
									?>
									<tr>
										<td><?php echo $x; ?>
										<td>
											<strong>Order Id: </strong><?php echo $row['id']; ?><br />
											<strong>Total Price: </strong><?php echo $row['total']; ?><br />
											<strong>Shipping Price: </strong><?php echo $row['shipping']; ?><br />
											<strong>Order Total: </strong><?php echo $row['shipping']+$row['total']; ?>
										</td>
										<td>
											<strong>User Name: </strong><?php echo $row2['fname'].' '.$row2['lname']; ?><br />
											<strong>Phone: </strong><?php echo $row2['phone']; ?><br />
											<strong>Email: </strong><?php echo $row2['email']; ?>
										</td>
										<td><?php echo $row['shipping_status']; ?></td>
										<td><?php echo $row['payment_status']; ?></td>
										<td><?php echo $row['order_status']; ?></td>
										<td>
											<a href="manageorders.php?index=view&id=<?php echo $row['id']; ?>">View Order</a>
										</td>
									</tr>
									<?php 
										$x++;
									}
									
									?>   
									</tbody>
                                 </table>
                              </div>
			   </div>
			</div>
		</div>
	</div>
	<?php 
}

function ViewData($id){
$sql = "select * from ".WR_ORDER." where id='".$id."' ";
$row = $this->db->row($sql,$this->db->pdo_open());

$sql2 = "select * from ".WR_USER." where id='".$row['user_id']."' ";
$row2 = $this->db->row($sql2,$this->db->pdo_open());

$sql3 = "select * from ".WR_ORDER_ADDRESS." where order_id='".$id."' ";
$row3 = $this->db->row($sql3,$this->db->pdo_open());
?>
	<div class="row">
		<div class="col-md-12">
                        <div class="x_panel">
                           <div class="x_title">
                              <h2>Order Detail</h2>
                              <div class="clearfix"></div>
                           </div>
                           <div class="x_content">
                              <section class="content invoice">
                                 <!-- title row -->
                                 <div class="row">
                                    <div class="col-xs-12 invoice-header">
                                       <h1>
                                          <i class="fa fa-globe"></i> Order
                                          <small class="pull-right">Date: <?php echo date('D d M, Y',strtotime($row['timestamp'])); ?></small>
                                       </h1>
                                    </div>
                                    <!-- /.col -->
                                 </div>
                                 <!-- info row -->
                                 <div class="row invoice-info">
                                    <div class="col-sm-4 invoice-col">
                                       User Detail
                                       <address>
                                          <strong><?php echo $row2['fname'].' '.$row2['lname']; ?></strong>
                                          <br>Phone: <?php echo $row2['phone']; ?>
                                          <br>Email: <?php echo $row2['email']; ?>
                                       </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
                                       Billing Address
                                       <address>
                                          <strong><?php echo $row3['f_name'].' '.$row3['l_name']; ?></strong>
										  <?php if($row3['company']) { ?>
										  <br><strong><?php echo $row3['company']; ?></strong>
										  <?php } ?>
                                          <br><?php echo $row3['address1']; ?>
										  <br><?php echo $row3['address2']; ?>
                                          <br><?php echo $row3['state']; ?>, <?php echo $row3['zip']; ?>
										  <br><?php echo $row3['country']; ?>
                                          <br>Phone: <?php echo $row3['phone']; ?>
                                          <br>Email: <?php echo $row3['email']; ?>
                                       </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
                                       <b>Order ID: <?php echo $row['id']; ?></b>
                                       <br>
                                       <br>
                                       <b>Order Date:</b> <?php echo date('D d M, Y',strtotime($row['timestamp'])); ?>
                                    </div>
                                    <!-- /.col -->
                                 </div>
                                 <!-- /.row -->
                                 <!-- Table row -->
                                 <div class="row">
                                    <div class="col-xs-12 table">
                                       <table class="table table-striped">
                                          <thead>
                                             <tr>
                                                <th>#</th>
                                                <th>PRODUCT</th>
                                                <th>SPECIFICATIONS</th>
                                                <th>PRICE</th>
												<th>QUANTITY</th>
                                                <th>SUBTOTAL</th>
                                             </tr>
                                          </thead>
                                          <tbody>
											<?php 
											$zx=1;
											$sql_o = "select * from ".WR_ORDER_DETAIL." where order_id='".$row['id']."' order by id desc";
											$record_o = $this->db->fetch_query($sql_o,$this->db->pdo_open());
											foreach ($record_o as $row_o)
											{
												$sql_pr = "select * from ".WR_PRODUCT." where id='".$row_o['pid']."' ";
												$row_pr = $this->db->row($sql_pr,$this->db->pdo_open());
												
												$sql_p = "select * from ".WR_PRODUCT_PRICE." where product_id='".$row_o['pid']."' and variant='".$row_o['vid']."' ";
												$row_p = $this->db->row($sql_p,$this->db->pdo_open());
												
												$varient = $this->getProductVariant($row_o['vid']);
												$brandname = $this->getBrandName($row_pr['brand']);
												
											?>
                                             <tr>
                                                <td><?php echo $zx; ?></td>
												<td>
													<a href="manageproduct.php?index=edit&id=<?php echo $row_o['pid']; ?>" class="product-image" target="_blank">
													<img src="<?php echo 'uploads/'.$row_pr['pro_img']; ?>" alt="product image" style="max-width:100px;">
													</a>
													<p>
													<?php echo $row_pr['productname']; ?><br />
													(<?php echo $varient; ?>)
													</p>
												</td>
												<td>
													<?php if($row_o['p_condition']!='Scrap'){ ?>
													Network Fee: <?php //echo $product['network']; ?> - &pound;<?php echo $row_o['network_price']; ?><br />
													<?php } ?>
													Product Condition: <?php echo $row_o['p_condition']; ?>
												</td>
												<td>&pound; <?php echo $row_o['price']; ?></td>
												<td><?php echo $row_o['qty']; ?></td>
												<td>
													&pound; <?php echo $row_o['total']; ?>
												</td>
                                             </tr>
                                             <?php 
											 	$grandtotal=$grandtotal+$product['total'];
												$zx++;
											 } 
											 ?>
                                          </tbody>
                                       </table>
                                    </div>
                                    <!-- /.col -->
                                 </div>
                                 <!-- /.row -->
                                 <div class="row">
                                    <!-- accepted payments column -->
                                    <div class="col-xs-6">
                                       <p class="lead">Order Status:</p>
                                       
                                       <p class="text-muted well well-sm no-shadow" style="margin-top: 10px; font-size:18px;">
                                          
										  Order Status:										  
										  <select id="order_status" name="order_status">
										  	<option value="">Select</option>
											<option value="Placed" <?php if($row['order_status']=='Placed') echo 'selected="selected"'; ?>>Placed</option>
											<option value="Approved" <?php if($row['order_status']=='Approved') echo 'selected="selected"'; ?>>Approved</option>
											<option value="Completed" <?php if($row['order_status']=='Completed') echo 'selected="selected"'; ?>>Completed</option>
											<option value="Disapproved" <?php if($row['order_status']=='Disapproved') echo 'selected="selected"'; ?>>Disapproved</option>
										  </select>
										  <br />
										  Shipping Status:
										  <select id="shipping_status" name="shipping_status" style="margin-top:10px;">
										  	<option value="">Select</option>
											<option value="Not Done" <?php if($row['shipping_status']=='Not Done') echo 'selected="selected"'; ?>>Not Done</option>
											<option value="Dispatched" <?php if($row['shipping_status']=='Dispatched') echo 'selected="selected"'; ?>>Dispatched</option>
											<option value="Received" <?php if($row['shipping_status']=='Received') echo 'selected="selected"'; ?>>Received</option>
											<option value="Disapproved" <?php if($row['shipping_status']=='Disapproved') echo 'selected="selected"'; ?>>Disapproved</option>
										  </select>
										  <br />
										  Payment Status:
										  <select id="payment_status" name="payment_status" style="margin-top:10px;">
										  	<option value="">Select</option>
											<option value="Approval Pending" <?php if($row['payment_status']=='Approval Pending') echo 'selected="selected"'; ?>>Approval Pending</option>
											<option value="Approved" <?php if($row['payment_status']=='Approved') echo 'selected="selected"'; ?>>Approved</option>
											<option value="Completed" <?php if($row['payment_status']=='Completed') echo 'selected="selected"'; ?>>Completed</option>
											<option value="Disapproved" <?php if($row['payment_status']=='Disapproved') echo 'selected="selected"'; ?>>Disapproved</option>
										  </select>
										  
										  
                                       </p>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-xs-6">
                                       <p class="lead">Summary</p>
                                       <div class="table-responsive">
                                          <table class="table">
                                             <tbody>
                                                <tr>
                                                   <th style="width:50%">Subtotal:</th>
                                                   <td>&pound; <?php echo $row['total']; ?></td>

                                                </tr>
                                                <tr>
                                                   <th>Shipping:</th>
                                                   <td>&pound; <?php echo $row['shipping']; ?></td>
                                                </tr>
                                                <tr>
                                                   <th>Total:</th>
                                                   <td>&pound; <?php echo $row['g_total']; ?></td>
                                                </tr>
                                             </tbody>
                                          </table>
                                       </div>
                                    </div>
                                    <!-- /.col -->
                                 </div>
                                 <!-- /.row -->
                                 <!-- this row will not appear when printing -->
                                 <div class="row no-print">
                                    <div class="col-xs-12">
                                       <?php /*?><button class="btn btn-default" onClick="window.print();"><i class="fa fa-print"></i> Print</button><?php */?>
                                       <button class="btn btn-success"><i class="fa fa-credit-card"></i> Update Status</button>
                                       <?php /*?><button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button><?php */?>
                                    </div>
                                 </div>
                              </section>
                           </div>
                        </div>
                     </div>
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

} // Order Class End
?>