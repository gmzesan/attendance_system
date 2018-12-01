<?php
    class Index{
        protected $host = "localhost";
        protected $user = "root";
        protected $pass = "";
        protected $database = "project";
        protected $name;
        protected $roll;
        protected $action;
        protected $userid;
        protected $username;
        protected $id;
        protected $date;
        protected $connect;
        protected $sql;
        protected $result;
        public function __construct(){
           $this->connect = new mysqli($this->host,$this->user,$this->pass,$this->database);
           if($this->connect->connect_error){
               echo "Error";
           }
           return $this->connect;
        }
        public function __destruct(){
            $this->connect->close();
        }
        
        public function insertdata($n,$r){
            $this->name = $n;
            $this->roll = $r;
            $this->sql = "INSERT INTO add_student(name,roll) VALUES('$this->name','$this->roll')";
            $this->result = $this->connect->query($this->sql);
            if(!$this->result == true){
                echo "Error !";
            }
        }
        public function insertRecord($d,$a){
            $this->date = $d;
            $this->action = $a;
            $this->sql = "INSERT INTO attendance(date,action) VALUES('$this->date(format)','$this->action')";
            $this->result = $this->connect->query($this->sql);
            if($this->result == true){
                return true;
            }
            else{
            	return false;
            }
        }
        public function show(){
            $this->sql = "SELECT * FROM add_student";
            $this->result = $this->connect->query($this->sql);
            if($this->result == true){
                return $this->result;
            }
        }
        public function viewDateList(){
            $this->sql = "SELECT * FROM attendance";
            $this->result = $this->connect->query($this->sql);
            if($this->result == true){
                return $this->result;
            }
        }
        public function index(){
            if($_SESSION['user']>0){
                return true;
            }else{
                return false;
            }
        }
        public function set_session($uid){
            $this->userid = $uid;
            $_SESSION['user'] = $this->userid;
        }
        public function retrive($u){
            $this->username = $u;
            $this->sql = "SELECT * FROM login WHERE username = '$this->username'";
            $this->result = $this->connect->query($this->sql);
            if($this->result == true){
                return $this->result;
            }else{
                echo 'error';
            }
        }
        public function delete($id){
            $this->id = $id;
            $this->sql = "DELETE FROM attendance WHERE id = '$this->id'";
            $this->result = $this->connect->query($this->sql);
            if($this->result == true){
                return $this->result;
            }
        }
        public function sdelete($roll){
            $this->roll = $roll;
            $this->sql = "DELETE FROM add_student WHERE roll = '$this->roll'";
            $this->result = $this->connect->query($this->sql);
            if($this->result == true){
                return $this->result;
            }
        }
    }
?>