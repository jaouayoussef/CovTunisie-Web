<?php 
    class mysqliHelper {
    
    private static $lastCon = NULL;


    public static function getCon() {
        if (!isset(self::$lastCon) || self::$lastCon == NULL) {
            self::$lastCon = mysqli_connect("localhost", "root","", "covtun") ;
        }
        return self::$lastCon;
        }
    }




    


?>
