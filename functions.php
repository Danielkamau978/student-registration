<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
function sanitize_input($data) {
    return trim($data ?? '');
}
function validate_age($age) {
    if (!filter_var($age, FILTER_VALIDATE_INT)) {
        return false;
    }
    $age = (int)$age;
    return ($age >= 5 && $age <= 100);
}
function e($string) {
    return htmlspecialchars($string ?? '', ENT_QUOTES, 'UTF-8');
}
function set_flash_message($type, $message) {
    $_SESSION['flash_type'] = $type;
    $_SESSION['flash_message'] = $message;
}
function display_flash_message() {
    if (isset($_SESSION['flash_message'])) {
        $type = e($_SESSION['flash_type']);
        $message = e($_SESSION['flash_message']);
        
        echo "<div class='alert alert-{$type}'>{$message}</div>";
        
        unset($_SESSION['flash_type']);
        unset($_SESSION['flash_message']);
    }
}
?>