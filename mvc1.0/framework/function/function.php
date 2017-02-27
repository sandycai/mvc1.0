<?php 
/*function C($name, $method){
	require_once('/libs/Controller/'.$name.'/Controller.class.php');
	//$testController = new testController();
	//$testController->
	//eval('$obj = new '.$name.'Controller();$obj->'.$method.'();');
	
	//eval函数简单但不安全 
	//eval('$obj = new '.$name.'Controller();$obj->'.$method.'();')
	//可用下面代码代替：
	$controller = $name.'controller';
	$obj = new $controller();
	$obj->$method();
	
   }*/

   function C($name, $method){
      require_once('/libs/controller/'.$name.'Controller.class.php');
      eval('$obj = new '.$name.'Controller();$obj->'.$method.'();');
   }



   function M ($name){
   	     require_once('/libs/Model/'.$name.'Model.class.php');
   	    eval('$obj = new '.$name.'Model();'); 
   	    return $obj;
   }

      function V ($name){
   	     require_once('/libs/View/'.$name.'View.class.php');
           $name = $name.'View';
   	    $obj = new $name;
   	    return $obj;
   }

   function ORG($path,$name,$params = array()){
      /*params 是该类初始化的时候需要指定，赋值的属性，格式为 array（属性名=>属性值，属性名1=>属性值1......)*/
      require_once('libs/ORG/'.$path.$name.'.class.php');
      $obj =new $name();
      if(!empty($params)){
         foreach ($params as $key => $value) {
            $obj->$key = $value;
            # code...
         }
      }
      return $obj; 
   }

   function daddslashes($str){
   	return (!get_magic_quotes_gpc())?addslashes($str):$str;
   }

 ?>