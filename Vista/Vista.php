<?php
    class Vista{
        public function show($visNom, $data=null){
            include("header.php");
            include("$visNom.php");
            include("footer.php");

        }
    }
?>