<?php
namespace Star\ICenter\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Star\ICenter\Events\ModelUpdated;

class Profile extends Model {
	use Notifiable;

	protected $guarded = ['id'];

	protected $events = ['updated' => ModelUpdated::class];

	public function users() {
		return $this->hasOne(User::class);
	}
}
