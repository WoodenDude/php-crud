<?php
// Prevent direct access
defined('ACCESS') or die('No direct script access allowed');

// Error reporting (only for development)
error_reporting(0); // Disable in production
ini_set('display_errors', 0);

$host = "localhost";
$username = "root"; 
$password = "";
$database = "library_db";

// Use prepared statements
$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    error_log("Database connection failed: " . $conn->connect_error);
    die("System maintenance in progress. Please try later.");
}
?>
