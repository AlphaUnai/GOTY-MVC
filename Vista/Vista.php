<?php
    class Vista{
        public static function show($visNom, $data=null){
                require("$visNom.php");
            }
    }
?>