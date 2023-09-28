<?php
namespace Bankas\Db\Controllers;

use Bankas\Db\App;
use Bankas\Db\Messages as M;
use Bankas\Db\Validations as V;
use App\Auth\Authorization as A;

class AdminController {

  private $db = 'App\\Db\\Json';
  // private $db = 'App\\Db\\Maria';
  private $file ='accounts';
  
  private static $nr;
  
  private function getData($file) {
    $this->file = $file;
    
    return $this->db::get($file);
  }
  
  private static function getNr() {
    return self::$nr = 'LT'.rand(100000000000000000, 999999999999999999);
  }

  public function __construct() {
    if (!A::auth()) {
      App::redirect('login');
    }
  }

  public function list() {
    $data = $this->getData($this->file)->showAll();
    usort($data, function($a, $b) {
      return $a['pavarde'] <=> $b['pavarde'];
    });
    return App::view('list', ['title' => 'ACCOUNTS LIST', 'data' => $data, 'messages' => M::get()]);
  }

  public function newAcc() {
    return App::view('new', ['title' => 'CREATE NEW', 'nr' => self::getNr(), 'messages' => M::get(), 'errors' => V::getErr()]);
  }

  public function createAcc() {
    $new = ['id' => $this->db::nextId(), 'Nr' => $_POST['nr'], 'vardas' => $_POST['name'], 'pavarde' => $_POST['surname'], 'AK' => $_POST['id'], 'likutis' => 0];
    
    V::createAcc();
    $this->getData($this->file)->create($new);
    M::add('success', 'Nauja sąskaita sėkmingai sukurta.'); 
    App::redirect('list');
  }

  public function addPage($id) {
    $account = $this->getData($this->file)->show($id);
    return App::view('add', ['title' => 'ADD FUNDS', 'acc' => $account, 'messages' => M::get()]);
  }

  public function chargePage($id) {
    $extra = 'LT'.rand(100000000000000000, 999999999999999999);
    $account = $this->getData($this->file)->show($id);
    return App::view('charge', ['title' => 'CHARGE FUNDS', 'acc' => $account, 'messages' => M::get()]);
  }

  public function updateAcc($action, $id) {
    $account = $this->getData($this->file)->show($id);
    if ('add' == $action) {
      $account['likutis'] += (float)$_POST['plus'];
      M::add('success', $_POST['name'] .' '.$_POST['surname'].' sąskaita buvo sėkmingai papildyta '.$_POST['plus'].' EUR.'); 
    }
    if ('charge' == $action) {
      if (empty($_POST['minus'])) {
        M::add('danger', 'Įveskite reikiamą sumą.');
        App::redirect("charge/$id");
      }
      elseif ($_POST['minus'] > $account['likutis']) {
        M::add('alert', 'Jusu saskaitoje nepakankamas pinigų likutis.');
        App::redirect("charge/$id");
      }
      $account['likutis'] -= (float)$_POST['minus'];
      M::add('success', 'Nuo '.$_POST['name'] .' '.$_POST['surname'].' sąskaitos buvo sėkmingai nuskaičiuota '.$_POST['minus'].' EUR.');
    }
      $this->getData($this->file)->update($id, $account);
      App::redirect('list');
  } 

  public function deleteAcc($id) {
    $account = $this->getData($this->file)->show($id);
    if ($account['likutis'] > 0) {
      M::add('alert', 'Jūsų sąskaitos ištrinti negalima, kadangi joje yra lėšų.');
      App::redirect('list');
    }
    $this->getData($this->file)->delete($id);
    M::add('success', 'Jusu saskaita sekmingai istrinta.');
    App::redirect('list');
  }

}