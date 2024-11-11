<?php
require_once "app/models/Tour.php";

class TourController{
    public static function index() {
        $tours = Tour::getAllTours();
        require_once "app/views/tours/index.php";
    }
    public static function show() {
        $tour_id = $_GET['id'];
        $tour = Tour::gettour($tour_id);

        if ($tour) {
            require_once "app/views/tours/show.php";
        } else {
            $_SESSION['error'] = "tour not found";
            require_once "app/views/404.php";
        }
    }
}
?>