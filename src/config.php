<?php

define('DS', DIRECTORY_SEPARATOR);
define('BASE_PATH', __DIR__ . DS);
$baseUrl = (isset($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER["PHP_SELF"] : "http://".$_SERVER['SERVER_NAME'].$_SERVER["PHP_SELF"];
define('BASE_URL',$baseUrl);