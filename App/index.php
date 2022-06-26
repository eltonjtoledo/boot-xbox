<?php
require_once('../vendor/autoload.php');

use XboxCrawler\Commons\Config;
use XboxCrawler\Commons\Languages;
use XboxCrawler\Commons\TypeOfStore;

$conf = new Config();
$conf->setConfigUrl(Languages::Portugues, TypeOfStore::GamePass);
var_dump(Config::$fullUrl);