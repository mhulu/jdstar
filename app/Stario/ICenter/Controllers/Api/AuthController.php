<?php

namespace Star\ICenter\Controllers\Api;

use App\Http\Controllers\Controller;
use Star\ICenter\Requests\SignupFormRequest;

class AuthController extends Controller {

	public function signup(SignupFormRequest $request) {
		return $request->persist();
	}

}
