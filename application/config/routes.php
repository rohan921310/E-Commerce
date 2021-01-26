<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Admin/home';

//...........home page.................//
$route['home'] = 'Admin/home';
$route['about_us'] = 'Admin/about_us';
$route['contact_us'] = 'Admin/contact_us';
$route['contact_us_reviews'] = 'Admin/contact_us_reviews';
$route['privacy'] = 'Admin/privacy';



//...........view products.................//
$route['view_products'] = 'Admin/view_products';
$route['fetch_data'] = 'Admin/fetch_data';

//...........view products details.................//
$route['view_product_details'] = 'Admin/view_product_details';


//...........search .................//
$route['searching'] = 'Admin/searching';


//...........cart .................//
$route['add_to_cart'] = 'Admin/add_to_cart';
$route['add_to_cart_by_ajax'] = 'Admin/add_to_cart_by_ajax';
$route['destroy_cart_item'] = 'Admin/destroy_cart_item';
$route['update_cart'] = 'Admin/update_cart';
$route['clear_cart'] = 'Admin/clear_cart';
$route['view_cart'] = 'Admin/view_cart';


//...........checkout .................//
$route['checkout'] = 'Admin/checkout';
$route['checkout_review'] = 'User_data_manage/checkout_review';

//...........user signup.................//
$route['user_signup'] = 'User/user_signup';
$route['check_user_signup'] = 'User/check_user_signup';

//...........user login.................//
$route['user_login_check'] = 'User/user_login_check';
$route['user_logout'] = 'User/user_logout';


//...........user profile.................//
$route['user_profile'] = 'User_data_manage/user_profile';
$route['change_user_detials'] = 'User_data_manage/change_user_detials';
$route['user_orders'] = 'User_data_manage/user_orders';

$route['place_order'] = 'User_data_manage/place_order';





$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
