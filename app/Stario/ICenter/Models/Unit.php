<?php
namespace Star\ICenter\Models;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model {
	public function users() {
		return $this->hasMany(User::class);
	}
}
