<?php
    session_start();
    if(isset($_GET['logout'])){
        if($_GET['logout']==true){
            session_destroy(); 
            header('Location: login.php');
        }
    }
?>