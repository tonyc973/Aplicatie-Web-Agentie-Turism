<?php

class User {
    public static function getAllUsers() {
        global $pdo;
        $sql = "SELECT * 
                FROM users";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getUser($user_id) {
        global $pdo;

        $sql = "SELECT * s
                FROM users 
                WHERE user_id = :user_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(":user_id" => $user_id));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function createUser($firstName, $lastName, $email, $password) {
        global $pdo;

        // Check if the email already exists
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':email' => $email]);

        if ($stmt->fetch()) {
            // Email already exists
            return false;
        }

        // Insert the new user
        $sql = "INSERT INTO users (first_name, last_name, email, password, role) 
                VALUES (:first_name, :last_name, :email, :password, 'user')";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([
            ':first_name' => $firstName,
            ':last_name' => $lastName,
            ':email' => $email,
            ':password' => $password
        ]);
    }

    public static function authenticate($email, $password) {
        global $pdo;
        $sql = "SELECT * FROM users WHERE email= :email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }


}
?>