<?php

// --------------------------------------------------------------------------
// 302 редирект
// --------------------------------------------------------------------------

function send302($t) {
	header($_SERVER['SERVER_PROTOCOL'] . ' 302 Found');
	header('Location: ' . $t);
	exit(0);
}

?>