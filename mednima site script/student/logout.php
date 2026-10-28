<?php
session_start(); 
$_SESSION = array();
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 60*60,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
unset($_SESSION['slogin']);
session_destroy(); // destroy session
define(SITE_URL, 'http://'.$_SERVER["HTTP_HOST"].'/'); //Get the site url
ob_end_clean(); // Delete the buffer.
		$url=''.SITE_URL.'login';
        header("Location: $url");
        exit();
?>

