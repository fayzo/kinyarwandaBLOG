<?php 
include('database/DB.php');
include('class/DashboardClass.php');
define('BASE_URL_LINK', 'http://localhost:84/Blog_Kinyarwanda/private/assets/');
// SETTING FILE
define('LOGIN', 'http://localhost:84/Blog_Kinyarwanda/private/include/login.php');
define('LOGOUT', 'http://localhost:84/Blog_Kinyarwanda/private/include/logout.php');
define('SIGNUP', 'http://localhost:84/Blog_Kinyarwanda/private/include/sign_up.php');
define('FORGET_PASSPOWRD_LOGIN', 'http://localhost:84/Blog_Kinyarwanda/private/include/forgetPassword.php');
// END SETTING FILE

// PRIVATE_URL_VIEW

// PRIVATE_URL_VIEW
define('BASE_URL_PRIVATE', 'http://localhost:84/Blog_Kinyarwanda/private/');
define( 'NO_PROFILE_IMAGE_URL_PRIVATE_VIEW', 'private/assets/images/defaultprofileimage.png');
define( 'NO_COVER_IMAGE_URL_PRIVATE_VIEW', 'private/assets/images/defaultCoverImage.png');
// END_PRIVATE_URL_VIEW

// PUBLIC_URL_VIEW
define('BASE_URL_PUBLIC', 'http://localhost:84/Blog_Kinyarwanda/public/');
define( 'NO_PROFILE_IMAGE_URL_PUBLIC_VIEW', 'public/assets/images/defaultprofileimage.png');
define( 'NO_COVER_IMAGE_URL_PUBLIC_VIEW', 'public/assets/images/defaultCoverImage.png');
// END PUBLIC_URL_VIEW

?>