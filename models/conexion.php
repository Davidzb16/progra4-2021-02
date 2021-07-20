<!---->
<?php

class Conexion {
    public static function conectar(){
      $link = new PDO("mysql:host=localhost;dbname=id17237219_pdophp","id17237219_progra4","~bTl?FD!XZX60i0u");
       //var_dump($link);
      return $link;
    }
}
//
//
//class Conexion {
//    public static function conectar(){
//        $link = new PDO("mysql:host=localhost;dbname=pdophp","root","");
//        //var_dump($link);
//        return $link;
//    }
//}
//

/*
$a = new Conexion();
$a -> conectar();
*/

