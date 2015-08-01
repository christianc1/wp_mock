<?php

namespace WP_Mock;

use Mockery\Expectation;

abstract class HookBridge {

	/**
	 * @var string
	 */
	protected $hook_name;

	/**
	 * @var Expectation
	 */
	protected $expectation;

	/**
	 * HookBridge constructor.
	 *
	 * @param             $name
	 * @param Expectation $hook_expectation
	 */
	public function __construct( $name, $hook_expectation ) {
		$this->hook_name   = $name;
		$this->expectation = $hook_expectation;
	}

	/**
	 * @return self
	 */
	public function with() {
		$args = array_merge( array( $this->hook_name ), func_get_args() );
		$this->expectation->withArgs( $args );

		return $this;
	}

}
