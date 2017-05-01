<?php
namespace Star\ICenter\Controllers\Api;
use App\Http\Controllers\Controller;
use Star\Services\Weather\WeatherClient;

class WeatherController extends Controller {
	public function simple() {
		return WeatherClient::get();
	}
}