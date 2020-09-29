<?php

include_once("SharedModel.php");

class PropertyValidation{
    private $errors;

    public function __construct(){
        $this->errors = array(
            "titleErrors" => array(),
            "bodyErrors" => array(),
            "imageErrors" => array(),
        );
    }

    public function getErrors(){
        return $this->erros;
    }

    // post validation, $update = true is used for edit post validation //
    public function postValidation($title,$body,$images, $update = false){

        $sharedModel = new SharedModel();
        
        if (strlen($title) == 0){
            array_push($this->errors["titleErrors"], "Názov je príliš krátky");
        }

        // if $update == true titles can be same //
        $existingTitle = $sharedModel->selectOne("properties", ['title' => $title]);
        if (isset($existingTitle) && $update == false){
            array_push($this->errors["titleErrors"], "Názov už existuje");
        }

        if (strlen($body) == 0){
            array_push($this->errors["bodyErrors"], "Opis je príliš krátky");
        }

        // if $update = true we dont need to add new images they already exist //
        if(empty($images['name'][0]) && $update == false){
            array_push($this->errors["imageErrors"], "Je potrebné uverejniť fotku nehnutelnosti");
        }

        if(!empty($images['name'][4])){
            array_push($this->errors["imageErrors"], "Je možné nahrať iba 4 fotky");
        }

        return $this->errors;

    }

    // prepares images to be added to DB //
    public function prepareImages($images, $property_id){
        $sharedModel = new SharedModel();

        // loops user uploaded images //
        foreach($images['name'] as $index => $name ){
            // prepends current time to image name for easy identification //
            $image_name = time() . '_' . $name;
            // specifies destination on web server where to save images //
            $destination = ROOT_PATH . "/user_images/" . $image_name;

            // had to extract keys from associative array, didnt work without it //
            $tmp_names = array_values($images['tmp_name']);

            // moves image to folder //
            $result = move_uploaded_file($tmp_names[$index],$destination);
    
            if(!$result){
                return;
            }else{
                // if moved successfuly we can add image name to DB //
                $sharedModel->addImage($image_name,$property_id);
            }
            
        }
    }
}
?>