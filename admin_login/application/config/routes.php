<?php
defined('BASEPATH') OR exit('No direct script access allowed');


//...................admin login................//
$route['default_controller'] = 'Admin_login';
$route['login_check'] = 'Admin_login/login_check';
$route['admin_logout'] = 'Admin_login/admin_logout';


//...................basic info ................//
$route['basic_info'] = 'Admin/basic_info';
$route['basic_info_check'] = 'Admin/basic_info_check';
$route['about_us_page'] = 'Admin/about_us_page';
$route['contact_us_page'] = 'Admin/contact_us_page';
$route['update_privacy'] = 'Admin/update_privacy';
$route['update_terms'] = 'Admin/update_terms';


//...................front page ................//
$route['front_page'] = 'Admin/front_page';
$route['main_banner'] = 'Admin/main_banner';
$route['mini_banner'] = 'Admin/mini_banner';



//...................order stats................//
$route['order_stats'] = 'Admin/order_stats';
$route['view_order_details'] = 'Admin/view_order_details';
$route['accept_for_delivery'] = 'Admin/accept_for_delivery';
$route['out_of_reach'] = 'Admin/out_of_reach';
$route['all_orders'] = 'Admin/all_orders';


//...................review section................//
$route['contact_us_review'] = 'Admin/contact_us_review';
$route['delete_contact_us_review'] = 'Admin/delete_contact_us_review';


//...................category ................//
$route['add_category'] = 'Admin/add_category';
$route['category_check'] = 'Admin/category_check';
$route['delete_category'] = 'Admin/delete_category';


//...................sub category ................//
$route['add_sub_category'] = 'Admin/add_sub_category';
$route['sub_category_check'] = 'Admin/sub_category_check';
$route['delete_sub_category'] = 'Admin/delete_sub_category';

//...................add advertisement ................//
$route['fetch_sub_category'] = 'Admin/fetch_sub_category';
$route['add_advertisement'] = 'Admin/add_advertisement';
$route['check_advertisement'] = 'Admin/check_advertisement';

//...................view advertisement ................//
$route['view_advertisement'] = 'Admin/view_advertisement';
$route['delete_advertisement'] = 'Admin/delete_advertisement';
$route['get_advertisement'] = 'Admin/get_advertisement';
$route['edit_advertisement'] = 'Admin/edit_advertisement';

//...................update main image of advertisement ................//
$route['get_advertisement_main_image'] = 'Admin/get_advertisement_main_image';
$route['edit_advertisement_main_image'] = 'Admin/edit_advertisement_main_image';

//...................update inner images of advertisement ................//
$route['get_advertisement_images'] = 'Admin/get_advertisement_images';
$route['edit_advertisement_images'] = 'Admin/edit_advertisement_images';
$route['delete_inside_image'] = 'Admin/delete_inside_image';

//...................manage feature products ................//
$route['manage_feature_products'] = 'Admin/manage_feature_products';
$route['add_feature_product'] = 'Admin/add_feature_product';
$route['remove_feature_product'] = 'Admin/remove_feature_product';


//...................manage team ................//
$route['team'] = 'Admin/team';
$route['get_team'] = 'Admin/get_team';
$route['edit_team'] = 'Admin/edit_team';
$route['delete_team'] = 'Admin/delete_team';



$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
