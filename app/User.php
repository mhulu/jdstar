<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Star\ICenter\Events\ModelDeleted;
use Star\ICenter\Events\UserCreated;
use Star\ICenter\Models\Profile;
use Star\ICenter\Models\Unit;
use Star\ICenter\Permission\Traits\HasRoles;

class User extends Authenticatable {
	use Notifiable, HasApiTokens, HasRoles;

	protected $guarded = ['id'];

	protected $hidden = ['password', 'remember_token', 'pivot', 'created_at', 'updated_at'];

	protected $events = [
		'created' => UserCreated::class,
		'deleted' => ModelDeleted::class,
	];

	public function unit() {
		return $this->belongsTo(Unit::class);
	}

	public function profile() {
		return $this->hasOne(Profile::class);
	}

	// 发送短信
	public function routeNotificationForSms() {
		return $this->mobile;
	}
}
