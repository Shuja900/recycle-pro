<?php
/*********Front Module***************/
// Database tables
define("WR_ADMIN",'wr_admin',true);
define("WR_USER",'wr_user',true);
define("WR_ADDRESS",'wr_address',true);
define("WR_CATEGORIES","wr_categories",true);
define("WR_PAGE","wr_page",true);
define("WR_PROCAT","wr_procat",true);
define("WR_BRANDS","wr_brands",true);
define("WR_PRODUCT","wr_product",true);
define("WR_MODEL","wr_model",true); 
define("WR_PRODUCT_PRICE","wr_product_price",true);
define("WR_NETWORK_CAT","wr_network_cat",true);
define("WR_MOBILE_NETWORK","wr_mobile_networks",true);
define("WR_ORDER","wr_order",true);
define("WR_ORDER_DETAIL","wr_order_detail",true);
define("WR_ORDER_ADDRESS","wr_order_address",true);
define("WR_BLOG","wr_blog",true);
define("WR_CONTACT_FORM","wr_contact_form",true);
define("WR_SLIDER","wr_slider",true);
// Base File Directory ///
define("BASE_FILRDIR","wr-m6/uploads/",true);
//Have to be turned off
ini_set('display_errors', true);
error_reporting(E_ALL ^ E_NOTICE);
//View in logs! not on pages!
//error_reporting(1);

//Shipping Cost ////
define("SHIPPING_IN_UK","5",true);
define("SHIPPING_OUTSIDE","10",true);
?>