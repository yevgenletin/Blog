$(document).ready(function(){
    $("#results").load("http://localhost:9898/startbootstrap-clean-blog/controller/PaginateController.php");
    //user click on pagination links
    $("#results").on("click", ".pagination a", function(e){
        e.preventDefault();
        //get page number from link
        var page = $(this).attr("data-page");
        $("#results").load("http://localhost:9898/startbootstrap-clean-blog/controller/PaginateController.php", {"page":page});
    });


});