<?php

namespace App\Controllers;
namespace MyApp\Controllers;

require_once 'ProductController.php';

// use DateTime;
// use ProductController;

class User {
    public function __construct() {
        echo '<pre>';
        print_r(__METHOD__);
        echo '</pre>';
        new \ProductController();
        $date = new \DateTime();
        echo '<pre>';
        print_r($date);
        echo '</pre>';
    }
}