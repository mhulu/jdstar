<?php

namespace Star\ICenter\Controllers\Auth;

use App\Http\Controllers\Controller;

class ResetPasswordController extends Controller {
	public function __construct() {
		$this->middleware('guest');
	}

	public function reset() {
		return view('icenter::auth/passwords/reset');
	}
}
