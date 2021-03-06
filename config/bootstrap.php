<?php

use Cake\Core\Plugin;
use Cake\Log\Log;

if (!defined('LOCALE')) {
	define('LOCALE', APP . 'Locale' . DS);
}

$className = Plugin::loaded('DatabaseLog') ? 'DatabaseLog.Database' : 'Cake\Log\Engine\FileLog';

$log = [
	'translate' => [
		'className' => $className,
		'type' => 'translate',
		'levels' => ['info'],
		'scopes' => ['import'],
	],
];
Log::config($log);
