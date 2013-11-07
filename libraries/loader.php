<?php
require_once "spyc/Spyc.php";
require_once "Router.php";

define('SITEDIR', getcwd() . DIRECTORY_SEPARATOR . 'sites' . DIRECTORY_SEPARATOR . SITE);
define('CONFIGDIR', SITEDIR . DIRECTORY_SEPARATOR . 'config');
define('CONTENTDIR', SITEDIR . DIRECTORY_SEPARATOR . 'contents');
define('THEMEDIR', SITEDIR . DIRECTORY_SEPARATOR . 'themes');
define('BASEURL', getHost());
define('THEMEURL', getHost() . 'sites/' . SITE . '/themes/');
define('CONTENTURL', getHost() . 'sites/' . SITE . '/contents/');

function getHost() {
  $base_url = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
  $base_url .= '://'. $_SERVER['HTTP_HOST'];
  $base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
  
  return $base_url;
}


