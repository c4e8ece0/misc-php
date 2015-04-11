<?php

// --------------------------------------------------------------------------
// Хранение таблицы вариантов значения с кроссылками
// на возможные представления
// (v) from go/crossname
// --------------------------------------------------------------------------

class CrossName
{
	protected $data;
	protected $tabs;
	protected $cache;

	// Создание нового объекта с предзагрузкой из файла
	public function __construct($path_to_file) {
		$lines = file($path_to_file, FILE_IGNORE_NEW_LINES|FILE_SKIP_EMPTY_LINES);
		$this->tabs  = array_map('trim', explode("\t", $lines[0]));
		$this->cache = array();
		$this->data = array();
		$len = count($lines);

		for($i = 1; $i < $len; $i++) {
			$str = rtrim($lines[$i]) . str_repeat("\t", $len);
			$pre = array_slice(array_map('trim', explode("\t", $str)), 0, count($this->tabs));
			foreach($pre as $k=>$v) {
				foreach($this->tabs as $a=>$b) {
					if($b && isset($pre[$a])) {
						$this->Add($v, $b, $pre[$a]);
					}
				}
			}
		}
		print_r($this->data);
	}

	// Вывод известных колонок
	public function Tabs() {
		return $this->tabs;
	}

	// Вывод списка значений определённого таба
	public function Vals($tab) {
		$r = array();
		foreach($this->data as $k=>$v) {
			if(!empty($v[$tab])) {
				$r[] = $v[$tab];
			}
		}
		return $r;
	}

	// Подсчёт кол-ва строк
	// Count()
	public function Num() {
		return count($this->data);
	}

	// Получение первого представления элемента
	public function Get($name, $view) {
		return $this->GetAt($name, $view, 0);
	}

	// Получение элемента из списка по индексу
	public function GetAt($name, $view, $index = 0) {
		$name = $this->plainifyString($name);
		$view = $this->plainifyString($view);
		if(!isset($this->data[$name][$view])) {
			return "";
		}

		$index = $index % count($this->data[$name][$view]);
		print_r(array($name, $view, $index, $this->data[$name][$view][$index]));
		return $this->data[$name][$view][$index];
	}

	// Вывод всех известных представлений для терма
	public function PrintAll($name) {
		$k_name = $this->plainifyString($name);
		$delim  = "----------------\n";

		if(!isset($this->data[$k_name])) {
			printf("%sNOT_FOUND_VIEWS_FOR(%s|%s)\n%s", $delim, $name, $k_name, $delim);
		}
		$r = $delim;
		foreach($this->data[$k_name] as $k=>$v) {
			$r .= sprintf("\t%s=[%s]\n", $k, implode(" ", $v));
		}
		print $r;
	}

	// Упрощённое представление строки
	public function plainifyString($str) {
		$pre = $str;
		if(!isset($this->cache[$str])) {
			$str = mb_strtolower($str, 'UTF-8');
			$str = preg_replace('/ё/u', 'е', $str);
			$str = preg_replace('/[^_a-z0-9ёйцукенгшщзхъфывапролджэячсмитьбю]/u', ' ', $str);
			$str = preg_replace('/\s+/u', ' ', $str);
			$str = trim($str);
			$this->cache[$pre] = $str;
		}
		return $this->cache[$pre];
	}

	// Добавление элемента к представлениям для значения
	public function Add($name, $view, $value) {
		// Упрощение строк
		$k_name = $this->plainifyString($name);
		$k_view = $this->plainifyString($view);
		// Ибонех
		if ($k_name == "" || $k_view == "" || $value == "") {
			return $this;
		}
		// Внесение данных
		$this->data[$k_name][$k_view][] = $value;
		return $this;
	}

}

?>