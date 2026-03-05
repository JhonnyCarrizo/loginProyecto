<?php

class DB{
    private static $conn=null;

    public static function conectar(){
        if(self::$conn==null){
            self::$conn=new mysqli("localhost", "root", "","3205_01");
        }
            return self::$conn;

    }
}
?>