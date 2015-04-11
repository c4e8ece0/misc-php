<?php

// --------------------------------------------------------------------------
// Составление из группы элементов адреса страницы
// Транслит элементов функции
// --------------------------------------------------------------------------

function tr() {

	static $tr;
	$arr = array();
	$res = array();

	foreach(func_get_args() as $k => $v) {
		$key = $str = $v;

		// Выбираем из кеша
		if(empty($tr[$key])) {
			$str = preg_replace(array('/\[БЕЗ БРЕНДА\]/u', '/\[СКРЫТ\]/u'), '', $str);
			$str = mb_strtolower($str, 'UTF-8'); #, 'ЁЙЦУКЕНГШЩЗХЪФЫВАПРОЛДЖЭЯЧСМИТЬБЮQWERTYUIOPASDFGHJKLZXCVBNM', 'ёйцукенгшщзхъфывапролджэячсмитьбюqwertyuiopasdfghjklzxcvbnm');

			$str = preg_replace('/ый/u',  'yj',  $str);
			$str = preg_replace('/ья/u',  'jya', $str);
			$str = preg_replace('/ью/u',  'jyu', $str);
			$str = preg_replace('/ье/u',  'je',  $str);
			$str = preg_replace('/ьи/u',  'ji',  $str);
			$str = preg_replace('/ьё/u',  'jyo', $str);
			$str = preg_replace('/енц/u', 'enz', $str);

			$_tr = array(
				'а' => 'a',
				'б' => 'b',
				'в' => 'v',
				'г' => 'g',
				'д' => 'd',
				'е' => 'e',
				'ё' => 'yo',
				'ж' => 'zh',
				'з' => 'z',
				'и' => 'i',
				'й' => 'y',
				'к' => 'k',
				'л' => 'l',
				'м' => 'm',
				'н' => 'n',
				'о' => 'o',
				'п' => 'p',
				'р' => 'r',
				'с' => 's',
				'т' => 't',
				'у' => 'u',
				'ф' => 'f',
				'х' => 'h',
				'ц' => 'c',
				'ч' => 'ch',
				'ш' => 'sh',
				'щ' => 'sch',
				'ъ' => 'j',
				'ы' => 'y',
				'ь' => '',
				'э' => 'e',
				'ю' => 'yu',
				'я' => 'ya',
			);

			$str = strtr($str, $_tr);

			$str = preg_replace('/[^a-z0-9\-]/u', '-',  $str);
			$str = preg_replace('/\-\-+/u',       '-',  $str);
			$str = preg_replace('/^\-+/u',        '',   $str);
			$str = preg_replace('/\-+$/u',        '',   $str);

			$tr[$key] = $str;
		}

		$res[] = $tr[$key];
	}
	return implode('-', $res);
}

?>