<?php

namespace Star\ICenter\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserCreated {
	use Dispatchable, SerializesModels;

	public $user;
	public function __construct($user) {
		$this->user = $user;
	}

}
