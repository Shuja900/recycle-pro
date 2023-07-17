<?php 
error_reporting(E_ALL); ini_set('display_errors', 1);
require_once("wrbasic/config.inc.php");
require_once('apps/wrback/class/config.back.php');
require_once('apps/wrback/layout/layout.class.php');
require_once('apps/wrback/products/product.class.php');
$layout_obj = new LayoutClass();
$frntbs_obj = new FrontBase();
$product_obj = new ProductClass();
$frntbs_obj->auth->Checklogin();
extract($_REQUEST);
?>
<!DOCTYPE html>
<html lang="en">
<head>
      <?php $layout_obj->pageTitle('Manage Products | Wr-Admin'); ?>
      <!-- Bootstrap -->
      <link href="assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
      <!-- Font Awesome -->
      <link href="assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
      <!-- NProgress -->
      <link href="assets/vendors/nprogress/nprogress.css" rel="stylesheet">
      <!-- jQuery custom content scroller -->
      <link href="assets/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>
      <!-- Custom Theme Style -->
      <link href="assets/css/custom.min.css" rel="stylesheet">
      <script src="ckeditor/ckeditor.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      
      <link rel="stylesheet" href="ckeditor/toolbarconfigurator/lib/codemirror/neo.css">
   </head>
   <body class="nav-md dark-left-side">
      <?php //$layout_obj->PreLoader(); ?>
      <div class="container body">
         <div class="main_container">
            <!--  Left sidebar -->
            <?php $layout_obj->LeftNav('product'); ?>
            <!--  Left sidebar -->
            <!-- top navigation -->
            <?php $layout_obj->topNav(); ?>
            <!-- /top navigation -->
            <!-- page content -->
            <div class="right_col" role="main">
               <div class="">
                  <?php $layout_obj->PageHeadings('Manage Products'); ?>
                  <div class="clearfix"></div>
                  <?php 
						switch($index){
							case 'add': 
								if($sbtfrm=='sbtval')
									$product_obj->AddFromToDb();
								else 
									$product_obj->AddEditData('Add');
								break; 
							case 'edit':
								if($sbtfrm=='sbtval')
									$product_obj->UpdateFormDb($id);
								else 
									$product_obj->AddEditData('Edit',$id);
								break;
							case 'addLaptop': 
								if($sbtfrm=='sbtval')
									$product_obj->AddLaptopToDb();
								else 
									$product_obj->AddLaptops('Add');
								break;
							case 'editLaptop':
								if($sbtfrm=='sbtval')
									$product_obj->UpdateLaptopToDb($id);
								else 
									$product_obj->AddLaptops('Edit',$id);
								break;
							
							default:
									$product_obj->ShowAll();
								break;
						} 
				  ?>
               </div>
            </div>
            <!-- /page content -->
         </div>
      </div>
      <!-- jQuery -->
       <script>
 $(document).ready(function(){
$('#searchproducts').click(function(){
    var track = $("#track").val(); 
    $.ajax({
        url:"searchproducts.php",
        method: "POST",
        data: {track:track},
        success: function(data){
            console.log(data);
      $("#responsecontainer").html(data);
      $('#pdfmodel').modal('show');
        }
    });
});
});


</script>
      <script src="assets/vendors/jquery/dist/jquery.min.js"></script>
      <!-- Bootstrap -->
      <script src="assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
      <!-- FastClick -->
      <script src="assets/vendors/fastclick/lib/fastclick.js"></script>
      <!-- NProgress -->
      <script src="assets/vendors/nprogress/nprogress.js"></script>
      <!-- jQuery custom content scroller -->
      <script src="assets/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
      <!-- Pace js -->
      <script type="text/javascript" src="assets/js/pace.min.js"></script>
      <script src="assets/vendors/validator/validator.js"></script>
      <!-- Custom Theme Scripts -->
      <script src="assets/js/custom.min.js"></script>
      <?php $product_obj->DeleteJSCall(); ?>
	  
	 
   </body>
</html>