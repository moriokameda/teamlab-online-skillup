<?php
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Socialite;

class UserController extends Controller
{
  // public function index () {
  //   $email = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'), 0, 8) . '@yyyy.com';
  //   User::insert(['name' => 'yamada taro', 'email' => $email, 'password' => 'xxxxxxxx']);
  //   $users = User::all();

  //   return view("user", ['users' => $users]);
  // }
  public function updateUser(Request $request) {
    $token = $request->session()->get('github_token', null);
    $user = Socialite::driver('github')->userFromToken($token);

    DB::update('update public.user set name = ?, comment = ?, where github_id = ?', [$request->input('name'), $request->input('comment'), $user->user['login']]);
    return redirect('/github');
  }
}
