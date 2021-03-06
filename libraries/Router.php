<?php
class Router
{
  private $routes;
  private $path;
  
  public function __construct($routes) {
    $this->routes = $routes;
    $this->path = self::getPath();
  }
  
  
  public function current($routes = array()) {
    $this->routes = array_merge($this->routes, $routes);
    $key = $this->getKeyRoute();

    if (is_null($key)) {
      return null;
    }
    
    return $this->routes[$key];
  }
  
  private function getKeyRoute() {
    
    foreach($this->routes as $route => $value) {
      if (preg_match('/^'.str_replace('/', '\/', $route).'$/', $this->path)) {
        return $route;
      }
    }
    
    return null;
  }
  
  public static function getPath() {
    if ( ! empty($_SERVER['PATH_INFO'])) {
      $path = $_SERVER['PATH_INFO'];
    }
    elseif ( ! empty($_SERVER['ORIG_PATH_INFO']) && $_SERVER['ORIG_PATH_INFO'] !== '/index.php') {
      $path = $_SERVER['ORIG_PATH_INFO'];
    }
    else {
      if ( ! empty($_SERVER['REQUEST_URI']) && !empty($_SERVER['SCRIPT_NAME'])) {
        $uri = $_SERVER['REQUEST_URI'];
       
        if (strpos($uri, '?') > 0) {
          if (version_compare(PHP_VERSION, '5.3.0') >= 0) {
            $path = strstr($_SERVER['REQUEST_URI'], '?', true);
          }
          else {
            $path = self::str_before($_SERVER['REQUEST_URI'], '?');
          }
        }
        else {
          if (strpos($uri, $_SERVER['SCRIPT_NAME']) === 0) {
            $path = substr($uri, strlen($_SERVER['SCRIPT_NAME']));
          }
          elseif (strpos($uri, dirname($_SERVER['SCRIPT_NAME'])) === 0) {
            $path = substr($uri, strlen(dirname($_SERVER['SCRIPT_NAME'])));
          }
        }
      }
    }

    return empty($path) ? '/' : $path;
  }

  public static function str_before($subject, $needle) {
    $p = strpos($subject, $needle);
    return substr($subject, 0, $p);
  }
  
}