<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return [
        'Laravel' => app()->version(),
        'PHP' => phpversion(),
        'Server' => $_SERVER['SERVER_SOFTWARE'],
        'Database' => DB::connection()->getPdo()->getAttribute(PDO::ATTR_SERVER_VERSION),
        'OS' => php_uname('s') . ' ' . php_uname('r'),
        'Hostname' => gethostname(),
        'Time' => date('Y-m-d H:i:s' , time()),
        'Timezone' => date_default_timezone_get(),
    ];
});
