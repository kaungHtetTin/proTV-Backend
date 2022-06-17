<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include($path.'/protv/classes/video.php');

$request_method=$_SERVER['REQUEST_METHOD'];
$video=new Video(); 

if($request_method=='GET'){

    if(isset($_GET['category_id'])){
        $result=$video->getVideos($_GET);
    }

}else if($request_method=='POST'){

    $action=$_POST['action'];
    if($action=='add')$result=$video->addVideo($_POST,$_FILES);
    else if($action=='delete')$result=$video-> deleteVideo($_POST);

}

 echo json_encode($result);

?>