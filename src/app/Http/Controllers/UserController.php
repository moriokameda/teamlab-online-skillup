<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function index () {
    $email = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'), 0, 8) . '@yyyy.com';
    User::insert(['name' => 'yamada taro', 'email' => $email, 'password' => 'xxxxxxxx']);
    $users = User::all();

    return view("user", ['users' => $users]);
  }
}
