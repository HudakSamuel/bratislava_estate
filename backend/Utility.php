<?php

class Utility{
    public function __construct(){
    }

    // shortens string and appends '...' if string is too long for container //
    public function limitedString($string, $lengthLimit){   
        if (strlen($string) > $lengthLimit){
            $modifiedString = substr($string, 0, $lengthLimit - 3);
            $modifiedString .= "...";
            return $modifiedString;
        }else{
            return $string;
        }
        
    }
}
?>

