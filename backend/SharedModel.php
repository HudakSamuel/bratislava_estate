<?php
include_once("Connect.php");

class SharedModel extends Connect{
    public function __construct(){ 
    }

    private function executeConditionQuery($sql, $data, $connect){
        $statement = $connect->connection->prepare($sql);
        $values = array_values($data);
        $types = str_repeat('s', count($values));
        $statement->bind_param($types, ...$values);
        $statement->execute();
        return $statement;
    }

    // selects one query from DB table based on conditions //
    public function selectOne($table,$conditions){
        $connect = new Connect();

        $sql = "SELECT * FROM $table";

         $i = 0;
        foreach($conditions as $key => $value){
            if ($i == 0){
                $sql = $sql . " WHERE $key=?";
            }else{
                $sql = $sql . " AND $key=?";
            }
            $i++;
        }
        $sql = $sql . " LIMIT 1";

        $statement = $this->executeConditionQuery($sql,$conditions,$connect);
        $records = $statement->get_result()->fetch_assoc();

        $connect->connection->close();
        return $records;
        
    }
    
    
    // selects all queries from DB table based on conditions //
    public function selectAll($table,$conditions = []){
        $connect = new Connect();

        $sql = "SELECT * FROM $table";

        if (empty($conditions)) {
            $statement = $connect->connection->prepare($sql);
            $statement->execute();
            $records = $statement->get_result()->fetch_all(MYSQLI_ASSOC);
            $connect->connection->close();
            return $records;
        }else{
            $i = 0;
            foreach($conditions as $key => $value){
                if ($i == 0){
                    $sql = $sql . " WHERE $key=?";
                }else{
                    $sql = $sql . " AND $key=?";
                }
                $i++;
            }

            $statement = $this->executeConditionQuery($sql,$conditions,$connect);
            $records = $statement->get_result()->fetch_all(MYSQLI_ASSOC);
            $connect->connection->close();
            return $records;
        }
    }

    // updates DB query //
    public function update($table,$id,$data){
        $connect = new Connect();

        $sql = "UPDATE $table SET ";

        $i = 0;
        foreach($data as $key => $value){
            if ($i == 0){
                $sql = $sql . " $key=?";
            }else{
                $sql = $sql . ", $key=?";
            }
            $i++;
        }

        $sql = $sql. " WHERE id=?";
        $data['id'] = $id;
        $statement = $this->executeConditionQuery($sql,$data,$connect);
        return $statement;        
    }

    // deletes DB query //
    public function delete($table,$id){
        $connect = new Connect();

        $sql = "DELETE FROM $table WHERE id=?";

        $statement = $this->executeConditionQuery($sql,['id' => $id],$connect);
        $connect->connection->close();
        return $statement;
    }

    // deletes image, delete function doesnt work because we have to delete based on FK key //

    public function deleteImage($table,$id){
        $connect = new Connect();

        $sql = "DELETE FROM $table WHERE property_id=?";

        $statement = $this->executeConditionQuery($sql,['property_id' => $id],$connect);
        $connect->connection->close();
        return $statement;
    }


    // adds image to DB //
    public static function addImage($imageName,$property_id){
        $connect = new Connect();

        $sql = "INSERT INTO images (property_id, name) VALUES (?, ?)";
        $statement = $connect->connection->prepare($sql);

        if ($statement){
            $statement->bind_param("ss", $property_id, $imageName);

            $statement->execute();
        }else{
            echo "Cannot add image";
        }

        $connect->connection->close();
    }
}
?>