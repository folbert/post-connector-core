<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

abstract class SP_Filter {
	protected $tag = null;
	protected $priority = 10;
	protected $args = 1;

	/**
	 * Construct method. Set tag and register hook.
	 *
	 * @access public
	 *
	 * @param mixed $tag (default: null)
	 */
	public function __construct() {
		$this->register();
	}

	/**
	 * Register the hook.
	 *
	 * @access public
	 * @return void
	 */
	public function register() {
		// Tag must be set
		if ( $this->tag === null ) {
			trigger_error( 'ERROR IN FILTER: NO TAG SET', E_USER_ERROR );
		}

		add_filter( $this->tag, array( $this, 'run' ), $this->priority, $this->args );
	}

	/**
	 * Return filter priority
	 *
	 * @return int
	 */
	public function get_priority() {
		return $this->priority;
	}

}