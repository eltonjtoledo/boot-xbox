<?php

use XboxCrawler\Config;
use XboxCrawler\Languages;
use XboxCrawler\TypeOfStore;

require_once("./vendor/autoload.php");

$conf = new Config(Languages::Portugues, TypeOfStore::GamePass);

var_dump($conf);