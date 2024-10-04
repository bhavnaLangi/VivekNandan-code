<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
  | -------------------------------------------------------------------------
  | URI ROUTING
  | -------------------------------------------------------------------------
  | This file lets you re-map URI requests to specific controller functions.
  |
  | Typically there is a one-to-one relationship between a URL string
  | and its corresponding controller class/method. The segments in a
  | URL normally follow this pattern:
  |
  |	example.com/class/method/id/
  |
  | In some instances, however, you may want to remap this relationship
  | so that a different class/function is called than the one
  | corresponding to the URL.
  |
  | Please see the user guide for complete details:
  |
  |	https://codeigniter.com/userguide3/general/routing.html
  |
  | -------------------------------------------------------------------------
  | RESERVED ROUTES
  | -------------------------------------------------------------------------
  |
  | There are three reserved routes:
  |
  |	$route['default_controller'] = 'welcome';
  |
  | This route indicates which controller class should be loaded if the
  | URI contains no data. In the above example, the "welcome" class
  | would be loaded.
  |
  |	$route['404_override'] = 'errors/page_missing';
  |
  | This route will tell the Router which controller/method to use if those
  | provided in the URL cannot be matched to a valid route.
  |
  |	$route['translate_uri_dashes'] = FALSE;
  |
  | This is not exactly a route, but allows you to automatically route
  | controller and method names that contain dashes. '-' isn't a valid
  | class or method name character, so it requires translation.
  | When you set this option to TRUE, it will replace ALL dashes in the
  | controller and method URI segments.
  |
  | Examples:	my-controller/index	-> my_controller/index
  |		my-controller/my-method	-> my_controller/my_method




 */

//front
$route['default_controller'] = 'Home';
 $route['404_override'] = 'Home/error';
// $route['404_override'] = 'my404';
$route['translate_uri_dashes'] = FALSE;

//front
$route['about']="Home/about";
$route['contact']="Home/contact";
$route['services']="Home/services";
$route['career']="Home/career";
$route['principal-architect']="Home/principal_architect";
$route['methodology']="Home/methodology";
$route['philosophy']="Home/philosophy";
$route['award']="Home/award";
$route['article']="Home/article";
$route['projects']="Home/project";
$route['projects/(:any)']="Home/project/$1";
$route['project/(:any)']="Home/project_detail";
$route['projectcat/(:any)']="Home/projectcat/$1";
$route['search']='Home/search';
$route['contact-form']= 'Home/addcontact';
$route['career-form']= 'Home/add_career';
$route['thank-you/(:any)']="Home/thank/$1";
$route['media']= "Home/media";






//Login route
$route['setup']='Master/setlogin';
$route['loginsetup'] = 'Master/chklogin';
$route['webset-form']='Master/webset';
$route['websitesetting-form']='Master/websitesetting';
$route['privilege-setup']='Master/privilegesetup';
$route['webset-update-form']='Dashboard/webset_update';
$route['security-key']='Dashboard/settings';
$route['websitesetting-update-form']='Dashboard/websitesetting_update';
$route['loginsetup-update'] = 'Dashboard/chklogin_update';
$route['privilege-setup-update']='Dashboard/privilegesetup_update';


$route['master'] = 'login';
$route['call-post'] = 'Login/call_post';
$route['call-post-web'] = 'Login/call_post_web';

$route['Login-chk'] = 'Login/chklogin';
$route['verify-otp'] = 'login/verify_otp';
$route['otp-chk'] = 'login/chk_otp';
$route['forgot-password'] = 'login/forgot_password';
$route['request-password'] = 'login/request_password';
$route['verify-forgot-otp'] = 'login/verify_forgot_otp';
$route['forgot-chk-otp'] = 'login/forgot_chk_otp';
$route['change-password'] = 'login/change_password';
$route['update-password'] = 'login/update_password';
$route['resend-otp'] = 'login/resend_otp';
$route['logout'] = 'login/logout';
$route['profile-settings'] = 'Profile/profile';
$route['edit-profile'] = 'profile/edit_profile';
$route['feset-password'] = 'Login/change_password1';
$route['settings'] = 'Profile/settings';
$route['edit-setting'] = 'profile/edit_setting';



//Dashboard
$route['dashboard'] = 'dashboard';






//product
//category
$route['datatable'] = 'blog/data_table';
$route['category-list'] = 'product';
$route['add-category'] = 'product/add_category';
$route['retrive-category'] = 'product/fetch_category';

$route['add-sequence']= 'product/add_sequence';
$route['retrive-sequence'] = 'product/fetch_sequence';
$route['add-sequence1']= 'Product/add_sequence1';
$route['retrive-sequence1'] = 'Product/fetch_sequence1';

$route['edit-category'] = 'product/edit_category';
$route['delete-category'] = 'product/delete_category';
$route['status-category'] = 'product/status_category';
$route['featured-product'] = 'product/featured';

$route['delete_allprocat'] = 'product/deleteAllprocat'; 
$route['status_allprocat'] = 'product/statusallprocat';

$route['status_allprocatde'] = 'product/statusalldeprocat';

$route['delete_allprosubcat'] = 'product/deleteAllprosubcat'; 
$route['status_allprosubcat'] = 'product/statusallprosubcat';
$route['status_allprosubcatde'] = 'product/statusalldeprosubcat';

$route['delete_allpro'] = 'product/deleteAll'; 
$route['status_allpro'] = 'product/statusall';
$route['status_alldepro'] = 'product/statusallde';

//subcategory

$route['subcategory-list'] = 'product/subcategory_list';
$route['add-subcategory'] = 'product/add_subcategory';
$route['retrive-subcategory'] = 'product/fetch_subcategory';
$route['edit-subcategory'] = 'product/edit_subcategory';
$route['delete-subcategory'] = 'product/delete_subcategory';
$route['status-subcategory'] = 'product/status_subcategory';
$route['fetch-address'] = 'Product/fetch_address';
$route['myformAjax/(:any)'] = 'product/myformAjax/$1';

// Product start

$route['getCityDepartment'] = 'product/getCityDepartment';
$route['editproductseo/(:any)']='product/editproductseo/$1';
$route['add-project'] = 'product/addproduct';
$route['insert-product'] = 'product/insert_product';
$route['project-list'] = 'product/product_list';
$route['edit-project/(:any)'] = 'product/editproduct/$1';
$route['edit-pro'] = 'product/editproduct1';
$route['delete-product'] = 'product/delete_product';
$route['status-product'] = 'product/status_product';




//blog List

$route['blogcategory-list'] = 'Blog';
$route['add-blogcategory'] = 'Blog/add_blogcategory';
$route['retrive-blogcategory'] = 'Blog/fetch_blogcategory';

$route['edit-blogcategory'] = 'Blog/edit_blogcategory';
$route['delete-blogcategory'] = 'Blog/delete_blogcategory';
$route['status-blogcategory'] = 'Blog/status_blogcategory';
$route['feature-blog'] = 'Blog/feature_blog';
//blog
$route['add-blog'] = 'Blog/addblog';
$route['blog-list'] = 'Blog/blog_list';
$route['edit-blog/(:any)'] = 'Blog/edit_blog/$1';
$route['editblogupdate'] = 'Blog/editblog';

$route['insert-blog'] = 'Blog/insert_blog';
$route['retrive-blog'] = 'Blog/fetch_blog';
$route['delete-blog'] = 'Blog/delete_blog';
$route['status-blog'] = 'Blog/status_blog';
$route['upload_ckeditor'] = 'Blog/upload';
$route['ckeditor_images'] = 'Blog/ckimg_view';
$route['add-seo'] = 'Blog/addseo';
$route['edit-blogseo/(:any)'] = 'Blog/editseo/$1';

$route['status_allblogcat'] = 'Blog/statusallblogcat';
$route['status_allblogcatde'] = 'Blog/statusalldeblogcat';
$route['delete_allblogcat'] = 'Blog/deleteAllblogcat'; 
$route['status_allblog'] = 'Blog/statusallblog';
$route['status_allblogde'] = 'Blog/statusalldeblog';
$route['delete_allblog'] = 'Blog/deleteAllblog'; 





// AWARDS
$route['add-awards'] = 'testinomial';
$route['insert-testimonials'] = 'testinomial/insert_testimonials';
$route['awards_list'] = 'testinomial/testimonial_list';
$route['edit-awards/(:any)'] = 'testinomial/edit_testimonial/$1';
$route['edit-testimonial'] = 'testinomial/edittestimonial';
$route['delete-testimonial'] = 'testinomial/delete_testimonial';
$route['status-testimonial'] = 'testinomial/status_testimonial';
$route['retrive-test'] = 'Testinomial/fetch_test';
$route['delete_alltest'] = 'Testinomial/deleteAll'; 
$route['status_alltest'] = 'Testinomial/statusall';
$route['status_alltestde'] = 'Testinomial/statusallde';

$route['delete_allcl'] = 'Clientele/deleteAll'; 
$route['status_allcl'] = 'Clientele/statusall';
$route['status_allclde'] = 'Clientele/statusallde';

//media
$route['add-media'] = 'Team';
$route['insert-teams'] = 'Team/insert_team';
$route['media_list'] = 'Team/team_list';
$route['retrive-team'] = 'Team/fetch_team';
$route['edit-media/(:any)'] = 'Team/edit_team/$1';
$route['delete-team'] = 'Team/delete_team';
$route['status-team'] = 'Team/status_team';

$route['status_allteam'] = 'Team/statusallteam'; 
$route['delete_allteam'] = 'Team/deleteAllteam';
$route['status_allteamde'] = 'Team/statusalldeteam'; 


//pri users
$route['users']= 'User';
$route['fetch-privlist']= 'User/fetch_privlist';
$route['addp']= 'User/addp';
$route['add-privilege'] ='User/add_pri';
// $route['add1-privilege/(:any)']='User/privilege/$1';
$route['add1-privilege']='User/privilege';
$route['edit-privilege/(:any)']='User/edit/$1';
$route['update-privilege']='User/update';
$route['subadmin']='User/add_subadmin';
$route['insert-subadmin']='User/insert_subadmin';
$route['subadminlist']='User/fetch_subadmin';
$route['fetch-subad']='User/fetch_subad';
$route['edit-subadmin/(:any)']= 'User/edit_subadmin/$1';
$route['update-subadmin']='User/update_subadmin';
$route['status-subadmin']='User/status';
$route['delete-subadmin']='User/delete_subadmin';

$route['static-add']='Staticmodule';
$route['insert-statseo']='Staticmodule/insert';
$route['static-list']='Staticmodule/list';
$route['static-add-page']='Staticmodule/list_page';
$route['add-page']='Staticmodule/add_page';
$route['retrive-pagename']='Staticmodule/fetch_page';
$route['delete-page']='Staticmodule/delete_page';

$route['edit-staticseo/(:any)']='Staticmodule/edit/$1';
$route['edit-staticseo'] = 'Staticmodule/edit';
$route['website-set/(:any)']='Staticmodule/websitesetting/$1';
$route['websitesetting-add']='Staticmodule/websitesetting_add';
$route['websitesetting-list']='Staticmodule/websitesetting_list';
$route['add-settings']='Staticmodule/add_settings';


$route['insert-settings']='Staticmodule/insertsettings';
$route['deleteem']='Staticmodule/deleteem';
$route['deletecontact']='Staticmodule/deletecontact';
$route['roles']= 'User/roles';
$route['add-role'] = 'User/add_role';
$route['retrive-role'] = 'User/fetch_role';

$route['edit-role'] = 'User/edit_role';
$route['delete-role'] = 'User/delete_role';
//enq list
$route['contact-enq']='Dashboard/contact_enq';
$route['career-list']='Dashboard/career';

$route['retrive-cenq']= 'Master/retrivecenq';
$route['loginhistory']='Dashboard/loginhis';
$route['activitylog']='Dashboard/activiloglist';
$route['logoutdevice/(:any)']='login/logoutdevice/$1';
//
$route['status-pri']='User/status_pri';
$route['status-prim']='User/status_prim';
$route['status-priall']='User/statusall_prim';



//color 
$route['color-details/(:any)'] = 'Login/color_details/$1';

$route['deleteem']='Product/unlink';
$route['update-slider'] = 'Product/addslider';
$route['editsliderupdate'] = 'Product/editslider';


