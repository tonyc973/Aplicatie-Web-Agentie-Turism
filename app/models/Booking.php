<?php

class Booking {
    public static function getAllbookings()
    {
        global $pdo;
        $sql="SELECT * FROM Bookings";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getBooking($booking_id) {
        global $pdo;

        $sql = "SELECT * s
                FROM bookings
                WHERE booking_id = :booking_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(":booking_id" => $booking_id));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function createBooking($user_id, $tour_id) {
        global $pdo;
        $sql = "INSERT INTO bookings (user_id, tour_id) VALUES (:user_id, :tour_id)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':user_id' => $user_id, ':tour_id' => $tour_id]);
    }
}

?>