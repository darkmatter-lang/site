<?php

if (!function_exists('getallheaders')) {
	function getallheaders() {
		$headers = [];
		foreach ($_SERVER as $name => $value) {
			if (substr($name, 0, 5) == 'HTTP_') {
				$headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
			}
		}
		return $headers;
	}
}

function starts_with($needle, $haystack) {
	$length = strlen($needle);
	return (substr($haystack, 0, $length) === $needle);
}

function ends_with($needle, $haystack) {
	$length = strlen($needle);
	return $length === 0 || (substr($haystack, -$length) === $needle);
}

function get_client_ip() {
	foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {
		if (array_key_exists($key, $_SERVER) === true) {
			foreach (explode(',', $_SERVER[$key]) as $ip) {
				if (filter_var($ip, FILTER_VALIDATE_IP) !== false) {
					return $ip;
				}
			}
		}
	}
	return "0.0.0.0";
}

function gen_csrf_token() {
	$token = hash("sha1", bin2hex(random_bytes(32)));
	$_SESSION['csrf_token'] = $token;
	return $token;
}

function prefered_language(array $available_languages, $http_accept_language) {
	$available_languages = array_flip($available_languages);
	$langs = array();
	preg_match_all('~([\w-]+)(?:[^,\d]+([\d.]+))?~', strtolower($http_accept_language), $matches, PREG_SET_ORDER);

	foreach($matches as $match) {

		list($a, $b) = explode('-', $match[1]) + array('', '');
		$value = isset($match[2]) ? (float) $match[2] : 1.0;

		if(isset($available_languages[$match[1]])) {
			$langs[$match[1]] = $value;
			continue;
		}

		if(isset($available_languages[$a])) {
			$langs[$a] = $value - 0.1;
		}

	}
	arsort($langs);

	return $langs;
}

function get_client_locale_language() {
	$locale = null;

	if (!empty($_SERVER['HTTP_ACCEPT_LANGUAGE'])) {
		$locale = explode(",", $_SERVER['HTTP_ACCEPT_LANGUAGE']);

		if (count($locale) >= 1) {
			$locale = $locale[0];
		}
	}

	return filter_locale_language(strtolower(str_replace("-", "_", $locale)));
}

function filter_locale_language($locale=null) {
	
	if ($locale == null) {
		return "en_us";
	}

	if ($locale == "en_uk") {
		return "en_uk";
	}

	if (starts_with("es_", $locale)) {
		return "es_us";
	}

	if (starts_with("ja_", $locale)) {
		return "ja_jp";
	}

	if (starts_with("hi_", $locale)) {
		return "hi_in";
	}

	return "en_us";
}
