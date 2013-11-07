<?php
define('SITE', 'lumut');

require_once "libraries/loader.php";

$routes = Spyc::YAMLLoad(CONFIGDIR . '/routes.yaml');

$router = new Router($routes);
$route = $router->current();

$cfs = is_array($route['content']) ? $route['content'] : array($route['content']);
$contents = array();
$site_content = Spyc::YAMLLoad(CONTENTDIR . '/sites.yaml');
  
foreach($cfs as $cf) {
  $contents = array_merge($contents, Spyc::YAMLLoad(CONTENTDIR . '/' . $cf));
}

$theme = ! empty($route['theme']) ? $route['theme'] : 'index.php';

ob_start();
extract(array_merge($site_content,$contents));
include_once THEMEDIR . '/'. $theme;