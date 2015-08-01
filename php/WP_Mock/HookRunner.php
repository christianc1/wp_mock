<?php

namespace WP_Mock;

class HookRunner {

	public static function add_action() {
		if ( function_exists( 'WP_Mock\_hooks\add_action' ) ) {
			call_user_func_array( 'WP_Mock\_hooks\add_action', func_get_args() );
		}
	}

	public static function add_filter() {
		if ( function_exists( 'WP_Mock\_hooks\add_filter' ) ) {
			call_user_func_array( 'WP_Mock\_hooks\add_filter', func_get_args() );
		}
	}

	public static function do_action() {
		if ( function_exists( 'WP_Mock\_hooks\do_action' ) ) {
			call_user_func_array( 'WP_Mock\_hooks\do_action', func_get_args() );
		}
	}

	public static function apply_filters() {
		return Handler::handle_apply_filters( func_get_args() );
	}

}
