<?php 
    $userName = $_POST['userName'];
    $password = $_POST['password'];

    $conID; $db;

    $uName;

    function openDatabase(&$conID, &$db){
        $host = "localhost";
        $db = "4180656_users"

        $usr = "root";
        $pw = "";

        $conID = new mysqli($host, $usr, $pw, $db);

        if($conID->connect_error){
            die("ConnectionFailed: ".$conID->connect_error);
        }
    }

    function pwOK($conID, $userName, $password){
        $SQL = "SELECT * FROM registration"
        $SQL = $SQL."WHERE userName='$userName' AND password='$password'";
        $result = $conID->query($SQL);
        if(!$result){
            die("Query Error: ".$SQL.":".$conID->connect_error);
        } else {
            $row = $result->fetch_array();
            if(!$row){
                return false;
            } else {
                $uName=$row['userName'];
                $result->close();
                return true;
            }
        }
        return false;
    }

    openDatabase($conID, $db);

    if(pwOK($conID, $userName, $password)){
        echo"<h1>Welcome ".$uName"</h1>";
    }else{
        echo"<h1> User name and or password were incorrect</h1>"
    }
    $conID->close();
?>