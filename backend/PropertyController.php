<?php
ob_start();
include_once("PropertyModel.php");
include_once("PropertyValidation.php");
include_once("SharedModel.php");


$errors = array();  // holds validation errors

// variables used to save user input after failed validation //
$savedID = "";
$savedTitle = "";
$savedBody = "";
$savedPrice ="";
$savedRooms = "";
$savedBedrooms = "";
$savedBathrooms ="";

// calls deletePost function if argument is delete_id //
if(isset($_GET['delete_id'])){
    $propertyController = new PropertyController();
    $propertyController->deletePost($_GET['delete_id']);
    
}

// updates post with specific id//
if(isset($_GET['update_id'])){
    $sharedModel = new SharedModel();
    $property = $sharedModel->selectOne("properties", ['id' => $_GET['update_id']]);
    $savedID = $property['id'];
    $savedTitle = $property['title'];
    $savedBody = html_entity_decode($property['body']);
    $savedPrice = $property['price'];
    $savedRooms = $property['rooms'];
    $savedBedrooms = $property['bedrooms'];
    $savedBathrooms = $property['baths'];
}

class PropertyController{
    public function __construct(){
    }

    public static function createPost(){
        if (isset($_POST['createPost'])){
            // saves user input //
            $title = $_POST['title'];
            $body = htmlentities($_POST['propertyBody'], ENT_COMPAT | ENT_HTML401, 'UTF-8');
            $type = $_POST['propertyType'];
            $purpouse = $_POST['rentBuy'];
            $location = $_POST['propertyLocation'];
            $images = $_FILES['propertyImage'];
            $user_id = $_SESSION['id'];
            $price = $_POST['price'];
            $rooms = $_POST['rooms'];
            $bathrooms = $_POST['bathrooms'];
            $bedrooms = $_POST['bedrooms'];

            // validates input and saves any erros to $errors //
            $validation = new PropertyValidation();
            global $errors;
            $errors = $validation->postValidation($title,$body,$images);
            
            // if associative array has more than 3 keys there has to be error //
            if(count($errors,1) > 3){
                global $savedTitle;
                $savedTitle = $title;
                global $savedBody;
                $savedBody = $body;
                global $savedPrice;
                $savedPrice = $price;
                global $savedRooms;
                $savedRooms = $rooms;
                global $savedBedrooms;
                $savedBedrooms = $bedrooms;
                global $savedBathrooms;
                $savedBathrooms = $bathrooms; 
                return;
                
            }else{
                // if validation successful add property
                $propertyModel = new PropertyModel();
                $property_id = $propertyModel->addProperty($user_id,$title,$body,$type,$purpouse,$location,$price,$rooms,$bathrooms,$bedrooms);
                // adds property images //
                $validation->prepareImages($images,$property_id);
                $_SESSION['message'] = 'Nehnutelnosť bola pridaná';
                header("location: /frontend/dashboard/dashboard.php");
                return;
            }
                
        }

        if (isset($_POST['editPost'])){
            $title = $_POST['title'];
            $body = htmlentities($_POST['body'], ENT_COMPAT | ENT_HTML401, 'UTF-8');
            $type = $_POST['type'];
            $purpouse = $_POST['purpouse'];
            $location = $_POST['location'];
            $images = $_FILES['propertyImage'];
            $user_id = $_SESSION['id'];
            $price = $_POST['price'];
            $rooms = $_POST['rooms'];
            $bathrooms = $_POST['baths'];
            $bedrooms = $_POST['bedrooms'];

            $validation = new PropertyValidation();
            global $errors;
            $errors = $validation->postValidation($title,$body,$images,true);
            
            if(count($errors,1) > 3){
                global $savedTitle;
                $savedTitle = $title;
                global $savedBody;
                $savedBody = $body;
                global $savedPrice;
                $savedPrice = $price;
                global $savedRooms;
                $savedRooms = $rooms;
                global $savedBedrooms;
                $savedBedrooms = $bedrooms;
                global $savedBathrooms;
                $savedBathrooms = $bathrooms; 
                global $savedID;
                $savedID = $_POST['id'];
                return;
                
            }else{
                // if validation successful update post //
                $property_id = $_POST['id'];
                // unset undesirable keys because we are passing whole $_POST //
                unset($_POST['id'], $_POST['editPost']);
                $sharedModel = new SharedModel();
                $sharedModel->update("properties", $property_id, $_POST);

                // if user selected new images, delete the old ones from DB and add new //
                if(!empty($images['name'][0])) {
                    $sharedModel->deleteImage("images", $property_id);
                    $validation->prepareImages($images,$property_id);
                }
                    
                $_SESSION['message'] = 'Nehnutelnosť bola aktualizovaná';
                header("location: /frontend/dashboard/dashboard.php");
                return;
            }
                
        }
    }

    /*public function deleteImageServer($property_id){
        $sharedModel = new SharedModel();

        $images = $sharedModel->selectAll('images', ['property_id' => $property_id]);

        foreach($images as $image){
            unlink(ROOT_PATH . '/user_images/' . $image['name']);
            echo $image['name'];
        }

        return;
    }*/

    // deletes post from DB including it's images //
    public function deletePost($post_id){
        $sharedModel = new SharedModel();

        $sharedModel->delete('properties',$post_id);
        /*$this->deleteImageServer($post_id);*/
        $sharedModel->deleteImage('images', $post_id);

        $_SESSION['message'] = 'Nehnutelnosť bola odstránená';
        header('location: /public_html/frontend/dashboard/dashboard.php');
        return;
    }

    
}
ob_end_flush();
?>