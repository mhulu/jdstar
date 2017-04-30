<?php

namespace Star\ICenter\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class BaseNotification extends Notification {
	use Queueable;
	public function via($notifiable) {
		return ['database'];
	}

	public function toArray($notifiable) {
		return [
		];
	}
}
