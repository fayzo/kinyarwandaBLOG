<?php 
define('FILE', dirname(__FILE__));
define('FILEs', __DIR__);
echo FILE . ' <br >';
echo __LINE__ . ' <br >';
echo __DIR__ . ' <br >';
echo __CLASS__ . ' <br >';
echo $_SERVER['SCRIPT_FILENAME'] . '<br >';
echo $_SERVER['SCRIPT_NAME'] . '<br>';
$strpos = strpos($_SERVER['SCRIPT_NAME'], '/private');
$var1= $_SERVER['DOCUMENT_ROOT'].'socialKinyarwanda/private/assets/image/users/user_image_profile/';
$strposs = strpos($_SERVER['DOCUMENT_ROOT'].'socialKinyarwanda/private/assets/image/users/user_image_profile/', 'assets/image/users/user_image_profile/');
echo $strposs;
echo substr($_SERVER['DOCUMENT_ROOT'], 0, $strpos) . ' <br >';
echo substr_replace($var1, '', 0,$strposs) . "<br />\n";

echo substr($_SERVER['SCRIPT_NAME'], 0, $strpos) . ' <br >';
echo $_SERVER['DOCUMENT_ROOT'] . ' onenene<br >';
$strp = strpos($_SERVER['PHP_SELF'],'index.php').'<br>';
echo substr($_SERVER['PHP_SELF'], 0, $strp). ' <br >';
echo $strp;
echo $_SERVER['PHP_SELF'] . ' <br >';
$var = 'ABCDEFGH:/MNRPQR/';
echo "Original: $var<hr />\n";

/* These two examples replace all of $var with 'bob'. */
echo substr_replace($var, 'bob', 0) . "<br />\n";
echo substr_replace($var, 'bob', 0, strlen($var)) . "<br />\n";

/* Insert 'bob' right at the beginning of $var. */
echo substr_replace($var, 'bob', 0, 0) . "<br />\n";

/* These next two replace 'MNRPQR' in $var with 'bob'. */
echo substr_replace($var, 'bob', 10, -1) . "<br />\n";
echo substr_replace($var, 'bob', -7, -1) . "<br />\n";

/* Delete 'MNRPQR' from $var. */
echo substr_replace($var, '', 10, -1) . "<br />\n";
$text = 'This is a test';
echo strlen($text); // 14
echo substr_count($text, 'is',3)."<br />\n";
$textd= 'amakuru=bite';
var_dump(explode("=", $textd)). "<br />";
echo trim($var, ':/MNRPQR/'). "<br />\n";

include('core/init.php');

// echo $dashboardpage->getnavbar("amakuru=bite=uraho");
echo $dashboardpage->explodeFetchNavbar(1);
// echo $dashboardpage->deletenavbar(1);
// echo $dashboardpage->resultNavbar();
// echo $dashboardpage-> explode();
echo '<br>';

   date_default_timezone_set("Africa/Kigali");
   $currentTimes = time();
   $dateTime = strftime("%A,%b-%d-%Y %Hh:%Mmin:%Ssec %p",$currentTimes);
   $dateTimes = strftime("%Y-%m-%d",$currentTimes);
//   type="datetime-local"
 echo $dateTimes.'<br>'; 
 echo $currentTimes.'<br>'; 
 echo date('l').'<br>'; // weeks Friday
 echo date('D').'<br>'; // weeks Fri
 echo date('F').'<br>'; // month april
 echo date('d').'<br>'; // days 12
 echo date('Y').'<br>'; // years 2019
 echo date('j').'<br>'; // days 12
 echo date('D j,Y').'<br>'; // days 12
 echo strlen(date('D j,Y')).'<br>'; // days 12
if (strlen(date('D ,Y')) == 11) {
    # code...
    echo "good";
}else{
    echo "bad";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<p id="result">sd</p>
<p id="results"></p>
<p ><a id="helo" href="ad">gud</a></p>

<script src="<?php echo BASE_URL_LINK ;?>dist/js/jquery.min.js"></script>
<script>
</script>
</body>
</html>