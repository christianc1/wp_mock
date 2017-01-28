<?php
/**
 * Mock WordPress filters by substituting each filter with an advanced object
 * capable of intercepting calls and returning predictable data.
 *
 * @package    WP_Mock
 * @subpackage Hooks
 */

namespace WP_Mock;


class Filter extends Hook {
	/**
	 * Apply the stored filter.
	 *
	 * @param array $args Arguments passed to apply_filters()
	 *
	 * @return mixed
	 */
	public function apply( $args ) {
		if ( $args[0] === null ) {
			if ( isset( $this->processors['argsnull'] ) ) {
				return $this->processors['argsnull']->send();
			}
			$this->strict_check();

			return null;
		}
		$arg_num = count( $args );

		$processors = $this->processors;
		foreach ( $args as $arg ) {
			$key = $this->safe_offset( $arg );
			if ( ! isset( $processors[ $key ] ) ) {
				$this->strict_check();

				return $arg;
			}

			$processors = $processors[ $key ];
			break;
		}

		return $processors->send();
	}

	protected function new_responder() {
		return new Filter_Responder();
	}

	/**
	 * @return string
	 */
	protected function get_strict_mode_message() {
		return sprintf( 'Unexpected use of apply_filters for filter %s', $this->name );
	}
}

class Filter_Responder {
	/**
	 * @var mixed
	 */
	protected $value;

	public function reply( $value ) {
		$this->value = $value;
	}

	public function send() {
		return $this->value;
	}
}

