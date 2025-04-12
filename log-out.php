<?php
session_start();

// Get the referring URL if it exists, otherwise default to log-in.php
$redirect_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'log-in.php';

// Don't redirect back to logout page if that's where they came from
if (strpos($redirect_url, 'log-out.php') !== false) {
    $redirect_url = 'log-in.php';
}

if (isset($_SESSION['username'])) {
    unset($_SESSION['username']);
    
    // Optionally destroy the entire session if needed
    // session_destroy();
    
    // Redirect to the referring page or login page
    header("location:".$redirect_url);
    exit();
} else {
    header("location:log-in.php");
    exit();
}
?>