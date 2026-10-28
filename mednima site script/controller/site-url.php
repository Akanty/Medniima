<?php
$forwardedProto = explode(',', $_SERVER['HTTP_X_FORWARDED_PROTO'] ?? '')[0];
$isHttps = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || strtolower(trim($forwardedProto)) === 'https';
$siteOrigin = ($isHttps ? 'https://' : 'http://') . ($_SERVER['HTTP_HOST'] ?? 'localhost');

if (!defined('SITE_URL')) {
    define('SITE_URL', $siteOrigin . '/');
}