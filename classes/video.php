<?php
include('connect.php');

class Video{
    public function getVideos($data){
        $category_id=$data['category_id'];
        
        $DB=new Database();
        $query="select * from videos where category_id=$category_id";
        $result=$DB->read($query);

        return $result;
    }

    public function addVideo($data,$FILE){

        $category_id=$data['category_id'];
        $title=$data['title'];
        $description=$data['description'];
        $thumbnail="";
        $url=$data['url'];

        $DB=new Database();

        $file=$FILE['myfile']['name'];
        $file_loc=$FILE['myfile']['tmp_name'];
        $folder="../uploads/thumbnails/";
        if(move_uploaded_file($file_loc,$folder.$file)){

            $query="insert into videos (title,description,thumbnail,url,category_id) values
                (\"$title\",\"$description\",'$file','$url',$category_id);";
            $DB=new Database();

            $res=$DB->save($query);
            if($res){
                $response['status']="success";
                return $response;
            }else{
                $response['status']="fail";
                $response['error']=$query;
                return $response;
            }
        }else{
            $response['status']="fail";
            $response['error']="902";
            return $response;
        }

    }

    public function deleteVideo($data){
        $video_id=$data['video_id'];

        $query="delete from videos where id=$video_id";
        $DB=new Database();
        $DB->save($query);

        return "";

    }
}

?>