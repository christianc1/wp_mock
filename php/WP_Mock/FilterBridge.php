<?php

namespace WP_Mock;

class FilterBridge extends HookBridge {

	public function reply( $value ) {
		$this->expectation->andReturn( $value );

		return $this;
	}

}
