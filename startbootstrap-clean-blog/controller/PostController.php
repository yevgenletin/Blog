
<?php
//key of database
require_once('../mysqli_login.php');
require('../class/Post.php');

header("access-control-allow-origin: *");
//conexion db
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

    if($conn->connect_error){
        die('error : ('. $conn->connect_errno .') '. $conn->connect_error);
    }

    $title = $_POST['title'];
    $message = $_POST['message'];


// write  a post  in the db
    if(($_POST['title']!='') && ($_POST['message']!='')){
        $post1 = new post($title, $message);

        $sql = "insert into posts (title, message)
        values ('".$post1->gettitle()."', '".$post1->getmassage()."')";

        $jsondata = array();
        if ($conn->query($sql) === true) {
            $jsondata['success'] = true;
        } else {
            $jsondata['success'] = false;
            $jsondata['message'] = 'hola! el valor recibido no es correcto.';
        }
        echo json_encode($jsondata);
    }
//upload file .json
    if($_FILES['file1']['error']==0) {
        $str_datos = file_get_contents($_FILES['file1']['tmp_name']);
        $datos = json_decode($str_datos, true);
    }

//write in the db
    if(isset($_FILES['file1']['name'])) {
        $posts = $datos['posts'];
        foreach ($posts as $pst) {
            $post2 = new post($pst['title'], $pst['message']);
            $sql = "insert into posts (title, message)
                values ('" . $post2->gettitle() . "', '" . $post2->getmassage() . "')";
            $jsondata = array();
            if ($conn->query($sql) === true) {
                $jsondata['success'] = true;
            } else {
                $jsondata['success'] = false;
                $jsondata['message'] = 'hola! el valor recibido no es correcto.';

            }
        }
        echo json_encode($jsondata);
    }

header('content-type: application/json; charset=utf-8');

$conn->close();