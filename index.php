<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('rosters', 'DefaultController');
Router::get('catalogue', 'DefaultController');
Router::get('item', 'DefaultController');
Router::get('profile', 'DefaultController');
Router::get('find', 'DefaultController');
Router::get('roster', 'DefaultController');

Router::run($path);