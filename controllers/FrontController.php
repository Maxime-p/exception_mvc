<?php

class FrontController{


  public function helloAction($request){
    
  }


  public function askNameAction($request){

    try{
      if($request->isPost()){
        $name   = $request->get("name");
        
        if(empty($name)){
          throw new Exception("Un nom est requis !");
        }
        if(mb_strlen($name) <= 3 ){
          throw new Exception("C'est trop court comme nom !");
        }


        include("views/front/show-ask-name.html.php");


      }else{
        include("views/front/ask-name.html.php");  
      }
    }catch(Exception $e){
      $error = $e->getMessage();
      include("views/front/ask-name.html.php");
    }
    

    
  }

}