<?php
require_once "app/models/User.php";

class UserController{
    public static function index() {
        $users = User::getAllUsers();
        require_once "app/views/users/index.php";
    }

    public static function show() {
        $user_id = $_GET['id'];
        $user = User::getUser($user_id);

        if ($user) {
            require_once "app/views/users/show.php";
        } else {
            $_SESSION['error'] = "User not found";
            require_once "app/views/404.php";
        }

    }

    public static function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $firstName = $_POST['first_name'];
            $lastName = $_POST['last_name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm_password'];


            if ($password !== $confirmPassword) {
                $_SESSION['error'] = "Passwords do not match.";
                header("Location: /caietul_mereu/users/register");
                exit;
            }

 
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

 
            $userCreated = User::createUser($firstName, $lastName, $email, $hashedPassword);
            require_once "app/views/users/register.php";
            if ($userCreated) {
                $_SESSION['success'] = "Registration successful! Please login.";
                header("Location: /caietul_mereu/users/login");
            } else {
                $_SESSION['error'] = "Registration failed. Email might already be in use.";
                header("Location: /caietul_mereu/register");
            }
        } else {
            require_once "app/views/users/register.php";
        }
    }

    public static function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['email'];
            $password = $_POST['password'];
            $user = User::authenticate($username, $password);

            if ($user) {
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['role'] = $user['role'];
                header("Location: /caietul_mereu/tours/index");
            } else {
                echo "Invalid credentials!";
            }
        }
        require "app/views/users/login.php";
    }

    public static function logout() {
        session_destroy();
        header("Location: /caietul_mereu/users/login");
    }

}
?>