<?php

/*
 * Battle of the Blues Backend
 *
 */

class Store_Analytic {

	public function perform() {
		ob_start();
		var_dump($this->args);
		error_log("STORING ANALYTICS!\n\t".  ob_get_clean());
	}

}