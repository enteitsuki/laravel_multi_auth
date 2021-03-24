<?php

namespace App\Http\Controllers\Employee\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = RouteServiceProvider::EMPLOYEE_HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // 追加認証でのログイン済ユーザーがログインページにアクセスした場合
    public function __construct()
    {
        // 'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        //  $guard == 'web'のときはredirect(RouteServiceProvider::HOME)
        //  $guard == 'employee'のときはredirect(RouteServiceProvider::EMPLOYEE_HOME)
        // authミドルウェアをルートに対し指定するときに、そのユーザーに対し認証を実行するガードを指定することもできます。
        // 指定されたガードは、auth.php設定ファイルのguards配列のキーを指定します。
        $this->middleware('guest:employee')->except('logout');
    }

    // ログインフォームのview
    public function showLoginForm()
    {
        return view('employee.auth.login');
    }

    protected function guard()
    {
        return Auth::guard('employee');
    }

    // 認証対象をメールアドレスからユーザ名に切り替える
    // public function username()
    // {
    //     return 'name';
    // }
}
