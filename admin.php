<?php

session_start();

include 'view/view.php';
$view = new view();
$view->screenView('admin');
