<?php
namespace Bankas\Db\Controllers;

use Bankas\Db\App;

class AdminController {

  private static $db = 'App\\Db\\Json';
  // private static $db = 'App\\Db\\Maria';

  private function getData() {
    return self::$db == 'App\\Db\\Maria' ? self::$db::getMaria() : self::$db::getJson();
  }

  public function __construct() {
    if (!App::isLogged()) {
      App::redirect('login');
    }
  }

}