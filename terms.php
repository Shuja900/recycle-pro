<?php 
require_once("wr-m6/wrbasic/config.inc.php");
require_once('wr-m6/apps/front/layout/layout.class.php');
require_once('wr-m6/apps/front/pages/pages.class.php');
$layout_obj = new LayoutClass();
$page_obj = new PagesClass();
extract($_REQUEST);

if($p==1)
$pagename='about';
?>
<!doctype html>
<html class="no-js" lang="en-gb">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $page_obj->getPageData('title',$p); ?></title>
    <meta name="description" content="<?php echo $page_obj->getPageData('metadescription',$p); ?>">
    <meta name="keywords" content="<?php echo $page_obj->getPageData('keywords',$p); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/icon.png">

    <!-- Google font (font-family: 'Roboto', sans-serif;) -->
    <!--<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700" rel="stylesheet">-->

    <!-- Plugins -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/plugins.css">
<link rel="canonical" href="https://www.recyclepro.co.uk/terms.php"/>
    <!-- Style Css -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/css-utilities-technovibes.css">
    <!-- Custom Styles -->
    <link rel="stylesheet" href="css/custom.css">
    <script src="js/page.js"></script>
    <?php echo $layout_obj->getBasicVals('Header_codes','option_value'); ?>
</head>

<body>
    <?php echo $layout_obj->getBasicVals('After_body_tags','option_value'); ?>
    <div id="wrapper" class="wrapper">

        <!-- Header -->
        <?php $layout_obj->pageHead($pagename); ?>
        <!--// Header -->

        <!-- Breadcrumb Area -->
        <div class="breadcrumb-area bg-grey">
            <div class="container">
                <div class="ho-breadcrumb">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li>Terms & Condition</li>
                    </ul>
                </div>
            </div>
        </div>
        <!--// Breadcrumb Area -->

        <!-- Page Conttent -->
        <main class="page-content">

            <!-- Shop Page Area -->
           
                <div class="container">
                    <section >
                        <div >
                            <h2 style="color:#17a697;font-size:30px;font-weight:800;" >Terms and Conditions</h2>
                            <p >We recommend that before sending your device to us you should take a photo of the IMEI shown on the screen, so you have this in your records. To display your IMEI simply enter *#06# on your device’s keypad.</p>
                           <p > As we may need to contact you while we process your device, please make sure we have your correct and an active phone number.</p>
                        </div>
                    </section><!-- /.section-page-title -->
                    <section >
                        <h2>What we check:</h2>
                        <ol>
                            <li>SIM or memory card trays</li>
                            <li>The device switches on </li>
                            <li>All parts of the screen are working</li>
                            <li>The cosmetic condition - If scratches are present, when a fingernail is run over them do they catch?  If the fingernail catches, then the scratch is considered a deep, but not light scratch </li>
                            <li>That any security or other protective features (such as Find my iPhone) have been disabled and the device is not registered as lost or stolen</li>
                           
                        </ol>
                    </section>
                    <section >
                        <h2>If any of the devices are in broken condition or have sings of heavy wear and tear such as,</h2>
                        <ol>
                            <li>Dents </li>
                            <li>Cracks </li>
                            <li>Deep scratches on the casing, chips, or on the screen</li>
                            <li>Locked on a network</li>
                            
                        </ol>
                    </section>
                   
                  <section >
                        <h2>Will be classified as Broken and will be paid accordingly</h2>
                        <p>If the device is damaged, its security or other protective features are enabled, or it is registered as lost or stolen, we reserve the right to apply a charge to cover our costs (no VAT will be charged). The amount charged will vary depending on the level of damage, and the original value of the device. The maximum charge that could be applied is the amount of the phone that we agree to purchase, for any device that is reported lost or stolen and beyond economical repair (BER).</p>
                    </section>
                    <section >
                        <h2>(BER)</h2>
                        <ol>
                            <li>Device does not power on</li>
                            <li>Evidence of water damage </li>
                            <li>Security or other protective features are enabled on the device</li>
                            <li>Find My iPhone feature is enabled</li>
                            <li>Frp is on</li>
                             <li> EFI password or Firmware password in on</li>
                             <li>Bios password is on</li>
                             <li>The device has been registered lost or stolen</li>
                           
                        </ol>
                        </section>
            </div>
            <!--// Shop Page Area -->

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
    <?php echo $layout_obj->getBasicVals('Footer_script_code','option_value'); ?>
</body>
</html>