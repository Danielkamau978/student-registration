<?php
require_once 'db.php';
require_once 'header.php';
// Query all records from db
try {
    $stmt =$pdo->query("SELECT student_id, name, course, age FROM students ORDER BY student_id DESC");
    $students =$stmt->fetchAll();
} catch (PDOException $e) {$students = [];
    set_flash_message('danger', 'Error loading student records.');
}
?>
<div class="card">
    <h2 class="card-title">Registered Students List</h2>
    <!-- Check if any student records can be found -->
    <?php if (count($students) > 0): ?>
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Course</th>
                        <th>Age</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($students as$student): ?>
                        <tr>
                            <td><?php echo e($student['student_id']); ?></td>
                            <td><?php echo e($student['name']); ?></td>
                            <td><?php echo e($student['course']); ?></td>
                            <td><?php echo e($student['age']); ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo e($student['student_id']); ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="processing/delete.php?id=<?php echo e($student['student_id']); ?>" class="btn btn-sm btn-danger js-delete-btn">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <!-- a message when database table is empty -->
        <div class="alert alert-danger">No student records found in the database. <a href="index.php">Register a student now</a>.</div>
    <?php endif; ?>
</div>
<?php require_once 'includes/footer.php'; ?>
