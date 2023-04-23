<?php 
    $userName = $_POST['userName'];
    $password = $_POST['password'];

    $conID; $db;

    $fName;

    function openDatabase(&$conID, &$db){
        $host = "fdb1027.freehostspace.com";
        $db = "4180656_users";

        $usr="4180656_users";
        $pw = "RED-panda12";

        $conID = new mysqli($host, $usr, $pw, $db);

        if($conID->connect_error){
            die("ConnectionFailed: ".$conID->connect_error);
        }
    }

    function pwOK($conID, $userName, $password){
        $SQL = " SELECT * FROM registration";
        $SQL = $SQL." WHERE userName='$userName' AND password='$password'";
        $result = $conID->query($SQL);
        if(!$result){
            die("Query Error: ".$SQL.":".$conID->connect_error);
        } else {
            $row = $result->fetch_array();
            if(!$row){
                return false;
            } else {
                $fName = $row["userName"];
                $result->close();
                return true;
            }
        }
        return false;
    }

    openDatabase($conID, $db);

    if(pwOK($conID, $userName, $password)){    
        header("Location: http://pixelperfectanimals.freehostspace.com/index.html"); 
        die();
    }else{
        echo"<h1> User name and or password were incorrect</h1>";
    }
    $conID->close();
?>