<?php

namespace TwilioPlayground\DataObjects;

abstract class BaseDataObject {

	/**
	 * passing down the data object configuration
	 * @param array $params a $key => $value separated array
	 */
	function __construct(array $params) {
		$this->populate($params);
	}

	/**
	 * get the object in array
	 * @return array of the object variables
	 */
	function to_array(): array {
		\get_object_vars($this);
	}

	/**
	 * Configures the data object
	 * @param array $params a $key => $value separated array
	 * @return void
	 */

}