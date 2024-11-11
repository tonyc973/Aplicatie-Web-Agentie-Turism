<?php
$routes = [
    "agentie_turism/debts/index" => ["DebtController", "index"],
    "agentie_turism/users/index" => ["UserController", "index"],
    "agentie_turism/users/register" => ["UserController", "register"],
    "agentie_turism/users/login" => ["UserController", "login"],
    "agentie_turism/users/logout" => ["UserController", "logout"],
    "agentie_turism/tours/index" => ["TourController", "index"],
    "agentie_turism/tours/create" => ["TourController", "create"],
    "agentie_turism/tours/delete" => ["TourController", "delete"],
    "agentie_turism/bookings/index" => ["BookingController", "index"],
    "agentie_turism/bookings/book" => ["BookingController", "book"],
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
