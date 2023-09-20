<?php
namespace Bankas\Db;

class Validations { 

  private static $bag;

  public static function init() : void {
    self::$bag = $_SESSION['errors'] ?? [];
    unset($_SESSION['errors']);
  }

  public static function addErr(string $err) : void {
    $_SESSION['errors'][] = $err;
  }

  public static function getErr() : array {
    return self::$bag;
  }

  public static function createAcc() {
    $lenName = strlen($_POST['name']); 
    $lenSurname = strlen($_POST['surname']);
    $lenId = strlen($_POST['id']); 

    if (!preg_match ("/^[0-9]*$/", $_POST ['id'])) { 
      App::addError('id_nums', 'Your Personal Code is not valid.');
      App::redirect('new');
    } 
    if ($lenId && $lenId != 11) {
      App::addError('id_len', 'Your Personal Code\'s length is invalid.');
      App::redirect('new');
    }
    if(empty($_POST['id'])) {
      App::addError('no_id', 'Personal code is required.');
      App::redirect('new');
    }
    if(empty($_POST['name'])) {
      App::addError('no_name', 'Name is required.');
      App::redirect('new');
    } 
    if(empty($_POST['surname'])) {
      App::addError('no_surname', 'Surname is required.');
      App::redirect('new');
    } 
    if($lenName < 3) {
      App::addError('name_len', 'Name must consist at least of 3 letters.');
      App::redirect('new');
    } 
    if($lenSurname < 3) {
      App::addError('surname_len', 'Surname must consist at least of 3 letters.');
      App::redirect('new');
    } 
    if ($this->checkId($_POST['id']) == 'NOT') {
      App::addError('id_unique', 'Sąskaita su tokiu asmens kodu jau atidaryta.');
      App::redirect('new');
    } 
  }

 }