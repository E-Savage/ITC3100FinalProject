<?php
// gathers client data 
    $username = $_POST['userName'];
    $password = $_POST['password'];

// connection id and database name 
    $conID, $db;

    function openDatabase(&$conID){
        $host = "fdb1027.freehostspace.com";
        $db = "4180656_users";

        $usr="4180656_users";
        $pw = "RED-panda12";

        $conID = new mysqli($host, $usr, $pw, $db);

		if ($conID->connect_error) {
            die("Connection failed: " . $conID->connect_error);
        }
    }

    function write($conID, $username, $password){
        $SQL = " INSERT INTO 'registration' ('userName', 'password')";
        $SQL = $SQL . " VALUES ('$username', '$password')" 
        $result = $conID->query($SQL);
        if(!$result){
            die( "Error: " .$SQL. " :" .$conID->connect_error);
        } else {
            return true;
        }
    }

    openDatabase($conID);
    if(write($conID, $username, $password)){
        header("Location: http://pixelperfectanimals.freehostspace.com/login.html"); 
        die();
    } else {
        echo"<h1> User name and or password were incorrect, please try again!</h1>";
    }

    $conID->close();
?>