<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include($path.'/protv/classes/category.php');

$request_method=$_SERVER['REQUEST_METHOD'];
$category=new Category();

if($request_method=='GET'){

    $result=$category->getCategories();

}else if($request_method=='POST'){
    $action=$_POST['action'];

    if($action=="create") $result=$category->addCategory($_POST);
    else if($action=="delete") $result=$category-> deleteCategory($_POST);
    else if($action=="updateVIP")$result=$category->updateVIP($_POST);

} 

 echo json_encode($result);

?>