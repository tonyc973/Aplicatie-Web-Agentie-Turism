<?php
require_once "app/models/Booking.php";

class bookingController {
    public static function index() {
        $bookings = Booking::getAllbookings();
        require_once "app/views/bookings/index.php";
    }

    public static function show() {
        $booking_id = $_GET['id'];
        $booking = Booking::getBooking($booking_id);

        if ($booking) {
            require_once "app/views/bookings/show.php";
        } else {
            $_SESSION['error'] = "booking not found";
            require_once "app/views/404.php";
        }
    }
    public static function book() {
        requireLogin();
        $tour_id = $_POST['tour_id'];
        Booking::createBooking($_SESSION['user_id'], $tour_id);
        header("Location: /agentie_turism/bookings/index");
    }
}
?>
