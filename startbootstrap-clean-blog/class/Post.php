
<?php


class Post{
    private $title;
    private $message;

    public function __construct($title, $message)
    {
        $this->title = $title;
        $this->massage = $message;
    }

//fn get & set
    public function getMassage()
    {
        return $this->massage;
    }


    public function getTitle()
    {
        return $this->title;
    }


    public function setTitle($title)
    {
        $this->title = $title;
    }


    public function setMassage($massage)
    {
        $this->massage = $massage;
    }

    public function insertPost(){

    }

}
?>