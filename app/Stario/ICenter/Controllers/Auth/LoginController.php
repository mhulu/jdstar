<?php
namespace Star\ICenter\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {
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
	// 改写详见AuthenticatesUsers
	use AuthenticatesUsers {
		logout as performLogout;
	}

	/**
	 * Where to redirect users after login.
	 *
	 * @var string
	 */
	protected $redirectTo = '/dashboard';

	public function showLoginForm() {
		return view('icenter::auth.login');
	}

	public function username() {
		return 'mobile';
	}

	public function logout(Request $request) {
		$this->performLogout($request);
		return redirect()->route('login');
	}

	protected function validateLogin(Request $request) {
		$this->validate($request, [
			$this->username() => 'required|min:11|max:11', 'password' => 'required',
		]);
	}

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('guest', ['except' => 'logout']);
	}
}
