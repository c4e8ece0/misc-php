<?php

// --------------------------------------------------------------------------
// Список файлов с каталогами от определённого корня
// --------------------------------------------------------------------------

function disktree($p) {
	if(!file_exists($p)) {
		return array();
	}
	if(is_file($p)) {
		return array($p);
	}
	$pre = array();
	if(is_dir($p)) {
		$arr = scandir($p);
		foreach($arr as $k=>$v) {
			if($v != '.' && $v != '..' && $v[0] != '~') {
				$pre[] = disktree($p.'/'.$v);
			}
		}
	}
	return $pre;
} 

?>