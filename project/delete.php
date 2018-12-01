<?php
    include "index.php";
    $obj = new Index;
    $id = $_GET['id'];
    if($obj->delete($id)){
        header("location:view.php");
    }
?>