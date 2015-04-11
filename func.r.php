<?php

// --------------------------------------------------------------------------
// Вывод отладочной информации
// ---------------------------------------------------------------------------

function r() {
	$len = defined('COL') ? COL : 100;
	$r   = '';
	$n   = func_num_args();

	for($i=0; $i<$n; $i++) {
		$i ? $r.= str_repeat('-', $len) : '';
		ob_start();
		$t = func_get_arg($i);
		$t ? print_r($t) : var_dump($t);
		$r.= str_replace("\t", '    ', ob_get_contents());
		ob_end_clean();
		$r.= "\n";
	}

	$arr = explode("\n", $r);
	$res = array();

	foreach($arr as $k=>$v) {
		$i = 0;
		while($t = mb_substr($v, $i*$len, $len)) {
			$res[] = $t;
			$i++;
		}
	}

	print '<pre style="font-size:11px; margin:0 0 5px 0; font-family:\'Courier New\'; padding:10px; background:#000; color:#fff; opacity:0.8;">' . htmlspecialchars(implode(PHP_EOL, $res)) . '</pre>';
}

?>