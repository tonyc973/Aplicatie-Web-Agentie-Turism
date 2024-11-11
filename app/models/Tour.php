<?php

class Tour {
    public static function getAllTours()
    {
        global $pdo;
        $sql="SELECT * FROM tours";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getTour($tour_id) {
        global $pdo;

        $sql = "SELECT * 
                FROM tours 
                WHERE tour_id = :tour_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(":tour_id" => $tour_id));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function createTour($title, $description, $price) {
        global $pdo;
        $sql = "INSERT INTO tours (title, description, price) VALUES (:title, :description, :price)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':title' => $title, ':description' => $description, ':price' => $price]);
    }

    public static function deleteTour($tour_id) {
        global $pdo;
        $sql = "DELETE FROM tours WHERE tour_id = :tour_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':tour_id' => $tour_id]);
    }
}

?>