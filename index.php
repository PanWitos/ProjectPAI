<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('rosters', 'RosterController');
Router::get('catalogue', 'DefaultController');
Router::get('item', 'DefaultController');
Router::get('profile', 'DefaultController');
Router::get('find', 'DefaultController');
Router::get('roster', 'RosterController');
Router::post('login', 'SecurityController');
Router::post('addRoster', 'RosterController');
Router::post('register', 'SecurityController');
Router::post('search', 'RosterController');

Router::run($path);