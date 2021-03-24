<?php

namespace App\Http\Controllers\Employee;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class EmployeeHomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // 'auth' => \App\Http\Middleware\Authenticate::class
        // authミドルウェアをルートに対し指定するときに、そのユーザーに対し認証を実行するガードを指定することもできます。
        // 指定されたガードは、auth.php設定ファイルのguards配列のキーを指定します。
        $this->middleware('auth:employee');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('employee.home');
    }
}
