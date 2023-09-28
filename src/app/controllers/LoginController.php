<?php
namespace Bankas\Db\Controllers;

use Bankas\Db\App;
use Bankas\Db\Messages as M;
use App\Auth\Authorization as A;

class LoginController {

  private $db = 'App\\Db\\Json';
  // private $db = 'App\\Db\\Maria';
  private $file ='users';

  private function getData($file) {
    $this->file = $file;
    
    return $this->db::get($file);
  }

  public function showlogin() {
    return App::view('login', ['title' => 'LOGIN', 'messages' => M::get(), 'users' => $users = self::getData('users')]);
  }

  public function login() {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = md5($_POST['pass']);
    // $users = self::getData($this->file);
    $users = json_decode(file_get_contents(DIR.'data/users.json'));

    foreach($users as $user) {
      if ($user->name != $name) {
        continue;
      }
      if ($user->email != $email) {
        continue;
      }
      if ($user->pass != $pass) {
        M::add('danger', 'Ivedete neteisingus duomenis(psw).');
        return App::redirect('login');
      } else {
        A::authAdd($user);
        M::add('success', 'Sėkmingai prisijungete, '.$user->name);
        return App::redirect('list');
      }
    }
    M::add('danger', 'Ivedete neteisingus duomenis(name/email).');
    return App::redirect('login');
  }

  public function logout() {
    A::authRem();
    M::add('success', 'Jus sekmingai atsijungete!');
    return App::redirect('login');
  }

}