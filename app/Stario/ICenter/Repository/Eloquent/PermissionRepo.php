<?php
namespace Star\ICenter\Repository\Eloquent;

use Star\ICenter\Permission\Models\Permission;

class PermissionRepo extends BaseRepository {
	protected $model;
	public function __construct(Permission $permission) {
		$this->model = $permission;
	}
}