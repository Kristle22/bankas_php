<?php
namespace Bankas\Db\Controllers;

use Bankas\Db\App;
use Bankas\Db\Messages as M;

class HomeController {

  public function index() {
    return App::view('home', ['title' => 'HOME', 'user' => 'Kristina']);
  }
  // App::redirect('login');
}