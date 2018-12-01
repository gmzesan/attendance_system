<?php
    include "index.php";
    $obj = new Index;
    $roll = $_GET['roll'];
    if($obj->sdelete($roll)){
        header("location:slist.php");
    }
?>