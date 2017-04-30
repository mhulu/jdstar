<?php
namespace Star\ICenter\Controllers\Api;

use App\Http\Controllers\Controller;
use Star\ICenter\Requests\FireSmsFormRequest;

class SmsController extends Controller {
	public function authCode(FireSmsFormRequest $request) {
		return $request->fire();
	}

}