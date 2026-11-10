<?php
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/functions.php';
$id =$_GET['id'] ?? null;

if ($id && filter_var($id, FILTER_VALIDATE_INT) && (int)$id > 0) {
    try {
        $stmt =$pdo->prepare("DELETE FROM students WHERE student_id = :id");
        $stmt->execute([':id' => (int)$id]);
        
        if ($stmt->rowCount() > 0) {
            set_flash_message('success', 'Student record deleted successfully.');
        } else {
            set_flash_message('danger', 'Record not found or already deleted.');
        }
    } catch (PDOException $e) {
        set_flash_message('danger', 'Database error: Could not delete record.');
    }
} else {
    set_flash_message('danger', 'Invalid student ID specified.');
}
header('Location: ../view.php');
exit();
?>