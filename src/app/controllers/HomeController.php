<?php
namespace Bankas\Db\Controllers;

use Bankas\Db\App;
use App\Auth\Authorization as A;

class HomeController {

  public function index() {
    return App::view('home', ['title' => 'HOME', 'user' => A::authName()]);
  }
  // App::redirect('login');
}