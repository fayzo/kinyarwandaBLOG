<?php
session_start();
include('../core/init.php');

session_unset($_SESSION['key']);
session_destroy();
header('location: '.LOGIN.'');

 ?>