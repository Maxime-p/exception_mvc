<?php
  //on initialise la session
  session_start();

  require_once("library/Request.php");

  $request = new Request($_SERVER["REQUEST_URI"], 
                         $_SERVER["REQUEST_METHOD"], 
                         $_GET, 
                         $_POST);

  // on défini les routes de notre application (on restreint)
  $routes = 
  [
    "/hello" => ["controller" => "FrontController", "action" => "hello"],
    "/ask" => ["controller" => "FrontController", "action" => "askName"],
    "/all-the-users" => ["controller" => "UserController", "action" => "list"],
  ];


try{
  // est-ce que la route exite ?
  $path = $request->getPath();

  if(isset($routes[$path])){

    // si oui, on extrait les infos de notre paramétrage
    $controllerName = $routes[$path]["controller"];
    $actionName     = $routes[$path]["action"];
    

    // et ici j'appelle mon controller
    //$controller = new FrontController();
    //$controller->helloAction();

    require_once("controllers/".$controllerName.".php");
    $controller = new $controllerName();

    $methodName = $actionName."Action";
    $controller->$methodName($request);


  }else{
    throw new Exception("404 - La page à l'adresse ".$path." n'existe pas");
  }

}catch(Exception $e){
  $message = $e->getMessage();
  include("views/error.html.php");
}

