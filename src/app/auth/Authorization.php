<?php
namespace App\Auth;

class Authorization {

  public static function authAdd(object $user) {
    $_SESSION['auth'] = 1;
    $_SESSION['user'] = $user;
   }
  
   public static function authRem() {
    unset($_SESSION['auth'], $_SESSION['user']);
   }
  
   public static function auth() :bool {
    return isset($_SESSION['auth']) && $_SESSION['auth'] == 1;
   }
  
   public static function authName() :string {
    return $_SESSION['user']->name;
   }

}