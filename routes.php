<?php
  //function that require the right controller and call action that has passed
  function call($controller, $action) {
    require_once('controller/' . $controller . '_controller.php');
    switch($controller) {
	    case 'index':
        $controller = new IndexController();
      break;
      case 'message':
        $controller = new MessageController();
      break;
      default:
        $controller = new IndexController();
      break;
    }

    $controller->{ $action }();
  }

  //add in array the controllers and actions availables
  $controllers = array('index' => array('index','login','logout'), 'message' => array('message', 'getList', 'delete'));

  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      call($controller, $action);
    } 
  } 
?>