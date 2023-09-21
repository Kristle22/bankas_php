<?php
namespace Bankas\Db;

use Bankas\Db\Controllers\HomeController;
use Bankas\Db\Controllers\AdminController;
use Bankas\Db\Controllers\LoginController;
use Bankas\Db\Validations;
use Bankas\Db\Messages;

class App {

  private static $html;
  
  public static function start() {
    define('URL', 'http://localhost/bankas_react/public/');
    define('BASE', '/bankas_react/public/');
    define('DIR', __DIR__.'/../');
    
    session_start();
    Messages::init();
    Validations::init();
    ob_start();

    $uri = str_replace(BASE, '', $_SERVER['REQUEST_URI']);
    define('URI', explode('/', $uri));

    // $uri = explode('/', $_SERVER['REQUEST_URI']);
    // array_shift($uri); // with DOMAIN

    self::route(URI);
    self::$html = ob_get_contents();
    ob_end_clean();
  }

  public static function html() {
    echo self::$html;
   }

  public static function route(array $uri) {

    $m = $_SERVER['REQUEST_METHOD'];

    if ('GET' == $m && 1 == count(URI) && '' === URI[0]) {
      return (new HomeController)->index();
    }
    if ('GET' == $m && 1 == count(URI) && 'list' === URI[0]) {
      return (new AdminController)->list();
    }
    if ('GET' == $m && 1 == count(URI) && 'new' === URI[0]) {
      return (new AdminController)->newAcc();
    }
    if ('POST' == $m && 1 == count(URI) && 'new' === URI[0]) {
      return (new AdminController)->createAcc();
    }
    if ('GET' == $m && 2 == count(URI) && 'add' === URI[0]) {
      return (new AdminController)->addPage(URI[1]);
    }
    if ('GET' == $m && 2 == count(URI) && 'charge' === URI[0]) {
      return (new AdminController)->chargePage(URI[1]);
    }
    if ('POST' == $m && 2 == count(URI) && in_array(URI[0], ['add', 'charge'])) {
      return (new AdminController)->updateAcc(URI[0], URI[1]);
    }
    if ('POST' == $m && 2 == count(URI) && 'delete' === URI[0]) {
      return (new AdminController)->deleteAcc(URI[1]);
    }
    if ('GET' == $m && 1 == count(URI) && 'login' === URI[0]) {
      return (new LoginController)->showLogin();
    }
    if ('POST' == $m && 1 == count(URI) && 'login' === URI[0]) {
      return (new LoginController)->login();
    }
    if ('POST' == $m && 1 == count(URI) && 'logout' === URI[0]) {
      return (new LoginController)->logout();
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

  public static function url($url = '') {
    return URL.$url;
  }

}