<?php

// --------------------------------------------------------------------------
// Чтение из файла заголовка нужной длины
// --------------------------------------------------------------------------

function readf($file, $len) {
	$r = '';
	$fh = fopen($file, 'r');
	flock($fh, LOCK_EX);
	$r.= fread($fh, $len);
	flock($fh, LOCK_UN);
	fclose($fh);

	return $r;
}

?>