<?php
/**
 * Created by PhpStorm.
 * User: yevhen1992
 * Date: 08/12/2016
 * Time: 12:28
 */
//SESSiON
session_start();

header("Access-Control-Allow-Origin: *");
//key of database
require_once('../mysqli_login.php');

$_SESSION["title"] = "";
$_SESSION["message"] = "";

//Conexion databaase
$sqli = new mysqli($db_host, $db_username, $db_password, $db_name);
//Any error conexion
if($sqli->connect_error){
    die('Error : ('. $sqli->connect_errno .') '. $sqli->connect_error);
}

//get post from db
if(isset($_GET["id"])) {

    $sql = "SELECT title, message FROM posts WHERE id = '".$_GET["id"]."'";
    $result = $sqli->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {

            $_SESSION['title'] = $row["title"];
            $_SESSION['message'] = $row["message"];

        }
        //redirect
        header("Location: http://localhost:9898/startbootstrap-clean-blog/read.php");
    } else {
        echo "0 results";
    }
    $conn->close();
    session_destroy();
}