<?php

// --------------------------------------------------------------------------
// 404 Not Found
// --------------------------------------------------------------------------

function send404() {
	header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
}

?>