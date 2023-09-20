<?php

namespace App\Db;

use App\Db\Database;
use Bankas\Db\Messages as M;

class Json implements Database {

  private static $obj;
  private $data, $file;

  public static function getJson($file) {
    return self::$obj ?? self::$obj = new self($file); 
  }

  public static function nextId() {
    $accounts = json_decode(file_get_contents(DIR.'data/accounts.json'));
    $last_acc = end($accounts);
    $last_id = $last_acc->id;
    return ++$last_id;
  }

  private function __construct($file) {
    $this->file = $file;
    if (!file_exists(DIR.'data/'.$file.'.json')) {
      file_put_contents(DIR.'data/'.$file.'.json', json_encode([]));
    }
    $this->data = json_decode(file_get_contents(DIR.'data/'.$file.'.json'), 1);
  }

  public function __destruct() {
    file_put_contents(DIR.'data/'.$this->file.'.json', json_encode($this->data));
  }


  public function showAll() : array {
    return $this->data;
  }

  public function create(array $data) : void {
    // $data['id'] = self::nextId();
    $this->data[] = $data;
  }

  public function update(int $id, array $data) : void {
    foreach($this->data as $key => $acc) {
      if ($acc['id'] == $id) {
        $this->data[$key] = $data;
      }
    }
   }

  public function show(int $userId) : array {
    foreach($this->data as $user) {
      if ($user['id'] == $userId) {
        return $user;
      }
    }
    M::add('alert', 'Vartotojas su ID '.$userId .'nera sukurtas!');
    return [];
 }

 public function delete(int $id) : void {
  foreach($this->data as $key => $item) {
    if ($item['id'] == $id) {
      unset($this->data[$key]);
    }
  }
 }

}