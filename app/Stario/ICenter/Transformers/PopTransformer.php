<?php

namespace Star\ICenter\Transformers;

use League\Fractal\TransformerAbstract;
use Star\ICenter\Models\Pop;

class PopTransformer extends TransformerAbstract {
	public function transform(Pop $pop) {
		return [
			'id' => $pop->id,
			'name' => $pop->name,
			'identify' => $pop->identify,
			'phone' => $pop->phone,
			'sex' => $pop->sex,
			'paytype' => $pop->paytype,
			'address' => $pop->address,
			'birthday' => $pop->birthday,
			'livetype' => $pop->livetype,
			'nation' => $pop->nation,
		];
	}
}
