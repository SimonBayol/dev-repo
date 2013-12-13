<?php include '../setup.php';
$controllerName = $_GET['controller'];
$methodName = $_GET['method'];
$controllerClassName = "controller\\$controllerName";
$page = array('controller'=>$controllerName,'method'=>$methodName);
$_SESSION['page']=$page;
if(in_array($controllerName,$PRIVATE_CONTROLLERS)){
     if(!isset($_SESSION['user'])){
         header('location:/Accueil');
     }elseif($_SESSION['auth_level']>2){
         header('location:/Accueil');
     }
}
try{
    $class = new ReflectionClass($controllerClassName);
    $instance = $class->newInstance();
    $method = $class->getMethod($methodName);
    $method->invoke($instance);
}catch(Exception $ex){
    include VIEW.'error.php';
}
?>