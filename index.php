<?php
require_once 'core/Router.php';

$uri = $_SERVER['REQUEST_URI'];
Router::route($uri);
