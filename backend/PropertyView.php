<?php
include_once("SharedModel.php");
include_once("PropertyModel.php");

class PropertyView{
    public function __construct(){
    }

    public function getProperties($conditions = []){
        $sharedModel = new SharedModel();

        $properties = $sharedModel->selectAll("properties",$conditions);
        return $properties;
    }

    public function getLatestProperties(){
        $propertyModel = new PropertyModel();

        $properties = $propertyModel->latestProperties();
        return $properties;
    }

    public function getProperty($conditions = []){
        $sharedModel = new SharedModel();

        $properties = $sharedModel->selectOne("properties",$conditions);
        return $properties;
    }

    public function getPropertyImage($conditions = []){
        $sharedModel = new SharedModel();

        $image = $sharedModel->selectOne("images",$conditions);
        return $image;
    }

    public function getPropertyImages($conditions = []){
        $sharedModel = new SharedModel();

        $images = $sharedModel->selectAll("images",$conditions);
        return $images;
    }
}
?>