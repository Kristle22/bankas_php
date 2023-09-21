<?php
namespace Bankas\Db;

use Bankas\Db\App;

class Validations { 

  private static $bag;

  public static function init() {
    self::$bag = $_SESSION['errors'] ?? [];
    unset($_SESSION['errors']);
  }

  public static function addErr(string $err, string $type) : void {
    $_SESSION['errors'][] = ['err' => $err, 'type' => $type];;
  }

  public static function getErr() : array {
    return self::$bag;
  }

  public static function checkId(int $id) {
    $data = json_decode(file_get_contents(DIR.'data/accounts.json'),1);
    foreach ($data as &$acc) {
      if($id == $acc['AK']) {
        return 1;
        break;
      }
    }
    return 0;
  }

  public static function checkType(string $type, string $type2 = '', string $type3 = '') {
    foreach(self::getErr() as $err) {
      if($err['type'] == $type || $err['type'] == $type2 || $err['type'] == $type3) {
        return $err['type'];
      }
    }
    return 0;
  }

  public static function createAcc() {
    $lenName = strlen($_POST['name']); 
    $lenSurname = strlen($_POST['surname']);
    $lenId = strlen($_POST['id']); 

    if (!preg_match ("/^[0-9]*$/", $_POST ['id'])) { 
      self::addErr('Your Personal Code is not valid.', 'id_nums');
      App::redirect('new');
    } 
    if ($lenId && $lenId != 11) {
      self::addErr('Your Personal Code\'s length is invalid.', 'id_len');
      App::redirect('new');
    }
    if(empty($_POST['id'])) {
      self::addErr('Personal code is required.', 'no_id');
      App::redirect('new');
    }
    if(empty($_POST['name'])) {
      self::addErr('Name is required.', 'no_name');
      App::redirect('new');
    } 
    if(empty($_POST['surname'])) {
      self::addErr('Surname is required.', 'no_surname');
      App::redirect('new');
    } 
    if($lenName < 3) {
      self::addErr('Name must consist at least of 3 letters.', 'name_len');
      App::redirect('new');
    } 
    if($lenSurname < 3) {
      self::addErr('Surname must consist at least of 3 letters.', 'surname_len');
      App::redirect('new');
    } 
    if (self::checkId($_POST['id']) == 1) {
      self::addErr('Sąskaita su tokiu asmens kodu jau atidaryta.', 'id_unique');
      App::redirect('new');
    } 
  }

 }