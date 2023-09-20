<?php
namespace Bankas\Db;

class Messages { 

  private static $bag;

  public static function init() : void {
    self::$bag = $_SESSION['msg'] ?? [];
    unset($_SESSION['msg']);
  }

  public static function add(string $type, string $text) : void {
    $_SESSION['msg'][] = ['type' => $type, 'msg' => $text];
  }

  public static function get() : array {
    return self::$bag;
  }

 }