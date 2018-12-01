<?php
session_start();
    include 'index.php';
    $obj = new Index;
    if(isset($_POST['submit'])){
        $u = $_POST['user'];
        $pw = $_POST['pass'];
        $data = $obj->retrive($u);
        if($data->num_rows>0){
            while($row = $data->fetch_object()){
                $uid = $row->id;
                $pass = $row->password;
            }

        }
        $e_pw = md5($pw);
        if($e_pw === $pass){
            $obj->set_session($uid);            
        }else{
            header('Location: login.php');
        }

        if($obj->index()==true){
            header('Location: action.php');
           // echo "shgid";
       }
    }else{
        header('location:login.php');
    }



?>