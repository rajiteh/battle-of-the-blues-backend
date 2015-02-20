<?php

/*
 * Battle of the Blues Backend
 *
 */

class Renderer {

    public static function write($obj) {
    	if (headers_sent()) throw new Exception("Headers already sent!");
        if (!empty($_GET["callback"])) {
        	self::writeJSONP($obj, $_GET["callback"]);
        } else {
        	self::writeJSON($obj);
        }
        switch (json_last_error()) {
        case JSON_ERROR_NONE:
        	$json_error = false;
        break;
        case JSON_ERROR_DEPTH:
            $json_error = 'Maximum stack depth exceeded';
        break;
        case JSON_ERROR_STATE_MISMATCH:
            $json_error = 'Underflow or the modes mismatch';
        break;
        case JSON_ERROR_CTRL_CHAR:
            $json_error = 'Unexpected control character found';
        break;
        case JSON_ERROR_SYNTAX:
            $json_error = 'Syntax error, malformed JSON';
        break;
        case JSON_ERROR_UTF8:
            $json_error = 'Malformed UTF-8 characters, possibly incorrectly encoded';
        break;
        default:
            $json_error = 'Unknown error';
        break;
    	}

    	if (!$json_error === false)
    		throw new Exception("JSON Decoding error " . $json_error);
    }

    public static function writeJSON($obj) {
    	header('Cache-Control: no-cache, must-revalidate');
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		header('Content-type: application/json');
		echo json_encode($obj);
    }

    public static function writeJSONP($obj, $callback) {
    	header('Cache-Control: no-cache, must-revalidate');
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		header('Content-type: application/javascript');
		echo $callback . "(" . json_encode($obj) . ")";
    }
}
