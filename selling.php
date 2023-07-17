<?php 
require_once("wr-m6/wrbasic/config.inc.php");
require_once('wr-m6/apps/front/layout/layout.class.php');
require_once('wr-m6/apps/front/products/products.class.php');
$layout_obj = new LayoutClass();
$pro_obj = new FrontProductClass();
extract($_REQUEST);
?>
<!doctype html>
<html class="no-js" lang="en-gb">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Recycle Pro</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/icon.png">

    <!-- Google font (font-family: 'Roboto', sans-serif;) -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700" rel="stylesheet">

    <!-- Plugins -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/plugins.css">

    <!-- Style Css -->
    <link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="css/css-utilities-technovibes.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Custom Styles -->
    <link rel="stylesheet" href="css/custom.css">
	<script src="js/page.js"></script>
	<?php echo $layout_obj->getBasicVals('Header_codes','option_value'); ?>
	<style>
        
        .cart-content-left .ho-buttongroup {
        display:none
        }
	    .dks{
	        display:block;
	    }
	    .mlo{
	        display:none;
	    }
	    @media only screen and (max-width: 690px) {
  .dks{
	        display:none;
	    }
	    .mlo{
	        display:block;
	    }
}
	</style>
</head>

<body>
	<?php echo $layout_obj->getBasicVals('After_body_tags','option_value'); ?>
    <div id="wrapper" class="wrapper">

        <!-- Header -->
        <?php $layout_obj->pageHead(); ?>
        <!--// Header -->

        <!-- Breadcrumb Area -->
        <div class="breadcrumb-area bg-grey">
            <div class="container">
                <div class="ho-breadcrumb">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li>Cart</li>
                    </ul>
                </div>
            </div>
        </div>
        <!--// Breadcrumb Area -->

        <!-- Page Conttent -->
        <main class="page-content">

       
            
                <?php 
				switch($index){
				case 'clearcart': 
				$pro_obj->ClearCart();
				break;
				default: 
				$pro_obj->ShowCart();
				break;
				}
				?>
        

            <!-- Newsletter Area -->
            <?php $layout_obj->NewsLetterArea(); ?>
            <!--// Newsletter Area -->
        </main>
        <!--// Page Conttent -->

        <!-- Footer -->
        <?php $layout_obj->footer(); ?>
        <!--// Footer -->
    </div>
    <!--// Wrapper -->
      
     <?php 
    if(isset($_GET['type'])){
    $type = $_GET['type'];
    if($type=="selling"){
       ?>
       <script>
          $(".order-infobox").find("input[type='submit']").hide();
          
       </script>
       <?php
        
    }
        
    }
    ?>
    
	<script>
	includeHTML();
	</script>
	
    <!-- Js Files -->
    <script src="js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="js/vendor/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script>
    $(".cart-content-right").find("a").attr("href","checkout?type=selling");
    
      
   
    
    </script>
    
    
<?php $pro_obj->ProductJS(); ?>
<?php echo $layout_obj->getBasicVals('Footer_script_code','option_value'); ?>
</body>
</html>