<?php
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/functions.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id     = sanitize_input($_POST['student_id'] ?? '');
    $name   = sanitize_input($_POST['name'] ?? '');
    $course = sanitize_input($_POST['course'] ?? '');
    $age    = sanitize_input($_POST['age'] ?? '');
    
    if (empty($id) || !filter_var($id, FILTER_VALIDATE_INT)) {
        set_flash_message('danger', 'Invalid record identifier.');
        header('Location: ../view.php');
        exit();
    }
    
    if (empty($name) || empty($course) || empty($age)) {
        set_flash_message('danger', 'All form fields must be filled.');
        header("Location: ../edit.php?id={$id}");
        exit();
    }
    if (!validate_age($age)) {
        set_flash_message('danger', 'Age must be a valid number between 5 and 100.');
        header("Location: ../edit.php?id={$id}");
        exit();
    }
    try {
        $sql = "UPDATE students SET name = :name, course = :course, age = :age WHERE student_id = :id";
        $stmt =$pdo->prepare($sql);$stmt->execute([
            ':name'   => $name,
            ':course' => $course,
            ':age'    => (int)$age,
            ':id'     => (int)$id
        ]);
        set_flash_message('success', 'Student details updated successfully!');
        header('Location: ../view.php');
        exit();
    } catch (PDOException $e) {
        set_flash_message('danger', 'Database error: Could not update record.');
        header("Location: ../edit.php?id={$id}");
        exit();
    }
} else {
    header('Location: ../view.php');
    exit();
}
?>