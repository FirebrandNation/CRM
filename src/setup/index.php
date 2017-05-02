<?php


error_reporting(E_ALL);
ini_set('log_errors', 1);
ini_set('error_log', "/tmp/external.log");



if (file_exists('../Include/Config.php')) {
    header('Location: ../index.php');
} else {
    require_once dirname(__FILE__) . '/../vendor/autoload.php';

    $rootPath = str_replace('/setup/index.php', '', $_SERVER['SCRIPT_NAME']);
    ChurchCRM\dto\SystemURLs::init($rootPath, '', dirname(__FILE__)."/../");

    $app = new \Slim\App();
    $container = $app->getContainer();

    require __DIR__ . '/../Include/slim/error-handler.php';
    $settings = require __DIR__ . '/../Include/slim/settings.php';

    require __DIR__ . '/routes/setup.php';

    $app->run();
}
