<?php

include_once("SharedModel.php");

class Validation{
    private $errors;

    public function __construct(){
        $this->errors = array(
            "nameErrors" => array(),
            "emailErrors" => array(),
            "passErrors" => array(),
            "passConfErrors" => array(),
        );
    }

    public function getErrors(){
        return $this->erros;
    }

    // validates user input and saves errors to their respective keys //
    public function registrationValidation($username,$email,$password, $passConf){

        $sharedModel = new SharedModel();
        
        if (strlen($username) < 5){
            array_push($this->errors["nameErrors"], "Meno je príliš krátke");
        }

        $existingUsername = $sharedModel->selectOne("users", ['username' => $username]);
        if (isset($existingUsername)){
            array_push($this->errors["nameErrors"], "Meno nieje dostupné");
        }

        if (strlen($email) < 5){
            array_push($this->errors["emailErrors"], "Email je príliš krátky");
        }

        $existingEmail = $sharedModel->selectOne("users", ['email' => $email]);
        if (isset($existingEmail)){
            array_push($this->errors["emailErrors"], "Email nieje dostupný");
        }

        if (strpos($email, '@') == false){
            array_push($this->errors["emailErrors"], "Mail neobsahuje @");
        }

        if (strlen($password) < 5){
            array_push($this->errors["passErrors"], "Heslo je príliš krátke");
        }

        if ($password != $passConf){
            array_push($this->errors["passConfErrors"], "Heslá sa nezhodujú");
        }

        return $this->errors;

    }

    // validates login //
    public function loginValidation($username, $password){
        $sharedModel = new SharedModel();

        $existingUser = $sharedModel->selectOne("users", ['username' => $username]);
        
        if (($existingUser && password_verify($password, $existingUser['password']))){
            return $this->errors;
        }else{
            array_push($this->errors["nameErrors"], "Nesprávne meno alebo heslo");
            return $this->errors;
        }
    }

}
?>