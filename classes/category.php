<?php
include('connect.php');

class Category {
    public function getCategories(){
        $query="select * from categories";
        $DB=new Database();
        $result=$DB->read($query);

        return $result;
    }

    public function addCategory($data){
        $name=$data['name'];
        $query="insert into categories (category_name) values
        ('$name')";

        $DB=new Database();
        $result=$DB->save($query);

        return $result;

    }

    public function deleteCategory($data){
        $category_id=$data['category_id'];
        $query="delete from categories where id=$category_id";
        $DB=new Database();
        $result=$DB->read($query);
        return "";

    }

    public function updateVIP($data){
        $is_vip=$data['vip'];
        $category_id=$data['category_id'];
        $query ="update categories set is_vip=$is_vip where id=$category_id";
        $DB=new Database();
        $DB->save($query);

    }
}

?>