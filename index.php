<?php
  if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action     = $_GET['action'];
  } else {
    $controller = 'index';
    $action     = 'index';
  }
  require_once('routes.php');
?>