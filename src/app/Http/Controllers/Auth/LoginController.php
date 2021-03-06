<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * githubの認証ページへリダイレクト
     */
    public function redirectToProvider() {
        return Socialite::driver('github')->scopes(['read:user', 'public_repo'])->redirect();
    }

    /**
     * githubからユーザ情報を取得
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback(Request $request) {

        $github_user = Socialite::driver('github')->stateless()->user();
        $now = date('Y/m/d H:i:s');
        $app_user = DB::select('select * from public.user where github_id = ?', [$github_user->user['login']]);

        if (empty($app_user)) {
            # code...
            DB::insert('insert into public.user (github_id,created_at,updated_at) values (?,?,?)', [$github_user->user['login'], $now, $now]);
        }

        $request->session()->put('github_token', $github_user->token);
        return redirect('github');
    }
}
