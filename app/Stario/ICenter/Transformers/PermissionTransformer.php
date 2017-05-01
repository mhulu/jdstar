<?php

namespace Star\ICenter\Transformers;

use League\Fractal\TransformerAbstract;
use Star\ICenter\Permission\Models\Permission;

class PermissionTransformer extends TransformerAbstract {
	/**
	 * A Fractal transformer.
	 *
	 * @return array
	 */
	public function transform(Permission $permission) {
		return [
			'id' => $permission->id,
			'name' => $permission->name,
			'label' => $permission->label,
		];
	}
}
