<?php

namespace Star\ICenter\Controllers;

use App\Http\Controllers\Controller;

class HomeController extends Controller {
	public function index() {
		return view('icenter::app');
	}
}
