<?php
namespace Bankas\Db;

use Bankas\Db\Controllers\BankController;
use Bankas\Db\Controllers\HomeController;
use Bankas\Db\Messages;

class App {

  private static $html;
  
  public static function start() {
    define('URL', 'http://localhost/bankas_react/public/');
    define('BASE', '/bankas_react/public/');
    define('DIR', __DIR__.'/../');
    
    session_start();
    Messages::init();
    ob_start();

    $uri = str_replace(BASE, '', $_SERVER['REQUEST_URI']);
    $uri = explode('/', $uri);

    // $uri = explode('/', $_SERVER['REQUEST_URI']);
    // array_shift($uri); // with DOMAIN

    self::route($uri);
    self::$html = ob_get_contents();
    ob_end_clean();
  }

  public static function html() {
    echo self::$html;
   }

  public static function route(array $uri) {

    $m = $_SERVER['REQUEST_METHOD'];

    if ('GET' == $m && 1 == count($uri) && '' === $uri[0]) {
      return (new HomeController)->index();
    }
  }

  public static function view($name, $data = [], $extra = '') {
    extract($data);
    require DIR."views/$name.php";
  }

  public static function redirect($url) {
    header('Location: '.URL.$url);
    die;
  }

}