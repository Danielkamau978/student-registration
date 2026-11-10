<?php
require_once 'db.php';
require_once 'header.php';
// get and validate target student id from url
$id =$_GET['id'] ?? null;
if (!$id || !filter_var($id, FILTER_VALIDATE_INT) || (int)$id <= 0) {
    set_flash_message('danger', 'Invalid student ID provided.');
    header('Location: view.php');
    exit();
}
try {
    $stmt =$pdo->prepare("SELECT student_id, name, course, age FROM students WHERE student_id = :id");
    $stmt->execute([':id' => (int)$id]);
    $student =$stmt->fetch();
    if (!$student) {
        set_flash_message('danger', 'Student record not found.');
        header('Location: view.php');
        exit();
    }
} catch (PDOException $e) {
    set_flash_message('danger', 'Error fetching record details.');
    header('Location: view.php');
    exit();
}
?>
<div class="card">
    <h2 class="card-title">Edit Student Record</h2>
    <form action="processing/process_update.php" method="POST" id="studentForm" novalidate> 
        <input type="hidden" name="student_id" value="<?php echo e($student['student_id']); ?>">   
        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" name="name" id="name" class="form-control" value="<?php echo e($student['name']); ?>">
        </div>
        <div class="form-group">
            <label for="course">Course</label>
            <input type="text" name="course" id="course" class="form-control" value="<?php echo e($student['course']); ?>">
        </div> 
        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" name="age" id="age" class="form-control" value="<?php echo e($student['age']); ?>">
        </div>
        <button type="submit" class="btn btn-primary">Update Student</button>
        <a href="view.php" class="btn btn-warning">Cancel</a>
    </form>
</div>
<?php require_once 'includes/footer.php'; ?>
