<?php

header("Access-Control-Allow-Origin: *");
//key database
require_once('../mysqli_login.php');
//item to display per page
$item_per_page      = 5;
//Conexion databaase
$sqli = new mysqli($db_host, $db_username, $db_password, $db_name);
//Any error conexion
if($sqli->connect_error){
    die('Error : ('. $sqli->connect_errno .') '. $sqli->connect_error);
}

//get page number
if(isset($_POST["page"])){
    $page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
    if(!is_numeric($page_number)){die('Invalid page number!');} //incase of invalid page number
}else{
    $page_number = 1;
}

//get total number of records from database
$results = $sqli->query("SELECT COUNT(*) FROM posts");
$get_total_rows = $results->fetch_row();

//break records into pages
$total_pages = ceil($get_total_rows[0]/$item_per_page);

//position of records
$page_position = (($page_number-1) * $item_per_page);

//Limit our results within a specified range.
$results = $sqli->prepare("SELECT id, title, message FROM posts ORDER BY id ASC LIMIT $page_position, $item_per_page");
$results->execute();
$results->bind_result($id, $title, $message);


//fetch values
while($results->fetch()){
    echo'
        <div >
            <a id="p'.$id.'" href="controller/ReadController.php?id='.$id.'"><h2>'.$title.'</h2></a>
            <p class="minMsg">'.$message.'</p>
        </div>
        <hr>
        ';
}


echo '<div align="center">';
// To generate links, we call the pagination function here.
echo paginate_function($item_per_page, $page_number, $get_total_rows[0], $total_pages);
echo '</div>';

function paginate_function($item_per_page, $current_page, $total_records, $total_pages)
{
    $pagination = '';
    //verify total pages and current page number
    if($total_pages > 0 && $total_pages != 1 && $current_page <= $total_pages){
        $pagination .= '<ul class="pagination">';

        $right_links    = $current_page + 4;
        $previous       = $current_page - 4; //previous link
        $next           = $current_page + 1; //next link
        $back           = $current_page -1;
        $first_link     = true; //boolean var to decide our first link

        if($current_page > 1){
            //$previous_link =    ($previous<=0)?1:$back;

            $pagination .= '<li class="first"><a href="#" data-page="1" title="First">&laquo;</a></li>'; //first link
            $pagination .= '<li><a href="#" data-page="'.$back.'" title="Previous">&lt;</a></li>'; //previous link
            for($i = ($current_page-2); $i < $current_page; $i++){ //Create left-hand side links
                if($i > 0){
                    $pagination .= '<li><a id="pg'.$i.'" href="#" data-page="'.$i.'" title="Page'.$i.'">'.$i.'</a></li>';
                }
            }
            $first_link = false; //set first link to false
        }

        if($first_link){ //if current active page is first link
            $pagination .= '<li class="active"><a href="#" data-page="1" title="Page1"><i>'.$current_page.'</i></li>';

        }elseif($current_page == $total_pages){ //if it's the last active link
            $pagination .= '<li class="active"><a href="#" data-page="'.$current_page.'" title="Page'.$current_page.'">'.$current_page.'</li>';
        }else{ //regular current link
            $pagination .= '<li class="active"><a href="#" data-page="'.$current_page.'" title="Page'.$current_page.'">'.$current_page.'</li>';
        }

        for($i = $current_page+1; $i < $right_links ; $i++){ //create right-hand side links
            if($i<=$total_pages){
                $pagination .= '<li><a href="#" data-page="'.$i.'" title="Page '.$i.'">'.$i.'</a></li>';
            }
        }

        if($current_page < $total_pages){
            //$next_link = ($i > $total_pages)? $total_pages : $i;
            $pagination .= '<li><a href="#" data-page="'.$next.'" title="Next">&gt;</a></li>'; //next link
            $pagination .= '<li class="last"><a href="#" data-page="'.$total_pages.'" title="Last">&raquo;</a></li>'; //last link
        }

        $pagination .= '</ul>';
    }
    return $pagination; //return pagination links
}