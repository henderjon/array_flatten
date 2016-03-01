<?php

if(!function_exists("array_flatten")){
	/**
	 * recursively flatten an array using top level keys as prefixes. does *not* inspect traversable objects
	 * @param type $array the array to flatten
	 * @param string $prefix the parent key
	 * @param array $final the array to which values are saved
	 * @return array
	 */
	function array_flatten($array, $prefix = "", $final = []) {
		foreach($array as $key => $value){
			// $key = ctype_digit("$key") ? "no_{$key}" : $key;
			if($prefix){
				$key = "{$prefix}.{$key}";
			}

			if(is_array($value)){
				$final = array_flatten($value, $key, $final);
			}else{
				$final[$key] = is_scalar($value) ? $value : gettype($value);
			}

		}
		return $final;
	}
}

// function misc($a, $k = "") {
// 	static $final;
// 	foreach($a as $key => $value){
// 		if($k){
// 			$key = "{$k}.{$key}";
// 		}

// 		if(is_array($value)){
// 			$this->misc($value, $key);
// 		}else{
// 			$final[$key] = is_scalar($value) ? $value : gettype($value);
// 		}
// 	}
// 	return $final;
// }
