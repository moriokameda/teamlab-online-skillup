<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Model\SocialAccounts;
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
    protected $redirectTo = '/instagram/home';

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
        return Socialite::driver('github')->redirect();
    }

    /**
     * githubからユーザ情報を取得
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback(Request $request) {

        try {
            //code...
            $github_user = Socialite::with('github')->stateless()->user();

        } catch (\Exception $e) {
            return redirect('login/github');
            //throw $th;
        }

        $app_user = SocialAccounts::firstOrCreate([
            'social_user_id' => $github_user->user['login'],
            'user_avatar' => $github_user->getAvatar(),
        ]);

        $request->session()->put('github_token', $github_user->token);
        return redirect('instagram/home');
    }

    protected function findOrCreateUser($user_info) {
        $app_user = DB::select('select * from social_accounts where social_user_id = ?', [$user_info->user['login']]);
        if (empty($app_user)) {
            # code...
            $now = date('Y/m/d H:i:s');
            DB::insert(
                'insert into public.social_accounts (social_user_id,user_name,created_at,updated_at) values (?,?,?)',
                [
                    $user_info->user['login'],
                    $user_info->user->getNickName(),
                    $now,
                    $now
                ]
            );
        }
        return $app_user;
    }

}
