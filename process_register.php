<?php
require_once __DIR__ . '/..db.php';
require_once __DIR__ . '/..functions.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $name   = sanitize_input($_POST['name'] ?? '');
    $course = sanitize_input($_POST['course'] ?? '');
    $age    = sanitize_input($_POST['age'] ?? '');
    
    if (empty($name) || empty($course) || empty($age)) {
        set_flash_message('danger', 'All registration fields are required.');
        header('Location: ../index.php');
        exit();
    }
    
    if (!validate_age($age)) {
        set_flash_message('danger', 'Please enter a valid age between 5 and 100.');
        header('Location: ../index.php');
        exit();
    }
    
    try {
        $sql = "INSERT INTO students (name, course, age) VALUES (:name, :course, :age)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':name'   => $name,
            ':course' => $course,
            ':age'    => (int)$age
        ]);

        set_flash_message('success', 'Student registered successfully!');
        header('Location: ../view.php');
        exit();
        
    } catch (PDOException $e) {
        set_flash_message('danger', 'Database error: Could not save student record.');
        header('Location: ../index.php');
        exit();
    }
} else {
    header('Location: ../index.php');
    exit();
}
?>
