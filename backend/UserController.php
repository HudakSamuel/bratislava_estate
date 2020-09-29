<?php 
// starts session, needed for login system //
session_start();

include_once("UserModel.php");
include_once("Validation.php");
include_once("SharedModel.php");

$errors = array();

// calls userLogout function if argument is delete_id //
if (isset($_GET["logout"])){
    $userController = new UserController();
    $userController->userLogout();
}

class UserController{
    public function __construct(){
    }

    public static function userRegistration(){
        if (isset($_POST['create'])){
            // saves user input //
            $username = $_POST['user'];
            $password = $_POST['pass'];
            $email = $_POST['email'];
            $passConf = $_POST['passConf'];

            // validates user input //
            $validation = new Validation();
            global $errors;
            $errors = $validation->registrationValidation($username,$email,$password,$passConf);

            if(count($errors,1) > 4){
                return;
            }else{
                // if validation success //
                // hash user password //
                $password = password_hash($password, PASSWORD_DEFAULT);

                // add user to DB //
                $add = new UserModel();
                $add->addUser($username,$email,$password); 

                // get same user from DB so we can store it's information to $_SESSION //
                $sharedModel = new SharedModel();
                $user = $sharedModel->selectOne("users",['username' => $username]);
                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['message'] = 'Registrácia prebehla úspešne';
                header('location: ' . BASE_URL . '/frontend/dashboard/dashboard.php');
            }
                
        }
    }

    public static function userLogin(){
        if (isset($_POST['login-btn'])){
            $username = $_POST['user'];
            $password = $_POST['pass'];

            $validation = new Validation();
            global $errors;
            $errors = $validation->loginValidation($username,$password);

            if(count($errors,1) > 4){
                return; 
            }else{
                $sharedModel = new SharedModel();
                $user = $sharedModel->selectOne("users",['username' => $username]);
                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['message'] = 'Úspešne ste sa prihlásili';
                echo "<script> window.location.replace('/frontend/dashboard/dashboard.php') </script>";
                return;
            }
                
        }
    }

    // logs user out //
    public function userLogout(){
        // removes user information from session //
        unset($_SESSION['id']);
        unset($_SESSION['username']);

        // deletes the session //
        session_destroy();

        header('location: ' . '../index.php');
    }
}
?>