<?php

namespace Star\ICenter\Transformers;

use League\Fractal\TransformerAbstract;
use Star\ICenter\Models\Unit;

class UnitTransformer extends TransformerAbstract {
	/**
	 * A Fractal transformer.
	 *
	 * @return array
	 */
	public function transform(Unit $unit) {
		return [
			'id' => $unit->id,
			'name' => $unit->name,
		];
	}
}
