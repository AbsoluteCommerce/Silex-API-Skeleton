<?php
// initialise error reporting
error_reporting(E_ALL);

use Silex\Application;
use Absolute\SilexApi\Config;
use Absolute\SilexApi\SilexApi;

// path shortcuts
$DS = DIRECTORY_SEPARATOR;
$basePath = realpath(__DIR__ . $DS . '..') . $DS;

// include vendor autoloader
require_once $basePath . 'vendor' . $DS . 'autoload.php';

// include configuration
$configDir = $basePath . 'config' . $DS;
if (!file_exists($configDir . 'local.php')) {
    throw new \Exception(sprintf('Missing %s', $configDir . 'local.php'));
}
$configData = require $configDir . 'local.php';
$config = new Config($configData);

// initialise error display, depending on config
if ($config->getIsDebug()) {
    ini_set('display_errors', true);
}

// initialise Silex application
$app = new Application;

// handle the request with Absolute SilexApi
if ($_SERVER['REQUEST_URI'] == '/swagger.json') {
    echo SilexApi::swagger($config);
} else {
    SilexApi::init($app, $config);
    $app->run();
}
