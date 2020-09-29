<?php
include_once("Connect.php");

class PropertyModel extends Connect{

    public function __construct(){
    }

    // adds property into DB //
    public static function addProperty($user_id,$title,$body,$type,$purpouse,$location,$price,$rooms,$bathrooms,$bedrooms){
        $connect = new Connect();

        $sql = "INSERT INTO properties (user_id, title, body, location, type, purpouse, rooms, bedrooms, baths, price) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $statement = $connect->connection->prepare($sql);

        if ($statement){
            $statement->bind_param("ssssssssss", $user_id, $title, $body, $location, $type, $purpouse, $rooms, $bedrooms, $bathrooms, $price);

            $statement->execute();

            $propery_id = $statement->insert_id;
            $connect->connection->close();
            return $propery_id;
        }else{
            echo "Cannot add property";
            $connect->connection->close();
        }
    }

    // fetches 3 latest properties from DB //
    public function latestProperties(){
        $connect = new Connect();
        
        $sql = "SELECT * FROM properties ORDER BY id DESC LIMIT 3";
        $statement = $connect->connection->prepare($sql);
        $statement->execute();
        $records = $statement->get_result()->fetch_all(MYSQLI_ASSOC);
        $connect->connection->close();
        return $records;
    }
}

?>