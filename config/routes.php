<?php
$routes = [
    "caietul_mereu/debts/index" => ["DebtController", "index"],
    "caietul_mereu/users/index" => ["UserController", "index"],
    "caietul_mereu/users/register" => ["UserController", "register"],
    "caietul_mereu/users/login" => ["UserController", "login"],
    "caietul_mereu/users/logout" => ["UserController", "logout"],
    "caietul_mereu/tours/index" => ["TourController", "index"],
    "caietul_mereu/tours/create" => ["TourController", "create"],
    "caietul_mereu/tours/delete" => ["TourController", "delete"],
    "caietul_mereu/bookings/index" => ["BookingController", "index"],
    "caietul_mereu/bookings/book" => ["BookingController", "book"],
    "" => ["HomePageController", "index"]
];


class Router {
    private $uri;

    public function __construct() {
        // Get the current URI
        $this->uri = trim($_SERVER["REQUEST_URI"], "/");
    }

    public function direct() {
        global $routes;
   
        if (array_key_exists($this->uri, $routes)) {

            // Get the controller and method
            [$controller, $method] = $routes[$this->uri];

            // Load the controller file if it hasn't been autoloaded
            require_once "app/controllers/{$controller}.php";

            // Call the method
            return $controller::$method();
        }
        
        require_once "app/views/404.php";
    }
}

?>