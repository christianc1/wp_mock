<?php

namespace WP_Mock;

class ActionBridge extends HookBridge {

	public function perform( $callable ) {
		$this->expectation->andReturnUsing( $callable );

		return $this;
	}

}
