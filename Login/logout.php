<?php
session_name('loggedIn');
session_start();
$CookieInfo = session_get_cookie_params();
setcookie(session_name(), '', time() - 3600, $CookieInfo['path'], $CookieInfo['domain'], $CookieInfo[secure]);
unset($_COOKIE[session_name()]);
session_destroy();
header("location:../Home/Home.php");
?>
