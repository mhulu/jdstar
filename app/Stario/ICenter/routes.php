<?php
// use Star\Services\Identify\Identify;
// use Star\Weather\WeatherClient;
// WEB SECTION
Route::get('/', function () {
	return 'Wemesh UI TODO';
});

Route::get('home', function () {
	return redirect('/dashboard');
});

Route::group(['namespace' => 'Star\ICenter\Controllers', 'middleware' => 'web'], function () {
	Route::get('login', 'Auth\LoginController@showLoginform')->name('login');
	Route::post('login', 'Auth\LoginController@login');
	Route::get('register', 'Auth\RegisterController@showRegistrationForm');
	Route::get('reset', 'Auth\ResetPasswordController@reset');
	Route::get('logout', 'Auth\LoginController@logout');
	Route::group(['prefix' => '/dashboard', 'middleware' => ['auth', 'auth.status']], function () {
		Route::get('{path?}', 'HomeController@index')->where('path', '[\/\w\.-]*');
	});
	// Route::get('storage/exports/{filename}', 'Api\CreateExcel@download');
});

// Route::any('/wechat', 'WechatController@serve');
// Route::get('/getUserInfo', 'WechatController@getUserInfo')->middleware('wechat.oauth');

/* API SECTION */

// 手机验证用
Route::group(['namespace' => 'Star\ICenter\Controllers\Api', 'prefix' => 'api', 'middleware' => 'api'], function () {
	Route::post('signup', 'AuthController@signup');
	Route::post('getsms', 'SmsController@authcode');

	Route::get('weather', function () {
		return WeatherClient::get();
	});

	// Route::group(['middleware' => ['auth:api']], function () {
	// 	Route::group(['prefix' => 'home', 'middleware' => 'auth.user'], function () {
	// 		Route::get('statistics', 'HomeController@index');
	// 		Route::get('/', 'HomeController@info');
	// 		Route::post('/', 'HomeController@update');
	// 		Route::get('menu', 'HomeController@menu');
	// 		Route::post('avatar', 'HomeController@avatar');
	// 		Route::post('changePassword', 'HomeController@changePassword');
	// 		Route::post('changeMobile', 'HomeController@changeMobile');
	// 		Route::post('updateMeInfo', 'HomeController@updateMeInfo');
	// 		Route::get('timeline', 'HomeController@timeline');
	// 		// Notifications
	// 		Route::get('notification', 'NotificationController@index');
	// 		Route::post('notification/clear', 'NotificationController@clear');
	// 		Route::post('notification/mark', 'NotificationController@mark');
	// 		Route::post('notification/delete', 'NotificationController@delete');
	// 	});

	// 	Route::get('weather', function () {
	// 		return WeatherClient::get();
	// 	});
	// 	Route::get('checkPid', function () {
	// 		return Identify::parse(request('pid'));
	// 	});

	// 	// Export Excel
	// 	Route::post('users/excel', 'UserController@export');

	// 	// User
	// 	Route::resource('user', 'UserController', ['except' => ['create', 'show']]);
	// 	Route::resource('unit', 'UnitController', ['except' => ['create', 'show']]);
	// 	Route::resource('permission', 'PermissionController', ['except' => ['create', 'show']]);

	// 	// 流动人口管理
	// 	Route::resource('pop', 'PopController', ['except' => ['create', 'show']]);

	// 	Route::post('lis', 'LisController@all');
	// });

});