<?php 
session_start();
include('core/init.php');

if ($dashboardpage->loggedin() == false) {
	header('location: '.LOGIN.'');
}
$sql= $db->query("SELECT user_id,language FROM users WHERE user_id = $_SESSION[key]");
$data = $sql->fetch_array(); 

if(!empty($data['language'])){
    $_SESSION['language'] = $data['language'];
}

 if (!isset($_SESSION['language'])){
 		$_SESSION['lang'] = "en";
}else if (isset($_SESSION['language']) && !empty($_SESSION['language'])) {
		$_SESSION['lang'] = $_SESSION['language'];
}
 require_once "assets/languages/" .$_SESSION['lang']. ".php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- DATATABLE  jQuery UI integration for Responsive -->
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL_LINK ;?>dist/css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL_LINK ;?>dist/css/dataTables.jqueryui.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL_LINK ;?>dist/css/responsive.jqueryui.min.css"> -->
    <!-- DATATABLE  jQuery UI integration for Responsive -->

    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL_LINK ;?>dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL_LINK ;?>dist/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL_LINK ;?>dist/css/dashboard_profile.css">
    <!-- DATATABLE Bootstrap 4 integration for Responsive -->
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL_LINK ;?>dist/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL_LINK ;?>dist/css/responsive.bootstrap4.min.css">
    <!-- DATATABLE Bootstrap 4 integration for Responsive -->

    <link href="<?php echo BASE_URL_LINK ;?>dist/css/navbar_orange.css" rel="stylesheet">
    <link href="<?php echo BASE_URL_LINK ;?>dist/css/navbar_blac.css" rel="stylesheet">
    <link href="<?php echo BASE_URL_LINK ;?>dist/css/navbar_yellow.css" rel="stylesheet">
    <link href="<?php echo BASE_URL_LINK ;?>dist/css/navbar_blue.css" rel="stylesheet">
    <link href="<?php echo BASE_URL_LINK ;?>dist/css/navbar_purple.css" rel="stylesheet">
    <link href="<?php echo BASE_URL_LINK ;?>dist/css/navbar_rose.css" rel="stylesheet">
    <link href="<?php echo BASE_URL_LINK ;?>dist/css/navbar_green.css" rel="stylesheet">
    <link href="<?php echo BASE_URL_LINK ;?>dist/css/navbar_chocolate.css" rel="stylesheet">
    <link href="<?php echo BASE_URL_LINK ;?>dist/css/dropdown.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo BASE_URL_LINK ;?>dist/css/upload_profile_imagee.css">
    <link href="<?php echo BASE_URL_LINK ;?>icon/google_icon/google_icons.css" rel="stylesheet">
    <link href="<?php echo BASE_URL_LINK ;?>icon/flag-icon-css-master/css/flag-icon.css" rel="stylesheet">
    <!-- <link   href="fontawesome_5_4/css/fontawesome.css" rel="stylesheet">
    <link   href="fontawesome_5_4/css/solid.css" rel="stylesheet">
    <link   href="fontawesome_5_4/css/regular.css" rel="stylesheet">
    <link   href="fontawesome_5_4/css/brands.css" rel="stylesheet"> -->
    <!-- <link   href="fontawesome_5_4/css/all.css" rel="stylesheet"> -->
    <!-- <script src="fontawesome_5_4/js/fontawesome.js"></script>
    <script src="fontawesome_5_4/js/solid.js"></script>
    <script src="fontawesome_5_4/js/regular.js"></script>
    <script src="fontawesome_5_4/js/brands.js"></script> -->
    <script src="<?php echo BASE_URL_LINK ;?>icon/fontawesome_5_4/js/all.js"></script>
    <!-- <script src="https://cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script> -->
    <script src="<?php echo BASE_URL_LINK ;?>js/color.js"></script>
    <script src="<?php echo BASE_URL_LINK ;?>js/language.js"></script>
    <script src="<?php echo BASE_URL_LINK ;?>js/country.js"></script>
