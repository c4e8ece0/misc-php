<?php

// --------------------------------------------------------------------------
// Конфиг с восстановлением объектов
// --------------------------------------------------------------------------

function that($name, $skipexit = 0) {
	static $arr;

	if($arr == null) {
		$arr = array(
			'realm_seo' => base64_encode('seo:dvsdv'),
			'url_seolist' => 'http://dsdvsd/sdc/',
			'url_productlist' => 'http://dsdv/',
		);
	}

	if(!isset($arr[$name])) {
		switch($name) {
			// --------------------------------------------------------------
			case 'project':
				$pre = _var('project')->Get(iget('project_id'));
				if($pre) {
					$arr[$name] = $pre;
				}
				break;
			// --------------------------------------------------------------
			case 'map':
				$pre = _var('map')->Get(iget('map_id'));
				if($pre) {
					$arr[$name] = $pre;
				}
				break;
			// --------------------------------------------------------------
		}
	}

	if(!isset($arr[$name])) {
		if($skipexit) {
			return array();
		} else {
			trigger_error('Bad config name "'.h($name).'"');
			exit(1);
		}
	} else {
		return @$arr[$name];
	}
}

?>