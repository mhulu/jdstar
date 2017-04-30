<?php

namespace Star\ICenter\Listeners;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Log;

class ModelEventSubscriber {
	public function onCreated($model) {
		if ($model->modelName == 'User') {
			return Log::info(auth()->user()->name . '在' . request()->ip() . '新建了用户:' . $model->getModel());
		}
		$this->handle($model);
	}

	public function onUpdated($model) {
		$this->handle($model);
	}

	public function onDeleted($model) {
		if ($model->modelName == 'User') {
			return Log::warning(auth()->user()->name . '在' . request()->ip() . '删除了用户:' . $model->getModel());
		}
		$this->handle($model);
	}

	/**
	 * 当Model发生变化时，根据action来自动触发事件
	 */
	protected function handle($model) {
		$notification = $model->getNotification();
		$model->getModel()->notify(new $notification());
	}

	public function subscribe($event) {
		$event->listen(
			'Star\ICenter\Events\ModelCreated',
			'Star\ICenter\Listeners\ModelEventSubscriber@onCreated'
		);
		$event->listen(
			'Star\ICenter\Events\ModelUpdated',
			'Star\ICenter\Listeners\ModelEventSubscriber@onUpdated'
		);
		$event->listen(
			'Star\ICenter\Events\ModelDeleted',
			'Star\ICenter\Listeners\ModelEventSubscriber@onDeleted'
		);
	}
}