<?php

// --------------------------------------------------------------------------
// Форматирование тега для изображения без лишних хлопот
// --------------------------------------------------------------------------

function ux_img($idef, $w=0, $h=0, $ext='e', $attr='') {
	$w = abs(intval($w));
	$h = abs(intval($h));
	$idef = trim($idef);
	$ext  = trim($ext);
	$attr = trim($attr);

	if(!$idef) {
		return '';
	}

	// Если изображение из загруженных в /upload/$ (что скорее всего)
	if(strpos($idef, '.') === false && strpos($idef, '/') === false) {
		$idef = '/img/p'.$idef;
		if($w) {
			$idef.= '-w'.$w;
		}
		if($h) {
			$idef.= '-h'.$h;
		}
		if($ext) {
			$idef.= '-t'.$ext;
		}
		$idef.= '.jpg';
	} else {
		$ext = '';
	}

	$r = '<img src="' . $idef . '"';
	if($ext != 'm') {
		if($w) {
			$r.= ' width="'.$w.'"';
		}
		if($h) {
			$r.= ' height="'.$h.'"';
		}
	}

	if($attr) {
		$r.= ' ' . $attr;
	}
	$r.= '>';

	return $r;
}

?>