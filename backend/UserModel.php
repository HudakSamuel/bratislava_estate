<?php
include_once("Connect.php");


class UserModel extends Connect{

    public function __construct(){
    }

    // adds user to DB //
    public static function addUser($username,$email,$password){
        $connect = new Connect();

        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $statement = $connect->connection->prepare($sql);

        if ($statement){
            $statement->bind_param("sss", $username, $email, $password);

            $statement->execute();
        }else{
            echo "Cannot add user";
        }

        $connect->connection->close();
    }
}
?>